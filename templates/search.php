<?php 

get_header();

$search_query = get_search_query();
$args = array('s' => $search_query);
$the_query = new WP_Query($args);

while ($the_query->have_posts()) {
	$the_query->the_post();
	echo '<div>';
	echo $post->post_title;
	echo '</div>';
}

get_footer();