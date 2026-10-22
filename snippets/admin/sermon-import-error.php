<div class="notice notice-warning">
	<p>
		<strong>
			Sermon auto-import problem:
		</strong>
		<?= esc_html($message) ?>
	</p>
	<?php if ($time): ?>
		<p>
			Last checked:
			<?= esc_html(wp_date(get_option('date_format') . ' ' . get_option('time_format'), $time)) ?>
		</p>
	<?php endif; ?>
	<p>
		<a
			href="<?= esc_url(admin_url('edit.php?post_type=sermons&page=sermon-settings-page')) ?>"
		>
			Review Sermon Settings
		</a>
	</p>
</div>
