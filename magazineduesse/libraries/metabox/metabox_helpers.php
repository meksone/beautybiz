<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


function pnctr_cmb2_no_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template.
	if ( get_option( 'page_on_front' ) === $cmb->object_id ) {
		return false;
	}
	return true;
}
function pnctr_cmb2_no_page_for_posts( $cmb ) {
	// Don't show this metabox if it's not the front page template.
	if ( get_option( 'page_for_posts' ) === $cmb->object_id ) {
		return false;
	}
	return true;
}

function pnctr_cmb2_only_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template.
	if ( get_option( 'page_on_front' ) !== $cmb->object_id ) {
		return false;
	}
	return true;
}

function pnctr_cmb2_only_page_for_posts( $cmb ) {
	// Don't show this metabox if it's not the front page template.
	if ( get_option( 'page_for_posts' ) !== $cmb->object_id ) {
		return false;
	}
	return true;
}


function pnctr_cmb2_no_dhpage( $cmb ) {
	// Don't show this metabox if it's not the front page template.
	$dhpage_keys = array ( 
		"woocommerce_shop_page_id" ,
        "woocommerce_terms_page_id" ,
        "woocommerce_cart_page_id" ,
        "woocommerce_checkout_page_id" ,
        "woocommerce_pay_page_id" ,
        "woocommerce_thanks_page_id" ,
        "woocommerce_myaccount_page_id" ,
        "woocommerce_edit_address_page_id" ,
        "woocommerce_view_order_page_id" ,
        "woocommerce_change_password_page_id" ,
        "woocommerce_logout_page_id" ,
        "woocommerce_lost_password_page_id" ,
		"page_on_front",
		"page_for_posts"
	) ;
    foreach ( $dhpage_keys as $dh_page_id ) {
		if ( get_the_ID () == get_option ( $dh_page_id , 0 ) && get_option ( $dh_page_id ) === $cmb->object_id ) {
            return false;
        }
    }
	
	return true;
}


