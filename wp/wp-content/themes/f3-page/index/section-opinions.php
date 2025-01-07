<section class="my-24 text-white bg-primary">
    <div class="container flex flex-col py-24 mx-auto sm:relative sm:block sm:flex-none">
        <div class="order-3 float-right max-sm:mt-12">
            <button class="pr-8" id="opinions-prev-btn">
                <svg class="h-4 stroke-white hover:stroke-primary-light hover:scale-x-125" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 57.623 27.941">
                    <g id="Group_50" data-name="Group 50" transform="translate(1.459 0.736)">
                        <path id="Path_461" data-name="Path 461" d="M1299.5,1378.625l-13.766,12.656,14.381,13.828"
                              transform="translate(-1285.732 -1378.625)" fill="none" stroke-miterlimit="10" stroke-width="2" />
                        <line id="Line_27" data-name="Line 27" x2="56.164" transform="translate(0 12.656)" fill="none"
                              stroke-miterlimit="10" stroke-width="2" />
                    </g>
                </svg>
            </button>
            <button id="opinions-next-btn">
                <svg class="h-4 stroke-white hover:stroke-primary-light hover:scale-x-125" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 161.462 27.941">
                    <g id="Group_49" data-name="Group 49" transform="translate(160.003 27.205) rotate(180)">
                        <path id="Path_461" data-name="Path 461" d="M13.766,0,0,12.656,14.381,26.484" fill="none"
                              stroke-miterlimit="10" stroke-width="2" />
                        <line id="Line_27" data-name="Line 27" x2="160.003" transform="translate(0 12.656)" fill="none"
                              stroke-miterlimit="10" stroke-width="2" />
                    </g>
                </svg>
            </button>
        </div>
        <div class="relative self-center order-1 inline-block sm:right-8 md:right-12 lg:right-16 xl:right-20 2xl:right-24 max-sm:w-full sm:mt-0 sm:absolute sm:bottom-12">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/svg/bushes.svg'); ?>" class="w-full svg-color-white" alt="<?php esc_attr_e('Bushes Illustration', 'your-theme-textdomain'); ?>" />
        </div>
        <div class="order-2 sm:ml-24 sm:w-1/3 max-sm:pt-24">
            <h2 class="mb-4"><?php esc_html_e('Opinie', 'your-theme-textdomain'); ?></h2>
            <div class="opinions">
                <?php
                // Query to get all opinions
                $opinions = new WP_Query(array(
                    'post_type' => 'opinion',
                    'posts_per_page' => -1,
                ));

                if ($opinions->have_posts()) :
                    while ($opinions->have_posts()) : $opinions->the_post();
                        $opinion_person = get_post_meta(get_the_ID(), 'opinion_person', true);
                        ?>
                        <article class="">
                            <p class="mb-6"><?php the_content(); ?></p>
                            <span class="text-xs"><i><?php echo esc_html($opinion_person); ?></i></span>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p><?php esc_html_e('Brak opinii do wyświetlenia.', 'your-theme-textdomain'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
