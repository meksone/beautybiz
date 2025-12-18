<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/*####################################
### _pincuter_scripts_jquery_base ###
####################################*/

add_action('wp_enqueue_scripts', '_pincuter_scripts_jquery_base');
function _pincuter_scripts_jquery_base() {
	global $wp_scripts, $post;
			
	if (!is_admin()) {
			
		wp_deregister_script('jquery');
		wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js", array(), false, false);		
		wp_enqueue_script('jquery');
			
		/*
		wp_register_script('migrate', PARENT_URL.'/assets/js/jquery-migrate-1.2.1.min.js', array('jquery'), '1.2.1');
		wp_enqueue_script('migrate');

		wp_enqueue_script('jquery-cookie-script', '//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js', array('jquery'), '1.4.1', true);
		*/
			
			
	}
}

/*### END. _pincuter_scripts_jquery_base ###
##########################################*/


/**
 * https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 * 
 * $url  = get_template_directory_uri() . '/js/functions.js';
 * $time = filemtime( get_template_directory() . '/js/functions.js' );
 * $args = array( 
 * 		'in_footer' => true,
 * 		'strategy'  => 'defer', or 'async'
 * );
 * wp_enqueue_script( 'wpdocs-functions', $url, array(), $time, $args );
 * 
 * 
 * https://www.growingwiththeweb.com/2014/02/async-vs-defer-attributes.html
 * https://stackoverflow.com/questions/10808109/script-tag-async-defer
 */


/*######################################################
### Register and load javascript - _pincuter_scripts ###
######################################################*/

add_action('wp_enqueue_scripts', '_pincuter_scripts');
function _pincuter_scripts() {
	global $wp_scripts, $post;
			
	if (!is_admin()) {
		
		/*
		wp_enqueue_script('pincuter-libraries-script', get_stylesheet_directory_uri().'/assets/js/base/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
			
		wp_enqueue_script('pincuter-device-script', get_stylesheet_directory_uri().'/assets/js/base/device.js', array('jquery'), '1.0', true);
		wp_enqueue_script('pincuter-easing-script', get_stylesheet_directory_uri().'/assets/js/base/easing.js', array('jquery'), '1.0', true);
		wp_enqueue_script('pincuter-sidr-script', get_stylesheet_directory_uri().'/assets/js/base/sidr.js', array('jquery'), '1.0', true);
			
		//wp_enqueue_script('pincuter-slick-script', get_stylesheet_directory_uri().'/assets/js/lib/slick.js', array('jquery'), '1.0', true);
		wp_enqueue_script('pincuter-slick-script', get_stylesheet_directory_uri().'/assets/js/lib/slick_v.1.8.0.js', array('jquery'), '1.0', true);

		wp_enqueue_script('pincuter-fancybox-script', get_stylesheet_directory_uri().'/assets/js/lib/fancybox.js', array('jquery'), '1.0', true);
			
		wp_enqueue_script('pincuter-main-script', get_stylesheet_directory_uri().'/assets/js/main.js', array('jquery'), '1.0', true);
		*/

		wp_enqueue_script('pincuter-options-script', get_stylesheet_directory_uri().'/assets/js/min/options.min.js', array('jquery'), '1.0', true);

		wp_enqueue_script('pincuter-main-script', get_stylesheet_directory_uri().'/assets/js/main.js', array('jquery'), '1.0', true);

		wp_enqueue_script('pincuter-dummy-handle', get_stylesheet_directory_uri().'/assets/js/dummy-handle.js', array('jquery'), false, true);
			
		/*
		wp_enqueue_script('chart-script', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js', array('jquery'), '2.9.4', true);
		wp_enqueue_script('chart-bundle-script', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js', array('jquery'), '2.9.4', true);
		*/
			
	}
}

/*### END. _pincuter_scripts ###
##############################*/
