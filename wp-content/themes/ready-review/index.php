<?php get_header(); ?>
    <!-- CONTENT -->
<div class="row content">
    <div class="ten columns leftcontent">
        <!-- INTRO -->
        <?php
        $homeheading = ready_review('homeheading');
        if (isset($homeheading) && $homeheading != "") {
            echo '<h1>' . $homeheading . '</h1>';
        }
        $homeintro = ready_review('homeintro');
        if (isset($homeintro) && $homeintro != "") {
            ?>
            <div class="intro">
                <?php
                $intro_image = ready_review('intro_image');
                if (isset($intro_image) && $intro_image != '') {
                    $intro_image_url = ready_review('intro_image_url');
                    if (isset($intro_image_url) && $intro_image_url != '') {
                        ?>
                        <a href="<?php echo $intro_image_url; ?>" rel="nofollow" target="_blank">
                    <?php
                    }
                    $intro_image_alt = ready_review('intro_image_alt');
                    ?>
                    <img src="<?php echo $intro_image; ?>" align="left"
                         alt="<?php if (isset($intro_image_alt) && $intro_image_alt != '') { ?><?php echo $intro_image_alt; ?><?php } else { ?><?php bloginfo('name'); ?><?php } ?>">
                    <?php
                    if (isset($intro_image_url) && $intro_image_url != '') {
                        ?>
                        </a>
                    <?php
                    }
                }
                echo stripslashes($homeintro); ?>
            </div>
        <?php } ?>
        <!-- INTRO -->
        <?php $show_home_posts = ready_review('show_home_posts'); ?>
        <?php if (isset($show_home_posts) && $show_home_posts == 'show_home_posts_show') { ?>
            <?php require_once dirname(__FILE__) . '/custom/posts.php'; ?>
        <?php } ?>
    </div>
    <!--end of .ten columns (left content) -->
<?php get_footer(); ?>