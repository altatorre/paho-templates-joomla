<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
<?php endif; ?>

<?php if ( ($this->params->def('image', -1) != -1) || $this->params->def('show_comp_description', 1) ) : ?>
<table style="text-align:center;width:100%;padding:4px;border-collapse:collapse;border-spacing:0px;border:0px" class="contentpane<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
<tr>
	<td valign="top" class="contentdescription<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php
		if ( isset($this->image) ) :  echo $this->image; endif;
		echo $this->params->get('comp_description');
	?>
	</td>
</tr>
</table>
<?php endif; ?>
<ul>
<?php foreach ( $this->categories as $category ) : ?>
	<li>
		<a href="<?php echo $category->link; ?>" class="category<?php echo $this->escape($this->params->get( 'pageclass_sfx' )); ?>">
			<?php echo $this->escape($category->title);?></a>
		&nbsp;
		<span class="small">
			(<?php echo $category->numlinks;?>)
		</span>
	</li>
<?php endforeach; ?>
</ul>
