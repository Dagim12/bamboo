<?php
/**
 * The Template for displaying all single teachers.
 *
 * @package vw-gardening-landscaping-pro
 */
get_header(); 
get_template_part( 'template-parts/banner' );
?>
<?php do_action('vw_gardening_landscaping_pro_before_contact_title'); ?>
<div class="container">
    <div id="single-teacher">
        <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-md-7 col-sm-12 col-lg-8 col-xs-12 teachers-content">
                    <div class="inner-page-feature-box"> 
                        <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?> post thumbnail">
                        <h5>
                            <?php if(get_post_meta($post->ID,'meta-designation',true)) { ?>
                                <?php echo esc_html(get_post_meta($post->ID,'meta-designation',true)); ?>
                            <?php } ?>
                        </h5>
                        <?php if(get_post_meta($post->ID,'meta-teacher-email',true)) { ?>
                            <p class="email">
                                <i class="far fa-envelope"></i>
                                <?php echo esc_html(get_post_meta($post->ID,'meta-teacher-email',true)); ?>
                            </p>
                        <?php } if(get_post_meta($post->ID,'meta-teacher-phone',true)) { ?>
                            <p class="phone">
                                <i class="fas fa-phone"></i>
                                <?php echo esc_html(get_post_meta($post->ID,'meta-teacher-phone',true)); ?>
                            </p>
                        <?php } ?>
                        <div class="social-profiles">
                            <?php if(get_post_meta($post->ID,'meta-tfacebookurl',true)) { ?>
                                <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tfacebookurl',true)); ?>" target="_blank"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('facebook', 'vw-gardening-landscaping-pro' ) ; ?></span></a>
                             <?php }
                            if(get_post_meta($post->ID,'meta-ttwitterurl',true)) { ?>
                                <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-ttwitterurl',true)); ?>" target="_blank"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('twitter', 'vw-gardening-landscaping-pro' ) ; ?></span></a>
                            <?php }
                            if(get_post_meta($post->ID,'meta-tlinkdenurl',true)) { ?>
                                 <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tlinkdenurl',true)); ?>" target="_blank"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php echo esc_html('linkedin', 'vw-gardening-landscaping-pro' ) ; ?></span></a>
                            <?php } 
                                if(get_post_meta($post->ID,'meta-tinstagram',true)!= ''){ ?>
                                <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tinstagram',true)); ?>">
                                    <i class="fab fa-instagram align-middle"></i><span class="screen-reader-text"><?php echo esc_html('instagram', 'vw-gardening-landscaping-pro' ) ; ?></span>
                                </a>
                            <?php } if(get_post_meta($post->ID,'meta-pinterest',true)!= ''){ ?>
                                <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-pinterest',true)); ?>">
                                    <i class="fab fa-pinterest-p align-middle " ></i><span class="screen-reader-text"><?php echo esc_html('pinterest', 'vw-gardening-landscaping-pro' ) ; ?></span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="single-page-content"><?php the_content();?></div>
                </div>
                <div class="col-md-5 col-sm-12 col-lg-4 col-xs-12" id="vw_gardening_sidebar">
                  <?php dynamic_sidebar('sidebar-1'); ?>
                </div>
            <?php endwhile; // end of the loop. ?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php get_footer(); ?>