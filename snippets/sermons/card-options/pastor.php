<?php
	$post = get_post();
	$pastor_ID = get_post_meta($post->ID, 'sermon_pastor', true);
	$pastor = $pastor_ID ? get_post($pastor_ID) : false;
	$pastor_permalink = get_permalink($pastor->ID);
?>

<?php if ($pastor) { ?>
	<div class="<?= isset($classes) ? $classes : '' ?>">
		<a href="<?= $pastor_permalink ?>" class="<?= isset($extra_classes) ? $extra_classes : '' ?>">
			<?= $pastor->post_title ?>
		</a>
	</div>
<?php } ?>