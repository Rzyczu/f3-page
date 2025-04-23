<?php

function add_team_gender_column($columns) {
    $columns['team_gender'] = __('Płeć', 'your-theme-textdomain');
    return $columns;
}
add_filter('manage_edit-team_columns', 'add_team_gender_column');

function fill_team_gender_column($column, $post_id) {
    if ($column === 'team_gender') {
        $gender = get_post_meta($post_id, 'team_gender', true);
        if ($gender === 'male') {
            echo __('Męskie', 'your-theme-textdomain');
        } elseif ($gender === 'female') {
            echo __('Żeńskie', 'your-theme-textdomain');
        } else {
            echo __('N/A', 'your-theme-textdomain');
        }
    }
}
add_action('manage_team_posts_custom_column', 'fill_team_gender_column', 10, 2);

function make_team_gender_column_sortable($columns) {
    $columns['team_gender'] = 'team_gender';
    return $columns;
}
add_filter('manage_edit-team_sortable_columns', 'make_team_gender_column_sortable');

function sort_team_by_gender($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if (isset($query->query_vars['orderby']) && $query->query_vars['orderby'] === 'team_gender') {
        $query->set('meta_key', 'team_gender');
        $query->set('orderby', 'meta_value');
    }
}
add_action('pre_get_posts', 'sort_team_by_gender');

function add_board_member_group_column($columns) {
    $columns['board_group'] = __('Grupa', 'your-theme-textdomain');
    return $columns;
}
add_filter('manage_edit-board_member_columns', 'add_board_member_group_column');

function fill_board_member_group_column($column, $post_id) {
    if ($column === 'board_group') {
        $group = get_post_meta($post_id, 'board_group', true);
        if ($group === 'personnel') {
            echo __('Kadra', 'your-theme-textdomain');
        } elseif ($group === 'leaders') {
            echo __('Drużynowi', 'your-theme-textdomain');
        } elseif ($group === 'instructors') {
            echo __('Instruktorzy', 'your-theme-textdomain');
        } else {
            echo __('N/A', 'your-theme-textdomain');
        }
    }
}
add_action('manage_board_member_posts_custom_column', 'fill_board_member_group_column', 10, 2);

function make_board_member_group_column_sortable($columns) {
    $columns['board_group'] = 'board_group';
    return $columns;
}
add_filter('manage_edit-board_member_sortable_columns', 'make_board_member_group_column_sortable');

function sort_board_member_by_group($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if (isset($query->query_vars['orderby']) && $query->query_vars['orderby'] === 'board_group') {
        $query->set('meta_key', 'board_group');
        $query->set('orderby', 'meta_value');
    }
}
add_action('pre_get_posts', 'sort_board_member_by_group');


function add_board_member_order_column($columns) {
    $columns['person_order'] = __('Kolejność', 'your-theme-textdomain');
    return $columns;
}
add_filter('manage_edit-board_member_columns', 'add_board_member_order_column');

function fill_board_member_order_column($column, $post_id) {
    if ($column === 'person_order') {
        $order = get_post_meta($post_id, 'person_order', true);
        echo esc_html($order);
    }
}
add_action('manage_board_member_posts_custom_column', 'fill_board_member_order_column', 10, 2);

function make_board_member_order_column_sortable($columns) {
    $columns['person_order'] = 'person_order';
    return $columns;
}
add_filter('manage_edit-board_member_sortable_columns', 'make_board_member_order_column_sortable');

function sort_board_member_by_order($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if (isset($query->query_vars['orderby']) && $query->query_vars['orderby'] === 'person_order') {
        $query->set('meta_key', 'person_order');
        $query->set('orderby', 'meta_value_num'); // Sortowanie numeryczne
    }
}
add_action('pre_get_posts', 'sort_board_member_by_order');