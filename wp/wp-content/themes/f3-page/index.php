<?php
/**
 * Template for the front page
 */

get_header(); ?>

<main class="site-main">

    <?php 
    // Sekcja: About
    if (file_exists(get_template_directory() . './index/section-about.php')) {
        include get_template_directory() . './section-about.php';
    }

    // Sekcja: Join Us
    if (file_exists(get_template_directory() . './index/section-join-us.php')) {
        include get_template_directory() . './index/section-join-us.php';
    }

    // Sekcja: Opinions
    if (file_exists(get_template_directory() . './index/section-opinions.php')) {
        include get_template_directory() . './index/section-opinions.php';
    }

    // Sekcja: News
    if (file_exists(get_template_directory() . './index/section-news.php')) {
        include get_template_directory() . './index/section-news.php';
    }

    // Sekcja: Structures
    if (file_exists(get_template_directory() . './index/section-structures.php')) {
        include get_template_directory() . './index/section-structures.php';
    }

    // Sekcja: Support
    if (file_exists(get_template_directory() . './index/section-support.php')) {
        include get_template_directory() . './index/section-support.php';
    }
    ?>

</main>

<?php get_footer(); ?>
