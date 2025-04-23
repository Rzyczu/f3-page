<?php

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
        'label' => __('Nagłówek', 'your-theme-textdomain'),
        'section' => 'section_join_us',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_join_us_text', array(
        'default' => __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('section_join_us_text', array(
        'label' => __('Kontekst', 'your-theme-textdomain'),
        'section' => 'section_join_us',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('section_join_us_image', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/scouts.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'section_join_us_image', array(
        'label' => __('Zdjęcie', 'your-theme-textdomain'),
        'section' => 'section_join_us',
    )));

    $wp_customize->add_setting('section_join_us_link', array(
        'default' => home_url('/join-us'),
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('section_join_us_link', array(
        'label' => __('Link przycisku', 'your-theme-textdomain'),
        'section' => 'section_join_us',
        'type' => 'url',
    ));

    $wp_customize->add_setting('section_join_us_button_text', array(
        'default' => __('Działaj z nami', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_join_us_button_text', array(
        'label' => __('Treśc przycisku', 'your-theme-textdomain'),
        'section' => 'section_join_us',
        'type' => 'text',
    ));
}
add_action('customize_register', 'customize_section_join_us');