add_filter( 'cmb2_show_on', 'pnctr_cmb2_metabox_no_footer_prefooter', 10, 2 );
function pnctr_cmb2_metabox_no_footer_prefooter( $display, $meta_box ) {
	if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
		return $display;
	}

	if ( 'slug' !== $meta_box['show_on']['key'] ) {
		return $display;
	}

	$post_id = 0;

	// If we're showing it based on ID, get the current ID
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	} elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}

	if ( ! $post_id ) {
		return $display;
	}
	
	$slug = get_post( $post_id )->post_name;

	// See if there's a match
	return ! in_array( $slug, (array) $meta_box['show_on']['value']);
}
#
function pnctr_cmb2_get_postypes_options() {
	global $post;
	$cpts = get_post_types();
	unset( $cpts[ 'nav_menu_item' ] );
	unset( $cpts[ 'revision' ] );
	unset( $cpts[ 'post' ] );
	unset( $cpts[ 'page' ] );
	// Initate an empty array
	$postypes_options = array();
	
	$args = array(
		'post_type' => $cpts,
		'numberposts' => -1,
	);
	$postypes = get_posts($args);

	foreach ( $postypes as $postype ) {
		$postypeobject = get_post_type_object(get_post_type($postype));
		$postypes_options[ $postype->ID ] = $postype->post_title.' ('.$postypeobject->labels->singular_name.')';
	}

	return $postypes_options;
}
#
function pnctr_cmb2_get_posts_options() {
	global $post;
	
	// Initate an empty array
	$posts_options = array();
	
	$args = array(
		'post_type' => 'post',
		'numberposts' => -1,
	);
	$posts = get_posts($args);

	foreach ( $posts as $post ) {
		$posts_options[ $post->ID ] = $post->post_title;
	}

	return $posts_options;
}
function pnctr_cmb2_get_pages_options() {
	global $post;
		
	$args = array(
		'post_type' => 'page',
		'numberposts' => -1,
	);
	$pages = get_posts($args);
	
	$pages_options = array();
	if ( ! empty( $pages ) ) {
	foreach ( $pages as $page ) {
		$pages_options[ $page->ID ] = $page->post_title;
		#$pages_options[ $page->post_name ] = $page->post_title;
	}
	}

	return $pages_options;
}
function pnctr_cmb2_get_all_wordpress_taxonomy(){
    
	$cpts = get_post_types();
	unset( $cpts[ 'nav_menu_item' ] );
	unset( $cpts[ 'revision' ] );
	unset( $cpts[ 'post' ] );
	unset( $cpts[ 'page' ] );
	
	$taxonomy_objects = get_object_taxonomies( $cpts, 'names' );
	
	if($taxonomy_objects){
		$args = array( 'taxonomy' => $taxonomy_objects, 'numberposts' => -1, );

		$taxonomy = $args['taxonomy'];

		$terms = (array) cmb2_utils()->wp_at_least( '4.5.0' )
			? get_terms( $args )
			: get_terms( $taxonomy, $args );

		// Initate an empty array
		$term_options = array();
		if ( ! empty( $terms ) ) {
			foreach ( $terms as $term ) {
				$term_options[ $term->term_id ] = $term->name.' ('.$taxonomy_objects[0].')';
			}
		}

		return $term_options;
	}
}
function pnctr_cmb2_get_all_wordpress_category(){
    #return get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 
	#return get_terms( 'nav_menu', array( 'hide_empty' => false ) ); 
	
	#$args = $field->args( 'get_terms_args' );
	#$args = is_array( $args ) ? $args : array();

	$args = array( 'taxonomy' => 'category', 'numberposts' => -1, );

	$taxonomy = $args['taxonomy'];

	$terms = (array) cmb2_utils()->wp_at_least( '4.5.0' )
		? get_terms( $args )
		: get_terms( $taxonomy, $args );

	// Initate an empty array
	$term_options = array();
	if ( ! empty( $terms ) ) {
		foreach ( $terms as $term ) {
			$term_options[ $term->term_id ] = $term->name;
		}
	}

	return $term_options;
}
function pnctr_cmb2_get_all_wordpress_posttag(){
    #return get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 
	#return get_terms( 'nav_menu', array( 'hide_empty' => false ) ); 
	
	#$args = $field->args( 'get_terms_args' );
	#$args = is_array( $args ) ? $args : array();

	$args = array( 'taxonomy' => 'post_tag', 'numberposts' => -1, );

	$taxonomy = $args['taxonomy'];

	$terms = (array) cmb2_utils()->wp_at_least( '4.5.0' )
		? get_terms( $args )
		: get_terms( $taxonomy, $args );

	// Initate an empty array
	$term_options = array();
	if ( ! empty( $terms ) ) {
		foreach ( $terms as $term ) {
			$term_options[ $term->term_id ] = $term->name;
		}
	}

	return $term_options;
}
#	
function pnctr_cmb2_get_sidebars_options() {
	global $wp_registered_sidebars;
	
	// Initate an empty array
	$sidebar_options = array();

	foreach ( $wp_registered_sidebars as $sidebar_id => $sidebar ) {
		$sidebar_options[ $sidebar_id ] = $sidebar['name'];
	}

	return $sidebar_options;
}
#
function pnctr_cmb2_get_all_wordpress_menus(){
    #return get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 
	#return get_terms( 'nav_menu', array( 'hide_empty' => false ) ); 
	
	#$args = $field->args( 'get_terms_args' );
	#$args = is_array( $args ) ? $args : array();

	$args = array( 'taxonomy' => 'nav_menu', 'numberposts' => -1, );

	$taxonomy = $args['taxonomy'];

	$terms = (array) cmb2_utils()->wp_at_least( '4.5.0' )
		? get_terms( $args )
		: get_terms( $taxonomy, $args );

	// Initate an empty array
	$term_options = array();
	if ( ! empty( $terms ) ) {
		foreach ( $terms as $term ) {
			$term_options[ $term->term_id ] = $term->name;
		}
	}

	return $term_options;
}
#
function pnctr_cmb2_get_theader_options() {
	global $post;
	
	// Initate an empty array
	$theader_options = array();
	
	$args = array(
		'post_type' => 'h47theader',
	);
	$theaders = get_posts($args);

	foreach ( $theaders as $theader ) {
		$theader_options[ $theader->ID ] = 'Header Custom Builder - '.$theader->post_title;
	}
	
	#$header_theme_standard[ 'header_layout_1' ] = __( 'Header Theme Standard Layout 1 - One Row Same Div', CURRENT_THEME );
	#$header_theme_standard[ 'header_layout_2' ] = __( 'Header Theme Standard Layout 2 - Two Row', CURRENT_THEME );
	#$header_theme_standard[ 'header_layout_3' ] = __( 'Header Theme Standard Layout 3 - One Row Same Div Transparent', CURRENT_THEME );
	#$header_theme_standard[ 'header_layout_4' ] = __( 'Header Theme Standard Layout 4 - Center', CURRENT_THEME );
	#$header_theme_standard[ 'header_layout_5' ] = __( 'Header Theme Standard Layout 5 - Sidebar Fixed', CURRENT_THEME );
	#$header_theme_standard[ 'header_layout_child' ] = __( 'Header Theme Standard Layout ChildTheme', CURRENT_THEME );

	return $theader_options;
}
#
function pnctr_cmb2_get_standard_base_header_options() {
	global $post;
	
	// Initate an empty array
	$header_theme_standard = array();
	
	$header_theme_standard[ 'header_layout_1' ] = __( 'Header Theme Standard Layout 1 - One Row Same Div', CURRENT_THEME );
	$header_theme_standard[ 'header_layout_2' ] = __( 'Header Theme Standard Layout 2 - Two Row', CURRENT_THEME );
	$header_theme_standard[ 'header_layout_3' ] = __( 'Header Theme Standard Layout 3 - One Row Same Div Transparent', CURRENT_THEME );
	$header_theme_standard[ 'header_layout_4' ] = __( 'Header Theme Standard Layout 4 - Center', CURRENT_THEME );
	$header_theme_standard[ 'header_layout_5' ] = __( 'Header Theme Standard Layout 5 - Sidebar Fixed', CURRENT_THEME );
	$header_theme_standard[ 'header_layout_child' ] = __( 'Header Theme Standard Layout ChildTheme', CURRENT_THEME );

	return $header_theme_standard;
}
#
function pnctr_cmb2_get_thsliderad_options() {
	global $post;
	
	// Initate an empty array
	$thsliderad_options = array();
	
	$args = array(
		'post_type' => 'pnctrsliderad',
	);
	$thsliderads = get_posts($args);

	foreach ( $thsliderads as $thsliderad ) {
		$thsliderad_options[ $thsliderad->ID ] = $thsliderad->post_title;
	}

	return $thsliderad_options;
}
#
function pnctr_cmb2_get_tfooter_options() {
	global $post;
	
	// Initate an empty array
	$tfooter_options = array();
	
	$args = array(
		'post_type' => 'pnctrfooterbuild',
	);
	$tfooters = get_posts($args);

	foreach ( $tfooters as $tfooter ) {
		$tfooter_options[ $tfooter->ID ] = $tfooter->post_title;
	}

	return $tfooter_options;
}
#
function pnctr_cmb2_get_tprefooter_options() {
	global $post;
	
	// Initate an empty array
	$tprefooter_options = array();
	
	$args = array(
		'post_type' => 'pnctrprefooterbuild',
	);
	$tprefooters = get_posts($args);

	foreach ( $tprefooters as $tprefooter ) {
		#$tprefooter_options[ $tprefooter->post_name ] = $tprefooter->post_title;
		$tprefooter_options[ $tprefooter->ID ] = $tprefooter->post_title;
	}

	return $tprefooter_options;
}
#
function pnctr_cmb2_get_prefooter_builder_options() {
	global $post;
	
	// Initate an empty array
	$tprefooter_options = array();
	
	$args = array(
		'post_type' => 'h47tprefooter',
	);
	$tprefooters = get_posts($args);

	foreach ( $tprefooters as $tprefooter ) {
		#$tprefooter_options[ $tprefooter->post_name ] = $tprefooter->post_title;
		$tprefooter_options[ $tprefooter->ID ] = $tprefooter->post_title;
	}

	return $tprefooter_options;
}
#
function pnctr_cmb2_get_footer_builder_options() {
	global $post;
	
	// Initate an empty array
	$tprefooter_options = array();
	
	$args = array(
		'post_type' => 'h47tfooter',
	);
	$tprefooters = get_posts($args);

	foreach ( $tprefooters as $tprefooter ) {
		#$tprefooter_options[ $tprefooter->post_name ] = $tprefooter->post_title;
		$tprefooter_options[ $tprefooter->ID ] = $tprefooter->post_title;
	}

	return $tprefooter_options;
}


function pnctr_cmb2_get_image_id($image_src) {
    global $wpdb;
    $image = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_src )); 
    return $image[0]; //return the image ID
}
?>