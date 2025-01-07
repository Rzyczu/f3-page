<section class="container relative mx-auto my-24 text-primary">
    <div class="flex flex-wrap items-start justify-between gap-8 sm:flex-row lg:gap-20">
        <?php
        // Pobierz wszystkie grupy
        $resource_groups = get_posts(array(
            'post_type' => 'resource_group',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ));

        if (!empty($resource_groups)) :
            foreach ($resource_groups as $group) :
                $group_items = get_post_meta($group->ID, 'group_items', true);
                ?>
                <div class="lg:basis-1/4 md:basis-1/2 max-lg:mb-12">
                    <h2 class="mb-4"><?php echo esc_html($group->post_title); ?></h2>
                    <?php if (!empty($group_items)) :
                        foreach ($group_items as $item) : ?>
                            <div class="flex flex-row gap-4 mt-12">
                                <i class="fa-sharp fa-light fa-file fa-2x"></i>
                                <div class="flex flex-col">
                                    <a href="<?php echo esc_url($item['link']); ?>" target="_blank">
                                        <h3 class="mb-2 font-medium"><?php echo esc_html($item['title']); ?></h3>
                                    </a>
                                    <p><?php echo esc_html($item['description']); ?></p>
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
