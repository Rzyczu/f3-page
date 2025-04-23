<?php
/**
 * Template Name: Support Us
 */
get_header();
?>

<main class="support-us-page">
    <?php
    // Section intro
    include locate_template('/inc/pages/support-us/sections/intro.php', false, false);

    // Section support z index
    include locate_template('/inc/pages/index/sections/support.php', false, false);
    ?>
</main>

<?php
get_footer();
