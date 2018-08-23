<?php
//setup theme
add_action('after_setup_theme', 'ready_review_theme_setup');
function ready_review_theme_setup() {
    global $content_width;
    if (!isset($content_width))
        $content_width = 900; /* pixels */
    //load text domain
    load_theme_textdomain('ready_review', get_template_directory() . '/languages');
    /////////////// ADD FEATURED THUMBNAIL SUPPORT ///////////////
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    /////////////// ADD CUSTOM MENU SUPPORT ///////////////
    register_nav_menus(
            array(
                    'main-menu' => __('Main', 'ready_review')
            )
    );
    add_image_size('med-thumb', 150, 150, true);
    add_image_size('small-thumb', 100, 100, true);
    add_image_size('single-thumb', 300, false);
    require(get_template_directory() . '/admin/functions.php');
}

//enque script and styles
function ready_review_scripts() {
    wp_enqueue_script("jquery");
    if (is_singular())
        wp_enqueue_script('comment-reply');
    wp_enqueue_script('ready_review_modernizr', get_template_directory_uri() . '/js/libs/modernizr-2.0.6.min.js', array("jquery"), '20120206', true);
    wp_enqueue_script('ready_review_customscript', get_template_directory_uri() . '/js/customscript.js', array("jquery"), '20120206', true);
    wp_enqueue_script('ready_review_gumby', get_template_directory_uri() . '/js/libs/gumby.min.js', array("jquery"), '20120206', true);
    wp_enqueue_script('ready_review_plugins', get_template_directory_uri() . '/js/plugins.js', array("jquery"), '20120206', true);
    wp_enqueue_script('ready_review_responsinav', get_template_directory_uri() . '/js/jquery.responsinav.js', array("jquery"), '20120206', true);
    wp_enqueue_script('ready_review_CFInstall', get_template_directory_uri() . '/js/CFInstall.min.js.js', array(), '20120206', true);
}

add_action('wp_enqueue_scripts', 'ready_review_scripts');
add_action('wp_footer', 'ready_review_cfinstall', 200);
//cfinstall script
function ready_review_cfinstall() {
    ?>
    <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
         chromium.org/developers/how-tos/chrome-frame-getting-started -->
    <!--[if lt IE 7 ]>
    <script>window.attachEvent('onload', function () {
        CFInstall.check({mode: 'overlay'})
    })</script>
    <![endif]-->
<?php
}

/////////////// EXCERPT LIMIT ///////////////
function ready_review_excerpt($num) {
    $limit = $num + 1;
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    array_pop($excerpt);
    $excerpt = implode(" ", $excerpt) . "...";
    echo $excerpt;
}

