<?php
/**
 * Health Topics Component
 * by Paulo Leite - 2014
 */

defined('_JEXEC') or die('Restricted access');
$topic = $this->topics;
//print_r($topic);
$document = & JFactory::getDocument();
$document->setTitle($topic->topic . ' | PAHO' );
$slug =$topic->alias;
if ($topic->replacingurl) {
	echo "<script>location.replace('" . $topic->replacingurl . "'); </script>";
}
$left_menu = array();
if ($topic->sci_tech_doc_types) $left_menu[] = "PAHOWHO_SCIENTIFIC_TECHNICAL_MATERIAL|#sci_tech";
if ($topic->advocacy_doc_types) $left_menu[] = "PAHOWHO_COMM_MATERIALS|#communication";
if ($topic->mandates_doc_types) $left_menu[] = "PAHOWHO_MANDATES|#mandates";
if ($topic->alerts_doc_types) $left_menu[] = "PAHOWHO_EPI_ALERTS|#alerts";
if ($topic->external_doc_types) $left_menu[] = "EXTERNAL_MATERIAL|#external";
if ($topic->statistics_doc_types) $left_menu[] = "PAHO/WHO Data, Maps and Statistics|#data";
if ( substr( $topic->multimedia[0], 0, 16) != '{"name":"","type' ) $left_menu[] = "PAHOWHO_MULTIMEDIA|#multimedia";
if ($topic->news) $left_menu[] = "HT_NEWS|#news";
//print_r($topic);
?>
			<!-- Title -->
			<div class="heading col-xs-12">
				<h1><?php echo $topic->topic; ?></h1>
			</div>
			<div class="clearfix"></div>
			<!-- Internal Menu -->
			<div id="sidebar" class="col-md-4">
				<ul class="navigation">
