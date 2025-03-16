<?php

function customize_contact_form_section($wp_customize) {
    $wp_customize->add_section('contact_form_section', array(
        'title' => __('Formularz Kontaktowy', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('contact_form_heading', array(
        'default' => __('Napisz do nas', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_form_heading', array(
        'label' => __('Nagłówek', 'your-theme-textdomain'),
        'section' => 'contact_form_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_form_additional_fields', array(
        'default' => array(),
        'sanitize_callback' => 'sanitize_contact_form_additional_fields',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_form_additional_fields_control', array(
        'label' => __('Additional Fields (e.g., RODO)', 'your-theme-textdomain'),
        'description' => __('Add additional messages or fields (HTML allowed). One field per line.', 'your-theme-textdomain'),
        'section' => 'contact_form_section',
        'type' => 'textarea',
    )));
}