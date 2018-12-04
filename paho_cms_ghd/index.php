<?php
defined( '_VALID_MOS' ) or die( 'Restricted access' );
// GHD Template
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
//script to determine which div setup for layout to use based on module configuration
$user1 = 0;
$user2 = 0;
$colspan = 0;
$right = ( mosCountModules( 'right' ) );
$right = $right + ( mosCountModules( 'right1' ) );
$right = $right + ( mosCountModules( 'right2' ) );
$right = $right + ( mosCountModules( 'right3' ) );
$right = $right + ( mosCountModules( 'right4' ) );

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
?>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<link href="<?php echo $mosConfig_live_site;?>/templates/paho_cms_ghd/css/template_css.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Last-Modified" content="<?php echo date('D, d M Y H:i:s O', getlastmod()); ?>" />
<meta http-equiv="Expires" content="<?php echo date('D, d M Y H:i:s O', mktime(0, 0, 0, date("m")  , date("d")+30, date("Y")));?>" />
<meta http-equiv="Connection" content="keep-alive" />
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $cur_template; ?>/mootools.js" type="text/javascript"></script>
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/selectLanguage.js" type="text/javascript"></script>
</head>
<body style="text-align:center">

<div style="width:808px;margin:10px auto 10px auto">

	<table border="0" cellpadding="0" cellspacing="0" width="808">
	<tr>
		<td class="outline" colspan="2">
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
								<img src="<?php echo $mosConfig_live_site;?>/images/banners/banner_ghd_10.jpg" 
													border="0" alt="Pan American Health Organization/Organización Panamericana de la Salud" />
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
						<?php //mosLoadModules ( 'user3', -1); ?>
				</div>
			</div>
		</div>

		</div>
                
</td></tr>

<tr><td bgcolor="#BBD6EF" valign="top">

<table cellspacing="0"  cellpadding="0" border="0"><tr valign="top"><td bgcolor="#BBD6EF">
                <!-- Left menu zone -->
                
		<div id="left_outer">
			<div id="left_inner">
 				<div id="left_inner_menu1">
					<?php //mosLoadModules ( 'left', -2 ); ?>                        
				</div>
				<div id="left_inner_menu2">
					<?php mosLoadModules ( 'left1', -2 ); ?>                        
				</div>
				<div id="left_inner_menu3">
					<?php mosLoadModules ( 'left2', -2 ); ?>                        
     			</div>
<!-- 
      			<div id="left_inner_menu4">
					<?php mosLoadModules ( 'left3', -2 ); ?>                        
           		</div>
             	<div id="left_inner_menu5">
						<?php //mosLoadModules ( 'left4', -2 ); ?>                        
               	</div>
 -->
		  	</div>
		</div>

<?php /*  cambiojc 20100224 Solución al problema de que se cae el contenido */  ?>
</td></tr></table>
</td>
<!-- Left menu zone ends -->
					<!-- Content -->
<td valign="top">	

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

<!-- News Content -->

        <?php if ( $right == 0 ) { ?>

            <div style="width:660px;margin-left:10px">
                <?php mosLoadModules ( 'premain', -1 ); ?>

                <!-- starts mainbody -->
                    <?php mosMainBody(); ?>
                <!-- ends mainbody -->

                <!-- luego del main inicia -->
                    <?php mosLoadModules ( 'postmain', -2 ); ?>
                <!-- luego del main acaba -->

                <div style="width:310px;float:left;margin-right:10px">
                    <?php mosLoadModules ( 'innerleft', -2 ); ?>
                </div>
                <div style="width:310px;float:left;margin-left:10px">
                    <?php mosLoadModules ( 'innerright', -2 );  ?>
                </div>

                <?php mosLoadModules ( 'postcols', -2 );  ?>

        	</div>
        <?php } ?>

        <?php if ( $right != 0 ) { ?>

<table width="670" cellspacing="0" cellpadding="0" border="0">
<tr>
<td width="10" rowspan="3"><br /></td>
<td width="500" colspan="3" valign="top">
<?php mosLoadModules ( 'premain', -1 ); ?>

<!-- starts mainbody -->
    <?php mosMainBody(); ?>
<!-- ends mainbody -->

<!-- luego del main inicia -->
    <?php mosLoadModules ( 'postmain', -2 ); ?>
<!-- luego del main acaba -->
</td>
<td width="6" rowspan="3"><br /></td>
<td width="5" rowspan="3" style="border-left:1px solid #C1C1C1"><br /></td>
<td width="138" rowspan="3" valign="top">
                <div id="right_outer">
                    <div id="right_inner">

                    <?php if (mosCountModules( 'right' )) { ?>
                        <div id="right_inner_menu1">
                            <?php mosLoadModules ( 'right', -2 ); ?>
		                </div>
	                    <div style="margin-top:4px;margin-bottom:4px;border-bottom:1px solid #C1C1C1"></div>
                 	<?php }?>

                 	<?php if (mosCountModules( 'right1' )) { ?>
                        <div id="right_inner_menu2">
		                    <?php mosLoadModules ( 'right1', -2 ); ?>
			            </div>
	                    <div style="margin-top:4px;margin-bottom:4px;border-bottom:1px solid #C1C1C1"></div>
                 	<?php }?>

                    <?php if (mosCountModules( 'right2' )) { ?>
                        <div id="right_inner_menu3">
    	                    <?php mosLoadModules ( 'right2', -2 ); ?>
		                </div>
	                    <div style="margin-top:4px;margin-bottom:4px;border-bottom:1px solid #C1C1C1"></div>
	                <?php }?>

                    <?php if (mosCountModules( 'right3' )) { ?>
                        <div id="right_inner_menu4">
			                <?php mosLoadModules ( 'right3', -2 ); ?>
			            </div>
	                    <div style="margin-top:4px;margin-bottom:4px;border-bottom:1px solid #C1C1C1"></div>
	                <?php }?>

                    <?php if (mosCountModules( 'right4' )) { ?>
                        <div id="right_inner_menu5">
			                <?php mosLoadModules ( 'right4', -2 ); ?>
			            </div>
	                    <div style="margin-top:4px;margin-bottom:4px;border-bottom:1px solid #C1C1C1"></div>
	                <?php }?>
                </div> 
            </div>
</td>
</tr>
<tr>
<td width="240" valign="top"><?php mosLoadModules ( 'innerleft', -2 ); ?></td>
<td width="20"><br /></td>
<td width="240" valign="top"><?php mosLoadModules ( 'innerright', -2 );  ?></td>
</tr>
<tr>
<td width="500" colspan="3" valign="top"><?php mosLoadModules ( 'postcols', -2 );  ?></td>
</tr>
</table>
    <?php } ?>

</td></tr>
</table>


<div align="center" style="margin-top:20px">
	<!-- inicia modulo inferior -->
	<table width="808" border="0" cellspacing="10" cellpadding="0">
	<tr>
	<td align="center">
		<div id="legals">
        	<?php // mosLoadModules ( 'legals', 1 ); ?>
     	</div>
		<div class="ftr" align="center">
         	<?php // mosLoadModules ( 'footer', 1 ); ?>
        </div>

  	<?php include_once( $GLOBALS['mosConfig_absolute_path'] . '/includes/footer.php' ); ?>
  	<?php mosLoadModules( 'debug', -1 );?>
</div>
<div style="clear:both"></div>
</div>

</body>
</html>