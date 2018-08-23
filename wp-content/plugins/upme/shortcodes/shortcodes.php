<?php

	/* Add shortcodes */
	add_shortcode('upme', 'upme_shortcode');
	add_shortcode('upme_search', 'upme_search');
	add_shortcode('upme_registration', 'upme_registration');
	add_shortcode('upme_login', 'upme_login');
	add_shortcode('upme_private', 'upme_private');
	add_shortcode('upme_logout', 'upme_logout');
	add_shortcode('upme_reset_password', 'upme_reset_password');
	
	function upme_shortcode($atts) {
		global $upme;
		return $upme->display( $atts );
	}
	
	function upme_search($atts) {
		global $upme;
		return $upme->search($atts);
	}
	
	function upme_registration($atts) {
		global $upme;
		if (is_user_logged_in()) {
			return $upme->display( $atts );
		}else{
			return $upme->show_registration( $atts );
		}
		
	}
	
	function upme_login($atts) {
		global $upme;
		
		if (!is_user_logged_in()) {
		return $upme->login( $atts );
		} else {
		return $upme->display_mini_profile( $atts );
		}
	}
	
	function upme_private($atts, $content = null) {
		global $upme;
		return $upme->hidden_content($atts, $content);
	}
	
	function upme_logout($atts) {
		global $upme;
		return $upme->logout($atts);
	}

	function upme_reset_password($atts) {
		global $upme;
		if (!is_user_logged_in()) {
			return $upme->upme_reset_password($atts);
		} else {
			return $upme->display_mini_profile( $atts );
		}

	}
	
?>