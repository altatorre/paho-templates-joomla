<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php 

function Reemplazar($mystring, $findme, $replaceby) {
	while (strpos($mystring, $findme)>0)  {
		$mystring = substr_replace($mystring, $replaceby, strpos($mystring, $findme), strlen($findme));
	}
	
	return $mystring;
}	

function currentPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
function currentDir() {
	$serveruri = $_SERVER["REQUEST_URI"];
	$pos_quest_mark = strpos($serveruri,'?');
	$dir_name = substr($serveruri,0,$pos_quest_mark);
	$pos_indexphp_calc = strlen($dir_name) - 9;
	$pos_indexphp_real = strrpos($dir_name,"index.php");
	if ($pos_indexphp_calc == $pos_indexphp_real) $dir_name = substr($dir_name,0,$pos_indexphp_calc);
	$last_char = $dir_name[strlen($dir_name)-1];
	if ($last_char == '/') $dir_name = substr($dir_name,0,strlen($dir_name)-1);
	return $dir_name;
}

		mysql_connect('hq-int-sql-01', 'busquedas', 'LkJ3.aMmoQW36$qwUkmas');
		$searchdb = mysql_select_db('busquedas');
		if(!$searchdb) {
			die("Unable to select database");
		}
		global $db;
		$web1 = $_SERVER['REQUEST_URI'];
		$query = "INSERT INTO search_log (`searchphrase`, `searchip`, `searchurl`, `host`, `web`) VALUES ('".urlencode($this->searchword)."', '".$_SERVER['REMOTE_ADDR']."', '".$this->cx.$this->site."', '".gethostbyaddr($_SERVER['REMOTE_ADDR'])."', '".currentDir()."')";
		mysql_query($query);
	//echo "guardado";
		mysql_close();


			// Lectura de parámetros
		$q = urlencode($this->searchword); 
		$cx = $this->cx;
		$sa = $this->sa;
		$cof = urlencode($this->cof);
		$searchphrase = urlencode($this->searchphrase);
		$ie = $this->ie;
		$scope = $this->scope;
		$option = $this->option;
		$Itemid = $this->Itemid;
		$client = $this->client;
		$proxystylesheet = $this->proxystylesheet; 
		$lr = $this->lr;
		$site = $this->site;
		$site = $this->site;
		$as_q = $this->as_q;
		$as_ft = $this->as_ft;
		$as_occt = $this->as_occt;
		$as_dt = $this->as_dt;
		$num = $this->num;
		$btnG = $this->btnG;
		$output = $this->output;
		$getfields = $this->getfields;
		$oe = $this->oe;
		$ie = $this->ie;
		$as_sitesearch = $this->as_sitesearch;
		$ulang = $this->ulang;
		$ip = $this->ip;
		$access = $this->access;
		$sort = $this->sort;
		$entqr = $this->entqr;
		$entqrm = $this->entqrm;
		$entsp = $this->entsp;
		$ud = $this->ud;
		$start = $this->start;
		$access = $this->access;
		$filter = $this->filter;
		$proxycustom = $this->proxycustom;
		$swrnum = $this->swrnum;
 	  		
		$sa = str_replace(' ', '', $sa);

			// 20140107 Juan Carlos Diaz. Control de errores por consultas incompletas.
		if ($sa == '') $sa = 'Buscar...';
		if ($ie == '') $ie = 'utf8';
		if ($site == '') $site = 'amro_alias'; // otro valor posible 'who' 

		$r = JFactory::getLanguage();
		$lang = substr($r->_lang,0,2);
		if ($lang != '') {
			if ($client == '') $client = 'amro_'.$lang;
			if ($proxystylesheet == '') $proxystylesheet = 'amro_'.$lang;
		} else {
			if ($client == '') $client = '_en';
			if ($proxystylesheet == '') $proxystylesheet = 'amro';
		}
		// echo "<p>" . $lang . "</p>\n";
		if ($output == '') $output = 'xml_no_dtd';
		if ($oe == '') $oe = 'utf8';
		if ($getfields == '') $getfields = 'doctype';
		if (($scope != 1) && ($scope !=2)) { $scope=3; }

 		
		$urlgoogle = 'http://www.google.com/cse?cx=' . $cx . '&q='. $q . '&searchword=' . $q . '&sa=' . $sa;
		$urlgoogle .= '&cof=' . $cof . '&searchphrase=' . $searchphrase . '&ie=' . $ie . '&scope=' . $scope;
		$urlgoogle .= '#gsc.tab=0&gsc.q=' . $q . '&gsc.page=1';


			if ($scope == 1) {
				$site = 'amro_alias'; 
				$sitesearch = "http://".$_SERVER["SERVER_NAME"].currentDir();			
				$sitesearch = str_replace(':', '%3A', $sitesearch);
				$sitesearch = str_replace('/', '%2F', $sitesearch);
			}
			if ($scope == 2) $site = 'amro_alias'; 
			if ($scope == 3) { $site = 'who'; 
				$proxystylesheet = 'amro';
			}
			
			$urlwho1 = "http://search.who.int/search?ie=utf8&client=" . $client . "&proxystylesheet=" . $proxystylesheet . "&output=xml_no_dtd&oe=utf8&getfields=doctype";


			if ($scope == 2) $site = 'amro_alias'; 
			if ($scope == 3) $site = 'who'; 
			if ($site != "" ) { $urlwho1 .= "&site=".$site; } 
			if ($q != "" ) { $urlwho1 .= "&q=".$q; } 
			if ($ulang != "" ) { $urlwho1 .= "&ulang=".$ulang; } 
			if ($ip != "" ) { $urlwho1 .= "&ip=".$ip; } 
			if ($access != "" ) { $urlwho1 .= "&access=".$access; } 
			if ($sort != "" ) { $urlwho1 .= "&sort=".$sort; } 
			if ($entqr != "" ) { $urlwho1 .= "&entqr=".$entqr; } 
			if ($entqrm != "" ) { $urlwho1 .= "&entqrm=".$entqrm; } 
			if ($entsp != "" ) { $urlwho1 .= "&entsp=".$entsp; } 
			if ($start != "" ) { $urlwho1 .= "&start=".$start; } 
			if ($sitesearch != "" ) { $urlwho1 .= "&sitesearch=".$sitesearch; } 

			if ($as_epq != "" ) { $urlwho1 .= "&as_epq=".$as_epq; } 
			if ($as_oq != "" ) { $urlwho1 .= "&as_oq=".$as_oq; } 
			if ($as_q != "" ) { $urlwho1 .= "&as_q=".$as_q; } 
			if ($as_eq != "" ) { $urlwho1 .= "&as_eq=".$as_eq; } 
			if ($lr != "" ) { $urlwho1 .= "&lr=".$lr; } 
			if ($as_ft != "" ) { $urlwho1 .= "&as_ft=".$as_ft; } 
			if ($as_filetype != "" ) { $urlwho1 .= "&as_filetype=".$as_filetype; } 
			if ($as_occt != "" ) { $urlwho1 .= "&as_occt=".$as_occt; } 
			if ($as_dt != "" ) { $urlwho1 .= "&as_dt=".$as_dt; } 
			if ($as_sitesearch != "" ) { $urlwho1 .= "&as_sitesearch=".$as_sitesearch; } 
			if ($num != "" ) { $urlwho1 .= "&num=".$num; } 
			if ($btnG != "" ) { $urlwho1 .= "&btnG=".$btnG; } 
			if ($proxycustom != "" ) { $urlwho1 .= "&proxycustom=<ADVANCED/>"; } // echo "&proxycustom=".$proxycustom;
			if ($swrnum != "" ) { $urlwho1 .= "&swrnum=".$swrnum; }
			
			if (($scope == 1) && ($as_q == "" )) {
				$urlwho1 .= "&filter=0";
			} else {
				if ($filter != "" ) { $urlwho1 .= "&filter=".$filter; }
			}
			
			$urlwho1 = Reemplazar($urlwho1, ' ', '+');
			$urlwhoext = $urlwho1;
			/* $urlwhoext = Reemplazar($urlwho1, 'proxystylesheet=amro_en', 'proxystylesheet=_en');
			$urlwhoext = Reemplazar($urlwho1, 'proxystylesheet=amro', 'proxystylesheet=_en'); */

		if ( /* ($scope == 1) || ($scope == 2) || */ ($scope == 3)) { // para incluir a la OPS, incluir (($scope == 1) || ($scope == 2))
			// A traves de WHO
			
			
			//echo $urlwho1;
			//$urlgoogle = 'http://www.paho.org/searchwho/search.php?q='. $q . '&ie=' . $ie . '&site=' . $site . '&client=' . $client . '&proxystylesheet='. $proxystylesheet . '&output=xml_no_dtd&oe=utf8&getfields=doctype';		
			//$urlgoogle = $urlwho1;
			//echo "<a target=\"_blank\" href=\"".$urlgoogle."\">.</a> ";
			
			$urlwho1 = filter_var($urlwho1, FILTER_SANITIZE_STRING);
			$context = stream_context_create(array('http'=>array('timeout'=>10)));
			$file_handle = fopen( $urlwho1, "r", false, $context);
			
			if ($file_handle == null) { 
				$urlwho = "http://search.who.int/search?ie=utf8&site=".$site."&client=' . $client . '&proxystylesheet=' . $proxystylesheet . '&output=xml_no_dtd&oe=utf8&getfields=doctype&q=".$q;
				$urlwho = $urlwho1;
				echo "<a target=\"_blank\" href=\"".$urlwho."\">..</a>";
				$urlwho = filter_var($urlwho, FILTER_SANITIZE_STRING);
				$context = stream_context_create(array('http'=>array('timeout'=>10)));
				$file_handle = fopen( $urlwho, "r", false, $context);
			}

			$show = 1;
			$show = 0; 
			//$Itemid = 40118; 

			if ($file_handle != null) {  
				
				while (!feof($file_handle)) { 
					$line = fgets($file_handle);
					$mystring = $line;
		
					$mystring = Reemplazar($mystring, '800px', '400px');
					$mystring = Reemplazar($mystring, '100%;', '80%;');
					$mystring = Reemplazar($mystring, '<!DOCTYPE html>', '');
					$mystring = Reemplazar($mystring, '<html dir="ltr">', '');
					$mystring = Reemplazar($mystring, '<head>', '');
					$mystring = Reemplazar($mystring, '<meta http-equiv="content-type" content="text/html; charset=UTF-8" />', '');
					$mystring = Reemplazar($mystring, '<title>Google Custom Search</title>', '');
					$mystring = Reemplazar($mystring, 'font color="#346803" size="100%"', 'font color="#346803"'); 
						// Esta siguiente hay que cambiarla, por ahora se ha puesto así. 
					//$mystring = Reemplazar($mystring, '/bah/search.php', 'http://www.paho.org/searchwho/search.php');
				 	//$mystring = Reemplazar($mystring, 'action="search"', '?option=com_search&amp;scope='.$scope.'&amp;');
				 	$mystring = Reemplazar($mystring, 'action="search"', 'action="?option=com_search&amp;scope='.$scope.'"');
				 	// Se añade una pequeña diferencia en el segundo para que no se vuelva búsqueda recursiva. (espacio en blanco antes del segundo atributo)
				 	//$mystring = Reemplazar($mystring, '<input type="text" name="as_q"', '<input type="hidden" name="option" value="com_search"><input type="hidden" name="scope" value="'.$scope.'"><input type="text"  name="as_q"');
				 	$mystring = Reemplazar($mystring, '<input type="hidden" name="client" value="_', '<input type="hidden" name="option" value="com_search"><input type="hidden" name="scope" value="'.$scope.'"><input type="hidden" name="Itemid" value="'.$Itemid.'"><input type="hidden"  name="client" value="_');
				 	
				 	$mystring = Reemplazar($mystring, 'search?', '?option=com_search&amp;scope='.$scope.'&amp;Itemid='.$Itemid.'&amp;');
				 	$mystring = Reemplazar($mystring, 'proxycustom=<ADVANCED/&gt;', 'proxycustom=ADVANCED');
				 	//$mystring = Reemplazar($mystring, 'ctype="keymatch"', 'ctype = "keymatch" style="display:none"');
				 	$mystring = Reemplazar($mystring, '/?', '?');
					//$mystring = Reemplazar($mystring, '/bah/?option=com_search', '/bah/?option=com_search&scope='.$scope);
				 	$mystring = Reemplazar($mystring, '&nbsp;<b>Search</b>', '');
					
					$mystring = Reemplazar($mystring, '</body>', '');
					$mystring = Reemplazar($mystring, '</html>', '');
	
				 
					//$mystring = Reemplazar($mystring, 'search.php?', 'sssearch.php?');
					$mystring = Reemplazar($mystring, 'iframe', 'pre');
	
					/* if ( strpos($mystring, '!DOCTYPE' ) > 0  ) { $show = 1 - $show; }
					//if ( strpos($mystring, 'HTML>' ) > 0  ) { $show = 1 - $show; }
					if ( strpos($mystring, '<html>' ) > 0 ) { $show = 0; }
					if ( strpos($mystring, '<html><head>' ) > 0 ) { $show = 0; }
					if ( strpos($mystring, '<!-- Please enter html code below. -->' ) > 0 ) { $show = 0; } */
					
					if ( strpos($mystring, '<!--tro2-->' ) > 0 ) { $show = 1;  } 
					if ( strpos($mystring, '<!-- begin: searchresult -->' ) > 0 ) { $show = 1;  }
					if ( strpos($mystring, 'class="main-results-without-dn"' ) > 0 ) { $show = 1;  } 
					if ( strpos($mystring, 'class="g"' ) > 0 ) { $show = 1;  } 
 
					if ( strpos($mystring, '<!-- end: searchresult -->' ) > 0 ) { $show = 0;  }
					if ( strpos($mystring, '<!-- Please enter html code below. -->' ) > 0 ) { $show = 0; } 
					//if ( $mystring == '<!--tro2-->' ) { $show = 1; echo ".."; }  

					if ( strpos($mystring, 'bgcolor="#e5ecf9"' ) > 0 ) { $show = 1;  } 
					if ( $show == 1) {  echo $mystring;  }
						// considerar valores que permitan mostrar y cambiar luego si es el caso.
					//if ( strpos($mystring, 'main-results-without-dn' ) > 0 ) { $show = 0; } 
					

				}
	
				fclose($file_handle); 
			} else { echo "No se pudo conectar con :<a target=_blank href=".$urlgoogle.">".$urlgoogle."</a>"; } 
			
		} else {
			//echo "<style>#cse-header { display:none; }</style>";
			//  a través de Google
			$urlgoogle = filter_var($urlgoogle, FILTER_SANITIZE_STRING);
			$context = stream_context_create(array('http'=>array('timeout'=>10)));
			$file_handle = fopen( $urlgoogle, "r", false, $context);
			$show = 1;

			if ($file_handle != null) { 
				while (!feof($file_handle)) {
				$line = fgets($file_handle);
				$mystring = $line;
	
				$mystring = Reemplazar($mystring, '800px', '100%');
				$mystring = Reemplazar($mystring, '42em', '100%');
				$mystring = Reemplazar($mystring, 'https%3A', 'http%3A');
				$mystring = Reemplazar($mystring, 'https://www.paho.org', 'http://www.paho.org');

				//$mystring = Reemplazar($mystring, '#cse-header {', '#cse-header { display:none; } #cse-header  {');
				$mystring = Reemplazar($mystring, 'Arial,', 'Verdana, Arial ,');

				//$mystring = Reemplazar($mystring, '100%;', '80%;');
				$mystring = Reemplazar($mystring, '<!DOCTYPE html>', '');
				$mystring = Reemplazar($mystring, '<html dir="ltr">', '');
				$mystring = Reemplazar($mystring, '<head>', '');
				$mystring = Reemplazar($mystring, '<meta http-equiv="content-type" content="text/html; charset=UTF-8" />', '');
				$mystring = Reemplazar($mystring, '<title>Google Custom Search</title>', '<title></title>');
				$mystring = Reemplazar($mystring, '</body>', '');
				$mystring = Reemplazar($mystring, '</html>', '');
	
				if ( strpos($mystring, '!DOCTYPE' ) > 0  ) { $show = 1 - $show; }
				if ( strpos($mystring, 'jsapi' ) > 0  ) { $show = 1 - $show; }
				if ( strpos($mystring, '/body' ) > 0  ) { $show = 1 - $show; }
	
				if ( $show == 1) {  echo $mystring; 
				 } 
			}

			fclose($file_handle); 
			} else { echo "ERROR: Cannot connect to :<a target=_blank href=".$urlgoogle.">".$urlgoogle."</a>"; } 
		}
		echo "<p style=\"clear:both\"><br />Other searches: <a target=\"_blank\" href=\"".$urlgoogle."\">Previous search</a> | ";
		echo "<a target=\"_blank\" href=\"".$urlwhoext."\">WHO search</a></p>";		
			
?>