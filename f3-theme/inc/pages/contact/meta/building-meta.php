<?php

function building_iframe_meta_box($post) {
    $iframe_code = get_post_meta($post->ID, 'building_iframe', true);
    ?>
    <p>
        <label for="building_iframe"><?php _e('Iframe Code URL', 'your-theme-textdomain'); ?></label>
        <input type="text" id="building_iframe" name="building_iframe" value="<?php echo esc_url($iframe_code); ?>" style="width: 100%;" />
    </p>
    <?php
    }
add_action('init', 'register_building_post_type');

add_action('add_meta_boxes', function () {
    add_meta_box('building_iframe_meta', __('Harcówka Iframe Code (Google Maps)', 'your-theme-textdomain'), 'building_iframe_meta_box', 'building', 'normal', 'default');
});

add_action('save_post', function ($post_id) {
    if (array_key_exists('building_iframe', $_POST)) {
        update_post_meta($post_id, 'building_iframe', esc_url_raw($_POST['building_iframe']));
    }
});


