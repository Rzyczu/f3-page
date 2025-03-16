<?php

function filter_team_by_gender($post_type) {
    if ($post_type === 'team') {
        $selected = isset($_GET['team_gender_filter']) ? $_GET['team_gender_filter'] : '';
        ?>
        <select name="team_gender_filter">
            <option value=""><?php _e('Wszystkie Płcie', 'your-theme-textdomain'); ?></option>
            <option value="male" <?php selected($selected, 'male'); ?>><?php _e('Męskie', 'your-theme-textdomain'); ?></option>
            <option value="female" <?php selected($selected, 'female'); ?>><?php _e('Żeńskie', 'your-theme-textdomain'); ?></option>
        </select>
        <?php
    }
}
add_action('restrict_manage_posts', 'filter_team_by_gender');

function filter_team_query_by_gender($query) {
    global $pagenow;
    if ($pagenow === 'edit.php' && isset($_GET['team_gender_filter']) && $_GET['team_gender_filter'] != '') {
        $query->query_vars['meta_key'] = 'team_gender';
        $query->query_vars['meta_value'] = sanitize_text_field($_GET['team_gender_filter']);
    }
}
add_filter('parse_query', 'filter_team_query_by_gender');

function filter_board_member_by_group($post_type) {
    if ($post_type === 'board_member') {
        $selected = isset($_GET['board_group_filter']) ? $_GET['board_group_filter'] : '';
        ?>
        <select name="board_group_filter">
            <option value=""><?php _e('Wszystkie Grupy', 'your-theme-textdomain'); ?></option>
            <option value="personnel" <?php selected($selected, 'personnel'); ?>><?php _e('Kadra', 'your-theme-textdomain'); ?></option>
            <option value="leaders" <?php selected($selected, 'leaders'); ?>><?php _e('Drużynowi', 'your-theme-textdomain'); ?></option>
            <option value="instructors" <?php selected($selected, 'instructors'); ?>><?php _e('Instruktorzy', 'your-theme-textdomain'); ?></option>
        </select>
        <?php
    }
}
add_action('restrict_manage_posts', 'filter_board_member_by_group');

function filter_board_member_query_by_group($query) {
    global $pagenow;
    if ($pagenow === 'edit.php' && isset($_GET['board_group_filter']) && $_GET['board_group_filter'] != '') {
        $query->query_vars['meta_key'] = 'board_group';
        $query->query_vars['meta_value'] = sanitize_text_field($_GET['board_group_filter']);
    }
}
add_filter('parse_query', 'filter_board_member_query_by_group');