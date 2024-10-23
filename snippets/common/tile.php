<article class="image-trigger">
	<a href="<?= $url ?>">
		<?php util_render_snippet('common/image', array(
			'src' => $image ? $image : 'https://source.unsplash.com/random/',
			'alt' => $alt ? $alt : $title
		), false); ?>
		<?= $title ?>
	</a>
	<?= $description ?>
	<?php if ($show_read_more) {  ?>
		<a href="<?= $url ?>">
			View <?= $type ?>
		</a>
	<?php } ?>
</article>