<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
//$params  = $this->item->params;
$params  = $this->params;
//$images  = json_decode($this->item->images);
//$urls    = json_decode($this->item->urls);
//$canEdit = $params->get('access-edit');
$canEdit	= ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own'));
$user    = JFactory::getUser();
//$info    = $params->get('info_block_position', 0);
$info = 1;
JHtml::_('behavior.caption');

?>
<div class="item-page<?php echo $this->article->pageclass_sfx?>">
	<?php /*if ($this->params->get('show_page_heading', 1)) : ?>
		<h1><?php echo $this->escape($this->params->get('page_heading')); ?><?php echo $this->escape($this->params->get('page_title'));  ?></h1>
	<?php endif;*/ ?>
<?php
if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative)
{
	echo $this->item->pagination;
}
?>
	<?php /*if (!$this->print) : ?>
		<?php if ($canEdit || $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
			<div class="btn-group pull-right">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-cog"></i> <span class="caret"></span> </a>
				<?php // Note the actions class is deprecated. Use dropdown-menu instead. ?>
				<ul class="dropdown-menu actions">
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
	<?php else : ?>
		<div class="pull-right">
			<?php echo JHtml::_('icon.print_screen', $this->item, $params); ?>
		</div>
	<?php endif;*/ ?>

	<?php 	/* if ($params->get('show_title') || $params->get('show_author')) : */ ?>
	
	<?php if ( $params->get('show_title') ||   
	(($this->params->get('show_author')) && ($this->article->author != ""))) : ?>
	<div class="heading col-xs-12">
		<?php $h1aux="<h1>" ?>
		<!-- <h1>
			<?php if ($this->_models['article']->_article->state == 0): ?>
				<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>		
			<?php 	$h1aux.="<span class=\"label label-warning\">".JText::_('JUNPUBLISHED')."</span> "; ?>
			<?php endif; ?>
			<?php if ($params->get('show_title')) : ?>
				<?php if ($params->get('link_titles') && !empty($this->item->readmore_link)) : ?>
					<a href="<?php echo $this->item->readmore_link; ?>"> <?php echo $this->escape($this->_models['article']->_article->title); ?></a>
					<?php 	$h1aux.="<a href=\"" . $this->item->readmore_link . "\"> " . $this->escape($this->_models['article']->_article->title) . "</a>"; ?>
				<?php else : ?>
					<?php echo $this->escape($this->_models['article']->_article->title); ?>
					<?php 	$h1aux.=$this->escape($this->_models['article']->_article->title); ?>
				<?php endif; ?>
			<?php endif; ?>
		</h1> -->
			<?php 	$h1aux.="</h1>";
				if ((stripos($h1aux, "}</h1>")) && (stripos($h1aux, " - {"))) { 
						$h1aux = str_replace(' - {', '</h1>'."\n".'<h2>', $h1aux);
						$h1aux = str_replace('}</h1>', '</h2>', $h1aux);
				}
				echo $h1aux;?>
			<?php if ($params->get('show_author') && !empty($this->item->author )) : ?>

				<?php $author = $this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author; ?>
				<?php if (!empty($this->item->contactid) && $params->get('link_author') == true) : ?>
				<?php
				$needle = 'index.php?option=com_contact&view=contact&id=' . $this->item->contactid;
				$menu = JFactory::getApplication()->getMenu();
				$item = $menu->getItems('link', $needle, true);
				$cntlink = !empty($item) ? $needle . '&Itemid=' . $item->id : $needle;
			?>
				<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', JRoute::_($cntlink), $author)); ?>
				<?php else: ?>
				<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
				<?php endif; ?>

				<?php endif; ?>
	</div>
	<?php endif; ?>
	<div class="clearfix"></div>

	<div id="innercontent" class="col-md-12">
		<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date')
			|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category')); ?>
			<?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
				<div class="article-info muted">
					<dl class="article-info">
					<dt class="article-info-term"><!-- \templates\Responsive\html\com_content\article\default.php: l104 <?php echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?> --></dt>
		
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
								<div class="modified">
									<i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC3'))); ?>
								</div>
							</dd>
						<?php endif; ?>
						<?php if ($params->get('show_create_date')) : ?>
							<dd>
								<div class="create">
									<i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->article->created, JText::_('DATE_FORMAT_LC3'))); ?>
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
	$mylanguage = $mydocument->getLanguage();
	$organization = "PAHO WHO";
	if ($mylanguage == "es-es") $organization = "OPS OMS";
	$mytitle_og = $mytitle . " | " . $organization;
	$mytitle = $organization . " | " . $mytitle;
	$mydocument->setTitle($mytitle);
	if (empty($mydocument->_metaTags['standard']['DCTERMS.issued'])) { 
		$mypubdate="";
	} else { 
		$mypubdate=$mydocument->_metaTags['standard']['DCTERMS.issued'];
	}
	//$mypubdate = $mydocument->_metaTags['standard']['DCTERMS.issued'];
	if (($mypubdate == '0000-00-00 00:00:00') || ($mypubdate == '')) $mypubdate = $this->article->created;
	if ($mypubdate <= $this->article->publish_up) {
		$mypubdate=$this->article->publish_up;
		if (($mypubdate == '0000-00-00 00:00:00') || ($mypubdate == '')) $mypubdate = $this->article->publish_up;
		if (($mypubdate == '0000-00-00 00:00:00') || ($mypubdate == '')) $mypubdate = $this->article->created;
		$mydocument->setMetaData( 'DCTERMS.issued', $mypubdate );
		$date1 = date_create($mypubdate);
		$date2 = date_format($date1, 'Y-m-d');
		$mydocument->setMetaData( 'review_date', $date2 );
	}
	$mydescription = $mydocument->description;
	$lengthdescription = strlen($mydescription);
	if ($lengthdescription < 159) {
		$mydescription .= strip_tags ($this->article->text.". ");
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

$images = new stdClass();
$query = "SELECT * FROM #__cf_values where article_id = '".$this->article->id."' and field_id = 1";
$db = &JFactory::getDBO();
$db->setQuery($query);
$newogtagimages = "";
$newtwittertagimages = "";
$rowsimages = $db->loadObject();
if ($rowsimages) {
	$images->image_intro=$rowsimages->value;
			// http://php.net/manual/en/function.strpos.php
	if (strpos(" ".$images->image_intro, "http") === false) { $images->image_intro = "http://www.paho.org/hq/". $images->image_intro; }
	$newogtagimages .= "	<link rel=\"image_src\" type=\"image/png\" href=\"".$images->image_intro."\" />
	<meta property=\"og:image\" content=\"".$images->image_intro."\" />
	<meta property=\"og:image:width\" content=\"300\" />
	<meta property=\"og:image:height\" content=\"300\" />
<meta property=\"og:image:height3\" content=\"300\" />
";
	$newtwittertagimages .= "  <meta name=\"twitter:image:src\" content=\"".$images->image_intro."\" />
";
} 


//	$mydescription = substr($mydescription,0,159) . "...";
	$mydocument->setMetaData( 'description', $mydescription );
	$newogtag = "<meta property=\"og:title\" content=\"".$mytitle_og."\" />
	<meta property=\"og:site_name\" content=\"Pan American Health Organization / World Health Organization\"/>
	<meta property=\"og:type\" content=\"article\" />
	<meta property=\"og:description\" content=\"".$mydocument->description."\" />
	";
	$newtwittertag = "  <meta name=\"twitter:title\" content=\"".$mytitle_og."\"/>
  <meta name=\"twitter:description\" content=\"".$mydescription."\" />

	";

	$newogtagimages_default = "<link rel=\"image_src\" type=\"image/png\" href=\"http://www.paho.org/hq/images/logo-ops.png\" />
	<meta property=\"og:image\" content=\"http://www.paho.org/hq/images/logo-ops.png\" />
	<meta property=\"og:image:width\" content=\"800\" />
	<meta property=\"og:image:height\" content=\"750\" />
	<meta property=\"og:image\" content=\"http://www.paho.org/hq/images/logo-paho.png\" />
	<meta property=\"og:image:width\" content=\"800\" />
	<meta property=\"og:image:height\" content=\"750\" />
";
	$newtwittertagimages_default = "  <meta name=\"twitter:image:src\" content=\"http://www.paho.org/hq/images/logo-paho.png\" />
";
	if ($newogtagimages != "") {
		$newogtag .= $newogtagimages;
	}	else {
		$newogtag .= $newogtagimages_default;
	}
	$mydocument->addCustomTag( $newogtag );

	if ($newtwittertagimages != "") {
		$newtwittertag .= $newtwittertagimages;
	}	else {
		$newtwittertag .= $newtwittertagimages_default;
	}
	$mydocument->addCustomTag( $newtwittertag );
		// https://findmyfbid.com
		// default app. https://stackoverflow.com/questions/38541027/facebook-share-app-id-missing
	$fbid = "<meta property=\"fb:app_id\" content=\"1906460059619279\">
		<meta property=\"article:author\" content=\"https://www.facebook.com/pahowho\" />
		<meta property=\"author\" content=\"https://www.facebook.com/pahowho\" />
";
	$mydocument->addCustomTag( $fbid ); 
?>
	<span class="updated" style="display:none"><?php echo $this->article->modified; ?></span>

			<?php if (!$params->get('show_intro')) : echo $this->article->event->afterDisplayTitle; endif; ?>
			<?php echo $this->article->event->beforeDisplayContent; ?>
			<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '0')) || ($params->get('urls_position') == '0' && empty($urls->urls_position)))
				|| (empty($urls->urls_position) && (!$params->get('urls_position')))) : ?>
			<?php echo $this->loadTemplate('links'); ?>
			<?php endif; ?>
			<?php /* if ($params->get('access-view')): */ ?>
			<?php if ($this->_models['article']->_article->access == 0):?>
			<?php if (isset($images->image_fulltext) && !empty($images->image_fulltext)) : ?>
			<?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
			<div class="pull-<?php echo htmlspecialchars($imgfloat); ?> item-image"> <img
			<?php if ($images->image_fulltext_caption):
				echo 'class="caption"'.' title="' .htmlspecialchars($images->image_fulltext_caption) . '"';
			endif; ?>
			src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>"/> </div>
			<?php endif; ?>
			<?php
			if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && !$this->item->paginationrelative):
				echo $this->item->pagination;
			endif;
			?>
			<?php if (isset ($this->item->toc)) :
				echo $this->item->toc;
			endif; ?>
		<div class="text-block">
		  <?php //echo $this->item->text; ?>
		  <?php echo $this->_models['article']->_article->text; ?>

		</div>

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
								<?php 	$title = $this->escape($this->article->category_title);
								//$url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)) . '">' . $title . '</a>';?>
								<?php if ($params->get('link_category') && $this->article->catslug) : ?>
									<?php //echo JText::sprintf('COM_CONTENT_CATEGORY', $url); ?>
								<?php else : ?>
									<?php //echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
								<?php endif; ?>
							</div>
						</dd>
					<?php endif; ?>
					<?php if ($params->get('show_publish_date')) : ?>
						<dd>
							<div class="published">
								<i class="icon-calendar"></i> <?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $this->article->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
							</div>
						</dd>
					<?php endif; ?>
				<?php endif; ?>
	
				<?php if ($params->get('show_create_date')) : ?>
					<dd>
						<div class="create"><i class="icon-calendar">
							</i> <?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC3'))); ?>
						</div>
					</dd>
				<?php endif; ?>
				<?php if ($params->get('show_modify_date')) : ?>
