<?php
// Plik: /inc/global/customizer.php

function sanitize_customizer_text($input) {
    return sanitize_text_field($input);
}

function customize_global_settings($wp_customize) {
    // Przykładowe ustawienie w Customizerze
    $wp_customize->add_setting('footer_text', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_customizer_text',
    ));
}

add_action('customize_register', 'customize_global_settings');