<?php $post = get_post(); ?>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php if (in_array($post->post_type, array('post', 'page'))) { ?>
	<?php if ($post->post_excerpt && $post->post_excerpt != '') { ?>
		<meta name="description" content="<?= $post->post_excerpt ?>" />
	<?php } ?>
<?php } ?>

<?php if (is_front_page()) { ?>
	<?= util_render_snippet('layout/ld-json') ?>
<?php } ?>