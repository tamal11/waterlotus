<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package jumtechWP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'jumtechWP_container_type' );
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml"  xmlns:og="http://ogp.me/ns#">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta property="og:image" content="http://waterlotusbd.com/wp-content/uploads/2019/05/Water-lotus-logo.jpg" />
	<meta property="og:title" content="Water Lotus | Be simple and authentic" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="Water Lotus ensures supply of genuine and intact products of renowned global brands" />
	
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700" rel="stylesheet">
	
	<link rel="image_src" href="http://waterlotusbd.com/wp-content/uploads/2019/03/waterlotus.png" />
	

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="site" id="page">

	<div class="site-header mobile">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-12">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryMenu" aria-controls="primaryMenu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'jumtechWP' ); ?>">
						<i class="fas fa-bars"></i>
					</button>

					<!-- Your site title as branding in the menu -->
					<div class="site-logo">

					<?php if ( ! has_custom_logo() ) { ?>

						<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

					<?php } else { the_custom_logo(); } ?> <!-- end custom logo -->
					
					</div>

					<div class="nav-quick-access">

						<!-- site search -->
						<button type="button" class="site-search-icon navbar-toggler" data-toggle="collapse" data-target="#siteSearch" aria-controls="siteSearch" aria-expanded="false">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/searchalone.png" alt="search">
						</button>

						<?php
						//Check if WooCommerce is activated
						if ( class_exists( 'woocommerce' ) ) : ?>

						<!-- shopping cart -->
						<a class="site-cart" href="<?php echo wc_get_cart_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/cart.png" alt="cart">
						</a>

						<!-- my account -->
						<?php
							if ( is_user_logged_in() ) : ?>
								
								<a class="site-user" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','jumtechWP'); ?>"> <?php global $current_user; get_currentuserinfo(); echo get_avatar( $current_user->ID, 26 ); ?> </a>

						<?php  else : ?>

								<a class="site-user" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login','jumtechWP'); ?>"><i class="fas fa-user-tie"></i></a>
							
						<?php	endif; ?>

						<?php else:  echo ' Please install and activate WooCommerce plugin.'; endif; ?>


					</div>

					<!-- site search form expand -->
					<div class="site-search collapse navbar-collapse" id="siteSearch">

						<div class="searchform">
							<?php get_search_form(); ?>
						</div>

					</div>

					<!-- primary menu expand -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'primaryMenu',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new jumtechWP_WP_Bootstrap_Navwalker(),
						)
					); ?>

				</div>
			</div>
		</div>
	</div>
	<!-- .site-header.mobile -->

<div class="sticky-top">
	<div class="site-header-top">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-12">

					<div class="site-top">

						<span class="phone">Call us: +880 1770-531993</span>

						<!-- search form -->
						<span class="site-searchform">
							<?php get_search_form(); ?>
						</span>

						<!-- facebook shop -->
						<span class="fb-shop"><a href="https://www.facebook.com/pg/WaterLotusSkinCare/shop" target="_blank"><i class="fab fa-facebook-square"></i> Facebook Shop</a></span>


						<?php
						//Check if WooCommerce is activated
						if ( class_exists( 'woocommerce' ) ) : ?>

						<!-- my account -->
						<span class="my-account">
							<!-- user access menu -->
							<?php
								if ( is_user_logged_in() ) : 
								global $current_user; get_currentuserinfo(); echo get_avatar( $current_user->ID, 26 ); ?>  <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','jumtechWP'); ?>"><?php _e('My Account','jumtechWP'); ?></a>

							<?php  else : ?>

								<div class="logged-out-user">
									<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login','jumtechWP'); ?>"> <i class="fas fa-user-tie"></i> <?php _e('Login','jumtechWP'); ?></a>
								</div>
								
							<?php	endif; ?>

						</span><!-- .my-account -->

						<!-- shopping cart -->
						<span class="site-cart">
							<a href="<?php echo wc_get_cart_url(); ?>">

								<img src="<?php echo get_template_directory_uri(); ?>/images/icons/cart-white.png" alt="cart">

								<span class="cart-info">

									<!-- get items number -->
									<span class="total-items"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>

									<!-- get items price -->
									<span class="total-price"><?php echo WC()->cart->get_cart_total(); ?></span>

								</span>

							</a>
						</span><!-- .site-cart -->

						<?php else:  echo ' Please install and activate WooCommerce plugin.'; endif; ?>

					</div>

				</div>
			</div>
		</div>
	</div>
	<!--site-header-top-->

	<div class="site-header-menu">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">

				<div class="col-2">

					<!-- Your site title & logo -->
					<div class="site-logo">

					<?php if ( ! has_custom_logo() ) { ?>

						<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

					<?php } else { the_custom_logo(); } ?> <!-- end custom logo -->
					
					</div>

				</div>
				<div class="col-10">

					<!-- primary menu desktop -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'desktop-primary-menu',
							'container_id'    => '',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new jumtechWP_WP_Bootstrap_Navwalker(),
						)
					); ?>

				</div>

			</div>
		</div>
	</div>
	<!--site-header-menu-->
</div>