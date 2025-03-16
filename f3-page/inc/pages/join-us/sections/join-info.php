<section class="relative my-24 text-white bg-primary">
    <div class="container relative items-start py-24 mx-auto max-md:flex-col-reverse">
        <div class="md:w-1/2">
            <h2 class="mb-4">
                <?php echo esc_html(get_theme_mod('join_steps_heading', __('Krok po kroku', 'your-theme-textdomain'))); ?>
            </h2>
            <p class="mb-6">
                <?php echo esc_html(get_theme_mod('join_steps_text', __('Znajdziesz tutaj wszystkie kroki potrzebne, aby dołączyć do nas.', 'your-theme-textdomain'))); ?>
            </p>
        </div>
        <div class="scout-path-elements">
            <?php
            for ($i = 1; $i <= 6; $i++) {
                $image = get_theme_mod("join_step_image_$i", get_template_directory_uri() . "/assets/images/svg/step-icon-$i.svg");
                ?>
                <img src="<?php echo esc_url($image); ?>"
                     class="h-16 hover:scale-110 scout-path-element lg:h-20 xl:h-28"
                     alt="<?php esc_attr_e("Scout Path $i", 'your-theme-textdomain'); ?>"
                     id="scout-path-<?php echo $i; ?>" 
                     loading="lazy"/>
                <?php
            }
            ?>
        </div>
        <?php
        for ($i = 1; $i <= 6; $i++) {
            $title = get_theme_mod("join_step_title_$i", __("Krok $i", 'your-theme-textdomain'));
            $content = get_theme_mod("join_step_content_$i", __("Opis dla kroku $i", 'your-theme-textdomain'));
            ?>
            <div class="scout-path-content <?php echo $i === 1 ? 'active' : ''; ?>" data-id="scout-path-<?php echo $i; ?>">
                <h3 class="mb-8"><?php echo esc_html($title); ?></h3>
                <div class="text-content"><?php echo wp_kses_post($content); ?></div>
            </div>
            <?php
        }
        ?>
    </div>
</section>
