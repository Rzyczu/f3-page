<?php

function opinion_person_meta_box($post) {
    $value = get_post_meta($post->ID, 'opinion_person', true);
    ?>
    <label for="opinion_person"><?php _e('Imię', 'your-theme-textdomain'); ?></label>
    <input type="text" id="opinion_person" name="opinion_person" value="<?php echo esc_attr($value); ?>" style="width: 100%;">
    <?php
}

function opinion_save_post($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
    if (isset($_POST['opinion_person'])) {
         $person = sanitize_text_field($_POST['opinion_person']);
         update_post_meta($post_id, 'opinion_person', $person);

         $post_data = array(
             'ID'         => $post_id,
             'post_title' => $person,
         );
         remove_action('save_post', 'opinion_save_post');
         wp_update_post($post_data);
         add_action('save_post', 'opinion_save_post');
    }
}
add_action('save_post', 'opinion_save_post');

function opinion_add_meta_boxes() {
    add_meta_box(
        'opinion_person_meta',
        __('Autor', 'your-theme-textdomain'),
        'opinion_person_meta_box',
        'opinion',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'opinion_add_meta_boxes');
