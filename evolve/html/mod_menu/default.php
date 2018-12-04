<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>
<?php // The menu class is deprecated. Use nav instead. ?>
<ul id="responsive" class="nav menu<?php echo $class_sfx;?>"<?php
	$tag = '';

	if ($params->get('tag_id') != null)
	{
		$tag = $params->get('tag_id') . '';
		echo ' id="' . $tag . '"';
	}
?>>
<?php 
//
//$check_mega_leval1 = false;
//$check_mega = '';
//$mega_start = false;
//$mega_end = false;
foreach ($list as $i => &$item)
{
    //$check_mega_leval1 = $item->params->get('xml_stmega',0);
//    $mega_direction = $item->params->get('xml_stdirection',1);
//    if ($mega_direction){
//        $mega_direction = 'mega-ltr';
//    }else{$mega_direction = 'mega-rtl';}
//    $cols_megamenu = $item->params->get('xml_cols',3);
//    if ($check_mega  == $item->parent_id) continue;
	$class = 'item-' . $item->id;
    $id_current = '';
    $id = '';
	if ($item->id == $active_id)
	{
		$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type == 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-active';
		}
	}

	if ($item->type == 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
	}

	if ($item->parent)
	{
		$class .= ' parent';
	}

	if (!empty($class))
	{
		$class = ' class="' . trim($class) . '"';
	}

	echo '<li ' . $class.'>';

	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'url':
		case 'component':
		case 'heading':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper)
	{
		
        //if ($check_mega_leval1){
//            echo '<ul class="mega-submenu cols'.$cols_megamenu.' st-sub-menu  '.$mega_direction.' ">';
//            loadChilds($list,$item->id,$cols_megamenu);
//            // The next item is shallower.
//		echo '</li>';
//		echo str_repeat('</ul></li>',1);
            $check_mega = $item->id;
       // }else{
            
            echo '<ul class="st-submenu">';
     //   }
            
	}
	elseif ($item->shallower)
	{
		// The next item is shallower.
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	else
	{
		// The next item is on the same level.
		echo '</li>';
	}
}
?><li><span id="header-search-button"><a href="#"  class="search-button"><i class="ss-search"></i></a></span></li></ul>