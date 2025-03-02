<section class="relative mt-24 text-white max-sm:mt-12 max bg-primary">
    <div class="container flex items-start py-24 mx-auto max-md:flex-col-reverse">
        <div class="max-md:pt-12 md:w-1/2">
            <h2 class="mb-4">
                <?php echo esc_html(get_theme_mod('section_history_heading', __('Nasza historia', 'your-theme-textdomain'))); ?>
            </h2>
            <p class="mb-6">
                <?php echo esc_html(get_theme_mod('section_history_text', __('Działają w grupach rówieśniczych, w jednej drużynie jest około 15-30 osób. Nazwa "Podgórska" jest nazwą historyczną/symboliczną. Nasze drużyny działają w różnych rejonach Krakowa.', 'your-theme-textdomain'))); ?>
            </p>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('history'))); ?>" class="hover:font-semibold stroke-white hover:stroke-gray">
                <svg class="w-16 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 133.621 27.941">
                    <g id="Group_131" data-name="Group 131" transform="translate(132.162 27.204) rotate(180)">
                        <path id="Path_461" data-name="Path 461" d="M1299.5,1378.625l-13.766,12.656,14.381,13.828"
                              transform="translate(-1285.732 -1378.625)" fill="none" stroke-miterlimit="10" stroke-width="3" />
                        <line id="Line_27" data-name="Line 27" x2="132.162" transform="translate(0 12.656)" fill="none"
                              stroke-miterlimit="10" stroke-width="3" />
                    </g>
                </svg>
            </a>
        </div>

        <img src="<?php echo esc_url(get_theme_mod('section_history_image', get_template_directory_uri() . '/assets/images/svg/castle.svg')); ?>"
             class="w-full svg-color-white xl:w-1/2 md:w-4/6 max-md:self-center md:pl-8"
             alt="<?php esc_attr_e('Obraz historii', 'your-theme-textdomain'); ?>" />
    </div>
</section>
