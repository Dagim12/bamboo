<?php
/**
 * Wizard
 *
 * @package Whizzie
 * @author Catapult Themes
 * @since 1.0.0
 */


class ThemeWhizzie {

	public static $is_valid_key = 'false';
	public static $theme_key 		= '';

	protected $version = '1.1.0';

	/** @var string Current theme name, used as namespace in actions. */
	protected $theme_name = '';
	protected $theme_title = '';

	/** @var string Wizard page slug and title. */
	protected $page_slug = '';
	protected $page_title = '';

	/** @var array Wizard steps set by user. */
	protected $config_steps = array();

	/**
	 * Relative plugin url for this plugin folder
	 * @since 1.0.0
	 * @var string
	 */
	protected $plugin_url = '';

	/**
	 * TGMPA instance storage
	 *
	 * @var object
	 */
	protected $tgmpa_instance;

	/**
	 * TGMPA Menu slug
	 *
	 * @var string
	 */
	protected $tgmpa_menu_slug = 'tgmpa-install-plugins';

	/**
	 * TGMPA Menu url
	 *
	 * @var string
	 */
	protected $tgmpa_url = 'themes.php?page=tgmpa-install-plugins';

	// Where to find the widget.wie file
	protected $widget_file_url = '';

	/**
	 * Constructor
	 *
	 * @param $config	Our config parameters
	 */
	public function __construct( $config ) {
		$this->set_vars( $config );
		$this->init();

		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}

	public static function get_the_validation_status() {
		return get_option('vw_gardening_landscaping_pro_theme_validation_status');
	}

	public static function set_the_validation_status($is_valid) {
		update_option('vw_gardening_landscaping_pro_theme_validation_status', $is_valid);
	}
	public static function get_the_suspension_status() {
		return get_option( 'vw_gardening_landscaping_pro_theme_suspension_status' );
	}

	public static function set_the_suspension_status( $is_suspended ) {
		update_option( 'vw_gardening_landscaping_pro_theme_suspension_status' , $is_suspended );
	}
	public static function set_the_theme_key($the_key) {
		update_option('vw_pro_theme_key', $the_key);
	}

	public static function remove_the_theme_key() {
		delete_option('vw_pro_theme_key');
	}

	public static function get_the_theme_key() {
		return get_option('vw_pro_theme_key');
	}

