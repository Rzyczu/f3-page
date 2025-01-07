<section class="relative my-24 text-white bg-primary">
    <div class="container relative items-start py-24 mx-auto max-md:flex-col-reverse">
        <div class="md:w-1/2">
            <h2 class="mb-4">
                <?php echo esc_html(get_theme_mod('join_info_heading', __('Krok po kroku', 'your-theme-textdomain'))); ?>
            </h2>
            <p class="mb-6">
                <?php echo esc_html(get_theme_mod('join_info_text', __('Jeżeli szukasz drużyny dla siebie lub dla swojego dziecka lub chcesz z nami działać jako dorosły to znajdziesz tutaj jak to zrobić:', 'your-theme-textdomain'))); ?>
            </p>
        </div>
        <div class="scout-path-elements">
            <?php
            for ($i = 1; $i <= 6; $i++) {
                $image = get_theme_mod("join_info_image_$i", get_template_directory_uri() . "/assets/images/svg/icon-$i.svg");
                ?>
                <img src="<?php echo esc_url($image); ?>"
                     class="h-16 hover:hover:scale-110 active scout-path-element lg:h-20 xl:h-28"
                     alt="<?php esc_attr_e("Scout Path $i", 'your-theme-textdomain'); ?>"
                     id="scout-path-<?php echo $i; ?>" />
                <?php
            }
            ?>
        </div>
        <?php
        for ($i = 1; $i <= 6; $i++) {
            $title = get_theme_mod("join_info_title_$i", __("Krok $i", 'your-theme-textdomain'));
            $content = get_theme_mod("join_info_content_$i", __("Opis dla kroku $i", 'your-theme-textdomain'));
            ?>
            <div class="scout-path-content <?php echo $i === 1 ? 'active' : ''; ?>" data-id="scout-path-<?php echo $i; ?>">
                <h3 class="mb-8"><?php echo esc_html($title); ?></h3>
                <p><?php echo wp_kses_post($content); ?></p>
            </div>
            <?php
        }
        ?>
    </div>
</section>
