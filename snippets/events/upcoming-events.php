<?php

$wrapper_classes = util_get_block_wrapper_classes($block_container, $block_bottom_margin, $block_bottom_margin_desktop, $block_padding); 

?>

<section class="<?= $wrapper_classes ?> upcoming-events flexible-grid <?= $classes ?>" style="--number-columns: <?= $columns ?>">
	<?php foreach ($events as $event) { ?>
		<div>
			<h3>
				<?= $event->post_name ?>
			</h3>
		</div>
	<?php } ?>
</section>