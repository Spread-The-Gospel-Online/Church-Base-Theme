<?php 

get_header();

while (have_posts()) {
	the_post();
	util_render_snippet('common/general-content', array(
		'content' => get_the_content()
	), false);
}

get_footer();
