<?php
/**
 * Health Topics Component
 * by Paulo Leite - 2014
 */

defined('_JEXEC') or die('Restricted access');

$app = JFactory::getApplication();
$lang = JFactory::getLanguage();
$lang = $lang->getTag();
$menu = $app->getMenu();
$component = JComponentHelper::getComponent('com_topics');
$items	= $menu->getItems('component_id', $component->id);
$document = JFactory::getDocument();
?>
<div class="heading col-xs-12">
<h1 class="blue"><?php echo JText::_( 'HEALTH_TOPICS' ); ?></h1>

<?php
$k = 0;
// readout of the data sets in the array
$inicial = "";
$terminos = array();
$cuentaterminos=1;
$rows = $this->topics;
//translate(&$rows);
if ($lang == 'es-ES') {
	asort( $rows );
	$document->setTitle( 'OPS OMS | Temas de Salud' );
} else {
	ksort( $rows );
	$document->setTitle( 'PAHO WHO | Health Topics' );
}
foreach ($rows as $row) {
	if (count($rows)>0) {
		if (ord($row->topic[0]) != 195) {
			// para introducir Á igual con A para el orden
			if (strtolower($row->topic[0]) != $inicial) {
				$inicial = strtolower($row->topic[0]);
			}
		}
		switch($row->id) {
			default:
					// gets url for article
					foreach($items as $item) {
						if (@$item->query['id'] == $row->id) {
							break;
						}
					}
					if ($row->Itemid < 30000) { $row->Itemid = ''; }

					$query = "SELECT * FROM `#__menu` WHERE `link` = 'index.php?option=com_topics&view=single&alias=" . $row->alias . "';";
					$database = JFactory::getDbo();
					$database -> setQuery($query);
					$rowsa = $database->loadObjectList();
					$Itemid_calc = 0;
					if(count($rowsa)>0){
						foreach($rowsa as $rowa){
							$Itemid_calc = $rowa->id;
						}
					}

					if ($Itemid_calc == 0) {
						$query2 = "SELECT * FROM `#__falang_content` WHERE `reference_field`='link' and `value` = 'index.php?option=com_topics&view=single&alias=" . $row->alias . "';";
						$database -> setQuery($query2);
						$rowsa2 = $database->loadObjectList();
						if(count($rowsa2)>0){
							foreach($rowsa2 as $rowa2){
								$Itemid_calc = $rowa2->reference_id;
							}
						}
					}
					
					//$item = 'index.php?option=com_topics&amp;view=article&amp;id=' . $row->id . '&amp;Itemid=' . $row->Itemid;
					$item = 'index.php?option=com_topics&amp;view=single&amp;alias=' . $row->alias;
					if ($Itemid_calc > 0) $item .= '&amp;Itemid=' . $Itemid_calc;
					$link_tmp = JRoute::_($item);
					$terminos[$cuentaterminos] = array ("url" => $link_tmp, "term" => $row->topic, "strong" => "No", "definition" => $row->definition, "photo" => $row->photo );
				/* } */
			$cuentaterminos++;
		} 
	$k = 1 - $k;
	}
}
?>

<!-- begin: plainbox columns -->
<!--
<div class="plainbox columns" style="outline: 1px solid red;">
        
<div class="col_2-1_2">&nbsp;</div>
<div class="clear"></div>
</div><!-- end: plainbox columns -->

<!-- begin: tabs countries -->
<div id="tabs" class="countries">

<!-- selector
<ul class="tabs" style="list-style: none">
<li class="tab_info"><span class="indexes_keyboard"><?php echo JText::_( 'TYPE_WORD_LOOKING_FOR' ); ?></span></li>
</ul>  -->

<div class="tab" id="alphabetical">
<div class="indexes columns">

<?php
$inicial = "";
$cuantosterminos = count($terminos);
$maxcolumnas = 3;
$cuantosterminosvan = 0;
$msg="";
$comenzandocolumna=1;

 // Calculo de la posicion relativa y del maximo calculado
