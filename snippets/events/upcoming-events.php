<?php

$wrapper_classes = util_get_block_wrapper_classes($block_container, $block_bottom_margin, $block_bottom_margin_desktop, $block_padding); 

?>

<section
	class="<?= esc_attr($wrapper_classes) ?> upcoming-events flexible-grid <?= esc_attr($classes) ?>"
	style="--number-columns: <?= absint($columns) ?>"
>
	<?php foreach ($events as $event) { ?>
		<div>
			<h3>
				<?= esc_html($event->post_name) ?>
			</h3>
		</div>
	<?php } ?>
</section>