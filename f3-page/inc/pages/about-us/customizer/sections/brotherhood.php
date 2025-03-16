<?php

function customize_brotherhood_section($wp_customize) {
    $wp_customize->add_section('section_brotherhood', array(
        'title'    => __('Bractwo Sztandarowe', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('brotherhood_section_heading', array(
        'default'           => __('Bractwo Szandarowe', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('brotherhood_section_heading', array(
        'label'   => __('Nagłówek', 'your-theme-textdomain'),
        'section' => 'section_brotherhood',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('brotherhood_section_text', array(
        'default'           => __('Ścisłą Kadrę Szczepu stanowi Szczepowy, Kwatermistrz oraz Viceszczepowi. W składzie rady są wszyscy drużynowi oraz instruktorzy którzy nie mają funkcji w szczepie.', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('brotherhood_section_text', array(
        'label'   => __('Kontekst', 'your-theme-textdomain'),
        'section' => 'section_brotherhood',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'customize_brotherhood_section');

