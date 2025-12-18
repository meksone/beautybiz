<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>

			<?php get_template_part("templates/footer/footer_template_bp"); ?>

			</div> <!-- end. container -->
		</div> <!-- end. content clearfix -->
		
		<div id="back-top-wrapper" class="visible-desktop">
			<p id="back-top">
				<?php echo apply_filters( '_pincuter_back_top_html', '<a href="#body" data-rel="anchor"><span></span></a>' ); ?>
			</p>
		</div>

	
	</main><!--End main-holder -->

	<div class="mvp-fly-fade"></div>
	
	<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work properly -->


	<?php /*<script src='https://s.adplay.it/progettocucinabiz/adplay.js' async type='text/javascript'></script>*/ ?>
	
</body>
</html>