<?php 

header("Content-type: text/css");

ob_start();

include 'utilities/resets.css';

foreach (glob(__DIR__  . '/components/*.css') as $filename) {
	require_once($filename);
}

echo '@media screen and (min-width: 750px) {';
	foreach (glob(__DIR__  . '/tablet/*.css') as $filename) {
		require_once($filename);
	}	
echo '}';

echo '@media screen and (min-width: 1150px) {';
	foreach (glob(__DIR__  . '/desktop/*.css') as $filename) {
		require_once($filename);
	}	
echo '}';

if (function_exists('get_option')) {
	include 'utilities/variables.css.php';
}

echo preg_replace('/\s+/', ' ', ob_get_clean());