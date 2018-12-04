<?php
/**
 * Health Topics Component
 * by Paulo Leite - 2014
 */

defined('_JEXEC') or die('Restricted access');
$lang = $_GET['lang'];
include_once( JPATH_COMPONENT.DS.'helpers' . DS . 'route.php' );
$topic = $this->healthtopic;
//echo "nueva direccion". this->healthtopic->replacingurl; 

if ($this->healthtopic->replacingurl != '') {
	echo "<script>window.location.replace(\"".$this->healthtopic->replacingurl."\");</script>";
}

if ($this->healthtopic->active == 0) {
	echo "<script>location.replace(\"http://www.paho.org/hq/index.php?option=com_topics&view=topics&Itemid=40241\");</script>";
	exit;	
}

$topic->sci_tech_docs = intval($this->sci_tech); 
$topic->alerts_docs = intval($this->alerts);
$topic->advocacy_docs = intval($this->advocacy);
$topic->statistics_docs = intval($this->statistics);
$topic->external_docs = intval($this->external);
$topic->mandates_docs = intval($this->mandates);
$mykeywords = $mydocument->keywords;
$mykeywords .= $this->healthtopic->topic;
$mydocument =& JFactory::getDocument();
$mytitle = $mydocument->getTitle();
$mylanguage = $mydocument->getLanguage();
$organization = "PAHO WHO";
if ($mylanguage == "es-es") $organization = "OPS OMS";
$mytitle = $organization . " | " . $this->healthtopic->topic;;
$mydocument->setTitle($mytitle);
?>
<?php if (($topic->highlight <> '') || ($topic->blurb <> '') || ($topic->additional_info <> '')) { 
	$col_xs_title = "col-xs-12";
	$col_xs_desc = "col-xs-12";
 } else { 
	$col_xs_title = "col-xs-12";
 } ?>
	<!-- Title -->
<div class="heading <?php echo $col_xs_title; ?>" style="float: left">
	<h1><?php echo $topic->topic; ?></h1>
</div><!-- end of heading col-xs-12 -->
<?php if ($col_xs_title == "col-xs-12") { ?>
	<div class="clearfix"></div>
<?php }	?>
	<!-- Internal Menu -->
<!-- <div id="sidebar" class="col-md-4">
	<ul class="navigation">
<?php 
    $left_menu[0] = "PAHO/WHO Scientific and Technical Material|#sci_tech";
    $left_menu[1] = "PAHO/WHO Communication Materials|#communication";
    $left_menu[2] = "PAHO/WHO Mandates and Strategies|#mandates";
    $left_menu[3] = "PAHO/WHO Multimedia Materials|#multimedia";
    //$left_menu[4] = "HT_NEWS|#news";				
?>				
<?php
foreach($left_menu as $row) {
	$menu = explode('|', $row);
	$menutext = JText::_( $menu[0] );
	$menutext = str_replace("PAHO/WHO ", "", $menutext);
	$menutext = str_replace(" de OPS/OMS", "", $menutext);

	echo '					<a href="' . $menu[1] . '">' . $menutext . "</a> | \n";
}
?>
	</ul>
