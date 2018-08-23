<?php

class UPME_Admin {

    var $options;
    public $field_validate_errors;
    /* constructor for admin panel */

    function __construct() {
        $this->wp_all_pages = false;
        $this->slug = 'wp-upme';
        $this->tabs = array('general' => __('UPME Settings', 'upme'), 'customizer' => __('Custom Fields', 'upme'), 'sync' => __('Sync / Tools', 'upme'), 'user_cache' => __('Update Search Cache', 'upme'));
        $this->default_tab = 'general';
        add_action('admin_menu', array(&$this, 'add_menu'), 9);
        add_action('admin_enqueue_scripts', array(&$this, 'add_styles'), 9);
        $this->defaults = array(
            'html_user_login_message' => __('Please log in to view / edit your profile.', 'upme'),
            'html_login_to_view' => __('Please log in to view user profiles.', 'upme'),
            'html_private_content' => __('This content is for members only. You must log in to view this content.', 'upme'),
            'clickable_profile' => 1,
            'set_password' => 1,
            'guests_can_view' => 1,
            'users_can_view' => 1,
            'style' => 'default',
            'profile_page_id' => '0',
            'login_page_id' => '0',
            'registration_page_id' => '0',
            'redirect_backend_profile' => '0',
            'redirect_backend_registration' => '0',
            'redirect_backend_login' => '0',
            'html_registration_disabled' => __('User registration is currently not allowed.', 'upme'),
            'link_author_posts_page' => '1',
            'msg_register_success' => __('Registration successful. Please check your email.', 'upme'),
            'automatic_login' => 0,
            'login_redirect_page_id' => '0',
            'date_format' => 'mm/dd/yy',
            'show_empty_field_on_profile' => '0',
            'show_empty_field_on_profile' => '0',
            'hide_frontend_admin_bar' => 'enabled',
            'profile_title_field' => 'display_name',
            'select_user_role_in_registration' => '0',
            'choose_roles_for_registration' => get_option('default_role'),
            'label_for_registration_user_role' => __('Select Role', 'upme'),
            'reset_password_page_id' => '0',
            'set_email_confirmation' => '0',
            'lightbox_avatar_cropping' => '1',
            'show_recent_user_posts' => '0',
            'maximum_allowed_posts' => '3',
            'show_feature_image_posts' => '0',
            'website_link_on_profile' => '0',
            'default_predefined_country' => 'US',
            'enforce_password_strength' => '0',
            'choose_roles_for_view_profile' => 'administrator',
            'profile_modal_window_shortcode' => '[upme]',
            'disable_fancybox_script_styles' => '0',
            'html_login_to_view_form' => '1',
            'html_user_login_message_form' => '1',
            'html_private_content_form' => '1',
            'html_other_profiles_restricted' => __('Viewing of other profiles restricted for your user role.', 'upme'),
            'profile_view_status' => '1',
            'html_profile_status_msg' => __('This is a private profile. You are not allowed to view this profile.', 'upme'),
            'display_profile_status' => '0',
            'html_profile_approval_pending_msg' => __('This profile is pending approval. You will get a notification once the profile is approved.', 'upme'),
            'profile_approval_status' => '0',
            'ajax_profile_field_save' => '0',
            'html_terms_and_conditions' => __('I agree to Terms and Conditions.', 'upme'),
            'accepting_terms_and_conditions' => '0',
        );

        /* UPME Filters for customizing defualt options */
        $this->defaults = apply_filters('upme_init_options',$this->defaults);
        // End Filter
              
        $this->default_settings = array(
                    'upme-general-settings' => array(
                                'style' => 'default',
                                'date_format' => 'mm/dd/yy',
                                'hide_frontend_admin_bar' => 'enabled',
                                'lightbox_avatar_cropping' => '1',
                                'ajax_profile_field_save' => '0',
                            ),
                    'upme-profile-settings' => array(
                                'clickable_profile' => '1',
                                'link_author_posts_page' => '1',
                                'avatar_max_size' => '2',
                                'show_separator_on_profile' => '0',
                                'show_empty_field_on_profile' => '0',
                                'profile_title_field' => 'display_name',
                                'show_recent_user_posts' => '0',
                                'maximum_allowed_posts' => '3',
                                'show_feature_image_posts' => '0',
                                'website_link_on_profile' => '0',
                                'profile_modal_window_shortcode' => '[upme]',
                                'profile_view_status' => '1',
                                'display_profile_status' => '0',
                                
                            ),
                    'upme-system-pages' => array(
                                'profile_page_id' => '0',
                                'login_page_id' => '0',
                                'registration_page_id' => '0',
                                'reset_password_page_id' => '0'
                            ),
                    'upme-redirect-setting' => array(
                                'redirect_backend_profile' => '0',
                                'redirect_backend_login' => '0',
                                'redirect_backend_registration' => '0',
                                'login_redirect_page_id' => '0',
                                'register_redirect_page_id' => '0'
                            ),
                    'upme-registration-option' => array(
                                'set_password' => '1',
                                'automatic_login' => '0',
                                'captcha_plugin' => 'none',
                                'captcha_label' => 'Captcha',
                                'recaptcha_public_key' => '',
                                'recaptcha_private_key' => '',
                                'msg_register_success' => __('Registration successful. Please check your email.','upme'),
                                'html_register_success_after' => '',
                                'select_user_role_in_registration' => '0',
                                'choose_roles_for_registration' => get_option('default_role'),
                                'label_for_registration_user_role' => __('Select Role', 'upme'),
                                'set_email_confirmation' => '0',
                                'default_predefined_country' => 'US',
                                'enforce_password_strength' => '0',
                                'profile_approval_status' => '0',
                                'accepting_terms_and_conditions' => '0',
                            ),
                    'upme-search-settings' =>array(
                                'use_cron' => '1',
                                'require_search_input' => '0',
                                'users_are_called' => __('User','upme'),
                                'combined_search_text' => __('Combined Search','upme'),
                                'search_button_text' => __('Filter','upme')
                            ),
                    'upme-privacy-option' => array(
                                'users_can_view' => '1',
                                'guests_can_view' => '1',
                                'choose_roles_for_view_profile' => 'administrator',
                            ),
                    'upme-misc-messages' => array(
                                'html_login_to_view' => __('Please log in to view user profiles.','upme'),
                                'html_user_login_message' => __('Please log in to view / edit your profile.','upme'),
                                'html_private_content' => __('This content is for members only. You must log in to view this content.','upme'),
                                'html_registration_disabled' => __('User registration is currently not allowed.','upme'),
                                'html_login_to_view_form' => '1',
                                'html_user_login_message_form' => '1',
                                'html_private_content_form' => '1',
                                'html_other_profiles_restricted' => __('Viewing of other profiles restricted for your user role.', 'upme'),
                                'html_profile_status_msg' => __('This is a private profile. You are not allowed to view this profile.', 'upme'),            
                                'html_profile_approval_pending_msg' => __('This profile is pending approval. You will get a notification once the profile is approved.', 'upme'),
                                'html_terms_and_conditions' => __('I agree to Terms and Conditions.', 'upme'),
                            ),
                    'upme-scripts-styles' => array(
                                'disable_fancybox_script_styles' => '0',
                            ),
                );
        
        
        $this->colorsdefault = array();

        $this->option_with_checkbox = array('redirect_backend_profile', 'redirect_backend_registration', 'redirect_backend_login', 'link_author_posts_page', 'show_separator_on_profile', 'show_empty_field_on_profile'
            , 'use_cron','select_user_role_in_registration','lightbox_avatar_cropping','show_recent_user_posts','disable_fancybox_script_styles',
            'html_login_to_view_form','html_user_login_message_form','html_private_content_form','ajax_profile_field_save');

        $this->options = get_option('upme_options');

        if (!get_option('upme_options')) {
            update_option('upme_options', $this->defaults);
        }

        /* Store icons in array */
        $this->fontawesome = $this->list_font_awesome_icons();

        asort($this->fontawesome);

        // Adding Action hook to show additional profile fields
        add_action('show_user_profile', array($this, 'upme_user_extra_fields'));
        add_action('edit_user_profile', array($this, 'upme_user_extra_fields'));
        //add_action( 'load-profile.php', array($this,'upme_user_extra_fields') );
        // Adding Action hook to save additional profile fields
        add_action('personal_options_update', array($this, 'upme_save_user_extra_fields'), 9999);
        add_action('edit_user_profile_update', array($this, 'upme_save_user_extra_fields'));

        if (is_admin ()) {
            add_action('wp_ajax_update_user_cache', array($this, 'upme_update_user_cache'));
            add_action('wp_ajax_save_upme_settings', array($this, 'upme_save_settings'));
            add_action('wp_ajax_reset_upme_settings', array($this, 'upme_reset_settings'));
        
            add_action('wp_ajax_upme_update_custom_field', array($this, 'upme_ajax_update_custom_field'));
            add_action('wp_ajax_upme_reset_custom_fields', array($this, 'reset_all'));
            add_action('wp_ajax_upme_create_custom_field', array($this, 'upme_ajax_create_custom_field'));
            add_filter('user_profile_update_errors', array($this,'upme_profile_update_errors'), 10, 3);
        }

        define('PROFILE_HELP', __('Enter a custom meta key for this profile field if do not want to use a predefined meta field above. It is recommended to only use alphanumeric characters and underscores, for example my_custom_meta is a proper meta key.', 'upme'));
        define('SEPARATOR_HELP', __('A Meta Key may be added to your separator in order to reference it with the [upme view=x,x,x] shortcode option. It is recommended to only use alphanumeric characters and underscores, for example my_custom_meta is a proper meta key.', 'upme'));
    
        add_action('admin_footer', array($this,'upme_user_action_buttons'));
        add_action('load-users.php', array($this,'upme_users_page_loaded'));
        add_action('admin_notices', array($this,'upme_bulk_admin_notices'));

        add_filter('manage_users_columns', array($this,'upme_manage_user_custom_columns'));
        add_action('manage_users_custom_column', array($this,'upme_manage_user_custom_column_values'), 10, 3);
        add_filter('manage_users_sortable_columns', array($this,'upme_users_sortable_columns'));
        add_action('pre_user_query', array($this,'upme_users_orderby_filters'));

    }

