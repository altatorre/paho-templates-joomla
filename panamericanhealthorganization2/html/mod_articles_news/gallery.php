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
<div class="row">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php $i=1; foreach ($list as $item) :
				$images = json_decode($item->images); ?>
				<div class="item<?php if($i == 1): ?> active<?php endif; ?>">
					<?php if (isset($images->image_intro) && !empty($images->image_intro)): ?>
					<img src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>" width="1189" height="572"<?php if($i%2==0): ?> class="alignright"<?php endif; ?>>
					<?php endif; ?>
					<div class="carousel-caption<?php if($i%2==0): ?> left<?php endif; ?>">
						<span class="title"><?php echo $item->title; ?></span>
						<?php echo $item->introtext; ?>
						<?php if (isset($item->link)): ?>
						<a href="<?php echo $item->link; ?>" class="btn"><?php echo JText::_('Learn More'); ?></a>
						<?php endif; ?>
					</div>
				</div>
			<?php $i++; endforeach; ?>
		</div>
		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	</div>
</div>
<?php endif; ?>