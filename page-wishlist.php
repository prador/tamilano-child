<?php /* Template Name: Wishlist Template */ ?>
<?php get_header(); ?>
<?php global $image_path; ?>
 	<main role="main" class="main">
		<div class="container white-overlay">
			<section class="section">
				<div class="row">
					<div class="col-12">
						<div class="divider shorter"></div>
					</div>
					<div class="col-center offset-custom left-mobile">
						<div class="section-title-icon">
							<img src="<?php echo $image_path; ?>/pattern-orange.png" class="img-fluid" />
						</div>
					</div>
					<div class="col-custom pattern-mobile">
						<div class="section-title">
							<?php the_title(); ?>
						</div>
					</div>
				</div>
			</section>
			<?php
			  echo do_shortcode("[ti_wishlistsview]"); 
			?>
		</div>
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