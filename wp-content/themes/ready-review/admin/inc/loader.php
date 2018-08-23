<?php
add_action('admin_menu', 'ready_review_options_add_page');
function ready_review_options_add_page() {
    $render = new ready_reviewRenderView();
    add_theme_page(__(ready_review_config("admin_page_title"), 'ready_review'), __(ready_review_config("admin_page_menu_name"), 'ready_review'), 'edit_theme_options', ready_review_config("menu_slug"), array($render, 'show'));
}

function ready_review_config($config_name, $echo = 0) {
    $return = '';
    ready_reviewConfig::init();
    $return = ready_reviewConfig::$$config_name;
    if ($echo)
        echo $return;
    else
        return $return;
}

function ready_review_get_options() {
    $error = ready_review_check_config();
    if (!empty($error)) return false;
    $options = get_option(ready_review_config("menu_slug"));
    $default = ready_reviewConfig::$structure;
}

function ready_review_check_element($field, $tab) {
    $errors = array();
    $group_fields = array("type", "name", "options");
    $input_text = array("type", "name", "description", "id", "default");
    $input_number = array_merge($input_text, array("max", "min", "step"));
    $select = $mselect = $checkbox = $radio = array_merge($input_text, array("options"));
    $textarea = $editor = $color = $image = $typo = $bg = $input_text;
    switch ($field['type']) {
        case 'input_text':
            $keys = array_keys($field);
            $dif = array_diff($input_text, $keys);
            if (!empty($dif)) {
                $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $tab . "    tab on .: " . $field['name'];
                break;
            }
            break;
        case 'input_number':
            $keys = array_keys($field);
            $dif = array_diff($input_number, $keys);
            if (!empty($dif)) {
                $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $tab . "    tab on .: " . $field['name'];
                break;
            }
            break;
        case 'textarea':
            $keys = array_keys($field);
            $dif = array_diff($input_text, $keys);
            if (!empty($dif)) {
                $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $tab . "   tab on .: " . $field['name'];
                break;
            }
            break;
        case 'editor':
            $keys = array_keys($field);
            $dif = array_diff($input_text, $keys);
            if (!empty($dif)) {
                $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $tab . "  tab on .: " . $field['name'];
                break;
            }
            break;
        case 'color':
            $keys = array_keys($field);
            $dif = array_diff($input_text, $keys);
            if (!empty($dif)) {
                $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $tab . "    tab on .: " . $field['name'];
                break;
            }
            break;
        case 'image':
            $keys = array_keys($field);
            $dif = array_diff($input_text, $keys);
            if (!empty($dif)) {
                $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $tab . "  tab on .: " . $field['name'];
                break;
            }
            break;
        case 'typography':
            $keys = array_keys($field);
            $dif = array_diff($input_text, $keys);
            if (!empty($dif)) {
                $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $tab . "  tab on .: " . $field['name'];
                break;
            }
            $defaults = array("font", "color", "style", "size");
            $kkeys = array_keys($field['default']);
            $ddif = array_diff($defaults, $kkeys);
            if (!empty($ddif)) {
                $errors[] = "You have not added the " . implode(",", $ddif) . " keys for the " . $field['nume'] . "   in tab " . $tab . "  on option no.: " . $r;
                break;
            }
            break;
        case 'background':
            $keys = array_keys($field);
            $dif = array_diff($input_text, $keys);
            if (!empty($dif)) {
                $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $tab . "    tab on .: " . $field['name'];
                break;
            }
            $defaults = array("bgcolor", "bgimage", "bgposition", "bgrepeat", "bgattachment");
            $kkeys = array_keys($field['default']);
            $ddif = array_diff($defaults, $kkeys);
            if (!empty($ddif)) {
                $errors[] = "You have not added the " . implode(",", $ddif) . " keys for the " . $field['name'] . "   in tab " . $tab . "  tab ";
                break;
            }
            break;
        case 'input_number':
            $keys = array_keys($field);
            $dif = array_diff($input_number, $keys);
            if (!empty($dif)) {
                $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $tab . "   tab on .: " . $field['name'];
                break;
            }
            break;
        case 'select':
            $keys = array_keys($field);
            $dif = array_diff($select, $keys);
            if (!empty($dif)) {
                $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $tab . "  tab on .: " . $field['name'];
                break;
            }
            $no = array();
            foreach ($field['options'] as $ov => $op) {
                $no[esc_attr($ov)] = esc_html($op);
            }
            $kno = array_keys($no);
            if (!in_array($field['default'], $kno)) {
                $errors[] = "The default value for the select " . $field['name'] . " in tab " . $tab . " is not in the allowed values. ";
                break;
            }
            break;
        case 'radio':
            $keys = array_keys($field);
            $dif = array_diff($select, $keys);
            if (!empty($dif)) {
                $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $tab . "   tab on .: " . $field['name'];
                break;
            }
            $no = array();
            foreach ($field['options'] as $ov => $op) {
                $no[esc_attr($ov)] = esc_html($op);
            }
            $kno = array_keys($no);
            if (!in_array($field['default'], $kno)) {
                $errors[] = "The default value for the radio " . $field['name'] . " in tab " . $tab . " is not in the allowed values. ";
                break;
            }
            break;
        case 'multiselect':
            $keys = array_keys($field);
            $dif = array_diff($select, $keys);
            if (!empty($dif)) {
                $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $tab . "     tab on .: " . $field['name'];
                break;
            }
            if (!is_array($field['default'])) {
                $errors[] = "The default value for the multiselect " . $field['name'] . " in tab " . $tab . " must be an array. ";
                break;
            }
            $no = array();
            foreach ($field['options'] as $ov => $op) {
                $no[esc_attr($ov)] = esc_html($op);
            }
            $kno = array_keys($no);
            $ddif = array_diff($field['default'], $kno);
            if (!empty($ddif)) {
                $errors[] = "The default values for the multiselect " . $field['name'] . " in tab " . $tab . " are not in the allowed values (" . implode(",", $ddif) . ")   ";
                break;
            }
            break;
        case 'checkbox':
            $keys = array_keys($field);
            $dif = array_diff($select, $keys);
            if (!empty($dif)) {
                $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $tab . "   tab on .: " . $field['name'];
                break;
            }
            if (!is_array($field['default'])) {
                $errors[] = "The default value for the checkbox " . $field['name'] . " in tab " . $tab . " must be an array. ";
                break;
            }
            $no = array();
            foreach ($field['options'] as $ov => $op) {
                $no[esc_attr($ov)] = esc_html($op);
            }
            $kno = array_keys($no);
            $ddif = array_diff($field['default'], $kno);
            if (!empty($ddif)) {
                $errors[] = "The default values for the checkbox " . $field['name'] . " in tab " . $tab . " are not in the allowed values (" . implode(",", $ddif) . ")   ";
                break;
            }
            break;
    }
    return $errors;
}

