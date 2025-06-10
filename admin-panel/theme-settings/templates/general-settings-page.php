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
		<div>
			<?php foreach ($post_types as $post_type) { ?>
				<div>
					<label for="<?= $post_type ?>">
						<?= $post_type ?>
					</label>
					<input name="church_enabled_post_types[]"
						   id="<?= $post_type ?>"
						   value="<?= $post_type ?>"
						   type="checkbox"
						   <?php if (is_array($enabled_post_types) && in_array($post_type, $enabled_post_types)) { ?>
						   		checked="checked"
						   <?php } ?>/>
				</div>
			<?php } ?>
		</div>
		<?php submit_button(); ?>
	</form>
</div>