<?php
/**
 * @version 2.0.0
 * @package JEM
 * @subpackage JEM Module
 * @copyright (C) 2013-2014 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die;

?>


<?php if (count($items)): ?>
<ul class="jemmod<?php echo $params->get('moduleclass_sfx'); ?>">
	<?php foreach ($list as $item) : ?>
	<li class="jemmod<?php echo $params->get('moduleclass_sfx'); ?>">
		<?php 
			$cadenastring = strval($item->dateinfo);
			
			$posjemdate1 = stripos($cadenastring, "jem_date-1");
			if ($posjemdate1 == 0) $posjemdate1 = stripos($cadenastring, "2018")-12;
			$posano1 = $posjemdate1 + 12;
			$posmes1 = $posano1 + 5;
			$posdia1 = $posmes1 + 3;
			$ano1 = substr($cadenastring, $posano1, 4);
			$mes1 = substr($cadenastring, $posmes1 , 2);
			$dia1 = substr($cadenastring, $posdia1 , 2);
			
			$posjemdate2 = stripos($cadenastring, "jem_date-1", $posjemdate1+1);
			$ano2 = '';
			$mes2 = '';
			$dia2 = '';
			if ($posjemdate2 > 0) {
				$posano2 = $posjemdate2 + 12;
				$posmes2 = $posano2 + 5;
				$posdia2 = $posmes2 + 3;
				$ano2 = substr($cadenastring, $posano2 , 4);
				$mes2 = substr($cadenastring, $posmes2 , 2);
				$dia2 = substr($cadenastring, $posdia2 , 2);
			}
			$lang = JFactory::getLanguage()->getTag();
			
			if ($mes1 == "01") $mes1nombre = "Enero";
			if ($mes1 == "02") $mes1nombre = "Febrero";
			if ($mes1 == "03") $mes1nombre = "Marzo";
			if ($mes1 == "04") $mes1nombre = "Abril";
			if ($mes1 == "05") $mes1nombre = "Mayo";
			if ($mes1 == "06") $mes1nombre = "Junio";
			if ($mes1 == "07") $mes1nombre = "Julio";
			if ($mes1 == "08") $mes1nombre = "Agosto";
			if ($mes1 == "09") $mes1nombre = "Septiembre";
			if ($mes1 == "10") $mes1nombre = "Octubre";
			if ($mes1 == "11") $mes1nombre = "Noviembre";
			if ($mes1 == "12") $mes1nombre = "Diciembre";
			
			if ($mes2 == "01") $mes2nombre = "Enero";
			if ($mes2 == "02") $mes2nombre = "Febrero";
			if ($mes2 == "03") $mes2nombre = "Marzo";
			if ($mes2 == "04") $mes2nombre = "Abril";
			if ($mes2 == "05") $mes2nombre = "Mayo";
			if ($mes2 == "06") $mes2nombre = "Junio";
			if ($mes2 == "07") $mes2nombre = "Julio";
			if ($mes2 == "08") $mes2nombre = "Agosto";
			if ($mes2 == "09") $mes2nombre = "Septiembre";
			if ($mes2 == "10") $mes2nombre = "Octubre";
			if ($mes2 == "11") $mes2nombre = "Noviembre";
			if ($mes2 == "12") $mes2nombre = "Diciembre";			
						
			$dateinfoaux = $dia1;
			if ($mes1 != $mes2) $dateinfoaux .= " de ".$mes1nombre;
			if ($ano1 != $ano2) $dateinfoaux .= " de ".$ano1;
			if ($mes2nombre != '') $dateinfoaux .=  " - ".$dia2." de ".$mes2nombre." de ".$ano2;
			$item->dateinfo = $dateinfoaux;

			if (($lang=='en-US') || ($lang=='en-GB')) {

				if ($mes1 == "01") $mes1nombre = "January";
				if ($mes1 == "02") $mes1nombre = "February";
				if ($mes1 == "03") $mes1nombre = "March";
				if ($mes1 == "04") $mes1nombre = "April";
				if ($mes1 == "05") $mes1nombre = "May";
				if ($mes1 == "06") $mes1nombre = "June";
				if ($mes1 == "07") $mes1nombre = "July";
				if ($mes1 == "08") $mes1nombre = "August";
				if ($mes1 == "09") $mes1nombre = "September";
				if ($mes1 == "10") $mes1nombre = "October";
				if ($mes1 == "11") $mes1nombre = "November";
				if ($mes1 == "12") $mes1nombre = "December";
			
				if ($mes2 == "01") $mes2nombre = "January";
				if ($mes2 == "02") $mes2nombre = "February";
				if ($mes2 == "03") $mes2nombre = "March";
				if ($mes2 == "04") $mes2nombre = "April";
				if ($mes2 == "05") $mes2nombre = "May";
				if ($mes2 == "06") $mes2nombre = "June";
				if ($mes2 == "07") $mes2nombre = "July";
				if ($mes2 == "08") $mes2nombre = "August";
				if ($mes2 == "09") $mes2nombre = "September";
				if ($mes2 == "10") $mes2nombre = "October";
				if ($mes2 == "11") $mes2nombre = "November";
				if ($mes2 == "12") $mes2nombre = "December";			

				$dateinfoaux = $mes1nombre." ".$dia1;
				if ($ano1 != $ano2) $dateinfoaux .= ", ".$ano1;
				if ($mes2nombre != '') {
					$dateinfoaux .=  " - ";
					if ($mes1 != $mes2) $dateinfoaux .=  $mes2nombre.", ";
					$dateinfoaux .= $dia2.", ".$ano2;
				}
				$item->dateinfo = $dateinfoaux;
			}
			if ($lang=='pt-BR') {

				if ($mes1 == "01") $mes1nombre = "Janeiro";
				if ($mes1 == "02") $mes1nombre = "Fevereiro";
				if ($mes1 == "03") $mes1nombre = "Março";
				if ($mes1 == "04") $mes1nombre = "Abril";
				if ($mes1 == "05") $mes1nombre = "Maio";
				if ($mes1 == "06") $mes1nombre = "Junho";
				if ($mes1 == "07") $mes1nombre = "Julho";
				if ($mes1 == "08") $mes1nombre = "Agosto";
				if ($mes1 == "09") $mes1nombre = "Setembro";
				if ($mes1 == "10") $mes1nombre = "Outubro";
				if ($mes1 == "11") $mes1nombre = "Novembro";
				if ($mes1 == "12") $mes1nombre = "Dezembro";
			
				if ($mes2 == "01") $mes2nombre = "Janeiro";
				if ($mes2 == "02") $mes2nombre = "Fevereiro";
				if ($mes2 == "03") $mes2nombre = "Março";
				if ($mes2 == "04") $mes2nombre = "Abril";
				if ($mes2 == "05") $mes2nombre = "Maio";
				if ($mes2 == "06") $mes2nombre = "Junho";
				if ($mes2 == "07") $mes2nombre = "Julho";
				if ($mes2 == "08") $mes2nombre = "Agosto";
				if ($mes2 == "09") $mes2nombre = "Setembro";
				if ($mes2 == "10") $mes2nombre = "Outubro";
				if ($mes2 == "11") $mes2nombre = "Novembro";
				if ($mes2 == "12") $mes2nombre = "Dezembro";			

				$dateinfoaux = $dia1;
				if ($mes1 != $mes2) $dateinfoaux .= " de ".$mes1nombre;
				if ($ano1 != $ano2) $dateinfoaux .= " de ".$ano1;
				if ($mes2nombre != '') $dateinfoaux .=  " - ".$dia2." de ".$mes2nombre." de ".$ano2;
				$item->dateinfo = $dateinfoaux;
			}
		?>
		<?php if ($params->get('showtitloc') == 0 && $params->get('linkloc') == 1) : ?>
			<a href="<?php echo $item->venueurl; ?>" class="jemmod<?php echo $params->get('moduleclass_sfx'); ?> a_jem">
				<?php echo $item->text; ?>
			</a>
		<?php elseif ($params->get('showtitloc') == 1 && $params->get('linkdet') == 2) : ?>
			<a href="<?php echo $item->link; ?>" class="jemmod<?php echo $params->get('moduleclass_sfx'); ?> a_jem">
				<?php echo $item->text; ?>
			</a>
		<?php
			else :
				echo $item->text;
			endif;
		?>
		
		<br />
		<span class="jem_date">
		<?php if ($params->get('linkdet') == 1) : ?>
		<a href="<?php echo $item->link; ?>" class="jemmod<?php echo $params->get('moduleclass_sfx'); ?>">
			<?php echo $item->dateinfo; ?>
		</a>
		<?php else :
			$dateaux = $item->dateinfo;
			echo $dateaux;
		endif;
		?></span>
		<br />&nbsp;
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>
