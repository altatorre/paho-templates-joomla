<?php
defined('_JEXEC') or die;
$lkct = 0;
foreach ($this->link_items as &$item) :
	if ($lkct % 3 == 0): ?>
	<div class="column">
	<?php endif; ?>
<div class="block"><a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug)); ?>">
			<?php echo $item->title; ?></a></div>
	<?php if (($lkct+1) % 3 == 0): ?>
	</div><!-- end of column -->
	<?php endif; ?>
	<?php $lkct++; ?>
<?php endforeach; ?>

