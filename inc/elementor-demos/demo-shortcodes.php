<?php
function vw_gardening_landscaping_pro_slider_shortcode_function( $atts ) {
  $slider = ''; 
  $number = get_theme_mod('vw_gardening_landscaping_pro_slide_number'); 
  $slide_delay = get_theme_mod('vw_gardening_landscaping_pro_slide_delay'); 
  if($number != ''){
    $slider='
      <section id="vw_gardening_slider" class="m-auto p-0">
        <div id="carouselExampleIndicators" class="carousel slide ';if ( get_theme_mod('vw_gardening_landscaping_pro_slide_remove_fade',true) == 1 ) { $slider .='carousel-fade'; }$slider .='" data-ride="carousel" data-interval="'.esc_attr($slide_delay).'">
          <div class="carousel-inner m-0" role="listbox">';
            for ($i=1; $i<=$number; $i++) { 
              if(get_theme_mod('vw_gardening_landscaping_pro_slide_image'.$i) != ''){ 
                $slider .='<div class="carousel-item';if($i==1){$slider .=' active';}$slider .='">';
                  if ( get_theme_mod('vw_gardening_landscaping_pro_slide_image',true) != "" ) {
                    $slider .='<img  src="'.esc_url(get_theme_mod('vw_gardening_landscaping_pro_slide_image'.$i)).'" alt="'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_slide_title'.$i, true)).'" title="#slidecaption'.esc_html($i).'">';
                  }
                  if ( get_theme_mod('vw_gardening_landscaping_pro_slide_heading'.$i,true) != "" && get_theme_mod('vw_gardening_landscaping_pro_slide_text'.$i,true) != "" && get_theme_mod('vw_gardening_landscaping_pro_slide_small_heading'.$i,true) != "") {
                   $slider .='<div class="carousel-caption d-md-block m-0 p-0 text-left">
                    <div class="container h-100">
                      <div class="row h-100">
                        <div class="inner_carousel">
                          <div class="slider-box pos-abs">
                            <span class="animated fadeInDown delay-1000 small_head">'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_slide_small_heading'.$i)).'</span>
                            <h1 class="font-weight-bold animated fadeInRight delay-1000 white-color">'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_slide_heading'.$i)).'</h1>
                            <div class="prop_desc d-sm-none d-md-block"><p class="content-para fonts-14">'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_slide_text'.$i)).'</p></div>';
                            if( get_theme_mod('vw_gardening_landscaping_pro_slide_btntext'.$i, true) != ''){ 
                              $slider .='<a class="read-more borderd-wht font-weight-bold theme_button hvr-bounce-out animated fadeInLeft delay-1000" href="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_slide_btnurl'.$i)).'"><span class="feature-heading color-blck">'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_slide_btntext'.$i)).'</span><span class="screen-reader-text color-blck">'.esc_html('slider button2', 'vw-gardening-landscaping-pro' ).'</span>
                              </a>';
                            }
                            if( get_theme_mod('vw_gardening_landscaping_pro_slide_second_btntext'.$i, true) != ''){
                              $slider .='<a class="read-more borderd-wht font-weight-bold theme_button hvr-bounce-out animated fadeInRight delay-1000" href="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_slide_second_btnurl'.$i)).'"><span class="feature-heading color-blck">'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_slide_second_btntext'.$i)).'</span><span class="screen-reader-text">'.esc_html('slider button2', 'vw-gardening-landscaping-pro' ).'</span></a>';
                            }
                          $slider .='</div>
                        </div>
                      </div>';
                      if( get_theme_mod('vw_gardening_landscaping_pro_slider_arrows', true) != ''){
                        $slider .='<div class="slide_nav borderd-second">
                          <a class="carousel-prev-button pos-abs hvr-shrink borderd-wht" href="#carouselExampleIndicators" role="button" data-slide="prev" alt="'.esc_attr( 'Previous','vw-gardening-landscaping-pro' ).'">
                            <span class="carousel-control-prev-icon" aria-hidden="true">';
                              if ( get_theme_mod('vw_gardening_landscaping_pro_slider_section_prev_nav_icon', true) != '') { 
                                $slider .='<i class="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_slider_section_prev_nav_icon')).'"></i>';
                              }
                            $slider .='</span>
                            <span class="sr-only">'.esc_html('Previous','vw-gardening-landscaping-pro').'</span>
                          </a>
                          <a class="carousel-next-button pos-abs hvr-shrink borderd-wht" href="#carouselExampleIndicators" role="button" data-slide="next" alt="'.esc_attr( 'Next','vw-gardening-landscaping-pro' ).'">
                            <span class="carousel-control-next-icon" aria-hidden="true">';
                              if ( get_theme_mod('vw_gardening_landscaping_pro_slider_section_next_nav_icon', true) != '') { 
                                  $slider .='<i class="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_slider_section_next_nav_icon')).'"></i>';
                                }
                            $slider .='</span>
                            <span class="sr-only">'.esc_html('Next','vw-gardening-landscaping-pro').'</span>
                          </a>
                        </div>';
                      }
                    $slider .='</div>
                  </div>'; 
                  }
                $slider .='</div>';
              }
            }
          $slider .='</div>
          <ol class="carousel-indicators">';
            for($i=1;$i<=$number;$i++){ 
              $slider .='<li data-target="#carouselExampleIndicators" data-slide-to="'.esc_attr($i-1).'" class="';if($i==1){$slider .='active';}$slider .='"></li>';
            }
          $slider .='</ol>   
        </div> 
        <div class="clearfix"></div>
    </section>';
  }
  return $slider;
}
add_shortcode( 'vw-elementor-slider', 'vw_gardening_landscaping_pro_slider_shortcode_function' );

