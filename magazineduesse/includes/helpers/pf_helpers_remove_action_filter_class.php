<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


if ( ! class_exists( 'PNCTR_RemoveActionFilterWP' ) ) {

    class PNCTR_RemoveActionFilterWP {

        /*
        * Filters and actions are both saved in the $wp_filter global variable.
        */
        public static function remove_action_hook_name( $filter_name, $hook_name ) {

            self::remove_filter_hook_name( $filter_name, $hook_name );
        }

        /*
        * Loop through all action/filter hooks and remove any that match the given function or static method name.
        *
        * Note that class object methods are matched using a class static method name.
        */
        public static function remove_filter_hook_name( $filter_name, $hook_name ) {

            global $wp_filter;

            if ( isset( $wp_filter[ $filter_name ]->callbacks ) ) {

                foreach ( $wp_filter[ $filter_name ]->callbacks as $hook_prio => $hook_group ) {

                    foreach ( $hook_group as $hook_id => $hook_info ) {

                        /*
                        * Returns a function name or a class static method name.
                        *
                        * Class object methods are returned as class static method names.
                        */
                        if ( self::get_hook_function_name( $hook_info ) === $hook_name ) {

                            unset( $wp_filter[ $filter_name ]->callbacks[ $hook_prio ][ $hook_id ] );
                        }
                    }
                }
            }
        }

        /*
        * Returns a function name or a class static method name.
        *
        * Class object methods are returned as class static method names.
        */
        public static function get_hook_function_name( array $hook_info ) {

            $hook_name = '';

            if ( isset( $hook_info[ 'function' ] ) ) {

                /*
                * The callback hook is a dynamic or static method.
                */
                if ( is_array( $hook_info[ 'function' ] ) ) {

                    $class_name = '';

                    $function_name = '';

                    /*
                    * The callback hook is a dynamic method.
                    */
                    if ( is_object( $hook_info[ 'function' ][ 0 ] ) ) {

                        $class_name = get_class( $hook_info[ 'function' ][ 0 ] );

                    /*
                    * The callback hook is a static method.
                    */
                    } elseif ( is_string( $hook_info[ 'function' ][ 0 ] ) ) {

                        $class_name = $hook_info[ 'function' ][ 0 ];
                    }

                    if ( is_string( $hook_info[ 'function' ][ 1 ] ) ) {

                        $function_name = $hook_info[ 'function' ][ 1 ];
                    }

                    /*
                    * Return a static method name.
                    */
                    $hook_name = $class_name . '::' . $function_name;

                /*
                * The callback hook is a function.
                */
                } elseif ( is_string( $hook_info[ 'function' ] ) ) {

                    $hook_name = $hook_info[ 'function' ];
                }
            }

            return $hook_name;
        }
    }
}



/*
function remove_filters_for_anonymous_class( $hook_name = '', $class_name ='', $method_name = '', $priority = 0 ) {
	global $wp_filter;
	
	// Take only filters on right hook name and priority
	if ( !isset($wp_filter[$hook_name][$priority]) || !is_array($wp_filter[$hook_name][$priority]) )
		return false;
	
	// Loop on filters registered
	foreach( (array) $wp_filter[$hook_name][$priority] as $unique_id => $filter_array ) {
		// Test if filter is an array ! (always for class/method)
		if ( isset($filter_array['function']) && is_array($filter_array['function']) ) {
			// Test if object is a class, class and method is equal to param !
			if ( is_object($filter_array['function'][0]) && get_class($filter_array['function'][0]) && get_class($filter_array['function'][0]) == $class_name && $filter_array['function'][1] == $method_name ) {
				unset($wp_filter[$hook_name][$priority][$unique_id]);
			}
		}
		
	}
	
	return false;
}
//remove_filter( 'post_class', 'tm_post_class' );
remove_filters_for_anonymous_class('post_class', 'THEMECOMPLETE_Extra_Product_Options', 'tm_post_class');
*/

/*
add_action('init','_pincuter_commodore_remove_class');
function _pincuter_commodore_remove_class(){
    remove_filter('post_class', array('THEMECOMPLETE_Extra_Product_Options', 'tm_post_class'));
}
*/