<?php
/** Divehi (ދިވެހިބަސް)
 *
 * See MessagesQqq.php for message documentation incl. usage of parameters
 * To improve a translation please visit http://translatewiki.net
 *
 * @ingroup Language
 * @file
 *
 * @author Deviathan (on dv.wikipedia.org)
 * @author Glacious
 * @author MF-Warburg
 * @author Ushau97
 * @author Zhatre
 * @author לערי ריינהארט
 */

$rtl = true;

$namespaceNames = array(
	NS_MEDIA            => 'މީޑިއާ',
	NS_SPECIAL          => 'ހާއްޞަ',
	NS_MAIN             => '',
	NS_TALK             => 'ޚިޔާލު',
	NS_USER             => 'މެމްބަރު',
	NS_USER_TALK        => 'މެމްބަރުގެ_ވާހަކަ',
	NS_FILE             => 'ފައިލް',
	NS_FILE_TALK        => 'ފައިލް_ޚިޔާލު',
	NS_MEDIAWIKI        => 'މީޑިއާވިކީ',
	NS_MEDIAWIKI_TALK   => 'މީޑިޔާވިކި_ޚިޔާލު',
	NS_TEMPLATE         => 'ފަންވަތް',
	NS_TEMPLATE_TALK    => 'ފަންވަތް_ޚިޔާލު',
	NS_HELP             => 'އެހީ',
	NS_HELP_TALK        => 'އެހީ_ޚިޔާލު',
	NS_CATEGORY         => 'ޤިސްމު',
	NS_CATEGORY_TALK    => 'ޤިސްމު_ޚިޔާލު',
);

$specialPageAliases = array(
	'Allpages'                  => array( 'ހުރިހާ ސަފްޙާއެއް' ),
	'Contributions'             => array( 'ޙިއްސާ' ),
	'CreateAccount'             => array( 'މެމްބަރުކަން ހާސިލްކުރައްވާ' ),
	'Emailuser'                 => array( 'މެމްބަރަށް އީ-މެއިލް ފޮނުވާ' ),
	'BlockList'                 => array( 'ބްލޮކް ކުރެވިފައިވާ ލިސްޓް' ),
	'Listfiles'                 => array( 'ފައިލް ލިސްޓް' ),
	'Longpages'                 => array( 'ދިގު ސަފްޙާތައް' ),
	'Newimages'                 => array( 'އާ ފައިލް' ),
	'Newpages'                  => array( 'އާ ސަފްހާތައް' ),
	'Preferences'               => array( 'ތަރުޖީހުތައް' ),
	'Protectedpages'            => array( 'ދިފާޢުކުރެވިފައިވާ ސަފްޙާތައް' ),
	'Randompage'                => array( 'ކޮންމެވެސް ސަފްޙާއެއް' ),
	'Recentchanges'             => array( 'އެންމެ ފަހުގެ ބަދަލްތައް' ),
	'Shortpages'                => array( 'ކުރު ސަފްޙާތައް' ),
	'Specialpages'              => array( 'ޙާއްސަ ސަފްޙާތައް' ),
	'Uncategorizedtemplates'    => array( 'ޤިސްމުކުރެވިފައި ނުވާ ފަންވަތް' ),
	'Unusedcategories'          => array( 'ބޭނުން ނުކުރާ ޤިސްމުތައް' ),
	'Unusedimages'              => array( 'ބޭނުން ނުކުރާ ފައިލް' ),
	'Upload'                    => array( 'ފޮނުއްވާ' ),
	'Userlogin'                 => array( 'ވަދެވަޑައިގަންނަވާ' ),
	'Userlogout'                => array( 'ބޭރަށް ވަޑައިގަންނަވާ' ),
);

