<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<script language="javascript" type="text/javascript">
function iFrameHeight() {
	var h = 0;
	if ( !document.all ) {
		h = document.getElementById('blockrandom').contentDocument.height;
		document.getElementById('blockrandom').style.height = h + 60 + 'px';
	} else if( document.all ) {
		h = document.frames('blockrandom').document.body.scrollHeight;
		document.all.blockrandom.style.height = h + 20 + 'px';
	}
}
</script>
<div class="contentpane<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
<?php if ( $this->params->get( 'show_page_title', 1 ) ) : ?>
	<h1 class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get( 'page_title' )); ?>
	</h1>
<?php endif; ?>
<iframe <?php echo $this->wrapper->load; ?>
	id="blockrandom"
	name="iframe"
	src="<?php echo str_replace ( "&amp;amp;" , "&amp;" , str_replace ( "&" , "&amp;" , $this->wrapper->url )); ?>"
	style="vertical-align:top;border:0px"
	width="<?php echo $this->params->get( 'width' ); ?>"
	height="<?php echo $this->params->get( 'height' ); ?>"
	scrolling="<?php echo $this->params->get( 'scrolling' ); ?>"
	class="wrapper<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo JText::_( 'NO_IFRAMES' ); ?>
</iframe>
</div>
