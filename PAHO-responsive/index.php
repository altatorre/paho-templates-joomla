<?php defined( '_JEXEC' ) or die( 'Restricted access' );
$isIE = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'MSIE');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >

<head>
<?php
	if ($isIE) { ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?php } ?>
<?php include ('canonical_tag.php'); ?>
<jdoc:include type="head" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/style.css" type="text/css" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/style_ie.css" type="text/css" />
	<![endif]-->
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/print.css" type="text/css" media="print" />
	<script type="text/javascript" src="<?php echo JURI::base(); ?>media/system/js/language.js"></script>
	<script src="<?php echo JURI::base(); ?>includes/js/jquery-1.11.0"></script>
	<script type="text/javascript" src="<?php echo JURI::base(); ?>templates/PAHO-responsive/js/html5lightbox/html5lightbox.js"></script>
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

<div id="wrapper">
		<div id="access">
			<p><a href="<? echo $access; ?>" title="Skip to content">Skip to content</a></p>
		</div><!-- end of #access -->
		<div id="language">
			<jdoc:include type="modules" name="language" />
		</div><!-- end of #language -->
		<div id="header">
			<div id="banner">
				<jdoc:include type="modules" name="banner" />
			</div><!-- end of #banner -->
			<div id="search">
				<jdoc:include type="modules" name="user4" />
			</div><!-- end of #search -->
			<div id="share">
				<jdoc:include type="modules" name="share" />
			</div><!-- end of #share -->
		</div><!-- end of #header -->
		<div id="menus">
			<p class="ocm"><img src="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/images/mobile_menu_icon.png" style="width: 17px;float:left;margin-right:4px;border:0" alt="" />Menu</p>
			<div id="open_close_menu">
				<jdoc:include type="modules" name="left" />
			</div><!-- #open_close_menus -->
		</div><!-- end of #menus -->

	<div id="main">
		<div id="breadcrumbs">
			<jdoc:include type="modules" name="breadcrumb" style="xhtml" />
		</div><!-- end of #breadcrumbs -->

<?php if($lm) { ?>
	<div id="highlight_out">
		<div id="highlight_mid">
<?php if($this->countModules( 'left1' )) { ?>
			<jdoc:include type="modules" name="left1" style="xhtml" />
<?php } ?>
<?php if($this->countModules( 'left2' )) { ?>
			<div id="left2">
				<jdoc:include type="modules" name="left2" style="xhtml" />
			</div><!-- end of #left2 -->
<?php } ?>
<?php if($this->countModules( 'left3' )) { ?>
			<div id="left3">
			<jdoc:include type="modules" name="left3" style="xhtml" />
			</div><!-- end of #left3 -->
<?php } ?>
<?php if($this->countModules( 'left4' )) { ?>
			<div id="left4">
			<jdoc:include type="modules" name="left4" style="xhtml" />
			</div><!-- end of #left4 -->
<?php } ?>
<?php if($this->countModules( 'left5' )) { ?>
			<div id="left5">
			<jdoc:include type="modules" name="left5" style="xhtml" />
			</div><!-- end of #left5 -->
<?php } ?>
		</div><!-- end of #highlight_mid -->
	</div><!-- end of #highlight_out -->
<?php } ?>
		<div<?php echo $content; ?>><!-- content -->
<?php if($this->countModules( 'premain' )) { ?>
			<div id="premain">
				<jdoc:include type="modules" name="premain" style="raw" />
			</div><!-- end of #premain -->
<?php } ?>
			<jdoc:include type="component" />
<?php if($this->countModules( 'postmain' )) { ?>
			<div id="postmain">
				<jdoc:include type="modules" name="postmain" style="xhtml" />
			</div><!-- end of #postmain -->
<?php } ?>
			<div id="innerleft">
				<jdoc:include type="modules" name="innerleft" style="xhtml" />
			</div><!-- end of #innerleft -->
			<div id="innerright">
				<jdoc:include type="modules" name="innerright" style="xhtml" />
			</div><!-- end of #innerright -->
			<div id="postcols">
				<jdoc:include type="modules" name="postcols" style="xhtml" />
			</div><!-- end of #postcols -->

		</div><!-- #content -->
<?php if($rm) { ?>
	<div id="right">
		<div id="sidebar">
<?php if($this->countModules( 'right' )) { ?>
			<jdoc:include type="modules" name="right" style="xhtml" />
<?php } ?>
<?php if($this->countModules( 'right1' )) { ?>
			<jdoc:include type="modules" name="right1" style="xhtml" />
<?php } ?>
<?php if($this->countModules( 'right2' )) { ?>
			<jdoc:include type="modules" name="right2" style="xhtml" />
<?php } ?>
<?php if($this->countModules( 'right3' )) { ?>
			<jdoc:include type="modules" name="right3" style="xhtml" />
<?php } ?>
<?php if($this->countModules( 'right4' )) { ?>
			<jdoc:include type="modules" name="right4" style="xhtml" />
<?php } ?>
<?php if($this->countModules( 'right5' )) { ?>
			<jdoc:include type="modules" name="right5" style="xhtml" />
<?php } ?>



		</div><!-- end of sidebar -->
	</div><!-- end of right -->
<?php } ?>
	</div><!-- #main -->
	
</div><!-- #wrapper -->
	<div id="footr_out">
		<div id="footr_in">
			<div id="honcode">
				<jdoc:include type="modules" name="footer_left" />
			</div><!-- end of #honcode -->
			<div class="ftmenu">
				<h3><?php //echo JText::_('Help and Services'); ?></h3>
				<jdoc:include type="modules" name="ftmenu1" style="xhtml" />
			</div><!-- end of .ftmenu -->
			<div class="ftmenu">
				<h3><?php //echo JText::_('Resources'); ?></h3>
				<jdoc:include type="modules" name="ftmenu2" style="xhtml" />
			</div><!-- end of .ftmenu -->
			<div class="ftmenu">
				<h3><?php //echo JText::_('Connect With PAHO'); ?></h3>
				<jdoc:include type="modules" name="ftmenu3" style="xhtml" />
			</div><!-- end of .ftmenu -->
		</div><!-- end of #footr_in -->
		<div id="site-info">
			<jdoc:include type="modules" name="site_info" style="raw" />
		</div><!-- end of #site-info -->
	</div><!-- end of #footr_out -->
	<script>
	$(document).ready(function(){
		$(".ocm").click(function(){
			$("#open_close_menu").toggle(500);
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
</body>
</html>