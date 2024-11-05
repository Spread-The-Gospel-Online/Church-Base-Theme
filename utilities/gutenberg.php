<?php

function church_util_register_gutenberg_server_callback ($endpoint, $attributes, $display_callback) {
	add_action( 'rest_api_init', function () use ($endpoint, $attributes, $display_callback) {
		register_rest_route( 'church/v1', $endpoint, array(
			'methods' => 'GET',
			'callback' => function ($data) use ($attributes, $display_callback) {
				$attributesToPass = array();
				foreach ($attributes as $attribute) {
					$attributesToPass[$attribute] = $data[$attribute];
				}

				echo $display_callback($attributes, false);
				exit();
			},
			'permission_callback' => '__return_true'
		));
	});
}