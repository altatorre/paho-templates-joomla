<?php defined('_JEXEC') or die('Restricted access'); ?>
<script type="text/javascript">
/* <![CDATA[ */
	function tableOrdering( order, dir, task ) {
	var form = document.adminForm;

	form.filter_order.value 	= order;
	form.filter_order_Dir.value	= dir;
	document.adminForm.submit( task );
}
/* ]]> */
</script>

<form action="<?php echo JFilterOutput::ampReplace($this->action); ?>" method="post" name="adminForm">
<table role="presentation" style="width:100%;border:0px;border-collapse:collapse; border-spacing:0px;padding:0px">
<tr>
	<td align="right" colspan="4">
	<?php
		echo JText::_('Display Num') .'&nbsp;';
		echo $this->pagination->getLimitBox();
	?>
	</td>
</tr>
<?php if ( $this->params->def( 'show_headings', 1 ) ) : ?>
<tr>
	<th width="10" style="text-align:right;" class="sectiontableheader<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
		<?php echo JText::_('Num'); ?>
	</th>
	<th width="90%" height="20" class="sectiontableheader<?php echo $this->escape($this->params->get( 'pageclass_sfx' )); ?>">
		<?php echo JHTML::_('grid.sort',  'Web Link', 'title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</th>
	<?php if ( $this->params->get( 'show_link_hits' ) ) : ?>

	<th width="30" height="20" class="sectiontableheader<?php echo $this->escape($this->params->get( 'pageclass_sfx' )); ?>" style="text-align:center;" nowrap="nowrap">
		<?php echo JHTML::_('grid.sort',  'Hits', 'hits', $this->lists['order_Dir'], $this->lists['order'] ); ?>
	</th>
	<?php endif; ?>
</tr>
<?php endif; ?>
<?php foreach ($this->items as $item) : ?>
<tr class="sectiontableentry<?php echo $item->odd + 1; ?>">
	<td align="right" style="vertical-align:top">
		<?php echo $this->pagination->getRowOffset( $item->count ); ?>
	</td>
	<td height="20" style="text-align:left;padding-left:40px;text-indent:-40px">
		<?php if ( $item->image ) : ?>
		&nbsp;&nbsp;<?php echo $item->image;?>&nbsp;&nbsp;
		<?php endif; ?>
		<?php echo $item->link; ?>
		<?php if ( $this->params->get( 'show_link_description' ) ) : ?>
		<br /><span class="description"><?php echo nl2br($this->escape($item->description)); ?></span>
		<?php endif; ?>
	</td>
	<?php if ( $this->params->get( 'show_link_hits' ) ) : ?>
	<td align="center" style="vertical-align:top">
		<?php echo $item->hits; ?>
	</td>
	<?php endif; ?>
</tr>
<?php endforeach; ?>
<tr>
	<td align="center" colspan="4" class="sectiontablefooter<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->pagination->getPagesLinks(); ?>
	</td>
</tr>
<tr>
	<td colspan="4" align="right" class="pagecounter">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</td>
</tr>
</table>
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="" />
<input type="hidden" name="viewcache" value="0" />
</form>