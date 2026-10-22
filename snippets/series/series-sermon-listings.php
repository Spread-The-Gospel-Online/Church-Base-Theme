<?php 

$current_url = get_permalink();

$tiles_markup = '';
foreach ($sermons as $sermon) {
	$tiles_markup .= util_render_snippet('common/tile', array(
		'post' => $sermon,
		'url' => $current_url . 'sermons/' . $sermon->post_name,
	));
}

util_render_snippet('common/grid', array(
	'tiles' => $tiles_markup,
	'id' => 'sermon-series-grid',
	'classes' => 'ccontain',
	'mobile' => 1,
	'tablet' => 2,
	'desktop' => 3
), false);