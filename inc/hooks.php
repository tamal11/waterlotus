<?php
/**
 * Custom hooks.
 *
 * @package jumtechWP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'jumtechWP_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function jumtechWP_site_info() {
		do_action( 'jumtechWP_site_info' );
	}
}

if ( ! function_exists( 'jumtechWP_add_site_info' ) ) {
	add_action( 'jumtechWP_site_info', 'jumtechWP_add_site_info' );

	/**
	 * Add site info content.
	 */
	function jumtechWP_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'http://wordpress.org/', 'jumtechWP' ) ),
			sprintf(
				/* translators:*/
				esc_html__( 'Proudly powered by %s', 'jumtechWP' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Theme: %1$s by %2$s.', 'jumtechWP' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'http://jumtechWP.com', 'jumtechWP' ) ) . '">jumtechWP.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Version: %1$s', 'jumtechWP' ),
				$the_theme->get( 'Version' )
			)
		);

		echo apply_filters( 'jumtechWP_site_info_content', $site_info ); // WPCS: XSS ok.
	}
}

// Woocommerce hooks interaction
remove_action ('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// remove breadcrumb for shop page

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

