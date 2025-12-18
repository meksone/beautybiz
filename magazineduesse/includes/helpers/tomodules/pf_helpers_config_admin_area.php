<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action('admin_head', '_comal_pincuter_theme_admin_icon_name_dashboard');
function _comal_pincuter_theme_admin_icon_name_dashboard() {
	
	/* CPT comunicatistampa, impianti, mediakit, tsunhunter, diconodinoi --- COLORE AZZURRO */
	echo "
		<style type='text/css' media='screen'>
			#adminmenu .wp-not-current-submenu.menu-icon-comunicatistampa div.wp-menu-image:before,
			#adminmenu .wp-not-current-submenu.menu-icon-comunicatistampa div.wp-menu-name {
				color: #0088cc !important;
			}
			#adminmenu .wp-not-current-submenu.menu-icon-impianti div.wp-menu-image:before,
			#adminmenu .wp-not-current-submenu.menu-icon-impianti div.wp-menu-name {
				color: #0088cc !important;
			}
			#adminmenu .wp-not-current-submenu.menu-icon-mediakit div.wp-menu-image:before,
			#adminmenu .wp-not-current-submenu.menu-icon-mediakit div.wp-menu-name {
				color: #0088cc !important;
			}
			#adminmenu .wp-not-current-submenu.menu-icon-tsunhunter div.wp-menu-image:before,
			#adminmenu .wp-not-current-submenu.menu-icon-tsunhunter div.wp-menu-name {
				color: #0088cc !important;
			}
			#adminmenu .wp-not-current-submenu.menu-icon-diconodinoi div.wp-menu-image:before,
			#adminmenu .wp-not-current-submenu.menu-icon-diconodinoi div.wp-menu-name {
				color: #0088cc !important;
			}
     	</style>
	";
	
	
	/* CPT assembleazionisti (GOVERNANCE) --- COLORE ARANCIONE */
	echo "
		<style type='text/css' media='screen'>
			#adminmenu #toplevel_page__comal_governance_page_options div.wp-menu-image:before,
			#adminmenu #toplevel_page__comal_governance_page_options div.wp-menu-name {
				color: #d3ad0f !important;
			}
			#adminmenu .wp-not-current-submenu.menu-icon-assembleazionisti div.wp-menu-image:before,
			#adminmenu .wp-not-current-submenu.menu-icon-assembleazionisti div.wp-menu-name {
				color: #d3ad0f !important;
			}
     	</style>
	";
	
	
	/* CPT bilanciorelazioni, comunicatifinanza, infoazionisti (INVESTOR RELATIONS) --- COLORE ROSSO */
	echo "
		<style type='text/css' media='screen'>
			#adminmenu .wp-not-current-submenu.menu-icon-bilanciorelazioni div.wp-menu-image:before,
			#adminmenu .wp-not-current-submenu.menu-icon-bilanciorelazioni div.wp-menu-name {
				color: #ff0000 !important;
			}
			#adminmenu .wp-not-current-submenu.menu-icon-comunicatifinanza div.wp-menu-image:before,
			#adminmenu .wp-not-current-submenu.menu-icon-comunicatifinanza div.wp-menu-name {
				color: #ff0000 !important;
			}
			#adminmenu .wp-not-current-submenu.menu-icon-infoazionisti div.wp-menu-image:before,
			#adminmenu .wp-not-current-submenu.menu-icon-infoazionisti div.wp-menu-name {
				color: #ff0000 !important;
			}
     	</style>
	";
	
}




add_action('admin_head', '_comal_pincuter_theme_admin_page_color');
function _comal_pincuter_theme_admin_page_color() {
	
	/* PAGE Investor Relations & child --- COLORE ROSSO */
	echo "
		<style type='text/css' media='screen'>
			.wp-list-table tr#post-121 td.title a.row-title {
				color: #ff0000 !important;
			}
			.wp-list-table tr#post-133 td.title a.row-title {
				color: #ff0000 !important;
			}
			.wp-list-table tr#post-162 td.title a.row-title {
				color: #ff0000 !important;
			}
			.wp-list-table tr#post-164 td.title a.row-title {
				color: #ff0000 !important;
			}
		</style>
	";
	
	/* PAGE Governance & child --- COLORE ARANCIONE */
	echo "
		<style type='text/css' media='screen'>
			.wp-list-table tr#post-105 td.title a.row-title {
				color: #d3ad0f !important;
			}
			.wp-list-table tr#post-108 td.title a.row-title {
				color: #d3ad0f !important;
			}
			.wp-list-table tr#post-111 td.title a.row-title {
				color: #d3ad0f !important;
			}
			.wp-list-table tr#post-158 td.title a.row-title {
				color: #d3ad0f !important;
			}
			.wp-list-table tr#post-333 td.title a.row-title {
				color: #d3ad0f !important;
			}
		</style>
	";
	
}