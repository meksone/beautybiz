<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/*######################
### DEFINE CONSTANTS ###
######################*/
@define( 'THEME_DIR', get_stylesheet_directory() );

@define( 'THEME_URL', get_stylesheet_directory_uri() );

@define( 'CURRENT_DOMAIN', 'pincuter' );
	
@define( 'ASSETS_URL', get_stylesheet_directory_uri() . '/assets' );

@define( 'CURRENT_THEME', getCurrentTheme() );



/*##############################
### Definition current theme ###
##############################*/
	function getCurrentTheme() {
		if ( function_exists('wp_get_theme') ) {
			$theme = wp_get_theme();
			if ( $theme->exists() ) {
				$theme_name = $theme->Name;
			}
		} else {
			$theme_name = get_current_theme();
		}
		$theme_name = preg_replace("/\W/", "_", strtolower($theme_name) );
		return $theme_name;
	}

	
/*##############################
### Definition theme version ###
##############################*/
	function _pincuter_get_theme_version($theme_name) {
		if ( function_exists('wp_get_theme') ) {
			$theme = wp_get_theme($theme_name);
			if ( $theme->exists() ) {
				$theme_ver = $theme->Version;
			}
		} else {
			$theme_data = get_theme_data( get_theme_root() . '/' . $theme_name . '/style.css' );
			$theme_ver  = $theme_data['Version'];
		}
		return $theme_ver;
	}


/*############################
### Definition theme setup ###
############################*/
	if ( !function_exists('_pincuter_theme_setup')) {
		add_action('after_setup_theme', '_pincuter_theme_setup');
		function _pincuter_theme_setup() {
			
			//Loading theme textdomain
			load_theme_textdomain( CURRENT_THEME, get_stylesheet_directory() . '/languages' );
			
		}
	}
	

/*########## --- SEPARATOR --- ##########*/


// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 604;


/*########## --- SEPARATOR --- ##########*/


add_action( 'after_setup_theme', '_pincuter_init_setup' );
if ( !function_exists( '_pincuter_init_setup' ) ) :
	
	function _pincuter_init_setup() {
		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add custom menu support.
		add_theme_support( 'menus' );
		register_nav_menus(
			array(
				'header_menu' => __("Header Menu", CURRENT_DOMAIN),
				'footer_menu' => __("Footer Menu", CURRENT_DOMAIN),
				'top_menu' => __("Top Menu", CURRENT_DOMAIN),
				//'secondary_menu' => __("Secondary Menu", CURRENT_DOMAIN),
				//'page_menu' => __( "Page Menu", CURRENT_DOMAIN ),
			)
		);
	}

endif;


/*########## --- SEPARATOR --- ##########*/


/* Register sidebars */

