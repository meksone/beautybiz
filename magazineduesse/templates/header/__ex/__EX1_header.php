<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


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
								
								<div class="header-item-nav__inwrap">
									<div class="top-header-language">
										<?php get_template_part("templates/header/languages"); ?>
									</div>
									
									<?php get_template_part("templates/header/nav"); ?>
								</div>
								
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

