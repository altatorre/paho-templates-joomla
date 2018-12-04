<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$items = $this->items;
$i = 1;
$pubdate = '0000-00-00';
foreach ($items as $row) {
	if ($i % 2 == 0) { $lado = "_r"; } else { $lado = "_l"; }
?>
			<div class="noticia<?php echo $lado; ?>">
				<h2 class="news entry-title"><a href="index.php?option=com_content&amp;view=article&amp;id=<?php echo $row->slug; ?>&amp;Itemid=1926" rel="bookmark" title=""><?php echo $row->title; ?></a></h2>
				<div class="newstext"><?php echo strip_tags( $row->introtext ); ?></div>
				<?php 	
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
				?>
				<div class="newsrm"><a href="index.php?option=com_content&amp;view=article&amp;id=<?php echo $row->slug; ?>&amp;Itemid=1926" rel="bookmark" title=""><?php echo JText::_("Read more...",$jsSafe = true); ?></a></div>
			</div><!-- .noticia -->
<?php
$i++;
} ?>
