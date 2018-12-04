<?php // no direct access
defined('_JEXEC') or die('Restricted access');

$items = $this->items;
$intro	= $this->params->get('num_intro_articles');
$links	= $this->params->get('num_links');
?>
<div id="noticias">
	<div id="noticias_col_um">
<?php
for ($i = 0; $i < count($items); $i++) {
		// cambio jc 20140403 publicacion del metadato dcterms.issued para buscador.
		// @ variables: $row | $this->item | $this->article | $items[$i]
		// @ atributos: modified | publish_up 
	$mydocument =& JFactory::getDocument();
	$mypubdate = $mydocument->_metaTags['standard']['dcterms.issued'];
	if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $items[$i]->created;
	if ($mypubdate < $items[$i]->modified) { 
		$mypubdate=$items[$i]->modified;
		if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $items[$i]->publish_up;
		if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $items[$i]->created;
		$mydocument->setMetaData( 'dcterms.issued', $mypubdate ); 
		$date1 = date_create($mypubdate);
		$date2 = date_format($date1, 'Y-m-d');
		$mydocument->setMetaData( 'review_date', $date2 ); 
	}
	$mydescription = $mydocument->description;
	$lengthdescription = strlen($mydescription);
	if ($lengthdescription < 159) {
		$mydescription .= strip_tags ($items[$i]->title.". ");
		$mydescription = str_replace("&nbsp;", " ", $mydescription);
		$mydescription = str_replace("\r\n", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
	}
	$mydescription = substr($mydescription,0,159);
	$mydocument->setMetaData( 'description', $mydescription );
	if ($i < $intro) {
?>
		<div class="noticias_intro">
			<h2 class="news entry-title"><a href="index.php?option=com_content&amp;view=article&amp;id=<?php echo $items[$i]->slug; ?>&amp;Itemid=1926" rel="bookmark" title=""><?php echo $items[$i]->title; ?></a></h2>
			<div class="newstext"><?php echo $items[$i]->introtext; ?></div>
			<div class="newsrm"><a href="index.php?option=com_content&amp;view=article&amp;id=<?php echo $items[$i]->slug; ?>&amp;Itemid=1926" rel="bookmark" title=""><?php echo JText::_("Read more...",$jsSafe = true); ?></a></div>
		</div><!-- end of .noticias_intro -->
<?php
	}
	if ($i == $intro) {
	?>
	</div><!-- end of #noticias_col_um -->
	<div id="noticias_col_dois">
	<p class="more_news"><?php echo JText::_("More News",$jsSafe = true); ?></p>
<?php
	}
	if ($i >= $intro) {
?>
			<p class="noticias_links"><a href="index.php?option=com_content&amp;view=article&amp;id=<?php echo $items[$i]->slug; ?>&amp;Itemid=1926" rel="bookmark" title=""><?php echo $items[$i]->title; ?></a></p>
<?php
	}
}	// End of foreach loop
?>
	</div><!-- end of #noticias_col_dois -->
</div><!-- end of #noticias -->