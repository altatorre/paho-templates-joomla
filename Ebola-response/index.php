<?php defined( '_JEXEC' ) or die( 'Restricted access' );
$isIE = FALSE;
if (isset($_SERVER['HTTP_USER_AGENT'])) {
	$isIE = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'MSIE');
}	

include_once (dirname(__FILE__).'/functions.php');
global $tpl;
$tpl = new Joomla_Template($this);

$app = JFactory::getApplication();
$doc = JFactory::getDocument();

$this->language = $doc->language;
$this->direction = $doc->direction;

$this->setGenerator(null);

?><!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
 
<?php //include ('canonical_tag.php'); ?>
<?php

$option   = $app->input->getCmd('option', '');
$view   = $app->input->getCmd('view', '');
$sitename = JFactory::getApplication()->get('sitename');
//$sitename = JFactory::getApplication()->get('sitename');
//$sitename = "PAHO/WHO"; // $app->getCfg('sitename');

$JUribase = JURI::base();
$JUribase = str_replace('http://www.paho.org','https://www.paho.org',$JUribase);
	/* compresion de css */
$compress_css = false;
if ($compress_css) {
	$doc->addStyleSheet($JUribase . 'templates/' . $this->template . '/css/css-compress.php');
} else {
	$doc->addStyleSheet($JUribase . 'templates/' . $this->template . '/css/bootstrap.css');
	$doc->addStyleSheet($JUribase . 'templates/' . $this->template . '/css/font-awesome.min.css');
	$doc->addStyleSheet($JUribase . 'templates/' . $this->template . '/css/font-awesome.css');
	$doc->addStyleSheet($JUribase . 'templates/' . $this->template . '/css/main.css');
	$doc->addStyleSheet($JUribase . 'templates/' . $this->template . '/css/custom.css');
	$doc->addStyleSheet($JUribase . 'templates/' . $this->template . '/css/paho.css');
	$doc->addStyleSheet($JUribase . 'templates/' . $this->template . '/css/impl.css');
}
$doc->addScript('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', 'text/javascript');
?>
	<script type="text/javascript">
		var pathInfo = {
			base: '<?php echo (JFactory::getDocument()->getBase() . 'templates/' . $this->template); ?>/',
			css: 'css/',
			js: 'js/',
			swf: 'swf/',
		}
	</script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <meta name="theme-color" content="#0099d9" /> -->
	<jdoc:include type="head" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://www.paho.org/images/icons/ios-ipad-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://www.paho.org/images/icons/ios-iphone-114x114.png" />
	<link rel="apple-touch-icon-precomposed" href="https://www.paho.org/images/icons/ios-default-homescreen-57x57.png" />
	<meta http-equiv="refresh" content="28800">

	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/style.css" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript">
		jQuery(window).on('load', function () {
		jQuery('iframe[id^=twitter-widget-]').each(function () {
		var head = jQuery(this).contents().find('head');
		if (head.length) {
		head.append('<style type="text/css">.timeline { max-width: 100% !important; width: 100% !important; } .timeline .stream { max-width: none !important; width: 100% !important; }</style>');
		}
		jQuery('.twitter-timeline').append(jQuery(''));
		})
		});
	</script>

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
	$class = "col-xs-12";
	$access  = "#content_full";
}
if ($lm && !$rm) {
	$content = " id=\"content_right\"";
	$class="col-lg-10 col-md-10 col-sm-9 col-xs-12";
	$access = "#content_right";
}
if (!$lm && $rm) {
	$content = " id=\"content_left\"";
	$class="col-lg-10 col-md-9 col-sm-9 col-xs-12";
	$access = "#content_left";
}
if ($lm && $rm) {
	$content = " id=\"content_lr\"";
	$class="col-lg-8 col-md-7 col-sm-6 col-xs-12";
	$access = "#content_lr";
}

?>
</head>
<body itemscope itemtype="https://schema.org/WebPage">
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
	<div id="wrapper">
		<jdoc:include type="modules" name="sidebar_social" />
		<div class="container">
			<div class="row">
			  <header id="header">
				<div class="col-xs-12">
				  <nav class="navbar navbar-default">
					<div class="container-fluid">
					  <div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						  <span class="sr-only">Toggle navigation</span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						</button>
								<div class="top_banner">
									<jdoc:include type="modules" name="banners" style="raw" />
								</div>
								<jdoc:include type="modules" name="language_switcher_mobile" />
					  </div>
					  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<div class="topheader">
									<div class="topsearch">
						<jdoc:include type="modules" name="user4" />
									</div>
									<span class="lang-inline toplanguage">
										<jdoc:include type="modules" name="language" />
									</span>
						<jdoc:include type="modules" name="share2" style="xhtml" />
								</div>	
						<jdoc:include type="modules" name="header" style="xhtml" />
					  </div>
					</div>
				  </nav><!-- nav class="navbar navbar-default" -->
				</div><!--  class="col-xs-12" -->
			</header>
			</div>
<gcse:searchresults></gcse:searchresults>

	<div id="main">
		<div id="content-2"<?php if (!$this->countModules( 'eb-right' )) { echo ' style="width: 100%"'; } ?>><!-- content -->
<?php if ($this->countModules( 'premain' )) { ?>
			<div id="premain">
				<jdoc:include type="modules" name="premain" style="xhtml" />
			</div><!-- end of #premain -->
<?php } ?><!--googleon: index-->
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
			<div id="eb-share"><jdoc:include type="modules" name="share" style="xhtml" /></div>
			<div class="clr"></div>
			<jdoc:include type="modules" name="eb-menu" style="xhtml" />
			<jdoc:include type="modules" name="eb-right" style="xhtml" />
		</div><!-- end of #ct_right -->
<?php } ?>
	</div><!-- #main -->
	<div style="clear:both"></div>
			<footer id="footer">
			  <div class="footer-holder row">
				<div class="col-xs-12">
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
				</div><!-- end of col-xs-12 -->
			  </div>
			  <div class="holder row hidden-xs">
				<div class="col-xs-12">
			<jdoc:include type="modules" name="site_info" style="raw" />
				</div><!-- end of col-xs-12 -->
			  </div><!-- end of holder row hidden-xs -->
			</footer><!-- end of footer-holder row -->
		</div>
		</div><!-- #wrapper -->

		<jdoc:include type="modules" name="debug" />
	</div>
<script src="<?php echo $JUribase . 'templates/' . $this->template . '/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo $JUribase . 'templates/' . $this->template . '/js/jquery.main.js'; ?>"></script>

<script>/* alert(jQuery('.container').width()); */</script> 
	<script>
	jQuery(document).ready(function(){
	   if (jQuery('#big_slide').length){
			inicio();   	     
    	}
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