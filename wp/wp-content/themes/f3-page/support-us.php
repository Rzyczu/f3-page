<?php
/**
 * Template Name: Support Us
 */
get_header();
?>

<main class="support-us-page">
    <?php
    // Załaduj sekcję intro
    include locate_template('./support-us/section-intro.php', false, false);

    // Załaduj sekcję support z index
    include locate_template('./index/section-support.php', false, false);
    ?>
</main>

<?php
get_footer();
