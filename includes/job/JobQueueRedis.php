<?php
/**
 * Redis-backed job queue code.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @author Aaron Schulz
 */

/**
 * Class to handle job queues stored in Redis
 *
 * This is faster, less resource intensive, queue that JobQueueDB.
 * All data for a queue using this class is placed into one redis server.
 *
 * There are eight main redis keys used to track jobs:
 *   - l-unclaimed  : A list of job IDs used for ready unclaimed jobs
 *   - z-claimed    : A sorted set of (job ID, UNIX timestamp as score) used for job retries
 *   - z-abandoned  : A sorted set of (job ID, UNIX timestamp as score) used for broken jobs
 *   - z-delayed    : A sorted set of (job ID, UNIX timestamp as score) used for delayed jobs
 *   - h-idBySha1   : A hash of (SHA1 => job ID) for unclaimed jobs used for de-duplication
 *   - h-sha1Byid   : A hash of (job ID => SHA1) for unclaimed jobs used for de-duplication
 *   - h-attempts   : A hash of (job ID => attempt count) used for job claiming/retries
 *   - h-data       : A hash of (job ID => serialized blobs) for job storage
 * A job ID can be in only one of z-delayed, l-unclaimed, z-claimed, and z-abandoned.
 * If an ID appears in any of those lists, it should have a h-data entry for its ID.
 * If a job has a SHA1 de-duplication value and its ID is in l-unclaimed or z-delayed, then
 * there should be no other such jobs with that SHA1. Every h-idBySha1 entry has an h-sha1Byid
 * entry and every h-sha1Byid must refer to an ID that is l-unclaimed. If a job has its
 * ID in z-claimed or z-abandoned, then it must also have an h-attempts entry for its ID.
 *
 * Additionally, "rootjob:* keys track "root jobs" used for additional de-duplication.
 * Aside from root job keys, all keys have no expiry, and are only removed when jobs are run.
 * All the keys are prefixed with the relevant wiki ID information.
 *
 * This class requires Redis 2.6 as it makes use Lua scripts for fast atomic operations.
 * Additionally, it should be noted that redis has different persistence modes, such
 * as rdb snapshots, journaling, and no persistent. Appropriate configuration should be
 * made on the servers based on what queues are using it and what tolerance they have.
 *
 * @ingroup JobQueue
 * @ingroup Redis
 * @since 1.21
 */
class JobQueueRedis extends JobQueue {
	/** @var RedisConnectionPool */
	protected $redisPool;

	protected $server; // string; server address

	const MAX_AGE_PRUNE = 604800; // integer; seconds a job can live once claimed (7 days)

	protected $key; // string; key to prefix the queue keys with (used for testing)

	/**
	 * @params include:
	 *   - redisConfig : An array of parameters to RedisConnectionPool::__construct().
	 *                   Note that the serializer option is ignored "none" is always used.
	 *   - redisServer : A hostname/port combination or the absolute path of a UNIX socket.
	 *                   If a hostname is specified but no port, the standard port number
	 *                   6379 will be used. Required.
	 * @param array $params
	 */
	public function __construct( array $params ) {
		parent::__construct( $params );
		$params['redisConfig']['serializer'] = 'none'; // make it easy to use Lua
		$this->server = $params['redisServer'];
		$this->redisPool = RedisConnectionPool::singleton( $params['redisConfig'] );
	}

	protected function supportedOrders() {
		return array( 'timestamp', 'fifo' );
	}

	protected function optimalOrder() {
		return 'fifo';
	}

	protected function supportsDelayedJobs() {
		return true;
	}

	/**
	 * @see JobQueue::doIsEmpty()
	 * @return bool
	 * @throws MWException
	 */
	protected function doIsEmpty() {
		return $this->doGetSize() == 0;
	}

	/**
	 * @see JobQueue::doGetSize()
	 * @return integer
	 * @throws MWException
	 */
	protected function doGetSize() {
		$conn = $this->getConnection();
		try {
			return $conn->lSize( $this->getQueueKey( 'l-unclaimed' ) );
		} catch ( RedisException $e ) {
			$this->throwRedisException( $this->server, $conn, $e );
		}
	}

