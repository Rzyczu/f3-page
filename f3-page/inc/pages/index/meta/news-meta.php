<?php
function add_news_meta_boxes() {
    add_meta_box(
        'news_date_meta',
        __('Data wydarzenia', 'your-theme-textdomain'),
        'news_date_meta_box_callback',
        'news',
        'side',
        'high'
    );

    add_meta_box(
        'news_link_meta',
        __('Link do Facebooka', 'your-theme-textdomain'),
        'news_link_meta_box_callback',
        'news',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_news_meta_boxes');

function news_date_meta_box_callback($post) {
    $news_date = get_post_meta($post->ID, '_news_date', true);

    if (!$news_date) {
        $news_date = date('d.m.Y');
    }

    ?>
    <label for="news_date"><?php _e('Wybierz datę wydarzenia:', 'your-theme-textdomain'); ?></label>
    <input type="text" id="news_date" name="news_date" value="<?php echo esc_attr($news_date); ?>" class="widefat news-date-picker">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            jQuery("#news_date").datepicker({
                dateFormat: "dd.mm.yy"
            });
        });
    </script>
    <?php
}

function save_news_date_meta($post_id) {
    if (isset($_POST['news_date'])) {
        update_post_meta($post_id, '_news_date', sanitize_text_field($_POST['news_date']));
    }
}
add_action('save_post', 'save_news_date_meta');

function news_link_meta_box_callback($post) {
    $news_link = get_post_meta($post->ID, '_news_link', true);
    ?>
    <label for="news_link"><?php _e('Wklej link do posta na Facebooku:', 'your-theme-textdomain'); ?></label>
    <input type="url" id="news_link" name="news_link" value="<?php echo esc_attr($news_link); ?>" class="widefat">
    <?php
}

function save_news_meta($post_id) {
    // Zapis daty wydarzenia
    if (isset($_POST['news_date'])) {
        $raw_date = sanitize_text_field($_POST['news_date']);
        update_post_meta($post_id, '_news_date', $raw_date);

        // Format ISO do sortowania
        $date_parts = DateTime::createFromFormat('d.m.Y', $raw_date);
        if ($date_parts) {
            update_post_meta($post_id, '_news_date_sort', $date_parts->format('Y-m-d'));
        }
    }

    // Zapis linku do Facebooka
    if (isset($_POST['news_link'])) {
        update_post_meta($post_id, '_news_link', esc_url_raw($_POST['news_link']));
    }
}

add_action('save_post', 'save_news_meta');
