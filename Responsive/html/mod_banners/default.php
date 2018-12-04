<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<div class="bannergroup<?php echo $params->get( 'moduleclass_sfx' ) ?>">

<?php if ($headerText) : ?>
	<div class="bannerheader"><?php echo $headerText ?></div>
<?php endif;

if (is_array($list)) {
	foreach($list as $item) :

		?><div class="banneritem<?php echo $params->get( 'moduleclass_sfx' ) ?>"><?php
		echo modBannersHelper::renderBanner($params, $item);
		?>
		</div>
	<?php endforeach; 
} else echo "List is empty"?>

<?php if ($footerText) : ?>
	<div class="bannerfooter<?php echo $params->get( 'moduleclass_sfx' ) ?>">
		 <?php echo $footerText ?>
	</div>
<?php endif; ?>
</div>