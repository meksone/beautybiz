<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


<footer class="footer">

	<section class="footer-azienda">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<?php get_template_part("templates/footer/logo"); ?>
				</div>
				<div class="col-md-3">
					<div class="footer-about">
						<!--
						<h4>COMAL SpA</h4>
						<p>Zona Industriale "2 Pini"</p>
						<p>S.S. Aurelia km113 </p>
						<p>01014 - Montalto di Castro (VT)</p>
						<p>Tel.  +39 0766 879718</p>
						-->
						<?php dynamic_sidebar('footer-sidebar-1'); ?>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-menu-azienda">
						<?php
						wp_nav_menu( array(
							'menu' => 3,
							'container'      => 'ul',
							'menu_class'     => 'footer-menu',
							'menu_id'        => 'footer-azienda-nav',
							'depth'          => 0,
						));
						?>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-menu-legal">
						<?php
						wp_nav_menu( array(
							'menu' => 4,
							'container'      => 'ul',
							'menu_class'     => 'footer-menu',
							'menu_id'        => 'footer-legal-nav',
							'depth'          => 0,
						));
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="footer-copyright-flex-wrap">
						<div class="footer-copyright-flex-item footer-copyright-flex-item-azienda">
							<p>
								<!--
								© COMAL SpA<br>
								<span class="divider"> | </span>
								Partita IVA: 01685280560<br>
								<span class="divider"> | </span>
								N.REA: VT-121332
								-->
								<?php echo _pincuter_theme_option('theme_options_copyright_azienda'); ?><br>
								<span class="divider"> | </span>
								<?php echo _pincuter_theme_option('theme_options_copyright_piva'); ?><br>
								<span class="divider"> | </span>
								<?php echo _pincuter_theme_option('theme_options_copyright_nrea'); ?>
							</p>
						</div>
						<div class="footer-copyright-flex-item footer-copyright-flex-item-social">
							<div class="footer-social__inner">
								<div class="footer-social-item footer-social-linkedin">
									<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_linkedin'); ?>">
										<i class="fa fa-linkedin"></i>
									</a>
								</div>
								<div class="footer-social-item footer-social-facebook">
									<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_facebook'); ?>">
										<i class="fa fa-facebook"></i>
									</a>
								</div>
								<div class="footer-social-item footer-social-youtube">
									<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_youtube'); ?>">
										<i class="fa fa-youtube-play"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</footer>