<?php

function customize_homepage_panel($wp_customize) {
    $wp_customize->add_panel('panel_homepage', array(
        'title'       => __('Strona Główna', 'your-theme-textdomain'),
        'priority'    => 25,
        'description' => __('Zarządzaj sekcjami na stronie głównej.', 'your-theme-textdomain'),
    ));

    $wp_customize->get_section('section_about')->panel = 'panel_homepage';
    $wp_customize->get_section('section_join_us')->panel = 'panel_homepage';
}
add_action('customize_register', 'customize_homepage_panel');