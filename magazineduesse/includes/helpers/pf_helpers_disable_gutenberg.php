<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


// Fully Disable Gutenberg editor.
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Don't load Gutenberg-related stylesheets.
add_action( 'wp_enqueue_scripts', '_pincuter_remove_gutenberg_block_css', 100 );
function _pincuter_remove_gutenberg_block_css() {
	wp_dequeue_style( 'wp-block-library' ); // WordPress core
	wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
	wp_dequeue_style( 'wc-block-style' ); // WooCommerce
	wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
}

add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );