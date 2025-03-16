<?php

function customize_history_panel($wp_customize) {
    $wp_customize->add_panel('panel_history', array(
        'title'       => __('Historia', 'your-theme-textdomain'),
        'priority'    => 50,
        'description' => __('Zarządzaj sekcjami strony Historia.', 'your-theme-textdomain'),
    ));

    // Przypisanie sekcji do panelu "Historia"
    if ($wp_customize->get_section('history_entries_section')) {
        $wp_customize->get_section('history_entries_section')->panel = 'panel_history';
    }
}
add_action('customize_register', 'customize_history_panel');
