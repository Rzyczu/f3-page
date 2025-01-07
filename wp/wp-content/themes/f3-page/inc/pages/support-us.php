<?php

function customize_support_intro_section($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('support_intro_section', array(
        'title' => __('Support Us Intro Section', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Nagłówek sekcji
    $wp_customize->add_setting('support_intro_heading', array(
        'default' => __('Wesprzyj nas', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('support_intro_heading', array(
        'label' => __('Section Heading', 'your-theme-textdomain'),
        'section' => 'support_intro_section',
        'type' => 'text',
    ));

    // Treść sekcji
    $wp_customize->add_setting('support_intro_text', array(
        'default' => __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('support_intro_text', array(
        'label' => __('Section Text', 'your-theme-textdomain'),
        'section' => 'support_intro_section',
        'type' => 'textarea',
    ));

    // Obraz sekcji
    $wp_customize->add_setting('support_intro_image', array(
        'default' => get_template_directory_uri() . '/assets/svg/pier.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'support_intro_image', array(
        'label' => __('Section Image', 'your-theme-textdomain'),
        'section' => 'support_intro_section',
    )));
}
add_action('customize_register', 'customize_support_intro_section');
