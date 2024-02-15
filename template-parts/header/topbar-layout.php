<?php 
/* Template For Displying Topbar Content */
$about_section = get_theme_mod( 'vw_gardening_landscaping_pro_topbar_section_enable' );
if ( 'Disable' == $about_section ) {
  $topbar='display:none;';
} else{
	$topbar='display:block;';
}
if( get_theme_mod('vw_gardening_landscaping_pro_topbar_section_bgcolor') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_bgcolor')).';';
}elseif( get_theme_mod('vw_gardening_landscaping_pro_topbar_section_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_bgimage')).'\');';
}else{
  $about_backg = '';
}
$search_col1="";
$search_col2="";
if(get_theme_mod('vw_gardening_landscaping_pro_header_search_toggle',true)=='') {
	$search_col1="col-lg-5 col-md-12 col-12";
	$search_col2="";
} else{
	$search_col1="col-lg-4 col-md-10 col-10";
	$search_col2="col-lg-1 col-md-2 col-2";
} ?>
<div id="topbar-social-search" style="<?php echo esc_attr($about_backg); echo esc_attr($topbar); ?>" class="topbar-lay py-2">
<div class="container">
	<div class="row">
		<div class="col-lg-4 col-md-4 topbar-text">
			<?php if( get_theme_mod( 'vw_gardening_landscaping_pro_timming') != '') { ?>
			<i class="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_time_icon')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_timming',''));?></span>
			<?php }?>
		</div>
		<div class="col-lg-4 col-md-4 topbar-text">
			<?php if(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_email_id')!=''){ ?>
			<a href="mailto:"><span><?php if(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_email_icon')!=''){ ?><i class="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_email_icon')); ?>"></i>
					<?php } ?>
					<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_email_id')); ?></span></a>		            
			<?php } ?>
		</div>
		<div class="col-lg-4 col-md-4">
			<?php get_template_part( 'template-parts/home/social-icons' ); ?>
		</div>
		</div>
	</div>
</div>