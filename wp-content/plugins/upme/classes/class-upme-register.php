<?php

class UPME_Register {

    function __construct() {
        add_action('init', array($this, 'handle_init'));
        add_action('init', array($this, 'upme_password_nag_handler'));
             
    }

    /* Prepare user meta */

    function prepare($array) {
        foreach ($array as $k => $v) {
            if ($k == 'upme-register')
                continue;
            $this->usermeta[$k] = $v;
        }
        return $this->usermeta;
    }

    /* Handle/return any errors */

    function handle() {
        global $upme_captcha_loader;
        require_once(ABSPATH . 'wp-includes/pluggable.php');

        if (get_option('users_can_register') == '1') {
            foreach ($this->usermeta as $key => $value) {

                /* Validate username */
                if ($key == 'user_login') {

                    /* UPME Action for validating username before creating new user */
                    do_action('upme_validate_username',$value);
                    // End Action

                    if (esc_attr($value) == '') {
                        $this->errors[] = __('Please enter a username.', 'upme');
                    } elseif (username_exists($value)) {
                        $this->errors[] = __('This username is already registered. Please choose another one.', 'upme');
                    }
                }

                /* Validate email */
                if ($key == 'user_email') {
                    if (esc_attr($value) == '') {
                        $this->errors[] = __('Please type your e-mail address.', 'upme');
                    } elseif (!is_email($value)) {
                        $this->errors[] = __('The email address isn\'t correct.', 'upme');
                    } elseif (email_exists($value)) {
                        $this->errors[] = __('This email is already registered, please choose another one.', 'upme');
                    }
                }
            }

            if (!is_in_post('no_captcha', 'yes')) {
                if (!$upme_captcha_loader->validate_captcha(post_value('captcha_plugin'))) {
                    $this->errors[] = __('Please complete Captcha Test first.', 'upme');
                }
            }
        } else {
            $this->errors[] = __('Registration is disabled for this site.', 'upme');
        }
    }

    /* Create user */

