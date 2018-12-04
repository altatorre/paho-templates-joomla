/* Copyright (C) 2007 - 2009 YOOtheme GmbH */

var YOOTools = {
		
	start: function() {
		
		/* Match height of div tags */
		YOOTools.setDivHeight();

		/* Accordion menu */
		new YOOAccordionMenu('div#middle ul.menu li.toggler', 'ul.accordion', { accordion: 'slide' });

		/* Fancy menu */
		//new YOOFancyMenu($E('ul', 'menu'), { mode: 'fade', transition: Fx.Transitions.linear, duration: 500 });

		/* Dropdown menu */
		new YOODropdownMenu('div#menu li.parent', { mode: 'height', transition: Fx.Transitions.Expo.easeOut });

		/* Morph: color settings */
		var page = $('page');
		
		var enterColor = '#B45046';
		if (page.hasClass('green'))     enterColor = '#97AF82';
		if (page.hasClass('pink'))      enterColor = '#B995B1';
		if (page.hasClass('orange'))    enterColor = '#D1934E';
		if (page.hasClass('blue'))      enterColor = '#639FB7';
		if (page.hasClass('yellow'))    enterColor = '#AEAC57';
		if (page.hasClass('lilac'))     enterColor = '#87829D';
		if (page.hasClass('turquoise')) enterColor = '#789696';
		if (page.hasClass('black'))     enterColor = '#3C372D';
		
		/* Morph: main menu - level1 (background) */
		var menuEnter = { 'background-color': enterColor };
		var menuLeave = { 'background-color': '#E6E6D2' };
		
		new YOOMorph('div#menu li.level1', menuEnter, menuLeave,
			{ transition: Fx.Transitions.linear, duration: 100, ignoreClass: 'active'},
			{ transition: Fx.Transitions.sineIn, duration: 300 }, '.level1');

		/* Morph: main menu - level2 and deeper (background) */
		menuEnter = { 'margin-left': 0, 'margin-right': 0, 'text-indent': 20 };
		menuLeave = { 'margin-left': 5, 'margin-right': 5, 'text-indent': 15 };
		
		var selector = 'div#menu li.level2 a, div#menu li.level2 span.separator';
		/* fix for Opera because Mootools 1.1 is not compatible with latest Opera version */
		if (window.opera) { selector = 'div#menu li.item1 li.level2 a, div#menu li.item1 li.level2 span.separator, div#menu li.item2 li.level2 a, div#menu li.item2 li.level2 span.separator, div#menu li.item3 li.level2 a, div#menu li.item3 li.level2 span.separator, div#menu li.item4 li.level2 a, div#menu li.item4 li.level2 span.separator, div#menu li.item5 li.level2 a, div#menu li.item5 li.level2 span.separator, div#menu li.item6 li.level2 a, div#menu li.item6 li.level2 span.separator, div#menu li.item7 li.level2 a, div#menu li.item7 li.level2 span.separator'; }
		
		new YOOMorph(selector, menuEnter, menuLeave,
			{ transition: Fx.Transitions.expoOut, duration: 0},
			{ transition: Fx.Transitions.sineIn, duration: 200 });
		
		/* Morph: main menu - level1 (color) */
		menuEnter = { 'color': '#ffffff' };
		menuLeave = { 'color': '#323232' };
		
		new YOOMorph('div#menu li.level1', menuEnter, menuLeave,
			{ transition: Fx.Transitions.linear, duration: 0, ignoreClass: 'active'},
			{ transition: Fx.Transitions.sineIn, duration: 200 }, '.level1');

		/* Morph: main menu - level1 subline (color) */
		menuEnter = { 'color': '#ffffff' };
		menuLeave = { 'color': '#646464' };
		
		new YOOMorph('div#menu li.level1', menuEnter, menuLeave,
			{ transition: Fx.Transitions.linear, duration: 0, ignoreClass: 'active'},
			{ transition: Fx.Transitions.sineIn, duration: 200 }, 'span.sub');

		/* Morph: sub menu (left/right) */
		submenuEnter = { 'margin-left': 0, 'margin-right': 0, 'padding-left': 5 };
		submenuLeave = { 'margin-left': 5, 'margin-right': 5, 'padding-left': 0 };

		new YOOMorph('div#middle ul.menu a, div#middle ul.menu span.separator', submenuEnter, submenuLeave,
			{ transition: Fx.Transitions.expoOut, duration: 0 },
			{ transition: Fx.Transitions.sineIn, duration: 200 });

		/* Morph: module (hover) */
		var moduleEnter = { 'background-color': '#F5F5E6'};
		var moduleLeave = { 'background-color': '#ffffff'};

		new YOOMorph('div.mod-hover div.box-2', moduleEnter, moduleLeave,
			{ transition: Fx.Transitions.expoOut, duration: 100 },
			{ transition: Fx.Transitions.sineIn, duration: 300 });

		/* Smoothscroll */
		new SmoothScroll({ duration: 500, transition: Fx.Transitions.Expo.easeOut });
	},

	/* Include script */
	include: function(library) {
		$ES('script').each(function(s, i){
			var src  = s.getProperty('src');
			var path = '';
			if (src && src.match(/yoo_tools\.js(\?.*)?$/)) path = src.replace(/yoo_tools\.js(\?.*)?$/,'');
			if (src && src.match(/template\.js\.php(\?.*)?$/)) path = src.replace(/template\.js\.php(\?.*)?$/,'');
			if (path != '') document.write('<script language="javascript" src="' + path + library + '" type="text/javascript"></script>');
		});
	},

	/* Match height of div tags */
	setDivHeight: function() {
		YOOBase.matchDivHeight('div.topbox div.deepest', 40);
		YOOBase.matchDivHeight('div.bottombox div.deepest', 40);
		YOOBase.matchDivHeight('div.maintopbox div.deepest', 40);
		YOOBase.matchDivHeight('div.mainbottombox div.deepest', 40);
		YOOBase.matchDivHeight('div.contenttopbox div.deepest', 40);
		YOOBase.matchDivHeight('div.contentbottombox div.deepest', 40);
	}

};

/* Add functions on window load */
window.addEvent('domready', YOOTools.start);

/* Load IE6 fix */
if (window.ie6) {
	YOOTools.include('addons/ie6fix.js');
	YOOTools.include('addons/ie6png.js');
	YOOTools.include('yoo_ie6fix.js');
}
