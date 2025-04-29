<?php 

get_header();

while (have_posts()) {
	the_post();
	do_blocks(the_content());
}

get_footer();
