<?php
defined( '_VALID_MOS' ) or die( 'Restricted access' );
// version 20100224
// needed to seperate the ISO number from the language file constant _ISO
$iso = explode( '=', _ISO );
// xml prolog
echo '<?xml version="1.0" encoding="'. $iso[1] .'" ?' .'>';
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
$right = 1;
?>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<link href="<?php echo $mosConfig_live_site;?>/templates/paho_cms/css/template_css.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $mosConfig_live_site;?>/protected/lightbox2/css/lightbox.css" rel="stylesheet" type="text/css" media="screen" />
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
</head>
<body>
	<div align="center">
	<table border="0" cellpadding="0" cellspacing="0" width="808">
	<tr>
		<td class="outline">
				<!-- start:exclude -->
		  	<div id="buttons_outer">
		  		<div id="buttons_inner">
					<div id="buttons_language">
<!-- Inicio idioma -->					
						<?php mosLoadModules ( 'language', -1); ?>
<!-- Fin idioma -->
					</div><div style="clear:both"></div>
				</div>
		  	</div>
            	<!-- end:exclude -->
		  	<div class="clr"></div>
                
		  	<div id="header_outer">
		  		<div id="header">
						<?php if ( mosCountModules ('banner') ) { ?>
			  		<table border="0" cellpadding="0" cellspacing="0"  width="100%">
					<tr>
						<td>
							<div id="banner_inner">
                                <?php mosLoadModules ( 'banner', 0); ?>
							</div>
						</td>
					</tr>
					</table>
						<?php } ?>
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

		</div>
                
</td></tr><tr><td>
<?php /*  cambiojc 20100224 Solución al problema de que se cae el contenido */  ?>
<div style="margin-top:-2px;margin-left:2px;"><table cellspacing="0"  cellpadding="0" border="0" width="808"><tr valign="top"><td bgcolor="#BBD6EF">
                <!-- Left menu zone -->
                
		<div id="left_outer">
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
		</div>

