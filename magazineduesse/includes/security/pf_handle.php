<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


//add_action( 'wp_print_scripts', '_pincuter_inspect_scripts_and_styles' );
function _pincuter_inspect_scripts_and_styles() {
    global $wp_scripts, $wp_styles;
	
	$scripts_list = '';
	$styles_list = '';
	
    // Runs through the queue scripts
    foreach( $wp_scripts->queue as $handle ) :
        $scripts_list .= $handle.' - '.$wp_scripts->registered[$handle]->src . ' <br> ';
    endforeach;

    // Runs through the queue styles
    foreach( $wp_styles->queue as $handle ) :
        $styles_list .= $handle.' - '.$wp_styles->registered[$handle]->src . ' <br> ';
    endforeach;
	
	
	echo '<br><br>';
	echo '<div class="wp-scripts"><h3>Scripts:</h3> '.$scripts_list.'</div>';
	echo '<br><br>';
	echo '<div class="wp-styles"><h3>Styles:</h3> '.$styles_list.'</div>';
	echo '<br><br>';
}