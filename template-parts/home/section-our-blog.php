<?php 
/**
 * Template to show the content of Our Blog
 *
 * @package vw-gardening-landscaping-pro
 */ 
$about_section = get_theme_mod( 'vw_gardening_landscaping_pro_our_blog_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
$img_bg = get_theme_mod('vw_gardening_landscaping_pro_our_blog_bgimage_setting');
$services_excerpt="";
if(get_theme_mod('vw_gardening_landscaping_pro_blog_excerpt_no')!=''){
    $services_excerpt=get_theme_mod('vw_gardening_landscaping_pro_blog_excerpt_no');
} ?>
<section id="our-blog">
	<div class="container <?php echo esc_attr($img_bg); ?>">
		<div class="row our-blog-head text-center bpadding-40 wow fadeInDown delay-1000 animated" data-wow-duration="3s">
			<div class="col-lg-12 col-md-12">
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_our_blog_small_heading')!=''){ ?>
		            <p class="section-small_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_blog_small_heading')); ?>
		            </p>
	            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_our_blog_heading')!=''){ ?>
		            <h2 class="section-main_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_blog_heading')); ?>
		            </h2>
	            <?php } ?>
			</div>
		</div>
		<div class="owl-carousel">
			<?php $i=1;
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => get_theme_mod('vw_gardening_landscaping_pro_our_blog_number'),
			);
			$new = new WP_Query($args); 
			$loop_index = 0;
			while ( $new->have_posts() ){
				$new->the_post(); ?>
				<div class="our-blog-content wow fadeInUp delay-1000 animated" data-wow-duration="3s">
					<div class="row">
						<div class="col-lg-7 col-sm-7 col-md-6">
							<?php if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_date',true) == "1" ) { ?>
								<span class="blog-date pos-abs feature-heading text-center">
									<?php the_time( 'd M' ) ?>
								</span>
							<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" alt="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_alt_text'.$i)); ?>">
							<?php } ?>
						</div>
						<div class="col-lg-5 col-sm-5 col-md-6 our-blog-content-box">
							<div class="our-blog-box">
								<h5><a class="feature-heading" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h5>
								<div class="blog-meta">
				      				<?php if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_author',true) == "1" ) { ?>
										<span class="entry-author">
											<i class="fas fa-user"></i>
											<a class="content-para" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a>
										</span>
									<?php } if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_comments',true) == "1" ) { ?>
					                	<span class="entry-comments content-para"> 
											<i class="fas fa-comments"></i>
											<?php comments_number( '0 Comment', 'Comment 1', 'Comments % ' ); ?>
										</span>
									<?php } ?>
				                </div>
				                <div class="blog_text content-para fonts-14">
					               <?php $excerpt = get_the_excerpt(); echo esc_html(vw_gardening_landscaping_pro_string_limit_words($excerpt,$services_excerpt)); ?>
					           </div>
					            <?php if(get_theme_mod('vw_gardening_landscaping_pro_our_blog_link_title')!=''){ ?>
						            <a href="<?php the_permalink(); ?>" class="learn-more feature-heading fonts-14 color-blck"> 
						           		<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_blog_link_title')); ?>
						           		<i class="fas fa-angle-right"></i>
						            </a>
						        <?php } ?>
						    </div>
						</div>
					</div>
				</div>
			<?php $i++;}
	        wp_reset_query(); ?>
		</div>
	</div>
</section>