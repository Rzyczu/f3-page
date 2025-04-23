<?php

function add_custom_menu_group() {
    add_menu_page(
        __('O nas', 'your-theme-textdomain'),
        __('O nas', 'your-theme-textdomain'),
        'manage_options',
        'structure_menu',
        '__return_null',
        'dashicons-groups',
        17
    );

    add_submenu_page('structure_menu', __('Drużyny', 'your-theme-textdomain'), __('Drużyny', 'your-theme-textdomain'), 'manage_options', 'edit.php?post_type=team');
    add_submenu_page('structure_menu', __('Bractwo sztandarowe', 'your-theme-textdomain'), __('Bractwo sztandarowe', 'your-theme-textdomain'), 'manage_options', 'edit.php?post_type=brotherhood_banner');
    add_submenu_page('structure_menu', __('Rada szczepu', 'your-theme-textdomain'), __('Rada szczepu', 'your-theme-textdomain'), 'manage_options', 'edit.php?post_type=board_member');
}
add_action('admin_menu', 'add_custom_menu_group');

function remove_cpt_from_admin_menu() {
    remove_menu_page('edit.php?post_type=team');
    remove_menu_page('edit.php?post_type=brotherhood_banner');
    remove_menu_page('edit.php?post_type=board_member');
}
add_action('admin_menu', 'remove_cpt_from_admin_menu', 999);

function register_brotherhood_settings() {
    add_option('brotherhood_section_heading', 'Bractwo Szandarowe');
    add_option('brotherhood_section_text', 'Ścisłą Kadrę Szczepu stanowi Szczepowy, Kwatermistrz oraz Viceszczepowi. W składzie rady są wszyscy drużynowi oraz instruktorzy którzy nie mają funkcji w szczepie.');
    
    register_setting('brotherhood_options_group', 'brotherhood_section_heading');
    register_setting('brotherhood_options_group', 'brotherhood_section_text');
}
add_action('admin_init', 'register_brotherhood_settings');

