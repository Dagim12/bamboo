<?php
define('vw_gardening_landscaping_pro_STYLES','vw-gardening-landscaping-pro');
/**
 * vw-gardening-landscaping-pro functions and definitions
 *
 * @package vw-gardening-landscaping-pro
 */

if ( ! function_exists( 'vw_gardening_landscaping_pro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function vw_gardening_landscaping_pro_setup() {
  $GLOBALS['content_width'] = apply_filters( 'vw_gardening_landscaping_pro_content_width', 640 );
  if ( ! isset( $content_width ) ) $content_width = 640;
  load_theme_textdomain( 'vw-gardening-landscaping-pro', get_template_directory() . '/languages' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'woocommerce' );
  add_theme_support( 'custom-header' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'wc-product-gallery-zoom' ); 
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );

  add_theme_support( 'custom-logo', array(
    'height'      => 240,
    'width'       => 240,
    'flex-height' => true,
  ) );
  add_image_size('vw-gardening-landscaping-pro-homepage-thumb',240,145,true);
  register_nav_menus( array(
    'primary'   => __( 'Primary Menu', 'vw-gardening-landscaping-pro' ),
    'footer-widgets'   => __( 'Footer Menu', 'vw-gardening-landscaping-pro' )
  ) );
  add_theme_support( 'custom-background', array(
    'default-color' => 'f1f1f1'
  ) );
  add_editor_style( array( 'assets/css/editor-style.css') );
}
endif;
add_action( 'after_setup_theme', 'vw_gardening_landscaping_pro_setup' );

/* Theme Widgets Setup */
function vw_gardening_landscaping_pro_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Blog Sidebar', 'vw-gardening-landscaping-pro' ),
    'description'   => __( 'Appears on blog page sidebar', 'vw-gardening-landscaping-pro' ),
    'id'            => 'sidebar-1',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Page Sidebar', 'vw-gardening-landscaping-pro' ),
    'description'   => __( 'Appears on page sidebar', 'vw-gardening-landscaping-pro' ),
    'id'            => 'sidebar-2',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Column 1', 'vw-gardening-landscaping-pro' ),
    'description'   => __( 'Appears on footer', 'vw-gardening-landscaping-pro' ),
    'id'            => 'footer-1',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Column 2', 'vw-gardening-landscaping-pro' ),
    'description'   => __( 'Appears on footer', 'vw-gardening-landscaping-pro' ),
    'id'            => 'footer-2',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Column 3', 'vw-gardening-landscaping-pro' ),
    'description'   => __( 'Appears on footer', 'vw-gardening-landscaping-pro' ),
    'id'            => 'footer-3',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Column 4', 'vw-gardening-landscaping-pro' ),
    'description'   => __( 'Appears on footer', 'vw-gardening-landscaping-pro' ),
    'id'            => 'footer-4',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'vw_gardening_landscaping_pro_widgets_init' );

