<?php
/**
* @author CMSBlueTheme - www.cmsbluetheme.com
* @date: 11-09-2015
*
* @copyright  Copyright (C) 2013 cmsbluetheme.com . All rights reserved.
* @license    GNU General Public License version 2 or later; see LICENSE
*/

defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '1000');
$sitename = $app->getCfg('sitename');
$menu = $app->getMenu();
$item_menu = $menu->getItem( $itemid);
$ishome = 0;
if ((($option == 'com_content') && ($view == 'featured')) ||  $menu->getActive()->home){
    $ishome = 1;
}
$st_params = new  JRegistry();
$st_params->loadString($item_menu->params);
$st_params_arr = $st_params->toArray();
//show right slidebar
$show_right = true;
if (isset($st_params_arr['xml_stshow_sliderbar_right_category'])){
    if (!$st_params_arr['xml_stshow_sliderbar_right_category']){
        $show_right = false;
    }
}else{$show_right = true;}
if (isset($st_params_arr['xml_stshow_sliderbar_right_item'])){
    if ($view == 'item' && $option == 'com_k2' && $st_params_arr['xml_stshow_sliderbar_right_item']){
    $show_right = true;
}
}


//show left slidebar
$show_left = true;
$st_params_arr = $st_params->toArray();
if (isset($st_params_arr['xml_stshow_sliderbar_left_category'])){
    if (!$st_params_arr['xml_stshow_sliderbar_left_category']){
        $show_left = false;
    }
}else{$show_left = true;}
if (isset($st_params_arr['xml_stshow_sliderbar_left_item'])){
    if ($view == 'item' && $option == 'com_k2' && $st_params_arr['xml_stshow_sliderbar_left_item']){
    $show_left = true;
}
}

// Add current user information
$user = JFactory::getUser();

// Logo file or site title param
if ($this->params->get('xml_logo'))
{
	$logo = '<img src="'. JUri::root() . $this->params->get('xml_logo') .'" alt="'. $sitename .'" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="'. $sitename .'">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
}
else
{
	$logo = '<span class="site-title" title="'. $sitename .'">'. $sitename .'</span>';
}


$url = $this->baseurl.'/templates/' .$this->template.'/';
//preset color
$header_bg_color = $this->params->get('xml_header_bg_color','#ffffff');
$header_color = $this->params->get('xml_header_color','#666');
$main_color = $this->params->get('xml_preset_color_df','#5f8cb4');
if ($main_color == 'other'){
    $main_color = $this->params->get('xml_preset_main_other','#5f8cb4');
}
//layout style
$layout_style = $this->params->get('xml_layout_style',1);
$layout_style_bg = $this->params->get('xml_layout_style_bg','noise_pattern_with_crosslines');
if ($layout_style == 2){ 
    $layout_style = ' boxed ';
    $layout_style_bg = 'style="background-image:url('.'templates/'.$this->template.'/images/bg/'.$layout_style_bg.'.png)"';
}
else{ $layout_style = '';}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<link rel="icon" href="images/evolve.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	
    <link rel="stylesheet" href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/base.css">
    <link rel="stylesheet" href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/responsive.css">
    <link rel="stylesheet" href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/icons.css"> 
    <link rel="stylesheet" href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/ss-gizmo.css">
    <link  rel="stylesheet" media="screen" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" /> 
    <link rel="stylesheet" media="screen" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800">
    
    <link rel="stylesheet" href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/custom.css">
    <link rel="stylesheet" href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/rs-plugin/css/settings.css"> 
    <link rel="stylesheet" href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/animate.css" /> 
    <link rel="stylesheet" href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/camera.css" id='camera-css'>
    <link rel="stylesheet/less" type="text/css" 
        href="<?php echo $url; ?>less/color.php?header_bg_color=<?php echo  str_replace('#','',$header_bg_color); ?>&amp;main_color=<?php echo  str_replace('#','',$main_color); ?>&amp;header_color=<?php echo  str_replace('#','',$header_color); ?>">
	
