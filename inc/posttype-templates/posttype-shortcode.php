<?php
/* ----------------- Services --------------------- */
/* Services shortcode */
function vw_gardening_landscaping_pro_services_func( $atts ) {
  $services = '';
  $services = '<div class="row all-services">';
  $query = new WP_Query( array( 'post_type' => 'services') );
    if ( $query->have_posts() ) :
  $k=1;
  $new = new WP_Query('post_type=services');
  while ($new->have_posts()) : $new->the_post();
        $custom_url ='';
        $post_id = get_the_ID();
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'large' );
        if(has_post_thumbnail()) { $thumb_url = $thumb['0']; }
        $url = $thumb['0'];
        $excerpt = wp_trim_words(get_the_excerpt(),10);
        $custom_url = get_permalink();
        $services .= '<div class="col-lg-6 col-md-6 col-sm-6 services-box">
                        <div class="row short-serv-box">
                          <div class="col-lg-6 col-md-12 services_icon">
                            <img class="services-img" src="'.esc_url($thumb_url).'" alt="'.esc_html(get_the_title()) .' post thumbnail icon">
                          </div>
                          <div class="col-lg-6 col-md-12">
                            <h2><a href="'.esc_url($custom_url).'">'.esc_html(get_the_title()) .'</a></h2>
                            <div class="short_text pb-3">
                              '.$excerpt.'
                            </div>
                            <a href="'.esc_url($custom_url).'" class="learn-more">'.esc_html('LEARN MORE ') .'<i class="fas fa-angle-right"></i></a>
                          </div>
                        </div>
                      </div>';
    if($k%2 == 0){
      $services.= '<div class="clearfix"></div>';
    }
      $k++;
  endwhile;
  else :
    $services = '<h2 class="center">'.esc_html__('Post Not Found','vw-gardening-landscaping-pro').'</h2>';
  endif;
  return $services;
}
add_shortcode( 'vw-gardening-landscaping-pro-services', 'vw_gardening_landscaping_pro_services_func' );

/* projects shortcode */
function vw_gardening_landscaping_pro_posttype_projects_func( $atts ) {
  $projects = '';
  $projects = '<div class="row all-projects">';
  $query = new WP_Query( array( 'post_type' => 'projects') );
    if ( $query->have_posts() ) :
  $k=1;
  $new = new WP_Query('post_type=projects');
  while ($new->have_posts()) : $new->the_post();

        $post_id = get_the_ID();
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'large' );
        if(has_post_thumbnail()) { $thumb_url = $thumb['0']; }
        $url = $thumb['0'];
        $custom_url ='';
        $excerpt = wp_trim_words(get_the_excerpt(),10);
        if(get_post_meta($post_id,'meta-projects-url',true !='')){$custom_url =get_post_meta($post_id,'meta-projects-url',true); } else{ $custom_url = get_permalink(); }
        $projects .= '
            <div class="col-lg-6 col-md-6 col-sm-6 our_projects_outer">
              <div class="row hover_border">
                <div class="col-lg-6 projects-img-box">
                  <img class="projects-img" src="'.esc_url($thumb_url).'" alt="attorney-thumbnail" alt="'.esc_html(get_the_title()) .' post thumbnail icon"/>
                </div>
                <div class="col-lg-6">
                  <h2><a href="'.esc_url($custom_url).'">'.esc_html(get_the_title()) .'</a></h2>
                  <div class="short_text">'.$excerpt.'</div>
                </div>
              </div>
            </div>';
    if($k%2 == 0){
      $projects.= '<div class="clearfix"></div>';
    }
      $k++;
  endwhile;
  else :
    $projects = '<h2 class="center">'.esc_html__('Post Not Found','vw-gardening-landscaping-pro').'</h2>';
  endif;
  return $projects;
}
add_shortcode( 'vw-gardening-landscaping-pro-projects', 'vw_gardening_landscaping_pro_posttype_projects_func' );

