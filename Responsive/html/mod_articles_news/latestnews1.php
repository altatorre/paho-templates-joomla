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
<div class="twocolumns row">
	<?php foreach ($list as $item) :
		$images = json_decode($item->images); ?>
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-6">
					<div class="textholder">
						<h1><?php echo JText::_('Latest News'); ?></h1>
						<h2><?php echo $item->title; ?></h2>
						<?php echo $item->introtext; ?>
						<?php if (isset($item->link)): ?>
						<a href="<?php echo $item->link; ?>" class="more"><?php echo JText::_('Read More'); ?></a>
						<?php endif; ?>
					</div>
				</div>
				<?php if (isset($images->image_intro) && !empty($images->image_intro)): ?>
				<div class="col-sm-6">
				  <div class="img-holder">
					<img src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>" width="310" height="299">
				  </div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>