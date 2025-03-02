<?php
if (class_exists('WP_Customize_Control')) {
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

function customize_join_us_intro_section($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('join_us_intro_section', array(
        'title' => __('Intro', 'your-theme-textdomain'),
        'priority' => 10,
    ));

    // Nagłówek
    $wp_customize->add_setting('join_us_intro_heading', array(
        'default' => __('Dołącz do nas', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('join_us_intro_heading', array(
        'label' => __('Heading', 'your-theme-textdomain'),
        'section' => 'join_us_intro_section',
        'type' => 'text',
    ));

    // Treść
    $wp_customize->add_setting('join_us_intro_text', array(
        'default' => __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('join_us_intro_text', array(
        'label' => __('Text', 'your-theme-textdomain'),
        'section' => 'join_us_intro_section',
        'type' => 'textarea',
    ));

    // Obraz
    $wp_customize->add_setting('join_us_intro_image', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/lake.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'join_us_intro_image', array(
        'label' => __('Image', 'your-theme-textdomain'),
        'section' => 'join_us_intro_section',
    )));
}
add_action('customize_register', 'customize_join_us_intro_section');

function customize_join_steps_section($wp_customize) {
    // Dodajemy główny panel "Join Steps"
    $wp_customize->add_panel('join_steps_panel', array(
        'title' => __('Kroki', 'your-theme-textdomain'),
        'priority' => 45,
    ));

    for ($i = 1; $i <= 6; $i++) {
        // Tworzymy sekcję dla każdego kroku
        $wp_customize->add_section("join_step_section_$i", array(
            'title'    => __("Krok $i", 'your-theme-textdomain'),
            'panel'    => 'join_steps_panel',
            'priority' => $i,
        ));

        // Nagłówek kroku
        $wp_customize->add_setting("join_step_title_$i", array(
            'default' => __("Krok $i", 'your-theme-textdomain'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("join_step_title_$i", array(
            'label' => __("Step $i Heading", 'your-theme-textdomain'),
            'section' => "join_step_section_$i",
            'type' => 'text',
        ));

        // Treść kroku (TinyMCE)
        $wp_customize->add_setting("join_step_content_$i", array(
            'default' => __("Step $i Text", 'your-theme-textdomain'),
            'sanitize_callback' => 'wp_kses_post',
        ));
        $wp_customize->add_control(new WP_Customize_TinyMCE_Control($wp_customize, "join_step_content_$i", array(
            'label' => __("Step $i Text", 'your-theme-textdomain'),
            'section' => "join_step_section_$i",
        )));

        // Obraz dla kroku
        $wp_customize->add_setting("join_step_image_$i", array(
            'default' => get_template_directory_uri() . "/assets/images/svg/icon-$i.svg",
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "join_step_image_$i", array(
            'label' => __("Step $i Image", 'your-theme-textdomain'),
            'section' => "join_step_section_$i",
        )));
    }
}
add_action('customize_register', 'customize_join_steps_section');

function customize_join_info_section($wp_customize) {
    $wp_customize->add_section('join_info_section', array(
        'title' => __('Krok po kroku', 'your-theme-textdomain'),
        'priority' => 20,
    ));

    // Nagłówek sekcji
    $wp_customize->add_setting('join_info_heading', array(
        'default' => __('Krok po kroku', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('join_info_heading', array(
        'label' => __('Heading', 'your-theme-textdomain'),
        'section' => 'join_info_section',
        'type' => 'text',
    ));

    // Opis sekcji
    $wp_customize->add_setting('join_steps_text', array(
        'default' => __('Znajdziesz tutaj wszystkie kroki potrzebne, aby dołączyć do nas.', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('join_steps_text', array(
        'label' => __('Text', 'your-theme-textdomain'),
        'section' => 'join_info_section',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'customize_join_info_section');

function register_document_post_type() {
    register_post_type('document', array(
        'labels' => array(
            'name' => __('Documenty - Dołącz do nas', 'your-theme-textdomain'),
            'singular_name' => __('Document', 'your-theme-textdomain'),
            'add_new_item' => __('Add New Document', 'your-theme-textdomain'),
            'edit_item' => __('Edit Document', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title'),
        'menu_icon'    => 'dashicons-media-document',
        'menu_position'=> 19,
    ));

    // Dodanie metaboxów dla linku i opisu dokumentu
    add_action('add_meta_boxes', function () {
        add_meta_box('document_meta', __('Document Details', 'your-theme-textdomain'), 'document_meta_box', 'document', 'normal', 'default');
    });

    // Zapis metaboxów
    add_action('save_post', function ($post_id) {
        if (array_key_exists('document_link', $_POST)) {
            update_post_meta($post_id, 'document_link', esc_url_raw($_POST['document_link']));
        }
        if (array_key_exists('document_description', $_POST)) {
            update_post_meta($post_id, 'document_description', sanitize_text_field($_POST['document_description']));
        }
    });
}
add_action('init', 'register_document_post_type');

function document_meta_box($post) {
    $link = get_post_meta($post->ID, 'document_link', true);
    $description = get_post_meta($post->ID, 'document_description', true);
    ?>
    <p>
        <label for="document_link"><?php _e('Document Link', 'your-theme-textdomain'); ?></label>
        <input type="url" id="document_link" name="document_link" value="<?php echo esc_url($link); ?>" style="width: 100%;" placeholder="https://example.com">
    </p>
    <p>
        <label for="document_description"><?php _e('Document Description', 'your-theme-textdomain'); ?></label>
        <textarea id="document_description" name="document_description" style="width: 100%;"><?php echo esc_textarea($description); ?></textarea>
    </p>
    <?php
}

function customize_docs_section($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('docs_section', array(
        'title' => __('Dokumenty', 'your-theme-textdomain'),
        'priority' => 40,
    ));

    // Nagłówek sekcji
    $wp_customize->add_setting('docs_section_heading', array(
        'default' => __('Dokumenty', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('docs_section_heading', array(
        'label' => __('Heading', 'your-theme-textdomain'),
        'section' => 'docs_section',
        'type' => 'text',
    ));

    // Treść sekcji
    $wp_customize->add_setting('docs_section_text', array(
        'default' => __('Czasem gotujemy się z nadmiaru dokumentów, ale to one umożliwiają nam organizacje i dbanie o bezpieczeństwo', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('docs_section_text', array(
        'label' => __('Text', 'your-theme-textdomain'),
        'section' => 'docs_section',
        'type' => 'textarea',
    ));

    // Obraz sekcji
    $wp_customize->add_setting('docs_section_image', array(
        'default' => get_template_directory_uri() . '/assets/images/svg/tea-cup.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'docs_section_image', array(
        'label' => __('Image', 'your-theme-textdomain'),
        'section' => 'docs_section',
    )));
}
add_action('customize_register', 'customize_docs_section');

function customize_join_us_panel($wp_customize) {
    // Tworzenie głównego panelu "Dołącz do nas"
    $wp_customize->add_panel('panel_join_us', array(
        'title'       => __('Dołącz do nas', 'your-theme-textdomain'),
        'priority'    => 35,
        'description' => __('Zarządzaj sekcjami strony Dołącz do nas.', 'your-theme-textdomain'),
    ));

    // Tworzenie podpanelu "Join Steps" wewnątrz "Dołącz do nas"
    $wp_customize->add_panel('panel_join_steps', array(
        'title'       => __('Kroki', 'your-theme-textdomain'),
        'priority'    => 38,
        'description' => __('Zarządzaj krokami dołączenia.', 'your-theme-textdomain'),
        'panel'       => 'panel_join_us',
    ));

    // Przypisanie istniejących sekcji do panelu "Dołącz do nas"
    if ($wp_customize->get_section('join_us_intro_section')) {
        $wp_customize->get_section('join_us_intro_section')->panel = 'panel_join_us';
    }
    if ($wp_customize->get_section('join_info_section')) {
        $wp_customize->get_section('join_info_section')->panel = 'panel_join_us';
    }
    if ($wp_customize->get_section('docs_section')) {
        $wp_customize->get_section('docs_section')->panel = 'panel_join_us';
    }

    if ($wp_customize->get_section('docs_section')) {
        $wp_customize->get_section('docs_section')->panel = 'panel_join_us';
    }

    // Przypisanie każdego kroku "Join Steps" do podpanelu "Join Steps"
    for ($i = 1; $i <= 6; $i++) {
        if ($wp_customize->get_section("join_step_section_$i")) {
            $wp_customize->get_section("join_step_section_$i")->panel = 'panel_join_steps';
        }
    }
}
add_action('customize_register', 'customize_join_us_panel');
