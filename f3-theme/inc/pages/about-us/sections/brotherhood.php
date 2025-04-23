<section class="relative my-24">
    <div class="md:w-1/3 max-sm:w-3/4 2xl:w-2/5 horizontal-line"></div>
    <div class="container mx-auto bg-white text-primary">
        <div class="pt-6 pb-20 md:w-3/4">
            <h2 class="mb-4">
                <?php echo esc_html(get_theme_mod('brotherhood_section_heading', __('Bractwo Szandarowe', 'your-theme-textdomain'))); ?>
            </h2>
            <p>
                <?php echo esc_html(get_theme_mod('brotherhood_section_text', __('Ścisłą Kadrę Szczepu stanowi Szczepowy, Kwatermistrz oraz Viceszczepowi. W składzie rady są wszyscy drużynowi oraz instruktorzy którzy nie mają funkcji w szczepie.', 'your-theme-textdomain'))); ?>
            </p>
        </div>

        <div class="brotherhood">
            <div class="brotherhood-photos">
                <?php
                $args = array(
                    'post_type'      => 'brotherhood_banner',
                    'posts_per_page' => -1,
                    'meta_key'       => 'brotherhood_order',
                    'orderby'        => 'meta_value_num',
                    'order'          => 'ASC',
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    $count = 0;
                    while ($query->have_posts()) : $query->the_post();
                        $count++;
                        ?>
                        <img alt="<?php the_title(); ?>"
                                loading="lazy"
                             class="brotherhood-photo <?php echo $count === 1 ? 'active' : ''; ?>"
                             src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
                             data-id="brotherhood-<?php echo esc_attr($count); ?>">
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>

            <div class="brotherhood-menu">
                <?php
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    $count = 0;
                    while ($query->have_posts()) : $query->the_post();
                        $count++;
                        ?>
                        <h3 class="brotherhood-group-name <?php echo $count === 1 ? 'active' : ''; ?>"
                            id="brotherhood-<?php echo esc_attr($count); ?>">
                            <?php the_title(); ?>
                        </h3>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>

            <?php
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                $count = 0;
                while ($query->have_posts()) : $query->the_post();
                    $count++;
                    ?>
                    <div class="brotherhood-content <?php echo $count === 1 ? 'active' : ''; ?>"
                         data-id="brotherhood-<?php echo esc_attr($count); ?>">
                        <p><?php the_content(); ?></p>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</section>
