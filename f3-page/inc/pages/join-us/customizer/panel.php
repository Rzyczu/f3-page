<?php

function customize_join_us_panel($wp_customize) {
    $wp_customize->add_panel('panel_join_us', array(
        'title'       => __('Dołącz do nas', 'your-theme-textdomain'),
        'priority'    => 35,
        'description' => __('Zarządzaj sekcjami strony Dołącz do nas.', 'your-theme-textdomain'),
    ));

    $wp_customize->add_panel('panel_join_steps', array(
        'title'       => __('Kroki', 'your-theme-textdomain'),
        'priority'    => 38,
        'description' => __('Zarządzaj krokami dołączenia.', 'your-theme-textdomain'),
        'panel'       => 'panel_join_us',
    ));

    if ($wp_customize->get_section('join_us_intro_section')) {
        $wp_customize->get_section('join_us_intro_section')->panel = 'panel_join_us';
    }
    if ($wp_customize->get_section('join_info_section')) {
        $wp_customize->get_section('join_info_section')->panel = 'panel_join_us';
    }
    if ($wp_customize->get_section('docs_section')) {
        $wp_customize->get_section('docs_section')->panel = 'panel_join_us';
    }

    if ($wp_customize->get_section('docs_section')) {
        $wp_customize->get_section('docs_section')->panel = 'panel_join_us';
    }

    if ($wp_customize->get_section('join_steps_panel')) {
        $wp_customize->get_section('join_steps_panel')->panel = 'panel_join_us';
    }
}
add_action('customize_register', 'customize_join_us_panel');