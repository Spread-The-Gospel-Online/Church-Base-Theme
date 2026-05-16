<?php

function church_import_theme_settings ($file_contents) {
    $settings = json_decode($file_contents, true);
    if (!is_array($settings)) {
        return;
    }
    foreach ($settings as $key => $value) {
        if (!is_string($key)) {
            continue;
        }
        // Only import the theme's own namespaced settings (mirrors the export).
        if (strpos($key, 'church_') === 0
            || strpos($key, 'css_color_') === 0
            || strpos($key, 'font_') === 0) {
            update_option($key, $value);
        }
    }
}

function church_export_theme_settings () {
    // Boot a Customizer manager and run every theme's customize_register
    // callback (this is what all files in settings/ hook into) so we can
    // enumerate the settings they register, including dynamically-named ones.
    require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';

    global $wp_customize;
    $wp_customize = new WP_Customize_Manager();

    // The theme's custom Customizer control classes (core/customizer/*.php) are
    // defined behind a class_exists('WP_Customize_Control') guard. On a normal
    // admin request those files were require_once at theme bootstrap before
    // the Customizer existed, so the guarded class bodies were skipped. Now
    // that the manager has loaded WP_Customize_Control, re-include them so the
    // settings callbacks can instantiate these controls. include (not
    // include_once) so the prior require_once does not block re-execution; the
    // files self-guard so this is idempotent in the normal Customizer flow.
    $control_files = array(
        get_template_directory() . '/core/customizer/subtitles.php',
        get_template_directory() . '/core/customizer/drag-and-drop.php',
    );
    foreach ($control_files as $control_file) {
        include $control_file;
    }

    do_action('customize_register', $wp_customize);

    $data = array();
    foreach ($wp_customize->settings() as $setting) {
        // Only real persisted options — skips section-heading placeholder
        // controls (registered with no type => theme_mod).
        if ($setting->type !== 'option') {
            continue;
        }
        // Only export the theme's own namespaced settings.
        if (!(strpos($setting->id, 'church_') === 0
            || strpos($setting->id, 'css_color_') === 0
            || strpos($setting->id, 'font_') === 0)) {
            continue;
        }
        $data[$setting->id] = $setting->value();
    }

    // keys = setting names, values = current values (falls back to each
    // setting's registered default when the option is unset).
    $json = wp_json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

    if (ob_get_length()) {
        ob_end_clean();
    }
    // Prefix the download with the site name, e.g. "my-church-theme-settings.json".
    $site_slug = sanitize_title(get_bloginfo('name'));
    $filename = ($site_slug ? $site_slug . '-' : '') . 'theme-settings.json';

    nocache_headers();
    header('Content-Type: application/json; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . strlen($json));
    echo $json;
    exit;
}