/* ---------- Our Servces ---------- */
function vw_gardening_landscaping_pro_services_shortcode_function( $atts ) {
  $services_excerpt="";
  if(get_theme_mod('vw_gardening_landscaping_pro_services_excerpt_no',true)!=''){
    $services_excerpt=get_theme_mod('vw_gardening_landscaping_pro_services_excerpt_no',8);
  }
  if(get_theme_mod('vw_gardening_landscaping_pro_services_excerpt_no',true)!=''){
    $services_excerpt=get_theme_mod('vw_gardening_landscaping_pro_services_excerpt_no',15);
  }
  $services = ''; 
  $services .='
    <section id="our-services">
      <div class="container">
        <div class="row our-services-head text-center bpadding-40">
          <div class="col-lg-12 col-md-12">';
            if(get_theme_mod('vw_gardening_landscaping_pro_our_services_small_heading')!=''){
              $services .='<p class="section-small_title">
                '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_services_small_heading')).'
              </p>';
            } if(get_theme_mod('vw_gardening_landscaping_pro_our_services_heading')!=''){
              $services .='<h2 class="section-main_title">
                '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_services_heading')).'
              </h2>';
            }
          $services .='</div>
        </div>
        <div class="owl-carousel">';
          $i=1;
          $args = array(
            'post_type' => 'services',
            'post_status' => 'publish',
            'posts_per_page' => get_theme_mod('vw_gardening_landscaping_pro_our_services_number')
          );
          $new = new WP_Query($args); 
          while ( $new->have_posts() ){
            $new->the_post(); 
          
            $services .='<div class="our-services-contents">
              <div class="row">
                <div class="col-lg-8 col-md-7 services-img-box">
                  <img src="'.wp_get_attachment_url( get_post_thumbnail_id()).'" alt="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_services_alt_text'.$i)).'">
                </div>
                <div class="col-lg-4 col-md-5 services-main-box d-flex align-items-center">
                  <div class="services-box">
                    <h3 class="feature-heading">
                      '.get_the_title().'
                    </h3>
                    <div class="services_text content-para">
                      '.esc_html(vw_gardening_landscaping_pro_string_limit_words(get_the_excerpt(),$services_excerpt)).'
                    </div>';
                    if(get_theme_mod('vw_gardening_landscaping_pro_our_services_link_title')!=''){ 
                      $services .='<a href="'.get_the_permalink().'" class="feature-heading fonts-14 hvr-bounce-out">
                        '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_services_link_title')).'
                        <i class="fas fa-angle-right"></i>
                      </a>';
                    }
                  $services .='</div>
                </div>
              </div>
            </div>';
            $i++;}
              wp_reset_query();
        $services .='</div>
      </div>
    </section>';
  return $services;
}
add_shortcode( 'vw-elementor-services', 'vw_gardening_landscaping_pro_services_shortcode_function' );

