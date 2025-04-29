<?php 

get_header(); 

while (have_posts()) { 
	the_post();

	$post = get_post();
	$post_id = $post->ID;
	$sermon_content = util_get_actual_content($post->post_content);
	$image = util_get_hero_src($post);
	$sermon_cards = get_option('church_sermons_card_order');


	$pastor_ID = get_post_meta($post_id, 'sermon_pastor', true);
	$pastor = $pastor_ID ? get_post($pastor_ID) : false;
	$series_ID = get_post_meta($post_id, 'sermon_series', true);
	$series = $series_ID ? get_post($series_ID) : false;

	$steps = $series ? array(
		array('type' => 'sermon-series', 'slug' => false),
		array('type' => 'sermon-series', 'slug' => $series->post_name),
		array('type' => 'sermons', 'slug' => $post->post_name),
	) : array(
		array('type' => 'sermons', 'slug' => false),
		array('type' => 'sermons', 'slug' => $post->post_name),
	);


	$sermon_snippet = util_render_snippet('sermons/sermon-link', array(
		'link' => get_post_meta($post_id, 'link', true),
		'audio_link' => get_post_meta($post_id, 'audio_link', true)
	));


	util_render_snippet('common/hero', array(
		'desktop_src' => $image['src'],
		'image_alt' => $image['alt'],
		'caption_classes' => '',
		'caption' => get_the_title(),
		'steps' => $steps,
		'opacity' => get_post_meta($post_id, 'hero_opacity', true),
		'background' => get_post_meta($post_id, 'hero_background', true),
		'text_color' => get_post_meta($post_id, 'hero_text', true),
	), false);

	do_action('church_layout_after_header');
} ?>


<article class="ccontain sermon">
	<div class="sermon__content-cards">
		<?php foreach($sermon_cards as $card) { ?>
			<?= util_render_snippet('sermons/card-options/' . $card, array(
				'sermon' => $post,
				'pastor' => $pastor,
				'pastor_permalink' => get_permalink($pastor->ID),
				'series' => $series,
				'audio_link' => get_post_meta($post_id, 'audio_link', true),
			)); ?>
		<?php } ?>

		<div class="sermon__download-wrapper">
			<a href="<?= get_post_meta($post_id, 'audio_link', true) ?>" 
			   download="<?= $post->post_title ?>" 
			   aria-title="Download Sermon"
			   class="sermon__download">
				<?= util_render_snippet('icons/download', array('classes' => 'sermon__download-icon')) ?>
				Save
			</a>
		</div>
	</div>

	<div class="sermon__content">
		<?= get_the_content() ?>
	</div>
</article>


<?php get_footer();
