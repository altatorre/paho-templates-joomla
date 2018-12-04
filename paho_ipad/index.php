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
<link href="<?php echo $mosConfig_live_site;?>/templates/paho_ipad/css/template_css.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Last-Modified" content="<?php echo date('D, d M Y H:i:s O', getlastmod()); ?>" />
<meta http-equiv="Expires" content="<?php echo date('D, d M Y H:i:s O', mktime(0, 0, 0, date("m")  , date("d")+30, date("Y")));?>" />
<meta http-equiv="Connection" content="keep-alive" />
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $cur_template; ?>/mootools.js" type="text/javascript"></script>
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/selectLanguage.js" type="text/javascript"></script>
</head>
<body style="text-align:center">

<div style="width:808px;margin: 8px auto 20px auto;text-align:left;background: #FFF url(http://new.paho.org/hq/templates/paho_ipad/images/pahopage_bg.png) repeat-y">

    <div id="buttons_outer">
	    <div id="buttons_language">
            <!-- Inicio idioma -->					
		    <?php mosLoadModules ( 'language', -1); ?>
            <!-- Fin idioma -->
		</div>
	</div>

    <div class="clr"></div>

  	<div id="header_outer">
        <div id="header">
		<?php if ( mosCountModules ('banner') ) { ?>
		    <div id="banner_inner">
                <?php mosLoadModules ( 'banner', 0); ?>
		    </div>
		<?php } ?>
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
			    <?php mosLoadModules ( 'user3', -1); ?>
			</div>
		</div>
	</div>

<div class="clr"></div>

<!-- Content -->

<!-- Navegation Guide Breadcrumbs -->
<div id="pathway_text" style="margin-bottom:0px">
    <?php 
        if ($_GET['searchword'] != "") 
		{ 
		    echo "Home";
		} else {
            mosPathWay();
        } 
    ?>
</div>

<!-- Left (Main) Column -->
<div style="margin-top:0px;width: 658px;float:left;background:transparent">

<?php mosLoadModules ( 'premain', -1 ); ?>

<!-- starts mainbody -->
<?php mosMainBody(); ?>
<!-- ends mainbody -->
                                        
<!-- luego del main inicia -->
<?php mosLoadModules ( 'postmain', -2 ); ?>
<!-- luego del main acaba -->

<table cellpadding="0" cellspacing="0" border="0" width="630">
<tr>
<td width="48%" valign="top">
<?php mosLoadModules ( 'innerleft', -2 ); ?>
</td>
<td>&nbsp;</td>
<td width="48%" valign="top">
<?php mosLoadModules ( 'innerright', -2 );  ?>
</td></tr></table>

<?php mosLoadModules ( 'postcols', -2 );  ?></td></tr>

</div>

<!-- Right menu zone -->
<div style="width:140px;float:right">                                

								<?php mosLoadModules ( 'right', -2 ); ?>
								<?php mosLoadModules ( 'right1', -2 ); ?>
								<?php mosLoadModules ( 'right2', -2 ); ?>
								<?php mosLoadModules ( 'right3', -2 ); ?>
								<?php mosLoadModules ( 'right4', -2 ); ?>
</div>

<div class="clr"></div>

</div>
</div>
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

</body>
</html>