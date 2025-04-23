<?php

function enable_theme_supports() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'enable_theme_supports');
