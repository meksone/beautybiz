<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/* ATTACHED
==================== */	
$cmb_tecnoedil_page_azienda->add_field( array(
    'name'    => esc_html__( 'Staff', CURRENT_DOMAIN ),
    //'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'yourtextdomain' ),
    'id' => 'tecnoedil_azienda_staff_attached',
    'type'    => 'custom_attached_posts',
    'column'  => false, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
    'options' => array(
        'show_thumbnails' => false, // Show thumbnails on the left
        'filter_boxes'    => true, // Show a text box for filtering the results
        'query_args'      => array(
            'post_type'      => 'tcstaff',
        ), // override the get_posts args
    ),
) );

/* RENDERING ATTACHED
==================== */		
$tecnoedil_azienda_staff_attached = get_post_meta(get_the_id(), 'tecnoedil_azienda_staff_attached', true);
if($tecnoedil_azienda_staff_attached){
                foreach( $tecnoedil_azienda_staff_attached as $staff_attached ){
                $staff_attached_get_post = get_post($staff_attached);
                $staff_attached_id = $staff_attached_get_post->ID;
                $staff_attached_title = $staff_attached_get_post->post_title;
                $staff_attached_slug = $staff_attached_get_post->post_name;
                
                $staff_attached_image_attachment = wp_get_attachment_image_src(get_post_thumbnail_id($staff_attached_id), 'full');
                $staff_attached_image_url = $staff_attached_image_attachment[0];
                $staff_attached_image = aq_resize($staff_attached_image_url, 1100, 1100, true, true, true);
                                            
                $staff_attached_image_id = _pincuter_get_attachment_id_from_url($staff_attached_image_url);
                $staff_attached_image_caption_title = get_the_title($staff_attached_image_id);
                $staff_attached_image_caption_alt = get_post_meta( $staff_attached_image_id, '_wp_attachment_image_alt', true);
}