<?php
if (class_exists('WP_Customize_TinyMCE_Control')) {
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
    $wp_customize->add_control(new WP_Customize_TinyMCE_Control($wp_customize, 'section_teams_text_main', array(
        'label' => __('Main Text', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'textarea',
    )));

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
    $wp_customize->add_control(new WP_Customize_TinyMCE_Control($wp_customize, 'section_teams_text_how', array(
        'label' => __('Text (How we work)', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'textarea',
    )));

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
    $wp_customize->add_control(new WP_Customize_TinyMCE_Control($wp_customize, 'section_teams_text_age', array(
        'label' => __('Text (Age Division)', 'your-theme-textdomain'),
        'section' => 'section_teams',
        'type' => 'textarea',
    )));

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

// Dodajemy kolumnę "Group" w tabeli Board Members w panelu admina
function add_board_member_group_column($columns) {
    $columns['board_group'] = __('Group', 'your-theme-textdomain');
    return $columns;
}
add_filter('manage_edit-board_member_columns', 'add_board_member_group_column');

// Wypełniamy kolumnę "Group" odpowiednimi wartościami
function fill_board_member_group_column($column, $post_id) {
    if ($column === 'board_group') {
        $group = get_post_meta($post_id, 'board_group', true);
        if ($group === 'personnel') {
            echo __('Kadra', 'your-theme-textdomain');
        } elseif ($group === 'leaders') {
            echo __('Drużynowi', 'your-theme-textdomain');
        } elseif ($group === 'instructors') {
            echo __('Instruktorzy', 'your-theme-textdomain');
        } else {
            echo __('N/A', 'your-theme-textdomain');
        }
    }
}
add_action('manage_board_member_posts_custom_column', 'fill_board_member_group_column', 10, 2);

// Dodajemy filtr dla kolumny "Group" w widoku Board Members
function filter_board_member_by_group($post_type) {
    if ($post_type === 'board_member') {
        $selected = isset($_GET['board_group_filter']) ? $_GET['board_group_filter'] : '';
        ?>
        <select name="board_group_filter">
            <option value=""><?php _e('All Groups', 'your-theme-textdomain'); ?></option>
            <option value="personnel" <?php selected($selected, 'personnel'); ?>><?php _e('Kadra', 'your-theme-textdomain'); ?></option>
            <option value="leaders" <?php selected($selected, 'leaders'); ?>><?php _e('Drużynowi', 'your-theme-textdomain'); ?></option>
            <option value="instructors" <?php selected($selected, 'instructors'); ?>><?php _e('Instruktorzy', 'your-theme-textdomain'); ?></option>
        </select>
        <?php
    }
}
add_action('restrict_manage_posts', 'filter_board_member_by_group');

// Modyfikacja zapytania admina, aby uwzględnić filtr Group
function filter_board_member_query_by_group($query) {
    global $pagenow;
    if ($pagenow === 'edit.php' && isset($_GET['board_group_filter']) && $_GET['board_group_filter'] != '') {
        $query->query_vars['meta_key'] = 'board_group';
        $query->query_vars['meta_value'] = sanitize_text_field($_GET['board_group_filter']);
    }
}
add_filter('parse_query', 'filter_board_member_query_by_group');

// Ustawienie kolumny "Group" jako sortowalnej
function make_board_member_group_column_sortable($columns) {
    $columns['board_group'] = 'board_group';
    return $columns;
}
add_filter('manage_edit-board_member_sortable_columns', 'make_board_member_group_column_sortable');

// Modyfikacja zapytania w adminie, aby sortować po Group
function sort_board_member_by_group($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if (isset($query->query_vars['orderby']) && $query->query_vars['orderby'] === 'board_group') {
        $query->set('meta_key', 'board_group');
        $query->set('orderby', 'meta_value'); // Sortowanie po wartości tekstowej
    }
}
add_action('pre_get_posts', 'sort_board_member_by_group');

function board_member_order_meta_box($post) {
    $order = get_post_meta($post->ID, 'person_order', true);
    ?>
    <p>
        <label for="person_order"><?php _e('Order', 'your-theme-textdomain'); ?></label>
        <input type="number" id="person_order" name="person_order" value="<?php echo esc_attr($order); ?>" style="width: 100%;">
        <small><?php _e('Lower values appear first.', 'your-theme-textdomain'); ?></small>
    </p>
    <?php
}

add_action('add_meta_boxes', function () {
    add_meta_box('board_member_order', __('Order', 'your-theme-textdomain'), 'board_member_order_meta_box', 'board_member', 'side', 'default');
});

// Zapisanie wartości
add_action('save_post', function ($post_id) {
    if (isset($_POST['person_order'])) {
        update_post_meta($post_id, 'person_order', intval($_POST['person_order']));
    }
});

function add_board_member_order_column($columns) {
    $columns['person_order'] = __('Order', 'your-theme-textdomain');
    return $columns;
}
add_filter('manage_edit-board_member_columns', 'add_board_member_order_column');

function fill_board_member_order_column($column, $post_id) {
    if ($column === 'person_order') {
        $order = get_post_meta($post_id, 'person_order', true);
        echo esc_html($order);
    }
}
add_action('manage_board_member_posts_custom_column', 'fill_board_member_order_column', 10, 2);

function make_board_member_order_column_sortable($columns) {
    $columns['person_order'] = 'person_order';
    return $columns;
}
add_filter('manage_edit-board_member_sortable_columns', 'make_board_member_order_column_sortable');

function sort_board_member_by_order($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if (isset($query->query_vars['orderby']) && $query->query_vars['orderby'] === 'person_order') {
        $query->set('meta_key', 'person_order');
        $query->set('orderby', 'meta_value_num'); // Sortowanie numeryczne
    }
}
add_action('pre_get_posts', 'sort_board_member_by_order');

function board_member_quick_edit_fields($column_name, $post_type) {
    if ($post_type !== 'board_member' || $column_name !== 'person_order') {
        return;
    }
    ?>
    <fieldset class="inline-edit-col-right">
        <div class="inline-edit-col">
            <label class="inline-edit-group">
                <span class="title"><?php _e('Order', 'your-theme-textdomain'); ?></span>
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


function register_brotherhood_post_type() {
    $labels = array(
        'name'               => __('Banners', 'your-theme-textdomain'),
        'singular_name'      => __('Banner', 'your-theme-textdomain'),
        'menu_name'          => __('Brotherhood', 'your-theme-textdomain'),
        'add_new'            => __('Add New Banner', 'your-theme-textdomain'),
        'add_new_item'       => __('Add New Banner', 'your-theme-textdomain'),
        'edit_item'          => __('Edit Banner', 'your-theme-textdomain'),
        'new_item'           => __('New Banner', 'your-theme-textdomain'),
        'view_item'          => __('View Banner', 'your-theme-textdomain'),
        'search_items'       => __('Search Banners', 'your-theme-textdomain'),
        'not_found'          => __('No banners found', 'your-theme-textdomain'),
        'not_found_in_trash' => __('No banners found in trash', 'your-theme-textdomain')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_menu'       => true,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-flag',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'has_archive'        => false,
        'publicly_queryable' => false,
    );

    register_post_type('brotherhood_banner', $args);
}
add_action('init', 'register_brotherhood_post_type');

function register_brotherhood_settings() {
    add_option('brotherhood_section_heading', 'Bractwo Szandarowe');
    add_option('brotherhood_section_text', 'Ścisłą Kadrę Szczepu stanowi Szczepowy, Kwatermistrz oraz Viceszczepowi. W składzie rady są wszyscy drużynowi oraz instruktorzy którzy nie mają funkcji w szczepie.');
    
    register_setting('brotherhood_options_group', 'brotherhood_section_heading');
    register_setting('brotherhood_options_group', 'brotherhood_section_text');
}
add_action('admin_init', 'register_brotherhood_settings');

function brotherhood_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php _e('Brotherhood Section Settings', 'your-theme-textdomain'); ?></h1>
        <form method="post" action="options.php">
            <?php settings_fields('brotherhood_options_group'); ?>
            <?php do_settings_sections('brotherhood_options_group'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="brotherhood_section_heading"><?php _e('Section Title', 'your-theme-textdomain'); ?></label></th>
                    <td><input type="text" id="brotherhood_section_heading" name="brotherhood_section_heading" value="<?php echo esc_attr(get_option('brotherhood_section_heading')); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="brotherhood_section_text"><?php _e('Section Text', 'your-theme-textdomain'); ?></label></th>
                    <td><textarea id="brotherhood_section_text" name="brotherhood_section_text" class="large-text"><?php echo esc_textarea(get_option('brotherhood_section_text')); ?></textarea></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function customize_brotherhood_section($wp_customize) {
    $wp_customize->add_section('section_brotherhood', array(
        'title'    => __('Brotherhood Section', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('brotherhood_section_heading', array(
        'default'           => __('Bractwo Szandarowe', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('brotherhood_section_heading', array(
        'label'   => __('Section Title', 'your-theme-textdomain'),
        'section' => 'section_brotherhood',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('brotherhood_section_text', array(
        'default'           => __('Ścisłą Kadrę Szczepu stanowi Szczepowy, Kwatermistrz oraz Viceszczepowi. W składzie rady są wszyscy drużynowi oraz instruktorzy którzy nie mają funkcji w szczepie.', 'your-theme-textdomain'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('brotherhood_section_text', array(
        'label'   => __('Section Text', 'your-theme-textdomain'),
        'section' => 'section_brotherhood',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'customize_brotherhood_section');

function add_custom_menu_group() {
    // Dodanie głównego menu (bez linkowania do podstrony)
    add_menu_page(
        __('O nas', 'your-theme-textdomain'),
        __('O nas', 'your-theme-textdomain'),
        'manage_options',
        'structure_menu',
        '__return_null', // Nie przekierowuje na żadną stronę
        'dashicons-groups',
        5
    );

    // Przeniesienie CPT do tej grupy
    add_submenu_page('structure_menu', __('Drużyny', 'your-theme-textdomain'), __('Drużyny', 'your-theme-textdomain'), 'manage_options', 'edit.php?post_type=team');
    add_submenu_page('structure_menu', __('Bractwo sztandarowe', 'your-theme-textdomain'), __('Bractwo sztandarowe', 'your-theme-textdomain'), 'manage_options', 'edit.php?post_type=brotherhood_banner');
    add_submenu_page('structure_menu', __('Rada szczepu', 'your-theme-textdomain'), __('Rada szczepu', 'your-theme-textdomain'), 'manage_options', 'edit.php?post_type=board_member');
}
add_action('admin_menu', 'add_custom_menu_group');

// Ukrycie CPT z menu głównego
function remove_cpt_from_admin_menu() {
    remove_menu_page('edit.php?post_type=team');
    remove_menu_page('edit.php?post_type=brotherhood_banner');
    remove_menu_page('edit.php?post_type=board_member');
}
add_action('admin_menu', 'remove_cpt_from_admin_menu', 999);


function customize_structure_panel($wp_customize) {
    // Tworzenie panelu nadrzędnego dla strony "O nas"
    $wp_customize->add_panel('panel_structure', array(
        'title'       => __('O nas', 'your-theme-textdomain'),
        'priority'    => 20,
        'description' => __('Zarządzaj sekcjami podstrony "O nas".', 'your-theme-textdomain'),
    ));

    // Przypisanie istniejących sekcji do panelu
    $wp_customize->get_section('section_intro')->panel = 'panel_structure';
    $wp_customize->get_section('section_teams')->panel = 'panel_structure';
    $wp_customize->get_section('section_brotherhood')->panel = 'panel_structure';
}
add_action('customize_register', 'customize_structure_panel');