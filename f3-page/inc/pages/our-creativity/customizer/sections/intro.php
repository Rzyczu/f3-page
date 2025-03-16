<?php

function customize_our_creativity_intro_section($wp_customize) {
    $wp_customize->add_section('our_creativity_intro_section', array(
        'title' => __('Intro', 'your-theme-textdomain'),
        'priority' => 10,
    ));

    $wp_customize->add_setting('our_creativity_intro_heading', array(
        'default' => __('Nasza twórczość', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('our_creativity_intro_heading', array(
        'label' => __('Nagłówek', 'your-theme-textdomain'),
        'section' => 'our_creativity_intro_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('our_creativity_intro_text', array(
        'default' => __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('our_creativity_intro_text', array(
        'label' => __('Kontekst', 'your-theme-textdomain'),
        'section' => 'our_creativity_intro_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('our_creativity_intro_image', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/tents.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'our_creativity_intro_image', array(
        'label' => __('Zdjęcie', 'your-theme-textdomain'),
        'section' => 'our_creativity_intro_section',
    )));
}
add_action('customize_register', 'customize_our_creativity_intro_section');