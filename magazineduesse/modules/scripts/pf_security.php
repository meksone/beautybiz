<?php   
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action('after_setup_theme', '_pincuter_clean_wordpress_setup');
if ( !function_exists( '_pincuter_clean_wordpress_setup' ) ) {
	function _pincuter_clean_wordpress_setup () {
		
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wp_generator');

		remove_action('wp_head', 'feed_links', 2);
		remove_action('wp_head', 'feed_links_extra', 3);

		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'wlwmanifest_link');

		remove_action('wp_head', 'start_post_rel_link', 10, 0);
		remove_action('wp_head', 'parent_post_rel_link', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

		remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

		add_filter('the_generator', '__return_false');           
		/*add_filter('show_admin_bar','__return_false');    */       

		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );  
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
	}
}

add_action( 'wp_footer', '_pincuter_deregister_scripts_wp_embed' );
if ( !function_exists( '_pincuter_deregister_scripts_wp_embed' ) ) {
	function _pincuter_deregister_scripts_wp_embed(){
		wp_deregister_script( 'wp-embed' );
	}
}


/*########## --- SEPARATOR --- ##########*/


/*#####################
### REMOVE WP EMOJI ###
#####################*/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

add_action('init','crunchify_clean_header_hook');
function crunchify_clean_header_hook(){
	wp_deregister_script( 'comment-reply' );
}

add_action('wp_enqueue_scripts', 'theme_queue_js');
function theme_queue_js(){
	if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/*### END. remove WP EMOJI ###
############################*/




add_action('admin_menu', '_pincuter_remove_customize_sfsecurity', 9999);
function _pincuter_remove_customize_sfsecurity() {
	global $submenu, $current_user;
	$username = $current_user->user_login;
	if($username != 'fabiosalvatori' && $username != 'plorusso@e-duesse.it'){

		remove_menu_page('users.php');

		// Appearance Menu
		unset($submenu['themes.php'][5]); // Themes - Temi
		unset($submenu['themes.php'][6]); // Customize - Personalizza
		unset($submenu['themes.php'][10]);
		
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

		//https://progettocucinabiz.it/wp-admin/admin.php?page=_pincuter_theme_options
		remove_menu_page('admin.php?page=_pincuter_theme_options');
		remove_menu_page('_pincuter_theme_options');


		//https://progettocucinabiz.it/wp-admin/admin.php?page=_pincuter_rebuild_css
		remove_menu_page('admin.php?page=_pincuter_rebuild_css');
		remove_menu_page('_pincuter_rebuild_css');

		remove_menu_page( 'wpcf7' );

		

		//https://progettocucinabiz.it/wp-admin/admin.php?page=wpseo_dashboard
		remove_menu_page('admin.php?page=wpseo_dashboard');
		remove_menu_page('wpseo_dashboard');



		//https://progettocucinabiz.it/wp-admin/admin.php?page=pmxi-admin-import
		remove_menu_page('admin.php?page=pmxi-admin-import');
		remove_menu_page('pmxi-admin-import');

		remove_menu_page('pmxi-admin-home');
		//Hide "All Import → New Import".
		remove_submenu_page('pmxi-admin-home', 'pmxi-admin-import');
		//Hide "All Import → Manage Imports".
		remove_submenu_page('pmxi-admin-home', 'pmxi-admin-manage');
		//Hide "All Import → Settings".
		remove_submenu_page('pmxi-admin-home', 'pmxi-admin-settings');
		//Hide "All Import → Support".
		remove_submenu_page('pmxi-admin-home', 'pmxi-admin-help');
		//Hide "All Import → History".
		remove_submenu_page('pmxi-admin-home', 'pmxi-admin-history');

		
		//https://progettocucinabiz.it/wp-admin/admin.php?page=cmp-settings
		remove_menu_page('admin.php?page=cmp-settings');
		remove_menu_page('cmp-settings');

	}
}
add_action( 'customize_register', '_pincuter_customize_register_sfsecurity', 9999 );
function _pincuter_customize_register_sfsecurity( $wp_customize ){
   	global $current_user;
	$username = $current_user->user_login;
	if($username != 'fabiosalvatori'){
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