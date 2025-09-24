<?php
// load global files
require_once get_template_directory() . '/inc/global/enqueue-scripts.php';
require_once get_template_directory() . '/inc/global/theme-setup.php';
require_once get_template_directory() . '/inc/global/pages-setup.php';
require_once get_template_directory() . '/inc/global/forms.php';
require_once get_template_directory() . '/inc/global/customizer.php';
require_once get_template_directory() . '/inc/global/post-types.php';
require_once get_template_directory() . '/inc/global/pages.php';
require_once get_template_directory() . '/inc/global/body-classes.php';
require_once get_template_directory() . '/inc/global/customizer-tinymce.php';

// load pages files
require_once get_template_directory() . '/inc/pages/index/init.php';
require_once get_template_directory() . '/inc/pages/about-us/init.php';
require_once get_template_directory() . '/inc/pages/contact/init.php';
require_once get_template_directory() . '/inc/pages/our-creativity/init.php';
require_once get_template_directory() . '/inc/pages/join-us/init.php';
require_once get_template_directory() . '/inc/pages/support-us/init.php';
require_once get_template_directory() . '/inc/pages/history/init.php';

add_filter( 'wp_mail', function( $args ) {
    // Przygotuj dane do logowania
    $log_data = [
        'to'      => implode( ',', (array) $args['to'] ),
        'subject' => $args['subject'],
        'headers' => is_array( $args['headers'] ) ? implode( ',', $args['headers'] ) : $args['headers'],
    ];

    // Zapisz dane w opcji (tymczasowo)
    update_option( 'mail_debug_data', $log_data );

    return $args;
});

// Wklej skrypt do konsoli po wysłaniu formularza
add_action( 'wp_footer', function() {
    $mail_data = get_option( 'mail_debug_data' );
    if ( ! empty( $mail_data ) ) {
        $to = esc_js( $mail_data['to'] );
        $subject = esc_js( $mail_data['subject'] );
        $headers = esc_js( $mail_data['headers'] );

        echo "<script>
            console.log('WordPress próbuje wysłać e-mail:');
            console.log('TO: {$to}');
            console.log('FROM: {$headers}');
            console.log('SUBJECT: {$subject}');
        </script>";

        // Wyczyść dane po użyciu
        delete_option( 'mail_debug_data' );
    }
});

