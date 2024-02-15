<?php 

/**
 * Template to show the content of Pricing Plan 
 *
 * @package vw-gardening-landscaping-pro
 */ 

$about_section = get_theme_mod( 'vw_gardening_landscaping_pro_pricing_plan_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
$img_bg = get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_bgimage_setting');
if( get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_bgcolor') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_bgcolor')).';';
}elseif( get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_bgimage')).'\')';
}else{
  $about_backg = '';
} ?>
<section id="pricing-plans" style="<?php echo esc_attr($about_backg); ?>" class="<?php echo esc_attr($img_bg); ?>">
	<div class="container">
		<div class="row pricing-plan-head text-center bpadding-40 wow fadeInDown delay-1000 animated" data-wow-duration="3s">
			<div class="col-lg-12 col-md-12">
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_small_heading')!=''){ ?>
		            <p class="section-small_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_small_heading')); ?>
		            </p>
	            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_heading')!=''){ ?>
		            <h2 class="section-main_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_heading')); ?>
		            </h2>
	            <?php } ?>
			</div>
		</div>
		<div class="owl-carousel">
			<?php
			$plan_count=get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_number');
			for($i=1;$i<=$plan_count;$i++) { ?>
				<div class="pricing-plans-box wow fadeInUp delay-1000 animated" data-wow-duration="3s">
					<div class="row">
						<div class="col-lg-7 col-md-12 col-sm-7">
							<div class="pricing-plans-content-box">
								<?php if(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_title'.$i)!=''){ ?>
						            <p class="feature-heading color-blck">
						              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_title'.$i)); ?>
						            </p>
					            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_price'.$i)!=''){ ?>
						            <h3 class="feature-heading color-blck">
						              	<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_price'.$i)); ?>
						              	<?php if(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_price_duration'.$i)!=''){ ?>
						              		<sub>
						              			<?php echo "/"; ?>
						              			<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_price_duration'.$i)); ?>
						              		</sub>
						              	<?php } ?>
						            </h3>
					            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_link_title'.$i)!=''){ ?>
					            	<a class="feature-heading fonts-14 color-blck" href="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_link_url'.$i)); ?>">
					            		<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_link_title'.$i)); ?>
					            		<i class="fas fa-angle-right"></i>
					            		
					            	</a>
					            <?php } ?>
					        </div>
						</div>
						<div class="col-lg-5 col-md-12 col-sm-5 pricing-plans-features">
							<div class="pricing-plans-features_box">
								<ul>
									<?php $feature_count=get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_feature_number'.$i);
									for($j=1;$j<=$feature_count;$j++) { ?>
										<?php if(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_feature_title'.$i.$j)!=''){ ?>
											<li class="content-para">	
												<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_feature_title'.$i.$j)); ?>
											</li>
									<?php } } ?>
								</ul>
							</div>
						</div>	
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>