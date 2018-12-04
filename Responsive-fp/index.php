<?php defined( '_JEXEC' ) or die( 'Restricted access' );
$isIE = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'MSIE');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" >

<head>
<?php
	if ($isIE) { ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?php } ?>
<?php //include ('canonical_tag.php'); ?>
<jdoc:include type="head" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/uikit.min.css" />
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/style.css" type="text/css" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/style_ie.css" type="text/css" />
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>
	<script src="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/js/uikit.min.js"></script>
	<script type="text/javascript" src="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/js/html5lightbox/html5lightbox.js"></script>
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
<?php
$menu = JFactory::getApplication()->getMenu(); // anterior: JSite::getMenu();
if ($menu->getActive() == $menu->getDefault()) {
	$conf = JFactory::getConfig();
	$sitename = $conf->get('sitename');
	echo "<h1 style=\"display:none\">".$sitename,"</h1>";
}
?>
	<div id="wrapper">
		<div id="access">
			<p><a href="#slideshow" title="Skip to content">Skip to content</a></p>
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
			</div><!-- end of #flag -->

		</div><!-- end of #header -->

		<div id="menus">

			<p class="ocm"><img src="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/images/mobile_menu_icon.png" style="width: 17px;float:left;margin-right:4px;border:0" width="17" alt="" />Menu</p>

			<div id="open_close_menu">
				<jdoc:include type="modules" name="left" />
			</div><!-- #open_close_menus -->

			<div id="search"><!-- user4 -->
				<jdoc:include type="modules" name="user4" style="raw" />
			</div><!-- end of #search -->

		</div><!-- end of #menus -->
<gcse:searchresults></gcse:searchresults>
		<div id="slideshow" style="min-height: 200px;">
			<jdoc:include type="modules" name="slideshow" style="xhtml" />
		</div><!-- end of #slideshow -->

	<div id="fphighlight_out">
		<div id="fphighlight_inn">
			<h3><?php echo JText::_('Highlights'); ?></h3>
		</div>
		<div id="fphighlight_mid">
<?php if($this->countModules( 'left1' )) { ?>
			<jdoc:include type="modules" name="left1" style="raw" />
<?php } ?>
		</div>
	</div>

	<div id="main">
		<div id="content">
		<h3 class="fplatestnews"><?php echo JText::_( 'LATEST NEWS' ); ?></h3>
			<jdoc:include type="component" />
<?php if($this->countModules( 'postmain' )) { ?>
			<div id="postmain">
				<jdoc:include type="modules" name="postmain" style="xhtml" />
			</div>
<?php } ?>
		</div><!-- #content -->
	</div><!-- #main -->

	<div id="right">
		<div id="sidebar">
			<div id="frontpage" class="widget-area">
					<jdoc:include type="modules" name="right_fp" style="xhtml" />
			</div><!-- #frontpage .widget-area -->
		</div><!-- end of sidebar -->
	</div><!-- end of right -->

	<div id="home_widgets">
		<div id="home_widgets_internal">
			<div id="home_widgets_internal2">
				<div id="home-widget-area-1" class="widget-container" data-uk-scrollspy="{cls:'uk-animation-slide-left', repeat: true}">
						<jdoc:include type="modules" name="innerleft_fp" style="xhtml" />
				</div>				
				<div id="home-widget-area-2" class="widget-container" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', repeat: true}">
						<jdoc:include type="modules" name="innercenter_fp" style="xhtml" />
				</div>				
				<div id="home-widget-area-3" class="widget-container" data-uk-scrollspy="{cls:'uk-animation-slide-right', repeat: true}">
						<jdoc:include type="modules" name="innerright_fp" style="xhtml" />
				</div>				
			</div><!-- #home_widgets_internal2 -->
		</div><!-- #home_widgets_internal -->
	</div><!-- home_widgets -->
<?php if($this->countModules( 'countries' )) { ?>
	<div id="countries">
		<h3><?php echo JText::_('Country Offices'); ?></h3>
			<div id="open_close_countries">
				<div class="welcome_countries">
					<jdoc:include type="modules" name="countries" style="raw" />
				<div style="clear:both"></div>
				</div><!-- #welcome_countries -->
			</div><!-- #open_close_countries -->
	</div><!-- end of #countries -->
<?php } ?>
	<div class="clr"></div>
	</div><!-- #wrapper -->
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
	<script>
	jQuery(document).ready(function(){
		jQuery(".ocm").click(function(){
			jQuery("#open_close_menu").toggle(500);
		});
		inicio();
		jQuery(window).resize(function() {
			reinicio();
		});
	});
	</script>
<script type="text/javascript" > 
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44374338-1', 'paho.org');
  ga('send', 'pageview');

</script>
</body>
</html>
