<?php

function customize_our_creativity_panel($wp_customize) {
    $wp_customize->add_panel('panel_our_creativity', array(
        'title'       => __('Nasza Twórczość', 'your-theme-textdomain'),
        'priority'    => 50,
        'description' => __('Zarządzaj sekcjami strony Nasza Twórczość.', 'your-theme-textdomain'),
    ));

    if ($wp_customize->get_section('our_creativity_intro_section')) {
        $wp_customize->get_section('our_creativity_intro_section')->panel = 'panel_our_creativity';
    }
    if ($wp_customize->get_section('our_creativity_blank_section')) {
        $wp_customize->get_section('our_creativity_blank_section')->panel = 'panel_our_creativity';
    }
}
add_action('customize_register', 'customize_our_creativity_panel');

