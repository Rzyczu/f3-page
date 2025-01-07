<section class="container relative mx-auto my-24 overflow-visible bg-white text-primary">
    <h2 class="mb-4 sm:ml-24"><?php esc_html_e('Wydarzenia', 'your-theme-textdomain'); ?></h2>
    <div class="absolute flex w-11/12 gap-10 md:gap-6 max-md:justify-end md:right-10">
        <button class="swiper-button-prev"></button>
        <button class="swiper-button-next"></button>
    </div>
    <div class="swiper-news">
        <div class="swiper-wrapper">
            <?php
            // Query to fetch news posts
            $news_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 5, // Limit number of news items
            ));

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
                    $news_image = get_the_post_thumbnail_url(get_the_ID(), 'medium') ?: get_template_directory_uri() . '/assets/images/news-placeholder.jpg';
                    $news_logo = get_template_directory_uri() . '/assets/svg/logo.svg';
                    ?>
                    <div class="swiper-slide news-article">
                        <div class="news-article-imgages">
                            <img class="news-article-img" src="<?php echo esc_url($news_image); ?>" alt="<?php the_title_attribute(); ?>" />
                            <img class="news-article-img-logo" src="<?php echo esc_url($news_logo); ?>" alt="<?php esc_attr_e('News Logo', 'your-theme-textdomain'); ?>" />
                        </div>
                        <h3 class="news-article-header"><?php the_title(); ?></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                        <a href="<?php the_permalink(); ?>" class="news-link" aria-label="<?php the_title_attribute(); ?>"></a>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p><?php esc_html_e('Brak wydarzeń do wyświetlenia.', 'your-theme-textdomain'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
