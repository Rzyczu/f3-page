<?php

function enqueue_admin_media() {
    if (is_admin()) {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'enqueue_admin_media');

function add_resource_item_meta_box() {
    add_meta_box(
        'resource_item_url_meta',
        __('Link', 'your-theme-textdomain'),
        'resource_item_url_meta_box_callback',
        'resource_item',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_resource_item_meta_box');

function resource_item_url_meta_box_callback($post) {
    $value = get_post_meta($post->ID, 'resource_item_url', true);
    ?>
    <label for="resource_item_url"><?php _e('URL do pobrania/pliku', 'your-theme-textdomain'); ?></label><br>

    <input type="url" id="resource_item_url" name="resource_item_url" value="<?php echo esc_url($value); ?>" style="width: 80%;" placeholder="https://example.com">
    <button type="button" class="button upload_media_button"><?php _e('Wybierz plik', 'your-theme-textdomain'); ?></button>

    <script>
        jQuery(document).ready(function($) {
            $('.upload_media_button').click(function(e) {
                e.preventDefault();
                var frame = wp.media({
                    title: '<?php _e("Wybierz lub wgraj plik", "your-theme-textdomain"); ?>',
                    button: { text: '<?php _e("Use this file", "your-theme-textdomain"); ?>' },
                    multiple: false
                });

                frame.on('select', function() {
                    var attachment = frame.state().get('selection').first().toJSON();
                    $('#resource_item_url').val(attachment.url);
                });

                frame.open();
            });
        });
    </script>
    <?php
}

function resource_item_save_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['resource_item_url'])) {
        update_post_meta($post_id, 'resource_item_url', esc_url($_POST['resource_item_url']));
    }
}
add_action('save_post', 'resource_item_save_meta');

function redirect_resource_item() {
    if (is_singular('resource_item')) {
        $post_id = get_queried_object_id();
        $resource_url = get_post_meta($post_id, 'resource_item_url', true);

        if (!empty($resource_url)) {
            wp_redirect($resource_url);
            exit;
        }
    }
}
add_action('template_redirect', 'redirect_resource_item');
