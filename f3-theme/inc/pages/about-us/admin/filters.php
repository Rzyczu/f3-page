<?php
add_filter('manage_edit-team_columns', function ($columns) {
    $columns['menu_order'] = __('Kolejność', 'your-theme-textdomain');
    return $columns;
});

add_action('manage_team_posts_custom_column', function ($column, $post_id) {
    if ($column === 'menu_order') {
        echo esc_html(get_post_field('menu_order', $post_id));
    }
}, 10, 2);

add_filter('manage_edit-board_member_columns', function ($columns) {
    $columns['menu_order'] = __('Kolejność', 'your-theme-textdomain');
    return $columns;
});

add_action('manage_board_member_posts_custom_column', function ($column, $post_id) {
    if ($column === 'menu_order') {
        echo esc_html(get_post_field('menu_order', $post_id));
    }
}, 10, 2);


add_filter('manage_edit-brotherhood_banner_columns', function ($columns) {
    $columns['brotherhood_order'] = __('Kolejność', 'your-theme-textdomain');
    return $columns;
});

add_action('manage_brotherhood_banner_posts_custom_column', function ($column, $post_id) {
    if ($column === 'brotherhood_order') {
        echo esc_html(get_post_field('brotherhood_order', $post_id));
    }
}, 10, 2);

add_filter('manage_edit-board_member_sortable_columns', function ($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
});

add_action('pre_get_posts', function ($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('post_type') === 'board_member' && !$query->get('orderby')) {
        $query->set('orderby', 'menu_order');
        $query->set('order', 'ASC');
    }
});

add_filter('manage_edit-brotherhood_banner_sortable_columns', function ($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
});

add_action('pre_get_posts', function ($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('post_type') === 'brotherhood_banner' && !$query->get('orderby')) {
        $query->set('orderby', 'menu_order');
        $query->set('order', 'ASC');
    }
});

add_filter('manage_edit-team_sortable_columns', function ($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
});

add_action('pre_get_posts', function ($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('post_type') === 'team' && !$query->get('orderby')) {
        $query->set('orderby', 'menu_order');
        $query->set('order', 'ASC');
    }
});