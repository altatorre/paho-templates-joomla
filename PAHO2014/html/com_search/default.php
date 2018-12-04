<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php if ( $this->params->get( 'show_page_title', 1 ) ) : ?>
<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->params->get( 'page_title' ); ?>
</div>
<?php endif; ?>

<p><?php echo $this->loadTemplate('form'); ?></p>

<br />
<?php if(!$this->error && count($this->results) > 0) :
	echo $this->loadTemplate('results');
else :
	echo $this->loadTemplate('error');
endif; ?>

<p>&nbsp;<br /></p>
<p>&nbsp;<br /></p>
<p>&nbsp;<br /></p>
<p>&nbsp;<br /></p>
<p>&nbsp;<br /></p>
<p>&nbsp;<br /></p>
<p>&nbsp;<br /></p>
<p>&nbsp;<br /></p>

