<?php global $image_path; ?>
<?php get_header("welcome"); ?>
<div class="welcome-wrapper">
	<div class="left-column" >
		<div class="logo">
			<img src="<?php echo $image_path; ?>/ta-logo-gold.svg" class="img-fluid" />
		</div>
	</div>
	<div class="right-column">
		<div class="welcome-box first-box" style="background:url(<?php  echo wp_get_attachment_url(get_field("immagine_1")); ?>); background-size:cover; background-position:center">
			<div class="link-box">
				<div class="link-icon">
					<img src="<?php echo $image_path; ?>/pattern-orange.png" class="img-fluid" />
				</div>
				<div class="d-inline-block">
					<div class="link-title"><?php _e('Chocolate & Pastry','tamilano-child-clone'); ?></div>
					<a href="home-page-shop" class="link-button"><?php _e('Take me to the shop','tamilano-child-clone'); ?></a>
				</div>
			</div>
			<div class="overlay"></div>
		</div>
		<div class="welcome-box second-box" style="background:url(<?php echo wp_get_attachment_url(get_field("immagine_2")); ?>); background-size:cover; background-position:center">
			<div class="link-box">
				<div class="link-icon">
					<img src="<?php echo $image_path; ?>/pattern-orange.png" class="img-fluid" />
				</div>
				<div class="d-inline-block">
					<div class="link-title"><?php _e('Catering & Event','tamilano-child-clone'); ?></div>
					<a href="catering-banqueting" class="link-button"><?php _e('Contact for more','tamilano-child-clone'); ?></a>
				</div>
			</div>
			<div class="overlay"></div>
		</div>
	</div>
</div>
<?php get_footer("welcome"); ?>
