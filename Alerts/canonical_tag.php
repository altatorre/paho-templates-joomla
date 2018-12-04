<?php
	//*****************************************************************
	// CONCEPT-BR TOOL FOR ADDING CANONICIAL TAG IN JOOMLA 1.5 to 2.5
	// VERSION: 0.2.3
	// DATE: 06/2014
	// MODIFIED BY: Juan Carlos Diaz - PAHO
	// CREATOR: JR    Source: http://www.concept-br.de/blog/canonical-tag-for-joomla/
	// Special version a: with com_topics
	// ****************************************************************
	
	
	// ****************************************************************
	// SETTINGS SECTION
	// ****************************************************************
	
	$force_http_base = true; // set this to "true" will set canonical url starts with "http://...."		
	
	
	
	// ****************************************************************
	// CODE - DON'T CHANGE ANYTHING FROM HERE !!!!
	// ****************************************************************
	
	// ensure helper
	// =============
	if(!class_exists('ContentHelperRoute')) require_once (JPATH_SITE . '/components/com_content/helpers/route.php');  
	if(!class_exists('TopicHelperRoute')) require_once (JPATH_SITE . '/components/com_topics/helpers/route.php');  
	
	// get base url 
	// ============
	$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
	if($force_http_base) $protocol = "http"; 
	$base_url = strtolower($protocol."://".$_SERVER['HTTP_HOST']); // comment this line out to force HTTP
	
	
	// check if root path or no article (e.g. any extension is loaded) => nothing to do
	// ====================================================
	
	//$url_to_parse = str_replace("/?", "/index.php?", $_SERVER['REQUEST_URI']);
	$url_to_parse = str_replace("sitesearch=http://www.paho.org/", "sitesearch=http%3A%2F%2Fwww.paho.org%2F", $_SERVER['REQUEST_URI']);


	$url_parts = parse_url($url_to_parse);
	$clean_uri = $url_parts['path'];
	$clean_uri = strtolower($clean_uri);
