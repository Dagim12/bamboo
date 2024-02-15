<?php 

/**
 * Template to show the content of Our Blog And Partners
 *
 * @package vw-gardening-landscaping-pro
 */ 
if( get_theme_mod('vw_gardening_landscaping_pro_our_blog_bgcolor') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_our_blog_bgcolor')).';';
}elseif( get_theme_mod('vw_gardening_landscaping_pro_our_blog_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_gardening_landscaping_pro_our_blog_bgimage')).'\')';
}else{
  $about_backg = '';
}
?>
<div class="blog-partners" style="<?php echo esc_attr($about_backg); ?>">
	<?php
		get_template_part( 'template-parts/home/section-our-blog' );
		get_template_part( 'template-parts/home/section-our-partners' );
	?>
</div>