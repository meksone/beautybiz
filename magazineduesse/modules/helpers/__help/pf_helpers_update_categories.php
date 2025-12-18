<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/* Template Name: Update categories */

// Get all posts
$args = array (
    'post_type' => 'post',
    'post_status' => 'publish',
    'numberposts' => 1000,
    'category'    => array(10727)
);
$posts = get_posts($args);

// print_r($posts);

foreach ($posts as $post) {

    // More validation to ensure only desired posts are changed:
    if (in_category(array(10727))) {

        // Get details for each matching post:
        $id = $post->ID;
        $title = $post->post_title;

        // Update category for each post and get updated category name:
        $cat_update = wp_set_post_categories($id, array(889));
        $cat_update = get_cat_name($cat_update[0]);

        // Display results of update:
        echo $cat_update ? $title . ': category updated to ' . $cat_update . '<br/>' : NULL;

    }

} 
?>