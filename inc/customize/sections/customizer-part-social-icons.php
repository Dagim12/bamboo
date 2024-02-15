<?php
    /* Footer Sections */
    $wp_customize->add_section('vw_gardening_landscaping_pro_social_icons',array(
        'title' => __('Social Icons','vw-gardening-landscaping-pro'),
        'description'   => __('Add social Icons Here','vw-gardening-landscaping-pro'),
        'panel' => 'vw_gardening_landscaping_pro_panel_id',
    ));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_social_icons_youtube_link', array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new VW_Button_Custom_Content( $wp_customize, 'vw_gardening_landscaping_pro_social_icons_youtube_link', array(
          'section' => 'vw_gardening_landscaping_pro_social_icons',
          'label' => __( 'Youtube Video', 'vw-gardening-landscaping-pro' ),
          'description' => __( 'Watch our youtube video for add social media icons in your WordPress Website.', 'vw-gardening-landscaping-pro' ),
          'content' => sprintf( __( 'Check the button %1$sWatch Now%2$s', 'vw-gardening-landscaping-pro' ), '<a href="' . esc_url( VW_GARDENING_LANDSCAPING_PRO_SOCIAL_ICONS_YOUTUBE_LINK) . '" class="button button-secondary alignright review_st" target="_blank">', '</a>' ),
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_headertwitter',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_headertwitter',array(
        'label' => __('Add twitter link','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_social_icons',
        'setting'   => 'vw_gardening_landscaping_pro_headertwitter',
        'type'      => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_headerpinterest',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_gardening_landscaping_pro_headerpinterest',array(
        'label' => __('Add pinterest link','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_social_icons',
        'setting'   => 'vw_gardening_landscaping_pro_headerpinterest',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_headerfacebook',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_gardening_landscaping_pro_headerfacebook',array(
        'label' => __('Add facebook link','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_social_icons',
        'setting'   => 'vw_gardening_landscaping_pro_headerfacebook',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_headeryoutube',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_gardening_landscaping_pro_headeryoutube',array(
        'label' => __('Add Youtube link','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_social_icons',
        'setting'   => 'vw_gardening_landscaping_pro_headeryoutube',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_headerinstagram',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_gardening_landscaping_pro_headerinstagram',array(
        'label' => __('Add Instagram link','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_social_icons',
        'setting'   => 'vw_gardening_landscaping_pro_headerinstagram',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_headerlinkedin',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_gardening_landscaping_pro_headerlinkedin',array(
        'label' => __('Add Linkedin link','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_social_icons',
        'setting'   => 'vw_gardening_landscaping_pro_headerlinkedin',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_headertumblric',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_gardening_landscaping_pro_headertumblric',array(
        'label' => __('Add Tumblr link','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_social_icons',
        'setting'   => 'vw_gardening_landscaping_pro_headertumblric',
        'type'  => 'text'
    )); 

    $wp_customize->add_setting('vw_gardening_landscaping_pro_headerflickr',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_headerflickr',array(
        'label' => __('Add Flickr link','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_social_icons',
        'setting'   => 'vw_gardening_landscaping_pro_headerflickr',
        'type'  => 'text'
    ));
    
    $wp_customize->add_setting('vw_gardening_landscaping_pro_headervk',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('vw_gardening_landscaping_pro_headervk',array(
        'label' => __('Add VK link','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_social_icons',
        'setting'   => 'vw_gardening_landscaping_pro_headervk',
        'type'  => 'text'
    ));
   
?>