<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


//CUSTOM POST TYPE MAPS
// Inizializzazione della funzione
add_action( 'init', '_hotelpompei_camere_taxonomies', 1);
function _hotelpompei_camere_taxonomies() {
    
	register_taxonomy(
		'categoria_camere',
		'camere',
		array(
			'hierarchical'  => true,
			'label'         => 'Categorie Camere',
			'singular_name' => 'Categoria',
			'has_archive' =>  true,
			'rewrite'       => true,
			/*
			'rewrite' => array(
				'slug' => '/', 
				'with_front' => false,
				//'hierarchical' => true,
			),
			*/
			
			'query_var'     => true,
			'show_admin_column' => true
		)
	);
	
	//flush_rewrite_rules();
	
}