<?php
	$sermon = get_post();
	$series_ID = get_post_meta($sermon->ID, 'sermon_series', true);
	$series = $series_ID ? get_post($series_ID) : false;
?>

<?php if ($series) { ?>
	<div
		class="<?= isset($classes) ? esc_attr($classes) : '' ?>"
	>
		<a
			href="<?= esc_url(get_permalink($series->ID)) ?>"
		>
			<?= esc_html($series->post_title) ?>
		</a>
	</div>
<?php } ?>