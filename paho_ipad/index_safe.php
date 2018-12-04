<?php defined( '_JEXEC' ) or die( 'Restricted access' );?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
   xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >

<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template?>/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template?>/css/template.css" type="text/css" />
</head>

<body>

<div id="col_cntnr">

			<div id="buttons_outer">
			     <div id="buttons_inner">
				   <div id="buttons_language"><jdoc:include type="modules" name="language" /></div>
			     </div>
			</div>

                
	  		<div id="header">
			     <div id="banner_inner">
                                  <jdoc:include type="modules" name="banner" style="xhtml" />
			     </div>
			</div>
	
<!-- Menu de busca -->
                    
			<div id="top_outer">
				<div id="top_inner">
					<div id="top_inner_right_box">
						<jdoc:include type="modules" name="user4" />
					</div>
				</div>
				<div id="top_inner_menu">
							<div id="top_inner_menu_buttons">
								<jdoc:include type="modules" name="user3" />
							</div>
                </div>
		  	</div>

                <!-- Left menu zone -->
  			<div id="left_inner">
				<div id="left_inner_menu1">
					<jdoc:include type="modules" name="left" />
				</div>
				<div id="left_inner_menu2">
					<jdoc:include type="modules" name="left1" style="xhtml" />
				</div>
				<div id="left_inner_menu3">
					<jdoc:include type="modules" name="left2" style="xhtml" />
				</div>
				<div id="left_inner_menu4">
					<jdoc:include type="modules" name="left3" style="xhtml" />
				</div>
				<div id="left_inner_menu5">
					<jdoc:include type="modules" name="left4" style="xhtml" />
				</div>

  			</div>

			<!-- Content -->

		<div id="content_outer">
				<!-- Navegation Guide Breadcrumbs -->
                        <?php if (JRequest::getCmd( 'view' ) != 'frontpage') {; ?>
			     <div id="pathway_text">
				<jdoc:include type="module" name="breadcrumbs" />
			     </div>
                        <?php }; ?>


			<div id="content_inner">
				<div><jdoc:include type="modules" name="premain" style="xhtml" /></div>

                <!-- News Content -->
				<div><jdoc:include type="component" /></div>

                <!-- RSS -->

				<div><jdoc:include type="modules" name="postmain" style="xhtml" /></div>
                                <div id="rss_left"><jdoc:include type="modules" name="innerleft" style="xhtml" /></div>
				<div id="rss_right"><jdoc:include type="modules" name="innerright" style="xhtml" /></div>
                                <div><jdoc:include type="modules" name="postcols" style="xhtml" /></div>
</div><br />
			<!-- Right menu zone -->
				<div id="right_outer">
					<div id="right_inner">

						<div id="right_inner_menu" style="margin-top:-10px;">
							<jdoc:include type="modules" name="right" style="xhtml" />
						</div>
							<?php if ($this->countModules( 'right1' )) { ?>
	 							<hr width="138" noshade="noshade" align="left" size="1"/>
							<?php }?>
								<div id="right_inner_menu1"><jdoc:include type="modules" name="right1" style="xhtml" /></div>
							<?php if ($this->countModules( 'right2' )) { ?>
	 							<hr width="138" noshade="noshade" align="left" size="1"/>
								<div id="right_inner_menu2"><jdoc:include type="modules" name="right2" style="xhtml" /></div>
							<?php }?>
							<?php if ($this->countModules( 'right3' )) { ?>
	 							<hr width="138" noshade="noshade" align="left" size="1"/>
								<div id="right_inner_menu2"><jdoc:include type="modules" name="right3" style="xhtml" /></div>
							<?php }?>
							<?php if ($this->countModules( 'right4' )) { ?>
	 							<hr width="138" noshade="noshade" align="left" size="1"/>
								<div id="right_inner_menu3"><jdoc:include type="modules" name="right4" style="xhtml" /></div>
							<?php }?>
					</div>
				</div>
			</div>
<div style="clear:both"></div>
		</div>
		<div id="legals">
			<jdoc:include type="modules" name="legals" style="xhtml" />
		</div>
		
		<div class="ftr" align="center">
			<jdoc:include type="modules" name="footer" style="xhtml" />
		</div>
			<jdoc:include type="modules" name="debug" />

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