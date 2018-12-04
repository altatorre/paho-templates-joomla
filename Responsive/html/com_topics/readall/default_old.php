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
?>

<h1 class="htopics" style="margin-top: 10px"><?php echo $this->document->title; ?>: <?php echo JText::_( $total[0]->cats->category ); ?></h1>

<ul>
<?php
	if (count($total) < 1) { echo JText::_( 'NO RECORD FOUND' ); }
	if (is_array( $total ) ) {
		foreach ($total as $t) {
			$categoria = $t->cats;
			$documentos = $t->docs;
			echo '<br><h2 class="htsub">' . JText::_( $categoria->subcategory ) . '</h2>';
			foreach ($documentos as $row) {
				$link = $row->link;
				echo "<li style=\"margin-left: 12px\"><a href=\"$row->link\">";
				echo $row->titulo . "</a></li>\n";
			}
		}
	}
?>
</ul>
<p><br />[<a href="#" onclick="javascript:window.history.back();return false;"><strong><?php echo JText::_('Go back'); ?></strong></a>]</p>
