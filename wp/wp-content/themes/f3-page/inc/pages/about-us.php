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
        'default' => get_template_directory_uri() . '/assets/images/svg/waterfall.svg',
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
        'default' => get_template_directory_uri() . '/assets/images/svg/flag.svg',
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
        'menu_icon'    => 'dashicons-networking',
    ));

    // Dodanie metaboxów dla opisu, płci i linków
    add_action('add_meta_boxes', function () {
        add_meta_box('team_meta', __('Team Details', 'your-theme-textdomain'), 'team_meta_box', 'team', 'normal', 'default');
    });

    add_action('save_post', function ($post_id) {
        if (array_key_exists('team_short_name', $_POST)) {
            update_post_meta($post_id, 'team_short_name', sanitize_text_field($_POST['team_short_name']));
        }
        if (array_key_exists('team_description', $_POST)) {
            update_post_meta($post_id, 'team_description', sanitize_textarea_field($_POST['team_description']));
        }
        if (array_key_exists('team_gender', $_POST)) {
            update_post_meta($post_id, 'team_gender', sanitize_text_field($_POST['team_gender']));
        }
        if (isset($_POST['team_links']) && isset($_POST['team_links']['url']) && isset($_POST['team_links']['icon'])) {
            $urls  = $_POST['team_links']['url'];
            $icons = $_POST['team_links']['icon'];
            $links = array();
            foreach ($urls as $index => $url) {
                if (!empty($url) || !empty($icons[$index])) {
                    $links[] = array(
                        'url'  => esc_url_raw($url),
                        'icon' => sanitize_text_field($icons[$index]),
                    );
                }
            }
            update_post_meta($post_id, 'team_links', $links);
        }
    });
}
add_action('init', 'register_team_post_type');

function team_meta_box($post) {
    $short_name = get_post_meta($post->ID, 'team_short_name', true);
    $description = get_post_meta($post->ID, 'team_description', true);
    $gender = get_post_meta($post->ID, 'team_gender', true);
    $links = get_post_meta($post->ID, 'team_links', true) ?: array();
    $default_icons = array(
        'mail'      => 'fa-regular fa-envelope',
        'www'       => 'fa-regular fa-globe',
        'facebook'  => 'fa-brands fa-facebook',
        'instagram' => 'fa-brands fa-instagram',
    );
    ?>
    <p>
        <label for="team_short_name"><?php _e('Short Name', 'your-theme-textdomain'); ?></label>
        <input type="text" id="team_short_name" name="team_short_name" value="<?php echo esc_attr($short_name); ?>" style="width: 100%;" placeholder="<?php esc_attr_e('Enter short team name', 'your-theme-textdomain'); ?>">
    </p>
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
    <label>
            <?php _e('Links', 'your-theme-textdomain'); ?>
            <a href="https://fontawesome.com/search" target="_blank"><?php _e('Font Awesome Icon Class', 'your-theme-textdomain');?></a>
            </label>
        <div id="team-links">
            <?php if ( !empty($links) ) : ?>
                <?php foreach ($links as $link) : 
                    $icon_value = isset($link['icon']) ? $link['icon'] : '';
                    $icon_select = 'other';
                    foreach ($default_icons as $key => $default_icon) {
                        if ($icon_value === $default_icon) {
                            $icon_select = $key;
                            break;
                        }
                    }
                    ?>
                    <div class="team-link" style="margin-bottom:10px; display:flex; gap:5px;">
                        <input type="url" name="team_links[url][]" value="<?php echo esc_url($link['url']); ?>" placeholder="URL" style="width:30%;" />
                        <select name="team_links[icon_select][]" class="icon-select" style="width:20%;">
                            <option value="mail" <?php selected($icon_select, 'mail'); ?>><?php _e('Mail', 'your-theme-textdomain'); ?></option>
                            <option value="www" <?php selected($icon_select, 'www'); ?>><?php _e('WWW', 'your-theme-textdomain'); ?></option>
                            <option value="facebook" <?php selected($icon_select, 'facebook'); ?>><?php _e('Facebook', 'your-theme-textdomain'); ?></option>
                            <option value="instagram" <?php selected($icon_select, 'instagram'); ?>><?php _e('Instagram', 'your-theme-textdomain'); ?></option>
                            <option value="other" <?php selected($icon_select, 'other'); ?>><?php _e('Inne', 'your-theme-textdomain'); ?></option>
                        </select>
                        <input type="text" name="team_links[icon][]" value="<?php echo esc_attr($icon_value); ?>" placeholder="Icon Class" style="width:30%;" class="icon-class-input" />
                        <button type="button" class="delete-team-link" style="width:15%;"><?php _e('Delete Link', 'your-theme-textdomain'); ?></button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <button type="button" id="add-team-link"><?php _e('Add Link', 'your-theme-textdomain'); ?></button>
    </p>
    <script>
        (function(){
            const defaultIcons = {
                'mail': 'fa-regular fa-envelope',
                'www': 'fa-regular fa-globe',
                'facebook': 'fa-brands fa-facebook',
                'instagram': 'fa-brands fa-instagram',
                'other': ''
            };

            function updateIconClass(selectElem) {
                const selectedValue = selectElem.value;
                const iconInput = selectElem.parentElement.querySelector('.icon-class-input');
                if (selectedValue !== 'other') {
                    iconInput.value = defaultIcons[selectedValue];
                    iconInput.placeholder = '';
                } else {
                    iconInput.value = '';
                    iconInput.placeholder = 'Icon Class';
                }
            }

            document.querySelectorAll('.icon-select').forEach(function(selectElem) {
                selectElem.addEventListener('change', function() {
                    updateIconClass(this);
                });
            });

            document.getElementById('add-team-link').addEventListener('click', function () {
                const container = document.getElementById('team-links');
                const newLink = document.createElement('div');
                newLink.classList.add('team-link');
                newLink.style.marginBottom = '10px';
                newLink.style.display = 'flex';
                newLink.style.gap = '5px';
                newLink.innerHTML = `
                    <input type="url" name="team_links[url][]" placeholder="URL" style="width:30%;" />
                    <select name="team_links[icon_select][]" class="icon-select" style="width:20%;">
                        <option value="mail">Mail</option>
                        <option value="www">WWW</option>
                        <option value="facebook">Facebook</option>
                        <option value="instagram">Instagram</option>
                        <option value="other" selected>Inne</option>
                    </select>
                    <input type="text" name="team_links[icon][]" placeholder="Icon Class" style="width:30%;" class="icon-class-input" />
                    <button type="button" class="delete-team-link" style="width:15%;">Delete Link</button>
                `;
                container.appendChild(newLink);
                newLink.querySelector('.icon-select').addEventListener('change', function() {
                    updateIconClass(this);
                });
            });

            document.addEventListener('click', function(e) {
                if ( e.target && e.target.classList.contains('delete-team-link') ) {
                    e.preventDefault();
                    e.target.parentElement.remove();
                }
            });
        })();
    </script>
    <?php
}

