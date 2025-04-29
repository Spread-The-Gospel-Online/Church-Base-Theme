<div class="ccontain pagination <?= $extra_classes ?>">
	<?= paginate_links(array_merge(array(
		'prev_text' => 'Newer ' . $post_type,
		'next_text' => 'Older ' . $post_type
	), (isset($extra_args) && is_array($extra_args)) ? $extra_args : array())) ?>
</div>