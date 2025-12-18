<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}



/*
add_filter( 'the_content', '_pincuter_content_replace_attachment_image_with_webp' );
function _pincuter_content_replace_attachment_image_with_webp( $content ) {
	
	$patterns = array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}','{ wp-image-[0-9]*" /></a>}');
	
	
	
}
*/

/*
add_filter( 'the_content', 'replaceimages_get_images' );
function replaceimages_get_images($content) {
    global $post;
	
		$images = array();
		$x = 0;
		$args = array(
			'post_type'   => 'attachment',
			'numberposts' => -1,
			'post_status' => null,
			'post_parent' => $post->ID,
			'exclude'     => get_post_thumbnail_id()
		);

		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
				$src = wp_get_attachment_image_src( $attachment->ID, 'full' );
				$post_inner_image = $src[0];
				$title = apply_filters( 'the_title', $attachment->post_title );
				$alt = apply_filters( 'alt', get_post_meta($attachment->ID, '_wp_attachment_image_alt', true ));
				
				$images[$x] = '<img src="'.$src[0].'" title="'.$title.'" alt="'.$alt.'" />';
				$x++;
			}
		}
	
    return $content;
}
*/


add_filter( 'the_content', 'attachment_image_link_remove_filter' );
function attachment_image_link_remove_filter( $content ) {
    $content =
        preg_replace(
            array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
                '{ wp-image-[0-9]*" /></a>}'),
            array('<img','" />'),
            $content
        );
    return $content;
}


add_filter( 'the_content', '_pincuter_filter_contet_modify_images', 100 );
function _pincuter_filter_contet_modify_images( $content ) {
    if ( ! preg_match_all( '/<img [^>]+>/', $content, $matches ) ) {
        return $content;
    }

    $selected_images = $attachment_ids = array();

    foreach ( $matches[0] as $image ) {
        if ( preg_match( '/size-([a-z]+)/i', $image, $class_size ) && preg_match( '/wp-image-([0-9]+)/i', $image, $class_id ) && $image_size = $class_size[1] && $attachment_id = absint( $class_id[1] ) ) {
            /*
             * If exactly the same image tag is used more than once, overwrite it.
             * All identical tags will be replaced later with 'str_replace()'.
             */
            $selected_images[ $image ] = $attachment_id;
            // Overwrite the ID when the same image is included more than once.
            $attachment_ids[ $attachment_id ] = true;
        }
    }
    foreach ( $selected_images as $image => $attachment_id ) {
        $content = str_replace( $image, _pincuter_filter_contet_modify_images_tag( $image, $attachment_id, $image_size ), $content );
    }

    return $content;
}



