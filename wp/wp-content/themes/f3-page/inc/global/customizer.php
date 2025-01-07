<?php
// Plik: /inc/global/customizer.php

function sanitize_customizer_text($input) {
    return sanitize_text_field($input);
}

// Przykładowe ustawienie w Customizerze
$wp_customize->add_setting('footer_text', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_customizer_text',
));
