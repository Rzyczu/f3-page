<?php

function customize_board_section($wp_customize) {
    $wp_customize->add_section('customize_board_section', array(
        'title'    => __('Rada Szczepu', 'your-theme-textdomain'),
        'priority' => 25,
    ));

    $wp_customize->add_setting('section_board_heading', array(
        'default'           => __('Rada Szczepu', 'your-theme-textdomain'),
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('section_board_heading_control', array(
        'label'    => __('Nagłówek', 'your-theme-textdomain'),
        'section'  => 'customize_board_section',
        'settings' => 'section_board_heading',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('section_board_text', array(
        'default'           => __('Ścisłą Kadrę Szczepu stanowi Szczepowy, Kwatermistrz oraz Viceszczepowi. W składzie rady są wszyscy drużynowi oraz instruktorzy którzy nie mają funkcji w szczepie.', 'your-theme-textdomain'),
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('section_board_text_control', array(
        'label'    => __('Kontekst', 'your-theme-textdomain'),
        'section'  => 'customize_board_section',
        'settings' => 'section_board_text',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('board_display_order', array(
        'default'           => 'title_first',
        'transport'         => 'refresh',
        'sanitize_callback' => function($input) {
            return in_array($input, ['title_first', 'name_first']) ? $input : 'title_first';
        },
    ));

    $wp_customize->add_control('board_display_order_control', array(
        'label'    => __('Kolejność', 'your-theme-textdomain'),
        'section'  => 'customize_board_section',
        'settings' => 'board_display_order',
        'type'     => 'radio',
        'choices'  => array(
            'title_first' => __('Funkcja - Imię i nazwisko', 'your-theme-textdomain'),
            'name_first'  => __('Imię i nazwisko - Funkcja', 'your-theme-textdomain'),
        ),
    ));
}

add_action('customize_register', 'customize_board_section');
