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
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" /><!-- sin columna derecha -->
<link href="<?php echo $mosConfig_live_site;?>/templates/paho_cms_rightless/css/template_css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $cur_template; ?>/mootools.js" type="text/javascript"></script>
<style type="text/css">
#content_outer { width: 100%; }
</style>
</head>
<body>
<div align="center">
	<table border="1" cellpadding="0" cellspacing="0" width="750">
		<tr>
			<td class="outline">
		  		<div id="buttons_outer">
		  		  <div id="buttons_inner">
						<div id="buttons_language">
							<?php mosLoadModules ( 'language', -1); ?>
						</div>
					</div>
		  		</div>
                
		  		<div class="clr"></div>
                
		  		<div id="header_outer">
		  			<div id="header">
						<?php if ( mosCountModules ('banner') ) { ?>
			  				<table border="0" cellpadding="0" cellspacing="0"  width="100%">
								<tr>
									<td>
										<div id="banner_inner">
			  								<?php mosLoadModules( 'banner', -1 ); ?><br />
										</div>
									</td>
								</tr>
							</table>
						<?php } ?>
		  			</div>
		  			
                    <!-- Menu de busca -->
                    
                    <div id="top_outer"
						<div id="top_inner">
	                        <div id="top_inner_right_box">
                            	<p>
									<?php 
                                        //echo _SEARCH_TITLE;  
                                        mosLoadModules ( 'user4', -1 );   
                                    ?>
                                </p>
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
                
				<!-- Content -->

<div id="content_outer">
</div>
<div id="legals">
	<?php mosLoadModules ( 'legals', 1 ); ?>
</div>

			<div class="ftr" align="center">
				 
				<a class="ftr" href="http://www.who.int/about/copyright/en/">&copy; World Health Organization 2007. 
					All rights reserved</a>
			</div>
  	<?php include_once( $GLOBALS['mosConfig_absolute_path'] . '/includes/footer.php' ); ?>
  	<?php mosLoadModules( 'debug', -1 );?>
</div>

</body>
</html>