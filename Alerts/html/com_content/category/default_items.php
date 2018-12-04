<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<script type="text/javascript">
/* <![CDATA[ */
	function tableOrdering( order, dir, task )
	{
		var form = document.adminForm;

		form.filter_order.value 	= order;
		form.filter_order_Dir.value	= dir;
		document.adminForm.submit( task );
	}
/* ]]> */		
</script><!-- category\default_items -->
<form action="<?php echo $this->action; ?>" method="post" name="adminForm">
<?php if ($this->params->get('filter') || $this->params->get('show_pagination_limit')) : ?>
		<table role="presentation" style="background-color:#EEEEEE; width:100%; padding:10px">
		<tr>
		<?php if ($this->params->get('filter')) : ?>
			<td style="text-align:left" width="60%" nowrap="nowrap">
				<?php echo JText::_($this->params->get('filter_type') . ' Filter').'&nbsp;'; ?>
				<input type="text" name="filter" value="<?php echo $this->escape($this->lists['filter']);?>" class="inputbox" onchange="document.adminForm.submit();" />
			</td>
		<?php endif; ?>
		<?php if ($this->params->get('show_pagination_limit')) : ?>
			<td style="text-align:right" width="40%" nowrap="nowrap">
			<?php
				echo '&nbsp;&nbsp;&nbsp;'.JText::_('Display Num').'&nbsp;';
				echo $this->pagination->getLimitBox();
			?>
			</td>
		<?php endif; ?>
		</tr>
		</table>
<?php endif; ?>
<?php if ($this->params->get('show_headings')) : ?>
	<!-- <td class="sectiontableheader<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>" align="right" width="5%">
		<?php echo JText::_('Num'); ?>
	</td> -->
	Ordenar por: 
	<?php if ($this->params->get('show_title')) : ?>
		[<?php echo JHTML::_('grid.sort',  'Item Title', 'a.title', $this->lists['order_Dir'], $this->lists['order'] ); ?>]
	<?php endif; ?>
	<?php if ($this->params->get('show_date')) : ?>
		[<?php echo JHTML::_('grid.sort',  'Date', 'a.created', $this->lists['order_Dir'], $this->lists['order'] ); ?>]
	<?php endif; ?>
	<?php if ($this->params->get('show_author')) : ?>
		[<?php echo JHTML::_('grid.sort',  'Author', 'author', $this->lists['order_Dir'], $this->lists['order'] ); ?>]
	<?php endif; ?>
	<?php if ($this->params->get('show_hits')) : ?>
		[<?php echo JHTML::_('grid.sort',  'Hits', 'a.hits', $this->lists['order_Dir'], $this->lists['order'] ); ?>]
	<?php endif; ?>
<?php endif; ?>
<ul>
<?php foreach ($this->items as $item) : ?>
	<!-- <td align="right">
		<?php echo $this->pagination->getRowOffset( $item->count ); ?>
	</td> -->
	<li>
	<?php if ($this->params->get('show_title')) : ?>
	<?php if ($item->access <= $this->user->get('aid', 0)) : ?>
	
		<a href="<?php echo $item->link; ?>">
			<?php echo $this->escape($item->title); ?></a>
			<?php $this->item = $item; echo JHTML::_('icon.edit', $item, $this->params, $this->access) ?>
<?php	// cambio jc 20140321 publicacion del metadato dcterms.issued para buscador.
		// @ variables: $row | $this->item | $this->article
		// @ atributos: modified | publish_up 
	$mydocument = JFactory::getDocument();
	$mypubdate = $mydocument->_metaTags['standard']['dcterms.issued'];
	if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $this->item->created;
	if ($mypubdate < $this->item->modified) { 
		$mypubdate=$this->item->modified;
		if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $this->item->publish_up;
		if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $this->item->created;
		$mydocument->setMetaData( 'dcterms.issued', $mypubdate ); 
		$date1 = date_create($mypubdate);
		$date2 = date_format($date1, 'Y-m-d');
		$mydocument->setMetaData( 'review_date', $date2 ); 
	}
	$mydescription = $mydocument->description;
	$lengthdescription = strlen($mydescription);
	if ($lengthdescription < 159) {
		$mydescription .= strip_tags ($this->item->title.". ");
		$mydescription = str_replace("&nbsp;", " ", $mydescription);
		$mydescription = str_replace("\r\n", " ", $mydescription);
		$mydescription = str_replace("\t", " ", $mydescription);
		$mydescription = str_replace("\"", "", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
	}
	$mydescription = substr($mydescription,0,159);
	$mydocument->setMetaData( 'description', $mydescription );
?>	
	<?php else : ?>
	
		<?php
			echo $this->escape($item->title).' : ';
			$link = JRoute::_('index.php?option=com_user&view=login');
			$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug, $item->sectionid), false);
			$fullURL = new JURI($link);
			$fullURL->setVar('return', base64_encode($returnURL));
			$link = $fullURL->toString();
		?>
		<a href="<?php echo $link; ?>">
			<?php echo JText::_( 'Register to read more...' ); ?></a>
	
	<?php endif; ?>
	<?php endif; ?>
	<?php if ($this->params->get('show_date')) : ?>(<?php echo $item->created; ?>) <?php endif; ?>
	<?php if ($this->params->get('show_author')) : ?><i><?php echo "".$this->escape($item->created_by_alias) ? $this->escape($item->created_by_alias) : $this->escape($item->author); ?></i><?php endif; ?>
	<?php if ($this->params->get('show_hits')) : ?>[<?php echo $this->escape($item->hits) ? $this->escape($item->hits) : '-'; ?> hits]<?php endif; ?>
	</li>
<?php endforeach; ?>
</ul>
<?php if ($this->params->get('show_pagination')) : ?>
<table role="presentation" style="width:100%;border:0px;border-collapse:collapse; border-spacing:0px;padding:0px">
<tr>
	<td colspan="5">&nbsp;</td>
</tr>
<tr>
	<td  style="text-align:center" colspan="4" class="sectiontablefooter<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
		<?php echo $this->pagination->getPagesLinks(); ?>
	</td>
</tr>
<tr>
	<td colspan="5" style="text-align:right">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</td>
</tr>
</table>
<?php endif; ?>

<input type="hidden" name="id" value="<?php echo $this->category->id; ?>" />
<input type="hidden" name="sectionid" value="<?php echo $this->category->sectionid; ?>" />
<input type="hidden" name="task" value="<?php echo $this->lists['task']; ?>" />
<input type="hidden" name="filter_order" value="" />
<input type="hidden" name="filter_order_Dir" value="" />
<input type="hidden" name="limitstart" value="0" />
<input type="hidden" name="viewcache" value="0" />
</form>
