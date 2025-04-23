<?php

function register_brotherhood_post_type() {
    $labels = array(
        'name'               => __('Sztandary', 'your-theme-textdomain'),
        'singular_name'      => __('Sztandar', 'your-theme-textdomain'),
        'menu_name'          => __('Bractwo Sztandarowe', 'your-theme-textdomain'),
        'add_new'            => __('Dodaj nowy Sztandar', 'your-theme-textdomain'),
        'add_new_item'       => __('Dodaj nowy Sztandar', 'your-theme-textdomain'),
        'edit_item'          => __('Edytuj Sztandar', 'your-theme-textdomain'),
        'new_item'           => __('Nowy Sztandar', 'your-theme-textdomain'),
        'view_item'          => __('Zobacz Sztandar', 'your-theme-textdomain'),
        'search_items'       => __('Wyszukaj Sztandar', 'your-theme-textdomain'),
        'not_found'          => __('Nie znaleziono żadnych sztandarów', 'your-theme-textdomain'),
        'not_found_in_trash' => __('Nie znaleziono żadnych sztandarów w koszu', 'your-theme-textdomain')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-flag',
        'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'has_archive'        => false,
        'publicly_queryable' => false,
    );

    register_post_type('brotherhood_banner', $args);
}
add_action('init', 'register_brotherhood_post_type');