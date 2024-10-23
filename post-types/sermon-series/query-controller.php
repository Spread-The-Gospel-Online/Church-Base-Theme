<?php

add_action( 'init', function () {
	global $wp;
	add_rewrite_rule( '^sermon-series/([^/]*)/sermons/([^/]*)/?', 'index.php?series=$matches[1]&sermons=$matches[2]', 'top' );
	$wp->add_query_var('series');
});
