<?php defined( '_JEXEC' ) or die( 'Restricted access' );
$isIE = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'MSIE');
if ((bool) strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 9')) { $isIE = null; }
if ((bool) strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 10')) { $isIE = null; } ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >

<head>
<?php
	if ($isIE) { ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?php } ?>
<jdoc:include type="head" />
<?php
	if (!$isIE) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<?php } ?>
<?php
	if ($isIE) { ?>
	<script src="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/js/css3-mediaqueries.js"></script>
<?php } ?>
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/style.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo JURI::base(); ?>media/shadowbox/shadowbox.css" />
	<script type="text/javascript" src="<?php echo JURI::base(); ?>media/shadowbox/shadowbox.js"></script>
	<script type="text/javascript">
	Shadowbox.init({
	overlayOpacity: 0.7,
	viewportPadding: 40
	});
	</script>
	<script type="text/javascript" src="<?php echo JURI::base(); ?>media/system/js/language.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
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
	<div id="wrapper">
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
			<div id="access">
				<a href="#content" title="Skip to content"></a>
			</div><!-- end of #access -->
		</div><!-- end of #header -->
		<div id="menus">
			<p class="ocm"><img src="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/images/mobile_menu_icon.png" style="width: 17px;float:left;margin-right:4px;border:0" alt="" />Menu</p>
			<div id="open_close_menu">
				<jdoc:include type="modules" name="left" />
			</div><!-- #open_close_menus -->
		</div><!-- end of #menus -->
		<div id="slideshow">
			<jdoc:include type="modules" name="slideshow" style="xhtml" />
		</div>
		
	<div id="fphighlight_out">
		<div id="fphighlight_mid">
<?php if($this->countModules( 'left1' )) { ?>
			<jdoc:include type="modules" name="left1" style="raw" />
<?php } ?>
		</div>
		<div id="fphighlight_inn">
			<h3><?php echo JText::_('Highlights'); ?></h3>
		</div>
	</div>

	<div id="main">
		<div id="content">
		<h3 class="latestnews"><?php echo JText::_( 'LATEST NEWS' ); ?></h3>
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
				<div id="home-widget-area-1" class="widget-container">
						<jdoc:include type="modules" name="innerleft_fp" style="xhtml" />
				</div>				
				<div id="home-widget-area-2" class="widget-container">
						<jdoc:include type="modules" name="innercenter_fp" style="xhtml" />
				</div>				
				<div id="home-widget-area-3" class="widget-container">
						<jdoc:include type="modules" name="innerright_fp" style="xhtml" />
				</div>				
			</div><!-- #home_widgets_internal2 -->
		</div><!-- #home_widgets_internal -->
	</div><!-- home_widgets -->

	<div id="countries">
		<h3><?php echo JText::_('Country Offices'); ?></h3>
			<div id="open_close_countries">
				<div class="welcome_countries">
					<jdoc:include type="modules" name="countries" style="raw" />
				<div style="clear:both"></div>
				</div><!-- #welcome_countries -->
			</div><!-- #open_close_countries -->
	</div><!-- end of #countries -->
	</div><!-- #wrapper -->
	<div id="footr_out">
		<div id="footr_in">
			<div id="honcode">
				<jdoc:include type="modules" name="footer_left" />
			</div><!-- end of #honcode -->
			<div class="ftmenu">
				<h3><?php echo JText::_('Help and Services'); ?></h3>
				<jdoc:include type="modules" name="ftmenu1" />
			</div><!-- end of .ftmenu -->
			<div class="ftmenu">
				<h3><?php echo JText::_('Resources'); ?></h3>
				<jdoc:include type="modules" name="ftmenu2" />
			</div><!-- end of .ftmenu -->
			<div class="ftmenu">
				<h3><?php echo JText::_('Connect With PAHO'); ?></h3>
				<jdoc:include type="modules" name="ftmenu3" />
			</div><!-- end of .ftmenu -->
			<div class="clr"></div>
			<div id="footer">
				<div id="colophon">
				</div><!-- end of #colophon -->
				<div id="site-info">
					<jdoc:include type="modules" name="site_info" style="raw" />
				</div><!-- end of #site-info -->
			</div><!-- end of #footer -->
		</div><!-- end of #footr_in -->
		<div class="clr"></div>
	</div><!-- end of #footr_out -->
	<script>
	$(document).ready(function(){
		$(".ocm").click(function(){
			$("#open_close_menu").toggle(500);
		});
	});
	</script>
</body>
</html>
