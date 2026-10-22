<div class="notice notice-warning">
	<p>
		You are missing an archive page for <?= esc_html(ucwords(str_replace('-', ' ', $missing_post_type))) ?>.
	</p>
	<p>
		<form method="POST" action="<?= admin_url('admin.php') ?>">
			<input type="hidden"
				   name="action"
				   value="wp_church_add_page" />
			<input type="hidden"
				   name="page-to-add"
				   value="<?= esc_attr($missing_post_type) ?>" />
			<?php wp_nonce_field('wp_church_add_page'); ?>
			<button class="button button-primary">
				Add <?= esc_html(ucwords(str_replace('-', ' ', $missing_post_type))) ?> Page
			</button>
		</form>
	</p>
</div>
