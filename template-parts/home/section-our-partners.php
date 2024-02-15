<?php 
/**
 * Template to show the content of Our Partners
 *
 * @package vw-gardening-landscaping-pro
 */ 
$about_section = get_theme_mod( 'vw_gardening_landscaping_pro_our_blog_partners_enable' );
if ( 'Disable' == $about_section ) {
  return;
} ?>
<section id="our-partners">
	<div class="container">
		<div class="row wow fadeInUp delay-1000 animated" data-wow-duration="3s">
			<div class="col-lg-7 col-md-6">
				<div class="our-partners-box text-center owl-carousel">
					<?php $pcount=get_theme_mod('vw_gardening_landscaping_pro_our_blog_partners_number');
					for($i=1;$i<=$pcount;$i++) { ?>
						<?php if(get_theme_mod('vw_gardening_landscaping_pro_our_blog_partners_image'.$i)!=''){ ?>
							<img src="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_blog_partners_image'.$i)); ?>" alt="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_blog_partners_image_alt_text'.$i)); ?>">
						<?php } ?>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-5 col-md-6 our-partners-image">
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_our_blog_partners_main_image')!=''){ ?>
					<img src="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_blog_partners_main_image')); ?>" alt="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_blog_partners_main_image_alt_text')); ?>">
				<?php } ?>
			</div>
		</div>
	</div>
</section>