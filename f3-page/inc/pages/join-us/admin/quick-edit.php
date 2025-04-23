<?php
// Pole w interfejsie szybkiej edycji
add_action('quick_edit_custom_box', function($column_name, $post_type) {
    if ($column_name !== 'document_order' || $post_type !== 'document') return;
    ?>
    <fieldset class="inline-edit-col-right">
        <div class="inline-edit-col">
            <label class="alignleft">
                <span class="title"><?php _e('Kolejność', 'your-theme-textdomain'); ?></span>
                <span class="input-text-wrap">
                    <input type="number" name="document_order" class="document_order" value="" style="width: 50px;" />
                </span>
            </label>
        </div>
    </fieldset>
    <?php
}, 10, 2);

add_action('save_post_document', function ($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['document_order'])) {
        update_post_meta($post_id, 'document_order', intval($_POST['document_order']));
    }
});
