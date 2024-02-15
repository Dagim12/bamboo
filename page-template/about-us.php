<?php
/**
 * Template Name:About Us
 */
get_header(); 
get_template_part( 'template-parts/banner' ); ?>
<?php do_action('vw_gardening_landscaping_pro_before_page'); ?>
<div class="container">
  <main id="maincontent" role="main">
    <section id="about-us-main">
      <div class="row about-main-box">
        <div class="col-lg-7 col-md-7 about-content-box">
          <?php if (get_theme_mod('vw_gardening_pro_about_temp_title') != ""){?>
            <h3 class="wow fadeInUp delay-1000 animated" data-wow-duration="3s"><?php echo esc_html(get_theme_mod('vw_gardening_pro_about_temp_title')); ?></h3>
          <?php } ?>
          <?php if (get_theme_mod('vw_gardening_pro_about_temp_text') != ""){?>
            <p class="wow fadeInUp delay-1000 animated" data-wow-duration="3s"><?php echo esc_html(get_theme_mod('vw_gardening_pro_about_temp_text')); ?></p>
          <?php } ?>
        </div>
        <div class="col-lg-5 col-md-5 about-box-img p-0 wow fadeInUp delay-1000 animated" data-wow-duration="3s">
          <?php if (get_theme_mod('vw_gardening_pro_about_temp_img') !=""){?>
            <img src="<?php echo esc_url(get_theme_mod('vw_gardening_pro_about_temp_img')); ?>">
          <?php } ?>
        </div>
      </div>
    </section>
    <section id="exeptional-service">
      <div class="abt-serv-box">
        <div class="exep-service-head">
          <?php if(get_theme_mod('vw_gardening_pro_about_temp_exp_srv_small_head') !=""){?>
            <span class="wow fadeInUp delay-1000 animated" data-wow-duration="3s"><?php echo esc_html(get_theme_mod('vw_gardening_pro_about_temp_exp_srv_small_head')); ?></span>
          <?php } ?>
          <?php if(get_theme_mod('vw_gardening_pro_about_temp_exp_srv_head') !=""){?>
            <h3 class="wow fadeInUp delay-1000 animated" data-wow-duration="3s"><?php echo esc_html(get_theme_mod('vw_gardening_pro_about_temp_exp_srv_head')); ?></h3>
          <?php } ?>
        </div>
        <div class="service-exp-box row pt-4">
          <?php 
            $servcount = (get_theme_mod('vw_gardening_landscaping_pro_abt_temp_serv_count')); 
            if (get_theme_mod('vw_gardening_landscaping_pro_abt_temp_serv_count') !=""){
              for ($i=1; $i<=$servcount; $i++) { ?>
                <div class="col-lg-6 pb-4 serv-expimg-box wow fadeInUp delay-1000 animated" data-wow-duration="3s">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 serv-exp-image">
                      <?php if(get_theme_mod('vw_gardening_landscaping_pro_abt_temp_serv_exp_img'.$i) != ""){?>
                        <img src="<?php echo esc_url(get_theme_mod('vw_gardening_landscaping_pro_abt_temp_serv_exp_img'.$i)); ?>">
                      <?php } ?>
                    </div>
                    <div class="col-lg-9 col-md-9">
                      <?php if(get_theme_mod('vw_gardening_landscaping_pro_abt_serv_exp_title'.$i) !=""){?>
                        <h4><?php echo (get_theme_mod('vw_gardening_landscaping_pro_abt_serv_exp_title'.$i)) ; ?></h4>
                      <?php } ?>
                      <?php if(get_theme_mod('vw_gardening_landscaping_pro_abt_serv_exp_text'.$i) !=""){?>
                        <p><?php echo (get_theme_mod('vw_gardening_landscaping_pro_abt_serv_exp_text'.$i)) ; ?></p>
                      <?php } ?>
                    </div>
                  </div>
                </div>
             <?php } } ?>
        </div>
      </div>
    </section>
    <section id="why-we-best">
      <div class="why-best-main-box">
        <div class="row why-we-best-box">
          <div class="col-lg-5 col-md-5">
            <?php if (get_theme_mod('vw_gardening_landscaping_pro_why_best_img') !=""){?>
              <img src="<?php echo(get_theme_mod('vw_gardening_landscaping_pro_why_best_img')); ?>">
            <?php } ?>
          </div>
          <div class="col-lg-7 col-md-7 best-back-box">
            <div class="why-best-head">
              <?php if (get_theme_mod('vw_gardening_landscaping_pro_abt_temp_why_best_small_title') != ""){ ?>
                <span class="wow fadeInUp delay-1000 animated" data-wow-duration="3s"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_abt_temp_why_best_small_title')); ?></span>
              <?php } ?>
              <?php if (get_theme_mod('vw_gardening_landscaping_pro_abt_temp_why_best_head') != ""){ ?>
                <h3 class="wow fadeInUp delay-1000 animated" data-wow-duration="3s"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_abt_temp_why_best_head')); ?></h3>
              <?php } ?>
            </div>
            <div class="why-best-box row pt-4">
              <?php 
                $bestcount = (get_theme_mod('vw_gardening_landscaping_pro_abt_temp_why_best_count')); 
                if (get_theme_mod('vw_gardening_landscaping_pro_abt_temp_why_best_count') !=""){
                  for ($i=1; $i<=$bestcount; $i++) { ?>
                    <div class="col-lg-6 pb-4 best-content-box wow fadeInUp delay-1000 animated" data-wow-duration="3s">
                      <div class="row">
                        <div class="col-lg-3 col-md-3 best-image">
                          <?php if(get_theme_mod('vw_gardening_landscaping_pro_abt_temp_why_best_img'.$i) != ""){?>
                            <img src="<?php echo esc_url(get_theme_mod('vw_gardening_landscaping_pro_abt_temp_why_best_img'.$i)); ?>">
                          <?php } ?>
                        </div>
                        <div class="col-lg-9 col-md-9">
                          <?php if(get_theme_mod('vw_gardening_landscaping_pro_abt_temp_why_best_title'.$i) !=""){?>
                            <h4><?php echo (get_theme_mod('vw_gardening_landscaping_pro_abt_temp_why_best_title'.$i)) ; ?></h4>
                          <?php } ?>
                          <?php if(get_theme_mod('vw_gardening_landscaping_pro_abt_temp_why_best_text'.$i) !=""){?>
                            <p><?php echo (get_theme_mod('vw_gardening_landscaping_pro_abt_temp_why_best_text'.$i)) ; ?></p>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
              <?php } } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</div>
<?php do_action('vw_gardening_landscaping_pro_after_page'); ?>
<?php get_footer(); ?>