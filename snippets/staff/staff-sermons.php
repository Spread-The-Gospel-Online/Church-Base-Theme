<?php

$sermons = util_church_get_sermons_for_staff($post->ID);

echo '<div class="sermon-archive ccontain">';
foreach ($sermons as $sermon) {
	util_render_snippet('sermons/sermon-article', array(
		'sermon' => $sermon,
	), false);
}
echo '</div>';

$pagination_args = util_church_get_staff_sermon_pagination($post);
util_render_snippet('common/pagination', array(
	'post_type' => 'Sermons',
	'extra_classes' => '',
	'extra_args' => $pagination_args
), false);