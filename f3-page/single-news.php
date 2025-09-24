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
            $news_link = get_post_meta(get_the_ID(), '_news_link', true);
            ?>
            <article>
                <h1 class="mb-2"><?php the_title(); ?></h1>
                
                <?php if ($news_date) : ?>
                    <p class="mb-4 text-sm text-gray-600"><?php echo esc_html($news_date); ?></p>
                <?php endif; ?>

                <?php if ($news_link) : ?>
                    <p class="mb-8 text-blue-600 hover:underline">
                        <a href="<?php echo esc_url($news_link); ?>" target="_blank" rel="noopener noreferrer">
                            <i>Przeczytaj również na naszej stronie Facebook…</i>
                        </a>
                    </p>
                <?php endif; ?>

                <?php if (has_post_thumbnail()) : ?>
                    <img loading="lazy" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>" class="mb-6">
                <?php endif; ?>

                <div class="prose content max-w-none">
                    <?php echo wpautop( get_the_content() ); ?>
                </div>
            </article>
            <?php
        endwhile;
    endif;
    ?>
</main>

<?php get_footer(); ?>


