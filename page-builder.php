<?php /* Template Name: Builder Template */ ?>
<?php get_header(); ?>
<?php global $image_path; ?>
 	<main role="main" class="main">
		<?php
			if (have_rows('builder')) :
				while (have_rows('builder')) : the_row();
				// Your loop code
				get_template_part('partials/' . get_row_layout());
				endwhile;
			endif;
		?>
		<div class="fixed-logo">
			<div class="container">
				<div class="row h-100">
					<div class="col-custom full-mobile">
						<div class="big-logo">
							<img src="<?php echo $image_path; ?>/ta-logo-outline.svg" class="img-full">
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>
