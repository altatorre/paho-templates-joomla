<?php
/**
 * @version		$Id: category_item.php 1812 2013-01-14 18:45:06Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);
$check_media =  true;
?>

<!-- Start K2 Item Layout -->
<div class="catItemView group<?php echo ucfirst($this->item->itemGroup); ?><?php echo ($this->item->featured) ? ' catItemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">

	<!-- Plugins: BeforeDisplay -->
	<?php echo $this->item->event->BeforeDisplay; ?>

	<!-- K2 Plugins: K2BeforeDisplay -->
	<?php echo $this->item->event->K2BeforeDisplay; ?>

	

  <!-- Plugins: AfterDisplayTitle -->
  <?php echo $this->item->event->AfterDisplayTitle; ?>

  <!-- K2 Plugins: K2AfterDisplayTitle -->
  <?php echo $this->item->event->K2AfterDisplayTitle; ?>

	<?php if($this->item->params->get('catItemRating')): ?>
	<!-- Item Rating -->
	<div class="catItemRatingBlock">
		<span><?php echo JText::_('K2_RATE_THIS_ITEM'); ?></span>
		<div class="itemRatingForm">
			<ul class="itemRatingList">
				<li class="itemCurrentRating" id="itemCurrentRating<?php echo $this->item->id; ?>" style="width:<?php echo $this->item->votingPercentage; ?>%;"></li>
				<li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_1_STAR_OUT_OF_5'); ?>" class="one-star">1</a></li>
				<li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_2_STARS_OUT_OF_5'); ?>" class="two-stars">2</a></li>
				<li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_3_STARS_OUT_OF_5'); ?>" class="three-stars">3</a></li>
				<li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_4_STARS_OUT_OF_5'); ?>" class="four-stars">4</a></li>
				<li><a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_5_STARS_OUT_OF_5'); ?>" class="five-stars">5</a></li>
			</ul>
			<div id="itemRatingLog<?php echo $this->item->id; ?>" class="itemRatingLog"><?php echo $this->item->numOfvotes; ?></div>
			<div class="clr"></div>
		</div>
		<div class="clr"></div>
	</div>
	<?php endif; ?>

  <div class="post-alt">

	  <!-- Plugins: BeforeDisplayContent -->
	  <?php echo $this->item->event->BeforeDisplayContent; ?>

	  <!-- K2 Plugins: K2BeforeDisplayContent -->
	  <?php echo $this->item->event->K2BeforeDisplayContent; ?>
	  <?php if($this->item->params->get('catItemImage') && (!empty($this->item->image) || !empty($this->item->video) )){ $check_media = false; ?>
        <!-- Item Image -->
        <figure class="post-img media">
         <div class="mediaholder" <?php if (!empty($this->item->video)) echo 'style="width:102%;"'; ?>> 
            <a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
        	   <?php if ($this->item->image !== ""){ ?>
               <img width='<?php echo $this->item->imageWidth; ?>' height='' src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php //echo $this->item->imageWidth; ?>px; height:auto;" />
        
               
               <?php }elseif($this->item->params->get('itemVideo') && !empty($this->item->video)){ $check_media = 'video' ?>
                  <!-- Item video -->
                  <div class="">
                  	<h3><?php // echo JText::_('K2_MEDIA'); ?></h3>
                
                		<?php if($this->item->videoType=='embedded'): ?>
                		<div class="itemVideoEmbedded">
                			<?php echo $this->item->video; ?>
                		</div>
                		<?php else: ?>
                		<span class="itemVideo"><?php echo $this->item->video; ?></span>
                		<?php endif; ?>
                
                	  <?php if($this->item->params->get('itemVideoCaption') && !empty($this->item->video_caption)): ?>
                	  <span class="itemVideoCaption"><?php echo $this->item->video_caption; ?></span>
                	  <?php endif; ?>
                
                	  <?php if($this->item->params->get('itemVideoCredits') && !empty($this->item->video_credits)): ?>
                	  <span class="itemVideoCredits"><?php echo $this->item->video_credits; ?></span>
                	  <?php endif; ?>
                
                	  <div class="clr"></div>
                  </div>
                  <?php }else{?>
                  
                  <?php } ?>
                  <div class="hovercover">
                        <div class="hovericon"><i class="hoverlink"></i></div>
                   </div>
            </a> 
        </div>
        </figure>
        
	  <?php }else if($this->item->params->get('catItemExtraFields') && count($this->item->extra_fields) ) { $check_media ='extra'; ?>
    	  <!-- Item extra fields -->
          <section class="flexslider post-img">
    	  <div class="media">
    	  	<!--<h4><?php //echo JText::_('K2_ADDITIONAL_INFO'); ?></h4> -->
    	  	<ul class="slides mediaholder stk2-slider">
    			<?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
    			<?php if($extraField->value != ''): ?>
    			<li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
    				<a class="mfp-gallery" href="#"> 
                        <?php if($extraField->type == 'header'): ?>
        				<h4 class="catItemExtraFieldsHeader"><?php //echo $extraField->name; ?></h4>
        				<?php else: ?>
        				<span class="catItemExtraFieldsLabel"><?php //echo $extraField->name; ?></span>
        				<span class="catItemExtraFieldsValue"><?php echo $extraField->value; ?></span>
        				<?php endif; ?>
                        <div class="hovercover">
                              <div class="hovericon"><i class="hoverzoom"></i></div>
                         </div>
                    </a>
    			</li>
    			<?php endif; ?>
    			<?php endforeach; ?>
    			</ul>
    	    <div class="clr"></div>
    	  </div>
          </section>
       <?php } ?>
     
      <section class="post-content">
            <header class="meta">
              <h2>
                <?php if($this->item->params->get('catItemTitle')): ?>
            	  <!-- Item title -->
            			<?php if(isset($this->item->editLink)): ?>
            			<!-- Item edit link -->
            			<span class="catItemEditLink">
            				<a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>">
            					<?php echo JText::_('K2_EDIT_ITEM'); ?>
            				</a>
            			</span>
            			<?php endif; ?>
            
            	  	<?php if ($this->item->params->get('catItemTitleLinked')): ?>
            			<a href="<?php echo $this->item->link; ?>">
            	  		<?php echo $this->item->title; ?>
            	  	</a>
            	  	<?php else: ?>
            	  	<?php echo $this->item->title; ?>
            	  	<?php endif; ?>
                    <?php endif; ?>
              </h2>
              <ul>
                    <?php if($this->item->params->get('catItemDateCreated')): ?>
                    <li><?php echo date('d M Y',strtotime($this->item->created)); ?></li>
                    <?php endif; ?>
                  <!-- <li>
                        <a href="#">
                            <?php if($this->item->params->get('catItemAuthor')): ?>
                    	
                    		<span class="catItemAuthor">
                    			<?php //echo K2HelperUtilities::writtenBy($this->item->author->profile->gender); ?> 
                    			<?php if(isset($this->item->author->link) && $this->item->author->link): ?>
                    			<a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
                    			<?php else: ?>
                    			<?php echo $this->item->author->name; ?>
                    			<?php endif; ?>
                    		</span>
                    		<?php endif; ?>
                        </a>
                        
                   </li> -->
                   <li>
                		<?php if($this->item->params->get('catItemCategory')): ?>
                		<!-- Item category name -->
                			<span><?php // echo JText::_('K2_PUBLISHED_IN'); ?></span>
                			<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
                	
                		<?php endif; ?>
                   
                   </li>
                   <li>
                    <?php if($this->item->params->get('catItemCommentsAnchor') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
                	<!-- Anchor link to comments below -->
                	<div class="catItemCommentsLink">
                		<?php if(!empty($this->item->event->K2CommentsCounter)): ?>
                			<!-- K2 Plugins: K2CommentsCounter -->
                			<?php echo $this->item->event->K2CommentsCounter; ?>
                		<?php else: ?>
                			<?php if($this->item->numOfComments > 0): ?>
                			<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
                				<?php echo $this->item->numOfComments; ?> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
                			</a>
                			<?php else: ?>
                			<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
                				<?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
                			</a>
                			<?php endif; ?>
                		<?php endif; ?>
                	</div>
                	<?php endif; ?>
                   </li>
              </ul>
              
            </header>
            <?php if($this->item->params->get('catItemIntroText')): ?>
            <!-- Item introtext -->
            <div class="catItemIntroText">
            <?php 
                if ($check_media == 'extra'){
                    echo substr(strip_tags($this->item->introtext),0,450).' [...]';
                }else if ($check_media == 'video'){
                    echo substr(strip_tags($this->item->introtext),0,280).' [...]';
                }else if ($check_media === true){
                    echo substr($this->item->introtext,0,1300).' [...]';
                }else{
                    echo substr(strip_tags($this->item->introtext),0,200).' [...]';
                }
                 
            ?>
            </div>
            <?php endif; ?>
            <div class="clr"></div>
            <?php if ($this->item->params->get('catItemReadMore')): ?>
        	<!-- Item "read more..." link -->
        	<div class="catItemReadMore">
        		<a class="button line-color" href="<?php echo $this->item->link; ?>" style="text-transform: capitalize;">
        			<?php echo str_replace('.','',JText::_('K2_READ_MORE')); ?>
        		</a>
        	</div>
        	<?php endif; ?>
        
        	<div class="clr"></div>
      </section>
<div class="catItemHeader">
	  	<?php if($this->item->params->get('catItemFeaturedNotice') && $this->item->featured): ?>
	  	<!-- Featured flag -->
	  	<span>
		  	<sup>
		  		<?php echo JText::_('K2_FEATURED'); ?>
		  	</sup>
	  	</span>
	  	
	  <?php endif; ?>

		
  </div>
	 

	  

	  <!-- Plugins: AfterDisplayContent -->
	  <?php echo $this->item->event->AfterDisplayContent; ?>

	  <!-- K2 Plugins: K2AfterDisplayContent -->
	  <?php echo $this->item->event->K2AfterDisplayContent; ?>

	  <div class="clr"></div>
  </div>

  <?php if(
  $this->item->params->get('catItemTags') ||
  $this->item->params->get('catItemAttachments')
  ): ?>
  <div class="catItemLinks">

		

	  <?php if($this->item->params->get('catItemTags') && count($this->item->tags)): ?>
	  <!-- Item tags -->
	  <div class="catItemTagsBlock">
		  <span><?php echo JText::_('K2_TAGGED_UNDER'); ?></span>
		  <ul class="catItemTags">
		    <?php foreach ($this->item->tags as $tag): ?>
		    <li><a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a></li>
		    <?php endforeach; ?>
		  </ul>
		  <div class="clr"></div>
	  </div>
	  <?php endif; ?>

	  <?php if($this->item->params->get('catItemAttachments') && count($this->item->attachments)): ?>
	  <!-- Item attachments -->
	  <div class="catItemAttachmentsBlock">
		  <span><?php echo JText::_('K2_DOWNLOAD_ATTACHMENTS'); ?></span>
		  <ul class="catItemAttachments">
		    <?php foreach ($this->item->attachments as $attachment): ?>
		    <li>
			    <a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>">
			    	<?php echo $attachment->title ; ?>
			    </a>
			    <?php if($this->item->params->get('catItemAttachmentsCounter')): ?>
			    <span>(<?php echo $attachment->hits; ?> <?php echo ($attachment->hits==1) ? JText::_('K2_DOWNLOAD') : JText::_('K2_DOWNLOADS'); ?>)</span>
			    <?php endif; ?>
		    </li>
		    <?php endforeach; ?>
		  </ul>
	  </div>
	  <?php endif; ?>

		<div class="clr"></div>
  </div>
  <?php endif; ?>

	<div class="clr"></div>


  <?php if($this->item->params->get('catItemImageGallery') && !empty($this->item->gallery)): ?>
  <!-- Item image gallery -->
  <div class="catItemImageGallery">
	  <h4><?php echo JText::_('K2_IMAGE_GALLERY'); ?></h4>
	  <?php echo $this->item->gallery; ?>
  </div>
  <?php endif; ?>

  <div class="clr"></div>
	

	<?php if($this->item->params->get('catItemDateModified')): ?>
	<!-- Item date modified -->
	<?php if($this->item->modified != $this->nullDate && $this->item->modified != $this->item->created ): ?>
	<span class="catItemDateModified">
		<?php echo JText::_('K2_LAST_MODIFIED_ON'); ?> <?php echo JHTML::_('date', $this->item->modified, JText::_('K2_DATE_FORMAT_LC2')); ?>
	</span>
	<?php endif; ?>
	<?php endif; ?>

  <!-- Plugins: AfterDisplay -->
  <?php echo $this->item->event->AfterDisplay; ?>

  <!-- K2 Plugins: K2AfterDisplay -->
  <?php echo $this->item->event->K2AfterDisplay; ?>

	<div class="clr"></div>
</div>
<!-- End K2 Item Layout -->
