<section class="relative text-white bg-primary">
    <div class="container items-start py-24 mx-auto">
        <h2 class="mb-4 text-3xl font-semibold">
            <?php echo esc_html(get_theme_mod('section_support_heading', __('Jak nas wesprzeć?', 'your-theme-textdomain'))); ?>
        </h2>
        <div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2">
            <div class="p-6 rounded-lg shadow-lg hover:scale-105 bg-primary-light bg-opacity-20">
                <div class="grid gap-4">
                    <div class="grid grid-cols-[auto_1fr] items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="48" stroke="white" stroke-width="4" fill="white" />
                            <text x="55" y="70" font-size="50" font-weight="bold" text-anchor="middle" fill="#714C98">1,5%</text>
                        </svg>
                        <p class="ml-3 text-lg">
                            <?php echo esc_html(get_theme_mod('section_support_text_donate', __('Przekaż nam swój 1,5%', 'your-theme-textdomain'))); ?>
                        </p>
                    </div>
                    <div class="grid grid-cols-[auto_1fr] items-center">
                        <a href="<?php echo esc_url(get_theme_mod('section_support_link_facebook', 'https://www.facebook.com/szczepf3')); ?>" target="_blank" rel="noopener noreferrer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-10 h-10 text-white" fill="currentColor" viewBox="2 2 46 46">
                                <path d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z" />
                            </svg>
                        </a>
                        <p class="ml-3 text-lg">
                            <?php echo esc_html(get_theme_mod('section_support_text_facebook', __('Polub naszą stronę', 'your-theme-textdomain'))); ?>
                        </p>
                    </div>
                    <div class="grid grid-cols-[auto_1fr] items-center">
                        <svg class="flex-shrink-0 w-10 h-10 primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="1 1 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 11c.889-.086 1.416-.543 2.156-1.057a22.323 22.323 0 0 0 3.958-5.084 1.6 1.6 0 0 1 .582-.628 1.549 1.549 0 0 1 1.466-.087c.205.095.388.233.537.406a1.64 1.64 0 0 1 .384 1.279l-1.388 4.114M7 11H4v6.5A1.5 1.5 0 0 0 5.5 19v0A1.5 1.5 0 0 0 7 17.5V11Zm6.5-1h4.915c.286 0 .372.014.626.15.254.135.472.332.637.572a1.874 1.874 0 0 1 .215 1.673l-2.098 6.4C17.538 19.52 17.368 20 16.12 20c-2.303 0-4.79-.943-6.67-1.475" />
                        </svg>
                        <p class="ml-3 text-lg">
                            <?php echo esc_html(get_theme_mod('section_support_text_recommend', __('Poleć nas innym', 'your-theme-textdomain'))); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="p-6 rounded-lg shadow-lg hover:scale-105 bg-primary-dark bg-opacity-20">
                <p class="mb-2 text-lg font-semibold">
                    <?php echo esc_html(get_theme_mod('section_support_text_details_heading', __('Nasze dane 1,5%', 'your-theme-textdomain'))); ?>
                </p>
                <ul class="space-y-2 text-gray">
                    <li><?php echo esc_html(get_theme_mod('section_support_text_details_name', __('Nazwa OPP: Związek Harcerstwa Rzeczypospolitej', 'your-theme-textdomain'))); ?></li>
                    <li><?php echo esc_html(get_theme_mod('section_support_text_details_krs', __('Numer KRS: 0000057720', 'your-theme-textdomain'))); ?></li>
                    <li><?php echo esc_html(get_theme_mod('section_support_text_details_code', __('Kod Szczepu: MAL 078', 'your-theme-textdomain'))); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container flex justify-end mx-auto">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/mountains.svg'); ?>" class="my-4 xl:w-2/5 sm:my-12 sm:w-2/3 primary" alt="<?php esc_attr_e('Mountains Illustration', 'your-theme-textdomain'); ?>" />
    </div>
</section>
