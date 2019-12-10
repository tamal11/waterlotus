
<?php
/**
 * Template Name: FAQs
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

<div class="page-banner faq-page"></div>

<div class="page main-content">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="page-content-main">

            <div class="accordion" id="accordionFAQ">

              <?php
								$args = array(
									// Arguments for your query.
									'category_name' => 'faqs',
									'posts_per_page' => '-1',
									'order' => 'ASC',
									'orderby' => 'date',
									'ignore_sticky_posts' => true,
									'post_type' => 'post',
									'post_status' => 'publish'
								);

								// Custom query.
								$query = new WP_Query( $args );
								
								// Check that we have query results.
								if ( $query->have_posts() ) {
								
									// Start looping over the query results.
									while ( $query->have_posts() ) {

										$query->the_post();
										
										// Contents of the queried post results go here.
										get_template_part( 'loop-templates/content-faqs' );

									}
								
								}
								// Restore original post data.
								wp_reset_postdata();
              ?>
              
              </div>

        </div><!--.page-content-main-->
      </div>

    </div>
  </div>
</div><!--.page .main-content-->

<?php get_footer(); ?>