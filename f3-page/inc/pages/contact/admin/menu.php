<?php
add_filter('post_row_actions', function ($actions, $post) {
    if ($post->post_type === 'building') {
        echo '<div id="inline_' . $post->ID . '" class="hidden">';
        echo '<span class="menu_order_inline">' . esc_html(get_post_field('menu_order', $post->ID)) . '</span>';
        echo '</div>';
    }
    return $actions;
}, 10, 2);