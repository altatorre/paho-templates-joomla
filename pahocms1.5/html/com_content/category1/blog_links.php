<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<?php if ( $this->params->get('num_leading_articles') > 0 || $this->params->get('num_intro_articles') > 0 ) : ?>
<div>
	<p><strong><?php echo JText::_( 'More Articles...' ); ?></strong></p>
</div>
<?php endif; ?>

<ul>
<?php foreach ($this->links as $link) : ?>
	<li>
			<a class="blogsection" href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($link->slug, $link->catslug, $link->sectionid)); ?>">
			<?php echo $this->escape($link->title); ?></a>
	</li>
<?php endforeach; ?>
</ul>
