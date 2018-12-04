<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$total = count($list);

if($total > 2){
	$list = array_slice($list, 2);
	$total = $total - 2;
}else{
	$list = array();
}
$catids = $params->get('catid');
?>
<?php if($list): ?>
<div class="threecolumns">
	<div class="column">
	<?php $i=1; foreach ($list as $item) : ?>
		<div class="block"><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></div>
	<?php
	if($i++%2 == 0 && $i-1 != $total)
		echo "</div>\n<div class=\"column\">";
	endforeach; ?>
	</div>
	<?php if(count($catids) == 1): ?>
	<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($catids[0])); ?>" class="more"><?php echo JText::_('All News'); ?></a>
	<?php endif; ?>
</div>
<?php endif; ?>