<footer class="footer welcome">
	<div class="container">
		<div class="row align-items-end">
			<div class="col-12 col-md-6">
				<div class="copyright">
					<?php bloginfo('name'); ?> s.r.l. P.IVA IT05696960961 - <?php _e("All rights reserved", 'tamilano-child-clone'); ?>. 
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
