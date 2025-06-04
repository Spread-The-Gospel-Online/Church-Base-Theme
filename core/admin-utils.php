<?php

function church_missing_type_support ($post_type) {
	$enabled_post_types = get_option('church_enabled_post_types');
	if (!is_array($enabled_post_types)) {
		return true;
	}
	return !in_array($post_type, $enabled_post_types);
}