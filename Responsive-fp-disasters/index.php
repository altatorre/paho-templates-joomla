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
 
<?php //include ('canonical_tag.php'); ?><?php

$option   = $app->input->getCmd('option', '');
$view   = $app->input->getCmd('view', '');
$sitename = $app->getCfg('sitename');
	/* compresion de css */
$compress_css = false;
if ($compress_css) {
	$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/css-compress.php');
} else {
	$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/bootstrap.css?v=1');
	$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/font-awesome.min.css');
	$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/font-awesome.css');
	$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/main.css?v=2');
	$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/custom.css?v=4');
	$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/paho.css?v=4');
	$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/impl.css?v=5');
}
$doc->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', 'text/javascript');
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
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none}
.demo {cursor:pointer}
</style>
	<!-- <meta name="theme-color" content="#0099d9" /> -->
	<jdoc:include type="head" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://www.paho.org/images/icons/ios-ipad-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://www.paho.org/images/icons/ios-iphone-114x114.png" />
	<link rel="apple-touch-icon-precomposed" href="https://www.paho.org/images/icons/ios-default-homescreen-57x57.png" />
	<meta http-equiv="refresh" content="28800">
	<link href='//fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo JUri::base() . 'templates/' . $this->template . '/js/jquery-1.11.2.min.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo JUri::base() . 'templates/' . $this->template . '/js/bootstrap.min.js'; ?>"></script>

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
$lm = $lm && ($option != 'com_topics');  
$rm = 0;
$rm = $rm + ($this->countModules( 'right' )); 
$rm = $rm + ($this->countModules( 'right1' )); 
$rm = $rm + ($this->countModules( 'right2' )); 
$rm = $rm + ($this->countModules( 'right3' )); 
$rm = $rm + ($this->countModules( 'right4' )); 
$rm = $rm && ($option != 'com_topics'); 

