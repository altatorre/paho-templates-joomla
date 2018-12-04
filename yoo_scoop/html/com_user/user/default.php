<?php
/**
* @package   yoo_scoop Template
* @version   1.5.0 2009-03-02 15:12:48
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<div class="joomla <?php echo $this->params->get('pageclass_sfx')?>">
	
	<div class="user">
	
		<?php if ( $this->params->get( 'show_page_title' ) ) : ?>
		<h1 class="pagetitle">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<?php endif; ?>

		<p>
			<?php echo JText::_( 'WELCOME_DESC' ); ?>
		</p>

	</div>
</div>