<?php 

$post = get_post(); 
$audio_link = get_post_meta($post->ID, 'audio_link', true);

if (empty($audio_link)) {
	return;
}

?>

<div
	class="sermon__download-wrapper <?= isset($classes) ? esc_attr($classes) : '' ?>"
>
	<a
		href="<?= esc_url($audio_link) ?>"
		download="<?= esc_attr($post->post_title) ?>"
		aria-title="Download Sermon"
		class="sermon__download"
	>
		<?= util_render_snippet('icons/download', array('classes' => 'sermon__download-icon')) ?>
		Save
	</a>
</div>