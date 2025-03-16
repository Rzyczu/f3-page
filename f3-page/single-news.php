<?php get_header(); ?>

<main class="container mx-auto my-24 text-primary">

    <div class="mb-6">
        <button onclick="window.history.back();" class="flex items-center text-primary hover:text-primary-light">
            <i class="mr-2 fa-solid fa-arrow-turn-left"></i> 
            <span class="px-4"> Powrót </span>
        </button>
    </div>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            $news_date = get_post_meta(get_the_ID(), '_news_date', true);
            ?>
            <article>
                <h1 class="mb-4"><?php the_title(); ?></h1>
                
                <?php if ($news_date) : ?>
                    <p class="mb-2 text-sm text-gray-600"><?php echo esc_html($news_date); ?></p>
                <?php endif; ?>

                <?php if (has_post_thumbnail()) : ?>
                    <img loading="lazy" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>" class="mb-6">
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