    /* add styles */

    function add_styles($current_page_hook) {

        /* admin panel css */
        wp_register_style('upme_admin', upme_url . 'admin/css/upme-admin.css');
        wp_enqueue_style('upme_admin');


        wp_register_script('upme_admin_tipsy_js', upme_url . 'js/jquery.tipsy.js', array('jquery'));
        wp_enqueue_script('upme_admin_tipsy_js');

        wp_register_style('upme_admin_tipsy', upme_url . 'css/tipsy.css');
        wp_enqueue_style('upme_admin_tipsy');

        wp_register_script('upme_admin', upme_url . 'admin/js/upme-admin.js');
        wp_enqueue_script('upme_admin');

        $admin_options_array = array(
            'profileKey' => __('New Custom Meta Key', 'upme'),
            'separatorKey' => __('Meta Key', 'upme'),
            'profileLabel' => __('Label', 'upme'),
            'separatorLabel' => __('Separator Text', 'upme'),
            'profileHelp' => PROFILE_HELP,
            'separatorHelp' => SEPARATOR_HELP,
            'AdminAjax' => admin_url('admin-ajax.php'),
            'savingSetting' => __('Saving...','upme'),
            'saveSetting' => __('Save Changes','upme'),
            'resettingSetting' => __('Resetting...','upme'),
            'resetSetting' => __('Reset Options','upme'),
            'adminURL' => get_admin_url('', 'admin.php?page=upme-settings'),
            'fieldDeleteConfirm' => __('Are you sure you want to delete this field?', 'upme'),
            'cacheCompletedUsers' => __('users Completed', 'upme'),
            'fieldUpdateProcessing' => __(' Processing.....', 'upme'),
            'fieldUpdateCompleted' => __(' Update Completed', 'upme'),
        );
        wp_localize_script('upme_admin', 'UPMEAdmin', $admin_options_array);


        wp_register_style('upme_font_awesome', upme_url . 'css/font-awesome.min.css');
        wp_enqueue_style('upme_font_awesome');

        /* google fonts */
        wp_register_style('upme_google_fonts', '//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700&subset=latin,latin-ext');
        wp_enqueue_style('upme_google_fonts');

        /* Drag & Drop */
        //wp_register_script('upme_drag_drop', upme_url . 'admin/js/drag-drop.js');
        //wp_enqueue_script('upme_drag_drop');
        wp_enqueue_script('jquery-ui-sortable');
            

        /* Tabify */
        wp_register_script('upme_tabify', upme_url . 'admin/js/upme-tabify.js', array('jquery', 'upme_admin'));
        wp_enqueue_script('upme_tabify');


        if ('profile.php' == $current_page_hook) {
            wp_register_style('upme_date_picker', upme_url . 'css/upme-datepicker.css');
            wp_enqueue_style('upme_date_picker');

            wp_register_script('upme_date_picker_js', upme_url . 'js/upme-datepicker.js', array('jquery'));
            wp_enqueue_script('upme_date_picker_js');

            wp_localize_script('upme_date_picker_js', 'UPMEDatePicker', upme_date_picker_setting());
        }

        $lang_strings = upme_tinymce_language_setting();

        wp_register_script('upme_tmce', upme_url . 'admin/js/tinymce_language_strings.js');
        wp_enqueue_script('upme_tmce');

        wp_localize_script('upme_tmce', 'UPMETmce', $lang_strings);

        do_action('upme_admin_add_styles');
    }

    // add menu
    function add_menu() {
		
        // Adding UPME Menu
        add_menu_page(__('UPME Settings', "upme"), __("UPME Settings", "upme"),'manage_options','upme-settings',array(&$this,'upme_settings'));
        
        // Adding UPME Sub Menus
        add_submenu_page('upme-settings', __("Custom Fields", "upme"), __("Custom Fields", "upme"),'manage_options','upme-field-customizer',array(&$this,'upme_customizer'));
        
        add_submenu_page('upme-settings', __("Sync / Tools", "upme"), __("Sync / Tools", "upme"),'manage_options','upme-sync-tools',array(&$this,'upme_sync_tools'));
        
        add_submenu_page('upme-settings', __("Update Search Cache", "upme"), __("Update Search Cache", "upme"),'manage_options','upme-search-cache',array(&$this,'upme_update_search_cache'));
        
    }
    
    public function upme_settings()
    {
        include_once(upme_path.'admin/settings.php');
    }
    
    public function upme_customizer()
    {
        /**
         * @submit settings page
         */
        if (is_in_post('submit'))
        {
            $this->upme_update_custom_field($_POST,'normal');
            //$this->update();
        }
    
        /* Create a new field */
        if (is_in_post('upme-add'))
        {
            $this->upme_add_custom_field($_POST,'normal');
        }
    
        /* Trash field */
    
        if (is_get()) {
            if (isset($_GET['trash_field']) && !isset($_POST['submit']) && !isset($_POST['reset-options']) && !isset($_POST['reset-options-fields'])) {
                $fields = get_option('upme_profile_fields');
                $trash = $_GET['trash_field'];
                if (isset($fields[$trash])) {

                    /* UPME Action for before deleteing custom field */
                    do_action('upme_before_delete_field',$fields[$trash]);
                    // End Action
                    
                    if(isset($this->delete_error)){
                        if('' != $this->delete_error)
                            echo '<div class="updated"><p><strong>' . $this->delete_error . '</strong></p></div>';
                
                    }else{

                        $trash_field = $fields[$trash];
                        unset($fields[$trash]);
                        update_option('upme_profile_fields', $fields);

                        /* UPME Action for after deleting custom field */
                        do_action('upme_after_delete_field',$trash_field);
                        // End Action
                        
                        
                        $update_cache_link = ' <a href="' . get_admin_url('', 'admin.php?page=upme-search-cache') . '">' . __('Update Now', 'upme') . '</a>';
                        
                        echo '<div class="updated"><p><strong>' . __('Profile field was sent to Trash. It is recommended to update your user search cache.', 'upme') . $update_cache_link . '</strong></p></div>';
                    
                    }
                }
            }
        }
        
        if (is_in_post('reset-options-fields')) 
        {
            $this->reset_all('normal');
        }
        
        include_once(upme_path.'admin/field-builder.php');
    }
    
    public function upme_sync_tools()
    {
        include_once(upme_path.'admin/sync-tool.php');
    }
    
