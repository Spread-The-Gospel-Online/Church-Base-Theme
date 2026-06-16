<?php
// Renders one always-on toast per published notification (design: Toast / Block 10).
// Toasts are visible on load and only dismiss when the user clicks the close button —
// the dismiss module is loaded only when there is at least one toast to show.
$notifications = church_get_active_notifications();
if (empty($notifications)) {
	return;
}

// Inline icons from the design — circle-i (info), triangle-! (notice), circle-x (error).
$icons = array(
	'info'   => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><line x1="12" y1="11" x2="12" y2="16"/><line x1="12" y1="7.5" x2="12" y2="7.6"/></svg>',
	'notice' => '<svg viewBox="0 0 24 24"><path d="M12 3l9 16H3z"/><line x1="12" y1="10" x2="12" y2="14"/><line x1="12" y1="16.5" x2="12" y2="16.6"/></svg>',
	'error'  => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><line x1="9" y1="9" x2="15" y2="15"/><line x1="15" y1="9" x2="9" y2="15"/></svg>',
);
$close_icon = '<svg viewBox="0 0 24 24"><line x1="6" y1="6" x2="18" y2="18"/><line x1="18" y1="6" x2="6" y2="18"/></svg>';
?>
<aside class="toast-wrap" aria-live="polite" aria-atomic="false">
	<?php foreach ($notifications as $note) {
		$type = get_post_meta($note->ID, 'notification_type', true) ?: 'info';
		$variant = ($type === 'emergency') ? 'error' : (($type === 'notice') ? 'notice' : 'info');
		$role = ($variant === 'error') ? 'alert' : 'status';
	?>
		<div class="toast toast--<?= esc_attr($variant) ?> hidden" role="<?= $role ?>" data-notification-toast data-toast-id="<?= esc_attr($note->ID) ?>">
			<div class="toast-body">
				<p class="toast-title">
					<span class="toast-icon" aria-hidden="true"><?= $icons[$variant] ?></span>
					<?= esc_html($note->post_title) ?>
				</p>
				<div class="toast-msg"><?= util_get_actual_content($note->post_content) ?></div>
			</div>
			<button class="toast-close" type="button" aria-label="Dismiss" data-notification-dismiss><?= $close_icon ?></button>
		</div>
	<?php } ?>
</aside>
<script type="module" src="<?= get_template_directory_uri() ?>/assets/scripts/components/notifications.js"></script>