/* Theme Font URL */
function vw_gardening_landscaping_pro_font_url() {
  $font_url = '';
  $font_family = array();
  $font_family[] = 'PT Sans:300,400,600,700,800,900';
  $font_family[] = 'Roboto:400,700';
  $font_family[] = 'Roboto Condensed:400,700';
  $font_family[] = 'Open Sans';
  $font_family[] = 'Overpass';
  $font_family[] = 'Montserrat:300,400,600,700,800,900';
  $font_family[] = 'Playball:300,400,600,700,800,900';
  $font_family[] = 'Alegreya:300,400,600,700,800,900';
  $font_family[] = 'Julius Sans One';
  $font_family[] = 'Arsenal';
  $font_family[] = 'Slabo';
  $font_family[] = 'Lato';
  $font_family[] = 'Overpass Mono';
  $font_family[] = 'Source Sans Pro';
  $font_family[] = 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
  $font_family[] = 'Merriweather';
  $font_family[] = 'Rubik';
  $font_family[] = 'Lora';
  $font_family[] = 'Ubuntu';
  $font_family[] = 'Cabin';
  $font_family[] = 'Arimo';
  $font_family[] = 'Playfair Display';
  $font_family[] = 'Quicksand';
  $font_family[] = 'Padauk';
  $font_family[] = 'Muli';
  $font_family[] = 'Inconsolata';
  $font_family[] = 'Bitter';
  $font_family[] = 'Pacifico';
  $font_family[] = 'Indie Flower';
  $font_family[] = 'VT323';
  $font_family[] = 'Dosis';
  $font_family[] = 'Frank Ruhl Libre';
  $font_family[] = 'Fjalla One';
  $font_family[] = 'Oxygen';
  $font_family[] = 'Arvo';
  $font_family[] = 'Noto Serif';
  $font_family[] = 'Lobster';
  $font_family[] = 'Crimson Text';
  $font_family[] = 'Yanone Kaffeesatz';
  $font_family[] = 'Anton';
  $font_family[] = 'Libre Baskerville';
  $font_family[] = 'Bree Serif';
  $font_family[] = 'Gloria Hallelujah';
  $font_family[] = 'Josefin Sans:100,100i,300,300i,400,400i,600,600i,700,700i&amp;subset=latin-ext,vietnamese';
  $font_family[] = 'Abril Fatface';
  $font_family[] = 'Varela Round';
  $font_family[] = 'Vampiro One';
  $font_family[] = 'Shadows Into Light';
  $font_family[] = 'Cuprum';
  $font_family[] = 'Rokkitt';
  $font_family[] = 'Vollkorn';
  $font_family[] = 'Francois One';
  $font_family[] = 'Orbitron';
  $font_family[] = 'Patua One';
  $font_family[] = 'Acme';
  $font_family[] = 'Satisfy';
  $font_family[] = 'Josefin Slab';
  $font_family[] = 'Quattrocento Sans';
  $font_family[] = 'Architects Daughter';
  $font_family[] = 'Russo One';
  $font_family[] = 'Monda';
  $font_family[] = 'Righteous';
  $font_family[] = 'Lobster Two';
  $font_family[] = 'Hammersmith One';
  $font_family[] = 'Courgette';
  $font_family[] = 'Permanent Marker';
  $font_family[] = 'Cherry Swash';
  $font_family[] = 'Cormorant Garamond';
  $font_family[] = 'Poiret One';
  $font_family[] = 'BenchNine';
  $font_family[] = 'Economica';
  $font_family[] = 'Handlee';
  $font_family[] = 'Cardo';
  $font_family[] = 'Alfa Slab One';
  $font_family[] = 'Averia Serif Libre';
  $font_family[] = 'Cookie';
  $font_family[] = 'Chewy';
  $font_family[] = 'Great Vibes';
  $font_family[] = 'Coming Soon';
  $font_family[] = 'Philosopher';
  $font_family[] = 'Days One';
  $font_family[] = 'Kanit';
  $font_family[] = 'Shrikhand';
  $font_family[] = 'Tangerine';
  $font_family[] = 'IM Fell English SC';
  $font_family[] = 'Boogaloo';
  $font_family[] = 'Bangers';
  $font_family[] = 'Fredoka One';
  $font_family[] = 'Bad Script';
  $font_family[] = 'Volkhov';
  $font_family[] = 'Shadows Into Light Two';
  $font_family[] = 'Marck Script';
  $font_family[] = 'Sacramento';
  $font_family[] = 'Poppins:100,200,300,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=devanagari,latin-ext';
  $font_family[] = 'PT Serif';
  $query_args = array(
    'family'  => urlencode(implode('|',$font_family)),
  );
  $font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
  return $font_url;
}

