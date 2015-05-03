<?php  
/* 
Plugin Name: Convertor valutar curs 3 Banci: BNR, BCR si BT
Plugin URI: http://www.casedevanzare.ro 
Version: 2
Author: Stan Nicolae
Description: Ofera vizitatorilor optiunea de a converti din EURO in RON, RON in EURO la cursul zilei pentru urmatoarele 3 banci: BNR, BCR si Banca Transilvania
*/

	add_filter('widget_text', 'do_shortcode');
	define('ERONPATH', plugin_dir_path( __FILE__ ));
	require_once(ERONPATH.'/includes/functions.php');
	
	
?>