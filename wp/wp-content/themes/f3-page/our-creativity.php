<?php
/**
 * Template Name: Our Creativity
 */
get_header();
?>

<main class="our-creativity">
    <?php
    // Załaduj sekcję intro
    include locate_template('./our-creativity/section-intro.php', false, false);

    // Załaduj sekcję blank
    include locate_template('./our-creativity/section-blank.php', false, false);

    // Załaduj sekcję resources (nazwa może być zmieniona w zależności od pliku)
    include locate_template('./our-creativity/section-resources.php', false, false);
    ?>
</main>

<?php
get_footer();
