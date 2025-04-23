<section class="relative my-24">
    <div class="md:w-1/3 max-sm:w-3/4 2xl:w-2/5 horizontal-line"></div>
    <div class="container mx-auto bg-white text-primary">
        <div class="flex flex-row mb-6">
            <div class="pt-6 md:w-3/4 sm:pb-12">
                <h2 class="mb-4">
                    <?php echo esc_html(get_theme_mod('section_board_heading', __('Rada Szczepu', 'your-theme-textdomain'))); ?>
                </h2>
                <p>
                    <?php echo esc_html(get_theme_mod('section_board_text', __('Ścisłą Kadrę Szczepu stanowi Szczepowy, Kwatermistrz oraz Viceszczepowi. W składzie rady są wszyscy drużynowi oraz instruktorzy którzy nie mają funkcji w szczepie.', 'your-theme-textdomain'))); ?>
                </p>
            </div>
            <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/svg/logo-cartoon.svg'); ?>" 
                 class="w-16 ml-16 svg-color-primary max-sm:hidden" 
                 alt="<?php esc_attr_e('Logo', 'your-theme-textdomain'); ?>" />
        </div>

        <div class="board">
            <div class="board-menu">
                <h3 class="board-group-name active" id="board-personnel"><?php esc_html_e('Kadra', 'your-theme-textdomain'); ?></h3>
                <h3 class="board-group-name" id="board-leaders"><?php esc_html_e('Drużynowi', 'your-theme-textdomain'); ?></h3>
                <h3 class="board-group-name" id="board-instructors"><?php esc_html_e('Instruktorzy', 'your-theme-textdomain'); ?></h3>
            </div>

            <?php
            // Grupy osób
            $groups = array(
                'personnel' => __('Kadra', 'your-theme-textdomain'),
                'leaders' => __('Drużynowi', 'your-theme-textdomain'),
                'instructors' => __('Instruktorzy', 'your-theme-textdomain'),
            );

            foreach ($groups as $group_key => $group_name) :
                // Pobierz osoby dla grupy
                $persons = get_posts(array(
                    'post_type' => 'board_member',
                    'posts_per_page' => -1,
                    'meta_key' => 'person_order',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'board_group',
                            'value' => $group_key,
                            'compare' => '='
                        )
                    )
                ));                
                ?>
                <div class="board-group <?php echo $group_key === 'personnel' ? 'active' : ''; ?>" data-id="board-<?php echo esc_attr($group_key); ?>">
                    <?php foreach ($persons as $person) : ?>
                        <?php
                        $image = get_the_post_thumbnail_url($person->ID, 'medium') ?: get_template_directory_uri() . '/assets/person-placeholder.jpg';
                        $title = get_post_meta($person->ID, 'person_title', true);
                        $name = get_the_title($person->ID);
                        $display_order = get_theme_mod('board_display_order', 'title_first');
                        ?>
                        <div class="person-card">
                            <img loading="lazy" alt="<?php echo esc_attr($name); ?>" class="person-image" src="<?php echo esc_url($image); ?>">
                            <?php
                                if ($display_order === 'title_first') :?>
                                    <h4 class="person-title"><?php echo esc_html($title); ?></h4>
                                    <p class="person-name"><?php echo esc_html($name); ?></p>
                                <?php else : ?>
                                    <h4 class="person-title"><?php echo esc_html($name); ?></h4>
                                    <p class="person-name"><?php echo esc_html($title); ?></p>
                                <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
