<?php
	$post_types = array('sermons', 'sermon-series', 'ministries', 'events', 'staff');
	$enabled_post_types = get_option('church_enabled_post_types');
?>

<div class="wrap">

	<h1>Theme Settings</h1>
	
	<form method="post" action="options.php">
		<?php settings_fields('church-theme-settings'); ?>
		<?php do_settings_sections('church-theme-settings'); ?>

		<h2>Enabled Post Types</h2>
		<style>
			.church-enabled-post-types th,
			.church-enabled-post-types td {
				padding-top: 2px;
				padding-bottom: 2px;
			}
		</style>
		<table class="form-table church-enabled-post-types">
			<tbody>
				<?php foreach ($post_types as $post_type) { ?>
					<tr>
						<th scope="row">
							<label for="<?= $post_type ?>"><?= $post_type ?></label>
						</th>
						<td>
							<input name="church_enabled_post_types[]"
								   id="<?= $post_type ?>"
								   value="<?= $post_type ?>"
								   type="checkbox"
								   <?php if (is_array($enabled_post_types) && in_array($post_type, $enabled_post_types)) { ?>
								   		checked="checked"
								   <?php } ?>/>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php submit_button(); ?>
	</form>

	<h2>Export / Import</h2>
	<form method="post">
		<input type="hidden" name="church-should-export-theme-settings" value="true" />
		<?php submit_button('Export Theme Settings'); ?>
	</form>
	<hr />
	<br />
	<form method="post" enctype="multipart/form-data">
		<input type="file" name="church-import-theme-settings-file" />
		<?php submit_button('Import Theme Settings'); ?>
	</form>
</div>