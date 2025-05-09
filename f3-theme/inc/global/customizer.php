<?php
// File: /inc/global/customizer.php

function allow_extended_tags($input) {
    return wp_kses($input, array_merge(
        wp_kses_allowed_html('post'),
        array(
            'ul' => array(),
            'ol' => array(),
            'li' => array(),
            'a'  => array(
                'href' => true,
                'title' => true,
                'target' => true,
                'rel' => true,
            ),
        )
    ));
}

function sanitize_customizer_text($input) {
    return sanitize_text_field($input);
}

function customize_global_settings($wp_customize) {
    $wp_customize->add_setting('footer_text', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_customizer_text',
    ));
}

add_action('customize_register', 'customize_global_settings');


function customize_footer_icons($wp_customize) {
    $wp_customize->add_section('footer_icons_section', array(
        'title'    => __('Ikony Social Media w Stopce', 'your-theme-textdomain'),
        'priority' => 100,
    ));

    $wp_customize->add_setting('footer_icons_display', array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('footer_icons_display_control', array(
        'label'    => __('Pokaż ikony social media w stopce', 'your-theme-textdomain'),
        'section'  => 'footer_icons_section',
        'settings' => 'footer_icons_display',
        'type'     => 'checkbox',
    ));

    $social_links = array(
        'footer_email'    => __('E-mail', 'your-theme-textdomain'),
        'footer_instagram' => __('Instagram', 'your-theme-textdomain'),
        'footer_facebook'  => __('Facebook', 'your-theme-textdomain'),
    );

    foreach ($social_links as $key => $label) {
        $wp_customize->add_setting($key, array(
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control($key . '_control', array(
            'label'    => sprintf(__('Link do %s', 'your-theme-textdomain'), $label),
            'section'  => 'footer_icons_section',
            'settings' => $key,
            'type'     => 'url',
        ));
    }
}
add_action('customize_register', 'customize_footer_icons');
