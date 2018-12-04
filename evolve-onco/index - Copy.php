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

?><!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns="https://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?php include ('canonical_tag.php'); ?>
<link rel="icon" href="images/evolve.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<base href="http://www.paho.org/hq/" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow">
	<meta name="generator" content="Joomla! - Open Source Content Management" />
	<title>Oncocercósis: el Último foco | OPS/OMS</title>
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




 <link href="templates/evolve/favicon.ico" rel="shortcut icon" type="image/x-icon" />
  <link rel="stylesheet" href="templates/evolve/css/bootstrap.css?v=5" type="text/css" />
  <link rel="stylesheet" href="templates/evolve/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="templates/evolve/css/font-awesome.css" type="text/css" />
  <link rel="stylesheet" href="templates/evolve/css/main.css?v=8" type="text/css" />
  <link rel="stylesheet" href="templates/evolve/css/custom.css?v=2" type="text/css" />
  <link rel="stylesheet" href="templates/evolve/css/paho.css?v=2" type="text/css" />
  <link rel="stylesheet" href="templates/evolve/css/impl.css?v=3" type="text/css" />



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
	<script src="/media/system/js/language.js?8989604dbce2c3d8ec1449969b251c8d" type="text/javascript"></script>
	<script src="media/system/js/core.js?8989604dbce2c3d8ec1449969b251c8d" type="text/javascript"></script>
	<script src="media/jui/js/jquery.min.js?8989604dbce2c3d8ec1449969b251c8d" type="text/javascript"></script>
	<script src="media/jui/js/jquery-noconflict.js?8989604dbce2c3d8ec1449969b251c8d" type="text/javascript"></script>
	<script src="media/jui/js/jquery-migrate.min.js?8989604dbce2c3d8ec1449969b251c8d" type="text/javascript"></script>
	<script src="components/com_k2/js/k2.js?v2.6.8&amp;sitepath=/evolve/" type="text/javascript"></script>
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

	
    <link rel="stylesheet" href="templates/evolve/css/base.css">
    <link rel="stylesheet" href="templates/evolve/css/responsive.css">
    <link rel="stylesheet" href="templates/evolve/css/icons.css"> 
    <link rel="stylesheet" href="templates/evolve/css/ss-gizmo.css">
    <link  rel="stylesheet" media="screen" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" /> 
    <link rel="stylesheet" media="screen" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800">
    
    <link rel="stylesheet" href="templates/evolve/css/style.css?v=10">
    <link rel="stylesheet" href="templates/evolve/css/custom-evolve.css">
    <link rel="stylesheet" href="templates/evolve/scripts/rs-plugin/css/settings.css"> 
    <link rel="stylesheet" href="templates/evolve/css/animate.css" /> 
    <link rel="stylesheet" href="templates/evolve/css/camera.css" id='camera-css'>
    <link rel="stylesheet/less" type="text/css" 
        href="templates/evolve/less/color.css">
    <!-- <link rel="stylesheet/less" type="text/css" 
        href="templates/evolve/less/color.php?header_bg_color=ffffff&amp;main_color=d2be82&amp;header_color=666666"> 
	
<link rel="stylesheet" type="text/css" href="templates/evolve/css/switcher.css" >
	<link id="colors" rel="stylesheet" href="templates/evolve/css/colors/blue.css">
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
						<jdoc:include type="modules" name="language_switcher_mobile0" />
					  </div>
					  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  	<div style="text-align:right;box-sizing: content-box;">
						<jdoc:include type="modules" name="user4" />
						<span class="lang-inline"><jdoc:include type="modules" name="language0" /></span></div>
						<jdoc:include type="modules" name="share2" style="xhtml" />
						<jdoc:include type="modules" name="header" style="xhtml" />
					  </div>
					</div>
				  </nav>
				</div>
			  </header>
		<div id="content-wrapper"><jdoc:include type="modules" name="premain-onco"  style="xhtml"/>
		<div class="featured">
			<!-- Begin Sidebar -->
			<jdoc:include type="modules" name="sidebar-onco"  style="xhtml"/>
			<!-- End Sidebar -->
		</div>
<jdoc:include type="component" />
		
		

<div class="moduletable">
   <div class="custom"  >
      <div class="bg-tagline">
         <div class="container">
            <div class="twelve columns">
               <h1 style="color: white">ONCOCERCOSIS: EL ÚLTIMO FOCO</h1>
            </div>
         </div>
      </div>
   </div>
</div><div class="featured">
										<!-- Begin Sidebar -->
									<div class="moduletable">
						<!-- START REVOLUTION SLIDER 4.6.8 fullwidth mode -->

<div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:500px;">
	<div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:500px;height:500px;">
<ul>	<!-- SLIDE  1-->
	<li data-transition="fade" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
		<!-- MAIN IMAGE -->
		<img src="images/stories/oncocercosis/rev/bg-slider-01.jpg"  alt="bg-slider-01"  data-bgposition="left top" data-bgfit="cover" data-bgrepeat="no-repeat">
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption tp-fade skewtoleft"
			data-x="700"
			data-y="50" 
			data-speed="300"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="300"
			data-endeasing="Power4.easeIn"

			style="z-index: 5;"><img src="images/stories/oncocercosis/rev/slider01-img01.png" alt="">
		</div>

		<!-- LAYER NR. 2 -->
		<div class="tp-caption sfl ltr tp-resizeme  medium_text ucase"
			data-x="0"
			data-y="220" 
			data-speed="800"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="500"
			data-endeasing="Power4.easeOut"

			style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">La oncocercosis se puede eliminar de las Américas. <br/>