	/**
	 * @see JobQueue::doGetAcquiredCount()
	 * @return integer
	 * @throws MWException
	 */
	protected function doGetAcquiredCount() {
		if ( $this->claimTTL <= 0 ) {
			return 0; // no acknowledgements
		}
		$conn = $this->getConnection();
		try {
			$conn->multi( Redis::PIPELINE );
			$conn->zSize( $this->getQueueKey( 'z-claimed' ) );
			$conn->zSize( $this->getQueueKey( 'z-abandoned' ) );
			return array_sum( $conn->exec() );
		} catch ( RedisException $e ) {
			$this->throwRedisException( $this->server, $conn, $e );
		}
	}

	/**
	 * @see JobQueue::doGetDelayedCount()
	 * @return integer
	 * @throws MWException
	 */
	protected function doGetDelayedCount() {
		if ( !$this->checkDelay ) {
			return 0; // no delayed jobs
		}
		$conn = $this->getConnection();
		try {
			return $conn->zSize( $this->getQueueKey( 'z-delayed' ) );
		} catch ( RedisException $e ) {
			$this->throwRedisException( $this->server, $conn, $e );
		}
	}

	/**
	 * @see JobQueue::doGetAbandonedCount()
	 * @return integer
	 * @throws MWException
	 */
	protected function doGetAbandonedCount() {
		if ( $this->claimTTL <= 0 ) {
			return 0; // no acknowledgements
		}
		$conn = $this->getConnection();
		try {
			return $conn->zSize( $this->getQueueKey( 'z-abandoned' ) );
		} catch ( RedisException $e ) {
			$this->throwRedisException( $this->server, $conn, $e );
		}
	}

	/**
	 * @see JobQueue::doBatchPush()
	 * @param array $jobs
	 * @param $flags
	 * @return bool
	 * @throws MWException
	 */
	protected function doBatchPush( array $jobs, $flags ) {
		// Convert the jobs into field maps (de-duplicated against each other)
		$items = array(); // (job ID => job fields map)
		foreach ( $jobs as $job ) {
			$item = $this->getNewJobFields( $job );
			if ( strlen( $item['sha1'] ) ) { // hash identifier => de-duplicate
				$items[$item['sha1']] = $item;
			} else {
				$items[$item['uuid']] = $item;
			}
		}

		if ( !count( $items ) ) {
			return true; // nothing to do
		}

		$conn = $this->getConnection();
		try {
			// Actually push the non-duplicate jobs into the queue...
			if ( $flags & self::QOS_ATOMIC ) {
				$batches = array( $items ); // all or nothing
			} else {
				$batches = array_chunk( $items, 500 ); // avoid tying up the server
			}
			$failed = 0;
			$pushed = 0;
			foreach ( $batches as $itemBatch ) {
				$added = $this->pushBlobs( $conn, $itemBatch );
				if ( is_int( $added ) ) {
					$pushed += $added;
				} else {
					$failed += count( $itemBatch );
				}
			}
			if ( $failed > 0 ) {
				wfDebugLog( 'JobQueueRedis', "Could not insert {$failed} {$this->type} job(s)." );
				return false;
			}
			wfIncrStats( 'job-insert', count( $items ) );
			wfIncrStats( 'job-insert-duplicate', count( $items ) - $failed - $pushed );
		} catch ( RedisException $e ) {
			$this->throwRedisException( $this->server, $conn, $e );
		}

		return true;
	}

