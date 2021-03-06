<?php
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

JHtml::_('behavior.caption');
?>
<?php if ($this->params->get('show_page_heading') != 0) : ?>
	<div class="page-header">
		<h1>
			<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
	</div>
<?php endif; ?>

	<?php $leadingcount = 0; ?>

			<div class="twocolumns row">	
	<?php if (!empty($this->lead_items)) : ?>
			<?php 	foreach ($this->lead_items as &$item) : ?>
					<?php
						$this->item = &$item;
						$this->item->number = $leadingcount;
						echo $this->loadTemplate('item');
					?>
				<?php
					$leadingcount++;
				?>
			<?php endforeach; ?>
	<?php endif; ?>
</div><!-- end of twocolumns row -->
	<?php
		$introcount = (count($this->intro_items));
		$counter = 0;
	?>
	<?php if (!empty($this->intro_items)) : ?>
		<?php foreach ($this->intro_items as $key => &$item) : ?>

			<?php
			$key = ($key - $leadingcount) + 1;
			$rowcount = (((int) $key - 1) % (int) $this->columns) + 1;
			$row = $counter / $this->columns;

			if ($rowcount == 1) : ?>

			<div class="items-row cols-<?php echo (int) $this->columns;?> <?php echo 'row-'.$row; ?> row-fluid">
			<?php endif; ?>
				<div class="item column-<?php echo $rowcount;?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?> span<?php echo round((12 / $this->columns));?>">
				<?php
						$this->item = &$item;
						echo $this->loadTemplate('item');
				?>
				</div>
				<?php $counter++; ?>

				<?php if (($rowcount == $this->columns) or ($counter == $introcount)): ?>

			</div>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
	<?php if (!empty($this->link_items)) : ?>
		<div class="container1 row">
        <div class="col-xs-12">
          <h2><?php echo JText::_( 'MORE_NEWS' ); ?></h2>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-12">
          <div class="fourcolumns">
		<?php echo $this->loadTemplate('links'); ?>
			</div>
	<?php endif; ?>
	<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
		<div class="pagination">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<p class="counter pull-right">
					<?php echo $this->pagination->getPagesCounter(); ?>
				</p>
			<?php  endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?>
		</div>
	<?php endif; ?>

