<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$editoriale_last_args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
                                                        
    'orderby' => 'date',
    'order' => 'DESC',
                                                                
    'posts_per_page' => 1,

    'no_found_rows' => true, /* PERFORMANCE - USARE QUANDO NON OCCORRE PAGINAZIONE */
    'ignore_sticky_posts' => true,
                                                                
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            /*
            'field' => 'term_id',
            'terms' => 122,
            */
            'field' => 'slug',
            'terms' => array('editoriale-beauty-business'),
        )
    )
);
$editoriale_last_query = new WP_Query($editoriale_last_args);								
if ($editoriale_last_query->have_posts()) :
    while ($editoriale_last_query->have_posts()) : $editoriale_last_query->the_post();
        $editoriale_last_id = $editoriale_last_query->post->ID;
        $editoriale_last_title = $editoriale_last_query->post->post_title;
        $editoriale_last_permalink = get_permalink($editoriale_last_id);
        ?>
        <div class="editoriale-wrap">
            <a href="<?php echo $editoriale_last_permalink; ?>" title="<?php echo $editoriale_last_title; ?>">
                <div class="editoriale-flex">
                    <?php 
                    /*
                    <div class="editoriale-thumb">
                        <figure class="mb-0">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Paolo-Sinopoli.jpg" class="img-fluid" alt="Paolo Sinopoli" width="127" height="122" />
                        </figure>
                    </div>
                    */
                    ?>
                    <div class="editoriale-articolo">
                        <p class="editoriale-fixed editoriale-label">Editoriale Beauty Business</p>
                        <p class="editoriale-fixed editoriale-autore">
                            <i class="bi bi-vector-pen"></i>
                            <?php echo esc_html(get_the_author_meta('display_name')); ?>
                        </p>
                        <p class="editoriale-dynamic editoriale-post">
                            <?php echo $editoriale_last_title; ?>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <?php 
    endwhile;
endif;
wp_reset_query();