    function create() {
        global $upme_roles;
        
        require_once(ABSPATH . 'wp-includes/pluggable.php');


        /* Create profile when there is no error */
        if (!isset($this->errors)) {

            // Set date format from admin settings
            $upme_settings = get_option('upme_options');
            $upme_date_format = (string) isset($upme_settings['date_format']) ? $upme_settings['date_format'] : 'mm/dd/yy';

            /* Create account, update user meta */
            $sanitized_user_login = sanitize_user($_POST['user_login']);

            /* Get password */
            if (isset($_POST['user_pass']) && $_POST['user_pass'] != '') {
                $user_pass = $_POST['user_pass'];
            } else {
                $user_pass = wp_generate_password(12, false);
            }

            /* New user */
            $user_id = wp_create_user($sanitized_user_login, $user_pass, $_POST['user_email']);
            if (!$user_id) {
                
            } else {
                

                $allow_user_role_registration = $upme_settings['select_user_role_in_registration'];
                // Set new users role specified in the registration page
                // This will only used when Select User Role in Registration setting is enabled
                $allowed_user_roles = $upme_roles->upme_allowed_user_roles_registration();
                $user_role = isset($this->usermeta['user_role']) ? $this->usermeta['user_role'] : '';
                if(!empty($user_role) && isset($allowed_user_roles[$user_role]) && $allow_user_role_registration){

                    $user = new WP_User( $user_id );
                    $user->set_role( $user_role );
                }
                


                // Get profile fields
                $profile_fields = get_option('upme_profile_fields');

                // Get list of dattime fields
                $date_time_fields = array();

                foreach ($profile_fields as $key => $field) {
                    extract($field);

                    // Filter date/time custom fields
                    if (isset($profile_fields[$key]['field']) && $profile_fields[$key]['field'] == 'datetime') {
                        array_push($date_time_fields, $profile_fields[$key]['meta']);
                    }
                }

                /* Now update all user meta */
                foreach ($this->usermeta as $key => $value) {

                    // save checkboxes
                    if (is_array($value)) { // checkboxes
                        $value = implode(', ', $value);
                    }

                    if (in_array($key, $date_time_fields)) {
                        if('' != $value){
                            $formatted_date = upme_date_format_to_standerd($value, $upme_date_format);
                            $value = $formatted_date;
                        }
                    }


                    // Prevent passwords from saving in user meta table
                    if('user_pass' != $key && 'user_pass_confirm' != $key){
                        update_user_meta($user_id, $key, esc_attr($value));
                    }

                    /* update core fields - email, url, pass */
                    if (in_array($key, array('user_email', 'user_url', 'display_name'))) {
                        wp_update_user(array('ID' => $user_id, $key => esc_attr($value)));
                    }
                }


                // Check user selected passwrod setting for saving the activation details

            }



            // Set approval status when user profile approvals are enabled
            $approval_setting_status = $this->validate_user_approval();
            if($approval_setting_status){
                $approval_status = 'INACTIVE';
                update_user_meta($user_id, 'upme_approval_status', $approval_status);
            }else{
                $approval_status = 'ACTIVE';
                update_user_meta($user_id, 'upme_approval_status', $approval_status);
            }

            // Set Profile Status to active by default
            update_user_meta( $user_id, 'upme_user_profile_status', 'ACTIVE' );

            // Set the password nag when user selected password setting is disabled
            // Set activation status and codes when selected password setting is enabled
            $upme_settings = get_option('upme_options');
            $set_pass = (boolean) $upme_settings['set_password'];
            $activation_setting_status = $this->validate_email_confirmation();


            $activation_status = '';
            if (!$set_pass) {                
                update_user_option($user_id, 'default_password_nag', true, true); //Set up the Password change nag.
            }

            if($activation_setting_status){
                $activation_status = 'INACTIVE';
                update_user_meta($user_id, 'upme_activation_status', $activation_status);
            }else{
                $activation_status = 'ACTIVE';
                update_user_meta($user_id, 'upme_activation_status', $activation_status);
            }

            $activation_code = wp_generate_password(12, false);

            update_user_meta($user_id, 'upme_activation_code',$activation_code);


            // Set automatic login based on the setting value in admin
            if ($this->validate_automatic_login()) {
                wp_set_auth_cookie($user_id, false, is_ssl());
            }

            /* action after Account Creation */
            do_action('upme_user_register', $user_id);


            if (!empty($activation_status) && 'INACTIVE' == $activation_status) {
                upme_new_user_notification($user_id, $user_pass,$activation_status,$activation_code);
            }else{
                wp_new_user_notification($user_id, $user_pass);
            }
        }
    }

    /* Get errors display */

    function get_errors() {
        global $upme;
        $display = null;

        $error_result = array();

        if (isset($this->errors) && count($this->errors) > 0) {
            $display .= '<div class="upme-errors">';
            foreach ($this->errors as $newError) {

                $display .= '<span class="upme-error upme-error-block"><i class="upme-icon-remove"></i>' . $newError . '</span>';
            }
            $display .= '</div>';

            $error_result['status'] = "error";
            $error_result['display'] = $display;
        } else {

            $this->registered = 1;

            $upme_settings = get_option('upme_options');

            // Display custom registraion message
            if (isset($upme_settings['msg_register_success'])) {

                $reg_success_msg = $upme_settings['msg_register_success'];
                $approval_setting_status = $this->validate_user_approval();
                if($approval_setting_status){
                    $reg_success_msg .= __('Your account is pending approval.','upme');
                }
                $display .= '<div class="upme-success"><span><i class="upme-icon-ok"></i>' . $reg_success_msg . '</span></div>';
            }

            // Add text/HTML setting to be displayed after registration message
            if (isset($upme_settings['html_register_success_after']) && !empty($upme_settings['html_register_success_after'])) {
                $display .= '<div class="upme-success-html">' . remove_script_tags($upme_settings['html_register_success_after']) . '</div>';
            }


            if (isset($_POST['redirect_to'])) {
                wp_redirect($_POST['redirect_to']);
            } else {
                // Redirect to profile page after registration when automatic login is set to true
                if ($this->validate_automatic_login()) {

                    // Redirect to custom page based on the values provided in settings section

                    $register_redirect_page_id = (int) isset($upme_settings['register_redirect_page_id']) ? $upme_settings['register_redirect_page_id'] : 0;
                    
                    if ($register_redirect_page_id) {
                        $url = get_permalink($register_redirect_page_id);
                        wp_redirect($url);
                    }
                }
            }

            $error_result['status'] = "success";
            $error_result['display'] = $display;
        }
        return $error_result;
    }

