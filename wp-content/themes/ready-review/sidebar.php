<div class="six columns" id="sidebar">
    <?php
    $topprods = ready_review('topprods');
    if (isset($topprods) && $topprods == 'topprods_show') :
        ?>
        <div class="widget">
            <?php
            $theheading = ready_review('topprods_heading');
            $thecat = ready_review('topprods_cat');
            $thenum_temp = ready_review('topprods_num');
            switch ($thenum_temp) {
                case "topprods_num_10":
                    $thenum = 10;
                    break;
                case "topprods_num_9":
                    $thenum = 9;
                    break;
                case "topprods_num_8":
                    $thenum = 8;
                    break;
                case "topprods_num_7":
                    $thenum = 7;
                    break;
                case "topprods_num_6":
                    $thenum = 6;
                    break;
                case "topprods_num_5":
                    $thenum = 5;
                    break;
                case "topprods_num_4":
                    $thenum = 4;
                    break;
                case "topprods_num_3":
                    $thenum = 3;
                    break;
                case "topprods_num_2":
                    $thenum = 2;
                    break;
                case "topprods_num_1":
                    $thenum = 1;
                    break;
            }
            $infotext = ready_review('info_text');;
            $rating = ready_review('affiliate_rating');
            $rank = ready_review('affiliate_rank');
            $orderby = ready_review('orderby');
            $ordertype = ready_review('ordertype');
            if ($orderby == 'meta_value') {
                $orderby = 'meta_value&meta_key=affiliate_rank';
            }
            ?>
            <?php if ($theheading != '') echo '<h2>' . $theheading . '</h2>'; ?>
            <?php $topposts_query = new WP_Query('posts_per_page=' . $thenum . '&cat=' . $thecat . '&orderby=' . $orderby . '&order=' . $ordertype); ?>
            <?php while ($topposts_query->have_posts()) : $topposts_query->the_post(); ?>
                <?php $postaffurl = get_post_meta($post->ID, 'affiliate_url', true); ?>
                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'small-thumb'); ?>
                <?php $rating = get_post_meta($post->ID, 'affiliate_rating', true); ?>
                <!-- top product -->
                <div class="row topprod">
                    <div class="six columns topprodleft">
                        <a href="<?php echo $postaffurl; ?>" rel="nofollow">
                            <?php
                            if ($image[0] != '')
                                echo '<img src="' . $image[0] . '" width="100" height="100" alt="' . get_the_title() . '">';
                            ?>
                        </a>
                    </div>
                    <div class="nine columns topprodright">
                        <div class="heading"><strong><a href="<?php the_permalink(); ?>"
                                                        rel="nofollow"><?php the_title(); ?></a></strong></div>
                        <div class="rating">
                            <?php if ($rating) { ?>
                                <img
                                        src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $rating; ?>-star.png"
                                        border="0"/>
                            <?php } ?>
                        </div>
                        <div class="readmore"><a href="<?php the_permalink(); ?>"
                                                 class="readreview"><?php if ($infotext) {
                                    echo $infotext; ?><?php
                                } else {
                                    _e('Read Review', 'ready_review');
                                } ?></a></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- end top product -->
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <?php if (!function_exists('dynamic_sidebar')
            || !dynamic_sidebar()
    ) : ?>
    <?php endif; ?>
</div>
</div><!--end of .six columns (right content) -->