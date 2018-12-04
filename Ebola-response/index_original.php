<?php defined( '_JEXEC' ) or die( 'Restricted access' );
$isIE = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'MSIE');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"  lang="<?php echo $this->language; ?>" >
 
<head>
<?php
	if ($isIE) { ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?php } ?>
<?php include ('canonical_tag.php'); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/style.css" type="text/css" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/style_ie.css" type="text/css" />
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/print.css" type="text/css" media="print" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo JURI::base(); ?>media/system/js/language.js"></script>
	<script type="text/javascript" src="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/js/html5lightbox/html5lightbox.js"></script>
<jdoc:include type="head" />
<?php
	$lm = 0;
	$lm = $lm + ($this->countModules( 'left1' )); 
	$lm = $lm + ($this->countModules( 'left2' )); 
	$lm = $lm + ($this->countModules( 'left3' )); 
	$lm = $lm + ($this->countModules( 'left5' )); 
	$rm = 0;
	$rm = $rm + ($this->countModules( 'right' )); 
	$rm = $rm + ($this->countModules( 'right1' )); 
	$rm = $rm + ($this->countModules( 'right2' )); 
	$rm = $rm + ($this->countModules( 'right3' )); 
	$rm = $rm + ($this->countModules( 'right4' )); 
	if (!$lm && !$rm) {
		$content = " id=\"content_full\"";
		$access  = "#content_full";
	}
	if ($lm && !$rm) {
		$content = " id=\"content_right\"";
		$access = "#content_right";
	}
	if (!$lm && $rm) {
		$content = " id=\"content_left\"";
		$access = "#content_left";
	}
	if ($lm && $rm) {
		$content = " id=\"content_lr\"";
		$access = "#content_lr";
	}
	if ($content == ' id="content_right"' || $content == ' id="content_full"') {
?>
	<style>
	#main { background-image: none; }
	</style>
<?php
	}
?>
</head>
<body>


<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MDCJXB" title="Google Tag Manager"
style="height:0px;width:0px;display:none;visibility:hidden"><span style="visibility:hidden">Google Tag</span></iframe></noscript>
<script type="text/javascript">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MDCJXB');</script>
<!-- End Google Tag Manager -->
<!--googleoff: index-->  
 <?php
 $menu = & JSite::getMenu();
if ($menu->getActive() == $menu->getDefault()) {
	$conf =& JFactory::getConfig();
	$sitename = $conf->getValue('config.sitename');
	echo "<h1 style=\"display:none\">".$sitename,"</h1>"; 
}
?>
<div id="wrapper">
	<div id="access">
			<p><a href="<?php echo $access; ?>" title="Skip to content">Skip to content</a></p>
		</div><!-- end of #access -->
		<div id="language">
			<jdoc:include type="modules" name="language" />
		</div><!-- end of #language -->
		<div id="header">
			<div id="banner">
				<jdoc:include type="modules" name="banner" style="raw" />
			</div><!-- end of #banner -->
			<div id="flag">
				<jdoc:include type="modules" name="flag" style="raw" />
			</div><!-- end of #flag -->
<?php $sh = $this->countModules( 'eb-right' );
if ($sh < 1) { ?>
			<div id="share">
				<jdoc:include type="modules" name="share" style="raw" />
			</div><!-- end of #share -->
<?php } ?>
			</div><!-- end of #header -->
		<div id="menus">
			<p class="ocm"><img src="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/images/mobile_menu_icon.png" style="width: 17px;float:left;margin-right:4px;border:0" alt="" />Menu</p>
			<div id="open_close_menu">
				<jdoc:include type="modules" name="eb-menu" />
			</div><!-- #open_close_menus -->
			<div id="search">
				<jdoc:include type="modules" name="user40" />
			</div><!-- end of #search -->
		</div><!-- end of #menus -->

	<div id="main">
		<div id="content-2"<?php if (!$this->countModules( 'eb-right' )) { echo ' style="width: 100%"'; } ?>><!-- content -->
<?php if ($this->countModules( 'premain' )) { ?>
			<div id="premain">
				<jdoc:include type="modules" name="premain" style="xhtml" />
			</div><!-- end of #premain -->
<?php } ?>
			<jdoc:include type="component" />

			<div id="ct_left-1">
				<jdoc:include type="modules" name="eb-left1" style="xhtml" />
			</div><!-- end of #ct_left-1 -->

			<div id="ct_left-2">
				<jdoc:include type="modules" name="eb-left2" style="xhtml" />
			</div><!-- end of #ct_left-2 -->
<?php if ($this->countModules( 'postmain' )) { ?>
			<div id="postmain">
				<jdoc:include type="modules" name="postmain" style="xhtml" />
			</div><!-- end of #postmain -->
<?php } ?>
<?php if ($this->countModules( 'innerleft' )) { ?>
			<div id="innerleft">
				<jdoc:include type="modules" name="innerleft" style="xhtml" />
			</div><!-- end of #innerleft -->
<?php } ?>
<?php if ($this->countModules( 'innerright' )) { ?>
			<div id="innerright">
				<jdoc:include type="modules" name="innerright" style="xhtml" />
			</div><!-- end of #innerright -->
<?php } ?>
<?php if ($this->countModules( 'postcols' )) { ?>
			<div id="postcols">
				<jdoc:include type="modules" name="postcols" style="xhtml" />
			</div><!-- end of #postcols -->
<?php } ?>
		</div><!-- #content -->
		<?php if ($this->countModules( 'eb-right' )) { ?>
		<div id="ct_right">
			<div id="eb-share"><jdoc:include type="modules" name="share" style="raw" /></div>
			<jdoc:include type="modules" name="eb-right" style="xhtml" />
		</div><!-- end of #ct_right -->
<?php } ?>
	</div><!-- #main -->
	<div style="clear:both"></div>
</div><!-- #wrapper -->
	<div id="footr_out">
		<div id="footr_in">
			<div id="honcode">
				<jdoc:include type="modules" name="footer_left" style="xhtml" />
			</div><!-- end of #honcode -->
			<div class="ftmenu">
				<jdoc:include type="modules" name="ftmenu1" style="xhtml" />
			</div><!-- end of .ftmenu -->
			<div class="ftmenu">
				<jdoc:include type="modules" name="ftmenu2" style="xhtml" />
			</div><!-- end of .ftmenu -->
			<div class="ftmenu">
				<jdoc:include type="modules" name="ftmenu3" style="xhtml" />
			</div><!-- end of .ftmenu -->
		</div><!-- end of #footr_in -->
		<div id="site-info">
			<jdoc:include type="modules" name="site_info" style="raw" />
		</div><!-- end of #site-info -->
		<div class="clr"></div>
	</div><!-- end of #footr_out -->
	<script>
	jQuery(document).ready(function(){
		jQuery(".ocm").click(function(){
			jQuery("#open_close_menu").toggle(500);
		});
	});
	</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44374338-1', 'paho.org');
  ga('send', 'pageview');

</script>
<script>
if ( jQuery("#dcslider").length ) {
	inicio();
	jQuery(window).resize(function() {
		reinicio();
	});
}
</script>
<!--googleon: index-->
</body>
</html>