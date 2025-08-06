<?php 

get_header();

// Get content for hero
$front_page_id = get_option('page_on_front');
$front_page = get_page($front_page_id);
$image = util_get_hero_src($front_page);

// Build search results query
$search_query = get_search_query();
$args = array(
	's' => $search_query,
	'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
);
$the_query = new WP_Query($args);

util_render_snippet('common/hero', array(
	'desktop_src' => $image['src'],
	'img_height' => '400px',
	'image_alt' => $image['alt'],
	'caption' => 'Showing ' . $the_query->found_posts . ' Results For "' . $the_query->query['s'] . '"',
	'steps' => $steps,
	'opacity' => get_post_meta($front_page_id, 'hero_opacity', true),
	'background' => get_post_meta($front_page_id, 'hero_background', true),
	'text_color' => get_post_meta($front_page_id, 'hero_text', true),
	'hero_height' => get_post_meta($front_page_id, 'hero_height', true),
), false);

do_action('church_layout_after_header');


util_render_snippet('layout/search/search-page', array(
	'the_query' => $the_query
), false);


get_footer();