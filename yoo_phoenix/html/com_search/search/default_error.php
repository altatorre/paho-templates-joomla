<?php
/**
* @package   yoo_phoenix Template
* @file      default_error.php
* @version   1.5.21 January 2010
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2010 YOOtheme GmbH
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<h2>
	<?php echo JText::_('Error') ?>
</h2>
<p>
	<?php echo $this->escape($this->error); ?>
</p>