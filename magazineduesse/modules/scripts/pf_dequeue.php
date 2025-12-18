<?php   
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/*####################################################
### Remove-Enqueue Scripts Contact Form 7 ###
####################################################*/
/*
if(!function_exists('_pincuter_scripts_contact_form')) :
	add_filter( 'wpcf7_load_js', '__return_false' );
	function _pincuter_scripts_contact_form() {
		global $post;
		if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'contact-form-7') ) {
			wpcf7_enqueue_scripts();
		}
	}
	add_action( 'wp_enqueue_scripts', '_pincuter_scripts_contact_form');
endif;
*/
/*### END. remove cf7 ###
#######################*/


/*####################################################
### Remove-Enqueue Styles Contact Form 7 ###
####################################################*/
/*
if(!function_exists('_pincuter_styles_contact_form')) :
	add_filter( 'wpcf7_load_css', '__return_false' );
	function _pincuter_styles_contact_form() {
		global $post;
		if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'contact-form-7') ) {
			wpcf7_enqueue_styles();
		}
	}
	add_action( 'wp_enqueue_scripts', '_pincuter_styles_contact_form');
endif;
*/
/*### END. remove cf7 ###
#######################*/


/*#################
### WOOCOMMERCE ###
#################*/
/*
if(!function_exists('_pincuter_dequeue_woocommerce_scripts')) :
	add_action( 'wp_enqueue_scripts', '_pincuter_dequeue_woocommerce_scripts', 99 );
	function _pincuter_dequeue_woocommerce_scripts() {
		if ( function_exists( 'is_woocommerce' ) ) {
			if ( ! is_woocommerce() && !_pincuter_is_woocommerce_page() && !_pincuter_is_woocommerce_shortcode() ) {
				# Scripts
				wp_dequeue_script( 'vc_woocommerce-add-to-cart-js' );
				wp_dequeue_script( 'wc_price_slider' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-add-to-cart' );
				wp_dequeue_script( 'wc-cart-fragments' );
				wp_dequeue_script( 'wc-checkout' );
				wp_dequeue_script( 'wc-add-to-cart-variation' );
				wp_dequeue_script( 'wc-single-product' );
				wp_dequeue_script( 'wc-cart' );
				wp_dequeue_script( 'wc-chosen' );
				wp_dequeue_script( 'woocommerce' );
				wp_dequeue_script( 'prettyPhoto' );
				wp_dequeue_script( 'prettyPhoto-init' );
				wp_dequeue_script( 'jquery-blockui' );
				wp_dequeue_script( 'jquery-placeholder' );
				wp_dequeue_script( 'fancybox' );
				wp_dequeue_script( 'jqueryui' );
			}
		}
	}
endif;
*/

/*
add_action( 'wp_enqueue_scripts', '_pincuter_dequeue_woocommerce_styles', 99 );
function _pincuter_dequeue_woocommerce_styles() {
	if ( function_exists( 'is_woocommerce' ) ) {
		if ( ! is_woocommerce() && !_pincuter_is_woocommerce_page() && !_pincuter_is_woocommerce_shortcode() ) {
			# Styles
			wp_dequeue_style( 'woocommerce-general' );
			wp_dequeue_style( 'woocommerce-layout' );
			wp_dequeue_style( 'woocommerce-smallscreen' );
			wp_dequeue_style( 'woocommerce_frontend_styles' );
			wp_dequeue_style( 'woocommerce_fancybox_styles' );
			wp_dequeue_style( 'woocommerce_chosen_styles' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
		}
	}
}
*/

/*### END. WOOCOMMERCE ###
########################*/