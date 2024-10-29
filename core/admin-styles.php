<?php

add_action('admin_head', function () {
	ob_start();
	include get_template_directory() . '/assets/styles/utilities/variables.css.php';
	$variable_content = ob_get_clean();

	$template_dir = get_template_directory_uri();
	$markup = <<<HTML
		<link rel="stylesheet" type="text/css" href="$template_dir/assets/styles/main.css.php">
		<style type="text/css">
			$variable_content
		</style>
	HTML;

	echo $markup;
});