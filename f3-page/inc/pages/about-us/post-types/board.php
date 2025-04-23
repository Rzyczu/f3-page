<?php

function register_board_member_post_type() {
    register_post_type('board_member', array(
        'labels' => array(
            'name' => __('Rada Szczepu', 'your-theme-textdomain'),
            'singular_name' => __('Członek Rady', 'your-theme-textdomain'),
            'add_new_item' => __('Dodaj Nowego Członka', 'your-theme-textdomain'),
            'edit_item' => __('Edytuj Członka', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail', 'page-attributes' ),
        'menu_icon'    => 'dashicons-businessman',
    ));

    // Dodanie metaboxów dla grupy i tytułu
    add_action('add_meta_boxes', function () {
        add_meta_box('board_member_meta', __('Szczegóły', 'your-theme-textdomain'), 'board_member_meta_box', 'board_member', 'normal', 'default');
    });

    // Zapisanie danych metaboxów
    add_action('save_post', function ($post_id) {
        if (array_key_exists('person_title', $_POST)) {
            update_post_meta($post_id, 'person_title', sanitize_text_field($_POST['person_title']));
        }
        if (array_key_exists('board_group', $_POST)) {
            update_post_meta($post_id, 'board_group', sanitize_text_field($_POST['board_group']));
        }
    });
}
add_action('init', 'register_board_member_post_type');