Dos países con riesgo de infección (Brasil y Venezuela). 
		</div>

		<!-- LAYER NR. 3 -->
		<div class="tp-caption sft skewtorightshort tp-resizeme  small_text"
			data-x="0"
			data-y="280" 
			data-speed="1300"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="600"
			data-endeasing="Power3.easeInOut"

			style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">20.495 personas requieren aún tratamiento masivo periódico<br>Podrían ser efectos o numero de casos o llamados a la acción sobre el tema específico. 
		</div>

		<!-- LAYER NR. 4 -->
		<div class="tp-caption sft skewtoright tp-resizeme  text skewfromrightshort"
			data-x="0"
			data-y="340" 
			data-speed="1500"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="400"
			data-endeasing="Power4.easeOut"

			style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><a href='#' class='button line-white'>Leer más</a> 
		</div>
	</li>
	<!-- SLIDE  2-->
	<!-- http://dante.swiftideas.net/documentation/gizmo/ -->
	<li data-transition="fade" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
		<!-- MAIN IMAGE -->
		<img src="images/stories/oncocercosis/rev/bg-slider-02.jpg"  alt="bg-slider-02"  data-bgposition="left top" data-bgfit="cover" data-bgrepeat="no-repeat">
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption sfl tp-resizeme"
			data-x="100"
			data-y="280" 
			data-speed="500"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="300"

			style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;"><i class='ss-ban'><span>Prevenible</span></i> 
		</div>

		<!-- LAYER NR. 2 -->
		<div class="tp-caption sfl tp-resizeme"
			data-x="300"
			data-y="280" 
			data-speed="900"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="300"

			style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;"><i class='ss-heart'><span>No mortal</span></i> 
		</div>

		<!-- LAYER NR. 3 -->
		<div class="tp-caption sfl tp-resizeme"
			data-x="500"
			data-y="280" 
			data-speed="1300"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="300"

			style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;"><i class='ss-medicalcross'><span>Curable</span></i> 
		</div>

		<!-- LAYER NR. 4 -->
		<div class="tp-caption sfl tp-resizeme"
			data-x="700"
			data-y="280" 
			data-speed="1500"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="300"

			style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><i class='ss-wheelchair'><span>Incapacitante</span></i> 
		</div>

		<!-- LAYER NR. 5 -->
		<div class="tp-caption sfl tp-resizeme"
			data-x="900"
			data-y="280" 
			data-speed="1900"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="300"

			style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"><i class='ss-downright'><span>En erradicación</span></i> 
		</div>

		<!-- LAYER NR. 6 -->
		<div class="tp-caption sft tp-resizeme  large_bold_white"
			data-x="280"
			data-y="90" 
			data-speed="2000"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="300"

			style="z-index: 10; max-width: auto; max-height: auto; white-space: nowrap;">ONCOCERCOSIS EN LAS AMÉRICAS
		</div>

		<!-- LAYER NR. 7 -->
		<div class="tp-caption sft tp-resizeme  small_light_white"
			data-x="440"
			data-y="140" 
			data-speed="2300"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="300"

			style="z-index: 11; max-width: auto; max-height: auto; white-space: nowrap;">Enfermedades descuidadas
		</div>
	</li>
	<!-- SLIDE  3-->
	<li data-transition="fade" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
		<!-- MAIN IMAGE -->
		<img src="images/stories/oncocercosis/rev/bg-slider-03.jpg"  alt="bg-slider-03"  data-bgposition="left top" data-bgfit="cover" data-bgrepeat="no-repeat">
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption sft tp-resizeme  small_light_white"
			data-x="530"
			data-y="150" 
			data-speed="500"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="400"

			style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">Indígenas Yanomami
		</div>

		<!-- LAYER NR. 2 -->
		<div class="tp-caption sft tp-resizeme  large_bolder_white"
			data-x="480"
			data-y="190" 
			data-speed="700"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="400"

			style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">HISTORIAS
		</div>

		<!-- LAYER NR. 3 -->
		<div class="tp-caption skewfromleft tp-resizeme  mediumlarge_light_white"
			data-x="470"
			data-y="290" 
			data-speed="900"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="400"

			style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">La maldición del XAWARA
		</div>

		<!-- LAYER NR. 4 -->
		<div class="tp-caption skewfromrightshort tp-resizeme  text"
			data-x="600"
			data-y="350" 
			data-speed="1200"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="400"

			style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;"><a href='#' class='button line-white'>Leer más</a> 
		</div>
	</li>
	<!-- SLIDE  4-->
	<li data-transition="fade" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
		<!-- MAIN IMAGE -->
		<img src="images/stories/oncocercosis/rev/bg-slider-04.jpg"  alt="bg-slider-04"  data-bgposition="left top" data-bgfit="cover" data-bgrepeat="no-repeat">
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption sfb"
			data-x="375"
			data-y="150" 
			data-speed="400"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="300"

			style="z-index: 5;"><img src="images/stories/oncocercosis/rev/slider04-img01.png" alt="">
		</div>

		<!-- LAYER NR. 2 -->
		<div class="tp-caption sfl"
			data-x="180"
			data-y="240" 
			data-speed="700"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="300"

			style="z-index: 6;"><img src="images/stories/oncocercosis/rev/slider04-img02.png" alt="">
		</div>

		<!-- LAYER NR. 3 -->
		<div class="tp-caption sfr"
			data-x="805"
			data-y="285" 
			data-speed="900"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="300"

			style="z-index: 7;"><img src="images/stories/oncocercosis/rev/slider04-img03.png" alt="">
		</div>

		<!-- LAYER NR. 4 -->
		<div class="tp-caption sft tp-resizeme  small_light_white"
			data-x="500"
			data-y="60" 
			data-speed="1300"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="300"

			style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">Guías, afiches, manuales, buenas prácticas
		</div>

		<!-- LAYER NR. 5 -->
		<div class="tp-caption sft tp-resizeme  large_bold_white"
			data-x="280"
			data-y="90" 
			data-speed="1400"
			data-start="500"
			data-easing="Power3.easeInOut"
			data-splitin="none"
			data-splitout="none"
			data-elementdelay="0.1"
			data-endelementdelay="0.1"
			 data-endspeed="300"

			style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">MATERIALES DE COMUNICACION
		</div>
	</li>
