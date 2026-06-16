<?php

// Registers the Notifications Customizer section. The info/notice toast colors are
// added to this section by the color-selector loop in settings/site-colors.php.
add_action('customize_register', function ($customizer) {
	$customizer->add_section('church_notifications_section', array(
		'title' => 'Notifications',
		'description' => 'Settings for site notification toasts',
		'priority' => 31,
		'capability' => 'edit_theme_options'
	));

	$customizer->add_setting('church_notification_padding', array(
		'type' => 'option',
		'default' => 'small',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$customizer->add_control('church_notification_padding', array(
		'type' => 'select',
		'choices' => array(
			'small' => 'Small',
			'medium' => 'Medium',
			'large' => 'Large',
		),
		'section' => 'church_notifications_section',
		'label' => 'Notification Content Padding',
		'description' => 'Top and bottom padding inside each notification toast',
	));
});