    public function upme_update_search_cache()
    {
        include_once(upme_path.'admin/user-cache.php');
    }
    
    // get value in admin option
    function get_value($option_id) {

        if (isset($this->options[$option_id]) && $this->options[$option_id] != '') {
            return $this->options[$option_id];
        } elseif (isset($this->defaults[$option_id]) && $this->defaults[$option_id] != '') {
            return $this->defaults[$option_id];
        } else {
            return null;
        }
    }

    // add normal info
    function add_plugin_info($label, $content) {
        print "<tr valign=\"top\">
        <th scope=\"row\"><label>$label</label></th>
        <td class=\"upme-label\">$content</td>
        </tr>";
    }

    // add setting field
    function add_plugin_setting($type, $id, $label, $pairs, $help, $inline_help = '', $extra=null,$custom_attrs=null) {

        $td_class = '';
        if(isset($custom_attrs['checkbox_type'])){
            $td_class = 'class="upme-admin-inline-checkbox"';
        }

        $field_holder_id = $id . '_holder';
        print "<tr valign=\"top\" id=\"$field_holder_id\">
        <th scope=\"row\"><label for=\"$id\">$label</label></th>
        <td ".$td_class." >";
        $input_html = '';

        // Added hack for edit profile URL.

        $value = '';
        $value = $this->get_value($id);
        
        switch ($type) {

            case 'textarea':
                echo UPME_Html::text_area(array('name' => $id, 'id' => $id, 'class' => 'large-text code text-area', 'value' => $value, 'rows' => '3'));
                break;

            case 'input':
                echo UPME_Html::text_box(array('name' => $id, 'id' => $id, 'value' => $value, 'class' => 'regular-text'));
                break;

            case 'select':
                echo UPME_Html::drop_down(array('name' => $id, 'id' => $id), $pairs, $this->options[$id]);
                break;

            case 'checkbox':
                echo UPME_Html::check_box(array('name' => $id, 'id' => $id, 'value' => '1'), $value);
                break;

            case 'color':
                $default_color = $this->defaults[$id];
                echo UPME_Html::text_box(array('name' => $id, 'id' => $id, 'value' => $value, 'class' => 'my-color-field', 'data-default-color' => $default_color));
                break;

            case 'checkbox_list':
                $selected_roles = $value;
                

                $disabled_roles = array();
                if(isset($custom_attrs['disabled'])){
                    $disabled_roles = $custom_attrs['disabled'];
                }

                foreach ($pairs as $role_key => $role) {
                    if(in_array($role_key, $disabled_roles)){
                        echo UPME_Html::check_box(array('name' => $id.'[]', 'id' => $id, 'value' => $role_key,'checked'=>'checked','disabled'=>'disabled')).$role.'<br/>';            
                    }else{
                        $checked_value = '';
                        if(is_array($selected_roles) && in_array($role_key,$selected_roles)){
                            $checked_value = $role_key;
                        }
                        echo UPME_Html::check_box(array('name' => $id.'[]', 'id' => $id, 'value' => $role_key),$checked_value).$role.'<br/>';            
                    }
                    
                }
                break;
        }

        // Add description for inline checkboxes of parent field
        if(isset($custom_attrs['checkbox_type']) && $custom_attrs['checkbox_type'] == 'inline'){
            print '<span>'.$custom_attrs['message'].'</span>';
        }

        if ($inline_help != '') {
            print '<i class="upme-icon-question-sign upme-tooltip2 option-help" title="' . $inline_help . '"></i>';
        }


        if ($help)
            print "<p class=\"description\">$help</p>";

        if (is_array($extra)) {
            echo "<div class=\"helper-wrap\">";
            foreach ($extra as $a) {
                echo $a;
            }
            echo "</div>";
        }

        print "</td></tr>";
    }

    // save form
    // function saveform() {
    //     //echo "<pre>";print_r($_POST);exit;
    //     foreach ($_POST as $key => $value) {
    //         if ($key != 'submit') {

    //             if (strpos($key, 'upme') !== false) {

    //                 /* Save new fields */
    //                 $array_key = filter_var($key, FILTER_SANITIZE_NUMBER_INT);

    //                 $new_pos = filter_var($_POST['upme_' . $array_key . '_position'], FILTER_SANITIZE_NUMBER_INT);

    //                 $plain_key = str_replace('upme_' . $array_key . '_', '', $key);

    //                 if (!is_array($value)) {
    //                     $form_fields[$new_pos][$plain_key] = stripslashes($value);
    //                 } else {
    //                     $form_fields[$new_pos][$plain_key] = $value;
    //                 }

    //                 if ($plain_key == 'name' && $value != '') {
    //                     $form_fields[$new_pos][$plain_key] = esc_html($value);
    //                 }

    //                 if ($plain_key == 'meta_custom' && $value != '') {
    //                     $form_fields[$new_pos]['meta'] = esc_html($value);
    //                 }

    //                 if ($plain_key == 'icon' && $value != '') {
    //                     $form_fields[$new_pos]['icon'] = $value;
    //                 } else {
    //                     $form_fields[$new_pos]['icon'] = 0;
    //                 }

    //                 if ($plain_key == 'private' && $value == 1) {
    //                     $form_fields[$new_pos]['can_hide'] = 0;
    //                 }

    //                 if ($plain_key == 'show_to_user_role_list') {
    //                     $form_fields[$new_pos]['show_to_user_role_list'] = implode(',', $value);
    //                 }

    //                 if ($plain_key == 'edit_by_user_role_list') {
    //                     $form_fields[$new_pos]['edit_by_user_role_list'] = implode(',', $value);
    //                 }
    //             } else {

    //                 if (strpos($key, 'html_') !== false) {
    //                     $this->options[$key] = stripslashes($value);
    //                 } else {
    //                     $this->options[$key] = esc_attr($value);
    //                 }
    //             }
    //         }
    //     }

    //     if (isset($form_fields) && is_array($form_fields)) {
    //         ksort($form_fields);
    //         update_option('upme_profile_fields', $form_fields);
    //     }
    // }

  

    // save default colors
    function save_default_colors() {
        $alloptions = get_option('upme_options');
        foreach ($this->colorsdefault as $k => $v) {
            $alloptions[$k] = $v;
            $this->options[$k] = $v;
        }
    }

    // update settings
    function update() {

        foreach ($this->option_with_checkbox as $key => $value) {
            if (isset($_GET['tab'])) {
                $current = $_GET['tab'];
            } else {
                $current = $this->default_tab;
            }

            if ($current == 'general') {

                if (!isset($_POST[$value]))
                    $this->options[$value] = '0';
            }
        }

        update_option('upme_options', $this->options);

        $update_cache_link = ' <a href="' . get_admin_url('', 'admin.php?page=upme-search-cache') . '">' . __('Update Now', 'upme') . '</a>';

        echo '<div class="updated"><p><strong>' . __('Settings saved. It is recommended to update your user search cache.', 'upme') . $update_cache_link . '</strong></p></div>';
    }

    // reset settings
    function reset() {
        update_option('upme_options', $this->defaults);
        $this->options = array_merge($this->options, $this->defaults);
        echo '<div class="updated"><p><strong>' . __('Settings are reset to default.', 'upme') . '</strong></p></div>';
    }

    function reset_all($type= '') {
        global $upme;
        update_option('upme_profile_fields', $upme->fields);
        
        $update_cache_link = ' <a href="' . get_admin_url('', 'admin.php?page=upme-search-cache') . '">' . __('Update Now', 'upme') . '</a>';
        
        if('normal' == $type){
            echo '<div class="updated"><p><strong>' . __('Settings are reset to default. It is recommended to update your user search cache.', 'upme') . $update_cache_link . '</strong></p></div>';
        }else{
            echo json_encode(array('status'=> 'success','redirect_to' => admin_url( 'admin.php?page=upme-field-customizer') ));exit;
        }
        
    }

    /* Get admin tabs */

    function admin_tabs($current = null) {
        $tabs = $this->tabs;
        $links = array();
        if (isset($_GET['tab'])) {
            $current = $_GET['tab'];
        } else {
            $current = $this->default_tab;
        }
        foreach ($tabs as $tab => $name) :
            if ($tab == $current) :
                $links[] = "<a class='nav-tab nav-tab-active' href='?page=" . $this->slug . "&tab=$tab'>$name</a>";
            else :
                $links[] = "<a class='nav-tab' href='?page=" . $this->slug . "&tab=$tab'>$name</a>";
            endif;
        endforeach;
        foreach ($links as $link)
            echo $link;
    }