/* Theme enqueue scripts */
function vw_gardening_landscaping_pro_scripts() {
  wp_enqueue_style( 'vw-gardening-landscaping-pro-font', vw_gardening_landscaping_pro_font_url(), array() );
  wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.min.css' );
  wp_enqueue_style( 'vw-gardening-landscaping-pro-basic-style', get_stylesheet_uri() );

  /* Inline style sheet */
  require get_parent_theme_file_path( '/inline_style.php' );
  wp_add_inline_style( 'vw-gardening-landscaping-pro-basic-style',$custom_css );
  wp_style_add_data( 'vw-gardening-landscaping-pro-style', 'rtl', 'replace' );

  if(is_rtl()){
    wp_enqueue_style( 'rtl-style', get_template_directory_uri().'/rtl-style.css',true, null,'all');
    wp_add_inline_style( 'rtl-style',$custom_css );
  }else{
    // ---------- CSS Enqueue -----------
    if(is_front_page() || is_home()){
      wp_enqueue_style( 'home-page-style', get_template_directory_uri().'/assets/css/main-css/home-page.css',true, null,'all');
      wp_add_inline_style( 'home-page-style',$custom_css );
    }else{
      wp_enqueue_style( 'other-page-style', get_template_directory_uri() . '/assets/css/main-css/other-pages.css',true, null,'all');
      wp_add_inline_style( 'other-page-style',$custom_css );
    }
    if('post' == get_post_type() && is_home()){
      wp_enqueue_style( 'other-page-style', get_template_directory_uri() . '/assets/css/main-css/other-pages.css',true, null,'all');
      wp_add_inline_style( 'other-page-style',$custom_css );
    }
    wp_enqueue_style( 'header-footer-style', get_template_directory_uri().'/assets/css/main-css/header-footer.css',true, null,'all' );
    wp_add_inline_style( 'header-footer-style',$custom_css );

    wp_enqueue_style( 'vw-gardening-landscaping', get_template_directory_uri().'/assets/css/vw-gardening-landscaping.css',true, null,'all' );
    wp_add_inline_style( 'vw-gardening-landscaping',$custom_css );

    if(class_exists('IMMA_Class')){
        wp_enqueue_style( 'vw-gardening-landscaping-pro-mega-menu-style', get_template_directory_uri().'/assets/css/main-css/mega-menu-style.css',true, null,'all');
      }

    wp_enqueue_style( 'responsive-style', get_template_directory_uri().'/assets/css/main-css/mobile-main.css',true, null,'screen and (max-width: 1200px) and (min-width: 320px)' );
    wp_add_inline_style( 'responsive-media-style',$custom_css );
  }
  if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
    wp_enqueue_style( 'amp-style', get_template_directory_uri().'/assets/css/main-css/amp-style.css',true, null,'all' );
  }else{
    wp_enqueue_style( 'animation-wow',get_template_directory_uri().'/assets/css/animate.css' );
    wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri().'/assets/css/owl.carousel.css' );
  }
  wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.min.css' );
  if(defined('ELEMENTOR_VERSION')){
    wp_enqueue_style( 'elementor-demo-style',get_template_directory_uri().'/inc/elementor-demos/css/elementor-demo.css' );
  }
  
  wp_enqueue_script( 'tether', get_template_directory_uri() . '/assets/js/tether.js', array('jquery'), '',true);
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js',array('jquery'),'',true);
  wp_enqueue_script( 'superfsh', get_template_directory_uri() . '/assets/js/jquery.superfish.js',array('jquery'),'',true);
  wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js',array('jquery'),'',true);
  wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/assets/js/SmoothScroll.js',array('jquery'),'',true);
  wp_enqueue_script( 'jquery-appear', get_template_directory_uri() . '/assets/js/jquery.appear.js',array('jquery'),'',true);
  
  wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'),'', true );

  wp_enqueue_script( 'bootstrap-notify-js', get_template_directory_uri() . '/assets/js/bootstrap-notify.min.js', array( 'bootstrap', 'vw-customscripts' ) );

  wp_register_script( 'vw-customscripts', get_template_directory_uri() . '/assets/js/custom.js' );
  wp_localize_script(
    'vw-customscripts',
    'vw_custom_script_obj',
    array(
      'is_home' =>  ( is_home() || is_front_page() ),
      'home_url' =>  home_url()
    )
  );
  wp_enqueue_script( 'vw-customscripts' );

  wp_enqueue_script( 'tweenmax-min-js', get_template_directory_uri() . '/assets/js/TweenMax.min.js',array('jquery'),'',true);

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'vw_gardening_landscaping_pro_scripts' );

