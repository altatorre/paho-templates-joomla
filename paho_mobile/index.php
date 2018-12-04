<?php
defined( '_VALID_MOS' ) or die( 'Restricted access' );
// needed to seperate the ISO number from the language file constant _ISO
$iso = explode( '=', _ISO );
// xml prolog
echo '<?xml version="1.0" encoding="'. $iso[1] .'"?' .'>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=480" />
<?php mosShowHead(); ?>
	<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
	<link href="<?php echo $mosConfig_live_site;?>/templates/paho_mobile/css/template_css.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Last-Modified" content="<?php echo date('D, d M Y H:i:s O', getlastmod()); ?>" />
<meta http-equiv="Expires" content="<?php echo date('D, d M Y H:i:s O', mktime(0, 0, 0, date("m")  , date("d")+30, date("Y")));?>" />
<meta http-equiv="Connection" content="keep-alive" />
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $cur_template; ?>/mootools.js" type="text/javascript"></script>
	<script language="javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/selectLanguage.js" type="text/javascript"></script>
</head>
<body style="font-family:Verdana,Sans-serif,sans,helvetica;font-size:.8em">

<!-- Inicio idioma -->					
<!-- Fin idioma -->

<div id="banner_inner">
<img src="<?php echo $mosConfig_live_site;?>/images/banners/mobile_banner.jpg" border="0" alt="Pan American Health Organization/Organización Panamericana de la Salud" /></div>

<ul class="topmenu">
<li><a href="http://www.paho.org/mobile">Home</a>&nbsp;|</li>
<li><a href="http://new.paho.org/hq/index.php?option=com_joomlabook&Itemid=1830">Topics</a>&nbsp;|</li>
<li><a href="http://new.paho.org/hq/index.php?option=com_pronpro&Itemid=1830">Projects & Programs</a></li>
</ul>

<div style="clear:both"></div>

<!-- Menu de busca -->
<!-- Left menu zone -->

<!-- Content -->
<div><?php mosLoadModules ( 'premain', -2 ); ?></div>
<!-- News Content -->
<?php mosMainBody(); ?>
<div><?php mosLoadModules ( 'postmain', -2 ); ?></div>

<!-- Right menu zone -->
<hr style="margin-top:20px">
<div style="font-size:.85em">&copy; World Health Organization 2007. All rights reserved.  &copy 2010 Pan American Health Organization - Organización Panamericana de la Salud</div>

</body>
</html>