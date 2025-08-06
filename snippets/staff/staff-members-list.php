<?php
    global $post;
    $original_post = $post;

    $pattern = util_get_pattern_object('church_archive_card_pattern');
    $staff_posts = get_posts(array(
        'post_type' => 'staff',
        'post__in' => explode(',', $staff_ids)
    ));

    $wrapper_classes = util_get_block_wrapper_classes($block_container, $block_bottom_margin, $block_bottom_margin_desktop, $block_padding);
?>

<div class="flex-grid <?= $classes ?> <?= $wrapper_classes ?>" style="--number-columns: <?= $columns ?>;">
    <?php foreach ($staff_posts as $staff) { ?>
        <?php $post = $staff; ?>
        <div>
            <?= util_get_actual_content($pattern->post_content); ?>
        </div>
    <?php } ?>
    <?php $post = $original_post; ?>
</div>
