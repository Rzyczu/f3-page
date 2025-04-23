<?php

function customize_section_intro($wp_customize) {
    $wp_customize->add_section('section_intro', array(
        'title' => __('Intro', 'your-theme-textdomain'),
        'priority' => 10,
    ));

    $wp_customize->add_setting('section_intro_heading', array(
        'default' => __('O nas', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_intro_heading', array(
        'label' => __('Nagłówek', 'your-theme-textdomain'),
        'section' => 'section_intro',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_intro_text', array(
        'default' => __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_intro_text', array(
        'label' => __('Kontekst', 'your-theme-textdomain'),
        'section' => 'section_intro',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('section_intro_image', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/waterfall.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'section_intro_image', array(
        'label' => __('Zdjęcie', 'your-theme-textdomain'),
        'section' => 'section_intro',
    )));
}
add_action('customize_register', 'customize_section_intro');
