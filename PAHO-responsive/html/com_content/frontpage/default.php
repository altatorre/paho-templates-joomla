<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if ($this->params->get('show_page_title', 1)) : ?>
<h2 class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
</h2>
<?php endif; ?>
<table class="blog<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>" style="padding:0px;border-collapse:collapse;border-spacing:0px">
<?php if ($this->params->def('num_leading_articles', 1)) : ?>
<tr>
	<td style="vertical-align:top">
	<?php for ($i = $this->pagination->limitstart; $i < ($this->pagination->limitstart + $this->params->get('num_leading_articles')); $i++) : ?>
		<?php if ($i >= $this->total) : break; endif; ?>
		<div>
		<?php
			$this->item =& $this->getItem($i, $this->params);
		// cambio jc 20140403 publicacion del metadato dcterms.issued para buscador.
		// @ variables: $row | $this->item | $this->article | $items[$i]
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
			echo $this->loadTemplate('item');
		?>
		</div>
	<?php endfor; ?>
	</td>
</tr>
<?php else : $i = $this->pagination->limitstart; endif; ?>

<?php
$startIntroArticles = $this->pagination->limitstart + $this->params->get('num_leading_articles');
$numIntroArticles = $startIntroArticles + $this->params->get('num_intro_articles', 4);
if (($numIntroArticles != $startIntroArticles) && ($i < $this->total)) : ?>
<tr>
	<td style="vertical-align:top">
		<table style="width:100%;padding:0px;border-collapse:collapse;border-spacing:0px">
		<tr>
		<?php
			$divider = '';
			if ($this->params->def('multi_column_order',1)) : // order across as before
			for ($z = 0; $z < $this->params->def('num_columns', 2); $z ++) :
				if ($z > 0) : $divider = " column_separator"; endif; ?>
				<?php
				    $rows = (int) ($this->params->get('num_intro_articles', 4) / $this->params->get('num_columns'));
				    $cols = ($this->params->get('num_intro_articles', 4) % $this->params->get('num_columns'));
				?>
				<td style="vertical-align:top;width:<?php echo intval(100 / $this->params->get('num_columns')) ?>%" class="article_column<?php echo $divider ?>">
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
			else : // otherwise, order down columns, like old category blog
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
		endif;?>		
		</tr>
		</table>
	</td>
</tr>
<?php endif; ?>
<?php if ($this->params->def('num_links', 4) && ($i < $this->total)) : ?>
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

<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->get('pages.total') > 1)) : ?>
<tr>
	<td style="vertical-align:top;text-align:center">
		<?php echo $this->pagination->getPagesLinks(); ?>
		<br /><br />
	</td>
</tr>
<?php if ($this->params->def('show_pagination_results', 1)) : ?>
<tr>
	<td  style="vertical-align:top;text-align:center">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</td>
</tr>
<?php endif; ?>
<?php endif; ?>
</table>
