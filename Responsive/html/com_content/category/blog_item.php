<?php
defined('_JEXEC') or die;
$params  = $this->item->params;
//$params  = $this->params;
$images = json_decode($this->item->images);
//$canEdit = $params->get('access-edit');
$canEdit	= ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own'));
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
$info = $this->item->params->get('info_block_position', 0);
//JHtml::_('behavior.tooltip');
//JHtml::_('behavior.framework');
?>

<?php if ($params->get('show_print_icon') || $params->get('show_email_icon') || $canEdit) : ?>
	<div class="btn-group pull-right"> <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-cog"></i> <span class="caret"></span> </a>
		<ul class="dropdown-menu">
			<?php if ($params->get('show_print_icon')) : ?>
				<li class="print-icon"> <?php //echo JHtml::_('icon.print_popup', $this->item, $params); ?> </li>
			<?php endif; ?>
			<?php if ($params->get('show_email_icon')) : ?>
				<li class="email-icon"> <?php //echo JHtml::_('icon.email', $this->item, $params); ?> </li>
			<?php endif; ?>
			<?php if ($canEdit) : ?>
				<li class="edit-icon"> <?php //echo JHtml::_('icon.edit', $this->item, $params); ?> </li>
			<?php endif; ?>
		</ul>
	</div>
<?php endif; ?>

<?php if ($params->get('show_title') || $this->item->state == 0 || ($params->get('show_author') && !empty($this->item->author ))) : ?>
	<div class="page-header">
	<?php if ($params->get('show_title')) : ?>
		<h2>
			<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
				<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>"> <?php echo $this->escape($this->item->title); ?></a>
			<?php else : ?>
				<?php echo $this->escape($this->item->title); ?>
			<?php endif; ?>
		</h2>
	<?php endif; ?>

	<?php if ($this->item->state == 0) : ?>
		<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
	<?php endif; ?>

	<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>
		<small class="createdby">
		<?php $author = $this->item->author; ?>
		<?php $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $author); ?>
		<?php if (!empty($this->item->contactid ) && $params->get('link_author') == true) : ?>
			<?php
			echo JText::sprintf(
			'COM_CONTENT_WRITTEN_BY',
			JHtml::_('link', JRoute::_('index.php?option=com_contact&view=contact&id=' . $this->item->contactid), $author)
			); ?>
		<?php else :?>
			<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
		<?php endif; ?>
		</small>
	<?php endif; ?>
	</div>
<?php endif; ?>