/* ---------- Our Process --------- */

function vw_gardening_landscaping_pro_process_shortcode_function( $atts ) {
  $process = ''; 
  $process .='
    <section id="working-process">
      <div class="container">
        <div class="row working-process-head text-center">
          <div class="col-lg-12 col-md-12">';
            if(get_theme_mod('vw_gardening_landscaping_pro_working_process_small_heading')!=''){ 
              $process .='<p class="section-small_title">
                '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_working_process_small_heading')).'
              </p>';
            } if(get_theme_mod('vw_gardening_landscaping_pro_working_process_heading')!=''){
              $process .='<h2 class="section-main_title">
                '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_working_process_heading')).'
              </h2>';
            }
          $process .='</div>
        </div>
        <div class="row">';
          $process_count=get_theme_mod('vw_gardening_landscaping_pro_working_process_number');
          for($i=1;$i<=$process_count;$i++)
          {
            $process .='<div class="col-lg-3 col-md-6 col-sm-6">
              <div class="working-process-box borderd-wht">
                <div class="row">
                  <div class="col-lg-2 col-md-2 col-2">';
                    if(get_theme_mod('vw_gardening_landscaping_pro_working_process_icon'.$i)!=''){
                      $process .='<span class="borderd-wht"><i class="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_working_process_icon'.$i)).'"></i></span>';
                    }
                  $process .='</div>
                  <div class="col-lg-10 col-md-10 col-10">';
                    if(get_theme_mod('vw_gardening_landscaping_pro_working_process_no'.$i)!=''){ 
                          $process .='<div class="feature-number feature-heading">
                          '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_working_process_no'.$i)).'
                        </div>';
                      } if(get_theme_mod('vw_gardening_landscaping_pro_working_process_title'.$i)!=''){
                        $process .='<a href="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_working_process_title_url'.$i)).'" class="feature-heading">
                          '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_working_process_title'.$i)).'
                            <span class="screen-reader-text">'.esc_html('Working process tittle', 'vw-gardening-landscaping-pro' ).'</span>
                        </a>';
                      }
                    $process .='</div>
                  </div>
              </div>
            </div>';  
          }
        $process .='</div>
      </div>
    </section>';

  return $process;
}
add_shortcode( 'vw-elementor-process', 'vw_gardening_landscaping_pro_process_shortcode_function' );

/* ----------- Our Projects ------------ */

