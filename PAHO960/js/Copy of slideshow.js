function moverback() {
	var esqda = $("#contentbox-wrapper").position().left;
	var tmp = Math.abs(parseInt(esqda/690));
	esqda = esqda + 690;
	if (esqda == 690) {
		esqda = -2760;
		newgoto('#foto6', this);
	}
	if ((esqda/690)===+(esqda/690) && (esqda/690)!==((esqda/690)|0)) {
		esqda = tmp * 690 * -1;
	}
	esqda = esqda + "px";
	$("#contentbox-wrapper").animate({"left": esqda}, 500);
}

function moverfwd() {
	var esqda = $("#contentbox-wrapper").position().left;
	var tmp = Math.abs(parseInt(esqda/690));
	esqda = esqda - 690;
	if (esqda == -4140) {
		esqda = -690;
		newgoto('#foto1', this);
	}
	if ((esqda/690)===+(esqda/690) && (esqda/690)!==((esqda/690)|0)) {
		esqda = (tmp+1) * 690 * -1;
	}
	sqda = esqda + "px";
	$("#contentbox-wrapper").animate({"left": esqda}, 500);
	for (ix=0; ix < 5; ix++) {
		document.getElementById('circle' + ix).style.background = '#FF6E19';
	}
	var foto = Math.abs(parseInt(esqda/690));
	if (foto == 5) { foto = 0; }
	document.getElementById('circle'+foto).style.background = '#258';
}

function goto(id, t){	
	//animate to the div id.
	$("#contentbox-wrapper").animate({"left": -($(id).position().left)}, 600);
	// remove "active" class from all links inside #nav
	$('#nav a').removeClass('active');
	// add active class to the current link
	$(t).addClass('active');	
}

function newgoto(id, t){	
	//animate to the div id.
	$("#contentbox-wrapper").animate({"left": -($(id).position().left)}, 0);
	// remove "active" class from all links inside #nav
		$('#nav a').removeClass('active');
	// add active class to the current link
	$(t).addClass('active');	
}
$(function() {
	document.getElementById('circle0').style.background = '#258';
    setInterval( "moverfwd()", 6000 );
});