	/**
	 * @param RedisConnRef $conn
	 * @param array $items List of results from JobQueueRedis::getNewJobFields()
	 * @return integer Number of jobs inserted (duplicates are ignored)
	 * @throws RedisException
	 */
	protected function pushBlobs( RedisConnRef $conn, array $items ) {
		$args = array(); // ([id, sha1, blob [, id, sha1, blob ... ] ] )
		foreach ( $items as $item ) {
			$args[] = (string)$item['uuid'];
			$args[] = (string)$item['sha1'];
			$args[] = (string)$item['rtimestamp'];
			$args[] = (string)serialize( $item );
		}
		static $script =
<<<LUA
		if #ARGV % 4 ~= 0 then return redis.error_reply('Unmatched arguments') end
		local pushed = 0
		for i = 1,#ARGV,4 do
			local id,sha1,rtimestamp,blob = ARGV[i],ARGV[i+1],ARGV[i+2],ARGV[i+3]
			if sha1 == '' or redis.call('hExists',KEYS[3],sha1) == 0 then
				if 1*rtimestamp > 0 then
					-- Insert into delayed queue (release time as score)
					redis.call('zAdd',KEYS[4],rtimestamp,id)
				else
					-- Insert into unclaimed queue
					redis.call('lPush',KEYS[1],id)
				end
				if sha1 ~= '' then
					redis.call('hSet',KEYS[2],id,sha1)
					redis.call('hSet',KEYS[3],sha1,id)
				end
				redis.call('hSet',KEYS[5],id,blob)
				pushed = pushed + 1
			end
		end
		return pushed
LUA;
		return $this->redisEval( $conn, $script,
			array_merge(
				array(
					$this->getQueueKey( 'l-unclaimed' ), # KEYS[1]
					$this->getQueueKey( 'h-sha1ById' ), # KEYS[2]
					$this->getQueueKey( 'h-idBySha1' ), # KEYS[3]
					$this->getQueueKey( 'z-delayed' ), # KEYS[4]
					$this->getQueueKey( 'h-data' ), # KEYS[5]
				),
				$args
			),
			5 # number of first argument(s) that are keys
		);
	}

	/**
	 * @see JobQueue::doPop()
	 * @return Job|bool
	 * @throws MWException
	 */
	protected function doPop() {
		$job = false;

		// Push ready delayed jobs into the queue every 10 jobs to spread the load.
		// This is also done as a periodic task, but we don't want too much done at once.
		if ( $this->checkDelay && mt_rand( 0, 9 ) == 0 ) {
			$this->releaseReadyDelayedJobs();
		}

		$conn = $this->getConnection();
		try {
			do {
				if ( $this->claimTTL > 0 ) {
					// Keep the claimed job list down for high-traffic queues
					if ( mt_rand( 0, 99 ) == 0 ) {
						$this->recycleAndDeleteStaleJobs();
					}
					$blob = $this->popAndAcquireBlob( $conn );
				} else {
					$blob = $this->popAndDeleteBlob( $conn );
				}
				if ( $blob === false ) {
					break; // no jobs; nothing to do
				}

				wfIncrStats( 'job-pop' );
				$item = unserialize( $blob );
				if ( $item === false ) {
					wfDebugLog( 'JobQueueRedis', "Could not unserialize {$this->type} job." );
					continue;
				}

				// If $item is invalid, recycleAndDeleteStaleJobs() will cleanup as needed
				$job = $this->getJobFromFields( $item ); // may be false
			} while ( !$job ); // job may be false if invalid
		} catch ( RedisException $e ) {
			$this->throwRedisException( $this->server, $conn, $e );
		}

		return $job;
	}

	/**
	 * @param RedisConnRef $conn
	 * @return array serialized string or false
	 * @throws RedisException
	 */
	protected function popAndDeleteBlob( RedisConnRef $conn ) {
		static $script =
<<<LUA
		-- Pop an item off the queue
		local id = redis.call('rpop',KEYS[1])
		if not id then return false end
		-- Get the job data and remove it
		local item = redis.call('hGet',KEYS[4],id)
		redis.call('hDel',KEYS[4],id)
		-- Allow new duplicates of this job
		local sha1 = redis.call('hGet',KEYS[2],id)
		if sha1 then redis.call('hDel',KEYS[3],sha1) end
		redis.call('hDel',KEYS[2],id)
		-- Return the job data
		return item
LUA;
		return $this->redisEval( $conn, $script,
			array(
				$this->getQueueKey( 'l-unclaimed' ), # KEYS[1]
				$this->getQueueKey( 'h-sha1ById' ), # KEYS[2]
				$this->getQueueKey( 'h-idBySha1' ), # KEYS[3]
				$this->getQueueKey( 'h-data' ), # KEYS[4]
			),
			4 # number of first argument(s) that are keys
		);
	}

