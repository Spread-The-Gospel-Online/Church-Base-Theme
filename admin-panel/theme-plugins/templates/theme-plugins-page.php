<div
	class="wrap"
>
	<h1>
		Theme Plugins
	</h1>

	<p>
		Plugins built to work with this theme. Installed plugins still need to be activated on the
		<a
			href="<?= esc_url(admin_url('plugins.php')) ?>"
		>
			Plugins page
		</a>.
	</p>

	<style>
		.church-plugin-title {
			min-width: 300px;
			vertical-align: middle !important;
		}

		.church-plugin-title,
		.church-plugin-row {
			display: inline-flex;
			align-items: center;
			margin-bottom: 0 !important;
		}

		.church-plugin-row .notice {
			margin: 0;
		}
	</style>

	<table
		class="form-table"
		role="presentation"
	>
		<tbody>
			<?php
				foreach (Church_Theme_Plugins_Page::PLUGINS as $plugin_slug => $plugin_info) {
			?>
				<tr>
					<th
						scope="row"
						class="church-plugin-title"
					>
						<?= esc_html($plugin_info['name']) ?>
					</th>
					<td
						class="church-plugin-row"
					>
						<?php
							if (Church_Theme_Plugins_Page::is_plugin_installed($plugin_slug)) {
						?>
							<div
								class="notice notice-success inline"
							>
								<p>
									Plugin added. Please check <a href="<?= get_site_url() ?>/wp-admin/plugins.php">plugin page</a> to ensure it is activated.
								</p>
							</div>
						<?php
							} else {
						?>
							<p>
								<?= esc_html($plugin_info['description']) ?>
							</p>
							<form
								method="post"
							>
								<?php wp_nonce_field('church_install_theme_plugin', 'church_theme_plugins_nonce'); ?>
								<input
									type="hidden"
									name="church_plugin_slug"
									value="<?= esc_attr($plugin_slug) ?>"
								/>
								<?php submit_button('Install', 'primary', 'submit', false); ?>
							</form>
						<?php
							}
						?>
					</td>
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>
