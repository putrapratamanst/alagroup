<?php

/**
 * 
 * CONTACTUS.COM CHAT BY CONTACTUS.COM
 * 
 * Initialization Plugin Functions
 * @since 3.1 First time this was introduced into Plugin.
 * @author ContactUs.com <support@contactus.com>
 * @copyright 2013 ContactUs.com Inc.
 * Company      : contactus.com
 * Updated  	: 20140602
 **/

$cus_dirbase = trailingslashit(basename(dirname(__FILE__)));
$cus_dir = trailingslashit(WP_PLUGIN_DIR) . $cus_dirbase;
$cus_url = trailingslashit(WP_PLUGIN_URL) . $cus_dirbase;

//CONFIG VARS
//require_once( $cus_dir . 'contactus_live_conf.php');

//CUS API OBJECT
if (!class_exists('cUsComAPI_LC')) {
    require_once( cUsLC_DIR . 'models/cusAPI.class.php');
}
//AJAX REQUEST HOOKS
require_once( cUsLC_DIR . 'controllers/contactus_live_chat_ajx_request.php');

/* -----------------------CONTACTUS.COM--------------------------- */

if (!function_exists('cUsLC_admin_header')) {
   /*
    * Method in charge to render plugin js libraries and css
    * @since 1.0
    * @return string Return Html into wp admin header
    */
    function cUsLC_admin_header() {
        
        global $current_screen;

        if ($current_screen->id == 'toplevel_page_cUs_live_chat') {

            $aryUserCredentials = get_option('cUsLC_settings_userCredentials'); //get the values, wont work the first time
            
            wp_enqueue_style( 'cUsLC_Styles', plugins_url('assets/css/styles.css', dirname(__FILE__)), false, '1' );
            wp_enqueue_style( 'cUsLC_StylesOP', plugins_url('assets/style/cUsLC_style.css', dirname(__FILE__)), false, '1' );
            wp_enqueue_style( 'colorbox', plugins_url('assets/js/colorbox/colorbox.css', dirname(__FILE__)), false, '1' );
            wp_enqueue_style( 'introjs', plugins_url('assets/js/introjs/introjs.min.css', dirname(__FILE__)) , false, '1' );
            wp_enqueue_style( 'wp-jquery-ui-dialog' );

            if(!empty($aryUserCredentials) && is_array($aryUserCredentials)) {
                wp_register_script( 'cUsLC_Scripts', plugins_url('assets/js/scripts.js?pluginurl=' . dirname(__FILE__), dirname(__FILE__)), array('jquery'), '5.0', true);
            }else{

                wp_register_script( 'cUsLC_Scripts', plugins_url('assets/js/scripts-pub.js?pluginurl=' . dirname(__FILE__), dirname(__FILE__)), array('jquery'), '1.0', true);
                wp_register_script( 'cUsLC_cats_module', plugins_url('assets/js/cats-module.js?pluginurl=' . dirname(__FILE__), dirname(__FILE__)), array('jquery'), '1.0', true);
                wp_enqueue_script( 'cUsLC_cats_module' );

                wp_enqueue_style( 'categories', plugins_url('assets/css/cats-pub.css', dirname(__FILE__)) , false, '1' );
            }

            wp_localize_script( 'cUsLC_Scripts', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

            wp_register_script( 'colorbox', plugins_url('assets/js/colorbox/jquery.colorbox-min.js', dirname(__FILE__)), array('jquery'), '1.4.33', true);
            wp_register_script( 'bootstrap', plugins_url('assets/js/bootstrap.min.js', dirname(__FILE__)), array('jquery'), '3.1.1', true);
            wp_register_script( 'bootstrap-switch', plugins_url('assets/js/plugin/bootstrap-switch.min.js', dirname(__FILE__)), array('jquery'), '3.0.1', true);
            wp_register_script( 'bootbox', plugins_url('assets/js/plugin/bootbox.js', dirname(__FILE__)), array('jquery'), '1.0', true);
            wp_register_script( 'jquery-validate', plugins_url('assets/js/jquery.validate.js', dirname(__FILE__)), array('jquery'), '1.11.1', true);
            wp_register_script( 'introjs', plugins_url('assets/js/introjs/intro.min.js', dirname(__FILE__) ), array('jquery'), '0.8.0', true);
            wp_register_script( 'introjs_conf', plugins_url('assets/js/introjs/introjs.config.js', dirname(__FILE__) ), array('jquery'), '1.0', true);

            wp_enqueue_script( 'jquery' ); //JQUERY WP CORE
            wp_enqueue_script( 'colorbox' );
            wp_enqueue_script( 'bootstrap' );
            wp_enqueue_script( 'bootstrap-switch' );
            wp_enqueue_script( 'bootbox' );
            wp_enqueue_script( 'jquery-validate' );
            wp_enqueue_script( 'cUsLC_Scripts' );
            wp_enqueue_script( 'introjs' );
            wp_enqueue_script( 'introjs_conf' );
            
            //CONTACTUS.COM CHAT SUPPORT CHAT
            wp_register_script( 'cUsLC_support_chat', '//cdn.contactus.com/cdn/forms/ZmZkMTFiMTRkNGY,/contactus.js', array(), '2.7', true);
            wp_enqueue_script( 'cUsLC_support_chat' );
            
        }
        
    }

} 
add_action('admin_enqueue_scripts', 'cUsLC_admin_header'); // cUsLC_admin_header hook
//END CONTACTUS.COM PLUGIN STYLES CSS

//CONTACTUS.COM ADD FORM TO PLUGIN PAGE

// Add option page in admin menu
if (!function_exists('cUsLC_admin_menu')) {

    function cUsLC_admin_menu() {
        add_menu_page('ContactUs.com Chat for WordPress', 'Chat', 'edit_themes', 'cUs_live_chat', 'cUsLC_menu_render', plugins_url("assets/img/favicon.gif", dirname(__FILE__) ));
    }

}
add_action('admin_menu', 'cUsLC_admin_menu'); // cUsLC_admin_menu hook

/*
* Method in charge to render link to Help Center into wp plugins manager page
* @since 1.0
* @return string Return Html plugins manager page
*/
function cUsLC_plugin_links($links, $file) {
    $plugin_file = 'contactus-chat/contactus_live.php';
    if ($file == $plugin_file) {
        $links[] = '<a target="_blank" style="color: #42a851; font-weight: bold;" href="http://help.contactus.com/">' . __("Get Support", "cus_plugin") . '</a>';
    }
    return $links;
} 
add_filter('plugin_row_meta', 'cUsLC_plugin_links', 10, 2);


/*
* Method in charge to create the setting button in plugins manager page
* @since 3.0
* @return string Return Html plugins manager page
*/
function cUsLC_action_links($links, $file) {
    $plugin_file = 'contactus-chat/contactus_live.php';
    //make sure it is our plugin we are modifying
    if ($file == $plugin_file) {
        $settings_link = '<a href="' . admin_url('admin.php?page=cUs_live_chat') . '">' . __('Settings', 'cus_plugin') . '</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
} 
add_filter("plugin_action_links", 'cUsLC_action_links', 10, 4);

//Display the validation errors and update messages

/*
 * Admin notices
 */

function cUsLC_admin_notices() {
    settings_errors();
} 
add_action('admin_notices', 'cUsLC_admin_notices');

/*
 * Method in charge to validate allowed form types
 * @since 3.2
 * @param string $form_type Form type to validate
 * @return boolean
 */
function cUsLC_allowedFormType($form_type){
    $aryAllowedFormTypes = array('chat');
    if( in_array($form_type, $aryAllowedFormTypes) ){
        return TRUE;
    }else{
        return FALSE;
    }
}

/*
 * IMPORTANT
* Method in charge to render the contactus.com javascript snippet into the default wp theme
* @since 1.0
* @return string Return Html javascript snippet
*/
function cUsLC_JS_into_html() {
    if (!is_admin()) {
        
        $pageID = get_the_ID();
        $pageSettings = get_post_meta( $pageID, 'cUsLC_settings_FormByPage', true );

        //print_r($pageSettings);

        //HOME SETTINGS
        if( is_home() || is_front_page() ){

            $getHomePage = get_option('cUsLC_HOME_settings');
            if(empty($getHomePage))
                $getHomePage = get_option('cUsLC_HOME_settings');

            //print_r($getHomePage);

            if ( is_array($getHomePage) ) {

                @$boolTab        = $getHomePage['tab_user'];
                @$cus_version    = $getHomePage['cus_version'];
                $form_key       = $getHomePage['form_key'];

                if ( $boolTab )
                    echo cUsLC_renderJSCodebyFormKey($form_key);
            }
        }
        
        if(is_array($pageSettings) && !empty($pageSettings)){ //NEW VERSION 3.0
            
            $boolTab        = $pageSettings['tab_user'];
            $cus_version    = $pageSettings['cus_version'];
            $form_key       = $pageSettings['form_key'];
            
            if($cus_version == 'tab' && $boolTab){
                
                //$userJScode = '<script type="text/javascript" src="' . cUsLC_ENV_URL . $form_key . '/contactus.js"></script>';
                echo cUsLC_renderJSCodebyFormKey($form_key);
            
                //echo $userJScode;
            }
            
        }

        $cUsLC_API_getForms =  get_option('cUsLC_settings_FORMS');

        $cUs_json = json_decode($cUsLC_API_getForms);
        switch ($cUs_json->status) {
            case 'success':
                foreach ($cUs_json->data as $oForms => $oForm) {
                    $formSettings =  get_option('cUsLC_settings_form_'.$oForm->form_id);
                    if ( cUsLC_allowedFormType($oForm->form_type) && is_array($formSettings) && $formSettings['form_status'] ) {
                        echo cUsLC_renderJSCodebyFormKey($formSettings['form_key']);
                    }
                    //print_r($formSettings);

                }
                break;
        } //endswitch;
        
    }
}
add_action('wp_footer', 'cUsLC_JS_into_html'); // ADD JS BEFORE BODY TAG


/*
 * IMPORTANT
* Method in charge to render the contactus.com javascript snippet into the default wp theme
* @since 1.0
* @return string Return Html javascript snippet
*/
function cUsLC_renderJSCodebyFormKey($form_key){

    $userJScode = '';

    if(strlen($form_key)){
        $userJScode = "\n<!-- BEGIN CONTACTUS.COM CHAT PLUGIN CONTACTUS.COM SCRIPT -->\n";
        $userJScode .= '<script type="text/javascript" src="' . cUsLC_ENV_URL . $form_key . '/contactus.js"></script>';
        $userJScode .= "\n<!-- END CONTACTUS.COM SCRIPT -->\n\n";
    }

    return $userJScode;
}

/*
 * IMPORTANT
* Method in charge to render the contactus.com javascript snippet into the default wp theme INLINE
* @since 1.0
* @return string Return Html javascript snippet
*/
function cUsLC_renderJSCodebyFormKeyInline($form_key){

    $userJScode = '';

    if(strlen($form_key)){

        $userJScode = "\n<!-- BEGIN CONTACTUS.COM CHAT CONTACTUS.COM SCRIPT -->\n";
        $userJScode .= '<div style="min-height: 300px; min-width: 340px; clear:both;">';
        $userJScode .= '<script type="text/javascript" src="' . cUsLC_ENV_URL . $form_key . '/inline.js"></script>';
        $userJScode .= '</div>';
        $userJScode .= "\n<!-- END CONTACTUS.COM SCRIPT -->\n\n";
    }

    return $userJScode;
}

//SHORTCODE MANAGMENT ROUTINES
/*
 * IMPORTANT
* Method in charge to read wp shortcode and render the javascript snippet into the default wp theme
* @since 1.0
* @return string Return Html javascript snippet
*/
function cUsLC_shortcode_handler($aryFormParemeters) {
    
    $cUsLC_credentials = get_option('cUsLC_settings_userCredentials'); //GET USERS CREDENTIALS V3.0 API 1.9
    
    if(!empty($cUsLC_credentials)){
        
        $pageID = get_the_ID();
        $pageSettings = get_post_meta( $pageID, 'cUsLC_settings_FormByPage', true );
        $inlineJS_output = '';

        if(is_array($pageSettings) && !empty($pageSettings)){ //NEW VERSION 3.0

            //print_r($pageSettings);

            $boolTab        = $pageSettings['tab_user'];
            $cus_version    = $pageSettings['cus_version'];
            $form_key       = $pageSettings['form_key'];

            //if(strlen($formkey)) $form_key = $formkey;

            //if ($cus_version == 'inline' || $cus_version == 'selectable') {
               $inlineJS_output = '<div style="min-height: 300px; min-width: 340px; clear:both;"><script type="text/javascript" src="' . cUsLC_ENV_URL . $form_key . '/inline.js"></script></div>';
            //}

        }elseif(is_array($aryFormParemeters)){

            if($aryFormParemeters['version'] == 'tab'){
                $Fkey = $aryFormParemeters['formkey'];
                update_option('cUsLC_settings_FormKey_SC', $Fkey);
                do_action('wp_footer', $Fkey);
                add_action('wp_footer', 'cUsLC_shortcodeTab'); // ADD JS BEFORE BODY TAG
            }else{
                $inlineJS_output = '<div style="min-height: 300px; min-width: 340px; clear:both;"><script type="text/javascript" src="'. cUsLC_ENV_URL  . $aryFormParemeters['formkey'] . '/inline.js"></script></div>';
            }

        }else{   //OLDER VERSION < 2.5 //UPDATE 
            $formOptions    = get_option('cUsLC_settings_FORM');//GET THE NEW FORM OPTIONS
            $form_key       = get_option('cUsLC_settings_form_key');
            $cus_version    = $formOptions['cus_version'];

            if ($cus_version == 'inline' || $cus_version == 'selectable') {
                $inlineJS_output = '<div style="min-height: 300px; min-width: 340px; clear:both;"><script type="text/javascript" src="' . cUsLC_ENV_URL . $form_key . '/inline.js"></script></div>';
            }

        }

        return $inlineJS_output;
    }else{
        
        return '<p>ContactUs Chat by ContactUs.com user Credentials Missing . . . <br/>Please Login Again <a href="'.get_admin_url().'admin.php?page=cUs_live_chat" target="_blank">here</a>, Thank You.</p>';
        
    }
}

/*
 * Method in charge to render the javascript snippet into the default wp theme like a tab
 * @since 1.0
 * @param array $Args Array with all shortcode options
 * @return string
 */
function cUsLC_shortcodeTab($Args) {
    
    $form_key = get_option('cUsLC_settings_FormKey_SC');
    
    if ( !is_admin() && strlen($form_key) ) {
        $userJScode = '<script type="text/javascript" src="' . cUsLC_ENV_URL . $form_key . '/contactus.js"></script>';
        echo $userJScode;
    }
}

/*
 * Method in charge to add the shortcode into the page content by page ID
 * @since 1.0
 * @param int $inline_req_page_id WP Page ID
 * @return array
 */
function cUsLC_inline_shortcode_add($inline_req_page_id) {
    
    if($inline_req_page_id != 'home'){
        $oPage = get_page($inline_req_page_id);
        $pageContent = $oPage->post_content;
        $pageContent = $pageContent . "\n[show-live-chat-form]";
        $aryPage = array();
        $aryPage['ID'] = $inline_req_page_id;
        $aryPage['post_content'] = $pageContent;
        return wp_update_post($aryPage);
    }
}

/*
 * Method in charge to remove page setting to all wp pages content by page ID
 * @since 1.0
 * @return null
 */
function cUsLC_page_settings_cleaner() {
    $aryPages = get_pages();
    foreach ($aryPages as $oPage) {
        delete_post_meta($oPage->ID, 'cUsLC_settings_FormByPage');//reset values
        cUsLC_inline_shortcode_cleaner_by_ID($oPage->ID); //RESET SC
    }
}
/*
 * Method in charge to remove the shortcode into the all wp pages content by page ID
 * @since 1.0
 * @return null
 */
function cUsLC_inline_shortcode_cleaner() {
    $aryPages = get_pages();
    foreach ($aryPages as $oPage) {
        $pageContent = $oPage->post_content;
        $pageContent = str_replace('[show-live-chat-form]', '', $pageContent);
        $aryPage = array();
        $aryPage['ID'] = $oPage->ID;
        $aryPage['post_content'] = $pageContent;
        wp_update_post($aryPage);
    }
}
/*
 * Method in charge to remove the shortcode into the wp page content by page ID
 * @since 1.0
 * @return null
 */
function cUsLC_inline_shortcode_cleaner_by_ID($inline_req_page_id) {
    $oPage = get_page( $inline_req_page_id );
    
    $pageContent = $oPage->post_content;
    $pageContent = str_replace('[show-live-chat-form]', '', $pageContent);
    $aryPage = array();
    $aryPage['ID'] = $oPage->ID;
    $aryPage['post_content'] = $pageContent;
    
    wp_update_post($aryPage);
    
}

add_shortcode("show-live-chat-form", "cUsLC_shortcode_handler"); //[show-live-chat-form]

//SHORTCODES

/*
 *  UPDATE NOTICES
 * 
 * Method in charge to display update notice into wp admin header
 * @since 1.0
 * @return string Html
 */
/* Display a notice that can be dismissed */
add_action('admin_notices', 'cUsLC_update_admin_notice');
function cUsLC_update_admin_notice() {
	
        global $current_user ;
        $user_id = $current_user->ID;
        
        $aryUserCredentials = get_option('cUsLC_settings_userCredentials');
        $form_key           = get_option('cUsLC_settings_form_key');
        $cUs_API_Account    = $aryUserCredentials['API_Account'];
        $cUs_API_Key        = $aryUserCredentials['API_Key'];
        
	if ( ! get_user_meta($user_id, 'cUsLC_ignore_notice') && !strlen($cUs_API_Account) && !strlen($cUs_API_Key) && strlen($form_key)) {
            echo '<div class="updated"><p>';
            printf(__('ContactUs Chat has been updated!. Please take time to activate your new features <a href="%1$s">here</a>. | <a href="%2$s">Hide Notice</a>'), 'admin.php?page=cUs_live_chat', '?cUsLC_ignore_notice=0');
            echo "</p></div>";
	}
        
}
add_action('admin_init', 'cUsLC_nag_ignore');
function cUsLC_nag_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        if ( isset($_GET['cUsLC_ignore_notice']) && '0' == $_GET['cUsLC_ignore_notice'] ) {
             add_user_meta($user_id, 'cUsLC_ignore_notice', 'true', true);
	}
}

/*
 * --------------------------------------------------------------
 * 
 * UNISTALL ROUTINES
 * 
 * Method in charge to remove all plugin options and settings
 * @since 1.0
 * @return null
 */
if (!function_exists('cUsLC_plugin_db_uninstall')) {

    function cUsLC_plugin_db_uninstall() {

        $cUsLC_api = new cUsComAPI_LC();
        $cUsLC_api->resetData(); //RESET DATA
        
        cUsLC_page_settings_cleaner();
        
    }
    
}
register_uninstall_hook(__FILE__, 'cUsLC_plugin_db_uninstall');