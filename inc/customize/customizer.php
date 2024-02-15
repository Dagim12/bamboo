<?php
/**
 * vw-gardening-landscaping-pro Plugin Customizer
 *
 * @package vw-gardening-landscaping-pro
 */
/**
 * Loads custom control for layout settings
 */
function vw_gardening_landscaping_pro_custom_controls() {
    require_once get_template_directory() . '/inc/customize/controls/admin/customize-texteditor-control.php';
    require_once get_template_directory() . '/inc/customize/controls/custom-controls.php';

    require_once get_template_directory() . '/inc/customize/controls/button-controls.php';
   
}
add_action( 'customize_register', 'vw_gardening_landscaping_pro_custom_controls' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_gardening_landscaping_pro_customize_register( $wp_customize ) {
    
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.logo a',
        'render_callback' => 'twentyfifteen_customize_partial_blogname',
    ) );
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description',
        'render_callback' => 'twentyfifteen_customize_partial_blogdescription',
    ) );

    $wp_customize->add_setting('vw_gardening_landscaping_pro_display_title',array(
        'default' => 'false',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_display_title',array(
        'type' => 'checkbox',
        'label' => __('Show Title','vw-gardening-landscaping-pro'),
        'section' => 'title_tagline',
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_display_tagline',array(
        'default' => 'false',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_display_tagline',array(
        'type' => 'checkbox',
        'label' => __('Show Tagline','vw-gardening-landscaping-pro'),
        'section' => 'title_tagline',
    ));
    
    //add home page setting pannel
    $wp_customize->add_panel( 'vw_gardening_landscaping_pro_panel_id', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Theme Settings', 'vw-gardening-landscaping-pro' ),
        'description' => __( 'Description of what this panel does.', 'vw-gardening-landscaping-pro' ),
    ) );
    $font_array = array(
        '' => __( 'No Fonts', 'vw-gardening-landscaping-pro' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-gardening-landscaping-pro' ),
        'Acme' => __( 'Acme', 'vw-gardening-landscaping-pro' ),
        'Anton' => __( 'Anton', 'vw-gardening-landscaping-pro' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-gardening-landscaping-pro' ),
        'Arimo' => __( 'Arimo', 'vw-gardening-landscaping-pro' ),
        'Arsenal' => __( 'Arsenal', 'vw-gardening-landscaping-pro' ),
        'Arvo' => __( 'Arvo', 'vw-gardening-landscaping-pro' ),
        'Alegreya' => __( 'Alegreya', 'vw-gardening-landscaping-pro' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-gardening-landscaping-pro' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-gardening-landscaping-pro' ),
        'Bangers' => __( 'Bangers', 'vw-gardening-landscaping-pro' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-gardening-landscaping-pro' ),
        'Bad Script' => __( 'Bad Script', 'vw-gardening-landscaping-pro' ),
        'Bitter' => __( 'Bitter', 'vw-gardening-landscaping-pro' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-gardening-landscaping-pro' ),
        'BenchNine' => __( 'BenchNine', 'vw-gardening-landscaping-pro' ),
        'Cabin' => __( 'Cabin', 'vw-gardening-landscaping-pro' ),
        'Cardo' => __( 'Cardo', 'vw-gardening-landscaping-pro' ),
        'Courgette' => __( 'Courgette', 'vw-gardening-landscaping-pro' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-gardening-landscaping-pro' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-gardening-landscaping-pro' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-gardening-landscaping-pro' ),
        'Cuprum' => __( 'Cuprum', 'vw-gardening-landscaping-pro' ),
        'Cookie' => __( 'Cookie', 'vw-gardening-landscaping-pro' ),
        'Chewy' => __( 'Chewy', 'vw-gardening-landscaping-pro' ),
        'Days One' => __( 'Days One', 'vw-gardening-landscaping-pro' ),
        'Dosis' => __( 'Dosis', 'vw-gardening-landscaping-pro' ),
        'Economica' => __( 'Economica', 'vw-gardening-landscaping-pro' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-gardening-landscaping-pro' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-gardening-landscaping-pro' ),
        'Francois One' => __( 'Francois One', 'vw-gardening-landscaping-pro' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-gardening-landscaping-pro' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-gardening-landscaping-pro' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-gardening-landscaping-pro' ),
        'Handlee' => __( 'Handlee', 'vw-gardening-landscaping-pro' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-gardening-landscaping-pro' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-gardening-landscaping-pro' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-gardening-landscaping-pro' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-gardening-landscaping-pro' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-gardening-landscaping-pro' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-gardening-landscaping-pro' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-gardening-landscaping-pro' ),
        'Kanit' => __( 'Kanit', 'vw-gardening-landscaping-pro' ),
        'Lobster' => __( 'Lobster', 'vw-gardening-landscaping-pro' ),
        'Lato' => __( 'Lato', 'vw-gardening-landscaping-pro' ),
        'Lora' => __( 'Lora', 'vw-gardening-landscaping-pro' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-gardening-landscaping-pro' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-gardening-landscaping-pro' ),
        'Merriweather' => __( 'Merriweather', 'vw-gardening-landscaping-pro' ),
        'Monda' => __( 'Monda', 'vw-gardening-landscaping-pro' ),
        'Montserrat' => __( 'Montserrat', 'vw-gardening-landscaping-pro' ),
        'Muli' => __( 'Muli', 'vw-gardening-landscaping-pro' ),
        'Marck Script' => __( 'Marck Script', 'vw-gardening-landscaping-pro' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-gardening-landscaping-pro' ),
        'Open Sans' => __( 'Open Sans', 'vw-gardening-landscaping-pro' ),
        'Overpass' => __( 'Overpass', 'vw-gardening-landscaping-pro' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-gardening-landscaping-pro' ),
        'Oxygen' => __( 'Oxygen', 'vw-gardening-landscaping-pro' ),
        'Orbitron' => __( 'Orbitron', 'vw-gardening-landscaping-pro' ),
        'Patua One' => __( 'Patua One', 'vw-gardening-landscaping-pro' ),
        'Pacifico' => __( 'Pacifico', 'vw-gardening-landscaping-pro' ),
        'Padauk' => __( 'Padauk', 'vw-gardening-landscaping-pro' ),
        'Playball' => __( 'Playball', 'vw-gardening-landscaping-pro' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-gardening-landscaping-pro' ),
        'PT Sans' => __( 'PT Sans', 'vw-gardening-landscaping-pro' ),
        'Philosopher' => __( 'Philosopher', 'vw-gardening-landscaping-pro' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-gardening-landscaping-pro' ),
        'Poiret One' => __( 'Poiret One', 'vw-gardening-landscaping-pro' ),
        'Quicksand' => __( 'Quicksand', 'vw-gardening-landscaping-pro' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-gardening-landscaping-pro' ),
        'Raleway' => __( 'Raleway', 'vw-gardening-landscaping-pro' ),
        'Rubik' => __( 'Rubik', 'vw-gardening-landscaping-pro' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-gardening-landscaping-pro' ),
        'Russo One' => __( 'Russo One', 'vw-gardening-landscaping-pro' ),
        'Righteous' => __( 'Righteous', 'vw-gardening-landscaping-pro' ),
        'Slabo' => __( 'Slabo', 'vw-gardening-landscaping-pro' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-gardening-landscaping-pro' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-gardening-landscaping-pro'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-gardening-landscaping-pro' ),
        'Sacramento' => __( 'Sacramento', 'vw-gardening-landscaping-pro' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-gardening-landscaping-pro' ),
        'Tangerine' => __( 'Tangerine', 'vw-gardening-landscaping-pro' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-gardening-landscaping-pro' ),
        'VT323' => __( 'VT323', 'vw-gardening-landscaping-pro' ),
        'Varela Round' => __( 'Varela Round', 'vw-gardening-landscaping-pro' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-gardening-landscaping-pro' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-gardening-landscaping-pro' ),
        'Volkhov' => __( 'Volkhov', 'vw-gardening-landscaping-pro' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-gardening-landscaping-pro' )
    );

    require_once get_template_directory() . '/inc/customize/controls/customizer-seperator/class/customizer-seperator.php';
    require_once get_template_directory() . '/inc/customize/controls/customizer-text-radio-button/class/customizer-text-radio-button.php';
    require_once get_template_directory() . '/inc/customize/controls/customize-repeater/customize-repeater.php';
     //Social Icon Picker
     require_once get_template_directory() . '/inc/customize/controls/social-icons/social-icon-picker.php';
 //slider-line-control
    require_once get_template_directory() . '/inc/customize/controls/slider-line-control/slider-line-control.php';
    if ( (ThemeWhizzie::get_the_validation_status() === 'true') && (ThemeWhizzie::get_the_suspension_status() == 'false') ) {
        //general Settings
        require_once get_template_directory() . '/inc/customize/sections/customizer-custom-variables.php';
        //Header
        require_once get_template_directory() . '/inc/customize/sections/customizer-part-header.php';
        //Slider
        require_once get_template_directory() . '/inc/customize/sections/customizer-part-slide.php';
        //Home page sections
        require_once get_template_directory() . '/inc/customize/sections/customizer-part-home.php';
         //Social Icon
        require_once get_template_directory() . '/inc/customize/sections/customizer-part-social-icons.php';
        //Footer
        require_once get_template_directory() . '/inc/customize/sections/customizer-part-footer.php';
    }
}
add_action( 'customize_register', 'vw_gardening_landscaping_pro_customize_register' );
//Integer
function vw_gardening_landscaping_pro_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

load_template( trailingslashit( get_template_directory() ) . '/inc/customize/controls/logo/logo-resizer.php' );
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class vw_gardening_landscaping_pro_customize {
    /**
     * Returns the instance.
     *
     * @since  1.0.0
     * @access public
     * @return object
     */
    public static function get_instance() {
        static $instance = null;
        if ( is_null( $instance ) ) {
            $instance = new self;
            $instance->setup_actions();
        }
        return $instance;
    }
    /**
     * Constructor method.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function __construct() {}
    /**
     * Sets up initial actions.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function setup_actions() {
        // Register panels, sections, settings, controls, and partials.
        add_action( 'customize_register', array( $this, 'sections' ) );
        add_action( 'customize_register', array( $this, 'themebundleurl' ) );
        // Register scripts and styles for the controls.
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
    }
    /**
     * Sets up the customizer sections.
     *
     * @since  1.0.0
     * @access public
     * @param  object  $manager
     * @return void
     */
    public function sections( $manager ) {
        // Load custom sections.
       load_template( trailingslashit( get_template_directory() ) . '/inc/review-section.php' );
        // Register custom section types.
        $manager->register_section_type( 'vw_gardening_landscaping_pro_customize_reviews_and_testimonials' );
        // Register sections.
        $manager->add_section(
            new vw_gardening_landscaping_pro_customize_reviews_and_testimonials(
                $manager,
                'gardening_pro_example_11',
                array(
                    'title'    => esc_html__( 'Review & Testimonial', 'vw-gardening-landscaping-pro' ),
                    'reviews_and_testimonials_text' => esc_html__( 'Rate Us', 'vw-gardening-landscaping-pro' ),
                    'reviews_and_testimonials_url'  => 'https://www.vwthemes.com/topic/reviews-and-testimonials/',
                    'priority'   => 2,
                )
            )
        );
    }
    public function themebundleurl( $manager ) {
        // Load custom sections.
        load_template( trailingslashit( get_template_directory() ) . '/inc/review-section.php' );
        // Register custom section types.
        $manager->register_section_type( 'vw_gardening_landscaping_pro_customize_reviews_and_testimonials' );
        // Register sections.
        $manager->add_section(
            new vw_gardening_landscaping_pro_customize_reviews_and_testimonials(
                $manager,
                'gardening_pro_theme_bundle',
                array(
                    'title'    => esc_html__( 'Theme Bundle', 'vw-gardening-landscaping-pro' ),
                    'reviews_and_testimonials_text' => esc_html__( 'Buy Now', 'vw-gardening-landscaping-pro' ),
                    'reviews_and_testimonials_url'  => 'https://www.vwthemes.com/premium/theme-bundle/',
                    'priority'   => 1,
                )
            )
        );
    }
    /**
     * Loads theme customizer CSS.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue_control_scripts() {
        wp_enqueue_script( 'vw-gardening-landscaping-pro-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );
        wp_enqueue_style( 'vw-gardening-landscaping-pro-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
    }
}
// Doing this customizer thang!
vw_gardening_landscaping_pro_customize::get_instance();