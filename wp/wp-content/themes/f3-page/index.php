<?php
/**
 * Template for the front page
 */
get_header(); ?>

<main class="site-main">

    <?php 
    // Sekcja: About
        include get_template_directory() . '/index/section-about.php';

    // Sekcja: Join Us
        include get_template_directory() . '/index/section-join-us.php';

    // Sekcja: Opinions
        include get_template_directory() . '/index/section-opinions.php';

    // Sekcja: News
        include get_template_directory() . '/index/section-news.php';

    // Sekcja: Structures
        include get_template_directory() . '/index/section-structures.php';

    // Sekcja: Support
        include get_template_directory() . '/index/section-support.php';
    ?>

</main>

<?php get_footer(); ?>
