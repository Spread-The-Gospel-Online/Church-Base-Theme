<?php

add_action( 'pre_get_posts', function ($query) {
	if ($query->is_archive && $query->query['post_type'] == 'sermons') {
		if (array_key_exists('pastor', $_GET)) {
			$query->query_vars["meta_key"] = 'sermon_pastor';
			$query->query_vars["meta_value"] = $_GET['pastor'];
		}
	}
}, 1 );

add_action( 'init', function () {
	global $wp;
	add_rewrite_rule( '^sermon-series/([^/]*)/sermon-page/([^/]*)/?', 'index.php?sermon-series=$matches[1]&sermon-page=$matches[2]', 'top' );
	$wp->add_query_var('sermon-page');
});
