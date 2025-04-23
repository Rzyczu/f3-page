<?php
/**
 * Template for the front page
 */
get_header(); ?>

<main class="site-main">

    <?php 
    // Sekcja: About
        include get_template_directory() . '/inc/pages/index/sections/about.php';

    // Sekcja: Join Us
        include get_template_directory() . '/inc/pages/index/sections/join-us.php';

    // Sekcja: Opinions
        include get_template_directory() . '/inc/pages/index/sections/opinions.php';

    // Sekcja: News
        include get_template_directory() . '/inc/pages/index/sections/news.php';

    // Sekcja: Structures
        include get_template_directory() . '/inc/pages/index/sections/structures.php';

    // Sekcja: Support
        include get_template_directory() . '/inc/pages/index/sections/support.php';
    ?>

</main>

<?php get_footer(); ?>
