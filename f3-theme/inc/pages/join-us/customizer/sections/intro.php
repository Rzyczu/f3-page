<?php

function customize_join_us_intro_section($wp_customize) {
    $wp_customize->add_section('join_us_intro_section', array(
        'title' => __('Intro', 'your-theme-textdomain'),
        'priority' => 10,
    ));

    $wp_customize->add_setting('join_us_intro_heading', array(
        'default' => __('Dołącz do nas', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('join_us_intro_heading', array(
        'label' => __('Nagłówek', 'your-theme-textdomain'),
        'section' => 'join_us_intro_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('join_us_intro_text', array(
        'default' => __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('join_us_intro_text', array(
        'label' => __('Kontekst', 'your-theme-textdomain'),
        'section' => 'join_us_intro_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('join_us_intro_image', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/lake.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'join_us_intro_image', array(
        'label' => __('Zdjęcie', 'your-theme-textdomain'),
        'section' => 'join_us_intro_section',
    )));
}
add_action('customize_register', 'customize_join_us_intro_section');