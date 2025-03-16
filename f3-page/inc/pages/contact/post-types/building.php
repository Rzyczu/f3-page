<?php

function register_building_post_type() {
    register_post_type('building', array(
        'labels' => array(
            'name' => __('Budynki - Kontakt', 'your-theme-textdomain'),
            'singular_name' => __('Budynek', 'your-theme-textdomain'),
            'add_new_item' => __('Dodaj Nowy Budynek', 'your-theme-textdomain'),
            'edit_item' => __('Edytuj Budynek', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title'),
        'menu_icon'    => 'dashicons-admin-home',
        'menu_position'=> 22,
    ));
}
add_action('init', 'register_building_post_type');
