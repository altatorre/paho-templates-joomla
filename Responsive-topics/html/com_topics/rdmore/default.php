<?php
/**
 * Health Topics Component
 * by Paulo Leite - 2014
 */

defined('_JEXEC') or die('Restricted access');




// Viene llamado como $link = JRoute::_('index.php?option=com_topics&amp;view=rdmore&amp;item=' . $slug . '&amp;cat=' . $tipo . '&amp;type=' . $row->catslug);

// Get the current language
$lang = JFactory::getLanguage()->getTag();
if ($lang != 'es-ES') $lang='en-GB';
$this->lang = substr($lang,0,2);
$total = $this->total;
$categoria = $this->catg;
if ( $categoria == 'alerts' ) {
	$documentos = $total->alerts_docs;
	$cat_title = "PAHOWHO_EPI_ALERTS";
}
if ( $categoria == 'scientific_technical' ) {
	$documentos = $total->sci_tech_docs;
	$cat_title = "PAHOWHO_SCIENTIFIC_TECHNICAL_MATERIAL";
}
if ( $categoria == 'communication' ) {
	$documentos = $total->advocacy_docs;
	$cat_title = "PAHOWHO_COMM_MATERIALS";
}
if ( $categoria == 'statistics' ) {
	$documentos = $total->statistics_docs;
	$cat_title = "PAHOWHO_DATA";
}
if ( $categoria == 'mandates' ) {
	$documentos = $total->mandates_docs;
	$cat_title = "PAHOWHO_MANDATES";
}
if ( $categoria == 'external' ) {
	$documentos = $total->external_docs;
	$cat_title = "EXTERNAL_MATERIAL";
}
	// igualacion de los documentos de segundo nivel.
foreach ($documentos as $doc) {
	if ($doc->level == 2) {
		$db = JFactory::getDBO();

		$query_categ_relation = "SELECT * FROM #__docman_category_relations where descendant_id=".$doc->catid." and level=1";			
		$db->setQuery($query_categ_relation);
		$this_categ_relation = $db->loadObject();

		$query_categ_father = "SELECT * FROM #__docman_categories where docman_category_id=".$this_categ_relation->ancestor_id;		
		$db->setQuery($query_categ_father);
		$this_categ_father = $db->loadObject();

		if ($this->type == $this_categ_father->slug) {
			$name_father = $this_categ_father->title;
			$slug_father = $this_categ_father->slug;
		}
		$doc->subcategory = $this_categ_father->title; 
		$doc->catid = $this_categ_father->docman_category_id; 
		$doc->catslug = $this_categ_father->slug; 
	}
}
foreach ($documentos as $doc) {
	if ($doc->catslug == $this->type) {
		$cat_type = $doc->catgname;
		break;
	}
}

	$mydocument =& JFactory::getDocument();
	$mytitle = $mydocument->getTitle();
	$mylanguage = $mydocument->getLanguage();
	$organization = "PAHO WHO";
	if ($mylanguage == "es-es") $organization = "OPS OMS";


?>
<div class="heading col-xs-12">
	<h1><?php echo $total->topic; ?></h1>
	<h2><?php echo JText::_( $cat_title ); ?></h2>
	<?php if ($name_father != "") { ?>
	<h3><?php echo JText::_( $name_father ); ?></h3>
	<?php 
		$mytitle = $organization . " | " . $total->topic . " | " . $name_father;
	} else { ?>
	<h3><?php echo JText::_( $cat_type ); ?></h3>
	<?php 
		$mytitle = $organization . " | " . $total->topic . " | " . JText::_( $cat_type );
	} 
	$mydocument->setTitle($mytitle);
	?>
</div>
<?php
	$anterior_ul = 0;
	$anterior_catgname = "";
	if (count($documentos) < 1) { echo JText::_( 'NO RECORD FOUND' ); }
	if (is_array( $documentos ) ) {
		foreach ($documentos as $row) {
			if ($row->catslug != $this->type) continue;
			if ($anterior_catgname != $row->catgname) {
				if ($anterior_ul > 0) {
					echo "</ul><!--  fin ".$anterior_catgname." -->";
					$anterior_ul = 0;
				}
				if (($row->catslug == $this->type) && ($name_father != "")) {
					echo "<div class=\"heading col-xs-12\"><h4>".$row->catgname."</h4></div>";
					echo "<ul>\n";
					$anterior_ul = 1;
				}
				$anterior_catgname = $row->catgname;
			}
			$link = $row->link; 
				// direccion sef
			$link = "index.php/documents/$row->catslug/$row->docman_document_id-$row->slug/file";
				// direccion 3.6
			$link = "index.php?option=com_docman&view=download&category_slug=".$row->catslug."&alias=".$row->docman_document_id."-".$row->slug."&Itemid=270";
				// direccion 1.5
			$link = "index.php?option=com_docman&task=doc_download&gid=".$row->docman_document_id."&Itemid=270";
			echo "<li><a href=\"$link\" target=\"_blank\">";
			echo $row->title . "</a></li>\n";
		}
		if ($anterior_ul == 1) {
			echo "</ul>";
			$anterior_ul = 0;
		}
	}
?>
<p><br />[<a href="#" onclick="javascript:window.history.back();return false;"><strong><? echo JText::_('Go back'); ?></strong></a>]</p>
<?php
	function findCat($total,$item) {
		$ct = 0;
		foreach ($total as $t) {
			if ($item == $t->cats->catslug) return $ct;
			$ct++;
		}
		return -1;
	}
?>