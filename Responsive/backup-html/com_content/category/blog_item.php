<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php $canEdit   = ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')); ?>
<?php if ($this->item->state == 0) : ?>
<div class="system-unpublished">
<?php endif; ?>

<?php if ($this->item->params->get('show_title') || $this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon') || $canEdit) : ?>
<!-- esta table mostra o titulo de cada item 'leading' e 'intro' -->
<table class="contentpaneopen<?php echo $this->escape($this->item->params->get( 'pageclass_sfx' )); ?>">
<tr>
	<?php if ($this->item->params->get('show_title')) : ?>
	<td class="contentheading<?php echo $this->escape($this->item->params->get( 'pageclass_sfx' )); ?>" width="100%">
		<h2 class="contentheading<?php echo $this->escape($this->item->params->get( 'pageclass_sfx' )); ?>"><?php if ($this->item->params->get('link_titles') && $this->item->readmore_link != '') : 
		?><a href="<?php echo $this->item->readmore_link; ?>" class="contentpagetitle<?php echo $this->escape($this->item->params->get( 'pageclass_sfx' )); ?>"><?php 
			echo $this->escape($this->item->title); ?></a><?php 
		else : 
			echo $this->escape($this->item->title); 
		endif; ?></h2>
	</td>
	<?php endif; ?>

	<?php if ($this->item->params->get('show_pdf_icon')) : ?>
	<td align="right" width="100%" class="buttonheading">
	<?php echo JHTML::_('icon.pdf', $this->item, $this->item->params, $this->access); ?>
	</td>
	<?php endif; ?>

	<?php if ( $this->item->params->get( 'show_print_icon' )) : ?>
	<td align="right" width="100%" class="buttonheading">
	<?php echo JHTML::_('icon.print_popup', $this->item, $this->item->params, $this->access); ?>
	</td>
	<?php endif; ?>

	<?php if ($this->item->params->get('show_email_icon')) : ?>
	<td align="right" width="100%" class="buttonheading">
	<?php echo JHTML::_('icon.email', $this->item, $this->item->params, $this->access); ?>
	</td>
	<?php endif; ?>
	   <?php if ($canEdit) : ?>
	   <td align="right" width="100%" class="buttonheading">
	   <?php echo JHTML::_('icon.edit', $this->item, $this->item->params, $this->access); ?>
	   </td>
   <?php endif; ?>
</tr>
</table>
<!-- fim da table que mostra o titulo de cada item 'leading' e 'intro' -->
<?php endif; ?>
<?php 
		// cambio jc 20140321 publicacion del metadato dcterms.issued para buscador.
		// @ variables: $row | $this->item | $this->article
		// @ atributos: modified | publish_up 
	$mydocument =& JFactory::getDocument();
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
		$mydescription = str_replace("  ", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
	}
	$mydescription = substr($mydescription,0,159);
	$mydocument->setMetaData( 'description', $mydescription );

?>
<?php  if (!$this->item->params->get('show_intro')) :
	echo $this->item->event->afterDisplayTitle;
endif; ?>
<?php echo $this->item->event->beforeDisplayContent; ?>
<?php echo "<!--  Article # ".$this->item->id." -->"; ?>
<table class="contentpaneopen<?php echo $this->escape($this->item->params->get( 'pageclass_sfx' )); ?>">
<?php if (($this->item->params->get('show_section') && $this->item->sectionid) || ($this->item->params->get('show_category') && $this->item->catid)) : ?>
<tr>
	<td>
		<?php if ($this->item->params->get('show_section') && $this->item->sectionid && isset($this->item->section)) : ?>
		<span>
			<?php if ($this->item->params->get('link_section')) : ?>
				<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->item->sectionid)).'">'; ?>
			<?php endif; ?>
			<?php echo $this->escape($this->item->section); ?>
			<?php if ($this->item->params->get('link_section')) : ?>
				<?php echo '</a>'; ?>
			<?php endif; ?>
				<?php if ($this->item->params->get('show_category')) : ?>
				<?php echo ' - '; ?>
			<?php endif; ?>
		</span>
		<?php endif; ?>
		<?php if ($this->item->params->get('show_category') && $this->item->catid) : ?>
		<span>
			<?php if ($this->item->params->get('link_category')) : ?>
				<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug, $this->item->sectionid)).'">'; ?>
			<?php endif; ?>
			<?php echo $this->escape($this->item->category); ?>
			<?php if ($this->item->params->get('link_category')) : ?>
				<?php echo '</a>'; ?>
			<?php endif; ?>
		</span>
		<?php endif; ?>
	</td>
</tr>
<?php endif; ?>

<?php if (($this->item->params->get('show_author')) && ($this->item->author != "")) : ?>
<tr>
	<td style="width:70%;vertical-align:top" colspan="2">
		<span class="small">
			<?php JText::printf( 'Written by', ($this->escape($this->item->created_by_alias) ? $this->escape($this->item->created_by_alias) : $this->escape($this->item->author)) ); ?>
		</span>
		&nbsp;&nbsp;
	</td>
</tr>
<?php endif; ?>

<?php if ($this->item->params->get('show_create_date')) : ?>
<tr>
	<td style="vertical-align:top" colspan="2" class="createdate">
		<?php echo JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC2')); ?>
	</td>
</tr>
<?php endif; ?>

<?php if ($this->item->params->get('show_url') && $this->item->urls) : ?>
<tr>
	<td style="vertical-align:top" colspan="2">
		<a href="http://<?php echo $this->escape($this->item->urls) ; ?>" target="_blank">
			<?php echo $this->escape($this->item->urls); ?></a>
	</td>
</tr>
<?php endif; ?>

<tr>
<td style="vertical-align:top" colspan="2">
<?php if (isset ($this->item->toc)) : ?>
	<?php echo $this->item->toc; ?>
<?php endif; ?>
<?php echo $this->item->text; ?>
</td>
</tr>

<?php if ( intval($this->item->modified) != 0 && $this->item->params->get('show_modify_date')) : ?>
<tr>
	<td colspan="2"  class="modifydate">
		<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
	</td>
</tr>
<?php endif; ?>

<?php if ($this->item->params->get('show_readmore') && $this->item->readmore) : ?>
<tr>
	<td  colspan="2">
		<a href="<?php echo $this->item->readmore_link; ?>" class="readon<?php echo $this->escape($this->item->params->get('pageclass_sfx')); ?>">
			<?php if ($this->item->readmore_register) :
				echo JText::_('Register to read more...');
			elseif ($readmore = $this->item->params->get('readmore')) :
				echo $readmore;
			else :
				echo JText::sprintf('Read more...');
			endif; ?></a>
	</td>
</tr>
<?php endif; ?>

</table>
<!--  fim da table que mostra o introtext de cada item 'leading' e 'intro' -->


<?php if ($this->item->state == 0) : ?>
</div>
<?php endif; ?>
<div class="article_separator clr"></div>
<?php echo $this->item->event->afterDisplayContent; ?>
