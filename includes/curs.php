<?php

	function getValue($value)
	{
		$file = 'data/'.$value.'.dat';
		if(file_exists($file))
		{
			$files = file_get_contents($file);
			$curs = explode("|", $files);
			$valuta = $curs[0];
			$data = trim($curs[1]);
			
			if(strtotime(date('Y-m-d h:i:s')) - $data > 3599)
			{
				return $value();
			}
			else
			{
				return $valuta;
			}
		}
		else
		{
			return $value();
		}
	}
	
	function BNR()
	{
		$url = 'http://www.cursbnr.ro/insert/insertmodule.php?w=182&tc=000000&nodiff&noron&nocb';
		$file = file_get_contents($url);
		
		$offset = explode("1 EUR = ", $file);
		$onset = explode("</font>", $offset[1]);
		
		@unlink('data/BNR.dat');
		$file = fopen('data/BNR.dat', 'a+');
		
		file_put_contents('data/BNR.dat', str_replace(',', '.', $onset[0]).'|'.strtotime(date('Y-m-d h:i:s')));
		fclose($file);
		
		return str_replace(',', '.', $onset[0]);
	}
	
	function BCR()
	{
		$url = 'http://www.curs-valutar-bnr.ro/curs-valutar-banci/bcr';
		$file = file_get_contents($url);

		$offset = explode('<td align="center"><b>EUR</b></td>', $file);
		$onset = explode('<td align="right">', $offset[1]);
		$outset = explode(" RON", $onset[1]);
		
		@unlink('data/BCR.dat');
		$file = fopen('data/BCR.dat', 'a+');
		
		file_put_contents('data/BCR.dat', str_replace(',', '.', $outset[0]).'|'.strtotime(date('Y-m-d h:i:s')));
		fclose($file);
		
		return str_replace(',', '.', $outset[0]);
	}
	
	function BT()
	{
		$url = 'http://www.curs-valutar-bnr.ro/curs-valutar-banci/banca-transilvania';
		$file = file_get_contents($url);

		$offset = explode('<td align="center"><b>EUR</b></td>', $file);
		$onset = explode('<td align="right">', $offset[1]);
		$outset = explode(" RON", $onset[1]);
		
		@unlink('data/BT.dat');
		$file = fopen('data/BT.dat', 'a+');
		
		file_put_contents('data/BT.dat', str_replace(',', '.', $outset[0]).'|'.strtotime(date('Y-m-d h:i:s')));
		fclose($file);
		
		return str_replace(',', '.', $outset[0]);
	}
	
?>