// ------ Admin Elementor File ------------
function admin_elementor_files(){

  wp_enqueue_style( 'admin-elementor-demo-style',get_template_directory_uri().'/inc/elementor-demos/css/admin-elementor-demo.css' );
  
  wp_enqueue_script( 'script-one-click', get_template_directory_uri() . '/inc/elementor-demos/js/admin-ele-script.js');
}
add_action( 'admin_enqueue_scripts', 'admin_elementor_files' );
/* Implement the Custom Header feature. */
require get_parent_theme_file_path( '/inc/custom-header.php' );
/* Custom template tags for this theme. */
require get_parent_theme_file_path( '/inc/template-tags.php' );

// theme_verfication
require get_template_directory().'/inc/customize/verify_theme_version.php';
/* Theme Wizard */
require get_parent_theme_file_path('/theme-wizard/config.php' );
// 
require get_parent_theme_file_path('/theme-wizard/plugin-activation.php' );
/* Customizer additions. */
require get_parent_theme_file_path( '/inc/customize/customizer.php' );
/* Elementor Demo */
require get_template_directory().'/inc/elementor-demos/demo_config.php';
/* Elementor Shortcode */
require get_template_directory().'/inc/elementor-demos/demo-shortcodes.php';

/* URL DEFINES */
define('VW_GARDENING_LANDSCAPING_PRO_SITE_URL','https://yenesity.com/');
/* Theme Credit link */
function vw_gardening_landscaping_pro_credit_link() {
  echo esc_html_e(' Design & Developed by','vw-gardening-landscaping-pro'). "<a href=".esc_url(VW_GARDENING_LANDSCAPING_PRO_SITE_URL)." target='_blank'> Yenesity</a>";
}
/*Radio Button sanitization*/
function vw_gardening_landscaping_pro_sanitize_choices( $input, $setting ) {
  global $wp_customize;
  $control = $wp_customize->get_control( $setting->id );
  if ( array_key_exists( $input, $control->choices ) ) {
    return $input;
  } else {
    return $setting->default;
  }
}

/* Breadcrumb Begin */
function vw_gardening_landscaping_pro_the_breadcrumb() {
  if (!is_home()) {
    echo '<a href="';
      echo esc_url(home_url());
    echo '">';
      bloginfo('name');
    echo "</a> ";
    if (is_category() || is_single()) {
      the_category(', ');
      if (is_single()) {
        echo "<span> ";
          the_title();
        echo "</span> ";
      }
    } elseif (is_page()) {
      the_title();
    }
  }
}

