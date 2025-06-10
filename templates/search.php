<?php 

get_header();

$search_query = get_search_query();
$args = array(
	's' => $search_query,
	'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
);
$the_query = new WP_Query($args);


util_render_snippet('layout/search/search-page', array(
	'the_query' => $the_query
), false);


get_footer();