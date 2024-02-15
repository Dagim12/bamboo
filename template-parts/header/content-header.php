<?php
/**
 * Template part for displaying header content
 *
 * @package vw_gardening_landscaping_pro
 */
$sticky_header="";
if ( get_theme_mod('vw_gardening_landscaping_pro_header_sticky',true) == "1" ) {

  $sticky_header="yes";
}else{

  $sticky_header="no";
}
$header_col1="";
$header_col2="";
if ( get_theme_mod('vw_gardening_landscaping_pro_header_section_button_show',true) == "1" ) {
	$header_col1="col-lg-7 col-md-2 col-sm-2";
	$header_col2="col-lg-2 col-md-4 col-sm-4";
}else{
	$header_col1="col-lg-9 col-md-6 col-sm-6";
	$header_col2="";
}
$menu_width="";
if ( get_theme_mod('vw_gardening_landscaping_pro_site_menu_width',true) != "" ) {
  $menu_width=get_theme_mod('vw_gardening_landscaping_pro_site_menu_width','250');
}
?>
<?php $vw_gardening_landscaping_header_layout = get_theme_mod( 'vw_gardening_landscaping_main_header_layout','Default');
if($vw_gardening_landscaping_header_layout == 'Default'){ ?>
	<div class="container nav_wrap">
		<div class="main-header-box" id="vw-sticky-menu">
		    <div class="row bg-media">
		    	<div class="col-lg-3 col-md-6 col-sm-6 col-9 logo-box">
		    		<div class="logo text-left">
						<?php 
							if( has_custom_logo() ){  vw_gardening_landscaping_pro_the_custom_logo();  } 
							$logo= get_theme_mod( 'custom_logo' );
							if($logo){ ?>
							<div class="logo-text">
								<?php if( get_theme_mod('vw_gardening_landscaping_pro_display_title', true) != ''){ ?>
								<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h2>
								<?php }
								  if( get_theme_mod('vw_gardening_landscaping_pro_display_tagline', true) != ''){ 
								  $description = get_bloginfo( 'description', 'display' );
								  if ( $description || is_customize_preview() ) : ?>
								  <p>
								    <?php echo esc_html($description); ?>
								  </p>
								<?php endif; } 
								?>
							</div>
							<?php } else { ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo( 'name' ); ?>"/></a>  
						<?php }?>
		      		</div>
		    	</div>
				<div class="<?php echo esc_attr($header_col1); ?> col-3 header-nav">
					<?php get_template_part( 'template-parts/header/navigation' ); ?>
				</div>
		     	<?php if ( get_theme_mod('vw_gardening_landscaping_pro_header_section_button_show',true) == "1" ) { ?>
				    <div class="<?php echo esc_attr($header_col2); ?> header-button d-flex justify-content-end align-items-center">
				    	<?php if(get_theme_mod('vw_gardening_landscaping_pro_header_section_button_title')!=''){ ?>
				    		<a href="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_header_section_button_url')); ?>" class="hvr-bounce-out">
				    			<span class="head-foot-fontfam">
				    				<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_header_section_button_title')); ?>
				    			</span>
				    		</a>
				    	<?php } ?>
				    </div>
					<?php } ?>
		    </div>
		    <span id="vw-sticky-onoff">
        	<?php echo esc_html($sticky_header); ?>
      	</span>
	  	</div>
	</div>
	<?php } ?>
<span class="d-none" id="menu-width"><?php echo esc_html($menu_width); ?></span>