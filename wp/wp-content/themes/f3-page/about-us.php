<?php
/**
 * Template Name: About Us
 */
get_header();
?>

<main class="about-us">
    <?php
    // Załaduj sekcję intro
    include locate_template('./about-us/section-intro.php', false, false);

    // Załaduj sekcję teams
    include locate_template('./about-us/section-teams.php', false, false);

    // Załaduj sekcję teams-carousel (żeńskie)
    $title = __('Żeńskie Drużyny', 'your-theme-textdomain');
    $gender = 'female';
    include locate_template('./about-us/section-teams-carousel.php', false, false);

    // Załaduj sekcję teams-carousel (męskie)
    $title = __('Męskie Drużyny', 'your-theme-textdomain');
    $gender = 'male';
    include locate_template('./about-us/section-teams-carousel.php', false, false);

    // Załaduj sekcję board
    include locate_template('./about-us/section-board.php', false, false);

    // Załaduj sekcję brotherhood
    include locate_template('./about-us/section-brotherhood.php', false, false);

    // Załaduj sekcję history-short
    include locate_template('./about-us/section-history-short.php', false, false);
    ?>
</main>

<?php
get_footer();
