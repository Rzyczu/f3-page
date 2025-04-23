<?php

if (class_exists('WP_Customize_Control')) {
    class Custom_HTML_Editor_Control extends WP_Customize_Control {
        public $type = 'html_editor';
        public $editor_height = 250;

        public function render_content() {
            $textarea_id = 'editor-' . esc_attr($this->id);

            $editor_settings = array(
                'textarea_name' => $this->id,
                'textarea_rows' => 10,
                'editor_height' => $this->editor_height,
                'media_buttons' => false,
                'teeny' => false,
                'tinymce' => false, // WYŁĄCZAMY edytor wizualny
                'quicktags' => true, // Włączamy edytor tekstowy (HTML + przyciski)
            );

            if (!empty($this->label)) {
                echo '<label><span class="customize-control-title">' . esc_html($this->label) . '</span></label>';
            }
            if (!empty($this->description)) {
                echo '<span class="description customize-control-description">' . esc_html($this->description) . '</span>';
            }

            $wrapper_id = 'html-editor-wrapper-' . esc_attr($this->id);
            $textarea_id = 'editor-' . esc_attr($this->id);
            
            echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-xXx..." crossorigin="anonymous" referrerpolicy="no-referrer" />';

            echo '<div id="' . $wrapper_id . '" class="html-editor-wrapper" style="margin-bottom:15px;">';
            echo '<div class="editor-toolbar" style="margin-bottom:10px; display:flex; flex-wrap:wrap; gap:6px;">';
            echo '<button type="button" class="html-insert-btn" data-tag="h1" title="Header 1">H1</button>';
            echo '<button type="button" class="html-insert-btn" data-tag="h2" title="Header 2">H2</button>';
            echo '<button type="button" class="html-insert-btn" data-tag="h3" title="Header 3">H3</i></button>';
            echo '<button type="button" class="html-insert-btn" data-tag="h4" title="Header 4">H4</i></button>';
            echo '</div>';
            echo '<div class="editor-toolbar" style="margin-bottom:10px; display:flex; flex-wrap:wrap; gap:6px;">';
            echo '<button type="button" class="html-insert-btn" data-tag="strong" title="Pogrubienie"><i class="fa-solid fa-xl fa-bold"></i></button>';
            echo '<button type="button" class="html-insert-btn" data-tag="em" title="Kursywa"><i class="fa-solid fa-xl fa-italic"></i></button>';
            echo '<button type="button" class="html-insert-btn" data-tag="a" data-attrs=\'href="https://example.com" target="_blank"\' title="Link zewnętrzny"><i class="fa-solid fa-xl fa-link"></i></button>';
            echo '<button type="button" class="html-insert-btn" data-tag="br" data-selfclosing="1" title="Nowa linia (br)"><i class="fa-solid fa-xl fa-arrow-turn-down"></i></button>';
            echo '</div>';
            echo '<div class="editor-toolbar" style="margin-bottom:10px; display:flex; flex-wrap:wrap; gap:6px;">';
            echo '<button type="button" class="html-insert-btn" data-tag="ol" title="Lista numeryczna"><i class="fa-solid fa-xl fa-list-ol"></i></button>';
            echo '<button type="button" class="html-insert-btn" data-tag="ul" title="Lista wypunktowana"><i class="fa-solid fa-xl fa-list-ul"></i></button>';
            echo '<button type="button" class="html-insert-btn" data-tag="li" title="Element listy"><i class="fa-solid fa-circle-dot"></i></button>';
            echo '</div>';
            
            ob_start();
            
            wp_editor($this->value(), $textarea_id, $editor_settings);
            $editor_contents = ob_get_clean();

            echo '<div class="custom-html-editor-control">';
            echo $editor_contents;
            echo '</div>';
            echo '</div>';

            ?>
            <script type="text/javascript">
                (function($){
                    wp.customize('<?php echo esc_js($this->id); ?>', function(value) {
                        value.bind(function(newval) {
                            const textarea = document.getElementById('<?php echo esc_js($textarea_id); ?>');
                            if (textarea && textarea.value !== newval) {
                                textarea.value = newval;
                            }
                        });

                        $(document).on('change input', '#' + '<?php echo esc_js($textarea_id); ?>', function() {
                            value.set($(this).val());
                        });
                    });
                })(jQuery);
            </script>

            <script type="text/javascript">
            (function($){
                const textareaId = '<?php echo esc_js($textarea_id); ?>';
                const wrapperId = '#<?php echo esc_js($wrapper_id); ?>';

                wp.customize('<?php echo esc_js($this->id); ?>', function(value) {
                    value.bind(function(newval) {
                        const textarea = document.getElementById(textareaId);
                        if (textarea && textarea.value !== newval) {
                            textarea.value = newval;
                        }
                    });

                    $(document).on('change input', '#' + textareaId, function() {
                        value.set($(this).val());
                    });
                });

                $(document).on('click', wrapperId + ' .html-insert-btn', function() {
                    const tag = $(this).data('tag');
                    const attrs = $(this).data('attrs') || '';
                    const selfClosing = $(this).data('selfclosing') == 1;
                    const textarea = document.getElementById(textareaId);

                    if (!textarea) return;

                    const start = textarea.selectionStart;
                    const end = textarea.selectionEnd;
                    const selected = textarea.value.substring(start, end);

                    let insertText = '';
                    if (selfClosing) {
                        insertText = `<${tag} />`;
                    } else if (tag === 'a' && !selected) {
                        insertText = `<a ${attrs}>Tekst linku</a>`;
                    } else {
                        insertText = `<${tag}${attrs ? ' ' + attrs : ''}>${selected || 'Tekst'}</${tag}>`;
                    }

                    const before = textarea.value.substring(0, start);
                    const after = textarea.value.substring(end);
                    textarea.value = before + insertText + after;

                    $(textarea).trigger('input');
                    textarea.focus();
                    textarea.selectionStart = textarea.selectionEnd = before.length + insertText.length;
                });
            })(jQuery);
            </script>

            <?php
        }
    }
}