</ul>
<div class="tp-bannertimer"></div>	</div>
			
			<script type="text/javascript">

					
				/******************************************
					-	PREPARE PLACEHOLDER FOR SLIDER	-
				******************************************/
								
				 
						var setREVStartSize = function() {
							var	tpopt = new Object(); 
								tpopt.startwidth = 1170;
								tpopt.startheight = 500;
								tpopt.container = jQuery('#rev_slider_1_1');
								tpopt.fullScreen = "off";
								tpopt.forceFullWidth="off";

							tpopt.container.closest(".rev_slider_wrapper").css({height:tpopt.container.height()});tpopt.width=parseInt(tpopt.container.width(),0);tpopt.height=parseInt(tpopt.container.height(),0);tpopt.bw=tpopt.width/tpopt.startwidth;tpopt.bh=tpopt.height/tpopt.startheight;if(tpopt.bh>tpopt.bw)tpopt.bh=tpopt.bw;if(tpopt.bh<tpopt.bw)tpopt.bw=tpopt.bh;if(tpopt.bw<tpopt.bh)tpopt.bh=tpopt.bw;if(tpopt.bh>1){tpopt.bw=1;tpopt.bh=1}if(tpopt.bw>1){tpopt.bw=1;tpopt.bh=1}tpopt.height=Math.round(tpopt.startheight*(tpopt.width/tpopt.startwidth));if(tpopt.height>tpopt.startheight&&tpopt.autoHeight!="on")tpopt.height=tpopt.startheight;if(tpopt.fullScreen=="on"){tpopt.height=tpopt.bw*tpopt.startheight;var cow=tpopt.container.parent().width();var coh=jQuery(window).height();if(tpopt.fullScreenOffsetContainer!=undefined){try{var offcontainers=tpopt.fullScreenOffsetContainer.split(",");jQuery.each(offcontainers,function(e,t){coh=coh-jQuery(t).outerHeight(true);if(coh<tpopt.minFullScreenHeight)coh=tpopt.minFullScreenHeight})}catch(e){}}tpopt.container.parent().height(coh);tpopt.container.height(coh);tpopt.container.closest(".rev_slider_wrapper").height(coh);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);tpopt.container.css({height:"100%"});tpopt.height=coh;}else{tpopt.container.height(tpopt.height);tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);}
						};
						
						/* CALL PLACEHOLDER */
						setREVStartSize();
								
				
				var tpj=jQuery;				
				tpj.noConflict();				
				var revapi1;
				
				
				
				tpj(document).ready(function() {
				
					
								
				if(tpj('#rev_slider_1_1').revolution == undefined){
					revslider_showDoubleJqueryError('#rev_slider_1_1');
				}else{
				   revapi1 = tpj('#rev_slider_1_1').show().revolution(
					{
											
						dottedOverlay:"none",
						delay:9000,
						startwidth:1170,
						startheight:500,
						hideThumbs:200,
						
						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:4,
													
						simplifyAll:"off",						
						navigationType:"bullet",
						navigationArrows:"solo",
						navigationStyle:"round",						
						touchenabled:"on",
						onHoverStop:"on",						
						nextSlideOnWindowFocus:"off",
						
						swipe_threshold: 75,
						swipe_min_touches: 1,
						drag_block_vertical: false,
																		
																		
						keyboardNavigation:"off",
						
						navigationHAlign:"center",
						navigationVAlign:"bottom",
						navigationHOffset:0,
						navigationVOffset:20,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,
								
						shadow:0,
						fullWidth:"on",
						fullScreen:"off",

												spinner:"spinner0",
																		
						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,

						shuffle:"off",
						
						autoHeight:"off",						
						forceFullWidth:"off",						
												
												
												
						hideThumbsOnMobile:"off",
						hideNavDelayOnMobile:1500,
						hideBulletsOnMobile:"off",
						hideArrowsOnMobile:"off",
						hideThumbsUnderResolution:0,
						
												hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						startWithSlide:0,
						isJoomla: true
					});
					
					
					
									}					
				});	/*ready*/
									
			</script>
			</div>
<!-- END REVOLUTION SLIDER -->			</div>
	
					<!-- End Sidebar -->
									</div>
                								<div id="user1" >
					<!-- Begin Right Sidebar -->
<div class="moduletable">
   <div class="custom"  >
      <div class="bg-tagline">
         <div class="container">
            <div class="twelve columns">
               <h3>Búsqueda de información científica en la Biblioteca Virtual de Salud</h3>
               <p>BIREME. Artículos científicos sobre Oncocercosis.</p>
            </div>
            <div class="four columns centered"><a class="button line-color" target="_blank" href="http://pesquisa.bvsalud.org/portal/?output=site&lang=en&from=0&sort=&format=summary&count=20&fb=&page=1&q=%28mj%3AOncocercose+or+mj%3A%22Oncocercose+Ocular%22+or+mj%3AOnchocerca%29+or+%28ti%3AOncocercose+or+ti%3AOncocercosis+or+ti%3AOnchocerciasis+or+ti%3AOnchocerca%29&index=tw&search_form_submit=Search">Buscar</a></div>
         </div>
      </div>
   </div>
</div>
<div class="moduletable">
   <div class="custom"  >
                       <div class="sixteen columns main-headline">
                            <h3>Cifras de la Oncocercosis en las Américas </h3>
                            <p>Fuente: Programa de Datos y Estadísticas OPS. 2016</p>
                       </div>

      <div class="parallex"  style="">
         <div class="container" style="padding-left:50px;">
            <hr class="sep20">
            <div class="three columns" data-animated="bounceInUp">
               <div class="stats ">
                  <div class="num" data-content="11" data-num="1"></div>
                  <div class="type">FOCOS ELIMINADOS EN LAS AMERICAS</div>
               </div>
            </div>
            <div class="three columns" data-animated="bounceInUp">
               <div class="stats ">
                  <div class="num" data-content="2" data-num="1"></div>
                  <div class="type">PAISES DE AMERICA CON RIESGO</div>
               </div>
            </div>
            <div class="three columns" data-animated="bounceInUp">
               <div class="stats ">
                  <div class="num" data-content="22046" data-num="800"></div>
                  <div class="type">PERSONAS CON QUIMIOTERAPIA PREVENTIVA EN AMERICA</div>
               </div>
            </div>
            <div class="three columns" data-animated="bounceInUp">
               <div class="stats ">
                  <div class="num" data-content="18M" data-num="500"></div>
                  <div class="type">PERSONAS INFECTADAS EN EL MUNDO</div>
               </div>
            </div>
            <div class="three columns" data-animated="bounceInUp">
               <div class="stats last">
                  <div class="num" data-content="270000" data-num="700"></div>
                  <div class="type">PERSONAS HAN PERDIDO LA VISTA A NIVEL MUNDIAL</div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="moduletable col-xs-12">
<div style="width:100%; background-color: #bad8cf">
<img src="images/stories/oncocercosis/mapa1.jpg" style="margin-left: auto; margin-right: auto; width: 100%; max-width: 452px;">
</div
</div>




