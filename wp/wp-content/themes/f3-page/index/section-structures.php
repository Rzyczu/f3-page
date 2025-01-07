<section class="relative my-24 bg-white text-primary">
    <div class="container mx-auto -scroll-my-28 text-primary">
        <h2 class="mb-4">
            <?php esc_html_e('Struktury, w których działamy', 'your-theme-textdomain'); ?>
        </h2>
        <div class="grid justify-around grid-cols-2 gap-16 mx-auto mt-16 sm:grid-cols-4 flex-grow-2 sm:mx-10 md:m-20 md:gap-12 lg:gap-24">
            <?php
            // Pobierz struktury
            $structures = get_posts(array(
                'post_type' => 'structure',
                'posts_per_page' => -1,
            ));

            if (!empty($structures)) :
                foreach ($structures as $structure) :
                    $url = get_post_meta($structure->ID, 'structure_url', true) ?: '#';
                    $image = get_the_post_thumbnail_url($structure->ID, 'medium') ?: get_template_directory_uri() . '/assets/placeholder.png';
                    $name = get_the_title($structure->ID);
                    ?>
                    <article class="justify-self-stretch hover:scale-110">
                        <a href="<?php echo esc_url($url); ?>" target="_blank">
                            <img class="object-contain w-full" alt="<?php echo esc_attr($name); ?>" src="<?php echo esc_url($image); ?>">
                        </a>
                    </article>
                    <?php
                endforeach;
            else :
                ?>
                <p><?php esc_html_e('Brak struktur do wyświetlenia.', 'your-theme-textdomain'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
