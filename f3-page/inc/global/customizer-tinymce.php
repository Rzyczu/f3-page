<?php

add_action('customize_register', function() {
    if (!class_exists('WP_Customize_TinyMCE_Control')) {
        class WP_Customize_TinyMCE_Control extends WP_Customize_Control {
            public $type = 'tinymce';
    
            public function render_content() {
                $textarea_id = 'tinymce_' . $this->id;
                ?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                    <textarea id="<?php echo esc_attr($textarea_id); ?>" class="customize-textarea"><?php echo esc_textarea($this->value()); ?></textarea>
                </label>
                <script>
                    jQuery(document).ready(function($) {
                        tinymce.remove('#<?php echo esc_attr($textarea_id); ?>');
                        tinymce.init({
                            selector: '#<?php echo esc_attr($textarea_id); ?>',
                            menubar: false,
                            toolbar: 'bold italic underline | bullist numlist | link',
                            plugins: 'lists link',
                            forced_root_block: '', // Utrzymuje akapit jako domyślny blok
                            valid_elements: '*[*]', // Zezwala na wszystkie atrybuty w tagach
                            extended_valid_elements: 'p[class],span[class]',
                            setup: function(editor) {
                                editor.on('change', function() {
                                    editor.save();
                                    $('#<?php echo esc_attr($textarea_id); ?>').trigger('change');
                                });
                            }
                        });
    
                        $('#<?php echo esc_attr($textarea_id); ?>').on('change', function() {
                            var content = tinymce.get('<?php echo esc_attr($textarea_id); ?>').getContent();
                            wp.customize('<?php echo esc_attr($this->id); ?>', function(value) {
                                value.set(content);
                            });
                        });
                    });
                </script>
                <?php
            }
        }
    }
});
