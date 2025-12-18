<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/**
 * CMB2 Theme Options
 * @version 0.1.0
 */
class PNCTR_theme_options_Admin {

	/**
 	 * Option key, and option page slug
 	 * @var string
 	 */
	protected $key = '_pincuter_theme_options';

	/**
 	 * Options page metabox id
 	 * @var string
 	 */
	protected $metabox_id = '_pincuter_theme_options_metabox';

	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = 'Theme Options';

	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';

	/**
	 * Holds an instance of the object
	 *
	 * @var Myprefix_Admin
	 */
	protected static $instance = null;

	/**
	 * Returns the running object
	 *
	 * @return Myprefix_Admin
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
			self::$instance->hooks();
		}

		return self::$instance;
	}

	/**
	 * Constructor
	 * @since 0.1.0
	 */
	protected function __construct() {
		// Set our title
		$this->title = __( 'Theme Options', CURRENT_DOMAIN );
	}

	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'cmb2_admin_init', array( $this, 'add_options_page_metabox' ) );
	}


	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}

	/**
	 * Add menu options page
	 * @since 0.1.0
	 */
	public function add_options_page() {
		$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
		/////$this->options_page = add_menu_page( $this->title, $this->title, 'edit_pages', $this->key, array( $this, 'admin_page_display' ) );
		
		/*##$this->options_page = add_submenu_page( '_pincuter_theme_manage_map', $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );*/
		/*****$this->options_page = add_submenu_page( '_pincuter_options_manage_cpt', $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );*/

		// Include CMB CSS in the head to avoid FOUC
		add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
	}

	/**
	 * Admin page markup. Mostly handled by CMB2
	 * @since  0.1.0
	 */
	public function admin_page_display() {
		?>
		<div class="wrap cmb2-options-page <?php echo $this->key; ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
		</div>
		<?php
	}

	/**
	 * Add the options metabox to the array of metaboxes
	 * @since  0.1.0
	 */
	function add_options_page_metabox() {

		// hook in our save notices
		add_action( "cmb2_save_options-page_fields_{$this->metabox_id}", array( $this, 'settings_notices' ), 10, 2 );
		
		$cmb_pincuter_theme_options = new_cmb2_box( array(
			'id'       => $this->metabox_id,
			'title'    => esc_html__( 'Theme Options', CURRENT_DOMAIN ),
			'hookup'     => false,
			'cmb_styles' => false,
			'show_on'  => array(
				// Important, don't remove.
				'key'   => 'options-page',
				'value' => array( $this->key, )
			),
		) );

		
		$cmb_pincuter_theme_options->add_field( array(
			'name' => esc_html__( 'Header', CURRENT_DOMAIN ),
			'id'   => 'theme_options_header_section',
			'type' => 'title',
		) );
	
		$cmb_pincuter_theme_options->add_field( array(
			'name'   => __( 'Header Logo Image', CURRENT_DOMAIN ),
			'id'      => 'theme_options_header_logo_image',
			'type'    => 'file',
			'text'    => array(
				'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
			),		
			'preview_size' => 'medium', // Image size to use when previewing in the admin.
		) );
		
		
		/***********/
		
		
		$cmb_pincuter_theme_options->add_field( array(
			'name' => esc_html__( 'Pacchetti Section', CURRENT_DOMAIN ),
			'id'   => 'theme_options_pacchetti_section',
			'type' => 'title',
		) );
		
		$cmb_pincuter_theme_options->add_field( array(
			'name'   => __( 'Pacchetti Head Image (Dimensione Ideale 1920x512)', CURRENT_DOMAIN ),
			'id'      => 'theme_options_pacchetti_head_image',
			'type'    => 'file',
			'text'    => array(
				'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
			),		
			'preview_size' => 'medium', // Image size to use when previewing in the admin.
		) );
		
		$cmb_pincuter_theme_options->add_field( array(
			'name'   => __( 'Pacchetti Head Image Mobile (Dimensione Ideale 1024x500)', CURRENT_DOMAIN ),
			'id'      => 'theme_options_pacchetti_head_image_mobile',
			'type'    => 'file',
			'text'    => array(
				'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
			),		
			'preview_size' => 'medium', // Image size to use when previewing in the admin.
		) );
		
		
		/***********/
		
		
		$cmb_pincuter_theme_options->add_field( array(
			'name' => esc_html__( 'Itinerari Section', CURRENT_DOMAIN ),
			'id'   => 'theme_options_itinerari_section',
			'type' => 'title',
		) );
		
		$cmb_pincuter_theme_options->add_field( array(
			'name'   => __( 'Itinerari Head Image (Dimensione Ideale 1920x512)', CURRENT_DOMAIN ),
			'id'      => 'theme_options_itinerari_head_image',
			'type'    => 'file',
			'text'    => array(
				'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
			),		
			'preview_size' => 'medium', // Image size to use when previewing in the admin.
		) );
		
		$cmb_pincuter_theme_options->add_field( array(
			'name'   => __( 'Itinerari Head Image Mobile (Dimensione Ideale 1024x500)', CURRENT_DOMAIN ),
			'id'      => 'theme_options_itinerari_head_image_mobile',
			'type'    => 'file',
			'text'    => array(
				'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
			),		
			'preview_size' => 'medium', // Image size to use when previewing in the admin.
		) );
		
		
		/***********/
		
		
		$cmb_pincuter_theme_options->add_field( array(
			'name' => esc_html__( 'Camere Section', CURRENT_DOMAIN ),
			'id'   => 'theme_options_camere_section',
			'type' => 'title',
		) );
		
		$cmb_pincuter_theme_options->add_field( array(
			'name'   => __( 'Camere Head Image (Dimensione Ideale 1920x512)', CURRENT_DOMAIN ),
			'id'      => 'theme_options_camere_head_image',
			'type'    => 'file',
			'text'    => array(
				'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
			),		
			'preview_size' => 'medium', // Image size to use when previewing in the admin.
		) );
		
		$cmb_pincuter_theme_options->add_field( array(
			'name'   => __( 'Camere Head Image Mobile (Dimensione Ideale 1024x500)', CURRENT_DOMAIN ),
			'id'      => 'theme_options_camere_head_image_mobile',
			'type'    => 'file',
			'text'    => array(
				'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
			),		
			'preview_size' => 'medium', // Image size to use when previewing in the admin.
		) );
		
		$cmb_pincuter_theme_options->add_field( array(
			'name'       => esc_html__( 'Titoletto ITA', CURRENT_DOMAIN ),
			'id'         => 'theme_options_camere_titoletto',
			'type'       => 'textarea_small',
		) );
		
		$cmb_pincuter_theme_options->add_field( array(
			'name'       => esc_html__( 'Titoletto ENG', CURRENT_DOMAIN ),
			'id'         => 'theme_options_camere_titoletto_eng',
			'type'       => 'textarea_small',
		) );
		
		$cmb_pincuter_theme_options->add_field( array(
			'name'          => __( 'Descrizione ITA', CURRENT_DOMAIN ),
			'id'            => 'theme_options_camere_descrizione',
			//'type'          => 'textarea',
			'type'    => 'wysiwyg',
			'options' => array(),
		) );
		
		$cmb_pincuter_theme_options->add_field( array(
			'name'          => __( 'Descrizione ENG', CURRENT_DOMAIN ),
			'id'            => 'theme_options_camere_descrizione_eng',
			//'type'          => 'textarea',
			'type'    => 'wysiwyg',
			'options' => array(),
		) );
		
				
		/***********/
		
		
		$cmb_pincuter_theme_options->add_field( array(
			'name' => esc_html__( 'Social', CURRENT_DOMAIN ),
			'id'   => 'theme_options_social_section',
			'type' => 'title',
		) );
				
		$cmb_pincuter_theme_options->add_field( array(
			'name'       => __( 'Facebook', CURRENT_DOMAIN ),
			'id'         => 'theme_options_social_facebook',
			'type'       => 'text',
		) );
		
		$cmb_pincuter_theme_options->add_field( array(
			'name'       => __( 'Instagram', CURRENT_DOMAIN ),
			'id'         => 'theme_options_social_instagram',
			'type'       => 'text',
		) );
		
		$cmb_pincuter_theme_options->add_field( array(
			'name'       => __( 'Youtube', CURRENT_DOMAIN ),
			'id'         => 'theme_options_social_youtube',
			'type'       => 'text',
		) );
		
		

	}

	/**
	 * Register settings notices for display
	 *
	 * @since  0.1.0
	 * @param  int   $object_id Option key
	 * @param  array $updated   Array of updated fields
	 * @return void
	 */
	public function settings_notices( $object_id, $updated ) {
		if ( $object_id !== $this->key || empty( $updated ) ) {
			return;
		}

		add_settings_error( $this->key . '-notices', '', __( 'Settings updated.', CURRENT_DOMAIN ), 'updated' );
		settings_errors( $this->key . '-notices' );
	}

	/**
	 * Public getter method for retrieving protected/private variables
	 * @since  0.1.0
	 * @param  string  $field Field to retrieve
	 * @return mixed          Field value or exception is thrown
	 */
	public function __get( $field ) {
		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}

		throw new Exception( 'Invalid property: ' . $field );
	}

}

/**
 * Helper function to get/return the Myprefix_Admin object
 * @since  0.1.0
 * @return Myprefix_Admin object
 */
function _pincuter_get_theme_options_admin() {
	return PNCTR_theme_options_Admin::get_instance();
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function _pincuter_theme_option( $key = '', $default = false ) {
	if ( function_exists( 'cmb2_get_option' ) ) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option( _pincuter_get_theme_options_admin()->key, $key, $default );
	}

	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option( _pincuter_get_theme_options_admin()->key, $default );

	$val = $default;

	if ( 'all' == $key ) {
		$val = $opts;
	} elseif ( array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
		$val = $opts[ $key ];
	}

	return $val;
}



// Get it started
_pincuter_get_theme_options_admin();


/* === EXAMPLE
====================
echo _pincuter_theme_option('theme_options_header_logo_image');
*/