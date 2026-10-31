<?php

// "Members only" content is enforced on the server: logged-out visitors are sent to the login
// page, and the content is kept out of every listing (archives, search, feeds, REST, blocks).

function church_is_members_only_post ($post_id) {
	return get_post_meta($post_id, 'is_member_only', true) === 'yes';
}

// Background jobs run logged out but still need to see every post.
function church_should_hide_members_only () {
	return !is_user_logged_in() && !wp_doing_cron() && !(defined('WP_CLI') && WP_CLI);
}

add_action('template_redirect', function () {
	if (!is_singular() || !church_should_hide_members_only()) {
		return;
	}
	if (!church_is_members_only_post(get_queried_object_id())) {
		return;
	}

	wp_safe_redirect(wp_login_url(get_permalink(get_queried_object_id())));
	exit;
});

add_action('pre_get_posts', function ($query) {
	// The single-post main query is handled by the login redirect above.
	if (is_admin() || $query->is_singular() || !church_should_hide_members_only()) {
		return;
	}

	$members_only_clause = array(
		'relation' => 'OR',
		array(
			'key' => 'is_member_only',
			'compare' => 'NOT EXISTS'
		),
		array(
			'key' => 'is_member_only',
			'value' => 'yes',
			'compare' => '!='
		)
	);

	// Wrapped so an existing meta_query keeps its own relation.
	$existing_meta_query = $query->get('meta_query');
	$meta_query = empty($existing_meta_query)
		? $members_only_clause
		: array('relation' => 'AND', $existing_meta_query, $members_only_clause);

	$query->set('meta_query', $meta_query);
});

// A single REST item is loaded by ID without WP_Query, so pre_get_posts never sees it.
add_action('rest_api_init', function () {
	foreach (get_post_types(array('show_in_rest' => true)) as $post_type) {
		add_filter('rest_prepare_' . $post_type, function ($response, $post) {
			if (church_should_hide_members_only() && church_is_members_only_post($post->ID)) {
				return new WP_Error(
					'rest_forbidden',
					'This content is for members only.',
					array('status' => 401)
				);
			}
			return $response;
		}, 10, 2);
	}
});
