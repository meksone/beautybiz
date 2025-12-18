<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/*
https://weglot.com/blog/hreflang-language-codes-2022-list-and-how-to-use-them/
*/


/*add_action('wp_head', '_pincuter_head_hreflang');*/
function _pincuter_head_hreflang() {   
    $url = get_permalink();      
    echo '<link rel="alternate" hreflang="it" href="'.$url.'"  />'.PHP_EOL;
	echo '<link rel="alternate" hreflang="x-default" href="'.$url.'" />'.PHP_EOL;
}


/*add_filter( 'wpseo_robots', '_pincuter_yoast_seo_robots' );*/
function _pincuter_yoast_seo_robots( $robots ) {

	if ( is_product() && has_term( 'cabina', 'product_professional_division' ) ) { 
		return 'noindex,nofollow'; 
	}
	else if( is_page_template('templates/page-landing-b2b.php') ){
		return 'noindex,nofollow';
	}
	else {
		return $robots; 
	}
}



/*
add_filter( 'wpseo_opengraph_image', '_pincuter_yoast_opengraph_image' );
*/
/*add_action( 'wpseo_add_opengraph_images', '_pincuter_yoast_opengraph_image' );*/
function _pincuter_yoast_opengraph_image( $object ) {
    if ( is_post_type_archive ( 'servizi' ) ) {
        $image = _pincuter_theme_option('theme_options_ogimage_archive_servizi');
    }
	else if( is_post_type_archive ( 'formazconsulenz' ) ) {
		$image = _pincuter_theme_option('theme_options_ogimage_archive_formazione_consulenza');
	}
	else if( is_post_type_archive ( 'casehistory' ) ) {
		$image = _pincuter_theme_option('theme_options_ogimage_archive_case_history');
	}
    //return $image;
	
	$object->add_image( $image );
}