function ready_review_check_config() {
    $errors = array();
    ready_reviewConfig::init();
    $config = ready_reviewConfig::$structure;
    $tab_fields = array("type", "name", "options");
    $titles = array("name", "type");
    $title = array_merge($titles, array("default"));
    foreach ($config as $k => $fields) {
        $keys = array_keys($fields);
        $dif = array_diff($tab_fields, $keys);
        if (!empty($dif)) {
            $errors[] = "You have not added the " . implode(",", $dif) . " keys for first level item on key : " . $k;
            break;
        }
        if ($fields['type'] == 'tab') {
        } else {
            $errors[] = "All first level items from structure must be tabs";
            break;
        }
        foreach ($fields['options'] as $r => $field) {
            $keys = array_keys($field);
            $dif = array_diff($titles, $keys);
            if (!empty($dif)) {
                $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $fields['name'] . "   tab on option no.: " . $r;
                break;
            }
            if (!isset($field['default']) && ($field['type'] != 'title' && $field['type'] != 'group')) {
                $errors[] = "You have not added the default key for the " . $fields['name'] . "   tab on option no.: " . $r;
                break;
            }
            if ($field['type'] == 'group') {
                if (!isset($field['options'])) {
                    $errors[] = "You have not added the  option key for the " . $field['name'] . " group in  " . $fields['name'] . "   tab on option no.: " . $r;
                    break;
                }
                if (empty($field['options'])) {
                    $errors[] = "The option array is empty for the " . $field['name'] . " group in  " . $fields['name'] . "   tab on option no.: " . $r;
                    break;
                }
                foreach ($field['options'] as $m => $gfield) {
                    $keys = array_keys($gfield);
                    $dif = array_diff($title, $keys);
                    if (!empty($dif)) {
                        $errors[] = "You have not added the " . implode(",", $dif) . " keys for the " . $fields['name'] . "   tab on option no.: " . $m;
                        break;
                    }
                    $errors = array_merge(ready_review_check_element($gfield, $fields['name']), $errors);
                }
            } else {
                $errors = array_merge(ready_review_check_element($field, $fields['name']), $errors);
            }
        }
        if (!empty($errors)) break;
    }
    return $errors;
}

