<?php

function structure_meta_box($post) {
    $url = get_post_meta($post->ID, 'structure_url', true);
    ?>
    <p>
        <label for="structure_url"><?php _e('URL', 'your-theme-textdomain'); ?></label>
        <input type="url" id="structure_url" name="structure_url" value="<?php echo esc_url($url); ?>" style="width: 100%;" placeholder="https://example.com">
    </p>
    <?php
}