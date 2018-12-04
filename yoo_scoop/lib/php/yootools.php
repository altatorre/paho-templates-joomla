<?php
/**
* @package   yoo_scoop Template
* @version   1.5.0 2009-03-02 15:12:48
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
*/

class YOOTools {

	/* parameters */
	var $params;

	/* internal settings */
	var $internal;

	/* javascript settings */
	var $javascript;

	/* module settings */
	var $modules;

	/* browser */
	var $browser;

	function YOOTools() {
		
		$file         = dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'params.ini';
		$this->params = $this->loadParams($file);

		$this->internal = array(
			// menu
			"accordionMenu"       => array("mainmenu" => 2, "othermenu" => 1, "usermenu" => 1)
			);
		
		$this->javascript = array(
			// template
			"tplurl"              => "'<VAL>'",
			// color
			"color"               => "'<VAL>'",
			"itemColor"           => "'<VAL>'",
			// layout
			"layout"              => "'<VAL>'");
		
		// ie browser
		if (array_key_exists('HTTP_USER_AGENT', $_SERVER)) {
			$is_ie7 = strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'msie 7') !== false;
			$is_ie6 = strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'msie 6') !== false;
			$this->browser['ie7'] = $is_ie7;
			$this->browser['ie6'] = !$is_ie7 && $is_ie6;
		}		
	}

	function &getInstance() {
		static $instance;

		if ($instance == null) {
			$instance = new YOOTools();
		}
		
		return $instance;
	}

	/* CSS */

	function addCSS(&$document) {
		$baseurl     = $document->baseurl.'/templates/'.$document->template;
		$color       = $this->getCurrentColor();
		
		if ($this->getParam('gzip')) {
			$document->addStyleSheet($baseurl.'/css/template.css.php?color='.$color);
		} else {
			$document->addStyleDeclaration($this->getCSS());
			$document->addStyleSheet($baseurl.'/css/template.css');
			if ($color != '' && $color != 'default') {
				$document->addStyleSheet($baseurl.'/css/'.$color.'/'.$color.'-layout.css');
			}
			if ($this->isIe(7)) {
				$document->addStyleSheet($baseurl.'/css/iehacks.css');
				$document->addStyleSheet($baseurl.'/css/ie7hacks.css');
			}
			if ($this->isIe(6)) {
				$document->addStyleSheet($baseurl.'/css/iehacks.css');
				$document->addStyleSheet($baseurl.'/css/ie6hacks.css');
				if ($color != '' && $color != 'default') {
					// $document->addStyleSheet($baseurl.'/css/'.$color.'/'.$color.'-ie6hacks.css');
				}
			}
			// $document->addStyleSheet($baseurl.'/css/custom.css');
		}
	}

	function getCSS() {
		return 'div.wrapper { width: '.intval($this->getParam('width')).'px; }';
	}

	function loadCSS($file) {
		if (is_readable($file)) {
			$content = file_get_contents($file);
			$content = str_replace('../../images/', '../images/', $content);
			echo $content;
		}
	}

	/* Javascript */

	function addJavaScript(&$document) {
		$baseurl = $document->baseurl.'/templates/'.$document->template;
		$script  = '<script type="text/javascript" src="%s"></script>';
		
		if ($this->getParam('gzip')) {
			$scripts[] = sprintf($script, $baseurl.'/lib/js/template.js.php');
		} else {
			$scripts[] = sprintf($script, $baseurl.'/lib/js/addons/base.js');
			$scripts[] = sprintf($script, $baseurl.'/lib/js/addons/accordionmenu.js');
			$scripts[] = sprintf($script, $baseurl.'/lib/js/addons/fancymenu.js');
			$scripts[] = sprintf($script, $baseurl.'/lib/js/addons/dropdownmenu.js');
			$scripts[] = sprintf($script, $baseurl.'/lib/js/yoo_tools.js');
		}

		$document->addScriptDeclaration($this->getJavaScript());
		$document->addCustomTag(implode("\n", $scripts) . "\n");
	}
		
	function getJavaScript() { 
		$js = "var YtSettings = { ";
		$separator = false;
		foreach($this->javascript as $key => $val) {
			$setting = $this->getParam($key);
			if(is_bool($setting)) {
				$setting ? $setting = "true" : $setting = "false";
			}
			if(is_float($setting)) {
				$setting = number_format($setting, 2, ".", "");
			}
			$separator ? $js .= ", " : $separator = true;			
			$js .= $key . ": " . str_replace("<VAL>", $setting, $val);
		}		
		$js .= " };";
		return $js;
	}

	/* Modules */

	function setModulePosition($position, $values) {
		$this->modules[$position] = $values;
	}

	function getModulePosition($position) {
		$document = &JFactory::getDocument();
		if (!is_array($position)) $position = array($position);
		
		foreach ($position as $pos) {
			if (isset($this->modules[$pos]) && $count = $document->countModules($pos)) {
				// force to disable module cache
				$modules =& JModuleHelper::getModules($pos);
				$total   = count($modules);
				for ($i = 0; $i < $total; $i++) {
					if (strpos($modules[$i]->params, "cache=")) {
						$modules[$i]->params  = preg_replace('/cache=(.*)/i', 'cache=0', $modules[$i]->params);
					} else {
						$modules[$i]->params .= "cache=0\n";
					}
				}
				// module position params
				$max = count($this->modules[$pos]);
				if ($count > $max) $count = $max;
				$params = array();
				$params['name'] = $pos;
				$params['count'] = $count;
				$params['values'] = $this->modules[$pos][$count];
				return $params;
			}
		}
		
		return false;
	}

	function renderModulePosition(&$position) {
		if ($count = count($position['values'])) {
			$params = array();
			$params['name'] = $position['name'];
			$params['order'] = $position['count'] - $count;
			$params['width'] = array_shift($position['values']);
			$params['separator'] = $count > 1 ? 'separator' : '';
			return $params;
		}
		
		return false;
	}
	
	/* Colorswitcher */
	
	function getCurrentColor() {
		$color  = isset($_COOKIE['ytcolor']) ? $_COOKIE['ytcolor'] : $this->getParam('color');
		
		if(isset($_GET['yt_color'])) {
			setcookie('ytcolor', $_GET['yt_color'], time() + 3600, '/'); 
			$color = $_GET['yt_color'];
		}

		return $color;
	}

	function getCurrentToolsColor() {
		$tools = $this->getParam('tools');
		
		if (is_array($tools) && array_key_exists($this->getCurrentColor(), $tools)) {
			return $tools[$this->getCurrentColor()];
		}
		
		return '';
	}	

	function getActiveMenuItemNumber($menu, $level) {
		$jmenu    = &JSite::getMenu();
		$active   = $jmenu->getActive();
		$menutype = isset($active) ? $active->menutype : null;
		$path     = isset($active) ? $active->tree : array();
				
		if ($menu == $menutype && array_key_exists($level, $path)) {
			$item = $jmenu->getItem($path[$level]);
			return $item->ordering;
		}
		
		return null;
	}

	/* Browser */

	function isIe($version) {
		if (array_key_exists('ie'.$version, $this->browser)) {
			return $this->browser['ie'.$version];
		}
		return false;
	}

	function setHeader($type = 'html') {
		$content_type = 'text/html';
		if ($type == 'css') $content_type = 'text/css; charset: UTF-8';
		if ($type == 'js')  $content_type = 'application/x-javascript';
		
		if (extension_loaded('zlib') && !ini_get('zlib.output_compression')) @ob_start('ob_gzhandler');
		header('Content-type: '.$content_type);
		header('Expires: '.gmdate('D, d M Y H:i:s', time() + 86400).' GMT');
	}

	/* Parameter*/
	
	function getParam($key, $default = '') {
		if (array_key_exists($key, $this->internal)) {
			return $this->internal[$key];
		} 

		if (array_key_exists($key, $this->params)) {
			return $this->params[$key];
		}

		return $default;
	}

	function setParam($key, $value = '') {
		$this->internal[$key] = $value;
	}

	function loadParams($file) {
		$params = array();
		
		if (is_file($file)) {
			$handle = fopen($file, 'r');
			if ($handle !== false) {
				while ($l = fgets($handle)) {
					if (preg_match('/^#/', $l) == false) {
						if (preg_match('/^(.*?)=(.*?)$/', $l, $regs)) {
							$params[$regs[1]] = $regs[2];
						}
					}
				}
				@fclose($handle);
			}
		}
		
		return $params;
	}

}

?>