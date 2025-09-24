<?php

function board_member_meta_box($post) {
    $title = get_post_meta($post->ID, 'person_title', true);
    $group = get_post_meta($post->ID, 'board_group', true);
    $email = get_post_meta($post->ID, 'person_email', true);
    $phone = get_post_meta($post->ID, 'person_phone', true);

    ?>
    <p>
        <label for="person_title"><?php _e('Funkcja', 'your-theme-textdomain'); ?></label>
        <input type="text" id="person_title" name="person_title" value="<?php echo esc_attr($title); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="board_group"><?php _e('Grupa', 'your-theme-textdomain'); ?></label>
        <select id="board_group" name="board_group" style="width: 100%;">
            <option value="personnel" <?php selected($group, 'personnel'); ?>><?php _e('Kadra', 'your-theme-textdomain'); ?></option>
            <option value="leaders" <?php selected($group, 'leaders'); ?>><?php _e('Drużynowi', 'your-theme-textdomain'); ?></option>
            <option value="instructors" <?php selected($group, 'instructors'); ?>><?php _e('Instruktorzy', 'your-theme-textdomain'); ?></option>
        </select>
    </p>
    <p>
        <label for="person_email"><?php _e('Email', 'your-theme-textdomain'); ?></label>
        <input type="email" id="person_email" name="person_email" value="<?php echo esc_attr($email); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="person_phone"><?php _e('Telefon', 'your-theme-textdomain'); ?></label>
        <input type="text" id="person_phone" name="person_phone" value="<?php echo esc_attr($phone); ?>" style="width: 100%;">
    </p>
    <?php
}