	/**
	 * @param RedisConnRef $conn
	 * @return array serialized string or false
	 * @throws RedisException
	 */
	protected function popAndAcquireBlob( RedisConnRef $conn ) {
		static $script =
<<<LUA
		-- Pop an item off the queue
		local id = redis.call('rPop',KEYS[1])
		if not id then return false end
		-- Allow new duplicates of this job
		local sha1 = redis.call('hGet',KEYS[2],id)
		if sha1 then redis.call('hDel',KEYS[3],sha1) end
		redis.call('hDel',KEYS[2],id)
		-- Mark the jobs as claimed and return it
		redis.call('zAdd',KEYS[4],ARGV[1],id)
		redis.call('hIncrBy',KEYS[5],id,1)
		return redis.call('hGet',KEYS[6],id)
LUA;
		return $this->redisEval( $conn, $script,
			array(
				$this->getQueueKey( 'l-unclaimed' ), # KEYS[1]
				$this->getQueueKey( 'h-sha1ById' ), # KEYS[2]
				$this->getQueueKey( 'h-idBySha1' ), # KEYS[3]
				$this->getQueueKey( 'z-claimed' ), # KEYS[4]
				$this->getQueueKey( 'h-attempts' ), # KEYS[5]
				$this->getQueueKey( 'h-data' ), # KEYS[6]
				time(), # ARGV[1] (injected to be replication-safe)
			),
			6 # number of first argument(s) that are keys
		);
	}

	/**
	 * @see JobQueue::doAck()
	 * @param Job $job
	 * @return Job|bool
	 * @throws MWException
	 */
	protected function doAck( Job $job ) {
		if ( $this->claimTTL > 0 ) {
			$conn = $this->getConnection();
			try {
				// Get the exact field map this Job came from, regardless of whether
				// the job was transformed into a DuplicateJob or anything of the sort.
				$item = $job->metadata['sourceFields'];

				static $script =
<<<LUA
				-- Unmark the job as claimed
				redis.call('zRem',KEYS[1],ARGV[1])
				redis.call('hDel',KEYS[2],ARGV[1])
				-- Delete the job data itself
				return redis.call('hDel',KEYS[3],ARGV[1])
LUA;
				$res = $this->redisEval( $conn, $script,
					array(
						$this->getQueueKey( 'z-claimed' ), # KEYS[1]
						$this->getQueueKey( 'h-attempts' ), # KEYS[2]
						$this->getQueueKey( 'h-data' ), # KEYS[3]
						$item['uuid'] # ARGV[1]
					),
					3 # number of first argument(s) that are keys
				);

				if ( !$res ) {
					wfDebugLog( 'JobQueueRedis', "Could not acknowledge {$this->type} job." );
					return false;
				}
			} catch ( RedisException $e ) {
				$this->throwRedisException( $this->server, $conn, $e );
			}
		}
		return true;
	}

	/**
	 * @see JobQueue::doDeduplicateRootJob()
	 * @param Job $job
	 * @return bool
	 * @throws MWException
	 */
	protected function doDeduplicateRootJob( Job $job ) {
		$params = $job->getParams();
		if ( !isset( $params['rootJobSignature'] ) ) {
			throw new MWException( "Cannot register root job; missing 'rootJobSignature'." );
		} elseif ( !isset( $params['rootJobTimestamp'] ) ) {
			throw new MWException( "Cannot register root job; missing 'rootJobTimestamp'." );
		}
		$key = $this->getRootJobCacheKey( $params['rootJobSignature'] );

		$conn = $this->getConnection();
		try {
			$timestamp = $conn->get( $key ); // current last timestamp of this job
			if ( $timestamp && $timestamp >= $params['rootJobTimestamp'] ) {
				return true; // a newer version of this root job was enqueued
			}
			// Update the timestamp of the last root job started at the location...
			return $conn->set( $key, $params['rootJobTimestamp'], self::ROOTJOB_TTL ); // 2 weeks
		} catch ( RedisException $e ) {
			$this->throwRedisException( $this->server, $conn, $e );
		}
	}

