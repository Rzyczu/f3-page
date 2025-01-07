<?php
// Wczytywanie plików globalnych
require_once get_template_directory() . '/inc/global/enqueue-scripts.php';
require_once get_template_directory() . '/inc/global/theme-setup.php';
require_once get_template_directory() . '/inc/global/forms.php';
require_once get_template_directory() . '/inc/global/customizer.php';
require_once get_template_directory() . '/inc/global/post-types.php';

// Wczytywanie plików dla stron
require_once get_template_directory() . '/inc/pages/index.php';
require_once get_template_directory() . '/inc/pages/about-us.php';
require_once get_template_directory() . '/inc/pages/contact.php';
require_once get_template_directory() . '/inc/pages/join-us.php';
require_once get_template_directory() . '/inc/pages/support-us.php';

function theme_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('title-tag'); // Obsługa dynamicznego tytułu strony
}
add_action('after_setup_theme', 'theme_setup');


function redirect_archives_to_home() {
    if (is_archive()) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('template_redirect', 'redirect_archives_to_home');
