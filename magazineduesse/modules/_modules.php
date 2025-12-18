<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/* Loading Classes Modules */
include_once( get_stylesheet_directory() . '/modules/classes/_pf_classes.php');

/* Loading Helpers Modules */
include_once( get_stylesheet_directory() . '/modules/helpers/_pf_helpers.php');

/* Loading Theme Scripts/Style */
include_once( get_stylesheet_directory() . '/modules/scripts/_pf_scripts.php');

/* Loading Rebuild Generate Css */
require_once(get_stylesheet_directory() . '/modules/theme_options/rebuild_generate_css.php' );

/* Loading Theme Options */
require_once(get_stylesheet_directory() . '/modules/theme_options/_theme_options.php' );


require_once(get_stylesheet_directory() . '/modules/page/_page.php' );

require_once(get_stylesheet_directory() . '/modules/post/_post.php' );


/*
require_once(get_stylesheet_directory() . '/modules/theme-options/investor_relation_table_grafico_azioni.php' );


require_once(get_stylesheet_directory() . '/modules/comunicati/_comunicati_stampa.php' );
require_once(get_stylesheet_directory() . '/modules/media-kit/_media-kit.php' );
require_once(get_stylesheet_directory() . '/modules/impianti/_impianti.php' );
require_once(get_stylesheet_directory() . '/modules/tsunhunter/_tsunhunter.php' );
require_once(get_stylesheet_directory() . '/modules/dicono-di-noi/_dicono_di_noi.php' );

require_once(get_stylesheet_directory() . '/modules/assemblea-azionisti/_assemblea_azionisti.php');

require_once(get_stylesheet_directory() . '/modules/comunicati-finanziari/_comunicati_finanziari.php' );
require_once(get_stylesheet_directory() . '/modules/bilancio-relazioni/_bilancio_relazioni.php' );
require_once(get_stylesheet_directory() . '/modules/informazioni-azionisti/_informazioni_azionisti.php' );

require_once(get_stylesheet_directory() . '/modules/page/_page.php' );
require_once(get_stylesheet_directory() . '/modules/post/_post.php' );
*/