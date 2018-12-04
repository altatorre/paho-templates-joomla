<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<div>
	<p><strong><?php echo JText::_( 'More...' ); ?></strong></p>
</div>
<ul>
<?php foreach ($this->links as $link) : ?>
	<li>
		<a class="blogsection" href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($link->slug, $link->catslug, $link->sectionid)); ?><?php if ($link->catid == 740 || $link->catid == 1443){ echo '&amp;Itemid=1926'; } ?>">
			<?php echo $this->escape($link->title); ?></a>
	</li>
<?php endforeach; ?>
</ul>
