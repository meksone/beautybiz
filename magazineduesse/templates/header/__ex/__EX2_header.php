<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


<?php if( is_front_page() ){ ?>
	<section class="header-image-desktop" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/slider-home.jpg);">
		<img class="img-desktop" src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider-home.jpg" alt="" title="" />
		
		<div class="header-image-desktop-content">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-offset-1">
						<div class="spacer space-120"></div>
						<h2 class="image-desktop-titolo colore-blu">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h2>
						<div class="clear"></div>
						<div class="spacer space-45"></div>
						<div class="header-image-desktop-anchor">
							<a class="header-image-desktop-anchor-link" href="#">Green Energy <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } else { ?>
	<section class="header-image-desktop" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/page-header.jpg);">
		<img class="img-desktop" src="<?php echo get_stylesheet_directory_uri(); ?>/images/page-header.jpg" alt="" title="" />
	</section>
<?php } ?>


<div class="top-header">
	<div class="top-header-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
					<div class="top-header-item-wrapper">
						<div class="top-header-language">
							<?php get_template_part("templates/header/languages"); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<header class="header">
	<div class="stickup_menu_holder">
		<div class="stickup-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="header-item-wrapper">		
							
							<div class="header-item header-item-logo">
								<?php get_template_part("templates/header/logo"); ?>							
							</div>
							
							<div class="header-item header-item-nav">
								<?php get_template_part("templates/header/nav"); ?>
							</div>
							
							<div class="header-item header-item-hamburger">
								<a id="btnRespNav" class="btn btn-navbar">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</header>