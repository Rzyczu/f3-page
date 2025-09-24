<?php

function register_structure_post_type() {
    register_post_type('structure', array(
        'labels' => array(
            'name' => __('Struktury', 'your-theme-textdomain'),
            'singular_name' => __('Struktura', 'your-theme-textdomain'),
            'add_new_item' => __('Dodaj Strukturę', 'your-theme-textdomain'),
            'edit_item' => __('Edytuj Strukturę', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail', 'page-attributes'),
        'menu_icon'    => 'dashicons-admin-site-alt',
    ));

    // Dodanie metaboxów dla dodatkowych pól
    add_action('add_meta_boxes', function () {
        add_meta_box('structure_meta', __('Szczegóły', 'your-theme-textdomain'), 'structure_meta_box', 'structure', 'normal', 'default');
    });

    // Zapisanie danych z metaboxów
    add_action('save_post', function ($post_id) {
        if (array_key_exists('structure_url', $_POST)) {
            update_post_meta($post_id, 'structure_url', esc_url_raw($_POST['structure_url']));
        }
    });
}
add_action('init', 'register_structure_post_type');