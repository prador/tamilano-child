<?php global $image_path; ?>
<div class="divider"></div>
<div class="section featured-product">
    <div class="container">
        <div class="row">   
            <div class="col-center offset-custom left-mobile">
                <div class="section-title-icon">
                    <img src="<?php echo $image_path; ?>/pattern-orange.svg" class="img-fluid" />
                </div>
            </div>
            <div class="col-custom pattern-mobile">
                <div class="section-title">
                    <?php echo get_sub_field("titolo"); ?>
                </div>
            </div>
        </div>
        <?php 
            $num_colonne = get_sub_field("numero_colonne");
            $col = 12 / $num_colonne;
        ?>
    </div>
<div <?php if(get_sub_field("white_background")): echo "style='background:#fff'"; endif; ?>>
    <?php if( have_rows('products') ): ?>
    <div class="container">    
        <div class="row justify-content-center">   
            <?php while( have_rows('products') ): the_row(); 
                $id_product = get_sub_field("product");
            ?>
                <div class="col-12 col-md-6 col-lg-<?php echo $col; ?>">
                    <div class="product-box">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-image">
                                    <a href="<?php the_permalink($id_product)?>">
                                        <img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($id_product), 'single-post-thumbnail' ); echo $image[0];?>" class="img-fluid" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="product-name">
                                    <a href="<?php the_permalink($id_product)?>">
                                         <?php echo get_the_title($id_product); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="product-price"><?php $product = wc_get_product($id_product); echo $product->get_price(); ?> &euro;</div>
                            </div>
                            <div class="col-8">
                            <?php if ( $product->is_type( 'variable' ) ): ?>
                                <div class="product-add-to-cart"><a class="orange-button" href="<?php the_permalink($id_product)?>"><?php _e("Select option", "woocommerce"); ?></a> </div>
                            <?php else: ?>
                                <div class="product-add-to-cart"><a class="orange-button" href="cart/?add-to-cart=<?php echo $id_product; ?>"><?php _e("Add to cart", "woocommerce"); ?></a> </div>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>