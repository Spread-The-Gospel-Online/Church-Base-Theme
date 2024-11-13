<div class="ccontain <?= $extra_classes ?>">
	<?= the_posts_pagination(array(
		'prev_text' => 'Newer ' . $post_type,
		'next_text' => 'Older ' . $post_type
	)) ?>
</div>