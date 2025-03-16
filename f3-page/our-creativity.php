<?php
/**
 * Template Name: Our Creativity
 */
get_header();
?>

<main class="our-creativity">
    <?php
    // Section intro
    include locate_template('/inc/pages/our-creativity/sections/intro.php', false, false);

    // Section blank
    include locate_template('/inc/pages/our-creativity/sections/blank.php', false, false);

    // Section resources (nazwa może być zmieniona w zależności od pliku)
    include locate_template('/inc/pages/our-creativity/sections/resources.php', false, false);
    ?>
</main>

<?php
get_footer();
