<?php $post_contents = get_the_content(); ?>

<?php if ($post_contents && $post_contents != '') { ?>
	<div class="gbc">
		<?= do_blocks($content) ?>
	</div>
<?php } ?>