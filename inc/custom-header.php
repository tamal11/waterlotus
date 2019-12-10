<?php
/**
 * Custom header setup.
 *
 * @package jumtechWP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'after_setup_theme', 'jumtechWP_custom_header_setup' );

if ( ! function_exists( 'jumtechWP_custom_header_setup' ) ) {
	function jumtechWP_custom_header_setup() {

		/**
		 * Filter jumtechWP custom-header support arguments.
		 *
		 * @since jumtechWP 0.5.2
		 *
		 * @param array $args {
		 *     An array of custom-header support arguments.
		 *
		 *     @type string $default-image          Default image of the header.
		 *     @type string $default_text_color     Default color of the header text.
		 *     @type int    $width                  Width in pixels of the custom header image. Default 954.
		 *     @type int    $height                 Height in pixels of the custom header image. Default 1300.
		 *     @type string $wp-head-callback       Callback function used to styles the header image and text
		 *                                          displayed on the blog.
		 *     @type string $flex-height            Flex support for height of header.
		 * }
		 */
		add_theme_support(
			'custom-header',
			apply_filters(
				'jumtechWP_custom_header_args',
				array(
					'default-image' => get_parent_theme_file_uri( '/img/header.jpg' ),
					'width'         => 2000,
					'height'        => 1200,
					'flex-height'   => true,
				)
			)
		);

		register_default_headers(
			array(
				'default-image' => array(
					'url'           => '%s/img/header.jpg',
					'thumbnail_url' => '%s/img/header.jpg',
					'description'   => __( 'Default Header Image', 'jumtechWP' ),
				),
			)
		);
	}
}
