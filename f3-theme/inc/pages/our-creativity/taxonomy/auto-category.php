<?php

function auto_create_resource_group_category($post_id, $post, $update) {
    if ($post->post_type !== 'resource_group') {
        return;
    }
    
    $term = get_term_by('name', $post->post_title, 'resource_group_category');
    if (!$term) {
        wp_insert_term($post->post_title, 'resource_group_category');
    }
}
add_action('save_post', 'auto_create_resource_group_category', 10, 3);
