<div class="notice notice-warning">
	<p>
		Your site is missing a custom 404 (Page Not Found) page. Visitors who hit a
		broken or nonexistent URL will see a bare "404" heading until you create one.
	</p>
	<p>
		<form method="POST" action="<?= admin_url('admin.php') ?>">
			<input type="hidden"
				   name="action"
				   value="wp_church_add_page" />
			<input type="hidden"
				   name="page-to-add"
				   value="404-page" />
			<button class="button button-primary">
				Create 404 Page
			</button>
		</form>
	</p>
</div>
