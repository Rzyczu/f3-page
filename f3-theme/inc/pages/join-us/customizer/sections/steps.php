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

        $wp_customize->add_setting("join_step_layout_$i", array(
            'default'   => 'left_right',
            'sanitize_callback' => 'sanitize_text_field',
        ));
    
        $wp_customize->add_control("join_step_layout_$i", array(
            'label'   => __('Wybierz układ treści', 'your-theme-textdomain'),
            'section' => "join_step_section_$i",
            'type'    => 'radio',
            'choices' => array(
                'left_right' => __('Left/Right', 'your-theme-textdomain'),
                'full'       => __('Pełna szerokość', 'your-theme-textdomain'),
            ),
        ));
    

        $wp_customize->add_setting("join_step_content_left_$i", array(
            'default' => __("Krok $i Lewy Kontekst", 'your-theme-textdomain'),
            'sanitize_callback' => function($input) {
                return wp_kses($input, wp_kses_allowed_html('post'));
            },
        ));
        
        $wp_customize->add_control(new Custom_HTML_Editor_Control($wp_customize, "join_step_content_left_$i", array(
            'label' => __("Krok $i Lewy Kontekst", 'your-theme-textdomain'),
            'section' => "join_step_section_$i",
            'editor_height' => 300,
        )));
        
        

       
        $wp_customize->add_setting("join_step_content_right_$i", array(
            'default' => __("Krok $i Prawy Kontekst", 'your-theme-textdomain'),
            'sanitize_callback' => function($input) {
                return wp_kses($input, wp_kses_allowed_html('post'));
            },
        ));
        
        $wp_customize->add_control(new Custom_HTML_Editor_Control($wp_customize, "join_step_content_right_$i", array(
            'label' => __("Krok $i Prawy Kontekst", 'your-theme-textdomain'),
            'section' => "join_step_section_$i",
            'editor_height' => 300,
        )));

        $wp_customize->add_setting("join_step_image_$i", array(
            'default' => get_template_directory_uri() . "/assets/images/svg/step-icon-$i.svg",
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "join_step_image_$i", array(
            'label' => __("Krok $i Zdjęcie", 'your-theme-textdomain'),
            'section' => "join_step_section_$i",
        )));
    }
}
add_action('customize_register', 'customize_join_steps_section');