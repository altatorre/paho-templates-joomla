<?php
/**
 * Health Topics Component
 * by Paulo Leite - 2014
 */

defined('_JEXEC') or die('Restricted access');
$topic = $this->topics;
$slug =$topic->alias;
//$itmid = $topic->Itemid;
?>
<style>#breadcrumbs { display: none; }</style>
<h1 class="htopics" style="margin-top: 0"><?php echo $topic->topic; ?></h1>
<?php
	if (property_exists($topic, 'alert')) {  
	//if ($topic->alert) {
		echo "<div id=\"htdef\" style=\"width: 68%;float:left;margin-right:2%\">\n";
	}
	if ($topic->definition) {
	?>
<p class="htdef"><?php echo stripslashes($topic->definition); ?>
	<span style="font-size:11px;display:block;text-align:right"><?php echo JText::_( 'Source' ); ?>: <?php echo $topic->definition_source; ?></span></p>
	<?php
	}
	if (property_exists($topic, 'alert')) {  
	//if ($topic->alert) {
		echo "</div>\n";
		echo "<div id=\"htalt\" style=\"width: 30%;min-height:80px;background:#F6F6F9;border-bottom:2px solid #CC1305;float:right\">\n";
		echo "<h3 class=\"\" style=\"clear:both;background: #CC1305;color:#FFF;padding:3px;margin-top:0\">" . JText::_( 'Epidemiological Alert' ) . "</h3>\n";
		echo "<ul style=\"font-size:11px;margin-top:10px;margin-left:12px;padding-left:12px;line-height:14px\"><li><a href=\"#\">Antimicrobial Resistance Alert</a><br />16 October 2013</li></ul>";
		echo "</div>\n";
	}
	if ($topic->replacingurl) {
		echo "<script>location.replace('" . $topic->replacingurl . "'); </script>";
	}
	?>
	<div style="clear:both"></div>
	<div id="htblurb">
		<div id="htphoto">
			<img src="<?php echo $topic->photo; ?>" alt="<?php $topic->topic; ?>" style="width:100%;max-width: 280px;height:auto" /><br />
			<p class="htcaption"><?php echo $topic->photo_copyright; ?></p>
		</div><!-- end of #htphoto -->
		<p><?php echo stripslashes($topic->blurb); ?></p>
<?php if ($topic->additional_info) { 
		$additionallink = str_replace( "&amp;amp;", "&amp;", str_replace( "&", "&amp;", stripslashes($topic->additional_link) ));
	?>	
		<p><a href="<?php echo $additionallink; ?>"><?php echo stripslashes($topic->additional_info); ?></a></p>
<?php } ?>
	</div><!-- end of #htblurb -->
	<div id="htpahowho">
		<div id="htpaho">
<?php	if ($topic->paho_text) { $text = $topic->paho_text; } else { $text = $topic->topic; } ?>
			<a href="<?php echo $topic->paho; ?>"><strong><?php echo JText::_('PAHOWHO_PROGRAM'); ?>:</strong> <?php echo $text; ?></a>
		</div><!--end of paho -->
		<div id="htwho">
<?php	if ($topic->who_text) { $text = $topic->who_text; } else { $text = $topic->topic; } ?>
			<a href="<?php echo $topic->who; ?>"><strong><?php echo JText::_('WHO_HEALTH_TOPIC'); ?>:</strong> <?php echo $text; ?></a>
		</div><!-- end of who -->
	</div><!-- end of pahowho -->
	<div class="clr"></div>
<?php
	if ( $topic->sci_tech_docs[0]->catid ) {
?>
	<div class="httopics">
		<h3 class="htheader"><?php echo JText::_( 'PAHOWHO_SCIENTIFIC_TECHNICAL_MATERIAL' ); ?></h3>
<?php showDocman($topic->sci_tech_docs, 'PAHOWHO_SCIENTIFIC_TECHNICAL_MATERIAL', $slug, 'scientific_technical');
	}
	$tq = $topic->topic;
	$tq = urlencode($tq);
?>
		<p>[<a href="http://pesquisa.bvsalud.org/portal/?q=<?php echo $tq; ?>&amp;where=&amp;index=&amp;lang=en">
<?php echo JText::_('SEARCH_VHL'); ?></a>] </p>
	</div><!-- end of .hhtopics -->

