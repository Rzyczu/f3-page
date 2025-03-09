<?php
// Plik: /inc/global/forms.php

function register_contact_message_cpt() {
    register_post_type('contact_message', array(
        'labels'      => array(
            'name'          => __('Wiadomości Kontaktowe', 'textdomain'),
            'singular_name' => __('Wiadomość Kontaktowa', 'textdomain'),
        ),
        'public'      => false,
        'show_ui'     => true,
        'supports'    => array('title', 'editor', 'custom-fields'),
    ));
}
add_action('init', 'register_contact_message_cpt');

function handle_contact_form_submission() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = sanitize_text_field($_POST["name"]);
        $email = sanitize_email($_POST["mail"]);
        $message = sanitize_textarea_field($_POST["message"]);
        $gdpr = isset($_POST["gdpr"]) ? 'Zaakceptowano' : 'Nie zaakceptowano';

        if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
            wp_send_json_error(["message" => "Wypełnij poprawnie formularz."]);
        }

        // Tworzenie wpisu w CPT
        $post_id = wp_insert_post(array(
            "post_type"   => "contact_message",
            "post_title"  => "Wiadomość od " . $name,
            "post_status" => "publish",
            "meta_input"  => array(
                "email"   => $email,
                "message" => $message,
                "gdpr"    => $gdpr
            )
        ));

        if ($post_id) {
            wp_send_json_success(["message" => "Wiadomość została wysłana."]);
        } else {
            wp_send_json_error(["message" => "Błąd podczas zapisu wiadomości."]);
        }
    }
}
add_action("wp_ajax_contact_form", "handle_contact_form_submission");
add_action("wp_ajax_nopriv_contact_form", "handle_contact_form_submission");

