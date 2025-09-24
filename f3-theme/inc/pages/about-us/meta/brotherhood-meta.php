<?php

function brotherhood_add_meta_box() {
    add_meta_box(
        'brotherhood_banner',                    
        __('Baner Braterstwa', 'your-theme'),    
        'brotherhood_banner_meta_box',          
        'brotherhood',                           
        'side',                                   
        'default'                                
    );
}

add_action('add_meta_boxes', 'brotherhood_add_meta_box');
