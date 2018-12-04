<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$cparams =& JComponentHelper::getParams('com_media');
?>
<!-- Show Page Title -->
<?php if ($this->params->get('show_page_title', 1)) : ?>
<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
</div>
<?php endif; ?>
<!-- Div principal, rodeia todo o conteúdo - leading, intro e links -->
<div class="blog<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">

<?php if ($this->params->def('show_description', 1) || $this->params->def('show_description_image', 1)) :?>
	<?php if ($this->params->get('show_description_image') && $this->category->image) : ?>
		<img src="<?php echo $this->baseurl . '/' . $cparams->get('image_path') . '/'. $this->category->image;?>" align="<?php echo $this->category->image_position;?>" hspace="6" alt="" />
	<?php endif; ?>

	<?php if ($this->params->get('show_description') && $this->category->description) : ?>
		<?php echo $this->category->description . '<br /><br />'; ?>
	<?php endif; ?>
<?php endif; ?>
<?php if ($this->params->get('num_leading_articles')) : ?>
	<?php for ($i = $this->pagination->limitstart; $i < ($this->pagination->limitstart + $this->params->get('num_leading_articles')); $i++) : ?>
		<?php if ($i >= $this->total) : break; endif; ?>
		<div>
		<?php
			$this->item =& $this->getItem($i, $this->params);
			// Este loop chama o template de ítem tantas vezes quantas peça o número de artigos 'leading'
			echo $this->loadTemplate('item');
			echo "<div style=\"clear:both\"></div>";
		?>
		</div>
	<?php endfor; ?>

<?php else : $i = $this->pagination->limitstart; endif; ?>
<!-- Rotina que mostra os artigos 'intro', de acordo com o número de colunas solicitado e com a organização desejada (across ou down) -->
<?php
$rm = 0;
$rm = $rm + JDocumentHTML::countModules( 'right' );
$rm = $rm + JDocumentHTML::countModules( 'right1' );
$rm = $rm + JDocumentHTML::countModules( 'right2' );
$rm = $rm + JDocumentHTML::countModules( 'right3' );
$rm = $rm + JDocumentHTML::countModules( 'right4' );
$wideColumns = "wide";
if ($rm) { $wideColumns = "narrow"; }
$startIntroArticles = $this->pagination->limitstart + $this->params->get('num_leading_articles');
//echo 'Start intro ' . $startIntroArticles . '<br>';
$numIntroArticles = $startIntroArticles + $this->params->get('num_intro_articles');
//echo 'Num intro ' . $numIntroArticles . '<br>';
$acrossdown = $this->params->def('multi_column_order', 0);
//echo 'Across (1) or down (0) ' . $acrossdown . '<br>';
$numColumns = $this->params->def('num_columns', 2);
//echo 'Num cols ' . $numColumns . '<br>';
$templateImgDir = $mainframe->getBasePath() . "templates/" . $mainframe->getTemplate() . '/images/';
$WhitePercent = 3 * $numColumns;
if ($numColumns < 2) { $WhitePercent = 0; }
//echo 'White ' . $WhitePercent . '<br>';
$Width = intval ((100-$WhitePercent)/$numColumns);
//echo 'Width ' . $Width . '<br>';

echo "\n<div id=\"introbg\" style=\"background:url(" . $templateImgDir . "intBG-" . $numColumns . "-" . $wideColumns . ".png)\">\n";

if ($acrossdown) { // Routine for across items
	$estilo = "width: $Width%;float:left;";
	for ($i = 0; $i < ($numIntroArticles-$startIntroArticles); $i++) {
//			echo $i . ' - ' . ($i)/$numColumns. '<br>';

		if (is_int($i/$numColumns)) {
			$estilo = "width: $Width%;float:left;margin-right:3%";
		}
		if (is_int(($i+1)/$numColumns)) {
			$estilo = "width: $Width%;float:left;margin-left:3%";
		}
		IF ($numColumns < 2) { $estilo = "width:100%"; }
		echo '<div style="' . $estilo . '">';
		$this->item =& $this->getItem(($i+$startIntroArticles), $this->params);
		echo $this->loadTemplate('item');
		echo '</div>';
		if (is_int(($i+1)/$numColumns)) { echo '<div style="clear:both"></div>'; }
	}
}
$i = $i + $startIntroArticles;

echo '</div><!-- end of introbg -->';
?>

<!-- Fim da rotina que mostra os artigos 'intro' -->



<?php if ($this->params->get('num_links') && ($i < $this->total)) : ?>
		<div class="blog_more<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
			<?php
				$this->links = array_splice($this->items, $i - $this->pagination->limitstart);
				echo $this->loadTemplate('links');
			?>
		</div>
<?php endif; ?>
<?php if ($this->params->get('show_pagination')) : ?>
	<div style="text-align:center">
		<?php echo $this->pagination->getPagesLinks(); ?>
		<br /><br />
	</div>
<?php endif; ?>
<?php if ($this->params->get('show_pagination_results')) : ?>
	<div style="text-align:center">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</div>
<?php endif; ?>
</div>
