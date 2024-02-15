<?php
require get_template_directory() . '/theme-wizard/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function vw_gardening_landscaping_pro_register_recommended_plugins_set() {
	$plugins = array(
		array(
			'name'             => __( 'VW Title Banner Image', 'vw-gardening-landscaping-pro' ),
			'slug'             => 'vw-title-banner-image',
			'source'           => get_template_directory() . '/inc/plugins/vw-title-banner-image.zip',
			'required'         => true,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Contact Form 7', 'vw-gardening-landscaping-pro' ),
			'slug'             => 'contact-form-7',
			'source'           => '',
			'required'         => true,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce', 'vw-gardening-landscaping-pro' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => true,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Ibtana - WordPress Website Builder', 'vw-gardening-landscaping-pro' ),
			'slug'             => 'ibtana-visual-editor',
			'source'           => '',
			'required'         => true,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Ibtana - Ecommerce Product Addons', 'vw-gardening-landscaping-pro' ),
			'slug'             => 'ibtana-ecommerce-product-addons',
			'source'           => 'https://downloads.wordpress.org/plugin/ibtana-ecommerce-product-addons.zip',
			'required'         => true,
			'force_activation' => false,
		),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'vw_gardening_landscaping_pro_register_recommended_plugins_set' );
