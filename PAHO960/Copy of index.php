<?php defined( '_JEXEC' ) or die( 'Restricted access' );
$isIE = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'MSIE');
if ((bool) strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 9')) { $isIE = null; }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" 
   xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >

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
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/normalize.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/960_16_col.css" type="text/css" />
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
	$lm = 0;
	$lm = $lm + ($this->countModules( 'left1' )); 
	$lm = $lm + ($this->countModules( 'left2' )); 
	$lm = $lm + ($this->countModules( 'left3' )); 
	$lm = $lm + ($this->countModules( 'left4' )); 
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

<div id="wrapper" class="container_16">

	<div id="languagebt" class="grid_16">
		<jdoc:include type="modules" name="language" />
	</div><!-- end #languagebt -->

    <div id="header" class="grid_16">
		<jdoc:include type="modules" name="banner" />
    </div><!-- #header -->

	<div id="access" class="grid_16">
		<div class="skip-link"><a href="#content" title="Skip to content">Skip to content</a></div>
	</div><!-- #access -->

	<div id="topmenu" class="grid_16">
		<jdoc:include type="modules" name="left" />
	</div><!-- #topmenu -->

	<div id="search" class="grid_16">
		<jdoc:include type="modules" name="user4" />
	</div><!-- end of #search -->

    	<?php if (JRequest::getCmd( 'view' ) == 'frontpage') { ?>
		<div id="content" style="background: none">
			<div id="slideshowfp" class="grid_16" style="overflow:hidden">
				<jdoc:include type="modules" name="slideshow" style="xhtml" />
			</div><!-- end of slideshowfp -->

			<div id="fphighlight" class="grid_16">
		<?php if($this->countModules( 'left1' )) { ?>
				<jdoc:include type="modules" name="left1" style="xhtml" />
		<?php } ?>
			</div>

        <div id="container_lgfp" class="grid_12">
		<div id="premain" class="grid_12"><jdoc:include type="modules" name="premain" style="xhtml" /></div><!-- premain -->
		<!-- Main Joomla Content -->
		<h3 class="fpnews"><?php echo JText::_( 'LATEST NEWS' ); ?></h3>
		<jdoc:include type="component" />
		<div id="postmain" class="grid_12"><jdoc:include type="modules" name="postmain" style="xhtml" /></div><!-- postmain -->
		<div id="rss_left_fp" class="grid_4 alpha"><jdoc:include type="modules" name="innerleft" style="xhtml" /></div><!-- rss_left -->
		<div id="rss_center_fp" class="grid_4"><jdoc:include type="modules" name="innercenter" style="xhtml" /></div><!-- rss_center -->
		<div id="rss_right_fp" class="grid_4 omega"><jdoc:include type="modules" name="innerright" style="xhtml" /></div><!-- rss_right -->
		</div><!-- end of containerlg -->

		<div id="sidebarfp" class="grid_4">
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
<?php } // end of frontpage
// Internal pages. 3 options: 16 columns, 3 and 13 columns, and 3, 13 and 4
if (JRequest::getCmd( 'view' ) != 'frontpage') { ?>

	<div id="content" <?php if (!$rm) echo "style=\"background: none\""; ?>>
		<!-- Navegation Guide Breadcrumbs -->
		<div id="breadcrumbs" class="grid_12 suffix_4">
		    <jdoc:include type="module" name="breadcrumbs" />
		</div><!-- end of breadcrumbs -->

		<?php if(!$lm && $rm) { // no left modules but at least one right module ?>

		<div id="inner_content" class="grid_12">
			<?php if ($this->countModules( 'slideshow' )) { ?>
			<div id="slideshow"><jdoc:include type="modules" name="slideshow" style="xhtml" /></div><!-- end of slideshow -->
			<?php } ?>
			<div id="int_narrow" class="grid_12 alpha">
			<div id="premain"><jdoc:include type="modules" name="premain" style="xhtml" /></div><!-- premain -->
			<div style="clear:both"></div>
			<!-- Main Joomla Content -->
			<jdoc:include type="component" />
			<div id="postmain"><jdoc:include type="modules" name="postmain" style="xhtml" /></div><!-- postmain -->
			<div id="rss_left"><jdoc:include type="modules" name="innerleft" style="xhtml" /></div><!-- rss_left -->
			<div id="rss_right"><jdoc:include type="modules" name="innerright" style="xhtml" /></div><!-- rss_right -->
        	<div id="postcols"><jdoc:include type="modules" name="postcols" style="xhtml" /></div><!-- postcols -->
	        <div style="clear:both"></div>
			</div><!-- end of #int_narrow -->
		</div><!-- end of #inner_content -->
			<?php } ?>

		<?php if($lm && $rm) { // left modules and right modules ?>

		<div id="inner_content" class="grid_12">
			<div id="slideshow"><jdoc:include type="modules" name="slideshow" style="xhtml" /></div><!-- end of slideshow -->

			<div id="highlights" class="grid_3 alpha">
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

			<div id="int_narrow" class="grid_9 omega">
			<div id="premain"><jdoc:include type="modules" name="premain" style="xhtml" /></div><!-- premain -->
			<div style="clear:both"></div>
			<!-- Main Joomla Content -->
			<jdoc:include type="component" />
			<div id="postmain"><jdoc:include type="modules" name="postmain" style="xhtml" /></div><!-- postmain -->
			<div id="rss_left"><jdoc:include type="modules" name="innerleft" style="xhtml" /></div><!-- rss_left -->
			<div id="rss_right"><jdoc:include type="modules" name="innerright" style="xhtml" /></div><!-- rss_right -->
        	<div id="postcols"><jdoc:include type="modules" name="postcols" style="xhtml" /></div><!-- postcols -->
	        <div style="clear:both"></div>
			</div><!-- end of #int_narrow -->
		</div><!-- end of #inner_content -->
			<?php } ?>

		<div id="sidebar" class="grid_4 omega">
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
	
	<?php } // End of page with left and right modules ?>

		<?php if($lm && !$rm) { // left modules only ?>

		<div id="inner_content" class="grid_16">
			<div id="slideshow"><jdoc:include type="modules" name="slideshow" style="xhtml" /></div><!-- end of slideshow -->

			<div id="highlights" class="grid_3 alpha">
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

			<div id="int_narrow" class="grid_13 omega">
			<div id="premain"><jdoc:include type="modules" name="premain" style="xhtml" /></div><!-- premain -->
			<div style="clear:both"></div>
			<!-- Main Joomla Content -->
			<jdoc:include type="component" />
			<div id="postmain"><jdoc:include type="modules" name="postmain" style="xhtml" /></div><!-- postmain -->
			<div id="rss_left"><jdoc:include type="modules" name="innerleft" style="xhtml" /></div><!-- rss_left -->
			<div id="rss_right"><jdoc:include type="modules" name="innerright" style="xhtml" /></div><!-- rss_right -->
        	<div id="postcols"><jdoc:include type="modules" name="postcols" style="xhtml" /></div><!-- postcols -->
	        <div style="clear:both"></div>
			</div><!-- end of #int_narrow -->
		</div><!-- end of #inner_content -->
	
		<?php } // End of page with left modules ?>

		<?php if(!$lm && !$rm) { // no left modules or right modules ?>
			<div id="inner_content" class="grid_16 omega">
			<div id="premain"><jdoc:include type="modules" name="premain" style="xhtml" /></div><!-- premain -->
			<div style="clear:both"></div>
			<!-- Main Joomla Content -->
			<jdoc:include type="component" />
			<div id="postmain"><jdoc:include type="modules" name="postmain" style="xhtml" /></div><!-- postmain -->
			<div id="rss_left"><jdoc:include type="modules" name="innerleft" style="xhtml" /></div><!-- rss_left -->
			<div id="rss_right"><jdoc:include type="modules" name="innerright" style="xhtml" /></div><!-- rss_right -->
        	<div id="postcols"><jdoc:include type="modules" name="postcols" style="xhtml" /></div><!-- postcols -->
	        <div style="clear:both"></div>
			</div><!-- end of #int_narrow -->
		</div><!-- end of #inner_content -->

		<?php } // End of page with no modules ?>

	<div style="clear:both">&nbsp;</div>
	</div><!-- end of #content -->
</div><!-- #wrapper -->

<?php if (JRequest::getCmd( 'view' ) == 'frontpage') { ?>
<div id="countries" class="container_16">
	<div id="open_close_countries"><jdoc:include type="modules" name="countries" style="xhtml" /></div>
	<div style="clear:both"></div>
</div><!-- end of #countries -->
<?php } ?>

<div id="footr_out">
	<div id="footr_in" class="container_16">
		<div id="left_bottom" class="grid_3 suffix_1">
			<jdoc:include type="modules" name="left_bottom" style="xhtml" />
		</div><!-- end of #left_bottom -->
		<div id="ftmenu1" class="grid_4"><jdoc:include type="modules" name="ftmenu1" style="xhtml" /></div>
		<div id="ftmenu2" class="grid_4"><jdoc:include type="modules" name="ftmenu2" style="xhtml" /></div>
		<div id="ftmenu3" class="grid_4"><jdoc:include type="modules" name="ftmenu3" style="xhtml" /></div>

	    <div id="footer">
    	    <div id="colophon">
 
        	    <div id="site-info">
					<p>Copyright &copy; - <a href="http://www.paho.org/">Pan American Health Organization</a> - <a href="http://www.who.int/">World
					Health Organization</a></p>
            	</div><!-- #site-info -->
 
	        </div><!-- #colophon -->
    	</div><!-- #footer -->
	</div><!-- #footr_in -->
	<div class="clr"></div>
</div><!-- #footr_out -->
<div id="invisible" style="display:none"><jdoc:include type="modules" name="invisible" style="raw" /></div>

</body>
</html>