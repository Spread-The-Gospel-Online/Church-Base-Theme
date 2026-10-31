<?php
	$post = get_post();
	$pastor_ID = get_post_meta($post->ID, 'sermon_pastor', true);
	$pastor = $pastor_ID ? get_post($pastor_ID) : false;
	$pastor_permalink = get_permalink($pastor->ID);
?>

<?php if ($pastor) { ?>
	<div
		class="<?= isset($classes) ? esc_attr($classes) : '' ?>"
	>
		<a
			href="<?= esc_url($pastor_permalink) ?>"
			class="<?= isset($extra_classes) ? esc_attr($extra_classes) : '' ?>"
		>
			<?= esc_html($pastor->post_title) ?>
		</a>
	</div>
<?php } ?>