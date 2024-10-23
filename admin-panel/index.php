<?php

require_once('panel-cleaner.php');
require_once('asset-loader.php');

foreach (glob(__DIR__  . '/*') as $filename) {
	if (is_dir($filename)) {
		require_once($filename . '/index.php');
	}
}
