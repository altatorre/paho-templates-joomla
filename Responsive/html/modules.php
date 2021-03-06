<?php

defined('_JEXEC') or die;

/**
 * <jdoc:include type="modules" name="test" style="default" />
 *
 * Custom module chrome, echos the whole module in a <div> and the header in <h{x}>. The level of
 * the header can be configured through a 'headerLevel' attribute of the <jdoc:include /> tag.
 * Defaults to <h3> if none given
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * three arguments.
 */
 
function modChrome_widget($module, &$params, &$attribs)
{
	$base = substr($module->module, 4);
	$prefix = $params->get('moduleclass_sfx') ? " prefix".$params->get('moduleclass_sfx') : "";
	$hl = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	
	if (!empty ($module->content)) : 
		echo "\n<!-- Mod: " . $module->title . " - Type: " . $module->module . " - Position: ".$module->position." - ID: " . $module->id . " -->";
	?>
	<div class="widget widget-<?php echo $base, $prefix; ?>" id="<?php echo $base.'-'.$module->id; ?>">
		<?php if ($module->showtitle) : ?>
			<h<?php echo $hl; ?>><?php echo $module->title; ?></h<?php echo $hl; ?>>
		<?php endif; ?>
		<?php echo $module->content; ?>
	</div>
	<?php endif;
}

function modChrome_clear($module, &$params, &$attribs)
{
	$base = substr($module->module, 4);
	$prefix = $params->get('moduleclass_sfx') ? " prefix".$params->get('moduleclass_sfx') : "";
	$hl = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	
	if (!empty ($module->content)) : ?>
		<?php if ($module->showtitle) : ?>
			<h<?php echo $hl; ?>><?php echo $module->title; ?></h<?php echo $hl; ?>>
		<?php endif; ?>
		<?php echo str_replace(array('[%', '%]'), array('<', '>'), $module->content); ?>
	<?php endif;
}

function modChrome_events($module, &$params, &$attribs)
{
	static $tab_i;
	$tab_i++;
	$base = substr($module->module, 4);
	$prefix = $params->get('moduleclass_sfx') ? " prefix".$params->get('moduleclass_sfx') : "";
	$hl = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	
	if (!empty ($module->content)) : ?>
	<div role="tabpanel" class="tab-pane<?php if($tab_i == 1): ?> active<?php endif; ?>" id="tab<?php echo $tab_i; ?>">
		<?php echo $module->content; ?>
	</div>
	<?php endif;
}

	/* http://stackoverflow.com/questions/1309452/how-to-replace-innerhtml-of-a-div-using-jquery */
	/* https://docs.joomla.org/Applying_custom_module_chrome */
function modChrome_item($module, &$params, &$attribs)
{
	if (isset($GLOBALS['cuentamodulos'])) $GLOBALS['cuentamodulos'] ++;
	else $GLOBALS['cuentamodulos'] = 0;
	$base = substr($module->module, 4);
	$prefix = $params->get('moduleclass_sfx') ? " prefix".$params->get('moduleclass_sfx') : "";
	$hl = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	
	if (!empty ($module->content)) : 
		echo "\n<!-- Mod: " . $module->title . " - Type: " . $module->module . " - Position: ".$module->position." - ID: " . $module->id . " -->";
	?>
		<div class="item">
			<?php 
			$estilo = '';
			$cuentaciclo = $GLOBALS['cuentamodulos'] % 5;
			if ($cuentaciclo ==1) $estilo = '3';
			if ($cuentaciclo ==2) $estilo = '2';
			if ($cuentaciclo ==4) $estilo = '1';
			?>
			<div class="textholder<?php echo $estilo; ?>">
		<?php if ($module->showtitle) : ?>
			<h2><?php echo $module->title; ?></h2>
		<?php endif; ?>
		<?php echo str_replace(array('[%', '%]'), array('<', '>'), $module->content); ?>
			</div><!-- textholder -->
		</div><!-- item -->
	<?php endif;
}

