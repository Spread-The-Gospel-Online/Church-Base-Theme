<?php

foreach (glob(__DIR__  . '/*') as $filename) {
	if (is_dir($filename)) {
		require_once($filename . '/index.php');
	}
}