add_action( 'widgets_init', '_pincuter_widgets_init' ); 
function _pincuter_widgets_init() {

	register_sidebar( array(
		'name'          => __('Main Sidebar', CURRENT_DOMAIN),
		'id'            => 'main-sidebar',
		'description'   => __('Main Sidebar', CURRENT_DOMAIN),
		'before_widget' => '<div id="%1$s" class="widget main-sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	
	/*
	register_sidebar( array(
		'name'          => __('PreFooter 1', CURRENT_DOMAIN),
		'id'            => 'prefooter-sidebar-1',
		'description'   => __('PreFooter 1', CURRENT_DOMAIN),
		'before_widget' => '<div id="%1$s" class="widget area-prefooter-sidebar-1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __('PreFooter 2', CURRENT_DOMAIN),
		'id'            => 'prefooter-sidebar-2',
		'description'   => __('PreFooter 2', CURRENT_DOMAIN),
		'before_widget' => '<div id="%1$s" class="widget area-prefooter-sidebar-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __('PreFooter 3', CURRENT_DOMAIN),
		'id'            => 'prefooter-sidebar-3',
		'description'   => __('PreFooter 3', CURRENT_DOMAIN),
		'before_widget' => '<div id="%1$s" class="widget area-prefooter-sidebar-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __('PreFooter 4', CURRENT_DOMAIN),
		'id'            => 'prefooter-sidebar-4',
		'description'   => __('PreFooter 4', CURRENT_DOMAIN),
		'before_widget' => '<div id="%1$s" class="widget area-prefooter-sidebar-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	*/
	
	register_sidebar( array(
		'name'          => __('Footer 1', CURRENT_DOMAIN),
		'id'            => 'footer-sidebar-1',
		'description'   => __('Footer 1', CURRENT_DOMAIN),
		'before_widget' => '<div id="%1$s" class="widget area-footer-sidebar-1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	
	/*
	register_sidebar( array(
		'name'          => theme_locals("footer_2"),
		'id'            => 'footer-sidebar-2',
		'description'   => theme_locals("footer_desc"),
		'before_widget' => '<div id="%1$s" class="widget area-footer-sidebar-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => theme_locals("footer_3"),
		'id'            => 'footer-sidebar-3',
		'description'   => theme_locals("footer_desc"),
		'before_widget' => '<div id="%1$s" class="widget area-footer-sidebar-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => theme_locals("footer_4"),
		'id'            => 'footer-sidebar-4',
		'description'   => theme_locals("footer_desc"),
		'before_widget' => '<div id="%1$s" class="widget area-footer-sidebar-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	*/

}


/*########## --- SEPARATOR --- ##########*/


// Generates a random string
function gener_random($length){
	srand((double)microtime()*1000000 );
	$random_id = "";
	$char_list = "abcdefghijklmnopqrstuvwxyz";
	for( $i = 0; $i < $length; $i++ ) {
		$random_id .= substr($char_list,(rand()%(strlen($char_list))), 1);
	}
	return $random_id;
}


/*########## --- SEPARATOR --- ##########*/


function is_edit_or_new_cpt( $post_type = null ) {
    global $pagenow;

    /**
     * return false if not on admin page or
     * post type to compare is null
     */
    if ( ! is_admin() || $post_type === null ) {
        return FALSE;
    }

    /**
     * if edit screen of a post type is active
     */
    if ( $pagenow === 'post.php' ) {
        // get post id, in case of view all cpt post id will be -1
        $post_id = isset( $_GET[ 'post' ] ) ? $_GET[ 'post' ] : - 1;

        // if no post id then return false
        if ( $post_id === - 1 ) {
            return FALSE;
        }

        // get post type from post id
        $get_post_type = get_post_type( $post_id );

        // if post type is compared return true else false
        if ( $post_type === $get_post_type ) {
            return TRUE;
        } else {
            return FALSE;
        }
    } elseif ( $pagenow === 'post-new.php' ) { // is new-post screen of a post type is active
        // get post type from $_GET array
        $get_post_type = isset( $_GET[ 'post_type' ] ) ? $_GET[ 'post_type' ] : '';
        // if post type matches return true else false.
        if ( $post_type === $get_post_type ) {
            return TRUE;
        } else {
            return FALSE;
        }
    } else {
        // return false if on any other page.
        return FALSE;
    }
}


/*########## --- SEPARATOR --- ##########*/


/*#############################################################
### customize_mce_buttons_2 - "tiny_mce_before_init" filter ###
#############################################################*/
add_filter('mce_buttons_2', '_pincuter_wp_editor_mce_buttons_2_filter');
function _pincuter_wp_editor_mce_buttons_2_filter( $options ) {
	array_shift( $options );
	
	//array_unshift( $options, 'media' ); // Add media button
	
	array_unshift( $options, 'fontsizeselect');
	
	//array_unshift( $options, 'formatselect'); // Paragrafo, Titolo 1, Titolo 2, Titolo 3, ecc
	
	array_unshift( $options, 'styleselect'); // Formati: Titoli, Blocchi, Allineamento
	
	//array_unshift( $options, 'fontselect'); // Font-Family
	
	return $options;
}
add_filter('mce_buttons', '_pincuter_wp_editor_mce_buttons_1_filter');
function _pincuter_wp_editor_mce_buttons_1_filter( $options ){
	
	
	if ( in_array( 'alignright', $options ) ){
		$key_alignright = array_search( 'alignright', $options );
		$inserted_justify = array( 'alignjustify' );
		array_splice( $options, $key_alignright + 1, 0, $inserted_justify );
	}
	if ( in_array( 'italic', $options ) ){
		$key_italic = array_search( 'italic', $options );
		$inserted_underline = array( 'underline' );
		array_splice( $options, $key_italic + 1, 0, $inserted_underline );
	}
	
	
	/*
	$inserted = array( 'underline' );
	// We add the button at the begining of the second line
	array_splice( $options, 0, 0, $inserted );
	
	
	$inserted = array( 'alignjustify' );
	array_splice( $options, 0, 0, $inserted );
	*/
	
	return $options;
}
/***/
add_filter('tiny_mce_before_init', '_pincuter_customize_tiny_mce_font_size_format');
function _pincuter_customize_tiny_mce_font_size_format($initArray){
	
	$initArray['fontsize_formats'] = "5px 6px 7px 8px 9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 31px 32px 33px 34px 35px 36px 37px 38px 29px 40px 41px 42px 43px 44px 45px 46px 47px 48px 49px 50px 51px 52px 53px 54px 55px 56px 57px 58px 59px 60px 64px 68px 72px 80px 88px 90px";
	return $initArray;
}
/*
// Top row
function cw_mce_buttons_1( $buttons ) {
    $buttons = array( 'bold','italic','forecolor','alignleft','alignright','aligncenter','alignjustify','indent','outdent','bullist','numlist','subscript','superscript','link','unlink','wp_adv' );
    return $buttons;
}
add_filter( 'mce_buttons', 'cw_mce_buttons_1' );

// Bottom row
function cw_mce_buttons_2( $buttons ) {
    $buttons = array('fontselect','styleselect','fontsizeselect','charmap','blockquote','hr','pastetext','removeformat','spellchecker','fullscreen','undo','redo','wp_help');
    return $buttons;
}
add_filter( 'mce_buttons_2', 'cw_mce_buttons_2' );
*/

/*# END customize_mce_buttons_2 - "tiny_mce_before_init" filter ###
### ----------------------------------------------------------- #*/


/*########## --- SEPARATOR --- ##########*/

/*
include_once( get_stylesheet_directory() . '/includes/include.php');
*/


/* Loading Theme function */
include_once( get_stylesheet_directory() . '/includes/helpers/_pf_helpers.php');

/* Loading Theme Classes */
include_once( get_stylesheet_directory() . '/includes/classes/_pf_classes.php');

/* Loading Theme hooks */
include_once( get_stylesheet_directory() . '/includes/hooks/_pf_hooks.php');

/* Loading Theme security */
include_once( get_stylesheet_directory() . '/includes/security/_pf_security.php');

/* Loading Libraries */
include_once( get_stylesheet_directory() . '/libraries/_libraries.php');

/* Loading Modules */
include_once( get_stylesheet_directory() . '/modules/_modules.php');

	
/* 
 * Loading Theme Scripts/Style
 * SPOSTATO TO MODULES
 *
 * include_once( get_stylesheet_directory() . '/includes/scripts/_pf_scripts.php');
 */