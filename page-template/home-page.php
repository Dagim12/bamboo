<?php
/**
 * Template Name: Home Page
 */
get_header();

if ( ThemeWhizzie::get_the_suspension_status() == 'false' ) {

	get_template_part( 'template-parts/home/section-slider' );
	do_action( 'vw_book_store_pro_after_section_slider' );
		$section_order ='';
		$section_order = explode( ',', get_theme_mod( 'vw_gardening_landscaping_pro_section_ordering_settings_repeater') );
		
	    foreach( $section_order as $key => $value ){
		   if($value !=''){ 

		   		get_template_part( '/template-parts/home/section-'.$value);
	        }
	    } 
}

get_footer(); ?>