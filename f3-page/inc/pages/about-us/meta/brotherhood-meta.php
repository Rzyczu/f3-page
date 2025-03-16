<?php

function brotherhood_add_meta_box() {
    add_meta_box(
        'brotherhood_order_meta',
        __('Kolejność', 'your-theme-textdomain'),
        'brotherhood_order_meta_box_callback',
        'brotherhood_banner',
        'side',
        'default'
    );
}

function brotherhood_order_meta_box_callback($post) {
    $value = get_post_meta($post->ID, 'brotherhood_order', true);
    ?>
    <label for="brotherhood_order"><?php _e('Kolejność (mnijesze wartości wyświetlają się wcześniej)', 'your-theme-textdomain'); ?></label>
    <input type="number" id="brotherhood_order" name="brotherhood_order" value="<?php echo esc_attr($value); ?>" style="width: 100%;" min="1">
    <?php
}

function brotherhood_save_order_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['brotherhood_order'])) {
        update_post_meta($post_id, 'brotherhood_order', intval($_POST['brotherhood_order']));
    }
}

add_action('add_meta_boxes', 'brotherhood_add_meta_box');
add_action('save_post', 'brotherhood_save_order_meta');
