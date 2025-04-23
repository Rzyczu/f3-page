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

add_filter('manage_edit-board_columns', function ($columns) {
    $columns['menu_order'] = __('Kolejność', 'your-theme-textdomain');
    return $columns;
});

add_action('manage_board_posts_custom_column', function ($column, $post_id) {
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

