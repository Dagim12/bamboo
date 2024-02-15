<?php 

/**
 * Template to show the content of Our Products And Our Records
 *
 * @package vw-gardening-landscaping-pro
 */ 

if( get_theme_mod('vw_gardening_landscaping_pro_our_products_bgcolor') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_our_products_bgcolor')).';';
}elseif( get_theme_mod('vw_gardening_landscaping_pro_our_products_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_gardening_landscaping_pro_our_products_bgimage')).'\')';
}else{
  $about_backg = '';
}
?>
<div class="product-records" style="<?php echo esc_attr($about_backg); ?>">
	<?php
		get_template_part( 'template-parts/home/section-our-products' );		
		get_template_part( 'template-parts/home/section-our-records' );
	?>
</div>