<?php defined( '_JEXEC' ) or die( 'Restricted access' );
$isIE = FALSE;
if (isset($_SERVER['HTTP_USER_AGENT'])) {
	$isIE = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'MSIE');
}	

include_once (dirname(__FILE__).'/functions.php');
global $tpl;
$tpl = new Joomla_Template($this);

$app = JFactory::getApplication();
$doc = JFactory::getDocument();

$this->language = $doc->language;
$this->direction = $doc->direction;
// demo.cmsbluetheme.com/evolve
?><!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" xmlns:og="https://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?php //include ('canonical_tag.php'); ?>
<link rel="icon" href="images/evolve.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<base href="https://www.paho.org/hq/" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<?php 


	$mydocument = JFactory::getDocument();
	$mytitle = $mydocument->getTitle();
	$mylanguage = $mydocument->getLanguage();
	$organization = "PAHO WHO";
	if ($mylanguage == "es-es") $organization = "OPS OMS";
	$mytitle_og = $mytitle . " | " . $organization;
	$mytitle = $organization . " | " . $mytitle;
	$mydocument->setTitle($mytitle);
	echo "<title>".$mytitle."</title>";
	if (isset($mydocument->_metaTags['standard']['robots'])) {
		echo '<meta name="robots" content="'.$mydocument->_metaTags['standard']['robots'].'">';
	} 
	
