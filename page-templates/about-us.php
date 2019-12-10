
<?php
/**
 * Template Name: About us
 *
 * This template will be used to display FAQs
 * @package jumtechWP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'jumtechWP_container_type' );
?>

<div class="page-banner about-us gradient-bg">

	<div class="about-us-logo">

		<!-- Your site title as branding in the menu -->
		<?php if ( ! has_custom_logo() ) { ?>

			<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

		<?php } else { the_custom_logo(); } ?> 
		<!-- end custom logo -->

	</div>
</div>

<div class="page main-content">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="page-content-main center">

				<?php while ( have_posts() ) : the_post(); ?>

				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

					<?php the_content(); ?>

				<?php endwhile; // end of the loop. ?>

        </div><!--.page-content-main-->
      </div>

    </div>
  </div>
</div><!--.page .main-content-->

<?php get_footer(); ?>