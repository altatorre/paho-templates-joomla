<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$items = $this->items;
$i = 1;
foreach ($items as $row) {
	if ($i % 2 == 0) { $lado = "_r"; } else { $lado = "_l"; }
?>
			<div class="noticia<?php echo $lado; ?>">
				<h2 class="news entry-title"><a href="index.php?option=com_content&amp;view=article&amp;id=<?php echo $row->slug; ?>&amp;Itemid=1926" rel="bookmark" title=""><?php echo $row->title; ?></a></h2>
				<div class="newstext"><?php echo strip_tags( $row->introtext ); ?></div>
			</div><!-- .noticia -->
<?php
$i++;
} ?>