// Dodajemy nową kolumnę do tabeli Teams w adminie
function add_team_gender_column($columns) {
    $columns['team_gender'] = __('Gender', 'your-theme-textdomain');
    return $columns;
}
add_filter('manage_edit-team_columns', 'add_team_gender_column');

// Wypełniamy kolumnę Gender odpowiednimi wartościami
function fill_team_gender_column($column, $post_id) {
    if ($column === 'team_gender') {
        $gender = get_post_meta($post_id, 'team_gender', true);
        if ($gender === 'male') {
            echo __('Male', 'your-theme-textdomain');
        } elseif ($gender === 'female') {
            echo __('Female', 'your-theme-textdomain');
        } else {
            echo __('N/A', 'your-theme-textdomain');
        }
    }
}
add_action('manage_team_posts_custom_column', 'fill_team_gender_column', 10, 2);

// Dodaj filtr dla kolumny Gender w adminie
function filter_team_by_gender($post_type) {
    if ($post_type === 'team') {
        $selected = isset($_GET['team_gender_filter']) ? $_GET['team_gender_filter'] : '';
        ?>
        <select name="team_gender_filter">
            <option value=""><?php _e('All Genders', 'your-theme-textdomain'); ?></option>
            <option value="male" <?php selected($selected, 'male'); ?>><?php _e('Male', 'your-theme-textdomain'); ?></option>
            <option value="female" <?php selected($selected, 'female'); ?>><?php _e('Female', 'your-theme-textdomain'); ?></option>
        </select>
        <?php
    }
}
add_action('restrict_manage_posts', 'filter_team_by_gender');

// Modyfikacja zapytania admina, aby uwzględnić filtr Gender
function filter_team_query_by_gender($query) {
    global $pagenow;
    if ($pagenow === 'edit.php' && isset($_GET['team_gender_filter']) && $_GET['team_gender_filter'] != '') {
        $query->query_vars['meta_key'] = 'team_gender';
        $query->query_vars['meta_value'] = sanitize_text_field($_GET['team_gender_filter']);
    }
}
add_filter('parse_query', 'filter_team_query_by_gender');

// Ustawienie kolumny Gender jako sortowalnej
function make_team_gender_column_sortable($columns) {
    $columns['team_gender'] = 'team_gender';
    return $columns;
}
add_filter('manage_edit-team_sortable_columns', 'make_team_gender_column_sortable');

// Modyfikacja zapytania w adminie, aby sortować po Gender
function sort_team_by_gender($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if (isset($query->query_vars['orderby']) && $query->query_vars['orderby'] === 'team_gender') {
        $query->set('meta_key', 'team_gender');
        $query->set('orderby', 'meta_value'); // Sortowanie po wartości tekstowej
    }
}
add_action('pre_get_posts', 'sort_team_by_gender');


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
        'menu_icon'    => 'dashicons-businessman',
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
            'default' => get_template_directory_uri() . "/assets/images/news-$i.jpg",
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
        'default' => get_template_directory_uri() . '/assets/images/svg/castle.svg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'section_history_image', array(
        'label' => __('Section Image', 'your-theme-textdomain'),
        'section' => 'section_history',
    )));
}
add_action('customize_register', 'customize_section_history');
