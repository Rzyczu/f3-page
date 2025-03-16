<?php

function register_news_post_type() {
    register_post_type('news', array(
        'labels' => array(
            'name' => __('Wydarzenia', 'your-theme-textdomain'),
            'singular_name' => __('Wydarzenie', 'your-theme-textdomain'),
            'add_new_item' => __('Dodaj Wpis', 'your-theme-textdomain'),
            'edit_item' => __('Edytuj Wpis', 'your-theme-textdomain'),
            'new_item' => __('Nowy Pis', 'your-theme-textdomain'),
            'view_item' => __('Zobacz Wpis', 'your-theme-textdomain'),
            'not_found' => __('Nie znaleziono żadnych wpisów', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => 'news',
        'rewrite' => array('slug' => 'news', 'with_front' => false),
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-megaphone',
        'menu_position'=> 16,
    ));
}
add_action('init', 'register_news_post_type');

function remove_unwanted_news_fields() {
    remove_post_type_support('news', 'comments');
    remove_post_type_support('news', 'custom-fields');
    remove_post_type_support('news', 'excerpt');
}
add_action('init', 'remove_unwanted_news_fields');