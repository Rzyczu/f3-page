<?php

function create_default_pages() {
    // Lista stron do utworzenia
    $pages = [
        'index' => [
            'title' => 'Home',
            'content' => 'Welcome to our website!',
            'template' => '',
        ],
        'about-us' => [
            'title' => 'About Us',
            'content' => 'This is the About Us page.',
            'template' => 'about-us.php',
        ],
        'join-us' => [
            'title' => 'Join Us',
            'content' => 'This is the Join Us page.',
            'template' => 'join-us.php',
        ],
        'support-us' => [
            'title' => 'Support Us',
            'content' => 'This is the Support Us page.',
            'template' => 'support-us.php',
        ],
        'contact' => [
            'title' => 'Contact',
            'content' => 'This is the Contact page.',
            'template' => 'contact.php',
        ],
        'our-creativity' => [
            'title' => 'Our Creativity',
            'content' => 'This is the Our Creativity page.',
            'template' => 'our-creativity.php',
        ],
        'privacy-policy' => [
            'title' => 'Privacy Policy',
            'content' => 'This is the Our Privacy Policy page.',
            'template' => 'privacy-policy.php', 
        ],
        'archive_news' => [
            'title' => 'Archive News',
            'content' => 'This is the Archive News page',
            'template' => 'archive-news.php', 
        ],
        'history' => [
            'title' => 'History',
            'content' => 'This is the history page.',
            'template' => 'history.php',
        ],
        ];

    foreach ($pages as $slug => $page) {
        // Sprawdź, czy strona już istnieje
        if (!get_page_by_path($slug)) {
            // Utwórz stronę
            $page_id = wp_insert_post([
                'post_title' => $page['title'],
                'post_name' => $slug,
                'post_content' => $page['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
            ]);

            // Przypisz szablon, jeśli podano
            if (!empty($page['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page['template']);
            }
        }
    }
}
add_action('after_switch_theme', 'create_default_pages');
