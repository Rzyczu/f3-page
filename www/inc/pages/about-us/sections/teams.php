<section class="relative py-24 text-white bg-primary">
    <div class="container flex items-start mx-auto max-md:flex-col-reverse">
        <div class="pt-12 md:w-1/2">
            <h2 class="mb-4">
                <?php echo esc_html(get_theme_mod('section_teams_heading', __('Drużyny', 'your-theme-textdomain'))); ?>
            </h2>
            <p class="mb-6">
                <?php echo wp_kses_post(get_theme_mod('section_teams_text_main', __('Działają w grupach rówieśniczych, w jednej drużynie jest około 15-30 osób. Nazwa "Podgórska" jest nazwą historyczną/ symboliczną. Nasze drużyny działają w różnych rejonach Krakowa.', 'your-theme-textdomain'))); ?>
            </p>
            <h3 class="mb-2 text-xl font-semibold">
                <?php echo esc_html(get_theme_mod('section_teams_subheading_how', __('Jak działamy?', 'your-theme-textdomain'))); ?>
            </h3>
            <p class="mb-6">
                <?php echo wp_kses_post(get_theme_mod('section_teams_text_how', __('W strukturach ZHR działa Organizacja Harcerek oraz Organizacja Harcerzy, stąd podział drużyn ze względu na płeć.', 'your-theme-textdomain'))); ?>
            </p>
            <h3 class="mb-2 text-xl font-semibold">
                <?php echo esc_html(get_theme_mod('section_teams_subheading_age', __('Podział wiekowy', 'your-theme-textdomain'))); ?>
            </h3>
            <p class="mb-6">
                <?php echo wp_kses_post(get_theme_mod('section_teams_text_age', __('Kolejnym ważnym odróżnieniem drużyn jest ze względu na wiek. Są trzy główne grupy wiekowe: <br /> - Gromady zuchowe: 7–10 lat <br /> - Drużyny harcerskie: 11-15 lat <br /> - Drużyny wędrownicze: 16-18 lat', 'your-theme-textdomain'))); ?>
            </p>
        </div>
        <img src="<?php echo esc_url(get_theme_mod('section_teams_image', get_template_directory_uri() . '/assets/images/svg/flag.svg')); ?>" 
             class="w-3/5 svg-color-white xl:w-1/4 md:w-2/5 max-md:self-center md:pl-8" 
             alt="<?php esc_attr_e('Teams Image', 'your-theme-textdomain'); ?>" 
             loading="lazy"/>
    </div>
</section>
