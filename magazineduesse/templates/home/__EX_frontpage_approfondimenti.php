<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


<section id="frontpage_approfondimenti" class="frontpage_approfondimenti frontpage_loop">
    
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <div class="section-title-flex">
                    <h2 class="section-title__heading">Approfondimenti</h2>
                </div>
        </div>
    </div>

    <div class="grid_custom">
        <!--<div class="g-col-12 g-col-md-8 g-col-item g-col-item-big">-->
        <div class="gc-col-md-8 gc-col-item g-col-item-big">
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
                                include(get_stylesheet_directory() . '/templates/home/home_thumb/_home_thumb_approfondimenti_big.php');
                                ?>
                            </div>
                            <div class="post_desc">
                                <div class="post_categories">
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
                                <div class="post_title">
                                    <h3 class="post_title__heading">
                                        <a href="<?php echo get_permalink($home_post_id); ?>" title="<?php echo $home_post_title; ?>">
                                            <?php echo $home_post_title; ?>
                                        </a>
                                    </h3>
                                </div>
                                <div class="post_meta">
                                    <div class="post_meta__inner">
                                        <div class="post_meta_author">
                                            <?php echo esc_html(get_the_author_meta('display_name')); ?>
                                        </div>
                                        <div class="post_meta_separator">|</div>
                                        <div class="post_meta_date">
                                            <time datetime="<?php echo esc_html(get_the_time('Y-m-d\TH:i:s', $home_post_id)); ?>"><?php echo esc_html(get_the_date()); ?></time>
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

        <!--<div class="g-col-12 g-col-md-4 g-col-item g-col-item-small">-->
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
            $i = 1;
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
                    <div class="gc-col-md-4 gc-col-item g-col-item-small gc-item-<?php echo $i; ?>">
                    <div class="col_item post_item">
                        <article <?php post_class(); ?>>
                            <div class="post_thumb" data-file-thumb-src="_home_thumb_approfondimenti_small">
                                <?php 
                                include(get_stylesheet_directory() . '/templates/home/home_thumb/_home_thumb_approfondimenti_small.php');
                                ?>
                            </div>
                            <div class="post_desc">
                                <div class="post_categories">
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
                                <div class="post_title">
                                    <h2 class="post_title__heading">
                                        <a href="<?php echo get_permalink($home_post_id); ?>" title="<?php echo $home_post_title; ?>">
                                            <?php echo $home_post_title; ?> Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                        </a>
                                    </h2>
                                </div>
                                <div class="post_meta">
                                    <div class="post_meta__inner">
                                        <div class="post_meta_author">
                                            <?php echo esc_html(get_the_author_meta('display_name')); ?>
                                        </div>
                                        <div class="post_meta_separator">|</div>
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
                    
                    $i++;
                endwhile;
            endif;
            wp_reset_query();
            ?>
        <!--</div>-->

    </div>
</section>