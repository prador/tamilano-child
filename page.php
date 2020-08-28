<?php global $image_path; ?>
<?php get_header(); ?>
 	<main role="main" class="main">
		<div class="container white-overlay">
			<?php the_content(); ?>
		</div>
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
