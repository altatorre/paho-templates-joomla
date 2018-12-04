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
//Cambio vlakov 1006091156 Visualizacion ALT en banner
$special = 0;
$alt1 = "Pan American Health Organization";
$alt2 = "World Health Organization";
$alt3 = "";
$url3 = "";
switch($mosConfig_lang){
	case 'spanish':
		$alt1 = "Organización Panamericana de la Salud";
		$alt2 = "Organización Mundial de la Salud";
		$alt3 = "Día Mundial del Donante de Sangre 14 de Junio";
		$url3 = 'http://new.paho.org/hq/index.php?option=com_content&task=blogcategory&id=1163&Itemid=597&lang=es';
		break;
	case 'english':
		$alt1 = "Pan American Health Organization";
		$alt2 = "World Health Organization";
		$alt3 = "World Blood Donor Day June 14";
		$url3 = 'http://new.paho.org/hq/index.php?option=com_content&task=blogcategory&id=1163&Itemid=597';
		break;
	case 'french':
		$alt1 = "Organisation panaméricaine de la Santé";
		$alt2 = "Organisation mondiale de la Santé";
		$alt3 = "";
		break;
	case 'brazilian_portuguese':
		$alt1 = "Organização Pan-Americana da Saúde";
		$alt2 = "Organização Mundial da Saúde";
		$alt3 = "";
		break;
	default:
		$alt1 = "Pan American Health Organization";
		$alt2 = "World Health Organization";
		$url3 = 'http://new.paho.org/hq/index.php?option=com_content&task=blogcategory&id=1163&Itemid=597';
		break;
}
//right based combos
if ( mosCountModules( 'right' ) and ( empty( $_REQUEST['task'] ) || ( $_REQUEST['task'] != 'edit' && $_REQUEST['task'] != 'new' ) ) ) {
	$right = 1;
} $right = 1;
?>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<link href="<?php echo $mosConfig_live_site;?>/templates/paho_cms/css/template_css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $cur_template; ?>/mootools.js" type="text/javascript"></script>
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/selectLanguage.js" type="text/javascript"></script>
</head>
<body>
<div align="center">
	<table border="0" cellpadding="0" cellspacing="0" width="750">
		<tr>
			<td class="outline">
				<!-- start:exclude -->
		  		<div id="buttons_outer">
		  		  <div id="buttons_inner">
						<div id="buttons_language">
							<?php mosLoadModules ( 'language', -1); ?>
						</div>
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
										<!-- <div id="poweredby_inner">
											<img src="<?php echo $mosConfig_live_site;?>/templates/paho_cms/images/pi_paho_logo_image.jpg" alt="powered_by.png, 1 kB" title="powered_by" border="0" />
										</div> -->
										<div id="banner_inner">
										
			  								<!-- <img src="<?php echo $mosConfig_live_site;?>/images/banners/banner_iwd_<?php echo $mosConfig_lang; ?>.jpg" 
													border="0" alt="Pan American Health Organization/Organización Panamericana de la Salud"   usemap="#Map" /> -->
											<!-- <img src="<?php echo $mosConfig_live_site;?>/images/banners/banner_tb_<?php echo $mosConfig_lang; ?>.jpg" 
													border="0" alt="PAHO World TB Day March 24/OPS Día Mundial de la Tuberculosis Marzo 24"   usemap="#Map" /> -->
											<!-- <object width="550" height="400">
												<param name="movie" value="<?php echo $mosConfig_live_site;?>/images/banners/bannerH1N1_<?php echo $mosConfig_lang; ?>.swf">
												<embed src="<?php echo $mosConfig_live_site;?>/images/banners/bannerH1N1_<?php echo $mosConfig_lang; ?>.swf" width="808" height="93">
												</embed>
											</object> -->
			  								<!-- <img src="<?php echo $mosConfig_live_site;?>/images/banners/<?php echo $mosConfig_lang; ?>.header.jpg" 
													border="0" alt="Pan American Health Organization/Organización Panamericana de la Salud"   usemap="#Map" /> -->
			  								<!-- <img src="<?php echo $mosConfig_live_site;?>/images/banners/banner_ped_<?php echo $mosConfig_lang; ?>.jpg" 
													border="0" alt="World Health Day 2009 -PAHO / OPS - Día Mundial de la Salud 2009"   usemap="#Map" /> -->
			  								<!-- <img src="<?php echo $mosConfig_live_site;?>/images/banners/banner_im_<?php echo $mosConfig_lang; ?>.jpg" 
													border="0" alt="Vaccination Week 2009 -PAHO April 25-May 2 / OPS - Semana de la Vacunación 2009 del 25 de abril a 2 de mayo"  usemap="#Map" /> -->
			  								<!-- <img src="<?php echo $mosConfig_live_site;?>/images/banners/banner_family_<?php echo $mosConfig_lang; ?>.jpg" 
													border="0" alt="International Family Day 2009 -PAHO May 15 / OPS - Dia Internacional de la Familia - OPS Mayo 15"  usemap="#Map" /> -->
			  								<!-- <img src="<?php echo $mosConfig_live_site;?>/images/banners/banner_environment_<?php echo $mosConfig_lang; ?>.jpg" 
													border="0" alt="Pan American Health Organization/Organización Panamericana de la Salud"  usemap="#Map" /> -->
											<!-- <img src="<?php echo $mosConfig_live_site;?>/images/banners/banner_blood_<?php echo $mosConfig_lang; ?>.jpg" 
													border="0" alt="Pan American Health Organization/Organización Panamericana de la Salud"  usemap="#Map" /> -->	
											<img src="<?php echo $mosConfig_live_site;?>/images/banners/banner_<?php echo $mosConfig_lang; ?>.jpg" 
													border="0" alt="Pan American Health Organization/Organización Panamericana de la Salud"  usemap="#Map" />				
											<map name="Map">
														<area shape="rect" coords="2,9,162,77" href="http://www.paho.org" alt="<?=$alt1?>" title="<?=$alt1?>" />
														<area shape="rect" coords="163,8,333,78" href="http://www.who.int" target="_blank" alt="<?=$alt2?>" title="<?=$alt2?>" />
														<?
														if($special == 1){
														?>
														<area shape="rect" coords="340,7,420,78" href="<?=$url3?>" alt="<?=$alt3?>" title="<?=$alt3?>" />
														<?
														}
														?>
  														<!-- <area shape="rect" coords="2,9,162,77" href="http://www.paho.org">
														<area shape="rect" coords="163,8,333,78" href="http://www.who.int" target="_blank" /> -->
														<!-- <area shape="rect" coords="335,-11,688,91" href="http://new.paho.org/hq/index.php?option=com_content&task=view&id=750&Itemid=358" /> -->
														<!-- <area shape="rect" coords="335,-11,688,91" href="http://www.un.org/esa/socdev/family/" target="_blank" /> -->
														<!-- <area shape="rect" coords="335,-11,688,91" href="http://new.paho.org/hq/index.php?option=com_content&task=view&id=1310&Itemid=1186" /> -->
											</map> 
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
                
                <!-- Left menu zone -->
                
		  		<!-- <div id="left_outer">
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
		  		</div> -->

				<!-- Content -->

		 		<div id="content_outer"	style="width:100%;">
					<div id="content_inner"	style="width:100%;">
			  			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr valign="top">
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
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
						<td colspan="1<?php echo $colspan; ?>" class="body_outer"><?php mosLoadModules ( 'premain', -2 ); ?></td>
					</tr>
					<tr>
						<td colspan="1<?php echo $colspan; ?>" class="body_outer"><?php mosMainBody(); ?></td>
					</tr>
                                        
                                        <!-- RSS -->
                    <?php if (($_SERVER['QUERY_STRING'] == "") || ($_SERVER['QUERY_STRING'] == "option=com_frontpage&Itemid=1") ||  (1==1)) { ?>
                    	<tr>
                        	<td>                                                                                
								<table width="100%">
								<tr>
									<td colspan="5" class="rss">
										<?php mosLoadModules ( 'postmain', -2 ); ?>
									</td>
								</tr>
								<tr valign="top" >
									<td width="33%">                                        	
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
									<td width="33%">                                        	
            								<!-- <div id="buffet">
										<h3><a href="http://campusvirtualsp.org" target="_blank">Campus virtual</a></h3>
										</div> -->
    									<table>
    								<tr>
											<td class="rss">
												<?php mosLoadModules ( 'innercentr', -2 ); ?>
											</td>
										</tr>
										</table>
									</td>
    								<td width="13" align="left" valign="top"><img src="images/shim.gif" alt="" width="13" height="1" /></td>
    								<td width="1" valign="top" bgcolor="#cccccc"><img src="images/shim.gif" alt="" width="1" height="1" /></td>
    								<td width="13" align="left" valign="top"><img src="images/shim.gif" alt="" width="13" height="1" /></td>									<td width="33%">
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
								<table>
								<tr><td class="rss"><?php mosLoadModules ( 'postcols', -2 );  ?></td></tr>
								</table>
							</td>
						</tr>
					<?php } ?>
				</table>
			</td>	
			<!-- <td bgcolor="silver" width="1" style="width:1px;background: #ffffff url(<?php echo $mosConfig_live_site;?>/templates/paho_cms/images/spacer1.gif)"><img src="<?php echo $mosConfig_live_site;?>/templates/paho_cms/images/spacer1.gif" alt="" /></td> -->
			
	                       		<!-- Right menu zone -->
                                
								<?php if ( $right > 0 ) { ?>
							<!-- <td width="1" align="left" valign="top" class="line">
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
									<?php if (mosCountModules( 'right1' )) { ?>
										<hr width="140" noshade="noshade" align="left" size="1" />
                        		        <div id="right_inner_menu2">
											<?php mosLoadModules ( 'right1', -2 ); ?>
					  					</div>
					  				<?php }?>
									<?php if (mosCountModules( 'right2' )) { ?>
										<hr width="140" noshade="noshade" align="left" size="1" />
                  						<div id="right_inner_menu3">
											<?php mosLoadModules ( 'right2', -2 ); ?>
					  					</div>
					  				<?php }?>
									<?php if (mosCountModules( 'right3' )) { ?>
										<hr width="140" noshade="noshade" align="left" size="1" />
        		        				<div id="right_inner_menu3">
											<?php mosLoadModules ( 'right3', -2 ); ?>
			  							</div>
					 				<?php }?>
									<?php if (mosCountModules( 'right4' )) { ?>
										<hr width="140" noshade="noshade" align="left" size="1" />
        		   						<div id="right_inner_menu4">
											<?php mosLoadModules ( 'right4', -2 ); ?>
			  							</div> 
									<?php }?>
                  				</div> 
							</div>
							</td> -->
                                <?php } ?>
						</tr></table>
		  			</div>
		  		</div>
			</td>
		</tr>
	</table>
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
