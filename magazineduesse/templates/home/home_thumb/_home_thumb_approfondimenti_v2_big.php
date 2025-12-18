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

$home_thumb_attachment_resize_background = wp_get_attachment_image_src( $home_thumb_image_id, 'pnctr_image_thumb_primissimo' );
$home_thumb_image_resize_background = $home_thumb_attachment_resize_background[0];

echo '<a href="'.get_permalink($home_post_id).'" title="'.$home_post_title.'">';
    echo '<figure class="thumb_overlay" data-image-id="'.$home_thumb_image_id.'" style="background-image:url('.$home_thumb_image_resize_background.');">';
    
    /*
    echo '<img src="'.$home_thumb_image_resize.'" class="img-fluid '.$class_home_thumb.'" data-id="'.$home_thumb_image_id.'" title="'.$home_thumb_image_tag_title.'" alt="'.$home_thumb_image_tag_alt.'"  />';
    */
    echo wp_get_attachment_image( $home_thumb_image_id, 'pnctr_image_thumb_primissimo', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );

        echo '<div class="figure_overlay_inner_desc">';
            echo '<div class="post_title">';
                echo '<h3 class="post_title__heading post_title__overlay_inner">';
                    echo $home_post_title;
                echo '</h2>';
            echo '</div>';
            echo '<div class="post_meta">';
                echo '<div class="post_meta__inner">';
                    echo '<div class="post_meta_date">';
                        echo '<time datetime="'.esc_html(get_the_time('Y-m-d\TH:i:s', $home_post_id)).'">'.esc_html(get_the_date()).'</time>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        
    echo '</figure>';
echo '</a>';