	/**
	 * @see JobQueue::doIsRootJobOldDuplicate()
	 * @param Job $job
	 * @return bool
	 */
	protected function doIsRootJobOldDuplicate( Job $job ) {
		$params = $job->getParams();
		if ( !isset( $params['rootJobSignature'] ) ) {
			return false; // job has no de-deplication info
		} elseif ( !isset( $params['rootJobTimestamp'] ) ) {
			wfDebugLog( 'JobQueueRedis', "Cannot check root job; missing 'rootJobTimestamp'." );
			return false;
		}

		$conn = $this->getConnection();
		try {
			// Get the last time this root job was enqueued
			$timestamp = $conn->get( $this->getRootJobCacheKey( $params['rootJobSignature'] ) );
		} catch ( RedisException $e ) {
			$this->throwRedisException( $this->server, $conn, $e );
		}

		// Check if a new root job was started at the location after this one's...
		return ( $timestamp && $timestamp > $params['rootJobTimestamp'] );
	}

	/**
	 * @see JobQueue::getAllQueuedJobs()
	 * @return Iterator
	 */
	public function getAllQueuedJobs() {
		$conn = $this->getConnection();
		if ( !$conn ) {
			throw new MWException( "Unable to connect to redis server." );
		}
		try {
			$that = $this;
			return new MappedIterator(
				$conn->lRange( $this->getQueueKey( 'l-unclaimed' ), 0, -1 ),
				function( $uid ) use ( $that, $conn ) {
					return $that->getJobFromUidInternal( $uid, $conn );
				}
			);
		} catch ( RedisException $e ) {
			$this->throwRedisException( $this->server, $conn, $e );
		}
	}

	/**
	 * @see JobQueue::getAllQueuedJobs()
	 * @return Iterator
	 */
	public function getAllDelayedJobs() {
		$conn = $this->getConnection();
		if ( !$conn ) {
			throw new MWException( "Unable to connect to redis server." );
		}
		try {
			$that = $this;
			return new MappedIterator( // delayed jobs
				$conn->zRange( $this->getQueueKey( 'z-delayed' ), 0, -1 ),
				function( $uid ) use ( $that, $conn ) {
					return $that->getJobFromUidInternal( $uid, $conn );
				}
			);
		} catch ( RedisException $e ) {
			$this->throwRedisException( $this->server, $conn, $e );
		}
	}

	/**
	 * This function should not be called outside JobQueueRedis
	 *
	 * @param $uid string
	 * @param $conn RedisConnRef
	 * @return Job
	 * @throws MWException
	 */
	public function getJobFromUidInternal( $uid, RedisConnRef $conn ) {
		try {
			$item = unserialize( $conn->hGet( $this->getQueueKey( 'h-data' ), $uid ) );
			if ( !is_array( $item ) ) { // this shouldn't happen
				throw new MWException( "Could not find job with ID '$uid'." );
			}
			$title = Title::makeTitle( $item['namespace'], $item['title'] );
			$job = Job::factory( $item['type'], $title, $item['params'] );
			$job->metadata['sourceFields'] = $item;
			return $job;
		} catch ( RedisException $e ) {
			$this->throwRedisException( $this->server, $conn, $e );
		}
	}

