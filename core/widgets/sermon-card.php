<?php

add_action('widgets_init', function () {
	register_sidebar(array(
		'name' => 'Sermon Card',
		'id' => 'sermon_card',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
	));
});