/*------------------ testimonials shortcode --------------------------------------*/
function vw_gardening_landscaping_pro_posttype_testimonial_func( $atts ) {
  $testimonial = '';
  $testimonial = '<div class="row all-testimonial">';
  $query = new WP_Query( array( 'post_type' => 'testimonials') );
    if ( $query->have_posts() ) :
  $k=1;
  $new = new WP_Query('post_type=testimonials');
  while ($new->have_posts()) : $new->the_post();
        $post_id = get_the_ID();
         $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'large' );
        if(has_post_thumbnail()) { $thumb_url = $thumb['0']; }
        $url = $thumb['0'];
        $custom_url ='';
        $excerpt = wp_trim_words(get_the_excerpt(),15);
        $tdegignation= get_post_meta($post_id,'vw_gardening_landscaping_pro_posttype_testimonial_desigstory',true);
        if(get_post_meta($post_id,'meta-testimonial-url',true !='')){$custom_url =get_post_meta($post_id,'meta-testimonial-url',true); } else{ $custom_url = get_permalink(); }
        $testimonial .= '
            <div class="our_testimonial_outer text-center col-lg-4 col-md-6 col-sm-6">
              <div class="testimonial_inner">
                <div class="row hover_border">
                  <div class="col-md-12">
                     <img class="classes-img" src="'.esc_url($thumb_url).'" alt="attorney-thumbnail" alt="'.esc_html(get_the_title()) .' post thumbnail icon"/>
                    <h2><a href="'.esc_url($custom_url).'">'.esc_html(get_the_title()) .'</a></h2>
                    <div class="tdesig">'.$tdegignation.'</div>
                    <div class="short_text">'.$excerpt.'</div>
                  </div>
                </div>
              </div>
            </div>';
      $k++;
  endwhile;
  else :
    $testimonial = '<h2 class="center">'.esc_html__('Post Not Found','vw-gardening-landscaping-pro').'</h2>';
  endif;
  return $testimonial;
}
add_shortcode( 'vw-gardening-landscaping-pro-testimonials', 'vw_gardening_landscaping_pro_posttype_testimonial_func' );

/*------------------------ team Shorthcode -----------------------------*/
function vw_gardening_landscaping_pro_posttype_team_func( $atts ) {
  $team = '';
  $team = '<div class="row all-team">';
  $query = new WP_Query( array( 'post_type' => 'team') );
    if ( $query->have_posts() ) :
  $k=1;
  $new = new WP_Query('post_type=team');
  while ($new->have_posts()) : $new->the_post();
        $post_id = get_the_ID();
         $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'large' );
        if(has_post_thumbnail()) { $thumb_url = $thumb['0']; }
        $url = $thumb['0'];
        $custom_url ='';
        $team_desig= get_post_meta($post_id,'meta-designation',true);
        $facebookurl= get_post_meta($post_id,'meta-tfacebookurl',true);
        $linkedin=get_post_meta($post_id,'meta-tlinkdenurl',true);
        $twitter=get_post_meta($post_id,'meta-ttwitterurl',true);
        $instagram=get_post_meta($post_id,'meta-tinstagram',true);
        if(get_post_meta($post_id,'meta-team-url',true !='')){$custom_url =get_post_meta($post_id,'meta-team-url',true); } else{ $custom_url = get_permalink(); }
        $team .= '
            <div class="our_team_outer col-lg-3 col-md-4 col-sm-6">
              <div class="team_inner text-center">
                <img class="classes-img" src="'.esc_url($thumb_url).'" alt="attorney-thumbnail" alt="'.esc_html(get_the_title()) .' post thumbnail icon"/>
                <h2><a href="'.esc_url($custom_url).'">'.esc_html(get_the_title()) .'</a></h2>
                <p class="tdesig">'.$team_desig.'</p>
                <div class="att_socialbox">';
                  if($facebookurl != ''){
                    $team .= '<a href="'.esc_url($facebookurl).'" target="_blank"><i class="fab fa-facebook-f"></i><span class="screen-reader-text">'.esc_html('team icon', 'vw-gardening-landscaping-pro' ).'</span></a>';
                  } if($twitter != ''){
                    $team .= '<a href="'.esc_url($twitter).'" target="_blank"><i class="fab fa-twitter"></i><span class="screen-reader-text">'.esc_html('team icon', 'vw-gardening-landscaping-pro' ).'</span></a>';
                  } if($instagram != ''){
                    $team .= '<a href="'.esc_url($instagram).'" target="_blank"><i class="fab fa-instagram align-middle" aria-hidden="true"></i><span class="screen-reader-text">'.esc_html('team icon', 'vw-gardening-landscaping-pro' ).'</span></a>';
                  } if($linkedin != ''){
                    $team .= '<a href="'.esc_url($linkedin).'" target="_blank"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text">'.esc_html('team icon', 'vw-gardening-landscaping-pro' ).'</span></a>';
                  }
                $team .= '</div>
              </div>
            </div>';
      $k++;
  endwhile;
  else :
    $team = '<h2 class="center">'.esc_html__('Post Not Found','vw-gardening-landscaping-pro').'</h2>';
  endif;
  return $team;
}
add_shortcode( 'vw-gardening-landscaping-pro-team', 'vw_gardening_landscaping_pro_posttype_team_func' );