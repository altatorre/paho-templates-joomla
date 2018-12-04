<?php // no direct access
defined('_JEXEC') or die('Restricted access');

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('behavior.caption');

$iitems = $this->items;
$iintro	= $this->params->get('num_intro_articles');
$links	= $this->params->get('num_links');
?>
<div id="noticias">
	<div id="noticias_col_um"><!-- CA:<?php echo count($iitems); ?> -->
<?php
$cuentamax = count($iitems);
if ($cuentamax > 20) { $cuentamax = 13; }
for ($ii = 0; $ii < $cuentamax; $ii++) {
		// cambio jc 20140403 publicacion del metadato dcterms.issued para buscador.
		// @ variables: $row | $this->item | $this->article | $iitems[$ii]
		// @ atributos: modified | publish_up 
	$mydocument = JFactory::getDocument();
		// http://stackoverflow.com/questions/4261133/php-notice-undefined-variable-and-notice-undefined-index
	$mypubdate = isset($mydocument->_metaTags['dcterms.issued']) ? $mydocument->_metaTags['dcterms.issued'] : '0000-00-00 00:00:00';
	if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $iitems[$ii]->created;
	if ($mypubdate < $iitems[$ii]->modified) { 
		$mypubdate=$iitems[$ii]->modified;
		if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $iitems[$ii]->publish_up;
		if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $iitems[$ii]->created;
		$mydocument->setMetaData( 'dcterms.issued', $mypubdate ); 
		$date1 = date_create($mypubdate);
		$date2 = date_format($date1, 'Y-m-d');
		$mydocument->setMetaData( 'review_date', $date2 ); 
	}
	$mydescription = $mydocument->description;
	$lengthdescription = strlen($mydescription);
	if ($lengthdescription < 159) {
		$mydescription .= strip_tags ($iitems[$ii]->title.". ");
		$mydescription = str_replace("&nbsp;", " ", $mydescription);
		$mydescription = str_replace("\r\n", " ", $mydescription);
		$mydescription = str_replace("\t", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
	}
	$mydescription = substr($mydescription,0,159);
	$mydocument->setMetaData( 'description', $mydescription );
//	$sysitemid = (int) JApplication::getItemid($iitems[$ii]->slug);
//print_r($this->items);
	if ($ii < $iintro) {
?>
		<div class="noticias_intro hentry">
			<h2 class="news entry-title"><a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($iitems[$ii]->slug, $iitems[$ii]->catid, $iitems[$ii]->language)); ?>"><?php echo $iitems[$ii]->title; ?></a></h2>
			<span class="author vcard" style="display:none"><a class="url fn org" href="http://www.paho.org/">PAHO/WHO</a></span>
			<span class="updated" style="display:none"><?php echo $mypubdate; ?></span>
			<div class="newstext entry-summary"><?php echo $iitems[$ii]->introtext; ?></div>
			<div class="newsrm"><a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($iitems[$ii]->slug, $iitems[$ii]->catid, $iitems[$ii]->language)); ?>" itemprop="url"><?php echo JText::_("Read more...",$jsSafe = true); ?></a></div>
		</div><!-- end of .noticias_intro -->
<?php
	}
	if ($ii == $iintro) {
	?>
	</div><!-- end of #noticias_col_um -->
	<div id="noticias_col_dois">
	<p class="more_news"><?php echo JText::_("More News",$jsSafe = true); ?></p>
<?php
	}
	if ($ii >= $iintro) {
?>
			<p class="noticias_links hentry"><a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($iitems[$ii]->slug, $iitems[$ii]->catid, $iitems[$ii]->language)); ?>" itemprop="url"><span class="entry-title"><?php echo $iitems[$ii]->title; ?></span></a><span class="updated" style="display:none"><?php echo $iitems[$ii]->publish_up; ?></span><span class="author vcard" style="display:none"><a class="url fn org" href="http://www.paho.org/">PAHO/WHO</a></span></p>
<?php
	}
}	// End of foreach loop
?>
	</div><!-- end of #noticias_col_dois -->
</div><!-- end of #noticias -->