<?php

function register_resource_group_cpt() {
    $labels = array(
        'name'               => __('Grupy Twórzczości', 'your-theme-textdomain'),
        'singular_name'      => __('Grópa Twórczości', 'your-theme-textdomain'),
        'menu_name'          => __('Grupy Twórzczości', 'your-theme-textdomain'),
        'add_new'            => __('Dodaj nową grupę', 'your-theme-textdomain'),
        'add_new_item'       => __('Dodaj nową grupę', 'your-theme-textdomain'),
        'edit_item'          => __('Edytuj grupę', 'your-theme-textdomain'),
        'new_item'           => __('Nowa grupa', 'your-theme-textdomain'),
        'view_item'          => __('Zobacz grupę', 'your-theme-textdomain'),
        'search_items'       => __('Wyszukaj grupę', 'your-theme-textdomain'),
        'not_found'          => __('Nie znalezniono żadnej grupy', 'your-theme-textdomain'),
        'not_found_in_trash' => __('Nie znalezniono żadnej grupy w koszu', 'your-theme-textdomain')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-category',
        'supports'           => array('title', 'editor', 'page-attributes'),
        'hierarchical'       => false,
        'has_archive'        => false,
        'rewrite'            => array('slug' => 'resource-group'),
    );

    register_post_type('resource_group', $args);
}
add_action('init', 'register_resource_group_cpt');