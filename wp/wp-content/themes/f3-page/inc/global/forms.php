<?php
// Plik: /inc/global/forms.php

function sanitize_form_data($post_data) {
    $sanitized_data = array(
        'name' => isset($post_data['name']) ? sanitize_text_field($post_data['name']) : '',
        'email' => isset($post_data['email']) ? sanitize_email($post_data['email']) : '',
        'message' => isset($post_data['message']) ? sanitize_textarea_field($post_data['message']) : '',
    );

    if (!is_email($sanitized_data['email'])) {
        wp_die('Niepoprawny adres e-mail.');
    }

    return $sanitized_data;
}

function validate_post_data($data) {
    if (empty($data)) {
        wp_send_json_error('Brak wymaganych danych.');
    }
}