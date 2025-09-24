<?php
// File: /inc/global/enqueue-scripts.php

function enqueue_theme_assets() {
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('theme-custom-styles', get_template_directory_uri() . '/assets/css/custom.min.css', array(), '1.0.1');

    wp_enqueue_script('navbar', get_template_directory_uri() . '/assets/js/navbar.js', array(), '1.0.0', true);
    wp_enqueue_script('footer', get_template_directory_uri() . '/assets/js/footer-behavior.js', array(), '1.0.0', true);

    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null);
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets');

function enqueue_theme_scripts() {
    // Skrypty dla strony głównej (index.php)
    if (is_front_page()) {
        wp_enqueue_script('opinions-script', get_template_directory_uri() . '/assets/js/opinions.js', array(), '1.0.0', true);
        wp_enqueue_script('news-script', get_template_directory_uri() . '/assets/js/news.js', array(), '1.0.0', true);
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    }

    // Skrypty dla strony "About Us"
    if (is_page('about-us')) {
        wp_enqueue_script('circular-slider-script', get_template_directory_uri() . '/assets/js/circular-slider.js', array(), '2.0.0', true);
        wp_enqueue_script('board-script', get_template_directory_uri() . '/assets/js/board.js', array(), '1.0.0', true);
        wp_enqueue_script('banner-brotherhood-script', get_template_directory_uri() . '/assets/js/banner-brotherhood.js', array(), '1.0.0', true);
    }

    // Skrypty dla strony "Join Us"
    if (is_page('join-us')) {
        wp_enqueue_script('scout-path-script', get_template_directory_uri() . '/assets/js/scout-path.js', array(), '1.0.0', true);
    }

    // Skrypty dla strony "Contact"
    if (is_page('contact')) {
        wp_enqueue_script('contact-script', get_template_directory_uri() . '/assets/js/contact.js', array(), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

// remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function mytheme_enqueue_extension_error_suppressor() {
    wp_enqueue_script('suppress-extension-errors', get_template_directory_uri() . '/assets/js/suppress-extension-errors.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_extension_error_suppressor');
