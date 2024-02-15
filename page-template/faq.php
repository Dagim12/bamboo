<?php
/**
 * Template Name:FAQ
 */
get_header(); 
get_template_part( 'template-parts/banner' ); ?>
<?php do_action('vw_gardening_landscaping_pro_before_page'); ?>
<div class="container">
  <main id="maincontent" role="main">
    <div class="middle-align">
      <div id="faq">
        <div class="faq-box">
          <div class="faq-haeding">
            <?php if (get_theme_mod('vw_gardening_landscaping_pro_faq_heading')!=''){?>
              <h3><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_faq_heading')); ?></h3>
            <?php } ?>
          </div>
          <?php 
          $fcount=get_theme_mod('vw_gardening_landscaping_pro_our_faq_number');
          for($j=1;$j<=$fcount;$j++)
          {?>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <?php if(get_theme_mod('vw_gardening_landscaping_pro_our_faq_title'.$j)!=''){ ?>
              <h2 class="accordion-header" id="heading<?php echo esc_attr($j); ?>">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($j); ?>" aria-expanded="true" aria-controls="collapseOne">
                  <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_faq_title'.$j)); ?>
                </button>
              </h2>
            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_our_faq_text'.$j)!=''){ ?>
              <div id="collapse<?php echo esc_attr($j); ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo esc_attr($j); ?>" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_faq_text'.$j)); ?>
                </div>
              </div>
            <?php }?>
            </div>
          </div>
          <?php } ?>
        </div>
        <div class="faq-box2">
          <div class="row">
            <div class="faq-haeding">
              <?php if (get_theme_mod('vw_gardening_landscaping_pro_faq_heading2')!=''){?>
                <h3><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_faq_heading2')); ?></h3>
              <?php } ?>
            </div>
            <div class="col-lg-7">              
                <?php 
                $fcount=get_theme_mod('vw_gardening_landscaping_pro_our_faq_number2');
                for($j=1;$j<=$fcount;$j++)
                {?>
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <?php if(get_theme_mod('vw_gardening_landscaping_pro_our_faq_title2'.$j)!=''){ ?>
                    <h2 class="accordion-header" id="heading<?php echo esc_attr($j); ?>">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($j); ?>" aria-expanded="true" aria-controls="collapseOne">
                        <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_faq_title2'.$j)); ?>
                      </button>
                    </h2>
                  <?php } if(get_theme_mod('vw_gardening_landscaping_pro_our_faq_text2'.$j)!=''){ ?>
                    <div id="collapse<?php echo esc_attr($j); ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo esc_attr($j); ?>" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_faq_text2'.$j)); ?>
                      </div>
                    </div>
                  <?php }?>
                  </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-lg-5">
              <?php if (get_theme_mod('vw_gardening_landscaping_faq_box_img') !=''){?>
                <img src="<?php echo esc_url(get_theme_mod('vw_gardening_landscaping_faq_box_img')) ?>">
              <?php } ?>
            </div>            
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
<?php do_action('vw_gardening_landscaping_pro_after_page'); ?>
<?php get_footer(); ?>