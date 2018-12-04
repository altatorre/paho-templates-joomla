<?php defined( '_JEXEC' ) or die( 'Restricted access' );

include_once (dirname(__FILE__).'/functions.php');
global $tpl;
$tpl = new Joomla_Template($this);

$app = JFactory::getApplication();
$doc = JFactory::getDocument();

$this->language = $doc->language;
$this->direction = $doc->direction;

$option   = $app->input->getCmd('option', '');
$view   = $app->input->getCmd('view', '');
$sitename = $app->getCfg('sitename');

$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/bootstrap.css');
$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/main.css');
$doc->addStyleSheet(JUri::base() . 'templates/' . $this->template . '/css/impl.css');

$doc->addScript(JUri::base() . '/templates/' . $this->template . '/js/bootstrap.min.js', 'text/javascript');
$doc->addScript(JUri::base() . '/templates/' . $this->template . '/js/jquery.main.js', 'text/javascript');
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<script type="text/javascript">
		var pathInfo = {
			base: '<?php echo (JFactory::getDocument()->getBase() . 'templates/' . $this->template); ?>/',
			css: 'css/',
			js: 'js/',
			swf: 'swf/',
		}
	</script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<jdoc:include type="head" />
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
		jQuery(window).on('load', function () {
		jQuery('.twitter-timeline').each(function () {
		var head = jQuery(this).contents().find('head');
		if (head.length) {
		head.append('<style type="text/css">.timeline { max-width: 100% !important; width: 100% !important; } .timeline .stream { max-width: none !important; width: 100% !important; }</style>');
		}
		jQuery('.twitter-timeline').append(jQuery(''));
		})
		});
	</script>
</head>
<body>
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
						  <jdoc:include type="modules" name="header" style="xhtml" />
					  </div>
					</div>
				  </nav>
				</div>
			  </header>
			</div><!-- end of class row -->
				<div id="main">
					<div class="row">
						<?php if($view == 'article'): ?>
							<jdoc:include type="message" />
							<jdoc:include type="component" />
						<?php else: ?>
							<div id="content" class="col-md-8">
								<div class="text-block">
									<jdoc:include type="message" />
									<jdoc:include type="component" />
								</div><!-- end of text-block -->
							</div><!-- end of content -->
						<?php endif; ?>

					</div><!-- end of class row -->
					<jdoc:include type="modules" name="inner_after_content1" style="xhtml" />
					<jdoc:include type="modules" name="inner_after_content2" style="xhtml" />
					<?php if($this->countModules('inner_ac_left') || $this->countModules('inner_ac_center') || $this->countModules('inner_ac_right')): ?>
					<div class="row threecolumns">
						<?php if($this->countModules('inner_ac_left')): ?>
						<div class="col-sm-4">
						  <jdoc:include type="modules" name="inner_ac_left" style="xhtml" />
						</div><!-- end of class col-sm-4 -->
						<?php endif; ?>
						<?php if($this->countModules('inner_ac_center')): ?>
						<div class="col-sm-4">
						  <jdoc:include type="modules" name="inner_ac_center" style="xhtml" />
						</div><!-- end of class col-sm-4 -->
						<?php endif; ?>
						<?php if($this->countModules('inner_ac_right')): ?>
						<div class="col-sm-4">
						  <jdoc:include type="modules" name="inner_ac_right" style="xhtml" />
						</div><!-- end of class col-sm-4 -->
						<?php endif; ?>
					</div><!-- end of class row threecolumns -->
					<?php endif; ?>
					<jdoc:include type="modules" name="postcols" style="clear" />
					<?php if($this->countModules('inner_bottom_twocol')): ?>
					<div class="twocolumns1 row">
						<jdoc:include type="modules" name="inner_bottom_twocol" style="xhtml" />
					</div><!-- end of class twocolumns1 row -->
					<?php endif; ?>
					<?php if($this->countModules('videos_area')): ?>
					<div class="videos-area row">
						<jdoc:include type="modules" name="videos_area" style="xhtml" />
					</div><!-- end of class twocolumns1 row -->
					<?php endif; ?>
				</div><!-- end of class main -->
			<footer id="footer">
			  <div class="footer-holder row">
				<div class="col-xs-12">
				  <div class="brand">
					<a href="<?php echo $this->baseurl; ?>"><img src="<?php echo JUri::base() . '/templates/' . $this->template; ?>/images/logo1.png" alt="<?php echo $sitename; ?>" width="200" height="36"></a>
				  </div><!-- end of class brand -->
				  <?php if($this->countModules('footer_menu')): ?>
				  <nav class="add-nav">
					<jdoc:include type="modules" name="footer_menu" />
				  </nav>
				  <?php endif; ?>
				</div><!-- end of class col-xs-12 -->
			  </div><!-- end of class footer-holder row -->
			  <div class="holder row hidden-xs">
				<div class="col-xs-12">
					<jdoc:include type="modules" name="footer" />
				</div><!-- end of class col-xs-12 -->
			  </div><!-- end of class holder row hidden-xs -->
			</footer>
		</div><!-- end of class container -->
		<jdoc:include type="modules" name="debug" />
	</div><!-- end of wrapper -->
		<div id="site-info">
			<jdoc:include type="modules" name="site_info" style="raw" />
		</div><!-- end of #site-info -->
</body>
</html>
