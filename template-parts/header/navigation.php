<div class="menubar m-0">
  <div class="container right_menu">
    <div class="innermenubox ">
      <div class="menu-box">
        <div class="headerbar">
          <div role="button" tabindex="0" class="hamburger" id="open_nav"><i class="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_res_open_menu_icon','fas fa-bars')); ?>"></i></div>
        </div>
        <div class="main-header">
          <div class="side-navigation text-left">
            <?php wp_nav_menu( array( 
              'theme_location' => 'primary',
              'menu_class'     => 'primary-menu',
            ) ); ?>
          </div>
        </div>
        <amp-sidebar id="sidebar1" layout="nodisplay" side="left">
          <div role="button" aria-label="close sidebar" tabindex="0" class="close-sidebar pr-3" id="close_nav"><i class="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_res_close_menus_icon','fas fa-times')); ?>"></i></div>
          <div class="side-navigation ">
            <?php wp_nav_menu( array( 
              'theme_location' => 'primary',
              'menu_class'     => 'primary-menu',
            ) ); ?>
          </div>
        </amp-sidebar>
      </div>
    </div>
  </div>
</div>