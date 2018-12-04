<?php
/*

$JA#COPYRIGHT$

*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

include_once (dirname(__FILE__).DS.'ja_vars_1.5.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">

<head>
<jdoc:include type="head" />
<?php JHTML::_('behavior.mootools'); ?>

<link rel="stylesheet" href="<?php echo $tmpTools->baseurl(); ?>templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->baseurl(); ?>templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/editor.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/typo.css" type="text/css" />

<script type="text/javascript" src="<?php echo $tmpTools->templateurl(); ?>/js/ja.script.js"></script>
<script type="text/javascript" src="http://new.paho.org/hq/media/system/js/language.js"></script>
<!-- Menu head -->
<?php $jamenu->genMenuHead(); ?>

<link href="<?php echo $tmpTools->templateurl(); ?>/css/colors/<?php echo $tmpTools->getParam(JA_TOOL_COLOR); ?>.css" rel="stylesheet" type="text/css" />

<!--[if lte IE 6]>
<style type="text/css">
.clearfix {height: 1%;}
img {border: none;}
</style>
<![endif]-->

<!--[if gte IE 7.0]>
<style type="text/css">
.clearfix {display: inline-block;}
</style>
<![endif]-->

<?php if ($tmpTools->isIE6()) { ?>
<!--[if lte IE 6]>
<script type="text/javascript">
var siteurl = '<?php echo $tmpTools->baseurl();?>';
</script>
<![endif]-->
<?php } ?>

<!--[if gt IE 7]>
<link href="<?php echo $tmpTools->templateurl(); ?>/css/ie8.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>

<body id="bd" class="<?php echo $tmpTools->getParam(JA_TOOL_SCREEN);?> fs<?php echo $tmpTools->getParam(JA_TOOL_FONT);?>" >
<a name="Top" id="Top"></a>
<ul class="accessibility">
	<li><a href="<?php echo $tmpTools->getCurrentURL();?>#ja-content" title="<?php echo JText::_("Skip to content");?>"><?php echo JText::_("Skip to content");?></a></li>
	<li><a href="<?php echo $tmpTools->getCurrentURL();?>#ja-mainnav" title="<?php echo JText::_("Skip to main navigation");?>"><?php echo JText::_("Skip to main navigation");?></a></li>
	<li><a href="<?php echo $tmpTools->getCurrentURL();?>#ja-col1" title="<?php echo JText::_("Skip to 1st column");?>"><?php echo JText::_("Skip to 1st column");?></a></li>
	<li><a href="<?php echo $tmpTools->getCurrentURL();?>#ja-col2" title="<?php echo JText::_("Skip to 2nd column");?>"><?php echo JText::_("Skip to 2nd column");?></a></li>
</ul>

<div id="ja-wrapper">

<!-- BEGIN: HEADER -->
<div id="ja-header" class="clearfix" style="background:url(<?php echo $logo; ?>)">

	<?php 
		$siteName = $tmpTools->sitename(); 
		if ($tmpTools->getParam('logoType')=='image') { ?>
		<h1 class="logo">
			<a href="index.php" title="<?php echo $siteName; ?>"><span><?php echo $siteName; ?></span></a>
		</h1>
	<?php } else { 
		$logoText = (trim($tmpTools->getParam('logoText'))=='') ? $config->sitename : $tmpTools->getParam('logoText');
		$sloganText = (trim($tmpTools->getParam('sloganText'))=='') ? JText::_('SITE SLOGAN') : $tmpTools->getParam('sloganText');	?>
		<h1 class="logo-text">
			<a href="index.php" title="<?php echo $siteName; ?>"><span><?php echo $logoText; ?></span></a>	
		</h1>
		<p class="site-slogan"><?php echo $sloganText;?></p>
	<?php } ?>

	<?php if ($this->countModules('ww_top')) { ?>
	<div id="ja-login">
		<jdoc:include type="modules" name="ww_top" style="raw" />
	</div>
	<?php } ?>
	
</div>
<!-- END: HEADER -->

<!-- BEGIN: MAIN NAVIGATION -->
<div id="ja-mainnavwrap">

	<div id="ja-mainnav">
		<?php $jamenu->genMenu (0); ?>
	</div>

	<?php if ($this->countModules('ww_user4')) { ?>
	<div id="ja-search">
		<jdoc:include type="modules" name="ww_user4" style="raw" />
	</div>
	<?php } ?>

</div>

<?php if ($hasSubnav) { ?>
<div id="ja-subnav" class="clearfix">
	<?php $jamenu->genMenu (1,1); ?>
</div>
<?php } ?>
<!-- END: MAIN NAVIGATION -->

<div id="ja-containerwrap<?php echo $divid; ?>">
<div id="ja-container">
<div id="ja-container2" class="clearfix">

  <div id="ja-mainbody" class="clearfix">

	<!-- BEGIN: CONTENT -->
	<div id="ja-content" class="clearfix">

		<jdoc:include type="message" />
		
		<?php if($this->countModules('ww_topsl')) : ?>		
		<!-- BEGIN: TOPSL -->
		<div id="ja-topsl">
			<jdoc:include type="modules" name="ww_topsl" />
		</div>
		<!-- END: TOPSL -->
		<?php endif; ?>

		<div id="ja-current-content" class="clearfix">

		<?php if ($this->countModules('ww_premain')) { ?>
			<div id="ja-premain" style="float: left">
				<jdoc:include type="modules" name="ww_premain" style="xhtml" />
			</div>
		<?php } ?>

			<jdoc:include type="component" />
	
			<?php if($this->countModules('ww_banner')) : ?>
			<!-- BEGIN: BANNER -->
			<div id="ja-banner">
				<jdoc:include type="modules" name="ww_banner" style="xhtml" />
			</div>
			<!-- END: BANNER -->
			<?php endif; ?>

		</div>

	</div>
	<!-- END: CONTENT -->

  <?php if ($ja_right) { ?>
  <!-- BEGIN: RIGHT COLUMN -->
	<div id="ja-col2<?php if (!$ja_topsl) { echo 'r'; } ?>">
		<jdoc:include type="modules" name="ww_right" style="xhtml" />
	</div><br />
	<!-- END: RIGHT COLUMN -->
	<?php } ?>
		
	</div>
		
	<?php if ($ja_left) { ?>
	<!-- BEGIN: LEFT COLUMN -->
	<div id="ja-col1">
		<jdoc:include type="modules" name="ww_left" style="xhtml" />
	</div>
	<!-- END: LEFT COLUMN -->
	<?php } ?>

</div></div></div>

<!-- BEGIN: PATHWAY -->
<div id="ja-pathway">
	<strong><?php echo JText::_('YOU ARE HERE:');?> </strong><jdoc:include type="module" name="breadcrumbs" />
</div>
<!-- END: PATHWAY -->

<?php
$spotlight = array ('user1','user2','user5','user6','user7','user8');
$botsl = $tmpTools->calSpotlight ($spotlight,$tmpTools->isOP()?100:99.9);
if( $botsl ) {
?>
<!-- BEGIN: BOTTOM SPOTLIGHT -->
<div id="ja-botsl" class="clearfix">

  <?php if( $this->countModules('ww_user1') ) {?>
  <div class="ja-box<?php echo $botsl['user1']['class']; ?>" style="width: <?php echo $botsl['user1']['width']; ?>;">
		<jdoc:include type="modules" name="ww_user1" style="xhtml" />
  </div>
  <?php } ?>

  <?php if( $this->countModules('ww_user2') ) {?>
  <div class="ja-box<?php echo $botsl['user2']['class']; ?>" style="width: <?php echo $botsl['user2']['width']; ?>;">
		<jdoc:include type="modules" name="ww_user2" style="xhtml" />
  </div>
  <?php } ?>

  <?php if( $this->countModules('ww_user5') ) {?>
  <div class="ja-box<?php echo $botsl['user5']['class']; ?>" style="width: <?php echo $botsl['user5']['width']; ?>;">
		<jdoc:include type="modules" name="ww_user5" style="xhtml" />
  </div>
  <?php } ?>
  
  <?php if( $this->countModules('ww_user6') ) {?>
  <div class="ja-box<?php echo $botsl['user6']['class']; ?>" style="width: <?php echo $botsl['user6']['width']; ?>;">
		<jdoc:include type="modules" name="ww_user6" style="xhtml" />
  </div>
  <?php } ?>
  
  <?php if( $this->countModules('ww_user7') ) {?>
  <div class="ja-box<?php echo $botsl['user7']['class']; ?>" style="width: <?php echo $botsl['user7']['width']; ?>;">
		<jdoc:include type="modules" name="ww_user7" style="xhtml" />
  </div>
  <?php } ?>
  
  <?php if( $this->countModules('ww_user8') ) {?>
  <div class="ja-box<?php echo $botsl['user8']['class']; ?>" style="width: <?php echo $botsl['user8']['width']; ?>;">
		<jdoc:include type="modules" name="ww_user8" style="xhtml" />
  </div>
  <?php } ?>

</div>
<!-- END: BOTTOM SPOTLIGHT -->
<?php } ?>

<!-- BEGIN: FOOTER -->
<div id="ja-footer" class="clearfix">

	<jdoc:include type="modules" name="ww_user3" />
	<jdoc:include type="modules" name="footer" />

</div>
<!-- END: FOOTER -->

</div>

<jdoc:include type="modules" name="ww_debug" />
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