/* Excerpt Limit Begin */
function vw_gardening_landscaping_pro_string_limit_words($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

function vw_gardening_landscaping_pro_show_timming(){
  if(get_theme_mod('vw_gardening_landscaping_main_header_layout') == 'Layout 2' ) {
    return true;
  }
  return false;
}

//social widget file
require get_parent_theme_file_path( '/inc/posttype-templates/posttype-templates.php' );
require get_parent_theme_file_path( '/inc/posttype-templates/posttype-shortcode.php' );
//social widget file
require get_parent_theme_file_path( '/inc/widget/socail-widget.php' );
//Contact Widget file
require get_parent_theme_file_path( '/inc/widget/contact-widget.php' );
//About Us Widget
require get_parent_theme_file_path('/inc/widget/about-us-widget.php' );
/* --------- Verify Mega Menu --------- */
// require get_parent_theme_file_path( '/verify-addons/ibtana-mega-menu-verify.php' );


define('VW_GARDENING_LANDSCAPING_PRO_THEME_DOC','https://www.vwthemesdemo.com/docs/vw-gardening-landscaping-pro/');
define('VW_GARDENING_LANDSCAPING_PRO_SUPPORT','https://www.vwthemes.com/support/vw-theme/');
define('VW_GARDENING_LANDSCAPING_PRO_FAQ','https://www.vwthemes.com/faqs/');
define('VW_GARDENING_LANDSCAPING_PRO_CONTACT','https://www.vwthemes.com/contact/');
define('VW_GARDENING_LANDSCAPING_PRO_REVIEW','https://www.vwthemes.com/topic/reviews-and-testimonials/');
define('VW_GARDENING_LANDSCAPING_PRO_SHOPIFY','https://www.vwthemes.com/premium-shopify-themes/');
define('VW_GARDENING_LANDSCAPING_PRO_MOODLE','https://vwthemes.com/lms-themes/taleem-responsive-moodle-theme/');
define('VW_GARDENING_LANDSCAPING_PRO_MOBILE_APP','https://www.vwthemes.com/premium-woocommerce-mobile-app/vw-woocommerce-mobile-app/');
define('VW_GARDENING_LANDSCAPING_PRO_SOCIAL_ICONS_YOUTUBE_LINK','https://www.youtube.com/watch?v=US-7TEl-z44');
define('VW_GARDENING_LANDSCAPING_PRO_SLIDER_YOUTUBE_LINK','https://www.youtube.com/watch?v=1xGlbWOzQBg&feature=youtu.be');
define('VW_GARDENING_LANDSCAPING_PRO_SHORTCODE_YOUTUBE_LINK','https://www.youtube.com/watch?v=ovcok3FPRto');
define('VW_GARDENING_LANDSCAPING_PRO_BLOG_YOUTUBE_LINK','https://www.youtube.com/watch?v=j7veMuhcXYA');
define('VW_GARDENING_LANDSCAPING_PRO_MENU_YOUTUBE_LINK','https://www.youtube.com/watch?v=nLB9E6BBBv0');
define('VW_GARDENING_LANDSCAPING_PRO_GALLERY_YOUTUBE_LINK','https://www.youtube.com/watch?v=O6elK2kSHQw');
define('VW_GARDENING_LANDSCAPING_PRO_WIDGET_YOUTUBE_LINK','https://www.youtube.com/watch?v=7BvTpLh-RB8');
define('VW_GARDENING_LANDSCAPING_PRO_CONTACT_FORM_YOUTUBE_LINK','https://www.youtube.com/watch?v=7BvTpLh-RB8');
define('VW_GARDENING_LANDSCAPING_PRO_TITLE_BANNER_PLUGIN','https://www.vwthemes.com/premium-plugin/vw-title-banner-plugin/');
define('VW_GARDENING_LANDSCAPING_PRO_GALLERY_PLUGIN','https://www.vwthemes.com/premium-plugin/vw-gallery-plugin/');

define( 'IBTANA_THEME_LICENCE_ENDPOINT', 'https://vwthemes.com/wp-json/ibtana-licence/v2/' );
/*===================================================================================
* Add Author Links
* =================================================================================*/
function add_to_author_profile( $contactmethods ) {

$contactmethods['tumbler_url'] = 'Tumbler URL';
$contactmethods['pinterest_profile'] = 'Pinterest Profile URL';
$contactmethods['twitter_profile'] = 'Twitter Profile URL';
$contactmethods['facebook_profile'] = 'Facebook Profile URL';
return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 1);
// Recent post widget with thumbnails
Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {
  function widget($args, $instance) {
    if ( ! isset( $args['widget_id'] ) ) {
      $args['widget_id'] = $this->id;
    }
    $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'vw-gardening-landscaping-pro' );
    /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
    $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
    $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
    if ( ! $number )
    $number = 5;
    $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
    /**
    * Filter the arguments for the Recent Posts widget.
    *
    * @since 3.4.0
    *
    * @see WP_Query::get_posts()
    *
    * @param array $args An array of arguments used to retrieve the recent posts.
    */
    $r = new WP_Query( apply_filters( 'widget_posts_args', array(
      'posts_per_page'      => $number,
      'no_found_rows'       => true,
      'post_status'         => 'publish',
      'ignore_sticky_posts' => true
    ) ) );
    if ($r->have_posts()) : ?>
    <?php echo $args['before_widget']; ?>
    <?php if ( $title ) {
      echo $args['before_title'] . esc_html($title) . $args['after_title'];
    } ?>
    <ul>
      <?php while ( $r->have_posts() ) : $r->the_post(); ?>
      <li>
        <div class="row recent-post-box">
          <div class="post-thumb <?php if(has_post_thumbnail()) { echo 'col-lg-4 col-md-4'; } ?> ">
              <?php the_post_thumbnail(); ?>
          </div>
          <div class="post-content <?php if(has_post_thumbnail()) { echo 'col-lg-8 col-md-8'; } else { echo 'col-md-12 col-sm-12 col-12'; }?>">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php if ( $show_date ) : ?>
              <p class="post-date"><?php the_time(get_option('date_format')); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </li>
      <?php endwhile; 
      wp_reset_postdata(); ?>
    </ul>
    <?php echo $args['after_widget'];
    endif;
  }
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');

//** *Enable upload for webp image files.*/
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');
//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);

/**
 * Sync lite options.
 */
function vw_gardening_landscaping_pro_sync_options() {
  $theme_mods_match_id = array(
    'vw_gardening_landscaping_phone_icon' => 'vw_gardening_landscaping_pro_topbar_section_timing_icon',
    'vw_gardening_landscaping_phone_number' => 'vw_gardening_landscaping_pro_topbar_section_timing_text',
    'vw_gardening_landscaping_email_icon' => 'vw_gardening_landscaping_pro_topbar_section_email_icon',
    'vw_gardening_landscaping_email_address' => 'vw_gardening_landscaping_pro_topbar_section_email_id',
    'vw_gardening_landscaping_top_btn_url' => 'vw_gardening_landscaping_pro_header_section_button_url',
    'vw_gardening_landscaping_top_btn_text' => 'vw_gardening_landscaping_pro_header_section_button_title',
  );
  $matchTheme=array(
    'vw-gardening-landscaping-pro' => 'vw-gardening-landscaping'
  );
  $newTheme = wp_get_theme();
  $themename = $newTheme->get_stylesheet();
  global $wpdb;
  if(isset($matchTheme[$themename])){
    $old_theme = $matchTheme[$themename];
    $checkWord = 'theme_mods_'.$old_theme;
    $mqr = "SELECT * FROM wp_options where option_name='$checkWord'";
    $result = $wpdb->get_row($mqr);
    if($result){
      $optionValue = $result->option_value;
      $data_array=unserialize($optionValue);
      foreach ($theme_mods_match_id as $key => $word){
        $data_array[$word] = $data_array[$key];
      }
      $increment=0;
      foreach ($data_array as $d => $old) {
        $match = 'vw_gardening_landscaping_slider_page';
        if(strpos($d, $match) !== false){
          $increment++;
          $postId = $old;
          $post = get_post($postId);
          $data_array['vw_gardening_landscaping_pro_slide_heading'.$increment] = get_the_title($postId);
          $data_array['vw_gardening_landscaping_pro_slide_text'.$increment] = get_the_excerpt($postId);
          $data_array['vw_gardening_landscaping_pro_slide_btnurl'.$increment] =  get_permalink($postId);
        }
      }
      $data_array['vw_gardening_landscaping_pro_slide_number'] =  $increment;
      $data_array_1=serialize($data_array);
      $newWord = 'theme_mods_'.$themename;
      $update = $wpdb->update('wp_options',['option_value'=>$data_array_1],['option_name'=>$newWord]);
    }
  }
}
add_action( 'after_switch_theme', 'vw_gardening_landscaping_pro_sync_options' );
// 
add_action('switch_theme', 'vw_gardening_landscaping_pro_deactivate');
function vw_gardening_landscaping_pro_deactivate() {
  ThemeWhizzie::remove_the_theme_key();
  ThemeWhizzie::set_the_validation_status('false');
}
define('CUSTOM_TEXT_DOMAIN', 'vw-gardening-landscaping');

add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}