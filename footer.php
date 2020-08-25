<?php global $image_path; ?>	
	<div class="fixed-footer">
		<div class="prefooter">
			<div class="container">
				<div class="row h-100">
					<div class="col-center offset-custom left-mobile">
						<div class="orange-footer-pattern">
							<img src="<?php echo $image_path; ?>/pattern-orange.png" class="img-fluid" />
						</div>
					</div>
					<div class="col-custom pattern-mobile">
						<div class="newsletter-box">
							<div class="prefooter-title">
								<?php _e("Stay updated", "tamilano-child"); ?>
							</div>
							<div class="newsletter-form">
								<?php echo do_shortcode('[contact-form-7 id="156" title="Newsletter Form"]'); ?>
							</div>
							<div class="prefooter-title">
								<?php _e("Follow Us", "tamilano-child"); ?>
							</div>
							<div class="social-link">
								<ul>
									<li><a href="https://www.instagram.com/tamilano" target="_blank">Instagram</a></li>
									<li><a href="https://www.facebook.com/TaMilanoOfficial" target="_blank">Facebook</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer">
			<div class="container">
				<div class="row align-items-end">
					<div class="col-12 col-md-6">
						<div class="copyright">
							<?php bloginfo('name'); ?> s.r.l. P.IVA IT05696960961 - <?php _e("All rights reserved", 'tamilano-child'); ?>. 
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="row">
							<div class="col-6 col-md-4">
								<?php if ( is_active_sidebar( 'footer_column_1' ) ) : ?>
									<?php dynamic_sidebar( 'footer_column_1' ); ?>
								<?php endif; ?>
							</div>
							<div class="col-6 col-md-4">
								<?php if ( is_active_sidebar( 'footer_column_2' ) ) : ?>
									<?php dynamic_sidebar( 'footer_column_2' ); ?>
								<?php endif; ?>
							</div>
							<div class="col-6 col-md-4">
								<?php if ( is_active_sidebar( 'footer_column_3' ) ) : ?>
									<?php dynamic_sidebar( 'footer_column_3' ); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
