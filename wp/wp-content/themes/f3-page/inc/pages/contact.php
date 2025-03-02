<?php

function customize_contact_intro_section($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('contact_intro_section', array(
        'title' => __('Intro', 'your-theme-textdomain'),
        'priority' => 10,
    ));

    // Nagłówek
    $wp_customize->add_setting('contact_intro_heading', array(
        'default' => __('Kontakt', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_intro_heading', array(
        'label' => __('Heading', 'your-theme-textdomain'),
        'section' => 'contact_intro_section',
        'type' => 'text',
    ));

    // Treść
    $wp_customize->add_setting('contact_intro_text', array(
        'default' => __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('contact_intro_text', array(
        'label' => __('Text', 'your-theme-textdomain'),
        'section' => 'contact_intro_section',
        'type' => 'textarea',
    ));

    // Obraz
    $wp_customize->add_setting('contact_intro_image', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/hammock.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'contact_intro_image', array(
        'label' => __('Image', 'your-theme-textdomain'),
        'section' => 'contact_intro_section',
    )));
}
add_action('customize_register', 'customize_contact_intro_section');

function register_building_post_type() {
    register_post_type('building', array(
        'labels' => array(
            'name' => __('Budynki - Kontakt', 'your-theme-textdomain'),
            'singular_name' => __('Building', 'your-theme-textdomain'),
            'add_new_item' => __('Add New Building', 'your-theme-textdomain'),
            'edit_item' => __('Edit Building', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title'),
        'menu_icon'    => 'dashicons-admin-home',
        'menu_position'=> 22,
    ));

    // Dodanie metaboxów dla iframe
    add_action('add_meta_boxes', function () {
        add_meta_box('building_iframe_meta', __('Building Iframe Code', 'your-theme-textdomain'), 'building_iframe_meta_box', 'building', 'normal', 'default');
    });

    // Zapis metaboxów
    add_action('save_post', function ($post_id) {
        if (array_key_exists('building_iframe', $_POST)) {
            update_post_meta($post_id, 'building_iframe', esc_url_raw($_POST['building_iframe']));
        }
    });
}
add_action('init', 'register_building_post_type');

function building_iframe_meta_box($post) {
    $iframe_code = get_post_meta($post->ID, 'building_iframe', true);
    ?>
    <p>
        <label for="building_iframe"><?php _e('Iframe Code URL', 'your-theme-textdomain'); ?></label>
        <input type="text" id="building_iframe" name="building_iframe" value="<?php echo esc_url($iframe_code); ?>" style="width: 100%;" />
    </p>
    <?php
}

function customize_contact_buildings_section($wp_customize) {
    $wp_customize->add_section('contact_buildings_section', array(
        'title' => __('Harcówki', 'your-theme-textdomain'),
        'priority' => 20,
    ));

    $wp_customize->add_setting('contact_buildings_heading', array(
        'default' => __('Harcówki', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_buildings_heading', array(
        'label' => __('Heading', 'your-theme-textdomain'),
        'section' => 'contact_buildings_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'customize_contact_buildings_section');

function customize_contact_form_section($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('contact_form_section', array(
        'title' => __('Formularz Kontaktowy', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Nagłówek formularza
    $wp_customize->add_setting('contact_form_heading', array(
        'default' => __('Napisz do nas', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_form_heading', array(
        'label' => __('Heading', 'your-theme-textdomain'),
        'section' => 'contact_form_section',
        'type' => 'text',
    ));

    // Dodatkowe pola
    $wp_customize->add_setting('contact_form_additional_fields', array(
        'default' => array(),
        'sanitize_callback' => 'sanitize_contact_form_additional_fields',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_form_additional_fields_control', array(
        'label' => __('Additional Fields (e.g., RODO)', 'your-theme-textdomain'),
        'description' => __('Add additional messages or fields (HTML allowed). One field per line.', 'your-theme-textdomain'),
        'section' => 'contact_form_section',
        'type' => 'textarea',
    )));
}

// Funkcja sanitizująca dodatkowe pola
function sanitize_contact_form_additional_fields($input) {
    $lines = array_filter(array_map('sanitize_textarea_field', explode("\n", $input)));
    return $lines;
}
add_action('customize_register', 'customize_contact_form_section');

function handle_contact_form_submission() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = sanitize_text_field($_POST['name']);
        $mail = sanitize_email($_POST['mail']);
        $message = sanitize_textarea_field($_POST['message']);

        // Wyślij e-mail (lub obsłuż wiadomość w inny sposób)
        wp_mail(
            get_option('admin_email'),
            __('Nowa wiadomość kontaktowa', 'your-theme-textdomain'),
            sprintf(
                __("Imię i nazwisko: %s\nE-mail: %s\nWiadomość:\n%s", 'your-theme-textdomain'),
                $name,
                $mail,
                $message
            )
        );

        // Przekierowanie po wysłaniu
        wp_safe_redirect(home_url('/thank-you'));
        exit;
    }
}


add_action('admin_post_nopriv_contact_form', 'handle_contact_form_submission');
add_action('admin_post_contact_form', 'handle_contact_form_submission');

function handle_contact_form() {
    // Pobieranie danych z formularza
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

    // Walidacja danych
    if (empty($name)) {
        wp_send_json_error('Proszę podać imię i nazwisko.');
    }
    if (!is_email($email)) {
        wp_send_json_error('Podano niepoprawny adres e-mail.');
    }
    if (empty($message)) {
        wp_send_json_error('Wiadomość nie może być pusta.');
    }

    // Próba wysyłki e-maila
    $sent = wp_mail(get_option('admin_email'), 'Nowa wiadomość z formularza kontaktowego', $message);

    if (!$sent) {
        wp_send_json_error('Nie udało się wysłać wiadomości. Spróbuj ponownie później.');
    }

    // Zwrócenie sukcesu
    wp_send_json_success('Wiadomość wysłana pomyślnie!');
}
add_action('wp_ajax_nopriv_contact_form', 'handle_contact_form');
add_action('wp_ajax_contact_form', 'handle_contact_form');

function customize_contact_panel($wp_customize) {
    // Tworzenie głównego panelu "Kontakt"
    $wp_customize->add_panel('panel_contact', array(
        'title'       => __('Kontakt', 'your-theme-textdomain'),
        'priority'    => 70,
        'description' => __('Zarządzaj sekcjami strony Kontakt.', 'your-theme-textdomain'),
    ));

    // Przypisanie sekcji do panelu "Kontakt"
    if ($wp_customize->get_section('contact_intro_section')) {
        $wp_customize->get_section('contact_intro_section')->panel = 'panel_contact';
    }
    if ($wp_customize->get_section('contact_buildings_section')) {
        $wp_customize->get_section('contact_buildings_section')->panel = 'panel_contact';
    }
    if ($wp_customize->get_section('contact_form_section')) {
        $wp_customize->get_section('contact_form_section')->panel = 'panel_contact';
    }
}
add_action('customize_register', 'customize_contact_panel');
