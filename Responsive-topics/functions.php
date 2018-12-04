<?php defined( '_JEXEC' ) or die( 'Restricted access' );

class Joomla_Template {
	var $template = '';
	var $config = '';
	var $menuitem = '';

		// https://cweiske.de/tagebuch/php4-constructors-php7.htm	
	function __construct($template) {
		$this->template = $template->template;
		$this->config = new JConfig();
		// original: $this->menuitem = JSite::getMenu();
		// https://forum.joomla.org/viewtopic.php?t=828964
		$this->menuitem = JFactory::getApplication()->getMenu();
	}

	function sitename() {
		return $this->config->sitename;
	}

	function base_url() {
		return JUri::base();
	}

	function template_url() {
		return JUri::base()."templates/".$this->template;
	}

	function is_home() {
		if ($this->menuitem->getActive() == $this->menuitem->getDefault()) return true;
		return false;
	}

	function is_front_page() {
		return (JRequest::getCmd( 'view' ) == 'featured') ;
	}

}

?>