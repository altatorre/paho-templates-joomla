<?php
/*

$JA#COPYRIGHT$

*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

include_once (dirname(__FILE__).DS.'/ja_templatetools_1.5.php');
$mainframe =& JFactory::getApplication('site');

//$tmpTools = new JA_Tools($this, array(JA_TOOL_MENU, JA_TOOL_COLOR));	//For demo
$tmpTools = new JA_Tools($this);										//For release
$logo = $tmpTools->getParam('logoImage');

// Checks the language being used and adjust the logo file
$lg = &JFactory::getLanguage();
$lang = $lg->get('backwardlang');
$lang = substr($lang,0,3);
$logo = str_ireplace("xxx",$lang,$logo);
$logo = "images/banners/" . $logo;

# Auto Collapse Divs Functions ##########
$ja_left = $this->countModules('ww_left');
$ja_right = $this->countModules('ww_right');
$ja_topsl = $this->countModules('ww_topsl');

if ( $ja_left && $ja_right ) {
	$divid = '';
	} elseif ( $ja_left ) {
	$divid = '-fr';
	} elseif ( $ja_right ) {
	$divid = '-fl';
	} else {
	$divid = '-f';
}

//Main navigation
$ja_menutype = $tmpTools->getParam(JA_TOOL_MENU);
include_once( dirname(__FILE__).DS.'ja_menus/Base.class.php' );
$japarams = JA_Base::createParameterObject('');
$japarams->set( 'menutype', $tmpTools->getParam('menutype', 'mainmenu') );
$japarams->set( 'menu_images_align', 'left' );
$japarams->set( 'menupath', $tmpTools->templateurl() .'/ja_menus');
$japarams->set('menu_title', 0);
switch ($ja_menutype) {
	case 'css':
		$menu = "CSSmenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
	case 'moo':
		$menu = "Moomenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
	case 'dropline':
		$menu = "DLmenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
	case 'split':
	default:
		$menu = "Splitmenu";
		include_once( dirname(__FILE__).DS.'ja_menus/'.$menu.'.class.php' );
		break;
}
$menuclass = "JA_$menu";
$jamenu = new $menuclass ($japarams);

$hasSubnav = false;
if ($jamenu->hasSubMenu (1) && $jamenu->showSeparatedSub ) 
	$hasSubnav = true;
//End for main navigation

?>
