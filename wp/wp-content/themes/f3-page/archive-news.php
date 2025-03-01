<?php get_header(); ?>

<main class="container mx-auto my-24 text-primary">
    <h1 class="mb-6 text-3xl font-bold"><?php esc_html_e('Wszystkie Aktualności', 'your-theme-textdomain'); ?></h1>

    <?php if (have_posts()) : ?>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php while (have_posts()) : the_post(); ?>
                <article class="p-4 bg-white rounded-lg shadow news-item">
                    <a href="<?php the_permalink(); ?>" class="block">
                        <?php if (has_post_thumbnail()) : ?>
                            <img class="object-cover w-full h-48 mb-4" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php else : ?>
                            <img class="object-cover w-full h-48 mb-4" src="<?php echo get_template_directory_uri(); ?>/assets/images/news-placeholder.jpg" alt="Placeholder">
                        <?php endif; ?>
                    </a>
                    <h2 class="mb-2 text-xl font-semibold">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="mb-2 text-sm text-gray-500">
                        <?php echo get_post_meta(get_the_ID(), '_news_date', true); ?>
                    </p>
                    <p class="text-gray-700">
                        <?php 
                            $content = strip_tags(get_the_content());
                            echo esc_html(mb_strimwidth($content, 0, 150, "...")); 
                        ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="inline-block mt-2 font-semibold text-primary">
                        <em><?php esc_html_e('Czytaj dalej', 'your-theme-textdomain'); ?></em>
                    </a>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="mt-6">
            <?php the_posts_pagination(); ?>
        </div>

    <?php else : ?>
        <p><?php esc_html_e('Brak aktualności do wyświetlenia.', 'your-theme-textdomain'); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