<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category')); ?>
<?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
	<div class="article-info muted">
		<dl class="article-info">
		<dt class="article-info-term">
			<?php //echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?>
		</dt>

		<?php if ($params->get('show_parent_category') && !empty($this->item->parent_slug)) : ?>
			<dd>
				<div class="parent-category-name">
					<?php $title = $this->escape($this->item->parent_title);
					$url = '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)) . '">' . $title . '</a>';?>
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
					$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)) . '">' . $title . '</a>';?>
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
					<div class="modified modifydate">
						<i class="icon-calendar"></i> <?php echo JText::sprintf('LAST_UPDATED2', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
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

<?php 
		// cambio jc 20140321 publicacion del metadato dcterms.issued para buscador.
		// @ variables: $row | $this->item | $this->article
		// @ atributos: modified | publish_up 
		// http://stackoverflow.com/questions/16171686/list-of-standard-w3c-meta-tags
	$mydocument =& JFactory::getDocument();
	$mytitle = $mydocument->getTitle();
	if ((stripos( $mytitle, 'PAHO WHO') !== 0) && (stripos( $mytitle, 'OPS OMS') !== 0)) {
		$mylanguage = $mydocument->getLanguage();
		$organization = "PAHO WHO";
		if ($mylanguage == "es-es") $organization = "OPS OMS";
		$mytitle = $organization . " | " . $mytitle;
		$mydocument->setTitle($mytitle);
	}
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
	$desc = explode(' ', $mydescription);
	$desc = array_slice($desc, 0, 29);
	$mydescription = implode(" ", $desc);
	$mydescription = htmlentities($mydescription, ENT_COMPAT, "UTF-8");

//	$mydescription = substr($mydescription,0,159) . "...";
	$mydocument->setMetaData( 'description', $mydescription );
	$newtag = "<meta property=\"og:title\" content=\"$mytitle\" />
	<meta property=\"og:site_name\" content=\"Pan American Health Organization / World Health Organization\"/>
	<meta property=\"og:type\" content=\"article\" />
	<meta property=\"og:description\" content=\"".$mydocument->description."\" />
	<link rel=\"image_src\" type=\"image/png\" href=\"http://www.paho.org/hq/images/logo-ops.png\" />
	<meta property=\"og:image\" content=\"http://www.paho.org/hq/images/logo-ops.png\" />
	<meta property=\"og:image:width\" content=\"200\" />
	<meta property=\"og:image:height\" content=\"200\" />
	<meta property=\"og:image\" content=\"http://www.paho.org/hq/images/logo-paho.png\" />
	<meta property=\"og:image:width\" content=\"200\" />
	<meta property=\"og:image:height\" content=\"200\" />
";
	$mydocument->addCustomTag( $newtag );
?>
<?php if (!$params->get('show_intro')) : ?>
	<?php echo $this->item->event->afterDisplayTitle; ?>
<?php endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?>

<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
	<div class="img-intro-<?php echo htmlspecialchars($imgfloat); ?>">
		<img
		<?php if ($images->image_intro_caption):
			echo 'class="caption"'.' title="' . htmlspecialchars($images->image_intro_caption) . '"';
		endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
	</div>
<?php endif; ?>

<?php echo $this->item->introtext; ?>

<?php if ($useDefList && ($info == 1 || $info == 2)) : ?>
	<div class="article-info muted">
		<dl class="article-info">
		<dt class="article-info-term"><?php //echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?></dt>

		<?php if ($info == 1): ?>
			<?php if ($params->get('show_parent_category') && !empty($this->item->parent_slug)) : ?>
				<dd>
					<div class="parent-category-name">
						<?php	$title = $this->escape($this->item->parent_title);
						$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->parent_slug)) . '">' . $title . '</a>';?>
						<?php if ($params->get('link_parent_category') && $this->item->parent_slug) : ?>
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
						<?php 	$title = $this->escape($this->item->category_title);
						$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)) . '">' . $title . '</a>';?>
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
		<?php endif; ?>

		<?php if ($params->get('show_create_date')) : ?>
			<dd>
				<div class="create"><i class="icon-calendar">
					</i> <?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
				</div>
			</dd>
		<?php endif; ?>
		<?php if ($params->get('show_modify_date')) : ?>
			<dd>
				<div class="modified"><i class="icon-calendar">
					</i> <?php echo JText::sprintf('LAST_UPDATED2', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
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
		</dl>
	</div>
<?php endif; ?>

<?php 
if ($params->get('show_readmore') && $this->item->readmore) :
	/* if ($params->get('access-view')) : */
	if ($this->item->access == 0) :
		//$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
		$link = $this->item->readmore_link;
/*	else :
		$menu = JFactory::getApplication()->getMenu();
		$active = $menu->getActive();
		$itemId = $active->id;
		$link1 = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
		$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
		$link = new JURI($link1);
		$link->setVar('return', base64_encode($returnURL)); */
	endif;
	?>
	<a class="more btn" href="<?php echo $link; ?>"> <i class="icon-chevron-right"></i>
	<?php if ($this->item->access != 0) :
		echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
	elseif ($readmore = $this->item->alternative_readmore) :
		echo $readmore;
		if ($params->get('show_readmore_title', 0) != 0) :
			echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
		endif;
	elseif ($params->get('show_readmore_title', 0) == 0) :
		echo JText::sprintf('READ MORE...');
	else :
		echo JText::_('COM_CONTENT_READ_MORE');
		echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
	endif; ?>
	</a>
<?php endif; ?>


<div style="clear: both"></div>
<hr />
<?php echo $this->item->event->afterDisplayContent; ?>

