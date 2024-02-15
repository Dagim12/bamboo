<?php
/**
 * Template Name:services
 */
get_header(); 
get_template_part( 'template-parts/banner' ); ?>
<?php do_action('vw_gardening_landscaping_pro_before_page'); ?>
<div class="container">
  <main id="maincontent" role="main">
    <section id="service-temp-serv">
      <?php if (get_theme_mod('vw_gardening_landscaping_pro_serv_temp_service_small_tiltle') != ''){ ?>
          <span class="text-center"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_serv_temp_service_small_tiltle')); ?></span>
      <?php } ?>
      <?php if (get_theme_mod('vw_gardening_landscaping_pro_serv_temp_service_tiltle') != ''){ ?>
          <h2 class="text-center pb-4"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_serv_temp_service_tiltle')); ?></h2>
      <?php } ?>
      <?php 
        $service_count = get_theme_mod('vw_gardening_landscaping_pro_serv_temp_service_count');

        if (get_theme_mod('vw_gardening_landscaping_pro_serv_temp_service_count') != ''){ ?>
          <div class="row pt-5">
            <?php for ($i=1; $i<=$service_count; $i++) { ?>
                <div class="col-lg-4">
                  <div class="serv-tem-serv-box">
                    <?php if (get_theme_mod('vw_gardening_landscaping_pro_serv_temp_service_img'.$i) != ''){?>
                      <img src="<?php echo esc_url(get_theme_mod('vw_gardening_landscaping_pro_serv_temp_service_img'.$i)); ?>">
                    <?php } ?>
                    <?php if (get_theme_mod('vw_gardening_landscaping_pro_serv_temp_service_head'.$i) != ''){ ?>
                        <a href="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_serv_temp_service_head_url'.$i)); ?>"><h3 class="py-4"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_serv_temp_service_head'.$i)); ?></h3></a>
                    <?php } ?>
                    <?php if (get_theme_mod('vw_gardening_landscaping_pro_serv_temp_service_text'.$i) != ''){ ?>
                        <p><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_serv_temp_service_text'.$i)); ?></p>
                    <?php } ?>
                  </div>                  
                </div>
           <?php } ?>
         </div>
        <?php }
      ?>
    </section>
    <section id="service-features">
      <?php if (get_theme_mod('vw_gardening_landscaping_pro_service_temp_serv_feature_head') !=''){?>
        <h2 class="text-center"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_service_temp_serv_feature_head')); ?></h2>
      <?php } ?>
      <div class="service-featur-box">
        <?php echo do_shortcode(get_theme_mod('vw_gardening_landscaping_pro_service_temp_service_feature_shortcode')); ?>
      </div>
    </section>
  </main>
</div>
<?php do_action('vw_gardening_landscaping_pro_after_page'); ?>
<?php get_footer(); ?>