$maxposicionrelativa = 0;
$letrasporcolumna=38;
foreach ( $terminos as $terminoactual )
{
	if ($inicial != strtolower($terminoactual['term'][0])) { 
		$maxposicionrelativa+=3;
		$inicial = strtolower($terminoactual['term'][0]);
		//echo "<br />".$terminoactual['term'][0]." -- ";
	}
	$maxposicionrelativa=$maxposicionrelativa+(floor(strlen($terminoactual['term'])/$letrasporcolumna)+1);  /// aqui habria que calcular cuantas lineas tiene el termino para ser mas exactos. 
	//echo $maxposicionrelativa." ";
}

// Visualizacion en columnas

$posicionrelativa = 0;
$inicial = "";
$cuantosenestaletra = 0;
$anteriorcolumna=0;

$columnaactual = 1;
$cualcolumna=0;
$cuantosenestacolumna =0;
$longitudcolumna = (int)(($maxposicionrelativa+3)/$maxcolumnas);
foreach ( $terminos as $terminoactual )
{
	$columnaactual = floor($maxcolumnas*($posicionrelativa/$maxposicionrelativa ))+1;
	if ($anteriorcolumna != $columnaactual) { 
		$inicial = "";
		if ($columnaactual > 1) {
			$msg = " <span class=\"information\">".JText::_( 'CONTINUED' )."</span>";
			$columnaanterior = $columnaactual-1;
			echo "</ul></div></div> <!--end col_1-1-1_".$columnaanterior." -->\n";
		}	 
		echo "<div class=\"col_1-1-1_".$columnaactual."\">\n";
		$comenzandocolumna=1;
		$cuantosenestacolumna =0;
		$anteriorcolumna=$columnaactual;
		$posicionrelativa=$posicionrelativa-3; 
	} 

	if ($inicial != strtolower($terminoactual['term'][0])) { 
		if ($comenzandocolumna==1) { 
			$comenzandocolumna = 0; 
		} else { 
			echo "</ul></div>\n"; 
		}
?>
<div class="largebox">
<h3 class="largebox_title"><?php echo $terminoactual['term'][0]; ?><?php echo $msg; ?></h3>
<ul class="index">
<?php
		$inicial = strtolower($terminoactual['term'][0]);
		$posicionrelativa+=3;
		$msg = "";
		$cuantosenestaletra = 0;
	}
		echo "     <li><a href='$terminoactual[url]' target=\"_top\"><span>".$terminoactual['term']."  ";
		if ($terminoactual['definition'] != "") { echo "<!-- <small>d</small> -->"; }
		if ($terminoactual['photo'] != "") { echo "<!-- <small>i</small> -->"; }
		echo "</span></a></li>\n";
	$cuantosterminosvan++;
	$posicionrelativa = $posicionrelativa +(floor(strlen($terminoactual['term'])/$letrasporcolumna)+1); // calcular el alto en renglones para ser mas exacto. 
	$cuantosenestaletra++;
	$cuantosenestacolumna++;
}
		?>
</ul>		
                  </div> <!-- end large box --> 
		      </div> <!--end col_1-1-1_3 -->
        
<div class="clear"></div>	
</div><!-- end: indexes column-->
</div><!-- end: tab alphabetical -->
					</div>			
</div>
<?php
function translate(&$rows){
	global $database;
   $aQuery = " AND `JF`.`published` = 1 AND `JF`.`reference_field` = 'topic' and `JF`.`reference_table` = 'topics' and `JF`.`language_id` = 3 ORDER by `topic`";
	global $lang;
   	$currentLang = $lang;
		if($currentLang == 'es'){
			foreach ($rows as $row) {
         $query = "SELECT `JF`.* FROM `#__jf_content` AS `JF` WHERE `JF`.`reference_id` = " . $row->id;
         $query .= $aQuery;
		$database = &JFactory::getDbo();
         $database -> setQuery($query);
         $rowsa = $database->loadObjectList();
         if(count($rowsa)>0){
         	foreach($rowsa as $rowa){
            	$row->topic = $rowa->value;
				}
			}
		}
	}
}
?>