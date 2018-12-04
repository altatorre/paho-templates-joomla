jQuery(document).ready(function(){
    jQuery('.widget_latest_posts ul li').each(function(){
        if (!jQuery(this).find('i.icon-chevron-right').hasClass('.icon-chevron-right')){
            jQuery(this).find('>a').before('<i class="icon-chevron-right"></i>');
        }
    });
    /**pagination **/
    jQuery('a[title="Start"] i').addClass('icon-step-backward'); 
    jQuery('a[title="End"] i').addClass('icon-fast-forward'); 
    jQuery('a[title="Prev"] i').addClass('icon-step-backward'); 
    jQuery('a[title="Next"] i').addClass('icon-step-forward'); 
    jQuery('i.icon-first').addClass('icon-fast-backward'); 
    jQuery('a i.icon-previous').addClass('icon-step-backward'); 
    jQuery('a i.icon-next ').addClass('icon-step-forward'); 
    jQuery('a i.icon-last').addClass('icon-fast-forward'); 
    /** Item k2 slider **/
    jQuery('.stk2-slider .mfp-gallery').each(function(){
        var stk2_src = jQuery(this).find('.catItemExtraFieldsValue img').attr('src');
        jQuery(this).attr('href',stk2_src);
    });
    jQuery('.icon-reorder').click(function(){
        var check_menu_mobile = jQuery('body.site').attr('data-menu-position');
        if (check_menu_mobile == 'closed'){
            jQuery('.site #jPanelMenu-menu').addClass('st-menu-mobile');
            jQuery('.site .mega-submenu').addClass('mega-submenu-opend');
            jQuery('.site .mega-submenu li').addClass('mega-submenu-opend');
            jQuery('.site .mega-submenu li img').addClass('mega-submenu-opend-img');
        }
    });
    jQuery('.menu >li').each(function(index){
        if (jQuery(this).find('>span').hasClass('separator')){
            jQuery(this).addClass('stmeunu-separator');
        }
        jQuery(this).hover(function(){
            var a_width = jQuery(this).find('>a').width()+parseFloat(jQuery(this).find('>a').css('padding-left'))+parseFloat(jQuery(this).find('>a').css('padding-right'));
            var ul_sub_width = jQuery(this).find('.mega-submenu').width()+parseFloat(jQuery(this).find('.mega-submenu').css('padding-left'))+parseFloat(jQuery(this).find('.mega-submenu').css('padding-right'));
            var sub_left = parseFloat(a_width)-parseFloat(ul_sub_width)+'px !important';
            var el = jQuery(this).find('.mega-submenu');
            if (el.hasClass('mega-rtl')){  
                el.css('left',sub_left);
                console.log(sub_left);jQuery('head').append('<style>.st-rtl{left:'+sub_left+'; }  </style>')
                el.addClass('st-rtl');
            };  
        },function(){
                jQuery(this).find('.mega-submenu').hide();
        })  
    })
});
jQuery(window).resize(function(){
    jQuery('.site #jPanelMenu-menu').removeClass('st-menu-mobile');
    jQuery('.site .mega-submenu').removeClass('mega-submenu-opend');
    jQuery('.site .mega-submenu li').removeClass('mega-submenu-opend');
    jQuery('.site .mega-submenu li img').removeClass('mega-submenu-opend-img')
	/** get width window **/
	var w_window = jQuery(window).width(); 
	if (w_window < 1200){
		jQuery('.our-clients .happy-clients-photo').addClass('happy-resize');
		jQuery('.happy-clients-cite i.ss-navigateleft').hide();
		jQuery('.our-clients .happy-clients-author').addClass('happy-author-resize');
	}else{
	   jQuery('#header').addClass('menu-window')
		jQuery('.our-clients .happy-clients-photo').removeClass('happy-resize');
		jQuery('.happy-clients-cite i.ss-navigateleft').show();
		jQuery('.our-clients .happy-clients-author').removeClass('happy-author-resize');
	}
})