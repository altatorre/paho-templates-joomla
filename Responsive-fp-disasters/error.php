<?php defined( '_JEXEC' ) or die( 'Restricted access' );
include_once (dirname(__FILE__).'/functions.php');
global $tpl;
$tpl = new Joomla_Template($this);
$app = JFactory::getApplication();
$sitename = $app->getCfg('sitename');
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $this->title; ?> <?php echo $this->error->getMessage();?></title>
	<link rel="stylesheet" href="<?php echo $tpl->template_url() ?>/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $tpl->template_url() ?>/css/main.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $tpl->template_url() ?>/css/impl.css" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="wrapper">
		<?php echo JHTML::_('content.prepare', '{loadposition sidebar_social}'); ?>
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
						<a class="navbar-brand" href="<?php echo JUri::root(); ?>"><img src="<?php echo JUri::base() . '/templates/' . $this->template; ?>/images/logo.png" alt="<?php echo $sitename; ?>"></a>
						<?php echo JHTML::_('content.prepare', '{loadposition language_switcher_mobile}'); ?>
					  </div>
					  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <?php //echo JHTML::_('content.prepare', '{loadposition header, clear}'); ?>
					  </div>
					</div>
				  </nav>
				</div>
			  </header>
			</div>
			<div id="main">
				<div class="row">
					<div id="content" class="col-md-8">
						<div class="text-block">
							<div class="error">
								<div id="outline">
									<div id="errorboxoutline">
										<div id="errorboxheader"><?php echo $this->error->getCode(); ?> - <?php echo $this->error->getMessage(); ?></div>
												<div id="errorboxbody">
													<h2>
														<?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?>
													</h2>
													<h3><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></h3>
													<p><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>
													<ul>
														<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
														<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
														<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
														<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
													</ul>
													<?php if (JModuleHelper::getModule('search')) : ?>
														<div id="searchbox">
															<h3 class="unseen">
																<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>
															</h3>
															<p>
																<?php echo JText::_('JERROR_LAYOUT_SEARCH'); ?>
															</p>
															<?php $module = JModuleHelper::getModule('search'); ?>
															<?php echo JModuleHelper::renderModule($module); ?>
														</div><!-- end searchbox -->
													<?php endif; ?>
													<div><!-- start gotohomepage -->
														<p>
														<a href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>
														</p>
													</div><!-- end gotohomepage -->
													<h3>
														<?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?>
													</h3>
													<h2>#<?php echo $this->error->getCode(); ?>&nbsp;<?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?>
													</h2>
													<br />
												</div><!-- end errorboxbody -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer id="footer">
			  <div class="footer-holder row">
				<div class="col-xs-12">
				  <div class="brand">
					<a href="<?php echo JUri::root(); ?>"><img src="<?php echo JUri::base() . '/templates/' . $this->template; ?>/images/logo1.png" alt="<?php echo $sitename; ?>" width="200" height="36"></a>
				  </div>
				  <nav class="add-nav">
					<?php echo JHTML::_('content.prepare', '{loadposition footer_menu}'); ?>
				  </nav>
				</div>
			  </div>
			  <div class="holder row hidden-xs">
				<div class="col-xs-12">
					<?php echo JHTML::_('content.prepare', '{loadposition footer}'); ?>
				</div>
			  </div>
			</footer>
		</div>
	</div>
	<script src="<?php echo $tpl->template_url() ?>/js/jquery-1.11.2.min.js"></script>
	<script src="<?php echo $tpl->template_url() ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo $tpl->template_url() ?>/js/jquery.main.js"></script>
</body>
</html>