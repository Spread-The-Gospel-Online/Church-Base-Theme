<div class="ccontain pagination <?= isset($extra_classes) ? $extra_classes : '' ?>">
	<?= paginate_links(array_merge(array(
		'prev_text' => 'Newer ' . (isset($post_type) ? $post_type : 'Results'),
		'next_text' => 'Older ' . (isset($post_type) ? $post_type : 'Results')
	), (isset($extra_args) && is_array($extra_args)) ? $extra_args : array())) ?>
</div>