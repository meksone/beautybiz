<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_filter('wp_nav_menu_items', '_pincuter_iniect_header_menu', 10, 2);
function _pincuter_iniect_header_menu($items, $args) {
	
	$start_menu_item = '';
	
	if($args->theme_location == 'header_menu'){
		
		$start_menu_item .= '<li id="menu-item-'.get_option( 'woocommerce_shop_page_id' ).'" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-dropdown  menu-item-depth-0" data-item-row="default">';
			$start_menu_item .= '<a href="'.get_permalink(get_option( 'woocommerce_shop_page_id' )).'" title="'.get_the_title(get_option( 'woocommerce_shop_page_id' )).'">';
				$start_menu_item .= get_the_title(get_option( 'woocommerce_shop_page_id' ));
				$start_menu_item .= '<i class="fa fa-angle-down"></i>';
			$start_menu_item .= '</a>';
			
			$start_menu_item .= '<ul class="sub-menu">';
		
				/*
				$categories = get_categories( array(
					'orderby' => 'name',
					'order'   => 'ASC',
					'include' => array(69984,69986,69987,69988,69989,69960,69990,69991,69957,69992,69983,69995)
				) );
				*/
				$product_terms = get_terms( array( 'taxonomy' => 'product_cat', 'parent' => 0 ) );

				foreach( $product_terms as $product_term ) {
					
					$start_menu_item .= '<li id="menu-item-'.$product_term->term_id.'" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-'.$product_term->term_id.'">';
						$start_menu_item .= '<a href="'.esc_url( get_term_link( $product_term->term_id ) ).'" title="'.$product_term->name.'">';
							$start_menu_item .= $product_term->name;
						$start_menu_item .= '</a>';
					$start_menu_item .= '</li>';
				}
				
			$start_menu_item .= '</ul>';
		$start_menu_item .= '</li>';
		
		//$new_items = $start_menu_item . $items;
		
	}
	
	return $start_menu_item . $items;
}
