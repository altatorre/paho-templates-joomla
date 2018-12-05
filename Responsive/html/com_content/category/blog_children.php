<?php
defined('_JEXEC') or die;
$class = ' class="first"';
JHtml::_('bootstrap.tooltip');

if (count($this->children[$this->category->id]) > 0 && $this->maxLevel != 0) : ?>

	<?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
		<?php 
		if ($this->params->get('show_empty_categories') || $child->numitems || count($child->getChildren())) : ?>
			<div class="sub-category">
				<h3 class="page-header item-title"><a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($child->id));?>">
					<?php echo $this->escape($child->title); ?></a>
					<?php if ( $this->params->get('show_cat_num_articles', 1)) : ?>
					<span class="badge badge-info tip hasTooltip" title="<?php echo JText::_('COM_CONTENT_NUM_ITEMS'); ?>">
						<?php echo $child->getNumItems(true); ?>
					</span>
					<?php endif; ?>

					<?php if (count($child->getChildren()) > 0) : ?>
						<a href="#category-<?php echo $child->id;?>" data-toggle="collapse" data-toggle="button" class="btn btn-mini pull-right"><i class="icon-plus"></i></a>
					<?php endif;?>
				</h3>

				<?php if ($this->params->get('show_subcat_desc') == 1) :?>
					<?php if ($child->description) : ?>
						<div class="category-desc">
							<?php echo JHtml::_('content.prepare', $child->description, '', 'com_content.category'); ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>

				<?php if (count($child->getChildren()) > 0) :?>
					<div class="collapse fade" id="category-<?php echo $child->id;?>">
						<?php
						$this->children[$child->id] = $child->getChildren();
						$this->category = $child;
						$this->maxLevel--;
						if ($this->maxLevel != 0) :
							echo $this->loadTemplate('children');
						endif;
						$this->category = $child->getParent();
						$this->maxLevel++;
						?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>

<?php endif;
