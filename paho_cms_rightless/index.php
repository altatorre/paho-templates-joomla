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
</head>
<body>
<div align="center">
	<table border="0" cellpadding="0" cellspacing="0" width="750">
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
										<!-- <div id="poweredby_inner">
											<img src="<?php echo $mosConfig_live_site;?>/templates/paho_cms/images/pi_paho_logo_image.jpg" alt="powered_by.png, 1 kB" title="powered_by" border="0" />
										</div> -->
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
		  			</div>
		  		</div>

				<!-- Content -->

		 		<div id="content_outer"
					<div id="content_inner">
			  			<table border="0" cellpadding="0" cellspacing="0" width="100%" class="content_table">
				<tr valign="top">
			<td>
			<table border="0" cellpadding="0" cellspacing="0" width="50%" class="content_table"
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
					<td colspan="<?php echo $colspan; ?>" class="body_outer"><?php mosMainBody(); ?></td>
				</tr>
                                        
                                        <!-- RSS -->
                                                                                
                                        <?php if (($_SERVER['QUERY_STRING'] == "") || ($_SERVER['QUERY_STRING'] == "option=com_frontpage&Itemid=1") || ($_SERVER['QUERY_STRING'] == "lang=es") || ($_SERVER['QUERY_STRING'] == "lang=es" || ($_SERVER['QUERY_STRING'] == "") || ($_SERVER['QUERY_STRING'] == "option=com_frontpage&Itemid=1") || ($_SERVER['QUERY_STRING'] == "lang=en") || ($_SERVER['QUERY_STRING'] == "lang=en"))) { ?>
                                        <tr>
                                        	<td>

	<table>
	<tr valign="top" >
		<td width="50%">                                        	
            <div id="buffet">
				<h3><a href="http://campusvirtualsp.org" target="_blank">Campus virtual</a></h3>
			</div>
    		<table>
    		<tr>
			<td class="rss">
				<?php mosLoadModules ( 'ext_rss1', -2 ); ?>
			</td>
			</tr>
			</table>
	</td><td width="50%">
			<div id="buffet">
				<h3>Virtual Health Library</h3>
			</div>
            <table>
            <tr>
				<td class="rss">			        
			        <?php mosLoadModules ( 'user5', -1 );  ?>
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
		</td>
		</tr>
                                        <?php } ?>

				</table>
			</td>
			<td background="<?php echo $mosConfig_live_site;?>/templates/paho_cms/images/spacer1.gif" bgcolor="silver" width="1" style="width:1px;"><img src="<?php echo $mosConfig_live_site;?>/templates/paho_cms/images/spacer1.gif" /></td>
			
	                       		<!-- Right menu zone -->
                               
							
						</table>
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
				 
				<a class="ftr" href="http://www.who.int/about/copyright/en/">&copy; World Health Organization 2007. 
					All rights reserved</a>
			</div>
		</td>
	</tr>
</table>
  	<?php include_once( $GLOBALS['mosConfig_absolute_path'] . '/includes/footer.php' ); ?>
  	<?php mosLoadModules( 'debug', -1 );?>
</div>
</body>
</html>