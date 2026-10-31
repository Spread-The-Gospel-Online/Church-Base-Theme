<?php
    global $post;
    $original_post = $post;

    $pattern = util_get_pattern_object_by_slug($staff_pattern);
    $staff_posts = get_posts(array(
        'post_type' => 'staff',
        'post__in' => array_map('absint', explode(',', $staff_ids))
    ));

    $wrapper_classes = util_get_block_wrapper_classes($block_container, $block_bottom_margin, $block_bottom_margin_desktop, $block_padding);
?>

<?php if ($pattern) { ?>
    <div
        class="flex-grid <?= esc_attr($classes) ?> <?= esc_attr($wrapper_classes) ?>"
        style="--number-columns: <?= absint($columns) ?>;"
    >
        <?php foreach ($staff_posts as $staff) { ?>
            <?php $post = $staff; ?>
            <div>
                <?= util_get_actual_content($pattern->post_content); ?>
            </div>
        <?php } ?>
        <?php $post = $original_post; ?>
    </div>
<?php } ?>