function vw_gardening_landscaping_pro_project_shortcode_function( $atts ) {
  $projects = ''; 
  $project_excerpt="";
  if(get_theme_mod('vw_gardening_landscaping_pro_project_excerpt_no',true)!=''){
    $project_excerpt=get_theme_mod('vw_gardening_landscaping_pro_project_excerpt_no',14);
  }
  $projects .='
  <section id="our-project">
    <div class="container">
      <div class="row our-project-head text-center">
        <div class="col-lg-12 col-md-12">';
          if(get_theme_mod('vw_gardening_landscaping_pro_our_project_small_heading')!=''){
            $projects .='<p class="section-small_title">
              '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_project_small_heading')).'
            </p>';
          } if(get_theme_mod('vw_gardening_landscaping_pro_our_project_heading')!=''){
            $projects .='<h2 class="section-main_title">
              '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_project_heading')).'
            </h2>';
          }
        $projects .='</div>
      </div>
      <div class="project-tabs text-center">
        <ul>';
          $count=get_theme_mod('vw_gardening_landscaping_pro_our_project_number');
          for($f=1;$f<=$count;$f++) { 
            $projects .='<li class="nav-item">
              <a class="nav-link '; if($f==1){ $projects .='active '; } $projects .='hvr-shrink content-para" data-toggle="tab" href="#project_tab '.esc_attr($f).'" role="tab">
                <span>
                '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_project_tab_title'.$f)).'</span>
              </a>
            </li>';
          }
        $projects .='</ul>
      </div>
        <div class="tab-content" id="projects-dec">';
            for($i=1; $i<=$count; $i++) {
              $projects .='<div role="tabpanel" class="outer_tab tab-pane fade'; if($i==1){ $projects .='in active show'; }$projects .='" id="project_tab'.esc_attr($i).'">
                <div class="row">';
                  $args = array(
                    'post_type' => 'projects',
                    'post_status' => 'publish',
                    'projectscategory'=> get_theme_mod('vw_gardening_landscaping_pro_our_project_categoryselection_setting'.$i)
                  );  
                
                  $query = new WP_Query($args); 
                  if ( $query->have_posts() ) :  while ($query->have_posts()) : $query->the_post();
                
                  $projects .='<div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="vw_gardening_box project-image text-center">
                      <img src="'.wp_get_attachment_url( get_post_thumbnail_id() ).'" alt="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_project_categoryselection_alt_text'.$i)).'">
                      <div class="box-content pos-abs">
                        <div class="project-borderbox">
                          <div class="project-bgbox">
                            <h3 class="title"><a href="'.get_the_permalink().'" class="feature-heading">
                            '.get_the_title().'</a></h3>
                            <div class="post">
                            	'.esc_html(vw_gardening_landscaping_pro_string_limit_words(get_the_excerpt(),$project_excerpt)).'
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
                endwhile; endif;
              $projects .='</div>
              </div>';
            } 
          $projects .='</div>
        </div>
      </section>';

  return $projects;
}
add_shortcode( 'vw-elementor-project', 'vw_gardening_landscaping_pro_project_shortcode_function' );

/* ------- Pricing Plan ----------- */

function vw_gardening_landscaping_pro_pricing_shortcode_function( $atts ) {
  	$pricing = ''; 
  	$pricing .='
	  	<section id="pricing-plans">
			<div class="container">
				<div class="row pricing-plan-head text-center bpadding-40">
					<div class="col-lg-12 col-md-12">';
						if(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_small_heading')!=''){
				            $pricing .='<p class="section-small_title">
				              '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_small_heading')).'
				            </p>';
			            } if(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_heading')!=''){
				            $pricing .='<h2 class="section-main_title">
				              '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_heading')).'
				            </h2>';
			            }
					$pricing .='</div>
				</div>
				<div class="owl-carousel">';
					$plan_count=get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_number');
					for($i=1;$i<=$plan_count;$i++)
					{
						$pricing .='<div class="pricing-plans-box">
							<div class="row">
								<div class="col-lg-7 col-md-12 col-sm-7">
									<div class="pricing-plans-content-box">';
										if(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_title'.$i)!=''){
								            $pricing .='<p class="feature-heading color-blck">
								              '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_title'.$i)).'
								            </p>';
							            } if(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_price'.$i)!=''){
								            $pricing .='<h3 class="feature-heading color-blck">
								              	'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_price'.$i));
								              	if(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_price_duration'.$i)!=''){
								              		$pricing .='<sub>
								              			/
								              			'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_price_duration'.$i)).'
								              		</sub>';
								              	}
								            $pricing .='</h3>';
							            } if(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_link_title'.$i)!=''){
							            	$pricing .='<a href="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_link_url'.$i)).'" class="feature-heading fonts-14 color-blck">
							            		'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_link_title'.$i)).'
							            		<i class="fas fa-angle-right"></i>
							            	</a>';
							            } 
							        $pricing .='</div>
								</div>
								<div class="col-lg-5 col-md-12 col-sm-5 pricing-plans-features">
									<div class="pricing-plans-features_box">
										<ul>';
											
											$feature_count=get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_feature_number'.$i);
											for($j=1;$j<=$feature_count;$j++)
											{
											
												if(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_feature_title'.$i.$j)!=''){
													$pricing .='<li class="content-para">	
														'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_feature_title'.$i.$j)).'
													</li>';
											}  } 
										$pricing .='</ul>
									</div>
								</div>	
							</div>
						</div>';
					}
				$pricing .='</div>
			</div>
		</section>';

	return $pricing;
}
add_shortcode( 'vw-elementor-pricing-plan', 'vw_gardening_landscaping_pro_pricing_shortcode_function' );

