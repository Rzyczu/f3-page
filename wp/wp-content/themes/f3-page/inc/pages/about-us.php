<?php

function customize_section_intro($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('section_intro', array(
        'title' => __('Intro Section', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Ustawienie dla nagłówka
    $wp_customize->add_setting('section_intro_heading', array(
        'default' => __('O nas', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_intro_heading', array(
        'label' => __('Heading', 'your-theme-textdomain'),
        'section' => 'section_intro',
        'type' => 'text',
    ));

    // Ustawienie dla treści
    $wp_customize->add_setting('section_intro_text', array(
        'default' => __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_intro_text', array(
        'label' => __('Text', 'your-theme-textdomain'),
        'section' => 'section_intro',
        'type' => 'textarea',
    ));

    // Ustawienie dla obrazu
    $wp_customize->add_setting('section_intro_image', array(
        'default' => get_template_directory_uri() . '/assets/svg/waterfall.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'section_intro_image', array(
        'label' => __('Image', 'your-theme-textdomain'),
        'section' => 'section_intro',
    )));
}
add_action('customize_register', 'customize_section_intro');

function customize_section_teams($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('section_teams', array(
        'title' => __('Teams Section', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Nagłówek sekcji
    $wp_customize->add_setting('section_teams_heading', array(
        'default' => __('Drużyny', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_teams_heading', array(
        'label' => __('Section Heading', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'text',
    ));

    // Główna treść
    $wp_customize->add_setting('section_teams_text_main', array(
        'default' => __('Działają w grupach rówieśniczych, w jednej drużynie jest około 15-30 osób. Nazwa "Podgórska" jest nazwą historyczną/ symboliczną. Nasze drużyny działają w różnych rejonach Krakowa.', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_teams_text_main', array(
        'label' => __('Main Text', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'textarea',
    ));

    // Nagłówek "Jak działamy?"
    $wp_customize->add_setting('section_teams_subheading_how', array(
        'default' => __('Jak działamy?', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_teams_subheading_how', array(
        'label' => __('Subheading (How we work)', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'text',
    ));

    // Treść "Jak działamy?"
    $wp_customize->add_setting('section_teams_text_how', array(
        'default' => __('W strukturach ZHR działa Organizacja Harcerek oraz Organizacja Harcerzy, stąd podział drużyn ze względu na płeć.', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_teams_text_how', array(
        'label' => __('Text (How we work)', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'textarea',
    ));

    // Nagłówek "Podział wiekowy"
    $wp_customize->add_setting('section_teams_subheading_age', array(
        'default' => __('Podział wiekowy', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_teams_subheading_age', array(
        'label' => __('Subheading (Age Division)', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'text',
    ));

    // Treść "Podział wiekowy"
    $wp_customize->add_setting('section_teams_text_age', array(
        'default' => __('Kolejnym ważnym odróżnieniem drużyn jest ze względu na wiek. Są trzy główne grupy wiekowe: <br /> - Gromady zuchowe: 7–10 lat <br /> - Drużyny harcerskie: 11-15 lat <br /> - Drużyny wędrownicze: 16-18 lat', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('section_teams_text_age', array(
        'label' => __('Text (Age Division)', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'textarea',
    ));

    // Obraz
    $wp_customize->add_setting('section_teams_image', array(
        'default' => get_template_directory_uri() . '/assets/svg/flag.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'section_teams_image', array(
        'label' => __('Image', 'your-theme-textdomain'),
        'section' => 'section_teams',
    )));
}
add_action('customize_register', 'customize_section_teams');

function register_team_post_type() {
    register_post_type('team', array(
        'labels' => array(
            'name' => __('Teams', 'your-theme-textdomain'),
            'singular_name' => __('Team', 'your-theme-textdomain'),
            'add_new_item' => __('Add New Team', 'your-theme-textdomain'),
            'edit_item' => __('Edit Team', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail'),
    ));

    // Dodanie metaboxów dla opisu, płci i linków
    add_action('add_meta_boxes', function () {
        add_meta_box('team_meta', __('Team Details', 'your-theme-textdomain'), 'team_meta_box', 'team', 'normal', 'default');
    });

    add_action('save_post', function ($post_id) {
        if (array_key_exists('team_description', $_POST)) {
            update_post_meta($post_id, 'team_description', sanitize_textarea_field($_POST['team_description']));
        }
        if (array_key_exists('team_gender', $_POST)) {
            update_post_meta($post_id, 'team_gender', sanitize_text_field($_POST['team_gender']));
        }
        if (array_key_exists('team_links', $_POST)) {
            update_post_meta($post_id, 'team_links', array_map(function ($link) {
                return array(
                    'url' => esc_url_raw($link['url']),
                    'icon' => sanitize_text_field($link['icon']),
                );
            }, $_POST['team_links']));
        }
    });
}
add_action('init', 'register_team_post_type');

function team_meta_box($post) {
    $description = get_post_meta($post->ID, 'team_description', true);
    $gender = get_post_meta($post->ID, 'team_gender', true);
    $links = get_post_meta($post->ID, 'team_links', true) ?: array();
    ?>
    <p>
        <label for="team_description"><?php _e('Description', 'your-theme-textdomain'); ?></label>
        <textarea id="team_description" name="team_description" style="width: 100%;"><?php echo esc_textarea($description); ?></textarea>
    </p>
    <p>
        <label for="team_gender"><?php _e('Gender', 'your-theme-textdomain'); ?></label>
        <select id="team_gender" name="team_gender">
            <option value="male" <?php selected($gender, 'male'); ?>><?php _e('Male', 'your-theme-textdomain'); ?></option>
            <option value="female" <?php selected($gender, 'female'); ?>><?php _e('Female', 'your-theme-textdomain'); ?></option>
        </select>
    </p>
    <p>
        <label><?php _e('Links', 'your-theme-textdomain'); ?></label>
        <div id="team-links">
            <?php foreach ($links as $link) : ?>
                <div class="team-link">
                    <input type="url" name="team_links[][url]" value="<?php echo esc_url($link['url']); ?>" placeholder="URL" />
                    <input type="text" name="team_links[][icon]" value="<?php echo esc_attr($link['icon']); ?>" placeholder="Icon Class" />
                </div>
            <?php endforeach; ?>
        </div>
        <button type="button" id="add-team-link"><?php _e('Add Link', 'your-theme-textdomain'); ?></button>
    </p>
    <script>
        document.getElementById('add-team-link').addEventListener('click', function () {
            const container = document.getElementById('team-links');
            const newLink = document.createElement('div');
            newLink.classList.add('team-link');
            newLink.innerHTML = `
                <input type="url" name="team_links[][url]" placeholder="URL" />
                <input type="text" name="team_links[][icon]" placeholder="Icon Class" />
            `;
            container.appendChild(newLink);
        });
    </script>
    <?php
}

function register_board_member_post_type() {
    register_post_type('board_member', array(
        'labels' => array(
            'name' => __('Board Members', 'your-theme-textdomain'),
            'singular_name' => __('Board Member', 'your-theme-textdomain'),
            'add_new_item' => __('Add New Board Member', 'your-theme-textdomain'),
            'edit_item' => __('Edit Board Member', 'your-theme-textdomain'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail'),
    ));

    // Dodanie metaboxów dla grupy i tytułu
    add_action('add_meta_boxes', function () {
        add_meta_box('board_member_meta', __('Board Member Details', 'your-theme-textdomain'), 'board_member_meta_box', 'board_member', 'normal', 'default');
    });

    // Zapisanie danych metaboxów
    add_action('save_post', function ($post_id) {
        if (array_key_exists('person_title', $_POST)) {
            update_post_meta($post_id, 'person_title', sanitize_text_field($_POST['person_title']));
        }
        if (array_key_exists('board_group', $_POST)) {
            update_post_meta($post_id, 'board_group', sanitize_text_field($_POST['board_group']));
        }
    });
}
add_action('init', 'register_board_member_post_type');

function board_member_meta_box($post) {
    $title = get_post_meta($post->ID, 'person_title', true);
    $group = get_post_meta($post->ID, 'board_group', true);
    ?>
    <p>
        <label for="person_title"><?php _e('Title', 'your-theme-textdomain'); ?></label>
        <input type="text" id="person_title" name="person_title" value="<?php echo esc_attr($title); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="board_group"><?php _e('Group', 'your-theme-textdomain'); ?></label>
        <select id="board_group" name="board_group" style="width: 100%;">
            <option value="personnel" <?php selected($group, 'personnel'); ?>><?php _e('Kadra', 'your-theme-textdomain'); ?></option>
            <option value="leaders" <?php selected($group, 'leaders'); ?>><?php _e('Drużynowi', 'your-theme-textdomain'); ?></option>
            <option value="instructors" <?php selected($group, 'instructors'); ?>><?php _e('Instruktorzy', 'your-theme-textdomain'); ?></option>
        </select>
    </p>
    <?php
}


function customize_section_brotherhood($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('section_brotherhood', array(
        'title' => __('Brotherhood Section', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Nagłówek sekcji
    $wp_customize->add_setting('section_brotherhood_heading', array(
        'default' => __('Bractwo sztandarowe', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_brotherhood_heading', array(
        'label' => __('Section Heading', 'your-theme-textdomain'),
        'section' => 'section_brotherhood',
        'type' => 'text',
    ));

    // Główna treść sekcji
    $wp_customize->add_setting('section_brotherhood_text', array(
        'default' => __('Ścisłą Kadrę Szczepu stanowi Szczepowy, Kwatermistrz oraz Viceszczepowi...', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('section_brotherhood_text', array(
        'label' => __('Section Text', 'your-theme-textdomain'),
        'section' => 'section_brotherhood',
        'type' => 'textarea',
    ));

    // Dane dla każdego sztandaru
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("brotherhood_photo_$i", array(
            'default' => get_template_directory_uri() . "/assets/news-$i.jpg",
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "brotherhood_photo_$i", array(
            'label' => __("Banner $i Photo", 'your-theme-textdomain'),
            'section' => 'section_brotherhood',
        )));

        $wp_customize->add_setting("brotherhood_name_$i", array(
            'default' => __("Sztandar $i", 'your-theme-textdomain'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("brotherhood_name_$i", array(
            'label' => __("Banner $i Name", 'your-theme-textdomain'),
            'section' => 'section_brotherhood',
            'type' => 'text',
        ));

        $wp_customize->add_setting("brotherhood_content_$i", array(
            'default' => __("Treść dla sztandaru $i", 'your-theme-textdomain'),
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("brotherhood_content_$i", array(
            'label' => __("Banner $i Content", 'your-theme-textdomain'),
            'section' => 'section_brotherhood',
            'type' => 'textarea',
        ));
    }
}
add_action('customize_register', 'customize_section_brotherhood');

function customize_section_history($wp_customize) {
    // Sekcja Customizera
    $wp_customize->add_section('section_history', array(
        'title' => __('History Section', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Nagłówek sekcji
    $wp_customize->add_setting('section_history_heading', array(
        'default' => __('Nasza historia', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_history_heading', array(
        'label' => __('Section Heading', 'your-theme-textdomain'),
        'section' => 'section_history',
        'type' => 'text',
    ));

    // Główna treść sekcji
    $wp_customize->add_setting('section_history_text', array(
        'default' => __('Działają w grupach rówieśniczych, w jednej drużynie jest około 15-30 osób...', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('section_history_text', array(
        'label' => __('Section Text', 'your-theme-textdomain'),
        'section' => 'section_history',
        'type' => 'textarea',
    ));

    // Obraz sekcji
    $wp_customize->add_setting('section_history_image', array(
        'default' => get_template_directory_uri() . '/assets/svg/castle.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'section_history_image', array(
        'label' => __('Section Image', 'your-theme-textdomain'),
        'section' => 'section_history',
    )));
}
add_action('customize_register', 'customize_section_history');
