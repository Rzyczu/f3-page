<?php

function customize_structure_panel($wp_customize) {
    $wp_customize->add_panel('panel_structure', array(
        'title'       => __('O nas', 'your-theme-textdomain'),
        'priority'    => 30,
        'description' => __('Zarządzaj sekcjami podstrony "O nas".', 'your-theme-textdomain'),
    ));

    if ($wp_customize->get_section('section_intro')) {
        $wp_customize->get_section('section_intro')->panel = 'panel_structure';
    }
    if ($wp_customize->get_section('customize_board_section')) {
        $wp_customize->get_section('customize_board_section')->panel = 'panel_structure';
    }
    if ($wp_customize->get_section('section_teams')) {
        $wp_customize->get_section('section_teams')->panel = 'panel_structure';
    }
    if ($wp_customize->get_section('section_association')) {
        $wp_customize->get_section('section_association')->panel = 'panel_structure';
    }
    if ($wp_customize->get_section('section_brotherhood')) {
        $wp_customize->get_section('section_brotherhood')->panel = 'panel_structure';
    }
}
add_action('customize_register', 'customize_structure_panel');