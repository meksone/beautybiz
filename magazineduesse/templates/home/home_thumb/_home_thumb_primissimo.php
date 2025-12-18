<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$second_featured_image = get_post_meta($home_post_id, 'em_second_featured_image', true);
if( !empty($second_featured_image)){
    $home_thumb_image_id = get_post_meta($home_post_id, 'em_second_featured_image_id', true);
	$class_home_thumb = 'edsecond';
} 
else if( has_post_thumbnail($home_post_id) ){
	$home_thumb_image_id = get_post_thumbnail_id($home_post_id);
	$class_home_thumb = 'edfeatured';
}
else {
    $home_thumb_image_id = _pincuter_theme_option('theme_options_default_image_id');
    $class_home_thumb = 'eddefault';
}

echo '<figure class="thumb_normal" data-image-id="'.$home_thumb_image_id.'">';
	echo '<a href="'.get_permalink($home_post_id).'" title="'.$home_post_title.'">';
        echo wp_get_attachment_image( $home_thumb_image_id, 'pnctr_image_thumb_primissimo', false, array( 'class' => 'img-fluid', 'fetchpriority' => 'high' ) );
	echo '</a>';
echo '</figure>';
