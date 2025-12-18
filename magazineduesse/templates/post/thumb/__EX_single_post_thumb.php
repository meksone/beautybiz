<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


if( has_post_thumbnail() ){	
	$post_thumb_attachment = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()), 'full' );
	$post_thumb_image = $post_thumb_attachment[0];		
	$post_thumb_image_id = get_post_thumbnail_id(get_the_id());
	$class_post_thumb = 'edfeatured';	
}
else {	
	$default_image = _pincuter_theme_option('theme_options_default_image');
	$post_thumb_image = _pincuter_theme_option('theme_options_default_image');
	$post_thumb_image_id = _pincuter_theme_option('theme_options_default_image_id');
	$class_post_thumb = 'eddefault';
}
	
$post_thumb_image_tag_title = get_the_title($post_thumb_image_id);
$post_thumb_image_tag_alt = get_post_meta( $post_thumb_image_id, '_wp_attachment_image_alt', true);
$post_thumb_image_getimagesize = getimagesize($post_thumb_image);
	
echo '<figure>';
	echo '<img src="'.$post_thumb_image.'" class="'.$class_post_thumb.' img-fluid" data-id="'.$post_thumb_image_id.'" width="'.$post_thumb_image_getimagesize[0].'" height="'.$post_thumb_image_getimagesize[1].'" title="'.$post_thumb_image_tag_title.'" alt="'.$post_thumb_image_tag_alt.'"  />';
echo '</figure>';
