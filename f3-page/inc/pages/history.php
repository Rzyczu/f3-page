<?php

function register_history_entry_cpt() {
    $labels = array(
        'name'               => __('History Entries', 'your-theme-textdomain'),
        'singular_name'      => __('History Entry', 'your-theme-textdomain'),
        'menu_name'          => __('Historia', 'your-theme-textdomain'),
        'add_new'            => __('Dodaj nowy wpis', 'your-theme-textdomain'),
        'add_new_item'       => __('Dodaj nowy wpis do historii', 'your-theme-textdomain'),
        'edit_item'          => __('Edytuj wpis historii', 'your-theme-textdomain'),
        'new_item'           => __('Nowy wpis historii', 'your-theme-textdomain'),
        'view_item'          => __('Zobacz wpis historii', 'your-theme-textdomain'),
        'search_items'       => __('Szukaj wpisów historii', 'your-theme-textdomain'),
        'not_found'          => __('Brak wpisów historii', 'your-theme-textdomain'),
        'not_found_in_trash' => __('Brak wpisów historii w koszu', 'your-theme-textdomain')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'menu_position'      => 18,
        'menu_icon'          => 'dashicons-book',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'history-entry', 'with_front' => false),
    );

    register_post_type('history_entry', $args);
}
add_action('init', 'register_history_entry_cpt');


function enable_theme_supports() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'enable_theme_supports');

function add_history_entry_meta_box() {
    add_meta_box(
        'history_entry_date_meta',
        __('History Entry Date', 'your-theme-textdomain'),
        'render_history_entry_meta_box',
        'history_entry',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_history_entry_meta_box');

function render_history_entry_meta_box($post) {
    $value = get_post_meta($post->ID, '_history_entry_date', true);
    ?>
    <label for="history_entry_date"><?php _e('Enter date (YYYY or DD.MM.YYYY):', 'your-theme-textdomain'); ?></label>
    <input type="text" id="history_entry_date" name="history_entry_date" value="<?php echo esc_attr($value); ?>" style="width:100%;" placeholder="2023 or 14.05.2023" />
    <p style="font-size: 12px; color: #666;"><?php _e('Podaj rok (YYYY) lub pełną datę (DD.MM.YYYY).', 'your-theme-textdomain'); ?></p>
    <?php
}

function save_history_entry_meta($post_id) {
    if (array_key_exists('history_entry_date', $_POST)) {
        $input_date = sanitize_text_field($_POST['history_entry_date']);

        // Przechowywanie oryginalnej wartości dla wyświetlania
        update_post_meta($post_id, '_history_entry_date', $input_date);

        // Konwersja do formatu YYYY-MM-DD dla sortowania
        $sortable_date = '';

        if (preg_match('/^\d{4}$/', $input_date)) {
            $sortable_date = $input_date . '-01-01';
        } elseif (preg_match('/^(\d{2})\.(\d{4})$/', $input_date, $matches)) {
            $sortable_date = $matches[2] . '-' . $matches[1] . '-01';
        } elseif (preg_match('/^(\d{2})\.(\d{2})\.(\d{4})$/', $input_date, $matches)) {
            $sortable_date = $matches[3] . '-' . $matches[2] . '-' . $matches[1];
        }

        if (!empty($sortable_date)) {
            update_post_meta($post_id, '_history_entry_date_sortable', $sortable_date);
        } else {
            delete_post_meta($post_id, '_history_entry_date_sortable');
        }
    }
}
add_action('save_post', 'save_history_entry_meta');

