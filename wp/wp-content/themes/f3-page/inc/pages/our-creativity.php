<?php

function customize_our_creativity_intro_section($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('our_creativity_intro_section', array(
        'title' => __('Our Creativity Intro Section', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Nagłówek
    $wp_customize->add_setting('our_creativity_intro_heading', array(
        'default' => __('Nasza twórczość', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('our_creativity_intro_heading', array(
        'label' => __('Section Heading', 'your-theme-textdomain'),
        'section' => 'our_creativity_intro_section',
        'type' => 'text',
    ));

    // Treść
    $wp_customize->add_setting('our_creativity_intro_text', array(
        'default' => __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('our_creativity_intro_text', array(
        'label' => __('Section Text', 'your-theme-textdomain'),
        'section' => 'our_creativity_intro_section',
        'type' => 'textarea',
    ));

    // Obraz
    $wp_customize->add_setting('our_creativity_intro_image', array(
        'default' => get_template_directory_uri() . '/assets/svg/tents.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'our_creativity_intro_image', array(
        'label' => __('Section Image', 'your-theme-textdomain'),
        'section' => 'our_creativity_intro_section',
    )));
}
add_action('customize_register', 'customize_our_creativity_intro_section');

function customize_our_creativity_blank_section($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('our_creativity_blank_section', array(
        'title' => __('Our Creativity Blank Section', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Obraz sekcji
    $wp_customize->add_setting('our_creativity_blank_image', array(
        'default' => get_template_directory_uri() . '/assets/svg/kitchen.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'our_creativity_blank_image', array(
        'label' => __('Section Image', 'your-theme-textdomain'),
        'section' => 'our_creativity_blank_section',
    )));
}
add_action('customize_register', 'customize_our_creativity_blank_section');

function register_resource_group_post_type() {
    register_post_type('resource_group', array(
        'labels' => array(
            'name' => __('Resource Groups', 'your-theme-textdomain'),
            'singular_name' => __('Resource Group', 'your-theme-textdomain'),
            'add_new_item' => __('Add New Group', 'your-theme-textdomain'),
            'edit_item' => __('Edit Group', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title'),
    ));

    // Dodanie metaboxów dla elementów grupy
    add_action('add_meta_boxes', function () {
        add_meta_box('resource_group_items_meta', __('Group Items', 'your-theme-textdomain'), 'resource_group_items_meta_box', 'resource_group', 'normal', 'default');
    });

    // Zapis metaboxów
    add_action('save_post', function ($post_id) {
        if (array_key_exists('group_items', $_POST)) {
            $items = array_map(function ($item) {
                return array(
                    'title' => sanitize_text_field($item['title']),
                    'description' => sanitize_textarea_field($item['description']),
                    'link' => esc_url_raw($item['link']),
                );
            }, $_POST['group_items']);
            update_post_meta($post_id, 'group_items', $items);
        }
    });
}
add_action('init', 'register_resource_group_post_type');

function resource_group_items_meta_box($post) {
    $items = get_post_meta($post->ID, 'group_items', true) ?: array();
    ?>
    <div id="group-items-container">
        <?php foreach ($items as $index => $item) : ?>
            <div class="group-item">
                <p>
                    <label><?php _e('Item Title', 'your-theme-textdomain'); ?></label>
                    <input type="text" name="group_items[<?php echo $index; ?>][title]" value="<?php echo esc_attr($item['title']); ?>" style="width: 100%;" />
                </p>
                <p>
                    <label><?php _e('Item Description', 'your-theme-textdomain'); ?></label>
                    <textarea name="group_items[<?php echo $index; ?>][description]" style="width: 100%;"><?php echo esc_textarea($item['description']); ?></textarea>
                </p>
                <p>
                    <label><?php _e('Item Link', 'your-theme-textdomain'); ?></label>
                    <input type="url" name="group_items[<?php echo $index; ?>][link]" value="<?php echo esc_url($item['link']); ?>" style="width: 100%;" />
                </p>
                <hr />
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" onclick="addNewItem()">+ <?php _e('Add New Item', 'your-theme-textdomain'); ?></button>
    <script>
        let itemIndex = <?php echo count($items); ?>;
        function addNewItem() {
            const container = document.getElementById('group-items-container');
            const newItem = document.createElement('div');
            newItem.className = 'group-item';
            newItem.innerHTML = `
                <p>
                    <label><?php _e('Item Title', 'your-theme-textdomain'); ?></label>
                    <input type="text" name="group_items[${itemIndex}][title]" style="width: 100%;" />
                </p>
                <p>
                    <label><?php _e('Item Description', 'your-theme-textdomain'); ?></label>
                    <textarea name="group_items[${itemIndex}][description]" style="width: 100%;"></textarea>
                </p>
                <p>
                    <label><?php _e('Item Link', 'your-theme-textdomain'); ?></label>
                    <input type="url" name="group_items[${itemIndex}][link]" style="width: 100%;" />
                </p>
                <hr />
            `;
            container.appendChild(newItem);
            itemIndex++;
        }
    </script>
    <?php
}