	/**
	 * Set some settings
	 * @since 1.0.0
	 * @param $config	Our config parameters
	 */
	public function set_vars( $config ) {

		require_once trailingslashit( WHIZZIE_DIR ) . 'tgm/tgm.php';
		require_once trailingslashit( WHIZZIE_DIR ) . 'widgets/class-vw-widget-importer.php';

		if( isset( $config['page_slug'] ) ) {
			$this->page_slug = esc_attr( $config['page_slug'] );
		}
		if( isset( $config['page_title'] ) ) {
			$this->page_title = esc_attr( $config['page_title'] );
		}
		if( isset( $config['steps'] ) ) {
			$this->config_steps = $config['steps'];
		}

		$this->plugin_path = trailingslashit( dirname( __FILE__ ) );
		$relative_url = str_replace( get_template_directory(), '', $this->plugin_path );
		$this->plugin_url = trailingslashit( get_template_directory_uri() . $relative_url );
		$current_theme = wp_get_theme();
		$this->theme_title = $current_theme->get( 'Name' );
		$this->theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $current_theme->get( 'Name' ) ) );
		$this->page_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_page_slug', $this->theme_name . '-wizard' );
		$this->parent_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_parent_slug', '' );

		$this->widget_file_url = trailingslashit( WHIZZIE_DIR ) . 'widgets/vw-gardening-landscaping-widgets.wie';

	}

	/**
	 * Hooks and filters
	 * @since 1.0.0
	 */
	public function init() {

		if ( class_exists( 'TGM_Plugin_Activation' ) && isset( $GLOBALS['tgmpa'] ) ) {
			add_action( 'init', array( $this, 'get_tgmpa_instance' ), 30 );
			add_action( 'init', array( $this, 'set_tgmpa_url' ), 40 );
		}

		add_action( 'after_switch_theme', array( $this, 'redirect_to_wizard' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'menu_page' ) );
		add_action( 'admin_init', array( $this, 'get_plugins' ), 30 );
		add_filter( 'tgmpa_load', array( $this, 'tgmpa_load' ), 10, 1 );
		add_action( 'wp_ajax_setup_plugins', array( $this, 'setup_plugins' ) );
		add_action( 'wp_ajax_setup_widgets', array( $this, 'setup_widgets' ) );

		add_action( 'wp_ajax_setup_builder', array( $this, 'setup_builder' ) );
		add_action( 'wp_ajax_wz_install_activate_ibtana', array( $this, 'wz_install_activate_ibtana' ) );

		add_action( 'wp_ajax_wz_activate_vw_gardening_landscaping_pro', array( $this, 'wz_activate_vw_gardening_landscaping_pro' ) );

		add_action('admin_enqueue_scripts',  array( $this, 'vw_gardening_landscaping_pro_admin_theme_style' ) );

	}

	public function redirect_to_wizard() {
		global $pagenow;
		if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
			wp_redirect( admin_url( 'themes.php?page=' . esc_attr( $this->page_slug ) ) );
		}
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'theme-wizard-style', get_template_directory_uri() . '/theme-wizard/assets/css/theme-wizard-style.css');
		wp_register_script( 'theme-wizard-script', get_template_directory_uri() . '/theme-wizard/assets/js/theme-wizard-script.js', array( 'jquery' ), time() );
		wp_localize_script(
			'theme-wizard-script',
			'vw_gardening_landscaping_pro_whizzie_params',
			array(
				'ajaxurl' 		=> admin_url( 'admin-ajax.php' ),
				'wpnonce' 		=> wp_create_nonce( 'whizzie_nonce' ),
				'verify_text'	=> esc_html( 'verifying', 'vw-gardening-landscaping-pro' )
			)
		);
		wp_enqueue_script( 'theme-wizard-script' );
		wp_enqueue_script( 'vw-notify-popup', get_template_directory_uri() . '/assets/js/notify.min.js');
	}

	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function tgmpa_load( $status ) {
		return is_admin() || current_user_can( 'install_themes' );
	}

	/**
	 * Get configured TGMPA instance
	 *
	 * @access public
	 * @since 1.1.2
	 */
	public function get_tgmpa_instance() {
		$this->tgmpa_instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
	}

	/**
	 * Update $tgmpa_menu_slug and $tgmpa_parent_slug from TGMPA instance
	 *
	 * @access public
	 * @since 1.1.2
	 */
	public function set_tgmpa_url() {
		$this->tgmpa_menu_slug = ( property_exists( $this->tgmpa_instance, 'menu' ) ) ? $this->tgmpa_instance->menu : $this->tgmpa_menu_slug;
		$this->tgmpa_menu_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_tgmpa_menu_slug', $this->tgmpa_menu_slug );
		$tgmpa_parent_slug = ( property_exists( $this->tgmpa_instance, 'parent_slug' ) && $this->tgmpa_instance->parent_slug !== 'themes.php' ) ? 'admin.php' : 'themes.php';
		$this->tgmpa_url = apply_filters( $this->theme_name . '_theme_setup_wizard_tgmpa_url', $tgmpa_parent_slug . '?page=' . $this->tgmpa_menu_slug );
	}

	/**
	 * Make a modal screen for the wizard
	 */
	public function menu_page() {
		add_menu_page( esc_html( $this->page_title ), esc_html( $this->page_title ), 'manage_options', $this->page_slug, array( $this, 'vw_gardening_landscaping_pro_mostrar_guide' ) ,get_template_directory_uri().'/theme-wizard/assets/images/admin-menu.svg',40);
	}

	public function activation_page() {
		$theme_key 						= ThemeWhizzie::get_the_theme_key();
		$validation_status 		= ThemeWhizzie::get_the_validation_status();
		?>
		<div class="wrap">
			<label><?php esc_html_e('Enter Your Theme License Key:','vw-gardening-landscaping-pro'); ?></label>
			<form id="vw_gardening_landscaping_pro_license_form">
				<input type="text" name="vw_gardening_landscaping_pro_license_key" value="<?php echo $theme_key ?>" <?php if($validation_status === 'true') { echo "disabled"; } ?> required placeholder="License Key" />
				<div class="licence-key-button-wrap">
					<button class="button" type="submit" name="button" <?php if($validation_status === 'true') { echo "disabled"; } ?>>
						<?php if ($validation_status === 'true') {
						?>
							Activated
						<?php
						} else { ?>
							Activate
						<?php
						}
						?>
					</button>

					<?php if ($validation_status === 'true') { ?>
						<button id="change--key" class="button" type="button" name="button">
							Change Key
						</button>
						<div class="next-button">
						<button id="start-now-next" class="button" type="button" name="button" onclick="openCity(event, 'demo_offer')">
							Next
						</button>
					</div>
					<?php } ?>
				</div>
			</form>
		</div>
		<?php
	}

	/**
	 * Make an interface for the wizard
	 */
	public function wizard_page() {

		tgmpa_load_bulk_installer();

		// install plugins with TGM.
		if ( ! class_exists( 'TGM_Plugin_Activation' ) || ! isset( $GLOBALS['tgmpa'] ) ) {
			die( 'Failed to find TGM' );
		}
		$url = wp_nonce_url( add_query_arg( array( 'plugins' => 'go' ) ), 'whizzie-setup' );

		// copied from TGM
		$method = ''; // Leave blank so WP_Filesystem can populate it as necessary.
		$fields = array_keys( $_POST ); // Extra fields to pass to WP_Filesystem.
		if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
			return true; // Stop the normal page form from displaying, credential request form will be shown.
		}
		// Now we have some credentials, setup WP_Filesystem.
		if ( ! WP_Filesystem( $creds ) ) {
			// Our credentials were no good, ask the user for them again.
			request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );
			return true;
		}


		/* If we arrive here, we have the filesystem */ ?>
		<div class="wrap">
			<div class="wizard-logo-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri().'/theme-wizard/assets/images/adminIcon.png'); ?>">
				<span class="wizard-main-title">
					<?php esc_html_e('Welcome to ','vw-gardening-landscaping-pro'); echo $this->theme_title; ?>
				</span>
			</div>
			<?php echo '<div class="card whizzie-wrap">';
				// The wizard is a list with only one item visible at a time
				$steps = $this->get_steps();
				echo '<ul class="whizzie-menu vw-wizard-menu-page">';
				foreach( $steps as $step ) {
					$class = 'step step-' . esc_attr( $step['id'] );
					echo '<li data-step="' . esc_attr( $step['id'] ) . '" class="' . esc_attr( $class ) . '" >';
						printf( '<span class="wizard-main-title">%s</span>',
							esc_html( $step['title'] )
							);
						// $content is split into summary and detail
						$content = call_user_func( array( $this, $step['view'] ) );
						if( isset( $content['summary'] ) ) {
							printf(
								'<div class="summary">%s</div>',
								wp_kses_post( $content['summary'] )
							);
						}
						if( isset( $content['detail'] ) ) {
							// Add a link to see more detail
							printf( '<div class="wz-require-plugins">');
							printf(
								'<div class="detail">%s</div>',
								$content['detail'] // Need to escape this
							);
							printf('</div>');
						}

						printf('<div class="wizard-button-wrapper">');
						if (ThemeWhizzie::get_the_validation_status() === 'true') {
							// The next button
							if( isset( $step['button_text'] ) && $step['button_text'] ) {
								printf(
									'<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="%s" data-step="%s">%s</a></div>',
									esc_attr( $step['callback'] ),
									esc_attr( $step['id'] ),
									esc_html( $step['button_text'] )
								);
							}

							if( isset( $step['button_text_one'] )) {
								printf(
									'<div class="button-wrap button-wrap-one">
										<a href="#" class="button button-primary do-it" data-callback="install_widgets" data-step="widgets"><img src="'.get_template_directory_uri().'/theme-wizard/assets/images/Customize-Icon.png"></a>
										<p class="demo-type-text">%s</p>
									</div>',
									esc_html( $step['button_text_one'] )
								);
							}
							if( isset( $step['button_text_two'] )) {
								printf(
									'<div class="button-wrap button-wrap-two">
										<a href="#" class="button button-primary do-it" data-callback="page_builder" data-step="widgets"><img src="'.get_template_directory_uri().'/theme-wizard/assets/images/Gutenberg-Icon.png"></a>
										<p class="demo-type-text">%s</p>
									</div>',
									esc_html( $step['button_text_two'] )
								);
							}
						} else {
							printf(
								'<div class="button-wrap"><a href="#" class="button button-primary key-activation-tab-click">%s</a></div>',
								esc_html( __( 'Activate Your License', 'vw-gardening-landscaping-pro' ) )
							);
						}
						printf('</div>');

					echo '</li>';
				}
				echo '</ul>';
				echo '<ul class="whizzie-nav wizard-icon-nav">';
					$stepI=1;
					foreach( $steps as $step ) {
						$stepAct=($stepI ==1)? 1 : 0;
						if( isset( $step['icon_url'] ) && $step['icon_url'] ) {
							echo '<li class="nav-step-' . esc_attr( $step['id'] ) . '" wizard-steps="step-'.esc_attr( $step['id'] ).'" data-enable="'.$stepAct.'">
							<img src="'.esc_attr( $step['icon_url'] ).'">
							</li>';
						}
					$stepI++;}
				echo '</ul>';
				?>
				<div class="step-loading"><span class="spinner">
					<img src="<?php echo esc_url(get_template_directory_uri().'/theme-wizard/assets/images/Spinner-Animaion.gif'); ?>">
				</span></div>
			<?php echo '</div>';?>

		</div>
	<?php }
	/**
	 * Set options for the steps
	 * Incorporate any options set by the theme dev
	 * Return the array for the steps
	 * @return Array
	 */
	public function get_steps() {
		$dev_steps = $this->config_steps;
		$steps = array(
			'intro' => array(
				'id'			=> 'intro',
				'title'			=> __( '', 'vw-gardening-landscaping-pro' ),
				'icon'			=> 'dashboard',
				'view'			=> 'get_step_intro', // Callback for content
				'callback'		=> 'do_next_step', // Callback for JS
				'button_text'	=> __( 'Start Now', 'vw-gardening-landscaping-pro' ),
				'can_skip'		=> false, // Show a skip button?
				'icon_url'      => get_template_directory_uri().'/theme-wizard/assets/images/Icons-01.svg'
			),
			'plugins' => array(
				'id'			=> 'plugins',
				'title'			=> __( 'Plugins', 'vw-gardening-landscaping-pro' ),
				'icon'			=> 'admin-plugins',
				'view'			=> 'get_step_plugins',
				'callback'		=> 'install_plugins',
				'button_text'	=> __( 'Install Plugins', 'vw-gardening-landscaping-pro' ),
				'can_skip'		=> true,
				'icon_url'      => get_template_directory_uri().'/theme-wizard/assets/images/Icons-02.svg'
			),
			'widgets' => array(
				'id'			=> 'widgets',
				'title'			=> __( 'Customizer', 'vw-gardening-landscaping-pro' ),
				'icon'			=> 'welcome-widgets-menus',
				'view'			=> 'get_step_widgets',
				'callback'		=> 'install_widgets',
				'button_text_one'	=> __( 'Click On The Image To Import Customizer Demo', 'vw-gardening-landscaping-pro' ),
				'button_text_two'	=> __( 'Click On The Image To Import Gutenberg Block Demo', 'vw-gardening-landscaping-pro' ),
				'can_skip'		=> true,
				'icon_url'      => get_template_directory_uri().'/theme-wizard/assets/images/Icons-03.svg'
			),
			'done' => array(
				'id'			=> 'done',
				'title'			=> __( 'All Done', 'vw-gardening-landscaping-pro' ),
				'icon'			=> 'yes',
				'view'			=> 'get_step_done',
				'callback'		=> '',
				'icon_url'      => get_template_directory_uri().'/theme-wizard/assets/images/Icons-04.svg'
			)
		);

		// Iterate through each step and replace with dev config values
		if( $dev_steps ) {
			// Configurable elements - these are the only ones the dev can update from config.php
			$can_config = array( 'title', 'icon', 'button_text', 'can_skip','button_text_two' );
			foreach( $dev_steps as $dev_step ) {
				// We can only proceed if an ID exists and matches one of our IDs
				if( isset( $dev_step['id'] ) ) {
					$id = $dev_step['id'];
					if( isset( $steps[$id] ) ) {
						foreach( $can_config as $element ) {
							if( isset( $dev_step[$element] ) ) {
								$steps[$id][$element] = $dev_step[$element];
							}
						}
					}
				}
			}
		}
		return $steps;
	}

	/**
	 * Print the content for the intro step
	 */
	public function get_step_intro() { ?>
		<div class="summary">
			<p>
				<?php esc_html_e('Thank you for choosing this VW Gardening landscaping Pro Theme. Using this quick setup wizard, you will be able to configure your new website and get it running in just a few minutes. Just follow these simple steps mentioned in the wizard and get started with your website.','vw-gardening-landscaping-pro'); ?>
			</p>
			<p>
				<?php esc_html_e('You may even skip the steps and get back to the dashboard if you have no time at the present moment. You can come back any time if you change your mind.','vw-gardening-landscaping-pro'); ?>
			</p>
		</div>
	<?php }

	public function get_step_importer() { ?>
		<div class="summary">
			<p>
				<?php esc_html_e('Thank you for choosing this VW Gardening landscaping Pro Theme. Using this quick setup wizard, you will be able to configure your new website and get it running in just a few minutes. Just follow these simple steps mentioned in the wizard and get started with your website.','vw-gardening-landscaping-pro'); ?>
			</p>
		</div>
	<?php }
	/**
	 * Get the content for the plugins step
	 * @return $content Array
	 */
	public function get_step_plugins() {
		$plugins = $this->get_plugins();
		$content = array(); ?>
			<div class="summary">
				<p>
					<?php esc_html_e('Additional plugins always make your website exceptional. Install these plugins by clicking the install button. You may also deactivate them from the dashboard.','vw-gardening-landscaping-pro') ?>
				</p>
			</div>
		<?php // The detail element is initially hidden from the user
		$content['detail'] = '<span class="wizard-plugin-count">'.count($plugins['all']).'</span><ul class="whizzie-do-plugins">';
		// Add each plugin into a list
		foreach( $plugins['all'] as $slug=>$plugin ) {
			$content['detail'] .= '<li data-slug="' . esc_attr( $slug ) . '">' . esc_html( $plugin['name'] ) . '<div class="wizard-plugin-title">';

			$content['detail'] .= '<span class="wizard-plugin-status">Installation Required</span><i class="spinner"></i></div></li>';
		}
		$content['detail'] .= '</ul>';

		return $content;
	}

	/**
	 * Print the content for the widgets step
	 * @since 1.1.0
	 */
	public function get_step_widgets() { ?>
		<div class="summary">
			<p>
				<?php esc_html_e('This theme supports importing the demo content and adding widgets. Get them installed with the below button. Using the Customizer, it is possible to update or even deactivate them','vw-gardening-landscaping-pro'); ?>
			</p>
		</div>
	<?php }

	/**
	 * Print the content for the final step
	 */
	public function get_step_done() {

	 ?>

		<div class="vw-setup-finish">
			<p>
				<?php echo esc_html('your demo content has been imported successfully . click on the finish button for more information.'); ?>
			</p>
			<div class="finish-buttons">
				<a href="<?php echo esc_url(admin_url('/customize.php')); ?>" class="wz-btn-customizer" target="_blank"><?php esc_html_e('Customize Your Demo','vw-gardening-landscaping-pro') ?></a>
				<a href="" class="wz-btn-builder" target="_blank"><?php esc_html_e('Customize Your Demo','vw-gardening-landscaping-pro'); ?></a>
				<a href="<?php echo esc_url(site_url()); ?>" class="wz-btn-visit-site" target="_blank"><?php esc_html_e('Visit Your Site','vw-gardening-landscaping-pro'); ?></a>
			</div>
			<div class="vw-finish-btn">
				<a href="javascript:void(0);" class="button button-primary" onclick="openCity(event, 'theme_info')" data-tab="theme_info">Finish</a>
			</div>
		</div>

	<?php }

	/**
	 * Get the plugins registered with TGMPA
	 */
	public function get_plugins() {

		$instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
		$plugins = array(
			'all' 		=> array(),
			'install'	=> array(),
			'update'	=> array(),
			'activate'	=> array()
		);
		foreach( $instance->plugins as $slug=>$plugin ) {
			if( $instance->is_plugin_active( $slug ) && false === $instance->does_plugin_have_update( $slug ) ) {
				// Plugin is installed and up to date
				continue;
			} else {
				$plugins['all'][$slug] = $plugin;
				if( ! $instance->is_plugin_installed( $slug ) ) {
					$plugins['install'][$slug] = $plugin;
				} else {
					if( false !== $instance->does_plugin_have_update( $slug ) ) {
						$plugins['update'][$slug] = $plugin;
					}
					if( $instance->can_plugin_activate( $slug ) ) {
						$plugins['activate'][$slug] = $plugin;
					}
				}
			}
		}
		return $plugins;
	}

	public function setup_plugins() {

		if ( ! check_ajax_referer( 'whizzie_nonce', 'wpnonce' ) || empty( $_POST['slug'] ) ) {
			wp_send_json_error( array( 'error' => 1, 'message' => esc_html__( 'No Slug Found','vw-gardening-landscaping-pro' ) ) );
		}
		$json = array();
		// send back some json we use to hit up TGM
		$plugins = $this->get_plugins();

		// what are we doing with this plugin?
		foreach ( $plugins['activate'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-activate',
					'action2'       => - 1,
					'message'       => esc_html__( 'Activating Plugin','vw-gardening-landscaping-pro' ),
				);
				break;
			}
		}
		foreach ( $plugins['update'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-update',
					'action2'       => - 1,
					'message'       => esc_html__( 'Updating Plugin','vw-gardening-landscaping-pro' ),
				);
				break;
			}
		}
		foreach ( $plugins['install'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-install',
					'action2'       => - 1,
					'message'       => esc_html__( 'Installing Plugin','vw-gardening-landscaping-pro' ),
				);
				break;
			}
		}
		if ( $json ) {
			$json['hash'] = md5( serialize( $json ) ); // used for checking if duplicates happen, move to next plugin
			wp_send_json( $json );
		} else {
			wp_send_json( array( 'done' => 1, 'message' => esc_html__( 'Success','vw-gardening-landscaping-pro' ) ) );
		}
		exit;
	}

	public function theme_create_customizer_primary_nav_menu() {

		// ------- Create Nav Menu --------
        $menuname = $lblg_themename . 'Primary Menu';
		$bpmenulocation = 'primary';
		$menu_exists = wp_get_nav_menu_object( $menuname );

		if( !$menu_exists){
		    $menu_id = wp_create_nav_menu($menuname);
		    $parent_home_item = wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Home','vw-gardening-landscaping-pro'),
		        'menu-item-classes' => 'home',
		        'menu-item-url' => home_url( '/' ),
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => __('Home 2','vw-gardening-landscaping-pro'),
				'menu-item-classes' => 'home2',
				'menu-item-url' => 'https://www.vwthemes.net/garden-landscaping/',
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $parent_home_item
			));
		    $parent_item = wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => __('Blog','vw-gardening-landscaping-pro'),
				'menu-item-status' => 'publish'
			));

			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => __('Blog With No Sidebar','vw-gardening-landscaping-pro'),
				'menu-item-classes' => 'blog',
				'menu-item-url' => home_url( '/index.php/blog/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $parent_item
			));
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => __('Blog Left Sidebar','vw-gardening-landscaping-pro'),
				'menu-item-classes' => 'blog-left-sidebar',
				'menu-item-url' => home_url( '/index.php/blog-left-sidebar/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $parent_item
			));

			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => __('Blog Right Sidebar','vw-gardening-landscaping-pro'),
				'menu-item-classes' => 'blog-right-sidebar',
				'menu-item-url' => home_url( '/index.php/blog-right-sidebar/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $parent_item
			));

		    $parent_page_item = wp_update_nav_menu_item($menu_id, 0, array(
		       	'menu-item-title' =>  __('Page','vw-gardening-landscaping-pro'),
		        'menu-item-classes' => 'page',
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => __('Page With No Sidebar','vw-gardening-landscaping-pro'),
				'menu-item-classes' => 'page',
				'menu-item-url' => home_url( '/index.php/page/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $parent_page_item
			));

		    wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => __('Page Left Sidebar','vw-gardening-landscaping-pro'),
				'menu-item-classes' => 'page-left',
				'menu-item-url' => home_url( '/index.php/page-with-left-sidebar/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $parent_page_item
			));

			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => __('Page Right Sidebar','vw-gardening-landscaping-pro'),
				'menu-item-classes' => 'page-right',
				'menu-item-url' => home_url( '/index.php/page-with-right-sidebar/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $parent_page_item
			));
			wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Services','vw-gardening-landscaping-pro'),
		        'menu-item-classes' => 'services',
		        'menu-item-url' => home_url( '/index.php/services/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $parent_page_item
		    ));	
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => __('404 page','vw-gardening-landscaping-pro'),
				'menu-item-classes' => 'page404',
				'menu-item-url' => home_url( '/index.php/404.php/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $parent_page_item
			));

			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  __('Typography','vw-gardening-landscaping-pro'),
				'menu-item-classes' => 'typography',
				'menu-item-url' => home_url( '/index.php/typography/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $parent_page_item
			));
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  __('Faq','vw-gardening-landscaping-pro'),
				'menu-item-classes' => 'faq',
				'menu-item-url' => home_url( '/index.php/faq/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $parent_page_item
			));

			$shop_parent_item = wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Shop','vw-gardening-landscaping-pro'),
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Product List','vw-gardening-landscaping-pro'),
		        'menu-item-classes' => 'shop',
		        'menu-item-url' => home_url( '/index.php/shop/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $shop_parent_item
		    ));		    
		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Simple Product','vw-gardening-landscaping-pro'),
		        'menu-item-classes' => 'simple-product',
		        'menu-item-url' => home_url( '/index.php/product/gasteria/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $shop_parent_item
		    ));
		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Variable Product','vw-gardening-landscaping-pro'),
		        'menu-item-classes' => 'variable-product',
		        'menu-item-url' => home_url( '/index.php/product/air-plant/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $shop_parent_item
		    ));
		    $shop_child_item = wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Shop Layout','vw-gardening-landscaping-pro'),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $shop_parent_item
		    ));
		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('2 Columns','vw-gardening-landscaping-pro'),
		        'menu-item-classes' => '2-columns',
		        'menu-item-url' => home_url( '/index.php/2-columns/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $shop_child_item
		    ));
		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('3 Columns','vw-gardening-landscaping-pro'),
		        'menu-item-classes' => '3-column',
		        'menu-item-url' => home_url( '/index.php/3-columns/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $shop_child_item
		    ));
		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('4 Columns','vw-gardening-landscaping-pro'),
		        'menu-item-classes' => '4-column',
		        'menu-item-url' => home_url( '/index.php/4-columns/' ),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $shop_child_item
		    ));
		     $shopp_child_item = wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Shop Pages','vw-gardening-landscaping-pro'),
		        'menu-item-status' => 'publish',
		        'menu-item-parent-id' => $shop_parent_item
		    ));
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  __('Cart','vw-gardening-landscaping-pro'),
				'menu-item-classes' => 'cart',
				'menu-item-url' => home_url( '/index.php/cart/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $shopp_child_item
			));
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  __('Checkout','vw-gardening-landscaping-pro'),
				'menu-item-classes' => 'checkoutt',
				'menu-item-url' => home_url( '/index.php/checkout/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $shopp_child_item
			));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Contact','vw-gardening-landscaping-pro'),
		        'menu-item-classes' => 'contact',
		        'menu-item-url' => home_url( '/index.php/contact/' ),
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('About Us','vw-gardening-landscaping-pro'),
		        'menu-item-classes' => 'about-us',
		        'menu-item-url' => home_url( '/index.php/about-us/' ),
		        'menu-item-status' => 'publish'));		    

		    if( !has_nav_menu( $bpmenulocation ) ){
		        $locations = get_theme_mod('nav_menu_locations');
		        $locations[$bpmenulocation] = $menu_id;
		        set_theme_mod( 'nav_menu_locations', $locations );
		    }
		}
	}
	public function theme_create_customizer_footer_widgets_nav_menu() {

		// ------- Create Nav Menu --------
        $menuname = $lblg_themename . 'Footer Widgets';
		$bpmenulocation = 'footer-widgets';
		$menu_exists = wp_get_nav_menu_object( $menuname );

		if( !$menu_exists){
		    $menu_id = wp_create_nav_menu($menuname);

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Page','vw-gardening-landscaping-pro'),
		        'menu-item-classes' => 'page',
		        'menu-item-url' => home_url( '/index.php/page/' ),
		        'menu-item-status' => 'publish'));

		   wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('About Us','vw-gardening-landscaping-pro'),
		        'menu-item-classes' => 'about-us',
		        'menu-item-url' => home_url( '/index.php/about-us/' ),
		        'menu-item-status' => 'publish'));	

		    wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => __('404 page','vw-gardening-landscaping-pro'),
				'menu-item-classes' => 'page404',
				'menu-item-url' => home_url( '/index.php/404.php/' ),
				'menu-item-status' => 'publish'
			));

			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  __('Faq','vw-gardening-landscaping-pro'),
				'menu-item-classes' => 'faq',
				'menu-item-url' => home_url( '/index.php/faq/' ),
				'menu-item-status' => 'publish',
				'menu-item-parent-id' => $parent_page_item
			));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Contact Us','vw-gardening-landscaping-pro'),
		        'menu-item-classes' => 'contact',
		        'menu-item-url' => home_url( '/index.php/contact/' ),
		        'menu-item-status' => 'publish'));

		    if( !has_nav_menu( $bpmenulocation ) ){
		        $locations = get_theme_mod('nav_menu_locations');
		        $locations[$bpmenulocation] = $menu_id;
		        set_theme_mod( 'nav_menu_locations', $locations );
		    }
		}
	}

	public function custom_posttype_option(){
	$getOption = get_option('icpa_settings');

		$support_arr =array(
			'title' => 'on',
			'editor' => 'on',
			'thumbnail' => 'on',
			'custom-fields' => 'on',
			'page-attributes' => 'on',
			'comments' => 'on'
		);

		$posttype_arr = array(
		array(
		  'posttype_name' => 'services',
		  'plural_label' => 'Services',
		  'singular_label' => 'Service',
		  'support' => $support_arr,
		  'is_display' => 1,
		),
		array(
		  'posttype_name' => 'projects',
		  'plural_label' => 'Projects',
		  'singular_label' => 'Project',
		  'support' => $support_arr,
		  'is_display' => 1,
		),
		array(
		  'posttype_name' => 'testimonials',
		  'plural_label' => 'Testimonials',
		  'singular_label' => 'Testimonial',
		  'support' => $support_arr,
		  'is_display' => 1,
		),
		array(
		  'posttype_name' => 'team',
		  'plural_label' => 'Teams',
		  'singular_label' => 'Team',
		  'support' => $support_arr,
		  'is_display' => 1,
		)
		);

		foreach ($posttype_arr as $posttype) {
			if ($getOption) {
			  array_push($getOption, $posttype);
			}else{
			  $getOption = [];
			  array_push($getOption, $posttype);
			}
		}

		return update_option('icpa_settings', $getOption);
	}

	function isAssoc( array $arr ) {
		if (array() === $arr) return false;
		return array_keys($arr) !== range(0, count($arr) - 1);
	}

	public function custom_taxonomy_option(){
		$getOption = get_option('icpa_tax_settings');

		$posttype_arr = array(
			array(
				'taxonomy_name'				=> 'projectscategory',
				'tax_plural_label'			=> 'Categories',
				'tax_singular_label'		=> 'Category',
				'posttype'					=> array(
					'projects' => 'on'
				),
				'tax_attach_thumbnail'	=> true,
				'tax_search_item' 		=> 'Search Categories',
				'tax_all_items'         => 'All Categories',
				'tax_parent_item'       => 'Parent Category',
				'tax_parent_item_colon' => 'Parent Category:',
				'tax_edit_item'         => 'Edit Categories',
				'tax_update_item'       => 'Update Categories',
				'tax_new_item'      	=> 'Add New Category',
				'tax_new_item_name'     => 'New Category',
				'tax_menu_name'         => 'Category',
				'tax_custom_rewrite_slug' => 'projectscategory',
				'tax_hierarchical'      => true,
				'tax_public'      		=> true,
				'tax_public_query'      => true,
				'tax_show_in_menu'      => true,
				'tax_show_ui'           => true,
				'tax_show_admin_column' => true,
				'tax_query_var'         => true
			)
		);

		foreach ($posttype_arr as $posttype) {
			if ($getOption) {
				array_push($getOption, $posttype);
			}else{
				$getOption = [];
				array_push($getOption, $posttype);
			}
		}

	return update_option('icpa_tax_settings', $getOption);
}

	/**
	 * Imports the Demo Content
	 * @since 1.1.0
	 */
	public function setup_widgets() {

		$this->custom_posttype_option();
		$this->custom_taxonomy_option();
	
		do_action('custom_posttype_register');

		$data_array=[];
	    $matchTheme=array(
	      'vw-gardening-landscaping-pro' => 'vw-gardening-landscaping'
	    );
	    $newTheme = wp_get_theme();
	    $themename = $newTheme->get_stylesheet();
	    global $wpdb;
	    if(isset($matchTheme[$themename])){
	    	$old_theme = $matchTheme[$themename];
	      	$checkWord = 'theme_mods_'.$themename;
	      	$mqr = "SELECT * FROM wp_options where option_name='$checkWord'";
	      	$result = $wpdb->get_row($mqr);
	      	if($result){
	        	$optionValue = $result->option_value;
	        	$data_array=unserialize($optionValue);
	      	}
	    }

	    $theme_mods_match_id = [
	      'vw_gardening_landscaping_pro_header_address_icon' => ['default'=> 'fas fa-location-arrow'],
	      'vw_gardening_landscaping_pro_header_address' => ['default'=> '455 Martinson, Los Angeles']
	    ];

	    // vw_title_banner_image_wp_custom_attachment START
		$image_url 	= get_template_directory_uri().'/assets/images/title-banner.jpg';
		$upload_dir = wp_upload_dir();
		$image_data = file_get_contents( $image_url );
		$filename = basename( $image_url );
		if ( wp_mkdir_p( $upload_dir['path'] ) ) {
		  $file = $upload_dir['path'] . '/' . $filename;
		} else {
		  $file = $upload_dir['basedir'] . '/' . $filename;
		}
		file_put_contents( $file, $image_data );
		$wp_filetype = wp_check_filetype( $filename, null );
		$attachment = array(
		  'post_mime_type'	=> $wp_filetype['type'],
		  'post_title' 			=> sanitize_file_name( $filename ),
		  'post_content' 		=> '',
		  'post_status' 		=> 'inherit'
		);
		$attach_id = wp_insert_attachment( $attachment, $file );
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		$attachment_url = wp_get_attachment_url( $attach_id );
		// vw_title_banner_image_wp_custom_attachment END

		//POST and update the customizer and other related data of VW Gardening Landscaping Pro
      	$home_id=''; $vw_blog_id=''; $page_id=''; $contact_id='';

        // Create a front page and assigned the template

        $home_content = '';

        $home_title = 'Home';
        $home_check = get_page_by_title($home_title);
        $home = array(
             'post_type' => 'page',
             'post_title' => $home_title,
             'post_content'  => $home_content,
             'post_status' => 'publish',
             'post_author' => 1,
             'post_slug' => 'home'
         );
        $home_id = wp_insert_post($home);

         //Set the home page template
         add_post_meta( $home_id, '_wp_page_template', 'page-template/home-page.php' );

         //Set the static front page
         $home = get_page_by_title( 'Home' );
         update_option( 'page_on_front', $home->ID );
         update_option( 'show_on_front', 'page' );


          // Create a blog page and assigned the template
          $vw_blog_title = 'Blog';
          $blog_check = get_page_by_title($vw_blog_title);
          $blog = array(
             'post_type' => 'page',
             'post_title' => $vw_blog_title,
             'post_status' => 'publish',
             'post_author' => 1,
             'post_slug' => 'blog'
          );
          $vw_blog_id = wp_insert_post($blog);


         //Set the blog page template
         add_post_meta( $vw_blog_id, '_wp_page_template', 'page-template/blog-fullwidth-extend.php' );
		add_post_meta( $vw_blog_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

		// ----
		$blog_title = 'Blog Left Sidebar';
		$blog = array(
			'post_type' 	=> 'page',
			'post_title' 	=> $blog_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' 	=> 'blog-left-sidebar'
		);
		$blog_id = wp_insert_post($blog);


		//Set the blog page template
		add_post_meta( $blog_id, '_wp_page_template', 'page-template/blog-with-left-sidebar.php' );
		add_post_meta( $blog_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );


		$blog_title = 'Blog Right Sidebar';
		$blog = array(
			'post_type' 	=> 'page',
			'post_title' 	=> $blog_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' 	=> 'blog-right-sidebar'
		);
		$blog_id = wp_insert_post($blog);


		//Set the blog page template
		add_post_meta( $blog_id, '_wp_page_template', 'page-template/blog-with-right-sidebar.php' );
		add_post_meta( $blog_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

         // Create a Page
          $page_title = 'Page ';
          $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus';

          $page_check = get_page_by_title($page_title);
          $vw_page = array(
          'post_type' => 'page',
          'post_title' => $page_title,
          'post_content'  => $content,
          'post_status' => 'publish',
          'post_author' => 1,
          'post_slug' => 'page'
          );
          $page_id = wp_insert_post($vw_page);
          add_post_meta( $page_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

          // Page Right Sidebar
          $page_title = 'Page With Left Sidebar';
          $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus';

          $page_check = get_page_by_title($page_title);
          $vw_page = array(
          'post_type' => 'page',
          'post_title' => $page_title,
          'post_content'  => $content,
          'post_status' => 'publish',
          'post_author' => 1,
          'post_slug' => 'page'
          );
          $page_id = wp_insert_post($vw_page);
          add_post_meta( $page_id, '_wp_page_template', 'page-template/page-with-left-sidebar.php' );
          add_post_meta( $page_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

          // Page Right Sidebar
          $page_title = 'Page With Right Sidebar';
          $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus';

          $page_check = get_page_by_title($page_title);
          $vw_page = array(
          'post_type' => 'page',
          'post_title' => $page_title,
          'post_content'  => $content,
          'post_status' => 'publish',
          'post_author' => 1,
          'post_slug' => 'page'
          );
          $page_id = wp_insert_post($vw_page);
          add_post_meta( $page_id, '_wp_page_template', 'page-template/page-with-right-sidebar.php' );
          add_post_meta( $page_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

          // Create a contact page and assigned the template
          $contact_title = 'Contact';
          $contact_check = get_page_by_title($contact_title);
          $contact = array(
          'post_type' => 'page',
          'post_title' => $contact_title,
          'post_status' => 'publish',
          'post_author' => 1,
          'post_slug' => 'contact'
          );
         $contact_id = wp_insert_post($contact);

         //Set the blog with right sidebar template
         add_post_meta( $contact_id, '_wp_page_template', 'page-template/contact.php' );
         add_post_meta( $contact_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

         // Create a About page and assigned the template
          $about_title = 'About Us';
          $about = array(
          'post_type' => 'page',
          'post_title' => $about_title,
          'post_status' => 'publish',
          'post_author' => 1,
          'post_slug' => 'about'
          );
         $about_id = wp_insert_post($about);

         //Set the blog with right sidebar template
         add_post_meta( $about_id, '_wp_page_template', 'page-template/about-us.php' );
         add_post_meta( $about_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

         // Create a contact page and assigned the template
		$menu_title = '2 Columns';
		$content = '[products  columns="2" orderby="date" order="DESC" visibility="visible"]';
		$menu = array(
			'post_type' 	=> 'page',
			'post_title' 	=> $menu_title,
			'post_content'  => $content,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' 	=> 'page'
		);
		$menu_id = wp_insert_post($menu);

		//Set the blog with right sidebar template
		add_post_meta( $menu_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

		// Create a contact page and assigned the template
		$menu_title = '3 Columns';
		$content = '[products  columns="3" orderby="date" order="DESC" visibility="visible"]';
		$menu = array(
			'post_type' 	=> 'page',
			'post_title' 	=> $menu_title,
			'post_content'  => $content,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' 	=> 'page'
		);
		$menu_id = wp_insert_post($menu);

		//Set the blog with right sidebar template
		add_post_meta( $menu_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

		// Create a contact page and assigned the template
		$menu_title = '4 Columns';
		$content = '[products  columns="4" orderby="date" order="DESC" visibility="visible"]';
		$menu = array(
			'post_type' 	=> 'page',
			'post_title' 	=> $menu_title,
			'post_content'  => $content,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' 	=> 'page'
		);
		$menu_id = wp_insert_post($menu);

		//Set the blog with right sidebar template
		add_post_meta( $menu_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

		// Create a contact page and assigned the template
		$typography_title = 'Typography';
		$typography = array(
			'post_type' 	=> 'page',
			'post_title' 	=> $typography_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' 	=> 'typography'
		);
		$typography_id = wp_insert_post($typography);

		//Set the blog with right sidebar template
		add_post_meta( $typography_id, '_wp_page_template', 'page-template/typography-template.php' );
		add_post_meta( $typography_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

		// Create a contact page and assigned the template
		$faq_title = 'Faq';
		$faq = array(
			'post_type' 	=> 'page',
			'post_title' 	=> $faq_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' 	=> 'faq'
		);
		$faq_id = wp_insert_post($faq);

		//Set the blog with right sidebar template
		add_post_meta( $faq_id, '_wp_page_template', 'page-template/faq.php' );
		add_post_meta( $faq_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

		// Create a contact page and assigned the template
		$service_title = 'Services';
		$service = array(
			'post_type' 	=> 'page',
			'post_title' 	=> $service_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' 	=> 'services'
		);
		$service_id = wp_insert_post($service);

		//Set the blog with right sidebar template
		add_post_meta( $service_id, '_wp_page_template', 'page-template/services.php' );
		add_post_meta( $service_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

         // -------------- Section Ordering ---------------

         set_theme_mod( 'vw_gardening_landscaping_pro_section_ordering_settings_repeater', 'our-expertise,about-us,our-services,working-process,our-projects,pricing-plan,product-records,testimonials,team,why-choose-us,blog-partners,gallery' );

        // ----------------- Topbar -----------------

         set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_faq_title', 'FAQ' );
         set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_faq_url', '#' );

         set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_support_title', 'SUPPORT' );
         set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_support_url', '#' );

         set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_phone_icon', 'fas fa-phone' );
         set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_phone_no_title', 'Toll Free:' );
         set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_phone_no', '+1234456789' );

         set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_email_icon', 'fas fa-envelope-open' );
         set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_email_title', 'EMAIL' );
         set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_email_id', 'demotrainer@gmail.com' );

         // ------------ Header Button -------------
         set_theme_mod( 'vw_gardening_landscaping_pro_header_section_button_title', 'Get A Quote' );
         set_theme_mod( 'vw_gardening_landscaping_pro_header_section_button_url', '#' );
         set_theme_mod( 'vw_gardening_landscaping_pro_site_menu_width', '250' );
         // search placeholder
         set_theme_mod( 'vw_gardening_landscaping_pro_header_search_placeholder_text', 'Search...' );

        /*customizer-part-slide.php*/
        //Number of slides to show section
        set_theme_mod( 'vw_gardening_landscaping_pro_slide_number', '3' );

        //Slider Images section
        for($i=1; $i<=3; $i++) {
          set_theme_mod( 'vw_gardening_landscaping_pro_slide_image'.$i, get_template_directory_uri().'/assets/images/slides/slide'.$i.'.jpg' );

           set_theme_mod( 'vw_gardening_landscaping_pro_slide_small_heading'.$i, 'Get The Right Grass With Us' );
          //Slide top title
          set_theme_mod( 'vw_gardening_landscaping_pro_slide_heading'.$i, 'Prune Away Dead And Damaged Branches ' );
          //Slide Text section
          set_theme_mod( 'vw_gardening_landscaping_pro_slide_text'.$i, 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd.' );
          //Slider Button Text section
          set_theme_mod( 'vw_gardening_landscaping_pro_slide_btntext'.$i, 'Read More' );

          //Slider Button Text section
          set_theme_mod( 'vw_gardening_landscaping_pro_slide_second_btntext'.$i, 'Request A Quote' );
        }
          set_theme_mod( 'vw_gardening_landscaping_pro_slider_section_prev_nav_icon', 'fas fa-chevron-left' );
        set_theme_mod( 'vw_gardening_landscaping_pro_slider_section_next_nav_icon', 'fas fa-chevron-right' );
        //Slide Delay
        set_theme_mod( 'vw_gardening_landscaping_pro_slide_delay', '10000' );

        /*customizer-part-social-icons.php*/
        //twitter link
        set_theme_mod( 'vw_gardening_landscaping_pro_headertwitter', 'https://twitter.com/' );
        //facebook link
        set_theme_mod( 'vw_gardening_landscaping_pro_headerfacebook', 'https://www.facebook.com/' );
        //GooglePlus link
        set_theme_mod( 'vw_gardening_landscaping_pro_headeryoutube', 'https://www.youtube.com/' );
        //GooglePlus link
        set_theme_mod( 'vw_gardening_landscaping_pro_headerpinterest', 'https://www.pinterest.com/' );
        //Pinterest link
        set_theme_mod( 'vw_gardening_landscaping_pro_headerpinterest', 'https://www.pinterest.com/' );
        //Instagram link
        set_theme_mod( 'vw_gardening_landscaping_pro_headerinstagram', 'https://www.instagram.com/' );
        //Linkldein link
        set_theme_mod( 'vw_gardening_landscaping_pro_headerlinkedin', 'https://www.linkedin.com/' );

        // --------------- Our Expertise ------------

        set_theme_mod( 'vw_gardening_landscaping_pro_our_expertise_small_heading', 'Our Gardening' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_expertise_heading', 'OUR EXPERTISE' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_expertise_number', 3 );
        $expertise_title=array('Lawn & Garden Care','Irrigation & Drainage','Spring & Fall Cleanup');
        for($i=1;$i<=3;$i++)
        {
          set_theme_mod( 'vw_gardening_landscaping_pro_our_expertise_feature_icon'.$i, get_template_directory_uri().'/assets/images/expertise/Expertise'.$i.'.png' );
           set_theme_mod( 'vw_gardening_landscaping_pro_our_expertise_feature_icon_alt_text'.$i,'Alt Tab for Feature Icon'.$i );
          set_theme_mod( 'vw_gardening_landscaping_pro_our_expertise_feature_title'.$i, $expertise_title[$i-1] );
          set_theme_mod( 'vw_gardening_landscaping_pro_our_expertise_feature_text'.$i, 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter.' );
          set_theme_mod( 'vw_gardening_landscaping_pro_our_expertise_feature_button_title'.$i, 'Read More' );
          set_theme_mod( 'vw_gardening_landscaping_pro_our_expertise_feature_button_url'.$i, '#' );
        }

        // ------------- About Us -------------

        set_theme_mod( 'vw_gardening_landscaping_pro_about_us_bgimage', get_template_directory_uri().'/assets/images/about-us/aboutbg.jpg' );
        set_theme_mod( 'vw_gardening_landscaping_pro_about_us_small_heading', 'About Us' );
        set_theme_mod( 'vw_gardening_landscaping_pro_about_us_heading', 'WELCOME TO GARDENING' );
        set_theme_mod( 'vw_gardening_landscaping_pro_about_us_text', 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd.' );
        set_theme_mod( 'vw_gardening_landscaping_pro_about_us_number', 4);
        $about_icon=array('fas fa-headphones','fas fa-trophy','fas fa-leaf','fas fa-shopping-basket');
        $about_title=array('GARDEN CENTER ADVISOR','AWARD-WINNING GARDEN','100% GUARANTEE FOR 5 YEAR','WE DELIVER OUR BEST');
        for($i=1;$i<=4;$i++)
        {
          set_theme_mod( 'vw_gardening_landscaping_pro_about_us_feature_icon'.$i, $about_icon[$i-1]);
          set_theme_mod( 'vw_gardening_landscaping_pro_about_us_feature_title'.$i, $about_title[$i-1] );
          set_theme_mod( 'vw_gardening_landscaping_pro_about_us_feature_url'.$i,'#' );
        }

        // --------------- Our Services ------------

        set_theme_mod( 'vw_gardening_landscaping_pro_our_services_small_heading', 'Our Facilities' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_services_heading', 'OUR SERVICES' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_services_number', 4 );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_services_link_title', 'LEARN MORE' );
        set_theme_mod( 'vw_gardening_landscaping_pro_services_excerpt_no', '6' );
        set_theme_mod( 'vw_gardening_landscaping_pro_project_excerpt_no', '5' );
        set_theme_mod( 'vw_gardening_landscaping_pro_testimonial_excerpt_no', '41' );
        set_theme_mod( 'vw_gardening_landscaping_pro_blog_excerpt_no', '8' );

        $services_title=array('HEDGING & TOPIARY','WEED CONTROL','URBAN GARDENING','GARDEN CARE');
        for($i=1;$i<=4;$i++){

          $vw_title = $services_title[$i-1];
          $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus.';

          // Create post object
          $my_post = array(
             'post_title'    => wp_strip_all_tags( $vw_title ),
             'post_content'  => $content,
             'post_status'   => 'publish',
             'post_type'     => 'services',
          );

           // Insert the post into the database
          $vw_post_id = wp_insert_post( $my_post );

          $image_url = get_template_directory_uri().'/assets/images/services/servicesimg'.$i.'.jpg';

          $image_name= 'services'.$i.'.jpg';
          $upload_dir       = wp_upload_dir();
          // Set upload folder
          $image_data       = file_get_contents($image_url);
          // Get image data
          $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
          // Generate unique name
          $filename= basename( $unique_file_name );
          // Create image file name
          // Check folder permission and define file location
          if( wp_mkdir_p( $upload_dir['path'] ) ) {
             $file = $upload_dir['path'] . '/' . $filename;
          } else {
             $file = $upload_dir['basedir'] . '/' . $filename;
          }
          // Create the image  file on the server
          file_put_contents( $file, $image_data );
          // Check image file type
          $wp_filetype = wp_check_filetype( $filename, null );
          // Set attachment data
          $attachment = array(
             'post_mime_type' => $wp_filetype['type'],
             'post_title'     => sanitize_file_name( $filename ),
             'post_content'   => '',
             'post_type'     => 'services',
             'post_status'    => 'inherit'
          );

          // Create the attachment
          $attach_id = wp_insert_attachment( $attachment, $file, $vw_post_id );
          // Include image.php
          require_once(ABSPATH . 'wp-admin/includes/image.php');
          // Define attachment metadata
          $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
          // Assign metadata to attachment
           wp_update_attachment_metadata( $attach_id, $attach_data );
          // And finally assign featured image to post
          set_post_thumbnail( $vw_post_id, $attach_id );
          set_theme_mod( 'vw_gardening_landscaping_pro_our_services_alt_text'.$i,'Alt Tab for Services Images'.$i );
        }

        // -------------- Our Processes -------------

        set_theme_mod( 'vw_gardening_landscaping_pro_working_process_bgimage', get_template_directory_uri().'/assets/images/Processbg.jpg' );
        set_theme_mod( 'vw_gardening_landscaping_pro_working_process_small_heading', 'Gardening Steps' );
        set_theme_mod( 'vw_gardening_landscaping_pro_working_process_heading', 'WORKING PROCESS' );
        set_theme_mod( 'vw_gardening_landscaping_pro_working_process_number', 4 );
        $process_title=array('CONSULTATION','DESIGN & PLAN','COMPLETION','MAINTENANCE');
        $process_icons=array('fas fa-user','far fa-lightbulb','fas fa-leaf','fas fa-tree');
        for($i=1;$i<=4;$i++)
        {
          set_theme_mod( 'vw_gardening_landscaping_pro_working_process_no'.$i, '0'.$i );
          set_theme_mod( 'vw_gardening_landscaping_pro_working_process_title'.$i, $process_title[$i-1] );
           set_theme_mod( 'vw_gardening_landscaping_pro_working_process_icon'.$i, $process_icons[$i-1] );
        }

      // -------------- Our Projects ---------------

        set_theme_mod( 'vw_gardening_landscaping_pro_our_project_small_heading', 'Our Work' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_project_heading', 'OUR PROJECT' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_project_number', 6 );
        $project_tab=array('all','gardencare','gardeninglawn','lawncare','planting','snowremoval');
        $tab_title=array('All','Garden Care','Gardening & Lawn','Lawn Care','Planting','Snow Removal');
        for($i=1;$i<=6;$i++)
        {
          wp_insert_term(
            $project_tab[$i-1], // the term
            'projectscategory', // the taxonomy
            array(
              'description'=> 'Category description',
              'slug' => $project_tab[$i-1],
              'term_id'=>23,
              'term_taxonomy_id'=>34,
          ));

          set_theme_mod( 'vw_gardening_landscaping_pro_our_project_tab_title'.$i, $tab_title[$i-1] );
          set_theme_mod( 'vw_gardening_landscaping_pro_our_project_categoryselection_setting'.$i,'all' );
        }

        for($i=1;$i<=6;$i++){

            $vw_title = 'Parking Cleaning';
            $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus.';

            // Create post object
            $my_post = array(
             'post_title'    => wp_strip_all_tags( $vw_title ),
             'post_content'  => $content,
             'post_status'   => 'publish',
             'post_type'     => 'projects',
            );

             // Insert the post into the database
            $vw_post_id = wp_insert_post( $my_post );
            $vw_term = get_term_by('name', 'All', 'projectscategory');
            wp_set_object_terms($vw_post_id, $vw_term->term_id, 'projectscategory');

            $image_url = get_template_directory_uri().'/assets/images/projects/project'.$i.'.jpg';

            $image_name= 'projects'.$i.'.jpg';
            $upload_dir       = wp_upload_dir();
            // Set upload folder
            $image_data       = file_get_contents($image_url);
            // Get image data
            $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
            // Generate unique name
            $filename= basename( $unique_file_name );
            // Create image file name
            // Check folder permission and define file location
            if( wp_mkdir_p( $upload_dir['path'] ) ) {
               $file = $upload_dir['path'] . '/' . $filename;
            } else {
               $file = $upload_dir['basedir'] . '/' . $filename;
            }
            // Create the image  file on the server
            file_put_contents( $file, $image_data );
            // Check image file type
            $wp_filetype = wp_check_filetype( $filename, null );
            // Set attachment data
            $attachment = array(
               'post_mime_type' => $wp_filetype['type'],
               'post_title'     => sanitize_file_name( $filename ),
               'post_content'   => '',
               'post_type'     => 'projects',
               'post_status'    => 'inherit'
            );

            // Create the attachment
            $attach_id = wp_insert_attachment( $attachment, $file, $vw_post_id );
            // Include image.php
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            // Define attachment metadata
            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
            // Assign metadata to attachment
             wp_update_attachment_metadata( $attach_id, $attach_data );
            // And finally assign featured image to post
            set_post_thumbnail( $vw_post_id, $attach_id );
            set_theme_mod( 'vw_gardening_landscaping_pro_our_project_categoryselection_alt_text'.$i, 'Alt Tab for Projects Images'.$i );
        }

        // ------------ Pricing Plans ------------

        set_theme_mod( 'vw_gardening_landscaping_pro_pricing_plan_bgimage', get_template_directory_uri().'/assets/images/planbg.jpg' );
        set_theme_mod( 'vw_gardening_landscaping_pro_pricing_plan_small_heading', 'Gardening Plan' );
        set_theme_mod( 'vw_gardening_landscaping_pro_pricing_plan_heading', 'PRICING PLANS' );
        set_theme_mod( 'vw_gardening_landscaping_pro_pricing_plan_number', 4 );
        $plan_title=array('PERSONAL','PROFESSIONAL','PERSONAL','PROFESSIONAL');
        $plan_price=array('19$','25$','19$','25$');
        $plan_feature=array('100 GB Space','Unlimited Domain','20 Email Account','10 Database');
        for($i=1;$i<=4;$i++)
        {
          set_theme_mod( 'vw_gardening_landscaping_pro_pricing_plan_title'.$i, $plan_title[$i-1] );
          set_theme_mod( 'vw_gardening_landscaping_pro_pricing_plan_price'.$i, $plan_price[$i-1] );
          set_theme_mod( 'vw_gardening_landscaping_pro_pricing_plan_price_duration'.$i,'MO' );
          set_theme_mod( 'vw_gardening_landscaping_pro_pricing_plan_link_title'.$i,'CHOOSE PLAN' );
          set_theme_mod( 'vw_gardening_landscaping_pro_pricing_plan_link_url'.$i,'#' );
          set_theme_mod( 'vw_gardening_landscaping_pro_pricing_plan_feature_number'.$i,4 );
          for($j=1;$j<=4;$j++)
          {
            set_theme_mod( 'vw_gardening_landscaping_pro_pricing_plan_feature_title'.$i.$j,$plan_feature[$j-1] );
          }
        }

        // Attribute Creation Code if a variable product needed to create
		$attribute_data = array(
			array(
				'name'					=>	'Pot',
				'type'					=>	'button',
				'taxonomy'			=>	'pa_pot',
				'data'					=>	array(
					'Ceramic',
					'Plastic'
				)
			)
		);
		$new_attribute_data = array();
		$old_attribute_taxonomies = wc_get_attribute_taxonomies();
		foreach ( $attribute_data as $attribute_data_single ) {
			$is_attribute_found	=	false;
			foreach ( $old_attribute_taxonomies as $old_attribute_taxonomy ) {
				if ( $attribute_data_single['type'] === $old_attribute_taxonomy->attribute_type ) {
					$is_attribute_found = true;
					break;
				}
			}
			if ( !$is_attribute_found ) {
				array_push( $new_attribute_data, $attribute_data_single );
			}
		}
		foreach ( $new_attribute_data as $attribute_single_args ) {
			$args = array(
				// 'slug'					=> 'my_color',
				'name'					=>	__( $attribute_single_args['name'], 'vw-gardening-landscaping-pro' ),
				'type'					=>	$attribute_single_args['type'],
				'orderby'				=>	'menu_order',
				'has_archives'	=>	false,
			);
			$wc_create_attribute	=	wc_create_attribute( $args );
			register_taxonomy( $attribute_single_args['taxonomy'], array( 'product' ), array() );

			if ( !is_wp_error( $wc_create_attribute ) ) {

				if ( $this->isAssoc( $attribute_single_args['data'] ) ) {
					foreach ( $attribute_single_args['data'] as $single_data_key => $single_data ) {
						$wp_insert_term	=	 wp_insert_term( $single_data_key, $attribute_single_args['taxonomy'] );
						if ( !is_wp_error( $wp_insert_term ) ) {
							update_term_meta( $wp_insert_term['term_id'], '_product_attributes' . $attribute_single_args['type'], $single_data );
						}
					}
				} else {
					foreach ( $attribute_single_args['data'] as $single_data_key => $single_data ) {
						wp_insert_term( $single_data, $attribute_single_args['taxonomy'] );
					}
				}
			}
		}
		// Attribute Creation Code ENDs
        // ------------ Our Products ------------

        set_theme_mod( 'vw_gardening_landscaping_pro_our_products_small_heading', 'Gardening Shop' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_products_heading', 'OUR PRODUCT' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_products_number', '8' );

        wp_insert_term(
			'Popular Products', // the term
			'product_cat', // the taxonomy
			array(
				'description' => 'This is Popular Products Category',
				'slug' => 'popular-products',
				'term_id' =>12,
				'term_taxonomy_id'	=>34,
			)
		);

        $productname = array('Air Plant','Artichoke','Gasteria','Cactus','Bonsai','Scarlet Star','Aluminum Plant','Easter Cactus','Arrowhead','Ceramic Pot','Jade Plant','Hand Fork','Gardening Water Can','Flaming Sword','Flaming Katy','Swiss Cheese Plant','Tool Kit');

        $_product_image_gallery = array();
		$_product_ids = array();

            for($i=1;$i<=14;$i++){
              $vw_title = $productname[$i-1];
              $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus.';

              // Create post object
              $my_post = array(
               'post_title'    => wp_strip_all_tags( $vw_title ),
               'post_content'  => $content,
               'post_status'   => 'publish',
               'post_type'     => 'product'
              );

              set_theme_mod( 'vw_gardening_landscaping_pro_products_category', 'popular-products' );

              // Insert the post into the database
              $vw_post_id = wp_insert_post( $my_post );
              array_push( $_product_ids, $vw_post_id );

              $vw_term = get_term_by( 'name', 'Popular Products', 'product_cat' );
			  wp_set_object_terms( $vw_post_id, $vw_term->term_id, 'product_cat' );

              update_post_meta( $vw_post_id, '_regular_price', "135" );
              update_post_meta( $vw_post_id, '_sale_price', "120" );
							update_post_meta( $vw_post_id, '_price', "120" );

              $image_url = get_template_directory_uri().'/assets/images/products/product'.$i.'.png';

              $image_name= 'product'.$i.'.png';
              $upload_dir       = wp_upload_dir();
              // Set upload folder
              $image_data       = file_get_contents($image_url);
              // Get image data
              $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
              // Generate unique name
              $filename= basename( $unique_file_name );
              // Create image file name
              // Check folder permission and define file location
              if( wp_mkdir_p( $upload_dir['path'] ) ) {
               $file = $upload_dir['path'] . '/' . $filename;
              } else {
                $file = $upload_dir['basedir'] . '/' . $filename;
              }
              // Create the image  file on the server
              file_put_contents( $file, $image_data );
              // Check image file type
              $wp_filetype = wp_check_filetype( $filename, null );
              // Set attachment data
              $attachment = array(
               'post_mime_type' => $wp_filetype['type'],
               'post_title'     => sanitize_file_name( $filename ),
               'post_content'   => '',
               'post_type'     => 'product',
               'post_status'    => 'inherit'
              );

              // Create the attachment
              $attach_id = wp_insert_attachment( $attachment, $file, $vw_post_id );
              // Include image.php
              require_once(ABSPATH . 'wp-admin/includes/image.php');
              // Define attachment metadata
              $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
              // Assign metadata to attachment
              wp_update_attachment_metadata( $attach_id, $attach_data );

			  // $wp_get_attachment_url = wp_get_attachment_url( $attach_id );
				if ( count( $_product_image_gallery ) < 3 ) {
					array_push( $_product_image_gallery, $attach_id );
				}
              // And finally assign featured image to post
              set_post_thumbnail( $vw_post_id, $attach_id );
            }

        // Add Gallery in first simple product and second variable product START
		$_product_image_gallery = implode( ',', $_product_image_gallery );
		foreach ( $_product_ids as $_product_id ) {
			update_post_meta( $_product_id, '_product_image_gallery', $_product_image_gallery );
		}
		// Add Gallery in first simple product and second variable product END

		// Variable Product Creation STARTS
		$post_id		=	$_product_ids[0];
		wp_set_object_terms( $post_id, 'variable', 'product_type' );

		if ( class_exists( 'WC_Meta_Box_Product_Data' ) && class_exists( 'WC_Product_Factory' ) ) {

			// Attribute Creation in new pattern
			$attribute_taxonomies = wc_get_attribute_taxonomies();
			$attributes_data_to_insert	=	array();
			$index = 0;
			foreach ( $attribute_taxonomies as $key => $attribute_taxonomy ) {

				$taxonomy_name	=	'pa_' . $attribute_taxonomy->attribute_name;
				$terms_by_taxonomy_name = get_terms( array(
					'taxonomy' 		=> 	$taxonomy_name,
					'hide_empty'	=> false
				) );
				if ( empty( $terms_by_taxonomy_name ) ) {
					continue;
				}

				$attributes_data_to_insert['attribute_names'][]				=	$taxonomy_name;
				$attributes_data_to_insert['attribute_position'][]		=	$index;
				foreach ( $terms_by_taxonomy_name as $term_by_taxonomy_name ) {
					$attributes_data_to_insert['attribute_values'][$index][]			=	$term_by_taxonomy_name->term_id;
				}
				$attributes_data_to_insert['attribute_visibility'][]	=	1;
				$attributes_data_to_insert['attribute_variation'][]		=	1;
				++$index;
			}

			$attributes   = WC_Meta_Box_Product_Data::prepare_attributes( $attributes_data_to_insert );
			$product_id 	= $post_id;
			$product_type	=	'variable';
			$classname    = WC_Product_Factory::get_product_classname( $product_id, $product_type );
			$product      = new $classname( $product_id );
			$product->set_attributes( $attributes );
			$product->save();
			// Attribute Creation in new pattern ends here

			// new product variation creation code.
			$product    = wc_get_product( $post_id );
			$data_store = $product->get_data_store();
			$data_store->create_all_product_variations( $product, 50 );
			$data_store->sort_all_product_variations( $product->get_id() );


			$product    = wc_get_product( $post_id );
			foreach( $product->get_children() as $variation_id ) {
				// 1. Updating the stock quantity
				update_post_meta( $variation_id, '_stock', 10 );
				// 2. Updating the stock quantity
				update_post_meta( $variation_id, '_stock_status', wc_clean( 'instock' ) );
				// 3. Updating post term relationship
				wp_set_post_terms( $variation_id, 'instock', 'product_visibility', true );
				// And finally (optionally if needed)

				// Updating active price and regular price
				update_post_meta( $variation_id, '_regular_price', '135' );
				update_post_meta( $variation_id, '_sale_price', "120" );
				update_post_meta( $variation_id, '_price', '120' );
				wc_delete_product_transients( $variation_id ); // Clear/refresh the variation cache
			}
			// Clear/refresh the variable product cache
			wc_delete_product_transients( $post_id );
			// Update the prices for all the variations ends here
		}
		// Variable Product Creation ENDS

        // -------------- Our Records -------------

        set_theme_mod( 'vw_gardening_landscaping_pro_our_products_records_image', get_template_directory_uri().'/assets/images/records/img.jpg' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_products_records_image_products','Alt Tab for Records Image' );
        $record_no=array('30','1345','65','85');
        $record_title=array('EXPERIENCE','PROJECT DONE','TEAM MEMBERS','AWARDS');
        for($i=1;$i<=4;$i++)
        {
          set_theme_mod( 'vw_gardening_landscaping_pro_our_products_records_icon'.$i, get_template_directory_uri().'/assets/images/records/icon'.$i.'.png' );
           set_theme_mod( 'vw_gardening_landscaping_pro_our_products_records_icon_alt_text'.$i,'Alt Tab for Records Icon'.$i);

          set_theme_mod( 'vw_gardening_landscaping_pro_our_products_record_no'.$i, $record_no[$i-1] );
          set_theme_mod( 'vw_gardening_landscaping_pro_our_products_record_title'.$i, $record_title[$i-1] );
          if($i==1)
          {
            set_theme_mod( 'vw_gardening_landscaping_pro_our_products_record_no_suffix'.$i,'+' );
          }
        }

        // -------------- Testimonials --------------

        set_theme_mod( 'vw_gardening_landscaping_pro_testimonial_bgimage', get_template_directory_uri().'/assets/images/testimonials/testimonialsbg.jpg' );
        set_theme_mod( 'vw_gardening_landscaping_pro_testimonial_small_heading', 'Happy Clients' );
        set_theme_mod( 'vw_gardening_landscaping_pro_testimonial_heading', 'OUR TESTIMONIALS' );
        set_theme_mod( 'vw_gardening_landscaping_pro_testimonial_number', 3 );

        for($i=1;$i<=3;$i++){

          $vw_title = 'James Martin';
          $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut. debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus.';

          // Create post object
          $my_post = array(
           'post_title'    => wp_strip_all_tags( $vw_title ),
           'post_content'  => $content,
           'post_status'   => 'publish',
           'post_type'     => 'testimonials',
          );

           // Insert the post into the database
          $vw_post_id = wp_insert_post( $my_post );

          update_post_meta( $vw_post_id,'meta-tes-facebookurl','https://www.facebook.com');
          update_post_meta( $vw_post_id,'meta-tes-linkdenurl','https://www.linkedin.com');
          update_post_meta( $vw_post_id,'meta-tes-twitterurl','https://www.twitter.com');
          update_post_meta( $vw_post_id,'meta-tes-googleplusurl','https://www.googleplus.com');
          update_post_meta( $vw_post_id,'meta-tes-instagram','https://www.instagram.com');
          update_post_meta( $vw_post_id,'meta-tes-pinterest','https://www.pinterest.com');
          update_post_meta( $vw_post_id,'vw_gardening_landscaping_pro_posttype_testimonial_desigstory','International Architect');

          $image_url = get_template_directory_uri().'/assets/images/testimonials/testimonialsimg1.png';

          $image_name= 'testimonials'.$i.'.jpg';
          $upload_dir       = wp_upload_dir();
          // Set upload folder
          $image_data       = file_get_contents($image_url);
          // Get image data
          $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
          // Generate unique name
          $filename= basename( $unique_file_name );
          // Create image file name
          // Check folder permission and define file location
          if( wp_mkdir_p( $upload_dir['path'] ) ) {
             $file = $upload_dir['path'] . '/' . $filename;
          } else {
             $file = $upload_dir['basedir'] . '/' . $filename;
          }
          // Create the image  file on the server
          file_put_contents( $file, $image_data );
          // Check image file type
          $wp_filetype = wp_check_filetype( $filename, null );
          // Set attachment data
          $attachment = array(
             'post_mime_type' => $wp_filetype['type'],
             'post_title'     => sanitize_file_name( $filename ),
             'post_content'   => '',
             'post_type'     => 'testimonials',
             'post_status'    => 'inherit'
          );

          // Create the attachment
          $attach_id = wp_insert_attachment( $attachment, $file, $vw_post_id );
          // Include image.php
          require_once(ABSPATH . 'wp-admin/includes/image.php');
          // Define attachment metadata
          $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
          // Assign metadata to attachment
           wp_update_attachment_metadata( $attach_id, $attach_data );
          // And finally assign featured image to post
          set_post_thumbnail( $vw_post_id, $attach_id );
          set_theme_mod( 'vw_gardening_landscaping_pro_posttype_testimonial_alt_text'.$i,'Alt tab for Testimonial Image'.$i);

        }

        // -------------- Our Team -------------

        set_theme_mod( 'vw_gardening_landscaping_pro_our_team_small_heading', 'Our Team' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_team_heading', 'OUR GARDENERS' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_team_number', 6);
        $teams=array('Amanda Leannon','Richard Peterson','Caroline Collins','Smith Doe','Richard Peterson','Caroline Collins');
        $team_desig=array('Manager','Landscaper','Landscaper','Landscaper','Manager','Landscaper');
        for($i=1;$i<=6;$i++){
          $vw_title = $teams[$i-1];
          $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus.';

          // Create post object
          $my_post = array(
           'post_title'    => wp_strip_all_tags( $vw_title ),
           'post_content'  => $content,
           'post_status'   => 'publish',
           'post_type'     => 'team',
          );

           // Insert the post into the database
          $vw_post_id = wp_insert_post( $my_post );

          update_post_meta( $vw_post_id,'meta-tfacebookurl','https://www.facebook.com');
          update_post_meta( $vw_post_id,'meta-tlinkdenurl','https://www.linkedin.com');
          update_post_meta( $vw_post_id,'meta-ttwitterurl','https://www.twitter.com');
          update_post_meta( $vw_post_id,'meta-tinstagram','https://www.instagram.com');
          update_post_meta( $vw_post_id,'meta-designation',$team_desig[$i-1]);

          $image_url = get_template_directory_uri().'/assets/images/team/teamsimg'.$i.'.png';

          $image_name= 'teamsimg'.$i.'.png';
          $upload_dir       = wp_upload_dir();
          // Set upload folder
          $image_data       = file_get_contents($image_url);
          // Get image data
          $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
          // Generate unique name
          $filename= basename( $unique_file_name );
          // Create image file name
          // Check folder permission and define file location
          if( wp_mkdir_p( $upload_dir['path'] ) ) {
             $file = $upload_dir['path'] . '/' . $filename;
          } else {
             $file = $upload_dir['basedir'] . '/' . $filename;
          }
          // Create the image  file on the server
          file_put_contents( $file, $image_data );
          // Check image file type
          $wp_filetype = wp_check_filetype( $filename, null );
          // Set attachment data
          $attachment = array(
             'post_mime_type' => $wp_filetype['type'],
             'post_title'     => sanitize_file_name( $filename ),
             'post_content'   => '',
             'post_type'     => 'team',
             'post_status'    => 'inherit'
          );

          // Create the attachment
          $attach_id = wp_insert_attachment( $attachment, $file, $vw_post_id );
          // Include image.php
          require_once(ABSPATH . 'wp-admin/includes/image.php');
          // Define attachment metadata
          $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
          // Assign metadata to attachment
           wp_update_attachment_metadata( $attach_id, $attach_data );
          // And finally assign featured image to post
          set_post_thumbnail( $vw_post_id, $attach_id );
          set_theme_mod( 'vw_gardening_landscaping_pro_our_team_image_alt_text'.$i,'Alt Tab for team image'.$i );
        }

        // -------------- Why Choose Us -----------

        set_theme_mod( 'vw_gardening_landscaping_pro_why_choose_us_bgimage', get_template_directory_uri().'/assets/images/chooseusbg.jpg' );
        set_theme_mod( 'vw_gardening_landscaping_pro_why_choose_us_small_heading', 'Gardening Choose' );
        set_theme_mod( 'vw_gardening_landscaping_pro_why_choose_us_heading', 'WHY CHOOSE US' );
        set_theme_mod( 'vw_gardening_landscaping_pro_why_choose_us_number', 4 );
        $why_title=array('OVER 30 YEARS OF EXPERIENCE','TRUE AQUATIC LANDSPACING SPECIALIST','HONEST AND DEPENDABLE','AWARD WINNING COMPANY SINCE 1986');
        $why_icon=array('fas fa-user','fas fa-leaf','fas fa-heart','fas fa-trophy');
        for($i=1;$i<=4;$i++)
        {
          set_theme_mod( 'vw_gardening_landscaping_pro_why_choose_us_feature_title'.$i, $why_title[$i-1] );
          set_theme_mod( 'vw_gardening_landscaping_pro_why_choose_us_feature_text'.$i,'Te obtinuit ut adepto satis somno. Aliisque institoribus iter.');
          set_theme_mod( 'vw_gardening_landscaping_pro_why_choose_us_feature_icon'.$i, $why_icon[$i-1] );
        }

        // -------------- Our Blog -----------

        set_theme_mod( 'vw_gardening_landscaping_pro_our_blog_small_heading', 'Our Blog' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_blog_heading', 'LATEST NEWS' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_blog_number', 2 );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_blog_link_title', 'LEARN MORE' );
        $vw_blog_title=array('WE WON THE BEST LANDSCAPE COMPANY','ADD VALUES TO YOUR PROPERTY','WE WON THE BEST LANDSCAPE COMPANY','ADD VALUES TO YOUR PROPERTY','WE WON THE BEST LANDSCAPE COMPANY','ADD VALUES TO YOUR PROPERTY','WE WON THE BEST LANDSCAPE COMPANY','ADD VALUES TO YOUR PROPERTY','WE WON THE BEST LANDSCAPE COMPANY','ADD VALUES TO YOUR PROPERTY','WE WON THE BEST LANDSCAPE COMPANY','ADD VALUES TO YOUR PROPERTY','WE WON THE BEST LANDSCAPE COMPANY','ADD VALUES TO YOUR PROPERTY','WE WON THE BEST LANDSCAPE COMPANY','ADD VALUES TO YOUR PROPERTY','WE WON THE BEST LANDSCAPE COMPANY');
        for($i=1;$i<=17;$i++){
          $vw_title = $vw_blog_title[$i-1];
          $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus.';

          // Create post object
          $my_post = array(
           'post_title'    => wp_strip_all_tags( $vw_title ),
           'post_content'  => $content,
           'post_status'   => 'publish',
           'post_type'     => 'post',
          );

           // Insert the post into the database
          $vw_post_id = wp_insert_post( $my_post );

          $image_url = get_template_directory_uri().'/assets/images/blogs/newsimg'.$i.'.png';

          $image_name= 'newsimg'.$i.'.png';
          $upload_dir       = wp_upload_dir();
          // Set upload folder
          $image_data       = file_get_contents($image_url);
          // Get image data
          $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
          // Generate unique name
          $filename= basename( $unique_file_name );
          // Create image file name
          // Check folder permission and define file location
          if( wp_mkdir_p( $upload_dir['path'] ) ) {
             $file = $upload_dir['path'] . '/' . $filename;
          } else {
             $file = $upload_dir['basedir'] . '/' . $filename;
          }
          // Create the image  file on the server
          file_put_contents( $file, $image_data );
          // Check image file type
          $wp_filetype = wp_check_filetype( $filename, null );
          // Set attachment data
          $attachment = array(
             'post_mime_type' => $wp_filetype['type'],
             'post_title'     => sanitize_file_name( $filename ),
             'post_content'   => '',
             'post_type'     => 'post',
             'post_status'    => 'inherit'
          );

          // Create the attachment
          $attach_id = wp_insert_attachment( $attachment, $file, $vw_post_id );
          // Include image.php
          require_once(ABSPATH . 'wp-admin/includes/image.php');
          // Define attachment metadata
          $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
          // Assign metadata to attachment
           wp_update_attachment_metadata( $attach_id, $attach_data );
          // And finally assign featured image to post
          set_post_thumbnail( $vw_post_id, $attach_id );
          set_theme_mod( 'vw_gardening_landscaping_pro_post_general_settings_post_alt_text'.$i,'Alt Tab for Latest News'.$i);
        }

        // -------------- Our Partners --------------

        set_theme_mod( 'vw_gardening_landscaping_pro_our_blog_partners_main_image', get_template_directory_uri().'/assets/images/partners/newsimg.jpg' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_blog_partners_main_image_alt_text','Alt Tab for Main Partners images' );

        set_theme_mod( 'vw_gardening_landscaping_pro_our_blog_partners_number', 4 );
        for($i=1;$i<=4;$i++)
        {
          set_theme_mod( 'vw_gardening_landscaping_pro_our_blog_partners_image'.$i, get_template_directory_uri().'/assets/images/partners/newsicon'.$i.'.png' );
           set_theme_mod( 'vw_gardening_landscaping_pro_our_blog_partners_image_alt_text'.$i,'Alt Tab for Partners images'.$i );
        }

        // ----------Contact Page------------
       	set_theme_mod( 'vw_gardening_landscaping_pro_contact_info_bgimage', get_template_directory_uri().'/assets/images/contact/contact-info.jpg' );
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_info_small_head', 'GET IN TOUCH' );
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_info_head', 'Here to Help You' );
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_info_add_img', get_template_directory_uri().'/assets/images/contact/contact-icon1.png' );
        //Longitude
        set_theme_mod( 'vw_gardening_landscaping_pro_address_longitude', '-80.053361' );
        //Latitude
        set_theme_mod( 'vw_gardening_landscaping_pro_address_latitude', '26.704241' );
        //Email Title text
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_info_add_head', 'Main Office Address ' );
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_info_address', 'Room 501, 5th Floor, 169 Nguyen Ngoc Vu Str, Cau Giay, Hanoi.' );
        // 
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_info_email_phone_img', get_template_directory_uri().'/assets/images/contact/contact-icon2.png' );
        //Email ID
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_info_email_phone_title', 'Phone & Email' );
        //Address Title text
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_info_email_phone_num', '+01123456789' );
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_info_email_address', 'demogardening@gmail.com' );
        // 
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_info_time_img', get_template_directory_uri().'/assets/images/contact/contact-icon3.png' );
        //Address
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_info_time_title', 'Working Hours' );
        //Phone Title text
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_info_time_one', 'Mon-Friday: 09am to 07pm' );
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_info_time_two', 'Sat: 10.00am to 04pm' );
        //  Contact Page Form
        set_theme_mod( 'vw_gardening_landscaping_pro_contact_form_bgimage', get_template_directory_uri().'/assets/images/contact/contact-form-bg.jpg' );
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_form_small_head', 'DROP A LINE' );
        set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_form_head', 'Send Message Us' );

      	// contact form shortcode
      	// contact form shortcode
		$cf7title = "Contact Page";
		$cf7content = '[text* your-name placeholder "Your Name"]

		[email* your-email placeholder "Your Email"]


		[text* your-subject placeholder "Your Subject"]

		[textarea your-message placeholder "Your Messsage"]

		[submit "SUBMIT NOW"]
		[_site_title] "[your-subject]"
		[_site_title] <vowelweb79@gmail.com>
		From: [your-name] <[your-email]>
		Subject: [your-subject]

		Message Body:
		[your-message]

		--
		This e-mail was sent from a contact form on [_site_title] ([_site_url])
		[_site_admin_email]
		Reply-To: [your-email]

		0
		0

		[_site_title] "[your-subject]"
		[_site_title] <vowelweb79@gmail.com>
		Message Body:
		[your-message]

		--
		This e-mail was sent from a contact form on [_site_title] ([_site_url])
		[your-email]
		Reply-To: [_site_admin_email]

		0
		0
		Thank you for your message. It has been sent.
		There was an error trying to send your message. Please try again later.
		One or more fields have an error. Please check and try again.
		There was an error trying to send your message. Please try again later.
		You must accept the terms and conditions before sending your message.
		The field is required.
		The field is too long.
		The field is too short.
		There was an unknown error uploading the file.
		You are not allowed to upload files of this type.
		The file is too big.
		There was an error uploading the file.';

		$cf7_post = array(
			'post_title'    => wp_strip_all_tags( $cf7title ),
			'post_content'  => $cf7content,
			'post_status'   => 'publish',
			'post_type'     => 'wpcf7_contact_form',
		);
		// Insert the post into the database
		$cf7post_id = wp_insert_post( $cf7_post );

		add_post_meta(
			$cf7post_id,
			"_form",
			'[text* your-name placeholder "Your Name"]

			[email* your-email placeholder "Your Email"]


			[text* your-subject placeholder "Your Subject"]

			[textarea your-message placeholder "Your Messsage"]

			[submit "SUBMIT NOW"]'
		);

		$cf7mail_data  = array(
			'subject'	=> '[_site_title] "[your-subject]"',
			'sender' 	=> '[_site_title] <vowelweb79@gmail.com>',
			'body' 		=> 'From: [your-name] <[your-email]>
			Subject: [your-subject]

			Message Body:
			[your-message]

			--
			This e-mail was sent from a contact form on [_site_title] ([_site_url])',
			'recipient' 					=> '[_site_admin_email]',
			'additional_headers'	=> 'Reply-To: [your-email]',
			'attachments' 				=> '',
			'use_html' 						=> 0,
			'exclude_blank' 			=> 0
		);

		add_post_meta($cf7post_id, "_mail", $cf7mail_data);
		// Gets term object from Tree in the database.

		$cf7shortcode = '[contact-form-7 id="'.$cf7post_id.'" title="'.$cf7title.'"]';

		set_theme_mod( 'vw_gardening_landscaping_pro_contactpage_form_code',$cf7shortcode );

		// print_r($cf7shortcode);
		// exit;


        // footer
        set_theme_mod( 'vw_gardening_landscaping_pro_footer_footer_logo', get_template_directory_uri().'/assets/images/footer-logo.png' );
        set_theme_mod( 'vw_gardening_landscaping_pro_footer_footer_logo_alt_text','Alt Tab for footer Image logo' );

        //footer text
        //Copyright Text
        set_theme_mod( 'vw_gardening_landscaping_pro_footer_copy', 'Gardening WordPress Theme 2021' );

          /* ------------- Responsive Media Settings ------------ */

          set_theme_mod( 'vw_gardening_landscaping_pro_res_open_menu_icon', 'fas fa-bars' );
          set_theme_mod( 'vw_gardening_landscaping_pro_res_close_menus_icon', 'fas fa-times' );
           //post setting
          set_theme_mod( 'vw_gardening_landscaping_pro_related_posts_title', 'Related Posts' );
          set_theme_mod( 'vw_gardening_landscaping_pro_related_post_count', 3 );
          set_theme_mod( 'vw_gardening_landscaping_pro_blog_category_prev_title', 'Previous' );
          set_theme_mod( 'vw_gardening_landscaping_pro_blog_category_next_title', 'Next' );

        //Shortcode
        set_theme_mod( 'vw_gardening_landscaping_pro_shortcode', '[vw-gardening-landscaping-pro-services],[vw-gardening-landscaping-pro-projects],[vw-gardening-landscaping-pro-testimonials],[vw-gardening-landscaping-pro-team]' );

        // 404 Page
        set_theme_mod( 'vw_gardening_landscaping_pro_404_page_image', get_template_directory_uri().'/assets/images/404-img.png' );
        set_theme_mod( 'vw_gardening_landscaping_pro_404_page_title', 'Oops!' );
        set_theme_mod( 'vw_gardening_landscaping_pro_404_page_text', 'Sorry, The page you are looking for no longer exists.' );
        set_theme_mod( 'vw_gardening_landscaping_pro_404_page_btn', 'Back to Home' );

        // About Us template
        set_theme_mod( 'vw_gardening_pro_about_temp_title', 'WELCOME TO GARDENER' );
        set_theme_mod( 'vw_gardening_pro_about_temp_text', 'Duis blandit at lectus accumsan ultricies. Curabitur enim leo, mollis ut luctus quis, porta eu justo. Suspendisse eu enim nulla. Phasellus ac risus elementum, bibendum lacus eu, consectetur felis. Vestibulum eu aliquet dui, vel tincidunt lectus. In vel pulvinar nisl, eget elementum neque. Phasellus nec purus ultrices, sodales est id, vehicula lacus. Ut tincidunt leo quis mauris ultricies ultricies. Donec luctus odio a tristique malesuada. Nunc viverra metus ut neque luctus, sed tristique tortor volutpat.' );
        set_theme_mod( 'vw_gardening_pro_about_temp_img', get_template_directory_uri().'/assets/images/about-template/about-us.jpg' );
        // About Service
        set_theme_mod( 'vw_gardening_pro_about_temp_exp_srv_small_head', 'EXCEPTIONAL' );
        set_theme_mod( 'vw_gardening_pro_about_temp_exp_srv_head', 'Services We Offer' );
        set_theme_mod( 'vw_gardening_landscaping_pro_abt_temp_serv_count', '4' );

        $servname = array('Inspiring Landscape Design','Pruning & Weeding Services','Skillful Gardening','Tools & Implements' );
        for ($i=1; $i <=4 ; $i++) { 
        	set_theme_mod( 'vw_gardening_landscaping_pro_abt_temp_serv_exp_img'.$i, get_template_directory_uri().'/assets/images/about-template/servicon'.$i.'.png' );
        	set_theme_mod( 'vw_gardening_landscaping_pro_abt_serv_exp_title'.$i,$servname[$i-1] );
        	set_theme_mod( 'vw_gardening_landscaping_pro_abt_serv_exp_text'.$i,'Praesent vulputate eros eu sapien aliquam fringilla.Integer imperdiet orci accumsan, sagittis justo non, mollis justo' );
        }
        // Why we best
        set_theme_mod( 'vw_gardening_landscaping_pro_why_best_img', get_template_directory_uri().'/assets/images/about-template/why-best-img.jpg' );
        set_theme_mod( 'vw_gardening_landscaping_pro_abt_temp_why_best_small_title', 'WHY ARE WE THE BEST?' );
        set_theme_mod( 'vw_gardening_landscaping_pro_abt_temp_why_best_head', 'Our Clients Love Us Here’s Why' );
        set_theme_mod( 'vw_gardening_landscaping_pro_abt_temp_why_best_count', '4' );
        $bestname = array('Creative ideas','Customer Focused','Available 24/7','Free quotation' );
        $besttext = array('Donec vulputate eros a nibh venenatis blandit. Vivamus pharetra.','Fusce sed libero vitae justo mollis consectetur ac et mi Curabitur.','Aliquam bibendum vel ipsum sit amet commodo. Curabitur porta ornare.','Fusce sed libero vitae justo mollis consectetur ac et mi Curabitur.' );
        for ($i=1; $i <=4; $i++) { 
        	set_theme_mod( 'vw_gardening_landscaping_pro_abt_temp_why_best_img'.$i, get_template_directory_uri().'/assets/images/about-template/bestion'.$i.'.png' );
        	set_theme_mod( 'vw_gardening_landscaping_pro_abt_temp_why_best_title'.$i,$bestname[$i-1] );
        	set_theme_mod( 'vw_gardening_landscaping_pro_abt_temp_why_best_text'.$i,$besttext[$i-1] );
        }

        // faq
        set_theme_mod( 'vw_gardening_landscaping_pro_faq_heading', 'Frequently Ask Questions' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_faq_number', '6' );
        $faqname = array('1. When can we get started?','2. How do I get in touch with you?','3. What documents do I need to start?','4. How much does it cost?','5. What other help is available?','6. Are you fully insured?' );
        for ($i=1; $i<=6; $i++) { 
        	set_theme_mod( 'vw_gardening_landscaping_pro_our_faq_title'.$i,$faqname[$i-1]);
        	set_theme_mod( 'vw_gardening_landscaping_pro_our_faq_text'.$i, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.' );
        }

        set_theme_mod( 'vw_gardening_landscaping_pro_faq_heading2', 'Additional Services' );
        set_theme_mod( 'vw_gardening_landscaping_pro_our_faq_number2', '4' );
        set_theme_mod( 'vw_gardening_landscaping_faq_box_img', get_template_directory_uri().'/assets/images/faq.jpg' );
        $faqname = array('1. Do you offer planting services?','2. Do I need two gardeners, can\'t I have just one?','3. Do you work on Sundays/Bank holidays?','4. How can I schedule a service with you?' );
        for ($i=1; $i<=4; $i++) { 
        	set_theme_mod( 'vw_gardening_landscaping_pro_our_faq_title2'.$i,$faqname[$i-1]);
        	set_theme_mod( 'vw_gardening_landscaping_pro_our_faq_text2'.$i, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.' );
        }

        // services Template
        set_theme_mod( 'vw_gardening_landscaping_pro_serv_temp_service_small_tiltle', 'OUR SERVICES' );
        set_theme_mod( 'vw_gardening_landscaping_pro_serv_temp_service_tiltle', 'We keep your garden in full health' );

        $serv_title = array('Lawn & Garden Care','Irrigation & Drainage','Planting & Removal','Snow & Ice Removal','Spring & Fall Cleanup','Stone & Hardscaping' );
        set_theme_mod( 'vw_gardening_landscaping_pro_serv_temp_service_count', '6' );
        for ($i=1; $i<=6; $i++) { 
        	set_theme_mod( 'vw_gardening_landscaping_pro_serv_temp_service_img'.$i, get_template_directory_uri().'/assets/images/service-template/serv-icon'.$i.'.png' );
        	set_theme_mod( 'vw_gardening_landscaping_pro_serv_temp_service_head'.$i,$serv_title[$i-1] );
        	set_theme_mod( 'vw_gardening_landscaping_pro_serv_temp_service_head_url'.$i,'#' );
        	set_theme_mod( 'vw_gardening_landscaping_pro_serv_temp_service_text'.$i,'Nunc a dui at orci tincidunt pulvinar vel nec libero.' );
        }
        set_theme_mod( 'vw_gardening_landscaping_pro_service_temp_serv_feature_head', 'Services Features' );
        set_theme_mod( 'vw_gardening_landscaping_pro_service_temp_service_feature_shortcode', '[vw-gardening-landscaping-pro-services]' );

        // footer newsletter
        // Shortcode
		// contact form shortcode
		$cf7title = "Newsletter";
		$cf7content = '[email* your-email placeholder "Your Email"] <div class= "news-btn">[submit "Subscribe"]</div>
		[_site_title] "[your-subject]"
		[_site_title] <vowelweb79@gmail.com>
		From: [your-name] <[your-email]>
		Subject: [your-subject]

		Message Body:
		[your-message]

		--
		This e-mail was sent from a contact form on [_site_title] ([_site_url])
		[_site_admin_email]
		Reply-To: [your-email]

		0
		0

		[_site_title] "[your-subject]"
		[_site_title] <vowelweb79@gmail.com>
		Message Body:
		[your-message]

		--
		This e-mail was sent from a contact form on [_site_title] ([_site_url])
		[your-email]
		Reply-To: [_site_admin_email]

		0
		0
		Thank you for your message. It has been sent.
		There was an error trying to send your message. Please try again later.
		One or more fields have an error. Please check and try again.
		There was an error trying to send your message. Please try again later.
		You must accept the terms and conditions before sending your message.
		The field is required.
		The field is too long.
		The field is too short.
		There was an unknown error uploading the file.
		You are not allowed to upload files of this type.
		The file is too big.
		There was an error uploading the file.';

		$cf7_post = array(
			'post_title'    => wp_strip_all_tags( $cf7title ),
			'post_content'  => $cf7content,
			'post_status'   => 'publish',
			'post_type'     => 'wpcf7_contact_form',
		);
		// Insert the post into the database
		$cf7post_id = wp_insert_post( $cf7_post );

		add_post_meta( $cf7post_id, "_form", '[email* your-email placeholder "Your Email"] <div class= "news-btn">[submit "Subscribe"]</div>' );

		$cf7mail_data  = array(
			'subject' => '[_site_title] "[your-subject]"',
			'sender' => '[_site_title] <vowelweb79@gmail.com>',
			'body' => 'From: [your-name] <[your-email]>
			Subject: [your-subject]

			Message Body:
			[your-message]

			--
			This e-mail was sent from a contact form on [_site_title] ([_site_url])',
	    'recipient' => '[_site_admin_email]',
	    'additional_headers' => 'Reply-To: [your-email]',
	    'attachments' => '',
	    'use_html' => 0,
	    'exclude_blank' => 0
		);

		add_post_meta($cf7post_id, "_mail", $cf7mail_data);
		          // Gets term object from Tree in the database.

		$cf7shortcode = '[contact-form-7 id="'.$cf7post_id.'" title="'.$cf7title.'"]';

		// print_r($cf7shortcode);
		// exit;

        $this->theme_create_customizer_primary_nav_menu();
        $this->theme_create_customizer_footer_widgets_nav_menu();

        $VW_Widget_Importer = new VW_Widget_Importer;
		$VW_Widget_Importer->import_widgets( $this->widget_file_url );

        exit;
	}

	public function wz_activate_vw_gardening_landscaping_pro() {
		$vw_gardening_landscaping_pro_license_key = $_POST['vw_gardening_landscaping_pro_license_key'];

		$endpoint = IBTANA_THEME_LICENCE_ENDPOINT.'ibtana_client_activate_premium_theme';

		$body = [
			'theme_license_key'  => $vw_gardening_landscaping_pro_license_key,
			'site_url'					 => site_url(),
			'theme_text_domain'	 => wp_get_theme()->get( 'TextDomain' )
		];
		$body = wp_json_encode( $body );
		$options = [
			'body'        => $body,
			'headers'     => [
				'Content-Type' => 'application/json',
			]
		];
		$response = wp_remote_post( $endpoint, $options );
		if ( is_wp_error( $response ) ) {
			ThemeWhizzie::remove_the_theme_key();
			ThemeWhizzie::set_the_validation_status('false');
			$response = array('status' => false, 'msg' => 'Something Went Wrong!');
			wp_send_json($response);
			exit;
		} else {
			$response_body = wp_remote_retrieve_body( $response );
			$response_body = json_decode($response_body);

			if ( $response_body->is_suspended == 1 ) {
				ThemeWhizzie::set_the_suspension_status( 'true' );
			} else {
				ThemeWhizzie::set_the_suspension_status( 'false' );
			}

			if ($response_body->status === false) {
				ThemeWhizzie::remove_the_theme_key();
				ThemeWhizzie::set_the_validation_status('false');
				$response = array('status' => false, 'msg' => $response_body->msg);
				wp_send_json($response);
				exit;
			} else {
				ThemeWhizzie::set_the_validation_status('true');
				ThemeWhizzie::set_the_theme_key($vw_gardening_landscaping_pro_license_key);
				$response = array('status' => true, 'msg' => 'Theme Activated Successfully!');
				wp_send_json($response);
				exit;
			}
		}
	}

	/**
	 * Imports Builder Demo Content
	 * @since 1.1.0
	 */
	public function setup_builder() {
		$buildercontent = '';
		$resp_slug = '';
		$json_theme = array('base_theme_text_domain' => 'vw-gardening-landscaping');
	    $json_args = array(
	        'method' => 'POST',
	        'headers'     => array(
	            'Content-Type'  => 'application/json'
	        ),
	        'body' => json_encode($json_theme),
	    );

	    $request_data = wp_remote_post( IBTANA_THEME_LICENCE_ENDPOINT.'get_client_ibtana_premium_theme_json_with_inner_pages',$json_args);
	    $response_json = json_decode(wp_remote_retrieve_body( $request_data));

	    // echo '<pre>'; print_r($response_json->data); echo '</pre>';

	     foreach($response_json->data as $resp_json) {
				 $resp_slug = $resp_json->slug ;
				 $json_theme1 = array('premium_template_slug' => $resp_slug);
				 $json_args1 = array(
					 'method' => 'POST',
					 'headers'     => array(
						 'Content-Type'  => 'application/json'
					 ),
					 'body' => json_encode($json_theme1),
				 );

				 $request_data1 = wp_remote_post( IBTANA_THEME_LICENCE_ENDPOINT.'get_client_ibtana_premium_theme_json',$json_args1);
			   $response_json1 = json_decode(wp_remote_retrieve_body( $request_data1));

	       $buildercontent = $response_json1->data;
	       // echo '<pre>'; print_r($buildercontent); echo '</pre>';

	       if($resp_json->page_type=='template'){
					 $page_title = 'Home Page';
				 }else{
					 $page_title = $resp_json->page_type;
				 }

				 $page_slug = $resp_json->slug;

	       $page_check = get_page_by_title($page_title);
	       $vw_page = array(
					 'post_type' => 'page',
					 'post_title' => $page_title,
					 'post_content'  => $buildercontent,
					 'post_status' => 'publish',
					 'post_author' => 1,
					 'post_slug' => $page_slug
				 );

	       if($resp_json->page_type=='template'){
					 $home_id = wp_insert_post(wp_slash($vw_page));
					 add_post_meta( $home_id, '_wp_page_template', 'page-template/ibtana-template.php' );

					 $home_b = get_page_by_title( 'Home Page' );

					 update_option( 'page_on_front', $home_b->ID );
					 update_option( 'show_on_front', 'page' );
				 }
			 }

		$json_theme1 = array('premium_template_slug' => $resp_slug);
	    $json_args1 = array(
	        'method' => 'POST',
	        'headers'     => array(
	            'Content-Type'  => 'application/json'
	        ),
	        'body' => json_encode($json_theme1),
	    );

	    $request_data1 = wp_remote_post( IBTANA_THEME_LICENCE_ENDPOINT.'get_client_ibtana_premium_theme_json',$json_args1);
	    $response_json1 = json_decode(wp_remote_retrieve_body( $request_data1));
/*	    print_r($response_json1->data);
*/
       	$buildercontent = $response_json1->data;

       	set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_phone_icon', 'fas fa-phone-alt' );
		set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_phone_no_title', 'Toll Free:' );
		set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_phone_no', '+123-445-6789' );

		set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_email_icon', 'fas fa-envelope-open' );
		set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_email_title', 'EMAIL' );
		set_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_email_id', 'demotrainer@gmail.com' );
        /*customizer-part-social-icons.php*/
        //twitter link
        set_theme_mod( 'vw_gardening_landscaping_pro_headertwitter', 'https://twitter.com/' );
        //facebook link
        set_theme_mod( 'vw_gardening_landscaping_pro_headerfacebook', 'https://www.facebook.com/' );
        //GooglePlus link
        set_theme_mod( 'vw_gardening_landscaping_pro_headeryoutube', 'https://www.youtube.com/' );
        //GooglePlus link
        set_theme_mod( 'vw_gardening_landscaping_pro_headerpinterest', 'https://www.pinterest.com/' );
        //Pinterest link
        set_theme_mod( 'vw_gardening_landscaping_pro_headerpinterest', 'https://www.pinterest.com/' );
        //Instagram link
        set_theme_mod( 'vw_gardening_landscaping_pro_headerinstagram', 'https://www.instagram.com/' );
        //Linkldein link
        set_theme_mod( 'vw_gardening_landscaping_pro_headerlinkedin', 'https://www.linkedin.com/' );
       	//blog for loop
       	$vw_blog_title=array('WE WON THE BEST LANDSCAPE COMPANY','ADD VALUES TO YOUR PROPERTY');
       	for($i=1;$i<=2;$i++){
          $vw_title = $vw_blog_title[$i-1];
          $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus.';

          // Create post object
          $my_post = array(
           'post_title'    => wp_strip_all_tags( $vw_title ),
           'post_content'  => $content,
           'post_status'   => 'publish',
           'post_type'     => 'post',
          );

           // Insert the post into the database
          $vw_post_id = wp_insert_post( $my_post );

          $image_url = get_template_directory_uri().'/assets/images/blogs/newsimg'.$i.'.jpg';

          $image_name= 'our-blog'.$i.'.jpg';
          $upload_dir       = wp_upload_dir();
          // Set upload folder
          $image_data       = file_get_contents($image_url);
          // Get image data
          $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
          // Generate unique name
          $filename= basename( $unique_file_name );
          // Create image file name
          // Check folder permission and define file location
          if( wp_mkdir_p( $upload_dir['path'] ) ) {
             $file = $upload_dir['path'] . '/' . $filename;
          } else {
             $file = $upload_dir['basedir'] . '/' . $filename;
          }
          // Create the image  file on the server
          file_put_contents( $file, $image_data );
          // Check image file type
          $wp_filetype = wp_check_filetype( $filename, null );
          // Set attachment data
          $attachment = array(
             'post_mime_type' => $wp_filetype['type'],
             'post_title'     => sanitize_file_name( $filename ),
             'post_content'   => '',
             'post_type'     => 'post',
             'post_status'    => 'inherit'
          );

          // Create the attachment
          $attach_id = wp_insert_attachment( $attachment, $file, $vw_post_id );
          // Include image.php
          require_once(ABSPATH . 'wp-admin/includes/image.php');
          // Define attachment metadata
          $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
          // Assign metadata to attachment
           wp_update_attachment_metadata( $attach_id, $attach_data );
          // And finally assign featured image to post
          set_post_thumbnail( $vw_post_id, $attach_id );
          set_theme_mod( 'vw_gardening_landscaping_pro_post_general_settings_post_alt_text'.$i,'Alt Tab for Latest News'.$i);
        }

		for($i=1;$i<=4;$i++){
		  $vw_title = 'Product Title '.$i;
		  $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus.';

		  // Create post object
		  $my_post = array(
		   'post_title'    => wp_strip_all_tags( $vw_title ),
		   'post_content'  => $content,
		   'post_status'   => 'publish',
		   'post_type'     => 'product'

		  );

		  // Insert the post into the database
		  $vw_post_id = wp_insert_post( $my_post );

		  update_post_meta( $vw_post_id, '_regular_price', "135" );
		  update_post_meta( $vw_post_id, '_sale_price', "120" );
		  update_post_meta( $vw_post_id, '_price', "120" );

		  $image_url = get_template_directory_uri().'/assets/images/products/product'.$i.'.jpg';

		  $image_name= 'our-products'.$i.'.jpg';
		  $upload_dir       = wp_upload_dir();
		  // Set upload folder
		  $image_data       = file_get_contents($image_url);
		  // Get image data
		  $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
		  // Generate unique name
		  $filename= basename( $unique_file_name );
		  // Create image file name
		  // Check folder permission and define file location
		  if( wp_mkdir_p( $upload_dir['path'] ) ) {
		   $file = $upload_dir['path'] . '/' . $filename;
		  } else {
		    $file = $upload_dir['basedir'] . '/' . $filename;
		  }
		  // Create the image  file on the server
		  file_put_contents( $file, $image_data );
		  // Check image file type
		  $wp_filetype = wp_check_filetype( $filename, null );
		  // Set attachment data
		  $attachment = array(
		   'post_mime_type' => $wp_filetype['type'],
		   'post_title'     => sanitize_file_name( $filename ),
		   'post_content'   => '',
		   'post_type'     => 'product',
		   'post_status'    => 'inherit'
		  );

		  // Create the attachment
		  $attach_id = wp_insert_attachment( $attachment, $file, $vw_post_id );
		  // Include image.php
		  require_once(ABSPATH . 'wp-admin/includes/image.php');
		  // Define attachment metadata
		  $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
		  // Assign metadata to attachment
		  wp_update_attachment_metadata( $attach_id, $attach_data );

		  // And finally assign featured image to post
		  set_post_thumbnail( $vw_post_id, $attach_id );
		}

		$home_id; $blog_id=''; $contact_id=''; $page_id= '';$page_title='';
		$page_slug=''; global $home_b;

		$page_title = 'Home Page';
		$page_slug = 'home-page';

       	$page_check = get_page_by_title($page_title);
       	$vw_page = array(
       		'post_type' => 'page',
       		'post_title' => $page_title,
       		'post_content'  => $buildercontent,
       		'post_status' => 'publish',
       		'post_author' => 1,
       		'post_slug' => $page_slug
       	);
       	$home_id = wp_insert_post(wp_slash($vw_page));

		$home_b = get_page_by_title( 'Home Page' );

       	update_option( 'page_on_front', $home_b->ID );
       	update_option( 'show_on_front', 'page' );


        // Create a blog page and assigned the template
        $blog_title = 'Blog';
        $blog = array(
             'post_type' => 'page',
             'post_title' => $blog_title,
             'post_status' => 'publish',
             'post_author' => 1,
             'post_slug' => 'blog'
        );
        $blog_id = wp_insert_post($blog);


        //Set the blog page template
        add_post_meta( $blog_id, '_wp_page_template', 'page-template/blog-fullwidth-extend.php' );


        // Create a Page
        if( get_page_by_title( 'Page' ) == NULL ){
         	$page_title = 'Page ';
         	$content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel';

         	$page_check = get_page_by_title($page_title);
        	$vw_page = array(
	         	'post_type' => 'page',
	         	'post_title' => $page_title,
	         	'post_content'  => $content,
	         	'post_status' => 'publish',
	         	'post_author' => 1,
	         	'post_slug' => 'page'
        	);
       		$page_id = wp_insert_post($vw_page);
         }

        // Create a contact page and assigned the template
        $contact_title = 'Contact';
        $contact = array(
          'post_type' => 'page',
          'post_title' => $contact_title,
          'post_status' => 'publish',
          'post_author' => 1,
          'post_slug' => 'contact'
        );
 		$contact_id = wp_insert_post($contact);

        //Set the blog with right sidebar template
        add_post_meta( $contact_id, '_wp_page_template', 'page-template/contact.php' );
        if(isset($home_b->ID)){
        	echo json_encode(['home_page_id'=>$home_b->ID,'home_page_url'=>get_edit_post_link( $home_b->ID, '' )]);
        }

       	$VW_Widget_Importer = new VW_Widget_Importer;
		$VW_Widget_Importer->import_widgets( $this->widget_file_url );

		exit;

	}

	// ------------ Ibtana Activation Close -----------


	//guidline for about theme
	public function vw_gardening_landscaping_pro_mostrar_guide() {

		$display_string = '';

		// Check the validation Start
		$vw_gardening_landscaping_pro_license_key = ThemeWhizzie::get_the_theme_key();
		$endpoint = IBTANA_THEME_LICENCE_ENDPOINT.'ibtana_client_premium_theme_check_activation_status';
		$body = [
			'theme_license_key'  => $vw_gardening_landscaping_pro_license_key,
			'site_url'					 => site_url(),
			'theme_text_domain'	 => wp_get_theme()->get( 'TextDomain' )
		];
		$body = wp_json_encode( $body );
		$options = [
			'body'        => $body,
			'headers'     => [
				'Content-Type' => 'application/json',
			]
		];
		$response = wp_remote_post( $endpoint, $options );
		if ( is_wp_error( $response ) ) {
			// ThemeWhizzie::set_the_validation_status('false');
		} else {
			$response_body = wp_remote_retrieve_body( $response );
			$response_body = json_decode($response_body);

			if ( $response_body->is_suspended == 1 ) {
				ThemeWhizzie::set_the_suspension_status( 'true' );
			} else {
				ThemeWhizzie::set_the_suspension_status( 'false' );
			}

			$display_string = isset($response_body->display_string) ? $response_body->display_string : '';

			if ($display_string != '') {
				if (strpos($display_string, '[THEME_NAME]') !== false) {
					$display_string = str_replace("[THEME_NAME]", "VW Gardening landscaping Pro", $display_string);
				}
				if (strpos($display_string, '[THEME_PERMALINK]') !== false) {
					$display_string = str_replace("[THEME_PERMALINK]", "https://www.vwthemes.com/themes/bakery-wordpress-theme/", $display_string);
				}
				echo '<div class="notice is-dismissible error thb_admin_notices">' . $display_string . '</div>';
			}			

			if ($response_body->status === false) {
				ThemeWhizzie::set_the_validation_status('false');
			} else {
				ThemeWhizzie::set_the_validation_status('true');
			}
		}
		// Check the validation END

		$theme_validation_status = ThemeWhizzie::get_the_validation_status();

		//custom function about theme customizer
		$return = add_query_arg( array()) ;
		$theme = wp_get_theme( 'vw-gardening-landscaping-pro' );

		?>

		<div class="wrapper-info get-stared-page-wrap">

			<div class="wrapper-info-content">
				<h2><?php _e( 'Welcome to VW Gardening landscaping Pro', 'vw-gardening-landscaping-pro' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
				<p><?php _e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, block based and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-gardening-landscaping-pro'); ?></p>
			</div>
			<div class="tab-sec theme-option-tab">
				<div class="tab">
					<button class="tablinks active" onclick="openCity(event, 'theme_activation')" data-tab="theme_activation"><?php _e( 'Key Activation', 'vw-gardening-landscaping-pro' ); ?></button>
					<button class="tablinks wizard-tab" onclick="openCity(event, 'demo_offer')" data-tab="demo_offer"><?php _e( 'Setup Wizard', 'vw-gardening-landscaping-pro' ); ?></button>
					<button class="tablinks" onclick="openCity(event, 'theme_info')" data-tab="theme_info"><?php _e( 'Support', 'vw-gardening-landscaping-pro' ); ?></button>
					<button class="tablinks" onclick="openCity(event, 'plugins')" data-tab="plugins"><?php _e( 'Plugins', 'vw-gardening-landscaping-pro' ); ?></button>
					<button class="tablinks other-product-tab" onclick="openCity(event, 'others_theme')"><?php esc_html_e( 'All Themes', 'vw-gardening-landscaping-pro' ); ?></button>
				</div>

				<!-- Tab content -->
				<div id="theme_activation" class="tabcontent open">

					<div class="theme_activation-wrapper">
						<span class="theme-license-message"><?php esc_html_e('Check your theme license key in ','vw-gardening-landscaping-pro'); ?>
						<a href="<?php echo esc_url('https://www.vwthemes.com/my-account/'); ?>" target="_blank"><?php esc_html_e(' My Account','vw-gardening-landscaping-pro'); ?></a>
						</span>
						<div class="theme_activation_spinner">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
								<g transform="translate(50,50)">
								  <g transform="scale(0.7)">
								  <circle cx="0" cy="0" r="50" fill="#0f81d0"></circle>
								  <circle cx="0" cy="-28" r="15" fill="#cfd7dd">
								    <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 0 0;360 0 0"></animateTransform>
								  </circle>
								  </g>
								</g>
							</svg>
						</div>
						<div class="theme-wizard-key-status">
							<?php
								if ( $theme_validation_status === 'false' ) {
									esc_html_e('Theme License Key is not activated!','vw-gardening-landscaping-pro');
								} else {
									esc_html_e('Theme License is Activated!','vw-gardening-landscaping-pro');
								}
							?>
						</div>
						<?php $this->activation_page(); ?>
					</div>
				</div>
				<div id="demo_offer" class="tabcontent">
					<?php $this->wizard_page(); ?>
				</div>
				<div id="theme_info" class="tabcontent">
					<div class="col-left-inner">
						<h3><?php _e( 'VW Gardening landscaping Pro Information', 'vw-gardening-landscaping-pro' ); ?></h3>
						<hr class="h3hr">
						<h4><?php _e( 'Theme Documentation', 'vw-gardening-landscaping-pro' ); ?></h4>
						<p><?php _e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-gardening-landscaping-pro' ); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_PRO_THEME_DOC ); ?>" target="_blank"> <?php _e( 'Documentation', 'vw-gardening-landscaping-pro' ); ?></a>
						</div>
						<hr>
						<h4><?php _e('Having Trouble, Need Support?', 'vw-gardening-landscaping-pro'); ?></h4>
						<p> <?php _e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-gardening-landscaping-pro'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_PRO_SUPPORT ); ?>" target="_blank"><?php _e('Support Forum', 'vw-gardening-landscaping-pro'); ?></a>
						</div>
						<hr>
						<h4><?php _e('Reviews & Testimonials', 'vw-gardening-landscaping-pro'); ?></h4>
						<p> <?php _e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-gardening-landscaping-pro'); ?>  </p>
						<div class="info-link">
							<a href="<?php echo esc_url( VW_GARDENING_LANDSCAPING_PRO_REVIEW ); ?>" target="_blank"><?php _e('Reviews', 'vw-gardening-landscaping-pro'); ?></a>
						</div>
					</div>
					<div class="col-right-inner">
						<div id="vw-demo-setup-guid">
							<h3><?php esc_html_e('Checkout our setup videos','vw-gardening-landscaping-pro'); ?></h3><hr />
							<ul>
								<li>
									<a href="javascript:void(0);" doc-video-url="https://www.youtube.com/embed/nLB9E6BBBv0"><span class="dashicons dashicons-welcome-widgets-menus"></span>Setup Menu</a>
								</li>
								<li>
									<a href="javascript:void(0);" doc-video-url="https://www.youtube.com/embed/gjccwcAK47o"><span class="dashicons dashicons-email-alt"></span>Setup Contact Page</a>
								</li>
								<li>
									<a href="javascript:void(0);" doc-video-url="https://www.youtube.com/embed/7BvTpLh-RB8"><span class="dashicons dashicons-editor-table"></span>Setup Widgets</a>
								</li>
								<li>
									<a href="javascript:void(0);" doc-video-url="https://www.youtube.com/embed/Mox298rk0Qo"><span class="dashicons dashicons-share"></span>Setup Social Icon</a>
								</li>
								<li>
									<a href="javascript:void(0);" doc-video-url="https://www.youtube.com/embed/WqNTB50xJMA"><span class="dashicons dashicons-wordpress-alt"></span>Install WordPress Theme</a>
								</li>
								<li>
									<a href="javascript:void(0);" doc-video-url="https://www.youtube.com/embed/8UxkXkix-ic"><span class="dashicons dashicons-admin-users"></span>Create WordPress User</a>
								</li>
								<li>
									<a href="javascript:void(0);" doc-video-url="https://www.youtube.com/embed/1xGlbWOzQBg"><span class="dashicons dashicons-image-flip-horizontal"></span>Setup Slider</a>
								</li>
								<li>
									<a href="javascript:void(0);" doc-video-url="https://www.youtube.com/embed/pJFF_wjdvcA"><span class="dashicons dashicons-database"></span>WordPress Backup</a>
								</li>
								<li>
									<a href="javascript:void(0);" doc-video-url="https://www.youtube.com/embed/xXdnUTPG_6A"><span class="dashicons dashicons-instagram"></span>Connect Instagram</a>
								</li>
								<li>
									<a href="javascript:void(0);" doc-video-url="https://www.youtube.com/embed/leLBzmbvdQQ"><span class="dashicons dashicons-table-col-delete"></span>Fix 404 Error</a>
								</li>
								<li>
									<a href="javascript:void(0);" doc-video-url="https://www.youtube.com/embed/OPBONJBtO6g"><span class="dashicons dashicons-admin-page"></span>Setup Template Pages</a>
								</li>
								<li>
									<a href="javascript:void(0);" doc-video-url="https://www.youtube.com/embed/jqG2eRjgPa4"><span class="dashicons dashicons-video-alt3"></span>Setup Youtube Video</a>
								</li>
								<li>
									<a href="javascript:void(0);" doc-video-url="https://www.youtube.com/embed/ovcok3FPRto"><span class="dashicons dashicons-welcome-add-page"></span>Setup Shortcode Pages</a>
								</li>
								<li>
									<a href="javascript:void(0);" doc-video-url="https://www.youtube.com/embed/O6elK2kSHQw"><span class="dashicons dashicons-images-alt2"></span>Setup Gallery Plugin</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				</div>
				<div class="wz-video-model">
					<span class="dashicons dashicons-no"></span>
					<iframe width="100%" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<div id="plugins" class="tabcontent">
					<div class="wizard-plugin-wrapper">
						<div class="o-product-row">
								<div class="plugin-col ibtana-plugin-col">
								<img src="<?php echo esc_url(get_template_directory_uri().'/theme-wizard/assets/images/banner-772x250.png'); ?>">
								<h3><?php echo esc_html('Ibtana - WordPress Website Builder Plugin'); ?></h3>
								<p><?php echo esc_html('Ibtana Gutenberg Editor has ready made eye catching responsive templates build with custom blocks and options to extend Gutenberg’s default capabilities. You can easily import demo content for the block or templates with a single click'); ?></p>
								<?php
								$plugin_ins = Vw_Premium_Theme_Plugin_Activation_Settings::get_instance();
								$vw_theme_actions = $plugin_ins->recommended_actions;

								if ($vw_theme_actions):
								?>
								<div class="ibtana-activation-btn">
									<?php echo wp_kses_post($vw_theme_actions[0]['link']); ?>
								</div>
								<?php
				        		endif; ?>
							</div>
								<div class="plugin-col ibtana-plugin-col">
								<img src="<?php echo esc_url(get_template_directory_uri().'/theme-wizard/assets/images/Ibtana-ecommerce-banner.png'); ?>">
								<h3><?php echo esc_html('Ibtana – Ecommerce Product Addons'); ?></h3>
								<p><?php echo esc_html('Ibtana Ecommerce Product Addons is excellent for designing a highly customized product page that shows your products in a more prominent and interesting way. With these product add ons, creating unique product pages is now possible.'); ?></p>
									<?php
								$plugin_ins = Vw_Premium_Theme_Plugin_Activation_Settings::get_instance();
								$vw_theme_actions = $plugin_ins->recommended_actions;

								if ($vw_theme_actions):
								?>
								<div class="ibtana-activation-btn">
									<?php echo wp_kses_post($vw_theme_actions[1]['link']); ?>
								</div>
								<?php
				        		endif; ?>
							</div>
							<div class="plugin-col">
								<img src="<?php echo esc_url(get_template_directory_uri().'/theme-wizard/assets/images/VWThemes_banner_plugin.png'); ?>">
								<h3><?php echo esc_html('Title Banner Image Plugin'); ?></h3>
								<p><?php echo esc_html('If you are interested in adding the banner images, you check VW Title Banner Plugin. Its main speciality is that it permits user the addition of banner image on post, custom post or any page. '); ?></p>
								<a href="<?php echo esc_url('https://www.vwthemes.com/premium-plugin/vw-title-banner-plugin/'); ?>"><?php echo esc_html('Buy Now'); ?></a>
							</div>
							<div class="plugin-col">
								<img src="<?php echo esc_url(get_template_directory_uri().'/theme-wizard/assets/images/gallery_plugin_banner.png'); ?>">

								<h3><?php echo esc_html('VW Gallery Images Plugin'); ?></h3>
								<p><?php echo esc_html('The VW Gallery Plugin is an amazing WordPress gallery plugin. It helps you in creating the elegant gallery within few minutes. The VW Gallery plugin offers the advantage of displaying multiple galleries on a single page or post.'); ?></p>
								<a href="<?php echo esc_url('https://www.vwthemes.com/premium-plugin/vw-gallery-plugin/'); ?>"><?php echo esc_html('Buy Now'); ?></a>
							</div>

						</div>
					</div>
				</div>
				<div id="others_theme" class="tabcontent">
					<script>

						var data_post={"para":"1"};

					    jQuery.ajax({
					      method: "POST",
					      url: "https://www.vwthemes.com/wp-json/ibtana-licence/v2/get_modal_contents",
					      data: JSON.stringify(data_post),
					      dataType: 'json',
					      contentType: 'application/json',
					    }).done(function( data ) {
					    	/*console.log(data);*/
					    	var premium_data = data.data.products;
					    	for (var i = 0; i < premium_data.length; i++) {
						          var premium_product = premium_data[i];
						          var card_content = `<div class="o-products-col" data-id="`+premium_product.id+`">
						          	<div class="o-products-image">
						          		<img src="`+premium_product.image+`">
						          	</div>
						          	<h3>`+premium_product.title+`</h3>
						          	<a href="`+premium_product.permalink+`" target="_blank">Buy Now</a>
						          	<a href="`+premium_product.demo_url+`" target="_blank">View Demo</a>
						          </div>`;
						        jQuery('.wz-spinner-wrap').css('display','none');
	          					jQuery('#other-products .o-product-row').append(card_content);
	        				}

	        				var premium_category = data.data.sub;
	        				var active_class=""
	        				/*console.log(premium_category.length);*/
					    	for (let i = 0; i < premium_category.length; i++) {
					    		if(i==0){
					    			active_class="active";
					    		}else{
					    			active_class="";
					    		}
				    			let premium_product = premium_category[i];
					          	let card_content = `<li data-ids="`+premium_product.product_ids+`" onclick="other_products(this);" class="`+active_class+`">
					          		`+premium_product.name+`<span class="badge badge-info">`+premium_product.product_ids.length+`</span>
					          	</li>`;
          						jQuery('.o-product-col-1 ul').append(card_content);
					    	}
					    });

					    function other_products(content){

					    	jQuery('.o-product-col-1 ul li').attr('class','');
					        content.classList.add("active");
				            var data_ids = jQuery(content).attr('data-ids');

				            var id_arr = data_ids.split(',');
				            jQuery('.o-product-row .o-products-col[data-id]').hide();
				            for (var i = 0; i < id_arr.length; i++) {
				                var single_id = id_arr[i];
				                jQuery('.o-product-row .o-products-col[data-id="'+single_id+'"]').show();
				            }

					    }

					</script>
					<div id="other-products">
						<div class="wz-spinner-wrap">
							<div class="lds-dual-ring"></div>
						</div>
						<div class="o-product-main-row">
							<div class="o-product-col-1">
								<ul>

								</ul>
							</div>
							<div class="o-product-col-2">
								<div class="social-theme-search">
				                    <input class="themesearchinput" type="text" placeholder="Search Theme Here">
				                </div>
								<div class="o-product-row" style="clear: both;">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php }


	// Add a Custom CSS file to WP Admin Area
	public function vw_gardening_landscaping_pro_admin_theme_style() {
		wp_enqueue_style( 'vw-gardening-landscaping-pro-font', $this->vw_gardening_landscaping_pro_admin_font_url(), array() );
		wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/theme-wizard/assets/css/getstart.css');
		wp_enqueue_script('tabs', get_template_directory_uri() . '/theme-wizard/assets/js/tab.js');
	}

	// Theme Font URL
	public function vw_gardening_landscaping_pro_admin_font_url() {
		$font_url = '';
		$font_family = array();
		$font_family[] = 'Muli:300,400,600,700,800,900';

		$query_args = array(
			'family'	=> urlencode(implode('|',$font_family)),
		);
		$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		return $font_url;
	}
}
