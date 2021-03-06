<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Including fallback code for the placeholder attribute in the search field.
JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', false, true);
?>
<form action="<?php echo JRoute::_('index.php');?>" method="post" class="navbar-form" role="search">
	<?php
		$output = '';
		$output .= '<div class="form-group"><input name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '"  class="form-control" type="text" placeholder="' . JText::_('MOD_SEARCH_SEARCH_KEYWORD') . '" /></div>';

		if ($button) :
			if ($imagebutton) :
				$btn_output = ' <input type="image" alt="' . $button_text . '" class="button" src="' . $img . '" onclick="this.form.searchword.focus();"/>';
			else :
				$btn_output = ' <button type="submit" class="btn btn-default" onclick="this.form.searchword.focus();">' . $button_text . '</button>';
			endif;

			switch ($button_pos) :
				case 'top' :
					$output = $btn_output . '<br />' . $output;
					break;

				case 'bottom' :
					$output .= '<br />' . $btn_output;
					break;

				case 'right' :
					$output .= $btn_output;
					break;

				case 'left' :
				default :
					$output = $btn_output . $output;
					break;
			endswitch;

		endif;

		echo $output;
	?>
	<input type="hidden" name="task" value="search" />
	<input type="hidden" name="option" value="com_search" />
	<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
</form>