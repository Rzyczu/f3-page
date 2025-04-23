<?php

function register_resource_group_taxonomy() {
    $labels = array(
        'name'              => __('Kategorie Grup Twórczości', 'your-theme-textdomain'),
        'singular_name'     => __('Kategoria grupy', 'your-theme-textdomain'),
        'search_items'      => __('Wyszukaj kategorię', 'your-theme-textdomain'),
        'all_items'         => __('Wszystkie kategorie', 'your-theme-textdomain'),
        'edit_item'         => __('Edytuj kategorię', 'your-theme-textdomain'),
        'update_item'       => __('Wgraj kategorię', 'your-theme-textdomain'),
        'add_new_item'      => __('Dodaj nową kategorię', 'your-theme-textdomain'),
        'new_item_name'     => __('Nazwa kategorii', 'your-theme-textdomain'),
        'menu_name'         => __('Kategorię', 'your-theme-textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'resource-group-category'),
    );

    register_taxonomy('resource_group_category', array('resource_item'), $args);
}
add_action('init', 'register_resource_group_taxonomy');