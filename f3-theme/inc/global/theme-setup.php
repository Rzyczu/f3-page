<?php
// File: /inc/global/theme-setup.php

function register_theme_menus() {
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'your-theme-textdomain'),
        'footer_menu' => __('Footer Menu', 'your-theme-textdomain'),
    ));
}
add_action('init', 'register_theme_menus');

function theme_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'theme_setup');


