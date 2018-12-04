<?php
	defined( '_JEXEC' ) or die( 'Restricted access' );
	$lg = &JFactory::getLanguage();
	$lang = $lg->get('backwardlang');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" 
   xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >

<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/template.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo JURI::base(); ?>media/shadowbox/shadowbox.css" />
<script type="text/javascript" src="<?php echo JURI::base(); ?>media/shadowbox/shadowbox.js"></script>
<script type="text/javascript" src="<?php echo JURI::base(); ?>media/system/js/language.js"></script>
<script type="text/javascript">
Shadowbox.init({
	overlayOpacity: 0.7,
	viewportPadding: 40
});
</script>
</head>

<body>

<div id="col_cntnr">

    <div id="buttons_outer">
        <div id="buttons_inner">
		    <div id="buttons_language"><jdoc:include type="modules" name="language" /></div>
		</div>
	</div>

    <div id="header">
	    <div id="banner_inner">
			<?php if ( $lang == "english" ) { ?>
				<img src="http://www.paho.org/hq/images/banners/paho-banner-eng.jpg" style="border:0;width:808px;height:93px" />
			<?php } else { ?>
				<img src="http://www.paho.org/hq/images/banners/paho-banner-spa.jpg" style="border:0;width:808px;height:93px" />
			<?php } ?>
		</div>
	</div>
	
<!-- Menu de busca -->
                    
	<div id="top_outer">
	    <div id="top_inner">
		    <div id="top_inner_right_box">
				<jdoc:include type="modules" name="user4" />
			</div>
		</div>
		<div id="top_inner_menu">
		    <div id="top_inner_menu_buttons">
				<div style="width: 90px;float:left;text-align:left;padding-left:10px">
					<?php if ( $lang == "english" ) { ?>
					<a href="http://new.paho.org/hq/index.php?lang=en" style="color: #FFF"><strong>Home</strong></a>
					<?php } else { ?>
					<a href="http://new.paho.org/hq/index.php?lang=es" style="color: #FFF"><strong>Inicio</strong></a>
					<?php } ?>
				</div>
				<div style="width: 698px;float:right;text-align:right">
			    	<jdoc:include type="modules" name="user3" />
				</div>
			</div>
        </div>
	</div>

	<!-- Content -->
	<div id="content_outer">
	    <div id="content_inner">

            <!-- News Content -->
			<div><jdoc:include type="component" /></div>

        </div>
    </div>
    <div style="clear:both"></div>
</div>

<div id="legals" align="center">
	<table style="border:0px;width:100%">
	<tr>
	<td align="center">
	<div align="center">
    <jdoc:include type="modules" name="legals" style="xhtml" />
	</div>
	</td>
	</tr>
	</table>
</div>
		
<div class="ftr" align="center">
    <jdoc:include type="modules" name="footer" style="xhtml" />
</div>
<div>
    <jdoc:include type="modules" name="debug" />
</div>

</body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-4789980-51']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</html>