<?php
	if (property_exists($topic, 'alerts_docs')) {  
	//if ($topic->alerts_docs[0]->catid) {
?>
	<div class="httopics">
		<h3 class="htheader"><?php echo JText::_( 'PAHOWHO_EPI_ALERTS' ); ?></h3>
<?php
		showDocman($topic->alerts_docs, 'PAHOWHO_EPI_ALERTS', $slug, 'alerts');
?>
	</div><!-- end of .hhtopics -->
<?php } ?>

<?php
	if ($topic->advocacy_docs[0]->catid) {
?>
	<div class="httopics">
		<h3 class="htheader"><?php echo JText::_( 'PAHOWHO_COMM_MATERIALS' ); ?></h3>
<?php
		showDocman($topic->advocacy_docs, 'PAHOWHO_COMM_MATERIALS', $slug, 'communication');
?>
	</div><!-- end of .hhtopics -->
<?php } ?>

<?php
	if (property_exists($topic, 'statistics_docs')) {  
	//if ($topic->statistics_docs[0]->catid) {
?>
	<div class="httopics">
		<h3 class="htheader"><?php echo JText::_( 'PAHOWHO_DATA' ); ?></h3>
<?php
		showDocman($topic->statistics_docs, 'PAHOWHO_DATA', $slug, 'statistics');
?>
	</div><!-- end of .hhtopics -->
<?php } ?>

<?php
	if (count($topic->mandates_docs[0]->catid)) {
?>
	<div class="httopics">
		<h3 class="htheader"><?php echo JText::_( 'PAHOWHO_MANDATES' ); ?></h3>
<?php
		showDocman($topic->mandates_docs, 'PAHOWHO_MANDATES', $slug, 'mandates');
?>
	</div><!-- end of .hhtopics -->
<?php } ?>

<?php
	if (property_exists($topic, 'external_docs')) {  
	//if ( $topic->external_docs[0]->catid ) {
?>
	<div class="httopics">
		<h3 class="htheader"><?php echo JText::_( 'EXTERNAL_MATERIAL' ); ?></h3>
<?php
		showDocman($topic->external_docs, 'EXTERNAL_MATERIAL', $slug, 'external');
?>
	</div><!-- end of .hhtopics -->
<?php } ?>

<?php
		//cambio paulo 20150717
	if ( $topic->mm_highlight ) {
?>
	<div class="httopics">
		<h3 class="htheader"><?php echo JText::_( 'MM_HILITE' ); ?></h3>
<?php 
		$enlace = $topic->mm_highlight;
		$enlace = substr($enlace, -11);
?>
		<div class="ytWrapper">
			<iframe width="476" height="267" src="https://www.youtube.com/embed/<?php echo $enlace;  ?>" seamless="seamless" allowfullscreen="allowfullscreen">
			</iframe>
		</div>
	</div><!-- end of .hhtopics -->
<?php } ?>

<?php
	if($topic->multimedia && count(unserialize($topic->multimedia))) {
?>
	<div class="httopics">
		<h3 class="htheader"><?php echo JText::_('PAHOWHO_MULTIMEDIA'); ?></h3>
		<ul>
<?php
		$mm = unserialize($topic->multimedia);
		if (is_array($mm)) {
			foreach ($mm as $row) {
				$mitem = explode(",",$row);
				$mitem[0] = str_ireplace("||",",",$mitem[0]);
				$mlink = str_replace( "&amp;amp;", "&amp;", str_replace( "&", "&amp;", $mitem[2] ));
				if ($mitem[1] != "Other") {
					echo "<li><strong>$mitem[1]:&nbsp;</strong><a href=\"$mlink\">$mitem[0]</a></li>\n";
				} else {
					echo "<li><a href=\"$mlink\">$mitem[0]</a></li>\n";
				}	
			}
		}
?>
		</ul>
	</div><!-- end of .httopics -->
<?php } ?>
	<div class="httopics">
		<h3 class="htheader"><?php echo JText::_('STRATEGIC_PARTNERS'); ?></h3>
