<?php defined( '_JEXEC' ) or die( 'Restricted access' );
$isIE = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'MSIE');
if ((bool) strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 9')) { $isIE = null; }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" 
   xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >

<head>
	<jdoc:include type="head" />
	<?php
	if (!$isIE) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<?php } ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/template.css" type="text/css" />
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
    <div id="header">
		<div id="buttons_language"><jdoc:include type="modules" name="language" /></div><!-- end of buttons_language -->
		<jdoc:include type="modules" name="banner" />
    </div><!-- #header -->

	<div id="access">
		<div class="skip-link"><a href="#content" title="Skip to content">Skip to content</a></div>
	</div><!-- #access -->

	<div id="topmenu">
		<jdoc:include type="modules" name="left" />
	</div><!-- #topmenu -->

	<div id="search">
		<jdoc:include type="modules" name="user4" />
	</div><!-- end of #search -->
		
	<a name="content" id="content"></a>

		<!-- Navegation Guide Breadcrumbs -->
	    <div id="breadcrumbs">
    <?php if (JRequest::getCmd( 'view' ) != 'frontpage') {; ?>
		    <jdoc:include type="module" name="breadcrumbs" />
		</div><!-- end of breadcrumbs -->
	<?php } ?>
	<?php
		if ($rm && (JRequest::getCmd( 'view' ) == 'frontpage')) {
		?>
		<div id="slideshowfp"><jdoc:include type="modules" name="slideshow" style="xhtml" /></div><!-- end of slideshowfp -->
		<div id="fpwrapper">
		<div id="highlights" style="margin-top:14px">
			<?php if($this->countModules( 'left1' )) { ?>
			<div id="left1"><jdoc:include type="modules" name="left1" style="xhtml" /></div>
			<?php }
			if($this->countModules( 'left2' )) { ?>
			<div id="left2"><jdoc:include type="modules" name="left2" style="xhtml" /></div>
			<?php }
			if($this->countModules( 'left3' )) { ?>
			<div id="left3"><jdoc:include type="modules" name="left3" style="xhtml" /></div>
			<?php }
			if($this->countModules( 'left4' )) { ?>
			<div id="left4"><jdoc:include type="modules" name="left4" style="xhtml" /></div>
			<?php }
			if($this->countModules( 'left5' )) { ?>
			<div id="left5"><jdoc:include type="modules" name="left5" style="xhtml" /></div>
			<?php } ?>
		</div><!-- end of #highlights -->
        <div id="container_lg">
		<div id="premain"><jdoc:include type="modules" name="premain" style="xhtml" /></div><!-- premain -->
		<!-- Main Joomla Content -->
		<h3 class="fpnews"><?php echo JText::_( 'LATEST NEWS' ); ?></h3>
		<jdoc:include type="component" />
		<div id="postmain"><jdoc:include type="modules" name="postmain" style="xhtml" /></div><!-- postmain -->
		<div id="rss_left"><jdoc:include type="modules" name="innerleft" style="xhtml" /></div><!-- rss_left -->
		<div id="rss_right"><jdoc:include type="modules" name="innerright" style="xhtml" /></div><!-- rss_right -->
		</div><!-- end of containerlg -->

		<div id="sidebarfp">
			<jdoc:include type="modules" name="right" style="xhtml" />
			<?php echo "<!-- R1 -->\n"; ?>
			<jdoc:include type="modules" name="right1" style="xhtml" />
			<?php echo "<!-- R2 -->\n"; ?>
			<jdoc:include type="modules" name="right2" style="xhtml" />
			<?php echo "<!-- R3 -->\n"; ?>
			<jdoc:include type="modules" name="right3" style="xhtml" />
			<?php echo "<!-- R4 -->\n"; ?>
			<jdoc:include type="modules" name="right4" style="xhtml" />
		</div><!-- end of sidebar -->
		</div><!-- end of #fpwrapper -->
<?php } else { ?>
			<?php if($rm) { ?>
		<div id="sidebar">
			<jdoc:include type="modules" name="right" style="xhtml" />
			<?php echo "<!-- R1 -->\n"; ?>
			<jdoc:include type="modules" name="right1" style="xhtml" />
			<?php echo "<!-- R2 -->\n"; ?>
			<jdoc:include type="modules" name="right2" style="xhtml" />
			<?php echo "<!-- R3 -->\n"; ?>
			<jdoc:include type="modules" name="right3" style="xhtml" />
			<?php echo "<!-- R4 -->\n"; ?>
			<jdoc:include type="modules" name="right4" style="xhtml" />
		</div><!-- end of sidebar -->
		<?php } ?>

		<div id="slideshow"><jdoc:include type="modules" name="slideshow" style="xhtml" /></div><!-- end of slideshow -->
		<div id="highlights">
			<?php if($this->countModules( 'left1' )) { ?>
			<div id="left1"><jdoc:include type="modules" name="left1" style="xhtml" /></div>
			<?php }
			if($this->countModules( 'left2' )) { ?>
			<div id="left2"><jdoc:include type="modules" name="left2" style="xhtml" /></div>
			<?php }
			if($this->countModules( 'left3' )) { ?>
			<div id="left3"><jdoc:include type="modules" name="left3" style="xhtml" /></div>
			<?php }
			if($this->countModules( 'left4' )) { ?>
			<div id="left4"><jdoc:include type="modules" name="left4" style="xhtml" /></div>
			<?php }
			if($this->countModules( 'left5' )) { ?>
			<div id="left5"><jdoc:include type="modules" name="left5" style="xhtml" /></div>
			<?php } ?>
		</div><!-- end of #highlights -->
		<?php if (!$rm) { ?>
        <div id="container_int">
		<?php } else { ?>
        <div id="container_sm">
		<?php } ?>

		<div id="premain"><jdoc:include type="modules" name="premain" style="xhtml" /></div><!-- premain -->
		<!-- Main Joomla Content -->
		<jdoc:include type="component" />
		<div id="postmain"><jdoc:include type="modules" name="postmain" style="xhtml" /></div><!-- postmain -->
		<div id="rss_left"><jdoc:include type="modules" name="innerleft" style="xhtml" /></div><!-- rss_left -->
		<div id="rss_right"><jdoc:include type="modules" name="innerright" style="xhtml" /></div><!-- rss_right -->
        <div id="postcols"><jdoc:include type="modules" name="postcols" style="xhtml" /></div><!-- postcols -->
        <div style="clear:both"></div>
        </div><!-- end of #container_sm -->
	<div style="clear:both"></div>
<?php } ?>
	<div style="clear:both"></div>
</div><!-- #wrapper -->

<div id="footr_out">
	<div id="footr_md">
	<div id="footr_in">
		<div id="left_bottom"><jdoc:include type="modules" name="left_bottom" style="xhtml" /></div><!-- end of #left_bottom -->
		<div id="ftmenu1"><jdoc:include type="modules" name="ftmenu1" style="xhtml" /></div>
		<div id="ftmenu2"><jdoc:include type="modules" name="ftmenu2" style="xhtml" /></div>
		<div id="ftmenu3"><jdoc:include type="modules" name="ftmenu3" style="xhtml" /></div>

	    <div id="footer">
    	    <div id="colophon">
 
        	    <div id="site-info">
					<p>Copyright &copy; - <a href="http://www.paho.org/">Pan American Health Organization</a> - <a href="http://www.who.int/">World
					Health Organization</a></p>
            	</div><!-- #site-info -->
 
	        </div><!-- #colophon -->
    	</div><!-- #footer -->
	</div><!-- #footr_in -->
	</div><!-- #footr_md -->
	<div class="clr"></div>
</div><!-- #footr_out -->

</body>
</html>