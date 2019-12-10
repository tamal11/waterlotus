<?php
/**
 * Check and setup theme's default settings
 *
 * @package jumtechWP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'jumtechWP_setup_theme_default_settings' ) ) {
	function jumtechWP_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$jumtechWP_posts_index_style = get_theme_mod( 'jumtechWP_posts_index_style' );
		if ( '' == $jumtechWP_posts_index_style ) {
			set_theme_mod( 'jumtechWP_posts_index_style', 'default' );
		}

		// Sidebar position.
		$jumtechWP_sidebar_position = get_theme_mod( 'jumtechWP_sidebar_position' );
		if ( '' == $jumtechWP_sidebar_position ) {
			set_theme_mod( 'jumtechWP_sidebar_position', 'right' );
		}

		// Container width.
		$jumtechWP_container_type = get_theme_mod( 'jumtechWP_container_type' );
		if ( '' == $jumtechWP_container_type ) {
			set_theme_mod( 'jumtechWP_container_type', 'container' );
		}
	}
}
