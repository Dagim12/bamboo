<?php 

/**
 * Template to show the content of About Us
 *
 * @package vw-gardening-landscaping-pro
 */ 
$about_section = get_theme_mod( 'vw_gardening_landscaping_pro_about_us_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
$img_bg = get_theme_mod('vw_gardening_landscaping_pro_about_us_bgimage_setting');
if( get_theme_mod('vw_gardening_landscaping_pro_about_us_bgcolor') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_about_us_bgcolor')).';';
}elseif( get_theme_mod('vw_gardening_landscaping_pro_about_us_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_gardening_landscaping_pro_about_us_bgimage')).'\')';
}else{
  $about_backg = '';
} ?>
<section id="about-us" style="<?php echo esc_attr($about_backg); ?>" class="<?php echo esc_attr($img_bg); ?> wow fadeInUp delay-1000 animated" data-wow-duration="3s">
	<div class="container">
		<div class="row about-us-head wow fadeInDown delay-1000 animated" data-wow-duration="3s">
			<div class="col-lg-7 col-md-12">
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_about_us_small_heading')!=''){ ?>
		            <p class="section-small_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_about_us_small_heading')); ?>
		            </p>
	            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_about_us_heading')!=''){ ?>
		            <h2 class="section-main_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_about_us_heading')); ?>
		            </h2>
	            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_about_us_text')!=''){ ?>
		            <p class="about-dec content-para">
		              <?php echo (get_theme_mod('vw_gardening_landscaping_pro_about_us_text')); ?>
		            </p>
	            <?php } ?>
	            <div class="row">
					<?php 
					$about_count=get_theme_mod('vw_gardening_landscaping_pro_about_us_number');
					for($i=1;$i<=$about_count;$i++) { ?>
						<div class="col-lg-6 col-md-6 col-sm-6 about-feature-content wow fadeInUp delay-1000 animated" data-wow-duration="3s">
							<div class="row">
								<div class="col-lg-3 col-md-4 col-3">
									<?php if(get_theme_mod('vw_gardening_landscaping_pro_about_us_feature_icon'.$i)!=''){ ?>
										<span class="borderd-second"><i class="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_about_us_feature_icon'.$i)); ?>"></i></span>
									<?php } ?>
								</div>
								<div class="col-lg-9 col-md-8 col-9 about-link align-items-center d-flex">
									<?php if(get_theme_mod('vw_gardening_landscaping_pro_about_us_feature_title'.$i)!=''){ ?>
						            	<a class="feature-heading" href="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_about_us_feature_url'.$i)); ?>">
											<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_about_us_feature_title'.$i)); ?>
										</a>
						            <?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-5 col-md-12"></div>
		</div>
	</div>
</section>