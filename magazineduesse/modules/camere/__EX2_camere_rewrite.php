<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}



/*
add_filter( 'post_type_link', '_hotelpompei_permalinks_post_type_link', 1, 2 );
function _hotelpompei_permalinks_post_type_link( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'camere' ){
        $terms = wp_get_object_terms( $post->ID, 'categoria_camere' );
        if( $terms ){
            $categoria_camere_term_array = array();
			
			foreach ($terms as $categoria_camere_term) {
				array_push($categoria_camere_term_array, $categoria_camere_term->slug);
			}
			$categoria_camere_tax_url = join('/',$categoria_camere_term_array);
        
			$post_link = str_replace( '%categoria_camere%' , $categoria_camere_tax_url , $post_link );
			
		}
    }
    return $post_link;
}
*/


add_filter( 'post_type_link', '_hotelpompei_permalinks_post_type_link', 10, 2 );
function _hotelpompei_permalinks_post_type_link( $post_link, $id = 0 ){
    $post = get_post($id);
	if ( is_object( $post ) && $post->post_type == 'camere' ){		
		$terms = wp_get_object_terms( $post->ID, 'categoria_camere' );
		if( $terms ){
			return str_replace( '%categoria_camere%' , $terms[0]->slug , $post_link );
		} else {
			return str_replace( '%categoria_camere%' , 'camere' , $post_link );
		}
	}

    return $post_link;
}

