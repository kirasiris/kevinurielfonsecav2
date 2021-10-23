<?php wp_footer(); ?>
<?php if(!is_front_page()) : ?>
	<footer id='end-of-page'>
		<div class="<?php esc_html_e( get_theme_mod( 'theme_container' ) ); ?> mb-25">
			<!-- Section: WordPress Footer Widgets -->
			<div class="row">
				<div class="col-md-3">
					<?php if(is_active_sidebar('footer_area_1')) {
	          dynamic_sidebar('footer_area_1');
	        }
	        ?>
				</div>
				<!-- Go social -->
				<div class="col-md-3">
					<?php if(is_active_sidebar('footer_area_2')) {
	          dynamic_sidebar('footer_area_2');
	        }
	        ?>
				</div>
				<!-- Subscibe -->
				<div class="col-md-3">
					<?php if(is_active_sidebar('footer_area_3')) {
	          dynamic_sidebar('footer_area_3');
	        }
	        ?>
				</div>
				<!-- Subscibe -->
				<div class="col-md-3">
					<?php if(is_active_sidebar('footer_area_4')) {
	          dynamic_sidebar('footer_area_4');
	        }
	        ?>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<!-- Section: Credits -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					<p class="pt-10">
						&copy; <?php echo Date('Y'); ?> -
						<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>. <i class="fa fa-code" id="fa-code"></i> made with <i class="fa fa-heart" aria-hidden="true" id="fa-heart"></i> &#38; &#9749;
					</p>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</footer>
	<a href="#Top" name="Top" id="Top" class="btn btn-default cd-top cd-is-visible cd-fade-out">Back to Top</a>
<?php endif; ?>
<!-- Bootstrap -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/src/js/bootstrap.min.js"></script>
<!-- Custom -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/src/js/custom.js"></script>
</body>
</html>
