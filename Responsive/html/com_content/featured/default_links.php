<?php
defined('_JEXEC') or die;
$lkct = 0;
foreach ($this->link_items as &$item) :
	if (($lkct == 0) or ($lkct == 2) or ($lkct == 4)): ?>
	<div class="column">
	<?php endif; ?>
<div class="block"><a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug)); ?>">
			<?php echo $item->title; ?></a></div>
	<?php if (($lkct == 1) or ($lkct == 3) or ($lkct == 5)): ?>
	</div>
	<?php endif; ?>
	<?php $lkct++; ?>
<?php endforeach; ?>

