<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


<footer class="footer">	
	<section id="footer-columns" class="footer-columns section_nopadding">
		<div class="content_footer">
			<div class="row">
				
				<div class="col-md-4 col_logo">
					<div class="footer-logo">
						<?php 
						$footer_logo = _pincuter_theme_option('theme_options_footer_logo_image');
						$footer_logo_id = _pincuter_theme_option('theme_options_footer_logo_image_id');
						?>
						<a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>">
							<img width="" height="" class="pf_logo_image_standard img-fluid" src="<?php echo $footer_logo; ?>" alt="<?php bloginfo('name'); ?>">
						</a>
					</div>
					<div class="clear"></div>
					<div class="spacer space-1"></div>
					
					<div class="footer-tagline">
						<p><?php echo _pincuter_theme_option('theme_options_footer_tagline'); ?></p>
					</div>
				</div>

				<div class="col-md-8 col_widget">
					<div class="col_widget__inner">
						<div class="row row_inner justify-content-end align-items-end">
							
							<div class="col-md-3 col_menu col_footer_menu_3">
								<nav class="nav nav__footer clearfix">
									<?php 
									wp_nav_menu( array(
										'menu' => 'footer-1',
										'container'      => 'ul',
										'menu_class'     => 'footer-menu',
										'menu_id'        => 'footernav',
										'depth'          => 0,
									));
									?>
								</nav>
							</div>
							<div class="col-md-3 col_widget col_apps">
								<?php 
								$theme_options_apps_titolo_sezione = _pincuter_theme_option('theme_options_apps_titolo_sezione');

								
								echo '<aside id="store-apps" class="widget widget-sidebar">';
									
									echo '<div class="row">';
										echo '<div class="col-md-12 col-xs-12">';
											echo '<div class="app-section-title">';
												echo '<div class="app-section-title-flex">';
													echo '<p class="app-section-title__heading">'.$theme_options_apps_titolo_sezione.'</p>';
												echo '</div>';
											echo '</div>';
										echo '</div>';
									echo '</div>';	
									
									echo '<div class="clear"></div>';
										
									echo '<div class="row">';

										$apps_metas = _pincuter_theme_option('cmb_pincuter_theme_options_apps_group_field', true );
										foreach ( (array) $apps_metas as $key => $app_meta ) {

											$app_enable = $app_title = $app_url = $app_image = $app_image_id = '';
											
											if ( isset( $app_meta['theme_options_app_enable'] ) && !empty( $app_meta['theme_options_app_enable'] ) ) {
												$app_enable = $app_meta['theme_options_app_enable'];
											}
											if ( isset( $app_meta['theme_options_app_title'] ) && !empty( $app_meta['theme_options_app_title'] ) ) {
												$app_title = $app_meta['theme_options_app_title'];
											}
											if ( isset( $app_meta['theme_options_app_url'] ) && !empty( $app_meta['theme_options_app_url'] ) ) {
												$app_url = $app_meta['theme_options_app_url'];
											}
											if ( isset( $app_meta['theme_options_app_image'] ) && !empty( $app_meta['theme_options_app_image'] ) ) {
												$app_image = $app_meta['theme_options_app_image'];
											}
											if ( isset( $app_meta['theme_options_app_image_id'] ) && !empty( $app_meta['theme_options_app_image_id'] ) ) {
												$app_image_id = $app_meta['theme_options_app_image_id'];
											}

											
											$app_image_tag_alt = '';
											
											$app_image_caption_tag = get_post_meta( $app_image_id, '_wp_attachment_image_alt', true);
											if( !empty($app_image_caption_tag) ){
												$app_image_tag_alt = $app_image_caption_tag;
											} else {
												$app_image_tag_alt = $app_title;
											}
											/*
											$app_image_tag_title = '';
											$app_image_caption_title = get_the_title($app_image_id);
											if( !empty($app_image_caption_title) ){
												$app_image_tag_title = $app_image_caption_title;
											} else {
												$app_image_tag_title = $app_title;
											}
											*/

											$app_image_getimagesize = getimagesize($app_image);

											if( $app_enable == 'abilita'){
												echo '<div class="col-md-12 col-xs-6 col-xxs-6 col_item">';
													echo '<a target="_blank" href="'.$app_url.'" title="'.$app_title.'">';
														echo '<img width="'.$app_image_getimagesize[0].'" height="'.$app_image_getimagesize[1].'" class="img-fluid" src="'.$app_image.'" alt="'.$app_image_tag_alt.'" />';
													echo '</a>';
												echo '</div>';
											}
										}

									echo '</div>';
								echo '</aside>';
								
								
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--
		<div class="clear"></div>
		<div class="spacer space-2"></div>
		-->

	</section>
	
	
	<section id="footer-copyright" class="footer-copyright section_nopadding">
		<div class="content_footer">
			<div class="row justify-content-between align-items-center">
				<div class="col-md-10">
					<div class="footer-copyright-wrap">
						<p class="mb-0">
							<?php echo _pincuter_theme_option('theme_options_footer_copyright'); ?>
						</p>
					</div>
				</div>
				<div class="col-md-2">
					<div class="footer-item-social__list">
						<?php 
						/*
						<div class="footer-social-item footer-social-facebook">
							<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_facebook'); ?>" title="Seguici su Facebook">
								<i class="bi bi-facebook"></i>
							</a>
						</div>
						<div class="footer-social-item footer-social-twitter">
							<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_twitter'); ?>" title="Seguici su Twitter">
								<i class="bi bi-twitter-x"></i>
							</a>
						</div>
						<div class="footer-social-item footer-social-linkedin">
							<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_linkedin'); ?>" title="Seguici su Linkedin">
								<i class="bi bi-linkedin"></i>
							</a>
						</div>
						<div class="footer-social-item footer-social-youtube">
							<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_youtube'); ?>" title="Seguici su Youtube">
								<i class="bi bi-youtube"></i>
							</a>
						</div>
						<div class="footer-social-item footer-social-email">
							<a href="mailto:<?php echo _pincuter_theme_option('theme_options_social_email'); ?>" title="Inviaci un'E-Mail">
								<i class="bi bi-envelope"></i>
							</a>
						</div>
						*/
						?>
						<div class="footer-social-item footer-social-facebook">
							<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_facebook'); ?>" title="Seguici su Facebook">
								<i class="bi bi-facebook"></i>
							</a>
						</div>
						<div class="footer-social-item footer-social-email">
							<a href="mailto:<?php echo _pincuter_theme_option('theme_options_social_email'); ?>" title="Inviaci un'E-Mail">
								<i class="bi bi-envelope"></i>
							</a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>

</footer>