<?php
/**
 * The Template for displaying all single Service.
 *
 * @package vw-gardening-landscaping-pro
 */
get_header(); 
get_template_part( 'template-parts/banner' ); ?>
<?php do_action('vw_gardening_landscaping_pro_before_contact_title'); ?>
<div class="container">
    <div class="row">
        <div id="service_single" class="col-lg-8 col-md-7">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class=" services-image">
                <?php if(has_post_thumbnail()){ ?>
                    <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?> post thumbnail">
                <?php } ?>  
            </div>
            <div class="single-page-content pt-3"><?php the_content();?></div>              
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
        <div class="clearfix"></div>
        <?php endwhile; // end of the loop. ?> 
    </div>    
</div>
<?php get_footer(); ?>