$mydescription = $mydocument->description;
	$lengthdescription = strlen($mydescription);
	if ($lengthdescription < 159) {
	
		if (isset($this->article->text)) $mydescription .= strip_tags ($this->article->text.". ");
		$mydescription = str_replace("&nbsp;", " ", $mydescription);
		$mydescription = str_replace("\r\n", " ", $mydescription);
		$mydescription = str_replace("\t", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
		$mydescription = str_replace("  ", " ", $mydescription);
	}
	$desc = explode(' ', $mydescription);
	$desc = array_slice($desc, 0, 29);
	$mydescription = implode(" ", $desc);
	$mydescription = htmlentities($mydescription, ENT_COMPAT, "UTF-8");
	echo '<meta name="description" content="'.$mydescription.'">';

	$article_id = JRequest::getVar('id');

	$images = new stdClass();
 	$query = "SELECT images as value FROM #__content where id = '".$article_id."'";
	$db = JFactory::getDBO();
	$db->setQuery($query); 
	$rowsimages = $db->loadObject(); 
	$newogtagimages = "";
	$newtwittertagimages = "";
	if ($rowsimages) {
		$imagesarray = json_decode($rowsimages->value);
		$imageintroaux = $imagesarray->image_intro;
		$imageintroaux = str_replace( 'http://www.paho.org', 'https://www2.paho.org', $imageintroaux );
		$images->image_intro=$imagesarray->image_intro;
			// http://php.net/manual/en/function.strpos.php
		if (strpos(" ".$images->image_intro, "http") === false) { $images->image_intro = "http://www.paho.org/hq/". $images->image_intro; }
		$newogtagimages .= "
		<meta property=\"og:image\" content=\"".$images->image_intro."\" />
		<meta property=\"og:image:width\" content=\"300\" />
		<meta property=\"og:image:height\" content=\"300\" />
		<meta property=\"og:image:height3\" content=\"300\" />
		<link rel=\"image_src\" type=\"image/png\" href=\"".$images->image_intro."\" />
		";
		$newtwittertagimages .= "  <meta name=\"twitter:image:src\" content=\"".$images->image_intro."\" />
		";
	} 


//	$mydescription = substr($mydescription,0,159) . "...";
	$mydocument->setMetaData( 'description', $mydescription );
	$newogtag = "
	<meta property=\"og:title\" content=\"".$mytitle_og."\" />
	<meta property=\"og:site_name\" content=\"Pan American Health Organization / World Health Organization\"/>
	<meta property=\"og:type\" content=\"article\" />
	<meta property=\"og:description\" content=\"".$mydocument->description."\" />\n";
	$newtwittertag = "  <meta name=\"twitter:title\" content=\"".$mytitle_og."\"/>\n
  <meta name=\"twitter:description\" content=\"".$mydescription."\" />\n";
	echo $newtwittertag;

	$newogtagimages_default = "
	<meta property=\"og:image\" content=\"https://www.paho.org/hq/images/logo-ops.png\" />
	<meta property=\"og:image:width\" content=\"800\" />
	<meta property=\"og:image:height\" content=\"750\" />
	<meta property=\"og:image\" content=\"https://www.paho.org/hq/images/logo-paho.png\" />
	<meta property=\"og:image:width\" content=\"800\" />
	<meta property=\"og:image:height\" content=\"750\" />
	<link rel=\"image_src\" type=\"image/png\" href=\"https://www.paho.org/hq/images/logo-ops.png\" />
";
	$newtwittertagimages_default = "  <meta name=\"twitter:image:src\" content=\"https://www.paho.org/hq/images/logo-paho.png\" />
";
	echo "\t".'<meta property="fb:app_id" content="1906460059619279">'."\n".
		'<meta property="article:author" content="PAHO/WHO">'."\n".
		'<meta property="article:publisher" content="Pan American Health Organization">';
	if ($newogtagimages != "") {
		$newogtag .= $newogtagimages;
	}	else {
		$newogtag .= $newogtagimages_default;
	}
	$mydocument->addCustomTag( $newogtag );
echo $newogtag;
	if ($newtwittertagimages != "") {
		$newtwittertag .= $newtwittertagimages;
	}	else {
		$newtwittertag .= $newtwittertagimages_default;
	}
	$mydocument->addCustomTag( $newtwittertag );
		// https://findmyfbid.com
		// default app. https://stackoverflow.com/questions/38541027/facebook-share-app-id-missing
	$fbid = "<meta property=\"fb:app_id\" content=\"1906460059619279\">
		<meta property=\"article:author\" content=\"https://www.facebook.com/pahowho\" />
		<meta property=\"author\" content=\"https://www.facebook.com/pahowho\" />
";
	$mydocument->addCustomTag( $fbid ); 
	
?>
	
	
	<link href="test.rss" rel="alternate" type="application/rss+xml" title="RSS 2.0" />
	<link href="atom.rss" rel="alternate" type="application/atom+xml" title="Atom 1.0" />
	<link href="index.php/fr/" rel="alternate" hreflang="fr-FR" />
	<link href="index.php/en/" rel="alternate" hreflang="en-GB" />
	<link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<link href="index.php/en/component/search/?Itemid=206&amp;format=opensearch" rel="search" title="Search Evolve" type="application/opensearchdescription+xml" />
	<link href="components/com_k2/css/k2.css" rel="stylesheet" type="text/css" />
	<link href="media/com_acymailing/css/module_default.css?v=1440113318" rel="stylesheet" type="text/css" />
	<link href="media/com_uniterevolution2/assets/rs-plugin/css/settings.css" rel="stylesheet" type="text/css" />
	<link href="media/com_uniterevolution2/assets/rs-plugin/css/dynamic-captions.css" rel="stylesheet" type="text/css" />
	<link href="media/com_uniterevolution2/assets/rs-plugin/css/static-captions.css" rel="stylesheet" type="text/css" />
	<link href="media/mod_languages/css/template.css?8989604dbce2c3d8ec1449969b251c8d" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



 <link href="templates/evolve-onco/favicon.ico" rel="shortcut icon" type="image/x-icon" />
  <link rel="stylesheet" href="templates/evolve-onco/css/bootstrap.css?v=5" type="text/css" />
  <link rel="stylesheet" href="templates/Responsive/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="templates/Responsive/css/font-awesome.css" type="text/css" />
  <link rel="stylesheet" href="templates/evolve-onco/css/main.css?v=11" type="text/css" />
  <link rel="stylesheet" href="templates/evolve-onco/css/custom.css?v=2" type="text/css" />
  <link rel="stylesheet" href="templates/evolve-onco/css/paho.css?v=2" type="text/css" />
  <link rel="stylesheet" href="templates/evolve-onco/css/impl.css?v=3" type="text/css" />



<?php 
	$mytitle = $doc->getTitle();
	$mylanguage = $doc->getLanguage();
	$description = "PAHO is the specialized international health agency for the Americas.  It works with countries throughout the region to improve and protect people's health. PAHO engages in technical cooperation with its member countries to fight communicable and noncommunicable diseases and their causes, to strengthen health systems, and to respond to emergencies and disasters.";
	$keywords = 'paho, who, public health, Americas, Caribbean, health topics, programs, publications, data, countries, directing';
	if ($mylanguage == "es-es") {
		$description = "La OPS es la organización internacional especializada en salud pública de las Américas. Trabaja cada día con los países de la región para mejorar y proteger la salud de su población. Brinda cooperación técnica en salud a sus países miembros, combate las enfermedades transmisibles y ataca los padecimientos crónicos y sus causas, fortalece los sistemas de salud y da respuesta ante situaciones de emergencia y desastres.";
		$keywords = 'ops, oms, salud publica, Americas, Caribe, temas de salud, programas, publicaciones, datos, paises, directivos';
	
	}
$doc->setMetaData( 'description', $description );
$doc->setMetaData( 'keywords', $keywords );
?>

	<script src="media/system/js/mootools-core.js?8989604dbce2c3d8ec1449969b251c8d" type="text/javascript"></script>
	<script src="media/system/js/language.js?8989604dbce2c3d8ec1449969b251c8d" type="text/javascript"></script>
	<script src="media/system/js/core.js?8989604dbce2c3d8ec1449969b251c8d" type="text/javascript"></script>
	<script src="media/jui/js/jquery.min.js?8989604dbce2c3d8ec1449969b251c8d" type="text/javascript"></script>
	<script src="media/jui/js/jquery-noconflict.js?8989604dbce2c3d8ec1449969b251c8d" type="text/javascript"></script>
	<script src="media/jui/js/jquery-migrate.min.js?8989604dbce2c3d8ec1449969b251c8d" type="text/javascript"></script>
	<script src="components/com_k2/js/k2.js?v2.6.8&amp;sitepath=/evolve-onco/" type="text/javascript"></script>
	<script src="media/system/js/caption.js?8989604dbce2c3d8ec1449969b251c8d" type="text/javascript"></script>
	<script src="media/com_acymailing/js/acymailing_module.js?v=494" type="text/javascript"></script>
	<script src="media/com_uniterevolution2/assets/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
	<script src="media/com_uniterevolution2/assets/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>

	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://www.paho.org/images/icons/ios-ipad-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://www.paho.org/images/icons/ios-iphone-114x114.png" />
	<link rel="apple-touch-icon-precomposed" href="https://www.paho.org/images/icons/ios-default-homescreen-57x57.png" />
	<meta http-equiv="refresh" content="28800">




	<script type="text/javascript">
		jQuery(window).on('load', function () {
				new JCaption('img.caption');
		});
	var acymailing = Array();
				acymailing['NAMECAPTION'] = 'Name';
				acymailing['NAME_MISSING'] = 'Please enter your name';
				acymailing['EMAILCAPTION'] = 'E-mail';
				acymailing['VALID_EMAIL'] = 'Please enter a valid e-mail address';
				acymailing['ACCEPT_TERMS'] = 'Please check the Terms and Conditions';
				acymailing['CAPTCHA_MISSING'] = 'Please enter the security code displayed in the image';
				acymailing['NO_LIST_SELECTED'] = 'Please select the lists you want to subscribe to';
		
	</script>
	<link href="index.php/en/" rel="alternate" hreflang="x-default" />

	
    <link rel="stylesheet" href="templates/evolve-onco/css/base.css">
    <link rel="stylesheet" href="templates/evolve-onco/css/responsive.css">
    <link rel="stylesheet" href="templates/evolve-onco/css/icons.css"> 
    <link rel="stylesheet" href="templates/evolve-onco/css/ss-gizmo.css">
    <link  rel="stylesheet" media="screen" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" /> 
    <link rel="stylesheet" media="screen" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800">
    
    <link rel="stylesheet" href="templates/evolve-onco/css/style.css?v=10">
    <link rel="stylesheet" href="templates/evolve-onco/css/custom-evolve.css">
    <link rel="stylesheet" href="templates/evolve-onco/scripts/rs-plugin/css/settings.css"> 
    <link rel="stylesheet" href="templates/evolve-onco/css/animate.css" /> 
    <link rel="stylesheet" href="templates/evolve-onco/css/camera.css" id='camera-css'>
    <link rel="stylesheet/less" type="text/css" 
        href="templates/evolve-onco/less/color.css">
    <!-- <link rel="stylesheet/less" type="text/css" 
        href="templates/evolve-onco/less/color.php?header_bg_color=ffffff&amp;main_color=d2be82&amp;header_color=666666"> 
	
<link rel="stylesheet" type="text/css" href="templates/evolve-onco/css/switcher.css" >
	<link id="colors" rel="stylesheet" href="templates/evolve-onco/css/colors/blue.css">
    <!--[if lt IE 9]>
		<script src="media/jui/js/html5.js"></script>
	<![endif]-->
    <style type="text/css">
    #logo a img {
        height: 42px !important;
    }
    </style>

