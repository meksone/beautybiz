<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/*------------------------------------------------------
//  REMOVE VERSION
------------------------------------------------------*/

/* REMOVE GENERATOR */
function no_generator() { return ''; }
add_filter( 'the_generator', 'no_generator' );


add_action( 'wp_head', '_pincuter_head_generator_meta_tag' );
function _pincuter_head_generator_meta_tag() { 
   echo '<meta name="generator" content="Pincuter" />' . "\n";
}



/* REMOVE SEGNALAZIONE ERRORI */
//add_filter('login_errors',create_function('$a', "return null;"));
add_filter('login_errors','_pincuter_login_errors');
function _pincuter_login_errors(){
	return null;
}


/*
add_action('admin_menu', '_pincuter_remove_customize');
function _pincuter_remove_customize() {
	global $submenu, $current_user;
	$username = $current_user->user_login;
	if($username != 'salvatori.f'){
		// Appearance Menu
		unset($submenu['themes.php'][6]); // Customize
		
		if ( !defined('DISALLOW_FILE_EDIT') ){	
			define( 'DISALLOW_FILE_EDIT', true );
		}
	}
}
*/
/*
if ( !defined('DISALLOW_FILE_EDIT') ){	
	define( 'DISALLOW_FILE_EDIT', true );
}

add_action('admin_menu', '_pincuter_remove_customize');
function _pincuter_remove_customize() {
	global $submenu;
	// Appearance Menu
    unset($submenu['themes.php'][6]); // Customize
}
*/
/*
add_action('admin_menu', '_pincuter_remove_customize');
function _pincuter_remove_customize() {
	global $submenu, $current_user;
	$username = $current_user->user_login;
	if($username != 'salvatori.f'){
		// Appearance Menu
		unset($submenu['themes.php'][5]); // Themes - Temi
		unset($submenu['themes.php'][6]); // Customize - Personalizza
		
		remove_menu_page('plugins.php');
		unset($submenu['plugins.php'][5]); // Plugin Manager
		unset($submenu['plugins.php'][10]); // Add New Plugins
		unset($submenu['plugins.php'][15]);
		
		remove_menu_page('tools.php');
		remove_menu_page('options-general.php');
		
		if ( !defined('DISALLOW_FILE_EDIT') ){	
			define( 'DISALLOW_FILE_EDIT', true );
		}
	}
}
*/

add_action('admin_menu', '_pincuter_remove_customize');
function _pincuter_remove_customize() {
	global $submenu, $current_user;
	$username = $current_user->user_login;
	if($username != 'meksone'){
		// Appearance Menu
		unset($submenu['themes.php'][5]); // Themes - Temi
		unset($submenu['themes.php'][6]); // Customize - Personalizza
		
		remove_menu_page('plugins.php');
		unset($submenu['plugins.php'][5]); // Plugin Manager
		unset($submenu['plugins.php'][10]); // Add New Plugins
		unset($submenu['plugins.php'][15]);
		
		remove_menu_page('tools.php');
		remove_menu_page('options-general.php');
		
		if ( !defined('DISALLOW_FILE_EDIT') ){	
			define( 'DISALLOW_FILE_EDIT', true );
		}
		remove_submenu_page('themes.php', 'customize.php'); //Customize
		
	}
}
add_action( 'customize_register', '_pincuter_customize_register' );
function _pincuter_customize_register( $wp_customize ){
   global $current_user;
	$username = $current_user->user_login;
	if($username != 'meksone'){
		//$wp_customize->remove_section('custom_css');
		
		$wp_customize->remove_section( 'title_tagline');
		$wp_customize->remove_section( 'colors');
		$wp_customize->remove_section( 'header_image');
		$wp_customize->remove_section( 'background_image');
		$wp_customize->remove_section( 'menus');
		$wp_customize->remove_section( 'nav_menus');
		$wp_customize->remove_section( 'static_front_page');
		$wp_customize->remove_section( 'custom_css');
		
		//$wp_customize->remove_panel('nav_menus');
		//$wp_customize->remove_panel('widgets');
		
		if (isset($wp_customize->nav_menus) && is_object($wp_customize->nav_menus)) {
			//Remove all the filters/actions resiterd in WP_Customize_Nav_Menus __construct
			remove_filter( 'customize_refresh_nonces', array( $wp_customize->nav_menus, 'filter_nonces' ) );
			remove_action( 'wp_ajax_load-available-menu-items-customizer', array( $wp_customize->nav_menus, 'ajax_load_available_items' ) );
			remove_action( 'wp_ajax_search-available-menu-items-customizer', array( $wp_customize->nav_menus, 'ajax_search_available_items' ) );
			remove_action( 'customize_controls_enqueue_scripts', array( $wp_customize->nav_menus, 'enqueue_scripts' ) );
			remove_action( 'customize_register', array( $wp_customize->nav_menus, 'customize_register' ), 11 );
			remove_filter( 'customize_dynamic_setting_args', array( $wp_customize->nav_menus, 'filter_dynamic_setting_args' ), 10, 2 );
			remove_filter( 'customize_dynamic_setting_class', array( $wp_customize->nav_menus, 'filter_dynamic_setting_class' ), 10, 3 );
			remove_action( 'customize_controls_print_footer_scripts', array( $wp_customize->nav_menus, 'print_templates' ) );
			remove_action( 'customize_controls_print_footer_scripts', array( $wp_customize->nav_menus, 'available_items_template' ) );
			remove_action( 'customize_preview_init', array( $wp_customize->nav_menus, 'customize_preview_init' ) );
			remove_filter( 'customize_dynamic_partial_args', array( $wp_customize->nav_menus, 'customize_dynamic_partial_args' ), 10, 2 );
		}
	}
}


/* REMOVE VERSION */
add_filter( 'script_loader_src', 'sfcct_remove_src_version' );
add_filter( 'style_loader_src', 'sfcct_remove_src_version' );
 
function sfcct_remove_src_version ( $src ) {
	global $wp_version;
 
	$version_str = '?ver='.$wp_version;
	$version_str_offset = strlen( $src ) - strlen( $version_str );
 
	if( substr( $src, $version_str_offset ) == $version_str )
		return substr( $src, 0, $version_str_offset );
	else
		return $src;
}


/* Remove _script_version */
add_filter( 'script_loader_src', 'sfcct_remove_script_version' );
add_filter( 'style_loader_src', 'sfcct_remove_script_version' );

function sfcct_remove_script_version( $src ){

	global $wp_version;

    $parts = explode( '?ver=', $src );
        return $parts[0];
}


/* Remove query string from static files */
add_filter( 'style_loader_src', 'sfcct_remove_cssjs_version_a', 10, 2 );
add_filter( 'script_loader_src', 'sfcct_remove_cssjs_version_a', 10, 2 );

function sfcct_remove_cssjs_version_a( $src ) {
	if( strpos( $src, '?ver=' ) )
	$src = remove_query_arg( 'ver', $src );
	return $src;
}


/* Remove query string from static files */
add_filter( 'style_loader_src', 'sfcct_remove_cssjs_version_b', 10, 2 );
add_filter( 'script_loader_src', 'sfcct_remove_cssjs_version_b', 10, 2 );

function sfcct_remove_cssjs_version_b( $src ) {
 if( strpos( $src, 'ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}


/*########## --- SEPARATOR --- ##########*/

