<?php 
/**
 * Template to show the content of Slider
 *
 * @package vw-gardening-landscaping-pro
 */ 
$section_hide = get_theme_mod( 'vw_gardening_landscaping_pro_slider_enabledisable' );
if ( 'Disable' == $section_hide ) {
  return;
}
$number = get_theme_mod('vw_gardening_landscaping_pro_slide_number'); 
$slide_delay = get_theme_mod('vw_gardening_landscaping_pro_slide_delay'); 
  if($number != ''){ ?>
  <section id="vw_gardening_slider" class="m-auto p-0">
    <div id="carouselExampleIndicators" class="carousel slide <?php if ( get_theme_mod('vw_gardening_landscaping_pro_slide_remove_fade',true) == 1 ) { ?> carousel-fade <?php } ?>" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr($slide_delay); ?>">
      <div class="carousel-inner m-0" role="listbox">
        <?php for ($i=1; $i<=$number; $i++) { ?>
          <?php if(get_theme_mod('vw_gardening_landscaping_pro_slide_image'.$i) != ''){ ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?> >
              <?php if ( get_theme_mod('vw_gardening_landscaping_pro_slide_image',true) != "" ) {?>
                <img src="<?php echo esc_url(get_theme_mod('vw_gardening_landscaping_pro_slide_image'.$i)); ?>" alt="<?php echo esc_attr(get_theme_mod('vw_gardening_landscaping_pro_slide_title'.$i, true)); ?>" title="#slidecaption<?php echo esc_html($i); ?>">
              <?php } ?>
              <?php if ( get_theme_mod('vw_gardening_landscaping_pro_slide_heading'.$i,true) != "" && get_theme_mod('vw_gardening_landscaping_pro_slide_text'.$i,true) != "" && get_theme_mod('vw_gardening_landscaping_pro_slide_small_heading'.$i,true) != "") {?>
                <div class="carousel-caption d-md-block m-0 p-0 text-start">
                  <div class="container h-100">
                    <div class="row h-100">
                      <div class="inner_carousel">
                        <div class="slider-box pos-abs w-lg-71">
                          <span class="animated fadeInDown delay-1000 small_head"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_slide_small_heading'.$i)); ?></span>
                          <h1 class="font-weight-bold animated fadeInRight delay-1000 feature-heading white-color"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_slide_heading'.$i)); ?></h1>
                          <div class="prop_desc d-sm-none d-md-block"><p class="content-para fonts-14"><?php echo (get_theme_mod('vw_gardening_landscaping_pro_slide_text'.$i)); ?></p></div>
                          <?php if( get_theme_mod('[vw_gardening_landscaping_pro_slide_btntext]'.$i, true) != ''){ ?>
                            <a class="read-more borderd-wht font-weight-bold theme_button hvr-bounce-out animated fadeInLeft delay-1000" href="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_slide_btnurl'.$i)); ?>"><span class="feature-heading color-blck"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_slide_btntext'.$i)); ?></span><span class="screen-reader-text color-blck"><?php echo esc_html('slider button2', 'vw-gardening-landscaping-pro' ) ; ?></span>
                            </a>
                          <?php } ?>
                          <?php if( get_theme_mod('[vw_gardening_landscaping_pro_slide_second_btntext]'.$i, true) != ''){ ?>
                            <a class="read-more borderd-wht font-weight-bold theme_button hvr-bounce-out animated fadeInRight delay-1000" href="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_slide_second_btnurl'.$i)); ?>"><span class="feature-heading color-blck"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_slide_second_btntext'.$i)); ?></span><span class="screen-reader-text color-blck"><?php echo esc_html('slider button2', 'vw-gardening-landscaping-pro' ) ; ?></span></a>
                          <?php } ?>
                        </div>
                      </div>
                    </div> 
                    <?php if( get_theme_mod('vw_gardening_landscaping_pro_slider_arrows', true) != ''){ ?>
                      <div class="slide_nav borderd-second">
                        <a class="carousel-prev-button pos-abs hvr-shrink borderd-wht" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true">
                            <?php if ( get_theme_mod('vw_gardening_landscaping_pro_slider_section_prev_nav_icon', true) != '') { ?>
                              <i class="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_slider_section_prev_nav_icon')); ?>"></i>
                            <?php } ?>
                          </span>
                          <span class="sr-only"><?php esc_html_e('Previous','vw-gardening-landscaping-pro'); ?></span>
                        </a>
                        <a class="carousel-next-button pos-abs hvr-shrink borderd-wht" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true">
                            <?php if ( get_theme_mod('vw_gardening_landscaping_pro_slider_section_next_nav_icon', true) != '') { ?>
                              <i class="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_slider_section_next_nav_icon')); ?>"></i>
                            <?php } ?>
                          </span>
                          <span class="sr-only"><?php esc_html_e('Next','vw-gardening-landscaping-pro'); ?></span>
                        </a>
                      </div>
                    <?php } ?>
                  </div>
                </div>  
              <?php } ?>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
      <ol class="carousel-indicators">
        <?php for($i=1;$i<=$number;$i++){ ?>
          <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo($i-1); ?>" class="<?php if($i==1){echo 'active';} ?>"></li>
        <?php } ?>
      </ol>   
    </div> 
    <div class="clearfix"></div>
  </section>
<?php } ?>