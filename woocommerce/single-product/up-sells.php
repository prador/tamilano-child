<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product, $image_path;


$cats = get_the_terms($product->get_id(), 'product_cat');
if (!count($cats)) {
    return;
}
$args = array(
    'post_type'           => 'product',
    'ignore_sticky_posts' => 1,
    'no_found_rows'       => 1,
    'posts_per_page'      => 4,
    'orderby'             => 'rand',
    'post__not_in'        => array( $product->get_id() ),
    'tax_query'           => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'id',
                                    'terms' => $cats[0]->term_id
                                )
                            )
);
$prodQuery = new WP_Query( $args );

if ( $prodQuery->have_posts() ) {
    $postProds = $prodQuery->posts;
?>
    <section class="up-sells upsells products section">
		<div class="row">
			<div class="col-12">
				<div class="divider shorter"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-center offset-custom left-mobile">
				<div class="section-title-icon">
					<img src="<?php echo $image_path; ?>/pattern-orange.png" class="img-fluid" />
				</div>
			</div>
			<div class="col-custom pattern-mobile">
				<div class="section-title"><?php esc_html_e( 'You may also like', 'woocommerce' ) ?></div>
			</div>
		</div>
		<?php woocommerce_product_loop_start(); ?>
			<?php foreach ( $postProds as $postProd ) : ?>
				<div class="col-12 col-md-3">
					<?php
						// $post_object = get_post( $upsell->get_id() );
						setup_postdata( $GLOBALS['post'] =& $postProd );
						wc_get_template_part( 'content', 'product' ); ?>
				</div>
			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>
    </section>
	
<?php
}
wp_reset_postdata();
?>