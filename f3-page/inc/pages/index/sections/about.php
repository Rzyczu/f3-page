<section class="mx-auto mb-12 overflow-visible max-sm:pt-12 bg-primary sm:bg-gradient-to-r sm:from-white sm:from-2/3 sm:to-primary sm:to-2/3 max-sm:mt-0 sm:mb-24 text-primary">
    <div class="relative">
        <div class="max-sm:relative">
            <img 
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/svg/logo-white.svg'); ?>" 
                class="max-sm:pb-20 h-1/2 sm:h-full sm:absolute sm:left-2/3 -translate-x-half-logo" 
                alt="<?php esc_attr_e('Logo', 'your-theme-textdomain'); ?>" 
                loading="lazy"
            />
            <img 
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/svg/boat.svg'); ?>" 
                class="absolute w-12 sm:w-16 bottom-7 sm:bottom-4 right-12" 
                alt="<?php esc_attr_e('Boat', 'your-theme-textdomain'); ?>" 
                loading="lazy"
            />
            <svg class="absolute w-4 sm:w-5 right-4 -bottom-24 sm:-bottom-28" xmlns="http://www.w3.org/2000/svg" width="44" height="206" viewBox="0 0 44 206">
                <text id="Płyń_dalej" data-name="Płyń dalej" transform="translate(44) rotate(90)" fill="#b3a2ce"
                      font-size="36" font-family="Montserrat-Light, Montserrat" font-weight="300">
                    <tspan x="0" y="35"><?php esc_html_e('Płyń dalej', 'your-theme-textdomain'); ?></tspan>
                </text>
            </svg>
        </div>
        <div class="container max-sm:bg-white md:mx-auto">
            <div class="pt-12 pb-12 sm:w-1/2">
                <h1 class="mb-4">
                    3 Podgórski Szczep <br />
                    Fioletowej Trójki <br />
                    im. Tadeusza Kościuszki
                </h1>
                <p>
                    <?php 
                    // Dynamiczny tekst edytowalny w panelu WordPress
                    echo esc_html(get_theme_mod('section_about_text', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor')); 
                    ?>
                </p>
                <div class="horizontal-line"></div>
            </div>
        </div>
    </div>
</section>
