<?php 

get_header(); 

while (have_posts()) { 
	the_post();

	$post = get_post();
	$post_id = $post->ID;
	$sermon_content = util_get_actual_content($post->post_content);
	$pattern = util_get_pattern_object('church_sermon_contents_pattern');
	$sermon_cards = get_option('church_sermons_card_order');
	$series_ID = get_post_meta($post_id, 'sermon_series', true);
	$series = $series_ID ? get_post($series_ID) : false;

	$steps = $series ? array(
		array('type' => 'sermons', 'slug' => false),
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

	if (get_option('church_sermon_hide_hero') !== 'true') {
		util_render_snippet('common/single-page-hero-snippet', array(
			'post' => $post,
			'steps' => $steps
		), false);
	}

	do_action('church_layout_after_header');
} ?>


<article class="ccontain sermon">
	<?php if ($pattern) { ?>
		<?= util_get_actual_content($pattern->post_content) ?>
	<?php } else { ?>
		<?= util_render_snippet('sermons/card-options/youtube-video') ?>
		<div class="sermon__content">
			<?= util_render_snippet('sermons/card-options/audio') ?>

			<div class="sermon__content-cards">
				<?php foreach($sermon_cards as $card) { ?>
					<?= util_render_snippet('sermons/card-options/' . sanitize_key($card), array(
						'sermon' => $post,
						'series' => $series
					)); ?>
				<?php } ?>
			</div>

			<?= util_render_snippet('sermons/card-options/download') ?>
		</div>
	<?php } ?>
	
	<div class="sermon__content">
		<?php 
			$content = get_the_content();
			// Quotes are excluded from URLs and each link is escaped, so text in the content can't
			// break out of the generated attributes.
			// URLs straight after a quote or "=" are already inside an attribute, so they're skipped.
			$url = '~(?<![="\'/])(?:(https?)://([^\s<"\']+)|(www\.[^\s<"\']+?\.[^\s<"\']+))(?<![\.,:])~i';
			echo preg_replace_callback($url, function ($matches) {
				return '<a href="' . esc_url($matches[0]) . '" target="_blank" title="' . esc_attr($matches[0]) . '">' . esc_html($matches[0]) . '</a>';
			}, $content);
		?>
	</div>
</article>


<?php get_footer();