</head>

<body itemscope itemtype="https://schema.org/WebPage" class="site com_content  view-featured no-layout no-task itemid-206">
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MDCJXB" title="Google Tag Manager"
style="height:0px;width:0px;display:none;visibility:hidden"><span style="visibility:hidden">Google Tag</span></iframe></noscript>
<script type="text/javascript">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MDCJXB');</script>
<!-- End Google Tag Manager -->

	<!-- Body -->
	<div class="body" escheresque_ste>
			  <header id="header">
				<div class="col-xs-12">
				  <nav class="navbar navbar-default">
					<div class="container-fluid">
					 <div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						  <span class="sr-only">Toggle navigation</span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						</button>
						<div class="top_banner">
							<jdoc:include type="modules" name="banners" style="raw" />
						</div><!-- top_banner -->
						<jdoc:include type="modules" name="language_switcher_mobile" />
					  </div>
					  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  	<div style="text-align:right;box-sizing: content-box;">
						<jdoc:include type="modules" name="user4" />
						<span class="lang-inline"><jdoc:include type="modules" name="language" /></span></div>
						<jdoc:include type="modules" name="share2" style="xhtml" />
						<jdoc:include type="modules" name="header" style="xhtml" />
					  </div>
					</div>
				  </nav>
				</div>
			  </header>
      <gcse:searchresults></gcse:searchresults>				
		<div id="content-wrapper"><jdoc:include type="modules" name="premain-onco"  style="xhtml"/>
		<div class="featured"><!-- Begin Sidebar --><jdoc:include type="modules" name="sidebar-onco"  style="xhtml"/><!-- End Sidebar --></div>
		<div id="user1" >
		<!-- Begin Right Sidebar --><jdoc:include type="modules" name="right-sidebar-onco"  style="xhtml"/><!-- End Right Sidebar -->
		<jdoc:include type="component" />
		<jdoc:include type="modules" name="posmain-onco"  style="xhtml"/>

	</div>


			            



