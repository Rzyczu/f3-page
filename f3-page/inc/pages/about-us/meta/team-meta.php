<?php

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
        'phone'     => 'fa-solid fa-phone'
    );
    ?>
    <p>
        <label for="team_short_name"><?php _e('Krótka Nazwa', 'your-theme-textdomain'); ?></label>
        <input type="text" id="team_short_name" name="team_short_name" value="<?php echo esc_attr($short_name); ?>" style="width: 100%;" placeholder="<?php esc_attr_e('Enter short team name', 'your-theme-textdomain'); ?>">
    </p>
    <p>
        <label for="team_description"><?php _e('Opis', 'your-theme-textdomain'); ?></label>
        <textarea id="team_description" name="team_description" style="width: 100%;"><?php echo esc_textarea($description); ?></textarea>
    </p>
    <p>
        <label for="team_gender"><?php _e('Chorągiew', 'your-theme-textdomain'); ?></label>
        <select id="team_gender" name="team_gender">
            <option value="male" <?php selected($gender, 'male'); ?>><?php _e('Męska', 'your-theme-textdomain'); ?></option>
            <option value="female" <?php selected($gender, 'female'); ?>><?php _e('Żeńska', 'your-theme-textdomain'); ?></option>
        </select>
    </p>
    <p>
    <label>
            <?php _e('Linki', 'your-theme-textdomain'); ?>
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
                    <input type="url" name="team_links[url][]" value="<?php echo esc_url($link['url']); ?>" class="url-input" placeholder="<?php
                        echo ($icon_select === 'mail') ? 'mailto:mail@adres.pl' :
                            (($icon_select === 'phone') ? 'tel:+48123456789' : 'https://example.com');
                    ?>" style="width:30%;" />
                        <select name="team_links[icon_select][]" class="icon-select" style="width:20%;">
                            <option value="mail" <?php selected($icon_select, 'mail'); ?>><?php _e('Mail', 'your-theme-textdomain'); ?></option>
                            <option value="phone" <?php selected($icon_select, 'phone'); ?>><?php _e('Telefon', 'your-theme-textdomain'); ?></option>
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
        <button type="button" id="add-team-link"><?php _e('Dodaj link', 'your-theme-textdomain'); ?></button>
    </p>
    <script>
        (function(){
            const defaultIcons = {
                'mail': 'fa-regular fa-envelope',
                'phone': 'fa-solid fa-phone',
                'www': 'fa-regular fa-globe',
                'facebook': 'fa-brands fa-facebook',
                'instagram': 'fa-brands fa-instagram',
                'other': ''
            };

            function updateIconClass(selectElem) {
                const selectedValue = selectElem.value;
                const parent = selectElem.parentElement;
                const iconInput = parent.querySelector('.icon-class-input');
                const urlInput = parent.querySelector('.url-input');

                if (selectedValue !== 'other') {
                    iconInput.value = defaultIcons[selectedValue];
                    iconInput.placeholder = '';
                } else {
                    iconInput.value = '';
                    iconInput.placeholder = 'Icon Class';
                }

                 switch (selectedValue) {
                    case 'mail':
                        urlInput.placeholder = 'mailto:mail@adres.pl';
                        break;
                    case 'phone':
                        urlInput.placeholder = 'tel:+48123456789';
                        break;
                    case 'www':
                    case 'facebook':
                    case 'instagram':
                    case 'other':
                    default:
                        urlInput.placeholder = 'https://example.com';
                        break;
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
                    <input type="url" name="team_links[url][]" placeholder="https://example.com" class="url-input" style="width:30%;" />
                    <select name="team_links[icon_select][]" class="icon-select" style="width:20%;">
                        <option value="mail">Mail</option>
                        <option value="phone">Telefon</option>
                        <option value="www">WWW</option>
                        <option value="facebook">Facebook</option>
                        <option value="instagram">Instagram</option>
                        <option value="other" selected>Inne</option>
                    </select>
                    <input type="text" name="team_links[icon][]" placeholder="Icon Class" style="width:30%;" class="icon-class-input" />
                    <button type="button" class="delete-team-link" style="width:15%;">Usuń Link</button>
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