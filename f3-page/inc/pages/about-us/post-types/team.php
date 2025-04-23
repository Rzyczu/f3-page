<?php

function register_team_post_type() {
    register_post_type('team', array(
        'labels' => array(
            'name' => __('Drużyny', 'your-theme-textdomain'),
            'singular_name' => __('Drużyna', 'your-theme-textdomain'),
            'add_new_item' => __('Dodaj Nową Drużynę', 'your-theme-textdomain'),
            'edit_item' => __('Edytuj Drużynę', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail', 'page-attributes'),
        'menu_icon'    => 'dashicons-networking',
    ));         

    add_action('add_meta_boxes', function () {
        add_meta_box('team_meta', __('Szczegóły', 'your-theme-textdomain'), 'team_meta_box', 'team', 'normal', 'default');
    });

    add_action('save_post', function ($post_id) {
        if (array_key_exists('team_short_name', $_POST)) {
            update_post_meta($post_id, 'team_short_name', sanitize_text_field($_POST['team_short_name']));
        }
        if (array_key_exists('team_description', $_POST)) {
            update_post_meta($post_id, 'team_description', sanitize_textarea_field($_POST['team_description']));
        }
        if (array_key_exists('team_gender', $_POST)) {
            update_post_meta($post_id, 'team_gender', sanitize_text_field($_POST['team_gender']));
        }
        if (isset($_POST['team_links']) && isset($_POST['team_links']['url']) && isset($_POST['team_links']['icon'])) {
            $urls  = $_POST['team_links']['url'];
            $icons = $_POST['team_links']['icon'];
            $links = array();
            foreach ($urls as $index => $url) {
                if (!empty($url) || !empty($icons[$index])) {
                    $links[] = array(
                        'url'  => esc_url_raw($url),
                        'icon' => sanitize_text_field($icons[$index]),
                    );
                }
            }
            update_post_meta($post_id, 'team_links', $links);
        }
    });
}
add_action('init', 'register_team_post_type');