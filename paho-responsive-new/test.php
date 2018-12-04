<?php 

	
	$url_to_parse = '/hq/index.php?option=com_search&amp;scope=1&amp;Itemid=&amp;ie=utf8&amp;client=amro_en&amp;proxystylesheet=amro_en&amp;output=xml_no_dtd&amp;oe=UTF-8&amp;getfields=doctype&amp;site=amro_alias&amp;q=severe+acute+malnourished+child&amp;sitesearch=http://www.paho.org/hq&amp;filter=0&amp;ulang=&amp;ip=10.2.1.81&amp;access=p&amp;entqr=3&amp;entqrm=0&amp;lr=lang_es&amp;ud=1&amp;sort=date%3AD%3AS%3Ad1&amp;lang=en';
	$url_to_parse = str_replace("sitesearch=http://www.paho.org/", "sitesearch=http%3A%2F%2Fwww.paho.org%2F", $url_to_parse);
	$url_parts = parse_url($url_to_parse);
	$clean_uri = $url_parts['path'];
echo "test2";
	print_r ($url_parts);
echo "<br />";

?>listo2