<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


<div class="frontpage_loop_evidenza_grid">
    <div id="frontpage_primissimo_piano" class="frontpage_primissimo_piano frontpage_loop frontpage_grid_big frontpage_grid_big_count_3">
        <div class="row">
            <?php 
            $suppress_filters = get_option('suppress_filters');
            $latest_grid_big_args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                                        
                'orderby' => 'date',
                'order' => 'DESC',
                                        
                'posts_per_page' => 1,
                                        
                'no_found_rows' => true,
                'ignore_sticky_posts' => true,
                                    
                'post__not_in' => $do_not_duplicate,
                                
                'tax_query' => array(
                    array(
                        'taxonomy' => 'evidenza_post',
                        'field' => 'slug',
                        'terms' => 'home-primissimo'
                    ),
                ),
                                        
            );
                                    
            $wp_query = new WP_Query($latest_grid_big_args);
                                                                            
            if ($wp_query->have_posts()) :	
                while ($wp_query->have_posts()) : $wp_query->the_post();
                                            
                    $latest_grid_big_id = $wp_query->post->ID;
                    $do_not_duplicate[] = $latest_grid_big_id;
                                            
                    $latest_grid_big_title = get_the_title($latest_grid_big_id);
                    $latest_grid_big_content = $wp_query->post->post_content;
                                            
                    $category_post_id = $latest_grid_big_id;
                    $category_post_title = $latest_grid_big_title;
                    $category_post_content = $latest_grid_big_content;
                    ?>
                    <div class="col-md-12 col_item">
                        <article <?php post_class(); ?>>
                            <a href="<?php echo get_permalink($category_post_id); ?>" title="<?php echo $category_post_title; ?>">
                                <div class="post_thumb">
                                    <?php 
                                    //include(get_stylesheet_directory() . '/templates/home/home_thumb/_home_thumb_grid_big_overlay.php');
                                    if( has_post_thumbnail($category_post_id) ){
                                        $category_thumb_image_id = get_post_thumbnail_id($category_post_id);
                                        $category_thumb_attachment = wp_get_attachment_image_src( get_post_thumbnail_id($category_post_id), 'full' );
                                        $category_thumb_image = $category_thumb_attachment[0];
                                        $class_category_thumb = 'bpfeatured';
                                    }
                                    else {
                                        $category_thumb_image_id = _pincuter_theme_option('theme_options_default_image_id');
                                        $category_thumb_image = _pincuter_theme_option('theme_options_default_image');
                                        $class_category_thumb = 'bpdefault';
                                    }
                                                
                                    $category_thumb_attachment_resize = wp_get_attachment_image_src( $category_thumb_image_id, 'pnctr_image_overlay_grid_big' );
                                    $category_thumb_image_resize = $category_thumb_attachment_resize[0];
                                                
                                    echo '<figure class="thumb_overlay" data-image-id="'.$category_thumb_image_id.'" style="background-image:url('.$category_thumb_image_resize.');">';
                                        echo wp_get_attachment_image( $category_thumb_image_id, 'pnctr_image_overlay_grid_big', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );
                                                
                                        echo '<div class="post_desc">';
                                            echo '<div class="post_title">';
                                                echo '<h3 class="post_title__heading">';
                                                    echo $category_post_title;
                                                echo '</h3>';
                                            echo '</div>';
                                        echo '</div>';
                                                
                                    echo '</figure>';
                                    ?>
                                </div>
                            </a>
                        </article>
                    </div>
                    <?php 
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>

    <div id="frontpage_primo_piano" class="frontpage_primo_piano frontpage_loop frontpage_grid_small frontpage_grid_small_count_3">
        <div class="row">
            <?php 
            $suppress_filters = get_option('suppress_filters');
            $latest_grid_big_args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                                        
                'orderby' => 'date',
                'order' => 'DESC',
                                        
                'posts_per_page' => 3,
                                        
                'no_found_rows' => true,
                'ignore_sticky_posts' => true,
                                    
                'post__not_in' => $do_not_duplicate,
                                
                'tax_query' => array(
                    array(
                        'taxonomy' => 'evidenza_post',
                        'field' => 'slug',
                        'terms' => 'home-primo'
                    ),
                ),
                                        
            );
                                    
            $wp_query = new WP_Query($latest_grid_big_args);
                                                                            
            if ($wp_query->have_posts()) :	
                while ($wp_query->have_posts()) : $wp_query->the_post();
                                            
                    $latest_grid_big_id = $wp_query->post->ID;
                    $do_not_duplicate[] = $latest_grid_big_id;
                                            
                    $latest_grid_big_title = get_the_title($latest_grid_big_id);
                    $latest_grid_big_content = $wp_query->post->post_content;
                                            
                    $category_post_id = $latest_grid_big_id;
                    $category_post_title = $latest_grid_big_title;
                    $category_post_content = $latest_grid_big_content;
                    ?>
                    <div class="col-12 col-sm-3 col-md-12 col_item">
                        <article <?php post_class(); ?>>
                            <a href="<?php echo get_permalink($category_post_id); ?>" title="<?php echo $category_post_title; ?>">
                                <div class="row row_article_item">
                                    <div class="col-5 col-sm-12 col-md-5 col_image">
                                        <div class="post_thumb">
                                            <?php 
                                            //include(get_stylesheet_directory() . '/templates/home/home_thumb/_home_thumb_grid_small_overlay.php');
                                            if( has_post_thumbnail($category_post_id) ){
                                                $category_thumb_image_id = get_post_thumbnail_id($category_post_id);
                                                $category_thumb_attachment = wp_get_attachment_image_src( get_post_thumbnail_id($category_post_id), 'full' );
                                                $category_thumb_image = $category_thumb_attachment[0];
                                                $class_category_thumb = 'bpfeatured';
                                            }
                                            else {
                                                $category_thumb_image_id = _pincuter_theme_option('theme_options_default_image_id');
                                                $category_thumb_image = _pincuter_theme_option('theme_options_default_image');
                                                $class_category_thumb = 'bpdefault';
                                            }
                                                        
                                            $category_thumb_attachment_resize = wp_get_attachment_image_src( $category_thumb_image_id, 'pnctr_image_post_archive' );
                                            $category_thumb_image_resize = $category_thumb_attachment_resize[0];
                                                        
                                                        
                                            echo '<figure class="thumb_overlay" data-image-id="'.$category_thumb_image_id.'" style="background-image:url('.$category_thumb_image_resize.');">';
                                                echo wp_get_attachment_image( $category_thumb_image_id, 'pnctr_image_post_archive', false, array( 'class' => 'img-fluid', 'loading' => 'lazy' ) );
                                            echo '</figure>';
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-7 col-sm-12 col-md-7 col_text">
                                        <div class="post_desc">
                                            <div class="post_title">
                                                <h3 class="post_title__heading">
                                                    <?php echo $category_post_title; ?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                    <?php 
                endwhile;
            endif;
            wp_reset_query();
            ?>
        </div>
    </div>
</div>