<?php	if ($topic->centers) {
		$ctrows = unserialize($topic->centers);
		if (is_array($ctrows)) {
			echo "<ul>\n";
			foreach($ctrows as $row) {
				$temp = explode("|",$row);
				if ($temp[1]) {
					echo "<li><a href=\"$temp[1]\">";
					echo JText::_($temp[0]);
					echo "</a></li>\n";
				}
			}
		}
		echo "</ul>\n";
} 
	$urlcenters = str_replace( "&amp;amp;", "&amp;", str_replace( "&", "&amp;", $topic->urlcenters));
?>
			<p>[ <a target="_blank" href="<?php echo $urlcenters ?>"><?php echo JText::_('PAHOWHO_COLLAB'); ?></a> ]</p>
	</div><!-- end of .httopics -->
<div style="clear: both"></div>
<?php
function showDocman($total, $name, $slug, $tipo) {
	$file = "cache\\com_topics\\" . $slug . '-' . $tipo;
	$cats = array();
	foreach ($total as $row) {
		if ($row->catid) {
			$data = new stdClass();
			$data->topic = $slug;
			$data->category = $name;
			$data->subcategory = $row->catgname;
			$data->catid = $row->catid;
			$data->catslug = $row->catslug;
			$cats[] = $data;
		}
	}
	asort($cats);
	$cats = array_values(array_unique($cats, SORT_REGULAR));
	if (count($cats) > 1) {
		// Print blue submenu with subcategories
		echo '<ul class="categorias">';
		foreach ($cats as $row) {
			$link = JRoute::_('index.php?option=com_topics&amp;view=rdmore&amp;item=' . $slug . '-' . $tipo . '&amp;type=' . $row->catslug);
			echo '<li><a href="' . $link . '">' . $row->subcategory . '</a></li>';
		}
		echo '</ul>';
	} // End of blue submenu

	$artigos = array();
	$totalcount = count($total);
	$ct = 0;
	foreach ($total as $r) {
		if ($r->docman_document_id ) {
			$data = new stdClass;
			$data->id = $r->docman_document_id;
			$data->titulo = $r->title;
			$data->categoria = $r->catgname;
			$data->catslug = $r->catslug;
			$data->link = "index.php/documents/$r->catslug/$r->docman_document_id-$r->slug/file";
			$data->dmdate_published = $r->updated;
			$artigos[] = $data;
			$ct++;
		}
	}
	if ($artigos[0]->dmdate_published) {
		uasort($artigos, 'compare_dmdate');
		$artigos = array_reverse($artigos);
	}
	if ($ct < $totalcount) $totalcount = $ct;
		if ($totalcount == 1) {
			$numbers[0] = 0;
		}
		if ($totalcount == 2) {
			$numbers[0] = 0;
			$numbers[1] = 1;
		}
		if ($totalcount > 2) {
			$numbers = array_rand(range(0,(count($artigos)-1)), 2);
		}
		if ($totalcount) {
			echo "\n<ul style=\"margin-top:0;margin-bottom:4px\">\n";
			$link = $artigos[0]->link;
			echo "<li><a href=\"" . $link . "\">";
			echo $artigos[0]->titulo . "</a></li>\n";
		}
		if ($totalcount > 1) {
			$link = $artigos[1]->link;
			echo "<li><a href=\"" . $link . "\">";
			echo $artigos[1]->titulo . "</a></li>\n";
		}
		echo "</ul>\n";
		if ($totalcount > 2) {
		echo '<p><a style="text-decoration:underline" href="index.php?option=com_topics&amp;view=readall&amp;item=' . $slug . '-' . $tipo . '">' . JText::_( 'ALL_DOCS' ) . '</a></p>';
	}
	// Save all data to cache
	$dados = array();
	foreach ( $cats as $c ) {
		$data = new stdClass;
		$data->cats = $c;
		$docs = array();
		foreach ($artigos as $a) {
			if ($c->catslug != $a->catslug) continue;
			$docs[] = $a;
		}
		$data->docs = $docs;
		$dados[] = $data;
		}
	$data = json_encode( $dados );
	file_put_contents ( $file , $data );
}

function compare_dmdate($a, $b) {
	return strnatcmp($a->dmdate_published, $b->dmdate_published);
}
?>