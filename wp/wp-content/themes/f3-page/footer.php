<footer class="text-white bg-primary">
    <div class="container flex flex-col items-center justify-between py-4 mx-auto font-medium text-center sm:flex-row">
        <div class="flex items-center gap-8">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/svg/logo.svg'); ?>" 
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
            <a href="https://www.facebook.com/szczepf3" target="_blank" rel="noopener noreferrer">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M12 2.04c-5.5 0-9.96 4.47-9.96 9.96 0 5.24 4.04 9.57 9.27 9.96v-7.06h-2.79v-2.91h2.79v-2.18c0-2.72 1.63-4.23 4.12-4.23 1.2 0 2.45.21 2.45.21v2.67h-1.38c-1.36 0-1.78.85-1.78 1.72v2.08h3.12l-.5 2.91h-2.62v7.06c5.23-.39 9.27-4.72 9.27-9.96 0-5.49-4.47-9.96-9.96-9.96z" />
          </svg>
        </a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
