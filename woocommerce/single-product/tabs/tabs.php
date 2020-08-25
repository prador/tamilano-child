<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if( have_rows('tabs') ): ?>
	<div class="row">
		<div class="col-12">
			<div class="woocommerce-tabs tamilano-tabs wc-tabs-wrapper">
				<ul class="tabs wc-tabs" role="tablist">
					<?php while( have_rows('tabs') ): the_row(); ?>
						<li>
							<a href="#tab-<?php echo get_sub_field("id_tab"); ?>">
								<?php echo get_sub_field("titolo_tab"); ?>
							</a>
						</li>
					<?php endwhile;?>
				</ul>
				<?php while( have_rows('tabs') ): the_row(); ?>
					<div class="woocommerce-Tabs-panel panel entry-content wc-tab" id="tab-<?php echo get_sub_field("id_tab") ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo get_sub_field("id_tab") ?>">	
						<?php echo get_sub_field("contenuto_tab"); ?>
					</div>
				<?php endwhile;?>
				<?php do_action( 'woocommerce_product_after_tabs' ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>

