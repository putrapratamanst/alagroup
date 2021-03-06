<?php get_header(); ?>

<?php // Get Theme Options from Database
	$theme_options = smartline_theme_options();
?>

	<div id="wrap" class="clearfix">
	
		<section id="content" class="primary" role="main">
		
		<?php if ( function_exists( 'themezee_breadcrumbs' ) ) themezee_breadcrumbs(); ?>
			
		<?php // Display Featured Post Slideshow if activated
		if ( isset($theme_options['slider_activated_blog']) and $theme_options['slider_activated_blog'] == true ) :

			get_template_part( 'featured-content-slider' );

		endif; ?>
		 
		<?php if (have_posts()) : while (have_posts()) : the_post();
		
			get_template_part( 'content', $theme_options['posts_length'] );
		
			endwhile;
			
		smartline_display_pagination();

		endif; ?>
			
		</section>
		
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>