<div class="moduletable">
   <div class="sixteen columns main-headline">
      <h3>Logros en las americas</h3>
      <p>Do eiusmod tempor incididunt ut labore dolore.</p>
   </div>
   <div style="background-color: #eee;">
      <div class="col-xs-4" style="padding:30px;float: left;">
         <h4><a href="https://www.paho.org/hq/index.php?option=com_content&view=article&id=12520&Itemid=135&lang=es">Guatemala es el cuarto país del mundo en eliminar la oncocercosis</a></h4>
         <p><strong>Washington, DC, 26 de septiembre de 2016 (OPS/OMS)</strong>-Tras al menos 20 años de esfuerzos, Guatemala se convirtió en el cuarto país en las Américas y en el mundo en ser declarado libre de oncocercosis (ceguera de los ríos), una enfermedad que puede causar ceguera y discapacidad, y afecta principalmente a personas en situación de pobreza.</p>
      </div>
      <div class="col-xs-4" style="padding:30px;float: left;">
         <h4><a href="https://www.paho.org/hq/index.php?option=com_content&view=article&id=10031&Itemid=1926&lang=es">La OPS/OMS y el Centro Carter felicitan a Ecuador por lograr la eliminación de la oncocercosis</a></h4>
         <p><strong>Washington, D.C., 29 de septiembre de 2014 (OPS/OMS)</strong>-La Organización Panamericana de la Salud (OPS/OMS) y el Centro Carter felicitan al presidente de Ecuador, Rafael Correa, y a su población, por ser el segundo país del mundo en alcanzar la eliminación de la oncocercosis (ceguera de los ríos), verificada por la Organización Mundial de la Salud (OMS). La ministra de Salud de Ecuador, Carina Vance, hizo este anuncio durante la sesión de apertura del 53o Consejo Directivo de la OPS en Washington, D.C.</p>
      </div>
      <div class="col-xs-4" style="padding:30px;float: left;">
         <h4><a href="https://www.paho.org/hq/index.php?option=com_content&view=article&id=6199&Itemid=1926&lang=es">Colombia, el primer país de las Américas que elimina la oncocercosis</a></h4>
         <p><strong>Bogotá, Colombia, 16 de noviembre del 2011 (OPS/OMS)</strong>-Colombia se ha convertido en el primer país del continente americano que logra eliminar la oncocercosis (también conocida como ceguera de los ríos) dentro de sus fronteras, según lo anunciado por las autoridades sanitarias colombianas en la XXI Conferencia Interamericana sobre Oncocercosis, celebrada en Bogotá la semana pasada.</p>
      </div>
   </div>
</div>
<div style="clear:both;"></div>


<div class="container2b row">
   <div class="video-block row">
      <div class="col-xs-12">
         <div class="block col-sm-18 col-md-12">
            <div class="ytWrapperFP">
               <iframe src="https://www.youtube.com/embed/tfqXH4M-hXE" width="680" height="307" allowfullscreen="allowfullscreen" seamless="seamless"></iframe><a class="play" href="#" data-toggle="modal" data-target="#myModal">Play</a>
               <p style="font-size: 1.1em; font-weight: bold; font-stretch: semi-expanded; color: #000; text-shadow: 2px 2px 3px #808080;">Oncocercosis: Último foco</p>
            </div>
            <div id="myModal" class="modal fade" role="dialog">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <button class="close" type="button" data-dismiss="modal"><span>×</span> </button>
                     <div class="modal-body">
                        <div class="embed-responsive">
                           <iframe src="https://www.youtube.com/embed/tfqXH4M-hXE" width="560" height="315" allowfullscreen="allowfullscreen" seamless="seamless" class="embed-responsive-item"></iframe>
                           <!-- https://www.youtube.com/watch?v=XdCyAGavn70 -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<div class="moduletable">
   <div class="custom"  >
      <div class="container" id="service1">
         <div class="featured-boxes homepage">
            <div class=" one-third column " data-animated="bounceIn">
               <!-- Featured Box -->
               <div class="featured-box">
                  <div class="circle-1">
                     <i style="" class="icon icon-ss-layers ss-view " ></i>
                  </div>
                  <div class="featured-desc">
                     <h3>Hoja Informativa</h3>
                     <p>La oncocercosis, conocida como "ceguera de los ríos", es una enfermedad parasitaria causada por la Onchocerca volvulus, que es transmitida a los humanos por las moscas negras.</p>
                     <a class="button line-color" href="https://www.paho.org/hq/index.php?option=com_content&view=article&id=9473%3Aonchocerciasis&catid=6648%3Afact-sheets&Itemid=40721&lang=es">Leer más</a>
                  </div>
               </div>
            </div>
            <div class=" one-third column " data-animated="bounceIn">
               <!-- Featured Box -->
               <div class="featured-box">
                  <div class="circle-1">
                     <i style="" class="icon icon-code ss-bookmark " ></i>
                  </div>
                  <div class="featured-desc">
                     <h3>Recursos sobre la enfermedad</h3>
                     <p>Tema de salud: Recopilación de los contenidos disponibles sobre la enfermedad.</p>
                     <a class="button line-color" href="https://www.paho.org/hq/index.php?option=com_topics&view=article&id=39&Itemid=40762&lang=es">Leer más</a>
                  </div>
               </div>
            </div>
            <div class=" one-third column " data-animated="bounceIn">
               <!-- Featured Box -->
               <div class="featured-box">
                  <div class="circle-1">
                     <i style="" class="icon icon-ss-loading ss-star " ></i>
                  </div>
                  <div class="featured-desc">
                     <h3>Colombia: el primer país del mundo que eliminó la Oncocercosis</h3>
                     <p>Colombia se enorgullece de ser el primer país en recibir la verificación de la eliminación de la oncocercosis por la Organización Mundial de la Salud. </p>
                     <a class="button line-color" target="_blank" href="https://www.paho.org/enfermedades-infecciosas-desatendidas-historias/#page/86">Leer más</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<p>&nbsp;</p>
<p>&nbsp;</p>
<!-- 1. Video largo (8 min)  + versión corta (3min) eliminación onco en Brasil -->



