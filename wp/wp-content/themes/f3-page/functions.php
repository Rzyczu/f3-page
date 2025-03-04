<?php
// Wczytywanie plików globalnych
require_once get_template_directory() . '/inc/global/enqueue-scripts.php';
require_once get_template_directory() . '/inc/global/theme-setup.php';
require_once get_template_directory() . '/inc/global/forms.php';
require_once get_template_directory() . '/inc/global/customizer.php';
require_once get_template_directory() . '/inc/global/post-types.php';
require_once get_template_directory() . '/inc/global/pages.php';

// Wczytywanie plików dla stron
require_once get_template_directory() . '/inc/pages/index.php';
require_once get_template_directory() . '/inc/pages/about-us.php';
require_once get_template_directory() . '/inc/pages/contact.php';
require_once get_template_directory() . '/inc/pages/our-creativity.php';
require_once get_template_directory() . '/inc/pages/join-us.php';
require_once get_template_directory() . '/inc/pages/support-us.php';
require_once get_template_directory() . '/inc/pages/history.php';

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

function add_bg_white_to_body_class($classes) {
    // Dodaj klasę 'bg-white' do istniejących klas
    $classes[] = 'bg-white';
    return $classes;
}
add_filter('body_class', 'add_bg_white_to_body_class');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function create_privacy_policy_page() {
    $page_title = 'Polityka Prywatności';
    $page_content = 'Tutaj znajdzie się treść polityki prywatności.';
    $page_slug = 'polityka-prywatnosci';

    $page_check = get_page_by_path($page_slug);
    if (!$page_check) {
        $page_id = wp_insert_post([
            'post_title'     => $page_title,
            'post_content'   => $page_content,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'post_name'      => $page_slug,
            'post_author'    => 1,
            'comment_status' => 'closed',
        ]);
    }
}
add_action('after_setup_theme', 'create_privacy_policy_page');
