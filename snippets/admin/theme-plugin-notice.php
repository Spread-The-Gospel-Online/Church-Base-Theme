<div
	class="notice notice-<?= esc_attr($notice_type) ?> is-dismissible"
>
	<p>
		<?= esc_html($message) ?>
		<?php
			if (!empty($link_url)) {
		?>
			<a
				href="<?= esc_url($link_url) ?>"
			>
				<?= esc_html($link_text) ?>
			</a>
		<?php
			}
		?>
	</p>
</div>