    /* Initializing login class on init action */

    function handle_init() {
        /* Form is fired */

        if (isset($_POST['upme-register-form'])) {

            /* Prepare array of fields */
            $this->prepare($_POST);

            /* Validate, get errors, etc before we create account */
            $this->handle();

            /* Create account */
            $this->create();
        }
    }

    // Valdate automatic login based on set password
    function validate_automatic_login() {

        $automatic_login_status = FALSE;

        $upme_settings = get_option('upme_options');

        $set_pass = (boolean) $upme_settings['set_password'];
        $automatic_login = (boolean) $upme_settings['automatic_login'];

        if ($set_pass && $automatic_login) {
            $automatic_login_status = TRUE;
        }
        return $automatic_login_status;
    }

    function disable_password_nag($current_status) {
        return 0;
    }

    // Disable password nag notice in the admin for user setup passwords
    function upme_password_nag_handler() {

        if (is_user_logged_in ()) {
            $current_user = wp_get_current_user();

            if (!get_user_option('default_password_nag', $current_user->ID)) {
                add_filter('get_user_option_default_password_nag', array($this, 'disable_password_nag'));
            }
        }
    }

    // Activate users by verifying the activation code against the username
    function upme_user_activation_handler(){

        $message = array();

        if(is_user_logged_in()){
            return;
        }

        if(isset($_GET['upme_action']) && $_GET['upme_action'] == 'upme_activate'){

            $user_id = isset($_GET['upme_id']) ? $_GET['upme_id'] : '';
            $activation_code = isset($_GET['upme_activation_code']) ? $_GET['upme_activation_code'] : '';
            $act_status = get_user_meta($user_id, 'upme_activation_status',TRUE);

            
            if('ACTIVE' == $act_status && $activation_code == get_user_meta($user_id, 'upme_activation_code', TRUE)){
                update_user_meta($user_id, 'upme_activation_status', "ACTIVE");
                $message['msg'] = __('Account already activated. You can now login.' , 'upme');
                $message['status'] = 'errors';

                /* UPME Action for User Activation Failure */
                do_action('upme_activation_failed',$user_id,$activation_code,$message['msg']);
                // End Action
                 
            }else if($activation_code == get_user_meta($user_id, 'upme_activation_code', TRUE)){
                update_user_meta($user_id, 'upme_activation_status', "ACTIVE");
                $message['msg'] = __('Activation successful. You can now login.' , 'upme');
                $message['status'] = 'success';

                /* UPME Action for User Activation Success */
                do_action('upme_activation_success',$user_id,$activation_code);
                // End Action
                 
                upme_update_user_cache($user_id);
            }
            else{
                $message['msg'] = __('Activation failed. Please use a valid activation code.' , 'upme');
                $message['status'] = 'errors';

                /* UPME Action for User Activation Failure */
                do_action('upme_activation_failed',$user_id,$activation_code,$message['msg']);
                // End Action
            }
        }

        return $message;
    }

    // Valdate email confirmation based on automatic login and set password
    function validate_email_confirmation() {

        $email_confirmation_status = FALSE;

        $upme_settings = get_option('upme_options');

        $set_pass = (boolean) $upme_settings['set_password'];
        $automatic_login = (boolean) $upme_settings['automatic_login'];
        $set_email_confirmation = (boolean) $upme_settings['set_email_confirmation'];

        if ($set_pass && !$automatic_login && $set_email_confirmation) {
            $email_confirmation_status = TRUE;
        }
        return $email_confirmation_status;
    }

    // Valdate user approvals based on automatic login and set password
    function validate_user_approval(){

        $user_approval_status = FALSE;

        $upme_settings = get_option('upme_options');

        $set_pass = (boolean) $upme_settings['set_password'];
        $automatic_login = (boolean) $upme_settings['automatic_login'];
        $set_user_approvals = (boolean) $upme_settings['profile_approval_status'];

        if ($set_pass && !$automatic_login && $set_user_approvals) {
            $user_approval_status = TRUE;
        }
        return $user_approval_status;

    }
    

}

$upme_register = new UPME_Register();