<?php if ( intval($this->article->modified) !=0 && $this->params->get('show_modify_date')) : ?>
<div class="modifydate modified">
	<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC2'))); ?>
</div>
<?php endif; ?>
					<dd>
						<div class="modified"><i class="icon-calendar">
							</i> <?php echo JText::sprintf('', JHtml::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC3'))); ?>
						</div>
					</dd>
				<?php endif; ?>
				<?php if ($params->get('show_hits')) : ?>
					<dd>
						<div class="hits">
							<i class="icon-eye-open"></i> <?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->article->hits); ?>
						</div>
					</dd>
				<?php endif; ?>
				</dl>
			</div>
		<?php endif; ?>


	
			<?php
		if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative):
			echo $this->item->pagination;
		?>
			<?php endif; ?>
			<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '1')) || ($params->get('urls_position') == '1'))): ?>
			<?php echo $this->loadTemplate('links'); ?>
			<?php endif; ?>
			<?php //optional teaser intro text for guests ?>
			<?php elseif ($params->get('show_noauth') == true && $user->get('guest')) : ?>
			<?php echo $this->item->introtext; ?>
			<?php //Optional link to let them register to see the whole article. ?>
			<?php if ($params->get('show_readmore') && $this->item->fulltext != null) :
				$link1 = JRoute::_('index.php?option=com_users&view=login');
				$link = new JURI($link1);?>
			<p class="readmore">
				<a href="<?php echo $link; ?>">
				<?php $attribs = json_decode($this->item->attribs); ?>
				<?php
				if ($attribs->alternative_readmore == null) :
					echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
				elseif ($readmore = $this->item->alternative_readmore) :
					echo $readmore;
					if ($params->get('show_readmore_title', 0) != 0) :
						echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
					endif;
				elseif ($params->get('show_readmore_title', 0) == 0) :
					echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
				else :
					echo JText::_('COM_CONTENT_READ_MORE');
					echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
				endif; ?>
				</a>
			</p>
			<?php endif; ?>
			<?php endif; ?>
			<?php
		if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && $this->item->paginationrelative) :
			echo $this->item->pagination;
		?>
			<?php endif; ?>
			<?php echo $this->article->event->afterDisplayContent; ?>
	</div>
</div>