<?php
/**
 * The template for displaying search forms
 *
 * @package jumtechWP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>


	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">

		<div class="search-box">

			<input class="search-text" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Type here &hellip;', 'jumtechWP' ); ?>" value="<?php the_search_query(); ?>" required >

			<input class="search-submit" name="submit" type="submit" value="<?php esc_attr_e( 'Search', 'jumtechWP' ); ?>" id="searchsubmit">

		</div>

	</form>
