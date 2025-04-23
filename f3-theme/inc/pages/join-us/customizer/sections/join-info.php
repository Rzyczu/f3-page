<?php

function customize_join_info_section($wp_customize) {
    $wp_customize->add_section('join_info_section', array(
        'title' => __('Krok po kroku', 'your-theme-textdomain'),
        'priority' => 20,
    ));

    $wp_customize->add_setting('join_steps_heading', array(
        'default' => __('Krok po kroku', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('join_steps_heading', array(
        'label' => __('Nagłówek', 'your-theme-textdomain'),
        'section' => 'join_info_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('join_steps_text', array(
        'default' => __('Znajdziesz tutaj wszystkie kroki potrzebne, aby dołączyć do nas.', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('join_steps_text', array(
        'label' => __('Kontekst', 'your-theme-textdomain'),
        'section' => 'join_info_section',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'customize_join_info_section');