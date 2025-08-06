<?php
	global $post;
	$original_post = $post;
	$pattern = util_get_pattern_object('church_archive_card_pattern');
	$post = $staff;
?>

<div>
	<?= util_get_actual_content($pattern->post_content) ?>
</div>

<?php
	$post = $original_post
?>