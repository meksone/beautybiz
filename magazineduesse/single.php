<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


get_header();


if (have_posts()) :
    while (have_posts()) : the_post();


        $single_post_classes = get_post_class( '', get_the_id() );
        ?>


        <section id="breadcrumbs">
            <?php echo _pincuter_breadcrumbs(); ?>
        </section>


        <?php 
        /* EVOLUTION ADS - MASTHEAD */
        /*
        //include(get_stylesheet_directory() . '/adv/adv_masthead.php');
        include(get_stylesheet_directory() . '/adv_adplay/adv_masthead.php');
        echo '<div class="clear"></div>';
        echo '<div class="spacer space-2"></div>';
        */
        /* end. EVOLUTION ADS - MASTHEAD */
        ?>


        <section id="content_main">
            <div class="row justify-content-between">
                
                <div class="col-md-12 col_title">
                    
                    <div class="article <?php echo esc_attr( implode( ' ', $single_post_classes ) ); ?>">
                        <?php 
                        include(get_stylesheet_directory() . '/templates/post/post_title_1_columns.php');
                        ?>
                    </div>
                    
                    <?php 
                    /*include(get_stylesheet_directory() . '/templates/post/post_developer_box.php');*/
                    ?>
                    
                    
                </div>
                
                <div class="clear"></div>
                <div class="spacer space-2"></div>
                    
                <div class="col-md-8 col_content">
                    <div class="post_holder">
                        
                        <article <?php post_class(); ?>>
                            
                            <?php 
                            /*
                            if( in_category('rivista') ){
                                $magazineduesse_rivista_post_pdf = get_post_meta(get_the_id(), 'magazineduesse_rivista_post_pdf', true);
                                if( !empty($magazineduesse_rivista_post_pdf) ){
                                    echo '<div class="rivista-pdf mb-1">';
                                        echo do_shortcode('[dflip source="'.$magazineduesse_rivista_post_pdf.'" enableDownload="false"][/dflip]');
                                    echo '</div>';

                                    echo '<div class="rivista-pdf-permalink mb-1">';
                                        echo '<a href="'.$magazineduesse_rivista_post_pdf.'" target="_blank" title="">';
                                            echo 'scarica la rivista';
                                        echo '</a>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<div class="post_thumb">';
                                    include(get_stylesheet_directory() . '/templates/post/thumb/single_post_thumb.php'); 
                                echo '</div>';
                            }
                            */

                            if( has_term('articolo-rivista', 'evidenza_post') ){
                                $magazineduesse_rivista_post_pdf = get_post_meta(get_the_id(), 'magazineduesse_rivista_post_pdf', true);
                                $magazineduesse_rivista_post_pdf_download = get_post_meta(get_the_id(), 'magazineduesse_rivista_post_pdf_download', true);

                                if( !empty($magazineduesse_rivista_post_pdf) ){
                                    echo '<div id="rivista-pdf" class="sfogliatore-pdf mb-1">';
                                        echo do_shortcode('[dflip source="'.$magazineduesse_rivista_post_pdf.'" enableDownload="false"][/dflip]');
                                    echo '</div>';

                                    if( !empty($magazineduesse_rivista_post_pdf_download) ){
                                        $mg_rivista_download = $magazineduesse_rivista_post_pdf_download;
                                    } else {
                                        $mg_rivista_download = $magazineduesse_rivista_post_pdf;
                                    }

                                    echo '<div id="rivista-pdf-permalink" class="sfogliatore-pdf-permalink rivista-pdf-permalink mb-1">';
                                        /*echo '<a href="'.$magazineduesse_rivista_post_pdf.'" target="_blank" title="">';*/
                                        echo '<a href="'.$mg_rivista_download.'" target="_blank" title="'.get_the_title().'" download="'.get_the_title().'">';
                                            echo 'scarica la rivista';
                                        echo '</a>';
                                    echo '</div>';
                                }
                            } else {
                                if( !has_term('articolo-speciali', 'evidenza_post') ){
                                    echo '<div class="post_thumb">';
                                        include(get_stylesheet_directory() . '/templates/post/thumb/single_post_thumb.php'); 
                                    echo '</div>';
                                }
                            }
                            ?>


                            <div class="post_content">


                                <div id='gmp-intext_vip' class='gmp'></div>

                                
                                <?php 
                                
                                the_content();


                                if( !has_term('articolo-rivista', 'evidenza_post') ){
                                    $magazineduesse_rivista_post_pdf = get_post_meta(get_the_id(), 'magazineduesse_rivista_post_pdf', true);
                                    $magazineduesse_rivista_post_pdf_download = get_post_meta(get_the_id(), 'magazineduesse_rivista_post_pdf_download', true);
                                    $magazineduesse_rivista_post_pdf_button_label = get_post_meta(get_the_id(), 'magazineduesse_rivista_post_pdf_button_label', true);

                                    if( !empty($magazineduesse_rivista_post_pdf) ){
                                        echo '<div id="rivista-pdf" class="sfogliatore-pdf mb-1 mt-2">';
                                            echo do_shortcode('[dflip source="'.$magazineduesse_rivista_post_pdf.'" enableDownload="false"][/dflip]');
                                        echo '</div>';

                                        if( !empty($magazineduesse_rivista_post_pdf_download) ){
                                            $mg_rivista_download = $magazineduesse_rivista_post_pdf_download;
                                        } else {
                                            $mg_rivista_download = $magazineduesse_rivista_post_pdf;
                                        }

                                        echo '<div id="rivista-pdf-permalink" class="sfogliatore-pdf-permalink rivista-pdf-permalink mb-1">';
                                            /*echo '<a href="'.$magazineduesse_rivista_post_pdf.'" target="_blank" title="">';*/
                                            echo '<a href="'.$mg_rivista_download.'" target="_blank" title="'.get_the_title().'" download="'.get_the_title().'">';
                                                echo $magazineduesse_rivista_post_pdf_button_label;
                                            echo '</a>';
                                        echo '</div>';
                                    }
                                }


                                
                                if( has_term('articolo-speciali', 'evidenza_post') ){
                                    $magazineduesse_rivista_post_pdf = get_post_meta(get_the_id(), 'magazineduesse_rivista_post_pdf', true);
                                    $magazineduesse_rivista_post_pdf_download = get_post_meta(get_the_id(), 'magazineduesse_rivista_post_pdf_download', true);
                                    
                                    if( !empty($magazineduesse_rivista_post_pdf) ){
                                        echo '<div class="clear"></div>';
                                        echo '<div class="spacer space-1"></div>';

                                        echo '<div id="speciali-pdf" class="sfogliatore-pdf speciali-pdf mb-1">';
                                            echo do_shortcode('[dflip source="'.$magazineduesse_rivista_post_pdf.'" enableDownload="false"][/dflip]');
                                        echo '</div>';

                                        if( !empty($magazineduesse_rivista_post_pdf_download) ){
                                            $mg_rivista_download = $magazineduesse_rivista_post_pdf_download;
                                        } else {
                                            $mg_rivista_download = $magazineduesse_rivista_post_pdf;
                                        }

                                        echo '<div id="speciali-pdf-permalink" class="sfogliatore-pdf-permalink sfogliatore-pdf-permalink mb-1">';
                                            /*echo '<a href="'.$magazineduesse_rivista_post_pdf.'" target="_blank" title="">';*/
                                            echo '<a href="'.$mg_rivista_download.'" target="_blank" title="'.get_the_title().'" download="'.get_the_title().'">';
                                                echo 'scarica il pdf di "'.get_the_title().'"';
                                            echo '</a>';
                                        echo '</div>';
                                    }
                                }


                                if( has_tag() ){
                                    echo '<div class="clear"></div>';
                                    echo '<div class="spacer space-1"></div>';

                                    echo '<div class="mvp-post-tags">';
									    echo '<span class="mvp-post-tags-header">';
										    echo 'Tags: ';
									    echo '</span>';
									    echo '<span itemprop="keywords">'.get_the_tag_list('',', ','').'</span>';
								    echo '</div>';
                                }
                                ?>
                                
                                
                                <div class="clear"></div>
                                <div class="spacer space-1"></div>
                                <b class="proprietary">© RIPRODUZIONE RISERVATA</b>
                                <br>
                                <b class="proprietary">In caso di citazione si prega di citare e linkare <a href="https://beautybiz.it/">beautybiz.it</a></b>
                                <div class="clear"></div>	
                            </div>
                            
                        </article>
                        
                    </div>


                    <?php 
                    /* RELATEDS */
                    include(get_stylesheet_directory() . '/templates/post/post_relateds.php');
                    ?>

                    
                </div>
                <div class="col-md-4 col_sidebar">
                    <?php include(get_stylesheet_directory() . '/templates/sidebar/sidebar.php'); ?>
                </div>
            </div>
        </section>


        <?php 
    endwhile;
endif;
        
get_footer();