<div class="moduletable">
   <div class="custom"  >
      <div class="container">
         <!-- Headline -->
         <div class="sixteen columns main-headline">
            <h3>Retos Pendientes</h3>
            <p>Do eiusmod tempor incididunt ut labore dolore.</p>
         </div>
         <div class="one-third column" style="padding-top: 9%;">
            <!-- Featured Box -->
            <div class="featured-box" data-animated="flipInX">
               <div class="circle-2" style="float: right;"><i style="" class="icon icon-broccoli broccoli ss-broccoli" ></i></div>
               <div class="featured-desc-2" style="text-align: right; margin-right: 60px; margin-left: 0px;">
                  <h3>Mantener</h3>
                  <p>La atención del tema de las enfermedades infecciosas desatendidas a un alto nivel político y entre las prioridades de los ministerios de salud. </p>
               </div>
            </div>
            <!-- Featured Box -->
            <div class="featured-box" data-animated="flipInX">
               <div class="circle-2" style="float: right;"><i style="" class="icon icon-book book ss-book" ></i></div>
               <div class="featured-desc-2" style="text-align: right; margin-right: 60px; margin-left: 0px;">
                  <h3>Conservar y fortalecer</h3>
                  <p>Las alianzas en todos los niveles mediante la mejora de la coordinación y la planificación con socios y aliados estratégicos.</p>
               </div>
            </div>
            <div class="featured-box" data-animated="flipInX">
               <div class="circle-2" style="float: right;"><i style="" class="icon icon-broccoli broccoli ss-broccoli" ></i></div>
               <div class="featured-desc-2" style="text-align: right; margin-right: 60px; margin-left: 0px;">
                  <h3>Avanzar</h3>
                  <p>en el desarrollo y puesta en práctica local de los planes de acción para el control y eliminación de las enfermedades infecciosas desatendidas.</p>
               </div>
            </div>
         </div>
         <div class="one-third column st-center" style="padding-top: 2%;"><img class="st-image-center" src="images/stories/oncocercosis/img-iphone01.png" alt="" width="300" height="464" data-animated="fadeInUp" /></div>
         <div class="one-third column" style="padding-top: 9%;">
            <!-- Featured Box -->
            <div class="featured-box" data-animated="flipInX">
               <div class="circle-2"><i style="" class="icon icon-cart cart ss-cart" ></i></div>
               <div class="featured-desc-2">
                  <h3>Supervisar y evaluar</h3>
                  <p>El progreso de planes, programas y proyectos relacionados de los países.</p>
               </div>
            </div>
            <!-- Featured Box -->
            <div class="featured-box" data-animated="flipInX">
               <div class="circle-2"><i style="" class="icon icon-barchart barchart ss-barchart" ></i></div>
               <div class="featured-desc-2">
                  <h3>Monitorizar y evaluar</h3>
                  <p>el progreso hacia las metas de control y eliminación mediante el uso de herramientas adecuadas como la evaluación del impacto.</p>
               </div>
            </div>
            <div class="featured-box" data-animated="flipInX">
               <div class="circle-2"><i style="" class="icon icon-cart cart ss-cart" ></i></div>
               <div class="featured-desc-2">
                  <h3>Identificar y difundir</h3>
                  <p>aquellas acciones y mejores prácticas para poner en marcha durante la fase poseliminación para proteger los logros y detectar la reemergencia de las enfermedades.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

IMagen http://umvf.omsk-osma.ru/campus-parasitologie-mycologie/cycle2/poly/3617ico.html

<div class="moduletable">
   <!-- Portfolio Carousel -->
   <div class="bg-light-blue">
      <!-- Headline -->
      <div class="sixteen columns main-headline">
         <h3>Galería fotográfica</h3>
         <p>Do eiusmod tempor incididunt ut labore dolore.</p>
      </div>
      <!-- ShowBiz Carousel -->
      <div id="recent-work" class="showbiz-container sixteen columns" data-animated="fadeInDownBig">
         <!-- Portfolio Entries -->
         <div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1">
            <div class="overflowholder">
               <ul>
                  <!-- Item -->
                  <li>
                     <div class="portfolio-item media">
                        <figure>
                           <div class="mediaholder">
                              <a href="media/k2/items/cache/onchocerciasis-1.jpg" class="mfp-gallery" title="Blog post with image">
                                 <img alt="" src="media/k2/items/cache/onchocerciasis-1.jpg" width="203" height="145"/>
                                 <div class="hovercover">
                                    <div class="hovericon">
                                       <i class="hoverzoom"></i>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <figcaption class="item-description item-description-bgwhite">
                              <a href="single-post.htm" title="Blog post with image">
                                 <h5>Blog post with ...</h5>
                              </a>
                              <span>
                              In massa turpis or</span> 
                              <i class="ss-heart"> 1009</i>
                           </figcaption>
                        </figure>
                     </div>
                  </li>
                  <!-- Item -->
                  <li>
                     <div class="portfolio-item media">
                        <figure>
                           <div class="mediaholder">
                              <a href="media/k2/items/cache/onchocerciasis-2.jpg" class="mfp-gallery" title="Post with preview image">
                                 <img alt="" src="media/k2/items/cache/onchocerciasis-2.jpg" width="203" height="145"/>
                                 <div class="hovercover">
                                    <div class="hovericon">
                                       <i class="hoverzoom"></i>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <figcaption class="item-description item-description-bgwhite">
                              <a href="4-post-with-preview-image.htm" title="Post with preview image">
                                 <h5>Post with previ...</h5>
                              </a>
                              <span>
                              In massa turpis or</span> 
                              <i class="ss-heart"> 1094</i>
                           </figcaption>
                        </figure>
                     </div>
                  </li>
                  <!-- Item -->
                  <li>
                     <div class="portfolio-item media">
                        <figure>
                           <div class="mediaholder">
                              <a href="media/k2/items/cache/onchocerciasis-3.jpg" class="mfp-gallery" title="Project Title3">
                                 <img alt="" src="media/k2/items/cache/onchocerciasis-3.jpg" width="203" height="145"/>
                                 <div class="hovercover">
                                    <div class="hovericon">
                                       <i class="hoverzoom"></i>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <figcaption class="item-description item-description-bgwhite">
                              <a href="5-project-title3" title="Project Title3">
                                 <h5>Project Title3...</h5>
                              </a>
                              <span>
                              In massa turpis or</span> 
                              <i class="ss-heart"> 714</i>
                           </figcaption>
                        </figure>
                     </div>
                  </li>
                  <!-- Item -->
                  <li>
                     <div class="portfolio-item media">
                        <figure>
                           <div class="mediaholder">
                              <a href="media/k2/items/cache/onchocerciasis-4.jpg" class="mfp-gallery" title="Project Title4">
                                 <img alt="" src="media/k2/items/cache/onchocerciasis-4.jpg" width="203" height="145"/>
                                 <div class="hovercover">
                                    <div class="hovericon">
                                       <i class="hoverzoom"></i>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <figcaption class="item-description item-description-bgwhite">
                              <a href="6-project-title4.htm" title="Project Title4">
                                 <h5>Project Title4...</h5>
                              </a>
                              <span>
                              In massa turpis or</span> 
                              <i class="ss-heart"> 1064</i>
                           </figcaption>
                        </figure>
                     </div>
                  </li>
                  <!-- Item -->
                  <li>
                     <div class="portfolio-item media">
                        <figure>
                           <div class="mediaholder">
                              <a href="media/k2/items/cache/onchocerciasis-5.jpg" class="mfp-gallery" title="Project Title5">
                                 <img alt="" src="media/k2/items/cache/onchocerciasis-5.jpg" width="203" height="145"/>
                                 <div class="hovercover">
                                    <div class="hovericon">
                                       <i class="hoverzoom"></i>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <figcaption class="item-description item-description-bgwhite">
                              <a href="7-project-title5.htm" title="Project Title5">
                                 <h5>Project Title5...</h5>
                              </a>
                              <span>
                              In massa turpis or</span> 
                              <i class="ss-heart"> 656</i>
                           </figcaption>
                        </figure>
                     </div>
                  </li>
                  <!-- Item -->
                  <li>
                     <div class="portfolio-item media">
                        <figure>
                           <div class="mediaholder">
                              <a href="media/k2/items/cache/onchocerciasis-6.jpg" class="mfp-gallery" title="Project Title6">
                                 <img alt="" src="media/k2/items/cache/onchocerciasis-6.jpg" width="203" height="145"/>
                                 <div class="hovercover">
                                    <div class="hovericon">
                                       <i class="hoverzoom"></i>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <figcaption class="item-description item-description-bgwhite">
                              <a href="8-project-title6.htm" title="Project Title6">
                                 <h5>Project Title6...</h5>
                              </a>
                              <span>
                              In massa turpis or</span> 
                              <i class="ss-heart"> 972</i>
                           </figcaption>
                        </figure>
                     </div>
                  </li>
                  <!-- Item -->
                  <li>
                     <div class="portfolio-item media">
                        <figure>
                           <div class="mediaholder">
                              <a href="media/k2/items/cache/onchocerciasis-7.jpg" class="mfp-gallery" title="Project Title7">
                                 <img alt="" src="media/k2/items/cache/onchocerciasis-7.jpg" width="203" height="145"/>
                                 <div class="hovercover">
                                    <div class="hovericon">
                                       <i class="hoverzoom"></i>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <figcaption class="item-description item-description-bgwhite">
                              <a href="9-project-title7.htm" title="Project Title7">
                                 <h5>Project Title7...</h5>
                              </a>
                              <span>
                              In massa turpis or</span> 
                              <i class="ss-heart"> 685</i>
                           </figcaption>
                        </figure>
                     </div>
                  </li>
                  <!-- Item -->
                  <li>
                     <div class="portfolio-item media">
                        <figure>
                           <div class="mediaholder">
                              <a href="media/k2/items/cache/onchocerciasis-3.jpg" class="mfp-gallery" title="Project Title8">
                                 <img alt="" src="media/k2/items/cache/onchocerciasis-3.jpg" width="203" height="145"/>
                                 <div class="hovercover">
                                    <div class="hovericon">
                                       <i class="hoverzoom"></i>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <figcaption class="item-description item-description-bgwhite">
                              <a href="10-project-title8.htm" title="Project Title8">
                                 <h5>Project Title8...</h5>
                              </a>
                              <span>
                              In massa turpis </span> 
                              <i class="ss-heart"> 792</i>
                           </figcaption>
                        </figure>
                     </div>
                  </li>
                  <!-- Item -->
                  <li>
                     <div class="portfolio-item media">
                        <figure>
                           <div class="mediaholder">
                              <a href="modules/mod_stslider/assets/images/no-image.png" class="mfp-gallery" title="Post with text description">
                                 <img alt="" src="modules/mod_stslider/assets/images/no-image.png" width="203" height="145"/>
                                 <div class="hovercover">
                                    <div class="hovericon">
                                       <i class="hoverzoom"></i>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <figcaption class="item-description item-description-bgwhite">
                              <a href="11-post-with-text-description.htm" title="Post with text description">
                                 <h5>Post with text ...</h5>
                              </a>
                              <span>
                              In massa turpis </span> 
                              <i class="ss-heart"> 723</i>
                           </figcaption>
                        </figure>
                     </div>
                  </li>
               </ul>
               <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <!-- Navigation -->
            <div class="showbiz-navigation">
               <div id="showbiz_left_1" class="sb-navigation-left"><i class="icon-angle-left ss-left"></i></div>
               <div id="showbiz_right_1" class="sb-navigation-right"><i class="icon-angle-right ss-right"></i></div>
            </div>
            <div class="clearfix"></div>
         </div>
      </div>
   </div>
