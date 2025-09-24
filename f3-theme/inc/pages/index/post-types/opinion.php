<?php

function register_opinion_post_type() {
    register_post_type('opinion', array(
        'labels' => array(
            'name' => __('Opinie', 'your-theme-textdomain'),
            'singular_name' => __('Opinia', 'your-theme-textdomain'),
            'add_new_item' => __('Dodaj Opinię', 'your-theme-textdomain'),
            'edit_item' => __('Edytuj Opinię', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('editor', 'page-attributes'),
        'rewrite' => true,
        'menu_icon'    => 'dashicons-thumbs-up',
    ));

}
add_action('init', 'register_opinion_post_type');

function disable_wpautop_for_opinion($content) {
    if (get_post_type() == 'opinion') {
        remove_filter('the_content', 'wpautop');
    }
    return $content;
}
add_filter('the_content', 'disable_wpautop_for_opinion', 0);
