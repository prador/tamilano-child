<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

global $image_path;
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
do_action( 'woocommerce_before_main_content' );

?>
<div class="row section">
<div class="col-12">
	<div class="divider short"></div>
</div>
<div class="col-center offset-custom left-mobile">
	<div class="section-title-icon">
    	<img src="<?php echo $image_path; ?>/pattern-orange.svg" class="img-fluid" />
    </div>
</div>
<div class="col-custom pattern-mobile">
	<div class="section-title"><?php woocommerce_page_title(); ?></div>
</div>
</div>
<div class="row">
<div class="col-12 col-md-3">
<?php if ( is_active_sidebar( 'shop' ) ) : ?>
	<?php dynamic_sidebar( 'shop' ); ?>
<?php endif; ?>
</div>
<div class="col-12 col-md-9">
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );
	
	remove_filter( 'woocommerce_product_loop_start', 'woocommerce_maybe_show_product_subcategories' );
	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );
			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
do_action( 'woocommerce_after_main_content' );
?>
</div>
</div>
<?php

get_footer( 'shop' );
