<?php
$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$home_posts = ready_review('home_posts');
if (isset($home_posts) && $home_posts != '') {
    switch ($home_posts) {
        case "home_posts_10":
            $homepostnumber = 10;
            break;
        case "home_posts_9":
            $homepostnumber = 9;
            break;
        case "home_posts_8":
            $homepostnumber = 8;
            break;
        case "home_posts_7":
            $homepostnumber = 7;
            break;
        case "home_posts_6":
            $homepostnumber = 6;
            break;
        case "home_posts_5":
            $homepostnumber = 5;
            break;
        case "home_posts_4":
            $homepostnumber = 4;
            break;
        case "home_posts_3":
            $homepostnumber = 3;
            break;
        case "home_posts_2":
            $homepostnumber = 2;
            break;
        case "home_posts_1":
            $homepostnumber = 1;
            break;
    }
    query_posts('showposts=' . $homepostnumber . '&paged=' . $page);
} else {
    query_posts('showposts=10&paged=' . $page);
}
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'med-thumb'); ?>
    <?php if ($image): ?>
        <!-- post -->
        <div <?php post_class(); ?>>
            <?php
            $home_excerpt = ready_review('home_excerpt');
            if (isset($home_excerpt) && $home_excerpt == 'home_excerpt_show') {
                ?>
                <?php $showmeta = ready_review('showmeta'); ?>
                <h2<?php if (!isset($showmeta) || (isset($showmeta) && $showmeta == 'showmeta_hide')) { ?> class="postmargin"<?php } ?>>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php if (isset($showmeta) && $showmeta == 'showmeta_show') { ?>
                    <div class="post_meta">
                        <ul>
                            <li class="metacats"><?php the_category(' '); ?></li>
                            <li>//</li>
                            <li><?php the_time('F d, Y'); ?></li>
                            <li>//</li>
                            <li><?php comments_popup_link(__('Comments', 'ready_review'), __('1 Comment', 'ready_review'), __('% Comments', 'ready_review')); ?></li>
                            <li>//</li>
                            <li><?php the_tags(); ?></li>
                        </ul>
                    </div>
                <?php } ?>
                <p><a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" width="150" height="150"
                                                            align="left" class="featuredimg"
                                                            title="<?php the_title(); ?>" alt="<?php the_title(); ?>"/></a><?php ready_review_excerpt('200'); ?>
                    <a href="<?php the_permalink(); ?>"><?php _e('Read More', 'ready_review'); ?> &raquo;</a></p>
                <div class="clear"></div>
            <?php } else { ?>
                <h2<?php if (!isset($showmeta) || (isset($showmeta) && $showmeta == 'showmeta_hide')) { ?> class="postmargin"<?php } ?>>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php if (isset($showmeta) && $showmeta == 'showmeta_show') { ?>
                    <div class="post_meta">
                        <ul>
                            <li class="metacats"><?php the_category(' '); ?></li>
                            <li>//</li>
                            <li><?php the_time('F d, Y'); ?></li>
                            <li>//</li>
                            <li><?php comments_popup_link(__('Comments', 'ready_review'), __('1 Comment', 'ready_review'), __('% Comments', 'ready_review')); ?></li>
                            <li>//</li>
                            <li><?php the_tags(); ?></li>
                        </ul>
                    </div>
                <?php } ?>
                <p><a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" width="150" height="150"
                                                            border="0" title="<?php the_title(); ?>"
                                                            alt="<?php the_title(); ?>" align="left"
                                                            class="fullconentimg"/></a><?php the_content(); ?></p>
                <div class="clear"></div>
            <?php } ?>
        </div>
        <!-- end post -->
    <?php else: ?>
        <!-- post -->
        <div <?php post_class(); ?>>
            <h2<?php if (!isset($showmeta) || (isset($showmeta) && $showmeta == 'showmeta_hide')) { ?> class="postmargin"<?php } ?>>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php if (isset($showmeta) && $showmeta == 'showmeta_show') { ?>
                <div class="post_meta">
                    <ul>
                        <li class="metacats"><?php the_category(' '); ?></li>
                        <li>//</li>
                        <li><?php the_time('F d, Y'); ?></li>
                        <li>//</li>
                        <li><?php comments_popup_link(__('Comments', 'ready_review'), __('1 Comment', 'ready_review'), __('% Comments', 'ready_review')); ?></li>
                    </ul>
                </div>
            <?php } ?>
            <?php if (isset($home_excerpt) && $home_excerpt == 'home_excerpt_show') { ?>
                <p><?php ready_review_excerpt('300'); ?> <a
                            href="<?php the_permalink(); ?>"><?php _e('Read More', 'ready_review'); ?> &raquo;</a></p>
            <?php } else { ?>
                <p><?php the_content(); ?></p>
            <?php } ?>
        </div>
        <!-- end post -->
    <?php endif; ?>
<?php endwhile; endif; ?>
    <div class="pagination">
        <div class="next"><?php previous_posts_link(__('Prev', 'ready_review')); ?></div>
        <div class="prev"><?php next_posts_link(__('Next', 'ready_review')); ?></div>
    </div><!-- /pagination--><?php wp_reset_query(); ?>