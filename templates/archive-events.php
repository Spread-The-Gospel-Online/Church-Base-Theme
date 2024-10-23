<?php 

get_header();

util_render_snippet('common/archive-hero', array(), false);

do_action('church_layout_after_header');

echo '<section class="event-archive">';
util_render_snippet('events/calendar', array(), false);
echo '</section>';

get_footer();