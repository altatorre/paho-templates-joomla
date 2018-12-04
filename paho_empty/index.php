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
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<link href="<?php echo $mosConfig_live_site;?>/templates/paho_cms/css/template_css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/templates/<?php echo $cur_template; ?>/ht_script.js" type="text/javascript"></script>
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/templates/paho_cms/<?php echo $cur_template; ?>/mootools.js" type="text/javascript"></script>
<script language="javascript" src="<?php echo $mosConfig_live_site;?>/includes/js/selectLanguage.js" type="text/javascript"></script>
</head>

<body>

<?php mosMainBody(); ?>

</body>
</html>
