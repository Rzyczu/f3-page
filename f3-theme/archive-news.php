<?php
/*
Template Name: Archive News
*/

get_header(); ?>

<main class="container mx-auto my-24 text-primary">
    <div class="mb-6">
        <button onclick="window.history.back();" class="flex items-center text-primary hover:text-primary-light">
            <i class="mr-2 fa-solid fa-arrow-turn-left"></i> 
            <span class="px-4"> Powrót </span>
        </button>
    </div>
    
    <h1 class="mb-4"><?php echo esc_html(get_theme_mod('f3_news_heading', 'Aktualności')); ?></h1>
    <p class="mb-8"><?php echo wp_kses_post(get_theme_mod('f3_news_description')); ?></p>
    
    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $news_query = new WP_Query(array(
        'post_type' => 'news',
        'posts_per_page' => 6,
        'paged' => $paged,
        'meta_key' => '_news_date_sort',
        'orderby' => 'meta_value',
        'order' => 'DESC',
    ));

    if ($news_query->have_posts()) :
        $i = 0;
        while ($news_query->have_posts()) : $news_query->the_post();
            $news_date = get_post_meta(get_the_ID(), '_news_date', true);
            $thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : get_template_directory_uri() . '/assets/images/news-placeholder.jpg';
            ?>
            <article class="flex flex-col items-center gap-6 mb-12 md:flex-row <?php echo $i % 2 == 0 ? 'md:flex-row-reverse' : ''; ?>">
                <div class="md:w-1/3">
                    <img loading="lazy" src="<?php echo esc_url($thumbnail); ?>" alt="<?php the_title_attribute(); ?>" class="rounded-lg shadow-md">
                </div>
                <div class="md:w-2/3">
                    <h2 class="mb-4 font-semibold"><?php the_title(); ?></h2>
                    <?php if ($news_date) : ?>
                        <p class="mb-2 text-sm text-primary-light"><?php echo esc_html($news_date); ?></p>
                    <?php endif; ?>
                    <p class="mb-4"> <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?> </p>
                    <a href="<?php the_permalink(); ?>" class="font-bold text-primary">Czytaj dalej</a>
                </div>
            </article>
            <?php
            $i++;
        endwhile;
        
        // Paginacja
        echo '<div class="flex items-center justify-center gap-4 mt-12">';
        echo get_previous_posts_link('<button class="p-2 rounded-full bg-primary-light hover:bg-primary hover:text-white">&laquo;</button>', $news_query->max_num_pages);
        echo '<span class="font-semibold text-primary-light">' . $paged . ' / ' . $news_query->max_num_pages . '</span>';
        echo get_next_posts_link('<button class="p-2 rounded-full bg-primary-light hover:bg-primary hover:text-white">&raquo;</button>', $news_query->max_num_pages);
        echo '</div>';

        wp_reset_postdata();
    else :
        echo '<p>Brak aktualności do wyświetlenia.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>