<?php

	function eRonHTML()
	{

		$html = '<fieldset class="contact-inner" style="max-width:300px; margin:0px auto 0px auto;">
					<p class="contact-input">
						Selecteaza Banca:
						<label for="select" class="select">
							<select name="banca" id="select" class="banca"  style="font-size:11px;">
							'.getBankDropDown().'
							</select>
						</label>
					</p>

				  <p class="contact-input"  style="padding:2px;">
					DIN Moneda:
					<select name="din" id="select" class="din" style="padding:5px;width:100%;font-size:12px !important;">
						<option value="EURO">EURO</option>
						<option value="RON">RON</option>
					</select>

					IN Moneda:
					<select name="in" id="select" class="in"  style="padding:5px;width:100%;font-size:12px !important;">
						<option value="RON">RON</option>
						<option value="EURO">EURO</option>
					</select>
					<input type="text" readonly style="width:100%; display:inline !important; float:right;font-size:12px !important;" value="0.0000" id="curs" />
				  </p>

				  <p class="contact-input"  style="padding:2px;">

				  <input placeholder="suma" type="text" style="width:45%; display:inline !important;font-size:12px !important;" value="" id="valoare" /> = <input type="text" readonly style="width:45%; display:inline !important; font-weight:bold;font-size:12px !important;" value="0.0000" id="rezultat" /></p>
				</fieldset><small><center><a href="http://www.casedevanzare.ro" title="Case De Vanzare">Case De Vanzare</a></center></small>';

		return $html;
	}

	function eRonGetBanks()
	{
		$banksFile = ERONPATH.'/data/banks.dat';

		$banks = file($banksFile);
		$banci = array();

		foreach($banks as $key => $val)
		{
			$bnk = explode("|", $val);

			$banci[$bnk[0]] = array(	'key' => $bnk[0],
										'name'	=>	$bnk[1]);
		}

		return $banci;
	}

	function getBankDropDown()
	{
		$banks = eRonGetBanks();

		$dropdown = '';

		foreach($banks as $k => $v)
		{
			$value = ($v['key'] == "BNR") ? 'selected' : '';
			$dropdown.= '<option '. $value .' value="'.$v['key'].'">'. $v['name'].'</option>';
		}

		return $dropdown;
	}


	//addShortcode

	//wp_register_script( 'eronJQ', plugins_url('eron.jQuery.js', __FILE__) );
	wp_register_style( 'eronCSS', plugins_url('eron.css', __FILE__) );
	//wp_register_script( 'eronJS', plugins_url('eron.js', __FILE__) );

	add_shortcode( 'eron_converter', 'eRonHTML' );

		wp_enqueue_style( 'eronCSS' );
	//wp_enqueue_script( 'eronJQ' );
	wp_enqueue_script( 'eronJS', plugins_url('eron.js', __FILE__), '', '1.0', true );
?>