    /* get tab ID and load its content */

    function get_tab_content() {
        $screen = get_current_screen();
        if (strstr($screen->id, $this->slug)) {
            if (isset($_GET['tab'])) {
                $tab = $_GET['tab'];
            } else {
                $tab = $this->default_tab;
            }
            $this->load_tab($tab);
        }
    }

    /* load tab */

    function load_tab($tab) {
        require_once upme_path . 'admin/' . $tab . '.php';
    }

    // add settings
    function settings_page() {

        /**
         * @submit settings page
         */
        if (isset($_POST['submit'])) {
            $this->upme_update_custom_field($_POST,'normal');
            $this->update();
        }

        /* Create a new field */
        if (isset($_POST['upme-add'])) {
            $this->upme_add_custom_field($_POST,'normal');
        }

        /* Trash field */

        if (strtolower($_SERVER['REQUEST_METHOD']) == 'get') {
            if (isset($_GET['trash_field']) && !isset($_POST['submit']) && !isset($_POST['reset-options']) && !isset($_POST['reset-options-fields'])) {
                $fields = get_option('upme_profile_fields');
                $trash = $_GET['trash_field'];
                if (isset($fields[$trash])) {
                    unset($fields[$trash]);
                    update_option('upme_profile_fields', $fields);
                    echo '<div class="updated"><p><strong>' . __('Profile field was sent to Trash.', 'upme') . '</strong></p></div>';
                }
            }
        }


        /**
         * @submit theme reset button
         */
        if (isset($_POST['reset-custom-theme'])) {
            $this->upme_update_custom_field($_POST,'normal');
            $this->save_default_colors();
            $this->update();
        }

        /**
         * @callback to restore all options
         */
        if (isset($_POST['reset-options'])) {
            $this->reset();
        }

        if (isset($_POST['reset-options-fields'])) {
            $this->reset_all('normal');
        }
?>

        <div class="wrap">
            <div id="upme-icon-<?php echo $this->slug; ?>" class="icon32">
                <br />
            </div>
            <h2 class="nav-tab-wrapper">
<?php $this->admin_tabs(); ?>
            </h2>
            <form method="post" action="" id="upme-custom-field-add">
<?php $this->get_tab_content(); ?>
        <p class="submit">
        <?php
        if (get_value('tab') != 'user_cache') {
            echo UPME_Html::button('submit', array(
                'name' => 'submit',
                'id' => 'submit',
                'value' => __('Save Changes', 'upme'),
                'class' => 'button button-primary'
            ));
        }
        ?>
            <?php
            if (isset($_GET['tab'])) {
                $tab = $_GET['tab'];
            } else {
                $tab = $this->default_tab;
            }


            if ($tab == 'customizer') {
                echo UPME_Html::button('submit', array(
                    'name' => 'reset-options-fields',
                    'value' => __('Reset to Default Fields', 'upme'),
                    'class' => 'button button-secondary'
                ));
            }


            if ($tab == 'user_cache') {
                echo UPME_Html::button('button', array(
                    'name' => 'reset-options-fields',
                    'id' => 'upme-update-user-cache',
                    'value' => __('Update User Cache', 'upme'),
                    'class' => 'button button-primary'
                ));
            }
            ?>




        </p>
    </form>
</div>

<?php
        }

        function get_all_pages() {
            if ($this->wp_all_pages === false) {
                $this->wp_all_pages[0] = "Select Page";
                foreach (get_pages () as $key => $value) {
                    $this->wp_all_pages[$value->ID] = $value->post_title;
                }
            }

            return $this->wp_all_pages;
        }

        // Additional user fields