	/**
	 * Release any ready delayed jobs into the queue
	 *
	 * @return integer Number of jobs released
	 * @throws MWException
	 */
	public function releaseReadyDelayedJobs() {
		$count = 0;

		$conn = $this->getConnection();
		try {
			static $script =
<<<LUA
			-- Get the list of ready delayed jobs, sorted by readiness
			local ids = redis.call('zRangeByScore',KEYS[1],0,ARGV[1])
			-- Migrate the jobs from the "delayed" set to the "unclaimed" list
			for k,id in ipairs(ids) do
				redis.call('lPush',KEYS[2],id)
				redis.call('zRem',KEYS[1],id)
			end
			return #ids
LUA;
			$count += (int)$this->redisEval( $conn, $script,
				array(
					$this->getQueueKey( 'z-delayed' ), // KEYS[1]
					$this->getQueueKey( 'l-unclaimed' ), // KEYS[2]
					time() // ARGV[1]; max "delay until" UNIX timestamp
				),
				2 # first two arguments are keys
			);
		} catch ( RedisException $e ) {
			$this->throwRedisException( $this->server, $conn, $e );
		}

		return $count;
	}

	/**
	 * Recycle or destroy any jobs that have been claimed for too long
	 *
	 * @return integer Number of jobs recycled/deleted
	 * @throws MWException
	 */
	public function recycleAndDeleteStaleJobs() {
		if ( $this->claimTTL <= 0 ) { // sanity
			throw new MWException( "Cannot recycle jobs since acknowledgements are disabled." );
		}
		$count = 0;
		// For each job item that can be retried, we need to add it back to the
		// main queue and remove it from the list of currenty claimed job items.
		// For those that cannot, they are marked as dead and kept around for
		// investigation and manual job restoration but are eventually deleted.
		$conn = $this->getConnection();
		try {
			$now = time();
			static $script =
<<<LUA
			local released,abandoned,pruned = 0,0,0
			-- Get all non-dead jobs that have an expired claim on them.
			-- The score for each item is the last claim timestamp (UNIX).
			local staleClaims = redis.call('zRangeByScore',KEYS[1],0,ARGV[1])
			for k,id in ipairs(staleClaims) do
				local timestamp = redis.call('zScore',KEYS[1],id)
				local attempts = redis.call('hGet',KEYS[2],id)
				if attempts < ARGV[3] then
					-- Claim expired and retries left: re-enqueue the job
					redis.call('lPush',KEYS[3],id)
					redis.call('hIncrBy',KEYS[2],id,1)
					released = released + 1
				else
					-- Claim expired and no retries left: mark the job as dead
					redis.call('zAdd',KEYS[5],timestamp,id)
					abandoned = abandoned + 1
				end
				redis.call('zRem',KEYS[1],id)
			end
			-- Get all of the dead jobs that have been marked as dead for too long.
			-- The score for each item is the last claim timestamp (UNIX).
			local deadClaims = redis.call('zRangeByScore',KEYS[5],0,ARGV[2])
			for k,id in ipairs(deadClaims) do
				-- Stale and out of retries: remove any traces of the job
				redis.call('zRem',KEYS[5],id)
				redis.call('hDel',KEYS[2],id)
				redis.call('hDel',KEYS[4],id)
				pruned = pruned + 1
			end
			return {released,abandoned,pruned}
LUA;
			$res = $this->redisEval( $conn, $script,
				array(
					$this->getQueueKey( 'z-claimed' ), # KEYS[1]
					$this->getQueueKey( 'h-attempts' ), # KEYS[2]
					$this->getQueueKey( 'l-unclaimed' ), # KEYS[3]
					$this->getQueueKey( 'h-data' ), # KEYS[4]
					$this->getQueueKey( 'z-abandoned' ), # KEYS[5]
					$now - $this->claimTTL, # ARGV[1]
					$now - self::MAX_AGE_PRUNE, # ARGV[2]
					$this->maxTries # ARGV[3]
				),
				5 # number of first argument(s) that are keys
			);
			if ( $res ) {
				list( $released, $abandoned, $pruned ) = $res;
				$count += $released + $pruned;
				wfIncrStats( 'job-recycle', count( $released ) );
			}
		} catch ( RedisException $e ) {
			$this->throwRedisException( $this->server, $conn, $e );
		}

		return $count;
	}