function _pincuter_filter_contet_modify_images_tag( $image, $attachment_id, $image_size ) {
    $image_src = preg_match( '/src="([^"]+)"/', $image, $match_src ) ? $match_src[1] : '';
    list( $image_src ) = explode( '?', $image_src );

    // Return early if we couldn't get the image source.
    if ( ! $image_src ) {
        return $image;
    }
	
	
	/*
    //Get attachment meta for sizes
    $size_large  = wp_get_attachment_image_src( $attachment_id, 'large' );
    $size_medium = wp_get_attachment_image_src( $attachment_id, 'medium' );

    $size_large  = $size_large ? $size_large[0] : '';
    $size_medium = $size_medium ? $size_medium[0] : '';

    //Check if the image already have a respective attribute
    if ( ! strpos( $image, 'data-large' ) && ! empty( $size_large ) ) {
        $attr = sprintf( ' data-large="%s"', esc_attr( $size_large ) );
    }

    if ( ! strpos( $image, 'data-medium' ) && ! empty( $size_medium ) ) {
        $attr .= sprintf( ' data-medium="%s"', esc_attr( $size_medium ) );
    }

	// Add 'data' attributes
    $image = preg_replace( '/<img ([^>]+?)[\/ ]*>/', '<img $1' . $attr . ' />', $image );
	preg_replace(
            array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
                '{ wp-image-[0-9]*" /></a>}'),
            array('<img','" />'),
            $content
        );
    //Append figure tag
    $r_image = sprintf( '<figure id="image-%d" class="size-%s">', $image_size, $attachment_id );
    $r_image .= $image . '</figure>';
	*/
	
	/*
	$image = preg_replace( array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
                '{ wp-image-[0-9]*" /></a>}'), 
				$replacement,
				$image
				);
	*/
	
	$post_inner_image_attachment = wp_get_attachment_image_src($attachment_id, 'full');
	$post_inner_image_url = $post_inner_image_attachment[0];
	
	$post_inner_image_getimagesize = getimagesize($post_inner_image_url);
	
	$post_inner_image_resize_1200 = aq_resize($post_inner_image_url, 1200, null, true, true, true);
	$post_inner_image_resize_992 = aq_resize($post_inner_image_url, 992, null, true, true, true);
	$post_inner_image_resize_768 = aq_resize($post_inner_image_url, 768, null, true, true, true);
	$post_inner_image_resize_576 = aq_resize($post_inner_image_url, 576, null, true, true, true);
	$post_inner_image_resize_480 = aq_resize($post_inner_image_url, 480, null, true, true, true);
	$post_inner_image_resize_320 = aq_resize($post_inner_image_url, 320, null, true, true, true);
					
	$post_inner_image_type = wp_check_filetype( $post_inner_image_url );
	//$post_inner_image_getimagesize = getimagesize($post_inner_image_url);
					
	$post_inner_image_tag_title = get_the_title($attachment_id);
	$post_inner_image_tag_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true);
	
	
	$r_image = '';
	$r_image .= '<picture id="image_id_'.$attachment_id.'">';
		
		$r_image .= '<source media="(min-width: 1200px)" srcset="'.$post_inner_image_resize_1200.'.webp" type="image/webp">';
		$r_image .= '<source media="(min-width: 992px)" srcset="'.$post_inner_image_resize_992.'.webp" type="image/webp">';
		$r_image .= '<source media="(min-width: 768px)" srcset="'.$post_inner_image_resize_768.'.webp" type="image/webp">';
		$r_image .= '<source media="(min-width: 576px)" srcset="'.$post_inner_image_resize_576.'.webp" type="image/webp">';
		$r_image .= '<source media="(min-width: 480px)" srcset="'.$post_inner_image_resize_480.'.webp" type="image/webp">';
		$r_image .= '<source media="(min-width: 320px)" srcset="'.$post_inner_image_resize_320.'.webp" type="image/webp">';
						
		$r_image .= '<source media="(min-width: 1200px)" srcset="'.$post_inner_image_resize_1200.'" type="image/'.$post_inner_image_type['ext'].'">';
		$r_image .= '<source media="(min-width: 992px)" srcset="'.$post_inner_image_resize_992.'" type="image/'.$post_inner_image_type['ext'].'">';
		$r_image .= '<source media="(min-width: 768px)" srcset="'.$post_inner_image_resize_768.'" type="image/'.$post_inner_image_type['ext'].'">';
		$r_image .= '<source media="(min-width: 576px)" srcset="'.$post_inner_image_resize_576.'" type="image/'.$post_inner_image_type['ext'].'">';
		$r_image .= '<source media="(min-width: 480px)" srcset="'.$post_inner_image_resize_480.'" type="image/'.$post_inner_image_type['ext'].'">';
		$r_image .= '<source media="(min-width: 320px)" srcset="'.$post_inner_image_resize_320.'" type="image/'.$post_inner_image_type['ext'].'">';
		
		$r_image .= '<img width="'.$post_inner_image_getimagesize[0].'" height="'.$post_inner_image_getimagesize[1].'" loading="lazy" src="'.$post_inner_image_url.'" title="'. $post_inner_image_tag_title.'" alt="'.$post_inner_image_tag_alt.'" srcset="'.wp_get_attachment_image_srcset($attachment_id, 'full').'" sizes="'.wp_get_attachment_image_sizes( $attachment_id, 'full' ).',(max-width: 1199px) 1199px, (max-width: 991px) 991px, (max-width: 767px) 767px, (max-width: 575px) 575px, (max-width: 479px) 479px, (max-width: 319px) 319px" />';
		
	$r_image .= '</picture>';

    return $r_image;

}