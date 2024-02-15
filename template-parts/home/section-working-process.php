<?php 
/**
 * Template to show the content of Working Process 
 *
 * @package vw-gardening-landscaping-pro
 */ 
$about_section = get_theme_mod( 'vw_gardening_landscaping_pro_working_process_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
if( get_theme_mod('vw_gardening_landscaping_pro_working_process_bgcolor') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_working_process_bgcolor')).';';
}elseif( get_theme_mod('vw_gardening_landscaping_pro_working_process_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_gardening_landscaping_pro_working_process_bgimage')).'\')';
}else{
  $about_backg = '';
} ?>
<section id="working-process" style="<?php echo esc_attr($about_backg); ?>">
	<div class="container">
		<div class="row working-process-head text-center wow fadeInDown delay-1000 animated" data-wow-duration="3s">
			<div class="col-lg-12 col-md-12">
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_working_process_small_heading')!=''){ ?>
		            <p class="section-small_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_working_process_small_heading')); ?>
		            </p>
	            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_working_process_heading')!=''){ ?>
		            <h2 class="section-main_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_working_process_heading')); ?>
		            </h2>
	            <?php } ?>
			</div>
		</div>
		<div class="row wow fadeInUp delay-1000 animated" data-wow-duration="3s">
			<?php $process_count=get_theme_mod('vw_gardening_landscaping_pro_working_process_number');
			for($i=1;$i<=$process_count;$i++) { ?>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="working-process-box borderd-wht">
						<div class="row">
							<div class="col-lg-2 col-md-2 col-2">
								<?php if(get_theme_mod('vw_gardening_landscaping_pro_working_process_icon'.$i)!=''){ ?>
									<span class="borderd-wht"><i class="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_working_process_icon'.$i)); ?> color-blck"></i></span>
								<?php } ?>
							</div>
							<div class="col-lg-10 col-md-10 col-10">
								<?php if(get_theme_mod('vw_gardening_landscaping_pro_working_process_no'.$i)!=''){ ?>
						            <div class="feature-number feature-heading">
						              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_working_process_no'.$i)); ?>
						            </div>
					            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_working_process_title'.$i)!=''){ ?>
						            <a class="feature-heading" href="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_working_process_title_url'.$i)); ?>">
						              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_working_process_title'.$i)); ?><span class="screen-reader-text"><?php echo esc_html('Working process tittle', 'vw-gardening-landscaping-pro' ) ; ?></span>
						            </a>
					            <?php } ?>
					       </div>
					    </div>
					</div>
				</div>	
			<?php } ?>
		</div>
	</div>
</section>