        function upme_user_extra_fields($user) {
            global $predefined, $upme_roles, $upme_profile_fields;

            // Set date format from admin settings
            $upme_settings = get_option('upme_options');
            $upme_date_format = (string) isset($upme_settings['date_format']) ? $upme_settings['date_format'] : 'mm/dd/yy';

            $array = get_option('upme_profile_fields');

            if (current_user_can('edit_user', $user->ID)) {
                $fields = get_option('upme_profile_fields');

                // These are default fields from WP Team
                $exclude_fields = array('rich_editing', 'admin_color', 'comment_shortcuts', 'admin_bar_front', 'user_login', 'first_name', 'last_name', 'nickname', 'display_name', 'email', 'url', 'aim', 'yim', 'jabber', 'description', 'pass1', 'pass2', 'user_pass_confirm', 'user_pass', 'user_email', 'user_url');

                if (count($fields) > 0) {
                    echo "<h3>".__('UPME Fields','upme')."</h3>";

                    echo '<table class="form-table">';
                    echo '<tbody>';

                    $logged_in_user = 0;
                    if (is_user_logged_in ()) {
                        $current_user = wp_get_current_user();
                        if (($current_user instanceof WP_User)) {
                            $logged_in_user = $current_user->ID;
                        }
                    }
                    
                    $upme_roles->upme_get_user_roles_by_id($user->ID);

                    /* Add mandatory profile fields, which are not avaiable in custom fields section */
                    $display = $upme_profile_fields->upme_backend_mandatory_fields($upme_settings,$user);
                    echo $display;
                    

                    foreach ($fields as $key => $value) {
                        //echo "<pre>";
                        //print_r($fields);
                        //exit;

                        $show_to_user_role = isset($value['show_to_user_role']) ? $value['show_to_user_role'] : '0';
                        $show_to_user_role_list = isset($value['show_to_user_role_list']) ? $value['show_to_user_role_list'] : '';

                        $upme_roles->upme_get_user_roles_by_id($user->ID);
                        $show_field_status = $upme_roles->upme_empty_fields_by_user_role($show_to_user_role, $show_to_user_role_list);

                        $edit_by_user_role = isset($value['edit_by_user_role']) ? $value['edit_by_user_role'] : '0';
                        $edit_by_user_role_list = isset($value['edit_by_user_role_list']) ? $value['edit_by_user_role_list'] : '';

                        $upme_roles->upme_get_user_roles_by_id($user->ID);
                        $edit_field_status = $upme_roles->upme_fields_by_user_role($edit_by_user_role, $edit_by_user_role_list);

                        // Hiding fields based on show by user role setting
                        if (current_user_can('manage_options') && $show_field_status) {
                            $display_show_status = true;
                        } else if (!$show_field_status) {
                            $display_show_status = false;
                        } else {
                            $display_show_status = true;
                        }


                        // Disabling fields based on editable by user role setting
                        if (current_user_can('manage_options') && $edit_field_status) {
                            $display_edit_status = true;
                        } else if (!$edit_field_status) {
                            $display_edit_status = false;
                        } else {
                            $display_edit_status = true;
                        }



                        if($display_show_status){
                        
                        // field should not be separator and should be from exclude field
                        if ($value['type'] == 'usermeta' && isset($value['meta']) && !in_array($value['meta'], $exclude_fields) && $value['field'] != 'fileupload') {
                            echo '<tr>';
                            echo '<th scope="row"><label for="' . $value['meta'] . '">' . $value['name'] . '</label></th>';

                            // Checking if field should be editable or not
                            // For admin always allow
                            if (current_user_can('manage_options')) {
                                $disabled = null;
                            } 
                            else if(!$display_edit_status){
                                $disabled = 'disabled="disabled"';
                            }
                            else {
                                $disabled = null;
                            }


                            switch ($value['field']) {
                                case 'textarea':
                                    $params = array('meta'=>$value['meta'],'id' => $user->ID);
                                    $custom_editor_styles = apply_filters('upme_text_editor_styles','',$params);

                                    echo '<td><textarea ' . $disabled . ' name="upme[' . $value['meta'] . ']" id="' . $value['meta'] . '" rows="5" cols="30" class="'.$custom_editor_styles.'">' . get_the_author_meta($value['meta'], $user->ID) . '</textarea></td>';
                                    break;

                                case 'text':
                                    echo '<td><input type="text" ' . $disabled . ' name="upme[' . $value['meta'] . ']" id="' . $value['meta'] . '" value="' . esc_attr(get_the_author_meta($value['meta'], $user->ID)) . '" class="regular-text"></td>';
                                    break;

                                case 'datetime':
                                    $formatted_date_value = upme_date_format_to_custom(esc_attr(get_the_author_meta($value['meta'], $user->ID)), $upme_date_format);
                                    echo '<td><input readonly="readonly" type="text" ' . $disabled . ' name="upme[' . $value['meta'] . ']" id="' . $value['meta'] . '" value="' . $formatted_date_value . '" class="regular-text upme-datepicker"></td>';
                                    break;

                                case 'select':
                                    $loop = array();
                                    if (isset($value['predefined_loop']) && $value['predefined_loop'] != '' && $value['predefined_loop'] != '0') {
                                        $loop = $predefined->get_array($value['predefined_loop']);
                                        if('countries' == $array[$key]['predefined_loop']){
                                            array_shift($loop);
                                        } 

                                    } else if (isset($value['choices']) && $value['choices'] != '') {
                                        $loop = explode(PHP_EOL, $value['choices']);
                                    }

                                    // Check for country loop
                                    $country_loop_status = isset($value['predefined_loop']) ? $value['predefined_loop'] : '';
                                    $profile_user_meta = get_the_author_meta($value['meta'], $user->ID);
                                    if('' == $profile_user_meta && '' != $country_loop_status && 'countries' == $country_loop_status){
                                        
                                        $profile_user_meta = $loop[$upme_settings['default_predefined_country']];
                                    }

                                    $display = '';
                                    if (count($loop) > 0) {
                                        $display .= '<td><select ' . $disabled . ' class="input" name="upme[' . $value['meta'] . ']" id="' . $value['meta'] . '">';
                                        $display .= '<option value="" ' . selected($profile_user_meta, "", 0) . '>' . __('Please Select', 'upme') . '</option>';
                                        foreach ($loop as $option) {
                                            $option = trim($option);

                                            $display .= '<option value="' . $option . '" ' . selected($profile_user_meta, $option, 0) . '>' . $option . '</option>';
                                        }
                                        $display .= '</select></td>';
                                    }
                                    echo $display;

                                    break;

                                case 'radio':
                                    $display = '';
                                    if (isset($value['choices'])) {
                                        $loop = explode(PHP_EOL, $value['choices']);
                                    }

                                    if (isset($loop) && $loop[0] != '') {
                                        $counter = 0;
                                        $display.='<td>';
                                        foreach ($loop as $option) {

                                            if ($counter > 0)
                                                $required_class = '';

                                            // Added as per http://codecanyon.net/item/user-profiles-made-easy-wordpress-plugin/discussion/4109874?filter=All+Discussion&page=27#comment_4352415
                                            $option = trim($option);

                                            $display.='<label for="' . $value['meta'] . '_' . $counter . '">';

                                            $display.='<input ' . $disabled . ' name="upme[' . $value['meta'] . ']" id="' . $value['meta'] . '_' . $counter . '" type="radio" value="' . $option . '"';

                                            $values = explode(', ', get_the_author_meta($value['meta'], $user->ID));

                                            if ($option == get_the_author_meta($value['meta'], $user->ID)) {
                                                $display .= ' checked="checked"';
                                            }
                                            $display.='>&nbsp;&nbsp;';

                                            $display.=$option;
                                            $display.='</label>';

                                            $display.='<br />';

                                            $counter++;
                                        }
                                        $display.='</td>';
                                        unset($loop);
                                    }

                                    echo $display;


                                    break;

                                case 'checkbox':

                                    $display = '';
                                    if (isset($value['choices'])) {
                                        $loop = explode(PHP_EOL, $value['choices']);
                                    }

                                    if (isset($loop) && $loop[0] != '') {
                                        $counter = 0;
                                        $display.='<td>';
                                        foreach ($loop as $option) {

                                            if ($counter > 0)
                                                $required_class = '';

                                            // Added as per http://codecanyon.net/item/user-profiles-made-easy-wordpress-plugin/discussion/4109874?filter=All+Discussion&page=27#comment_4352415
                                            $option = trim($option);

                                            $display.='<label for="' . $value['meta'] . '_' . $counter . '">';

                                            $display.='<input ' . $disabled . ' name="upme[' . $value['meta'] . '][]" id="' . $value['meta'] . '_' . $counter . '" type="checkbox" value="' . $option . '"';

                                            $values = explode(', ', get_the_author_meta($value['meta'], $user->ID));
                                            if (in_array($option, $values)) {
                                                $display .= ' checked="checked"';
                                            }
                                            $display.='>&nbsp;&nbsp;';

                                            $display.=$option;
                                            $display.='</label>';

                                            $display.='<br />';

                                            $counter++;
                                        }
                                        $display.='</td>';
                                        unset($loop);
                                    }

                                    echo $display;

                                    break;

                                case 'video':
                                    echo '<td><input type="text" ' . $disabled . ' name="upme[' . $value['meta'] . ']" id="' . $value['meta'] . '" value="' . esc_attr(get_the_author_meta($value['meta'], $user->ID)) . '" class="regular-text"></td>';
                                    break;


                                case 'soundcloud':
                                    echo '<td><input type="text" ' . $disabled . ' name="upme[' . $value['meta'] . ']" id="' . $value['meta'] . '" value="' . esc_attr(get_the_author_meta($value['meta'], $user->ID)) . '" class="regular-text"></td>';
                                    break;

                                default:
                                    break;
                            }

                            echo '</tr>';
                        }
                        }
                    }

                    echo '</tbody>';
                    echo '</table>';
                }
            }
        }

