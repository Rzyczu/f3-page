<?php
function add_news_date_metabox() {
    add_meta_box(
        'news_date_meta',
        __('Data wydarzenia', 'your-theme-textdomain'),
        'news_date_meta_box_callback',
        'news',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'add_news_date_metabox');

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