<section class="container relative mx-auto my-24 max-sm:mt-12 text-primary">
    <div class="container flex items-start gap-8 sm:flex-row max-sm:flex-col-reverse lg:gap-20">
        <div class="md:w-1/2">
            <h2 class="mb-4">
                <?php echo esc_html(get_theme_mod('docs_section_heading', __('Dokumenty', 'your-theme-textdomain'))); ?>
            </h2>
            <p class="pb-8">
                <?php echo esc_html(get_theme_mod('docs_section_text', __('Czasem gotujemy się z nadmiaru dokumentów, ale to one umożliwiają nam organizacje i dbanie o bezpieczeństwo', 'your-theme-textdomain'))); ?>
            </p>
            <?php

            $docs = get_posts(array(
                'post_type' => 'document',
                'posts_per_page' => -1,
                'meta_key' => 'document_order',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            ));
             

            if (!empty($docs)) :
                foreach ($docs as $doc) :
                    $link = get_post_meta($doc->ID, 'document_link', true) ?: '#';
                    $description = get_post_meta($doc->ID, 'document_description', true) ?: '';
                    ?>
                    <div class="flex flex-row gap-4 mt-12">
                    <i class="fa-sharp fa-light fa-file fa-2x"></i>                        <div class="flex flex-col">
                            <a href="<?php echo esc_url($link); ?>" target="_blank">
                                <h3 class="mb-2 font-medium"><?php echo esc_html(get_the_title($doc->ID)); ?></h3>
                            </a>
                            <p><?php echo esc_html($description); ?></p>
                        </div>
                    </div>
                    <?php
                endforeach;
            else :
                ?>
                <p><?php esc_html_e('Brak dokumentów do wyświetlenia.', 'your-theme-textdomain'); ?></p>
            <?php endif; ?>
        </div>
        <img src="<?php echo esc_url(get_theme_mod('docs_section_image', get_template_directory_uri() . '/assets/images/svg/tea-cup.svg')); ?>"
             class="w-3/5 sm:w-1/5 max-sm:self-center svg-color-primary"
             alt="<?php esc_attr_e('Documents Section Image', 'your-theme-textdomain'); ?>" 
             loading="lazy"
        />
    </div>
</section>
