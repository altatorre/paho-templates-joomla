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
<?php include ('canonical_tag.php'); ?>
<jdoc:include type="head" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/style.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="<?php echo JURI::base(); ?>media/system/js/language.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
	<script type="text/javascript" src="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/js/html5lightbox/html5lightbox.js"></script>
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
 $menu = & JSite::getMenu();
if ($menu->getActive() == $menu->getDefault()) {
	$conf =& JFactory::getConfig();
	$sitename = $conf->getValue('config.sitename');
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
				<jdoc:include type="modules" name="banner_dc" style="raw" />
			</div><!-- end of #banner -->
		</div><!-- end of #header -->

		<div id="menus">
				<jdoc:include type="modules" name="menu_dc" />
		</div><!-- end of #menus -->


	
	<?php //if( is_front_page() && $newpaho_slideshow == "true" && $newpaho_slideshowfull == "true" ) {
//	echo '<div id="fullss">';
//		$nul = FP_Slideshow();
//	echo '</div>';
//	} ?>

    <div id="main">


			<jdoc:include type="component" />



	</div><!-- end of #main -->

	<div id="right_dc">

		<div id="share">
			<jdoc:include type="modules" name="share" style="raw" />
		</div><!-- end of #share -->

		<div id="right_moldura">

			<div id="search">
				<jdoc:include type="modules" name="user4" />
			</div><!-- end of #search -->

		</div><!-- end of #right_moldura -->

	</div><!-- end of #right_dc -->
	
	
	<div class="clr"></div>
	</div><!-- #wrapper -->

		<div id="footer">
			<div id="honcode" class="ftmenu">
				<jdoc:include type="modules" name="footer_left" style="raw" />
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
			<div class="clr"></div>
		</div><!-- end of #footer -->

		<div id="site-info">
			<jdoc:include type="modules" name="site_info" style="raw" />
		</div><!-- end of #site-info -->













<script type="text/javascript" > 
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

/*  ga('create', 'UA-44374338-1', 'paho.org'); */
/*  ga('send', 'pageview'); */

</script>
</body>
</html>
