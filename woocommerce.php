<?php global $image_path; ?>
<?php get_header(); ?>
 	<main role="main" class="main">
		<div class="container white-overlay">
		<?php 
		if(is_shop()){
			$page = get_page_by_path("chocolate-shop");

			if (have_rows('builder', $page->ID)) :
				while (have_rows('builder', $page->ID)) : the_row();
				// Your loop code
				get_template_part('partials/' . get_row_layout());
				endwhile;
			endif;
			
		}else if(is_singular("product") ){
			woocommerce_content();
		}else{
			wc_get_template("archive-product.php");
		}?>
		<div class="fixed-logo">
			<div class="container">
				<div class="row h-100">
					<div class="col-custom full-mobile">
						<div class="big-logo">
							<img src="<?php echo $image_path; ?>/ta-logo-outline.png" class="img-full">
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php get_footer(); ?>
