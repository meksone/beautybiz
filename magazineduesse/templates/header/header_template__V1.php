<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>

<header class="header">
	<div class="stickup_menu_holder">
		
		<div class="stickup-wrapper stickup-wrapper-logo">
			
				<div class="row">
					<div class="col-md-12">
						<div class="header-item-wrapper">		
							
							<div class="header-item header-item-social header-item-social__desktop">
								<div class="header-item-social__list">
									<div class="header-social-item header-social-facebook">
										<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_facebook'); ?>" title="Seguici su Facebook">
											<i class="bi bi-facebook"></i>
										</a>
									</div>
									<div class="header-social-item header-social-twitter">
										<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_twitter'); ?>" title="Seguici su Twitter">
											<i class="bi bi-twitter-x"></i>
										</a>
									</div>
									<div class="header-social-item header-social-linkedin">
										<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_linkedin'); ?>" title="Seguici su Linkedin">
											<i class="bi bi-linkedin"></i>
										</a>
									</div>
									<div class="header-social-item header-social-youtube">
										<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_youtube'); ?>" title="Seguici su Youtube">
											<i class="bi bi-youtube"></i>
										</a>
									</div>
									<div class="header-social-item header-social-email">
										<a href="mailto:<?php echo _pincuter_theme_option('theme_options_social_email'); ?>" title="Inviaci un'E-Mail">
											<i class="bi bi-envelope"></i>
										</a>
									</div>
								</div>
							</div>

							<div class="header-item header-item-logo"> 
								<!-- BEGIN LOGO -->
								<div class="logo">
									<a href="<?php echo home_url(); ?>/" class="logo_h logo_h__img">
										<!-- standard-logo -->
										<img class="pf_logo_image_standard" src="<?php echo _pincuter_theme_option('theme_options_header_logo_image'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>">
									</a>
								</div>
								<!-- END LOGO -->							
							</div>

							<div class="header-item header-item-search header-item-search__desktop">
								<div class="search-form search-form__h">
									<form id="search-header" class="search-form_item" method="get" action="<?php echo home_url(); ?>/" accept-charset="utf-8">
										<input name="s" placeholder="Cerca..." value="<?php the_search_query(); ?>" class="search-form_it" type="text" onfocus="clearText(this)" onblur="clearText(this)">
										<button type="submit" class="search-form_item search-form_is">
											<i class="bi bi-search"></i>
										</button>
									</form>
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

							<div class="header-item header-item-social header-item-social__mobile">
								<div class="header-item-social__list">
									<div class="header-social-item header-social-facebook">
										<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_facebook'); ?>" title="Seguici su Facebook">
											<i class="bi bi-facebook"></i>
										</a>
									</div>
									<div class="header-social-item header-social-twitter">
										<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_twitter'); ?>" title="Seguici su Twitter">
											<i class="bi bi-twitter-x"></i>
										</a>
									</div>
									<div class="header-social-item header-social-linkedin">
										<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_linkedin'); ?>" title="Seguici su Linkedin">
											<i class="bi bi-linkedin"></i>
										</a>
									</div>
									<div class="header-social-item header-social-youtube">
										<a target="_blank" href="<?php echo _pincuter_theme_option('theme_options_social_youtube'); ?>" title="Seguici su Youtube">
											<i class="bi bi-youtube"></i>
										</a>
									</div>
									<div class="header-social-item header-social-email">
										<a href="mailto:<?php echo _pincuter_theme_option('theme_options_social_email'); ?>" title="Inviaci un'E-Mail">
											<i class="bi bi-envelope"></i>
										</a>
									</div>
								</div>
							</div>	

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

							<div class="header-item header-item-today">
								<?php 
								/*
								echo date('l, d F Y');
								$timestamp = time();
								setlocale(LC_TIME, "it_IT.utf8");
								$currentDate = gmdate('l, d F Y', $timestamp);
								echo $currentDate;
								*/
								echo wp_date('l, d F Y');
								?>
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
</header>