<?php
// Plik: /inc/global/theme-setup.php

function register_theme_menus() {
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'your-theme-textdomain'),
        'footer_menu' => __('Footer Menu', 'your-theme-textdomain'),
    ));
}
add_action('init', 'register_theme_menus');
