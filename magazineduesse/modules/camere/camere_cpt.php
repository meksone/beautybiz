<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}



//CUSTOM POST TYPE MAPS
// Inizializzazione della funzione
add_action( 'init', '_hotelpompei_camere_cpt', 1);
function _hotelpompei_camere_cpt() {
    // creazione (registrazione) del custom post type

	$post_type_name = 'camere';
	$post_type_slug = 'camere';
	$plural = 'Camere';
	$singular = 'Camera';

	$labels = array(
				'name' => $plural, /* Nome, al plurale, dell'etichetta del post type. */
				'singular_name' => $singular, /* Nome, al singolare, dell'etichetta del post type. */
				'all_items' => 'Tutti '.$plural, /* Testo mostrato nei menu che indica tutti i contenuti del post type */
				'add_new' => 'Aggiungi nuovo', /* Il testo per il pulsante Aggiungi. */
				'add_new_item' => 'Aggiungi '.$singular, /* Testo per il pulsante Aggiungi nuovo post type */
				'edit_item' => 'Modifica '.$singular, /*  Testo per modifica */
				'new_item' => 'Nuovo '.$singular, /* Testo per nuovo oggetto */
				'view_item' => 'Visualizza '.$singular, /* Testo per visualizzare */
				'search_items' => 'Cerca '.$plural, /* Testo per la ricerca*/
				'not_found' =>  'Nessuna '.$plural.' trovata', /* Testo per risultato non trovato */
				'not_found_in_trash' => 'Nessuna '.$plural.' trovata nel cestino', /* Testo per risultato non trovato nel cestino */
				'parent_item_colon' => ''
			);
	$arges = array(
				'labels' => $labels,
				'description' => 'Raccolta '.$plural.' del portale', /* Una breve descrizione del post type */
				'public' => true, /* Definisce se il post type sia visibile sia da front-end che da back-end */
				'publicly_queryable' => true, /* Definisce se possono essere fatte query da front-end */
				'exclude_from_search' => false, /* Definisce se questo post type è escluso dai risultati di ricerca */
				'show_ui' => true, /* Definisce se deve essere visualizzata l'interfaccia di default nel pannello di amministrazione */
				'query_var' => true,
				#'menu_position' => 9, /* Definisce l'ordine in cui comparire nel menù di amministrazione a sinistra */
				//'menu_icon' => get_stylesheet_directory_uri() . '/img/custom-post-icon.png', /* Scegli l'icona da usare nel menù per il posty type */
				'menu_icon'   => 'dashicons-calendar-alt',
				/////'rewrite'   => array( 'slug' => _x('%categoria_camere%', 'slug', 'hotelpompei'), 'with_front' => false ), /* Puoi specificare uno slug per gli URL */
				'rewrite'   => array( 'slug' => _x('camere-hotel-del-sole-pompei', 'slug', 'hotelpompei'), 'with_front' => false ), /* Puoi specificare uno slug per gli URL */
				///'rewrite'   => array( 'slug' => 'realizzazioni/%category_infissi%', 'with_front' => false ), /* Puoi specificare uno slug per gli URL */
				###'has_archive' => true, /* Definisci se abilitare la generazione di un archivio (equivalente di archive-libri.php) */
				///'rewrite'   => false,
				'has_archive' => true, /* Definisci se abilitare la generazione di un archivio (equivalente di archive-libri.php) */
				///'has_archive' => 'realizzazioni',
				'capability_type' => 'post', /* Definisci se si comporterà come un post o come una pagina */
				'hierarchical' => false, /* Definisci se potranno essere definiti elementi padri di altri */
				/* la riga successiva definisce quali elementi verranno visualizzati nella schermata di creazione del post */
				#'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
				'supports' => array( 'title', 'editor' )
			);

	register_post_type( $post_type_name, $arges );

	//flush_rewrite_rules();

}