:root {
	--primary: <?= get_option('css_color_primary-100'); ?>;
	--primary-100: <?= get_option('css_color_primary-100'); ?>;
	--primary-200: <?= get_option('css_color_primary-200'); ?>;
	--primary-300: <?= get_option('css_color_primary-300'); ?>;
	--primary-400: <?= get_option('css_color_primary-400'); ?>;
	--secondary: <?= get_option('css_color_secondary-100'); ?>;
	--secondary-100: <?= get_option('css_color_secondary-100'); ?>;
	--secondary-200: <?= get_option('css_color_secondary-200'); ?>;
	--secondary-300: <?= get_option('css_color_secondary-300'); ?>;
	--secondary-400: <?= get_option('css_color_secondary-400'); ?>;
	--accent: <?= get_option('css_color_accent'); ?>;

	--white: <?= get_option('css_color_white'); ?>;
	--off-white: <?= get_option('css_color_off-white'); ?>;
	--grey-one: <?= get_option('css_color_grey-one'); ?>;
	--grey-two: <?= get_option('css_color_grey-two'); ?>;
	--grey-three: <?= get_option('css_color_grey-three'); ?>;
	--grey-four: <?= get_option('css_color_grey-four'); ?>;
	--black: <?= get_option('css_color_black'); ?>;
	--error: <?= get_option('css_color_error', '#b3261e') ?>;
	--transparent: transparent;

	--link: var(<?= get_option('church_css_links'); ?>);
	--link-hover: var(<?= get_option('church_css_link_hover'); ?>);
	--general-content: var(<?= get_option('church_css_general_content'); ?>);

	--notification-info: var(<?= get_option('church_css_notification_info', '--primary-100') ?>);
	--notification-notice: var(<?= get_option('church_css_notification_notice', '--accent') ?>);
	--notification-padding: var(--padding-<?= get_option('church_notification_padding', 'small') ?>);

	--button-background: var(<?= get_option('church_css_button_background'); ?>);
	--button-background-hover: var(<?= get_option('church_css_button_background_hover'); ?>);
	--button-border: var(<?= get_option('church_css_button_border'); ?>);
	--button-border-hover: var(<?= get_option('church_css_button_border_hover'); ?>);
	--button-text: var(<?= get_option('church_css_button_text'); ?>);
	--button-text-hover: var(<?= get_option('church_css_button_text_hover'); ?>);

	--button-secondary-background: var(<?= get_option('church_css_button_secondary_background'); ?>);
	--button-secondary-background-hover: var(<?= get_option('church_css_button_secondary_background_hover'); ?>);
	--button-secondary-border: var(<?= get_option('church_css_button_secondary_border'); ?>);
	--button-secondary-border-hover: var(<?= get_option('church_css_button_secondary_border_hover'); ?>);
	--button-secondary-text: var(<?= get_option('church_css_button_secondary_text'); ?>);
	--button-secondary-text-hover: var(<?= get_option('church_css_button_secondary_text_hover'); ?>);

	--ada-outline: <?= get_option('css_color_ada-outline'); ?>;
	--label-color: var(<?= get_option('church_css_label_color'); ?>);
	--input-border: var(<?= get_option('church_css_input_border'); ?>);
	--input-background: var(<?= get_option('church_css_input_background'); ?>);
	--input-background-hover: var(<?= get_option('church_css_input_background_hover'); ?>);
	--input-background-active: var(<?= get_option('church_css_input_background_active'); ?>);
	--input-focus-ring: var(--secondary-200);

	--font-family-general: <?= get_font_var('font_general') ?>;
	--font-family-headings: <?= get_font_var('font_headings') ?>;
	--font-size-general: <?= get_option('church_general_font_size', 16) ?>px;
	--font-header-transform: <?= get_option('church_heading_text_transform', 'none') ?>;
	--font-header-letter-spacing: <?= get_option('church_heading_text_letter_spacing', 0) ?>px;
	--font-header-line-height: <?= get_option('church_heading_text_line_height') ?>;
	--font-general-letter-spacing: <?= get_option('church_general_text_letter_spacing', 0) ?>px;
	--font-general-line-height: <?= get_option('church_general_text_line_height') ?>;

	--header-one-mobile-size: <?= get_option('church_header_one_mobile_size', 2.5) ?>rem;
	--header-one-desktop-size: <?= get_option('church_header_one_desktop_size', 3.1) ?>rem;
	--header-two-mobile-size: <?= get_option('church_header_two_mobile_size', 2.2) ?>rem;
	--header-two-desktop-size: <?= get_option('church_header_two_desktop_size', 2.7) ?>rem;
	--header-three-mobile-size: <?= get_option('church_header_three_mobile_size', 1.7) ?>rem;
	--header-three-desktop-size: <?= get_option('church_header_three_desktop_size', 2.3) ?>rem;

	--ccontain: <?= get_option('church_ccontain_default_size', 1252) ?>px;
	--number-columns-mobile: 1;
	--number-columns-tablet: 2;
	--number-columns: 2;

	--header-background: var(<?= get_option('church_css_header_background'); ?>);
	--header-text: var(<?= get_option('church_css_header_link_text'); ?>);
	--header-text-hover: var(<?= get_option('church_css_header_link_text_hover'); ?>);
	--submenu-background: var(<?= get_option('church_css_submenu_background') ?>);
	--submenu-text-color: var(<?= get_option('church_css_submenu_text') ?>);
	--submenu-text-color-hover: var(<?= get_option('church_css_submenu_text_hover') ?>);
	--header-text-font-family: <?= get_font_var('font_header_menu_family') ?>;
	--header-text-transform: <?= get_option('church_header_menu_text_transform') ?>;
	--header-text-letter-spacing: <?= get_option('church_header_menu_letter_spacing', 0) ?>px;
	--header-text-font-size: <?= get_option('church_header_menu_font_size', 16) ?>px;
	--header-text-font-weight: <?= get_option('church_header_menu_font_weight', 400) ?>;

	--logo-height: <?= get_option('church_logo_default_size', 115) ?>px;
	--logo-height-scrolled: <?= get_option('church_logo_scrolled_size', 90) ?>px;
	--logo-link-min-width: <?= util_get_logo_link_min_width() ?>px;

	--hero-background: var(<?= get_option('church_css_hero_background_color') ?>);
	--hero-opacity: <?= get_option('church_hero_default_opacity') ?>;
	--hero-text: var(<?= get_option('church_css_hero_text_color') ?>);
	--hero-height: <?= get_option('church_hero_default_height', '40') ?>vh;
	--hero-text-only-height: <?= get_option('church_hero_text_only_default_height', '30') ?>vh;
	--hero-min-height: <?= get_option('church_hero_min_height', 300) ?>px;

	--breadcrumbs: var(<?= get_option('church_css_breadcrumbs_background'); ?>);
	--breadcrumbs-transparent: <?= church_get_as_rgba('church_css_breadcrumbs_background', get_option('church_breadcrumbs_default_opacity')); ?>;
	--breadcrumbs-text: var(<?= get_option('church_css_breadcrumbs_text'); ?>);
	--breadcrumbs-text-hover: var(<?= get_option('church_css_breadcrumbs_text_hover'); ?>);	

	--blockquote-max-width: <?= get_option('church_blockquote_max_width', 800) ?>px;
	--blockquote-quote-font: <?= get_font_var('font_blockquotes_quote') ?>;
	--blockquote-quote-font-size: <?= get_option('font_blockquotes_quote_size', 4) ?>rem;
	--blockquote-background: var(<?= get_option('church_css_blockquote_background'); ?>);
	--blockquote-name: var(<?= get_option('church_css_blockquote_name') ?>);

	--accordion-border-width: <?= get_option('church_accordion_border_width', 'small') === 'none' ? '0px' : 'var(--border-width-' . get_option('church_accordion_border_width', 'small') . ')' ?>;
	--accordion-content-color: var(<?= get_option('church_css_accordions_content', '--black') ?>);
	--accordion-border-color: var(<?= get_option('church_css_accordions_border', '--black') ?>);
	--accordion-open-close-color: var(<?= get_option('church_css_accordions_open_close', '--primary') ?>);
	--accordion-title-padding: var(--padding-<?= get_option('church_accordion_title_padding', 'small') ?>);


	--footer-padding: <?= get_option('church_footer_padding', 48) ?>px;
	--footer-pattern-width: <?= get_option('church_footer_pattern_width', 25) ?>%;
	--footer-background: var(<?= get_option('church_css_footer_background') ?>);
	--footer-text: var(<?= get_option('church_css_footer_text') ?>);
	--copyright-background: var(<?= get_option('church_css_copyright_background') ?>);
	--copyright-text: var(<?= get_option('church_css_copyright_text') ?>);

	--border-width-small: <?= get_option('church_border_width_small', 1) ?>px;
	--border-width-medium: <?= get_option('church_border_width_medium', 2) ?>px;
	--border-width-wide: <?= get_option('church_border_width_wide', 3) ?>px;

	--border-radius-small: <?= get_option('church_border_radius_small', 4) ?>px;
	--border-radius-medium: <?= get_option('church_border_radius_medium', 8) ?>px;
	--border-radius-large: <?= get_option('church_border_radius_large', 16) ?>px;

	--padding-small: <?= get_option('church_padding_scale', 2) / 2 ?>rem;
	--padding-medium: <?= get_option('church_padding_scale', 2) ?>rem;
	--padding-large: <?= get_option('church_padding_scale', 2) * 2 ?>rem;
	--padding-default: var(--padding-<?= get_option('church_default_padding_size', 'medium') ?>);

	--sermon-archive-grid-tablet-size: <?= get_option('church_archive_sermon_grid_tablet_size') ?>;
	--sermon-archive-grid-size: <?= get_option('church_archive_sermon_grid_size') ?>;
	--sermon-archive-margin: 3rem;
	--sermon-archive-row-gap: 3rem;
	--sermon-archive-col-gap: 2rem;

	--card-overlay-background: var(<?= get_option('church_css_card_overlay') ?>);
	--card-overlay-opacity: <?= get_option('church_card_overlay_opacity', 0.50) ?>;
	--card-overlay-opacity-hover: <?= get_option('church_card_overlay_opacity_hover', 0.50) ?>;
	--card-image-aspect-ratio: <?= get_option('church_archive_sermon_card_height', 50) ?>%;
	--card-contents-padding: <?= get_option('church_card_content_item_padding', 10) ?>px <?= get_option('church_card_content_item_padding', 10) * 2 ?>px;
	--card-contents-alignment: <?= get_option('church_card_content_text_align', 'left') ?>;
	--card-contents-spacing: <?= get_option('church_card_content_item_gap', 10) ?>px;
	--card-contents-background: <?= church_get_as_rgba('church_css_card_contents_background', get_option('church_card_background_opacity', .50)); ?>;
	--card-contents-text: var(<?= get_option('church_css_card_contents_text', '--black') ?>);
	--card-contents-links: var(<?= get_option('church_css_card_contents_links', '--primary') ?>);
	--card-contents-links-hover: var(<?= get_option('church_css_card_contents_links_hover', '--primary-hover') ?>);

	--sermon-content-item-width: <?= get_option('church_sermon_content_grid_size', 2) ?>;
	--sermon-content-width: <?= get_option('church_sermon_content_width', 800) ?>px;
	--sermon-download-background: var(<?= get_option('church_css_download_bg'); ?>);
	--sermon-download-background-hover: var(<?= get_option('church_css_download_bg_hover'); ?>);
	--sermon-download-text: var(<?= get_option('church_css_download_text'); ?>);
	--sermon-download-text-hover: var(<?= get_option('church_css_download_text_hover'); ?>);
	
	--calendar-header-background: var(<?= get_option('church_css_calendar_header_background') ?>);
	--calendar-header-text: var(<?= get_option('church_css_calendar_header_text') ?>);
	--calendar-outline: var(<?= get_option('church_css_calendar_outline') ?>);
	--calendar-background-one: var(<?= get_option('church_css_calendar_background_one') ?>);
	--calendar-background-two: var(<?= get_option('church_css_calendar_background_two') ?>);
	--calendar-border-width: var(--border-width-<?= get_option('church_calendar_border_width') ?>);

	--pagination-link: var(<?= get_option('church_css_pagination_interactive') ?>);
	--pagination-link-hover: var(<?= get_option('church_css_pagination_interactive_hover') ?>);
	--pagination-link-background: var(<?= get_option('church_css_pagination_interactive_background') ?>);
	--pagination-link-active: var(<?= get_option('church_css_pagination_current') ?>);

	--page-content-sidebar-position: <?= (get_option('church_page_sidebar_position') == 'left') ? 1 : 2 ?>;
	--page-content-columns: <?= (get_option('church_page_sidebar_position') == 'left') ? '20rem 1fr' : '1fr 20rem' ?>;
}