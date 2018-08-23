<?php
/**
 *
 * CONTACTUS.COM CHAT BY CONTACTUS.COM
 *
 * Initialization Plugin Public Tabs / login / signup
 * @since 5.0 First time this was introduced into plugin.
 * @author ContactUs.com <support@contactus.com>
 * @copyright 2014 ContactUs.com Inc.
 * Company      : contactus.com
 * Updated    : 20140602
 * */
?>

<?php
$cUsLC_api          = new cUsComAPI_LC(); //CONTACTUS.COM API

//delete_option('cUsLC_settings_intro_hints');

$options            = get_option('cUsLC_settings_userData'); //get the values, wont work the first time
$formOptions        = get_option('cUsLC_settings_FORM');//GET THE NEW FORM OPTIONS
$form_key           = get_option('cUsLC_settings_form_key');
$default_deep_link  = get_option('cUsLC_settings_default_deep_link_view');
$showHints          = get_option('cUsLC_settings_intro_hints'); //intro hints
$cus_version        = $formOptions['cus_version'];
$boolTab            = $formOptions['tab_user'];
$cUs_API_Account    = $aryUserCredentials['API_Account'];
$cUs_API_Key        = $aryUserCredentials['API_Key'];

$cUsLC_API_getFormKeys = $cUsLC_api->getFormKeysData($cUs_API_Account, $cUs_API_Key); //api hook;
update_option('cUsLC_settings_FORMS', $cUsLC_API_getFormKeys);

$default_deep_link = $cUsLC_api->parse_deeplink ( $default_deep_link );
if( !strlen($default_deep_link) ){
    $default_deep_link = $cUsLC_api->getDefaultDeepLink( $cUsLC_API_getFormKeys ); // get a default deeplink
    update_option('cUsLC_settings_default_deep_link_view', $default_deep_link );
}

$partnerID = $cUsLC_api->get_partner_id($default_deep_link);
$acount = $default_deep_link.'?pageID=7';
$reports = $default_deep_link.'?pageID=12';
$upgrade = $default_deep_link.'?pageID=82';
$chataui = cUsLC_NUPARTNER_URL . $partnerID . '/Chat';
$createform = $default_deep_link.'?pageID=81&id=0&do=addnew&formType=';

$cus_CRED_url = cUsLC_PARTNER_URL . '/index.php?loginName='.$cUs_API_Account.'&userPsswd='.urlencode($cUs_API_Key);
define('cUsLC_CRED_URL', $cus_CRED_url);
//echo $chataui = cUsLC_PARTNER_URL . '/'.$partnerID . '/';

//print_r($aryUserCredentials);

?>

