<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Including fallback code for the placeholder attribute in the search field.
JHtml::_('jquery.framework');
//JHtml::_('script', 'system/html5fallback.js', false, true);
?>
<script type="text/javascript">
// Versin Genrica
function setThisWeb() {
	document.formsearch.cx.value='<?php echo $prefix . ":" . $suffix; ?>';
	document.formsearch.id='searchbox_<?php echo $prefix . ":" . $suffix; ?>';
}

function setAllPAHO() {
	document.formsearch.cx.value='014283770845240200164:prvkaxcnku0';
	document.formsearch.id='searchbox_014283770845240200164:prvkaxcnku0';
}

function setPAHOWHO() {
	document.formsearch.cx.value='014283770845240200164:nqw9rit8pwa';
	document.formsearch.id='searchbox_014283770845240200164:nqw9rit8pwa';
}
</script>
<?php
	$q = urldecode(JRequest::getString('q'));
	$scope = urldecode(JRequest::getString('scope'));
	if ($scope == "") $scope=1;
	if ($link=="") { $link="index.php"; } // $link="#";
	//$mitemid = urldecode(JRequest::getString('Itemid')); // si se quisiera que recuperar la de la página en que está parado. 
	if ($set_Itemid != "") {
		$mitemid = $set_Itemid;
	} else {
		$mitemid = 1;
	}

?>
<!-- Google CSE Search Box Begins -->
<div class="search<?php echo $moduleclass_sfx; ?>">
<form action="<?php echo $link; ?>" class="navbar-form" role="search">
	<input type="hidden" name="cx" id="cx" title="cx" value="<?php echo $prefix . ":" . $suffix; ?>" />
	<div class="form-group"><input type="text"  class="form-control" name="q" id="q" title="question" size="40" maxlength="250" onchange="document.formsearch.searchword.value=document.formsearch.q.value" value="<?php echo $q; ?>"  placeholder="Google Custom" /></div>
	<input type="hidden" name="searchword" id="searchword" title="searchword" />
	<input type="hidden" name="cof" id="cof" title="cof" value="FORID:0" />
	<input type="hidden" name="searchphrase" id="searchphrase" title="searchphrase" value="all" /><br />
	<input type="hidden" name="scope" id="scope" title="scope" value="1"/>
	<input type="hidden" name="option" id="option" title="option" value="com_search"/>
	<input type="hidden" name="Itemid" id="Itemid" title="Itemid" value="<?php echo $mitemid; ?>" />	
	<input type="hidden" name="ie" id="ie" title="ie" value="utf8" />
	<input type="hidden" name="site" id="site" title="site" value="who" />
	<input type="hidden" name="client" id="client" title="client" value="<?php echo JText::_('CLIENT WHO'); ?>" />
	<input type="hidden" name="proxystylesheet" id="proxystylesheet" title="proxystylesheet" value="<?php echo JText::_('PROXYSTYLESHEET'); ?>" /> 
	<input type="hidden" name="output" id="output" title="output" value="xml_no_dtd" />
	<input type="hidden" name="oe" id="oe" title="oe" value="utf8" />
	<input type="hidden" name="getfields" id="getfields" title="getfields" value="doctype"/>
	<input type="hidden" name="ai" id="ai" title="ai" value="<?php echo $ai; ?>"/>
	<?php
		$output = '';
		//$output .= '<div class="form-group"><input name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '"  class="form-control" type="text" placeholder="' . JText::_('MOD_SEARCH_SEARCH_KEYWORD') . '" /></div>';

		if ($button) :
			if ($imagebutton) :
				$btn_output = ' <input type="image" alt="' . $button_text . '" class="button" src="' . $img . '" onclick="this.form.searchword.focus();"/>';
			else :
				$btn_output = ' <button type="submit" class="btn btn-default" onclick="this.form.searchword.focus();">' . $button_text . '</button>';
			endif;

			switch ($button_pos) :
				case 'top' :
					$output = $btn_output . '<br />' . $output;
					break;

				case 'bottom' :
					$output .= '<br />' . $btn_output;
					break;

				case 'right' :
					$output .= $btn_output;
					break;

				case 'left' :
				default :
					$output = $btn_output . $output;
					break;
			endswitch;

		endif;

		//echo $output;
	?>
</form>
</div>
<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=searchbox_<?php echo $prefix . "%3A" . $suffix; ?>&amp;lang=<?php echo $cod_language; ?>"></script>
<script type="text/javascript">setThisWeb();</script>
<!-- Google CSE Search Box Ends -->
