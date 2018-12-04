<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * marker_class: Class based on the selection of text, none, or icons
 * jicon-text, jicon-none, jicon-icon
 */
?>
<dl class="contact-address dl-horizontal nine columns right">
    <h3 class="headline">Contact Information</h3>
    <span class="brd-headling"></span>
    <div class="clearfix"></div>
    <p>Sed quia non numquam eius modi tempora.</p>
	<?php if (($this->params->get('address_check') > 0) &&
		($this->contact->address || $this->contact->suburb  || $this->contact->state || $this->contact->country || $this->contact->postcode)) : ?>
		<div class="four columns" style="border-bottom:1px solid #eee; margin-right:0px; border-right:1px solid #eee;">
            <div class="featured-box animated flipInX" data-animated="flipInX">
            <?php if ($this->params->get('address_check') > 0) : ?>
    			<dt class="circle-2">
    				<span class="<?php echo $this->params->get('marker_class'); ?>" >
    					<?php //echo $this->params->get('marker_address'); ?>
                        <i class="ss-location"></i>
    				</span>
    			</dt>
    		<?php endif; ?>
    
    		<?php if ($this->contact->address && $this->params->get('show_street_address')) : ?>
    			<dd class="featured-desc-2">
                    <h3>Office Address</h3>
    				<p class="contact-street">
    					<?php echo $this->contact->address .'<br/>'; ?>
    				</p>
    			</dd>
    		<?php endif; ?>
          </div>
        </div>
		<?php if ($this->contact->suburb && $this->params->get('show_suburb')) : ?>
			<dd>
				<span class="contact-suburb">
					<?php echo $this->contact->suburb .'<br/>'; ?>
				</span>
			</dd>
		<?php endif; ?>
		<?php if ($this->contact->state && $this->params->get('show_state')) : ?>
			<dd>
				<span class="contact-state">
					<?php echo $this->contact->state . '<br/>'; ?>
				</span>
			</dd>
		<?php endif; ?>
		<?php if ($this->contact->postcode && $this->params->get('show_postcode')) : ?>
			<dd>
				<span class="contact-postcode">
					<?php echo $this->contact->postcode .'<br/>'; ?>
				</span>
			</dd>
		<?php endif; ?>
		<?php if ($this->contact->country && $this->params->get('show_country')) : ?>
		<dd>
			<span class="contact-country">
				<?php echo $this->contact->country .'<br/>'; ?>
			</span>
		</dd>
		<?php endif; ?>
	<?php endif; ?>

<?php if ($this->contact->telephone && $this->params->get('show_telephone')) : ?>
    <div class="four columns" style="border-bottom:1px solid #eee; margin-left:0px;">
        <div class="featured-box" data-animated="flipInX" style="margin-left:20px;">
        	<dt class="circle-2" >
        		<span class="<?php echo $this->params->get('marker_class'); ?>" >
        			<?php //echo $this->params->get('marker_telephone'); ?>
                    <i class="ss-phone"></i>
        		</span>
        	</dt>
        	<dd class="featured-desc-2">
                <h3>Phone Number</h3>
        		<p class="contact-telephone" style="display: block;">
        			<?php echo nl2br($this->contact->telephone); ?>
                    <?php echo nl2br($this->contact->telephone); ?>
        		</p>
        	</dd>
        </div>
    </div>
<?php endif; ?>
<?php //if ($this->contact->email_to && $this->params->get('show_email')) : ?>
    <div class="four columns" style=" margin-left:0px;">
        <div class="featured-box" data-animated="flipInX" style="margin-left:20px;">
            <dt class="circle-2">
            <span class="<?php echo $this->params->get('marker_class'); ?>" >
            	<?php //echo nl2br($this->params->get('marker_email')); ?>
                <i class="ss-mail"></i>
            </span>
            </dt>
            <dd class="featured-desc-2">
            <span >
                <h3>Email ID's</h3>
            	<?php echo $this->contact->email_to; ?>
            </span>
            </dd>
        </div>
    </div>
<?php//endif; ?>
<?php if ($this->contact->fax && $this->params->get('show_fax')) : ?>
	<dt>
		<span class="<?php echo $this->params->get('marker_class'); ?>" >
			<?php echo $this->params->get('marker_fax'); ?>
		</span>
	</dt>
	<dd>
		<span class="contact-fax">
		<?php echo nl2br($this->contact->fax); ?>
		</span>
	</dd>
<?php endif; ?>
<?php if ($this->contact->mobile && $this->params->get('show_mobile')) :?>
<!--	<dt>
		<span class="<?php echo $this->params->get('marker_class'); ?>" >
			<?php echo $this->params->get('marker_mobile'); ?>
		</span>
	</dt>
	<dd>
		<span class="contact-mobile">
			<?php echo nl2br($this->contact->mobile); ?>
		</span>
	</dd> -->
<?php endif; ?>
<?php if ($this->contact->webpage && $this->params->get('show_webpage')) : ?>
	<dt>
		<span class="<?php echo $this->params->get('marker_class'); ?>" >
		</span>
	</dt>
	<dd>
		<span class="contact-webpage">
			<a href="<?php echo $this->contact->webpage; ?>" target="_blank">
			<?php echo JStringPunycode::urlToUTF8($this->contact->webpage); ?></a>
		</span>
	</dd>
<?php endif; ?>
<div class="four columns" style="border-left:1px solid #eee; margin-left: 0;">
<div class="featured-box" data-animated="flipInX" style="margin-left: 20px;">
     <div class="circle-2"><i class="ss-users"></i></div>
     <div class="featured-desc-2">
          <h3>Online Support</h3>
          <p>Yahoo ID: evolve<br>
               Skype ID: evolve</p>
     </div>
</div>
</div>
<div class="clearfix"></div>
<div class="widget" style="margin-left:0px; border-top:1px solid eee;">
<ul class="social-icons">
     <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
     <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
     <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
     <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
     <li><a class="dribbble" href="#"><i class="icon-dribbble"></i></a></li>
     <li><a class="pinterest" href="#"><i class="icon-pinterest"></i></a></li>
     <li><a class="digg" href="#"><i class="icon-digg"></i></a></li>
     <li><a class="spotify" href="#"><i class="icon-spotify"></i></a></li>
     <li><a class="reddit" href="#"><i class="icon-reddit"></i></a></li>
     <li><a class="appstore" href="#"><i class="icon-appstore"></i></a></li>
     <li><a class="paypal" href="#"><i class="icon-paypal"></i></a></li>
     <li><a class="blogger" href="#"><i class="icon-blogger"></i></a></li>
     <li><a class="flickr" href="#"><i class="icon-flickr"></i></a></li>
</ul>
<div class="clearfix"></div>
</div>
</dl>

