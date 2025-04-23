<?php

function register_resource_item_cpt() {
    $labels = array(
        'name'               => __('Pliki Twórczości', 'your-theme-textdomain'),
        'singular_name'      => __('Plik', 'your-theme-textdomain'),
        'menu_name'          => __('Pliki Twórczości', 'your-theme-textdomain'),
        'add_new'            => __('Dodaj nowy plik', 'your-theme-textdomain'),
        'add_new_item'       => __('Dodaj nowy plik', 'your-theme-textdomain'),
        'edit_item'          => __('Edytuj plik', 'your-theme-textdomain'),
        'new_item'           => __('Nowy plik', 'your-theme-textdomain'),
        'view_item'          => __('Zobacz plik', 'your-theme-textdomain'),
        'search_items'       => __('Wyszukaj plik', 'your-theme-textdomain'),
        'not_found'          => __('Nie znaleziono żadnych plików', 'your-theme-textdomain'),
        'not_found_in_trash' => __('Nie znaleziono żadnych plików w koszu', 'your-theme-textdomain')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-media-document',
        'supports'           => array('title' , 'excerpt'),
        'hierarchical'       => false,
        'has_archive'        => false,
        'rewrite'            => array('slug' => 'resource-item'),
    );

    register_post_type('resource_item', $args);
}
add_action('init', 'register_resource_item_cpt');