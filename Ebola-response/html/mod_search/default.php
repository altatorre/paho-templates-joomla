<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<script type="text/javascript">
// Versión Genérica
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

$ai = JRequest::getString('ai')
$cod_language = JRequest::getString('lang')
?>
<!-- Google CSE Search Box Begins -->
<div class="search<?php echo $moduleclass_sfx; ?>">
<form class="searchclass" id="searchbox_<?php echo $prefix . ":" . $suffix; ?>" action="<?php echo $link; ?>" name="formsearch"> <!-- http://www.google.com/cse -->

	<input type="hidden" name="cx" id="cx" title="cx" value="<?php echo $prefix . ":" . $suffix; ?>" />
	<label for="q" style="visibility:hidden">question</label>
	<input type="text" name="q" id="q" title="question" size="40" maxlength="250" onchange="document.formsearch.searchword.value=document.formsearch.q.value" value="<?php echo $q; ?>" />
	<input type="hidden" name="searchword" id="searchword" title="searchword" />
	<input type="submit" name="sa" id="sa" title="sa" value="<?php echo JText::_('SEARCH BOX'); ?>" />
	<input type="hidden" name="cof" id="cof" title="cof" value="FORID:0" />
	<input type="hidden" name="searchphrase" id="searchphrase" title="searchphrase" value="all" /><br />
<!--	<input type="radio" name="scope" title="scope" value="1" <?php if ($scope==1) echo "checked=\"checked\" ";  ?>onclick="setThisWeb();" /><?php echo JText::_('SEARCH THIS SITE'); ?> 
	<input type="radio" name="scope" title="scope" value="2" <?php if ($scope==2) echo "checked=\"checked\" ";  ?>onclick="setAllPAHO();" /><?php echo JText::_('SEARCH ALL PAHO'); ?>
	<input type="radio" name="scope" title="scope" value="3" <?php if ($scope==3) echo "checked=\"checked\" ";  ?>onclick="setPAHOWHO();" /><?php echo JText::_('SEARCH PAHO WHO'); ?> -->
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
	
</form>
</div>
<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=searchbox_<?php echo $prefix . "%3A" . $suffix; ?>&amp;lang=<?php echo $cod_language; ?>"></script>
<script type="text/javascript">setThisWeb();</script>
<!-- Google CSE Search Box Ends -->
