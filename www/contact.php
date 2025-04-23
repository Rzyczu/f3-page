<?php
/**
 * Template Name: Contact
 */
get_header();
?>

<main class="contact-page">
    <?php
    // Section intro
    include locate_template('/inc/pages/contact/sections/intro.php', false, false);

    // Section buildings (harcówki)
    include locate_template('/inc/pages/contact/sections/buildings.php', false, false);

    // Section contact form (napisz do nas)
    include locate_template('/inc/pages/contact/sections/contact-form.php', false, false);
    ?>
</main>

<?php
get_footer();
