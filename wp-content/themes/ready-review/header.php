<!doctype html>
<!--[if lt IE 7]>
<html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
    <title><?php wp_title(); ?></title>
    <!-- Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- CSS imports non-minified for staging, minify before moving to production-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/imports.css">
    <?php
    $bgcolor = ready_review('bg_color');
    $customcss = ready_review('custom_css');
    $optionsarray = array($bgcolor, $customcss);
    if ($optionsarray) {
        echo "<style>" . "\n";
        if ($bgcolor) {
            echo "body {background-color:" . $bgcolor . ";}" . "\n";
        }
        if ($customcss) {
            echo $customcss;
        }
        echo "</style>";
    }
    ?>
    <!-- end CSS -->
    <?php wp_head(); ?>
</head>
<body id="top" <?php body_class(); ?>>
<div class="container">
    <!-- HEADER -->
    <div class="row preheader">
        <div class="sixteen columns special head" id="header">
            <div class="seven columns logo">
                <?php
                $logo_image = ready_review('logo_image');
                $logo_text = ready_review('logo_text');
                if (isset($logo_image) && $logo_image != '') {
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo $logo_image ?>"
                                                                         border="0"/></a>
                <?php
                } else if (isset($logo_text) && $logo_text != '') {
                    ?>
                    <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo stripslashes($logo_text); ?></a></h1>
                <?php
                } else {
                    ?>
                    <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo bloginfo('name'); ?></a></h1>
                <?php } ?>
            </div>
            <?php
            $top_banner = ready_review('top_banner');
            if (isset($top_banner) && $top_banner != '') {
                ?>
                <div class="nine columns ad468">
                    <div class="ad468">
                        <?php echo $top_banner; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- NAV -->
    <div class="row prenav">
        <div class="sixteen columns navpad">
            <div class="sixteen columns nav">
                <nav>
                    <?php if (has_nav_menu('main-menu')) {
                        wp_nav_menu(array('theme_location' => 'main-menu', 'menu_class' => 'menu', 'container' => '',));
                    } else {
                        ?>
                        <ul class="menu">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'ready_review'); ?></a>
                            </li>
                            <?php wp_list_pages('title_li=&depth=3'); ?>
                            <?php wp_list_categories('title_li=&depth=3'); ?>
                        </ul>
                    <?php } ?>
                </nav>
            </div>
        </div>
    </div>