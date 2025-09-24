<?php

function customize_section_support($wp_customize) {
    // Panel główny
    $wp_customize->add_panel('section_support_panel', array(
        'title' => __('Jak nas wesprzeć?', 'your-theme-textdomain'),
        'priority' => 90,
    ));

    // --- Sekcja: Nagłówek główny ---
    $wp_customize->add_section('section_support_heading_section', array(
        'title' => __('Nagłówek sekcji', 'your-theme-textdomain'),
        'panel' => 'section_support_panel',
    ));

    $wp_customize->add_setting('section_support_heading', array(
        'default' => 'Jak nas wesprzeć?', // Default bez __()
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_heading', array(
        'label' => __('Nagłówek sekcji', 'your-theme-textdomain'),
        'section' => 'section_support_heading_section',
        'type' => 'text',
    ));

    // --- Sekcja: 1,5% i Darowizna ---
    $wp_customize->add_section('section_support_block_1', array(
        'title' => __('Blok 1: 1,5% i Darowizna', 'your-theme-textdomain'),
        'panel' => 'section_support_panel',
    ));

    $wp_customize->add_setting('section_support_text_tax', array(
        'default' => 'Przekaż nam swój 1,5%',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_tax', array(
        'label' => __('Tekst 1,5%', 'your-theme-textdomain'),
        'section' => 'section_support_block_1',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_text_donate', array(
        'default' => 'Przekaż nam darowiznę',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_donate', array(
        'label' => __('Tekst Darowizna', 'your-theme-textdomain'),
        'section' => 'section_support_block_1',
        'type' => 'text',
    ));

    // --- Sekcja: Facebook i Polecenie ---
    $wp_customize->add_section('section_support_block_2', array(
        'title' => __('Blok 2: Facebook i Polecenie', 'your-theme-textdomain'),
        'panel' => 'section_support_panel',
    ));

    $wp_customize->add_setting('section_support_text_facebook', array(
        'default' => 'Polub naszą stronę',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_facebook', array(
        'label' => __('Tekst Facebook', 'your-theme-textdomain'),
        'section' => 'section_support_block_2',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_link_facebook', array(
        'default' => 'https://www.facebook.com/szczepf3',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('section_support_link_facebook', array(
        'label' => __('Link Facebook', 'your-theme-textdomain'),
        'section' => 'section_support_block_2',
        'type' => 'url',
    ));

    $wp_customize->add_setting('section_support_text_recommend', array(
        'default' => 'Poleć nas innym',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_text_recommend', array(
        'label' => __('Tekst Poleć nas', 'your-theme-textdomain'),
        'section' => 'section_support_block_2',
        'type' => 'text',
    ));

    // --- Sekcja: Dane 1,5% ---
    $wp_customize->add_section('section_support_block_3', array(
        'title' => __('Blok 3: Dane 1,5%', 'your-theme-textdomain'),
        'panel' => 'section_support_panel',
    ));

    $wp_customize->add_setting('section_support_1_text_details_heading', array(
        'default' => 'Nasze dane 1,5%',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_1_text_details_heading', array(
        'label' => __('Nagłówek dane 1,5%', 'your-theme-textdomain'),
        'section' => 'section_support_block_3',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_1_text_details_1', array(
        'default' => 'Nazwa OPP: Związek Harcerstwa Rzeczypospolitej',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_1_text_details_1', array(
        'label' => __('Dane 1,5% - linia 1', 'your-theme-textdomain'),
        'section' => 'section_support_block_3',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_1_text_details_2', array(
        'default' => 'Numer KRS: 0000057720',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_1_text_details_2', array(
        'label' => __('Dane 1,5% - linia 2', 'your-theme-textdomain'),
        'section' => 'section_support_block_3',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_1_text_details_3', array(
        'default' => 'Kod Szczepu: MAL 078',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_1_text_details_3', array(
        'label' => __('Dane 1,5% - linia 3', 'your-theme-textdomain'),
        'section' => 'section_support_block_3',
        'type' => 'text',
    ));

    // --- Sekcja: Dane Darowizny ---
    $wp_customize->add_section('section_support_block_4', array(
        'title' => __('Blok 4: Dane Darowizny', 'your-theme-textdomain'),
        'panel' => 'section_support_panel',
    ));

    $wp_customize->add_setting('section_support_2_text_details_heading', array(
        'default' => 'Dane do darowizny',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_2_text_details_heading', array(
        'label' => __('Nagłówek dane darowizna', 'your-theme-textdomain'),
        'section' => 'section_support_block_4',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_2_text_details_1', array(
        'default' => 'Nazwa konta: ZHR Szczep Fioletowej Trójki',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_2_text_details_1', array(
        'label' => __('Dane darowizna - linia 1', 'your-theme-textdomain'),
        'section' => 'section_support_block_4',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_2_text_details_2', array(
        'default' => 'Numer konta: 33 1020 1026 0000 1502 0476 4538',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_2_text_details_2', array(
        'label' => __('Dane darowizna - linia 2', 'your-theme-textdomain'),
        'section' => 'section_support_block_4',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_support_2_text_details_3', array(
        'default' => 'Tytuł przelewu: Darowizna na cele statutowe',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_support_2_text_details_3', array(
        'label' => __('Dane darowizna - linia 3', 'your-theme-textdomain'),
        'section' => 'section_support_block_4',
        'type' => 'text',
    ));
}
add_action('customize_register', 'customize_section_support');
