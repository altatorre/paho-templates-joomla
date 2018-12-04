<?php
defined( '_VALID_MOS' ) or die( 'Restricted access' );
// needed to seperate the ISO number from the language file constant _ISO
$iso = explode( '=', _ISO );
// xml prolog
echo '<?xml version="1.0" encoding="'. $iso[1] .'"?' .'>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php mosShowHead(); ?>
<?php
if ( $my->id ) {
	initEditor();
}
$collspan_offset = ( mosCountModules( 'right' ) + mosCountModules( 'user2' ) ) ? 2 : 1;

//script to determine which div setup for layout to use based on module configuration
$user1 = 0;
$user2 = 0;
$colspan = 0;
$right = 0;

// banner combos

//user1 combos
if ( mosCountModules( 'user1' ) + mosCountModules( 'user2' ) == 2) {
	$user1 = 2;
	$user2 = 2;
	$colspan = 3;
} elseif ( mosCountModules( 'user1' ) == 1 ) {
	$user1 = 1;
	$colspan = 1;
} elseif ( mosCountModules( 'user2' ) == 1 ) {
	$user2 = 1;
	$colspan = 1;
}

//right based combos
if ( mosCountModules( 'right' ) and ( empty( $_REQUEST['task'] ) || ( $_REQUEST['task'] != 'edit' && $_REQUEST['task'] != 'new' ) ) ) {
	$right = 1;
}
?>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<link href="<?php echo $mosConfig_live_site;?>/templates/<?php echo $cur_template; ?>/css/template_css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $cur_template; ?>/mootools.js" type="text/javascript"></script>
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/selectLanguage.js" type="text/javascript"></script>
<?php 
if ($mosConfig_lang) {
	if ($mosConfig_lang=="english") { $language = "eng"; }
	elseif ($mosConfig_lang=="spanish") { $language = "spa"; }
    else { $language = "eng"; }
}
?>

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
<img src="http://devserver.paho.org/leite/images/banners/banner_<?php echo ($language); ?>2.jpg" />
							<div id="link_ops"><a href="http://www.paho.org" alt="Pan American Health Organization" title="Pan American Health Organization"><img src="http://devserver.paho.org/leite/templates/paho_tableless/images/null.gif" width="165" height="93" border="0" /></a></div>
							<div id="link_oms"><a href="http://www.who.int" target="_blank" alt="World Health Organization" title="World Health Organization"><img src="http://devserver.paho.org/leite/templates/paho_tableless/images/null.gif" width="190" height="93" border="0" /></a></div>
							<div id="link_promo"><a href="" target="_blank" alt="" title=""><img src="http://devserver.paho.org/leite/templates/paho_tableless/images/null.gif" width="200" height="93" border="0" /></a></div>
						</div>
				</div>
	
<!-- Menu de busca -->
                    
			<div id="top_outer">
				<div id="top_inner">
					<div id="top_inner_right_box">
						<?php 
							//echo _SEARCH_TITLE;  
							mosLoadModules ( 'user4', -1 );   
						?>
				</div>
			</div>

			<div id="top_inner_menu">
							<div id="top_inner_menu_buttons">
								<?php mosLoadModules ( 'user3', -1); ?>
							</div>
                         </div>
		  		</div>

                <!-- Left menu zone -->

  			<div id="left_inner">
				<div id="left_inner_menu1">
					<?php mosLoadModules ( 'left', -2 ); ?>                        
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
						if ($_GET['searchword'] != "") 
					{ 
						echo "Home";
					} else {
                   		mosPathWay();
					} 
					?>
				</div>

				<div><?php mosLoadModules ( 'premain', -2 ); ?></div>

			<div id="content_inner">

                <!-- News Content -->
                                        
				<div><?php mosMainBody(); ?></div>

                <!-- RSS -->
                <div><?php if (($_SERVER['QUERY_STRING'] == "") || ($_SERVER['QUERY_STRING'] == "option=com_frontpage&Itemid=1") ||  (1==1)) { ?></div>

				<div><?php mosLoadModules ( 'postmain', -2 ); ?></div>

                <div id="rss_left"><?php mosLoadModules ( 'innerleft', -2 ); ?></div>
	
				<div id="rss_right"><?php mosLoadModules ( 'innerright', -2 );  ?></div>

	<?php }  ?>
	<?php if (($_SERVER['QUERY_STRING'] != "option=com_frontpage&Itemid=1")) { ?>
	<div><?php mosLoadModules ( 'postcols', -1 );  ?></div>
    <?php } ?>

			</div></div>

			<!-- Right menu zone -->
                                
			<?php if ( $right > 0 ) { ?>
				<div id="right_outer">
					<div id="right_inner">

						<span class="article_seperator"></span>
							
							<?php if (mosCountModules( 'right4' )) { ?>
	<!-- 							<hr color="#CCCCCC" width="140" noshade="noshade" align="left" size="1"/> -->
								<div id="right_inner_menu1"><?php mosLoadModules ( 'right4', -2 ); ?></div>
							<?php }?>
							
					</div>
				</div>
			<?php } ?>
			</div>
	<div style="clear:both"></div>
		</div>
</div>

<div style="clear:both"></div>

		<div id="legals">
        	<table cellspacing="1" cellpadding="0" border="0" align="center">
				<tr>
					<td valign="top" align="center">
						<table cellpadding="0" cellspacing="0" class="moduletable" align="center">
							<tr>
								<td align="center">
									<?php mosLoadModules ( 'legals', -2 ); ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
     	</div>
		
		<div class="ftr" align="center">
			<?php mosLoadModules ( 'footer', -2 ); ?>
		</div>
			<?php include_once( $GLOBALS['mosConfig_absolute_path'] . '/includes/footer.php' ); ?>
			<?php mosLoadModules( 'debug', -1 );?>
	
<p>&nbsp;</p>
</body>
</html>