<link rel="stylesheet" type="text/css" href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/switcher.css" >
	<link id="colors" rel="stylesheet" href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/blue.css">
    <!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
	<![endif]-->
    <style type="text/css">
    #logo a img {
        height: <?php echo $params->get('bt_logo_hight',42).'px' ;?> !important;
    }
    </style>
</head>

<body class="site <?php echo $option.' '.$layout_style
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
?>">
	<!-- Body -->
	<div class="body" <?php echo $layout_style_bg; ?>>
		<!-- Header -->
		<header id="header" role="banner">
            <?php if ($this->countModules('top1') || $this->countModules('top2')) : ?>
            <div class="topbar st-topbar">
                <div class="container">
                    <div class="  call" style="width: 44%;float: left;">
                    <?php if ($this->countModules('top1')) : ?>
            			<jdoc:include type="modules" name="top1" style="none" />
            		<?php endif; ?>
					</div>
                    <?php if ($this->countModules('top3')) : ?>
                    <div class=""  style="width: 8%; float: left;text-align: center;">
            			<jdoc:include type="modules" name="top3" style="none" />
					</div>
            		<?php endif; ?>
					<div class="column"  style="width: 45%; float: right;">
						<?php if ($this->countModules('top2')) : ?>
							<jdoc:include type="modules" name="top2" style="none" />
						<?php endif; ?>
					</div>
                
				</div>
            </div>
            <?php endif; ?>
            <div class="clearfix"></div>
			<div class="container clearfix st-csmenu">
                <div class="three columns">
                   <div id="mobile-navigation">
                        <form method="GET" id="menu-search" action="#">
                             <input type="text" value="Start Typing..." onFocus="if (this.value == 'Start Typing...')this.value = '';" onBlur="if (this.value == '')this.value = 'Start Typing...';"/>
                        </form>
                        <a href="#menu" class="menu-trigger"><i class="icon-reorder"></i></a> <span class="search-trigger"><i class="icon-search"></i></span> 
                   </div>
                   <div id="logo">
                        <h1>
                            <a class="brand pull-left" href="<?php echo $this->baseurl; ?>">
            					<?php echo $logo; ?>
                            </a>
                        </h1>
                   </div>
                </div>
				<!-- mega menu -->
                <?php if ($this->countModules('menu')) : ?>
                <div class="thirteen columns">
                    <nav id="navigation" class="menu">
                    <jdoc:include type="modules" name="menu" style="none" />
                    
                    </nav>
                </div>
                <?php endif; ?>
			</div>
            <!-- Search Form Container -->
            <?php if ($this->countModules('search')) : ?>
             <section id="header-search-panel">
                  <div class="container">
                  
                      <jdoc:include type="modules" name="search" style="none" />
                  </div>
             </section>
             <?php endif; ?>
		</header>
		
		<jdoc:include type="modules" name="banner" style="xhtml" />
		<div id="content-wrapper">
				<div class="featured">
					<?php if ($this->countModules('featured')) : ?>
					<!-- Begin Sidebar -->
							<jdoc:include type="modules" name="featured" style="xhtml" />
					<!-- End Sidebar -->
					<?php endif; ?>
				</div>
                <?php if ($this->countModules('breadcrumb') && (!$ishome)  && (strtolower($this->title) != 'home')) : ?>
                <!-- Parallex Page Title -->
                 <div id="parallex-inner" class="parallex">
                      <div class="container">
                           <div class="eight columns"  data-animated="fadeInUp">
                                <h1><?php  echo $this->title.' '.JText::_('EVOLVE_PAGE');?></h1>
                           </div>
                           <div class="eight columns">
                                <nav id="breadcrumbs">
                                     <jdoc:include type="modules" name="breadcrumb" style="xhtml" />
                                </nav>
                           </div>
                      </div>
                 </div>
                 <?php endif; ?>
				<?php if ($this->countModules('user1')) : ?>
				<div id="user1" >
					<!-- Begin Right Sidebar -->
					<jdoc:include type="modules" name="user1" style="xhtml" />
					<!-- End Right Sidebar -->
				</div>
				<?php endif; ?>
				<?php if ($this->countModules('user2')) : ?>
				<div id="user2" >
					<!-- Begin Right Sidebar -->
					<jdoc:include type="modules" name="user2" style="xhtml" />
					<!-- End Right Sidebar -->
				</div>
				<?php endif; ?>
				<?php if (!$ishome){ ?>
				<div class="container">
				    <?php if ($this->countModules('left') && ($show_left)) : ?>
                        <div class="four columns">
						<jdoc:include type="modules" name="left" style="widget" />
                        </div>
						<?php endif; ?>
					<main id="content" role="main" class=" <?php if ($this->countModules('right') && ($show_right) && $this->countModules('left') && ($show_left)) echo 'eight columns'; if (($this->countModules('right') && ($show_right)) || ($this->countModules('left') && ($show_left))) echo 'twelve  alt columns'; ?> " >
						<!-- Begin Content -->
						
						<jdoc:include type="message" />
						<jdoc:include type="component" />
						<jdoc:include type="modules" name="position-2" style="none" />
						<!-- End Content -->
					</main>
					<?php if ($this->countModules('right') && ($show_right)) : ?>
					<div id="sidebarright" class="four columns">
						<!-- Begin Right Sidebar -->
						<jdoc:include type="modules" name="right" style="widget" />
                        
						<!-- End Right Sidebar -->
					</div>
                    <?php endif; ?>
                </div>
				<?php } ?>
				<?php if ($this->countModules('user6')) : ?>
				<div id="user6" >
					<!-- Begin user6  -->
					<jdoc:include type="modules" name="user6" style="xhtml" />
					<!-- End user6 Sidebar -->
                    
                    <hr class="st-sep80 sep80">
				</div>
				<?php endif; ?>
                <?php if ($this->countModules('user3')||$this->countModules('user3')) : ?>
                <div class="container" style=" margin-bottom: 30px; ">
                    <?php if ($this->countModules('user3')) : ?>
    				<div id="user3" class="eight columns animated fadeInLeft" data-animated="fadeInLeft">
    					<!-- Begin user3 Sidebar -->
    					<jdoc:include type="modules" name="user3" style="xhtml" />
    					<!-- End user3 Sidebar -->
    				</div>
    				<?php endif; ?>
    				<?php if ($this->countModules('user4')) : ?>
    				<div id="user4" class="eight columns animated fadeInRight" data-animated="fadeInRight">
    					<!-- Begin user4 Sidebar -->
    					<jdoc:include type="modules" name="user4" style="widget" />
    					<!-- End user4 Sidebar -->
    				</div>
    				<?php endif; ?>
                </div>
               	<?php endif; ?>
                <?php if ($this->countModules('user11')|| $this->countModules('user12')|| $this->countModules('user13')) : ?>
				
            <div class="container" data-animated="fadeInUp">
                  <hr class="line-full">
                       <!-- Featured Box -->
                       <div class="one-third column">
                        <?php if ($this->countModules('user11')) : ?>
                        <div id="user11" class="featured-box mgr30" data-animated="fadeInLeft">
                    		<!-- Begin user11 Sidebar -->
                    		<jdoc:include type="modules" name="user11" style="widget" />
                    		<!-- End user11 Sidebar -->
                    	</div>
                        <?php endif; ?>
                       </div>
                       <!-- Featured Box -->
                       <div class="one-third column">
                        <?php if ($this->countModules('user12')) : ?>
                        <div id="user12" class="featured-box mgr30" >
                    		<!-- Begin user12 Sidebar -->
                    		<jdoc:include type="modules" name="user12" style="widget" />
                    		<!-- End user12 Sidebar -->
                    	</div>
                        <?php endif; ?>
                     </div>
                       <!-- Featured Box -->
                       <div class="one-third column">
                        <?php if ($this->countModules('user13')) : ?>
                        <div id="user13" class="featured-box mgr30" data-animated="fadeInRight">
                    		<!-- Begin user13 Sidebar -->
                    		<jdoc:include type="modules" name="user13" style="widget" />
                    		<!-- End user13 Sidebar -->
                    	</div>
                        <?php endif; ?>
                       </div>
                </div>
			     <?php endif; ?>
				<?php if ($this->countModules('user7')|| $this->countModules('user8')|| $this->countModules('user9')) : ?>
				<div class="bg-light-blue">
                    <div class="container">
                        <?php if ($this->countModules('user7')) : ?>
                        <div id="user7" class="" data-animated="fadeInLeft">
                            <!-- Begin user7 Sidebar -->
                        	<jdoc:include type="modules" name="user7" style="xhtml" />
                        	<!-- End user7 Sidebar -->
                        </div>
                        <?php endif; ?>
                        <?php if ($this->countModules('user8')) : ?>
                        <div id="user8" class="eight columns" data-animated="fadeInLeft">
                    		<!-- Begin user8 Sidebar -->
                    		<jdoc:include type="modules" name="user8" style="widget" />
                    		<!-- End user8 Sidebar -->
                    	</div>
                        <?php endif; ?>
                        <?php if ($this->countModules('user9')) : ?>
                        <div id="user9" class="eight columns" data-animated="fadeInRight">
                    		<!-- Begin user9 Sidebar -->
                    		<jdoc:include type="modules" name="user9" style="widget" />
                    		<!-- End user9 Sidebar -->
                    	</div>
                        <hr class="sep50">
                        <?php endif; ?>
                    </div>
                </div>
			<?php endif; ?>
            
            <?php if ($this->countModules('user10')) : ?>
			<div id="user10" >
				<!-- Begin user10  -->
				<jdoc:include type="modules" name="user10" style="xhtml" />
				<!-- End user10 Sidebar -->
			</div>
			<?php endif; ?>
		</div>
	</div>
	<!-- Footer -->
	<footer class="footer" role="contentinfo">
		<div id="footer">
            <div class="container">
                <?php if ($this->countModules('bottom1')) : ?>
                <div class="four columns">
                    <!-- Begin bottom1  -->
    				<jdoc:include type="modules" name="bottom1" style="xhtml" />
    				<!-- End bottom1  -->
                </div>
                <?php  endif;?>
                <?php if ($this->countModules('bottom2')|| $this->countModules('bottom3')|| $this->countModules('bottom4')) : ?>
    			<div class="eight columns" >
                    <?php if ($this->countModules('bottom2')) : ?>
                    <div class="four alt columns">
                    	<!-- Begin bottom2 Footer -->
                    	<jdoc:include type="modules" name="bottom2" style="xhtml" />
                    	<!-- End bottom2 Footer -->
                    </div>
                    <?php  endif;?>   
                    <?php if ($this->countModules('bottom3')) : ?>
                    <div class="four alt columns" >
                    	<!-- Begin bottom3 Footer -->
                    	<jdoc:include type="modules" name="bottom3" style="xhtml" />
                    	<!-- End bottom3 Footer -->
                    </div>
                     <?php  endif;?>   
                    <?php if ($this->countModules('bottom4')) : ?>
                    
                    <hr class="sep10">
                    <div class="eight columns">
                        <p>Make sure you son't miss latest news and get notices about our new themes, stay tuned!</p>
                        <!-- Begin bottom4 Footer  -->
                        <jdoc:include type="modules" name="bottom4" style="xhtml" />
                        <!-- End bottom4 Footer  -->
                    </div> 
                    <?php  endif;?>   
    			</div>
    			<?php endif; ?>
                <?php if ($this->countModules('bottom5')) : ?>
                <div class="four columns">
                    <!-- Begin bottom5  -->
    				<jdoc:include type="modules" name="bottom5" style="xhtml" />
                    <hr class="sep20">
    				<!-- End bottom5  -->
                </div>
                <?php  endif;?>
            </div>
        </div>
        <!-- Footer Bottom / Start -->
		<div id="footer-bottom">
			 <!-- Container -->
             
			 <div class="container">
             <?php if ($this->countModules('footer')) : ?>
                    <!-- Begin footer  -->
    				<jdoc:include type="modules" name="footer" style="xhtml" />
    				<!-- End footer  -->
                <?php  endif;?>
			 </div>
			 <!-- Container / End -->
		</div>
		
	</footer>
    
	<jdoc:include type="modules" name="debug" style="none" />
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.min.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/less/less-1.5.0.min.js"></script>
	<script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.script.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.themepunch.plugins.min.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.themepunch.revolution.min.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.themepunch.showbizpro.min.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/appear.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/camera.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/camera-script.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.easing.min.js"></script> 
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.tooltips.min.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.superfish.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.flexslider.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.jpanelmenu.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.zflickrfeed.min.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.contact.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.isotope.min.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/parallex.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/ss-gizmo.js"></script>
    <script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/custom.js"></script>
    
