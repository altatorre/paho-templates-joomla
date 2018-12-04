<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<?php if ($this->params->get('show_page_title', 1)) : ?>
<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
</div>
<?php endif; ?>

	<div class="blog<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">

<?php if ($this->params->def('num_leading_articles', 1)) : ?>

	<?php for ($i = $this->pagination->limitstart; $i < ($this->pagination->limitstart + $this->params->get('num_leading_articles')); $i++) : ?>
		<?php if ($i >= $this->total) : break; endif; ?>

		<div id="leading">
		<?php
			$this->item =& $this->getItem($i, $this->params);
			echo $this->loadTemplate('item');
		?>
		</div><!-- #leading -->
	<?php endfor; ?>
	</div><!-- blog -->

<?php else : $i = $this->pagination->limitstart; endif; ?>

<?php
// Intro Articles in Columns

$numleading = $this->params->get('num_leading_articles');
$numintro = $this->params->get('num_intro_articles');
$multicolumnorder = $this->params->get('multi_column_order');
$numlinks = $this->params->get('num_links');
$numcolumns = $this->params->get('num_columns');
$stt = 100 - (($numcolumns - 1) * 6);
$clwdt = intval($stt / $numcolumns);
$marg = 0;
if ($numcolumns>1) {
	$marg = (100-$stt)/($numcolumns-1);
}

if($numintro) {
	echo "<div id=\"intro\" style=\"width:100%;float:left;border-top:1px solid #DDD;margin-top: 12px;margin-bottom:12px;background: url(templates/PAHO2013/images/div_line$numcolumns.png);background-repeat:repeat-y;background-position:center\">\n";
}

if ($multicolumnorder) {
for ($z = $numleading; $z < ($numleading+$numintro); $z++) {
	if ($z % $numcolumns) {
	echo "<div id=\"1\" style=\"width:$clwdt%;float:left;margin-right:$marg%\">\n";
	} else {
	echo '<div id="2" style="width:'.$clwdt.'%;float:left;margin-right:0">';
	}
	$this->item =& $this->getItem($z, $this->params);
	echo $this->loadTemplate('item');
	$i++;
	echo "</div><!-- column 1 or 2 closes -->\n";
	if (!($z % $numcolumns)) {
	echo "<div id=\"divider$z\" style=\"clear:both;padding-bottom:12px;border-bottom:1px solid #AAA\"></div>\n";
	}
}
} else { // End if multicolumnorder
	$npc = $numintro/$numcolumns;
	for ($x = 1; $x <= $numcolumns; $x++) { // As many columns as needed
		if ($x < $numcolumns) {
			echo "<div id=\"1\" style=\"width:$clwdt%;float:left;margin-right:$marg%\">\n";
			for ($z = $numleading; $z <= $npc; $z++) {
				$this->item =& $this->getItem($i, $this->params);
				echo $this->loadTemplate('item');
				$i++;
			}
			echo "</div><!-- column 1 closes -->\n";
		} else {
			echo "<div id=\"2\" style=\"width:$clwdt%;float:left;margin-right:0\">\n";
			for ($z = $numleading; $z <= $npc; $z++) {
				$this->item =& $this->getItem($i, $this->params);
				echo $this->loadTemplate('item');
				$i++;
			}
		echo "</div><!-- column 2 closes -->\n";
		}
	}
}

if($numintro) {
	echo "</div><!-- #intro -->\n";
}

?>

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
