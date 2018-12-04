<?php
defined('_JEXEC') or die;
//JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');
//JHtml::_('behavior.caption');
$cparams =& JComponentHelper::getParams('com_media');

?>

<div class="blog<?php echo $this->pageclass_sfx;?>">
	<?php /* if ($this->params->get('show_page_heading', 1)) :  */ ?>
	<?php if ($this->params->get('show_headings', 1)) : ?>
		<div class="page-header">
			<h1><?php echo $this->escape($this->category->title); ?></h1>
		</div>
	<?php endif; ?>
	
	<?php if ((($this->params->get('show_title', 1) or $this->params->get('page_subheading'))) && ($this->params->get('show_headings', 1) == 0)) : ?>
		<h1><?php echo $this->escape($this->params->get('page_subheading')); ?>
			<?php if ($this->params->get('show_title')) : ?>
				<span class="subheading-category"><?php echo $this->category->title;?></span>
			<?php endif; ?>
</h1>
<?php endif; ?>
	<?php 	$mydocument =& JFactory::getDocument();
		$mydocument->setMetaData( 'robots', "noindex,follow" );  ?>
	<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
		<div class="category-desc">
	<?php if ($this->params->get('show_description_image') && $this->category->image) : ?>
		<img src="<?php echo $this->baseurl . '/' . $cparams->get('image_path') . '/'. $this->category->image;?>" align="<?php echo $this->category->image_position;?>" hspace="6" alt="" />
	<?php endif; ?>
	<?php if ($this->params->get('show_description') && $this->category->description) : ?>
				<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
	<?php endif; ?>
			<div class="clr"></div>
		</div>
<?php endif; ?>

<?php if ($this->params->get('num_leading_articles')) : ?>
		<div class="items-leading">
	<?php for ($i = $this->pagination->limitstart; $i < ($this->pagination->limitstart + $this->params->get('num_leading_articles')); $i++) : ?>
		<?php if ($i >= $this->total) : break; endif; ?>
		<?php $leadingcount=$i; ?>
		<div class="leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>">
		<?php
			$this->item =& $this->getItem($i, $this->params);
			echo $this->loadTemplate('item');
		?>
		</div>
	<?php endfor; ?>
		</div><!-- end items-leading -->
<?php else : $i = $this->pagination->limitstart; endif; ?>
	
	<?php $leadingcount = 0; ?>

<?php
$startIntroArticles = $this->pagination->limitstart + $this->params->get('num_leading_articles');
$numIntroArticles = $startIntroArticles + $this->params->get('num_intro_articles');
if (($numIntroArticles != $startIntroArticles) && ($i < $this->total)) : ?>
<tr>
	<td style="vertical-align:top">
		<table style="width:100%;padding:0px;border-collapse:collapse;border-spacing:0px">
		<tr>
		<?php
			$divider = '';
			if ($this->params->def('multi_column_order', 0)) : // order across, like front page
				for ($z = 0; $z < $this->params->def('num_columns', 2); $z ++) :
					if ($z > 0) : $divider = " column_separator"; endif; ?>
					<?php
					$rows = (int) ($this->params->get('num_intro_articles', 4) / $this->params->get('num_columns'));
					$cols = ($this->params->get('num_intro_articles', 4) % $this->params->get('num_columns'));
					?>
					<td style="vertical-align:top;width:<?php echo intval(100 / $this->params->get('num_columns')) ?>%"
						class="article_column<?php echo $divider ?>">
						<?php
						$loop = (($z < $cols)?1:0) + $rows;

						for ($y = 0; $y < $loop; $y ++) :
							$target = $i + ($y * $this->params->get('num_columns')) + $z;
							if ($target < $this->total && $target < ($numIntroArticles)) :
								$this->item =& $this->getItem($target, $this->params);
								echo $this->loadTemplate('item');
							endif;
						endfor;
						?></td>
				<?php endfor; 
						$i = $i + $this->params->get('num_intro_articles') ; 
			else : // otherwise, order down, same as before (default behaviour)
				for ($z = 0; $z < $this->params->get('num_columns'); $z ++) :
					if ($z > 0) : $divider = " column_separator"; endif; ?>
					<td style="vertical-align:top;width:<?php echo intval(100 / $this->params->get('num_columns')) ?>%" class="article_column<?php echo $divider ?>">
					<?php for ($y = 0; $y < ($this->params->get('num_intro_articles') / $this->params->get('num_columns')); $y ++) :
					if ($i < $this->total && $i < ($numIntroArticles)) :
						$this->item =& $this->getItem($i, $this->params);
						echo $this->loadTemplate('item');
						$i ++;
					endif;
				endfor; ?>
				</td>
		<?php endfor; 
		endif; ?> 
		</tr>
		</table>
	</td>
</tr>
<?php endif; ?>


	<?php
	
	$introcount = (count($this->intro_items));
	$counter = 0;
	if (!empty($this->intro_items)) : ?>
	<?php foreach ($this->intro_items as $key => &$item) : ?>
	<?php
		$key = ($key - $leadingcount) + 1;
		$rowcount = (((int) $key - 1) % (int) $this->columns) + 1;
		$row = $counter / $this->columns;
		if ($rowcount == 1) : ?>
			<div class="items-row cols-<?php echo (int) $this->columns;?> <?php echo 'row-'.$row; ?> row-fluid">
			<?php endif; ?>
				<div class="span<?php echo round((12 / $this->columns));?>">
					<div class="item column-<?php echo $rowcount;?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>">
						<?php
						$this->item = &$item;
						echo $this->loadTemplate('item');
					?>
					</div><!-- end item -->
					<?php $counter++; ?>
				</div><!-- end spann -->
				<?php if (($rowcount == $this->columns) or ($counter == $introcount)): ?>			
			</div><!-- end row -->
		<?php endif; ?>
	<?php endforeach; ?>
	<?php endif; ?>
	
<?php /* if ($this->params->get('num_links') && ($i < $this->total)) : */ ?>


<?php if ($this->params->get('num_links') && ($i < $this->total)) : ?>
<tr>
	<td style="vertical-align:top">
		<div class="blog_more<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
			<?php
				$this->links = array_splice($this->items, $i - $this->pagination->limitstart);
				echo $this->loadTemplate('links');
			?>
		</div>
	</td>
</tr>
<?php endif; ?>



	<?php if (!empty($this->link_items)) : ?>
		<div class="items-more">
			<?php echo $this->loadTemplate('links'); ?>
		</div>
	<?php endif; ?>
	<?php if (!empty($this->children[$this->category->id])&& $this->maxLevel != 0) : ?>
		<div class="cat-children">
			<h3> <?php echo JTEXT::_('JGLOBAL_SUBCATEGORIES'); ?> </h3>
			<?php echo $this->loadTemplate('children'); ?> 
		</div>
	<?php endif; ?>
	<?php if (($this->params->def('show_pagination', 1) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
		<div class="pagination">
			<?php  if ($this->params->def('show_pagination_results', 1)) : ?>
			<p class="counter pull-right"> <?php echo $this->pagination->getPagesCounter(); ?> </p>
			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?> 
		</div>
	<?php  endif; ?>
</div>
