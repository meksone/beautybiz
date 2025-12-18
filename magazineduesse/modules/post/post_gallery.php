<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


//------------------------------------------------------
//  PNCTR POST-GALLERY
//------------------------------------------------------
add_action( 'init', '_pincuter_filter_post_gallery_init' );
function _pincuter_filter_post_gallery_init(){
	add_filter( 'post_gallery', '_pincuter_filter_post_gallery', 10, 3 );
}

function _pincuter_filter_post_gallery( $output, $attr, $instance) {
    global $post;
		
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
		//'visualizzazione_select' => 'slider',
		'layout'	 => '',
		'flexsmooth' => '',
        'include'    => '',
        'exclude'    => '',
		'stylerbm'	 => 'griglia'
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
	
	
	
	$output = '<!-- Start Gallery -->';
		
		
	$output .= "<div id='gallery-slider-wrap-$instance' class='gallery gallery-slider-wrap gallery-slider-wrap-$instance gallery-type-$stylerbm'>";
	
		if( $stylerbm == 'griglia' ){
			
			/*
			if( $columns == 3 ){		
				
				$resize_width = 1000;
				$resize_height = 1000;
			} else if( $columns == 1 ){
				
				$resize_width = 1650;
				$resize_height = 650;
			}
			*/
			
			switch($columns){
				case 2:
					$col_item = 'col-md-6 td-pb-span6 col-sm-6 col-xm-6 col-xs-6 col-xxs-6';
				break;
				case 3:
					$col_item = 'col-md-4 td-pb-span4 col-sm-6 col-xm-6 col-xs-6 col-xxs-6';
				break;
				case 4:
					$col_item = 'col-md-3 td-pb-span3 col-sm-6 col-xm-6 col-xs-6 col-xxs-6';
				break;
				case 5:
					$col_item = 'col-md-0 td-pb-span0 col-sm-6 col-xm-6 col-xs-6 col-xxs-6';
				break;
				case 6:
					$col_item = 'col-md-2 td-pb-span2 col-sm-6 col-xm-6 col-xs-6 col-xxs-6';
				break;
			}
			
			
			/*
			$output .= "
				<style type='text/css'>
					.gallery-post-grid row-flex:before,
					.gallery-post-grid row-flex:after {
						display: none !important;
					}
					.gallery-post-grid small.descrizione_image_credit, 
					.gallery-post-grid small.didascalia_image {
						position: relative !important;
						margin-top: 10px !important;
						display: block !important;
						font-size: 12px !important;
						text-align: left !important;
						color: #999 !important;
						line-height: 1.2 !important;
					}
					.gallery-post-grid row-flex {
						box-sizing: border-box;
						
						-webkit-flex-wrap: wrap;
						-ms-flex-wrap: wrap;
						flex-wrap: wrap;
						
						margin-right:-15px;
						margin-left:-15px;
						
						display: -webkit-box; 
						display: -moz-box; 
						display: -ms-flexbox; 
						display: -webkit-flex;
						display: flex; 
						display: box;
					}
					.item-gallery {
						margin-bottom: 1rem;
					}
				</style>
			";
			*/

			$output .= "
				<style type='text/css'>
					.gallery-post-grid .item-gallery {
						margin-bottom: 1.5rem;
					}
					.gallery-post-grid .item-gallery figure.gallery-item-figure img {
						opacity: 0;
					}
					.gallery-post-grid .item-gallery figure.gallery-item-figure {
						background-position: center;
						-webkit-backface-visibility: hidden !important;
						-webkit-background-size: cover !important;
						-moz-background-size: cover !important;
						background-size: cover !important;
						position: relative;
						width: 100%;
					}
					@media (min-width: 1025px){
						.gallery-post-grid .item-gallery figure.gallery-item-figure {
							height: 115px;
						}
					}
					@media (min-width: 768px) and (max-width: 1024px) {
						.gallery-post-grid .item-gallery figure.gallery-item-figure {
							height: 230px;
						}
					}
					@media (min-width: 576px) and (max-width: 767px) {
						.gallery-post-grid .item-gallery figure.gallery-item-figure {
							height: 175px;
						}
					}
					@media (min-width: 480px) and (max-width: 575px) {
						.gallery-post-grid .item-gallery figure.gallery-item-figure {
							height: 150px;
						}
					}
					@media (min-width: 320px) and (max-width: 479px) {
						.gallery-post-grid .item-gallery figure.gallery-item-figure {
							height: 125px;
						}
					}
					@media (max-width: 319px) {
						.gallery-post-grid .item-gallery figure.gallery-item-figure {
							height: 115px;
						}
					}
				</style>
			";
			
			
			$output .= "<div class='gallery-post-grid'>";
				$output .= '<div class="row">';
			
					$i = 0;
					foreach ( $attachments as $id => $attachment ) :
						
						
						
						/*
						//$image_url_resize = aq_resize($image_url,null,500,true,true,true);
						//$image_url_resize = aq_resize($image_url,1650,650,true,true,true);
						//$image_url_resize = aq_resize($image_url,$resize_width,$resize_height,true,true,true);
						
						//$image_url_resize = aq_resize($image_url,450,300,true,true,true);
						*/
						
						/*
						$attachment_url_full = wp_get_attachment_image_src( $attachment->ID,'full');
						$image_url_full = $attachment_url_full[0];

						$attachment_url_resize = wp_get_attachment_image_src( $attachment->ID,'pnctr_image_post_gallery');
						$image_url_resize = $attachment_url_resize[0];
						*/

						$attachment_url_full = wp_get_attachment_image_src( $attachment->ID,'full');
						$image_url_full = $attachment_url_full[0];

						$attachment_url_resize = wp_get_attachment_image_src( $attachment->ID,'pnctr_image_gallery_inside_article');
						$image_url_resize = $attachment_url_resize[0];
						
						$link_title = get_the_title($post->ID);
						
						$attachment_tag_title = get_the_title($attachment->ID);
						$attachment_tag_alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true);
						
						$didascalia_image = get_post($attachment)->post_excerpt;
						$descrizione_image_credit = get_post($attachment)->post_content;
						
						$link_rel   = 'data-fancybox="gallery-'.$instance.'"';
						
						$caption = wp_get_attachment_caption( $attachment->ID );
						$data_caption = 'data-caption="'.$caption.'"';
						
						$output .= '<div class="'.$col_item.' item item-gallery">';
							
							$output .= '<a href="'.$attachment_url_full[0].'" class="image-wrap" '.$link_rel.'>';
								$output .= '<figure class="gallery-item-figure mb-0" style="background-image:url('.$attachment_url_resize[0].');">';
									$output .= wp_get_attachment_image( $attachment->ID, 'pnctr_image_gallery_inside_article', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );
									$output .= '<small class="didascalia_image">'.$didascalia_image.'</small>';
									$output .= '<small class="descrizione_image_credit">'.$descrizione_image_credit.'</small>';
								$output .= '</figure>';
							$output .= '</a>';
									
						$output .= "</div>";
						
					endforeach; #--endforeach
	
				$output .= "</div>\n";
			$output .= "</div>\n";
		
		} else if( $stylerbm == 'slider' ){

			$output .= '
				<script>
				jQuery(document).ready(function(){
					jQuery(".gallery-post-slick").slick({
						dots: false,
						arrows: true,
						pauseOnHover: false,
						slidesToShow: 1,
						infinite: true,
						slidesToScroll: 1,
						autoplay: true,
						autoplaySpeed: 5000,
						nextArrow: \'<div class="button-next"><i class="bi bi-arrow-right-circle-fill"></i></div>\',
						prevArrow: \'<div class="button-prev"><i class="bi bi-arrow-left-circle-fill"></i></div>\',
					});
				});
				</script>

				<style>
				.gallery-post-slick {
					margin-bottom: 1rem;
				}
				.gallery-post-slick .slick-arrow {
					cursor: pointer !important;
					z-index: 9 !important;
					position: absolute;
					top: 50%;
					transform: translateY(-50%);
					font-size: 40px !important;
					color: var(--bianco) !important;
				}
				.gallery-post-slick .slick-arrow.button-prev {
					left: 1rem;
				}
				.gallery-post-slick .slick-arrow.button-next {
					right: 1rem;
				}
				</style>
			';
			
			$output .= "<div class='gallery-post-slick'>";
			
				$i = 0;
				foreach ( $attachments as $id => $attachment ) :
						
					$attachment_url_full = wp_get_attachment_image_src( $attachment->ID,'full');
					$image_url_full = $attachment_url_full[0];
						
					/*
					$attachment_url_resize = wp_get_attachment_image_src( $attachment->ID,'full');
					$image_url_resize = $attachment_url_resize[0];
					*/
						
					$link_title = get_the_title($post->ID);
						
					$attachment_tag_title = get_the_title($attachment->ID);
					$attachment_tag_alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true);
						
					$didascalia_image = get_post($attachment)->post_excerpt;
					$descrizione_image_credit = get_post($attachment)->post_content;
						
					$link_rel   = 'data-fancybox="gallery-'.$instance.'"';
						
					$caption = wp_get_attachment_caption( $attachment->ID );
					$data_caption = 'data-caption="'.$caption.'"';
						
					$output .= '<div class="'.$col_item.' item item-gallery">';
						
						/*
						$output .= "
								<div class='item item-gallery'>
								<a href='$attachment_url_full[0]' class='image-wrap' $link_rel>
									<figure class='gallery-item-figure'>
										<img src='".$image_url_resize."' alt='".$attachment_tag_alt."' title='".$attachment_tag_title."' />
										<small class='didascalia_image'>".$didascalia_image."</small>
										<small class='descrizione_image_credit'>".$descrizione_image_credit."</small>
									</figure>
									<div class='button-expand'>
										<i class='fa fa-expand' aria-hidden='true'></i>
									</div>
								</a>
								</div>
								";
								*/
						
						$output .= '<div class="item item-gallery">';	
							$output .= '<a href="'.$attachment_url_full[0].'" class="image-wrap" '.$link_rel.'>';
								$output .= '<figure class="gallery-item-figure mb-0">';
									$output .= wp_get_attachment_image( $attachment->ID, 'pnctr_image_gallery_inside_article', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );
									$output .= '<small class="didascalia_image">'.$didascalia_image.'</small>';
									$output .= '<small class="descrizione_image_credit">'.$descrizione_image_credit.'</small>';
								$output .= '</figure>';
							$output .= '</a>';
						$output .= "</div>";

					$output .= "</div>";
						
				endforeach; #--endforeach
			
			$output .= "</div>\n";
		}
		
	$output .= "</div>\n";
	
	
	$output .= '<!-- End Gallery -->';
	

    return $output;
	
} #end_function
