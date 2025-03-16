<section class="container relative mx-auto my-24 text-primary">
    <h1 class="mb-8"><?php echo esc_html(get_theme_mod('contact_buildings_heading', __('Harcówki', 'your-theme-textdomain'))); ?></h1>
    <div class="grid grid-cols-2 gap-8">
        <?php
        // Pobierz wszystkie budynki
        $buildings = get_posts(array(
            'post_type' => 'building',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ));

        if (!empty($buildings)) :
            foreach ($buildings as $building) :
                $iframe_code = get_post_meta($building->ID, 'building_iframe', true);
                ?>
                <div class="flex flex-col">
                    <p class="font-semibold"><?php echo esc_html($building->post_title); ?></p>
                    <iframe 
                        src="<?php echo esc_url($iframe_code); ?>" 
                        width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <?php
            endforeach;
        else :
            ?>
            <p><?php esc_html_e('Brak budynków do wyświetlenia.', 'your-theme-textdomain'); ?></p>
        <?php endif; ?>
    </div>
</section>
