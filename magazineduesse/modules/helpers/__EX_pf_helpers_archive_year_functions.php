<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


function is_current_page($permalink) {
    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if (strpos($url,$permalink) !== false)
        return true;
    else
        return false;
}

// Year and month based archive listings
function posts_by_year() {
    // array to use for results
    $years = array();
    // get posts from WP
    $posts = get_posts(array(
        'numberposts' => -1,
        'orderby' => 'post_date',
        'order' => 'ASC',
        'post_type' => 'post',
        'post_status' => 'publish'
    ));
    // loop through posts, populating $years arrays
    foreach($posts as $post) {
        $years[date('Y', strtotime($post->post_date))][date('F', strtotime($post->post_date))] = $post;
    }
    
    // reverse sort by year
    krsort($years);
    
    return $years;
}