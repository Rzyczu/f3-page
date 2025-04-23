<?php
add_filter('post_row_actions', function ($actions, $post) {
    if ($post->post_type === 'document') {
        echo '<div id="inline_' . $post->ID . '" class="hidden">';
        echo '<span class="document_order_inline">' . esc_html(get_post_meta($post->ID, 'document_order', true)) . '</span>';
        echo '</div>';
    }
    return $actions;
}, 10, 2);

add_action('admin_footer-edit.php', function () {
    global $post_type;
    if ($post_type !== 'document') return;
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            jQuery('.editinline').on('click', function () {
                var post_id = jQuery(this).closest('tr').attr('id').replace("post-", "");
                var order = jQuery('#inline_' + post_id + ' .document_order_inline').text();
                jQuery('input[name="document_order"]').val(order);
            });
        });
    </script>
    <?php
});
