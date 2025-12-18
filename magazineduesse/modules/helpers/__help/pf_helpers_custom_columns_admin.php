<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/*
add_action('manage_pages_custom_column', '_pincuter_manage_columns', 10, 2);
add_filter('manage_edit-page_columns', '_pincuter_edit_columns');

add_action('manage_assembleazionisti_posts_custom_column', '_pincuter_manage_columns', 10, 2);
add_filter('manage_edit-assembleazionisti_columns', '_pincuter_edit_columns');

add_action('manage_comunicatifinanza_posts_custom_column', '_pincuter_manage_columns', 10, 2);
add_filter('manage_edit-comunicatifinanza_columns', '_pincuter_edit_columns');

add_action('manage_bilanciorelazioni_posts_custom_column', '_pincuter_manage_columns', 10, 2);
add_filter('manage_edit-bilanciorelazioni_columns', '_pincuter_edit_columns');

add_action('manage_infoazionisti_posts_custom_column', '_pincuter_manage_columns', 10, 2);
add_filter('manage_edit-infoazionisti_columns', '_pincuter_edit_columns');
*/


// for posts
add_filter ('manage_posts_columns', '_pincuter_add_id_column');
add_action ('manage_posts_custom_column', '_pincuter_id_column_content', 5, 2);
// for pages
add_filter ('manage_pages_columns', '_pincuter_add_id_column');
add_action ('manage_pages_custom_column', '_pincuter_id_column_content', 5, 2);


function _pincuter_add_id_column( $columns ) {
	$checkbox = array_slice( $columns , 0, 1 );
	$columns = array_slice( $columns , 1 );

	$id['revealid_id'] = 'ID';
	$thumb['thumbnail'] = __("Thumbnail", CURRENT_DOMAIN);
	
	$columns = array_merge( $checkbox, $id, $thumb, $columns );
	return $columns;
}

function _pincuter_id_column_content( $column, $post_id ) {
	
	$width = (int) 70;
	$height = (int) 70;
	
	switch ( $column ) {
	
		case 'revealid_id':
			echo $post_id;
			break;
	
		case 'thumbnail':
			// thumbnail of WP 2.9
			$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
			// image from gallery
			$attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
			if ($thumbnail_id)
				$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
			elseif ($attachments) {
				foreach ( $attachments as $attachment_id => $attachment ) {
					$thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
				}
			}
			if ( isset($thumb) && $thumb ) {
				echo $thumb;
			} else {
				echo __('None', CURRENT_DOMAIN);
			}
			break;
	}
}

add_action('admin_head', '_pincuter_admin_id_column_styling');
function _pincuter_admin_id_column_styling() {
	echo '<style type="text/css">';
		echo 'th#revealid_id{width:50px;}';
		echo 'th#thumbnail{width:100px;}';
	echo '</style>';
}



// for posts
add_action( 'manage_posts_custom_column', '_pincuter_data_modified_column', 10, 2 );
add_filter( 'manage_posts_columns', '_pincuter_data_modified_column_content' );
// for pages
add_action('manage_pages_custom_column', '_pincuter_data_modified_column', 10, 2);
add_filter('manage_edit-page_columns', '_pincuter_data_modified_column_content');

function _pincuter_data_modified_column( $column, $post_id ) {

	switch ( $column ) {

	case 'modified':
		$m_orig		= get_post_field( 'post_modified', $post_id, 'raw' );
		$m_stamp	= strtotime( $m_orig );
		//$modified	= date('n/j/y @ g:i a', $m_stamp );
		$modified	= date('j/n/y @ g:i a', $m_stamp );

	       	$modr_id	= get_post_meta( $post_id, '_edit_last', true );
	       	$auth_id	= get_post_field( 'post_author', $post_id, 'raw' );
	       	$user_id	= !empty( $modr_id ) ? $modr_id : $auth_id;
	       	$user_info	= get_userdata( $user_id );
	
	       	echo '<p class="mod-date">';
	       	echo '<em>'.$modified.'</em><br />';
	       	echo 'by <strong>'.$user_info->display_name.'<strong>';
	       	echo '</p>';

		break;

	// end all case breaks
	}

}

function _pincuter_data_modified_column_content( $columns ) {
	$columns['modified']	= 'Last Modified';
	return $columns;
}


/*########## --- SEPARATOR --- ##########*/


