<?php 
/**
 * Template to show the content of Our Expertise
 *
 * @package vw-gardening-landscaping-pro
 */ 
$about_section = get_theme_mod( 'vw_gardening_landscaping_pro_our_expertise_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
$img_bg = get_theme_mod('vw_gardening_landscaping_pro_our_expertise_bgimage_setting');
if( get_theme_mod('vw_gardening_landscaping_pro_our_expertise_bgcolor') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_bgcolor')).';';
}elseif( get_theme_mod('vw_gardening_landscaping_pro_our_expertise_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_bgimage')).'\')';
}else{
  $about_backg = '';
} ?>
<section id="our-expertise" style="<?php echo esc_attr($about_backg); ?>" class="<?php echo esc_attr($img_bg); ?>">
	<div class="container">
		<div class="row our-expertise-head text-center wow fadeInDown delay-1000 animated" data-wow-duration="3s">
			<div class="col-lg-12 col-md-12">
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_small_heading')!=''){ ?>
		            <p class="section-small_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_small_heading')); ?>
		            </p>
	            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_heading')!=''){ ?>
		            <h2 class="section-main_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_heading')); ?>
		            </h2>
	            <?php } ?>
			</div>
		</div>
		<div class="row">
			<?php $count=get_theme_mod('vw_gardening_landscaping_pro_our_expertise_number');
			for($i=1;$i<=$count;$i++) { ?>
				<div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp delay-1000 animated" data-wow-duration="3s">
					<div class="our-expertise-features borderd-first text-center">
						<?php if(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_feature_icon'.$i)!=''){ ?>
							<img src="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_feature_icon'.$i)); ?>" alt="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_feature_icon_alt_text'.$i)); ?>"><span class="screen-reader-text"><?php esc_html_e( 'feature icon','vw-gardening-landscaping-pro' );?></span>
						<?php } if(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_feature_title'.$i)!=''){ ?>
				            <h3 class="feature-heading">
				              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_feature_title'.$i)); ?>
				            </h3>
			            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_feature_text'.$i)!=''){ ?>
				            <p class="content-para">
				              <?php echo (get_theme_mod('vw_gardening_landscaping_pro_our_expertise_feature_text'.$i)); ?>
				            </p>
			            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_feature_button_title'.$i)!=''){ ?>
			            	<a class="borderd-first hvr-bounce-out" href="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_feature_button_url'.$i)); ?>">
								<span class="feature-heading"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_expertise_feature_button_title'.$i)); ?></span>
							</a>
			            <?php } ?>
			        </div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>