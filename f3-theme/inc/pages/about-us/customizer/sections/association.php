<?php

function customize_association_section($wp_customize) {
    $wp_customize->add_section('section_association', array(
        'title'    => __('Stowarzyszenie Przyjaciół Fioletowej Trójki', 'your-theme-textdomain'),
        'priority' => 31,
    ));

    $wp_customize->add_setting('association_section_heading', array(
        'default'           => __('Stowarzyszenie Przyjaciół Fioletowej Trójki', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('association_section_heading', array(
        'label'   => __('Nagłówek', 'your-theme-textdomain'),
        'section' => 'section_association',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('section_association_text', array(
        'default'           => __('Stowarzyszenie zrzesza instruktorki, instruktorów, wychowanki, wychowanków oraz osoby chcące wspierać 3 Podgórski Szczep Fioletowej Trójki im. Tadeusza Kościuszki.', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('section_association_text', array(
        'label'   => __('Kontekst', 'your-theme-textdomain'),
        'section' => 'section_association',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('section_association_link', array(
        'default'           => home_url('/join-us'),
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('section_association_link', array(
        'label'   => __('Link przycisku', 'your-theme-textdomain'),
        'section' => 'section_association',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('section_association_button_text', array(
        'default'           => __('Poznaj nas', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_association_button_text', array(
        'label'   => __('Tekst przycisku', 'your-theme-textdomain'),
        'section' => 'section_association',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('section_association_button_visible', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));
    $wp_customize->add_control('section_association_button_visible', array(
        'label'   => __('Wyświetl przycisk', 'your-theme-textdomain'),
        'section' => 'section_association',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('section_association_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'section_association_image', array(
        'label'    => __('Zdjęcie', 'your-theme-textdomain'),
        'section'  => 'section_association',
        'settings' => 'section_association_image',
    )));
}
add_action('customize_register', 'customize_association_section');
