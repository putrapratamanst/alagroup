<?php

class ready_reviewConfig {
    public static $admin_page_menu_name;
    public static $admin_page_title;
    public static $admin_page_header;
    public static $admin_template_directory;
    public static $admin_template_directory_uri;
    public static $admin_uri;
    public static $admin_path;
    public static $menu_slug;
    public static $structure;

    public static function init() {
        self::$admin_page_menu_name = __("Theme Options",'ready_review');
        self::$admin_page_title =  __("Theme Options",'ready_review');
        self::$admin_page_header =  __("Theme Options",'ready_review');
        self::$admin_template_directory_uri = get_template_directory_uri() . '/admin/layout';
        self::$admin_template_directory = get_template_directory() . '/admin/layout';
        self::$admin_uri = get_template_directory_uri() . '/admin/';
        self::$admin_path = get_template_directory() . '/admin/';
        self::$menu_slug = "theme_options";
        self::$structure = array(
                array(
                        "type" => "tab",
                        "name" => __("General settings", 'ready_review'),
                        "options" => array(
                                array(
                                        "type" => "color",
                                        "name" => __("Background color",'ready_review'),
                                        "description" => __("Choose a background color",'ready_review'),
                                        "id" => "bg_color",
                                        "default" => "#fff"
                                ),
                                array(
                                        "type" => "textarea",
                                        "name" => __("Custom CSS",'ready_review'),
                                        "description" => __("Enter in your custom CSS code here.",'ready_review'),
                                        "id" => "custom_css",
                                        "default" => ""
                                )
                        )
                ),
                array(
                        "type" => "tab",
                        "name" => __("Header", 'ready_review'),
                        "options" => array(
                                array(
                                        "type" => "image",
                                        "name" => __("Upload logo",'ready_review'),
                                        "description" =>__( "Upload your logo.  Must be in .jpg, .gif or .png format.",'ready_review'),
                                        "id" => "logo_image",
                                        "default" => ""
                                ),
                                array(
                                        "type" => "input_text",
                                        "name" => __("Logo text",'ready_review'),
                                        "description" => __("Enter text for your logo.",'ready_review'),
                                        "id" => "logo_text",
                                        "default" => ""
                                ),
                                array(
                                        "type" => "textarea",
                                        "name" => __("Top Right Banner",'ready_review'),
                                        "description" => __("Insert 468x60 banner code here.",'ready_review'),
                                        "id" => "top_banner",
                                        "default" => ""
                                )
                        )
                ),
                array(
                        "type" => "tab",
                        "name" => __("Home Page", 'ready_review'),
                        "options" => array(
                                array(
                                        "type" => "input_text",
                                        "name" => __("Home Page Heading",'ready_review'),
                                        "description" => __("This will be the first H1 heading on the home page.",'ready_review'),
                                        "id" => "homeheading",
                                        "default" => ""
                                ),
                                array(
                                        "type" => "textarea",
                                        "name" => __("Home Page Intro",'ready_review'),
                                        "description" => __("This is the intro text underneath the H1 on the home page.",'ready_review'),
                                        "id" => "homeintro",
                                        "default" => ""
                                ),
                                array(
                                        "type" => "image",
                                        "name" => __("Home Page Image",'ready_review'),
                                        "description" => __("This is the intro image. You can upload one if you'd like.",'ready_review'),
                                        "id" => "intro_image",
                                        "default" => ""
                                ),
                                array(
                                        "type" => "input_text",
                                        "name" => __("Home Image Affiliate URL",'ready_review'),
                                        "description" => __("Affiliate URL for the home page intro image",'ready_review'),
                                        "id" => "intro_image_url",
                                        "default" => ""
                                ),
                                array(
                                        "type" => "input_text",
                                        "name" => __("Home Image Alt Tag",'ready_review'),
                                        "description" => __("Alt tag for the home page intro image",'ready_review'),
                                        "id" => "intro_image_alt" ,
                                        "default" => ""
                                ),
                                array(
                                        "type" => "radio",
                                        "name" => __("Show Posts On Home Page?",'ready_review'),
                                        "description" => __("Check this if you want to show recent posts on the home page.",'ready_review'),
                                        "id" => "show_home_posts",
                                        "options" => array(
                                                "show_home_posts_show" => __("Show",'ready_review'),
                                                "show_home_posts_hide" => __("Hide",'ready_review')
                                        ),
                                        "default" => "show_home_posts_show"
                                ),
                                array(
                                        "type" => "radio",
                                        "name" => __("Show Excerpt?",'ready_review'),
                                        "description" => __("Show the excerpt on home page. If Hide is selected, the full post will be displayed.",'ready_review'),
                                        "id" => "home_excerpt",
                                        "options" => array(
                                                "home_excerpt_show" => __("Show",'ready_review'),
                                                "home_excerpt_hide" => __("Hide",'ready_review'),
                                        ),
                                        "default" => "home_excerpt_show"
                                ),
                                array(
                                        "type" => "select",
                                        "name" => __("Number Of Posts On Home Page",'ready_review'),
                                        "description" => __("How many posts after the main intro do you want to show on the home page?",'ready_review'),
                                        "id" => "home_posts",
                                        "options" => array(
                                                "home_posts_10" => "10",
                                                "home_posts_9" => "9",
                                                "home_posts_8" => "8",
                                                "home_posts_7" => "7",
                                                "home_posts_6" => "6",
                                                "home_posts_5" => "5",
                                                "home_posts_4" => "4",
                                                "home_posts_3" => "3",
                                                "home_posts_2" => "2",
                                                "home_posts_1" => "1"
                                        ),
                                        "default" => "home_posts_10"
                                )
                        )
                ),
                array(
                        "type" => "tab",
                        "name" => __("Posts", 'ready_review'),
                        "options" => array(
                                array(
                                        "type" => "radio",
                                        "name" => __("Show Meta Data on Category Page, Search Results Page, Tags Page & Home Page",'ready_review'),
                                        "description" => __("Show the date, author, number of comments, etc.",'ready_review'),
                                        "id" => "showmeta",
                                        "options" => array(
                                                "showmeta_show" => __("Show",'ready_review'),
                                                "showmeta_hide" => __("Hide",'ready_review')
                                        ),
                                        "default" => "showmeta_show"
                                ),
                                array(
                                        "type" => "radio",
                                        "name" => __("Show Meta Data on Single Post Page?",'ready_review'),
                                        "description" => __("Show the date, author, number of comments, etc.",'ready_review'),
                                        "id" => "showmeta_single",
                                        "options" => array(
                                                "showmeta_single_show" => __("Show",'ready_review'),
                                                "showmeta_single_hide" => __("Hide",'ready_review')
                                        ),
                                        "default" => "showmeta_single_show"
                                ),
                                array(
                                        "type" => "radio",
                                        "name" => __("Show Similar Posts?",'ready_review'),
                                        "description" => __("Show similar posts at the bottom of the page?",'ready_review'),
                                        "id" => "similar_posts",
                                        "options" => array(
                                                "similar_posts_show" => __("Show",'ready_review'),
                                                "similar_posts_hide" => __("Hide",'ready_review'),
                                        ),
                                        "default" => "similar_posts_show"
                                ),
                                array(
                                        "type" => "input_text",
                                        "name" => __("Similar Posts Heading",'ready_review'),
                                        "description" => __("Heading for the similar products section.  If left blank, it will be Similar Products.",'ready_review'),
                                        "id" => "similar_heading",
                                        "default" => ""
                                )
                        )
                ),
                array(
                        "type" => "tab",
                        "name" => __("Sidebar", 'ready_review'),
                        "options" => array(
                                array(
                                        "type" => "radio",
                                        "name" => __("Show Top Products in Sidebar?",'ready_review'),
                                        "description" =>__( "Do you want to list top products in sidebar?  You should.",'ready_review'),
                                        "id" => "topprods",
                                        "options" => array(
                                                "topprods_show" => __("Show",'ready_review'),
                                                "topprods_hide" => __("Hide",'ready_review')
                                        ),
                                        "default" => "topprods_show"
                                ),
                                array(
                                        "type" => "input_text",
                                        "name" => __("Sidebar Top Products Heading",'ready_review'),
                                        "description" => __("Heading for the sidebar top products."),
                                        "id" => "topprods_heading" ,
                                        "default" => ""
                                ),
                                array(
                                        "type" => "select",
                                        "name" => __("Number Of Top Products To Show",'ready_review'),
                                        "description" => __("Select the number of products you want to show in sidebar",'ready_review'),
                                        "id" => "topprods_num",
                                        "options" => array(
                                                "topprods_num_10" => "10",
                                                "topprods_num_9" => "9",
                                                "topprods_num_8" => "8",
                                                "topprods_num_7" => "7",
                                                "topprods_num_6" => "6",
                                                "topprods_num_5" => "5",
                                                "topprods_num_4" => "4",
                                                "topprods_num_3" => "3",
                                                "topprods_num_2" => "2",
                                                "topprods_num_1" => "1"
                                        ),
                                        "default" => "topprods_num_1"
                                ),
                                array(
                                        "type" => "select",
                                        "name" => __("Order By",'ready_review'),
                                        "description" => __("Select what determines the order they are in.",'ready_review'),
                                        "id" => "orderby",
                                        "options" => array(
                                                "meta_value" => __("Post Rank",'ready_review'),
                                                "title" => __("Title",'ready_review'),
                                                "date" => __("Date",'ready_review'),
                                                "ID" => __("ID",'ready_review'),
                                                "rand" => __("Random",'ready_review'),
                                                "comment_count" => __("Comment Count",'ready_review')
                                        ),
                                        "default" => "ID"
                                ),
                                array(
                                        "type" => "select",
                                        "name" => __("Order Type",'ready_review'),
                                        "description" => __("How do you want them ordered?",'ready_review'),
                                        "id" => "ordertype",
                                        "options" => array(
                                                "asc" => __("Ascending",'ready_review'),
                                                "desc" => __("Descending",'ready_review')
                                        ),
                                        "default" => "asc"
                                ),
                                array(
                                        "type" => "input_text",
                                        "name" => __("Read Review Link Text",'ready_review'),
                                        "description" => __("Text for the link that directs visitors to read the full post.",'ready_review'),
                                        "id" => "info_text",
                                        "default" => ""
                                )
                        )
                ),
                array(
                        "type" => "tab",
                        "name" => __("Footer", 'ready_review'),
                        "options" => array(
                                array(
                                        "type" => "textarea",
                                        "name" => __("Footer Left Text",'ready_review'),
                                        "description" => __("Enter the text for left side footer.  copyright, keywords, etc.",'ready_review'),
                                        "id" => "footerleft",
                                        "default" => ""
                                )
                        )
                )
        );
    }
}
