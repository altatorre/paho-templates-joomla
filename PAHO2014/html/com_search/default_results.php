<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php 

function Reemplazar($mystring, $findme, $replaceby) {
	while (strpos($mystring, $findme)>0)  {
		$mystring = substr_replace($mystring, $replaceby, strpos($mystring, $findme), strlen($findme));
	}
	
	return $mystring;
}	

		$q = urlencode($this->searchword);
		$cx = $this->cx;
		$sa = $this->sa;
		$cof = urlencode($this->cof);
		$searchphrase = urlencode($this->searchphrase);
		$ie = $this->ie;
		$scope = $this->scope;
		$option = $this->option;
		$Itemid = $this->Itemid;
 		
		$sa = str_replace(' ', '', $sa);
 		
		$urlgoogle = 'http://www.google.com/cse?cx=' . $cx . '&q='. $q . '&searchword=' . $q . '&sa=' . $sa;
		$urlgoogle .= '&cof=' . $cof . '&searchphrase=' . $searchphrase . '&ie=' . $ie . '&scope=' . $scope;
		$urlgoogle .= '#gsc.tab=0&gsc.q=' . $q . '&gsc.page=1';
		// echo '<a href="' . $urlgoogle . '">Click here to see the google version</a> '.$urlgoogle; 

		$file_handle = fopen( $urlgoogle, "r");

		$show = 1;

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
	$mystring = Reemplazar($mystring, '</body>', '');
	$mystring = Reemplazar($mystring, '</html>', '');

	
	
	if ( strpos($mystring, '!DOCTYPE' ) > 0  ) { $show = 1 - $show; }
	if ( strpos($mystring, 'jsapi' ) > 0  ) { $show = 1 - $show; }
	if ( strpos($mystring, '/body' ) > 0  ) { $show = 1 - $show; }
	
	if ( $show == 1) {  echo $mystring; 
	 } 
}

fclose($file_handle); 

?>