</div>

<div class="moduletable">
   <div class="sixteen columns main-headline">
      <h3>Mandatos y Resoluciones</h3>
      <p>Do eiusmod tempor incididunt ut labore dolore.</p>
   </div>
   <div style="column-count:2; background-color: #eee;">
      <div style="clear: both; border-bottom: dashed 1px silver; margin: 20px">
         <img src="images/stories/oncocercosis/covers/WHA47-32.png" style="float:left; padding: 10px;" />
         <h4><a href="http://www.who.int/neglected_diseases/mediacentre/WHA_47.32_Esp.pdf" target="_blank">Resolución WHA47.32 - Lucha contra la oncocercosis mediante la distribución de ivermectina</a></h4>
         <p>En 1994, la Asamblea Mundial de la Salud adoptó la Resolución WHA47.32 que promovió la estrategia de distribución masiva de
            ivermectina para luchar contra la oncocercosis, así como el desarrollo y difusión de los métodos epidemiológicos para la evaluación y/o
            mapeo de la enfermedad en los países endémicos.
         </p>
      </div>
      <div style="clear: both; border-bottom: dashed 1px silver; margin: 20px">
         <img src="images/stories/oncocercosis/covers/WHA56-26.png" style="float:left; padding: 10px;" />
         <h4><a href="http://www.who.int/neglected_diseases/mediacentre/WHA_56.26_Esp.pdf" target="_blank">Resolución WHA56.26  - Eliminación de la ceguera evitable</a></h4>
         <p>Resolución adoptada en 2003 cuyos objetivos son eliminar los casos nuevos de ceguera y discapacidad visual evitable, incluyendo la morbilidad
            causada por oncocercosis.
         </p>
      </div>
      <div style="clear: both; border-bottom: dashed 1px silver; margin: 20px">
         <img src="images/stories/oncocercosis/covers/WHA59-25.png" style="float:left; padding: 10px;" />
         <h4><a href="http://www.who.int/neglected_diseases/mediacentre/WHA_59.25_Esp.pdf" target="_blank">Resolución WHA59.25 - Prevención de la ceguera y la discapacidad visual evitables</a></h4>
         <p>Resolución adoptada en 2005 cuyos objetivos son eliminar los casos nuevos de ceguera y discapacidad visual evitable, incluyendo la morbilidad
            causada por oncocercosis.
         </p>
      </div>
      <div style="clear: both; border-bottom: dashed 1px silver; margin: 20px">
         <img src="images/stories/oncocercosis/covers/WHA62-1.png" style="float:left; padding: 10px;" />
         <h4><a href="http://www.who.int/neglected_diseases/mediacentre/WHA_62.1_Esp.pdf" target="_blank">Resolución WHA62.1 - Prevención de la ceguera y la discapacidad visual evitables</a></h4>
         <p>Resolución adoptada en 2009 cuyos objetivos son eliminar los casos nuevos de ceguera y discapacidad visual evitable, incluyendo la morbilidad
            causada por oncocercosis.
         </p>
      </div>
      <div style="clear: both; border-bottom: dashed 1px silver; margin: 20px">
         <img src="images/stories/oncocercosis/covers/CD48-R12.png" style="float:left; padding: 10px;" />
         <h4><a href="http://www1.paho.org/spanish/gov/cd/cd48.r12-s.pdf" target="_blank">Resolución CD48.R12 - Hacia la Eliminación de la Oncocercósis (Ceguera de los ríos) en las Américas</a></h4>
         <p>En el 2008 el Consejo Directivo de la OPS/OMS aprobó la Resolución CD48.R12 que estableció el objetivo de eliminar la oncocercosis
            para el 2012.
         </p>
      </div>
      <div style="clear: both; border-bottom: dashed 1px silver; margin: 20px">
         <img src="images/stories/oncocercosis/covers/CD49-R19.png" style="float:left; padding: 10px;" />
         <h4><a href="https://www.paho.org/hq/dmdocuments/2009/CD49.R19%20(Esp.).pdf" target="_blank">Resolución CD49.R19 - Eliminación de las Enfermedades Desatendidas y Otras
            infecciones relacionadas con la pobreza</a>
         </h4>
         <p>Estas metas fueron ratificadas mediante la Resolución CD49.R19 del 2009 que abarca todas las enfermedades infecciosas
            desatendidas.
         </p>
      </div>
      <div style="clear: both; border-bottom: dashed 1px silver; margin: 20px">
         <img src="images/stories/oncocercosis/covers/AG-RES-2810.png" style="float:left; padding: 10px;" />
         <h4><a href="http://scm.oas.org/IDMS/Redirectpage.aspx?class=AG/RES.&classNum=2810&lang=s" target="_blank">Resolución AG/RES.2810(XLIII-O/13) - Eliminación de las Enfermedades
            desatendidas y otras infecciones Relacionadas con la Pobreza
            </a>
         </h4>
         <p>En el 2013, la Organización de los Estados Americanos (OEA) aprobó la Resolución AG/RES.2810(XLIII-O/13) respaldando lo
            establecido en la Resolución CD49.R19 de la OPS/OMS.
         </p>
      </div>
      <div style="clear: both; border-bottom: dashed 1px silver; margin: 20px">
         <img src="images/stories/oncocercosis/covers/WHA-66-12-ESP.png" style="float:left; padding: 10px;" />
         <h4><a href="http://www.who.int/neglected_diseases/mediacentre/WHA_66.12_Esp.pdf?ua=1" target="_blank">Resolución WHA62.12 - Enfermedades tropicales desatendidas</a></h4>
         <p>En 2013, la Asamblea Mundial de la Salud aprobó la Resolución WHA62.12 instando a los Estados Miembros a ejecutar las intervenciones
            de lucha contra las enfermedades tropicales desatendidas (incluyendo la oncocercosis) y lograr las metas establecidas en la hoja de ruta
            para estas enfermedades de la OMS.
         </p>
      </div>
      <div style="clear: both; border-bottom: dashed 1px silver; margin: 20px">
         <img src="images/stories/oncocercosis/covers/A-roadmap-for-implementation.png" style="float:left; padding: 10px;" />
         <h4><a href="http://www.who.int/neglected_diseases/NTD_RoadMap_2012_Fullversion.pdf" target="_blank">Accelerating work to overcome the global impact of neglected 
            tropical diseases: A roadmap for implementation</a>
         </h4>
         <p>Hoja de ruta para las enfermedades desatendidas. </p>
      </div>
      <div style="clear: both; border-bottom: dashed 1px silver; margin: 20px">
         <img src="images/stories/oncocercosis/covers/CD55-R9.png" style="float:left; padding: 10px;" />
         <h4><a href="https://www.paho.org/hq/index.php?option=com_docman&task=doc_download&gid=36404&Itemid=270&lang=es" target="_blank">Resolución CD55.R9</a></h4>
         <p>En 2016, el Consejo Directivo de la OPS/OMS aprobó la Resolución CD55.R9 con el objetivo de implementar un plan para eliminación de
            las enfermedades infecciosas desatendidas, entre las que se incluye la oncocercosis, en las áreas en donde aún persiste su transmisión.
         </p>
      </div>
   </div>
