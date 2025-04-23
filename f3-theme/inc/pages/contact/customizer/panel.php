<?php

function customize_contact_panel($wp_customize) {
    $wp_customize->add_panel('panel_contact', array(
        'title'       => __('Kontakt', 'your-theme-textdomain'),
        'priority'    => 70,
        'description' => __('Zarządzaj sekcjami strony Kontakt.', 'your-theme-textdomain'),
    ));

    if ($wp_customize->get_section('contact_intro_section')) {
        $wp_customize->get_section('contact_intro_section')->panel = 'panel_contact';
    }
    if ($wp_customize->get_section('contact_buildings_section')) {
        $wp_customize->get_section('contact_buildings_section')->panel = 'panel_contact';
    }
    if ($wp_customize->get_section('contact_form_section')) {
        $wp_customize->get_section('contact_form_section')->panel = 'panel_contact';
    }
}
add_action('customize_register', 'customize_contact_panel');