if (!$lm && !$rm) {
	$content = " id=\"content_full\"";
	$class = "col-xs-12";
	$access  = "#content_full";
}
if ($lm && !$rm) {
	$content = " id=\"content_right\"";
	$class="col-lg-10 col-md-10 col-sm-9";
	$access = "#content_right";
}
if (!$lm && $rm) {
	$content = " id=\"content_left\"";
	$class="col-lg-10 col-md-9 col-sm-9";
	$access = "#content_left";
}
if ($lm && $rm) {
	$content = " id=\"content_lr\"";
	$class="col-lg-8 col-md-7 col-sm-7";
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
            
            <div class="header-representation"><jdoc:include type="modules" name="slogan" /></div>
					  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<span class="topheader">
								<div class="topsearch">
									<jdoc:include type="modules" name="user4" />
								</div>
								<jdoc:include type="modules" name="share2" style="xhtml" />
								<span class="lang-inline toplanguage">
									<jdoc:include type="modules" name="language" />
								</span>
								
							</span>	
						  <jdoc:include type="modules" name="header" style="xhtml" />
					  
					</div>
					</div>
				  </nav>
				</div>
			  </header>
			</div><!-- end of row -->
      <gcse:searchresults></gcse:searchresults>
			<?php if($tpl->is_front_page()): ?>
	      			<div class="row">
				<!-- Frontpage content starts here -->
					<div class="col-md-12">
						<jdoc:include type="modules" name="home_slider"  style="xhtml" />
					</div>
					<div class="col-md-8">
						<jdoc:include type="modules" name="home_top1"  style="xhtml" />
					</div>
					<div class="col-md-4 menusfp">
						<jdoc:include type="modules" name="home_top2"  style="xhtml" />
					</div>
					<div class="row menusfp">
						<div class="col-md-6">
							<div class="col-sm-6">
								<jdoc:include type="modules" name="home_top3"  style="xhtml" />
							</div>
							<div class="col-sm-6">
								<jdoc:include type="modules" name="home_top4"  style="xhtml" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-sm-6">
								<jdoc:include type="modules" name="home_top5"  style="xhtml" />
							</div>
							<div class="col-sm-6">
								<jdoc:include type="modules" name="home_top6"  style="xhtml" />
							</div>
						</div>
					</div>
					<div class="col-sm-8 banda-gris">
						<jdoc:include type="modules" name="home_monitoring"  style="xhtml" />
					</div>
					<div class="col-sm-4" style="padding:0px">
						<?php if($this->countModules('home_events') > 1) { ?>
						<div class="tabs-holder">
						  <!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
							<li class="active"><a href="#tab1" role="tab" data-toggle="tab"><?php echo JText::_('TAB_UPCOMING'); ?></a></li>
							<li><a href="#tab2" role="tab" data-toggle="tab"><?php echo JText::_('TAB_EPIDEMIOLOGICAL'); ?></a></li>
						  </ul>
						  <!-- Tab panes -->
						  <div class="tab-content">
							<jdoc:include type="modules" name="home_events" style="events" />
						  </div>
						</div>
						<?php } else { ?>
							<jdoc:include type="modules" name="home_events" style="events" />
						<?php } ?>
					</div>
				<div class="clr"></div>
				<div class="container2 row col-md-12">
					<jdoc:include type="modules" name="home_iconos" style="events" />
				</div>
			
				</div>
				<div class="clr"></div>
				<div class="home_top"><jdoc:include type="modules" name="home_top"  style="xhtml" /></div><!-- .home_top -->
				<div class="clr"></div>
				<div class="col-md-12 separador"></div>
				<div class="col-md-12">
				<jdoc:include type="component" />
				
				</div>
				<jdoc:include type="modules" name="home_bottom" style="clear" />
				<!-- Frontpage content ends here -->
				<div class="container3 row" style="margin-top: 20px">
				  <div class="col-xs-12">
					<jdoc:include type="modules" name="home_twitter_row" style="xhtml" />
				  </div>
				</div>
				<!-- Frontpage ends here -->
			<?php else: ?>
				<!-- Internal page content starts here -->
				<div id="main">
					<div class="row">
					<?php if( $view == 'article' || $view == 'category' ): ?>
						<jdoc:include type="modules" name="breadcrumbs" style="xhtml" />

						<?php if($lm) { ?>
						<div class="col-lg-2 col-md-2 col-sm-3 left_column">

						<?php if($this->countModules( 'left1' )) { ?>
							<jdoc:include type="modules" name="left1" style="xhtml" />
						<?php } ?>

						<?php if($this->countModules( 'left2' )) { ?>
							<jdoc:include type="modules" name="left2" style="xhtml" />
						<?php } ?>

						<?php if($this->countModules( 'left3' )) { ?>
							<jdoc:include type="modules" name="left3" style="xhtml" />
						<?php } ?>

						<?php if($this->countModules( 'left4' )) { ?>
							<jdoc:include type="modules" name="left4" style="xhtml" />
						<?php } ?>

						<?php if($this->countModules( 'left5' )) { ?>
							<jdoc:include type="modules" name="left5" style="xhtml" />
						<?php } ?>
						</div>
<?php } ?>
						<div id="inner_content" class="<?php echo $class; ?>">
							<jdoc:include type="message" />
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

<?php if($this->countModules( 'innercenter' )) { $mmargin = "33%"; } else { $mmargin="47.5%"; } ?>
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

			<div id="postcols">
				<jdoc:include type="modules" name="postcols" style="xhtml" />
			</div><!-- end of #postcols -->
						</div>

<?php if(($rm) && ($option != 'com_topics')) { ?>
          <div class="col-lg-2 col-md-3 col-sm-3 sidebar">
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
<?php } ?>

					<?php elseif( $view == 'topics' || $view == 'single'): ?>
						<jdoc:include type="message" />
						<jdoc:include type="component" />
					<?php else: ?>
						<div id="content" class="col-md-8">
							<div class="text-block">
								<jdoc:include type="message" />
								<jdoc:include type="component" />
							</div>
						</div>
					<?php endif; ?>
					</div><!-- end of row -->
					<jdoc:include type="modules" name="inner_after_content" style="clear" />
					<?php if($this->countModules('inner_bottom_twocol')): ?>
					<div class="twocolumns1 row">
						<jdoc:include type="modules" name="inner_bottom_twocol" style="clear" />
					</div>
					<?php endif; ?>
				</div><!-- end of main -->
			<?php endif; ?>
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
		<jdoc:include type="modules" name="debug" />
	</div>




<script>/* alert(jQuery('.container').width()); */</script> 
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44374338-1', 'auto', 'clientTracker');
  ga('clientTracker.send', 'pageview');

</script>
<!--googleon: index-->
</body>
</html>
