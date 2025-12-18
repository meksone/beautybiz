<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


add_action('print_media_templates', function(){
	?>
	<script type="text/html" id="tmpl-custom-gallery-setting">
		<h3>Custom Settings</h3>
		
		<!--
		<label class="setting">
			<span><?php //_e('Text'); ?></span>
			<input type="text" value="" data-setting="ds_text" style="float:left;">
		</label>

		<label class="setting">
			<span><?php //_e('Textarea'); ?></span>
			<textarea value="" data-setting="ds_textarea" style="float:left;"></textarea>
		</label>

		<label class="setting">
			<span><?php //_e('Number'); ?></span>
			<input type="number" value="" data-setting="ds_number" style="float:left;" min="1" max="9">
		</label>
		
		<label class="setting">
			<span><?php _e('Bool'); ?></span>
			<input type="checkbox" data-setting="ds_bool">
		</label>
		-->
		
		<label class="setting">
			<span><?php _e('Visualizzazione'); ?></span>
			<select data-setting="visualizzazione_select">
				<option value="slider">Slider</option>
				<option value="carousel">Carousel</option>
			</select>
		</label>

		

	</script>

	<script>

		jQuery(document).ready(function()
		{
			_.extend(wp.media.gallery.defaults, {
				/*
				ds_text: 'no text',
				ds_textarea: 'no more text',
				ds_number: "3",
				ds_select: 'option1',
				ds_bool: false,
				ds_text1: 'dummdideldei'
				*/
				visualizzazione_select: 'slider'
			});

			wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
			template: function(view){
			  return wp.media.template('gallery-settings')(view)
				   + wp.media.template('custom-gallery-setting')(view);
			},
			// this is function copies from WP core /wp-includes/js/media-views.js?ver=4.6.1
			update: function( key ) {
			  var value = this.model.get( key ),
				$setting = this.$('[data-setting="' + key + '"]'),
				$buttons, $value;

			  // Bail if we didn't find a matching setting.
			  if ( ! $setting.length ) {
				return;
			  }

			  // Attempt to determine how the setting is rendered and update
			  // the selected value.

			  // Handle dropdowns.
			  if ( $setting.is('select') ) {
				$value = $setting.find('[value="' + value + '"]');

				if ( $value.length ) {
				  $setting.find('option').prop( 'selected', false );
				  $value.prop( 'selected', true );
				} else {
				  // If we can't find the desired value, record what *is* selected.
				  this.model.set( key, $setting.find(':selected').val() );
				}

			  // Handle button groups.
			  } else if ( $setting.hasClass('button-group') ) {
				$buttons = $setting.find('button').removeClass('active');
				$buttons.filter( '[value="' + value + '"]' ).addClass('active');

			  // Handle text inputs and textareas.
			  } else if ( $setting.is('input[type="text"], textarea') ) {
				if ( ! $setting.is(':focus') ) {
				  $setting.val( value );
				}
			  // Handle checkboxes.
			  } else if ( $setting.is('input[type="checkbox"]') ) {
				$setting.prop( 'checked', !! value && 'false' !== value );
			  }
			  // HERE the only modification I made
			  else {
				$setting.val( value ); // treat any other input type same as text inputs
			  }
			  // end of that modification
			},
			});
		});

	</script>
	<?php
});


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

