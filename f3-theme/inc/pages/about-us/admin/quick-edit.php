<?php

function board_member_quick_edit_fields($column_name, $post_type) {
    if ($post_type !== 'board_member' || $column_name !== 'person_order') {
        return;
    }
    ?>
    <fieldset class="inline-edit-col-right">
        <div class="inline-edit-col">
            <label class="inline-edit-group">
                <span class="title"><?php _e('Kolejność', 'your-theme-textdomain'); ?></span>
                <input type="number" name="person_order" value="" style="width: 50px;">
            </label>
        </div>
    </fieldset>
    <?php
}
add_action('quick_edit_custom_box', 'board_member_quick_edit_fields', 10, 2);

function save_board_member_quick_edit($post_id) {
    if (isset($_POST['person_order'])) {
        update_post_meta($post_id, 'person_order', intval($_POST['person_order']));
    }
}
add_action('save_post', 'save_board_member_quick_edit');