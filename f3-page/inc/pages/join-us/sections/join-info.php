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
                     alt="<?php echo esc_attr(sprintf(__('Scout Path %d', 'your-theme-textdomain'), $i)); ?>"
                     id="scout-path-<?php echo $i; ?>" 
                     loading="lazy"/>
                <?php
            }
            ?>
        </div>
        <?php
        for ($i = 1; $i <= 6; $i++) {
            $title = get_theme_mod("join_step_title_$i", __("Krok $i", 'your-theme-textdomain'));
            $content_left = get_theme_mod("join_step_content_left_$i", __("Opis dla kroku $i - Lewa strona", 'your-theme-textdomain'));
            $content_right = get_theme_mod("join_step_content_right_$i", __("Opis dla kroku $i - Prawa strona", 'your-theme-textdomain'));
            $layout = get_theme_mod("join_step_layout_$i", 'left_right');
            ?>
            <div class="scout-path-content w-full <?php echo $i === 1 ? 'active' : ''; ?>" data-id="scout-path-<?php echo $i; ?>">
                <h3 class="mb-8"><?php echo esc_html($title); ?></h3>
                <?php
                    if ($layout === 'full') :
                 ?>
                <div class="text-content"><?php echo wp_kses_post($content_left); ?></div>
                <?php
                else :
                ?>
                <div class="grid w-full md:grid-cols-2 md:gap-x-20 gap-y-8">
                        <div class="text-content"><?php echo wp_kses_post($content_left); ?></div>
                        <div class="text-content"><?php echo wp_kses_post($content_right); ?></div>
                </div>
                <?php
                endif;
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</section>
