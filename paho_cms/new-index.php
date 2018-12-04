<?php
defined( '_VALID_MOS' ) or die( 'Restricted access' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?php mosShowHead(); ?>
<?php
if ( $my->id ) {
	initEditor();
} ?>
	<link rel="stylesheet" href="<?php echo $mosConfig_live_site; ?>/templates/paho_cms/css/template.css" type="text/css" />
	<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/media/system/js/language.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script>jQuery.noConflict();</script>
	<?php //if (JRequest::getCmd( 'view' ) == 'frontpage') {
		//echo '<script src="' . $mosConfig_live_site . '/templates/'. $this->template . '/js/slideshow.js"></script>' . "\n";
	//} ?>
	<script>
	jQuery(document).ready(function(){
	c = jQuery("#main").height();
	r = jQuery("#right").height();
	/* alert(c); */
	if (r < c) { jQuery("#sidebar").height(c-20); }
	});
	</script>
<meta http-equiv="Last-Modified" content="<?php echo date('D, d M Y H:i:s O', getlastmod()); ?>" />
<meta http-equiv="Expires" content="<?php echo date('D, d M Y H:i:s O', mktime(0, 0, 0, date("m")  , date("d")+30, date("Y")));?>" />
<meta http-equiv="Connection" content="keep-alive" />
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $cur_template; ?>/mootools.js" type="text/javascript"></script>
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/selectLanguage.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $mosConfig_live_site;?>/protected/shadowbox/shadowbox.css" />
<script type="text/javascript" src="<?php echo $mosConfig_live_site;?>/protected/shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
	overlayOpacity: 0.7,
	viewportPadding: 40
});
</script>
	<?php
	$option = $_GET['option'];
	$rm = 0;
	$rm = $rm + mosCountModules( 'right' );
	$rm = $rm + mosCountModules( 'right1' );
	$rm = $rm + mosCountModules( 'right2' );
	$rm = $rm + mosCountModules( 'right3' );
	$rm = $rm + mosCountModules( 'right4' );
	?>
</head>

<body>
<div id="wrapper">
    <div id="header">
		<?php mosLoadModules ( 'banner', -2); ?>
		<div id="access">
			<div class="skip-link"><a href="#content" title="Skip to content">Skip to content</a></div>
		</div><!-- #access -->
    </div><!-- #header -->

	<div id="topmenu">
		<?php mosLoadModules ( 'left', -2); ?>
	</div><!-- #topmenu -->

	<a name="content" id="content"></a>
    <div id="main">

	<!-- Navegation Guide Breadcrumbs -->
    <?php if ((strlen($option) > 0) || ($option == 'com_frontpage')) {; ?>
	    <div id="pathway_text">
		    <?php mosPathWay(); ?>
		</div><!-- pathway_text -->
	<?php } ?>
		<div id="slideshow"><?php mosLoadModules ( 'user7', -2 ); ?></div>

		<div id="highlights">
		<?php if (mosCountModules( 'left1' )) { ?>
		<div id="left1"><?php mosLoadModules ( 'left1', -2); ?></div>
		<?php } ?>
		<?php if (mosCountModules( 'left2' )) { ?>
		<div id="left2"><?php mosLoadModules ( 'left2', -2); ?></div>
		<?php } ?>
		<?php if (mosCountModules( 'left3' )) { ?>
		<div id="left3"><?php mosLoadModules ( 'left3', -2); ?></div>
		<?php } ?>
		<?php if (mosCountModules( 'left4' )) { ?>
		<div id="left4"><?php mosLoadModules ( 'left4', -2); ?></div>
		<?php } ?>
		<?php if (mosCountModules( 'left5' )) { ?>
		<div id="left5"><?php mosLoadModules ( 'left5', -2); ?></div>
		<?php } ?>
		</div><!-- end of #highlights -->

        <div id="container">
		<div id="premain"><?php mosLoadModules ( 'premain', -2); ?></div><!-- premain -->


		<!-- Main Joomla Content -->
		<?php mosMainBody(); ?>

		<div id="postmain"><?php mosLoadModules ( 'postmain', -2 ); ?></div><!-- postmain -->
            <div id="rss_left"><?php mosLoadModules ( 'innerleft', -2 ); ?></div><!-- rss_left -->
			<div id="rss_right"><?php mosLoadModules ( 'innerright', -2 ); ?></div><!-- rss_right -->
            <div id="postcols"><?php mosLoadModules ( 'postcols', -2 ); ?></div><!-- postcols -->
            <div style="clear:both"></div>

        </div><!-- #container -->
 
	</div><!-- #main -->

	<div id="right">
		<?php mosLoadModules ( 'social', -2 ); ?>
		<div id="sidebar">
	
			<div id="buttons_language"><?php mosLoadModules ( 'language', -2 ); ?></div>
			<?php mosLoadModules ( 'user4', -2 ); ?>
			<div id="menubar">
				<?php mosLoadModules ( 'user3', -2 ); ?>
			</div>
			<script>
			document.getElementsByName("q")[0].style.width = 215 + "px";
			</script>
		<?php
			if ($rm) {
		?>
			<?php mosLoadModules ( 'right', -2 ); ?>
			<?php echo "<!-- R1 -->\n"; ?>
			<?php mosLoadModules ( 'right1', -2 ); ?>
			<?php echo "<!-- R2 -->\n"; ?>
			<?php mosLoadModules ( 'right2', -2 ); ?>
			<?php echo "<!-- R3 -->\n"; ?>
			<?php mosLoadModules ( 'right3', -2 ); ?>
			<?php echo "<!-- R4 -->\n"; ?>
			<?php mosLoadModules ( 'right4', -2 ); ?>
		<?php } ?>

		</div><!-- end of sidebar -->

	</div><!-- end of right -->
	<div style="clear:both"></div>
</div><!-- #wrapper -->

<div id="footr_out" style="border-top: 3px solid #DDD;outline: 1px solid #777">

	<div id="footr_in">
		<div id="ftmenu1"><?php mosLoadModules ( 'ftmenu1', -2 ); ?></div>
		<div id="ftmenu2"><?php mosLoadModules ( 'ftmenu2', -2 ); ?></div>
		<div id="ftmenu3"><?php mosLoadModules ( 'ftmenu3', -2 ); ?></div>

	    <div id="footer">
    	    <div id="colophon">
 
        	    <div id="site-info">
					<p>Copyright &copy; - <a href="http://www.paho.org/">Pan American Health Organization</a> - <a href="http://www.who.int/">World
					Health Organization</a></p>
            	</div><!-- #site-info -->
 
	        </div><!-- #colophon -->
    	</div><!-- #footer -->
	</div><!-- #footr_in -->
</div><!-- #footr_out -->

</body>
</html>