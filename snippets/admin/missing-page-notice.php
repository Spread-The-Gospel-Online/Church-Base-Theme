<div class="notice notice-warning">
	<p>
		You are missing an archive page for <?= ucwords(str_replace('-', ' ', $missing_post_type)) ?>.
	</p>
	<p>
		<form method="POST" action="<?= admin_url('admin.php') ?>">
			<input type="hidden"
				   name="action"
				   value="wp_church_add_page" />
			<input type="hidden"
				   name="page-to-add"
				   value="<?= $missing_post_type ?>" />
			<button class="button button-primary">
				Add <?= ucwords(str_replace('-', ' ', $missing_post_type)) ?> Page
			</button>
		</form>
	</p>
</div>