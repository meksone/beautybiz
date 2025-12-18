<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/*
// Remove Empty Paragraphs
add_filter('the_content', 'shortcode_empty_paragraph_fix');
function shortcode_empty_paragraph_fix($content) {
	$array = array (
			'<p>['    => '[',
			']</p>'   => ']',
			']<br />' => ']'
	);
	$content = strtr($content, $array);
	return $content;
}
*/

// Remove Empty Paragraphs
add_filter('the_content', '_pincuter_filter_content_empty_paragraph_fix');
function _pincuter_filter_content_empty_paragraph_fix($content) {
	$array = array (
			'<p>['    => '[',
			']</p>'   => ']',
			']<br />' => ']'
	);
	$content = strtr($content, $array);
	return $content;
}

add_filter('the_content', '_pincuter_filter_content_empty_paragraph_fix2');
function _pincuter_filter_content_empty_paragraph_fix2($content) {
	$content = force_balance_tags($content);
    return preg_replace('/<p>(?:\s|&nbsp;)*?<\/p>/i', '', $content);
}

/*########## --- SEPARATOR --- ##########*/


/*
 * #############################################
 * ### _pincuter_get_attachment_id_from_url ####
 * SOSTITUITO DA attachment_url_to_postid($url);
 * #############################################
 */

function _pincuter_get_attachment_id_from_url( $attachment_url = '' ) {

	global $wpdb;
	$attachment_id = false;

	// If there is no url, return.
	if ( '' == $attachment_url )
		return;

	// Get the upload directory paths
	$upload_dir_paths = wp_upload_dir();

	// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {

		// If this is the URL of an auto-generated thumbnail, get the URL of the original image
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

		// Remove the upload path base directory from the attachment URL
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

		// Finally, run a custom database query to get the attachment ID from the modified attachment URL
		$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );

	}

	return $attachment_id;
}
	
	
/*########## --- SEPARATOR --- ##########*/


/*########################
###  HEADER WP_TITLE() ###
########################*/
if ( !function_exists('_pincuter_header_wp_title') ) :
	function _pincuter_header_wp_title() { ?>
<title><?php if ( is_category() ) {
	echo __('Archivio per Categoria ', CURRENT_THEME).'&quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
} elseif ( is_tag() ) {
	echo __('Tag for ', CURRENT_THEME).'&quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
} elseif ( is_archive() ) {
	wp_title(''); echo " ".__('Archive', CURRENT_THEME)." | "; bloginfo( 'name' );
} elseif ( is_search() ) {
	echo __('Search for ', CURRENT_THEME).'&quot;'.esc_html($_GET['s']).'&quot; | '; bloginfo( 'name' );
} elseif ( is_home() || is_front_page()) {
	bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
}  elseif ( is_404() ) {
	echo __('Error 404 ', CURRENT_THEME)." | "; bloginfo( 'name' );
} elseif ( is_single() ) {
	wp_title('');
} else {
	wp_title( ' | ', true, 'right' ); bloginfo( 'name' );
} ?></title>
<?php 	
	}
endif;


/*########## --- SEPARATOR --- ##########*/


function get_youtube_code_from_url($url = '') {
    if( empty($url) ) return true;
    $matches = array();
    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
    return $matches[1];
}


function get_youtube_embed_from_url($url = '', $width = 560, $height = 315) {
    $code = get_youtube_code_from_url($url);
    return '<iframe width="'.$width.'" height="'.$height.'" src="//www.youtube.com/embed/'.$code.'" frameborder="0" allowfullscreen></iframe>';
}


function get_youtube_title($id){
	$tmp = file_get_contents("http://youtube.com/watch?v=" . $id);

    $tmp2 = substr($tmp, (strpos($tmp, "<title>") + 7), 220);

    $tmp = substr($tmp2, 0, strpos($tmp2, "</title>") - 9);

    //echo htmlspecialchars_decode($tmp);
	return $tmp;
}


/*
The first one in the list is a full size image and others are thumbnail images. The default thumbnail image (i.e., one of 1.jpg, 2.jpg, 3.jpg) is:

https://img.youtube.com/vi/<insert-youtube-video-id-here>/default.jpg
For the high quality version of the thumbnail use a URL similar to this:

https://img.youtube.com/vi/<insert-youtube-video-id-here>/hqdefault.jpg
There is also a medium quality version of the thumbnail, using a URL similar to the HQ:

https://img.youtube.com/vi/<insert-youtube-video-id-here>/mqdefault.jpg
For the standard definition version of the thumbnail, use a URL similar to this:

https://img.youtube.com/vi/<insert-youtube-video-id-here>/sddefault.jpg
For the maximum resolution version of the thumbnail use a URL similar to this:

https://img.youtube.com/vi/<insert-youtube-video-id-here>/maxresdefault.jpg
*/

