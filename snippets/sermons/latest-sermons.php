<?php 

global $post;
$original_post = $post;
$wrapper_classes = util_get_block_wrapper_classes($block_container, $block_bottom_margin, $block_bottom_margin_desktop, $block_padding); 

?>
<section
	class="<?= isset($classes) ? esc_attr($classes) : '' ?> <?= esc_attr($wrapper_classes) ?>"
>
	<h2>Recent Sermons</h2>
	<div
		class="flexible-grid"
		style="--number-columns: <?= absint($columns) ?>; --number-columns-tablet: <?= min(2, absint($columns)) ?>;"
	>
		<?php foreach ($sermons as $sermon) { ?>
			<?php $post = $sermon; ?>
			<?= util_render_snippet('sermons/sermon-article', array(
				'sermon' => $sermon,
				'sermon_pattern' => isset($sermon_pattern) ? $sermon_pattern : 'false',
			), false) ?>
		<?php } ?>
		<?php $post = $original_post; ?>
	</div>		
</section>