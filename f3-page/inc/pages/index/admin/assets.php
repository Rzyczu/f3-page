<?php

function load_datepicker_assets($hook) {
    global $post;
    if ($post && $post->post_type === 'news') {
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_style('jquery-ui-css', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css');
    }
}
add_action('admin_enqueue_scripts', 'load_datepicker_assets');