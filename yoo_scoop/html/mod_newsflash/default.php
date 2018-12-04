<?php
/**
* @package   yoo_scoop Template
* @version   1.5.0 2009-03-02 15:12:48
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
*/

// no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php
srand((double) microtime() * 1000000);
$flashnum	= rand(0, $items -1);
$item		= $list[$flashnum];
modNewsFlashHelper::renderItem($item, $params, $access);
?>