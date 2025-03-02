<?php

function customize_section_about($wp_customize) {
    $wp_customize->add_section('section_about', array(
        'title' => __('Intro', 'your-theme-textdomain'),
        'priority' => 10,
    ));

    $wp_customize->add_setting('section_about_text', array(
        'default' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('section_about_text', array(
        'label' => __('Text', 'your-theme-textdomain'),
        'section' => 'section_about',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'customize_section_about');

function customize_section_join_us($wp_customize) {
    $wp_customize->add_section('section_join_us', array(
        'title' => __('Dołącz do nas', 'your-theme-textdomain'),
        'priority' => 20,
    ));

    $wp_customize->add_setting('section_join_us_heading', array(
        'default' => __('Dołącz do nas', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_join_us_heading', array(
        'label' => __('Heading', 'your-theme-textdomain'),
        'section' => 'section_join_us',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_join_us_text', array(
        'default' => __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('section_join_us_text', array(
        'label' => __('Text', 'your-theme-textdomain'),
        'section' => 'section_join_us',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('section_join_us_image', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/scouts.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'section_join_us_image', array(
        'label' => __('Image', 'your-theme-textdomain'),
        'section' => 'section_join_us',
    )));

    $wp_customize->add_setting('section_join_us_link', array(
        'default' => home_url('/join-us'),
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('section_join_us_link', array(
        'label' => __('Button Link', 'your-theme-textdomain'),
        'section' => 'section_join_us',
        'type' => 'url',
    ));

    $wp_customize->add_setting('section_join_us_button_text', array(
        'default' => __('Działaj z nami', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_join_us_button_text', array(
        'label' => __('Button Text', 'your-theme-textdomain'),
        'section' => 'section_join_us',
        'type' => 'text',
    ));
}
add_action('customize_register', 'customize_section_join_us');

function register_opinion_post_type() {
    register_post_type('opinion', array(
        'labels' => array(
            'name' => __('Opinions', 'your-theme-textdomain'),
            'singular_name' => __('Opinion', 'your-theme-textdomain'),
            'add_new_item' => __('Add New Opinion', 'your-theme-textdomain'),
            'edit_item' => __('Edit Opinion', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('editor'),
        'rewrite' => true,
        'menu_icon'    => 'dashicons-thumbs-up',
    ));

    // Dodaj pole metabox dla "Person's Name"
    add_action('add_meta_boxes', 'opinion_add_meta_boxes');
}
add_action('init', 'register_opinion_post_type');

function opinion_add_meta_boxes() {
    add_meta_box(
        'opinion_person_meta',
        __('Person', 'your-theme-textdomain'),
        'opinion_person_meta_box',
        'opinion',
        'normal',
        'default'
    );
}

function opinion_person_meta_box($post) {
    $value = get_post_meta($post->ID, 'opinion_person', true);
    ?>
    <label for="opinion_person"><?php _e('Person\'s Name', 'your-theme-textdomain'); ?></label>
    <input type="text" id="opinion_person" name="opinion_person" value="<?php echo esc_attr($value); ?>" style="width: 100%;">
    <?php
}

function opinion_save_post($post_id) {
    // Zapobiegamy zapisowi przy autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
    if (isset($_POST['opinion_person'])) {
         $person = sanitize_text_field($_POST['opinion_person']);
         update_post_meta($post_id, 'opinion_person', $person);

         // Aktualizacja tytułu posta na podstawie Person's Name
         $post_data = array(
             'ID'         => $post_id,
             'post_title' => $person,
         );
         // Unikamy nieskończonej pętli
         remove_action('save_post', 'opinion_save_post');
         wp_update_post($post_data);
         add_action('save_post', 'opinion_save_post');
    }
}
add_action('save_post', 'opinion_save_post');


function setup_theme_features() {
    add_theme_support('post-thumbnails'); // Wsparcie dla obrazków wyróżniających
    add_theme_support('title-tag'); // Automatyczny tytuł strony
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'setup_theme_features');

// // Wsparcie dla wyciągania newsów (standardowy post type)
// function register_news_support() {
//     // Rejestracja obrazków i excerpt dla wpisów
//     add_post_type_support('post', array('excerpt', 'thumbnail'));
// }
// add_action('init', 'register_news_support');

// // Skrócenie długości excerpt (opcjonalnie)
// function custom_excerpt_length($length) {
//     return 20; // Długość w słowach
// }
// add_filter('excerpt_length', 'custom_excerpt_length');

// // Dodanie domyślnego obrazu dla newsów (opcjonalne)
// function get_default_news_image() {
//     return get_template_directory_uri() . '/assets/news-placeholder.jpg';
// }

// // Wsparcie dla logo newsów
// function get_news_logo_image() {
//     return get_template_directory_uri() . '/assets/svg/logo.svg';
// }

function register_structure_post_type() {
    register_post_type('structure', array(
        'labels' => array(
            'name' => __('Structures', 'your-theme-textdomain'),
            'singular_name' => __('Structure', 'your-theme-textdomain'),
            'add_new_item' => __('Add New Structure', 'your-theme-textdomain'),
            'edit_item' => __('Edit Structure', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail'),
        'menu_icon'    => 'dashicons-admin-site-alt',
    ));

    // Dodanie metaboxów dla dodatkowych pól
    add_action('add_meta_boxes', function () {
        add_meta_box('structure_meta', __('Structure Details', 'your-theme-textdomain'), 'structure_meta_box', 'structure', 'normal', 'default');
    });

    // Zapisanie danych z metaboxów
    add_action('save_post', function ($post_id) {
        if (array_key_exists('structure_url', $_POST)) {
            update_post_meta($post_id, 'structure_url', esc_url_raw($_POST['structure_url']));
        }
    });
}
add_action('init', 'register_structure_post_type');

function structure_meta_box($post) {
    $url = get_post_meta($post->ID, 'structure_url', true);
    ?>
    <p>
        <label for="structure_url"><?php _e('URL', 'your-theme-textdomain'); ?></label>
        <input type="url" id="structure_url" name="structure_url" value="<?php echo esc_url($url); ?>" style="width: 100%;" placeholder="https://example.com">
    </p>
    <?php
}

function customize_section_support($wp_customize) {
    $wp_customize->add_section('section_support', array(
        'title' => __('Jak nas wesprzeć?', 'your-theme-textdomain'),
        'priority' => 90,
    ));

    // Ustawienia dla nagłówka i tekstów
    $wp_customize->add_setting('section_support_heading', array(
        'default' => __('Jak nas wesprzeć?', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_heading', array(
        'label' => __('Heading', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_text_donate', array(
        'default' => __('Przekaż nam swój 1,5%', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_donate', array(
        'label' => __('Text for Donate 1.5%', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_link_facebook', array(
        'default' => 'https://www.facebook.com/szczepf3',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('section_support_link_facebook', array(
        'label' => __('Facebook Link', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'url',
    ));

    $wp_customize->add_setting('section_support_text_facebook', array(
        'default' => __('Polub naszą stronę', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_facebook', array(
        'label' => __('Text for Facebook', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_text_recommend', array(
        'default' => __('Poleć nas innym', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_recommend', array(
        'label' => __('Text for Recommend', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));

    // Ustawienia dla danych 1,5%
    $wp_customize->add_setting('section_support_text_details_heading', array(
        'default' => __('Nasze dane 1,5%', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_details_heading', array(
        'label' => __('Heading for Details', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_text_details_name', array(
        'default' => __('Nazwa OPP: Związek Harcerstwa Rzeczypospolitej', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_details_name', array(
        'label' => __('OPP Name', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_text_details_krs', array(
        'default' => __('Numer KRS: 0000057720', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_details_krs', array(
        'label' => __('KRS Number', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_text_details_code', array(
        'default' => __('Kod Szczepu: MAL 078', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_details_code', array(
        'label' => __('Code', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));
}
add_action('customize_register', 'customize_section_support');

function customize_homepage_panel($wp_customize) {
    // Tworzymy nowy panel nadrzędny
    $wp_customize->add_panel('panel_homepage', array(
        'title'       => __('Strona Główna', 'your-theme-textdomain'),
        'priority'    => 25,
        'description' => __('Zarządzaj sekcjami na stronie głównej.', 'your-theme-textdomain'),
    ));

    // Przypisujemy sekcje do panelu "Strona Główna"
    $wp_customize->get_section('section_about')->panel = 'panel_homepage';
    $wp_customize->get_section('section_join_us')->panel = 'panel_homepage';
}
add_action('customize_register', 'customize_homepage_panel');

function add_homepage_menu_group() {
    // Tworzymy główne menu bez przekierowania
    add_menu_page(
        __('Strona Główna', 'your-theme-textdomain'),
        __('Strona Główna', 'your-theme-textdomain'),
        'manage_options',
        'homepage_menu',
        '__return_null', // Brak przekierowania
        'dashicons-admin-home',
        15
    );

    // Dodajemy podmenu dla CPT
    add_submenu_page('homepage_menu', __('Opinie', 'your-theme-textdomain'), __('Opinie', 'your-theme-textdomain'), 'manage_options', 'edit.php?post_type=opinion');
    add_submenu_page('homepage_menu', __('Struktury', 'your-theme-textdomain'), __('Struktury', 'your-theme-textdomain'), 'manage_options', 'edit.php?post_type=structure');
}
add_action('admin_menu', 'add_homepage_menu_group');

// Usuwamy CPT z menu głównego, zostawiając je tylko w "Strona Główna"
function remove_homepage_cpt_from_menu() {
    remove_menu_page('edit.php?post_type=opinion');
    remove_menu_page('edit.php?post_type=structure');
}
add_action('admin_menu', 'remove_homepage_cpt_from_menu', 999);

function register_news_post_type() {
    register_post_type('news', array(
        'labels' => array(
            'name' => __('News', 'your-theme-textdomain'),
            'singular_name' => __('News Item', 'your-theme-textdomain'),
            'add_new_item' => __('Add New News Item', 'your-theme-textdomain'),
            'edit_item' => __('Edit News Item', 'your-theme-textdomain'),
            'new_item' => __('New News Item', 'your-theme-textdomain'),
            'view_item' => __('View News Item', 'your-theme-textdomain'),
            'not_found' => __('No news found', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => 'news',
        'rewrite' => array('slug' => 'news', 'with_front' => false),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-megaphone',
        'menu_position'=> 16,
    ));
}
add_action('init', 'register_news_post_type');

function add_news_date_metabox() {
    add_meta_box(
        'news_date_meta', // Unikalny ID metaboxa
        __('Data wydarzenia', 'your-theme-textdomain'), // Tytuł
        'news_date_meta_box_callback', // Funkcja renderująca
        'news', // Post Type
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'add_news_date_metabox');

function news_date_meta_box_callback($post) {
    // Pobierz aktualną wartość
    $news_date = get_post_meta($post->ID, '_news_date', true);

    // Jeśli brak wartości, ustaw bieżącą datę
    if (!$news_date) {
        $news_date = date('d.m.Y');
    }

    ?>
    <label for="news_date"><?php _e('Wybierz datę wydarzenia:', 'your-theme-textdomain'); ?></label>
    <input type="text" id="news_date" name="news_date" value="<?php echo esc_attr($news_date); ?>" class="widefat news-date-picker">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            jQuery("#news_date").datepicker({
                dateFormat: "dd.mm.yy"
            });
        });
    </script>
    <?php
}

// Zapisujemy wartość pola
function save_news_date_meta($post_id) {
    if (isset($_POST['news_date'])) {
        update_post_meta($post_id, '_news_date', sanitize_text_field($_POST['news_date']));
    }
}
add_action('save_post', 'save_news_date_meta');

// Załaduj jQuery UI Datepicker
function load_datepicker_assets($hook) {
    global $post;
    if ($post && $post->post_type === 'news') {
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_style('jquery-ui-css', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css');
    }
}
add_action('admin_enqueue_scripts', 'load_datepicker_assets');

function remove_unwanted_news_fields() {
    remove_post_type_support('news', 'comments'); // Usuwa komentarze
    remove_post_type_support('news', 'custom-fields'); // Usuwa "Własne pola"
    remove_post_type_support('news', 'excerpt'); // Usuwa "Zajawkę"
}
add_action('init', 'remove_unwanted_news_fields');

function flush_rewrite_rules_on_init() {
    flush_rewrite_rules();
}
add_action('init', 'flush_rewrite_rules_on_init');
