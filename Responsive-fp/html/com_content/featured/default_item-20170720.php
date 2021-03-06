<?php
defined('_JEXEC') or die;
$params = &$this->item->params;
$images = json_decode($this->item->images);
$urls = json_decode($this->item->urls);
$canEdit	= $this->item->params->get('access-edit');
$info    = $this->item->params->get('info_block_position', 0);
?>
<?php if ($params->get('show_print_icon') || $params->get('show_email_icon') || $canEdit) : ?>
<div class="btn-group pull-right"> <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-cog"></i><span class="caret"></span> </a>
	<ul class="dropdown-menu">
		<?php if ($params->get('show_print_icon')) : ?>
			<li class="print-icon"> <?php echo JHtml::_('icon.print_popup', $this->item, $params); ?> </li>
		<?php endif; ?>
		<?php if ($params->get('show_email_icon')) : ?>
			<li class="email-icon"> <?php echo JHtml::_('icon.email', $this->item, $params); ?> </li>
		<?php endif; ?>
		<?php if ($canEdit) : ?>
			<li class="edit-icon"> <?php echo JHtml::_('icon.edit', $this->item, $params); ?> </li>
		<?php endif; ?>
	</ul>
</div>
<?php endif; ?>

<?php if ($params->get('show_title')) : ?>

<div class="col-md-6">
	<div class="row">
		<div class="col-sm-6">
			<div class="textholder">
				<?php if ($this->item->number == 0 ) { ?>
				<h1><?php echo JText::_( 'LATEST_NEWS' ); ?></h1>
				<?php } ?>
<?php
				// cambio jc 20170930: Para hacer que los campos de linka funcionen como replacing url para el frontpage. 
		$link_readmore = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
		$text_readmore = JText::_( 'READ MORE...' );
		$target_readmore = '';
		if ($urls->urla) {
			$link_readmore = $urls->urla;
			$text_readmore = $urls->urlatext;
			if ($urls->targeta == 1) $target_readmore = " target=\"_blank\"";
		}
?>
	<h2>
	<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
		<a href="<?php echo $link_readmore; ?>"<?php echo $target_readmore' ?>> <?php echo $this->escape($this->item->title); ?></a>
	<?php else : ?>
		<?php echo $this->escape($this->item->title); ?>
	<?php endif; ?>
	</h2>
<?php endif; ?>

<?php if ($this->item->state == 0): ?>
	<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
<?php endif; ?>

<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
	<small class="createdby">
	<?php $author = $this->item->author; ?>
	<?php $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $author); ?>
	<?php if (!empty($this->item->contactid ) && $params->get('link_author') == true) : ?>
		<?php
		echo JText::sprintf('COM_CONTENT_WRITTEN_BY',
			JHtml::_('link', JRoute::_('index.php?option=com_contact&view=contact&id='.$this->item->contactid), $author)
		); ?>
		<?php else :?>
			<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
		<?php endif; ?>
	</small>
<?php endif; ?>

<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date')
	|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category')); ?>
	
<?php if ($useDefList && ($info == 0 ||  $info == 2)) : ?>
	<div class="article-info muted">
		<dl class="article-info">
		<dt class="article-info-term">
			<?php echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?>
		</dt>

		<?php if ($params->get('show_parent_category') && !empty($this->item->parent_slug)) : ?>
			<dd>
				<div class="parent-category-name">
					<?php $title = $this->escape($this->item->parent_title);
					$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)).'">'.$title.'</a>';?>
					<?php if ($params->get('link_parent_category') && !empty($this->item->parent_slug)) : ?>
						<?php echo JText::sprintf('COM_CONTENT_PARENT', $url); ?>
					<?php else : ?>
						<?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
					<?php endif; ?>
				</div>
			</dd>
		<?php endif; ?>
		<?php if ($params->get('show_category')) : ?>
			<dd>
				<div class="category-name">
					<?php $title = $this->escape($this->item->category_title);
					$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)).'">'.$title.'</a>';?>
					<?php if ($params->get('link_category') && $this->item->catslug) : ?>
						<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
					<?php else : ?>
						<?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
					<?php endif; ?>
				</div>
			</dd>
		<?php endif; ?>

		<?php if ($params->get('show_publish_date')) : ?>
			<dd>
				<div class="published">
					<i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
				</div>
			</dd>
		<?php endif; ?>

		<?php if ($info == 0): ?>
			<?php if ($params->get('show_modify_date')) : ?>
				<dd>
					<div class="modified">
						<i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
					</div>
				</dd>
			<?php endif; ?>
			<?php if ($params->get('show_create_date')) : ?>
				<dd>
					<div class="create">
						<i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->item->created, JText::_('DATE_FORMAT_LC3'))); ?>
					</div>
				</dd>
			<?php endif; ?>

			<?php if ($params->get('show_hits')) : ?>
				<dd>
					<div class="hits">
						<i class="icon-eye-open"></i> <?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?>
					</div>
				</dd>
			<?php endif; ?>
		<?php endif; ?>
		</dl>
	</div>
<?php endif; ?>

<?php if (!$params->get('show_intro')) : ?>
	<?php echo $this->item->event->afterDisplayTitle; ?>
<?php endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?> 
<?php 
	$introtext = $this->item->introtext;
	$posimg = stripos($introtext, '<img');
	$posimg2 = stripos($introtext, '>', $posimg );
	// string substr ( string $string , int $start [, int $length ] )
	$introtext = substr( $introtext, 0, $posimg ) . substr ( $introtext, $posimg2+1 );
	
?>
<?php echo $introtext; ?>

<?php if ($params->get('show_readmore') && $this->item->readmore) :
if ($params->get('access-view')) :
	$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
		// cambio jc 20170920: para lograr que incluya el campo linka. 
	if ($urls->urla) { $link = $link_readmore; }
else :
	$menu = JFactory::getApplication()->getMenu();
	$active = $menu->getActive();
	$itemId = $active->id;
	$link1 = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
	$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
	$link = new JURI($link1);
	$link->setVar('return', base64_encode($returnURL));
endif;
?>
				<a href="<?php echo $link; ?>" class="more"<?php echo $text_readmore; ?>><?php echo $text_readmore; ?></a>
			</div><!-- end of textholder -->
		</div><!-- end of col-sm-6 -->
		<div class="col-sm-6">
      	<div class="img-holder">
				<img
		<?php if ($images->image_intro_caption):
			echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
		endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>" width="310" height="299">
			</div><!-- end of img-holder -->
		</div><!-- end of col-sm-6 -->
	</div><!-- end of row -->
</div><!-- end of col-md-6 -->


	
<?php endif; ?>

<?php if ($this->item->state == 0) : ?>
	</div>
<?php endif; ?>
<?php echo $this->item->event->afterDisplayContent; ?>
