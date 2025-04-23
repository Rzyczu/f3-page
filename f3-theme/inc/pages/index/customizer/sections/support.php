<?php

function customize_section_support($wp_customize) {
    $wp_customize->add_section('section_support', array(
        'title' => __('Jak nas wesprzeć?', 'your-theme-textdomain'),
        'priority' => 90,
    ));

    $wp_customize->add_setting('section_support_heading', array(
        'default' => __('Jak nas wesprzeć?', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_heading', array(
        'label' => __('Nagłówek', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_text_donate', array(
        'default' => __('Przekaż nam swój 1,5%', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_donate', array(
        'label' => __('Treść Donate 1.5%', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_link_facebook', array(
        'default' => 'https://www.facebook.com/szczepf3',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('section_support_link_facebook', array(
        'label' => __('Facebook Link', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'url',
    ));

    $wp_customize->add_setting('section_support_text_facebook', array(
        'default' => __('Polub naszą stronę', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_facebook', array(
        'label' => __('Treść Facebook', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_text_recommend', array(
        'default' => __('Poleć nas innym', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_recommend', array(
        'label' => __('Treść Poleć nas', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_text_details_heading', array(
        'default' => __('Nasze dane 1,5%', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_details_heading', array(
        'label' => __('Szczegóły', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_text_details_name', array(
        'default' => __('Nazwa OPP: Związek Harcerstwa Rzeczypospolitej', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_details_name', array(
        'label' => __('OPP', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_text_details_krs', array(
        'default' => __('Numer KRS: 0000057720', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_details_krs', array(
        'label' => __('KRS', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_text_details_code', array(
        'default' => __('Kod Szczepu: MAL 078', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_details_code', array(
        'label' => __('Kod Szczepu', 'your-theme-textdomain'),
        'section' => 'section_support',
        'type' => 'text',
    ));
}
add_action('customize_register', 'customize_section_support');