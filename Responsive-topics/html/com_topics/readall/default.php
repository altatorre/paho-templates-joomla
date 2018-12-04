<?php
/**
 * Health Topics Component
 * by Paulo Leite - 2014
 */

defined('_JEXEC') or die('Restricted access');
// Get the current language
$lang = JFactory::getLanguage()->getTag();
if ($lang != 'es-ES') $lang='en-GB';
$this->lang = substr($lang,0,2);
$type = $this->type;
$total = $this->total;

	$mydocument =& JFactory::getDocument();
	$mytitle = $mydocument->getTitle();
	$mylanguage = $mydocument->getLanguage();
	$organization = "PAHO WHO";
	if ($mylanguage == "es-es") $organization = "OPS OMS";
	$mytitle = $organization . " | " . $total->topic;


?>
<div class="heading col-xs-12"><h1><?php echo $total->topic; ?></h1></div>

<?php
	if (count($total) < 1) { echo JText::_( 'NO RECORD FOUND' ); }

	if ( $type == "alerts" && is_array( $total->alerts_doc_types ) ) {
		echo "<div class=\"heading\"><h2>" . JText::_( 'PAHOWHO_EPI_ALERTS' ) . "</h2></div>";
		$mytitle .= "|" . JText::_( 'PAHOWHO_EPI_ALERTS' );
		$doctypes = $total->alerts_doc_types;
		$documents = $total->alerts_docs;
		foreach ($doctypes as $dt) {
			echo "<div class=\"heading\"><h3>" . $dt->doc_type . "</h3></div>";
			echo "<ul>\n";
			foreach ($documents as $row) {
				if ( $row->catgname != $dt->doc_type ) continue;
				$link = "index.php/documents/$row->catslug/$row->docman_document_id-$row->slug/file";
				$link = "index.php/documents/$row->catslug/$row->docman_document_id-$row->slug/file";
					// direccion 3.6
				$link = "index.php?option=com_docman&view=download&category_slug=".$row->catslug."&alias=".$row->docman_document_id."-".$row->slug."&Itemid=270";
					// direccion 1.5
				$link = "index.php?option=com_docman&task=doc_download&gid=".$row->docman_document_id."&Itemid=270";
				echo "<li><a href=\"$link\" target=\"_blank\">";
				echo $row->title . "</a></li>\n";
			}
			echo "</ul>\n";
		}
	}

	if ( $type=="scientific_technical" && is_array( $total->sci_tech_doc_types ) ) {
		echo "<div class=\"heading\"><h2>" . JText::_( 'PAHOWHO_SCIENTIFIC_TECHNICAL_MATERIAL' ) . "</h2></div>";
		$mytitle .= "|" . JText::_( 'PAHOWHO_SCIENTIFIC_TECHNICAL_MATERIAL' );
		$doctypes = $total->sci_tech_doc_types;
		$documents = $total->sci_tech_docs;
		foreach ($doctypes as $dt) {
			echo "<div class=\"heading\"><h3>" . $dt->doc_type . "</h3></div>";
			echo "<ul>\n";
			foreach ($documents as $row) {
				if ( $row->catgname != $dt->doc_type ) continue;
				$link = "index.php/documents/$row->catslug/$row->docman_document_id-$row->slug/file";
				$link = "index.php/documents/$row->catslug/$row->docman_document_id-$row->slug/file";
					// direccion 3.6
				$link = "index.php?option=com_docman&view=download&category_slug=".$row->catslug."&alias=".$row->docman_document_id."-".$row->slug."&Itemid=270";
					// direccion 1.5
				$link = "index.php?option=com_docman&task=doc_download&gid=".$row->docman_document_id."&Itemid=270";
				echo "<li><a href=\"$link\" target=\"_blank\">";
				echo $row->title . "</a></li>\n";
			}
			echo "</ul>\n";
		}
	}

	if ( $type=="communication" && is_array( $total->advocacy_doc_types ) ) {
		echo "<div class=\"heading\"><h2>" . JText::_( 'PAHOWHO_COMM_MATERIALS' ) . "</h2></div>";
		$mytitle .= "|" . JText::_( 'PAHOWHO_COMM_MATERIALS' );
		$doctypes = $total->advocacy_doc_types;
		$documents = $total->advocacy_docs;
		foreach ($doctypes as $dt) {
			echo "<div class=\"heading\"><h3>" . $dt->doc_type . "</h3></div>";
			echo "<ul>\n";
			foreach ($documents as $row) {
				if ( $row->catgname != $dt->doc_type ) continue;
				$link = "index.php/documents/$row->catslug/$row->docman_document_id-$row->slug/file";
				$link = "index.php/documents/$row->catslug/$row->docman_document_id-$row->slug/file";
					// direccion 3.6
				$link = "index.php?option=com_docman&view=download&category_slug=".$row->catslug."&alias=".$row->docman_document_id."-".$row->slug."&Itemid=270";
					// direccion 1.5
				$link = "index.php?option=com_docman&task=doc_download&gid=".$row->docman_document_id."&Itemid=270";
				echo "<li><a href=\"$link\" target=\"_blank\">";
				echo $row->title . "</a></li>\n";
			}
			echo "</ul>\n";
		}
	}

	if ( $type=="statistics" && is_array( $total->statistics_doc_types ) ) {
		echo "<div class=\"heading\"><h2>" . JText::_( 'PAHOWHO_DATA' ) . "</h2></div>";
		$mytitle .= "|" . JText::_( 'PAHOWHO_DATA' );
		$doctypes = $total->statistics_doc_types;
		$documents = $total->statistics_docs;
		foreach ($doctypes as $dt) {
			echo "<div class=\"heading\"><h3>" . $dt->doc_type . "</h3></div>";
			echo "<ul>\n";
			foreach ($documents as $row) {
				if ( $row->catgname != $dt->doc_type ) continue;
				$link = "index.php/documents/$row->catslug/$row->docman_document_id-$row->slug/file";
				$link = "index.php/documents/$row->catslug/$row->docman_document_id-$row->slug/file";
					// direccion 3.6
				$link = "index.php?option=com_docman&view=download&category_slug=".$row->catslug."&alias=".$row->docman_document_id."-".$row->slug."&Itemid=270";
					// direccion 1.5
				$link = "index.php?option=com_docman&task=doc_download&gid=".$row->docman_document_id."&Itemid=270";
				echo "<li><a href=\"$link\" target=\"_blank\">";
				echo $row->title . "</a></li>\n";
			}
			echo "</ul>\n";
		}
	}

	if ( $type=="mandates" && is_array( $total->mandates_doc_types ) ) {
		echo "<div class=\"heading\"><h2>" . JText::_( 'PAHOWHO_MANDATES' ) . "</h2></div>";
		$mytitle .= "|" . JText::_( 'PAHOWHO_MANDATES' );
		$doctypes = $total->mandates_doc_types;
		$documents = $total->mandates_docs;
		foreach ($doctypes as $dt) {
			echo "<div class=\"heading\"><h3>" . $dt->doc_type . "</h3></div>";
			echo "<ul>\n";
			foreach ($documents as $row) {
				if ( $row->catgname != $dt->doc_type ) continue;
				$link = "index.php/documents/$row->catslug/$row->docman_document_id-$row->slug/file";
				echo "<li><a href=\"$link\" target=\"_blank\">";
				echo $row->title . "</a></li>\n";
			}
			echo "</ul>\n";
		}
	}

	if ( $type=="external" && is_array( $total->external_doc_types ) ) {
		echo "<div class=\"heading\"><h2>" . JText::_( 'EXTERNAL_MATERIAL' ) . "</h2></div>";
		$mytitle .= "|" . JText::_( 'EXTERNAL_MATERIAL' );
		$doctypes = $total->external_doc_types;
		$documents = $total->external_docs;
		foreach ($doctypes as $dt) {
			echo "<div class=\"heading\"><h3>" . $dt->doc_type . "</h3></div>";
			echo "<ul>\n";
			foreach ($documents as $row) {
				if ( $row->catgname != $dt->doc_type ) continue;
				$link = "index.php/documents/$row->catslug/$row->docman_document_id-$row->slug/file";
				$link = "index.php/documents/$row->catslug/$row->docman_document_id-$row->slug/file";
					// direccion 3.6
				$link = "index.php?option=com_docman&view=download&category_slug=".$row->catslug."&alias=".$row->docman_document_id."-".$row->slug."&Itemid=270";
					// direccion 1.5
				$link = "index.php?option=com_docman&task=doc_download&gid=".$row->docman_document_id."&Itemid=270";
				echo "<li><a href=\"$link\" target=\"_blank\">";
				echo $row->title . "</a></li>\n";
			}
			echo "</ul>\n";
		}
	}
	$mydocument->setTitle($mytitle);

?>

<p><br />[<a href="#" onclick="javascript:window.history.back();return false;"><strong><?php echo JText::_('Go back'); ?></strong></a>]</p>

