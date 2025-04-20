<?php

function customize_section_teams($wp_customize) {
    $wp_customize->add_section('section_teams', array(
        'title' => __('Drużyny', 'your-theme-textdomain'),
        'priority' => 20,
    ));

    $wp_customize->add_setting('section_teams_heading', array(
        'default' => __('Drużyny', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_teams_heading', array(
        'label' => __('Nagłówek', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_teams_text_main', array(
        'default' => __('Działają w grupach rówieśniczych, w jednej drużynie jest około 15-30 osób. Nazwa "Podgórska" jest nazwą historyczną/ symboliczną. Nasze drużyny działają w różnych rejonach Krakowa.', 'your-theme-textdomain'),
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Custom_HTML_Editor_Control($wp_customize, 'section_teams_text_main', array(
        'label' => __('Kontekst', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'textarea',
    )));

    $wp_customize->add_setting('section_teams_subheading_how', array(
        'default' => __('Jak działamy?', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_teams_subheading_how', array(
        'label' => __('Podtytu', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_teams_text_how', array(
        'default' => __('W strukturach ZHR działa Organizacja Harcerek oraz Organizacja Harcerzy, stąd podział drużyn ze względu na płeć.', 'your-theme-textdomain'),
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Custom_HTML_Editor_Control($wp_customize, 'section_teams_text_how', array(
        'label' => __('Kontekst', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'textarea',
    )));

    $wp_customize->add_setting('section_teams_subheading_age', array(
        'default' => __('Podział wiekowy', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_teams_subheading_age', array(
        'label' => __('Podtytu', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'text',
    ));

    $wp_customize->add_setting('section_teams_text_age', array(
        'default' => __('Kolejnym ważnym odróżnieniem drużyn jest ze względu na wiek. Są trzy główne grupy wiekowe: <br /> - Gromady zuchowe: 7–10 lat <br /> - Drużyny harcerskie: 11-15 lat <br /> - Drużyny wędrownicze: 16-18 lat', 'your-theme-textdomain'),
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Custom_HTML_Editor_Control($wp_customize, 'section_teams_text_age', array(
        'label' => __('Kontekst', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'textarea',
    )));

    $wp_customize->add_setting('section_teams_image', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/flag.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'section_teams_image', array(
        'label' => __('Zdjęcie', 'your-theme-textdomain'),
        'section' => 'section_teams',
    )));
}
add_action('customize_register', 'customize_section_teams');