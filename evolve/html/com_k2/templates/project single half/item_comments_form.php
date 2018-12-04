<?php
/**
 * @version		$Id: item_comments_form.php 1992 2013-07-04 16:36:38Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

?>

<div>
    <h3 class="headline">Add Comment</h3>
    <span class="brd-headling"></span>
    <div class="clearfix"></div>
    <?php if($this->params->get('commentsFormNotes')): ?>
    <p class="itemCommentsFormNotes" style="display: none;">
    	<?php if($this->params->get('commentsFormNotesText')): ?>
    	<?php echo nl2br($this->params->get('commentsFormNotesText')); ?>
    	<?php else: ?>
    	<?php echo JText::_('K2_COMMENT_FORM_NOTES') ?>
    	<?php endif; ?>
    </p>
    <?php endif; ?>
    <div class="contact">
        <form action="<?php echo JURI::root(true); ?>/index.php" method="post" id="comment-form" class="form-validate">
        	<div class="fields">
                <div >
                	<label class="formName" for="userName"><?php echo JText::_('K2_NAME'); ?> *</label> 
                	<input  class="inputbox" type="text" name="userName" id="userName"  />
                </div> 
                <div >
                	<label class="formEmail" for="commentEmail"><?php echo JText::_('K2_EMAIL'); ?> *</label>
                	<input  class="inputbox" type="text" name="commentEmail" id="commentEmail" />
                </div> 
                <div>
                    <label class="formComment" for="commentText"><?php echo JText::_('K2_MESSAGE'); ?> </label>
                	<textarea style="width: 100%; margin-bottom: 20px;" rows="4" cols="1" class="inputbox"  name="commentText" id="commentText"></textarea>
        
                </div>
            </div>
        	<!--<label class="formUrl" for="commentURL" "><?php echo JText::_('K2_WEBSITE_URL'); ?></label>
        	<input class="inputbox" type="text" name="commentURL" id="commentURL" style="display: none;" value="<?php echo JText::_('K2_ENTER_YOUR_SITE_URL'); ?>"  onblur="if(this.value=='') this.value='<?php echo JText::_('K2_ENTER_YOUR_SITE_URL'); ?>';" onfocus="if(this.value=='<?php echo JText::_('K2_ENTER_YOUR_SITE_URL'); ?>') this.value='';" />
            *</label>-->
            
        	<?php if($this->params->get('recaptcha') && ($this->user->guest || $this->params->get('recaptchaForRegistered', 1))): ?>
        	<label class="formRecaptcha"><?php echo JText::_('K2_ENTER_THE_TWO_WORDS_YOU_SEE_BELOW'); ?></label>
        	<div id="recaptcha"></div>
        	<?php endif; ?>
        
        	<input type="submit" class="add-comment-btn" value="<?php echo 'Post Comment'; ?>" />
        
        	<span id="formLog"></span>
        
        	<input type="hidden" name="option" value="com_k2" />
        	<input type="hidden" name="view" value="item" />
        	<input type="hidden" name="task" value="comment" />
        	<input type="hidden" name="itemID" value="<?php echo JRequest::getInt('id'); ?>" />
        	<?php echo JHTML::_('form.token'); ?>
        </form>
    </div>
</div>