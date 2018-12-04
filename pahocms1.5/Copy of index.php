﻿<?php defined( '_JEXEC' ) or die( 'Restricted access' );
JHTML::_('behavior.modal', 'a.modal-button');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" 
   xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >

<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/template.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo JURI::base(); ?>media/shadowbox/shadowbox.css" />
<script type="text/javascript" src="<?php echo JURI::base(); ?>media/shadowbox/shadowbox.js"></script>
<script type="text/javascript" src="<?php echo JURI::base(); ?>media/system/js/language.js"></script>
<script type="text/javascript">
Shadowbox.init({
	overlayOpacity: 0.7,
	viewportPadding: 40
});
</script>
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

<div id="col_cntnr"<?php if(!$rm) { echo ' style="background-image:url(templates/pahocms1.5/images/pahopage_nr_bg.png)"'; } ?>>

    <div id="buttons_outer">
        <div id="buttons_inner">
		    <div id="buttons_language"><jdoc:include type="modules" name="language" /></div>
		</div><!-- buttons_inner -->
	</div><!-- buttons_outer -->

    <div id="header">
	    <div id="banner_inner">
            <jdoc:include type="modules" name="banner" style="xhtml" />
		</div><!-- banner_inner -->
	</div><!-- header -->
	
<!-- Menu de busca -->
                    
	<div id="top_outer">
	    <div id="top_inner">
		    <div id="top_inner_right_box">
				<jdoc:include type="modules" name="user4" />
			</div><!-- top_inner_right_box -->
		</div><!-- top_inner -->
		<div id="top_inner_menu">
		    <div id="top_inner_menu_buttons">
			    <jdoc:include type="modules" name="user3" />
			</div><!-- top_inner_menu_buttons -->
        </div><!-- top_inner_menu -->
	</div><!-- top_outer -->

    <!-- Left menu zone -->
  	<div id="left_inner">
	    
		<div id="left_inner_menu1">
		    <jdoc:include type="modules" name="left" />
		</div><!-- left_inner_menu1 -->
	    
		<div id="left_inner_menu2">
		    <jdoc:include type="modules" name="left1" style="xhtml" />
		</div><!-- left_inner_menu2 -->
		
		<div id="left_inner_menu3">
		    <jdoc:include type="modules" name="left2" style="xhtml" />
		</div><!-- left_inner_menu3 -->
		
		<div id="left_inner_menu4">
		    <jdoc:include type="modules" name="left3" style="xhtml" />
		</div><!-- left_inner_menu4 -->
		
		<div id="left_inner_menu5">
		    <jdoc:include type="modules" name="left4" style="xhtml" />
		</div><!-- left_inner_menu5 -->
  	</div><!-- left_inner -->


	<!-- Content -->
	<div id="content_outer">
	<!-- Navegation Guide Breadcrumbs -->
    <?php if (JRequest::getCmd( 'view' ) != 'frontpage') {; ?>
	    <div id="pathway_text">
		    <jdoc:include type="module" name="breadcrumbs" />
		</div><!-- pathway_text -->
    <?php }else { ?>
            <div style="height:12px"></div>
    <?php }; ?>

	    <div id="content_inner"<?php if(!$rm) { echo ' style="width: 660px"'; } ?>>

		    <div id="premain"><jdoc:include type="modules" name="premain" style="xhtml" /></div><!-- premain -->

            <!-- News Content -->
			<jdoc:include type="component" />

            <!-- RSS -->
			<div id="postmain"><jdoc:include type="modules" name="postmain" style="xhtml" /></div><!-- postmain -->
            <div id="rss_left"><jdoc:include type="modules" name="innerleft" style="xhtml" /></div><!-- rss_left -->
			<div id="rss_right"><jdoc:include type="modules" name="innerright" style="xhtml" /></div><!-- rss_right -->
            <div id="postcols"><jdoc:include type="modules" name="postcols" style="xhtml" /></div><!-- postcols -->
            <div style="clear:both"></div>
        </div><!-- content_inner -->

		<?php
			if ($rm) {
		?>

        <!-- Right menu zone -->
		<div id="right_outer">
		    
            <div id="right_inner_menu" style="margin-top:0px;">
				    <jdoc:include type="modules" name="right" style="xhtml" />
			</div><!-- right_inner_menu -->
			<?php if ($this->countModules( 'right1' )) { ?>
			<div id="right_inner_menu1"><jdoc:include type="modules" name="right1" style="xhtml" /></div><!-- right_inner_menu1 -->
			<?php }?>
			<?php if ($this->countModules( 'right2' )) { ?>
			<div id="right_inner_menu2"><jdoc:include type="modules" name="right2" style="xhtml" /></div><!-- right_inner_menu2 -->
			<?php }?>
			<?php if ($this->countModules( 'right3' )) { ?>
			<div id="right_inner_menu3"><jdoc:include type="modules" name="right3" style="xhtml" /></div><!-- right_inner_menu3 -->
			<?php }?>
			<?php if ($this->countModules( 'right4' )) { ?>
			<div id="right_inner_menu4"><jdoc:include type="modules" name="right4" style="xhtml" /></div><!-- right_inner_menu4 -->
			<?php }?>
			
		</div><!-- right_outer -->
		<?php } ?>

    </div><!-- content_outer -->

    <div style="clear:both"><p>&nbsp;</p></div>

	<div id="footer_menus">
		<div id="ftmenu1"><jdoc:include type="modules" name="ftmenu1" style="xhtml" /></div>
		<div id="ftmenu2"><jdoc:include type="modules" name="ftmenu2" style="xhtml" /></div>
		<div id="ftmenu3"><jdoc:include type="modules" name="ftmenu3" style="xhtml" /></div>
	</div><!-- #footer_menus -->

</div><!-- col_cntnr -->

<div id="legals" style="text-align:center">
	<table style="border:0px;width:100%">
	<tr>
	<td style="text-align:center">
	<div style="text-align:center">
    <jdoc:include type="modules" name="legals" style="xhtml" />
	</div>
	</td>
	</tr>
	</table>
</div>
		
<div class="ftr" style="text-align:center">
    <jdoc:include type="modules" name="footer" style="xhtml" />
</div><!-- ftr -->
<div>
    <jdoc:include type="modules" name="debug" />
</div>

</body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-4789980-51']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</html>