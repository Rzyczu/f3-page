<?php
function document_meta_box($post) {
    $link = get_post_meta($post->ID, 'document_link', true);
    $description = get_post_meta($post->ID, 'document_description', true);
    ?>
    <p>
        <label for="document_link"><?php _e('Link/Plik', 'your-theme-textdomain'); ?></label>
        <input type="url" id="document_link" name="document_link" value="<?php echo esc_url($link); ?>" style="width: 100%;" placeholder="https://example.com">
    </p>
    <p>
        <button type="button" class="button document-upload"><?php _e('Wybierz plik', 'your-theme-textdomain'); ?></button>
        <button type="button" class="button document-remove" style="<?php echo empty($link) ? 'display: none;' : ''; ?>"><?php _e('Usuń', 'your-theme-textdomain'); ?></button>
    </p>
    <p>
        <label for="document_description"><?php _e('Opis dokumentu', 'your-theme-textdomain'); ?></label>
        <textarea id="document_description" name="document_description" style="width: 100%;"><?php echo esc_textarea($description); ?></textarea>
    </p>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var uploadButton = document.querySelector(".document-upload");
            var removeButton = document.querySelector(".document-remove");
            var inputField = document.getElementById("document_link");

            if (uploadButton) {
                uploadButton.addEventListener("click", function(event) {
                    event.preventDefault();

                    var frame = wp.media({
                        title: "<?php _e('Wybierz plik', 'your-theme-textdomain'); ?>",
                        button: {
                            text: "<?php _e('Użyj tego pliku', 'your-theme-textdomain'); ?>"
                        },
                        multiple: false
                    });

                    frame.on("select", function() {
                        var attachment = frame.state().get("selection").first().toJSON();
                        inputField.value = attachment.url;
                        removeButton.style.display = "inline-block";
                    });

                    frame.open();
                });
            }

            if (removeButton) {
                removeButton.addEventListener("click", function(event) {
                    event.preventDefault();
                    inputField.value = "";
                    removeButton.style.display = "none";
                });
            }
        });
    </script>
    <?php
}

add_action('save_post', function ($post_id) {
    if (isset($_POST['document_link'])) {
        update_post_meta($post_id, 'document_link', esc_url_raw($_POST['document_link']));
    }
    if (isset($_POST['document_description'])) {
        update_post_meta($post_id, 'document_description', sanitize_text_field($_POST['document_description']));
    }
});
