<?php

// Disable regenerating images while importing media
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
// Change some options for the jQuery modal window
function vw_gardening_landscaping_pro_ocdi_confirmation_dialog_options ( $options ) {
    return array_merge( $options, array(
        'width'       => 400,
        'dialogClass' => 'wp-dialog',
        'resizable'   => false,
        'height'      => 'auto',
        'modal'       => true,
    ) );
}
add_filter( 'pt-ocdi/confirmation_dialog_options', 'vw_gardening_landscaping_pro_ocdi_confirmation_dialog_options', 10, 1 );

function vw_gardening_landscaping_pro_ocdi_intro_text( $default_text ) {

    $default_text .= '<div class="ocdi_custom-intro-text notice notice-info inline">';
    $default_text .= sprintf (
        '%1$s <a href="%2$s" target="_blank" class="button button-primary">%3$s</a> %4$s',
        esc_html__( 'Install and activate all ', 'vw-gardening-landscaping-pro' ),
        get_admin_url(null, 'themes.php?page=tgmpa-install-plugins' ),
        esc_html__( 'Required Plugins', 'vw-gardening-landscaping-pro' ),
        esc_html__( 'before you click on the "Import" button.', 'vw-gardening-landscaping-pro' )
    );
    $default_text .= sprintf (
        ' %1$s <a href="%2$s" target="_blank" class="button button-primary">%3$s</a> %4$s',
        esc_html__( 'You will find all the pages in ', 'vw-gardening-landscaping-pro' ),
        get_admin_url(null, 'edit.php?post_type=page' ),
        esc_html__( 'Pages.', 'vw-gardening-landscaping-pro' ),
        esc_html__( 'Other pages will be imported along with the main Homepage.', 'vw-gardening-landscaping-pro' )
    );
    $default_text .= '</div>';

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'vw_gardening_landscaping_pro_ocdi_intro_text' );

// OneClick Demo Importer
add_filter( 'pt-ocdi/import_files', 'vw_gardening_landscaping_pro_import_files' );
function vw_gardening_landscaping_pro_import_files() {

    return array (

        array(
            'import_file_name'             => esc_html__( 'VW Gardening Landscaping Pro', 'vw-gardening-landscaping-pro' ),
            'import_file_url'            => trailingslashit( get_template_directory_uri() ).'inc/elementor-demos/vwgardeningpro.xml',
            'import_widget_file_url'     => trailingslashit( get_template_directory_uri() ).'inc/elementor-demos/widgets.wie',
            'import_customizer_file_url' => trailingslashit( get_template_directory_uri() ).'inc/elementor-demos/vw-gardening-landscaping-pro-export.dat',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/elementor-demos/images/screenshot.png',
            'import_notice'                => wp_kses_post(__( 'All other pages will be imported along with the main Homepage.', 'vw-gardening-landscaping-pro' )),
            'preview_url'                  => '',
            'categories'                   => array ( '' ),
        ),

        array(
            'import_file_name'             => esc_html__( 'OnePage', 'vw-gardening-landscaping-pro' ),
            'import_file_url'            => get_template_directory_uri().'inc/elementortest.xml',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demos/onepage/screenshot.jpg',
            'import_notice'                => esc_html__( 'WooCommerce and WooCommerce Wishlist plugins are not required for this demo.', 'vw-gardening-landscaping-pro' ),
            'preview_url'                  => '//saasland.droitthemes.com/onepage',
            'categories'                   => array ( '' ),
        ),
    );
}


function vw_gardening_landscaping_pro_after_import_setup($selected_import) {

    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array (
            'primary' => $main_menu->term_id,
        )
    );

    // Disable Elementor's Default Colors and Default Fonts
    update_option( 'elementor_disable_color_schemes', 'yes' );
    update_option( 'elementor_disable_typography_schemes', 'yes' );
    update_option( 'elementor_global_image_lightbox', '' );

    // Assign front page and posts page (blog page).
    if ( 'VW Gardening Landscaping Pro' == $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Home One' );
    }

    $blog_page_id  = get_page_by_title( 'Blog' );
    // Set the home page and blog page
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'vw_gardening_landscaping_pro_after_import_setup' );