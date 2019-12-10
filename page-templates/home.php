<?php
/**
 * Template Name: Homepage
 *
 * Template for displaying custom designed home page
 *
 * @package jumtechWP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'jumtechWP_container_type' );
?>

<div class="hero-slider owl-carousel">

  <!--<div  class="slider one" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/slider/image-one.jpg);"> </div> -->

  <div class="slider two" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/slider/image-two.jpg);"> </div>

  <div class="slider three" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/slider/image-three.jpg);"> </div>

  <div class="slider four" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/slider/image-four.jpg);"> </div>

</div>
<!-- slider ends -->

<div class="product-categories section-space">
  <div class="container">
    <div class="row">
      <div class="col-12">

        <h2 class="heading center">Our <span>Product</span> Categories</h2>

        <div class="cat-items">

          <div class="cat-name one">
            <div class="icon"></div>
            <span>Skin care</span>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>product-category/skin-care/" class="link-overlay"></a>
          </div>

          <div class="cat-name two">
            <div class="icon"></div>
            <span>Baby care</span>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>product-category/baby-care" class="link-overlay"></a>
          </div>

          <div class="cat-name three">
            <div class="icon"></div>
            <span>Hygiene products</span>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>product-category/skin-care/women-hygiene" class="link-overlay"></a>
          </div>

          <div class="cat-name four">
            <div class="icon"></div>
            <span>Clothing</span>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>product-category/clothing" class="link-overlay"></a>
          </div>

          <div class="cat-name five">
            <div class="icon"></div>
            <span>Ornaments</span>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>product-category/ornaments" class="link-overlay"></a>
          </div>

          <div class="cat-name six">
            <div class="icon"></div>
            <span>Fashion accessories</span>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>product-category/fashion-accessories" class="link-overlay"></a>
          </div>

          <div class="cat-name seven">
            <div class="icon"></div>
            <span>Home appliance</span>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>product-category/home-appliance" class="link-overlay"></a>
          </div>

        </div>



      </div>
    </div>
  </div>
</div>
<!-- .product-categories -->

<div class="how-to-buy mobile section-bg section-space">
  <div class="container">
    <div class="row">

      <div class="col-12">

        <h2 class="heading center">Order <span>From</span> Us</h2>

        <div class="order-steps order-slider owl-carousel">

          <div class="order-step one">
            <span></span>
            <h2>Shop now</h2>
            <p>Choose your desired product and press add to cart button</p>
          </div>

          <div class="order-step two">
            <span></span>
            <h2>Payment</h2>
            <p>Pay the way you love, pay now or cash on delivery</p>
          </div>

          <div class="order-step three">
            <span></span>
            <h2>Shipping</h2>
            <p>Our fastest processing will reach your door</p>
          </div>

        </div>
        <!-- .slider -->


      </div>


    </div>
  </div>
</div>
<!-- how-to-buy.mobile -->

<div class="how-to-buy desktop section-bg section-space">
  <div class="container">
    <div class="row">

      <div class="col-12">

        <h2 class="heading center">Order <span>From</span> Us</h2>

        <div class="order-steps">

          <div class="order-step one">
            <span></span>
            <h2>Shop now</h2>
            <p>Choose your desired product and press add to cart button</p>
          </div>

          <div class="order-step two">
            <span></span>
            <h2>Payment</h2>
            <p>Pay the way you love, pay now or cash on delivery</p>
          </div>

          <div class="order-step three">
            <span></span>
            <h2>Shipping</h2>
            <p>Our fastest processing will reach your door</p>
          </div>

        </div>
        <!-- .order-steps -->
      </div>

    </div>
  </div>
</div>
<!-- .how-to-buy.desktop -->

<div class="why-love-us section-space">
  <div class="container">
    <div class="row">

      <div class="col-12">

      <h2 class="heading center">Why <span>Love</span> Us</h2>

        <div class="love-specs">

          <div class="spec one">
            <p>Water Lotus ensures supply of genuine and intact products of renowned global brands.</p>

            <h3>Guarantees authenticity</h3>
          </div>

          <div class="spec two">
            <p>Water Lotus not only sells skin care regimens/home appliances, but also provides it clients with useful tips by product specialists.</p>

            <h3>Extensive customer care</h3>
          </div>

          <div class="spec three">
            <p>We are concerned about your passion and desire. Our packaging gives you a premium feel and quick shipments make Water Lotus a trustworthy source. </p>

            <h3>Unique packaging</h3>
          </div>

        </div>

      </div>

    </div>
  </div>
</div>

<div class="clients-feedback section-bg section-space">
  <div class="container">
    <div class="row">
      <div class="col-12">

        <h2 class="heading center">Our <span>Clients</span> Feedback</h2>

        <div class="feedbacks owl-carousel">

        <?php
          $args = array(
            // Arguments for your query.
            'category_name' => 'reviews',
            'posts_per_page' => '6',
            'order' => 'DESC',
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
              get_template_part( 'loop-templates/content-reviews' );

            }
          
          }
          // Restore original post data.
          wp_reset_postdata();
        ?>

        </div>
        <!-- .feedbacks -->

      </div>
    </div>
  </div>
</div>

<div class="cta section-space">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="cta-content">
          <h2>Ready to begin?</h2>
          <p>Feeling interest? Try our products and services you will love for sure.</p>

          <?php
          //Check if WooCommerce is activated
          if ( class_exists( 'woocommerce' ) ) : ?>

          <a href="<?php echo $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>" class="site-btn">Shop Now</a>

          <?php else:  echo ' Please install and activate WooCommerce plugin.'; endif; ?>
          
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
