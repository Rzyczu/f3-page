<?php

function customize_contact_buildings_section($wp_customize) {
    $wp_customize->add_section('contact_buildings_section', array(
        'title' => __('Harcówki', 'your-theme-textdomain'),
        'priority' => 20,
    ));

    $wp_customize->add_setting('contact_buildings_heading', array(
        'default' => __('Harcówki', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_buildings_heading', array(
        'label' => __('Nagłówek', 'your-theme-textdomain'),
        'section' => 'contact_buildings_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'customize_contact_buildings_section');
