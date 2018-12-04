<?php defined( '_JEXEC' ) or die( 'Restricted access' );

class Joomla_Template {
	var $template = '';
	var $config = '';
	var $menuitem = '';

	function Joomla_Template ($template) {
		$this->template = $template->template;
		$this->config = new JConfig();
		$this->menuitem = JFactory::getApplication()->getMenu();
	}

	function sitename() {
		return $this->config->sitename;
	}

	function base_url() {
		return JURI::base();
	}

	function template_url() {
		return JURI::base()."templates/".$this->template;
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