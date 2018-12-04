<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<div class="contentpaneopen">
<?php if ($this->item->params->get('show_title')) : ?>
<h2 class="contentheading<?php echo $this->escape($this->item->params->get( 'pageclass_sfx' )); ?>">
	<?php if ($this->item->params->get('link_titles') && $this->item->readmore_link != '') : ?>
	<a href="<?php 
	if ($this->item->catid == 1443 || $this->item->catid == 740) {
		echo $this->item->readmore_link . '&amp;Itemid=1926';
	} else { echo $this->item->readmore_link; }
	?>" class="contentpagetitle<?php echo $this->escape($this->item->params->get( 'pageclass_sfx' )); ?>">
		<?php echo $this->escape($this->item->title); ?>
	</a>
	<?php else : ?>
		<?php echo $this->escape($this->item->title); ?>
	<?php endif; ?>
</h2>
<?php endif; ?>

<?php  if (!$this->item->params->get('show_intro')) :
	echo $this->item->event->afterDisplayTitle;
endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?>

<div class="article-content">
<?php
 $content = $this->item->text;
 $content = preg_replace("/<img[^>]+\>/i", "", $content);
 $content = preg_replace("/<p[^>]*><\\/p[^>]*>/", '', $content);
 echo $content; 
 ?>
</div>

<?php if ($this->item->params->get('show_readmore') && $this->item->readmore) : ?>
	<a href="<?php 
	if ($this->item->catid == 1443 || $this->item->catid == 740) {
		echo $this->item->readmore_link . '&amp;Itemid=1926';
	} else { echo $this->item->readmore_link; }
	?>" title="<?php echo $this->escape($this->item->title); ?>" class="readon<?php echo $this->escape($this->item->params->get('pageclass_sfx')); ?>">
			<?php if ($this->item->readmore_register) : ?>
				<?php echo JText::_('Register to read more...'); ?>
			<?php else : ?>
				<?php echo JText::_('Read more...'); ?>
			<?php endif; ?>
	</a>
<?php endif; ?>
<?php if ( intval($this->item->modified) != 0 && $this->item->params->get('show_modify_date')) : ?>
	<span class="modifydate"><br />
		<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
	</span>
<?php endif; ?>

</div>

<?php echo $this->item->event->afterDisplayContent; ?>