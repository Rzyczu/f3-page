<?php

function customize_our_creativity_blank_section($wp_customize) {
    $wp_customize->add_section('our_creativity_blank_section', array(
        'title' => __('Takie Fioletowe Puste Pole', 'your-theme-textdomain'),
        'priority' => 20,
    ));

    $wp_customize->add_setting('our_creativity_blank_image', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/kitchen.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'our_creativity_blank_image', array(
        'label' => __('Zdjęcie', 'your-theme-textdomain'),
        'section' => 'our_creativity_blank_section',
    )));
}
add_action('customize_register', 'customize_our_creativity_blank_section');
