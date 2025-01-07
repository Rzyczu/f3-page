<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Google Fonts -->
    <link 
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" 
        rel="stylesheet">
    
    <!-- FontAwesome -->
    <link 
        rel="stylesheet" 
        href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    
    <!-- WordPress styles and scripts -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header id="site-header" class="site-header">
        <?php 
        // Include the navigation template
        get_template_part('navigation'); 
        ?>
    </header>
