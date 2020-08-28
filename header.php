<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<?php global $image_path; $image_path =  get_stylesheet_directory_uri()."/img"; ?>

	</head>
	<body <?php body_class(); ?>>
		<div class="wrapper">
			<header class="header">
				<div class="container">
					<div class="row align-items-center d-none d-md-flex">
						<div class="col-custom">
							<?php 
								wp_nav_menu(
									array(
										'menu' => "Menu Principale Sx",
										'menu_class' => "main-menu text-left"
									)
								); 
							?>
						</div>
						<div class="col-center">
							<div class="logo">
								<a href="<?php echo site_url();?>/home-page-shop"><img src="<?php echo $image_path?>/header-logo.svg" class="img-fluid" /></a>
							</div>
						</div>
						<div class="col-custom">
						<?php 
								wp_nav_menu(
									array(
										'menu' => "Menu Principale Dx",
										'menu_class' => "main-menu text-right"
									)
								); 
							?>
						</div>
					</div>
					<div class="row align-items-center d-flex d-md-none">
						<div class="col-12">
							<div class="logo">
								<img src="<?php echo $image_path?>/header-logo.svg" class="img-fluid" />
							</div>
							<div class="menu-button">
								<i class="fal fa-bars"></i>
							</div>
							<?php 
								wp_nav_menu(
									array(
										'menu' => "Mobile menu",
										'menu_class' => "main-menu menu-mobile"
									)
								); 
							?>
						</div>
						
					</div>
				</div>
			</header>
			<div class="shop-menu">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-12 col-md-3">
							<ul class="cat-menu">
								<?php
									$args = array(
										'orderby' => 'name',
										'hierarchical' => 1,
										'style' => 'none',
										'taxonomy' => 'product_cat',
										'hide_empty' => 0,
										'parent' => 0,
										'exclude'    => '15'
									);
									
								$categories = get_categories($args);
								foreach ($categories as $categoria):
								?>
									<li><a href="<?php echo get_term_link( $categoria->term_id, 'product_cat' ); ?>"><?php echo $categoria->name; ?></a></li>
								<?php endforeach;?>
							</ul>
						</div>
						<div class="col-12 col-md">
						<?php
							$args = array(
								'posts_per_page'   => 3,
								'orderby'          => 'rand',
								'post_type'        => 'product' 
							); 
							$rand_prod = get_posts($args);
							foreach ($rand_prod as $prod):
						?>
						<a href="<?php echo get_the_permalink($prod->ID);?>"><img src="<?php echo get_the_post_thumbnail_url($prod->ID); ?>" class="image-menu"></a>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>