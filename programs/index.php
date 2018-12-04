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
						<a class="navbar-brand" href="<?php echo $this->baseurl; ?>"><img src="<?php echo JUri::base() . '/templates/' . $this->template; ?>/images/logo.png" alt="<?php echo $sitename; ?>"></a>
						<jdoc:include type="modules" name="language_switcher_mobile" />
					  </div>
					  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <jdoc:include type="modules" name="header" />
					  </div>
					</div>
				  </nav>
				</div>
			  </header>
			</div>
			<?php if($tpl->is_front_page()): ?>
				<jdoc:include type="modules" name="home_top" />
				<?php if($this->countModules('home_more_news') || $this->countModules('home_events')): ?>
				<div class="container1 row">
					<?php if($this->countModules('home_more_news')): ?>
					<div class="col-xs-12">
					  <h2><?php echo JText::_('MORE_NEWS'); ?></h2>
					</div>
					<?php endif; ?>
					<div class="clearfix"></div>
					<div class="col-xs-12">
						<jdoc:include type="modules" name="home_more_news" />
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
				<?php endif; ?>
				<jdoc:include type="modules" name="home_bottom" style="clear" />
				<div class="container3 row">
				  <div class="col-xs-12">
					<jdoc:include type="modules" name="home_twitter_row" style="xhtml" />
				  </div>
				</div>
			<?php else: ?>
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
								</div>
							</div>
						<?php endif; ?>
					</div>
					<jdoc:include type="modules" name="inner_after_content" style="clear" />
					<?php if($this->countModules('inner_bottom_twocol')): ?>
					<div class="twocolumns1 row">
						<jdoc:include type="modules" name="inner_bottom_twocol" style="clear" />
					</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<footer id="footer">
			  <div class="footer-holder row">
				<div class="col-xs-12">
				  <div class="brand">
					<a href="<?php echo $this->baseurl; ?>"><img src="<?php echo JUri::base() . '/templates/' . $this->template; ?>/images/logo1.png" alt="<?php echo $sitename; ?>" width="200" height="36"></a>
				  </div>
				  <?php if($this->countModules('footer_menu')): ?>
				  <nav class="add-nav">
					<jdoc:include type="modules" name="footer_menu" />
				  </nav>
				  <?php endif; ?>
				</div>
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
</body>
</html>