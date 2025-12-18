<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


<section id="frontpage_approfondimenti_v2" class="frontpage_approfondimenti frontpage_approfondimenti_p3 frontpage_loop">
    
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <div class="section-title-flex">
                    <h2 class="section-title__heading playfair-semibold">Approfondimenti</h2>
                </div>
        </div>
    </div>

    <div class="grid">
        <div class="g-col-12 g-col-md-6 g-col-item g-col-item-big">
            <?php 
            $approfondimenti_args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                                    
                'orderby' => 'date',
                'order' => 'DESC',
                                            
                'posts_per_page' => 1,
                                        
                'no_found_rows' => true,
                'ignore_sticky_posts' => true,
                                                            
                'tax_query' => array(
                    array(
                        'taxonomy' => 'evidenza_post',
                        'field' => 'slug',
                        'terms' => 'home-approfondimenti'
                    ),
                ),
                'post__not_in'=>$do_not_duplicate,
                                        
            );
            $approfondimenti_query = new WP_Query($approfondimenti_args);
            if ($approfondimenti_query->have_posts()) :	
                while ($approfondimenti_query->have_posts()) : $approfondimenti_query->the_post();
                    $approfondimenti_id = $approfondimenti_query->post->ID;
                    $do_not_duplicate[] = $approfondimenti_id;

                    $approfondimenti_title = get_the_title($approfondimenti_id);
                    $approfondimenti_content = $approfondimenti_query->post->post_content;

                    $home_post_id = $approfondimenti_id;
                    $home_post_title = $approfondimenti_title;
                    $home_post_content = $approfondimenti_content;
                    ?>
                    <div class="col_item post_item">
                        <article <?php post_class(); ?>>
                            <div class="post_thumb" data-file-thumb-src="_home_thumb_approfondimenti_big">
                                <?php 
                                include(get_stylesheet_directory() . '/templates/home/home_thumb/_home_thumb_approfondimenti_v2_big.php');
                                ?>
                            </div>
                            <div class="post_desc post_desc_desktop">
                                <div class="post_categories post_categories_desk">
                                    <?php 
                                    $post_term_get = get_the_terms( $approfondimenti_id, 'category')[0];
                                    $post_term_link = esc_url(get_term_link($post_term_get->slug, 'category'));
                                    $post_term_name = esc_html($post_term_get->name);
                                    ?>
                                    <p>
                                        <a a href="<?php echo $post_term_link; ?>" title="<?php echo $post_term_name; ?>">
                                            <?php echo $post_term_name; ?>
                                        </a>
                                    </p>
                                </div>
                                <div class="post_title post_title_desk">
                                    <h3 class="post_title__heading">
                                        <a href="<?php echo get_permalink($approfondimenti_id); ?>" title="<?php echo $approfondimenti_title; ?>">
                                            <?php echo $approfondimenti_title; ?>
                                        </a>
                                    </h3>
                                </div>
                                <div class="post_meta post_meta_desk">
                                    <div class="post_meta__inner">
                                        <div class="post_meta_date">
                                            <time datetime="<?php echo esc_html(get_the_time('Y-m-d\TH:i:s', $approfondimenti_id)); ?>"><?php echo esc_html(get_the_date()); ?></time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <?php
                endwhile;
            endif;
            wp_reset_query();
            ?>
        </div>

        
        <?php 
        $approfondimenti_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
                                    
            'orderby' => 'date',
            'order' => 'DESC',
                                            
            'posts_per_page' => 2,
                                        
            'no_found_rows' => true,
            'ignore_sticky_posts' => true,
                                                            
            'tax_query' => array(
                array(
                    'taxonomy' => 'evidenza_post',
                    'field' => 'slug',
                    'terms' => 'home-approfondimenti'
                ),
            ),
            'post__not_in'=>$do_not_duplicate,
                                        
        );
        $approfondimenti_query = new WP_Query($approfondimenti_args);

        $approfondimenti_countel = 1;
        if ($approfondimenti_query->have_posts()) :	
            while ($approfondimenti_query->have_posts()) : $approfondimenti_query->the_post();
                $approfondimenti_id = $approfondimenti_query->post->ID;
                $do_not_duplicate[] = $approfondimenti_id;

                $approfondimenti_title = get_the_title($approfondimenti_id);
                $approfondimenti_content = $approfondimenti_query->post->post_content;

                $home_post_id = $approfondimenti_id;
                $home_post_title = $approfondimenti_title;
                $home_post_content = $approfondimenti_content;
                ?>
                <div class="g-col-12 g-col-md-3 g-col-item g-col-item-small">
                    <div class="col_item post_item">
                        <article <?php post_class(); ?>>
                            <div class="post_thumb" data-file-thumb-src="_home_thumb_approfondimenti_small">
                                <?php 
                                include(get_stylesheet_directory() . '/templates/home/home_thumb/_home_thumb_approfondimenti_v2_small.php');
                                ?>
                            </div>

                            <div class="post_desc post_desc_desktop">
                                <div class="post_categories post_categories_desk">
                                    <?php 
                                    $post_term_get = get_the_terms( $home_post_id, 'category')[0];
                                    $post_term_link = esc_url(get_term_link($post_term_get->slug, 'category'));
                                    $post_term_name = esc_html($post_term_get->name);
                                    ?>
                                    <p>
                                        <a a href="<?php echo $post_term_link; ?>" title="<?php echo $post_term_name; ?>">
                                            <?php echo $post_term_name; ?>
                                        </a>
                                    </p>
                                </div>
                                <div class="post_title post_title_desk">
                                    <h2 class="post_title__heading">
                                        <a href="<?php echo get_permalink($home_post_id); ?>" title="<?php echo $home_post_title; ?>">
                                            <?php echo $home_post_title; ?>
                                        </a>
                                    </h2>
                                </div>
                                <div class="post_meta post_meta_desk">
                                    <div class="post_meta__inner">
                                        <div class="post_meta_date">
                                            <time datetime="<?php echo esc_html(get_the_time('Y-m-d\TH:i:s', $home_post_id)); ?>"><?php echo esc_html(get_the_date()); ?></time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <?php
                $approfondimenti_countel++;
            endwhile;
        endif;
        wp_reset_query();
        ?>
        
    </div>
</section>