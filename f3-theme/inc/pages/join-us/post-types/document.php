<?php

function register_document_post_type() {
    register_post_type('document', array(
        'labels' => array(
            'name' => __('Dokumenty - Dołącz do nas', 'your-theme-textdomain'),
            'singular_name' => __('Kokument', 'your-theme-textdomain'),
            'add_new_item' => __('Dodaj Dokument', 'your-theme-textdomain'),
            'edit_item' => __('Edytuj Dokument', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title' , 'page-attributes'),
        'menu_icon'    => 'dashicons-media-document',
        'menu_position'=> 19,
    ));

    add_action('add_meta_boxes', function () {
        add_meta_box('document_meta', __('Szczegóły', 'your-theme-textdomain'), 'document_meta_box', 'document', 'normal', 'default');
    });    

    add_action('save_post', function ($post_id) {
        if (array_key_exists('document_link', $_POST)) {
            update_post_meta($post_id, 'document_link', esc_url_raw($_POST['document_link']));
        }
        if (array_key_exists('document_description', $_POST)) {
            update_post_meta($post_id, 'document_description', sanitize_text_field($_POST['document_description']));
        }
    });
}
add_action('init', 'register_document_post_type');