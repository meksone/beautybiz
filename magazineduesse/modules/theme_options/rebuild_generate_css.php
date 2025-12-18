<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/**
 * CMB2 Theme Options
 * @version 0.1.0
 */
class PNCTR_rebuild_css_Admin {

	/**
 	 * Option key, and option page slug
 	 * @var string
 	 */
	protected $key = '_pincuter_rebuild_css';

	/**
 	 * Options page metabox id
 	 * @var string
 	 */
	protected $metabox_id = '_pincuter_rebuild_css_metabox';

	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = 'Rebuild CSS';

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
		$this->title = __( 'Rebuild CSS', CURRENT_DOMAIN );
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
		##$this->options_page = add_submenu_page( '_pincuter_theme_manage_map', $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
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
		
		$cmb_pincuter_rebuild_css = new_cmb2_box( array(
			'id'       => $this->metabox_id,
			'title'    => esc_html__( 'Rebuild Generate Css', CURRENT_DOMAIN ),
			'hookup'     => false,
			'cmb_styles' => false,
			'show_on'  => array(
				// Important, don't remove.
				'key'   => 'options-page',
				'value' => array( $this->key, )
			),
		) );
		
		/*
		$cmb_pincuter_rebuild_css->add_field( array(
			'name' => esc_html__( 'Header', CURRENT_DOMAIN ),
			'id'   => 'rebuild_css_header_section',
			'type' => 'title',
		) );
		*/
		
