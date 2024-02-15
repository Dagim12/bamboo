<?php 

/**
 * Template to show the content of Why Choose Us
 *
 * @package vw-gardening-landscaping-pro
 */ 

$about_section = get_theme_mod( 'vw_gardening_landscaping_pro_why_choose_us_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
$img_bg = get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_bgimage_setting');
if( get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_bgcolor') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_bgcolor')).';';
}elseif( get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_bgimage')).'\')';
}else{
  $about_backg = '';
} ?>
<section id="why-choose-us" style="<?php echo esc_attr($about_backg); ?>" class="<?php echo esc_attr($img_bg); ?>">
	<div class="container">
		<div class="row why-choose-us-head text-center bpadding-40 wow fadeInDown delay-1000 animated" data-wow-duration="3s">
			<div class="col-lg-12 col-md-12">
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_small_heading')!=''){ ?>
		            <p class="section-small_title white-color">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_small_heading')); ?>
		            </p>
	            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_heading')!=''){ ?>
		            <h2 class="section-main_title white-color">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_heading')); ?>
		            </h2>
	            <?php } ?>
			</div>
		</div>
		<div class="row">
			<?php
			$why_count=get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_number');
			for($i=1;$i<=$why_count;$i++) { ?>
				<div class="col-lg-6 col-md-6 wow fadeInUp delay-1000 animated" data-wow-duration="3s">
					<div class="why-choose-us-content">
						<div class="row">
							<div class="col-lg-1 col-md-2 col-sm-2">
								<?php if(get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_feature_icon'.$i)!=''){ ?>
						            <span class="borderd-wht"><i class="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_feature_icon'.$i)); ?>"></i></span>
					            <?php } ?>
							</div>
							<div class="col-lg-11 col-md-10 col-sm-10">
								<?php if(get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_feature_title'.$i)!=''){ ?>
						            <h4>
							            <a class="feature-heading" href="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_feature_title_url'.$i)); ?>"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_feature_title'.$i)); ?>
							            </a><span class="screen-reader-text"><?php echo esc_html('why_choose_us_feature', 'vw-gardening-landscaping-pro' ) ; ?></span>
						            </h4>
					            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_feature_text'.$i)!=''){ ?>
						            <p class="content-para">
						              <?php echo (get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_feature_text'.$i)); ?>
						            </p>
					            <?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>