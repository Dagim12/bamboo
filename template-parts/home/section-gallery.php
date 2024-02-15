<?php
/**
 * Template to show the content of Gallery section
 *
 * @package vw-gardening-landscaping-pro
 */ 

?>
<?php if ( defined( 'VW_GALLERY_IMAGES_VERSION' ) ) { ?>
	<section id="business_gallery">
		<div class="container-fluid">
		    <div class="school-shortcode">
		    	<?php echo do_shortcode(get_theme_mod('vw_gardening_landscaping_pro_gallery_shortcode')); ?>
		    </div>
		</div>
	    <div class="clearfix"></div>
	</section>
<?php } ?>