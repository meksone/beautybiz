<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$theme_options_footer_logo_image = _pincuter_theme_option('theme_options_footer_logo_image');
$theme_options_footer_logo_image_id = _pincuter_theme_option('theme_options_footer_logo_image_id');
?>


<footer id="fbp" class="footer">
    <section id="footer-columns" class="footer-columns section_nopadding">
		<div class="content_footer">
			<div class="row">

                <div class="col-md-10 offset-md-1 col_logo">
                    <div class="footer-logo">
						<?php 
						$footer_logo = _pincuter_theme_option('theme_options_footer_logo_image');
						$footer_logo_id = _pincuter_theme_option('theme_options_footer_logo_image_id');
						?>
						<a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>">
							<?php 
							/*
							<img width="" height="" class="pf_logo_image_standard img-fluid" src="<?php echo $footer_logo; ?>" alt="<?php bloginfo('name'); ?>">
							*/

							echo wp_get_attachment_image( $theme_options_footer_logo_image_id , 'full', false, array( 'class' => 'img-fluid', 'alt' => get_bloginfo("name"), 'fetchpriority' => 'high' ) );
							?>
						</a>
					</div>
					<div class="clear"></div>
					<div class="spacer space-1"></div>
					
					<div class="footer-tagline">
						<p><?php echo _pincuter_theme_option('theme_options_footer_tagline'); ?></p>
					</div>
                </div>

                <div class="clear"></div>
				<div class="spacer space-2"></div>

                <div class="col-md-10 offset-md-1 col_social">
                    <div class="footer-item-social__list">
						
						<?php 
						/*
						<div class="footer-social-item footer-social-facebook">
							<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_facebook'); ?>" title="Seguici su Facebook">
								<i class="bi bi-facebook"></i>
							</a>
						</div>
						
						<div class="footer-social-item footer-social-linkedin">
							<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_linkedin'); ?>" title="Seguici su Linkedin">
								<i class="bi bi-linkedin"></i>
							</a>
						</div>
						
						<div class="footer-social-item footer-social-email">
							<a href="mailto:<?php echo _pincuter_theme_option('theme_options_social_email'); ?>" title="Inviaci un'E-Mail">
								<i class="bi bi-envelope"></i>
							</a>
						</div>
						*/

						$social_metas = _pincuter_theme_option('cmb_pincuter_theme_options_socials_group_field');
						foreach ( (array) $social_metas as $key => $social_meta ) {
			
							$social_name = '';
							$social_url = '';
							$social_href_attr_title = '';
							
							if ( isset( $social_meta['theme_options_social_name'] ) && !empty( $social_meta['theme_options_social_name'] ) ) {
								$social_name = $social_meta['theme_options_social_name'];
							}
							if ( isset( $social_meta['theme_options_social_url'] ) && !empty( $social_meta['theme_options_social_url'] ) ) {
								$social_url = $social_meta['theme_options_social_url'];
							}

							if ( isset( $social_meta['theme_options_social_href_attr_title'] ) && !empty( $social_meta['theme_options_social_href_attr_title'] ) ) {
								$social_href_attr_title = $social_meta['theme_options_social_href_attr_title'];
							} else {
								$social_href_attr_title = $social_meta['theme_options_social_name'];
							}

							$social_icon = '';
							$social_urler = '';
							if( $social_name == 'email' ){
								$social_icon = 'envelope';
								$social_urler = 'mailto:'.$social_url;
							} else {
								$social_icon = $social_name;
								$social_urler = $social_url;
							}

							echo '<div class="footer-social-item footer-social-'.$social_name.'">';
								echo '<a target="_blank" href="'.$social_url.'" title="'.$social_href_attr_title.'">';
									echo '<i class="bi bi-'.$social_icon.'"></i>';
								echo '</a>';
							echo '</div>';
						}
						?>
						
					</div>
                </div>

                <div class="clear"></div>
				<div class="spacer space-2"></div>

                <div class="col-md-10 offset-md-1 col_menu">
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

                
				<?php 
				/*
				echo '<div class="clear"></div>';
				echo '<div class="spacer space-2"></div>';

                echo '<div class="col-md-10 offset-md-1 col_apps">';

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

								$app_image_getimagesize = getimagesize($app_image);

								if( $app_enable == 'abilita'){
									echo '<div class="col-md-3 col-xm-6 col-12 col_item">';
										echo '<a target="_blank" href="'.$app_url.'" title="'.$app_title.'">';
											echo '<img width="'.$app_image_getimagesize[0].'" height="'.$app_image_getimagesize[1].'" class="img-fluid" src="'.$app_image.'" alt="'.$app_image_tag_alt.'" />';
										echo '</a>';
									echo '</div>';
									}
							}

						echo '</div>';
					echo '</aside>';

				echo '</div>';
				*/
				?>
				

            </div>
        </div>
    </section>


    <section id="footer-copyright" class="footer-copyright section_nopadding">
		<div class="content_footer">
			<div class="row">
                <div class="col-md-10 offset-md-1 col_copyright">
					<div class="footer-copyright-wrap">
						<p class="mb-0">
							<?php echo _pincuter_theme_option('theme_options_footer_copyright'); ?>
						</p>
					</div>
				</div>
            </div>
        </div>
    </section>

</footer>