<section class="container relative mx-auto my-24 overflow-visible bg-white text-primary">
    <h2 class="mb-4 sm:ml-24"><?php esc_html_e('Wydarzenia', 'your-theme-textdomain'); ?></h2>
    <div class="absolute flex w-11/12 gap-10 md:gap-6 max-md:justify-end md:right-10">
        <button class="swiper-button-prev"></button>
        <button class="swiper-button-next"></button>
    </div>
    <div class="swiper-news">
        <div class="swiper-wrapper">
            <?php
            $news_query = new WP_Query(array(
                'post_type' => 'news',
                'posts_per_page' => 5,
                'orderby' => 'date',
                'order' => 'DESC',
            ));

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
                    $news_image = get_the_post_thumbnail_url(get_the_ID(), 'medium') ?: get_template_directory_uri() . '/assets/images/news-placeholder.jpg';
                    $news_logo = get_template_directory_uri() . '/assets/images/svg/logo.svg';
                    ?>
                    <div class="swiper-slide news-article">
                        <div class="news-article-imgages">
                            <img class="news-article-img" src="<?php echo esc_url($news_image); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy"/>
                            <img class="news-article-img-logo" src="<?php echo esc_url($news_logo); ?>" alt="<?php esc_attr_e('News Logo', 'your-theme-textdomain'); ?>" loading="lazy"/>
                        </div>
                        <h3 class="news-article-header"><?php the_title(); ?></h3>
                        <p>
                            <?php 
                                $content = strip_tags(get_the_content()); 
                                echo esc_html(mb_strimwidth($content, 0, 100, "...")); 
                            ?>
                            <br />
                            <a href="<?php echo get_permalink(); ?>" class="font-semibold news-link text-primary">
                                <em><?php esc_html_e('Czytaj dalej', 'your-theme-textdomain'); ?></em>
                            </a>
                        </p>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
            
            <!-- Ostatni slide: Przejdź do wszystkich aktualności -->
            <div class="flex items-center justify-center swiper-slide news-article">
            <div class="news-article-imgages bg-primary">
                <img class="news-article-img-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/logo.svg" alt="News Logo" loading="lazy"/>
            </div>
                <h3 class="news-article-header">Wszystkie aktualności</h3>
                <p class="mt-4">
                <a href="<?php echo get_permalink(get_page_by_path('archive_news')); ?>" class="font-semibold news-link text-primary">
                        <em><?php esc_html_e('Czytaj dalej', 'your-theme-textdomain'); ?></em>
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
