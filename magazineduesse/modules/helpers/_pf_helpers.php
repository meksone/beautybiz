<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


//include_once( get_stylesheet_directory() . '/modules/helpers/pf_helpers_category_template.php');
include_once( get_stylesheet_directory() . '/modules/helpers/pf_helpers_no_category_base.php');
include_once( get_stylesheet_directory() . '/modules/helpers/pf_helpers_post_taxonomies.php');
include_once( get_stylesheet_directory() . '/modules/helpers/pf_helpers_post_thumbnails.php');
include_once( get_stylesheet_directory() . '/modules/helpers/pf_helpers_second_featured_image.php');

include_once( get_stylesheet_directory() . '/modules/helpers/pf_helpers_nav_menu_items.php');

include_once( get_stylesheet_directory() . '/modules/helpers/pf_helpers_breadcrumbs.php');
include_once( get_stylesheet_directory() . '/modules/helpers/pf_helpers_pagination.php');

include_once( get_stylesheet_directory() . '/modules/helpers/pf_helpers_feed_rss.php');
//include_once( get_stylesheet_directory() . '/modules/helpers/pf_helpers_refresh.php');


/*
include_once( get_stylesheet_directory() . '/modules/helpers/pf_helpers_archive_year_functions.php');

include_once( get_stylesheet_directory() . '/includes/helpers/pf_helpers_hide_editor.php');
include_once( get_stylesheet_directory() . '/includes/helpers/pf_helpers_custom_columns_admin.php');

include_once( get_stylesheet_directory() . '/includes/helpers/pf_helpers_config_admin_area.php');
include_once( get_stylesheet_directory() . '/includes/helpers/pf_helpers_pre_get_posts.php');

include_once( get_stylesheet_directory() . '/includes/helpers/pf_helpers_title.php');
include_once( get_stylesheet_directory() . '/includes/helpers/pf_helpers_breadcrumbs.php');
include_once( get_stylesheet_directory() . '/includes/helpers/pf_helpers_pagination.php');

include_once( get_stylesheet_directory() . '/includes/helpers/pf_helpers_gallery.php');

include_once( get_stylesheet_directory() . '/includes/helpers/pf_helpers_seo.php');
include_once( get_stylesheet_directory() . '/includes/helpers/pf_helpers_no_category_base.php');

include_once( get_stylesheet_directory() . '/includes/helpers/pf_helpers_calculate_image.php');
include_once( get_stylesheet_directory() . '/includes/helpers/pf_helpers_second_featured_image.php');

include_once( get_stylesheet_directory() . '/includes/helpers/pf_helpers_upload_file_types.php');
*/


function wpdocs_custom_init() {
	remove_post_type_support( 'post', 'custom-fields' );
}
add_action( 'admin_init', 'wpdocs_custom_init' );