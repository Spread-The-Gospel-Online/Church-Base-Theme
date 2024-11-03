<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Church Site</title>
		<meta name="description" content="">
		<link rel="icon" type="image/x-icon" href="<?= get_site_icon_url() ?>">

		<?php do_action('church_meta_stuffs'); ?>

		<link rel="stylesheet" type="text/css" href="<?php echo get_site_url(); ?>/wp-includes/css/dist/block-library/style.min.css" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?<?= util_get_fonts() ?>&display=swap" rel="stylesheet">

		<?php 
			// if in the customizer load non-compiled styles so variables update (to preview changes before save)
			// also load non-compiled when user is admin (dev) 
		?>
		<?php if (is_customize_preview() || current_user_can('administrator')) { ?>
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/styles/main.css.php">
			<style type="text/css">
				<?php include 'assets/styles/utilities/variables.css.php'; ?>
			</style>
		<?php } else { ?>
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/styles/main.build.css">
		<?php } ?>
	</head>

	<body <?php body_class(); ?>>
		<a href="#MainContent" class="skip-to-link">
			Skip to content
		</a>

		<?php util_render_snippet('layout/global/header', array(), false); ?>

		<div id="MainContent">
			<?php do_action('church_layout_before_hero'); ?>