function ready_review_get_config_defaults($structure) {
    $defaults = array();
    foreach ($structure as $k => $fields) {
        if ($fields['type'] == 'tab') {
            foreach ($fields['options'] as $r => $field) {
                if ($field['type'] == 'group') {
                    foreach ($field['options'] as $m => $gfield) {
                        if ($gfield["type"] != 'title')
                            $defaults[$gfield['id']] = $gfield['default'];
                    }
                } else {
                    if ($field["type"] != 'title')
                        $defaults[$field['id']] = $field['default'];
                }
            }
        }
    }
    return $defaults;
}

function ready_review_admin_notice() {
    $errors = ready_review_check_config();
    if (!empty($errors)) {
        foreach ($errors as $error) {
            ?>
            <div id="message" class="error"><p><strong><?php echo $error; ?></strong></p></div>
        <?php
        }
    }
}

function ready_review_add_options() {
    $errors = ready_review_check_config();
    if (!empty($errors)) return false;
    $validator = new ready_reviewOptionsValidator();
    $option = get_option(ready_review_config("menu_slug"));
    $structure = ready_reviewConfig::$structure;
    $defaults = ready_review_get_config_defaults($structure);
    $defaults = $validator->validate_defaults();
    $options = array_merge($defaults, is_array($option) ? $option : array());
    if (!is_array($option))
        add_option(ready_review_config("menu_slug"), $options, "", "no");
    else
        update_option(ready_review_config("menu_slug"), $options);
    register_setting(ready_review_config("menu_slug"), ready_review_config("menu_slug"), array($validator, "validate"));
}

add_action("admin_init", "ready_review_add_options");
add_action('admin_notices', 'ready_review_admin_notice');
add_action('wp_ajax_ready_review_load_defaults', 'ready_review_load_defaults_callback');
function ready_review_load_defaults_callback() {
    $errors = ready_review_check_config();
    if (!empty($errors)) return false;
    $validator = new ready_reviewOptionsValidator();
    $defaults = $validator->validate_defaults();
    update_option(ready_review_config("menu_slug"), $defaults);
    die();
}

function ready_review($name = '') {
    $op = get_option(ready_review_config("menu_slug"));
    if (empty($name))
        return $op;
    if (isset($op[$name])) {
        return $op[$name];
    }
    return null;
}

add_action('admin_enqueue_scripts', 'ready_review_top_custom_wp_admin_script');
function ready_review_top_custom_wp_admin_script($hook) {
    if ($hook == "appearance_page_theme_options")
        wp_enqueue_media();
}
