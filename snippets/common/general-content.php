<?php $post_contents = get_the_content(); ?>

<?php if ($post_contents && $post_contents != '') { ?>
	<div class="gbc">
		<?= util_get_actual_content($content) ?>
	</div>
<?php } ?>