<?php
add_filter('manage_edit-document_columns', function ($columns) {
    $columns['menu_order'] = __('Kolejność', 'your-theme-textdomain');
    return $columns;
});

add_action('manage_document_posts_custom_column', function ($column, $post_id) {
    if ($column === 'menu_order') {
        echo esc_html(get_post_field('menu_order', $post_id));
    }
}, 10, 2);


add_filter('manage_edit-document_sortable_columns', function ($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
});

add_action('pre_get_posts', function ($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('post_type') === 'document' && !$query->get('orderby')) {
        $query->set('orderby', 'menu_order');
        $query->set('order', 'ASC');
    }
});
