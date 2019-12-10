<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package jumtechWP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'jumtechWP_container_type' );
?>

<div class="site-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-12">

				<div class="footer-inner">
					
				<?php if ( has_custom_logo() ) : ?>

					<div class="footer-logo">
						<?php the_custom_logo(); ?>
					</div>

				<?php endif; ?>

				<?php wp_nav_menu(
						array(
							'theme_location'  => 'footer-menu',
							'container_class' => 'footer-menu',
							'container_id'    => 'footer-menu',
							'menu_class'      => 'navbar-nav ml-auto',
						)
					); ?>

					<div class="footer-socials">
						<a href="https://www.facebook.com/WaterLotusSkinCare" target="_blank"><i class="fab fa-facebook-square"></i></a>
						<a href="https://www.instagram.com/waterlotusbd/?hl=en" target="_blank"><i class="fab fa-instagram"></i></a>
					</div>


				</div>

			</div>

		</div>

		<div class="row">
			<div class="col-12 center">

					<span class="site-promotion">Developed by <a href="https://jumtech.net" target="_blank">Jumtech</a> with love.</span>

			</div>
		</div>

	</div><!-- container end -->

</div><!-- site-footer -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