<?php /*  cambiojc 20100224 Solución al problema de que se cae el contenido */  ?>
</td><td>
					<!-- Content -->

		<div id="content_outer">
			<div id="content_inner"> <?php {  ?>
				<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content_table">
				<tr valign="top">
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="50%" class="content_table">
                    		<!-- Navegation Guide Breadcrumbs -->
					<tr>
					<td colspan="<?php echo $colspan; ?>">
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
					</td>
					</tr>
                                        <!-- News Content -->
					<tr>
					<td colspan="1<?php echo $colspan; ?>" class="body_outer"><?php mosLoadModules ( 'premain', -1 ); ?></td>
					</tr>
					<tr>
					<td colspan="1<?php echo $colspan; ?>" class="body_outer"><!-- starts mainbody --><?php mosMainBody(); ?><!-- ends mainbody --></td>
					</tr>
                                        
                                        <!-- RSS -->
                    <?php if (($_SERVER['QUERY_STRING'] == "") || ($_SERVER['QUERY_STRING'] == "option=com_frontpage&amp;Itemid=1") ||  (1==1)) { ?>
                	<tr>
					<td>                                                                                
						<table width="502" border="0">
						<tr>
						<td colspan="5" class="rss"><!-- luego del main inicia -->
							<?php mosLoadModules ( 'postmain', -2 ); ?>
						</td> <!-- luego del main acaba -->
						</tr>
						<tr valign="top">
						<td width="232">
            				<!-- <div id="buffet">
								<h3><a href="http://campusvirtualsp.org" target="_blank">Campus virtual</a></h3>
								</div> -->
    						<table>
    						<tr>
							<td class="rss">
									<?php mosLoadModules ( 'innerleft', -2 ); ?>
							</td>
							</tr>
							</table>
						</td>
    					<td width="13" align="left" valign="top"><img src="images/shim.gif" alt="" width="13" height="1" /></td>
    					<td width="1" valign="top" bgcolor="#cccccc"><img src="images/shim.gif" alt="" width="1" height="1" /></td>
    					<td width="13" align="left" valign="top"><img src="images/shim.gif" alt="" width="13" height="1" /></td>	
						<td width="231">
							<!-- <div id="buffet">
							<h3>Virtual Health Library</h3>
							</div> -->
            				<table>
            				<tr>
							<td class="rss">			        
			        			<?php mosLoadModules ( 'innerright', -2 );  ?>
							</td>
							</tr>
							</table>
								<!-- <div id="buffet">
								<h3><a href="http://campusvirtualsp.org" target="_blank">Blogs</a></h3>
								</div>
            					<table>
            					<tr>
								<td class="rss">
									<?php mosLoadModules ( 'news_rss', -2 ); ?>
								</td>
								</tr>
								</table> -->
							</td>
							</tr>
							</table>
							<table width="100%">
							<tr><td><?php mosLoadModules ( 'postcols', -2 );  ?></td></tr>
							</table>
						</td>
						</tr>
					<?php } ?>
						</table>
					</td>	
					<td bgcolor="silver" width="1" style="width:1px;background: #ffffff url(<?php echo $mosConfig_live_site;?>/templates/paho_cms/images/spacer1.gif)"><img src="<?php echo $mosConfig_live_site;?>/templates/paho_cms/images/spacer1.gif" alt="" /></td>

							<!-- Right menu zone -->
                                
								<?php if ( $right > 0 ) { ?>
					<td width="1" align="left" valign="top" class="line">
						<img src="images/shim.gif" alt="" width="1" height="1" />
					</td>
					<td width="10">
						<img src="images/shim.gif" alt="" width="10" height="1" />
					</td>
				  	<td class="right_inner_menu_background">
						<div id="right_outer">
			  				<div id="right_inner">

        		             	<div id="right_inner_menu1">
									<?php mosLoadModules ( 'right', -2 ); ?>
			  					</div>

								<?php if ((mosCountModules( 'right' )) && (mosCountModules( 'right1' ))) { ?>
									<!-- <div style="margin-top:4px;margin-top:4px;border-bottom:1px solid #C1C1C1"></div> -->
								<?php } ?>

                        		<div id="right_inner_menu2">
									<?php mosLoadModules ( 'right1', -2 ); ?>
					  			</div>
								
								<?php if ((mosCountModules( 'right1' )) && (mosCountModules( 'right2' ))) { ?>
									<!-- <div style="margin-top:4px;margin-top:4px;border-bottom:1px solid #C1C1C1"></div> -->
								<?php } ?>

	              				<div id="right_inner_menu3">
									<?php mosLoadModules ( 'right2', -2 ); ?>
					  			</div>

								<?php if ((mosCountModules( 'right2' )) && (mosCountModules( 'right3' ))) { ?>
									<!-- <div style="margin-top:4px;margin-top:4px;border-bottom:1px solid #C1C1C1"></div> -->
								<?php } ?>

        		        		<div id="right_inner_menu4">
									<?php mosLoadModules ( 'right3', -2 ); ?>
			  					</div>

								<?php if ((mosCountModules( 'right3' )) && (mosCountModules( 'right4' ))) { ?>
									<!-- <div style="margin-top:4px;margin-top:4px;border-bottom:1px solid #C1C1C1"></div> -->
								<?php } ?>

        		   				<div id="right_inner_menu5">
									<?php mosLoadModules ( 'right4', -2 ); ?>
			  					</div>
                  			</div>
						</div>
				</td>
                    <?php } ?>
					</tr></table>
		  		</div>
		  	</div>
		</td>
		</tr>
	</table>  <?php } ?>
	</div>
<?php /*  cambiojc 20100224 Solucion al problema de que se cae el contenido */  ?>
</td></tr></table></div>
	<div align="center">
	<!-- inicia modulo inferior -->
	<table width="741" border="0" cellspacing="10" cellpadding="0">
	<tr>
	<td align="center">
		<div id="legals">
        	<?php mosLoadModules ( 'legals', 1 ); ?>
     	</div>
		<div class="ftr" align="center">
         	<?php mosLoadModules ( 'footer', 1 ); ?>
		</div>
	</td>
	</tr>
	</table>
  	<?php include_once( $GLOBALS['mosConfig_absolute_path'] . '/includes/footer.php' ); ?>
  	<?php mosLoadModules( 'debug', -1 );?>
</div>
</body>
</html>