<?php
	$post = get_post();
	$alternative_url = get_post_meta($post->ID, 'alternative_url', true);

	if (empty($alternative_url)) {
		return;
	}

	$parsed = wp_parse_url($alternative_url);
	if (!is_array($parsed)) {
		return;
	}

	// This card is YouTube-specific. alternative_url is stored for any entry with a
	// rel="alternate" link, so bail on non-YouTube URLs rather than build a broken embed.
	$host = $parsed['host'] ?? '';
	$is_youtube = $host === 'youtu.be' || substr($host, -11) === 'youtube.com';
	if (!$is_youtube) {
		return;
	}

	$video_id = '';
	if ($host === 'youtu.be') {
		$video_id = trim($parsed['path'] ?? '', '/');
	} elseif (!empty($parsed['query'])) {
		parse_str($parsed['query'], $query_args);
		$video_id = $query_args['v'] ?? '';
	}
	if ($video_id === '' && !empty($parsed['path']) && strpos($parsed['path'], '/embed/') !== false) {
		$video_id = substr(strrchr($parsed['path'], '/'), 1);
	}

	$video_id = preg_replace('/[^A-Za-z0-9_-]/', '', $video_id);
	if (empty($video_id)) {
		return;
	}
?>

<div class="sermon__video-content <?= isset($classes) ? $classes : '' ?>">
	<iframe
		src="https://www.youtube.com/embed/<?= esc_attr($video_id) ?>"
		title="<?= esc_attr($post->post_title) ?>"
		loading="lazy"
		allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
		allowfullscreen
	>
	</iframe>
</div>
