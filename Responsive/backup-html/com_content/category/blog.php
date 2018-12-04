<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$cparams =& JComponentHelper::getParams('com_media');
?>
<?php if ($this->params->get('show_page_title', 1)) : ?>
<h1 class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
</h1>
<?php endif; ?>
<table class="blog<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>" style="padding:0px;border-collapse:collapse;border-spacing:0px">
<?php if ($this->params->def('show_description', 1) || $this->params->def('show_description_image', 1)) :?>
<tr>
	<td style="vertical-align:top">
	<?php if ($this->params->get('show_description_image') && $this->category->image) : ?>
		<img src="<?php echo $this->baseurl . '/' . $cparams->get('image_path') . '/'. $this->category->image;?>" align="<?php echo $this->category->image_position;?>" hspace="6" alt="" />
	<?php endif; ?>
	<?php if ($this->params->get('show_description') && $this->category->description) : ?>
		<?php echo $this->category->description; ?>
	<?php endif; ?>
	<?php if (($this->params->get('show_description_image') && $this->category->image) || ($this->params->get('show_description') && $this->category->description)) : ?>
		<br />
		<br />
	<?php endif; ?>
	</td>
</tr>
<?php endif; ?>
<?php if ($this->params->get('num_leading_articles')) : ?>
<tr>
	<td style="vertical-align:top">
	<?php for ($i = $this->pagination->limitstart; $i < ($this->pagination->limitstart + $this->params->get('num_leading_articles')); $i++) : ?>
		<?php if ($i >= $this->total) : break; endif; ?>
		<div>
		<?php
			$this->item =& $this->getItem($i, $this->params);
			echo $this->loadTemplate('item');
		?>
		</div>
	<?php endfor; ?>
	</td>
</tr>
<?php else : $i = $this->pagination->limitstart; endif; ?>

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
					<td style="<?php if ($z < 1) echo 'padding-right: 12px;'; ?><?php if ($z > 0) echo 'padding-left: 12px;'; ?>vertical-align:top;width:<?php echo intval(100 / $this->params->get('num_columns')) ?>%" class="article_column<?php echo $divider ?>">
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
<?php if ($this->params->get('show_pagination')) : ?>
<?php if ($this->pagination->getPagesLinks()!="") { ?>
<tr>
	<td style="vertical-align:top;text-align:center">
		<?php echo $this->pagination->getPagesLinks(); ?>
		<br /><br />
	</td>
</tr>
<?php } ?>
<?php endif; ?>
<?php if ($this->params->get('show_pagination_results')) : ?>
<?php if ($this->pagination->getPagesCounter() != "") {  ?>
<tr>
	<td style="vertical-align:top;text-align:center">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</td>
</tr>
<?php } ?>
<?php endif; ?>
</table>