</div><!-- end of side bar col-md-4 -->
<?php if (($topic->highlight <> '') || ($topic->blurb <> '') || ($topic->additional_info <> '')) { ?>
	<!-- Definition -->
<div id="content" class="<?php echo $col_xs_desc; ?> hidden-xs" style="float:right">
	<div class="text-block">
			<p><?php echo stripslashes($topic->blurb); ?></p>
		<?php if ($topic->additional_info) {
			$additionallink = str_replace( "&amp;amp;", "&amp;", str_replace( "&", "&amp;", stripslashes($topic->additional_link) ));
		?>
		<p><a href="<?php echo $additionallink; ?>"><?php echo stripslashes($topic->additional_info); ?></a></p>
		<?php } ?>
	</div><!-- end of text-block" -->
</div><!-- content col-md-8 --> 
<?php // cambio jc, se puso el highlight luego para que se pueda visualizar en las pantallas pequeñas  
?>
<div class="col-xs-12">
		<?php echo stripslashes($topic->highlight); ?>
</div>
<?php } ?>


		<!-- Row that starts with topic photo -->
		<div class="row">
			<div class="col-xs-12">
				<div class="gallery-holder">

					<!-- Statistics start here -->
					<?php if ( count($this->statistics) ) { ?>
					<div class="item" id="data">
						<div class="textholder textholder3">
							<h2><?php echo JText::_( 'PAHO/WHO Data, Maps and Statistics' ); ?></h2>
							<?php showDocman($topic->statistics_docs, 'PAHO/WHO Data, Maps and Statistics', $slug, 'statistics'); ?>
<?php		$catid2 = $this->healthtopic->statistics;
		showDocman($this->statistics, 'PAHO/WHO Data, Maps and Statistics', $catid2);
 		$mykeywords = $mykeywords . ", " . JText::_('PAHO/WHO Data, Maps and Statistics');
		$mydocument->setMetaData( 'keywords', $mykeywords ); ?>
						</div><!-- text holder -->
					</div>
					<?php } ?>
					<!-- Statistics end here -->

				
				
					<!-- Scientific and Technical Material starts here -->
					<div class="item" id="sci_tech">
						<div class="img-holder">
                  	<img src="<?php echo $topic->photos; ?>-1.jpg" alt="<?php $topic->topic; ?>" width="364" height="180">
						</div>
						<?php if ( $topic->sci_tech_docs ) { ?>
						<div class="textholder">
							<h2><?php echo JText::_( 'PAHO/WHO Scientific and Technical Material' ); ?></h2>
							<?php 
		$mykeywords = $mykeywords . ", " . JText::_('PAHO/WHO Scientific and Technical Material');
		$mydocument->setMetaData( 'keywords', $mykeywords );
		$catid2 = $this->healthtopic->sci_tech;
		showDocman($this->sci_tech, 'PAHO/WHO Scientific and Technical Material', $catid2);
	$tq = urlencode($this->healthtopic->topic);
	$tq = str_replace(",", "", $tq);
	$tq = str_replace(" Infección", "", $tq);
	$tq = str_replace(" Infection", "", $tq);
	$tq = str_replace(" por", "", $tq);
	$tq = str_replace(" Virus", "", $tq);
	//$tq = str_replace("Microcephaly", "(("zika virus" or (zika virus) or zika or "infeccoes por Flavivirus" or (zika virus (infection or infeccao or infeccion))) (microcefalia or microcephaly))", $tq);
	$tq = str_replace("Microcefalia", "((\"zika virus\" or (zika virus) or zika or \"infeccoes por Flavivirus\" or (zika virus (infection or infeccao or infeccion))) (microcefalia or microcephaly))", $tq);
	$tq = str_replace("Microcephaly", "((\"zika virus\" or (zika virus) or zika or \"infeccoes por Flavivirus\" or (zika virus (infection or infeccao or infeccion))) (microcefalia or microcephaly))", $tq);
	$tq = urlencode($tq);
	$bvsurl = 'http://pesquisa.bvsalud.org/portal/?q='.$tq.'&amp;where=&amp;index=&amp;lang=en';
	
	if ($this->healthtopic->bvsqueries != '') {
		$bvsurl = $this->healthtopic->bvsqueries;
	}
	
?>
		<div class="linkholder">[<img src="images/banners/logovhl.png" style="width:20px;height:20px" /><a href="<?php echo $bvsurl; ?>" target="_blank">
<?php echo JText::_('Search the Virtual Health Library databases'); ?></a>] </div>
<?php							}
							?>
						<?php if ( $topic->sci_tech_docs ) { ?>
						</div><!-- end of textholder -->
						<?php } ?>
					</div><!-- end of item -->
					<!-- End of Scientific and Technical Material -->

					<!-- Epidemiological Alerts start here -->
					<?php if ( count($this->alerts) ) { ?>
					<div class="item" id="alerts">
						<div class="textholder textholder3">
							<h2><?php echo JText::_( 'PAHO/WHO Epidemiological Alerts and Updates' ); ?></h2>
<?php		$catid2 = $this->healthtopic->alerts;
		showDocman($this->alerts, 'PAHO/WHO Epidemiological Alerts and Updates', $catid2); ?>
<?php 		$mykeywords = $mykeywords . ", " . JText::_('PAHO/WHO Epidemiological Alerts and Updates');
		$mydocument->setMetaData( 'keywords', $mykeywords ); ?>
						</div>
					</div><!-- end of item -->
					<?php } ?>
					<!-- Epidemiological Alerts end here -->

					<!-- News Module starts here -->
					<?php if ( $topic->news ) { ?>
					<div class="item" id="news">
						<div class="textholder2">
							<h2><?php echo JText::_( 'HT_NEWS' ); ?></h2>
							<ul class="news-list">
							<?php $ct = 0;
							foreach ( $topic->news as $nw ) {
								if ( $ct > 1 ) continue;
								require_once JPATH_SITE . '/components/com_content/helpers/route.php';
								$nw->slug     = $nw->id . ':' . $nw->alias;
								$nw->catslug  = $nw->catid; // . ':' . $row->category_alias;
								$nw->language = JRequest::getCmd('lang');
								// falta por revisar. 
								// $link     = JRoute::_(ContentHelperRoute::getArticleRoute($nw->slug, $nw->catid, $nw->language));
								$link = JRoute::_("index.php?option=com_docman&task=doc_download&gid=".$nw->id);  ?>
								<li><a href="<?php echo $link; ?>"><?php echo $nw->title; ?></a></li>
							<?php $ct++;
							} ?>
							</ul>
							<!--	<a href="#" class="btn">All News</a> -->
						</div>
					</div>
					<?php } ?>
					<!-- News Module ends here -->

					<!-- Communication Materials start here -->
					<?php if ( count($this->advocacy) ) { ?>
					<div class="item" id="communication">
						<div class="img-holder">
							<img src="<?php echo $topic->photos; ?>-2.jpg" alt="image description" width="364" height="180">
						</div>
						<div class="textholder">
							<h2><?php echo JText::_( 'PAHO/WHO Communication Materials' ); ?></h2>
<?php		$catid2 = $this->healthtopic->advocacy;
		showDocman($this->advocacy, 'PAHO/WHO Communication Materials', $catid2); ?>
<?php 		$mykeywords = $mykeywords . ", " . JText::_('PAHO/WHO Communication Materials');
		$mydocument->setMetaData( 'keywords', $mykeywords ); ?>
						</div>
					</div>
					<?php } ?>
					<!-- Communication Materials end here -->

					<!-- Mandates and Strategies start here -->
					<?php if ( count($this->mandates) ) { ?>
					<div class="item" id="mandates">
						<div class="img-holder">
							<img src="<?php echo $topic->photos; ?>-3.jpg" alt="image description" width="364" height="179">
						</div>
						<div class="textholder">
	                  <h2><?php echo JText::_( 'PAHO/WHO Mandates and Strategies' ); ?></h2>
<?php		$catid2 = $this->healthtopic->mandates;
		showDocman($this->mandates, 'PAHO/WHO Mandates and Strategies', $catid2); ?>
<?php 		$mykeywords = $mykeywords . ", " . JText::_('PAHO/WHO Mandates and Strategies');
		$mydocument->setMetaData( 'keywords', $mykeywords );
 ?>
						</div>
					</div>
					<?php } ?>
					<!-- Mandates and Strategies end here -->

					<!-- Video Block starts herel -->
					<?php
					if ( $topic->mm_highlight ) {
						$video = $this->healthtopic->mm_highlight; // $topic->mm_highlight;
						if (stripos($video,'v=')) {
							$ytcode = substr($video, stripos($video,'v=')+2,11);
						} else {
							$ytcode = substr($video, strlen($video)-11, 11);
						}
		$mykeywords = $mykeywords . ", " . JText::_('Multimedia Highlight');
		$mydocument->setMetaData( 'keywords', $mykeywords );
					?>
					<div class="item">
						<div class="ytWrapper">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $ytcode; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
						</div><!-- end of ytWrapper -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<div class="modal-body">
										<div class="embed-responsive">
											<iframe  class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $ytcode; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- end of item -->
					<?php } ?>
					<!-- Video Block ends herel -->

					<!-- External Parties Material starts here -->
					<?php if ( count($this->external) ) { ?>
					<div class="item" id="external">
						<div class="textholder textholder3">
							<h2><?php echo JText::_( 'External Parties Material' ); ?></h2>
		<?php $catid2 = $this->healthtopic->external;
		showDocman($this->external, 'External Parties Material', $catid2); ?>
<?php		$mykeywords = $mykeywords . ", " . JText::_('External Parties Material');
		$mydocument->setMetaData( 'keywords', $mykeywords ); ?>
						</div>
					</div>
					<?php } ?>
					<!-- External Parties Material ends here -->

					<!-- Strategic Partners Module starts here -->
					<?php if ( $topic->centers && substr( $topic->centers[0], 0, 16) != '{"name":"","link' ) { ?>
					<div class="item">
						<div class="textholder textholder3">
						<h2><?php echo JText::_('Strategic Partners'); ?></h2>
<?php	if ($this->healthtopic->centers) {
		$mykeywords = $mykeywords . ", " . JText::_('Strategic Partners');
		$mydocument->setMetaData( 'keywords', $mykeywords );
		$ctrows = unserialize($this->healthtopic->centers);
		if (is_array($ctrows)) {
			echo "<ul class=\"list\">\n";
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
	$urlcenters = str_replace( "&amp;amp;", "&amp;", str_replace( "&", "&amp;", $this->healthtopic->urlcenters));
?>
		<?php if ($urlcenters != '') { ?>
			<p>[ <a target="_blank" href="<?php echo $urlcenters ?>"><?php echo JText::_('PAHO/WHO Collaborating Centers Website'); ?></a> ]</p>
		<?php } ?>
						</div>
					</div>
					<?php } ?>
					<!-- Strategic Partners Module ends here -->


					<!-- PAHO/WHO Programs start here -->
					<?php	if ($topic->paho_text) { $ptext = $topic->paho_text; } else { $ptext = $topic->topic; } ?>
					<?php	if ($topic->who_text) { $wtext = $topic->who_text; } else { $wtext = $topic->topic; } ?>
			
					<?php if (($topic->paho != '') || ($topic->who != '')) : ?>
					<div class="item">
						<div class="textholder1">
							<?php if ($topic->paho != '') : ?>
							<h2><?php echo JText::_('PAHO/WHO PROGRAM:'); ?></h2>
							<ul style="margin-top: -12px"><li><a style="color: #FFF" href="<?php echo $topic->paho; ?>"><?php echo $ptext; ?></a></li></ul>
							<?php endif; ?>
							<?php if ($topic->who != '') : ?>
							<h2><?php echo JText::_('WHO Health Topic:'); ?></h2>
							<ul style="margin-top: -12px"><li><a style="color: #FFF" href="<?php echo $topic->who; ?>"><?php echo $wtext; ?></a></li></ul>
							<?php endif; ?>
							<?php 		$mykeywords = $mykeywords . ", " . JText::_('PAHO/WHO PROGRAM:');
							$mydocument->setMetaData( 'keywords', $mykeywords ); ?>
						</div>
					</div>
					<?php endif; ?>
					<!-- PAHO/WHO Programs end here -->

					<!-- Multimedia Materials start here -->
					<?php /* if ( substr( $topic->multimedia[0], 0, 16) != '{"name":"","type' ) {  */ ?>
					<?php if($this->healthtopic->multimedia && count(unserialize($this->healthtopic->multimedia))) { ?>
					<div class="item" id="multimedia">
						<div class="textholder">
							<h2><?php echo JText::_('PAHO/WHO Multimedia Materials'); ?></h2>
		<ul class="list">
<?php
		$mm = unserialize($this->healthtopic->multimedia);
		if (is_array($mm)) {
			$mykeywords = $mykeywords . ", " . JText::_('PAHO/WHO Multimedia Materials');
			$mydocument->setMetaData( 'keywords', $mykeywords );
			foreach ($mm as $row) {
				$mitem = explode(",",$row);
				$mitem[0] = str_ireplace("||",",",$mitem[0]);
				$mlink = str_replace( "&amp;amp;", "&amp;", str_replace( "&", "&amp;", $mitem[2] ));
				if ($mitem[1] != "Other") {
					echo "<li><strong>$mitem[1]:&nbsp;</strong><a href=\"$mlink\" target=\"_blank\">$mitem[0]</a></li>\n";
				} else {
					echo "<li><a href=\"$mlink\" target=\"_blank\">$mitem[0]</a></li>\n";
				}	
			}
		}
?>
		</ul>					<?php } ?>
						</div>
					</div><!-- end of item -->
					<!-- Multimedia Materials end here -->


<?php
	
	if ($this->healthtopic->alert) {
		if ($this->healthtopic->definition) {
			$widthdefinition = "68%";
			$widthalert = "30%";
		} else {
			$widthdefinition = "0%";
			$widthalert = "100%";
		}
	} else {
		if ($this->healthtopic->definition) {
			$widthdefinition = "100%";
			$widthalert = "0%";
		}
	}
	if ($this->healthtopic->definition) {
		$widthdefinition = "width: 68%;float:left";
		$widthalert = "width: 30%;float:right";
		$mydescription .= $this->healthtopic->definition . ". ";
			$lengthdescription = strlen($mydescription);
			if ($lengthdescription < 159) {
				$mydescription .= $row->keyword . ". ";
			}
		$mydescription = str_replace("\"", "", $mydescription);
		$mydescription = str_replace("&nbsp;", " ", $mydescription);
		$mydescription = str_replace("\r\n", " ", $mydescription);
		$mydescription = str_replace("\t", " ", $mydescription);
		$mydescription = str_replace( " align=justify", "", $mydescription );
		$mydescription = str_replace( " align=left", "", $mydescription );
		$mydescription = str_replace("<p>", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
		$mydescription = substr($mydescription,0,159);
		$mydocument->setMetaData( 'description', $mydescription );

	} else {
		$widthdefinition = "width: 0%";
		$widthalert = "width: 100%";
	}
	$widthdefinition = "width: 100%";
	$widthalert = "width: 0%";
				$mydescription .= $this->healthtopic->blurb;
			$lengthdescription = strlen($mydescription);
			if ($lengthdescription < 159) {
				$mydescription .= $row->keyword . ". ";
			}
		$mydescription = str_replace("\"", "", $mydescription);
		$mydescription = str_replace("&nbsp;", " ", $mydescription);
		$mydescription = str_replace("\r\n", " ", $mydescription);
		$mydescription = str_replace("\t", " ", $mydescription);
		$mydescription = str_replace( " align=justify", "", $mydescription );
		$mydescription = str_replace( " align=left", "", $mydescription );
		$mydescription = str_replace("<p>", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
		$mydescription = substr($mydescription,0,159);
		$mydocument->setMetaData( 'description', $mydescription );

		$mykeywords = str_replace( "PAHO/WHO ", "", $mykeywords );
		$mykeywords = str_replace( ":", "", $mykeywords );
		$mykeywords = str_replace( " de la OPS/OMS", "", $mykeywords );
		$mykeywords = str_replace( " de OPS/OMS", "", $mykeywords );
		$mydocument->setMetaData( 'keywords', $mykeywords );

?>
</div> <!-- end of col -->
</div> <!-- end of row -->
<!--
<div style="clear: both"></div>
-->


<?php
function showDocman($total, $name, $catid) {
	$cats = array();
	if (is_array($total)) {
		foreach ($total as $row) {
			$data = new stdClass();
			$data->catgname = $row->nome;
			$data->mid = $row->id;
			$cats[] = $data;
		}
	}
	asort($cats);
	$cats = array_values(array_unique($cats, SORT_REGULAR));
	if (count($cats) > 1) {
		$data = new stdClass();
		echo '<ul class="categorias category-list">';
		foreach ($cats as $row) {
			$data = new stdClass();
			$data->subcategory = $row->catgname;
			$data->category = $name;
			$file = "cache\\com_topics\\" . $row->mid;
			$data = json_encode( $data );
			file_put_contents ( $file , $data );
			echo '<li><a href="index.php?option=com_topics&amp;view=rdmore&amp;cid=' . $row->mid . '&amp;Itemid='.$_GET['Itemid'].'">' . $row->catgname . '</a></li>';
		}
		echo '</ul>';
	}
	$artigos = array();
	$totalcount = count($total);
	$ct = 0;
	if (is_array($total)) {
		foreach ($total as $r) {
			if ($r->link ) {
				$data = new stdClass;
				$data->link = $r->link;
				$data->dmdate_published = $r->dmdate_published;
				$data->titulo = $r->titulo;
				if (!$data->titulo) $data->titulo = $r->title;
				$artigos[] = $data;
				$ct++;
			}
		}
	}
	if ($artigos[0]->dmdate_published) {
		uasort($artigos, 'compare_dmdate');
		$artigos = array_reverse($artigos);
	}

	if ($ct < $totalcount) $totalcount = $ct;
	//	if ($dcid == 5932 || $dcid == 5927 || $dcid == 3273 || $dcid == 3274) { $totalcount = 2; }

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
		$link = "index.php?option=com_docman&amp;task=doc_download";
		$link .= "&amp;Itemid=&amp;gid=" . $artigos[0]->link;
		$link = JRoute::_( $link );
		echo "<li><a href=\"" . $link . "\">";
		echo $artigos[0]->titulo . "</a></li>\n";
	}
	if ($totalcount > 1) {
		$link = "index.php?option=com_docman&amp;task=doc_download";
		$link .= "&amp;Itemid=&amp;gid=" . $artigos[1]->link;
		$link = JRoute::_( $link );
		echo "<li><a href=\"" . $link . "\">";
		echo $artigos[1]->titulo . "</a></li>\n";
	}
	if ($totalcount > 0) {
		echo "</ul>\n";
	}
	if ($totalcount > 2) {
		echo "<p><a style=\"text-decoration:underline\" href=\"index.php?option=com_topics&amp;view=readall&amp;cid=".print_r($catid,true)."&amp;Itemid=".$_GET['Itemid']."\">" . JText::_( 'All Documents' ) . "</a></p>\n";
	}

}

function compare_dmdate($a, $b) {
	return strnatcmp($a->dmdate_published, $b->dmdate_published);
}
?>