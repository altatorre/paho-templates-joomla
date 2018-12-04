<?php
defined( '_VALID_MOS' ) or die( 'Restricted access' );
// needed to seperate the ISO number from the language file constant _ISO
$iso = explode( '=', _ISO );
// xml prolog
?>
</head>
<body>
<div id="welcome_container">
<div id="welcome_logos">
<img src="<?php echo $mosConfig_live_site;?>/templates/paho_welcome/images/welcome1.gif" alt="Pan American Health Organization/Organizacion Panamericana de la Salud" title="Pan American Health Organization/Organizacion Panamericana de la Salud" border="0" /><img src="<?php echo $mosConfig_live_site;?>/templates/paho_welcome/images/welcome_logo.gif" alt="Pan American Health Organization/Organizacion Panamericana de la Salud" title="Pan American Health Organization/Organizacion Panamericana de la Salud" border="0" /></div>
<div id="partner_logos">
<a href="http://www.who.int" target="_blank"><img src="<?php echo $mosConfig_live_site;?>/templates/paho_welcome/images/logo_who.gif" alt="World Health Organization / Organización Mundial de la Salud" title="World Health Organization / Organización Mundial de la Salud" border="0" /></a><br />&nbsp;<br /><a href="http://www.un.org/" target="_blank"><img style="margin-left:4px" src="<?php echo $mosConfig_live_site;?>/templates/paho_welcome/images/logo_onu.gif" alt="United Nations/Naciones Unidas" title="United Nations/Naciones Unidas" border="0" /></a><br />&nbsp;<br /><a href="http://www.oas.org" target="_blank"><img style="margin-left:4px" src="<?php echo $mosConfig_live_site;?>/templates/paho_welcome/images/logo_oas.gif" alt="Organization of American States/Organización de los Estados Americanos" title="Organization of American States/Organización de los Estados Americanos" border="0" /></a></div>
<div><div id="welcome_buttons"><a href="http://new.paho.org/hq/index.php?lang=es"><img src="<?php echo $mosConfig_live_site;?>/templates/paho_welcome/images/bienvenido.gif" alt="bienvenido" border="0" /></a><br /><a href="http://new.paho.org/hq/index.php?lang=en"><img src="<?php echo $mosConfig_live_site;?>/templates/paho_welcome/images/welcome.gif" alt="Welcome" border="0" /></a></div>
<div id="welcome_image" style="background:url(<?php echo $mosConfig_live_site;?>/templates/paho_welcome/images/welcomebg.gif)">
<div style="padding-top:10px;padding-left:10px">
<?php mosLoadModules ( 'premain', -1 ); ?>
</div></div>
<br clear="all" />
<?php mosLoadModules ( 'postmain', -1 ); ?>
<?php mosLoadModules ( 'innerleft', -1 ); ?>
<?php mosLoadModules ( 'innerright', -1 );  ?>
<?php mosLoadModules ( 'postcols', -1 );  ?>
</div>
<br clear="all" />
<div class="ftr">
<p>Regional Office of the World Health Organization<br />525 Twenty-third Street, N.W., Washington, D.C. 20037, United States of America<br />Country/City Code: (202) Tel: 974-3000 Fax: 974-3663</p></div>
<div align="center" class="ftr" style="font-size:.9em;letter-spacing:0px">&copy;2010 Pan American Health Organization/Organización Panamericana de la Salud - &copy;2010 World Health Organization. All rights reserved</div>
<?php mosLoadModules( 'debug', -1 );?>
<br clear="all" />
<!--  Closes welcome_container  -->
</div>
