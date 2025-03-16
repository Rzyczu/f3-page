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
        'label' => __('Kontekst', 'your-theme-textdomain'),
        'section' => 'section_about',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'customize_section_about');