<?php   
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/**
 * wp_enqueue_style( string $handle, string $src = '', string[] $deps = array(), string|bool|null $ver = false, string $media = 'all' );
 * 
 * add_filter( 'style_loader_tag', function ( $tag, $handle ) {
 * 		return str_replace( " id='$handle-css'", '', $tag );
 * }, 10, 2 );
 */


/*###############################################################
### Register and load stylesheet - _pincuter_base_stylesheets ###
###############################################################*/

add_action('wp_enqueue_scripts', '_pincuter_base_stylesheets', 1);
function _pincuter_base_stylesheets() {
	
	/*
	$time = time();

	wp_enqueue_style('pincuter-initial-style', get_stylesheet_directory_uri() . '/assets/css/base/initial.css?v='.$time, false, null, 'all' );
	wp_enqueue_style('pincuter-container-style', get_stylesheet_directory_uri() . '/assets/css/base/container.css?v='.$time, false, null, 'all' );
	wp_enqueue_style('pincuter-mod-bootstrap-style', get_stylesheet_directory_uri() . '/assets/css/base/mod.bootstrap.css?v='.$time, false, null, 'all' );
	wp_enqueue_style('pincuter-utilities-style', get_stylesheet_directory_uri() . '/assets/css/base/utilities.css?v='.$time, false, null, 'all' );
	wp_enqueue_style('pincuter-spacer-style', get_stylesheet_directory_uri() . '/assets/css/base/spacer.css?v='.$time, false, null, 'all' );
	wp_enqueue_style('pincuter-vertical-style', get_stylesheet_directory_uri() . '/assets/css/base/vertical.css?v='.$time, false, null, 'all' );
	wp_enqueue_style('pincuter-horizontal-style', get_stylesheet_directory_uri() . '/assets/css/base/horizontal.css?v='.$time, false, null, 'all' );
		
	wp_enqueue_style('pincuter-fontawesome-style', get_stylesheet_directory_uri() . '/assets/css/lib/fontawesome.css?v='.$time, false, null, 'all' );
	wp_enqueue_style('pincuter-fancybox-style', get_stylesheet_directory_uri() . '/assets/css/lib/fancybox.css?v='.$time, false, null, 'all' );
	wp_enqueue_style('pincuter-glyphicons-style', get_stylesheet_directory_uri() . '/assets/css/lib/glyphicons.css?v='.$time, false, null, 'all' );
	//wp_enqueue_style('pincuter-slick-style', get_stylesheet_directory_uri() . '/assets/css/lib/slick.css?v='.$time, false, null, 'all' );
	wp_enqueue_style('pincuter-slick-style', get_stylesheet_directory_uri() . '/assets/css/lib/slick_v.1.8.0.css?v='.$time, false, null, 'all' );
		
	wp_enqueue_style('pincuter-main-style', get_stylesheet_directory_uri() . '/assets/css/main.css?v='.$time, false, null, 'all' ); 
	*/

	/*
	wp_enqueue_style('pincuter-initial-style', get_stylesheet_directory_uri() . '/assets/css/base/initial.css', false, null, 'all' );
	wp_enqueue_style('pincuter-container-style', get_stylesheet_directory_uri() . '/assets/css/base/container.css', false, null, 'all' );

	wp_enqueue_style('pincuter-mod-bootstrap-style', get_stylesheet_directory_uri() . '/assets/css/base/mod.bootstrap.css', false, null, 'all' );
	wp_enqueue_style('pincuter-grid-bootstrap-style', get_stylesheet_directory_uri() . '/assets/css/base/grid.bootstrap.css', false, null, 'all' );
	wp_enqueue_style('pincuter-bootstrap-utilities-style', get_stylesheet_directory_uri() . '/assets/css/additional/mod.bootstrap-utilities.css', false, null, 'all' );

	//wp_enqueue_style('pincuter-utilities-style', get_stylesheet_directory_uri() . '/assets/css/base/utilities.css', false, null, 'all' );
	wp_enqueue_style('pincuter-spacer-style', get_stylesheet_directory_uri() . '/assets/css/base/spacer.css', false, null, 'all' );
	wp_enqueue_style('pincuter-vertical-style', get_stylesheet_directory_uri() . '/assets/css/base/vertical.css', false, null, 'all' );
	wp_enqueue_style('pincuter-horizontal-style', get_stylesheet_directory_uri() . '/assets/css/base/horizontal.css', false, null, 'all' );
		
	wp_enqueue_style('pincuter-fontawesome-style', get_stylesheet_directory_uri() . '/assets/css/lib/fontawesome.css', false, null, 'all' );
	wp_enqueue_style('pincuter-fancybox-style', get_stylesheet_directory_uri() . '/assets/css/lib/fancybox.css', false, null, 'all' );
	wp_enqueue_style('pincuter-glyphicons-style', get_stylesheet_directory_uri() . '/assets/css/lib/glyphicons.css', false, null, 'all' );
	//wp_enqueue_style('pincuter-slick-style', get_stylesheet_directory_uri() . '/assets/css/lib/slick.css', false, null, 'all' );
	wp_enqueue_style('pincuter-slick-style', get_stylesheet_directory_uri() . '/assets/css/lib/slick_v.1.8.0.css', false, null, 'all' );
		
	wp_enqueue_style('pincuter-main-style', get_stylesheet_directory_uri() . '/assets/css/main.css', false, null, 'all' ); 
	*/


	wp_enqueue_style('pincuter-options-style', get_stylesheet_directory_uri() . '/assets/css/min/options.min.css', false, null, 'all' );
	//wp_enqueue_style('pincuter-main-style', get_stylesheet_directory_uri() . '/assets/css/min/main.min.css', false, null, 'all' );
	wp_enqueue_style('pincuter-main-style', get_stylesheet_directory_uri() . '/assets/css/main.min.css', false, null, 'all' ); 
	//wp_enqueue_style('pincuter-approfondimenti-style', get_stylesheet_directory_uri() . '/assets/css/approfondimenti.css', false, null, 'all' );
		
		
	/*
	wp_enqueue_style('pincuter-tablepress-style', THEME_URL . '/assets/css/tablepress.css', false, null, 'all' );
		
	wp_enqueue_style('chart-style', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css', false, null, 'all' );
		
	wp_enqueue_style('google-fonts-martelsans', '//fonts.googleapis.com/css2?family=Martel+Sans:wght@200;300;400;600;700;800;900&display=swap', false, null, 'all' );
	*/
		
	/*
	wp_enqueue_style('google-preconnect', 'https://fonts.gstatic.com', false, null, false );
	wp_enqueue_style('google-eb-garamond', '//fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap', false, null, 'all' );
	wp_enqueue_style('google-libre-franklin', '//fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', false, null, 'all' );
	*/
			
}


