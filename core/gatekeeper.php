<?php

add_action('church_meta_stuffs', function () {
	$is_members_only = get_post_meta(get_the_ID(), 'is_member_only', true);
	if (is_single() && $is_members_only === 'yes' && !is_user_logged_in()) {
		echo '<style>body { opacity: 0 !important; }</style>';
		echo '<script>window.location.replace("' . get_site_url() . '")</script>';
	}
});