/* ---------- Our Records ------------ */

function vw_gardening_landscaping_pro_records_shortcode_function( $atts ) {
  	$records = ''; 
  	$records .='
	  	<div id="our-records">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-12 our-records-image">';
						if(get_theme_mod('vw_gardening_landscaping_pro_our_products_records_image')!=''){
							$records .='<img src="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_records_image')).'" alt="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_records_image_products')).'">';
						}
					$records .='</div>
					<div class="col-lg-7 col-md-12 our-records-box">
						<div class="our-records-content">
							<div class="row">';
								for($i=1;$i<=4;$i++){
									$records .='<div class="col-lg-3 col-md-3 col-6">';
										if(get_theme_mod('vw_gardening_landscaping_pro_our_products_records_icon'.$i)!=''){ 
											$records .='<img src="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_records_icon'.$i)).'" alt="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_records_icon_alt_text'.$i)).'">';
										}
										$records .='<div>';
											if(get_theme_mod('vw_gardening_landscaping_pro_our_products_record_no'.$i)!=''){
									            $records .='<span class="vw_count feature-heading color-blck">
									              '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_record_no'.$i)).'
									            </span>';
								            } if(get_theme_mod('vw_gardening_landscaping_pro_our_products_record_no_suffix'.$i)!=''){
									            $records .='<span class="feature-heading color-blck">
									              '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_record_no_suffix'.$i)).'
									            </span>';
								            }
								        $records .='</div>';
							            if(get_theme_mod('vw_gardening_landscaping_pro_our_products_record_title'.$i)!=''){
								            $records .='<p class="feature-heading">
								              '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_record_title'.$i)).'
								            </p>';
							            }
									$records .='</div>';	
								}
							$records .='</div>
						</div>
					</div>
				</div>
			</div>
		</div>';

  return $records;
}
add_shortcode( 'vw-elementor-our-records', 'vw_gardening_landscaping_pro_records_shortcode_function' );

/* ---------- Our Client ------------ */

