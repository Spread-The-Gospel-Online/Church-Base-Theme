<?php

// Auto-load the sibling PHP files (the admin-panel autoloader only requires this index.php).
// templates/ and pages/ hold no root-level PHP, so they are left for on-demand include.
foreach (glob(__DIR__ . '/*.php') as $filename) {
	if (basename($filename) !== 'index.php') {
		require_once($filename);
	}
}
