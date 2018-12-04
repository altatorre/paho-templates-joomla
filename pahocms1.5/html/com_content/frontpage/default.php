<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<?php if ($this->params->get('show_page_title', 1)) : ?>
<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
</div>
<?php endif; ?>

<div class="blog<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>"><?php if ($this->params->def('num_leading_articles', 1)) : ?><?php for ($i = $this->pagination->limitstart; $i < ($this->pagination->limitstart + $this->params->get('num_leading_articles')); $i++) : ?><?php if ($i >= $this->total) : break; endif; ?><?php
			$this->item =& $this->getItem($i, $this->params);
			echo $this->loadTemplate('bigitem');
		?><?php endfor; ?></div>

<?php else : $i = $this->pagination->limitstart; endif; ?>

<?php
// Intro Articles in Columns

$numleading = $this->params->get('num_leading_articles');
$numintro = $this->params->get('num_intro_articles');
$numlinks = $this->params->get('num_links');
$numcolumns = $this->params->get('num_columns');
if ($numcolumns < 1) { $numcolumns = 1; }
$stt = 100 - (($numcolumns - 1) * 5);
$clwdt = $stt / $numcolumns;
$marg = 5;
$marg = $marg - 4;

for ($z = $numleading; $z < ($numleading+$numintro); $z++) {
	if ($z == $numintro) {
	echo '<div style="width:'.$clwdt.'%;float:left;margin-right:0">';
	} else {
	echo '<div style="width:'.$clwdt.'%;float:left;padding-right: 3%; border-right: 1px solid #AAA;margin-right:'.$marg.'%">';
	}
	$this->item =& $this->getItem($z, $this->params);
	echo $this->loadTemplate('item');
	$i++;
	echo '</div><!-- intro column closes -->';
}

?>

<div style="clear:both"></div>

<?php if ($this->params->def('num_links', 4) && ($i < $this->total)) : ?>

		<div class="blog_more<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
			<?php
				$this->links = array_splice($this->items, $i - $this->pagination->limitstart);
				echo $this->loadTemplate('links');
			?>
		</div>
<?php endif; ?>

<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->get('pages.total') > 1)) : ?>
<tr>
	<div style="text-align:center">
		<?php echo $this->pagination->getPagesLinks(); ?>
		<br /><br />
	</div>
<?php if ($this->params->def('show_pagination_results', 1)) : ?>
	<div style="text-align:center">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</div>
<?php endif; ?>
<?php endif; ?>

