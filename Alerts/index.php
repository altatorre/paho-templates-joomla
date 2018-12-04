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
<?php //include ('canonical_tag.php'); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta http-equiv="refresh" content="28800">
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/style.css?v=20160315.1" type="text/css" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/style_ie.css" type="text/css" />
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/print.css" type="text/css" media="print" />
	<script type="text/javascript" src="<?php echo JURI::base(); ?>media/system/js/language.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
<body itemscope itemtype="http://schema.org/WebPage">
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
	<header>
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
			<div id="share">
				<jdoc:include type="modules" name="share" style="raw" />
			</div><!-- end of #share -->
		</div><!-- end of #header -->
		<div id="menus">
			<p class="ocm"><img src="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/images/mobile_menu_icon.png" style="width: 17px;float:left;margin-right:4px;border:0" width="17" alt="" />Menu</p>
			<div id="open_close_menu">
				<nav><jdoc:include type="modules" name="left" /></nav>
			</div><!-- #open_close_menus -->
			<div id="search">
				<jdoc:include type="modules" name="user4" />
			</div><!-- end of #search -->
		</div><!-- end of #menus -->
		</header>
	<div id="main">
		<div id="breadcrumbs">
			<jdoc:include type="modules" name="breadcrumbs" style="xhtml" />
		</div><!-- end of #breadcrumbs -->

<?php if($lm) { ?>
	<div id="highlight_out"><nav>
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
		</nav>
	</div><!-- end of #highlight_out -->
<?php } ?>
		<div<?php echo $content; ?>><!-- content -->
<?php if($this->countModules( 'top_wide' )) { ?>
			<div id="top_wide">
				<jdoc:include type="modules" name="top_wide" style="xhtml" />
			</div><!-- end of #top_wide -->
<?php } ?>
<?php if($this->countModules( 'top_narrow' )) { ?>
			<div id="top_narrow">
				<jdoc:include type="modules" name="top_narrow" style="xhtml" />
			</div><!-- end of #top_narrow -->
<?php } ?>
<?php if($this->countModules( 'premain' )) { ?>
			<div id="premain">
				<jdoc:include type="modules" name="premain" style="xhtml" />
			</div><!-- end of #premain -->
<?php } ?><!--googleon: index-->
			<jdoc:include type="component" />
	<!--googleoff: index-->
<?php if($this->countModules( 'postmain' )) { ?>
			<div id="postmain">
				<jdoc:include type="modules" name="postmain" style="xhtml" />
			</div><!-- end of #postmain -->
<?php } ?>
<?php if($this->countModules( 'innercenter' )) { $mmargin = "33%"; } else { $mmargin="49.4%"; } ?>
			<div id="innerleft" style="width: <?php echo $mmargin; ?>">
				<jdoc:include type="modules" name="innerleft" style="xhtml" />
			</div><!-- end of #innerleft -->
<?php if($this->countModules( 'innercenter' )) { ?>
			<div id="innercenter">
				<jdoc:include type="modules" name="innercenter" style="xhtml" />
			</div><!-- end of #innercenter -->
<?php } ?>
			<div id="innerright" style="width: <?php echo $mmargin; ?>">
				<jdoc:include type="modules" name="innerright" style="xhtml" />
			</div><!-- end of #innerright -->
			<div style="clear: both">&nbsp;</div>
			<div id="col1">
				<jdoc:include type="modules" name="col1" style="xhtml" />
			</div><!-- end of #col1 -->
			<div id="col2">
				<jdoc:include type="modules" name="col2" style="xhtml" />
			</div><!-- end of #col2 -->
			<div id="col3">
				<jdoc:include type="modules" name="col3" style="xhtml" />
			</div><!-- end of #col3 -->
			<div id="col4">
				<jdoc:include type="modules" name="col4" style="xhtml" />
			</div><!-- end of #col4 -->

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
	<div style="clear:both"></div>
</div><!-- #wrapper -->
<footer>
	<div id="footr_out">
		<div id="footr_in">
			<div id="honcode">
				<jdoc:include type="modules" name="footer_left" />
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
	</footer>
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
<!--googleon: index-->
</body>
</html>