//add_filter('style_loader_tag', '_pincuter_stylesheets_loader_tag_filter', 10, 2);
function _pincuter_stylesheets_loader_tag_filter($html, $handle) {
    /*
	if ($handle === 'my-style-handle') {
        return str_replace("rel='stylesheet'",
            "rel='preload' as='font' type='font/woff2' crossorigin='anonymous'", $html);
    }
	*/
	
	/*
	$styles = array(
		'google-fonts-opensans',
		'google-fonts-poppins'
    );
	foreach ( $styles as $style ) {
        if ( $style === $handle ) {
            return str_replace( "media='all'", "media='all' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'", $html );
        }
    }
	*/
	
	if ($handle === 'google-preconnect') {
        return str_replace("rel='stylesheet'", "rel='preconnect'", $html);
    }
	
    return $html;
}

/*### END. _pincuter_base_stylesheets ###
#######################################*/


add_action('admin_enqueue_scripts', '_pincuter_admin_styles', 10, 1);
function _pincuter_admin_styles() {
	global $wp_scripts, $post, $pincuter_theme_opt;
	
	wp_enqueue_style( 'pincuter-admin-theme-style', get_stylesheet_directory_uri().'/assets/admin/admin-style.css', false, '1.0.0' ); 
	
	wp_enqueue_style( 'wp-color-picker' );
	
}