</div>


<div class="moduletable">
   <div class="custom"  >
      <div id="parallex1" class="parallex" style="background-image: url(images/stories/oncocercosis/parallex/parallex1.jpg);">
         <div class="container">
            <div class="sixteen columns main-headline">
               <h3 class="color-white">Historias</h3>
               <p>Do eiusmod tempor incididunt ut labore dolore.</p>
            </div>
            <div id="showbiz_left_3"></div>
            <!-- ShowBiz Carousel -->
            <div id="happy-clients" class="showbiz-container sixteen carousel columns">
               <div class="showbiz our-clients" data-left="#showbiz_left_3" data-right="#showbiz_right_3">
                  <div class="overflowholder">
                     <ul>
                        <li>
                           <div class='happy-clients-photo'><img class='centered' src='images/stories/oncocercosis/protagonistas-01.jpg' alt='image' width='80' height='80'></div>
                           <div class="happy-clients-cite"><i class="ss-navigateleft"></i> Imagínate que no puedes ver la luz del sol, el azul del cielo, o el camino a casa porque te quedaste sin visión.  La oncocercosis es una  enfermedad desatendida que afecta la piel y los ojos, sino se trata puede llegar a causar ceguera. </div>
                           <div class="happy-clients-author">Indios Yanomami,<strong> frontera entre Brasil y Venezuela</strong> </div>
                        </li>
                        <li>
                           <div class='happy-clients-photo'><img class='centered' src='images/stories/oncocercosis/protagonistas-02.jpg' alt='image' width='80' height='80'></div>
                           <div class="happy-clients-cite"><i class="ss-navigateleft"></i> La distancia no es una barrera para recibir atención de salud. Médicos, enfermeros y técnicos de laboratorio, se trasladan por aire cada mes para atender a la población indígena y prevenirla de distintas enfermedades. </div>
                           <div class="happy-clients-author">Indios Yanomami,<strong> frontera entre Brasil y Venezuela</strong> </div>
                        </li>
                        <li>
                           <div class='happy-clients-photo'><img class='centered' src='images/stories/oncocercosis/protagonistas-03.jpg' alt='image' width='80' height='80'></div>
                           <div class="happy-clients-cite"><i class="ss-navigateleft"></i> Los yanomamis llaman a las enfermedades infecciosas  Xawara. Estas enfermedades no pueden ser curadas por el xapirí o chaman porque llegaron de afuera. </div>
                           <div class="happy-clients-author">Indios Yanomami,<strong> frontera entre Brasil y Venezuela</strong> </div>
                        </li>
                     </ul>
                     <div class="clearfix"></div>
                  </div>
                  <div class="clearfix"></div>
               </div>
            </div>
            <!-- Navigation / Right -->
            <div id="showbiz_right_3" ></div>
            <div class="overlay"></div>
         </div>
         <!--/.container-->
      </div>
   </div>
