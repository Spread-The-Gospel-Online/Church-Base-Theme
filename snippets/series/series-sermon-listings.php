<?php 

$current_url = get_permalink();

$tiles_markup = '';
foreach ($sermons as $sermon) {
	$tiles_markup .= util_render_snippet('common/tile', array(
		'url' => $current_url . 'sermons/' . $sermon->post_name,
		'type' => 'Sermon',
		'title' => $sermon->post_title,
		'image' => get_the_post_thumbnail_url($sermon),
		'alt' => get_post_meta(get_post_thumbnail_id($sermon), '_wp_attachment_image_alt', true),
		'show_read_more' => true,
		'description' => ''
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