<?php
/**
 * Template Name: History
 */
get_header();
?>

<main class="history-page">
    <div class="container py-24 mx-auto text-primary">
        <?php
        while (have_posts()) : the_post();
            the_content();
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();
 