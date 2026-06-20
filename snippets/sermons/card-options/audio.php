<?php
	$post = get_post();
	$audio_link = get_post_meta($post->ID, 'audio_link', true);

	if (empty($audio_link)) {
		return;
	}
?>

<div class="sermon__audio-content <?= isset($classes) ? $classes : '' ?>">
	<audio controls>
		<source src="<?= esc_url($audio_link) ?>">
	</audio>
</div>