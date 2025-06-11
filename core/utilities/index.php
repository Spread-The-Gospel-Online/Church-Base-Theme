<?php

foreach (glob(__DIR__  . '/*.php') as $filename) {
	if ($filename != 'index.php') {
		require_once($filename);
	}
}