// 	echo "clean_uri:".$clean_uri;
	if (strpos($clean_uri, "?") !== false) $clean_uri = reset(explode("?", $clean_uri));
	
	// get current article id 
	$article_id = JRequest::getVar('id');
	$catid = JRequest::getVar('catid');
	$view = JRequest::getVar('view');
	$option = JRequest::getVar('option');
	$task = JRequest::getVar('task');
	$gid = JRequest::getVar('gid');
	
	if($clean_uri != "" && $article_id > 0 && $view == 'article' && $option == 'com_content')
	{
		// http://www.concept-br.de/blog/canonical-tag-for-joomla/
		// get current menu url for canonical meta tag creation
		// ====================================================			
		
		// get url for article


		$db_can	=& JFactory::getDBO();
		$query_can =
		"SELECT a.title AS title, c.title AS category, a.sectionid as sectionid, " .
			" CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(':', a.id, a.alias) ELSE a.id END as slug, " .
			" CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(':', c.id, c.alias) ELSE c.id END as catslug FROM #__content AS a ".
			" LEFT JOIN #__categories AS c ON c.id = a.catid WHERE a.state = 1 AND a.id=".intval($article_id)." ORDER BY a.catid, a.ordering";		
			//echo "<!-- $query_can  -->";
		$db_can->setQuery( $query_can );			
		$items_can = $db_can->loadObjectList();
		$link = ContentHelperRoute::getArticleRoute($article_id);
		foreach($items_can as $item_can) {	
			// echo "\n <!-- ".$item_can->slug."--".$item_can->catslug."--".$item_can->sectionid. " -->";
			$link = ContentHelperRoute::getArticleRoute($item_can->slug, $item_can->catslug, $item_can->sectionid);
		}			
	
      		$needles = array(
        		'article'  => (int) $article_id,
        		'category' => (int) $catid,
       			'section'  => 0,
      		);

			// Si no encuentra el Itemid luego de preguntarle al sistema lo toma de la dirección de entrada. 
		$item = ContentHelperRoute::_findItem($needles);	
		$positemid=stripos($_SERVER['REQUEST_URI'], "Itemid=");
		if ($positemid > 0) { 
			$cadena = substr( $_SERVER['REQUEST_URI'], $positemid + 7);
			$myitem = (int) $cadena;
			
		}

		$sysitemid = (int) JApplication::getItemid($article_id);
		if (($sysitemid != 0) && ($myitem != $systemid)) { 
			//$myitem = $sysitemid; 	
			$link = str_replace( "&amp;Itemid=".$myitem, "&amp;Itemid=".$sysitemid, $link); 			
		}

			// Posiciona el Itemid, en caso de que no venga. 
		if ((stripos( $link, "&amp;Itemid=") === FALSE) && (stripos( $link, "&Itemid=") === FALSE) ) {
			if (stripos( $link, "&amp;lang=") === FALSE) {
				$link .= "&amp;Itemid=".$sysitemid;
			} else {
				$link = str_replace( "&amp;lang=", "&amp;Itemid=".$sysitemid."&amp;lang=", $link); 			
			}
		} 
		$link = JRoute::_($link);
	

		$canonical_value = $base_url.$link; 						
	}
	else if($clean_uri != "" && $article_id > 0 && $view == 'category' && $option == 'com_content')
	{
		// get current menu url for canonical meta tag creation
		// ====================================================                                                
		
		// get url for category
		//$link = JRoute::_(ContentHelperRoute::getArticleRoute($article_id));       
		$link = JRoute::_(ContentHelperRoute::getCategoryRoute($article_id, 0));                                                     
		
		// set value
		$canonical_value = $base_url.$link;                                                                                         
	}
	else if($clean_uri != "" && $article_id > 0 && $option == 'com_topics')
	{
		// get current menu url for canonical meta tag creation
		// ====================================================                                                
		
		// get url for article
		$link = TopicHelperRoute::getTopicRoute($article_id);				
		//$link = JRoute::_('index.php?option=com_topics&id='.$article_id);				
		
	     	$needles = array(
	        	'id'  => (int) $article_id,
	      	);

			// Si no encuentra el Itemid luego de preguntarle al sistema lo toma de la dirección de entrada. 
		$item = TopicHelperRoute::_findItem($needles);	
		$positemid=stripos($_SERVER['REQUEST_URI'], "Itemid=");
		if ($positemid > 0) { 
			$cadena = substr( $_SERVER['REQUEST_URI'], $positemid + 7);
			$myitem = (int) $cadena;
			
		}

		$sysitemid = (int) JApplication::getItemid($article_id);
		if (($sysitemid != 0) && ($myitem != $systemid)) { 
			$myitem = $sysitemid; 	
		}

			// Posiciona el Itemid, en caso de que no venga. 
		if (stripos( $link, "&amp;Itemid=") === FALSE) {
			if (stripos( $link, "&amp;lang=") === FALSE) {
				$link .= "&amp;Itemid=".$myitem;
			} else {
				$link = str_replace( "&amp;lang=", "&amp;Itemid=".$myitem."&amp;lang=", $link); 			
			}
		}  

		// set value
		$link = JRoute::_($link);	
		$canonical_value = $base_url.$link;                                                                                         
	} 
	else if($clean_uri != "" && $gid > 0 && $task == 'doc_details' && $option == 'com_docman')
	{
		// get current menu url for canonical meta tag creation
		// ====================================================                                                
		
		// get url for category
		//$link = JRoute::_(ContentHelperRoute::getArticleRoute($article_id));       
		$Itemid = DOCMAN_Utils::getItemid();
		$link = JRoute::_("index.php?option=com_docman"."&task=doc_details&gid=".$gid."&Itemid=".$Itemid);
		
		// set value
		$canonical_value = $base_url.$link;                                                                                         
	} 
	else if($clean_uri == "")
	{		
		// root dir => nothing to do. set base url
		$canonical_value = $base_url;
	}
	else
	{
		//unknown state
		$canonical_value = "";
	}
	if($canonical_value != "")
	{
		$canonical_value = str_replace(":", "%3A", $canonical_value );
		$canonical_value = str_replace("http%3A", "http:", $canonical_value );
		$canonical_value = str_replace("./", "/", $canonical_value );
		$canonical_value = str_replace("./", "/", $canonical_value );
		$canonical_value = str_replace("%20/", "/", $canonical_value );
		$canonical_value = str_replace("%20/", "/", $canonical_value );
	?>
		<!--canonical tag-->	
	<link rel="canonical" href="<?php echo($canonical_value); ?>" /> 
		
	<?php
	}

