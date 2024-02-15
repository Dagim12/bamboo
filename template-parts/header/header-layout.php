<?php
/**
 * Template part for displaying header content layout
 *
 * @package vw_gardening_landscaping_pro
 */
$sticky_header="";
if ( get_theme_mod('vw_gardening_landscaping_pro_header_sticky',true) == "1" ) {

  $sticky_header="yes";
}else{

  $sticky_header="no";
}
$menu_width="";
if ( get_theme_mod('vw_gardening_landscaping_pro_site_menu_width',true) != "" ) {
  $menu_width=get_theme_mod('vw_gardening_landscaping_pro_site_menu_width','250');
}
?>
<?php $vw_gardening_landscaping_header_layout = get_theme_mod( 'vw_gardening_landscaping_main_header_layout', 'Default');
if($vw_gardening_landscaping_header_layout == 'Layout 2'){ ?>
	<div class="container nav_wrap">
		<div class="main-header-box">
    	<div class="row bg-media main-header my-3">
	    	<div class="col-lg-7 col-md-5 col-sm-4 align-self-center">
	        <div class="logo text-left">
	          <?php if( has_custom_logo() ){  vw_gardening_landscaping_pro_the_custom_logo(); } ?>
	          <div class="logo-text">
	            <?php if( get_theme_mod('vw_gardening_landscaping_pro_display_title', true) != ''){ ?>
	            	<h1 class="p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
	            <?php } 
	            if( get_theme_mod('vw_gardening_landscaping_pro_display_tagline', true) != ''){
	              	$description = get_bloginfo( 'description', 'display' );
	                if ( $description || is_customize_preview() ) : ?>
	                  <p class="site-description"><?php echo esc_html($description); ?></p>
	            <?php endif; } ?>
	      		</div>
	    		</div>
	      </div>
	      <div class="col-lg-3 col-md-4 col-sm-4 align-self-center text-center">
	        <?php if(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_phone_no_title')!=''){ ?>
	          <span class="call"><i class="<?php echo esc_attr(get_theme_mod('vw_gardening_landscaping_phone_icon','fas fa-phone')); ?>"></i></span><span class="ml-2 call-info"><a href="tel:<?php echo esc_attr( get_theme_mod('vw_gardening_landscaping_pro_topbar_section_phone_no','') ); ?>"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_topbar_section_phone_no',''));?></a></span>
	       	<?php } ?>
	      </div>
	      <div class="col-lg-2 col-md-3 col-sm-4 align-self-center text-left">
		      <?php if ( get_theme_mod('vw_gardening_landscaping_pro_header_section_button_show',true) == "1" ) { ?>
					    <div class="header-button d-flex justify-content-end align-items-center">
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
			</div>

	  <div class="menu-bg">
	    <div class="row">
	      <div class="col-lg-10 col-md-8 col-sm-8 col-4 align-self-center text-left">
	        <div id="header" class="menubar">
	          <?php if(has_nav_menu('primary')){ ?>
	            <div class="toggle-nav mobile-menu">
	              <button role="tab" onclick="vw_gardening_landscaping_menu_open_nav()" class="responsivetoggle"><i class="<?php echo esc_attr(get_theme_mod('vw_gardening_landscaping_res_menu_open_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-gardening-landscaping-pro'); ?></span></button>
	            </div> 
	          <?php } ?>
	          <div class="header-nav text-left">
	      			<?php get_template_part( 'template-parts/header/navigation' ); ?>
		     		</div>
		        <span id="vw-sticky-onoff">
		        	<?php echo esc_html($sticky_header); ?>
		      	</span>
	        </div>
	      </div>
	      <div class="col-lg-1 col-md-2 col-sm-2 col-4 align-self-center text-left">
	        <?php if(get_theme_mod('vw_gardening_landscaping_pro_header_search_toggle',true) !=''){ ?>
						<div class="<?php echo esc_attr($search_col2); ?> topbar-search text-center search-box">
	            <a href="JavaScript:void(0);" onclick="showVWSearch()"><span class="search-icon"><i class="fas fa-search"></i>
	            </span></a>
						</div>
					<?php } ?>
	      </div>
	      <div class="col-lg-1 col-md-2 col-sm-2 col-4 align-self-center text-left">
	        <?php if(class_exists('woocommerce')){ ?>
	          <div class="cart_no">
	            <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','vw-gardening-landscaping-pro' ); ?>"><i class="fas fa-shopping-cart"></i><span class="screen-reader-text"><?php esc_html_e( 'shopping cart','vw-gardening-landscaping-pro' );?></span></a>
	          </div>
	        <?php } ?>
	      </div>
	    </div>

	    <div class="serach_outer">
      	<div class="closepop"><a href="JavaScript:void(0);" onclick="closeVWSearch()"><i class="far fa-window-close"></i></a></div>
        	<div class="vw_gardening_serach_inner search_popup">
          	<?php get_search_form(); ?>
        	</div>
      </div>
	  </div>
</div>
	</div>
<?php } ?>
<span class="d-none" id="menu-width"><?php echo esc_html($menu_width); ?></span>