        function upme_save_user_extra_fields($user_id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['upme']) && is_array($_POST['upme']) && count($_POST['upme']) > 0) {
                    // Set date format from admin settings
                    $upme_settings = get_option('upme_options');
                    $upme_date_format = (string) isset($upme_settings['date_format']) ? $upme_settings['date_format'] : 'mm/dd/yy';


                    // Get profile fields
                    $profile_fields = get_option('upme_profile_fields');

                    // Get list of dattime fields
                    $date_time_fields = array();
                    // Get list of required fields
                    $required_fields = array();

                    foreach ($profile_fields as $key => $field) {
                        $field_settings = $field;
                        extract($field);

                        // Filter date/time custom fields
                        if (isset($profile_fields[$key]['field']) && $profile_fields[$key]['field'] == 'datetime') {
                            array_push($date_time_fields, $profile_fields[$key]['meta']);
                        }
                        if(isset($profile_fields[$key]['required']) && $profile_fields[$key]['required'] == '1'){
                            $required_fields[$profile_fields[$key]['meta']] = $field_settings;
                        }
                    }

                    foreach ($_POST['upme'] as $key => $value) {

                        // Validation for required fields
                        if (array_key_exists($key, $required_fields)) {

                            switch ($required_fields[$key]['field']) {
                                case 'text':
                                case 'textarea':
                                case 'datetime':
                                case 'select':
                                case 'fileupload':
                                case 'password':
                                case 'video':
                                case 'soundcloud':
                                
                                    if('' == trim($value)){
                                        $this->errors[] = __($required_fields[$key]['name'],'upme'). __(' is required.','upme');
                                    }
                                    break;

                                case 'radio':
                                case 'checkbox':
                                    
                                    break;
                                
                                default:
                                    # code...
                                    break;
                            }
                            
                        }
                        //$this->errors[]

                        if(!(isset($this->errors) && count($this->errors) > 0)){                    
                        

                            if (is_array($value))
                                $value = implode(', ', $value);

                            if (in_array($key, $date_time_fields)) {
                                if('' != $value){
                                    $formatted_date = upme_date_format_to_standerd($value, $upme_date_format);
                                    $value = $formatted_date;
                                }
                            }

                            /* UPME action for executing custom functionality before saving a field */
                            do_action('upme_before_save_backend_field_'.$key,$key,$value,$user_id);
                            // End Action

                            // To Do Need to check for adding new meta when it was not same as old
                            update_user_meta($user_id, $key, $value);

                            /* UPME action for executing custom functionality after saving a field */
                            do_action('upme_after_save_backend_field_'.$key,$key,$value,$user_id);
                            // End Action

                            if($key == 'upme_user_profile_status'){
                                /* UPME action for executing custom functionality after saving a field */
                                do_action('upme_user_profile_status_update',$key,$value,$user_id);
                                // End Action
                            }

                        }
                    }
                    

                    if(!(isset($this->errors) && count($this->errors) > 0)){
                        // Save core WordPress fields to user meta table
                        update_user_meta($user_id, 'first_name', isset($_POST['first_name']) ? $_POST['first_name'] : '');
                        update_user_meta($user_id, 'last_name', isset($_POST['last_name']) ? $_POST['last_name'] : '');
                        if(isset($_POST['user_email']) && '' != $_POST['user_email']){
                            update_user_meta($user_id, 'user_email', $_POST['user_email']);
                        }                    
                        
                        upme_update_user_cache($user_id);
                    }
                }
            }
        }

        // Get the icon names of font awesome from stylesheet
        function list_font_awesome_icons() {

            $icons = array("glass", "music", "search", "envelope-alt", "heart", "star", "star-empty", "user", "film",
                "th-large", "th", "th-list", "ok", "remove", "zoom-in", "zoom-out", "off", "signal", "cog", "trash", "home",
                "file-alt", "time", "road", "download-alt", "download", "upload", "inbox", "play-circle", "repeat", "refresh",
                "list-alt", "lock", "flag", "headphones", "volume-off", "volume-down", "volume-up", "qrcode", "barcode", "tag",
                "tags", "book", "bookmark", "print", "camera", "font", "bold", "italic", "text-height", "text-width",
                "align-left", "align-center", "align-right", "align-justify", "list", "indent-left", "indent-right",
                "facetime-video", "picture", "pencil", "map-marker", "adjust", "tint", "edit", "share", "check", "move",
                "step-backward", "fast-backward", "backward", "play", "pause", "stop", "forward", "fast-forward", "step-forward",
                "eject", "chevron-left", "chevron-right", "plus-sign", "minus-sign", "remove-sign", "ok-sign", "question-sign",
                "info-sign", "screenshot", "remove-circle", "ok-circle", "ban-circle", "arrow-left", "arrow-right", "arrow-up", "arrow-down",
                "share-alt", "resize-full", "resize-small", "plus", "minus", "asterisk", "exclamation-sign", "gift", "leaf", "fire", "eye-open",
                "eye-close", "warning-sign", "plane", "calendar", "random", "comment", "magnet", "chevron-up", "chevron-down", "retweet",
                "shopping-cart", "folder-close", "folder-open", "resize-vertical", "resize-horizontal", "bar-chart", "twitter-sign",
                "facebook-sign", "camera-retro", "key", "cogs", "comments", "thumbs-up-alt", "thumbs-down-alt", "star-half", "heart-empty",
                "signout", "linkedin-sign", "pushpin", "external-link", "signin", "trophy", "github-sign", "upload-alt", "lemon", "phone",
                "check-empty", "bookmark-empty", "phone-sign", "twitter", "facebook", "github", "unlock", "credit-card", "rss", "hdd", "bullhorn",
                "bell", "certificate", "hand-right", "hand-left", "hand-up", "hand-down", "circle-arrow-left", "circle-arrow-right",
                "circle-arrow-up", "circle-arrow-down", "globe", "wrench", "tasks", "filter", "briefcase", "fullscreen", "group", "link", "cloud",
                "beaker", "cut", "copy", "paper-clip", "save", "sign-blank", "reorder", "list-ul", "list-ol", "strikethrough", "underline", "table",
                "magic", "truck", "pinterest", "pinterest-sign", "google-plus-sign", "google-plus", "money", "caret-down", "caret-up", "caret-left",
                "caret-right", "columns", "sort", "sort-down", "sort-up", "envelope", "linkedin", "undo", "legal", "dashboard", "comment-alt",
                "comments-alt", "bolt", "sitemap", "umbrella", "paste", "lightbulb", "exchange", "cloud-download", "cloud-upload", "user-md",
                "stethoscope", "suitcase", "bell-alt", "coffee", "food", "file-text-alt", "building", "hospital", "ambulance", "medkit", "fighter-jet",
                "beer", "h-sign", "plus-sign-alt", "double-angle-left", "double-angle-right", "double-angle-up", "double-angle-down", "angle-left",
                "angle-right", "angle-up", "angle-down", "desktop", "laptop", "tablet", "mobile-phone", "circle-blank", "quote-left", "quote-right",
                "spinner", "circle", "reply", "github-alt", "folder-close-alt", "folder-open-alt", "expand-alt", "collapse-alt", "smile", "frown", "meh",
                "gamepad", "keyboard", "flag-alt", "flag-checkered", "terminal", "code", "reply-all", "mail-reply-all", "star-half-empty",
                "location-arrow", "crop", "code-fork", "unlink", "question", "info", "exclamation", "superscript", "subscript", "eraser", "puzzle-piece",
                "microphone", "microphone-off", "shield", "calendar-empty", "fire-extinguisher", "rocket", "maxcdn", "chevron-sign-left",
                "chevron-sign-right", "chevron-sign-up", "chevron-sign-down", "html5", "css3", "anchor", "unlock-alt", "bullseye", "ellipsis-horizontal",
                "ellipsis-vertical", "rss-sign", "play-sign", "ticket", "minus-sign-alt", "check-minus", "level-up", "level-down", "check-sign",
                "edit-sign", "external-link-sign", "share-sign", "compass", "collapse", "collapse-top", "expand", "eur", "gbp", "usd", "inr", "jpy", "cny",
                "krw", "btc", "file", "file-text", "sort-by-alphabet", "sort-by-alphabet-alt", "sort-by-attributes", "sort-by-attributes-alt",
                "sort-by-order", "sort-by-order-alt", "thumbs-up", "thumbs-down", "youtube-sign", "youtube", "xing", "xing-sign", "youtube-play",
                "dropbox", "stackexchange", "instagram", "flickr", "adn", "bitbucket", "bitbucket-sign", "tumblr", "tumblr-sign", "long-arrow-down",
                "long-arrow-up", "long-arrow-left", "long-arrow-right", "apple", "windows", "android", "linux", "dribbble", "skype", "foursquare",
                "trello", "female", "male", "gittip", "sun", "moon", "archive", "bug", "vk", "weibo", "renren");

            return $icons;
        }

        function upme_update_user_cache() {
            global $wpdb;

            $limit = 10;

            $user_query = "SELECT ID FROM " . $wpdb->users . " ORDER BY ID ASC LIMIT " . esc_sql(post_value('last_user')) . ',' . $limit;

            $users = $wpdb->get_results($user_query, 'ARRAY_A');

            $count = 0;
            $last_processed_id = post_value('last_user');

            foreach ($users as $key => $value) {
                upme_update_user_cache($value['ID']);
                $last_processed_id++;
                $count++;
            }

            if ($count < $limit) {
                echo "completed";
            } else {
                echo $last_processed_id;
            }

            die;
        }
        
                function upme_save_settings()
        {
            $this->checkbox_options = array(
                    'upme-general-settings-form' => array('lightbox_avatar_cropping','ajax_profile_field_save'),
                    'upme-profile-settings-form' => array('link_author_posts_page', 'show_separator_on_profile', 
                            'show_empty_field_on_profile','show_recent_user_posts','show_feature_image_posts',
                            'profile_view_status','display_profile_status'),
                    'upme-system-pages-form' => array(),
                    'upme-redirect-setting-form' => array('redirect_backend_profile', 'redirect_backend_login', 'redirect_backend_registration'),
                    'upme-registration-option-form' => array('select_user_role_in_registration','choose_roles_for_registration'),
                    'upme-search-settings-form' => array('use_cron','require_search_input'),
                    'upme-privacy-option-form' => array('choose_roles_for_view_profile'),
                    'upme-misc-messages-form' => array('html_login_to_view_form','html_user_login_message_form','html_private_content_form'),
                    'upme-scripts-styles-form' => array('disable_fancybox_script_styles')
            );
        
            $current_options = get_option('upme_options');
        
            parse_str($_POST['data'], $setting_data);
        
            foreach($setting_data as $key=>$value)
                $current_options[$key]=$value;
        
            if(count($this->checkbox_options[post_value('current_tab')]) > 0)
            {
        
                foreach($this->checkbox_options[post_value('current_tab')] as $key=>$value)
                {
                    if(!array_key_exists($value, $setting_data))
                        $current_options[$value]='0';
                }
            }

            flush_rewrite_rules(); 

            if($current_options['choose_roles_for_registration'] == 0){
                $current_options['choose_roles_for_registration'] = '';
            }

            if($current_options['choose_roles_for_view_profile'] == 0){
                $current_options['choose_roles_for_view_profile'] = '';
            }
            
            update_option('upme_options', $current_options);
            echo "success"; die;
        }
        
        
        function upme_reset_settings()
        {
            if(is_post() && is_in_post('current_tab'))
            {
                if(isset($this->default_settings[post_value('current_tab')]))
                {
                    $current_options = get_option('upme_options');

                    foreach($this->default_settings[post_value('current_tab')] as $key=>$value)
                        $current_options[$key] = $value;
                    
                    update_option('upme_options', $current_options);
                    echo "success"; die;
                }
            }
        }

        // List the fields allowed to be set as the display title of the profile
        function upme_profile_title_fields(){
            $fields = get_option('upme_profile_fields');
            $text_fields = array();

            $combined_name_options = 0;
            $label_first_name = '';
            $label_last_name = '';


            foreach ($fields as $key => $field_data) {
                if(isset($field_data['field']) && 'text' == $field_data['field']){
                    $text_fields[$field_data['meta']] = $field_data['name'];
                }

                if( 'first_name' == $field_data['meta'] ){
                    $label_first_name = $field_data['name'];
                    $combined_name_options++;
                }
                if( 'last_name' == $field_data['meta']){
                    $label_last_name = $field_data['name'];
                    $combined_name_options++;
                }
            }

            if(2 == $combined_name_options){
                $text_fields['combined_fname_lname'] = $label_first_name . " " . $label_last_name;
                $text_fields['combined_lname_fname'] = $label_last_name . ", " . $label_first_name;
            }

            return $text_fields;
        }


        /* ==  Customizing the user list with new columns and actions ==  */

        function upme_user_action_buttons() {
            $screen = get_current_screen();
            if ( $screen->id != "users" )   // Only add to users.php page
                return;
            ?>
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $('<option>').val('upme_act_user').text('Activate Profile').appendTo("select[name='action']");
                    $('<option>').val('upme_apr_user').text('Approve Profile').appendTo("select[name='action']");
                });
            </script>
            <?php
        }

        function upme_users_page_loaded() {
            if(isset($_GET['action']) && $_GET['action'] === 'upme_act_user') { 
                $act_users = isset($_GET['users']) ? $_GET['users'] : '';  
                if ('' != $act_users) {  
                    foreach ($act_users as $act_user) {
                        update_user_meta($act_user, 'upme_activation_status', 'ACTIVE'); 
                        upme_update_user_cache($act_user);
                    }
                    
                }
            }else if(isset($_GET['action']) && $_GET['action'] === 'upme_apr_user') { 
                $apr_users = isset($_GET['users']) ? $_GET['users'] : '';  
                if ('' != $apr_users) { 

                    $current_option = get_option('upme_options');
                    $link = get_permalink($current_option['login_page_id']);

                    foreach ($apr_users as $apr_user) {
                        update_user_meta($apr_user, 'upme_approval_status', 'ACTIVE'); 
                        upme_update_user_cache($apr_user);
                        upme_admin_approval_notification($apr_user,$link);
                    }
                    
                }
            }
        }

        function upme_bulk_admin_notices(){
            $screen = get_current_screen();
            if ( $screen->id != "users" )   // Only add to users.php page
                return;

            $message = '';

            if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'upme_act_user') {
                $act_users = isset($_GET['users']) ? $_GET['users'] : '';  
                if ('' != $act_users) { 
                    $message = __( 'Users activated successfully.','upme');

                }else{
                    $message = __( 'Select users for activation.','upme');
                }

            }else if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'upme_apr_user') {
                $apr_users = isset($_GET['users']) ? $_GET['users'] : '';  
                if ('' != $apr_users) { 
                    $message = __( 'Users profile approved successfully.','upme');
                }else{
                    $message = __( 'Select users for approval.','upme');
                }
            }

            if('' != $message){
                $html = '<div class="updated">
                            <p>'.$message.'</p>
                        </div>';
                echo $html; 
            }
            
        }

        /* Adding approval and activation status columns to user list */
        function upme_manage_user_custom_columns( $column ) {
            $column['upme_apr_status'] = __('Approval Status','upme');
            $column['upme_act_status'] = __('Activation Status','upme');
         
            return $column;
        }

        function upme_manage_user_custom_column_values( $val, $column_name, $user_id ) {

            $user_activation_status = get_user_meta( $user_id , 'upme_activation_status', TRUE);
            $user_approval_status = get_user_meta( $user_id , 'upme_approval_status', TRUE);
         
            switch ($column_name) {
                case 'upme_apr_status' :
                    return $user_approval_status;
                    break;
         
                case 'upme_act_status' :
                    return $user_activation_status;
                    break;
         
                default:
            }
        }

        function upme_users_sortable_columns( $columns ) {
            $columns['upme_apr_status'] = 'upme_apr_status';
            $columns['upme_act_status'] = 'upme_act_status';
            return $columns;
        }

        function upme_users_orderby_filters($userquery){ 
            global $wpdb;
            if('upme_act_status'==$userquery->query_vars['orderby']) {

                $userquery->query_from .= " LEFT OUTER JOIN $wpdb->usermeta AS wpusermeta ON ($wpdb->users.ID = wpusermeta.user_id) ";
                $userquery->query_where .= " AND wpusermeta.meta_key = 'upme_activation_status' ";
                $userquery->query_orderby = " ORDER BY wpusermeta.meta_value ".($userquery->query_vars["order"] == "ASC" ? "asc " : "desc ");
            
            }else if('upme_apr_status'==$userquery->query_vars['orderby']){

                $userquery->query_from .= " LEFT OUTER JOIN $wpdb->usermeta AS wpusermeta ON ($wpdb->users.ID = wpusermeta.user_id) ";
                $userquery->query_where .= " AND wpusermeta.meta_key = 'upme_approval_status' ";
                $userquery->query_orderby = " ORDER BY wpusermeta.meta_value  ".($userquery->query_vars["order"] == "ASC" ? "asc " : "desc ");
            
            }
        }

        function upme_ajax_update_custom_field(){

            $field_options = esc_sql($_POST['field_options']) ; 
            parse_str($field_options,$field_options);
            $this->upme_update_custom_field($field_options,'ajax');
        }

        /* Update settings for custom fields */
        function upme_update_custom_field($field_options,$type){            
           
            foreach ($field_options as $key=>$value) {
 
                if ($key != 'submit') {

                    if (strpos($key, 'upme') !== false) {

                        /* Save new fields */
                        $array_key = filter_var($key, FILTER_SANITIZE_NUMBER_INT);

                        $new_pos = filter_var($field_options['upme_' . $array_key . '_position'], FILTER_SANITIZE_NUMBER_INT);

                        $plain_key = str_replace('upme_' . $array_key . '_', '', $key);

                        if (!is_array($value)) {
                            $form_fields[$new_pos][$plain_key] = stripslashes($value);
                        } else {
                            $form_fields[$new_pos][$plain_key] = $value;
                        }

                        if ($plain_key == 'name' && $value != '') {
                            $form_fields[$new_pos][$plain_key] = esc_html($value);
                        }

                        if ($plain_key == 'meta_custom' && $value != '') {
                            $form_fields[$new_pos]['meta'] = esc_html($value);
                        }

                        if ($plain_key == 'icon' && $value != '') {
                            $form_fields[$new_pos]['icon'] = $value;
                        } else {
                            $form_fields[$new_pos]['icon'] = 0;
                        }

                        if ($plain_key == 'private' && $value == 1) {
                            $form_fields[$new_pos]['can_hide'] = 0;
                        }

                        if ($plain_key == 'show_to_user_role_list') {
                            $form_fields[$new_pos]['show_to_user_role_list'] = implode(',', $value);
                        }

                        if ($plain_key == 'edit_by_user_role_list') {
                            $form_fields[$new_pos]['edit_by_user_role_list'] = implode(',', $value);
                        }
                    } else {

                        if (strpos($key, 'html_') !== false) {
                            $this->options[$key] = stripslashes($value);
                        } else {
                            $this->options[$key] = esc_attr($value);
                        }
                    }
                }
            }

            if (isset($form_fields) && is_array($form_fields)) {
                ksort($form_fields);
                update_option('upme_profile_fields', $form_fields);
            }

            if('ajax' == $type){
                echo json_encode(array('status'=>'success'));exit;
            }
        }

        function upme_ajax_create_custom_field(){

            $field_options = esc_sql($_POST['field_options']) ; 
            parse_str($field_options,$field_options);
            $this->upme_add_custom_field($field_options,'ajax');
        }

        function upme_add_custom_field($field_options,$type) {
            $current = get_option('upme_profile_fields');
            
            foreach ($field_options as $key => $value) {
                if ($key != 'upme-add') {
                    if (strpos($key, 'up_') !== false) {

                        $plain_key = str_replace('up_', '', $key);

                        //Error handling
                        if ($plain_key == 'position') {
                            if ($field_options[$key] != '' && !is_numeric($field_options[$key])) {
                                $this->errors[] = __('Position must be a number.', 'upme');
                            } /* elseif (isset($current[$_POST[$key]])) {
                              $this->errors[] = __('A field that has the same position already exists.','upme');
                              } */
                        }

                        if ($plain_key == 'name') {
                            if (esc_attr($field_options[$key]) == '') {
                                $this->errors[] = __('Please enter a label/name for your field.', 'upme');
                            }
                        }

                        if ($plain_key == 'meta') {
                            if ($field_options[$key] == '' && $field_options['up_meta_custom'] == '' && $field_options['up_type'] == 'usermeta') {
                                $this->errors[] = __('You must specify a usermeta / custom field.', 'upme');
                            }
                            else if($field_options[$key] != '') {
                                foreach($current as $k=>$v) {
                                    if(isset($v['meta'])){
                                        if($v['meta'] == $field_options[$key]) {
                                            $this->errors[] = __('A profile field with this meta key already exists, please use a unique meta key.', 'upme');
                                            break;
                                        }
                                    }                                
                                }
                            }
                        }

                        if ($plain_key == 'meta_custom') {
                            if (esc_attr($field_options[$key]) == '' && $field_options['up_meta'] == '' && $field_options['up_type'] == 'usermeta') {
                                $this->errors[] = __('You must specify a usermeta / custom field.', 'upme');
                            } elseif (strpos($field_options[$key], ' ')) {
                                $this->errors[] = __('Invalid usermeta / custom field.', 'upme');
                            } elseif($field_options[$key] != '') {
                                foreach($current as $k=>$v) {
                                    if(isset($v['meta'])){
                                        if($v['meta'] == $field_options[$key]) {
                                            $this->errors[] = __('A profile field with this meta key already exists, please use a unique meta key.', 'upme');
                                            break;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            /* Show any errors */
            if (isset($this->errors) && count($this->errors) > 0) {
                $message = '<div class="error upme_field_add_msg"><p>' . $this->errors[0] . '</p></div>';
            } else {

                /* Force a position */
                if (!$field_options['up_position']) {
                    $field_options['up_position'] = max(array_keys($current)) + 10;
                }

                $current[$field_options['up_position']]['position'] = $field_options['up_position'];

                /* Update fields */
                if ($field_options['up_type'] == 'separator') {

                    $current[$field_options['up_position']]['type'] = $field_options['up_type'];
                    $current[$field_options['up_position']]['name'] = esc_html($field_options['up_name']);
                    //$current[$_POST['up_position']]['private'] = $_POST['up_private'];
                    $current[$field_options['up_position']]['show_in_register'] = $field_options['up_show_in_register'];
                    $current[$field_options['up_position']]['deleted'] = 0;

                    $current[$field_options['up_position']]['show_to_user_role'] = $field_options['up_show_to_user_role'];
                    $current[$field_options['up_position']]['edit_by_user_role'] = $field_options['up_edit_by_user_role'];

                    // Save user roles which has permission for view and edit the field
                    if (isset($field_options['up_show_to_user_role_list']) && is_array($field_options['up_show_to_user_role_list'])) {
                        $current[$field_options['up_position']]['show_to_user_role_list'] = implode(',', $field_options['up_show_to_user_role_list']);
                    }
                    if (isset($field_options['up_edit_by_user_role_list']) && is_array($field_options['up_edit_by_user_role_list'])) {
                        $current[$field_options['up_position']]['edit_by_user_role_list'] = implode(',', $field_options['up_edit_by_user_role_list']);
                    }

                    if ($field_options['up_meta_custom'] != '') {
                        $current[$field_options['up_position']]['meta'] = esc_html($field_options['up_meta_custom']);
                    } else {
                        $current[$field_options['up_position']]['meta'] = $field_options['up_meta'];
                    }


                    $current[$field_options['up_position']]['help_text'] = esc_html($field_options['up_help_text']);
                } else {

                    $current[$field_options['up_position']]['type'] = $field_options['up_type'];
                    $current[$field_options['up_position']]['name'] = esc_html($field_options['up_name']);
                    $current[$field_options['up_position']]['social'] = $field_options['up_social'];
                    $current[$field_options['up_position']]['can_hide'] = $field_options['up_can_hide'];
                    $current[$field_options['up_position']]['field'] = $field_options['up_field'];
                    $current[$field_options['up_position']]['can_edit'] = $field_options['up_can_edit'];
                    if ($field_options['up_meta_custom'] != '') {
                        $current[$field_options['up_position']]['meta'] = esc_html($field_options['up_meta_custom']);
                    } else {
                        $current[$field_options['up_position']]['meta'] = $field_options['up_meta'];
                    }
                    $current[$field_options['up_position']]['private'] = $field_options['up_private'];
                    $current[$field_options['up_position']]['required'] = $field_options['up_required'];
                    $current[$field_options['up_position']]['icon'] = isset($field_options['up_icon']) ? $field_options['up_icon'] : '0' ;
                    $current[$field_options['up_position']]['allow_html'] = $field_options['up_allow_html'];
                    $current[$field_options['up_position']]['deleted'] = 0;
                    $current[$field_options['up_position']]['show_to_user_role'] = $field_options['up_show_to_user_role'];
                    $current[$field_options['up_position']]['edit_by_user_role'] = $field_options['up_edit_by_user_role'];

                    // Save user roles which has permission for view and edit the field
                    if (isset($field_options['up_show_to_user_role_list']) && is_array($field_options['up_show_to_user_role_list'])) {
                        $current[$field_options['up_position']]['show_to_user_role_list'] = implode(',', $field_options['up_show_to_user_role_list']);
                    }
                    if (isset($field_options['up_edit_by_user_role_list']) && is_array($field_options['up_edit_by_user_role_list'])) {
                        $current[$field_options['up_position']]['edit_by_user_role_list'] = implode(',', $field_options['up_edit_by_user_role_list']);
                    }

                    if ($field_options['up_private'] == 1) {
                        $current[$field_options['up_position']]['can_hide'] = 0;
                    }

                    if ($field_options['up_field'] != 'fileupload') {
                        $current[$field_options['up_position']]['show_in_register'] = $field_options['up_show_in_register'];
                    }

                    $current[$field_options['up_position']]['help_text'] = esc_html($field_options['up_help_text']);
                }

                /* Done */
                ksort($current);

                update_option('upme_profile_fields', $current);

                $current_user = wp_get_current_user();
                // Updating User Meta for Admin User
                add_user_meta($current_user->ID, $current[$field_options['up_position']]['meta'], '', false);

                $update_cache_link = ' <a href="' . get_admin_url('', 'admin.php?page=upme-search-cache') . '">' . __('Update Now', 'upme') . '</a>';


                $ajax_additional_msg = '';
                if('ajax' == $type){
                    $ajax_additional_msg = __('.Click <a href="'.get_admin_url('', 'admin.php?page=upme-field-customizer').'"><strong>Here</strong></a> to refresh the fields list after creating all fields.','upme');
                }
                $message = '<div class="updated upme_field_add_msg"><p><strong>' . __('Profile field added. It is recommended to update your user search cache.', 'upme') . $update_cache_link . '</strong>'.$ajax_additional_msg.'</p></div>';
            
            }

            

            if('ajax' == $type){
                echo json_encode(array('status'=>'success','msg'=>$message));exit;
            }else{
                echo $message;
            }
        }


        function upme_profile_update_errors($errors, $update, $user){
            foreach ($this->errors as $key=>$value) {
                $errors->add($key,$value);
            }   
        }
    }

    $upme_admin = new UPME_Admin();