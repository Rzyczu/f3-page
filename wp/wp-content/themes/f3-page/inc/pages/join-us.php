<?php

function customize_join_us_intro_section($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('join_us_intro_section', array(
        'title' => __('Join Us Intro Section', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Nagłówek
    $wp_customize->add_setting('join_us_intro_heading', array(
        'default' => __('Dołącz do nas', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('join_us_intro_heading', array(
        'label' => __('Section Heading', 'your-theme-textdomain'),
        'section' => 'join_us_intro_section',
        'type' => 'text',
    ));

    // Treść
    $wp_customize->add_setting('join_us_intro_text', array(
        'default' => __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('join_us_intro_text', array(
        'label' => __('Section Text', 'your-theme-textdomain'),
        'section' => 'join_us_intro_section',
        'type' => 'textarea',
    ));

    // Obraz
    $wp_customize->add_setting('join_us_intro_image', array(
        'default' => get_template_directory_uri() . '/assets/svg/lake.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'join_us_intro_image', array(
        'label' => __('Section Image', 'your-theme-textdomain'),
        'section' => 'join_us_intro_section',
    )));
}
add_action('customize_register', 'customize_join_us_intro_section');

function customize_join_info_section($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('join_info_section', array(
        'title' => __('Join Info Section', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Nagłówek sekcji
    $wp_customize->add_setting('join_info_heading', array(
        'default' => __('Krok po kroku', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('join_info_heading', array(
        'label' => __('Section Heading', 'your-theme-textdomain'),
        'section' => 'join_info_section',
        'type' => 'text',
    ));

    // Treść sekcji
    $wp_customize->add_setting('join_info_text', array(
        'default' => __('Jeżeli szukasz drużyny dla siebie lub dla swojego dziecka lub chcesz z nami działać jako dorosły to znajdziesz tutaj jak to zrobić:', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('join_info_text', array(
        'label' => __('Section Text', 'your-theme-textdomain'),
        'section' => 'join_info_section',
        'type' => 'textarea',
    ));

    // Kroki
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("join_info_image_$i", array(
            'default' => get_template_directory_uri() . "/assets/svg/icon-$i.svg",
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "join_info_image_$i", array(
            'label' => __("Step $i Image", 'your-theme-textdomain'),
            'section' => 'join_info_section',
        )));

        $wp_customize->add_setting("join_info_title_$i", array(
            'default' => __("Krok $i", 'your-theme-textdomain'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("join_info_title_$i", array(
            'label' => __("Step $i Title", 'your-theme-textdomain'),
            'section' => 'join_info_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("join_info_content_$i", array(
            'default' => __("Opis dla kroku $i", 'your-theme-textdomain'),
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("join_info_content_$i", array(
            'label' => __("Step $i Content", 'your-theme-textdomain'),
            'section' => 'join_info_section',
            'type' => 'textarea',
        ));
    }
}
add_action('customize_register', 'customize_join_info_section');

function register_document_post_type() {
    register_post_type('document', array(
        'labels' => array(
            'name' => __('Documents', 'your-theme-textdomain'),
            'singular_name' => __('Document', 'your-theme-textdomain'),
            'add_new_item' => __('Add New Document', 'your-theme-textdomain'),
            'edit_item' => __('Edit Document', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title'),
    ));

    // Dodanie metaboxów dla linku i opisu dokumentu
    add_action('add_meta_boxes', function () {
        add_meta_box('document_meta', __('Document Details', 'your-theme-textdomain'), 'document_meta_box', 'document', 'normal', 'default');
    });

    // Zapis metaboxów
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

function document_meta_box($post) {
    $link = get_post_meta($post->ID, 'document_link', true);
    $description = get_post_meta($post->ID, 'document_description', true);
    ?>
    <p>
        <label for="document_link"><?php _e('Document Link', 'your-theme-textdomain'); ?></label>
        <input type="url" id="document_link" name="document_link" value="<?php echo esc_url($link); ?>" style="width: 100%;" placeholder="https://example.com">
    </p>
    <p>
        <label for="document_description"><?php _e('Document Description', 'your-theme-textdomain'); ?></label>
        <textarea id="document_description" name="document_description" style="width: 100%;"><?php echo esc_textarea($description); ?></textarea>
    </p>
    <?php
}

function customize_docs_section($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('docs_section', array(
        'title' => __('Documents Section', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Nagłówek sekcji
    $wp_customize->add_setting('docs_section_heading', array(
        'default' => __('Dokumenty', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('docs_section_heading', array(
        'label' => __('Section Heading', 'your-theme-textdomain'),
        'section' => 'docs_section',
        'type' => 'text',
    ));

    // Treść sekcji
    $wp_customize->add_setting('docs_section_text', array(
        'default' => __('Czasem gotujemy się z nadmiaru dokumentów, ale to one umożliwiają nam organizacje i dbanie o bezpieczeństwo', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('docs_section_text', array(
        'label' => __('Section Text', 'your-theme-textdomain'),
        'section' => 'docs_section',
        'type' => 'textarea',
    ));

    // Obraz sekcji
    $wp_customize->add_setting('docs_section_image', array(
        'default' => get_template_directory_uri() . '/assets/svg/tea-cup.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'docs_section_image', array(
        'label' => __('Section Image', 'your-theme-textdomain'),
        'section' => 'docs_section',
    )));
}
add_action('customize_register', 'customize_docs_section');