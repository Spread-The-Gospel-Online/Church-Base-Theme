<article class="tile image-trigger">
	<a href="<?= $url ?>">
		<?php util_render_snippet('common/image', array(
			'src' => $image ? $image : 'https://source.unsplash.com/random/',
			'alt' => $alt ? $alt : $title
		), false); ?>
		<?= $title ?>
	</a>
	<?php if (isset($description)) { ?>
		<?= $description ?>
	<?php } ?>
	<?php if (isset($show_read_more)) {  ?>
		<a href="<?= $url ?>">
			View <?= $type ?>
		</a>
	<?php } ?>
</article>