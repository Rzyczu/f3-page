<?php

function add_history_entry_meta_box() {
    add_meta_box(
        'history_entry_date_meta',
        __('Historia', 'your-theme-textdomain'),
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
    <label for="history_entry_date"><?php _e('Podaj rok (YYYY) lub pełną datę (DD.MM.YYYY):', 'your-theme-textdomain'); ?></label>
    <input type="text" id="history_entry_date" name="history_entry_date" value="<?php echo esc_attr($value); ?>" style="width:100%;" placeholder="2023 or 14.05.2023" />
    <p style="font-size: 12px; color: #666;"><?php _e('Podaj rok (YYYY) lub pełną datę (DD.MM.YYYY).', 'your-theme-textdomain'); ?></p>
    <?php
}

function save_history_entry_meta($post_id) {
    if (array_key_exists('history_entry_date', $_POST)) {
        $input_date = sanitize_text_field($_POST['history_entry_date']);

        update_post_meta($post_id, '_history_entry_date', $input_date);

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

