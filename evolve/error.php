<?php 

$app = JFactory::getApplication();
$doc = JFactory::getDocument();

$params = $app->getTemplate(true)->params;
$page_404 = $params->get('xml_404_page',0);
$menu = $app->getMenu();
$item = $menu->getItem( $page_404 );
if (($this->error->getCode()) == '404') {
	$app->redirect(JRoute::_($item->link.'&Itemid='.$page_404));
exit;
}
?>