<?php
foreach($left_menu as $row) {
	$menu = explode('|', $row);
	echo '					<li><a href="' . $menu[1] . '">' . JText::_( $menu[0] ) . "</a></li>\n";
}
?>
				</ul>
			</div>
			<!-- Definition -->
			<div id="content" class="col-md-8 hidden-xs">
				<div class="text-block">
					<p><?php echo stripslashes($topic->blurb); ?></p>
					<?php if ($topic->additional_info) {
					$additionallink = str_replace( "&amp;amp;", "&amp;", str_replace( "&", "&amp;", stripslashes($topic->additional_link) ));
					?>
					<p><a href="<?php echo $additionallink; ?>"><?php echo stripslashes($topic->additional_info); ?></a></p>
<?php } ?>
			</div>
			</div>
		</div>

		<!-- Row that starts with topic photo -->
		<div class="row">
			<div class="col-xs-12">
				<div class="gallery-holder">

					<!-- Scientific and Technical Material starts here -->
					<div class="item" id="sci_tech">
						<div class="img-holder">
                  	<img src="<?php echo $topic->photo; ?>-1.jpg" alt="<?php $topic->topic; ?>" width="364" height="180">
						</div>
						<?php if ( $topic->sci_tech_docs ) { ?>
						<div class="textholder">
							<h2><?php echo JText::_( 'PAHOWHO_SCIENTIFIC_TECHNICAL_MATERIAL' ); ?></h2>
							<?php showDocman($topic->sci_tech_docs, 'PAHOWHO_SCIENTIFIC_TECHNICAL_MATERIAL', $slug, 'scientific_technical');
							}
							$tq = urlencode($topic->topic);
							?>
							<div class="linkholder">
								<a href="http://pesquisa.bvsalud.org/portal/?q=<?php echo $tq; ?>" class="link"><?php echo JText::_('SEARCH_VHL'); ?></a>
							</div>
						<?php if ( $topic->sci_tech_docs ) { ?>
						</div><!-- end of textholder -->
						<?php } ?>
					</div><!-- end of item -->
					<!-- End of Scientific and Technical Material -->

					<!-- Epidemiological Alerts start here -->
					<?php if ( $topic->alerts_docs ) { ?>
					<div class="item" id="alerts">
						<div class="textholder textholder3">
							<h2><?php echo JText::_( 'PAHOWHO_EPI_ALERTS' ); ?></h2>
							<?php showDocman($topic->alerts_docs, 'PAHOWHO_EPI_ALERTS', $slug, 'alerts'); ?>
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
					<?php if ( $topic->advocacy_docs ) { ?>
					<div class="item" id="communication">
						<div class="img-holder">
							<img src="<?php echo $topic->photo; ?>-2.jpg" alt="image description" width="364" height="180">
						</div>
						<div class="textholder">
							<h2><?php echo JText::_( 'PAHOWHO_COMM_MATERIALS' ); ?></h2>
							<?php showDocman($topic->advocacy_docs, 'PAHOWHO_COMM_MATERIALS', $slug, 'communication'); ?>
						</div>
					</div>
					<?php } ?>
					<!-- Communication Materials end here -->

					<!-- Mandates and Strategies start here -->
					<?php if ( $topic->mandates_docs ) { ?>
					<div class="item" id="mandates">
						<div class="img-holder">
							<img src="<?php echo $topic->photo; ?>-3.jpg" alt="image description" width="364" height="179">
						</div>
						<div class="textholder">
	                  <h2><?php echo JText::_( 'PAHOWHO_MANDATES' ); ?></h2>
							<?php	showDocman($topic->mandates_docs, 'PAHOWHO_MANDATES', $slug, 'mandates'); ?>
						</div>
					</div>
					<?php } ?>
					<!-- Mandates and Strategies end here -->

					<!-- Video Block starts herel -->
					<?php
					if ( $topic->mm_highlight ) {
						$video = $topic->mm_highlight;
						if (stripos($video,'v=')) {
							$ytcode = substr($video, stripos($video,'v=')+2,11);
						} else {
							$ytcode = substr($video, strlen($video)-11, 11);
						}
					?>
					<div class="item">
						<div class="ytWrapper">
							<iframe  class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $ytcode; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
							<a href="#" class="play" data-toggle="modal" data-target="#myModal">Play</a>
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
					<?php if ( $topic->external_docs ) { ?>
					<div class="item" id="external">
						<div class="textholder textholder3">
							<h2><?php echo JText::_( 'EXTERNAL_MATERIAL' ); ?></h2>
							<?php showDocman($topic->external_docs, 'EXTERNAL_MATERIAL', $slug, 'external'); ?>
						</div>
					</div>
					<?php } ?>
					<!-- External Parties Material ends here -->

					<!-- Statistics start here -->
					<?php if ( $topic->statistics_docs ) { ?>
					<div class="item" id="data">
						<div class="textholder textholder3">
							<h2><?php echo JText::_( 'PAHOWHO_DATA' ); ?></h2>
							<?php showDocman($topic->statistics_docs, 'PAHOWHO_DATA', $slug, 'statistics'); ?>
						</div>
					</div>
					<?php } ?>
					<!-- Statistics end here -->

					<!-- Strategic Partners Module starts here -->
					<?php if ( $topic->centers && substr( $topic->centers[0], 0, 16) != '{"name":"","link' ) { ?>
					<div class="item">
						<div class="textholder textholder3">
						<h2><?php echo JText::_('STRATEGIC_PARTNERS'); ?></h2>
							<ul class="list">
								<?php foreach ( $topic->centers as $cc ) {
								$cc = json_decode( $cc );
								if ( !$cc->name ) continue; ?>
								<li><a href="<?php echo $cc->link; ?>"><?php echo $cc->name; ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<?php } ?>
					<!-- Strategic Partners Module ends here -->


					<!-- PAHO/WHO Programs start here -->
					<?php	if ($topic->paho_text) { $ptext = $topic->paho_text; } else { $ptext = $topic->topic; } ?>
					<?php	if ($topic->who_text) { $wtext = $topic->who_text; } else { $wtext = $topic->topic; } ?>
			
					<div class="item">
						<div class="textholder1">
							<h2><?php echo JText::_('PAHOWHO_PROGRAM'); ?></h2>
							<ul style="margin-top: -12px"><li><a style="color: #FFF" href="<?php echo $topic->paho; ?>"><?php echo $ptext; ?></a></li></ul>
							<h2><?php echo JText::_('WHO_HEALTH_TOPIC'); ?></h2>
							<ul style="margin-top: -12px"><li><a style="color: #FFF" href="<?php echo $topic->who; ?>"><?php echo $wtext; ?></a></li></ul>
						</div>
					</div>
					<!-- PAHO/WHO Programs end here -->

					<!-- Multimedia Materials start here -->
					<?php if ( substr( $topic->multimedia[0], 0, 16) != '{"name":"","type' ) { ?>
					<div class="item" id="multimedia">
						<div class="textholder">
							<h2><?php echo JText::_('PAHOWHO_MULTIMEDIA'); ?></h2>
							<ul class="list">
							<?php foreach ( $topic->multimedia as $mm ) {
							$mm = json_decode( $mm );
							if ( !$mm->name ) continue; ?>
								<li><strong><?php echo $mm->type; ?>:</strong>&nbsp;<a href="<?php echo $mm->link; ?>"><?php echo $mm->name; ?></a></li>
							<?php } ?>
							</ul>
						</div>
					</div><!-- end of item -->
					<?php } ?>
					<!-- Multimedia Materials end here -->


				</div><!-- end of gallery-holder -->
			</div>

<?php $mod_right = JHTML::_('content.prepare', '{loadposition right3}');
if($mod_right): ?>
	<div id="sidebar" class="col-md-4">
		<?php echo $mod_right; ?>
	</div>
<?php endif; ?>




<!--
			<div class="twocolumns1 row" style="outline: 1px solid red">
				<div class="col-md-8">
					<div class="block1">
						<div class="holder">
							<div class="col-xs-12">
                  <h2>Successful Stories</h2>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6 img-block">
                  <div class="img-holder">
                    <a href="#"><img src="images/img08.jpg" alt="image description" width="363" height="156"></a>
                  </div>
                  <span><a href="#">Haiti: safe food in rural schools</a></span>
                </div>
                <div class="col-sm-6 img-block">
                  <div class="img-holder">
                    <a href="#"><img src="images/img09.jpg" alt="image description" width="333" height="156"></a>
                  </div>
                  <span><a href="#">El Salvador: Women spread the  word on food safety</a></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 hidden-xs hidden-sm" style="outline: 1px solid blue">
            <a href="#" class="box">
              <div class="text-block">
                <span><strong>From Farm to plate</strong>keep it safe</span>
              </div>
              <div class="ico-block">
                <img src="images/img10.jpg" alt="image description" width="143" height="142">
              </div>
            </a>
          </div>
-->
							
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
		echo '<ul class="category-list">';
		foreach ($cats as $row) {
			$link = JRoute::_('index.php?option=com_topics&amp;view=rdmore&amp;item=' . $slug . '&amp;cat=' . $tipo . '&amp;type=' . $row->catslug);
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
			// $data->link = "index.php/documents/$r->catslug/$r->docman_document_id-$r->slug/file";
			$data->link = JRoute::_("index.php?option=com_docman&task=doc_download&gid=".$r->docman_document_id);
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
			echo "\n<ul class=\"list\">\n";
			$link = $artigos[0]->link;
			echo "<li><a href=\"" . $link . "\" target=\"_blank\">";
			echo $artigos[0]->titulo . "</a></li>\n";
		}
		if ($totalcount > 1) {
			$link = $artigos[1]->link;
			echo "<li><a href=\"" . $link . "\" target=\"_blank\">";
			echo $artigos[1]->titulo . "</a></li>\n";
		}
		echo "</ul>\n";
		if ($totalcount > 2) {
		echo '<p><a class="btn" href="index.php?option=com_topics&amp;view=readall&type=' . $tipo . '&amp;item=' . $slug . '">' . JText::_( 'ALL_DOCS' ) . '</a></p>';
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
}

function compare_dmdate($a, $b) {
	return strnatcmp($a->dmdate_published, $b->dmdate_published);
}
?>