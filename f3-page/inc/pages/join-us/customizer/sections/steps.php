<?php
function customize_join_steps_section($wp_customize) {
    $wp_customize->add_panel('join_steps_panel', array(
        'title' => __('Kroki', 'your-theme-textdomain'),
        'priority' => 45,
    ));

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_section("join_step_section_$i", array(
            'title'    => __("Krok $i", 'your-theme-textdomain'),
            'panel'    => 'join_steps_panel',
            'priority' => $i,
        ));

        $wp_customize->add_setting("join_step_title_$i", array(
            'default' => __("Krok $i", 'your-theme-textdomain'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("join_step_title_$i", array(
            'label' => __("Krok $i Nagłówek", 'your-theme-textdomain'),
            'section' => "join_step_section_$i",
            'type' => 'text',
        ));

        $wp_customize->add_setting("join_step_content_$i", array(
            'default' => __("Step $i Text", 'your-theme-textdomain'),
            'sanitize_callback' => 'wp_kses_post',
        ));
        $wp_customize->add_control(new WP_Customize_TinyMCE_Control($wp_customize, "join_step_content_$i", array(
            'label' => __("Step $i Kontekst", 'your-theme-textdomain'),
            'section' => "join_step_section_$i",
        )));

        $wp_customize->add_setting("join_step_image_$i", array(
            'default' => get_template_directory_uri() . "/assets/images/svg/step-icon-$i.svg",
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "join_step_image_$i", array(
            'label' => __("Step $i Zdjęcie", 'your-theme-textdomain'),
            'section' => "join_step_section_$i",
        )));
    }
}
add_action('customize_register', 'customize_join_steps_section');