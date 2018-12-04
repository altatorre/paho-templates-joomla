jQuery('.st-camera-slider').each(function(){
    var bg_loader_color = jQuery(this).attr('data-bgcolor-loader');
    var color_loader = jQuery(this).attr('data-color-loader');
    var st_easing = jQuery(this).attr('data-easing');
    var color_loader = jQuery(this).attr('data-color-loader');
    var st_easing = jQuery(this).attr('data-easing');
    var st_pie_position = jQuery(this).attr('data-pie-position');
    var st_pagi = jQuery(this).attr('data-pagi');
    if (st_pagi == 'true'){
        st_pagi = true;
    }else{
        st_pagi = false;
    }
    var st_show_thumbnail = jQuery(this).attr('data-show-thumbnail');
    if (st_show_thumbnail == 'true'){
        st_show_thumbnail = true;
    }else{
        st_show_thumbnail = false;
    }
    var check_hover = jQuery(this).attr('data-hover-check');
    jQuery(this).camera({
				height: '50%',
				pagination: st_pagi,
				thumbnails: st_show_thumbnail,
				imagePath: '../images/',
                loaderColor:color_loader,
                loaderBgColor: bg_loader_color,
                easing:st_easing,
                piePosition: st_pie_position
			});
})