function vw_gardening_landscaping_pro_testimonials_shortcode_function( $atts ) {
  	$clients = ''; 
    $client_excerpt="";
    if(get_theme_mod('vw_gardening_landscaping_pro_testimonial_excerpt_no',true)!=''){
      $client_excerpt=get_theme_mod('vw_gardening_landscaping_pro_testimonial_excerpt_no',30);
    }
  global $post;
  	$clients .='
		<section id="testimonials">
			<div class="container">
				<div class="row testimonials-head text-center bpadding-40">
					<div class="col-lg-12 col-md-12">';
						if(get_theme_mod('vw_gardening_landscaping_pro_testimonial_small_heading')!=''){
			            $clients .='<p class="section-small_title">
			              '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_testimonial_small_heading')).'
			            </p>';
		            }if(get_theme_mod('vw_gardening_landscaping_pro_testimonial_heading')!=''){
			            $clients .='<h2 class="section-main_title white-color">
			              '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_testimonial_heading')).'
			            </h2>';
		            }
					$clients .='</div>
				</div>
					<div class="owl-carousel">';
						$i=1;
						$args = array(
							'post_type' => 'testimonials',
							'post_status' => 'publish',
							'posts_per_page' => get_theme_mod('vw_gardening_landscaping_pro_testimonial_number')
						);
						$new = new WP_Query($args); 
						while ( $new->have_posts() ){
							$new->the_post(); 
						
							$clients .='<div class="testimonials-content content-para">
					             <div class="testimonial_text">'.esc_html(vw_gardening_landscaping_pro_string_limit_words(get_the_excerpt(),$client_excerpt)).'
								</div>
					            <div class="row testimonials-box">
					            	<div class="col-lg-5 col-md-5">
				                        <div class="testimonials-icons">';
				                           if(get_post_meta($post->ID,'meta-tes-facebookurl',true)) {
				                                $clients .='<a href="'.esc_html(get_post_meta($post->ID,'meta-tes-facebookurl',true)).'" target="_blank"><i class="fab fa-facebook-f"></i><span class="screen-reader-text">'.esc_attr("facebook").'</span></a>';
				                           }
				                           if(get_post_meta($post->ID,'meta-tes-twitterurl',true)) {
				                                $clients .='<a href="'.esc_html(get_post_meta($post->ID,'meta-tes-twitterurl',true)).'" target="_blank"><i class="fab fa-twitter"></i><span class="screen-reader-text">'.esc_attr('twitter').'</span></a>';
				                           }
				                           if(get_post_meta($post->ID,'meta-tes-googleplusurl',true)) { 
				                                $clients .='<a href="'.esc_html(get_post_meta($post->ID,'meta-tes-googleplusurl',true)).'" target="_blank"><i class="fab fa-google-plus-g"></i><span class="screen-reader-text">'.esc_attr('google').'</span></a>';
				                           }
				                           if(get_post_meta($post->ID,'meta-tes-linkdenurl',true)) { 
				                                 $clients .='<a href="'.esc_html(get_post_meta($post->ID,'meta-tes-linkdenurl',true)).'" target="_blank"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text">'.esc_attr('linkedin').'</span></a>';
				                           } 
				                           if(get_post_meta($post->ID,'meta-tes-instagram',true)!= ''){
				                              $clients .='<a href="'.esc_html(get_post_meta($post->ID,'meta-tes-instagram',true)).'">
				                                 <i class="fab fa-instagram align-middle"></i><span class="screen-reader-text">'.esc_attr('instagram').'</span>
				                              </a>';
				                           } if(get_post_meta($post->ID,'meta-tes-pinterest',true)!= ''){ 
				                                $clients .='<a href="'.esc_html(get_post_meta($post->ID,'meta-tes-pinterest',true)).'">
				                                    <i class="fab fa-pinterest-p align-middle "></i><span class="screen-reader-text">'.esc_attr('pinterest').'</span>
				                                </a>';
				                           }
				                        $clients .='</div>
					            	</div>
					            	<div class="col-lg-7 col-md-7">
					            		<div class="client-box">
					            			<div class="row">
					            				<div class="col-lg-8 col-md-8 col-8 test-title">
					            					<a class="feature-heading" href="'.get_the_permalink().'">
					            						'.get_the_title().'
					            					</a>';
					            					if(get_post_meta($post->ID,'vw_gardening_landscaping_pro_posttype_testimonial_desigstory',true)!= ''){
					            						$clients .='<p class="feature-heading">
					            							'.esc_html(get_post_meta($post->ID,'vw_gardening_landscaping_pro_posttype_testimonial_desigstory',true)).'
					            						</p>';
					            					}
					            				$clients .='</div>
					            				<div class="col-lg-4 col-md-4 col-4">
					            					<img src="'.wp_get_attachment_url( get_post_thumbnail_id() ).'" alt="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_posttype_testimonial_alt_text'.$i)).'">
					            				</div>
					            			</div>
					            		</div>
					            	</div>
					            </div>
							</div>';
						$i++; }
				        wp_reset_query();
					$clients .='</div>
			</div>
		</section>';

