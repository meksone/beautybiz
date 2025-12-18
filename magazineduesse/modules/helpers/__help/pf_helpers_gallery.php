<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


//------------------------------------------------------
//  PNCTR POST-GALLERY
//------------------------------------------------------
if (!function_exists('_pincuter_filter_post_gallery')) :
add_filter( 'post_gallery', '_pincuter_filter_post_gallery', 10, 2 );
function _pincuter_filter_post_gallery( $output, $attr) {
    global $post, $wp_locale;
		
    static $instance = 0;
    $instance++;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'li',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
		'layout'	 => '',
		'flexsmooth' => '',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    //$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";	

    $output = apply_filters('gallery_style', "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
                margin-top: 10px;
                text-align: center;          
			}

            #{$selector} .gallery-caption {
                margin-left: 0;
            }
			
        </style>
        <!-- see gallery_shortcode() in wp-includes/media.php -->
        ");
		
		$output .= "
			<style type='text/css'>
			.filterable-gallery {
				position:relative;
			}
			.filterable-gallery .gallery-item {
				margin-bottom: 30px;
			}
			.filterable-gallery .image-wrap {
				position:relative;
				display:block;
				overflow:hidden;
			}
			
			</style>
		";
	
		$output .= "<div id='gallery-grid $selector' class='row gallery galleryid-{$id} filterable-gallery gallery-columns-{$columns}' data-cols='{$columns}'>";

	
		$spans = $columns;
		// columns
		switch ($spans) {
			case '1':
				$spans = '12';
				break;
			case '2':
				$spans = '6';
				break;
			case '3':
				$spans = '4';
				break;
			case '4':
				$spans = '3';
				break;
			case '6':
				$spans = '2';
				break;
		}
			

    $i = 0;
    foreach ( $attachments as $id => $attachment ) :
        
		$attachment_url = wp_get_attachment_image_src( $attachment->ID,'full');
	
		$link_title = get_the_title($post->ID);
		$link_rel   = 'data-fancybox="gallery-'.$post->ID.'"';
		#$data_caption = 'data-caption="'.get_the_title($post->ID).'"';
		$caption = wp_get_attachment_caption( $attachment->ID );
		$data_caption = 'data-caption="'.$caption.'"';
		
        $output .= "<div class='gallery-item col-md-{$spans}'>";
        $output .= "
					<a href='$attachment_url[0]' class='image-wrap' $data_caption $link_rel>
						<img src='$attachment_url[0]' alt=".$link_title." />
					</a>
					";
        $output .= "</div>";
        
    endforeach; #--endforeach
	

    $output .= "</div>\n";

    return $output;
	
} #end_function

endif; #if function exist

