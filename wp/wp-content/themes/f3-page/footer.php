<footer class="text-white bg-primary">
    <div class="container flex flex-col items-center justify-between py-4 mx-auto font-medium text-center sm:flex-row">
        <div class="flex items-center gap-8">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/logo.svg'); ?>" 
                 class="h-8 svg-color-white" 
                 alt="<?php esc_attr_e('Logo', 'your-theme-textdomain'); ?>" />
            <p>
                <?php echo esc_html(get_theme_mod('footer_text', __('&copy; Szczep Fioletowej Trójki', 'your-theme-textdomain'))); ?>
            </p>
        </div>
        <div class="flex items-center gap-16">
            <?php
            // Pobieranie linków z CPT
            $footer_links = get_posts(array(
                'post_type' => 'footer_link',
                'posts_per_page' => -1,
            ));

            if (!empty($footer_links)) :
                foreach ($footer_links as $link) :
                    $url = get_post_meta($link->ID, 'footer_link_url', true) ?: '#';
                    $target = get_post_meta($link->ID, 'footer_link_target', true) ?: '_self';
                    ?>
                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>">
                        <?php echo esc_html(get_the_title($link->ID)); ?>
                    </a>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
