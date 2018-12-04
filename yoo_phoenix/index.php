<?php

/**

* @package   yoo_phoenix Template

* @file      index.php

* @version   1.5.21 January 2010

* @author    YOOtheme http://www.yootheme.com

* @copyright Copyright (C) 2007 - 2010 YOOtheme GmbH

*/



// no direct access

defined('_JEXEC') or die('Restricted access');



JHTML::_('behavior.mootools');



// include config	

include_once(dirname(__FILE__).'/config.php');

	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >

<head>

<jdoc:include type="head" />

<link rel="apple-touch-icon" href="<?php echo $template->url ?>/apple_touch_icon.png" />

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-6099557-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>



<body id="page" class="yoopage <?php echo $this->params->get('columns'); ?> <?php echo $this->params->get('itemcolor'); ?> <?php echo $this->params->get('toolscolor'); ?>">



	<?php if($this->countModules('absolute')) : ?>

	<div id="absolute">

		<jdoc:include type="yoomodules" name="absolute" />

	</div>

	<?php endif; ?>



	<div id="page-body">

		<div class="wrapper">

			<div class="wrapper-bg1">

				<div class="wrapper-bg2">



					<div id="header">

		

						<div id="toolbar">

						

							<?php if($this->params->get('date')) : ?>

							<div id="date">

								<?php echo JHTML::_('date', 'now', JText::_('DATE_FORMAT_LC')) ?>

							</div>

							<?php endif; ?>

						

							<?php if($this->countModules('toolbarleft')) : ?>

							<div class="left">

								<jdoc:include type="yoomodules" name="toolbarleft" style="yoo" />

							</div>

							<?php endif; ?>

							

							<?php if($this->countModules('toolbarright')) : ?>

							<div class="right">

								<jdoc:include type="yoomodules" name="toolbarright" style="yoo" />

							</div>

							<?php endif; ?>

							

						</div>

						

						<div id="headerbar">

						

							<?php if($this->countModules('headerleft')) : ?>

							<div class="left">

								<jdoc:include type="yoomodules" name="headerleft" style="yoo" />

							</div>

							<?php endif; ?>

							

							<?php if($this->countModules('headerright')) : ?>

							<div class="right">

								<jdoc:include type="yoomodules" name="headerright" style="yoo" />

							</div>

							<?php endif; ?>

							

						</div>

		

						<div id="menubar">

							<div class="menubar-2">

								<div class="menubar-3"></div>

							</div>

						</div>

		

						<?php if($this->countModules('logo')) : ?>		

						<div id="logo">

							<jdoc:include type="yoomodules" name="logo" />

						</div>

						<?php endif; ?>

		

						<?php if($this->countModules('menu')) : ?>

						<div id="menu">

							<jdoc:include type="yoomodules" name="menu" style="yoo" />

						</div>  

						<?php endif; ?>

		

						<?php if($this->countModules('search')) : ?>

						<div id="search">

							<jdoc:include type="yoomodules" name="search" />

						</div>

						<?php endif; ?>

			

						<?php if ($this->countModules('banner')) : ?>

						<div id="banner">

							<jdoc:include type="yoomodules" name="banner-old" />

						</div>

						<?php endif; ?>

		

					</div>

					<!-- header end -->

		

					<?php if ($this->countModules('top + topblock')) : ?>

					<div id="top">

				

						<?php if($this->countModules('topblock')) : ?>

						<div class="topblock width100 float-left">

							<jdoc:include type="yoomodules" name="topblock" style="yoo" />

						</div>

						<?php endif; ?>

			

						<?php if ($this->countModules('top')) : ?>

							<jdoc:include type="yoomodules" name="top" wrapper="topbox float-left" layout="<?php echo $this->params->get('top'); ?>" style="yoo" />

						<?php endif; ?>

												

					</div>

					<!-- top end -->

					<?php endif; ?>

		

					<div id="middle">

						<div id="middle-expand">

						

							<div id="main">

								<div id="main-shift">

								

									<?php if ($this->countModules('maintop')) : ?>

									<div id="maintop">

										<jdoc:include type="yoomodules" name="maintop" wrapper="maintopbox float-left" layout="<?php echo $this->params->get('maintop'); ?>" style="yoo" />									

									</div>

									<!-- maintop end -->

									<?php endif; ?>

		

									<div class="mainmiddle-wrapper-tl">

										<div class="mainmiddle-wrapper-tr">

											<div class="mainmiddle-wrapper-t">

												<div class="contentleft-bg">

													<div class="contentright-bg"></div>

												</div>

											</div>

										</div>

									</div>

		

									<div class="mainmiddle-wrapper-m">

										<div class="contentleft-bg">

											<div class="contentright-bg">

				

												<div id="mainmiddle">

													<div id="mainmiddle-expand">

													

														<div id="content">

															<div id="content-shift">

															

																<?php if ($this->countModules('contenttop')) : ?>

																<div id="contenttop">

																	<jdoc:include type="yoomodules" name="contenttop" wrapper="contenttopbox float-left" layout="<?php echo $this->params->get('contenttop'); ?>" style="yoo" />

																</div>

																<!-- contenttop end -->

																<?php endif; ?>

									

																<?php if ($this->countModules('breadcrumbs')) : ?>

																<div id="breadcrumbs">

																	<jdoc:include type="yoomodules" name="breadcrumbs" />

																</div>

																<?php endif; ?>

									

																<div class="floatbox">

																	<jdoc:include type="message" />

																	<jdoc:include type="component" />

																</div>

									

																<?php if ($this->countModules('contentbottom')) : ?>

																<div id="contentbottom">

																	<jdoc:include type="yoomodules" name="contentbottom" wrapper="contentbottombox float-left" layout="<?php echo $this->params->get('contentbottom'); ?>" style="yoo" />

																</div>

																<!-- mainbottom end -->

																<?php endif; ?>

															

															</div>

														</div>

														<!-- content end -->

														

														<?php if($this->countModules('contentleft')) : ?>

														<div id="contentleft">

															<jdoc:include type="yoomodules" name="contentleft" style="yoo" />

														</div>

														<?php endif; ?>

														

														<?php if($this->countModules('contentright')) : ?>

														<div id="contentright">

															<jdoc:include type="yoomodules" name="contentright" style="yoo" />

														</div>

														<?php endif; ?>

														

													</div>

												</div>

												<!-- mainmiddle end -->

				

											</div>

										</div>

									</div>

		

									<div class="mainmiddle-wrapper-bl">

										<div class="mainmiddle-wrapper-br">

											<div class="mainmiddle-wrapper-b">

												<div class="contentleft-bg">

													<div class="contentright-bg"></div>

												</div>

											</div>

										</div>

									</div>

		

									<?php if ($this->countModules('mainbottom')) : ?>

									<div id="mainbottom">

										<jdoc:include type="yoomodules" name="mainbottom" wrapper="mainbottombox float-left" layout="<?php echo $this->params->get('mainbottom'); ?>" style="yoo" />

									</div>

									<!-- mainbottom end -->

									<?php endif; ?>

								

								</div>

							</div>

							

							<?php if($this->countModules('left')) : ?>

							<div id="left">

								<jdoc:include type="yoomodules" name="left" style="yoo" />

							</div>

							<?php endif; ?>

							

							<?php if($this->countModules('right')) : ?>

							<div id="right">

								<jdoc:include type="yoomodules" name="right" style="yoo" />

							</div>

							<?php endif; ?>

							

						</div>

					</div>

		

					<?php if ($this->countModules('bottom + bottomblock')) : ?>

					<div id="bottom">

							

						<?php if ($this->countModules('bottom')) : ?>

							<jdoc:include type="yoomodules" name="bottom" wrapper="bottombox float-left" layout="<?php echo $this->params->get('bottom'); ?>" style="yoo" />

						<?php endif; ?>

						

						<?php if($this->countModules('bottomblock')) : ?>

						<div class="bottomblock width100 float-left">

							<jdoc:include type="yoomodules" name="bottomblock" style="yoo" />

						</div>

						<?php endif; ?>

									

					</div>

					<!-- bottom end -->

					<?php endif; ?>

		

					<div id="footer">

						<a class="anchor" href="#page"></a>

						<jdoc:include type="yoomodules" name="footer" />

						<jdoc:include type="yoomodules" name="debug" />

					</div>

					<!-- footer end -->



				</div>

			</div>

		</div>

	</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44374338-1', 'paho.org');
  ga('send', 'pageview');

</script>

</body>

</html>