<?php
/**
 * Template Name: Join Us
 */
get_header();
?>

<main class="join-us">
    <?php
    // Section intro
    include locate_template('/inc/pages/join-us/sections/intro.php', false, false);

    // Section join-info
    include locate_template('/inc/pages/join-us/sections/join-info.php', false, false);

    // Section docs
    include locate_template('/inc/pages/join-us/sections/docs.php', false, false);
    ?>
</main>

<?php
get_footer();
