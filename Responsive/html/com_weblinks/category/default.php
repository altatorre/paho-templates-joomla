<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<h1 class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</h1>
<?php endif; ?>

<table role="presentation" style="text-align:center";width:100%;padding:4px;border-collapse:collapse;border-spacing:0px;border:0px" class="contentpane<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
<?php if ( @$this->category->image || @$this->category->description ) : ?>
<tr>
	<td valign="top" class="contentdescription<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php
		if ( isset($this->category->image) ) :  echo $this->category->image; endif;
		echo $this->category->description;
	?>
	</td>
</tr>
<?php endif; ?>
<tr>
	<td width="60%" colspan="2">
	<?php echo $this->loadTemplate('items'); ?>
	</td>
</tr>
<?php if ($this->params->get('show_other_cats', 1)): ?>
<tr>
	<td width="60%" colspan="2" style="text-align:left;font-size:80%">
		<ul>
		<?php foreach ( $this->categories as $category ) : ?>
			<li>
				<?php $Itemid = $_GET['Itemid'];
		 		$link = JRoute::_($category->link."&amp;Itemid=".$Itemid); ?>
				<a href="<?php echo $link; ?>" class="category<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
					<?php echo $this->escape($category->title);?></a>
				&nbsp;
				<span class="small">
					(<?php echo $category->numlinks;?>)
				</span>
			</li>
		<?php endforeach; ?>
		</ul>
	</td>
</tr>
<?php endif; ?>
</table>