<div style="clear:both"></div>


	</div>

			<footer id="footer">
			  <div class="footer-holder row">
				<div class="col-xs-12">
				<div id="footr_in">
			<div id="honcode">
				<jdoc:include type="modules" name="footer_left" />
			</div><!-- end of #honcode -->
			<div class="ftmenu">
				<jdoc:include type="modules" name="ftmenu1" style="xhtml" />
			</div><!-- end of .ftmenu -->
			<div class="ftmenu">
				<jdoc:include type="modules" name="ftmenu2" style="xhtml" />
			</div><!-- end of .ftmenu -->
			<div class="ftmenu">
				<jdoc:include type="modules" name="ftmenu3" style="xhtml" />
			</div><!-- end of .ftmenu -->
				
				</div><!-- end of #footr_in -->
				</div><!-- end of col-xs-12 -->
			  </div>
			  <div class="holder row hidden-xs">
				<div class="col-xs-12">
			<jdoc:include type="modules" name="site_info" style="raw" />
				</div><!-- end of col-xs-12 -->
			  </div><!-- end of holder row hidden-xs -->
			</footer><!-- end of footer-holder row -->
		<jdoc:include type="modules" name="debug" />
    
	
    <script src="/hq/templates/evolve-onco/js/bootstrap.min.js"></script>
    <script src="/hq/templates/evolve-onco/js/jquery.main.js"></script>
    <script src="templates/evolve-onco/scripts/jquery.min.js"></script>
    <script src="templates/evolve-onco/less/less-1.5.0.min.js"></script>
	<script src="templates/evolve-onco/scripts/jquery.script.js"></script>
    <script src="templates/evolve-onco/scripts/jquery.themepunch.plugins.min.js"></script>
    <script src="templates/evolve-onco/scripts/jquery.themepunch.revolution.min.js"></script>
    <script src="templates/evolve-onco/scripts/jquery.themepunch.showbizpro.min.js"></script>
    <script src="templates/evolve-onco/scripts/appear.js"></script>
    <script src="templates/evolve-onco/scripts/camera.js"></script>
    <script src="templates/evolve-onco/scripts/camera-script.js"></script>
    <script src="templates/evolve-onco/scripts/jquery.easing.min.js"></script> 
    <script src="templates/evolve-onco/scripts/jquery.tooltips.min.js"></script>
    <script src="templates/evolve-onco/scripts/jquery.magnific-popup.min.js"></script>
    <script src="templates/evolve-onco/scripts/jquery.superfish.js"></script>
    <script src="templates/evolve-onco/scripts/jquery.flexslider.js"></script>
    <script src="templates/evolve-onco/scripts/jquery.jpanelmenu.js"></script>
    <script src="templates/evolve-onco/scripts/jquery.zflickrfeed.min.js"></script>
    <script src="templates/evolve-onco/scripts/jquery.contact.js"></script>
    <script src="templates/evolve-onco/scripts/jquery.isotope.min.js"></script>
    <script src="templates/evolve-onco/scripts/jquery.easy-pie-chart.js"></script>
    <script src="templates/evolve-onco/scripts/parallex.js"></script>
    <script src="templates/evolve-onco/scripts/ss-gizmo.js"></script>
    <script src="templates/evolve-onco/scripts/custom.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44374338-1', 'auto', 'clientTracker');
  ga('clientTracker.send', 'pageview');

</script>
</body>
</html>