$messages = array(
# User preference toggles
'tog-hideminor' => 'ކުދި އުނި އިތުރުތައް އެންމެފަހުގެ ބަދަލުތަކުގެ ލިސްޓުން ފޮރުއްވަވާ',
'tog-watchlisthideown' => 'މަގޭ ނަޒަރުން މަގޭ ހިއްސާ ފޮރުއްވާ',
'tog-watchlisthidebots' => 'މަގޭ ނަޒަރުން ބޮޓުންގެ ހިއްސާ ފޮރުއްވާ',
'tog-watchlisthideminor' => 'މަގޭ ނަޒަރުން ކުދި އުނިއިތުރުތައް ފޮރުއްވާ',
'tog-watchlisthideliu' => 'މަގޭ ނަޒަރުން ވަދެފައިވާ މެމްބަރުންގެ އުނިއުތުރުތައް ފޮރުއްވާ',
'tog-ccmeonemails' => 'އަޅުގަނޑު އެހެން މެމްބަރުންނަށް ފޮނުވާ އީމެއިލްގެ ނަކަލެއް އަޅުގަނޑަށް ފޮނުވާ',
'tog-showhiddencats' => 'ފޮރުވިފައިވާ ޤިސްމުތައް ދައްކަވާ',

'underline-always' => 'އަބަދުވެސް',
'underline-never' => 'ހަމަހިލާ ނޫން',

# Font style option in Special:Preferences
'editfont-monospace' => 'މޮނޯސްޕޭސްޑް ފޮންޓް',
'editfont-sansserif' => 'ސޭންސް-ސެރިފް ފޮންޓް',
'editfont-serif' => 'ސެރިފް ފޮންޓް',

# Dates
'sunday' => 'އާދީއްތަ',
'monday' => 'ހޯމަ',
'tuesday' => 'އަންގާރަ',
'wednesday' => 'ބުދަ',
'thursday' => 'ބުރާސްފަތި',
'friday' => 'ހުކުރު',
'saturday' => 'ހޮނިހިރު',
'sun' => 'އާދީއްތަ',
'mon' => 'ހޯމަ',
'tue' => 'އަންގާރަ',
'wed' => 'ބުދަ',
'thu' => 'ބުރާސްފަތި',
'fri' => 'ހުކުރު',
'sat' => 'ހޮނިހިރު',
'january' => 'ޖަނަވަރީ',
'february' => 'ފެބްރުއަރީ',
'march' => 'މާރޗް',
'april' => 'އޭޕްރީލް',
'may_long' => 'މެއި',
'june' => 'ޖޫން',
'july' => 'ޖުލައި',
'august' => 'އޯގަސްޓް',
'september' => 'ސެޕްޓެމްބަރު',
'october' => 'އޮކްޓޯބަރު',
'november' => 'ނޮވެމްބަރު',
'december' => 'ޑިސެމްބަރު',
'january-gen' => 'ޖަނަވަރީ',
'february-gen' => 'ފެބްރުއަރީ',
'march-gen' => 'މާޗް',
'april-gen' => 'އޭޕްރިލް',
'may-gen' => 'މޭއި',
'june-gen' => 'ޖޫން',
'july-gen' => 'ޖުލައި',
'august-gen' => 'އޯގަސްޓް',
'september-gen' => 'ސެޕްޓެމްބަރ',
'october-gen' => 'އޮކްޓޯބަރ',
'november-gen' => 'ނޮވެމްބަރ',
'december-gen' => 'ޑިސެމްބަރ',
'jan' => 'ޖަނަވަރީ',
'feb' => 'ފެބްރުއަރީ',
'mar' => 'މާޗް',
'apr' => 'އޭޕްރިލް',
'may' => 'މެއި',
'jun' => 'ޖޫން',
'jul' => 'ޖުލައި',
'aug' => 'އޯގަސްޓް',
'sep' => 'ސެޕްޓެމްބަރ',
'oct' => 'އޮކްޓޯބަރ',
'nov' => 'ނޮވެމްބަރ',
'dec' => 'ޑިސެމްބަރ',

# Categories related messages
'pagecategories' => '{{PLURAL:$1|ޤިސްމު|ޤިސްމުތައް}}',
'category_header' => 'ގިސްމު "$1" ގައިވާ މަޒުމޫނުތައް',
'subcategories' => 'ކުދިގިސްމުތައް',
'category-media-header' => '"$1" ޤިސްމުގައިވާ މީޑިއާ',
'category-empty' => "''މި ޤިސްމުގައި އެއްވެސް ސަފްހާ އެއް އަދި އެއްވެސް ފައިލެއް ނުހިމެނެއެވެ.''",
'hidden-categories' => '{{PLURAL:$1|ފޮރުވިފައިވާ ޤިސްމު|ފޮރުވިފައިވާ ޤިސްމުތައް}}',
'hidden-category-category' => 'ފޮރުވިފައިވާ ޤިސްމުތައް',
'category-subcat-count-limited' => 'މި ޤިސްމުގައި ހިމެނެނީ {{PLURAL:$1|ކުދިޤިސްމެވެ|$1 ކުދިޤިސްމުތަކެވެ}}.',

'about' => 'ތަޢާރަފު',
'article' => 'ފިހުރިސްތު ޞަފްޙާ',
'newwindow' => '(އާ ވިންޑޯ އެއް ހުޅުވޭނެއެވެ)',
'cancel' => 'މަންސޫހު',
'moredotdotdot' => 'އިތުރަށް...',
'mypage' => 'މަޒުމޫނު',
'mytalk' => 'ޚިޔާލު ޞަފްޙާ',
'anontalk' => 'މި އައި.ޕީ އެޑްރެސްގެ ވާހަކަ',
'navigation' => 'ސަމުގާ',
'and' => '&#32;އަދި',

# Cologne Blue skin
'qbfind' => 'ހޯއްދަވާ',
'qbedit' => 'އުނިއިތުރުގެންނަވާ',
'qbpageoptions' => 'މި ޞަފްޙާ',
'qbmyoptions' => 'މަގޭ ސަފްހާ ތައް',
'qbspecialpages' => 'ޚާއްޞަ ޞަފްޙާތައް',
'faq' => 'އެފް.އޭ.ކިއު',
'faqpage' => 'Project:އެފް.އޭ.ކިއު',

# Vector skin
'vector-action-addsection' => 'ޚިޔާލެއް އިތުރުކުރައްވާ',
'vector-action-delete' => 'ފޮހެލައްވާ',
'vector-action-move' => 'ތަން ބަދަލުކުރައްވާ',
'vector-action-protect' => 'ދިފާޢުކުރައްވާ',
'vector-action-unprotect' => 'ދިފާޢުކުރުން ބަދަލުކުރައްވާ',
'vector-view-create' => 'ފަށްޓަވާ',
'vector-view-edit' => 'އުނިއިތުރު ގެންނަވާ',
'vector-view-history' => 'ޞަފްޙާގެ ތާރީޚް',
'vector-view-view' => 'ކިޔުއްވާ',
'vector-view-viewsource' => 'މަސްދަރު ބައްލަވާ',
'actions' => 'ޢަމަލުތައް',
'namespaces' => 'ނަންސްޕޭސަސް',

'errorpagetitle' => 'ކުށް',
'returnto' => 'އަނބުރާ $1 އަށް ވަޑައިގަންނަވާ!',
'tagline' => 'ވިކިޕީޑިއާ އިން',
'help' => 'އެހީ',
'search' => 'ހޯއްދަވާ',
'searchbutton' => 'ހޯއްދަވާ',
'go' => 'ދުރުވޭ',
'searcharticle' => 'ދުރުވޭ',
'history' => 'ޞަފްޙާގެ ތާރީހު',
'history_short' => 'ތާރީހު',
'printableversion' => 'ޗާޕަށްފަހި ނުސްހާ',
'permalink' => 'ދާއިމީ ފާލަން',
'print' => 'ޗާޕުކުރައްވާ',
'view' => 'ބައްލަވާ',
'edit' => 'އުނިއިތުރު ގެންނަވާ',
'create' => 'ފަށްޓަވާ',
'editthispage' => 'މި ޞަފްޙާއަށް އުނިއިތުރު ގެންނަވާ',
'create-this-page' => 'މި ޞަފްޙާ ފަށްޓަވާ',
'delete' => 'ފޮހެލައްވާ',
'deletethispage' => 'މި ޞަފްޙާ ފޮހެލައްވާ',
'viewdeleted_short' => '{{PLURAL:$1|ފޮހެލެވިފައިވާ އެއް އުނިއިތުރު|ފޮހެލެވިފައިވާ $1 އުނިއިތުރު}} ބައްލަވާ',
'protect' => 'ދިފާއުކުރައްވާ',
'protect_change' => 'ބަދަލު ގެންނަވާ',
'protectthispage' => 'މި ޞަފްޙާ ދިފާއުކުރައްވާ',
'unprotect' => 'ދިފާޢުކުރުން ބަދަލުކުރައްވާ',
'unprotectthispage' => 'މި ޞަފްޙާގެ ދިފާއުކުރުން ބަދަލުކުރައްވާ',
'newpage' => 'އާ ސަފްޙާ',
'talkpage' => 'މި ސަފްޙާއާ މެދު ބަހުސްކުރައްވާ',
'talkpagelinktext' => 'ޚިޔާލު ސަފްޙާ',
'specialpage' => 'ހާއްސަ ޞަފްޙާ',
'personaltools' => 'އަމިއްލަ',
'postcomment' => 'އާ ބައެއް',
'articlepage' => 'ފިހުރިސްތު ޞަފްޙާ ބައްލަވާ',
'talk' => 'ބަހުސް',
'views' => 'ހިޔާލުފުޅުތައް',
'toolbox' => 'އަތްމަތީފޮށި',
'userpage' => 'މެންބަރުގެ ޞަފްޙާ ބައްލަވާ',
'projectpage' => 'މަޝްރޫޢު ޞަފްޙާ ބައްލަވާ',
'imagepage' => 'ފައިލު ޞަފްޙާ ބައްލަވާ',
'mediawikipage' => 'މެސެޖު ޞަފްޙާ ބައްލަވާ',
'templatepage' => 'ފަންވަތް: ޞަފްޙާ ބައްލަވާ',
'viewhelppage' => 'އެހީ ޞަފްޙާ ބައްލަވާ',
'categorypage' => 'ޤިސްމު ޞަފްޙާ ބައްލަވާ',
'viewtalkpage' => 'ބަހުސް ބައްލަވާ',
'otherlanguages' => 'އެހެނިހެން ބަސްބަހުން',
'redirectedfrom' => '(މިސްރާބުކުރެވުނީ $1 އިން)',
'redirectpagesub' => 'ޞަފްޙާގެ މިސްރާބު އައުކުރައްވާ',
'lastmodifiedat' => 'މި ޞަފްހާ އަށް އެންމެ ފަހުން ބަދަލެއް ގެނެވިފައިވަނީ $1، $2 ގައެވެ.',
'viewcount' => 'މި ޞަފްޙާ ވަނީ {{PLURAL:$1|އެއްފަހަރު|$1 ފަހަރު}} ބައްލަވާފައެވެ.',
'protectedpage' => 'ދިފާއުކުރެވިފައިވާ ޞަފްޙާ',
'jumpto' => 'ފުންމަވާ:',
'jumptonavigation' => 'ސަމުގާ',
'jumptosearch' => 'ހޯއްދަވާ',
'view-pool-error' => 'މަޢާފުކުރައްވާ، މި ވަގުތު ސާރވާރތައް ވަނީ އޯވާލޯޑް ވެފައެވެ.
މި ޞަފްޙާއަށް ވަޑައިގަތުމުގެ ކުރިން މަޑުކޮށްލައްވާ!
$1',
'pool-errorunknown' => 'ކޮންމެވެސް ކުށެއް',

# All link text and link target definitions of links into project namespace that get used by other message strings, with the exception of user group pages (see grouppage) and the disambiguation template definition (see disambiguations).
'aboutsite' => '{{SITENAME}}ގެ ތަޢާރަފު',
'aboutpage' => 'Project:ތަޢާރަފު',
'copyright' => 'ހުރިހާ މާއްދާއެއް $1 ގެ ދަށުން ލިބެން އެބަހުއްޓެވެ.',
'copyrightpage' => '{{ns:project}}:ނަކަލުކުރުމުގެހައްގު',
'currentevents' => 'ހިނގަމުންދާ ހާދިސާތައް',
'currentevents-url' => 'Project:ހިނގަމުންދާ ހާދިސާތައް',
'disclaimers' => 'އިއުލާނުތައް',
'disclaimerpage' => 'Project:ޢާއްމު ޢިއުލާނުތައް',
'edithelp' => 'ބަދަލުތައް ގެނައުމަށް އެހީ އެއް',
'edithelppage' => 'އެހީ: އުނިއިތުރު ގެންނެވުން',
'helppage' => 'Help:ފިހުރިސްތު',
'mainpage' => 'މައި ޞަފްޙާ',
'mainpage-description' => 'މައި ޞަފްޙާ',
'policy-url' => 'Project:ސިޔާސަތު',
'portal' => 'އާންމު ހޮޅުއަށި',
'portal-url' => 'Project:ޢާންމު ހޮޅުއަށި',
'privacy' => 'އަމިއްލަވަންތަ ސިޔާސަތު',
'privacypage' => 'Project: އަމިއްލަވަންތަ ސިޔާސަތު',

'badaccess' => 'ހުއްދައިގެ ކުށެއް',

'ok' => 'ރަނގަޅު',
'retrievedfrom' => '$1 އިން',
'youhavenewmessages' => 'ތިޔަބޭފުޅާއަށް $1 ($2)',
'newmessageslink' => 'އައު މެސެޖުތައް',
'newmessagesdifflink' => 'އެންމެ ފަހުގެ ބަދަލު',
'youhavenewmessagesfromusers' => 'ތިބޭފުޅާއަށް {{PLURAL:$3|މެމްބަރެއް|$3 މެމްބަރުން}} $1 ފޮނުއްވާފައިވެއެވެ. ($2)',
'youhavenewmessagesmanyusers' => 'ތިބޭފުޅާއަށް ގިނަ މެމްބަރުން $1 ފޮނުއްވާފައިވެއެވެ. ($2)',
'newmessageslinkplural' => '{{PLURAL:$1|އާ މެސެޖެއް|މެސެޖުތައް}}',
'newmessagesdifflinkplural' => 'ފަހު {{PLURAL:$1|ބަދަލު|ބަދަލުތައް}}',
'editsection' => 'އުނިއިތުރު ގެންނަވާ',
'editold' => 'އުނިއިތުރު ގެންނަވާ',
'viewsourceold' => 'މަސްދަރު ބައްލަވާ',
'editlink' => 'އުނިއިތުރު ގެންނަވާ',
'viewsourcelink' => 'މަސްދަރު ބައްލަވާ',
'editsectionhint' => 'މަޒްމޫނުގެ $1 ބަޔަށް އުނިއިތުރު ގެންނަނީ',
'toc' => 'ފިހުރިސްތު',
'showtoc' => 'ދައްކަވާ',
'hidetoc' => 'ފޮރުއްވާ',
'collapsible-collapse' => 'ފޮރުއްވާ',
'collapsible-expand' => 'ދައްކަވާ',
'red-link-title' => '$1 (މިއީ ހުސް ޞަފްޙާއެކެވެ)',

# Short words for each namespace, by default used in the namespace tab in monobook
'nstab-main' => 'މަޒުމޫނު',
'nstab-user' => 'މެންބަރު ޞަފްޙާ',
'nstab-media' => 'މީޑިއާ ޞަފްޙާ',
'nstab-special' => 'ޚާއްސަ ޞަފްޙާ',
'nstab-project' => 'މަޝްރޫޢު ޞަފްޙާ',
'nstab-image' => 'ފައިލު',
'nstab-mediawiki' => 'މެސެޖު',
'nstab-template' => 'ފަންވަތް',
'nstab-help' => 'އެހީ ޞަފްޙާ',
'nstab-category' => 'ގިސްމު',

# Main script and global functions
'nosuchspecialpage' => 'ތިކަހަލަ ޚާއްސަ ޞަފްޙާއެއް ނުވޭ',

# General errors
'error' => 'ކުށް',
'databaseerror' => 'ކޮށާރުގެ އޮޅުމެއް',
'laggedslavemode' => "'''ސަމާލުކަމަށް:''' މި ޞަފްޙާ އަކީ ފަހުގެ ޞަފްޙާ އަކަށް ނުވުން އެކަށީގެންވެއެވެ.",
'internalerror_info' => 'އެތެރޭގެ ކުށެއް: $1',
'cannotdelete' => 'ޞަފްޙާ ނުވަތަ ފައިލު ފޮހެއެއް ނުލެވުނު (ފަހަރެއްގައި މީގެ ކުރީން އެހެން ބޭފުޅަކު ފޮހެލެއްވީ ކަމަށް ވެދާނެ)',
'badtitle' => 'ނުރަނގަޅު ސުރުހީއެއް',
'viewsource' => 'މަސްދަރު ބައްލަވާ',
'viewsource-title' => '$1ގެ މަސްދަރު ބައްލަވާ',
'viewsourcetext' => 'މިޞަފްޙާގެ މަސްދަރު ބައްލަވައި ތިބޭފުޅާއަށް ކޮޕީ ކުރެވޭނެއެވެ.',
'namespaceprotected' => "ތިބޭފުޅާއަށް '''$1'''ގައިވާ ޞަފްޙާތަކަށް ބަދަލުގެނައުމުގެ ހުއްދައެއް ނުވޭ!",
'ns-specialprotected' => 'ޚާއްސަ ޞަފްޙާތަކަށް އުނިއިތުރު ނުގެންނެވޭނެއެވެ.',

# Login and logout pages
'logouttext' => "'''ތިބޭފުޅާއަށް ބޭރަށް ވަޑައިގެންނެވިއްޖެ.'''

ތިބޭފުޅާއަށް {{SITENAME}} ބޭނުންކުރެވޭނެއެވެ. ނަމަވެސް އެހެން މެމްބަރެއްގެ ގޮތުގައި <span class='plainlinks'>[$1 ވަދެވަޑައިގަނެވިދާނެއެވެ.]</span> ނުވަތަ ތި މެމްބަރުގެ ގޮތުގައި ވަދެވަޑައިގެންނެވޭނެއެވެ.",
'welcomeuser' => 'މަރުޙަބާ،  $1!',
'yourname' => 'މެންބަރުގެނަން',
'yourpassword' => 'ސިއްރުބަސް',
'yourpasswordagain' => 'ސިއްރުބަސް އަލުންލިޔުއްވާ',
'login' => 'ވަދެވަޑައިގަންނަވާ',
'nav-login-createaccount' => 'ވަންނަވާ / މެންބަރަކަށް ވެވަޑައިގަންނަވާ',
'loginprompt' => '{{SITENAME}}އަށް ވަންނަވަން ކުކީޒް ބޭނުންވާނެއެވެ.',
'userlogin' => 'ވަންނަވާ / މެންބަރަކަށް ވެ ވަޑައިގަންނަވާ',
'userloginnocreate' => 'ވަދެވަޑައިގަންނަވާ',
'logout' => 'ބޭރަށް ވަޑައިގަންނަވާ',
'userlogout' => 'ބޭރަށް ވަޑައިގަންނަވާ',
'nologin' => "މެމްބަރުކަން ހާސިލް ކުރައްވާފައި ނުވޭތޯ؟ '''$1'''",
'nologinlink' => 'މެމްބަރުކަން ހާސިލް ކުރައްވާ!',
'createaccount' => 'މެންބަރަކަށް ވެ ވަޑައިގަންނަވާ',
'gotaccount' => 'މެމްބަރުކަން ހާސިލް ކުރައްވާފައި ނުވޭތޯ؟ $1',
'gotaccountlink' => 'ވަދެވަޑައިގަންނަވާ',
'userlogin-resetlink' => 'ވަދެވަޑައިގަތުމުގެ ސިއްރު ބަހާއި މެމްބަރު ނަން ހަނދާންނެތުނީތޯ؟',
'createaccountreason' => 'ސަބަބު:',
'badretype' => 'ތިޔަ ލިޔުއްވި ދެ ސިއްރުބަސް އެއް ސިއްރު ބަހާއި އަނެއް ސިއްރު ބަހާއި ދިމަލެއް ނުވޭ. އަދި ސިއްރުބަސް ރަނގަޅަށް ޖައްސަވާށެވެ!',
'userexists' => 'ތިޔަ ލިޔުއްވި ނަން މިހާރުވެސް ދަނީ ބޭނުން ކުރެވެމުންނެވެ.
އައު ނަމެއް އިހުތިޔާރު ކުރައްވާށެވެ.',
'loginerror' => 'ވަނުމުގެ ކުށެއް',
'createaccounterror' => 'ތިޔަ އެކައުންޓް ހެދޭގޮތެއް ނުވިއެވެ.: $1',
'loginsuccesstitle' => 'ވަދެވަޑައިގަތުން ކާމިޔާބު',
'loginsuccess' => "'''ތިބޭފުޅާއަށް މިހާރު ވަދެވަޑައިގެން ހުންނެވީ {{SITENAME}}އަށް \"\$1\"ގެ ގޮތުގައެވެ.'''",
'wrongpassword' => 'ތިޔަ ލިޔުއްވި ސިއްރުބަސް އަދި ރަނގަޅެއް ނޫނެވެ! އަދި މަސައްކަތް ކޮށްލައްވާށެވެ!',
'wrongpasswordempty' => 'ތިޔަ ލިޔުއްވި ސިއްރުބަހެއް ނޭނގުނު. އަލުން މަސައްކަތް ކޮށްލައްވާ!',
'mailmypassword' => 'ސިއްރުބަސް އީމޭލުކުރައްވާ',
'acct_creation_throttle_hit' => 'މި ވިކީ އަށް ތިބޭފުޅާގެ އައިޕީ އެޑްރެސް އިން ފާއިތުވެދިޔަ 24 ގަޑިއިރު ތެރޭ {{PLURAL:$1|1 އެކައުންޓް|$1 އެކައުންޓްތައް}} ހައްދަވާފައިވެއެވެ. އެއީ މި މުއްދަތު ތެރޭގައި ހެއްދެވޭނެ އެންމެ ގިނަ ޢަދަދެވެ.
އެހެންކަމުން މި ވަގުތު އިތުރު އެކައުންޓެއް ނުހެއްދެވޭނެއެވެ. އެހެން ވަގުތެއްގައި އަދި މަސައްކަތް ކޮށްލައްވާށެވެ.',
'accountcreated' => 'އެކައުންޓް ހެދިއްޖެއެވެ.',
'loginlanguagelabel' => 'ބަސް: $1',

# Change password dialog
'resetpass' => 'ސިއްރުބަސް ބަދަލުކުރައްވާ',
'resetpass_header' => 'އެކައުންޓްގެ ސިއްރުބަސް ބަދަލުކުރައްވާ',
'oldpassword' => 'ކުރީގެ ސިއްރުބަސް:',
'newpassword' => 'އައު ސިއްރުބަސް:',
'retypenew' => 'އައު ސިއްރުބަސް އަލުންލިޔުއްވާ:',
'resetpass_submit' => 'ސިއްރުބަސް ހަމަޖައްސަވާފައި ވަދެވަޑައިގަންނަވާ',
'resetpass_success' => 'ތިބެފުޅާގެ ސިއްރުބަސް ބަދަލުކުރެވިއްޖެ. 
މިހާރު ވަދެވަޑައިގަންނަވަނީ...',
'resetpass_forbidden' => 'ސިއްރުބަސް ބަދަލެއް ނުކުރެވޭނެއެވެ',
'resetpass-submit-loggedin' => 'ސިއްރުބަސް ބަދަލުކުރައްވާ',
'resetpass-submit-cancel' => 'މަންސޫޚް',

# Special:PasswordReset
'passwordreset' => 'ސިއްރުބަސް އައު ކުރައްވާ',
'passwordreset-legend' => 'ސިއްރުބަސް އައު ކުރައްވާ',
'passwordreset-email' => 'އީމެއިލް އެޑްރެސް:',

# Special:ChangeEmail
'changeemail' => 'އީމެއިލް އެޑްރެސް ބަދަލުކުރައްވާ',
'changeemail-header' => 'އެކައުންޓްގެ އީމެއިލް އެޑްރެސް ބަދަލުކުރައްވާ',
'changeemail-oldemail' => 'މިހާރު ބޭނުންކުރާ އީމެއިލް އެޑްރެސް:',
'changeemail-newemail' => 'އައު އީމެއިލް އެޑްރެސް:',
'changeemail-password' => 'ތިޔަބޭފުޅާގެ {{SITENAME}} ސިއްރުބަސް:',
'changeemail-submit' => 'އީމެއިލް ބަދަލުކުރައްވާ',
'changeemail-cancel' => 'މަންސޫޚް',

# Edit page toolbar
'bold_sample' => 'ބޯ އިބާރާތް',
'bold_tip' => 'ބޯ އިބާރާތް',
'italic_sample' => 'ކަތި އިބާރާތް',
'italic_tip' => 'ކަތި އިބާރާތް',
'headline_sample' => 'ސުރުހީގެ އިބާރާތް',
'media_tip' => 'ފައިލު ފާލަން',
'sig_tip' => 'ތިޔަބޭފުޅާގެ ސޮއި، ތާރީޚް ތަތްގަނޑާއެކު',

# Edit pages
'summary' => 'ހުލާސާ:',
'subject' => 'މާއްދާ/ސުރުހީ:',
'minoredit' => 'މިއީ ކުޑަކުޑަ އުނިއިތުރެކެވެ',
'watchthis' => 'މި ޞަފްޙާއަށް ނަޒަރުބަހައްޓަވާ',
'savearticle' => 'ޞަފްޙާ ރައްކާކުރައްވާ',
'preview' => 'ނަމޫނާ',
'showpreview' => 'ނަމޫނާ',
'showdiff' => 'ބަދަލުތައް ދައްކަވާ',
'anoneditwarning' => "'''ސަމާލުކަމަށް:''' ތިޔަ ބޭފުޅާވަނީ ވިކިޕީޑިއާގެ މެމްބަރެއްގެ ގޮތުގައި ވަދެ ވަޑައި ނުގަނެ. އެހެންކަމުން ތިޔަ '''އައި.ޕީ''' އެޑްރެސް މި ސަފްހާގެ ތާރީހުގައި ރެކޯޑު ކުރެވޭނެއެވެ.",
'blockedtitle' => 'މެންބަރާމެދު ވަނީ ފިޔަވަޅުއެޅިފައި',
'blockedtext' => "'''ތިޔަ މެމްބަރު، ނުވަތަ ތިޔަ ބޭފުޅާގެ އައި.ޕީ. އެޑްރެސް ވަނީ ބްލޮކް ކުރެވިފައެވެ.'''

ބްލޮކް ކުރީ $1 އެވެ.
ބްލޮކް ކުރުމުގެ ސަބަބަކަށް ދެވިފައިވަނީ ''$2''.

* ބްލޮކް ފެށުނީ: $8
* ބްލޮކްގެ މުއްދަތު ހަމަވާނީ: $6
* ގަސްތުކުރެވިފައިވާ ބްލޮކީ: $7

މި ބްލޮކް އާއި މެދު ޚިޔާލު ފާޅުކުރައްވާނަމަ  $1 އާއި ނުވަތަ އެހެން [[{{MediaWiki:Grouppage-sysop}}|އެޑްމިނިސްޓްރޭޓަރަކާއި]] ވާހަކަ ދައްކަވާށެވެ.
އެހެންނަމަވެސް ތިބޭފުޅާގެ [[Special:Preferences|ތަރުޖީހު]] ގައި ރަނގަޅު އީމޭލް އެޑްރެހެއް ކަނޑައަޅުއްވާފައި ނުވާ ނަމަ ތިބޭފުޅާ އަކަށް 'މެމްބަރަށް އީމޭލް ފޮނުއްވަވާ' ގެ ޚިދުމަތެއް ބޭނުން ނުކުރެއްވޭނެއެވެ.

ތިބޭފުޅޭގެ އައި.ޕީ. އެޑްރެސް އަކީ  $3 އެވެ. އަދި ބްލޮކް އައި.ޑީ އަކީ #$5 އެވެ.
އެޑްމިނިސްޓްރޭޓަރަކާއި ގުޅުއްވާއިރު މަތީގައިވާ މަޢުލޫމާތުތައް ހުށަހަޅުއްވަންވާނެއެވެ.",
'loginreqtitle' => 'ވަދެވަޑައިގަތުން މަޖުބޫރު',
'loginreqlink' => 'ވަދެވަޑައިގަންނަވާ',
'accmailtitle' => 'ސިއްރުބަސް ފޮނުވިއްޖެ.',
'accmailtext' => '"$1" އަށްޓަކައިވާ ސިއްރު ބަސް $2 އަށް ވަނީ ފޮނުވިފައި',
'newarticle' => '(އައު)',
'newarticletext' => "<div style=\"border:1px solid black;\">
<big>'''ވިކިޕީޑިއާގައި އަދި މިހާތަނަށް ތިނަމުންވާ މަޒުމޫނެއް އެކުލެވިފައިނުވެއެވެ.'''</big>
* ތިޔަ ވަޑައިގެންނެވި ޞަފްޙާގައި އެއްވެސް ލިޔުމެއް އެކުލެވިފައި ނުވެއެވެ.
*މި ޞަފްޙާއަށް ތިބޭފުޅާއަށް ވަޑައިގަނެވުނީ އޮޅުމަކުން ކަމަށް ވާނަމަ ކޮމްޕިޔުޓަރުގެ `ވެބް ބްރޯޒަރ` ގެ ''ފަހަތް'' ފިތައް އޮބާލައްވާށެވެ. އޭރުން އެންމެ ފަހުން ހުންނެވި ޞަފްޙާ އަށް ވަޑައިގަނެވޭނެއެވެ.
* މަޒްމޫނެއް ފެއްޓެވުމަށް ތިރީގައި ވާ ފޮށީގައި ލިޔުއްވުމަށް ފަހު މަޒުމޫނުގެ ނަމޫނާ ބެއްލެވުމަށް ފަހު ކުށެއްވާނަމަ ރަނގަޅު ކުރައްވާފައި ފޮށީގެ ތިރީގައިވާ '''ޞަފްޙާ ރައްކާކުރައްވާ'''އަށް ފިއްތަވާ ލައްވަވާ.
* އިތުރު އެހީ ބޭނުންފުޅު ނަމަ [[{{MediaWiki:Helppage}}|އެހީ ޞަފްހާއަށް]] ވަޑައިގަންނަވާށެވެ.
</div>",
'noarticletext' => 'މި ޞަފްޙާގައި އެއްވެސް ލިޔުމެއް ނުވެއެވެ. ތިޔަބޭފުޅާއަށް މި ނަން [[Special:Search/{{PAGENAME}}|އެހެން ޞަފްޙާއަކުން ހޯއްދެވިދާނެއެވެ]]. ނުވަތަ <span class="plainlinks">[{{fullurl:{{#Special:Log}}|page={{FULLPAGENAMEE}}}} މިއާ ގުޅޭ ލޮގްތައް ހޯއްދެވިދާނެއެވެ].
[{{fullurl:{{FULLPAGENAME}}|action=edit}} ނުވަތަ މި ޞަފްޙާއަށް އުނިއިތުރު ގެނެވިދާނެއެވެ].</span>',
'previewnote' => "'''މިއީ ހަމައެކަނި ނަމޫނާ އެކެވެ.'''
އަދި ތިބޭފުޅާގެ ބަދަލުތައް ރައްކާނުކުރެވެއެވެ!",
'editing' => '$1 އަށް އުނިއިތުރު ގެންނަނީ',
'creating' => '$1 ފަށްޓަވަނީ',
'editingsection' => '$1ގެ ބަޔަކަށް އުނިއިތުރު ގެންނަނީ',
'editingcomment' => '$1ގެ ބަޔަކަށް އުނިއިތުރު ގެންނަނީ',
'editconflict' => 'އުނިއިތުރުގެންނެވުމުގައި އަރާރުން: $1',
'yourtext' => 'ތިޔަބޭފުޅާގެ ލިޔުއްވުން',
'yourdiff' => 'ތަފާތުތައް',
'semiprotectedpagewarning' => "'''ސަމާލުކަމަށް:''' މި ޞަފްހާވަނީ ދިފާއު ކުރެވިފައެވެ. އެހެންކަމުން މިސަފްޙާ އަށް އުނިއިތުރު ގެނެވޭނީ ހަމައެކަނި މެމްބަރުކަން ހާޞިލް ކުރައްވާފައިވާ ބޭފުޅުންނަށެވެ.
ތިރީގައި ވަނީ އެންމެ ފަހުގެ ލޮގް އެވެ:",
'templatesused' => 'މި ޞަފްޙާ ގައި ބޭނުން ކުރެވިފައިވާ {{PLURAL:$1|ފަންވަތް|ފަންވަތްތައް}}:',
'template-protected' => '(ދިފާޢުކުރެވިފައި)',
'template-semiprotected' => '(ބައެއް ދިފާޢުކުރެވިފައި)',
'recreate-moveddeleted-warn' => "'''ސަމާލުކަމަށް: ތިޔަ ފަށްޓަވަން އުޅުއްވަނީ ކުރީގައި ފޮހެލެވިފައިވާ ޞަފްޙާއެކެވެ.'''

މި ޞަފްޙާ ކުރިއަށް ގެންދެވުމަށް ރަނގަޅުތޯ އަދި އެއްފަހަރު ވިސްނަވާލައްވާށެވެ.
ފޮހެލެވުނު އަދި ބަދަލުކުރެވުނު ލޮގް ތިރީގައި ވަނީއެވެ :",
'moveddeleted-notice' => 'މި ޞަފްޙާ ވަނީ ފޮހެލެވިފައެވެ.
ފޮހެލުމުގެ އަދި ނަން ބަދަލުކުރުމުގެ ލޮގް ތިރީގައިވަނީއެވެ.',

# History pages
'viewpagelogs' => 'މިޞަފްޙާގެ ލޮގުތައް ބައްލަވާ',
'currentrev' => 'އެންމެފަހުން ގެނެވުނު ބަދަލު',
'currentrev-asof' => 'އެންމެ ފަހުން ގެނެވުނު ބަދަލު $1',
'revisionasof' => '$1ގެ ނުސްހާ',
'previousrevision' => '→ ކުރީގެ ނުސްހާ',
'nextrevision' => 'ފަހުގެ ނުސްހާ ←',
'cur' => 'އެންމެ ފަހުގެ',
'next' => 'ކުރިޔަށް',
'last' => 'ފަރަޤު',
'histfirst' => 'އެންމެ ކުރީގެ',
'histlast' => 'އެންމެ ފަހުގެ',

# Revision deletion
'revdel-restore-deleted' => 'ފޮހެލެވިފައިވާ ނުސްހާތައް',
'revdel-restore-visible' => 'ފާޅު ނުސްހާތައް',

# Diffs
'lineno' => 'ފޮޅުވަތް $1:',
'compareselectedversions' => 'އިހުތިޔާރު ކުރެވިފައިވާ ނުސްހާތައް އަޅައިކިޔުއްވާ',
'editundo' => 'ކުރީގެ ނުސްހާއަށް ބަދަލުކުރައްވާ',

# Search results
'searchresults' => 'ހޯދުމުގެ ނަތީޖާ',
'searchresults-title' => 'ހޯދުމުގެ ނަތީޖާ: $1',
'prevn' => 'ފަހަތަށް {{PLURAL:$1|$1}}',
'nextn' => 'ކުރިއަށް {{PLURAL:$1|$1}}',
'prevn-title' => 'ކުރީގެ $1 {{PLURAL:$1|ނަތީޖާ|ނަތީޖާތައް}}',
'nextn-title' => 'ކުރިއަށް $1 {{PLURAL:$1|ނަތީޖާ|ނަތީޖާތައް}}',
'shown-title' => 'ދައްކަވާނީ ޞަފްޙާއަކަށް $1 {{PLURAL:$1|ނަތީޖާ|ނަތީޖާ }}',
'viewprevnext' => 'ބައްލަވާ($1 {{int:pipe-separator}} $2) ($3).',
'searchmenu-new' => "''' މި ވިކީގައި \"[[:\$1]]\" ފަށްޓަވައިދެއްވާ! '''",
'searchhelp-url' => 'Help:ފިހުރިސްތު',
'searchprofile-articles' => 'މަޒުމޫނު ޞަފްޙާތައް',
'searchprofile-project' => 'އެހީ ޞަފްޙާތަކާއި މަޝްރޫޢު ޞަފްޙާތައް',
'searchprofile-images' => 'މަލްޓިމީޑިއާ',
'searchprofile-everything' => 'ހުރިހާ',
'searchprofile-advanced' => 'ފުންކޮށް',
'searchprofile-articles-tooltip' => 'ހޯދާނީ $1އިން',
'searchprofile-project-tooltip' => 'ހޯދާނީ $1އިން',
'searchprofile-images-tooltip' => 'ފައިލުތައް ހޯއްދަވާ',
'searchprofile-everything-tooltip' => 'ހޯއްވާނީ ހުރިހާ އެއްޗެއް (ޚިޔާލު ޞަފްޙާތަކާއި އެކު)',
'search-result-size' => '$1 ({{PLURAL:$2|1 ބަސް|$2 ބަސްތައް}})',
'search-redirect' => 'މިސްރާބުކުރެވުނީ $1',
'search-section' => '(ބައި $1)',
'search-suggest' => 'ބޭނުންފުޅުވަނީ $1 ތޯ؟',
'searchall' => 'ހުރިހާ',
'search-nonefound' => 'ތިޔަ ހޯއްދަވާ ލިޔުމެއް ނުފެނުނެވެ.',

# Preferences page
'preferences' => 'ތަރުޖީހުތައް',
'mypreferences' => 'ތަރުޖީހުތައް',
'prefs-edits' => 'އުނިއިތުރުތަކުގެ ޢަދަދު:',
'changepassword' => 'ސިއްރުބަސް ބަދަލުކުރައްވާ',
'skin-preview' => 'ނަމޫނާ',
'saveprefs' => 'ރައްކާކުރައްވާ',
'columns' => 'ކޮލަންތައް:',
'timezonelegend' => 'ވަގުތު ހިސާބުގަނޑު:',
'timezoneregion-africa' => 'އެފްރިކާ',
'timezoneregion-america' => 'އެމެރިކާ',
'timezoneregion-antarctica' => 'އެންޓާކްޓިކާ',
'timezoneregion-arctic' => 'އާކްޓިކް',
'timezoneregion-asia' => 'އޭޝިއާ',
'timezoneregion-australia' => 'އޮސްޓްރޭލިއާ',
'timezoneregion-europe' => 'ވިލާތު',
'prefs-files' => 'ފައިލުތައް',
'youremail' => '٭ އީމޭލު',
'username' => 'މެންބަރުނަން:',
'yourrealname' => '* އަސްލު ނަން',
'yourlanguage' => 'ބަސް:',
'yournick' => 'ލަގަބު/ކުއްނިއްޔާ:',
'badsiglength' => 'ތިބޭފުޅާގެ ސޮއި $1 {{PLURAL:$1|ކަރެކްޓަރަށް|ކަރެކްޓަރުތަކަށް}}ވުރެ ދިގުނުކުރާށެވެ.',
'yourgender' => 'ޖިންސު:',
'gender-female' => 'އަންހެން',
'email' => 'އީމޭލު',
'prefs-signature' => 'ސޮއި',

# User rights
'userrights' => 'މެންބަރުގެ ހައްގުތަކުގެ އިންތިޒާމް',
'userrights-user-editname' => 'މެންބަރުނަން ލިޔުއްވާ:',

# Groups
'group' => 'ގްރޫޕް:',
'group-user' => 'މެމްބަރުން',
'group-autoconfirmed' => 'އޮޓޯމެމްބަރުން',
'group-bot' => 'ބޮޓުން',
'group-sysop' => 'އެޑްމިނިސްޓްރޭޓަރުން',
'group-bureaucrat' => 'ބިއުރޯކްރެޓުން',
'group-all' => '(ހުރިހާ)',

# Associated actions - in the sentence "You do not have permission to X"
'action-edit' => 'މި ޞަފްޙާއަށް އުނިއިތުރު ގެންނަވާ',

# Recent changes
'recentchanges' => 'އެންމެ ފަހުގެ ބަދަލުތައް',
'recentchanges-summary' => 'މި ވިކިޕީޑިއާ އަށް ގެނެވިފައިވާ އެންމެ ފަހުގެ ބަދަލުތައް މި ޞަފްހާ އިން ބައްލަވާ!',
'recentchanges-label-newpage' => 'މި އުނިއިތުރުން އާ ޞަފްޙާއެއް ފަށައިގަނެވުނެވެ.',
'recentchanges-label-minor' => 'މިއީ ކުޑަކުޑަ އުނިއިތުރެކެވެ.',
'recentchanges-label-bot' => 'މި އުނިއިތުރު ގެނައީ ބޮޓެކެވެ.',
'diff' => 'ފަރަގު',
'hist' => 'ތާރީޚް',
'hide' => 'ފޮރުވާ',
'show' => 'ދައްކަވާ',

# Recent changes linked
'recentchangeslinked' => 'ގުޅުންހުރި ބަދަލުތައް',
'recentchangeslinked-feed' => 'ގުޅުންހުރި ބަދަލުތައް',
'recentchangeslinked-toolbox' => 'ގުޅުންހުރި ބަދަލުތައް',

# Upload
'upload' => 'ފައިލު ފޮނުވާ',
'uploadbtn' => 'ފައިލު ފޮނުވާ',
'filedesc' => 'ހުލާސާ',
'fileuploadsummary' => 'ހުލާސާ:',
'filestatus' => 'ނަކަލުކުރުމުގެހައްގުގެ ހާލަތު:',
'filesource' => 'މަސްދަރު:',
'uploadedfiles' => 'ފޮނުވިފައިވާ ފައިލުތައް',
'uploadwarning' => 'ފައިލުފޮނުއްވުމުގެ ކުރިން ދެވޭ އިންޒާރު',

# Special:ListFiles
'listfiles' => 'ފައިލުތަކުގެ ފިހުރިސްތު',

# File description page
'file-anchor-link' => 'ފައިލު',
'filehist' => 'ޞަފްޙާގެ ތާރީޚް',
'filehist-current' => 'މިހާރު',
'filehist-datetime' => 'ތާރީޚް/ގަޑި',
'filehist-thumb' => 'ތަމްބްނެއިލް',
'filehist-user' => 'މެމްބަރު',
'filehist-comment' => 'ޚިޔާލު',
'imagelinks' => 'ފާލަންތައް',
'sharedupload-desc-here' => 'މި ފައިލަކީ $1ގެ ފައިލެކެވެ. އަދި އެހެން މަޝްރޫޢުތަކުގައި ބޭނުން ކުރެވިފައި ހުރެދާނެއެވެ.
މި ފައިލުގެ ތަފްސީލް [$2 ފައިލު ތަފްސީލް ޞަފްޙާއިން] ތިރީގައިވަނީއެވެ.',

# Random page
'randompage' => 'ކޮންމެވެސް ޞަފްޙާއެއް',

# Statistics
'statistics' => 'ތަފާސްހިސާބުތައް',
'statistics-header-pages' => 'ޞަފްޙާގެ ތަފާސްހިސާބު',
'statistics-header-edits' => 'އުނިއިތުރުތަކުގެ ތަފާސްހިސާބު',
'statistics-header-views' => 'ތަފާސްހިސާބު ބައްލަވާ',
'statistics-header-users' => 'މެންބަރުގެ ތަފާސްހިސާބު',
'statistics-header-hooks' => 'އެހެނިހެން ތަފާސްހިސާބު',
'statistics-articles' => 'މަޒުމޫނުތައް',
'statistics-pages' => 'ޞަފްޙާތައް',
'statistics-pages-desc' => 'ވިކީގައިވާ ހުރިހާ ޞަފްޙާއެއް. ޚިޔާލު ޞަފްހާތަކާއި މިސްރާބު ޞަފްޙާތަކާއި އިތުރަށް...',
'statistics-files' => 'ފޮނުވިފައިވާ ފައިލުތައް',
'statistics-edits' => '{{SITENAME}} ފެށުނުތާ ޞަފްޙާތަކަށް އުނިއިތުރު ގެނެވުނު އަދަދު',
'statistics-edits-average' => 'ޞަފްޙާއަކަށް ގެނެވޭ އެވަރަޖު އުނިއިތުރު',
'statistics-users' => 'ރަޖިސްޓަރކުރެވިފައިވާ [[Special:ListUsers|މެމްބަރުން]]',
'statistics-users-active' => 'ހަރަކާތްތެރި މެމްބަރުން',
'statistics-users-active-desc' => 'ފާއިތުވެދިޔަ {{PLURAL:$1|ދުވަސް|$1 ދުވަސްތައް}} ތެރޭގައި ކޮންމެވެސް ކަމެއް ކޮށްފައިވާ މެމްބަރުން',
'statistics-mostpopular' => 'އެންމެ މަޤްބޫލް ޞަފްޙާތައް',

'brokenredirects' => 'އޮޅިފައިވާ މިސްރާބުތައް',

# Miscellaneous special pages
'nbytes' => '$1 {{PLURAL:$1|ބައިޓް|ބައިޓްތައް}}',
'unusedcategories' => 'ބޭނުންނުކުރެވޭ ގިސްމުތައް',
'unusedimages' => 'ބޭނުންނުކުރެވޭ ފައިލުތައް',
'popularpages' => 'މަޤްބޫލު ޞަފްޙާތައް',
'wantedcategories' => 'ބޭނުންފުޅުވާ ގިސްމުތައް',
'wantedpages' => 'ބޭނުންފުޅުވާ ޞަފްޙާތައް',
'shortpages' => 'ކުރު ޞަފްޙާތައް',
'longpages' => 'ދިގު ޞަފްޙާތައް',
'protectedpages' => 'ދިފާއުކުރެވިފައިވާ ޞަފްޙާތައް',
'newpages' => 'އާ ޞަފްޙާތައް',
'ancientpages' => 'ބޯދާ ޞަފްޙާތައް',
'move' => 'ނަން/ތަން ބަދަލުކުރައްވާ',
'movethispage' => 'މި ޞަފްހާގެ ނަންބަދަލުކުރައްވާ',

# Book sources
'booksources' => 'ފޮތްތަކުގެ މަސްދަރުތައް',
'booksources-go' => 'ދުރުވޭ',

# Special:AllPages
'allpages' => 'ހުރިހާ ޞަފްޙާތައް',
'alphaindexline' => '$1 އިން $2',
'nextpage' => 'ކުރިއަށް ($1)',
'prevpage' => 'ފަހަތަށް ($1)',
'allarticles' => 'ހުރިހާ މަޒުމޫނުތައް',
'allinnamespace' => 'ހުރިހާ ޞަފްޙާތައް (ނުތުގު $1 ގައިވާ)',
'allpagesprev' => 'ކުރީގެ',
'allpagesnext' => 'ކުރިޔަށް އޮތް',
'allpagessubmit' => 'ދުރުވޭ',

# SpecialCachedPage
'cachedspecial-viewing-cached-ttl' => 'ތިޔަ ބައްލަވަނީ މި ޞަފްޙާގެ ކޭޗްޑް ވައްތަރެވެ. $1',

# Special:Categories
'categories' => 'ގިސްމުތައް',
'categoriespagetext' => 'ތިރީގައި މިވާ ގިސްމުތައް ވިކީ ގައި މައުޖޫދުވެގެން ވެއެވެ.
[[Special:UnusedCategories|Unused categories]] are not shown here.
Also see [[Special:WantedCategories|wanted categories]].',

# Special:ListGroupRights
'listgrouprights-members' => '(މެމްބަރުންގެ ލިސްޓު)',

# Email user
'emailuser' => 'މި މެންބަރަށް އީމޭލު ފޮނުއްވާ',

# Watchlist
'watchlist' => 'މަގޭ ނަޒަރު',
'mywatchlist' => 'މަގޭ ނަޒަރު',
'addedwatchtext' => "މި ޞަފްޙާ \"<nowiki>\$1</nowiki>\" ތިޔަބޭފުޅާގެ [[Special:Watchlist|ހާއްސަ ނަޒަރު]] ފިހުރިސްތަށް ލެވިއްޖެއެވެ. ދެން ކުރިމަގުގައި މި ޞަފްޙާ އަދި މިއާ ގުޅޭ ބަހުސް ގެ ޞަފްޙާ އަށް ގެނެވޭ އުނިއިތުރު ތަކުގެ މައުލޫމާތު މިޞަފްހާއަށް ލެވޭނެއެވެ. އަދި އެ ޞަފްޙާތަކުގެ ޝަނާހަތު ފަސޭހަ ކުރުމަށްޓަކައި [[Special:ފަހު ބަދަލުތައް|ފަހު ބަދަލުތަކުގެ ފިހުރިސްތު]] ގައި އެބައިތައް '''ބޯ''' (bold) އަކުރުން ލިޔެވޭނެއެވެ. <p> ކޮންމެ އިރަކުވެސް ތިޔަބޭފުޅާ ހާއްސަ ނަޒަރުގެ ފިހުރިސްތުން މި ޞަފްޙާ އުނިކުރައްވަން ބޭނުންފުޅިއްޔާ މަތީގައި ދެވިފައިވާ \"ހާއްސަ ނަޒަރުން އުނިކުރޭ\" ގައި ކޮއްޓަވާ ލައްވާށެވެ.",
'watch' => 'ނަޒަރުބަހައްޓަވާ',
'watchthispage' => 'މި ޞަފްޙާއަށް ނަޒަރުބަހައްޓަވާ',
'unwatch' => 'ހާއްސަ ނަޒަރުން އުނިކުރޭ',
'watchlistcontains' => 'ތިޔަބޭފުޅާގެ ހާއްސަ ނަޒަރު ފިހުރިސްތުގައި ވަނީ $1 ޞަފްޙާއެވެ.',
'wlnote' => 'ތިރީގައި މިވަނީ އެއީ ފާއިތުވި <b>$2</b> ގަޑި އިރުގެ ތެރޭގައިގެނެވިފައިވާ ފަހު $1 ބަދަލެވެ.',

'changed' => 'ބަދަލުކުރެވިއްޖެ',

# Delete
'deletepage' => 'ޞަފްޙާ ފޮހެލައްވާ',
'confirm' => 'ޔަގީން',
'confirmdeletetext' => 'ތިޔަބޭފުޅާ ތިޔަ އުޅުއްވަނީ ޞަފްޙާއެއް ނުވަތަ ތަޞްވީރެއް އެއާ ގުޅިފައިވާ ހުރިހާ ތާރީހަކާއެކު ކޮށާރުން ފޮހެލައްވާށެވެ. މިކަން މިގޮތަށް ކުރައްވަން ބޭނުންފުޅުކަން ޔަގީން ކުރައްވާށެވެ. އަދި މިކަމުން ނުކުމެދާނެ ނަތީޖާއެއް ވެސް ތިޔަ ބޭފުޅާއަށް ރަނގަޅަށް އެނގިވަޑައިގަންނަވަންވާނެއެވެ. އަދި ތިޔަކަން ތިކުރެއްވެނީ [[{{MediaWiki:Policy-url}}|ވިކިޕީޑިއާ ގެ ސިޔާސަތާ]] އެއްގޮތަށްތޯ ވެސް ބައްލަވައި ޔަގީން ކުރައްވާށެވެ!',
'actioncomplete' => 'އަމަލު ފުރިހަމަވެއްޖެ',
'deletecomment' => 'ސަބަބު',

# Rollback
'rollbacklink' => 'ކުރީގެ ނުސްހާ އަކަށް ބަދަލުކުރައްވާ',
'cantrollback' => 'އުނިއިތުރު އިއާދައެއް ނުކުރެވޭނެ؛ އެހެނީ އެންމެ ފަހު އުނިއިތުރުގައި ހިއްސާވި ފަރާތަކީ މިޞަފްޙާގެ ހަމައެކަނި މުއައްލިފެވެ.',

# Protect
'unprotectedarticle' => '"[[$1]]" ދިފާއުކުރުން ހުއްޓާލެވިއްޖެ',
'prot_1movedto2' => '[[$1]] އަށް ނަގުލުކުރެވިފައި [[$2]]',

# Restrictions (nouns)
'restriction-edit' => 'އުނިއިތުރު ގެންނަވާ',

# Undelete
'undelete' => 'ފޮހެލެވިފައިވާ ޞަފްޙާތައް ބައްލަވާ',
'viewdeletedpage' => 'ފޮހެލެވިފައިވާ ޞަފްޙާތައް ބައްލަވާ',
'undeletebtn' => 'އިއާދަ ކުރޭ!',
'undeleteviewlink' => 'ބައްލަވާ',
'undelete-show-file-submit' => 'އާދެ',

# Namespace form on various pages
'blanknamespace' => '(މައި)',

# Contributions
'contributions' => '{{GENDER:$1|މެމްބަރުގެ}} ހިއްސާ',
'mycontris' => 'މަގޭ ހިއްސާ',

'sp-contributions-talk' => 'ވާހަކަ',
'sp-contributions-userrights' => 'މެންބަރުގެ ހައްގުތަކުގެ އިންތިޒާމް',
'sp-contributions-search' => 'ހިއްސާތަށް ހޯއްދަވާ',

# What links here
'whatlinkshere' => 'މިއާ ގުޅެނީ ކޮންއެއްޗެއް',

# Block/unblock
'blockip' => 'މެންބަރާ މެދު ފިޔަވަޅުއަޅުއްވާ',
'ipbreason' => 'ސަބަބު',
'ipbsubmit' => 'މި މެމްބަރާއި މެދު ފިޔަވަޅު އަޅުއްވާ!',
'ipboptions' => '2 ގަޑިއިރު:2 hours, 1 ދުވަސް:1 day, 3 ދުވަސް:3 days, 1 ހަފްތާ:1 week, 2 ހަފްތާ:2 weeks, 1 މަސް:1 month,3 މަސް:3 months, 6 މަސް:6 months, 1 އަހަރު:1 year, ހަމައެއްނެތް:infinite',
'badipaddress' => 'ނުރަނގަޅު އައި.ޕީ އެޑްރެހެއް',
'ipblocklist' => 'ފިޔަވަޅު އެޅިފައިވާ މެމްބަރުން',
'expiringblock' => 'މުއްދަތު ހަމަވާނީ $1 $2',
'blocklink' => 'ފިޔަވަޅުއަޅުއްވާ',
'unblocklink' => 'ފިޔަވަޅުއެޅުން ބަދަލުކުރައްވާ',
'contribslink' => 'ޙިއްޞާ',
'proxyblocksuccess' => 'ފުރިހަމަވެއްޖެ.',

# Developer tools
'lockdb' => 'ކޮށާރު ބަންދުކުރައްވާ',
'lockbtn' => 'ކޮށާރު ބަންދުކުރައްވާ',

# Move page
'move-page-legend' => 'ޞަފްޙާގެ ނަން ބަދަލުކުރައްވާ',
'movearticle' => 'ޞަފްޙާގެ ނަން/ތަން ބަދަލުކުރައްވާ',
'newtitle' => 'އައު ނަމަކަށް',
'move-watch' => 'މި ޞަފްހާ އަށް ނަޒަރުބަހައްޓަވާ!',
'movepagebtn' => 'ޞަފްޙާގެނަން ބަދަލުކުރައްވާ',
'articleexists' => 'ތިޔަ ސުރުހީގައި ކުރީއްސުރެ ވެސް ޞަފްޙައެއް ވޭ، ނުވަތަ ތިޔަ އިހުތިޔާރުކުރެއްވި ނަން ރަނގަޅެއް ނޫން، ވީމާ އެހެން ނަމެއް އިހުތިޔާރުކުރެއްވުން އެދެވިގެންވެއެވެ.',
'movedto' => 'އަށް ބަދަލުކުރެވިފައި',
'movelogpagetext' => 'ތިރީގައި މިވަނީ ނަން/ތަން ބަދަލުކުރެވިފައިވާ ޞަފްޙާތަކުގެ ފިހުރިސްތެކެވެ.',
'movereason' => 'ސަބަބު',
'delete_and_move' => 'ފޮހެލައްވާފައި އެހެންނަމަކަށްބަދަލުކުރައްވާ',
'delete_and_move_confirm' => 'އާދެ، މި ޞަފްޙާ ފޮހެލައްވާ',
'delete_and_move_reason' => 'އެހެންނަމަކަށް ބަދަލުކުރުމަށްޓަކައި ފޮހެލެވިއްޖެ',

# Namespace 8 related
'allmessages' => 'ނިޒާމުގެ މެސެޖުތައް',
'allmessagesname' => 'ނަން',
'allmessagesdefault' => 'ކުރީގެ މަތަން',
'allmessagescurrent' => 'މިހާރުގެ މަތަން',

# Thumbnails
'thumbnail-more' => 'ބޮޑުކުރައްވާ',

# Tooltip help for the actions
'tooltip-pt-userpage' => 'ތިބޭފުޅާގެ މެމްބަރު ޞަފްޙާ',
'tooltip-pt-mytalk' => 'މަގޭ ވާހަކަ',
'tooltip-pt-preferences' => 'ތިބޭފުޅާގެ ޚިޔާރުކުރުންތައް',
'tooltip-pt-watchlist' => 'ބައްލަވާ ލިސްޓު',
'tooltip-pt-mycontris' => 'ހިއްސާގެ ލިސްޓު',
'tooltip-pt-login' => 'ތިބޭފުޅާ ވަދެވަޑައުގަނުމަށް މަޖުބޫރެއް ނޫނެވެ.',
'tooltip-pt-logout' => 'ބޭރަށްވަޑައިގަންނަވާ',
'tooltip-ca-talk' => 'މަޒުމޫނު ޞަފްޙާއާ ބެހޭ ޚިޔާލު',
'tooltip-ca-edit' => 'މި ޞަފްޙާއަށް ތިބޭފުޅާއަށް އުނިއިތުރު ގެންނެވޭނެއެވެ. ޞަފްޙާ ރައްކާކުރެއްވުމުގެ ކުރިން ނަމޫނާ ބައްލަވާލެއްވުމަށް އެދެމެވެ.',
'tooltip-ca-addsection' => 'އާ ބައެއް ފަށްޓަވާ',
'tooltip-ca-viewsource' => 'މި ޞަފްޙާވަނީ ދިފާޢުކުރެވިފައެވެ.
މި ޞަފްޙާގެ މަސްދަރު ތިބޭފުޅާއަށް ބައްލަވާލެއްވޭނެއެވެ.',
'tooltip-ca-history' => 'މި ޞަފްޙާގެ ކުރީގެ ނުސްހާތައް',
'tooltip-ca-protect' => 'މި ޞަފްޙާ ދިފާޢުކުރައްވާ',
'tooltip-ca-delete' => 'މި ޞަފްޙާ ފޮހެލައްވާ',
'tooltip-ca-move' => 'މި ޞަފްހާގެ ނަން/ތަން ބަދަލުކުރައްވާ',
'tooltip-ca-watch' => 'މި ޞަފްޙާއަށް ނަޒަރު ބަހައްޓަވާ',
'tooltip-ca-unwatch' => 'މަގޭ ނަޒަރުން މި ޞަފްޙާ ދުރުކޮށްލައްވާ',
'tooltip-search' => '{{SITENAME}}އިން ހޯއްދަވާ',
'tooltip-search-fulltext' => 'މި ބަސް ޞަފްޙާތަކުން ހޯއްދަވާ',
'tooltip-p-logo' => 'މައި ޞަފްޙާއަށް ވަޑައިގަންނަވާ',
'tooltip-n-mainpage' => 'މައި ސަފްޙާއަށް ވަޑައިގަންނަވާ',
'tooltip-n-mainpage-description' => 'މައި ޞަފްޙާއަށް ވަޑައިގަންނަވާ',
'tooltip-n-portal' => 'މަޝްރޫއާ ބެހޭ ގޮތުން، ތިބޭފުޅާއަށް ކުރެއްވޭނެ ކަންތައްތައް، ކަންކަން ހޯދާނެ ތަން',
'tooltip-n-currentevents' => 'މިހާރު ހިނގަމުންދާ ހާދިސާތަކުގެ ޚުލާސާއެއް',
'tooltip-n-recentchanges' => 'ފަހު ބަދަލުތައް',
'tooltip-n-randompage' => 'ކޮންމެވެސް ޞަފްޙާއެއް',
'tooltip-n-help' => 'އެހީގެ ޞަފްޙާ',
'tooltip-t-whatlinkshere' => 'މި ޞަފްޙާއާ ގުޅިފައިވާ ހުރިހާ ޞަފްޙާތައް.',
'tooltip-t-recentchangeslinked' => 'މި ޞަފްޙާއާ ގުޅުންހުރި ބަދަލުތައް',
'tooltip-t-contributions' => 'މި މެމްބަރުގެ ޙިއްސާގެ ލިސްޓު',
'tooltip-t-emailuser' => 'މި މެމްބަރަށް އީމެއިލް ފޮނުއްވަވާ',
'tooltip-t-upload' => 'ފައިލު ފޮނުވާ',
'tooltip-t-specialpages' => 'ޚާއްސަ ޞަފްޙާތަކުގެ ލިސްޓު',
'tooltip-t-print' => 'ޕްރިންޓަށްފަހި ޞަފްޙާ',
'tooltip-t-permalink' => 'ނުސްހާއަށް ދާއިމީ ފާލަން',
'tooltip-ca-nstab-main' => 'މަޢުލޫމާތު ޞަފްޙާ ބައްލަވާ',
'tooltip-ca-nstab-user' => 'މެމްބަރު ޞަފްޙާ ބައްލަވާ',
'tooltip-ca-nstab-special' => 'މިއީ ޚާއްސަ ޞަފްޙާއެކެވެ. މި ޞަފްޙާއަށް އުނިއިތުރު ނުގެނެވޭނެއެވެ.',
'tooltip-ca-nstab-project' => 'މަޝްރޫޢު ޞަފްޙާ ބައްލަވާ',
'tooltip-ca-nstab-image' => 'ފައިލު ޞަފްޙާ ބައްލަވާ',
'tooltip-ca-nstab-template' => 'ފަންވަތް ބައްލަވާ',
'tooltip-ca-nstab-category' => 'ޤިސްމު ޞަފްޙާ ބައްލަވާ',
'tooltip-save' => 'ބަދަލުތައް ރައްކާކުރައްވާ',
'tooltip-preview' => 'ބަދަލުތައް ދައްކަވާ، ރައްކާކުރެއްވުމުގެ ކުރިން މި ބޭނުންކުރައްވާ!',
'tooltip-watch' => 'މިޞަފްޙާއަށް ނަޒަރުބަހައްޓަވާ',
'tooltip-rollback' => '"ކުރީގެ ނުސްހާ އަކަށް ބަދަލުކުރައްވާ" އިން މި ޞަފްޙާއަށް އެންމެ ފަހުން އުނިއިތުރު ގެންނެވި މެމްބަރުގެ އުނިއިތުރު(އުނިއިތުރުތައް) ފޮހެލެވޭނެއެވެ.',
'tooltip-undo' => '"ކުރީގެ ނުސްހާއަށް ބަދަލުކުރައްވާ" އިން މި ނުސްހާގެ ކުރީގައި އިން ނުސްހާއަށް ބަދަލުކޮށްދޭނެއެވެ. އަދި އުނިއިތުރުގެ ޚުލާސާ ލިޔުމުގެ ފުރުސަތު ދޭނެއެވެ.',
'tooltip-summary' => 'ކުރު ޚުލާސާއެއް ލިޔުއްވާ',

# Info page
'pageinfo-toolboxlink' => 'ސަފްޙާ އާއި ބެހޭ މައުލޫމާތު',

# Browsing diffs
'previousdiff' => '→ ކުރީގެ ނުސްހާ',
'nextdiff' => 'ފަހުގެ ނުސްހާ ←',

# Special:NewFiles
'showhidebots' => '($1 ބޮޓްސް)',
'ilsubmit' => 'ހޯއްދަވާ',

# Metadata
'metadata' => 'މެޓަޑޭޓާ',

# EXIF tags
'exif-imagewidth' => 'ފުޅާމިން',
'exif-imagelength' => 'އުސްމިން',
'exif-imagedescription' => 'ތަސްވީރުގެ ސުރުހީ',
'exif-make' => 'ކެމެރާ އުފެއްދި ފަރާތް',
'exif-model' => 'ކެމެރާ މޮޑެލް',
'exif-software' => 'ބޭނުންކުރެވުނު ސޮފްޓްވެއަރ',
'exif-artist' => 'މުސައްނިފު',
'exif-filesource' => 'ފައިލުގެ މަސްދަރު',

# Pseudotags used for GPSSpeedRef
'exif-gpsspeed-n' => 'ތަސްވީރުގެ ސުރުހީ',

# Pseudotags used for GPSDestDistanceRef
'exif-gpsdestdistance-k' => 'ކިލޯމީޓަރު',
'exif-gpsdestdistance-m' => 'މޭލު',

'exif-iimcategory-edu' => 'ތަޢުލީމު',
'exif-iimcategory-evn' => 'ތިމާވެށި',
'exif-iimcategory-hth' => 'ސިއްޙަތު',
'exif-iimcategory-pol' => 'ސިޔާސަތު',
'exif-iimcategory-sci' => 'ސައިންސާއި ޓެކްނޮލޮޖީ',
'exif-iimcategory-spo' => 'ކުޅިވަރު',

# 'all' in various places, this might be different for inflected languages
'watchlistall2' => 'ހުރިހާ',
'namespacesall' => 'ހުރިހާ',

# Email address confirmation
'confirmemail' => 'އީމޭލު އެޑްރެސް ޔަގީންކުރައްވާ',

# action=purge
'confirm_purge_button' => 'ރަނގަޅު',

# Special:Version
'version' => 'ނުސްހާ ނަމްބަރު',

# Special:SpecialPages
'specialpages' => 'ހާއްސަ ޞަފްޙާތައް',

# Search suggestions
'searchsuggest-search' => 'ހޯއްދަވާ',

);
