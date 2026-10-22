<?php if ($content && $content != '') { ?>
	<?php $content_classes = (array) apply_filters('single-page-content-classes', array('gbc')); ?>
	<div class="<?= esc_attr(implode(' ', $content_classes)) ?>">
		<?= util_get_actual_content($content) ?>
	</div>
<?php } ?>
