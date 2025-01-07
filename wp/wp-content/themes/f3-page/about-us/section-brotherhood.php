<section class="relative my-24">
    <div class="md:w-1/3 max-sm:w-3/4 2xl:w-2/5 horizontal-line"></div>
    <div class="container mx-auto bg-white text-primary">
        <div class="pt-6 pb-20 md:w-3/4">
            <h2 class="mb-4">
                <?php echo esc_html(get_theme_mod('section_brotherhood_heading', __('Bractwo sztandarowe', 'your-theme-textdomain'))); ?>
            </h2>
            <p>
                <?php echo esc_html(get_theme_mod('section_brotherhood_text', __('Ścisłą Kadrę Szczepu stanowi Szczepowy, Kwatermistrz oraz Viceszczepowi. W składzie rady są wszyscy drużynowi oraz instruktorzy którzy nie mają funkcji w szczepie.', 'your-theme-textdomain'))); ?>
            </p>
        </div>
        <div class="brotherhood">
            <div class="brotherhood-photos">
                <?php
                $brotherhood_standards = array(
                    array(
                        'name' => __('III sztandar 2001', 'your-theme-textdomain'),
                        'image' => get_theme_mod('brotherhood_photo_1', get_template_directory_uri() . '/assets/news-1.jpg'),
                        'content' => __('Nam magna ante, efficitur eu lorem eget, viverra volutpat libero...', 'your-theme-textdomain'),
                    ),
                    array(
                        'name' => __('II sztandar 1967', 'your-theme-textdomain'),
                        'image' => get_theme_mod('brotherhood_photo_2', get_template_directory_uri() . '/assets/news-2.jpg'),
                        'content' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit...', 'your-theme-textdomain'),
                    ),
                    array(
                        'name' => __('I sztandar 1931', 'your-theme-textdomain'),
                        'image' => get_theme_mod('brotherhood_photo_3', get_template_directory_uri() . '/assets/news-3.jpg'),
                        'content' => __('Fusce vitae ligula sed orci lacinia viverra id et nunc...', 'your-theme-textdomain'),
                    ),
                );

                foreach ($brotherhood_standards as $index => $standard) :
                    $id = $index + 1;
                    ?>
                    <img alt="<?php echo esc_attr($standard['name']); ?>" 
                         class="brotherhood-photo <?php echo $id === 1 ? 'active' : ''; ?>" 
                         src="<?php echo esc_url($standard['image']); ?>" 
                         data-id="brotherhood-<?php echo esc_attr($id); ?>">
                <?php endforeach; ?>
            </div>
            <div class="brotherhood-menu">
                <?php foreach ($brotherhood_standards as $index => $standard) :
                    $id = $index + 1;
                    ?>
                    <h3 class="brotherhood-group-name <?php echo $id === 1 ? 'active' : ''; ?>" id="brotherhood-<?php echo esc_attr($id); ?>">
                        <?php echo esc_html($standard['name']); ?>
                    </h3>
                <?php endforeach; ?>
            </div>
            <?php foreach ($brotherhood_standards as $index => $standard) :
                $id = $index + 1;
                ?>
                <div class="brotherhood-content <?php echo $id === 1 ? 'active' : ''; ?>" data-id="brotherhood-<?php echo esc_attr($id); ?>">
                    <p><?php echo esc_html($standard['content']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