/*
Width | Height | URL
------|--------|----
120   | 90     | https://i.ytimg.com/vi/<VIDEO ID>/1.jpg
120   | 90     | https://i.ytimg.com/vi/<VIDEO ID>/2.jpg
120   | 90     | https://i.ytimg.com/vi/<VIDEO ID>/3.jpg
120   | 90     | https://i.ytimg.com/vi/<VIDEO ID>/default.jpg
320   | 180    | https://i.ytimg.com/vi/<VIDEO ID>/mq1.jpg
320   | 180    | https://i.ytimg.com/vi/<VIDEO ID>/mq2.jpg
320   | 180    | https://i.ytimg.com/vi/<VIDEO ID>/mq3.jpg
320   | 180    | https://i.ytimg.com/vi/<VIDEO ID>/mqdefault.jpg
480   | 360    | https://i.ytimg.com/vi/<VIDEO ID>/0.jpg
480   | 360    | https://i.ytimg.com/vi/<VIDEO ID>/hq1.jpg
480   | 360    | https://i.ytimg.com/vi/<VIDEO ID>/hq2.jpg
480   | 360    | https://i.ytimg.com/vi/<VIDEO ID>/hq3.jpg
480   | 360    | https://i.ytimg.com/vi/<VIDEO ID>/hqdefault.jpg

Width | Height | URL
------|--------|----
640   | 480    | https://i.ytimg.com/vi/<VIDEO ID>/sd1.jpg
640   | 480    | https://i.ytimg.com/vi/<VIDEO ID>/sd2.jpg
640   | 480    | https://i.ytimg.com/vi/<VIDEO ID>/sd3.jpg
640   | 480    | https://i.ytimg.com/vi/<VIDEO ID>/sddefault.jpg
1280  | 720    | https://i.ytimg.com/vi/<VIDEO ID>/hq720.jpg
1920  | 1080   | https://i.ytimg.com/vi/<VIDEO ID>/maxresdefault.jpg
*/


function get_vimeo_code_from_url($url = '') {
    if( empty($url) ) return true;
    $explode = explode('/', $url);
    $vimeo_id = (int)$explode[3];
	return $vimeo_id;
}
function get_vimeo_embed_from_url($url = '', $width = 650, $height = 352) {
    $explode = explode('/', $url);
    $vimeo_id = (int)$explode[3];
    $return = '<iframe src="//player.vimeo.com/video/'.$vimeo_id.'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
    return $return;
}


function strip_shortcode_gallery( $content ) {
    preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );

    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if( false !== $pos ) {
                    return substr_replace( $content, '', $pos, strlen( $shortcode[0] ) );
                }
            }
        }
    }

    return $content;
}


/*########## --- SEPARATOR --- ##########*/


function _pincuter_get_id_from_meta( $meta_key, $meta_value ) {
    global $wpdb;
    $pid = $wpdb->get_var( $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = '$meta_value' AND meta_key = '$meta_key' ORDER BY post_id DESC") );
    if( $pid != '' )
        return $pid;
    else 
        return false;
}


/*
add_filter( 'the_content', '_pincuter_add_title_image_content' );
function _pincuter_add_title_image_content( $content ) {
	//global $post;
	
    if ( ( is_single() || is_page() ) && in_the_loop() && is_main_query() ) {
		
		$image_content_id = get_post(get_post_thumbnail_id());
        //$image_title = $image->post_title;
		//$image_content_tag_title = get_the_title($image_content_id);
		$image_content_tag_title = $image_content_id->post_title;
		$image_content_tag_alt = get_post_meta( $image_content_id, '_wp_attachment_image_alt', true);
    
        //$pattern = '~(<img.*? alt=")("[^>]*>)~i';
		$pattern = '~(<img.*?)([^>]*>)~i';
        //$replace = '$1'.$image_title.'$2';
		$replace = '$1 alt="'.$image_content_tag_alt.'" title="'.$image_content_tag_title.'" $2';
        $content = preg_replace( $pattern, $replace, $content );
            
        return $content;
    }
} 
*/


add_filter( 'the_content', '_pincuter_add_title_image_content' );
function _pincuter_add_title_image_content( $content ) {
	global $post;
	
	$attachments = get_attached_media( 'image', $post->ID );

	foreach( $attachments as $att_id => $attachment ) {

		$image_alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
		$image_title = get_the_title($attachment->ID);
		
		//$pattern = '~(<img.*? alt=")("[^>]*>)~i';
		$pattern = '~(<img.*?)([^>]*>)~i';
        //$replace = '$1'.$image_title.'$2';
		$replace = '$1 alt="'.$image_alt.'" title="'.$image_title.'" $2';
        $content = preg_replace( $pattern, $replace, $content );
            
        
		
	}
	
	
	return $content;
}


/*########## --- SEPARATOR --- ##########*/


/*#################################################
### Recreate the default filters on the_content ###
#################################################*/
add_filter( 'pincuter_meta_content', 'wptexturize'        );
add_filter( 'pincuter_meta_content', 'convert_smilies'    );
add_filter( 'pincuter_meta_content', 'convert_chars'      );
add_filter( 'pincuter_meta_content', 'wpautop'            );
#add_filter( 'pincuter_meta_content', 'shortcode_unautop'  );
add_filter( 'pincuter_meta_content', 'prepend_attachment' );
add_filter( 'pincuter_meta_content', 'do_shortcode' );

/*#@example@#*/
/*
#$text = get_post_meta($post->ID, 'wpcf-wysiwygfield', true);
#echo apply_filters('pincuter_meta_content',$text);
*/

/*# END default filters on the_content ###
### ---------------------------------- #*/