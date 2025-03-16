<?php

function customize_our_creativity_admin_menu() {
    remove_menu_page('edit.php?post_type=resource_group');
    remove_menu_page('edit.php?post_type=resource_item');

    add_menu_page(
        __('Nasza Twórczość', 'your-theme-textdomain'),
        __('Nasza Twórczość', 'your-theme-textdomain'),
        'manage_options',
        'our_creativity_main',
        '__return_null',
        'dashicons-admin-customizer',
        20
    );

    add_submenu_page(
        'our_creativity_main',
        __('Grupy', 'your-theme-textdomain'),
        __('Grupy', 'your-theme-textdomain'),
        'manage_options',
        'edit.php?post_type=resource_group'
    );

    add_submenu_page(
        'our_creativity_main',
        __('Pliki', 'your-theme-textdomain'),
        __('Pliki', 'your-theme-textdomain'),
        'manage_options',
        'edit.php?post_type=resource_item'
    );
}
add_action('admin_menu', 'customize_our_creativity_admin_menu');