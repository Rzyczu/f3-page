<section class="container relative mx-auto my-24 text-primary">
    <div class="flex flex-wrap items-start justify-between gap-8 sm:flex-row lg:gap-20">
        <?php
        // Pobranie wszystkich grup twórczości
        $resource_groups = get_posts(array(
            'post_type' => 'resource_group',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ));

        if (!empty($resource_groups)) :
            foreach ($resource_groups as $group) :
                // Pobranie wszystkich elementów należących do tej grupy
                $group_items = get_posts(array(
                    'post_type' => 'resource_item',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'resource_group_category',
                            'field' => 'slug',
                            'terms' => get_post_field('post_name', $group->ID),
                        ),
                    ),
                ));
                ?>
                <div class="lg:basis-1/4 md:basis-1/2 max-lg:mb-12">
                    <h2 class="mb-4"><?php echo esc_html(get_the_title($group->ID)); ?></h2>
                    <?php if (!empty($group_items)) :
                        foreach ($group_items as $item) : ?>
                            <div class="flex flex-row gap-4 mt-12">
                                <i class="fa-sharp fa-light fa-file fa-2x"></i>
                                <div class="flex flex-col">
                                    <a href="<?php echo esc_url(get_permalink($item->ID)); ?>" target="_blank">
                                        <h3 class="mb-2 font-medium"><?php echo esc_html(get_the_title($item->ID)); ?></h3>
                                    </a>
                                    <p><?php echo esc_html(get_the_excerpt($item->ID)); ?></p>
                                </div>
                            </div>
                        <?php endforeach;
                    else : ?>
                        <p><?php esc_html_e('Brak elementów w tej grupie.', 'your-theme-textdomain'); ?></p>
                    <?php endif; ?>
                </div>
                <?php
            endforeach;
        else :
            ?>
            <p><?php esc_html_e('Brak grup do wyświetlenia.', 'your-theme-textdomain'); ?></p>
        <?php endif; ?>
    </div>
</section>
