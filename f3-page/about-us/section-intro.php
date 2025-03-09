<section class="relative mb-24 overflow-visible">
    <img src="<?php echo esc_url(get_theme_mod('section_intro_image', get_template_directory_uri() . '/assets/images/svg/waterfall.svg')); ?>"
         class="right-0 svg-color-primary sm:absolute max-sm:pb-16 max-sm:pl-6 max-sm:mx-0 sm:w-1/2 lg:w-1/3 xl:w-1/4 2xl:w-1/5"
         alt="<?php esc_attr_e('Intro Image', 'your-theme-textdomain'); ?>" />
    <div class="container mx-auto bg-white text-primary">
        <div class="w-3/4 sm:pt-12 sm:pb-12 sm:w-1/2">
            <h1 class="mb-4">
                <?php echo esc_html(get_theme_mod('section_intro_heading', __('O nas', 'your-theme-textdomain'))); ?>
            </h1>
            <p>
                <?php echo esc_html(get_theme_mod('section_intro_text', __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor', 'your-theme-textdomain'))); ?>
            </p>
            <div class="horizontal-line"></div>
        </div>
    </div>
</section>
