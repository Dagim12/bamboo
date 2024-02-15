<?php 

/**
 * Template to show the content of Testimonials
 *
 * @package vw-gardening-landscaping-pro
 */ 

$about_section = get_theme_mod( 'vw_gardening_landscaping_pro_testimonial_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
$img_bg = get_theme_mod('vw_gardening_landscaping_pro_testimonial_bgimage_setting');

if( get_theme_mod('vw_gardening_landscaping_pro_testimonial_bgcolor') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_testimonial_bgcolor')).';';
}elseif( get_theme_mod('vw_gardening_landscaping_pro_testimonial_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_gardening_landscaping_pro_testimonial_bgimage')).'\')';
}else{
  $about_backg = '';
}
$services_excerpt="";
  if(get_theme_mod('vw_gardening_landscaping_pro_testimonial_excerpt_no')!=''){
    $services_excerpt=get_theme_mod('vw_gardening_landscaping_pro_testimonial_excerpt_no');
  }
?>
<section id="testimonials" style="<?php echo esc_attr($about_backg); ?>" class="<?php echo esc_attr($img_bg); ?>">
	<div class="container">
		<div class="row testimonials-head text-center bpadding-40 wow fadeInDown delay-1000 animated" data-wow-duration="3s">
			<div class="col-lg-12 col-md-12">
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_testimonial_small_heading')!=''){ ?>
		            <p class="section-small_title white-color">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_testimonial_small_heading')); ?>
		            </p>
	            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_testimonial_heading')!=''){ ?>
		            <h2 class="section-main_title white-color">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_testimonial_heading')); ?>
		            </h2>
	            <?php } ?>
			</div>
		</div>
		<div class="owl-carousel">
			<?php $i=1;
			$args = array(
				'post_type' => 'testimonials',
				'post_status' => 'publish',
				'posts_per_page' => get_theme_mod('vw_gardening_landscaping_pro_testimonial_number')
			);
			$new = new WP_Query($args); 
			while ( $new->have_posts() ){
				$new->the_post(); ?>
				<div class="testimonials-content wow fadeInUp delay-1000 animated" data-wow-duration="3s">
		             <div class="testimonial_text content-para"><?php $excerpt = get_the_excerpt(); echo esc_html(vw_gardening_landscaping_pro_string_limit_words($excerpt,$services_excerpt)); ?>
					</div>
		            <div class="row testimonials-box">
		            	<div class="col-lg-5 col-md-5">
	                        <div class="testimonials-icons">
	                            <?php if(get_post_meta($post->ID,'meta-tes-facebookurl',true)) { ?>
	                                <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-facebookurl',true)); ?>" target="_blank"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_html_e( 'facebook','vw-gardening-landscaping-pro' );?></span></a>
	                             <?php }
	                            if(get_post_meta($post->ID,'meta-tes-twitterurl',true)) { ?>
	                                <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-twitterurl',true)); ?>" target="_blank"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_html_e( 'twitter','vw-gardening-landscaping-pro' );?></span></a>
	                            <?php }
	                            if(get_post_meta($post->ID,'meta-tes-linkdenurl',true)) { ?>
	                                <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-linkdenurl',true)); ?>" target="_blank"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_html_e( 'linkedin','vw-gardening-landscaping-pro' );?></span></a>
	                            <?php } 
	                                if(get_post_meta($post->ID,'meta-tes-instagram',true)!= ''){ ?>
	                                <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-instagram',true)); ?>">
	                                    <i class="fab fa-instagram align-middle"></i><span class="screen-reader-text"><?php esc_html_e( 'instagram','vw-gardening-landscaping-pro' );?></span>
	                                </a>
	                            <?php } if(get_post_meta($post->ID,'meta-tes-pinterest',true)!= ''){ ?>
	                                <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-pinterest',true)); ?>">
	                                    <i class="fab fa-pinterest-p align-middle "></i><span class="screen-reader-text"><?php esc_html_e( 'pinterest','vw-gardening-landscaping-pro' );?></span>
	                                </a>
	                            <?php } ?>
	                        </div>
		            	</div>
		            	<div class="col-lg-7 col-md-7">
		            		<div class="client-box">
		            			<div class="row">
		            				<div class="col-lg-8 col-md-8 col-8 test-title">
		            					<a class="feature-heading" href="<?php the_permalink(); ?>">
		            						<?php the_title(); ?>
		            					</a>
		            					<?php if(get_post_meta($post->ID,'vw_gardening_landscaping_pro_posttype_testimonial_desigstory',true)!= ''){ ?>
		            						<p class="feature-heading">
		            							<?php echo esc_html(get_post_meta($post->ID,'vw_gardening_landscaping_pro_posttype_testimonial_desigstory',true)); ?>
		            						</p>
		            					<?php } ?>
		            				</div>
		            				<div class="col-lg-4 col-md-4 col-4">
		            					<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" alt="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_posttype_testimonial_alt_text'.$i)); ?>">
		            				</div>
		            			</div>
		            		</div>
		            	</div>
		            </div>
				</div>
			<?php $i++; }
	        wp_reset_query(); ?>
		</div>
	</div>
</section>