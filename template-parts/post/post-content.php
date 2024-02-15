<?php
  $theme_lay = get_theme_mod( 'vw_gardening_landscaping_pro_single_blog_option','two_col');
  if($theme_lay == 'one_col'){ ?>
<div id="single_post" class="col-lg-12 col-md-12 col-sm-12"> 
  <div class="postbox">
    <div class="postpic">
      <div class="post_pic_inner">
        <?php if (get_theme_mod('vw_gardening_landscaping_pro_blog_featured_image_enable',true) == '1'){?>
          <?php if (has_post_thumbnail()){ ?>
           <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?> post thumbnail">
          <?php } ?>
        <?php } ?>  
      </div>
    </div>
    <div class="postbox-content">    
      <h2 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="mb-3 post-text"><?php $excerpt = get_the_excerpt(); echo esc_html(vw_gardening_landscaping_pro_string_limit_words($excerpt,29)); ?></div>
      <?php if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_date',true) == "1" ) { ?>
        <span class="entry-date me-3">
          <i class="far fa-calendar-alt"></i>
            <?php echo esc_html( get_the_date() ); ?>
        </span>
        <?php } if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_author',true) == "1" ) { ?>
        <span class="me-3"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fas fa-user"></i> <?php the_author(); ?></a></span>
      <?php }if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_comments',true) == "1" ){ ?>
        <span><i class="fas fa-comments"></i> <?php echo comments_number( __('no comments','vw-gardening-landscaping-pro'), __('no comments','vw-gardening-landscaping-pro'), __('% comments','vw-gardening-landscaping-pro') ); ?></span>
      <?php } ?>
    </div>
    <div id="socialShare">
      <div class="socialBox pointer">
        <span class="fa fa-share-alt"></span>
        <div id="socialGallery">
          <div class="socialToolBox">
            <div class="blog_share_icon row p-0 m-0"> 
              <?php if(get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_share_facebook',true)==1 || get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_pinterest',true)==1 || get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_linkedin',true)==1 || get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_twitter',true)==1){ ?>                
              <?php } if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_share_facebook',true) == "1" ) { ?>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank" class="post-facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
              <?php } if ( get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_pinterest',true) == "1" ) { ?>
                    <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo the_permalink(); ?>" target="_blank" class="post-pinterest"><i class="fab fa-pinterest"></i></a>
              <?php } if ( get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_linkedin',true) == "1" ) { ?>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=<?php the_title(); ?>" target="_blank" class="post-linkedin"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
              <?php }if ( get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_twitter',true) == "1" ) { ?>
                    <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php echo the_title(); ?>" target="_blank" class="post-twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="read-more">
      <a href="<?php the_permalink(); ?>" class="hvr-bounce-out"><span><?php esc_html_e( 'Read More','vw-gardening-landscaping-pro' ); ?></span></a>
    </div>
  </div>
</div>
<?php }else if($theme_lay == 'two_col'){ ?>
<div id="single_post" class="col-lg-6 col-md-6 col-sm-12"> 
  <div class="postbox">
    <div class="postpic">
      <div class="post_pic_inner">
        <?php if (get_theme_mod('vw_gardening_landscaping_pro_blog_featured_image_enable',true) == '1'){?>
          <?php if (has_post_thumbnail()){ ?>
           <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?> post thumbnail">
          <?php } ?>
        <?php } ?>  
      </div>
    </div>
    <div class="postbox-content">    
      <h2 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="mb-3 post-text"><?php $excerpt = get_the_excerpt(); echo esc_html(vw_gardening_landscaping_pro_string_limit_words($excerpt,29)); ?></div>
      <?php if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_date',true) == "1" ) { ?>
        <span class="entry-date me-3">
          <i class="far fa-calendar-alt"></i>
            <?php echo esc_html( get_the_date() ); ?>
        </span>
        <?php } if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_author',true) == "1" ) { ?>
        <span class="me-3"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fas fa-user"></i> <?php the_author(); ?></a></span>
      <?php }if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_comments',true) == "1" ){ ?>
        <span><i class="fas fa-comments"></i> <?php echo comments_number( __('no comments','vw-gardening-landscaping-pro'), __('no comments','vw-gardening-landscaping-pro'), __('% comments','vw-gardening-landscaping-pro') ); ?></span>
      <?php } ?>
    </div>
   
    <div id="socialShare">
      <div class="socialBox pointer">
        <span class="fa fa-share-alt"></span>
        <div id="socialGallery">
          <div class="socialToolBox">
            <div class="blog_share_icon row p-0 m-0"> 
              <?php if(get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_share_facebook',true)==1 || get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_pinterest',true)==1 || get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_linkedin',true)==1 || get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_twitter',true)==1){ ?>                
              <?php } if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_share_facebook',true) == "1" ) { ?>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank" class="post-facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
              <?php } if ( get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_pinterest',true) == "1" ) { ?>
                    <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo the_permalink(); ?>" target="_blank" class="post-pinterest"><i class="fab fa-pinterest"></i></a>
              <?php } if ( get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_linkedin',true) == "1" ) { ?>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=<?php the_title(); ?>" target="_blank" class="post-linkedin"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
              <?php }if ( get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_twitter',true) == "1" ) { ?>
                    <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php echo the_title(); ?>" target="_blank" class="post-twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
     <div class="read-more">
      <a href="<?php the_permalink(); ?>" class="hvr-bounce-out"><span><?php esc_html_e( 'Read More','vw-gardening-landscaping-pro' ); ?></span></a>
    </div>
  </div>
</div>
 <?php }else if($theme_lay == 'three_col'){ ?>
 <div id="single_post" class="col-lg-4 col-md-4 col-sm-12"> 
    <div class="postbox">
    <div class="postpic">
      <div class="post_pic_inner">
        <?php if (get_theme_mod('vw_gardening_landscaping_pro_blog_featured_image_enable',true) == '1'){?>
          <?php if (has_post_thumbnail()){ ?>
           <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?> post thumbnail">
          <?php } ?>
        <?php } ?>  
      </div>
    </div>
    <div class="postbox-content">    
      <h2 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="mb-3 post-text"><?php $excerpt = get_the_excerpt(); echo esc_html(vw_gardening_landscaping_pro_string_limit_words($excerpt,29)); ?></div>
      <?php if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_date',true) == "1" ) { ?>
        <span class="entry-date me-3">
          <i class="far fa-calendar-alt"></i>
            <?php echo esc_html( get_the_date() ); ?>
        </span>
        <?php } if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_author',true) == "1" ) { ?>
        <span class="me-3"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fas fa-user"></i> <?php the_author(); ?></a></span>
      <?php }if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_comments',true) == "1" ){ ?>
        <span><i class="fas fa-comments"></i> <?php echo comments_number( __('no comments','vw-gardening-landscaping-pro'), __('no comments','vw-gardening-landscaping-pro'), __('% comments','vw-gardening-landscaping-pro') ); ?></span>
      <?php } ?>
    </div>
    <div id="socialShare">
      <div class="socialBox pointer">
        <span class="fa fa-share-alt"></span>
        <div id="socialGallery">
          <div class="socialToolBox">
            <div class="blog_share_icon row p-0 m-0"> 
              <?php if(get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_share_facebook',true)==1 || get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_pinterest',true)==1 || get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_linkedin',true)==1 || get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_twitter',true)==1){ ?>                
              <?php } if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_share_facebook',true) == "1" ) { ?>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank" class="post-facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
              <?php } if ( get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_pinterest',true) == "1" ) { ?>
                    <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo the_permalink(); ?>" target="_blank" class="post-pinterest"><i class="fab fa-pinterest"></i></a>
              <?php } if ( get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_linkedin',true) == "1" ) { ?>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=<?php the_title(); ?>" target="_blank" class="post-linkedin"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
              <?php }if ( get_theme_mod('vw_gardening_landscaping_pro_single_post_general_settings_post_share_twitter',true) == "1" ) { ?>
                    <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php echo the_title(); ?>" target="_blank" class="post-twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="read-more">
      <a href="<?php the_permalink(); ?>" class="hvr-bounce-out"><span><?php esc_html_e( 'Read More','vw-gardening-landscaping-pro' ); ?></span></a>
    </div>
  </div>
  </div>
<?php } ?>
