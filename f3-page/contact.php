<?php
/**
 * Template Name: Contact
 */
get_header();
?>

<main class="contact-page">
    <?php
    // Załaduj sekcję intro
    include locate_template('./contact/section-intro.php', false, false);

    // Załaduj sekcję buildings (harcówki)
    include locate_template('./contact/section-buildings.php', false, false);

    // Załaduj sekcję contact form (napisz do nas)
    include locate_template('./contact/section-contact-form.php', false, false);
    ?>
</main>

<?php
get_footer();
