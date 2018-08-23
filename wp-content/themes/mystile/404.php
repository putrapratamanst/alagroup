<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php get_header(); ?>

    	<div class="homepage-banner">
        <img src="<?php bloginfo('template_url'); ?>/images/banner-portal.jpg">
    	</div>
       
    <div id="content" class="col-full">
    	
    	<?php woo_main_before(); ?>
    
		<section id="main" class="col-left">
                                                                                
            <div class="page">
				
		<header>
                	<h1><?php _e( 'Nutrifooders only!', 'woothemes' ); ?></h1>
                </header>
                <section class="entry">
                	<p><?php _e( 'Anda harus login untuk melihat halaman ini. Belum punya username? Segera daftar <a href="http://portal.nutrifood.co.id/?page_id=3999">disini.</a>', 'woothemes' ); ?></p>
                </section>

            </div><!-- /.post -->
                                                
        </section><!-- /#main -->
        
        <?php woo_main_after(); ?>

        <?php get_sidebar(); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>