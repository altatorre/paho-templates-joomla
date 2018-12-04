<?php
/**
* @package   yoo_scoop Template
* @version   1.5.0 2009-03-02 15:12:48
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
*/

defined('_JEXEC') or die('Restricted access'); ?>

<?php if (count($list) > 0) : ?>
<div class="module-latestnews">

	<ul class="<?php echo $params->get('moduleclass_sfx'); ?>">
	<?php for ($i = 0, $n = count($list); $i < $n; $i ++) : ?>
		<li class="item <?php if ($i % 2) { echo 'even'; } else { echo 'odd'; }; ?>">
			<a href="<?php echo $list[$i]->link; ?>"><?php echo $list[$i]->text; ?></a>
		</li>
	<?php endfor; ?>
	</ul>

</div>
<?php endif; ?>