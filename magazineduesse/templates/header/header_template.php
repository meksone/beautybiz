<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$theme_options_header_logo_image = _pincuter_theme_option('theme_options_header_logo_image');
$theme_options_header_logo_image_id = _pincuter_theme_option('theme_options_header_logo_image_id');
?>

<header class="header">
	<div class="stickup_menu_holder section_nopadding">
		
		<div class="stickup-wrapper stickup-wrapper-logo">
			
				<div class="row">
					<div class="col-md-12">
						<div class="header-item-wrapper">		
							
                            <div class="header-item header-item-hamburger__secondary">
								<p id="btnRespNav">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</p>
							</div>

                            <div class="hamburger-secondary-nav">
								<div class="hamburger-secondary-nav-close">
									<div class="secondary-nav-close-wrap">
										<i class="bi bi-x-lg"></i>
									</div>
								</div>

								<div class="hamburger-secondary-logo">
									<?php 
									/*
									<img class="pf_logo_image_standard img-fluid" src="<?php echo _pincuter_theme_option('theme_options_header_logo_image'); ?>" data-id="<?php echo pnctr_cmb2_get_image_id(_pincuter_theme_option('theme_options_header_logo_image')); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>">

									<img class="pf_logo_image_standard img-fluid" src="<?php echo $theme_options_header_logo_image; ?>" width="<?php echo $theme_options_header_logo_getimagesize[0]; ?>" height="<?php echo $theme_options_header_logo_getimagesize[1]; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>">
									*/

									echo wp_get_attachment_image( $theme_options_header_logo_image_id, 'full', false, array( 'class' => 'img-fluid nolazy', 'alt' => get_bloginfo("name"), 'fetchpriority' => 'high' ) );
									?>
									
								</div>
								
								<nav class="nav nav__secondary clearfix">
									<?php 
									wp_nav_menu( array(
										'menu' => 'secondary',
										'container'      => 'ul',
										'menu_class'     => 'secondary-menu',
										'depth'          => 0,
									));
									?>
								</nav>
							</div>

                            <div class="header-item header-item-logo">
								<!-- BEGIN LOGO -->
								<div class="logo">
									<a href="<?php echo home_url(); ?>/" class="logo_h logo_h__img">
										<!-- standard-logo -->
										<?php 
										/*
										<img class="pf_logo_image_standard img-fluid" src="<?php echo _pincuter_theme_option('theme_options_header_logo_image'); ?>" data-id="<?php echo pnctr_cmb2_get_image_id(_pincuter_theme_option('theme_options_header_logo_image')); ?>" data-id-val="<?php echo _pincuter_theme_option('theme_options_header_logo_image_id'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>">

										<img class="pf_logo_image_standard img-fluid" src="<?php echo $theme_options_header_logo_image; ?>" width="<?php echo $theme_options_header_logo_getimagesize[0]; ?>" height="<?php echo $theme_options_header_logo_getimagesize[1]; ?>" data-id="<?php echo $theme_options_header_logo_image_id; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>">
										*/

										echo wp_get_attachment_image( $theme_options_header_logo_image_id, 'full', false, array( 'class' => 'img-fluid nolazy', 'alt' => get_bloginfo("name"), 'fetchpriority' => 'high' ) );
										?>
										
									</a>
								</div>
								<!-- END LOGO -->							
							</div>

                            <div class="header-item header-item-social header-item-social__desktop">
								<div class="header-item-social__list">
									
									<?php 
									/*
									<div class="header-social-item header-social-facebook">
										<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_facebook'); ?>" title="Seguici su Facebook">
											<i class="bi bi-facebook"></i>
										</a>
									</div>
									<div class="header-social-item header-social-linkedin">
										<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_linkedin'); ?>" title="Seguici su Linkedin">
											<i class="bi bi-linkedin"></i>
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

										echo '<div class="header-social-item header-social-'.$social_name.'">';
											echo '<a target="_blank" href="'.$social_url.'" title="'.$social_href_attr_title.'">';
												echo '<i class="bi bi-'.$social_icon.'"></i>';
											echo '</a>';
										echo '</div>';
									}
									?>
									

									<div class="header-social-item header-item-search header-item-search__desktop">
										<a title="Cerca" role="button" id="dropdownSearchButton" href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="bi bi-search"></i>
										</a>
											
										<div class="search-form search-form__h dropdown-menu" aria-labelledby="dropdownSearchButton">
											<form id="search-header" class="navbar-form" method="get" action="<?php echo home_url(); ?>/" accept-charset="utf-8">
												<input name="s" placeholder="Cerca..." value="<?php the_search_query(); ?>" class="search-form_it" type="text" onfocus="clearText(this)" onblur="clearText(this)">
												<button type="submit" class="search-form_is">
													<i class="bi bi-search"></i>
												</button>
											</form>
										</div>
									</div>

								</div>
							</div>
					
							<div class="header-item header-item-hamburger__primary">
								<p id="btnRespNav">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</p>
							</div>
							
						</div>
					</div>
				</div>
			
		</div>

		<div class="stickup-wrapper stickup-wrapper-menu">
			
				<div class="row">
					<div class="col-md-12">
						<div class="header-item-wrapper">

                            <div class="header-item header-item-nav">
								<nav class="nav nav__primary clearfix">
									<?php 
									wp_nav_menu( array(
										'container'      => 'ul',
										'menu_class'     => 'sf-menu',
										'menu_id'        => 'topnav',
										'depth'          => 0,
										'theme_location' => 'header_menu',
										'walker'         => new description_walker()
									));
									?>
								</nav>							
							</div>

							<div class="header-item header-item-social header-item-social__mobile">
								<div class="header-item-social__list">
									
									<?php 
									/*
									<div class="header-social-item header-social-facebook">
										<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_facebook'); ?>" title="Seguici su Facebook">
											<i class="bi bi-facebook"></i>
										</a>
									</div>
									<div class="header-social-item header-social-linkedin">
										<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_linkedin'); ?>" title="Seguici su Linkedin">
											<i class="bi bi-linkedin"></i>
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

										echo '<div class="header-social-item header-social-'.$social_name.'">';
											echo '<a target="_blank" href="'.$social_url.'" title="'.$social_href_attr_title.'">';
												echo '<i class="bi bi-'.$social_icon.'"></i>';
											echo '</a>';
										echo '</div>';
									}
									?>
									
								</div>
							</div>	

                            <div class="header-item header-item-search header-item-search__mobile">
								<a title="Cerca" role="button" id="dropdownSearchButton" href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="bi bi-search"></i>
								</a>
									
								<div class="search-form search-form__h dropdown-menu" aria-labelledby="dropdownSearchButton">
									<form id="search-header" class="navbar-form" method="get" action="<?php echo home_url(); ?>/" accept-charset="utf-8">
										<input name="s" placeholder="Cerca..." value="<?php the_search_query(); ?>" class="search-form_it" type="text" onfocus="clearText(this)" onblur="clearText(this)">
										<button type="submit" class="search-form_is">
											<i class="bi bi-search"></i>
										</button>
									</form>
								</div>
							</div>

						</div>
					</div>
				</div>
			
		</div>

	</div>



	<div class="stickydown_menu_holder section_nopadding">	
		<div class="stickydown-wrapper">
			<div class="row">
				<div class="col-md-12">
					<div class="header-item-wrapper">
						
						<div class="header-item header-item-logo">
							<!-- BEGIN LOGO -->
							<div class="logo">
								<a href="<?php echo home_url(); ?>/" class="logo_h logo_h__img">
									<!-- standard-logo -->
									<?php 
									/*
									<img class="pf_logo_image_standard img-fluid" src="<?php echo _pincuter_theme_option('theme_options_header_logo_image'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>">

									<img class="pf_logo_image_standard img-fluid" src="<?php echo $theme_options_header_logo_image; ?>" width="<?php echo $theme_options_header_logo_getimagesize[0]; ?>" height="<?php echo $theme_options_header_logo_getimagesize[1]; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>">
									*/

									echo wp_get_attachment_image( $theme_options_header_logo_image_id, 'full', false, array( 'class' => 'img-fluid nolazy', 'alt' => get_bloginfo("name"), 'fetchpriority' => 'high' ) );
									?>
									
								</a>
							</div>
							<!-- END LOGO -->							
						</div>

						<div class="header-item header-item-nav">
							<nav class="nav nav__primary_scrolled clearfix">
								<?php 
								wp_nav_menu( array(
									'container'      => 'ul',
									'menu_class'     => 'sf-menu',
									'menu_id'        => 'topnav',
									'depth'          => 0,
									'theme_location' => 'header_menu',
									'walker'         => new description_walker()
								));
								?>
							</nav>							
						</div>

						<div class="header-item header-item-social header-item-social__desktop">
							<div class="header-item-social__list">
								
								<?php 
								/*
								<div class="header-social-item header-social-facebook">
									<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_facebook'); ?>" title="Seguici su Facebook">
										<i class="bi bi-facebook"></i>
									</a>
								</div>
								<div class="header-social-item header-social-linkedin">
									<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_linkedin'); ?>" title="Seguici su Linkedin">
										<i class="bi bi-linkedin"></i>
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

										echo '<div class="header-social-item header-social-'.$social_name.'">';
											echo '<a target="_blank" href="'.$social_url.'" title="'.$social_href_attr_title.'">';
												echo '<i class="bi bi-'.$social_icon.'"></i>';
											echo '</a>';
										echo '</div>';
									}
									?>
								

								<div class="header-social-item header-item-search header-item-search__desktop">
									<a title="Cerca" role="button" id="dropdownSearchButton" href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-search"></i>
									</a>
											
									<div class="search-form search-form__h dropdown-menu" aria-labelledby="dropdownSearchButton">
										<form id="search-header" class="navbar-form" method="get" action="<?php echo home_url(); ?>/" accept-charset="utf-8">
											<input name="s" placeholder="Cerca..." value="<?php the_search_query(); ?>" class="search-form_it" type="text" onfocus="clearText(this)" onblur="clearText(this)">
											<button type="submit" class="search-form_is">
												<i class="bi bi-search"></i>
											</button>
										</form>
									</div>
								</div>

							</div>
						</div>

						<div class="header-item header-item-hamburger__primary_scrolled">
							<p id="btnRespNav">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</p>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

</header>
<div id='gmp-masthead' class='gmp'></div>

<div id='gmp-intext_vip' class='gmp'></div>

<div id="openx_masthead_desktop" class="openx_masthead">
	<!-- /20861521/BM_ROS_970x250_Masthead -->
	<div id='div-gpt-ad-1736854801877-0' style='min-width: 728px; min-height: 90px; margin-left:auto; margin-right:auto;text-align:center;'>
		<script>
		googletag.cmd.push(function() { googletag.display('div-gpt-ad-1736854801877-0'); });
		</script>
	</div>
</div>

<div id="openx_masthead_mobile" class="openx_masthead">
	<!-- /20861521/BB_HP_320x50_Strip_Mobile -->
	<div id='div-gpt-ad-1736854978314-0' style='min-width: 320px; min-height: 50px;margin-left:auto; margin-right:auto;text-align:center;'>
		<script>
  		googletag.cmd.push(function() { googletag.display('div-gpt-ad-1736854978314-0'); });
		</script>
	</div>
</div>