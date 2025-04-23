<?php

function add_homepage_menu_group() {
    add_menu_page(
        __('Strona Główna', 'your-theme-textdomain'),
        __('Strona Główna', 'your-theme-textdomain'),
        'manage_options',
        'homepage_menu',
        '__return_null',
        'dashicons-admin-home',
        15
    );

    add_submenu_page('homepage_menu', __('Opinie', 'your-theme-textdomain'), __('Opinie', 'your-theme-textdomain'), 'manage_options', 'edit.php?post_type=opinion');
    add_submenu_page('homepage_menu', __('Struktury', 'your-theme-textdomain'), __('Struktury', 'your-theme-textdomain'), 'manage_options', 'edit.php?post_type=structure');
}
add_action('admin_menu', 'add_homepage_menu_group');

function remove_homepage_cpt_from_menu() {
    remove_menu_page('edit.php?post_type=opinion');
    remove_menu_page('edit.php?post_type=structure');
}
add_action('admin_menu', 'remove_homepage_cpt_from_menu', 999);
