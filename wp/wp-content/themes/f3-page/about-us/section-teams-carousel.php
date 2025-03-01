<section class="container relative mx-auto my-24 overflow-x-visible text-primary">
    <h3 class="mb-16 text-3xl font-bold">
        <?php echo esc_html($title ?? __('Drużyny', 'your-theme-textdomain')); ?>
    </h3>

    <div class="circular-carousel">
        <div class="carousel-slider">
            <div class="slider-dots"></div>
            <div class="slider-images">
                <?php
                // Pobierz drużyny z WordPress
                $teams = get_posts(array(
                    'post_type' => 'team',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        array(
                            'key' => 'team_gender',
                            'value' => $gender ?? 'all',
                            'compare' => '='
                        )
                    )
                ));

                if (!empty($teams)) :
                    foreach ($teams as $team) :
                        $image = get_the_post_thumbnail_url($team->ID, 'medium') ?: get_template_directory_uri() . '/assets/team-placeholder.jpg';
                        ?>
                        <div class="slide-image">
                            <img alt="<?php echo esc_attr(get_the_title($team->ID)); ?>" class="" src="<?php echo esc_url($image); ?>">
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>

        <div class="carousel-content">
            <div class="slider-names">
                <?php
                foreach ($teams as $team) :
                    $short_name = get_post_meta($team->ID, 'team_short_name', true);
                    ?>
                    <span class="slide-name"><?php echo esc_html($short_name ? $short_name : get_the_title($team->ID)); ?></span>
        <?php
                endforeach;
                ?>
            </div>
            <div class="slider-contents">
                <?php
                foreach ($teams as $team) :
                    $description = get_post_meta($team->ID, 'team_description', true);
                    $links = get_post_meta($team->ID, 'team_links', true) ?: array();
                    ?>
                    <div class="slide-content">
                        <h4 class="slide-title"><?php echo esc_html(get_the_title($team->ID)); ?></h4>
                        <p><?php echo esc_html($description); ?></p>
                        <div class="slide-media">
                            <?php foreach ($links as $link) : ?>
                                <a target="_blank" href="<?php echo esc_url($link['url']); ?>">
                                    <i class="<?php echo esc_attr($link['icon']); ?> fa-2x"></i>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>
