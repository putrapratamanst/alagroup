<?php

/***** Theme Info Page *****/

if (!function_exists('mh_magazine_lite_theme_info_page')) {
	function mh_magazine_lite_theme_info_page() {
		add_theme_page(esc_html__('Welcome to MH Magazine lite', 'mh-magazine-lite'), esc_html__('Theme Info', 'mh-magazine-lite'), 'edit_theme_options', 'magazine', 'mh_magazine_lite_display_theme_page');
	}
}
add_action('admin_menu', 'mh_magazine_lite_theme_info_page');

if (!function_exists('mh_magazine_lite_display_theme_page')) {
	function mh_magazine_lite_display_theme_page() {
		$theme_data = wp_get_theme(); ?>
		<div class="theme-info-wrap">
			<h1>
				<?php printf(esc_html__('Welcome to %1s %2s', 'mh-magazine-lite'), $theme_data->Name, $theme_data->Version); ?>
			</h1>
			<div class="theme-description">
				<?php echo $theme_data->Description; ?>
			</div>
			<hr>
			<div class="theme-links clearfix">
				<p>
					<strong><?php esc_html_e('Important Links:', 'mh-magazine-lite'); ?></strong>
					<a href="<?php echo esc_url('http://www.mhthemes.com/themes/mh/magazine-lite/'); ?>" target="_blank">
						<?php esc_html_e('Theme Info Page', 'mh-magazine-lite'); ?>
					</a>
					<a href="<?php echo esc_url('http://www.mhthemes.com/support/'); ?>" target="_blank">
						<?php esc_html_e('Support Center', 'mh-magazine-lite'); ?>
					</a>
					<a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/mh-magazine-lite?filter=5'); ?>" target="_blank">
						<?php esc_html_e('Rate this theme', 'mh-magazine-lite'); ?>
					</a>
				</p>
			</div>
			<hr>
			<div id="getting-started">
				<h3>
					<?php printf(esc_html__('Getting Started with %s', 'mh-magazine-lite'), $theme_data->Name); ?>
				</h3>
				<div class="mh-row clearfix">
					<div class="mh-col-1-2">
						<div class="section">
							<h4>
								<?php esc_html_e('Theme Documentation', 'mh-magazine-lite'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Need any help with configuring %s? The documentation for this theme includes all theme related information that is needed to get your site up and running in no time. In case you have any additional questions, feel free to reach out in the theme support forums on WordPress.org.', 'mh-magazine-lite'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.mhthemes.com/support/documentation-mh-magazine/'); ?>" target="_blank" class="button button-secondary">
									<?php esc_html_e('Visit Documentation', 'mh-magazine-lite'); ?>
								</a>
							</p>
						</div>
						<div class="section">
							<h4>
								<?php esc_html_e('Theme Options', 'mh-magazine-lite'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize Theme" to open the Customizer now.',  'mh-magazine-lite'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary">
									<?php esc_html_e('Customize Theme', 'mh-magazine-lite'); ?>
								</a>
							</p>
						</div>
						<div class="section">
							<h4>
								<?php esc_html_e('MH Magazine Pro', 'mh-magazine-lite'); ?>
							</h4>
							<p class="about">
								<?php esc_html_e('If you like the free version of this theme, you will LOVE the full version of MH Magazine which includes unique custom widgets, additional features and more useful options to customize your website.', 'mh-magazine-lite'); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.mhthemes.com/themes/mh/magazine/'); ?>" target="_blank" class="button button-secondary">
									<?php esc_html_e('Learn more about MH Magazine', 'mh-magazine-lite'); ?>
								</a>
							</p>
						</div>
					</div>
					<div class="mh-col-1-2">
						<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="Theme Screenshot" />
					</div>
				</div>
			</div>
			<hr>
			<div id="theme-author">
				<p><?php printf(esc_html__('%1s is proudly brought to you by %2s. If you like %3s: %4s.', 'mh-magazine-lite'),
					$theme_data->Name,
					'<a target="_blank" href="http://www.mhthemes.com/" title="MH Themes">MH Themes</a>',
					$theme_data->Name,
					'<a target="_blank" href="https://wordpress.org/support/view/theme-reviews/mh-magazine-lite?filter=5" title="MH Magazine lite Review">' . esc_html__('Rate this theme', 'mh-magazine-lite') . '</a>'); ?>
				</p>
			</div>
		</div> <?php
	}
}

/***** Custom Meta Boxes *****/

if (!function_exists('mh_add_meta_boxes')) {
	function mh_add_meta_boxes() {
		add_meta_box('mh_post_details', esc_html__('Post Options', 'mh-magazine-lite'), 'mh_post_options', 'post', 'normal', 'high');
	}
}
add_action('add_meta_boxes', 'mh_add_meta_boxes');

if (!function_exists('mh_post_options')) {
	function mh_post_options() {
		global $post;
		wp_nonce_field('mh_meta_box_nonce', 'meta_box_nonce');
		echo '<p>';
		echo '<label for="mh-subheading">' . esc_html__("Subheading (will be displayed below post title)", 'mh-magazine-lite') . '</label>';
		echo '<br />';
		echo '<input class="widefat" type="text" name="mh-subheading" id="mh-subheading" placeholder="Enter subheading" value="' . esc_attr(get_post_meta($post->ID, 'mh-subheading', true)) . '" size="30" />';
		echo '</p>';
	}
}

if (!function_exists('mh_save_meta_boxes')) {
	function mh_save_meta_boxes($post_id, $post) {
		if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'mh_meta_box_nonce')) {
			return $post->ID;
		}
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        	return $post->ID;
		}
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post->ID;
			}
		}
		elseif (!current_user_can('edit_post', $post_id)) {
			return $post->ID;
		}
		if ('post' == $_POST['post_type']) {
			$meta_data['mh-subheading'] = esc_attr($_POST['mh-subheading']);
		}
		foreach ($meta_data as $key => $value) {
			if ($post->post_type == 'revision') return;
			$value = implode(',', (array)$value);
			if (get_post_meta($post->ID, $key, FALSE)) {
				update_post_meta($post->ID, $key, $value);
			} else {
				add_post_meta($post->ID, $key, $value);
			}
			if (!$value) delete_post_meta($post->ID, $key);
		}
	}
}
add_action('save_post', 'mh_save_meta_boxes', 10, 2 );

?>