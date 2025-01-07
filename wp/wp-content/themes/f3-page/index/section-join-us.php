<section class="container mx-auto my-24 text-primary">
    <div class="flex flex-col md:px-24 sm:flex-row gap-x-12">
        <div class="relative md:basis-1/2">
            <img 
                src="<?php echo esc_url(get_theme_mod('section_join_us_image', get_template_directory_uri() . '/assets/images/svg/scouts.svg')); ?>" 
                class="relative svg-color-primary sm:w-full sm:-translate-y-1/2 xl:w-2/3 sm:top-1/2 xl:left-1/2 xl:-translate-x-1/2" 
                alt="<?php esc_attr_e('Scouts Illustration', 'your-theme-textdomain'); ?>" 
            />
        </div>
        <div class="self-center sm:basis-1/2 max-sm:mt-10">
            <h2 class="mb-4">
                <?php 
                echo esc_html(get_theme_mod('section_join_us_heading', __('Dołącz do nas', 'your-theme-textdomain'))); 
                ?>
            </h2>
            <p class="mb-6">
                <?php 
                echo esc_html(get_theme_mod('section_join_us_text', __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna', 'your-theme-textdomain'))); 
                ?>
            </p>
            <a 
                href="<?php echo esc_url(get_theme_mod('section_join_us_link', home_url('/join-us'))); ?>" 
                class="hover:font-semibold stroke-primary hover:stroke-primary-dark">
                <span class="text-xs">
                    <?php 
                    echo esc_html(get_theme_mod('section_join_us_button_text', __('Działaj z nami', 'your-theme-textdomain'))); 
                    ?>
                </span>
                <svg class="w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 133.621 27.941">
                    <g id="Group_131" data-name="Group 131" transform="translate(132.162 27.204) rotate(180)">
                        <path id="Path_461" data-name="Path 461" d="M1299.5,1378.625l-13.766,12.656,14.381,13.828"
                              transform="translate(-1285.732 -1378.625)" fill="none" stroke-miterlimit="10" stroke-width="3" />
                        <line id="Line_27" data-name="Line 27" x2="132.162" transform="translate(0 12.656)" fill="none"
                              stroke-miterlimit="10" stroke-width="3" />
                    </g>
                </svg>
            </a>
        </div>
    </div>
</section>
