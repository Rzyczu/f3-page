<?php
add_filter('manage_edit-building_columns', function ($columns) {
    $columns['menu_order'] = __('Kolejność', 'your-theme-textdomain');
    return $columns;
});

add_action('manage_building_posts_custom_column', function ($column, $post_id) {
    if ($column === 'menu_order') {
        echo esc_html(get_post_field('menu_order', $post_id));
    }
}, 10, 2);

add_filter('manage_edit-building_sortable_columns', function ($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
});

add_action('pre_get_posts', function ($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('orderby') === 'menu_order' && $query->get('post_type') === 'building') {
        $query->set('orderby', 'menu_order');
    }
});