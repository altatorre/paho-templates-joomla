<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php if($list): ?>
<div class="col-md-8">
	<div class="block1">
		<div class="holder">
			<div class="col-xs-12">
				<h2><?php echo $module->title; ?></h2>
			</div>
			<div class="clearfix"></div>
			<?php foreach ($list as $item) :
				$images = json_decode($item->images); ?>
				<div class="col-sm-6 img-block">
					<?php if (isset($images->image_intro) && !empty($images->image_intro)): ?>
					<div class="img-holder">
						<a href="<?php echo $item->link; ?>"><img src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>" height="156"></a>
					</div>
					<?php endif; ?>
					<span><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php endif; ?>