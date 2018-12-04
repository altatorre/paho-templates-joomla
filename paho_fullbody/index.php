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
		$alt1 = "Organizaci�n Panamericana de la Salud";
		$alt2 = "Organizaci�n Mundial de la Salud";
		$alt3 = "D�a Mundial del Donante de Sangre 14 de Junio";
		$url3 = 'http://new.paho.org/hq/index.php?option=com_content&task=blogcategory&id=1163&Itemid=597&lang=es';
		break;
	case 'english':
		$alt1 = "Pan American Health Organization";
		$alt2 = "World Health Organization";
		$alt3 = "World Blood Donor Day June 14";
		$url3 = 'http://new.paho.org/hq/index.php?option=com_content&task=blogcategory&id=1163&Itemid=597';
		break;
	case 'french':
		$alt1 = "Organisation panam�ricaine de la Sant�";
		$alt2 = "Organisation mondiale de la Sant�";
		$alt3 = "";
		break;
	case 'brazilian_portuguese':
		$alt1 = "Organiza��o Pan-Americana da Sa�de";
		$alt2 = "Organiza��o Mundial da Sa�de";
		$alt3 = "";
		break;
	default:
		$alt1 = "Pan American Health Organization";
		$alt2 = "World Health Organization";
		$url3 = 'http://new.paho.org/hq/index.php?option=com_content&task=blogcategory&id=1163&Itemid=597';
		break;
}
//right based combos
$right = 0;
?>
	<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
	<link href="<?php echo $mosConfig_live_site;?>/templates/paho_fullbody/css/template_css.css" rel="stylesheet" type="text/css" />
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
<!-- Inicio idioma -->					
						<?php mosLoadModules ( 'language', -1); ?>
<!-- Fin idioma -->
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
							<div id="banner_inner">
								<img src="<?php echo $mosConfig_live_site;?>/images/banners/banner_<?php echo $mosConfig_lang; ?>_oneclick.jpg" 
													border="0" alt="Pan American Health Organization/Organizaci�n Panamericana de la Salud"   usemap="#Map" />			
			  					
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
                                        <div style="width:90px;float:left;margin:6px"><a href="
<?php 
echo "http://new.paho.org/";
  if ($mosConfig_lang=="brazilian_portuguese") {
    echo "bra/";
  }
  else {
    echo "hq/";
}
?>" style="color:#FFF;font-size:12px;font-weight:bold">HOME PAGE</a></div>
					<div id="top_inner_menu_buttons">
						<?php mosLoadModules ( 'user3', -1); ?>
				</div>
			</div>
		</div>

		</div>
                
                <!-- Left menu zone -->
                
		<div id="left_outer" style="display:none">
			<div id="left_inner">
		  	</div>
		</div>

				<!-- Content -->

		<div id="content_outer">
			<div id="content_inner">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content_table">
				<tr valign="top">
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="50%" class="content_table">
                                        <!-- News Content -->
					<tr>
					<td colspan="<?php echo $colspan; ?>" class="body_outer"><?php mosMainBody(); ?></td>
					</tr>
                                        </table>
					</td>	
					<td></td>

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
					</td>
                    <?php } ?>
					</tr></table>
		  		</div>
		  	</div>
		</td>
		</tr>
	</table>
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