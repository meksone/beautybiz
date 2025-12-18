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

/*
$home_thumb_image_caption_title = get_the_title($home_thumb_image_id);
$home_thumb_image_caption_alt = get_post_meta( $home_thumb_image_id, '_wp_attachment_image_alt', true);
if( !empty($home_thumb_image_caption_title)){
    $home_thumb_image_tag_title = $home_thumb_image_caption_title;
} else {
    $home_thumb_image_tag_title = get_the_title($home_post_id);
}
if( !empty($home_thumb_image_caption_alt)){
    $home_thumb_image_tag_alt = $home_thumb_image_caption_alt;
} else {
    $home_thumb_image_tag_alt = get_the_title($home_post_id);
}

$home_thumb_attachment_resize = wp_get_attachment_image_src( $home_thumb_image_id, 'pnctr_image_thumb_primissimo' );
$home_thumb_image_resize = $home_thumb_attachment_resize[0];
*/

echo '<figure class="thumb_normal" data-image-id="'.$home_thumb_image_id.'">';
	echo '<a href="'.get_permalink($home_post_id).'" title="'.$home_post_title.'">';
		/*
        echo '<img src="'.$home_thumb_image_resize.'" class="img-fluid '.$class_home_thumb.'" data-id="'.$home_thumb_image_id.'" width="770" height="430" title="'.$home_thumb_image_tag_title.'" alt="'.$home_thumb_image_tag_alt.'"  />';
        */
        
        /**
         * echo wp_get_attachment_image( $home_thumb_image_id, 'pnctr_image_thumb_vertical', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );
         * */
        echo wp_get_attachment_image( $home_thumb_image_id, 'pnctr_image_thumb_vertical_special', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );
	echo '</a>';
echo '</figure>';
