<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


                        <div class="post_item mb-3">
                            <article <?php post_class(); ?>>
                                <div class="row">
                                    <div class="col-md-5 col_image">
                                        <div class="post_thumb" data-file-thumb-src="_category_thumb_news">
                                            <?php 
                                            include(get_stylesheet_directory() . '/templates/category/category_thumb/_category_thumb.php');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col_text">
                                        <div class="post_desc">
                                            <div class="post_title">
                                                <h3 class="post_title__heading">
                                                    <a href="<?php echo get_permalink($category_post_id); ?>" title="<?php echo $category_post_title; ?>">
                                                        <?php echo $category_post_title; ?>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="post_meta mb-1">
                                                <div class="post_meta__inner">
                                                    <?php 
                                                    /*
                                                    <div class="post_meta_author">
                                                        <?php echo esc_html(get_the_author_meta('display_name')); ?>
                                                    </div>
                                                    <div class="post_meta_separator">|</div>
                                                    */
                                                    ?>
                                                    <div class="post_meta_date">
                                                        <time datetime="<?php echo esc_html(get_the_time('Y-m-d\TH:i:s', $category_post_id)); ?>"><?php echo esc_html(get_the_date()); ?></time>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post_excerpt">
                                                <p>
                                                    <?php 
                                                    /*
                                                    if (has_excerpt()) {
                                                        echo get_the_excerpt();
                                                    } else {
                                                        $echocontent = preg_replace( '/\[[^\]]+\]/', '', $latest_content );
                                                        $echocontent = apply_filters( '_pincuter_standard_post_content_list', wp_trim_words( $echocontent, 11 ) );
                                                        echo esc_html(strip_shortcodes($echocontent));
                                                    }
                                                    */

                                                    $jnews_cmb_post_subtitle = get_post_meta($latest_id, 'post_subtitle', true);
                                                    $magazineduesse_riassunto_post_breve_contenuto = get_post_meta($latest_id, 'magazineduesse_riassunto_post_breve_contenuto', true);
                                                    if( !empty($magazineduesse_riassunto_post_breve_contenuto) ){
                                                        //$post_excerpt_output = $magazineduesse_riassunto_post_breve_contenuto;
                                                        echo $magazineduesse_riassunto_post_breve_contenuto;
                                                    } else if( !empty($jnews_cmb_post_subtitle)){
                                                        //$post_excerpt_output = wp_trim_words( $jnews_cmb_post_subtitle, 20 );
                                                        echo wp_trim_words( $jnews_cmb_post_subtitle, 20 );
                                                    }
                                                    /*
                                                    if( !empty($magazineduesse_riassunto_post_lungo_contenuto) || !empty($jnews_cmb_post_subtitle)){
                                                        echo $post_excerpt_output;
                                                    }
                                                    */
							
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>