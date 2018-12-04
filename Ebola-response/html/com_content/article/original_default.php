<?php // no direct access
defined('_JEXEC') or die('Restricted access');

$canEdit	= ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own'));
if ($this->params->get('show_page_title', 1) && $this->params->get('page_title') != $this->article->title) :
?><h1 class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>"><?php
	echo $this->escape($this->params->get('page_title'));
?></h1><!-- componentheading -->
<?php endif; ?>
<?php if ($canEdit || $this->params->get('show_title') || $this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon')) : ?>
<table role="presentation" class="contentpaneopen<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
<tr>
	<?php if ($this->params->get('show_title')) : ?>
	<td class="contentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>" width="100%">
		<?php if ($this->params->get('link_titles') && $this->article->readmore_link != '') : ?>
		<a href="<?php echo $this->article->readmore_link; ?>" class="contentpagetitle<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
			<?php echo $this->escape($this->article->title); ?></a>
		<?php else : ?>
			<?php echo $this->escape($this->article->title); ?>
		<?php endif; ?>
	</td>
	<?php endif; ?>
	<?php if (!$this->print) : ?>
		<?php if ($this->params->get('show_pdf_icon')) : ?>
		<td align="right" width="100%" class="buttonheading">
		<?php echo JHTML::_('icon.pdf',  $this->article, $this->params, $this->access); ?>
		</td>
		<?php endif; ?>

		<?php if ( $this->params->get( 'show_print_icon' )) : ?>
		<td align="right" width="100%" class="buttonheading">
		<?php echo JHTML::_('icon.print_popup',  $this->article, $this->params, $this->access); ?>
		</td>
		<?php endif; ?>

		<?php if ($this->params->get('show_email_icon')) : ?>
		<td align="right" width="100%" class="buttonheading">
		<?php echo JHTML::_('icon.email',  $this->article, $this->params, $this->access); ?>
		</td>
		<?php endif; ?>
		<?php if ($canEdit) : ?>
		<td align="right" width="100%" class="buttonheading">
			<?php echo JHTML::_('icon.edit', $this->article, $this->params, $this->access); ?>
		</td>
		<?php endif; ?>
	<?php else : ?>
		<td align="right" width="100%" class="buttonheading">
		<?php echo JHTML::_('icon.print_screen',  $this->article, $this->params, $this->access); ?>
		</td>
	<?php endif; ?>
</tr>
</table>
<?php endif; ?>
<?php 
		// cambio jc 20140321 publicacion del metadato dcterms.issued para buscador.
		// @ variables: $row | $this->item | $this->article
		// @ atributos: modified | publish_up 
	$mydocument =& JFactory::getDocument();
	$mypubdate = $mydocument->_metaTags['standard']['dcterms.issued'];
	if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $this->article->created;
	if ($mypubdate < $this->article->modified) {
		$mypubdate=$this->article->modified;
		if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $this->article->publish_up;
		if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $this->article->created;
		$mydocument->setMetaData( 'dcterms.issued', $mypubdate );
		$date1 = date_create($mypubdate);
		$date2 = date_format($date1, 'Y-m-d');
		$mydocument->setMetaData( 'review_date', $date2 );
	}
?>
<?php  if (!$this->params->get('show_intro')) :
	echo $this->article->event->afterDisplayTitle;
endif; ?>
<?php echo $this->article->event->beforeDisplayContent; ?>
<table role="presentation" class="contentpaneopen<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
<?php if (($this->params->get('show_section') && $this->article->sectionid) || ($this->params->get('show_category') && $this->article->catid)) : ?>
<tr>
	<td>
		<?php if ($this->params->get('show_section') && $this->article->sectionid && isset($this->article->section)) : ?>
		<span>
			<?php if ($this->params->get('link_section')) : ?>
				<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->article->sectionid)).'">'; ?>
			<?php endif; ?>
			<?php echo $this->escape($this->article->section); ?>
			<?php if ($this->params->get('link_section')) : ?>
				<?php echo '</a>'; ?>
			<?php endif; ?>
				<?php if ($this->params->get('show_category')) : ?>
				<?php echo ' - '; ?>
			<?php endif; ?>
		</span>
		<?php endif; ?>
		<?php if ($this->params->get('show_category') && $this->article->catid) : ?>
		<span>
			<?php if ($this->params->get('link_category')) : ?>
				<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->article->catslug, $this->article->sectionid)).'">'; ?>
			<?php endif; ?>
			<?php echo $this->escape($this->article->category); ?>
			<?php if ($this->params->get('link_category')) : ?>
				<?php echo '</a>'; ?>
			<?php endif; ?>
		</span>
		<?php endif; ?>
	</td>
</tr>
<?php endif; ?>
<?php if (($this->params->get('show_author')) && ($this->article->author != "")) : ?>
<tr>
	<td valign="top">
		<span class="small">
			<?php JText::printf( 'Written by', ($this->escape($this->article->created_by_alias) ? $this->escape($this->article->created_by_alias) : $this->escape($this->article->author)) ); ?>
		</span>
		&nbsp;&nbsp;
	</td>
</tr>
<?php endif; ?>

<?php if ($this->params->get('show_create_date')) : ?>
<tr>
	<td valign="top" class="createdate">
		<?php echo JHTML::_('date', $this->article->created, JText::_('DATE_FORMAT_LC2')) ?>
	</td>
</tr>
<?php endif; ?>

<?php if ($this->params->get('show_url') && $this->article->urls) : ?>
<tr>
	<td valign="top">
		<a href="http://<?php echo $this->article->urls ; ?>" target="_blank">
			<?php echo $this->escape($this->article->urls); ?></a>
	</td>
</tr>
<?php endif; ?>

<tr>
<td valign="top">
<?php if (isset ($this->article->toc)) : ?>
	<?php echo $this->article->toc; ?>
<?php endif; ?>
<?php echo $this->article->text; ?>
</td>
</tr>

<?php if ( intval($this->article->modified) !=0 && $this->params->get('show_modify_date')) : ?>
<tr>
	<td class="modifydate">
		<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC2'))); ?>
	</td>
</tr>
<?php endif; ?>
</table>
<div class="article_separator clr"></div>
<?php echo $this->article->event->afterDisplayContent; ?>
