<?php

function customize_docs_section($wp_customize) {
    $wp_customize->add_section('docs_section', array(
        'title' => __('Dokumenty', 'your-theme-textdomain'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('docs_section_heading', array(
        'default' => __('Dokumenty', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('docs_section_heading', array(
        'label' => __('Nagłówek', 'your-theme-textdomain'),
        'section' => 'docs_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('docs_section_text', array(
        'default' => __('Czasem gotujemy się z nadmiaru dokumentów, ale to one umożliwiają nam organizacje i dbanie o bezpieczeństwo', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('docs_section_text', array(
        'label' => __('Kontekst', 'your-theme-textdomain'),
        'section' => 'docs_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('docs_section_image', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/tea-cup.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'docs_section_image', array(
        'label' => __('Zdjęcie', 'your-theme-textdomain'),
        'section' => 'docs_section',
    )));
}
add_action('customize_register', 'customize_docs_section');