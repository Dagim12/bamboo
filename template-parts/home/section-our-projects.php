<?php 

/**
 * Template to show the content of Our Project 
 *
 * @package vw-gardening-landscaping-pro
 */ 

$about_section = get_theme_mod( 'vw_gardening_landscaping_pro_our_project_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
$img_bg = get_theme_mod('vw_gardening_landscaping_pro_our_project_bgimage_setting');
if( get_theme_mod('vw_gardening_landscaping_pro_our_project_bgcolor') ) {
  $about_backg = 'background-color:'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_our_project_bgcolor')).';';
}elseif( get_theme_mod('vw_gardening_landscaping_pro_our_project_bgimage') ){
  $about_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_gardening_landscaping_pro_our_project_bgimage')).'\')';
}else{
  $about_backg = '';
}
$services_excerpt="";
  if(get_theme_mod('vw_gardening_landscaping_pro_project_excerpt_no')!=''){
    $services_excerpt=get_theme_mod('vw_gardening_landscaping_pro_project_excerpt_no');
  }

?>
<section id="our-project" style="<?php echo esc_attr($about_backg); ?>" class="<?php echo esc_attr($img_bg); ?>">
	<div class="container">
		<div class="row our-project-head text-center wow fadeInDown delay-1000 animated" data-wow-duration="3s">
			<div class="col-lg-12 col-md-12">
				<?php if(get_theme_mod('vw_gardening_landscaping_pro_our_project_small_heading')!=''){ ?>
		            <p class="section-small_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_project_small_heading')); ?>
		            </p>
	            <?php } if(get_theme_mod('vw_gardening_landscaping_pro_our_project_heading')!=''){ ?>
		            <h2 class="section-main_title">
		              <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_project_heading')); ?>
		            </h2>
	            <?php } ?>
			</div>
		</div>
		<div class="project-tabs text-center">
			<ul class="nav nav-tabs">
				<?php 
				$count=get_theme_mod('vw_gardening_landscaping_pro_our_project_number');
				for($f=1;$f<=$count;$f++) { 
				?>
					<li class="nav-item">
						<a href="#project_tab<?php echo esc_attr($f);?>" class="nav-link <?php if($f==1){ echo 'active'; } ?> content-para hvr-shrink" data-bs-toggle="tab" role="tablist">
							<span><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_project_tab_title'.$f)); ?></span>
							
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
		<div class="tab-content" id="projects-dec">
			<?php  
	    	for($i=1; $i<=$count; $i++) {?>
	    		<div role="tabpanel" class="outer_tab tab-pane fade <?php if($i==1){ echo 'in active show'; } ?>" id="project_tab<?php echo esc_attr($i);?>">
	    			<div class="row">
	    				<?php
			 			$args = array(
	            			'post_type' => 'projects',
	            			'post_status' => 'publish',
	            			'projectscategory'=> get_theme_mod('vw_gardening_landscaping_pro_our_project_categoryselection_setting'.$i)
	          			);
                  		$query = new WP_Query($args); 
                  		if ( $query->have_posts() ) :  while ($query->have_posts()) : $query->the_post(); ?>
							<div class="col-lg-4 col-md-6 wow fadeInUp delay-1000 animated" data-wow-duration="3s">
								<div class="vw_gardening_box project-image text-center">
									<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" alt="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_project_categoryselection_alt_text'.$i)); ?>">
									<div class="box-content pos-abs">
										<div class="project-borderbox">
											<div class="project-bgbox">
							                    <h3 class="title"><a class="feature-heading" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									            <div class="post"><?php $excerpt = get_the_excerpt(); echo esc_html(vw_gardening_landscaping_pro_string_limit_words($excerpt,$services_excerpt)); ?>
										        </div>
						                    </div>
					                    </div>
					                </div>
								</div>
							</div>
						<?php endwhile; endif;?>
					</div>
	    		</div>
	    	<?php } ?>
	    </div>
	</div>
</section>