return $clients;
}
add_shortcode( 'vw-elementor-our-clients', 'vw_gardening_landscaping_pro_testimonials_shortcode_function' );

// ------------ Our Team ------------

function vw_gardening_landscaping_pro_teams_shortcode_function( $atts ) {
  	$teams = ''; 
  	global $post;
  	$teams .= '
		<section id="our-team">
			<div class="container">
				<div class="row our-team-head text-center bpadding-40">
					<div class="col-lg-12 col-md-12">';
						if(get_theme_mod('vw_gardening_landscaping_pro_our_team_small_heading')!=''){
			            $teams .= '<p class="section-small_title">
			               '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_team_small_heading')).'
			            </p>';
		            } if(get_theme_mod('vw_gardening_landscaping_pro_our_team_heading')!=''){
			            $teams .= '<h2 class="section-main_title">
			              '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_team_heading')).'
			            </h2>';
		            } 
					$teams .= '</div>
				</div>
				<div class="owl-carousel">';
					$i=1;
					$args = array(
						'post_type' => 'team',
						'post_status' => 'publish',
						'posts_per_page' => get_theme_mod('vw_gardening_landscaping_pro_our_team_number')
					);
					$new = new WP_Query($args); 
					$loop_index = 0; $i=1;
					while ( $new->have_posts() ){
						$new->the_post(); 
						$teams .= '<div class="team-contents text-center">
							<div class="team-image">
								<img src="'.wp_get_attachment_url( get_post_thumbnail_id() ).'" alt="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_team_image_alt_text'.$i)).'">
							</div>
							<h5 class="team_name"><a href="'.get_the_permalink().'" class="hvr-shrink feature-heading">'.get_the_title().'</a> </h5>';
								if(get_post_meta($post->ID,'meta-designation',true)!= ''){
		                		$teams .= '<span class="teachers-desig content-para fonts-14">
		                			'.esc_html(get_post_meta($post->ID,'meta-designation',true)).'
		                		</span>';
		                	}
		                	$teams .= '<div class="team-meta">';
		                		if(get_post_meta($post->ID,'meta-tfacebookurl',true)!= ''){ 
			                		$teams .= '<a href="'.esc_html(get_post_meta($post->ID,'meta-tfacebookurl',true)).'">
			                			<i class="fab fa-facebook-f align-middle "></i><span class="screen-reader-text">'.esc_attr('facebook').'</span>
			                		</a>';
			                	} if(get_post_meta($post->ID,'meta-tlinkdenurl',true)!= ''){ 
			                		$teams .= '<a href="'.esc_html(get_post_meta($post->ID,'meta-tlinkdenurl',true)).'">
			                			<i class="fab fa-linkedin-in align-middle"></i><span class="screen-reader-text">'.esc_attr('linkedin').'</span>
			                		</a>';
			                	} if(get_post_meta($post->ID,'meta-ttwitterurl',true)!= ''){ 
			                		$teams .= '<a href="'.esc_html(get_post_meta($post->ID,'meta-ttwitterurl',true)).'">
			                			<i class="fab fa-twitter align-middle" ></i><span class="screen-reader-text">'.esc_attr( 'twitter').'</span>
			                		</a>';
			                	} if(get_post_meta($post->ID,'meta-tinstagram',true)!= ''){ 
			                		$teams .= '<a href="'.esc_html(get_post_meta($post->ID,'meta-tinstagram',true)).'">
			                			<i class="fab fa-instagram align-middle" ></i><span class="screen-reader-text">
			                			'.esc_attr( 'instagram').'</span>
			                		</a>';
			                	}
		                	$teams .= '</div>
						</div>';
					$i++;}
		         wp_reset_query();
		      $teams .= '</div>
			</div>
		</section>';
  	return $teams;
}
add_shortcode( 'vw-elementor-our-teams', 'vw_gardening_landscaping_pro_teams_shortcode_function' );

