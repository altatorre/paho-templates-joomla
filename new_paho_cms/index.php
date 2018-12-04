<?php
defined( '_VALID_MOS' ) or die( 'Restricted access' );
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
   xml:lang="<?php echo $mosConfig_lang; ?>" lang="<?php echo $mosConfig_lang; ?>" >

<head>

<?php 
mosShowHead();
if ( $my->id ) { initEditor(); }
$iso = explode( '=', _ISO );
$iso = $iso[1];
?>

<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<link href="<?php echo $mosConfig_live_site;?>/templates/new_paho_cms/css/template.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Last-Modified" content="<?php echo date('D, d M Y H:i:s O', getlastmod()); ?>" />
<meta http-equiv="Expires" content="<?php echo date('D, d M Y H:i:s O', mktime(0, 0, 0, date("m")  , date("d")+30, date("Y")));?>" />
<meta http-equiv="Connection" content="keep-alive" />
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $cur_template; ?>/mootools.js" type="text/javascript"></script>
	<script language="javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/selectLanguage.js" type="text/javascript"></script>
</head>

<body>

<div id="col_cntnr">

    <div id="buttons_outer">
        <div id="buttons_inner">
            <div id="buttons_language"><?php mosLoadModules ( 'language', -1); ?></div>
		</div>
	</div>

	<div id="header">
	    <div id="banner_inner">
            <?php mosLoadModules ( 'banner', -1); ?>
		</div>
	</div>
	
<!-- Menu de busca -->
                    
	<div id="top_outer">

	    <div id="top_inner">
		    <div id="top_inner_right_box">
                <?php mosLoadModules ( 'user4', -1 ); ?>
            </div>
		</div>

	    <div id="top_inner_menu">
            <div id="top_inner_menu_buttons">
			    <?php mosLoadModules ( 'user3', -1 ); ?>
			</div>
        </div>

	</div>

<!-- Left menu zone -->

    <div id="left_inner">

 		<div id="left_inner_menu1">
		    <?php mosLoadModules ( 'left', -1 ); ?>                        
		</div>
		<div id="left_inner_menu2">
		    <?php mosLoadModules ( 'left1', -2 ); ?>                        
		</div>
		<div id="left_inner_menu3">
		    <?php mosLoadModules ( 'left2', -2 ); ?>                        
     	</div>
      	<div id="left_inner_menu4">
			<?php mosLoadModules ( 'left3', -2 ); ?>                        
        </div>
        <div id="left_inner_menu5">
			<?php mosLoadModules ( 'left4', -2 ); ?>                        
        </div>

    </div>

<!-- Content -->

    <div id="content_outer">
	    <!-- Navegation Guide Breadcrumbs -->
        <div id="pathway_text">
            <?php 
			if ($_GET['searchword'] != "") {
			    echo "Home";
			} else {
                mosPathWay();
            } 
			?>
        </div>

        <div id="content_inner">

			<?php mosLoadModules ( 'premain', -2 ); ?>

            <!-- News Content -->
			<div><?php mosMainBody(); ?></div>

            <!-- RSS -->
			<div><?php mosLoadModules ( 'postmain', -2 ); ?></div>
            <div id="rss_left"><?php mosLoadModules ( 'innerleft', -2 ); ?></div>
			<div id="rss_right"><?php mosLoadModules ( 'innerright', -2 );  ?></div>
            <div><?php mosLoadModules ( 'postcols', -2 );  ?></div>
        </div><br />

			<!-- Right menu zone -->
			<div id="right_outer">

			    <div id="right_inner">
					<div id="right_inner_menu" style="margin-top:-10px;">
						<?php mosLoadModules ( 'right', -2 ); ?>
						</div>
							<?php if (mosCountModules( 'right1' )) { ?>
	 							<hr width="138" noshade="noshade" align="left" size="1"/>
							<?php }?>
								<div id="right_inner_menu1"><?php mosLoadModules ( 'right1', -2 ); ?></div>
							<?php if (mosCountModules( 'right2' )) { ?>
	 							<hr width="138" noshade="noshade" align="left" size="1"/>
								<div id="right_inner_menu2"><?php mosLoadModules ( 'right2', -2 ); ?></div>
							<?php }?>
							<?php if (mosCountModules( 'right3' )) { ?>
	 							<hr width="138" noshade="noshade" align="left" size="1"/>
								<div id="right_inner_menu2"><?php mosLoadModules ( 'right3', -2 ); ?></div>
							<?php }?>
							<?php if (mosCountModules( 'right4' )) { ?>
	 							<hr width="138" noshade="noshade" align="left" size="1"/>
								<div id="right_inner_menu2"><?php mosLoadModules ( 'right4', -2 ); ?></div>
							<?php }?>
					    </div>
				    </div>
			    </div>
            <div style="clear:both"></div>
		</div>

	<div id="legals" style="width: 810px;border:1px solid red">
		<?php mosLoadModules ( 'legals', 1 ); ?>
	</div>
		
	<div class="ftr" align="center">
		<?php mosLoadModules ( 'footer', 1 ); ?>
	</div>
		<?php mosLoadModules( 'debug', -1 );?>

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