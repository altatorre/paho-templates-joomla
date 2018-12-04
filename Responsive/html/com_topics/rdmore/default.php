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
$total = $this->total;
$num = findCat($total, $this->type);
$total = $total[$num];
$categoria = $total->cats;
$documentos = $total->docs;
?>

<h1 class="htopics" style="margin-top: 10px"><?php echo $this->document->title ?>: <?php echo JText::_( $categoria->category ); ?></h1>
<h2 class="htsub"><?php echo JText::_( $categoria->subcategory ); ?></h2>

<ul>
<?php

	if (count($documentos) < 1) { echo JText::_( 'NO RECORD FOUND' ); }
	if (is_array( $documentos ) ) {
		foreach ($documentos as $row) {
			if ($row->catslug != $this->type) continue;
			$link = $row->link;
			echo "<li style=\"margin-left: 12px\"><a href=\"$row->link\">";
			echo $row->titulo . "</a></li>\n";
		}
	}
?>
</ul>
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