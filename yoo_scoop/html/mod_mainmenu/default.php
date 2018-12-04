<?php
/**
* @package   yoo_scoop Template
* @version   1.5.0 2009-03-02 15:12:48
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// include YOOmenu system
require_once(JModuleHelper::getLayoutPath('mod_mainmenu', 'yoomenu'));

// set YOOmenu params
$yootools  = &YOOTools::getInstance();
$accordion = $yootools->getParam('accordionMenu', array());

if (array_key_exists($params->get('menutype'), $accordion)) {
	$params->def('accordionLevel', $accordion[$params->get('menutype')]);
}

if ($params->get('menutype') == 'mainmenu') {
	$params->def('item1Color', $yootools->getParam('item1Color', ''));
	$params->def('item2Color', $yootools->getParam('item2Color', ''));
	$params->def('item3Color', $yootools->getParam('item3Color', ''));
	$params->def('item4Color', $yootools->getParam('item4Color', ''));
	$params->def('item5Color', $yootools->getParam('item5Color', ''));
	$params->def('item6Color', $yootools->getParam('item6Color', ''));
	$params->def('item7Color', $yootools->getParam('item7Color', ''));
	$params->def('item8Color', $yootools->getParam('item8Color', ''));
	$params->def('item9Color', $yootools->getParam('item9Color', ''));
	$params->def('item10Color', $yootools->getParam('item10Color', ''));
}

$yoomenu = &YOOMenu::getInstance();
$yoomenu->setParams($params);

modMainMenuHelper::render($params, 'YOOMenuXMLCallback');
?>