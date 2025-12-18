<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$second_featured_image = get_post_meta($category_post_id, 'em_second_featured_image', true);
if( !empty($second_featured_image)){
    $category_thumb_image_id = get_post_meta($category_post_id, 'em_second_featured_image_id', true);
	$class_category_thumb = 'edsecond';
} 
else if( has_post_thumbnail($category_post_id) ){
	$category_thumb_image_id = get_post_thumbnail_id($category_post_id);
	$class_category_thumb = 'edfeatured';
}
else {
    $category_thumb_image_id = _pincuter_theme_option('theme_options_default_image_id');
    $class_category_thumb = 'eddefault';
}


echo '<figure class="thumb_normal" data-image-id="'.$category_thumb_image_id.'">';
	echo '<a href="'.get_permalink($category_post_id).'" title="'.$category_post_title.'">';
        echo wp_get_attachment_image( $category_thumb_image_id, 'pnctr_image_thumb_primissimo', false, array( 'class' => 'img-fluid' ) );
	echo '</a>';
echo '</figure>';
