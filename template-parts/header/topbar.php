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

<div id="topbar-social-search" style="<?php echo esc_attr($about_backg); echo esc_attr($topbar); ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 topbar-text">
				<?php $vw_gardening_landscaping_pro_contact_option = get_theme_mod( 'vw_gardening_landscaping_pro_topbar_contact_options','Call');
					if($vw_gardening_landscaping_pro_contact_option == 'Call'){ ?>
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_phone_no_title')!=''){ ?>
				<a href="tel:<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_phone_no')); ?>"><span>
					<?php if(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_phone_icon')!=''){ ?>	
						<i class="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_phone_icon')); ?>"></i>
					<?php } ?>
					<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_phone_no_title')); ?>
					<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_phone_no')); ?>
					</span></a>
					<span>&#124;</span>
					<?php } ?>
				<?php } else if ($vw_gardening_landscaping_pro_contact_option == 'Whatsapp') { ?>
					<?php if(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_phone_no')!=''){ ?>
					<a href="https://wa.me/<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_phone_no')); ?>" target=_blank><span>
					<?php if(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_phone_icon')!=''){ ?>	
					<i class="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_phone_icon')); ?>"></i>
					<?php } ?>
					<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_phone_no')); ?>
					</span></a>
					<span>&#124;</span>
					<?php } ?>
				<?php } ?>
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_email_id')!=''){ ?>
				<a href="mailto:"><span>
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_email_icon')!=''){ ?>	
				<i class="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_email_icon')); ?>"></i>
				<?php } ?>
	        	<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_email_id')); ?>
	            </span></a>		            
	        	<?php } ?>
			</div>
			<div class="<?php echo esc_attr($search_col1); ?>">
				<?php get_template_part( 'template-parts/home/social-icons' ); ?>
			</div>
			<?php if(get_theme_mod('vw_gardening_landscaping_pro_header_search_toggle',true) !=''){ ?>
				<div class="<?php echo esc_attr($search_col2); ?> topbar-search text-center">
          		<a href="JavaScript:void(0);" onclick="showVWSearch()"><span class="search-icon"><i class="fas fa-search"></i></span></a>
				</div>
			<?php } ?>
			<div class="serach_outer">
      			<div class="closepop"><a href="JavaScript:void(0);" onclick="closeVWSearch()"><i class="far fa-window-close"></i></a></div>
		      	<div class="vw_gardening_serach_inner search_popup">
		        	<?php get_search_form(); ?>
		      	</div>
    		</div>
		</div>
	</div>
</div>