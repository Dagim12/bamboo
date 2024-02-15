<?php
/**
 * Template Name:Page with Right Sidebar
 */
get_header(); 
get_template_part( 'template-parts/banner' ); ?>
<?php do_action('vw_gardening_landscaping_pro_before_page'); ?>
<div class="container">
  <main id="maincontent" role="main">
    <div class="middle-align">
      <div class="row">
        <div class="col-lg-8 col-md-7 content_page">
          <?php while ( have_posts() ) : the_post(); ?>
             <?php the_content();?>
             <?php
             //If comments are open or we have at least one comment, load up the comment template
              if ( comments_open() || '0' != get_comments_number() )
                  comments_template();
             ?>
           <?php endwhile; // end of the loop. ?>
        </div>
         <div class="col-lg-4 col-md-5" id="vw_gardening_sidebar">
            <?php  dynamic_sidebar('sidebar-2'); ?>
         </div>
         <div class="clear"></div>
      </div>
    </div>
  </main>
</div>
<?php do_action('vw_gardening_landscaping_pro_after_page'); ?>
<?php get_footer(); ?>