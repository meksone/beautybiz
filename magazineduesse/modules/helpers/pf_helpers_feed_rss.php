<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_filter('the_excerpt_rss', '_eduesse_featured_image_to_rss');
add_filter('the_content_feed', '_eduesse_featured_image_to_rss');
function _eduesse_featured_image_to_rss($content) {
	global $post;
	$content = '';
	if ( has_post_thumbnail( $post->ID ) ){
		$content .= '<div>' . get_the_post_thumbnail( $post->ID, 'medium', array( 'style' => 'margin-bottom: 15px;' ) ) . '</div>' . $content;
	}

    /*
	$post_subtitle = get_post_meta( $post->ID, 'post_subtitle', true );
	if( !empty( $post_subtitle ) ){
		$content .= '<div>'.$post_subtitle.'</div>';
	}
    */
    $jnews_cmb_post_subtitle = get_post_meta($post->ID, 'post_subtitle', true);
	$magazineduesse_riassunto_post_lungo_contenuto = get_post_meta($post->ID, 'magazineduesse_riassunto_post_lungo_contenuto', true);

    $post_excerpt_output = '';

	if( has_excerpt( $post->ID )){
		$post_excerpt_output = get_the_excerpt($post->ID);
	} else if( !empty($magazineduesse_riassunto_post_lungo_contenuto)){
		$post_excerpt_output = $magazineduesse_riassunto_post_lungo_contenuto;
	} else if( !empty($jnews_cmb_post_subtitle)){
		$post_excerpt_output = $jnews_cmb_post_subtitle;
	} else {
		$echocontent = preg_replace( '/\[[^\]]+\]/', '', $post->post_content );
		$echocontent = wp_trim_words( $echocontent, 15 );
		$post_excerpt_output = esc_html(strip_shortcodes($echocontent));
	}

    $content .= '<div>'.$post_excerpt_output.'</div>';


	return $content;
}