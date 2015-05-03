<?php
	require_once('includes/curs.php');
	
	switch($_GET['act'])
	{
		case 'banca':
		
			$banca = $_GET['banca'];
			$from = $_GET['from'];
			
			if($from == "EURO")
			{
				print getValue($banca);
			}
			else
			{
				print substr(1 / getValue($banca), 0, 5);
			}
			
		break;
		
		
		case 'convert':
		
			$banca = $_GET['banca'];
			$from = $_GET['from'];
			$val = $_GET['valoare'];
			
			if($from == "EURO")
			{
				$curs = getValue($banca);
				$total = $curs * $val;
				$formatTotal = explode(".", $total);
					
				print $formatTotal[0].'.'.substr($formatTotal[1], 0, 2);
			}
			else
			{
				$curs = getValue($banca);
				$total = $val / $curs;
				$formatTotal = explode(".", $total);
					
				print $formatTotal[0].'.'.substr($formatTotal[1], 0, 2);
			}
			
		break;
	}
?>