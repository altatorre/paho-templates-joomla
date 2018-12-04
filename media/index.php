<?php defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<!DOCTYPE html>
<html>
	<title>PAHO Media Center</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/ripple.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/w3-theme-blue.css"> -->
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template?>/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
	<script type="text/javascript" src="<?php echo JURI::base(); ?>templates/Responsive/js/html5lightbox/html5lightbox.js"></script>
	<style>
		.w3-topnav a:first-child:hover{color: #009688;border-bottom: 3px solid transparent;}
		/* static topnav for screens below 601px width */
		@media only screen and (max-width: 601px) {.w3-topnav {position:static;}}
	</style>

<body id="mcPage">

<!-- Topnav -->
<div class="w3-topnav w3-center w3-card-2 w3-top w3-white">
	<jdoc:include type="modules" name="left" />
</div><!-- end of Topnav -->

<!-- Container -->
<div class="clear w3-container w3-padding-64">

<!-- Header -->
<div class="w3-center w3-white">
	<jdoc:include type="modules" name="banner" style="xhtml" />
</div>
<header class="w3-container w3-orange w3-margin-0"><h2>PAHO Media Center</h2></header>
<div class="w3-row-padding w3-padding-32 w3-theme-l2">

<div class="w3-twothird">
	<header class="w3-container w3-blue">PAHO Multimedia</header>
	<div class="videoWrapper"><iframe width="100%" height="420px" src="https://www.youtube.com/embed/33hr1r0PV88?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>			
</div>

<div class="w3-third">
	<header class="w3-container w3-blue">Latest News</header>
	<div class="w3-padding-0 w3-margin-0">
		<jdoc:include type="modules" name="postmain" style="xhtml" />
	</div>
</div>

</div>

<!-- Row -->
<div class="w3-row-padding w3-padding-64 w3-theme-l1">

<div class="w3-quarter">
<h2>Our Portfolio</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

<div class="w3-quarter">
<div class="w3-card-2 w3-white">
  <img src="img_vernazza.png" alt="Vernazza" style="width:100%">
  <div class="w3-container">
  <h3>Customer 1</h3>
  <h4>Trade</h4>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  </div>
  </div>
</div>

<div class="w3-quarter">
<div class="w3-card-2 w3-white">
  <img src="img_5terre.png" alt="Cinque Terre" style="width:100%">
  <div class="w3-container">
  <h3>Customer 2</h3>
  <h4>Trade</h4>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  </div>
  </div>
</div>

<div class="w3-quarter">
<div class="w3-card-2 w3-white">
  <img src="img_monterosso.png" alt="Monterosso" style="width:100%">
  <div class="w3-container">
  <h3>Customer 3</h3>
  <h4>Trade</h4>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  </div>
  </div>
</div>

</div>

<!-- Container -->
<div class="w3-container" style="position:relative">
  <a onclick="w3_open()" class="w3-btn-floating-large w3-teal" style="position:absolute;top:-28px;right:24px;z-index:0;">
  <i class="fa fa-plus"></i></a>
</div>

<!-- Container -->
<div class="w3-container w3-padding-64">
  <h2 class="w3-padding-bottom">Contact Us</h2>
  <div class="w3-row">
    <div class="w3-col m5">
      <h3>Address</h3>
      <p>Swing by for a cup of coffee, or whatever.</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>&nbsp;&nbsp;Chicago, US</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>&nbsp;&nbsp;+00 1515151515</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>&nbsp;&nbsp;test@test.com</p>
    </div>
    <div class="w3-col m7">
      <form class="w3-container">
      <div class="w3-group">      
        <input class="w3-input" style="width:100%;" type="text" required>
        <label class="w3-label">Name</label>
      </div>
      <div class="w3-group">      
        <input class="w3-input" style="width:100%;" type="text" required>
        <label class="w3-label">Email</label>
      </div>
      <div class="w3-group">      
        <textarea class="w3-input" style="width:100%;" required></textarea>
        <label class="w3-label">Subject</label>
      </div>  
      <label class="w3-checkbox">
      <input type="checkbox" checked="checked">
      <div class="w3-checkmark"></div> I Like it!
      </label>
      <button type="button" class="w3-btn w3-right w3-theme">Send</button>
      </form>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-theme w3-center">
  <h4>Follow Us</h4>
  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Rss"><i class="fa fa-rss"></i></a>
  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
  <a class="w3-btn-floating w3-teal" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
  <p>&#169; Copyright whatever</p>			

  <div style="position:relative;bottom:103px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal">Go To Top</span>   
    <a class="w3-btn w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>				
</footer>

<!-- Script For Side Navigation -->
<script>
function w3_open() {
    document.getElementsByClassName("w3-sidenav")[0].style.width = "300px";
    document.getElementsByClassName("w3-sidenav")[0].style.textAlign = "center";
    document.getElementsByClassName("w3-sidenav")[0].style.fontSize = "40px";
    document.getElementsByClassName("w3-sidenav")[0].style.paddingTop = "10%";
    document.getElementsByClassName("w3-sidenav")[0].style.display = "block";
    document.getElementsByClassName("w3-sidenav")[0].style.opacity = "1";
}
function w3_close() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "none";
}
</script>

</body>
</html>