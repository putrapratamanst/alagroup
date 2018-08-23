<?php get_header(); ?>
<div class="wrapper clearfix">
    <div class="content <?php mh_content_class(); ?>">
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    		<?php mh_before_page_content(); ?>
			<div <?php post_class(); ?>>
	       		<div class="entry clearfix">
	        		<?php the_content(); ?>
				</div>
	    	</div>
	    	<?php comments_template(); ?>
		<?php endwhile; endif;  ?>
    </div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>