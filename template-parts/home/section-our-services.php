<?php 
/**
 * Template to show the content of Our Services 
 *
 * @package vw-gardening-landscaping-pro
 */ 
$about_section = get_theme_mod( 'vw_gardening_landscaping_pro_our_services_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
$img_bg = get_theme_mod('vw_gardening_landscaping_pro_our_services_bgimage_setting');
if( get_theme_mod('vw_gardening_landscaping_pro_our_services_bgcolor') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_our_services_bgcolor')).';';
}elseif( get_theme_mod('vw_gardening_landscaping_pro_our_services_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_gardening_landscaping_pro_our_services_bgimage')).'\')';
}else{
  $about_backg = '';
}
$services_excerpt="";
if(get_theme_mod('vw_gardening_landscaping_pro_services_excerpt_no')!=''){
    $services_excerpt=get_theme_mod('vw_gardening_landscaping_pro_services_excerpt_no');
} ?>
<section id="our-services" style="<?php echo esc_attr($about_backg); ?>" class="<?php echo esc_attr($img_bg); ?>">
	<div class="container">
		<div class="row our-services-head text-center bpadding-40">
			<div class="col-lg-12 col-md-12">
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_our_services_small_heading')!=''){ ?>
		            <p class="section-small_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_services_small_heading')); ?>
		            </p>
	            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_our_services_heading')!=''){ ?>
		            <h2 class="section-main_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_services_heading')); ?>
		            </h2>
	            <?php } ?>
			</div>
		</div>
		<div class="owl-carousel">
			<?php $i=1;
			$args = array(
				'post_type' => 'services',
				'post_status' => 'publish',
				'posts_per_page' => get_theme_mod('vw_gardening_landscaping_pro_our_services_number')
			);
			$new = new WP_Query($args); 
			while ( $new->have_posts() ){
				$new->the_post(); 
			?>
				<div class="our-services-contents wow fadeInUp delay-1000 animated" data-wow-duration="3s">
					<div class="row">
						<div class="col-lg-8 col-md-7 services-img-box">
							<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" alt="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_services_alt_text'.$i)); ?>">
						</div>
						<div class="col-lg-4 col-md-5 services-main-box d-flex align-items-center">
							<div class="services-box">
								<h3 class="feature-heading">
			                    	<?php the_title(); ?>
			                    </h3>
					            <div class="services_text content-para"><?php $excerpt = get_the_excerpt(); echo esc_html(vw_gardening_landscaping_pro_string_limit_words($excerpt,$services_excerpt)); ?>
					            </div>
					            <?php if(get_theme_mod('vw_gardening_landscaping_pro_our_services_link_title')!=''){ ?>
					            	<a class="feature-heading fonts-14 hvr-bounce-out" href="<?php the_permalink(); ?>">
					            		<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_services_link_title')); ?>
					            		<i class="fas fa-angle-right"></i>
					            	</a>
					            <?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php $i++;}
	        wp_reset_query(); ?>
		</div>
	</div>
</section>