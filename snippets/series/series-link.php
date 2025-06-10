<?php
	$sermon = get_post();
	$series_ID = get_post_meta($sermon->ID, 'sermon_series', true);
	$series = $series_ID ? get_post($series_ID) : false;
?>

<?php if ($series) { ?>
	<div class="<?= isset($classes) ? $classes : '' ?>">
		<a href="<?= get_permalink($series->ID) ?>">
			<?= $series->post_title ?>
		</a>
	</div>
<?php } ?>