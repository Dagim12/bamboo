<?php 
/**
 * Template to show the content of Team
 *
 * @package vw-gardening-landscaping-pro
 */ 
$about_section = get_theme_mod( 'vw_gardening_landscaping_pro_our_team_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
$img_bg = get_theme_mod('vw_gardening_landscaping_pro_our_team_bgimage_setting');
if( get_theme_mod('vw_gardening_landscaping_pro_our_team_bgcolor') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_our_team_bgcolor')).';';
}elseif( get_theme_mod('vw_gardening_landscaping_pro_our_team_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_gardening_landscaping_pro_our_team_bgimage')).'\')';
}else{
  $about_backg = '';
} ?>
<section id="our-team" style="<?php echo esc_attr($about_backg); ?>" class="<?php echo esc_attr($img_bg); ?>">
	<div class="container">
		<div class="row our-team-head text-center bpadding-40 wow fadeInDown delay-1000 animated" data-wow-duration="3s">
			<div class="col-lg-12 col-md-12">
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_our_team_small_heading')!=''){ ?>
		            <p class="section-small_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_team_small_heading')); ?>
		            </p>
	            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_our_team_heading')!=''){ ?>
		            <h2 class="section-main_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_team_heading')); ?>
		            </h2>
	            <?php } ?>
			</div>
		</div>
		<div class="owl-carousel">
			<?php $i=1;
			$args = array(
				'post_type' => 'team',
				'post_status' => 'publish',
				'posts_per_page' => get_theme_mod('vw_gardening_landscaping_pro_our_team_number')
			);
			$new = new WP_Query($args); 
			$loop_index = 0; $i=1;
			while ( $new->have_posts() ){
				$new->the_post(); ?>
				<div class="team-contents text-center wow fadeInUp delay-1000 animated" data-wow-duration="3s">
					<div class="team-image">
						<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" alt="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_team_image_alt_text'.$i)); ?>">
					</div>
					<h5 class="team_name"><a href="<?php the_permalink(); ?> " class="hvr-shrink feature-heading"><?php the_title(); ?></a> </h5>
					<?php if(get_post_meta($post->ID,'meta-designation',true)!= ''){ ?>
                		<span class="teachers-desig content-para fonts-14">
                			<?php echo esc_html(get_post_meta($post->ID,'meta-designation',true)); ?>
                		</span>
                	<?php } ?>
                	<div class="team-meta">
                		<?php if(get_post_meta($post->ID,'meta-tfacebookurl',true)!= ''){ ?>
	                		<a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tfacebookurl',true)); ?>">
	                			<i class="fab fa-facebook-f align-middle "></i><span class="screen-reader-text"><?php esc_html_e( 'facebook','vw-gardening-landscaping-pro' );?></span>
	                		</a>
	                	<?php } if(get_post_meta($post->ID,'meta-tlinkdenurl',true)!= ''){ ?>
	                		<a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tlinkdenurl',true)); ?>">
	                			<i class="fab fa-linkedin-in align-middle"></i><span class="screen-reader-text"><?php esc_html_e( 'linkedin','vw-gardening-landscaping-pro' );?></span>
	                		</a>
	                	<?php } if(get_post_meta($post->ID,'meta-ttwitterurl',true)!= ''){ ?>
	                		<a href="<?php echo esc_html(get_post_meta($post->ID,'meta-ttwitterurl',true)); ?>">
	                			<i class="fab fa-twitter align-middle" ></i><span class="screen-reader-text"><?php esc_html_e( 'twitter','vw-gardening-landscaping-pro' );?></span>
	                		</a>
	                	<?php } if(get_post_meta($post->ID,'meta-tinstagram',true)!= ''){ ?>
	                		<a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tinstagram',true)); ?>">
	                			<i class="fab fa-instagram align-middle" ></i><span class="screen-reader-text"><?php esc_html_e( 'instagram','vw-gardening-landscaping-pro' );?></span>
	                		</a>
	                	<?php } ?>
                	</div>
				</div>
			<?php $i++;}
               wp_reset_query(); ?>
        </div>
	</div>
</section>