/* template.js, Copyright (C) 2007 - 2010 YOOtheme GmbH */

var YOOTemplate = {
		
	start: function() {

		/* Match height of div tags */
		YOOTemplate.matchHeights();

		/* Accordion menu */
		new YOOAccordionMenu('div#middle ul.menu li.toggler', 'ul.accordion', { accordion: 'slide' });

		/* Dropdown menu */
		var dropdown = new YOODropdownMenu('menu', { mode: 'slide', dropdownSelector: 'div.dropdown', transition: Fx.Transitions.Expo.easeOut });
		dropdown.matchHeight();

		/* set hover color */
		var hoverColor;
		switch (YtSettings.color) {
			case 'combsblue':
			case 'waveblue':
				hoverColor = '#00a8ff';
				break;
			case 'barblue':
				hoverColor = '#00c0ff';
				break;
			case 'barorange':
			case 'waveyellow':
				hoverColor = '#ff7800';
				break;
			case 'bargreen':
			case 'wavegreen':
				hoverColor = '#83c500';
				break;
			default:
				hoverColor = '#C8001E';
		}

		/* Morph: main menu - level2 (color) */
		var menuEnter = { 'color': hoverColor};
		var menuLeave = { 'color': '#323232'};

		new YOOMorph('div#menu a.level2 span.bg', menuEnter, menuLeave,
			{ transition: Fx.Transitions.linear, duration: 0 },
			{ transition: Fx.Transitions.sineIn, duration: 500 });

		/* Morph: mod-chrome sub menu - level1 */
		// cambiojc 20130412 se anularon los efectos del color del menú al hacer hover. 
		// se adicionó un estily en menu.css. linea 367
		// var submenuEnter = { 'color': hoverColor};
		// var submenuLeave = { 'color': '#C8C8C8' };

		new YOOMorph('div.mod-chrome-white ul.menu span.bg', submenuEnter, submenuLeave,
			{ transition: Fx.Transitions.expoOut, duration: 0 },
			{ transition: Fx.Transitions.sineIn, duration: 300 });

		/* Morph: mod-chrome sub menu (color variations) - level1 */
		var submenuEnter = { 'color': hoverColor};
		var submenuLeave = { 'color': '#323232' };

		new YOOMorph('div.mod-chrome-black ul.menu span.bg, div.mod-chrome-blue ul.menu span.bg, div.mod-chrome-green ul.menu span.bg, div.mod-chrome-orange ul.menu span.bg', submenuEnter, submenuLeave,
			{ transition: Fx.Transitions.expoOut, duration: 0 },
			{ transition: Fx.Transitions.sineIn, duration: 300 });

		/* Morph: mod-line sub menu - level1 */
		var submenuEnter = { 'color': hoverColor, 'background-color': '#F5F5F5', 'padding-left': 5};
		var submenuLeave = { 'color': '#646464', 'background-color': '#ffffff', 'padding-left': 0};

		new YOOMorph('div.mod-line ul.menu span.bg', submenuEnter, submenuLeave,
			{ transition: Fx.Transitions.expoOut, duration: 100 },
			{ transition: Fx.Transitions.sineIn, duration: 300 });

		/* Smoothscroll */
		new SmoothScroll({ duration: 500, transition: Fx.Transitions.Expo.easeOut });
	},

	/* Match height of div tags */
	matchHeights: function() {
		YOOBase.matchHeight('div.headerbox div.deepest', 20);
		YOOBase.matchHeight('div.topbox div.deepest', 20);
		YOOBase.matchHeight('div.bottombox div.deepest', 20);
		YOOBase.matchHeight('div.maintopbox div.deepest', 20);
		YOOBase.matchHeight('div.mainbottombox div.deepest', 20);
		YOOBase.matchHeight('div.contenttopbox div.deepest', 20);
		YOOBase.matchHeight('div.contentbottombox div.deepest', 20);
	}

};

/* Add functions on window load */
window.addEvent('domready', YOOTemplate.start);
