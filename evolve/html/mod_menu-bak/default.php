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

$check_mega_leval1 = false;
$check_mega = '';
$mega_start = false;
$mega_end = false;
foreach ($list as $i => &$item)
{
    $check_mega_leval1 = $item->params->get('xml_stmega',0);
    $cols_megamenu = $item->params->get('xml_cols',3);
    if ($check_mega  == $item->parent_id) continue;
	$class = 'item-' . $item->id;
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

	echo '<li' . $class . '>';

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
		
        if ($check_mega_leval1){
            echo '<ul class="cols'.$cols_megamenu.' nav-child unstyled small">';
            loadChilds($list,$item->id,$cols_megamenu);
            // The next item is shallower.
		echo '</li>';
		echo str_repeat('</ul></li>',1);
            $check_mega = $item->id;
        }else{
            
            echo '<ul class="nav-child unstyled small">';
        }
            
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
?></ul>
<?php 
    function loadChilds($list,$id,$cols_megamenu){
        $app  = JFactory::getApplication();
        $items = 1;
        $items = JFactory::getDbo()->setQuery('select * from #__menu as menu where menu.parent_id='.$id)->loadObjectList();
        
         $check_mega = 0;
         if ($items != null){
            $dem = 1;
            foreach($items as $i=>$val) {
                // config number col
                $cols = count($items)%$cols_megamenu;
                if ($cols > 0){
                    $col_items = count($items)/$cols_megamenu+1;
                }else{
                    $col_items = count($items)/$cols_megamenu;
                }
                if ((int)$val->parent_id !== (int)$id) continue;$val->flink = '';
                switch ($val->type)
					{
					   
						case 'separator':
						case 'heading':
							// No further action needed.
							continue;

						case 'url':
							if ((strpos($val->link, 'index.php?') === 0) && (strpos($val->link, 'Itemid=') === false))
							{
								// If this is an internal Joomla link, ensure the Itemid is set.
								$val->flink = $val->link . '&Itemid=' . $val->id;
							}
							break;

						case 'alias':
							// If this is an alias use the item id stored in the parameters to make the link.
							$val->flink = 'index.php?Itemid=' . $val->params->get('aliasoptions');
							break;

						default:
                            
							$router = $app::getRouter();

							if ($router->getMode() == JROUTER_MODE_SEF)
							{
								$val->flink = 'index.php?Itemid=' . $val->id;
							}
							else
							{
								$val->flink .= '&Itemid=' . $val->id;
							}
							break;
					}
                    if (strcasecmp(substr($val->flink, 0, 4), 'http') && (strpos($val->flink, 'index.php?') !== false))
					{
						$val->flink = JRoute::_($val->flink, true, json_decode($val->params)->secure);
					}
					else
					{
						$val->flink = JRoute::_($val->flink);
					}
                //unset($list[$i]);
                $check_mega = json_decode($val->params)->xml_stmega;
                if ($dem == 1){ echo '<li class="col1"><ol><li>';}else {echo '<li>';}
                //separator
                if ($val->type == 'separator'){
                    // Note. It is important to remove spaces between elements.
                    $title = $val->anchor_title ? ' title="' . $val->anchor_title . '" ' : '';
                    if ($val->menu_image)
                    	{
                    		$val->params->get('menu_text', 1) ?
                    		$linktype = '<img src="' . $val->menu_image . '" alt="' . $val->title . '" /><span class="image-title">' . $val->title . '</span> ' :
                    		$linktype = '<img src="' . $val->menu_image . '" alt="' . $val->title . '" />';
                    }
                    else
                    {
                    	$linktype = $val->title;
                    }
                    
                    ?>
                    <span class="separator"<?php echo $title; ?>>
                    	<?php echo $linktype; ?>
                    </span>
                <?php    
                }else if ($val->type == 'url'){ //url
                    // Note. It is important to remove spaces between elements.
                    $class = $val->anchor_css ? 'class="' . $val->anchor_css . '" ' : '';
                    $title = $val->anchor_title ? 'title="' . $val->anchor_title . '" ' : '';
                    
                    if ($val->menu_image)
                    	{
                    		$val->params->get('menu_text', 1) ?
                    		$linktype = '<img src="' . $val->menu_image . '" alt="' . $val->title . '" /><span class="image-title">' . $val->title . '</span> ' :
                    		$linktype = '<img src="' . $val->menu_image . '" alt="' . $val->title . '" />';
                    }
                    else
                    {
                    	$linktype = $val->title;
                    }
                    
                    $flink = $val->flink;
                    $flink = JFilterOutput::ampReplace(htmlspecialchars($flink));
                    
                    switch ($val->browserNav) :
                    	default:
                    	case 0:
                    ?><a <?php echo $class; ?>href="<?php echo $flink; ?>" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
                    		break;
                    	case 1:
                    		// _blank
                    ?><a <?php echo $class; ?>href="<?php echo $flink; ?>" target="_blank" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
                    		break;
                    	case 2:
                    		// window.open
                    		$options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,'.$params->get('window_open');
                    			?><a <?php echo $class; ?>href="<?php echo $flink; ?>" onclick="window.open(this.href,'targetWindow','<?php echo $options;?>');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
                    		break;
                    endswitch;
                }else if ($val->type == 'component'){//com
                
                    // Note. It is important to remove spaces between elements.
                    $class = $val->anchor_css ? 'class="' . $val->anchor_css . '" ' : '';
                    $title = $val->anchor_title ? 'title="' . $val->anchor_title . '" ' : '';
                    
                    if ($val->menu_image)
                    {
                    	$val->params->get('menu_text', 1) ?
                    	$linktype = '<img src="' . $val->menu_image . '" alt="' . $val->title . '" /><span class="image-title">' . $val->title . '</span> ' :
                    	$linktype = '<img src="' . $val->menu_image . '" alt="' . $val->title . '" />';
                    }
                    else
                    {
                    	$linktype = $val->title;
                    }
                    
                    switch ($val->browserNav)
                    {
                    	default:
                    	case 0:
                    ?><a <?php echo $class; ?>href="<?php echo $val->flink; ?>" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
                    		break;
                    	case 1:
                    		// _blank
                    ?><a <?php echo $class; ?>href="<?php echo $val->flink; ?>" target="_blank" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
                    		break;
                    	case 2:
                    	// window.open
                    ?><a <?php echo $class; ?>href="<?php echo $val->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a>
                    <?php
                    		break;
                    }
                }elseif ($val->type == 'heading'){
                    echo '<span class="nav-header">'.$val->title.'</span>';
                }else{
                    // Note. It is important to remove spaces between elements.
                    $class = $val->anchor_css ? 'class="' . $val->anchor_css . '" ' : '';
                    $title = $val->anchor_title ? 'title="' . $val->anchor_title . '" ' : '';
                    
                    if ($val->menu_image)
                    	{
                    		$val->params->get('menu_text', 1) ?
                    		$linktype = '<img src="' . $val->menu_image . '" alt="' . $val->title . '" /><span class="image-title">' . $val->title . '</span> ' :
                    		$linktype = '<img src="' . $val->menu_image . '" alt="' . $val->title . '" />';
                    }
                    else
                    {
                    	$linktype = $val->title;
                    }
                    
                    $flink = $val->flink;
                    $flink = JFilterOutput::ampReplace(htmlspecialchars($flink));
                    
                    switch ($val->browserNav) :
                    	default:
                    	case 0:
                    ?><a <?php echo $class; ?>href="<?php echo $flink; ?>" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
                    		break;
                    	case 1:
                    		// _blank
                    ?><a <?php echo $class; ?>href="<?php echo $flink; ?>" target="_blank" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
                    		break;
                    	case 2:
                    		// window.open
                    		$options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,'.$params->get('window_open');
                    			?><a <?php echo $class; ?>href="<?php echo $flink; ?>" onclick="window.open(this.href,'targetWindow','<?php echo $options;?>');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
                    		break;
                    endswitch;
                }
                //
                if ($val->deeper)
            	{
            		echo '<ul class="nav-child unstyled small">';
                    if ($check_mega)
                        loadChilds($list,$val->id,$cols_megamenu);
            	}
                else if ($val->shallower){
            		// The next item is shallower.
            		echo '</li>';
            		echo str_repeat('</ul></li>', $val->level_diff);
            	}else{
                   if ($dem >= $col_items){
                        $dem = 1;
                        echo '</li></ol></li>';
                   }else{
                        // The next item is on the same level.
                        echo '</li>';
                        $dem++;
                   }
                   
            	}
                ?>
            </li>
          <?php     
         }  
      }
    }
    
?>