// ---------- Latest News ----------

function vw_gardening_landscaping_pro_news_shortcode_function( $atts ) {
    $blog_excerpt="";
    if(get_theme_mod('vw_gardening_landscaping_pro_blog_excerpt_no',true)!=''){
        $blog_excerpt=get_theme_mod('vw_gardening_landscaping_pro_blog_excerpt_no',7);
    }
  	$blogs = ''; 
  	global $post;
  	$blogs .= '
  	<section id="our-blog">
		<div class="container">
			<div class="row our-blog-head text-center bpadding-40">
				<div class="col-lg-12 col-md-12">';
					if(get_theme_mod('vw_gardening_landscaping_pro_our_blog_small_heading')!=''){ 
			            $blogs .= '<p class="section-small_title">
			              '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_blog_small_heading')).'
			            </p>';
		            } if(get_theme_mod('vw_gardening_landscaping_pro_our_blog_heading')!=''){
			            $blogs .= '<h2 class="section-main_title">
			              '.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_blog_heading')).'
			            </h2>';
		            }
				$blogs .= '</div>
			</div>
			<div class="owl-carousel">';
				$i=1;
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => get_theme_mod('vw_gardening_landscaping_pro_our_blog_number'),
				);
				$new = new WP_Query($args); 
				$loop_index = 0;
				while ( $new->have_posts() ){
					$new->the_post(); 
					$blogs .= '<div class="our-blog-content">
						<div class="row">
							<div class="col-lg-7 col-sm-7 col-md-6">';
								if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_date',true) == "1" ) { 
									$blogs .= '<span class="blog-date pos-abs feature-heading text-center">
										'.get_the_time( 'd M' ).'
									</span>
									<img src="'.wp_get_attachment_url( get_post_thumbnail_id() ).'" alt="'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_alt_text'.$i)).'">';
								}
							$blogs .= '</div>
							<div class="col-lg-5 col-sm-5 col-md-6 our-blog-content-box">
								<div class="our-blog-box">
									<h5>
									<a class="feature-heading" href="'.get_the_permalink().'">
									'.get_the_title().'</a> </h5>
									<div class="blog-meta">';
					      			if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_comments',true) == "1" ) { 
						                	$blogs .= '<span class="entry-comments content-para"> 
												<i class="fas fa-comments"></i>
												'.get_comments_number( '0 Comment', 'Comment 1', 'Comments % ' ).'
											</span>';
										}if ( get_theme_mod('vw_gardening_landscaping_pro_post_general_settings_post_author',true) == "1" ) {
											$blogs .= '<span class="entry-author">
												<i class="fas fa-user"></i>
												<a class="content-para" href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">
												'.get_the_author().'</a>
											</span>';
										}
					           $blogs .= '</div>
					               <div class="blog_text content-para fonts-14">
						               '.esc_html(vw_gardening_landscaping_pro_string_limit_words(get_the_excerpt(),$blog_excerpt)).'
						           </div>';
						           	if(get_theme_mod('vw_gardening_landscaping_pro_our_blog_link_title')!=''){ 
							            $blogs .= '<a href="'.get_the_permalink().'" class="learn-more feature-heading fonts-14 color-blck"> 
							           		'.esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_blog_link_title')).'
							           		<i class="fas fa-angle-right"></i>
							            </a>';
							        }
							    $blogs .= '</div>
							</div>
						</div>
					</div>';
				$i++;}
		        wp_reset_query();
			$blogs .= '</div>
		</div>
	</section>';

  	return $blogs;
}
add_shortcode( 'vw-elementor-blogs', 'vw_gardening_landscaping_pro_news_shortcode_function' );