<div class="row">
    <div class="col-sm-12">
        <div class="row" id="menuPanel">
            <div class="col-xs-8 col-md-10 col-lg-9 noPadding">
                <div id="menu">
                    <div id="menuWrapper">
                        <ul id="tabs" data-tabs="tabs">

                            <li>
                                <a href="<?php echo cUsLC_PARTNER_URL; ?>/index.php?loginName=<?php echo $cUs_API_Account; ?>&userPsswd=<?php echo urlencode($cUs_API_Key); ?>&confirmed=1&redir_url=<?php echo urlencode(trim($chataui)); ?>" role="button" id="cu_nav_ai" class="btn reports-color tooltips"  target="_blank" data-placement="bottom" title="Open Chat Agent Interface in a new window. Full view improves usability when manning chat for long periods of time">
                                    <span class="icon-chat white"></span><span class="hidden-sm hidden-xs"> Chat Agent Interface</span>
                                </a>
                            </li>

                            <li>
                                <a href="#tabs1" role="button" id="cu_nav_forms" class="btn forms-color" data-toggle="tab">
                                    <span class="icon-suitcase white"></span><span class="hidden-sm hidden-xs"> Forms</span>
                                </a>
                            </li>
                            <li>
                                <a href="#tabs2" role="button" id="cu_nav_page" class="btn chat-color" data-toggle="tab">
                                    <span class="icon-layout white"></span><span class="hidden-sm hidden-xs"> Form/Page Selection</span>
                                </a>
                            </li>
                            <li>
                                <a id="cu_nav_docu" href="http://help.contactus.com/hc/en-us/sections/200413116-ContactUs-com-Chat-Plugin-for-WordPress" role="button" class="btn contacts-color" target="_blank">
                                    <span class="icon-book white"></span><span class="hidden-sm hidden-xs"> Documentation</span>
                                </a>
                            </li>

                            <!-- li>
                                <a id="cu_nav_customization" href="<?php echo cUsLC_CRED_URL; ?>&confirmed=1&redir_url=<?php echo urlencode(cUsLC_PARTNER_URL .'/'. $partnerID.'/en/forms/'); ?>" role="button" class="btn btn-yellow tooltips" target="_blank" title="Opens ContactUs.com admin panel in new window" data-placement="right">
                                    <span class="icon-brush white"></span><span class="hidden-sm hidden-xs"> Form Customization</span>
                                </a>
                            </li -->

                            <li>
                                <a id="cu_nav_contacts" href="<?php echo cUsLC_CRED_URL; ?>&confirmed=1&redir_url=<?php echo urlencode(cUsLC_PARTNER_URL .'/'. $partnerID.'/en/contacts/showContacts/latestSubmissions/'); ?>" role="button" class="btn btn-yellow tooltips" target="_blank" title="Opens ContactUs.com admin panel in new window" data-placement="right">
                                    <span class="icon-users white"></span><span class="hidden-sm hidden-xs"> Contacts</span>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <div id="menuToggleButton">
                        <a id="toggleCollapsedMenu" href="#" role="button" class="btn chat-color"><span class="white justify"></span></a>
                    </div>
                </div>

            </div>
            <div class="col-xs-4 col-md-2 col-lg-3 noPadding">
                <div id="gravatar" class="pull-right" style="color: #ffffff">
                    <img src="https://secure.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=50&amp;d=mm&amp;r=g" height="50px" width="50px">
                </div>
                <div class="btn-group pull-right" id="userMenu">

                    <button class="btn dropdown-toggle usermenu-color" role="button" data-toggle="dropdown">
                        <span class="white user hidden-sm hidden-xs hidden-md"></span><span class="hidden-sm hidden-xs hidden-md">Account</span><span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="logout" target="_blank"  href="<?php echo cUsLC_CRED_URL; ?>&confirmed=1&redir_url=<?php echo urlencode(cUsLC_PARTNER_URL .'/'. $partnerID.'/en/account/accountSettings'); ?>"><span class="icon-cog"></span> Account Settings </a>
                        </li>
                        <li>
                            <a class="logout" target="_blank"  href="<?php echo cUsLC_CRED_URL; ?>&confirmed=1&redir_url=<?php echo urlencode(cUsLC_PARTNER_URL .'/'. $partnerID.'/en/account/changePassword'); ?>"><span class="icon-lock"></span> Change Password </a>
                        </li>
                        <!-- li>
                            <a class="logout" target="_blank"  href="https://admin.contactus.com/partners/<?php echo $partnerID; ?>/en/billing"><span class="credit_card"></span> Billing Settings </a>
                        </li -->
                        <li>
                            <a class="logout" target="_blank"  href="<?php echo cUsLC_CRED_URL; ?>&confirmed=1&redir_url=<?php echo urlencode(cUsLC_PARTNER_URL .'/'. $partnerID.'/en/plans'); ?>"><span class="icon-chart-bar"></span> Plans </a>
                        </li>
                        <li>
                            <a class="logout" target="_blank"  href="<?php echo cUsLC_CRED_URL; ?>&confirmed=1&redir_url=<?php echo urlencode(cUsLC_PARTNER_URL .'/'. $partnerID.'/en/account/usage'); ?>"><span class="icon-chart-line"></span> Usage </a>
                        </li>
                        <li>
                            <a class="logout" target="_blank"  href="<?php echo cUsLC_CRED_URL; ?>&confirmed=1&redir_url=<?php echo urlencode(cUsLC_PARTNER_URL .'/'. $partnerID.'/en/account/api'); ?>"><span class="icon-key"></span> API </a>
                        </li>
                        <li>
                            <a class="logout" target="_blank"  href="<?php echo cUsLC_CRED_URL; ?>&confirmed=1&redir_url=<?php echo urlencode(cUsLC_PARTNER_URL .'/'. $partnerID.'/en/account/returningLeadAlert'); ?>"><span class="icon-attention"></span> Returning Lead Alert </a>
                        </li>
                        <!-- li>
                            <a class="logout" target="_blank"  href="https://admin.contactus.com/partners/<?php echo $partnerID; ?>/en/account/manageUsers"><span class="group"></span> Manage Users </a>
                        </li>
                        <li>
                            <a class="logout" target="_blank"  href="https://admin.contactus.com/partners/<?php echo $partnerID; ?>/en/account/managePermissions"><span class="group"></span> Manage Permissions </a>
                        </li -->
                        <li>
                            <a class="logout LogoutUser tooltips" data-placement="left" href="javascript:;" title="Unlink ContactUs.com Account with WordPress Plugin"><span class="icon-logout"></span> Unlink Account </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 tab-content" id="my-tab-content">

        <!-- div id="tabs_ci" class="tab-pane active">
            <div class="row">
                <div class="col-sm-8 chat_interface">
                    <div id="cUsLC_AgentInterface">
                        <iframe id="cUsLC_ChatInt" allowfullscreen="allowfullscreen" height="auto" width="100%" scrolling="auto"
                                src="<?php echo cUsLC_PARTNER_URL; ?>/index.php?loginName=<?php echo $cUs_API_Account; ?>&userPsswd=<?php echo urlencode($cUs_API_Key); ?>&confirmed=1" >
                        </iframe>
                    </div>

                    <script>
                        jQuery(document).ready(function($){
                            var frameLoc = '<?php echo cUsLC_PARTNER_URL; ?>/index.php?loginName=<?php echo $cUs_API_Account; ?>&userPsswd=<?php echo urlencode($cUs_API_Key); ?>&confirmed=1&redir_url=<?php echo urlencode(trim($chataui)); ?>';
                            setTimeout(function(){
                                $('#cUsLC_ChatInt').attr({src:frameLoc});
                                //console.log(frameLoc);
                            },1100);
                        });
                    </script>
                </div>
                <div class="col-sm-4 sidebar">
                    <?php
                    /*
                     * SIDEBAR & SUPPORT
                     * @since 1.0
                     */
                    include( cUsLC_DIR . 'views/sidebar.php');
                    ?>
                </div>
            </div>
        </div -->


        <div id="tabs1" class="tab-pane active">
            <div class="row">
                <div class="col-sm-8">
                    <?php
                    /*
                    * My Forms
                    * @since 1.0
                    */
                    require_once( cUsLC_DIR . 'views/my-forms.php');
                    ?>
                </div>

                <div class="col-sm-4 sidebar">
                    <?php
                    /*
                     * SIDEBAR & SUPPORT
                     * @since 1.0
                     */
                    include( cUsLC_DIR . 'views/sidebar.php');
                    ?>
                </div>
            </div>
        </div>

        <div id="tabs2" class="tab-pane">
            <div class="row">
                <div class="col-sm-8">
                    <?php
                    /*
                    * LOGIN FORM
                    * @since 1.0
                    */
                    require_once( cUsLC_DIR . 'views/form-placement.php');
                    ?>
                </div>

                <div class="col-sm-4 sidebar">
                    <?php
                    /*
                     * SIDEBAR & SUPPORT
                     * @since 1.0
                     */
                    include( cUsLC_DIR . 'views/sidebar.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var home_url = '<?php echo get_option('home'); ?>';
</script>
<?php
if(!empty($cUs_API_Account)){
    if(!strlen($showHints) || $showHints == 1) { ?>
        <script>
            jQuery(document).ready(function($) {
                startIntro();
            });
        </script>
    <?php }
}
?>