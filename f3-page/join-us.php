<?php
/**
 * Template Name: Join Us
 */
get_header();
?>

<main class="join-us">
    <?php
    // Załaduj sekcję intro
    include locate_template('./join-us/section-intro.php', false, false);

    // Załaduj sekcję join-info
    include locate_template('./join-us/section-join-info.php', false, false);

    // Załaduj sekcję docs
    include locate_template('./join-us/section-docs.php', false, false);
    ?>
</main>

<?php
get_footer();
