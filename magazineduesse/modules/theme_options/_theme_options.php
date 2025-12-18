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
			'name' => esc_html__( 'Social', CURRENT_DOMAIN ),
			'id'   => 'theme_options_social_section',
			'type' => 'title',
		) );
        /*
		$cmb_pincuter_theme_options->add_field( array(
			'name'       => __( 'Facebook', CURRENT_DOMAIN ),
			'id'         => 'theme_options_social_facebook',
			'type'       => 'text',
		) );
		$cmb_pincuter_theme_options->add_field( array(
			'name'       => __( 'Linkedin', CURRENT_DOMAIN ),
			'id'         => 'theme_options_social_linkedin',
			'type'       => 'text',
		) );
		$cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Email', CURRENT_DOMAIN ),
            'id'         => 'theme_options_social_email',
            'type'       => 'text',
        ) );
        */
        $cmb_pincuter_theme_options_socials_group_field = $cmb_pincuter_theme_options->add_field( array(
            'id'          => 'cmb_pincuter_theme_options_socials_group_field',
            'type'        => 'group',
            // 'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'   => __( 'Social {#}', CURRENT_DOMAIN ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => __( 'Aggiungi Social', CURRENT_DOMAIN ),
                'remove_button' => __( 'Rimuovi Social', CURRENT_DOMAIN ),
                'sortable'      => true, // beta
                // 'closed'     => true, // true to have the groups closed by default
            ),
            'fields' => array(
                array(
                    'name'       => __( 'Social name (minuscolo)', CURRENT_DOMAIN ),
                    'id'         => 'theme_options_social_name',
                    'type'       => 'text',
                ),
                array(
                    'name'       => __( 'Social Url', CURRENT_DOMAIN ),
                    'id'         => 'theme_options_social_url',
                    'type'       => 'text',
                ),
                array(
                    'name'       => __( 'Social href_attr_title', CURRENT_DOMAIN ),
                    'id'         => 'theme_options_social_href_attr_title',
                    'type'       => 'text',
                ),
            )
        ) );
		
		/***********/
		
		$cmb_pincuter_theme_options->add_field( array(
			'name' => esc_html__( 'Default', CURRENT_DOMAIN ),
			'id'   => 'theme_options_default_section',
			'type' => 'title',
		) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'   => __( 'Default Image', CURRENT_DOMAIN ),
            'id'      => 'theme_options_default_image',
            'type'    => 'file',
            'text'    => array(
                'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
            ),		
            'preview_size' => 'medium', // Image size to use when previewing in the admin.
        ) );

        /***********/
		
		$cmb_pincuter_theme_options->add_field( array(
			'name' => esc_html__( 'Footer', CURRENT_DOMAIN ),
			'id'   => 'theme_options_footer_section',
			'type' => 'title',
		) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'   => __( 'Footer Logo Image', CURRENT_DOMAIN ),
            'id'      => 'theme_options_footer_logo_image',
            'type'    => 'file',
            'text'    => array(
                'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
            ),		
            'preview_size' => 'medium', // Image size to use when previewing in the admin.
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Footer Tagline', CURRENT_DOMAIN ),
            'id'         => 'theme_options_footer_tagline',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Footer Copyright', CURRENT_DOMAIN ),
            'id'         => 'theme_options_footer_copyright',
            'type'       => 'textarea',
        ) );

        /***********/
		
		$cmb_pincuter_theme_options->add_field( array(
			'name' => esc_html__( 'Azienda', CURRENT_DOMAIN ),
			'id'   => 'theme_options_azienda_section',
			'type' => 'title',
		) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'          => __( 'Mappa Iframe', CURRENT_DOMAIN ),
            'id'            => 'theme_options_azienda_map_iframe',
            'type'          => 'textarea_code',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Dove Siamo', CURRENT_DOMAIN ),
            'id'         => 'theme_options_azienda_dove_siamo',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Telefono', CURRENT_DOMAIN ),
            'id'         => 'theme_options_azienda_telefono',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options_azienda_mails_group_field = $cmb_pincuter_theme_options->add_field( array(
            'id'          => 'cmb_pincuter_theme_options_azienda_mails_group_field',
            'type'        => 'group',
            // 'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'   => __( 'Mail {#}', CURRENT_DOMAIN ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => __( 'Aggiungi Mail', CURRENT_DOMAIN ),
                'remove_button' => __( 'Rimuovi Mail', CURRENT_DOMAIN ),
                'sortable'      => true, // beta
                // 'closed'     => true, // true to have the groups closed by default
            ),
        ) );
        $cmb_pincuter_theme_options->add_group_field( 'cmb_pincuter_theme_options_azienda_mails_group_field', array(
            'name'       => __( 'mail_class', CURRENT_DOMAIN ),
            'id'         => 'theme_options_azienda_mails_group_class',
            'type'       => 'text',
        ) );
        $cmb_pincuter_theme_options->add_group_field( 'cmb_pincuter_theme_options_azienda_mails_group_field', array(
            'name'       => __( 'Mail Label', CURRENT_DOMAIN ),
            'id'         => 'theme_options_azienda_mails_group_label',
            'type'       => 'textarea',
        ) );

        /***********/
		/*
		$cmb_pincuter_theme_options->add_field( array(
			'name' => esc_html__( 'Apps', CURRENT_DOMAIN ),
			'id'   => 'theme_options_apps_section',
			'type' => 'title',
		) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Apps Titolo Sezione', CURRENT_DOMAIN ),
            'id'         => 'theme_options_apps_titolo_sezione',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options_apps_group_field = $cmb_pincuter_theme_options->add_field( array(
            'id'          => 'cmb_pincuter_theme_options_apps_group_field',
            'type'        => 'group',
            // 'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'   => __( 'App {#}', CURRENT_DOMAIN ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => __( 'Aggiungi App', CURRENT_DOMAIN ),
                'remove_button' => __( 'Rimuovi App', CURRENT_DOMAIN ),
                'sortable'      => true, // beta
                // 'closed'     => true, // true to have the groups closed by default
            ),
        ) );
        $cmb_pincuter_theme_options->add_group_field( 'cmb_pincuter_theme_options_apps_group_field', array(
            'name'    => esc_html__( 'Abilita/Disabilita App', CURRENT_DOMAIN ),
            'id'      => 'theme_options_app_enable',
            'type'    => 'radio_image',
            'options' => array(
                'abilita' => esc_html__( 'abilita', CURRENT_DOMAIN ),
                'disabilita' => esc_html__( 'disabilita', CURRENT_DOMAIN ),
            ),
            'default' => 'abilita',
        ) );
        $cmb_pincuter_theme_options->add_group_field( 'cmb_pincuter_theme_options_apps_group_field', array(
            'name'       => __( 'App Title', CURRENT_DOMAIN ),
            'id'         => 'theme_options_app_title',
            'type'       => 'text',
        ) );
        $cmb_pincuter_theme_options->add_group_field( 'cmb_pincuter_theme_options_apps_group_field', array(
            'name'       => __( 'App Url', CURRENT_DOMAIN ),
            'id'         => 'theme_options_app_url',
            'type'       => 'text',
        ) );
        $cmb_pincuter_theme_options->add_group_field( 'cmb_pincuter_theme_options_apps_group_field', array(
            'name'   => __( 'App Immagine', CURRENT_DOMAIN ),
            'id'      => 'theme_options_app_image',
            'type'    => 'file',
            'text'    => array(
                'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
            ),		
            'preview_size' => 'medium', // Image size to use when previewing in the admin.
        ) );
        */
        /***********/
		/*
		$cmb_pincuter_theme_options->add_field( array(
			'name' => esc_html__( 'Abbonamento', CURRENT_DOMAIN ),
			'id'   => 'theme_options_abbonamento_section',
			'type' => 'title',
		) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Abbonamento URL', CURRENT_DOMAIN ),
            'id'         => 'theme_options_abbonamento_url',
            'type'       => 'text',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Abbonamento LABEL', CURRENT_DOMAIN ),
            'id'         => 'theme_options_abbonamento_label',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'   => __( 'Abbonamento Image', CURRENT_DOMAIN ),
            'id'      => 'theme_options_abbonamento_image',
            'type'    => 'file',
            'text'    => array(
                'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
            ),		
            'preview_size' => 'medium', // Image size to use when previewing in the admin.
        ) );
        */
        /***********/
		
		$cmb_pincuter_theme_options->add_field( array(
			'name' => esc_html__( 'Newsletter', CURRENT_DOMAIN ),
			'id'   => 'theme_options_newsletter_section',
			'type' => 'title',
		) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Newsletter URL', CURRENT_DOMAIN ),
            'id'         => 'theme_options_newsletter_url',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'   => __( 'Newsletter Image', CURRENT_DOMAIN ),
            'id'      => 'theme_options_newsletter_image',
            'type'    => 'file',
            'text'    => array(
                'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
            ),		
            'preview_size' => 'medium', // Image size to use when previewing in the admin.
        ) );

        /***********/
		
		$cmb_pincuter_theme_options->add_field( array(
			'name' => esc_html__( 'Rivista', CURRENT_DOMAIN ),
			'id'   => 'theme_options_rivista_section',
			'type' => 'title',
		) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Rivista Anno di Nascita LABEL', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_anno_nascita_label',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Rivista Anno di Nascita VALUE', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_anno_nascita',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Rivista Direttore LABEL', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_direttore_label',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Rivista Direttore', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_direttore',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Rivista Redazione LABEL', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_redazione_label',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Rivista Redazione', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_redazione',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options_rivista_group_field = $cmb_pincuter_theme_options->add_field( array(
            'id'          => 'cmb_pincuter_theme_options_rivista_group_field',
            'type'        => 'group',
            // 'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'   => __( 'Rivista Info {#}', CURRENT_DOMAIN ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => __( 'Aggiungi Info', CURRENT_DOMAIN ),
                'remove_button' => __( 'Rimuovi Info', CURRENT_DOMAIN ),
                'sortable'      => true, // beta
                // 'closed'     => true, // true to have the groups closed by default
            ),
        ) );
        $cmb_pincuter_theme_options->add_group_field( 'cmb_pincuter_theme_options_rivista_group_field', array(
            'name'       => __( 'Info Title', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_group_info_title',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_group_field( 'cmb_pincuter_theme_options_rivista_group_field', array(
            'name'       => __( 'Info Value', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_group_info_value',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_group_field( 'cmb_pincuter_theme_options_rivista_group_field', array(
            'name'       => __( 'Info Additional', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_group_info_additional',
            'type'       => 'textarea_small',
        ) );

        /***********/
        
        $cmb_pincuter_theme_options->add_field( array(
			'name' => esc_html__( 'Rivista Bellezza', CURRENT_DOMAIN ),
			'id'   => 'theme_options_rivista_ic_section',
			'type' => 'title',
		) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Rivista Anno di Nascita LABEL', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_ic_anno_nascita_label',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Rivista Anno di Nascita VALUE', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_ic_anno_nascita',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Rivista Direttore LABEL', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_ic_direttore_label',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Rivista Direttore', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_ic_direttore',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Rivista Redazione LABEL', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_ic_redazione_label',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_field( array(
            'name'       => __( 'Rivista Redazione', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_ic_redazione',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options_rivista_ic_group_field = $cmb_pincuter_theme_options->add_field( array(
            'id'          => 'cmb_pincuter_theme_options_rivista_ic_group_field',
            'type'        => 'group',
            // 'repeatable'  => false, // use false if you want non-repeatable group
            'options'     => array(
                'group_title'   => __( 'Rivista Info {#}', CURRENT_DOMAIN ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => __( 'Aggiungi Info', CURRENT_DOMAIN ),
                'remove_button' => __( 'Rimuovi Info', CURRENT_DOMAIN ),
                'sortable'      => true, // beta
                // 'closed'     => true, // true to have the groups closed by default
            ),
        ) );
        $cmb_pincuter_theme_options->add_group_field( 'cmb_pincuter_theme_options_rivista_ic_group_field', array(
            'name'       => __( 'Info Title', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_ic_group_info_title',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_group_field( 'cmb_pincuter_theme_options_rivista_ic_group_field', array(
            'name'       => __( 'Info Value', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_ic_group_info_value',
            'type'       => 'textarea_small',
        ) );
        $cmb_pincuter_theme_options->add_group_field( 'cmb_pincuter_theme_options_rivista_ic_group_field', array(
            'name'       => __( 'Info Additional', CURRENT_DOMAIN ),
            'id'         => 'theme_options_rivista_ic_group_info_additional',
            'type'       => 'textarea_small',
        ) );
        

        /***********/
        /***********/
        
        				
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