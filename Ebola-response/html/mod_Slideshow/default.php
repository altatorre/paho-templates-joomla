<?php
/**
 * Slideshow Module Layout
 * Created by Paulo Leite - Version December 2013
 * @license        GNU/GPL, see LICENSE.php
 * mod_slideshow is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

?>
<script type="text/javascript">
var ctr = 0;
texto = new Array();
<?php
$bigdiv = "<div id=\"big_slide\">\r\n";
$img_margin = "";
foreach ($detalhes as $row) {
?>
<?	$txto = str_replace("'", "&#39;", $row->title); ?>
<?	$txto = str_replace('"', "&quot;", $txto); ?>
<?	$txto = '<p><a href="' . $row->link . '">' . $txto . "</a></p>"; ?>
	texto[ctr] = '<?php echo $txto; ?>';
	ctr++;
<?php
	if (property_exists($row, 'image')) {  
		$bigdiv .= "\t".'<div class="fp_slsh_foto"><div style="position:relative"><a href="' . $row->link . '"><img src="' . $row->image . '" alt="' . substr($row->title,0,50) . '..." /></a><div class="mascara"><img src="modules/'.$module->module . '/images/mascara.png" alt=" " /></div></div>'."\r\n".'<!-- end of .fp_slsh_foto --></div>'."\r\n".'<div class="fp_slsh_texto">'."\r\n".'<div class="sl_texto"><a href="' . $row->link . '"><h2>' . $row->title . '</h2></a><p><a href="' . $row->link . '">' .  JText::_("Read more...",$jsSafe = true) . '</a></p></div>'."\r\n".'<!-- end of .sl_texto -->'."\r\n".'</div>'."\r\n".'<!-- end of .fp_slsh_texto -->'."\r\n";
	}
	if (property_exists($row, 'video')) {  
		if ($row->flag) { $img_margin = '_margin'; }
		$bigdiv .= "<div class=\"fp_slsh_foto".$img_margin."\"><div style=\"position:relative\"><img src=\"" . $row->thumb . "\" alt=\"" . substr($row->title,0,50) . "...\" /><div class=\"mascara".$img_margin."\"><img src=\"modules/".$module->module . "/images/mascara.png\" alt=\" \" /></div><div class=\"fp_slsh_play".$img_margin."\"><a href=\"" . $row->ytlink . "\" class=\"html5lightbox\"><img src=\"modules/".$module->module . "/images/yt_play-600.png\" style=\"border: none\" alt=\"Play\" /></a></div><!-- end of .fp_slsh_play --></div><!-- end of .fp_slsh_foto --></div>"."\r\n".""."\r\n"."<div class=\"fp_slsh_texto\">"."\r\n"."<div class=\"sl_texto\"><a href=\"" . $row->link . "\"><h2>" . $row->title . "</h2></a><p><a href=\"" . $row->link . "\">" .  JText::_("Read more...",$jsSafe = true) . "</a></p></div><!-- end of .sl_texto --></div>"."\r\n"."<!-- end of .fp_slsh_texto -->\r\n";
		$img_margin = '';
	}
}
echo "</script>\n";
if (property_exists($detalhes[0], 'image')) {  
	$bigdiv .= '<div class="fp_slsh_foto"><div style="position:relative"><img src="' . $detalhes[0]->image . '" alt="'.substr($detalhes[0]->title,0,50) . '..." /><div class="mascara"><img src="modules/'.$module->module . '/images/mascara.png" alt=" " /></div></div><!-- end of .fp_slsh_foto --></div>'."\r\n".'<div class="fp_slsh_texto">'."\r\n".'<div class="sl_texto"><a href="' . 			$detalhes[0]->link . '"><h2>' . $detalhes[0]->title . '</h2></a><p><a href="' . $detalhes[0]->link . '">' .  JText::_("Read more...",$jsSafe = true) . '</a></p></div><!-- end of .sl_texto --></div><!-- end of .fp_slsh_texto -->';
}
if(property_exists($detalhes[0], 'video')) {
	if ($detalhes[0]->flag) { $img_margin = '_margin'; }
	$bigdiv .= "<div class=\"fp_slsh_foto".$img_margin."\"><div style=\"position:relative\"><img src=\"" . $detalhes[0]->thumb . "\" alt=\"" . substr($detalhes[0]->title,0,50) . "...\" /><div class=\"mascara".$img_margin."\"><img src=\"modules/".$module->module . "/images/mascara.png\"  alt=\" \" /></div><div class=\"fp_slsh_play".$img_margin."\"><a href=\"" . $detalhes[0]->ytlink . "\" class=\"html5lightbox\"><img src=\"modules/".$module->module . "/images/yt_play-600.png\" style=\"border: none\" alt=\"Play\" /></a></div><!-- end of .fp_slsh_play --></div><!-- end of .fp_slsh_foto --></div>"."\r\n".""."\r\n"."<div class=\"fp_slsh_texto\">"."\r\n"."<div class=\"sl_texto\"><a href=\"" . $detalhes[0]->link . "\"><h2>" . $detalhes[0]->title . "</h2></a><p><a href=\"" . $detalhes[0]->link . "\">" .  JText::_("Read more...",$jsSafe = true) . "</a></p></div><!-- end of .sl_texto --></div>"."\r\n"."<!-- end of .fp_slsh_texto -->\r\n";
	$img_margin = '';
}
	$bigdiv .="</div><!-- end of #big_slide -->\n";
?>
<div id="slides">
<?php 
	// cambio jc 20140311 - Reemplazo de & por &amp; para mejorar validación HTML
	$bigdiv = str_replace('&', '&amp;', $bigdiv);
	$bigdiv = str_replace('&amp;amp;', '&amp;', $bigdiv);
	echo $bigdiv; ?>
	<div id="sld_crc"><div id="circles" style="width: <?php echo count($detalhes) * 21; ?>px">
<?php
		echo "<div id=\"circle0\" class=\"color-circle-b\"><a style=\"outline: none;border:none\" href=\"javascript:ssGoto('0',this);\"><img src=\"" . JUri::base() . "modules/" . $module->module . "/images/null.gif\" width=\"11\" alt=\"slide 0\" style=\"border:0px\" /></a></div>";
	for ($i=1; $i < count($detalhes); $i++) {
		echo "<div id=\"circle" . $i . "\" class=\"color-circle\"><a style=\"outline: none;border:none\" href=\"javascript:ssGoto('$i', this);\"><img src=\"" . JUri::base() . "modules/" . $module->module . "/images/null.gif\" width=\"11\" alt=\"slide $i\" style=\"border:0px\" /></a></div>";
	}
	?>
</div><!-- end of #circles -->
</div><!-- end of #sld_crc -->
</div><!-- end of #slides -->
<div id="mini_sld_texto"><p><a href="<?php echo $detalhes[0]->link; ?>"><?php echo $detalhes[0]->title; ?></a></p></div>
<div class="clr"></div>
<script type="text/javascript"> 
inicio();
function inicio() {
	maxwdt = jQuery("#slides").width();
	comando = "";
	inivlr = 0;
	numslds = <?php echo count($detalhes); ?>;
	totwdt = (<?php echo count($detalhes); ?>+1)*maxwdt;
	tmp = 0;
	ssInterval = setInterval( "moverfwd()", 7000 );
}
function reinicio() {
	ssGoto(0);
		jQuery("#big_slide").animate({left: '0px'},0);
		clearInterval(ssInterval);
		inivlr = maxwdt;
	inicio();
}
function moverfwd() {
	for (ix = 0; ix < <?php echo count($detalhes); ?>; ix++) {
		document.getElementById("circle" + ix).style.background = "#F92";
	}
	tmp++;
	if (tmp == numslds) tmp = 0;
   document.getElementById('circle'+tmp).style.background = '#258';
   document.getElementById('mini_sld_texto').innerHTML = texto[tmp];
	inivlr = inivlr + maxwdt;
	if (inivlr == totwdt) {
		jQuery("#big_slide").animate({left: '0px'},0);
		inivlr = maxwdt;
	}
	comando = '-' + inivlr + 'px';
	jQuery("#big_slide").animate({left:comando},500);
}
function ssGoto(nbr) {
	clearInterval(ssInterval);
	for (ix = 0; ix < <?php echo count($detalhes); ?>; ix++) {
		document.getElementById("circle" + ix).style.background = "#F92";
	}
	document.getElementById("circle" + nbr).style.background = "#258";
   document.getElementById('mini_sld_texto').innerHTML = texto[nbr];
	nbr = nbr * maxwdt;
	comando = '-' + nbr + 'px';
	jQuery("#big_slide").animate({left:comando},500);
}
</script> 