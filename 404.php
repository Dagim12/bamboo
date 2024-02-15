<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package vw-gardening-landscaping-pro
 */
get_header();?>
<main id="maincontent" role="main">
<div class="content_page not-found-page">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<?php if (get_theme_mod('vw_gardening_landscaping_pro_404_page_image',true) != '') {?>
					<img src="<?php echo esc_url(get_theme_mod('vw_gardening_landscaping_pro_404_page_image')) ?>">
				<?php }?>
			</div>
			<div class="col-lg-6 col-md-6 box-404">				
					<?php if(get_theme_mod('vw_gardening_landscaping_pro_404_page_title') !=''){?>
						<h3><span class="heading3">
							<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_404_page_title')); ?>
						</span></h3>
					<?php } ?>
					<?php if(get_theme_mod('vw_gardening_landscaping_pro_404_page_text') !=''){?>
						<p class="text-404">
							<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_404_page_text')); ?>
						</p>
					<?php } ?>
					<?php if(get_theme_mod('vw_gardening_landscaping_pro_404_page_btn') !=''){?>
						<div class="read-moresec">
							<div class="btn-404 hvr-bounce-out"><a href="<?php echo esc_url( home_url() ); ?>" class="btn btn-primary">
							<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_404_page_btn')); ?><i class="fas fa-angle-double-right"></i></a></div>
						</div>
					<?php } ?>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</main>
<?php get_footer();  ?>