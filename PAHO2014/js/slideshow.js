function moverback() {
	var esqda = jQuery("#contentbox-wrapper").position().left;
	var tmp = Math.abs(parseInt(esqda/740));
	esqda = esqda + 740;
	if (esqda == 740) {
		esqda = -2960;
		newgoto('#foto6', this);
	}
	if ((esqda/740)===+(esqda/740) && (esqda/740)!==((esqda/740)|0)) {
		esqda = tmp * 740 * -1;
	}
	esqda = esqda + "px";
	jQuery("#contentbox-wrapper").animate({"left": esqda}, 500);
}

function moverfwd() {
	var esqda = jQuery("#contentbox-wrapper").position().left;
	var tmp = Math.abs(parseInt(esqda/740));
	esqda = esqda - 740;
	if (esqda == -4440) {
		esqda = -740;
		newgoto('#foto1', this);
	}
	if ((esqda/740)===+(esqda/740) && (esqda/740)!==((esqda/740)|0)) {
		esqda = (tmp+1) * 740 * -1;
	}
	sqda = esqda + "px";
	jQuery("#contentbox-wrapper").animate({"left": esqda}, 500);
	for (ix=0; ix < 5; ix++) {
		document.getElementById('circle' + ix).style.background = '#FF6E19';
	}
	var foto = Math.abs(parseInt(esqda/740));
	if (foto == 5) { foto = 0; }
	document.getElementById('circle'+foto).style.background = '#258';
}

function goto(id, t){	
	//animate to the div id.
	jQuery("#contentbox-wrapper").animate({"left": -(jQuery(id).position().left)}, 600);
	// remove "active" class from all links inside #nav
	jQuery('#nav a').removeClass('active');
	// add active class to the current link
	jQuery(t).addClass('active');	
}

function newgoto(id, t){	
	//animate to the div id.
	jQuery("#contentbox-wrapper").animate({"left": -(jQuery(id).position().left)}, 0);
	// remove "active" class from all links inside #nav
		jQuery('#nav a').removeClass('active');
	// add active class to the current link
	jQuery(t).addClass('active');	
}
jQuery(function() {
	document.getElementById('circle0').style.background = '#258';
    setInterval( "moverfwd()", 6000 );
});

