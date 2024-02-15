<?php
/**
 * The Template for displaying all single team.
 *
 * @package vw-gardening-landscaping-pro
 */
get_header(); 
get_template_part( 'template-parts/banner' ); ?>
<?php do_action('vw_gardening_landscaping_pro_before_contact_title'); ?>
<div class="container">
    <div class="row">
        <div id="testimonial_single" class="col-lg-8 col-md-7">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="team_feature-box">
                        <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?> post thumbnail">
                    </div>
                <?php } ?>  
                <?php if(get_post_meta($post->ID,'vw_gardening_landscaping_pro_posttype_testimonial_desigstory',true)!= ''){ ?>
                    <div class="student-desig mb-3 mt-3">
                        <?php echo esc_html(get_post_meta($post->ID,'vw_gardening_landscaping_pro_posttype_testimonial_desigstory',true)); ?>      
                    </div>
                <?php }?>  
                 <div class="social-profiles">
                    <?php if(get_post_meta($post->ID,'meta-tes-facebookurl',true)) { ?>
                        <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-facebookurl',true)); ?>" target="_blank"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('facebook', 'vw-gardening-landscaping-pro' ) ; ?></span></a>
                     <?php }
                    if(get_post_meta($post->ID,'meta-tes-twitterurl',true)) { ?>
                        <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-twitterurl',true)); ?>" target="_blank"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('twitter', 'vw-gardening-landscaping-pro' ) ; ?></span></a>
                    <?php }
                    if(get_post_meta($post->ID,'meta-tes-linkdenurl',true)) { ?>
                         <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-linkdenurl',true)); ?>" target="_blank"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php echo esc_html('linkedin', 'vw-gardening-landscaping-pro' ) ; ?></span></a>
                    <?php } 
                        if(get_post_meta($post->ID,'meta-tes-instagram',true)!= ''){ ?>
                        <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-instagram',true)); ?>">
                            <i class="fab fa-instagram align-middle" ></i><span class="screen-reader-text"><?php echo esc_html('instagram', 'vw-gardening-landscaping-pro' ) ; ?></span>
                        </a>
                    <?php } if(get_post_meta($post->ID,'meta-tes-pinterest',true)!= ''){ ?>
                        <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-pinterest',true)); ?>">
                            <i class="fab fa-pinterest-p align-middle "></i><span class="screen-reader-text"><?php echo esc_html('pinterest', 'vw-gardening-landscaping-pro' ) ; ?></span>
                        </a>
                    <?php } ?>
                </div>
                <div class="single-page-content">
                   <?php the_content();?>
                </div>
                <div class="clearfix"></div>
            <?php endwhile; // end of the loop. ?>
            <div class="post_pagination mt-4">
                <?php the_post_navigation( array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'vw-gardening-landscaping-pro' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Next post:', 'vw-gardening-landscaping-pro' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'vw-gardening-landscaping-pro' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-gardening-landscaping-pro' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                ) );?>
            </div>
        </div>
        <div class="col-lg-4 col-md-5" id="vw_gardening_sidebar">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </div> 
    </div>    
    <div class="clearfix"></div>
</div>
<?php get_footer(); ?>