</div>
<!-- End Right Sidebar -->
</div>
<div id="user6" >
<!-- Begin user6  -->
<div class="moduletable">
   <div class="bg-color">
      <!-- Container -->
      <div class="container">
         <!-- Navigation / Left -->
         <div class="one carousel column">
            <div id="showbiz_left_2" class="sb-navigation-left-3"><i class="icon-angle-left"></i></div>
         </div>
         <!-- ShowBiz Carousel -->
         <div id="our-clients" class="showbiz-container fourteen carousel columns" >
            <div class="showbiz our-clients" data-left="#showbiz_left_2" data-right="#showbiz_right_2">
               <div class="overflowholder">
                  <ul>
                     <li data-animated="fadeInUp"><img src="images/stories/oncocercosis/partners/logo-07.png" alt="" width="180" height="60" /></li>
                     <li data-animated="fadeInDown"><img src="images/stories/oncocercosis/partners/logo-03.png" alt="" width="180" height="60" /></li>
                     <li data-animated="fadeInUp"><img src="images/stories/oncocercosis/partners/logo-04.png" alt="" width="180" height="60" /></li>
                     <li data-animated="fadeInDown"><img src="images/stories/oncocercosis/partners/logo-01.png" alt="" width="180" height="60" /></li>
                     <li data-animated="fadeInUp"><img src="images/stories/oncocercosis/partners/logo-05.png" alt="" width="180" height="60" /></li>
                     <li data-animated="fadeInDown"><img src="images/stories/oncocercosis/partners/logo-02.png" alt="" width="180" height="60" /></li>
                     <li data-animated="fadeInUp"><img src="images/stories/oncocercosis/partners/logo-06.png" alt="" width="180" height="60" /></li>
                     <li data-animated="fadeInDown"><img src="images/stories/oncocercosis/partners/log-03.png" alt="" width="180" height="60" /></li>
                  </ul>
                  <div class="clearfix"></div>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
         <!-- Navigation / Right -->
         <div class="one carousel column">
            <div id="showbiz_right_2" class="sb-navigation-right-3"><i class="icon-angle-right"></i></div>
         </div>
      </div>
      <!-- Container / End -->
   </div>
</div>


			            

<div class="moduletable">
   <div class="sixteen columns main-headline">
      <h3>Socios Estratégicos</h3>
      <p>Do eiusmod tempor incididunt ut labore dolore.</p>
   </div>
   <div class="col-xs-6 col-md-3">
      <div style="text-align: center">
         <a href="http://www.oepa.net/" target="_blank">
         <img src="images/stories/oncocercosis/partners/oepa.png" alt="logo Oepa" style="margin-left: auto; margin-right: auto">
         OEPA
         </a>
      </div>
   </div>
   <div class="col-xs-6 col-md-3">
      <div style="text-align: center">
         <a href="https://www.cartercenter.org/?gclid=EAIaIQobChMIwMfP3cHE2gIV0JCfCh1YhAQLEAAYASAAEgKCK_D_BwE" target="_blank">
         <img src="images/stories/oncocercosis/partners/carter-center.png" alt="logo Carter Center" style="margin-left: auto; margin-right: auto">
         Carter Center
      </div>
   </div>
   <div class="col-xs-6 col-md-3">
      <div style="text-align: center">
         <a href="http://portalms.saude.gov.br/" target="_blank">
         <img src="images/stories/oncocercosis/partners/mds-brasil.png" alt="logo Ministerio de saude brasil" style="margin-left: auto; margin-right: auto">
         MOH Brasil
      </div>
   </div>
   <div class="col-xs-6 col-md-3">
      <div style="text-align: center">
         <a href="https://portal.fiocruz.br/es" target="_blank">
         <img src="images/stories/oncocercosis/partners/fiocruz.png" alt="logo Fiocruz" style="margin-left: auto; margin-right: auto">
         Fiocruz
      </div>
   </div>
</div>

<div style="clear:both"></div>


					</div>

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
    
	
    <script src="templates/evolve/scripts/jquery.min.js"></script>
    <script src="templates/evolve/less/less-1.5.0.min.js"></script>
	<script src="templates/evolve/scripts/jquery.script.js"></script>
    <script src="templates/evolve/scripts/jquery.themepunch.plugins.min.js"></script>
    <script src="templates/evolve/scripts/jquery.themepunch.revolution.min.js"></script>
    <script src="templates/evolve/scripts/jquery.themepunch.showbizpro.min.js"></script>
    <script src="templates/evolve/scripts/appear.js"></script>
    <script src="templates/evolve/scripts/camera.js"></script>
    <script src="templates/evolve/scripts/camera-script.js"></script>
    <script src="templates/evolve/scripts/jquery.easing.min.js"></script> 
    <script src="templates/evolve/scripts/jquery.tooltips.min.js"></script>
    <script src="templates/evolve/scripts/jquery.magnific-popup.min.js"></script>
    <script src="templates/evolve/scripts/jquery.superfish.js"></script>
    <script src="templates/evolve/scripts/jquery.flexslider.js"></script>
    <script src="templates/evolve/scripts/jquery.jpanelmenu.js"></script>
    <script src="templates/evolve/scripts/jquery.zflickrfeed.min.js"></script>
    <script src="templates/evolve/scripts/jquery.contact.js"></script>
    <script src="templates/evolve/scripts/jquery.isotope.min.js"></script>
    <script src="templates/evolve/scripts/jquery.easy-pie-chart.js"></script>
    <script src="templates/evolve/scripts/parallex.js"></script>
    <script src="templates/evolve/scripts/ss-gizmo.js"></script>
    <script src="templates/evolve/scripts/custom.js"></script>
    
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