<!-- Style Switcher
================================================== -->
<?php if ($params->get('bt_control')): ?>
<script src="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/scripts/switcher.js"></script>
<section id="style-switcher">
     <h2>Style Selector <a href="#"></a></h2>
<div>
          <h3>Layout Style</h3>
          <div class="layout-style">
               <select id="layout-style">
                    <option value="1">Wide</option>
                    <option value="2">Boxed</option>
               </select>
          </div>
          
          <h3>Predefined Colors</h3>
          <ul class="colors" id="btcolors">
               <li><a href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/grayblue.css" class="btcolor grayblue" title="Gray Blue"></a></li>
               <li><a href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/orange.css" class="btcolor orange" title="Orange"></a></li>
               <li><a href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/green.css" class="btcolor green" title="Green"></a></li>
               <li><a href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/blue.css" class="btcolor blue" title="Blue"></a></li>
               <li><a href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/yellow.css" class="btcolor yellow" title="Yellow"></a></li>
               <li><a href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/navy.css" class="btcolor navy" title="Navy"></a></li>
               <li><a href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/beige.css" class="btcolor beige" title="Beige"></a></li>
               <li><a href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/red.css" class="btcolor red" title="Red"></a></li>
               <li><a href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/cyan.css" class="btcolor cyan" title="Cyan"></a></li>
               <li><a href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/pink.css" class="btcolor pink" title="Pink"></a></li>
               <li><a href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/brown.css" class="btcolor brown" title="Brown"></a></li>
               <li><a href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/olive.css" class="btcolor olive" title="Olive"></a></li>
               <li><a href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/purple.css" class="btcolor purple" title="Purple"></a></li>
               <li><a href="<?php echo JUri::root();?>templates/<?php echo $this->template; ?>/css/colors/gray.css" class="btcolor gray" title="Gray"></a></li>
          </ul>
          <h3>Background Image</h3>
          <ul class="colors bg" id="bg">
               <li><a href="#" class="bg1"></a></li>
               <li><a href="#" class="bg2"></a></li>
               <li><a href="#" class="bg3"></a></li>
               <li><a href="#" class="bg4"></a></li>
               <li><a href="#" class="bg5"></a></li>
               <li><a href="#" class="bg6"></a></li>
               <li><a href="#" class="bg7"></a></li>
               <li><a href="#" class="bg8"></a></li>
               <li><a href="#" class="bg9"></a></li>
               <li><a href="#" class="bg10"></a></li>
               <li><a href="#" class="bg11"></a></li>
               <li><a href="#" class="bg12"></a></li>
               <li><a href="#" class="bg13"></a></li>
               <li><a href="#" class="bg14"></a></li>
          </ul>
     </div>
</section>
<!-- Style Switcher / End -->
<?php endif ;?>
</body>
</html>
