<section class="relative items-center mb-24 sm:flex">
    <img src="<?php echo esc_url(get_theme_mod('our_creativity_intro_image', get_template_directory_uri() . '/assets/images/svg/tents.svg')); ?>"
         class="right-0 svg-color-primary sm:absolute max-sm:pb-16 max-sm:pl-6 max-sm:mx-0 sm:w-1/2 lg:w-1/2 2xl:w-1/3"
         alt="<?php esc_attr_e('Our Creativity Intro Image', 'your-theme-textdomain'); ?>" 
         loading="lazy"/>
    <div class="container mx-auto bg-white text-primary">
        <div class="w-3/4 sm:pt-12 sm:pb-12 sm:w-5/12">
            <h1 class="mb-4">
                <?php echo esc_html(get_theme_mod('our_creativity_intro_heading', __('Nasza twórczość', 'your-theme-textdomain'))); ?>
            </h1>
            <p>
                <?php echo esc_html(get_theme_mod('our_creativity_intro_text', __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor', 'your-theme-textdomain'))); ?>
            </p>
            <div class="horizontal-line"></div>
        </div>
    </div>
</section>
