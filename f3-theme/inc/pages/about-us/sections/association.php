<section class="py-24 mx-auto text-white bg-primary">
            <div class="container mx-auto">

       <!--- <div class="pt-6 pb-20">
            <h2 class="mb-4">
                <?php 
                    echo esc_html(get_theme_mod('section_association_heading', __('Stowarzyszenie Przyjaciół Fioletowej Trójki', 'your-theme-textdomain'))); 
                ?>
            </h2>
        </div>
        --->
    <div class="flex flex-col sm:flex-row gap-x-12">
        
        <div class="relative md:basis-1/2">
            <img 
                src="<?php echo esc_url(get_theme_mod('section_association_image', get_template_directory_uri() . '/assets/images/svg/scouts.svg')); ?>" 
                class="relative sm:w-full sm:-translate-y-1/2 xl:w-2/3 sm:top-1/2 xl:left-1/2 xl:-translate-x-1/2" 
                alt="<?php esc_attr_e('Stowarzyszenie Przyjaciół Fioletowej Trójki', 'your-theme-textdomain'); ?>" 
                loading="lazy"
            />
        </div>
        <div class="self-center sm:basis-1/2 max-sm:mt-10">
            <p class="mb-6">
                <?php 
                echo esc_html(get_theme_mod('section_association_text', __('Stowarzyszenie zrzesza instruktorki, instruktorów, wychowanki, wychowanków oraz osoby chcące wspierać 3 Podgórski Szczep Fioletowej Trójki im. Tadeusza Kościuszki.', 'your-theme-textdomain'))); 
                ?>
            </p>
            <?php if (get_theme_mod('section_association_button_visible', true)) : ?>
            <a 
                href="<?php echo esc_url(get_theme_mod('section_association_link', home_url('/join-us'))); ?>" 
                target="_blank"
                class="hover:font-semibold stroke-primary stroke-white hover:stroke-gray">
                <span class="text-xs">
                    <?php 
                    echo esc_html(get_theme_mod('section_association_button_text', __('Dowiedz się więcej', 'your-theme-textdomain'))); 
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
            <?php endif; ?>
        </div>
            </div>
    </div>
</section>