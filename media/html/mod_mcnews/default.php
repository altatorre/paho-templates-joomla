<? // no direct access
defined('_JEXEC') or die('Restricted access');
require_once JPATH_SITE . '/components/com_content/helpers/route.php';
$app = JFactory::getApplication();

		// Get an instance of the generic articles model
		$model = JModelLegacy::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

		// Set application parameters in model
		$appParams = JFactory::getApplication()->getParams();
//		$model->setState('params', $appParams);

$full_text = $params->get('full_text');
$full_type = intval($params->get('full_type'));
$full_url = $params->get('full_url');
$suffix = $module->id;
if ($_GET['lang'] == 'es') {
	$morenw = 'Lista completa de noticias';
} else { $morenw = 'Full list of news'; }
if ($full_text) { $morenw = $full_text; }
if ($params->get('custom_itemid')) { $citid = $params->get('custom_itemid'); }
?>
<div class="w3-row w3-padding-0">
<?php
$single = $params->get('1col');
$single = 1;
$count = 0;
if ($single) {
//	$count = 1;
	echo "<div class=\"w3-col w3-padding-0\">\n";
}
$base = "http://www.paho.org";
if ($items) {
	foreach ( $items as $row ) {
		$row->slug     = $row->id . ':' . $row->alias;
		$row->catslug  = $row->catid . ':' . $row->category_alias;
		$row->link     = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catid, $row->language));
   	if ($count<1) {
			$text = $row->introtext;
			if (preg_match("/<img [^>]*src=[\"'](?P<url>.+?)[\"'][^>]*>/i", $text, $matches)) {
				if ($matches['url'][0] == '/') {
					$imagem = $base . $matches['url'];
				} else {
				$imagem = $matches['url'];
			}
		}
			echo "<div class=\"w3-col\">\n";
			if ( $params->get('lktt') ) {
				echo "<a href=\"$row->link\">";
				echo "<h4>".$row->title."</h4></a>\n";
			} else {
				echo "<h4>$row->title</h4>\n";
			}
			echo "<p>";
			if ($imagem) {
				echo "<img src=\"" . $imagem . "\" style=\"width:48%;height: auto;float:left;margin:2px 8px 2px 0\" alt=\" \" />";
			}
			echo strip_tags($text,"<strong>,<em>,<br>,<a>")."</p>\n";
			if ( !$params->get('hiderm') ) {
				$link = JRoute::_("index.php?option=com_content&amp;view=article&amp;id=".$row->id."&amp;Itemid=".$itid);
				echo "<p><a href=\"$row->link\">";
				echo JText::_('Read more...');
				echo "</a></p>";
			}
			echo "</div>\n";
			echo "<div class=\"w3-col\">\n";
		  	$count++;
   	 	}
		else{
			$link = JRoute::_("index.php?option=com_content&amp;view=article&amp;id=".$row->id."&amp;Itemid=".$itid);
			echo "<p class=\"mcnews\"><a href=\"$row->link\"";
			echo ">".$row->title."</a></p>\n";
			if ( $count >= $params->get('notnumber') ) break;
			$count++;
	    	}
			// cambio jc 20140321 publicacion del metadato dcterms.issued para buscador.
			// @ variables: $row | $this->item | $this->article
			// @ atributos: modified | publish_up 
			$mydocument =& JFactory::getDocument();
			$mypubdate = $mydocument->_metaTags['standard']['dcterms.issued'];
			if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $row->created;
			if ($mypubdate < $row->modified) { 
			$mypubdate=$row->modified;
			if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $row->publish_up;
			if ($mypubdate == '0000-00-00 00:00:00') $mypubdate = $row->created;
			$mydocument->setMetaData( 'dcterms.issued', $mypubdate ); 
			$date1 = date_create($mypubdate);
			$date2 = date_format($date1, 'Y-m-d');
			$mydocument->setMetaData( 'review_date', $date2 );
		}
		$mydescription = $mydocument->description;
		$lengthdescription = strlen($mydescription);
		if ($lengthdescription < 159) {
			$mydescription .= strip_tags ($row->title);
			$mydescription = str_replace("&nbsp;", " ", $mydescription);
			$mydescription = str_replace("\r\n", " ", $mydescription);
			$mydescription = str_replace("\t", " ", $mydescription);
			$mydescription = str_replace("  ", " ", $mydescription);
			$mydescription = str_replace("  ", " ", $mydescription);
			$mydescription = str_replace("  ", " ", $mydescription);
		}
		$mydescription = substr($mydescription,0,159);
		$mydocument->setMetaData( 'description', $mydescription );
	}
}
?>
</div><div style="clear:both"></div>
<?php 
if ( $params->get('openclosefulllist') && $full_type < 1 ) { ?>
<p><a href="javascript:fln()"><em><?php echo $morenw; ?></em></a></p>
<?php } elseif ( $params->get('openclosefulllist') && $full_type > 0 ) { ?>
<p><a href="<?php echo $full_url; ?>"><em><?php echo $morenw; ?></em></a></p>
<?php } ?>
<div id="flnws" style="display:none">
<ul>
<?php
if ($params->get('openclosefulllist') && $items) {
	foreach ( $items as $row ) {
//		$itid = (int) JApplication::getItemid($row->id);
		$link = JRoute::_("index.php?option=com_content&amp;view=article&amp;id=".$row->id."&amp;Itemid=".$itid); // $options->itid
		echo '<li><a href="'.$row->link.'">'.$row->title.'</a></li>';
	}
}
?>
</ul>
</div><!-- end of #flnws -->
</div><!-- end of #mcnews_main_div -->
<script type="text/javascript">
function fln() {
    var elem = document.getElementById("flnws");
    if (elem.style.display == 'none') {
		elem.style.display = 'block';
		return; }
    if (elem.style.display == 'block') {
		elem.style.display = 'none';
		return; }
  }
</script>
