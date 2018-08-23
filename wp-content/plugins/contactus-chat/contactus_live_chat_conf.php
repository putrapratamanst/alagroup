<?php
/**
 * 
 * CONTACTUS.COM CHAT BY CONTACTUS.COM
 * 
 * Initialization ContactUs Chat Config File
 * @since 1.0 First time this was introduced into ContactUs Chat plugin.
 * @author ContactUs.com <support@contactus.com>
 * @copyright 2014 ContactUs.com Inc.
 * Company      : contactus.com
 * Updated  	: 20140311
 **/

//PLUGIN NAME
$cUs_plug_name = 'ContactUs Chat for WordPress v.2.0';

//DEBUG MODE OFF
error_reporting(0);
error_reporting(E_ERROR);

$cus_dirbase = trailingslashit(basename(dirname(__FILE__)));
$cus_dir = trailingslashit(WP_PLUGIN_DIR) . $cus_dirbase;
$cus_url = trailingslashit(WP_PLUGIN_URL) . $cus_dirbase;

//LIVE ENVIROMENT
$cus_env_url = '//cdn.contactus.com/cdn/forms/';
$cus_par_url = 'https://admin.contactus.com/partners';
$cus_api_enviroment = 'https://api.contactus.com/api2.php';
$cus_new_par_url = 'https://admin.contactus.com/new_partners/';

//WP KEYS
$cus_api_ApiAccountKey = 'AC132f1ca7ff5040732b787564996a02b46cc4b58d';
$cus_api_ApiKey = 'cd690cf4f450950e857b417710b656923cf4b579';

//DEFINE GLOBAL ENVIROMENT VARS
define('cUsLC_DIR', $cus_dir);
define('cUsLC_URL', $cus_url);
define('cUsLC_ENV_URL', $cus_env_url);
define('cUsLC_PARTNER_URL', $cus_par_url);
define('cUsLC_NUPARTNER_URL', $cus_new_par_url);
define('cUsLC_API_ENV', $cus_api_enviroment);
define('cUsLC_API_ACC', $cus_api_ApiAccountKey);
define('cUsLC_API_AKY', $cus_api_ApiKey);
define('cUsLC_PLUGINNAME', $cUs_plug_name);