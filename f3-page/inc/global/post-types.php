<?php

// Footer
function register_footer_link_post_type() {
    register_post_type('footer_link', array(
        'labels' => array(
            'name' => __('Footer Links', 'your-theme-textdomain'),
            'singular_name' => __('Footer Link', 'your-theme-textdomain'),
            'add_new_item' => __('Add New Footer Link', 'your-theme-textdomain'),
            'edit_item' => __('Edit Footer Link', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title'),
        'menu_position'=> 23,
    ));

    add_action('add_meta_boxes', function () {
        add_meta_box('footer_link_meta', __('Footer Link Details', 'your-theme-textdomain'), 'footer_link_meta_box', 'footer_link', 'normal', 'default');
    });

    add_action('save_post', function ($post_id) {
        if (array_key_exists('footer_link_url', $_POST)) {
            update_post_meta($post_id, 'footer_link_url', esc_url_raw($_POST['footer_link_url']));
        }
        if (array_key_exists('footer_link_target', $_POST)) {
            update_post_meta($post_id, 'footer_link_target', sanitize_text_field($_POST['footer_link_target']));
        }
    });
}
add_action('init', 'register_footer_link_post_type');

function footer_link_meta_box($post) {
    $url = get_post_meta($post->ID, 'footer_link_url', true);
    $target = get_post_meta($post->ID, 'footer_link_target', true);
    ?>
    <p>
        <label for="footer_link_url"><?php _e('URL', 'your-theme-textdomain'); ?></label>
        <input type="url" id="footer_link_url" name="footer_link_url" value="<?php echo esc_url($url); ?>" style="width: 100%;" placeholder="https://example.com">
    </p>
    <p>
        <label for="footer_link_target"><?php _e('Link Target', 'your-theme-textdomain'); ?></label>
        <select id="footer_link_target" name="footer_link_target" style="width: 100%;">
            <option value="_self" <?php selected($target, '_self'); ?>><?php _e('Same Tab (_self)', 'your-theme-textdomain'); ?></option>
            <option value="_blank" <?php selected($target, '_blank'); ?>><?php _e('New Tab (_blank)', 'your-theme-textdomain'); ?></option>
        </select>
    </p>
    <?php
}

function sanitize_footer_links($input) {
    $decoded = json_decode($input, true);
    if (is_array($decoded)) {
        foreach ($decoded as &$link) {
            if (empty($link['url']) || !filter_var($link['url'], FILTER_VALIDATE_URL)) {
                return new WP_Error('invalid_url', 'Podano nieprawidłowy URL w linkach stopki.');
            }
            $link['label'] = sanitize_text_field($link['label']);
        }
        return $decoded;
    }
    return array();
}


// Menu Pages position
function change_pages_menu_position() {
    remove_menu_page('edit.php?post_type=page');

    add_menu_page(
        __('Strony', 'your-theme-textdomain'),
        __('Strony', 'your-theme-textdomain'),
        'edit_pages',
        'edit.php?post_type=page',
        '',
        'dashicons-admin-page',
        24 
    );
}
add_action('admin_menu', 'change_pages_menu_position', 999);
