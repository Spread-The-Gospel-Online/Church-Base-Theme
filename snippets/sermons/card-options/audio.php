<?php
	$post = get_post();
	$audio_link = get_post_meta($post->ID, 'audio_link', true);
?>

<div class="sermon__audio-content <?= isset($classes) ? $classes : '' ?>">
	<audio controls>
		<source src="<?= $audio_link ?>">
	</audio>
</div>