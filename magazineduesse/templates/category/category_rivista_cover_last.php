<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


<div id="rivista_cover_last" class="rivista_cover">
	<?php 
	$rivista_last_args = array(
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
				'field' => 'term_id',
				'terms' => $term_id,
				//'terms' => 121,
				//'field' => 'slug',
				//'terms' => array('box-office')
			)
		)
	);
	$rivista_last_query = new WP_Query($rivista_last_args);								
	if ($rivista_last_query->have_posts()) :
		while ($rivista_last_query->have_posts()) : $rivista_last_query->the_post();
			$rivista_last_id = $rivista_last_query->post->ID;
			$rivista_last_title = $rivista_last_query->post->post_title;
            
			$magazineduesse_rivista_post_pdf = get_post_meta($rivista_last_id, 'magazineduesse_rivista_post_pdf', true);
			$magazineduesse_rivista_post_pdf_download = get_post_meta($rivista_last_id, 'magazineduesse_rivista_post_pdf_download', true);

			$magazineduesse_category_abbonamento_url = get_term_meta($term_id, 'magazineduesse_category_abbonamento_url', true);
			$magazineduesse_category_abbonamento_blocco_enable = get_term_meta($term_id, 'magazineduesse_category_abbonamento_blocco_enable', true);
			$magazineduesse_category_abbonamento_label = get_term_meta($term_id, 'magazineduesse_category_abbonamento_label', true);

			if( !empty($magazineduesse_rivista_post_pdf) || ($magazineduesse_category_abbonamento_blocco_enable == 'abilita' && !empty($magazineduesse_category_abbonamento_url)) ){
				echo '<div class="rivista-pdf rivista_pdf_ita mb-1">';
					echo do_shortcode('[dflip source="'.$magazineduesse_rivista_post_pdf.'" ][/dflip]');
				echo '</div>';
				
				if( !empty($magazineduesse_rivista_post_pdf_download) ){
					$mg_rivista_download = $magazineduesse_rivista_post_pdf_download;
				} else {
					$mg_rivista_download = $magazineduesse_rivista_post_pdf;
				}

				echo '<div class="rivista-pdf-permalink">';
					if( !empty($magazineduesse_rivista_post_pdf_download) || !empty($magazineduesse_rivista_post_pdf)){
						echo '<a href="'.$mg_rivista_download.'" target="_blank" title="'.$rivista_last_title.'" download="'.$rivista_last_title.'">';
							echo 'scarica l\'ultimo numero della rivista';
						echo '</a>';
					}

					/*
					echo '<a href="'._pincuter_theme_option('theme_options_abbonamento_url').'" target="_blank" title="'._pincuter_theme_option('theme_options_abbonamento_label').'">';
						echo _pincuter_theme_option('theme_options_abbonamento_label');
					echo '</a>';
					*/

					if( $magazineduesse_category_abbonamento_blocco_enable == 'abilita' && !empty($magazineduesse_category_abbonamento_url) ){
						echo '<a href="'.$magazineduesse_category_abbonamento_url.'" target="_blank" title="'.$magazineduesse_category_abbonamento_label.'">';
							echo $magazineduesse_category_abbonamento_label;
						echo '</a>';
					}
				echo '</div>';
			}
		endwhile;
	endif;
	wp_reset_query();
	?>
</div>