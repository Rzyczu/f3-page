<?php
add_filter('manage_edit-document_columns', function($columns) {
    $columns['document_order'] = __('Kolejność', 'your-theme-textdomain');
    return $columns;
});

add_action('manage_document_posts_custom_column', function($column, $post_id) {
    if ($column === 'document_order') {
        echo esc_html(get_post_meta($post_id, 'document_order', true));
    }
}, 10, 2);

add_filter('manage_edit-document_sortable_columns', function ($columns) {
    $columns['document_order'] = 'document_order';
    return $columns;
});

add_action('pre_get_posts', function ($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('orderby') === 'document_order' && $query->get('post_type') === 'document') {
        $query->set('orderby', 'document_order');
    }
});