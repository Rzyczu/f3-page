<?php
add_filter('manage_edit-structure_columns', function ($columns) {
    $columns['menu_order'] = __('Kolejność', 'your-theme-textdomain');
    return $columns;
});

add_action('manage_structure_posts_custom_column', function ($column, $post_id) {
    if ($column === 'menu_order') {
        echo esc_html(get_post_field('menu_order', $post_id));
    }
}, 10, 2);


add_filter('manage_edit-structure_sortable_columns', function ($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
});

add_action('pre_get_posts', function ($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('post_type') === 'structure' && !$query->get('orderby')) {
        $query->set('orderby', 'menu_order');
        $query->set('order', 'ASC');
    }
});


add_filter('manage_edit-opinion_sortable_columns', function ($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
});

add_action('pre_get_posts', function ($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('post_type') === 'opinion' && !$query->get('orderby')) {
        $query->set('orderby', 'menu_order');
        $query->set('order', 'ASC');
    }
});