		$now = date("d-m-Y H:m:s");
		$cmb_pincuter_rebuild_css->add_field( array(
			'name'          => __( 'Now', CURRENT_DOMAIN ),
			'id'            => 'rebuild_css_now_text',
			'type'          => 'text',
			'attributes'  => array(
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			),
			'default' => $now,
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
function _pincuter_get_rebuild_css_admin() {
	return PNCTR_rebuild_css_Admin::get_instance();
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function _pincuter_rebuild_generate_css( $key = '', $default = false ) {
	if ( function_exists( 'cmb2_get_option' ) ) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option( _pincuter_get_rebuild_css_admin()->key, $key, $default );
	}

	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option( _pincuter_get_rebuild_css_admin()->key, $default );

	$val = $default;

	if ( 'all' == $key ) {
		$val = $opts;
	} elseif ( array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
		$val = $opts[ $key ];
	}

	return $val;
}


//cmb2_save_options-page_fields_{$this->metabox_id}
add_action( 'cmb2_save_options-page_fields__pincuter_rebuild_css_metabox', '_pincuter_generate_options_css', 10, 3 );
function _pincuter_generate_options_css( string $object_id, array $updated, CMB2 $cmb ){
    // code
	
		$data = $object_id;	

		$css_dir = get_stylesheet_directory() . '/assets/css/min/';
		
		ob_start(); // Capture all output (output buffering)
		
		require(get_stylesheet_directory() . '/assets/css/base/initial.css');
		require(get_stylesheet_directory() . '/assets/css/base/container.css');
		require(get_stylesheet_directory() . '/assets/css/base/mod.bootstrap.css');
		require(get_stylesheet_directory() . '/assets/css/base/grid.bootstrap.css');
		require(get_stylesheet_directory() . '/assets/css/additional/mod.bootstrap-utilities.css');
		require(get_stylesheet_directory() . '/assets/css/additional/mod.bootstrap-dropdown.css');
		require(get_stylesheet_directory() . '/assets/css/additional/mod.bootstrap-tabs.css');
		require(get_stylesheet_directory() . '/assets/css/base/spacer.css');
		require(get_stylesheet_directory() . '/assets/css/base/vertical.css');
		require(get_stylesheet_directory() . '/assets/css/base/horizontal.css');
		require(get_stylesheet_directory() . '/assets/css/lib/bootstrap-icons.min.css');
		require(get_stylesheet_directory() . '/assets/css/lib/slick_v.1.8.0.css');
		//require(get_stylesheet_directory() . '/assets/css/lib/fontawesome.css');
		//require(get_stylesheet_directory() . '/assets/css/lib/fancybox_v.3.2.10.css');
		require(get_stylesheet_directory() . '/assets/css/lib/fancybox.css');

		$css = ob_get_clean(); // Get generated CSS (output buffering)
		
		###
			$css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css ); //Remove comments
	    	$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css ); //Remove whitespaces
	    	$css = str_replace( array( ': ', ' :' ), array( ':', ':' ), $css ); //Remove space before and after colons
	    	$css = str_replace( array( ';}', '; }', ' ;}' ), '}', $css ); //Remove colons before closing curly brackets
	    	$css = str_replace( array( '{ ', ' }', ' {', '} ' ), array( '{', '}', '{', '}' ), $css ); //Remove spaces before and after curly brackets
		###
		
		//file_put_contents($css_dir . 'main.css', $css, LOCK_EX); // Save it 
		
		$file_css = get_stylesheet_directory() . '/assets/css/min/options.min.css';
		/** Write to css file **/
		global $wp_filesystem;
		if ( empty( $wp_filesystem ) ) {
			require_once( ABSPATH .'/wp-admin/includes/file.php' );
			WP_Filesystem();
		}
		
		if ( $wp_filesystem ) {
			//$wp_filesystem->put_contents( $css_dir . 'main.css', $css, 0644);
			
			$old_css = $wp_filesystem->get_contents( $file_css );
			if ( $old_css !== $css ) {
				$wp_filesystem->put_contents( $css_dir . 'options.min.css', $css, FS_CHMOD_FILE);
			}
		}


		/***********/


		//$css_dir_main = get_stylesheet_directory() . '/assets/css/min/';
		$css_dir_main = get_stylesheet_directory() . '/assets/css/';
		
		ob_start(); // Capture all output (output buffering)
		
		require(get_stylesheet_directory() . '/assets/css/root.css');
		require(get_stylesheet_directory() . '/assets/css/main.css');

		require(get_stylesheet_directory() . '/assets/css/approfondimentiv1.css');
		require(get_stylesheet_directory() . '/assets/css/approfondimentiv2.css');
		require(get_stylesheet_directory() . '/assets/css/footerbmes.css');
		require(get_stylesheet_directory() . '/assets/css/footerbp.css');
		require(get_stylesheet_directory() . '/assets/css/submenu.css');
		require(get_stylesheet_directory() . '/assets/css/sidr.css');

		require(get_stylesheet_directory() . '/assets/css/vertical.css');

		$css_main = ob_get_clean(); // Get generated CSS (output buffering)
		
		###
			$css_main = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css_main ); //Remove comments
	    	$css_main = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css_main ); //Remove whitespaces
	    	$css_main = str_replace( array( ': ', ' :' ), array( ':', ':' ), $css_main ); //Remove space before and after colons
	    	$css_main = str_replace( array( ';}', '; }', ' ;}' ), '}', $css_main ); //Remove colons before closing curly brackets
	    	$css_main = str_replace( array( '{ ', ' }', ' {', '} ' ), array( '{', '}', '{', '}' ), $css_main ); //Remove spaces before and after curly brackets
		###
		
		//file_put_contents($css_dir . 'main.css', $css, LOCK_EX); // Save it 
		
		//$file_css_main = get_stylesheet_directory() . '/assets/css/min/main.min.css';
		$file_css_main = get_stylesheet_directory() . '/assets/css/main.min.css';
		/** Write to css file **/
		global $wp_filesystem;
		if ( empty( $wp_filesystem ) ) {
			require_once( ABSPATH .'/wp-admin/includes/file.php' );
			WP_Filesystem();
		}
		
		if ( $wp_filesystem ) {
			//$wp_filesystem->put_contents( $css_dir . 'main.css', $css, 0644);
			
			$old_css_main = $wp_filesystem->get_contents( $file_css_main );
			if ( $old_css_main !== $css_main ) {
				$wp_filesystem->put_contents( $css_dir_main . 'main.min.css', $css_main, FS_CHMOD_FILE);
			}
		}


		/***********/

		$js_dir = get_stylesheet_directory() . '/assets/js/min/';

		ob_start(); // Capture all output (output buffering)
		
		require(get_stylesheet_directory() . '/assets/js/base/bootstrap.bundle.min.js');
		require(get_stylesheet_directory() . '/assets/js/base/device.js');
		require(get_stylesheet_directory() . '/assets/js/base/easing.js');
		require(get_stylesheet_directory() . '/assets/js/lib/scrollTo.min.js');
		//require(get_stylesheet_directory() . '/assets/js/lib/jquery.heightFromBG.min.js');
		require(get_stylesheet_directory() . '/assets/js/base/sidr.js');
		require(get_stylesheet_directory() . '/assets/js/lib/slick_v.1.8.0.js');
		//require(get_stylesheet_directory() . '/assets/js/lib/fancybox_v.3.2.10.js');
		require(get_stylesheet_directory() . '/assets/js/lib/fancybox.js');

		$js = ob_get_clean(); // Get generated CSS (output buffering)


		//$js = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), $js ); //Remove whitespaces


		$file_js = get_stylesheet_directory() . '/assets/css/min/options.min.js';
		/** Write to css file **/
		global $wp_filesystem;
		if ( empty( $wp_filesystem ) ) {
			require_once( ABSPATH .'/wp-admin/includes/file.php' );
			WP_Filesystem();
		}
		
		if ( $wp_filesystem ) {
			//$wp_filesystem->put_contents( $css_dir . 'main.css', $css, 0644);
			
			$old_js = $wp_filesystem->get_contents( $file_js );
			if ( $old_js !== $js ) {
				$wp_filesystem->put_contents( $js_dir . 'options.min.js', $js, FS_CHMOD_FILE);
			}
		}
}



// Get it started
_pincuter_get_rebuild_css_admin();



/* === EXAMPLE
====================
echo _pincuter_rebuild_generate_css('theme_options_header_logo_image');
*/