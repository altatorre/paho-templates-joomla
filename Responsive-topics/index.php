<?php defined( '_JEXEC' ) or die( 'Restricted access' );
$isIE = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'MSIE');

include_once (dirname(__FILE__).'/functions.php');
global $tpl;
$tpl = new Joomla_Template($this);

$app = JFactory::getApplication();
$doc = JFactory::getDocument();

$this->language = $doc->language;
$this->direction = $doc->direction;

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?php //include ('canonical_tag.php'); ?><?php

$option   = $app->input->getCmd('option', '');
$view   = $app->input->getCmd('view', '');
$sitename = $app->getCfg('sitename');

$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/bootstrap.css?v=3');
//$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/font-awesome.min.css');
//$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/font-awesome.css');
$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/main.css?v=3');
$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/paho.css?v=6');
$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/impl.css?v=3');
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
	<jdoc:include type="head" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://www.paho.org/images/icons/ios-ipad-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://www.paho.org/images/icons/ios-iphone-114x114.png" />
	<link rel="apple-touch-icon-precomposed" href="http://www.paho.org/images/icons/ios-default-homescreen-57x57.png" />
	<meta http-equiv="refresh" content="28800">
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>
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
							<span class="topheader">
								<jdoc:include type="modules" name="share2" style="xhtml" />
								<span class="lang-inline toplanguage">
									<jdoc:include type="modules" name="language" />
								</span>
								<span class="topsearch">
									<jdoc:include type="modules" name="user4" />
								</span>
							</span>	
						  <jdoc:include type="modules" name="header" style="xhtml" />
					  
					</div>
				  </nav>
				</div>
			  </header>
			</div>
<gcse:searchresults></gcse:searchresults>
			<?php if($tpl->is_front_page()): ?>
				<!-- Frontpage content starts here -->
				<jdoc:include type="modules" name="home_top" />
				<jdoc:include type="component" />
						<?php if($this->countModules('home_events')): ?>
						<div class="tabs-holder">
						  <!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
							<li class="active"><a href="#tab1" role="tab" data-toggle="tab"><?php echo JText::_('TAB_EPIDEMIOLOGICAL'); ?></a></li>
							<li><a href="#tab2" role="tab" data-toggle="tab"><?php echo JText::_('TAB_UPCOMING'); ?></a></li>
						  </ul>
						  <!-- Tab panes -->
						  <div class="tab-content">
							<jdoc:include type="modules" name="home_events" style="events" />
						  </div>
						</div>
						<?php endif; ?>
					</div>
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
						<div id="inner_content" class="col-lg-8 col-md-7 col-sm-6">
							<jdoc:include type="message" />
<?php if($this->countModules( 'premain' )) { ?>
			<div id="premain">
				<jdoc:include type="modules" name="premain" style="raw" />
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

<?php if($rm) { ?>
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
				  <div class="brand">
				  <?php if($this->countModules('brand')): ?>
						<jdoc:include type="modules" name="brand" />
				  <?php endif; ?>
				  </div><!-- end of brand -->
				  <?php if($this->countModules('footer_menu')): ?>
				  <nav class="add-nav">
						<jdoc:include type="modules" name="footer_menu" />
						<div style="clear:both"></div>
				  </nav>
				  <?php endif; ?>
				</div><!-- end of col-xs-12 -->
			  </div>
			  <div class="holder row hidden-xs">
				<div class="col-xs-12">
					<jdoc:include type="modules" name="footer" />
				</div>
			  </div>
			</footer>
		</div>
		<jdoc:include type="modules" name="debug" />
	</div>
<script src="<?php echo JUri::base() . 'templates/' . $this->template . '/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo JUri::base() . 'templates/' . $this->template . '/js/jquery.main.js'; ?>"></script>
<script>/* alert(jQuery('.container').width()); */</script><?php 
?><script><?php
  ?>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){<?php
  ?>(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),<?php
  ?>m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)<?php
  ?>})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');<?php

  ?>ga('create', 'UA-44374338-1', 'auto', 'clientTracker');<?php
  ?>ga('clientTracker.send', 'pageview');<?php

?></script><?php
?><!--googleon: index--><?php
?></body><?php
?></html>