/////////////// REGISTER SIDEBAR ///////////////
function ready_review_widgets_init() {
    register_sidebar(array(
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'ready_review_widgets_init');
?>
<?php
add_action('add_meta_boxes', 'ready_review_meta_box_add');
function ready_review_meta_box_add() {
    add_meta_box('my-meta-box-id', 'Affiliate Settings', 'ready_review_meta_box_cb', 'post', 'normal', 'high');
}

function ready_review_meta_box_cb($post) {
    $values = get_post_custom($post->ID);
    $url = isset($values['affiliate_url']) ? esc_attr($values['affiliate_url'][0]) : '';
    $rating = isset($values['affiliate_rating']) ? esc_attr($values['affiliate_rating'][0]) : '';
    $rank = isset($values['affiliate_rank']) ? esc_attr($values['affiliate_rank'][0]) : '';
    $check = isset($values['my_meta_box_check']) ? esc_attr($values['my_meta_box_check'][0]) : '';
    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');
    ?>
    <p>
        <label for="affiliate_url"><strong>Affiliate URL</strong></label><br>
        <textarea type="text" name="affiliate_url" id="affiliate_url" cols="125"><?php echo $url; ?></textarea>
    </p>
    <p>
        <label for="affiliate_rating"><strong>Star Rating</strong></label><br>
        <select name="affiliate_rating" id="affiliate_rating" style="width:200px;">
            <option value="" <?php selected($rating, ''); ?>> -- Select --</option>
            <option value="1" <?php selected($rating, '1'); ?>>1</option>
            <option value="1.5" <?php selected($rating, '1.5'); ?>>1.5</option>
            <option value="2" <?php selected($rating, '2'); ?>>2</option>
            <option value="2.5" <?php selected($rating, '2.5'); ?>>2.5</option>
            <option value="3" <?php selected($rating, '3'); ?>>3</option>
            <option value="3.5" <?php selected($rating, '3.5'); ?>>3.5</option>
            <option value="4" <?php selected($rating, '4'); ?>>4</option>
            <option value="4.5" <?php selected($rating, '4.5'); ?>>4.5</option>
            <option value="5" <?php selected($rating, '5'); ?>>5</option>
        </select>
    </p>
    <p>
        <label for="affiliate_rank"><strong>Rank</strong></label><br>
        <select name="affiliate_rank" id="affiliate_rank" style="width:200px;">
            <option value="" <?php selected($rank, ''); ?>> -- Select --</option>
            <option value="1" <?php selected($rank, '1'); ?>>1</option>
            <option value="2" <?php selected($rank, '2'); ?>>2</option>
            <option value="3" <?php selected($rank, '3'); ?>>3</option>
            <option value="4" <?php selected($rank, '4'); ?>>4</option>
            <option value="5" <?php selected($rank, '5'); ?>>5</option>
            <option value="6" <?php selected($rank, '6'); ?>>6</option>
            <option value="7" <?php selected($rank, '7'); ?>>7</option>
            <option value="8" <?php selected($rank, '8'); ?>>8</option>
            <option value="9" <?php selected($rank, '9'); ?>>9</option>
            <option value="10" <?php selected($rank, '10'); ?>>10</option>
            <option value="11" <?php selected($rank, '11'); ?>>11</option>
            <option value="12" <?php selected($rank, '12'); ?>>12</option>
            <option value="13" <?php selected($rank, '13'); ?>>13</option>
            <option value="14" <?php selected($rank, '14'); ?>>14</option>
            <option value="15" <?php selected($rank, '15'); ?>>15</option>
        </select>
    </p>
<?php
}

add_action('save_post', 'ready_review_meta_box_save');
function ready_review_meta_box_save($post_id) {
    // Bail if we're doing an auto save
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    // if our nonce isn't there, or we can't verify it, bail
    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce')) return;
    // if our current user can't edit this post, bail
    if (!current_user_can('edit_post')) return;
    // now we can actually save the data
    $allowed = array(
            'a' => array( // on allow a tags
                    'href' => array() // and those anchords can only have href attribute
            )
    );
    // Probably a good idea to make sure your data is set
    if (isset($_POST['affiliate_url']))
        update_post_meta($post_id, 'affiliate_url', wp_kses($_POST['affiliate_url'], $allowed));
    if (isset($_POST['affiliate_rating']))
        update_post_meta($post_id, 'affiliate_rating', esc_attr($_POST['affiliate_rating']));
    if (isset($_POST['affiliate_rank']))
        update_post_meta($post_id, 'affiliate_rank', esc_attr($_POST['affiliate_rank']));
    // This is purely my personal preference for saving checkboxes
    $chk = (isset($_POST['my_meta_box_check']) && $_POST['my_meta_box_check']) ? 'on' : 'off';
    update_post_meta($post_id, 'my_meta_box_check', $chk);
}

?>
<?php
/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
/*
* This is an example of how to override a default filter
* for 'textarea' sanitization and $allowedposttags + embed and script.
*/
add_action('admin_init', 'ready_review_optionscheck_change_santiziation', 100);
function ready_review_optionscheck_change_santiziation() {
    remove_filter('of_sanitize_textarea', 'of_sanitize_textarea');
    add_filter('of_sanitize_textarea', 'ready_review_custom_sanitize_textarea');
}

function ready_review_custom_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["embed"] = array(
            "src" => array(),
            "type" => array(),
            "allowfullscreen" => array(),
            "allowscriptaccess" => array(),
            "height" => array(),
            "width" => array()
    );
    $custom_allowedtags["script"] = array(
            "src" => array(),
            "type" => array(),
            "language" => array()
    );
    $custom_allowedtags["iframe"] = array( //add new allowed tags
            "src" => array(),
            "height" => array(),
            "width" => array(),
            "scrolling" => array(),
            "border" => array(),
            "marginwidth" => array(),
            "style" => array(),
            "frameborder" => array()
    );
    $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
    $output = wp_kses($input, $custom_allowedtags);
    return $output;
}

//default title
add_filter('the_title', 'ready_review_default_title');
function ready_review_default_title($title) {
    if ($title == '')
        $title = "Default title";
    return $title;
}

require_once dirname(__FILE__) . '/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'ready_review_required_plugins');
function ready_review_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository
            array(
                    'name' => 'WP Product Review',
                    'slug' => 'wp-product-review',
                    'required' => false,
            ),
    );
    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'ready_review';
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
            'domain' => 'ready_review',            // Text domain - likely want to be the same as your theme.
            'default_path' => '',                            // Default absolute path to pre-packaged plugins
            'parent_menu_slug' => 'themes.php',                // Default parent menu slug
            'parent_url_slug' => 'themes.php',                // Default parent URL slug
            'menu' => 'install-required-plugins',    // Menu slug
            'has_notices' => true,                        // Show admin notices or not
            'is_automatic' => false,                        // Automatically activate plugins after installation or not
            'message' => '',                            // Message to output right before the plugins table
            'strings' => array(
                    'page_title' => __('Install Required Plugins', $theme_text_domain),
                    'menu_title' => __('Install Plugins', $theme_text_domain),
                    'installing' => __('Installing Plugin: %s', $theme_text_domain), // %1$s = plugin name
                    'oops' => __('Something went wrong with the plugin API.', $theme_text_domain),
                    'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.'), // %1$s = plugin name(s)
                    'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.'), // %1$s = plugin name(s)
                    'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.'), // %1$s = plugin name(s)
                    'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)
                    'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)
                    'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.'), // %1$s = plugin name(s)
                    'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.'), // %1$s = plugin name(s)
                    'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.'), // %1$s = plugin name(s)
                    'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins'),
                    'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins'),
                    'return' => __('Return to Required Plugins Installer', $theme_text_domain),
                    'plugin_activated' => __('Plugin activated successfully.', $theme_text_domain),
                    'complete' => __('All plugins installed and activated successfully. %s', $theme_text_domain), // %1$s = dashboard link
                    'nag_type' => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
            )
    );
    tgmpa($plugins, $config);
}

//editor style
function ready_review_add_editor_styles() {
    add_editor_style('/css/custom-editor-style.css');
}

add_action('init', 'ready_review_add_editor_styles');
function ready_review_filter_wp_title($title) {
    if (is_home()) {
        $filtered_title = get_bloginfo('name') . ' - ' . __('Home', 'ready_review');
    } elseif (is_category()) {
        $filtered_title = __('Browsing the Category ', 'ready_review') . ' - ' . $title;
    } elseif (is_archive()) {
        $filtered_title = __('Browsing Archives of', 'ready_review') . ' - ' . $title;
    } elseif (is_search()) {
        $filtered_title = __('Search Results for', 'ready_review') . ' "' . $s . '"';
    } elseif (is_404()) {
        $filtered_title = __('404 - Page got lost!', 'ready_review');
    } else {
        $filtered_title = $title;
    }
    return $filtered_title;
}

add_filter('wp_title', 'ready_review_filter_wp_title');
