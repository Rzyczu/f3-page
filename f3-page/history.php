<?php
/**
 * Template Name: History
 */
get_header();
?>

<main class="history-page">
    <div class="container py-24 mx-auto text-primary">
    <div class="mb-6">
        <button onclick="window.history.back();" class="flex items-center text-primary hover:text-primary-light">
            <i class="mr-2 fa-solid fa-arrow-turn-left"></i> 
            <span class="px-4"> Powrót </span>
        </button>
    </div>
    
        <h1 class="mb-8 text-3xl font-bold"><?php echo esc_html(get_theme_mod('history_page_heading', __('Nasza Historia', 'your-theme-textdomain'))); ?></h1>
         <!-- <p class="mb-12 text-lg text-gray-700"><?php echo esc_html(get_theme_mod('history_page_description', __('Tutaj znajdziesz naszą historię oraz kluczowe wydarzenia.', 'your-theme-textdomain'))); ?></p> -->

        <?php
        // Pobranie wpisów historycznych, sortowanie po dacie
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type'      => 'history_entry',
            'posts_per_page' => 6,
            'paged'          => $paged,
            'meta_key'       => '_history_entry_date_sortable',
            'orderby'        => 'meta_value',
            'order'          => 'DESC',
            'meta_query'     => array(
                array(
                    'key'     => '_history_entry_date_sortable',
                    'compare' => 'EXISTS',
                ),
            ),
        );
        
        $history_query = new WP_Query($args);

        if ($history_query->have_posts()) :
            while ($history_query->have_posts()) :
                $history_query->the_post();
                $history_date = get_post_meta(get_the_ID(), '_history_entry_date', true);
                ?>
                <article class="mb-12">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="mb-4">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" class="w-full h-auto rounded-lg" alt="<?php the_title(); ?>">
                        </div>
                    <?php endif; ?>

                    <h2 class="mb-2 text-2xl font-semibold"><?php the_title(); ?></h2>

                    <?php if (!empty($history_date)) : ?>
                        <p class="mb-4 text-sm text-gray-600">
                            <?php echo esc_html($history_date); ?>
                        </p>
                    <?php endif; ?>

                    <div class="text-lg">
                        <?php the_content(); ?>
                    </div>
                    <hr class="my-8 border-gray-300">
                </article>
                <?php
            endwhile;

            // Paginacja
            echo '<div class="flex items-center justify-center gap-4 mt-12">';
            echo get_previous_posts_link('<button class="p-2 bg-gray-200 rounded-full hover:bg-primary hover:text-white">&laquo;</button>', $history_query->max_num_pages);
            echo '<span class="font-semibold text-gray-600">' . $paged . ' / ' . $history_query->max_num_pages . '</span>';
            echo get_next_posts_link('<button class="p-2 bg-gray-200 rounded-full hover:bg-primary hover:text-white">&raquo;</button>', $history_query->max_num_pages);
            echo '</div>';
            
            wp_reset_postdata();
        else :
            ?>
            <p class="text-gray-500"><?php _e('Nie znaleziono wpisów historii.', 'your-theme-textdomain'); ?></p>
    <?php endif; ?>
    </div>
</main>

<?php
get_footer();
?>
