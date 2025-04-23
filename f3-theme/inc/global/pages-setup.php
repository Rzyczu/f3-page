<?php

function create_privacy_policy_page() {
    $page_title = 'Polityka Prywatności';
    $page_content = 'Tutaj znajdzie się treść polityki prywatności.';
    $page_slug = 'polityka-prywatnosci';

    $page_check = get_page_by_path($page_slug);
    if (!$page_check) {
        $page_id = wp_insert_post([
            'post_title'     => $page_title,
            'post_content'   => $page_content,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'post_name'      => $page_slug,
            'post_author'    => 1,
            'comment_status' => 'closed',
        ]);
    }
}
add_action('after_setup_theme', 'create_privacy_policy_page');
