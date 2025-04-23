<?php

function register_history_entry_cpt() {
    $labels = array(
        'name'               => __('Historia', 'your-theme-textdomain'),
        'singular_name'      => __('Kartka Historii', 'your-theme-textdomain'),
        'menu_name'          => __('Historia', 'your-theme-textdomain'),
        'add_new'            => __('Dodaj nowy wpis', 'your-theme-textdomain'),
        'add_new_item'       => __('Dodaj nowy wpis do historii', 'your-theme-textdomain'),
        'edit_item'          => __('Edytuj wpis historii', 'your-theme-textdomain'),
        'new_item'           => __('Nowy wpis historii', 'your-theme-textdomain'),
        'view_item'          => __('Zobacz wpis historii', 'your-theme-textdomain'),
        'search_items'       => __('Szukaj wpisów historii', 'your-theme-textdomain'),
        'not_found'          => __('Brak wpisów historii', 'your-theme-textdomain'),
        'not_found_in_trash' => __('Brak wpisów historii w koszu', 'your-theme-textdomain')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'menu_position'      => 18,
        'menu_icon'          => 'dashicons-book',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'history-entry', 'with_front' => false),
    );

    register_post_type('history_entry', $args);
}
add_action('init', 'register_history_entry_cpt');
