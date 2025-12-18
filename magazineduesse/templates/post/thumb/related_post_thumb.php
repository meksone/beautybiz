<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$second_featured_image = get_post_meta($related_category_id, 'em_second_featured_image', true);
if( !empty($second_featured_image)){
    $related_thumb_image_id = get_post_meta($related_category_id, 'em_second_featured_image_id', true);
	$class_home_thumb = 'edsecond';
} 
else if( has_post_thumbnail($related_category_id) ){
	$related_thumb_image_id = get_post_thumbnail_id($related_category_id);
	$class_home_thumb = 'edfeatured';
}
else {
    $related_thumb_image_id = _pincuter_theme_option('theme_options_default_image_id');
    $class_home_thumb = 'eddefault';
}

echo '<figure class="thumb_normal" data-image-id="'.$related_thumb_image_id.'">';
	echo '<a href="'.get_permalink($related_category_id).'" title="'.$related_category_title.'">';
        //echo wp_get_attachment_image( $related_thumb_image_id, 'pnctr_image_thumb_primissimo', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );
		if( has_term('articolo-rivista', 'evidenza_post') ){
			echo wp_get_attachment_image( $related_thumb_image_id, 'pnctr_image_thumb_vertical', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );
		} else {
			echo wp_get_attachment_image( $related_thumb_image_id, 'pnctr_image_thumb_primissimo', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );
		}
	echo '</a>';
echo '</figure>';
