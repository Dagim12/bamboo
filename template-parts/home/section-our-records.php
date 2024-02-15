<?php 

/**
 * Template to show the content of Our Products
 *
 * @package vw-gardening-landscaping-pro
 */ 

$about_section = get_theme_mod( 'vw_gardening_landscaping_pro_our_products_records_enable' );
if ( 'Disable' == $about_section ) {
  return;
} ?>
<div id="our-records" class="wow fadeInUp delay-1000 animated" data-wow-duration="3s">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-12 our-records-image">
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_our_products_records_image')!=''){ ?>
					<img src="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_records_image')); ?>  " alt="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_records_image_products')); ?>">
				<?php } ?>
			</div>
			<div class="col-lg-7 col-md-12 our-records-box">
				<div class="our-records-content">
					<div class="row">
						<?php for($i=1;$i<=4;$i++){ ?>
							<div class="col-lg-3 col-md-3 col-6">
								<?php if(get_theme_mod('vw_gardening_landscaping_pro_our_products_records_icon'.$i)!=''){ ?>
									<img src="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_records_icon'.$i)); ?>" alt="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_records_icon_alt_text'.$i)); ?>" >
								<?php } ?>
								<div>
									<?php if(get_theme_mod('vw_gardening_landscaping_pro_our_products_record_no'.$i)!=''){ ?>
							            <span class="vw_count feature-heading color-blck">
							              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_record_no'.$i)); ?>
							            </span>
						            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_our_products_record_no_suffix'.$i)!=''){ ?>
							            <span class="feature-heading color-blck">
							              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_record_no_suffix'.$i)); ?>
							            </span>
						            <?php } ?>
						        </div>
					            <?php if(get_theme_mod('vw_gardening_landscaping_pro_our_products_record_title'.$i)!=''){ ?>
						            <p class="feature-heading">
						              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_record_title'.$i)); ?>
						            </p>
					            <?php } ?>
							</div>	
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>