	/**
	 * @return Array
	 */
	protected function doGetPeriodicTasks() {
		$tasks = array();
		if ( $this->claimTTL > 0 ) {
			$tasks['recycleAndDeleteStaleJobs'] = array(
				'callback' => array( $this, 'recycleAndDeleteStaleJobs' ),
				'period'   => ceil( $this->claimTTL / 2 )
			);
		}
		if ( $this->checkDelay ) {
			$tasks['releaseReadyDelayedJobs'] = array(
				'callback' => array( $this, 'releaseReadyDelayedJobs' ),
				'period'   => 300 // 5 minutes
			);
		}
		return $tasks;
	}

	/**
	 * @param RedisConnRef $conn
	 * @param string $script
	 * @param array $params
	 * @param integer $numKeys
	 * @return mixed
	 */
	protected function redisEval( RedisConnRef $conn, $script, array $params, $numKeys ) {
		$sha1 = sha1( $script ); // 40 char hex

		// Try to run the server-side cached copy of the script
		$conn->clearLastError();
		$res = $conn->evalSha( $sha1, $params, $numKeys );
		// If the script is not in cache, use eval() to retry and cache it
		if ( $conn->getLastError() && $conn->script( 'exists', $sha1 ) === array( 0 ) ) {
			$conn->clearLastError();
			$res = $conn->eval( $script, $params, $numKeys );
			wfDebugLog( 'JobQueueRedis', "Used eval() for Lua script $sha1." );
		}

		if ( $conn->getLastError() ) { // script bug?
			wfDebugLog( 'JobQueueRedis', "Lua script error: " . $conn->getLastError() );
		}

		return $res;
	}

	/**
	 * @param $job Job
	 * @return array
	 */
	protected function getNewJobFields( Job $job ) {
		return array(
			// Fields that describe the nature of the job
			'type'       => $job->getType(),
			'namespace'  => $job->getTitle()->getNamespace(),
			'title'      => $job->getTitle()->getDBkey(),
			'params'     => $job->getParams(),
			// Some jobs cannot run until a "release timestamp"
			'rtimestamp' => $job->getReleaseTimestamp() ?: 0,
			// Additional job metadata
			'uuid'       => UIDGenerator::newRawUUIDv4( UIDGenerator::QUICK_RAND ),
			'sha1'       => $job->ignoreDuplicates()
				? wfBaseConvert( sha1( serialize( $job->getDeduplicationInfo() ) ), 16, 36, 31 )
				: '',
			'timestamp'  => time() // UNIX timestamp
		);
	}

	/**
	 * @param $fields array
	 * @return Job|bool
	 */
	protected function getJobFromFields( array $fields ) {
		$title = Title::makeTitleSafe( $fields['namespace'], $fields['title'] );
		if ( $title ) {
			$job = Job::factory( $fields['type'], $title, $fields['params'] );
			$job->metadata['sourceFields'] = $fields;
			return $job;
		}
		return false;
	}

	/**
	 * Get a connection to the server that handles all sub-queues for this queue
	 *
	 * @return Array (server name, Redis instance)
	 * @throws MWException
	 */
	protected function getConnection() {
		$conn = $this->redisPool->getConnection( $this->server );
		if ( !$conn ) {
			throw new MWException( "Unable to connect to redis server." );
		}
		return $conn;
	}

	/**
	 * @param $server string
	 * @param $conn RedisConnRef
	 * @param $e RedisException
	 * @throws MWException
	 */
	protected function throwRedisException( $server, RedisConnRef $conn, $e ) {
		$this->redisPool->handleException( $server, $conn, $e );
		throw new MWException( "Redis server error: {$e->getMessage()}\n" );
	}

	/**
	 * @param $prop string
	 * @return string
	 */
	private function getQueueKey( $prop ) {
		list( $db, $prefix ) = wfSplitWikiID( $this->wiki );
		if ( strlen( $this->key ) ) { // namespaced queue (for testing)
			return wfForeignMemcKey( $db, $prefix, 'jobqueue', $this->type, $this->key, $prop );
		} else {
			return wfForeignMemcKey( $db, $prefix, 'jobqueue', $this->type, $prop );
		}
	}

	/**
	 * @param $key string
	 * @return void
	 */
	public function setTestingPrefix( $key ) {
		$this->key = $key;
	}
}
