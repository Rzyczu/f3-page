<?php

function customize_our_creativity_intro_section($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('our_creativity_intro_section', array(
        'title' => __('Intro', 'your-theme-textdomain'),
        'priority' => 10,
    ));

    // Nagłówek
    $wp_customize->add_setting('our_creativity_intro_heading', array(
        'default' => __('Nasza twórczość', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('our_creativity_intro_heading', array(
        'label' => __('Heading', 'your-theme-textdomain'),
        'section' => 'our_creativity_intro_section',
        'type' => 'text',
    ));

    // Treść
    $wp_customize->add_setting('our_creativity_intro_text', array(
        'default' => __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('our_creativity_intro_text', array(
        'label' => __('Text', 'your-theme-textdomain'),
        'section' => 'our_creativity_intro_section',
        'type' => 'textarea',
    ));

    // Obraz
    $wp_customize->add_setting('our_creativity_intro_image', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/tents.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'our_creativity_intro_image', array(
        'label' => __('Image', 'your-theme-textdomain'),
        'section' => 'our_creativity_intro_section',
    )));
}
add_action('customize_register', 'customize_our_creativity_intro_section');

function customize_our_creativity_blank_section($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('our_creativity_blank_section', array(
        'title' => __('Takie Fioletowe Puste Pole', 'your-theme-textdomain'),
        'priority' => 20,
    ));

    // Obraz sekcji
    $wp_customize->add_setting('our_creativity_blank_image', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/kitchen.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'our_creativity_blank_image', array(
        'label' => __('Image', 'your-theme-textdomain'),
        'section' => 'our_creativity_blank_section',
    )));
}
add_action('customize_register', 'customize_our_creativity_blank_section');


function customize_our_creativity_panel($wp_customize) {
    // Tworzenie głównego panelu "Nasza Twórczość"
    $wp_customize->add_panel('panel_our_creativity', array(
        'title'       => __('Nasza Twórczość', 'your-theme-textdomain'),
        'priority'    => 50,
        'description' => __('Zarządzaj sekcjami strony Nasza Twórczość.', 'your-theme-textdomain'),
    ));

    // Przypisanie sekcji do panelu "Nasza Twórczość"
    if ($wp_customize->get_section('our_creativity_intro_section')) {
        $wp_customize->get_section('our_creativity_intro_section')->panel = 'panel_our_creativity';
    }
    if ($wp_customize->get_section('our_creativity_blank_section')) {
        $wp_customize->get_section('our_creativity_blank_section')->panel = 'panel_our_creativity';
    }
}
add_action('customize_register', 'customize_our_creativity_panel');

function register_resource_group_cpt() {
    $labels = array(
        'name'               => __('Resource Groups', 'your-theme-textdomain'),
        'singular_name'      => __('Resource Group', 'your-theme-textdomain'),
        'menu_name'          => __('Resource Groups', 'your-theme-textdomain'),
        'add_new'            => __('Add New Group', 'your-theme-textdomain'),
        'add_new_item'       => __('Add New Resource Group', 'your-theme-textdomain'),
        'edit_item'          => __('Edit Resource Group', 'your-theme-textdomain'),
        'new_item'           => __('New Resource Group', 'your-theme-textdomain'),
        'view_item'          => __('View Resource Group', 'your-theme-textdomain'),
        'search_items'       => __('Search Resource Groups', 'your-theme-textdomain'),
        'not_found'          => __('No resource groups found', 'your-theme-textdomain'),
        'not_found_in_trash' => __('No resource groups found in Trash', 'your-theme-textdomain')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-category',
        'supports'           => array('title', 'editor', 'page-attributes'),
        'hierarchical'       => false,
        'has_archive'        => false,
        'rewrite'            => array('slug' => 'resource-group'),
    );

    register_post_type('resource_group', $args);
}
add_action('init', 'register_resource_group_cpt');

// Rejestracja Custom Post Type dla pojedynczych zasobów
function register_resource_item_cpt() {
    $labels = array(
        'name'               => __('Resource Items', 'your-theme-textdomain'),
        'singular_name'      => __('Resource Item', 'your-theme-textdomain'),
        'menu_name'          => __('Resource Items', 'your-theme-textdomain'),
        'add_new'            => __('Add New Item', 'your-theme-textdomain'),
        'add_new_item'       => __('Add New Resource Item', 'your-theme-textdomain'),
        'edit_item'          => __('Edit Resource Item', 'your-theme-textdomain'),
        'new_item'           => __('New Resource Item', 'your-theme-textdomain'),
        'view_item'          => __('View Resource Item', 'your-theme-textdomain'),
        'search_items'       => __('Search Resource Items', 'your-theme-textdomain'),
        'not_found'          => __('No resource items found', 'your-theme-textdomain'),
        'not_found_in_trash' => __('No resource items found in Trash', 'your-theme-textdomain')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-media-document',
        'supports'           => array('title', 'editor', 'excerpt'),
        'hierarchical'       => false,
        'has_archive'        => false,
        'rewrite'            => array('slug' => 'resource-item'),
    );

    register_post_type('resource_item', $args);
}
add_action('init', 'register_resource_item_cpt');

// Rejestracja taksonomii dla przypisania zasobów do grup
function register_resource_group_taxonomy() {
    $labels = array(
        'name'              => __('Resource Group Categories', 'your-theme-textdomain'),
        'singular_name'     => __('Resource Group Category', 'your-theme-textdomain'),
        'search_items'      => __('Search Categories', 'your-theme-textdomain'),
        'all_items'         => __('All Categories', 'your-theme-textdomain'),
        'edit_item'         => __('Edit Category', 'your-theme-textdomain'),
        'update_item'       => __('Update Category', 'your-theme-textdomain'),
        'add_new_item'      => __('Add New Category', 'your-theme-textdomain'),
        'new_item_name'     => __('New Category Name', 'your-theme-textdomain'),
        'menu_name'         => __('Categories', 'your-theme-textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'resource-group-category'),
    );

    register_taxonomy('resource_group_category', array('resource_item'), $args);
}
add_action('init', 'register_resource_group_taxonomy');

// Automatyczne tworzenie kategorii przy dodaniu Resource Group
function auto_create_resource_group_category($post_id, $post, $update) {
    if ($post->post_type !== 'resource_group') {
        return;
    }
    
    $term = get_term_by('name', $post->post_title, 'resource_group_category');
    if (!$term) {
        wp_insert_term($post->post_title, 'resource_group_category');
    }
}
add_action('save_post', 'auto_create_resource_group_category', 10, 3);

// Dodanie metapola na link zasobu
function add_resource_item_meta_box() {
    add_meta_box(
        'resource_item_link',
        __('Resource Link', 'your-theme-textdomain'),
        'render_resource_item_meta_box',
        'resource_item',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_resource_item_meta_box');

function render_resource_item_meta_box($post) {
    $value = get_post_meta($post->ID, '_resource_item_link', true);
    echo '<label for="resource_item_link">' . __('Enter resource link:', 'your-theme-textdomain') . '</label><br>';
    echo '<input type="url" id="resource_item_link" name="resource_item_link" value="' . esc_attr($value) . '" style="width:100%;" />';
}

function save_resource_item_meta($post_id) {
    if (array_key_exists('resource_item_link', $_POST)) {
        update_post_meta($post_id, '_resource_item_link', sanitize_text_field($_POST['resource_item_link']));
    }
}
add_action('save_post', 'save_resource_item_meta');

function customize_our_creativity_admin_menu() {
    remove_menu_page('edit.php?post_type=resource_group');
    remove_menu_page('edit.php?post_type=resource_item');

    add_menu_page(
        __('Nasza Twórczość', 'your-theme-textdomain'),
        __('Nasza Twórczość', 'your-theme-textdomain'),
        'manage_options',
        'our_creativity_main',
        '__return_null',
        'dashicons-admin-customizer',
        20
    );

    add_submenu_page(
        'our_creativity_main',
        __('Resource Groups', 'your-theme-textdomain'),
        __('Resource Groups', 'your-theme-textdomain'),
        'manage_options',
        'edit.php?post_type=resource_group'
    );

    add_submenu_page(
        'our_creativity_main',
        __('Resource Items', 'your-theme-textdomain'),
        __('Resource Items', 'your-theme-textdomain'),
        'manage_options',
        'edit.php?post_type=resource_item'
    );
}
add_action('admin_menu', 'customize_our_creativity_admin_menu');
