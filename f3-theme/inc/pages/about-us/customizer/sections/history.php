<?php

function customize_section_history($wp_customize) {
    $wp_customize->add_section('section_history', array(
        'title'    => __('Nasza historia', 'your-theme-textdomain'),
        'priority' => 40,
        'panel'    => 'panel_structure',
    ));

    $wp_customize->add_setting('section_history_heading', array(
        'default'           => __('Nasza historia', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_history_heading', array(
        'label'   => __('Nagłówek', 'your-theme-textdomain'),
        'section' => 'section_history',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('section_history_text', array(
        'default'           => __('Działają w grupach rówieśniczych, w jednej drużynie jest około 15-30 osób. Nazwa "Podgórska" jest nazwą historyczną/symboliczną. Nasze drużyny działają w różnych rejonach Krakowa.', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('section_history_text', array(
        'label'   => __('Kontekst', 'your-theme-textdomain'),
        'section' => 'section_history',
    ));
    $wp_customize->add_setting('section_history_image', array(
        'default'           => get_template_directory_uri() . '/assets/images/svg/castle.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'section_history_image', array(
        'label'   => __('Zdjęcie', 'your-theme-textdomain'),
        'section' => 'section_history',
    )));

       $wp_customize->add_setting('section_history_button_text', array(
        'default'           => __('Poznaj nas', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_history_button_text', array(
        'label'   => __('Tekst przycisku', 'your-theme-textdomain'),
        'section' => 'section_history',
        'type'    => 'text',
    ));
   $wp_customize->add_setting('section_history_link', array(
        'default'           => get_permalink(get_page_by_path('history')),
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('section_history_link', array(
        'label'   => __('Link przycisku', 'your-theme-textdomain'),
        'section' => 'section_history',
        'type'    => 'url',
    ));
    $wp_customize->add_setting('section_history_button_visible', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));
    $wp_customize->add_control('section_history_button_visible', array(
        'label'   => __('Wyświetl przycisk', 'your-theme-textdomain'),
        'section' => 'section_history',
        'type'    => 'checkbox',
    ));
}
add_action('customize_register', 'customize_section_history');