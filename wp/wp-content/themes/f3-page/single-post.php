<?php get_header(); ?>

<main class="container mx-auto my-24 text-primary">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <article>
                <h1 class="mb-4"><?php the_title(); ?></h1>
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>" class="mb-6">
                <?php endif; ?>
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
    endif;
    ?>
</main>

<?php get_footer(); ?>
