<?php

/* Single Services Post Type */
function vw_gardening_landscaping_pro_single_services($single_template) {
	global $post;
	if ($post->post_type == 'services') {
		$single_template = dirname( __FILE__ ) . '/single-service.php';
	}
	return $single_template;
}
add_filter( 'single_template', 'vw_gardening_landscaping_pro_single_services' );
/* Single Course Post Type */
function vw_gardening_landscaping_pro_single_projects($single_template) {
	global $post;
	if ($post->post_type == 'projects') {
		$single_template = dirname( __FILE__ ) . '/single-project.php';
	}
	return $single_template;
}
add_filter( 'single_template', 'vw_gardening_landscaping_pro_single_projects' );

/* Single Trainer Post Type */
function vw_gardening_landscaping_pro_single_trainer($single_template) {
	global $post;
	if ($post->post_type == 'team') {
		$single_template = dirname( __FILE__ ) . '/single-team.php';
	}
	return $single_template;
}
add_filter( 'single_template', 'vw_gardening_landscaping_pro_single_trainer' );

/* Single Testimonial Post Type */
function vw_gardening_landscaping_pro_single_testimonials($single_template) {
	global $post;
	if ($post->post_type == 'testimonials') {
		$single_template = dirname( __FILE__ ) . '/single-testimonial.php';
	}
	return $single_template;
}
add_filter( 'single_template', 'vw_gardening_landscaping_pro_single_testimonials' );
