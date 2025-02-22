<?php

add_action( 'init', function () {
	global $wp;
	add_rewrite_rule( '^staff/([^/]*)/sermons/([^/]*)/?', 'index.php?staff=$matches[1]&sermons=$matches[2]', 'top' );
	$wp->add_query_var('staff');
});
