<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/*#################################################
### Navigation with description Walker Nav Menu ###
#################################################*/
if (! class_exists('description_walker')) {
		class description_walker extends Walker_Nav_Menu {
			function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
				///global $wp_query;
				global $wp_query, $wpdb;
				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
				
				/////
				// depth dependent classes
				$depth_classes = array(
						( $depth == 0 ? '' : '' ), //class for the top level menu which got sub-menu
						( $depth >=1 ? '' : 'menu-item-dropdown' ), //class for the level-1 sub-menu which got level-2 sub-menu
						( $depth >=2 ? 'sub-sub-menu-item' : '' ), //class for the level-2 sub-menu which got level-3 sub-menu
						'menu-item-depth-' . $depth
					);
				$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
				/////
				

				$class_names = $value = '';

				$classes = empty( $item->classes ) ? array() : (array) $item->classes;

				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
				//$class_names = ' class="'. esc_attr( $class_names ) . '"';
				$class_names = ' class="'. esc_attr( $class_names ) . ' ' . $depth_class_names . '"';

				$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
				
				/*
				// $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				// $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				// $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				// $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
				*/

				$atts = array();
				/*///$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';*/
				$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : $item->title;
				$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
				$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
				$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

				/**
				 * Filter the HTML attributes applied to a menu item's <a>.
				 *
				 * @since 3.6.0
				 *
				 * @see wp_nav_menu()
				 *
				 * @param array $atts {
				 *     The HTML attributes applied to the menu item's <a>, empty strings are ignored.
				 *
				 *     @type string $title  Title attribute.
				 *     @type string $target Target attribute.
				 *     @type string $rel    The rel attribute.
				 *     @type string $href   The href attribute.
				 * }
				 * @param object $item The current menu item.
				 * @param array  $args An array of wp_nav_menu() arguments.
				 */
				$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

				$attributes = '';
				foreach ( $atts as $attr => $value ) {
					if ( ! empty( $value ) ) {
						$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
						$attributes .= ' ' . $attr . '="' . $value . '"';
					}
				}

				$description  = ! empty( $item->description ) ? '<span class="desc">'.esc_attr( $item->description ).'</span>' : '';

				if($depth != 0) {
					$description = $append = $prepend = "";
				}

				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before;

				if (isset($prepend))
					$item_output .= $prepend;

				$item_output .= apply_filters( 'the_title', $item->title, $item->ID );

				if (isset($append))
					$item_output .= $append;

				$item_output .= $description.$args->link_after;
				
				
				
				$has_children = $wpdb->get_var( "SELECT COUNT(meta_id)
						FROM {$wpdb->prefix}postmeta
						WHERE meta_key='_menu_item_menu_item_parent'
						AND meta_value='".$item->ID."'"
					);
				
				/*
				// Add the caret if menu level is 0
				///if ( $depth == 0 && $has_children > 0 ) {
				///if ( $depth == 0 || $depth == 1 && $has_children > 0 ) {
				*/
				
				if ( $has_children > 0 ) {
					$item_output .= '<i class="fa fa-angle-down"></i>';
				}
				
				
				
				$item_output .= '</a>';
				$item_output .= $args->after;

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
		}
}

/*
add_filter( 'nav_menu_css_class', '_pincuter_nav_classes', 10, 2 );
function _pincuter_nav_classes( $classes, $item ) {
    if( 
		(is_post_type_archive( array('servizi','formazconsulenz','casehistory') ) || is_singular( array('servizi','formazconsulenz','casehistory') ) ) && 
		get_post_meta( $item->ID, '_menu_item_object_id', true ) == get_option( 'page_for_posts' ) ) {
        $classes = array_diff( $classes, array( 'current_page_parent' ) );
    }
	
	if ( $item->title== 'Case History' && is_singular('casehistory') ) {
		$classes[] = 'current_page_parent';
	}
	
    return $classes;
}
*/