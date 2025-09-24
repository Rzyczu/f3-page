<?php
/**
 * Template Name: About Us
 */
get_header();
?>

<main class="about-us">
    <?php
    // Section intro
    include locate_template('/inc/pages/about-us/sections/intro.php', false, false);

    // Section teams
    include locate_template('/inc/pages/about-us/sections/teams.php', false, false);

    // Section teams-carousel (żeńskie)
    $title = __('Żeńskie Drużyny', 'your-theme-textdomain');
    $gender = 'female';
    include locate_template('/inc/pages/about-us/sections/teams-carousel.php', false, false);

    // Section teams-carousel (męskie)
    $title = __('Męskie Drużyny', 'your-theme-textdomain');
    $gender = 'male';
    include locate_template('/inc/pages/about-us/sections/teams-carousel.php', false, false);

    // Section board
    include locate_template('/inc/pages/about-us/sections/board.php', false, false);

    // Section association
    include locate_template('/inc/pages/about-us/sections/association.php', false, false);

    // Section brotherhood
    include locate_template('/inc/pages/about-us/sections/brotherhood.php', false, false);

    // Section history-short
    include locate_template('/inc/pages/about-us/sections/history.php', false, false);
    ?>
</main>

<?php
get_footer();
