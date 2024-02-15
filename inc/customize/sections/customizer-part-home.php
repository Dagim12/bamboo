<?php         
  // -------------- Other Plugins Details ----------------

  $wp_customize->add_section('vw_gardening_landscaping_pro_title_banner',array(
      'title' => __('Our other new plugins','vw-gardening-landscaping-pro'),
      'description' => __('Purchase Our other new plugins','vw-gardening-landscaping-pro'),
      'priority' => 3,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_buy_title_banner_plugin', array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
  ) );
  $wp_customize->add_control( new VW_Button_Custom_Content( $wp_customize, 'vw_gardening_landscaping_pro_buy_title_banner_plugin', array(
      'section' => 'vw_gardening_landscaping_pro_title_banner',
      'label' => __( 'VW Title Banner Plugin', 'vw-gardening-landscaping-pro' ),
      'description' => __( 'Need to add banner images? Check out VW Title Banner Plugin', 'vw-gardening-landscaping-pro' ),
      'content' => sprintf( __( 'Check the button %1$sBuy Now%2$s', 'vw-gardening-landscaping-pro' ), '<a href="' . esc_url( VW_GARDENING_LANDSCAPING_PRO_TITLE_BANNER_PLUGIN) . '" class="button button-secondary alignright review_st" target="_blank">', '</a>' ),
  )));

	/* ----------------------- Our Expertise ---------------------- */
	$wp_customize->add_section('vw_gardening_landscaping_pro_our_expertise',array(
		'title'	=> __('Our Expertise','vw-gardening-landscaping-pro'),
		'description'	=> __('Add Content Here','vw-gardening-landscaping-pro'),
		'panel' => 'vw_gardening_landscaping_pro_panel_id',
	));
	$wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_enable',
	    array(
      'default' => 'Enable',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
	));
	$wp_customize->add_control('vw_gardening_landscaping_pro_our_expertise_enable',
    array(
    'type' => 'radio',
    'label' => __('Do you want this section', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_expertise',
    'choices' => array(
    'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
    'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
  ),));

  $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_our_expertise_enable', array(
    'selector' => '#our-expertise .container',
    'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_our_expertise_enable',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_expertise_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_expertise_settings',
    array(
    'label' => __('Section Background Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_expertise'
  )));
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_expertise_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_expertise_bgcolor', array(
		'label' => __('Section Background Color', 'vw-gardening-landscaping-pro'),
    'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_our_expertise',
		'settings' => 'vw_gardening_landscaping_pro_our_expertise_bgcolor',
	)));
  
	$wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_bgimage',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_our_expertise_bgimage',array(
    'label' => __('Section Background Image','vw-gardening-landscaping-pro'),
    'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_expertise',
    'settings' => 'vw_gardening_landscaping_pro_our_expertise_bgimage'
	)));
  //Work Column Layout
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_expertise_bgimage_setting', array(
      'default'         => '',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_expertise_bgimage_setting', array(
      'type'      => 'radio',
      'label'     => __('Choose image option', 'vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_our_expertise',
      'choices'   => array(
        'vw-fixed'      => __( 'Fixed', 'vw-gardening-landscaping-pro' ),
        'vw-scroll'      => __( 'Scroll', 'vw-gardening-landscaping-pro' ),                    
  ),)); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_expertise_content_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_expertise_content_settings',
    array(
    'label' => __('Section Content Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_expertise'
  )));

	$wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_small_heading',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_gardening_landscaping_pro_our_expertise_small_heading',array(
		'label'	=> __('Section Small Heading','vw-gardening-landscaping-pro'),
		'section'	=> 'vw_gardening_landscaping_pro_our_expertise',
		'setting'	=> 'vw_gardening_landscaping_pro_our_expertise_small_heading',
		'type'		=> 'text'
	));	

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_expertise_small_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_expertise_small_heading_color', array(
    'label' => __('Small Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_expertise',
    'settings' => 'vw_gardening_landscaping_pro_our_expertise_small_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_small_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_expertise_small_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_expertise',
    'label'    => __('Small Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_expertise_heading',array(
    'label' => __('Section Main Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_expertise',
    'setting' => 'vw_gardening_landscaping_pro_our_expertise_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_expertise_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_expertise_heading_color', array(
    'label' => __('Section Main Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_expertise',
    'settings' => 'vw_gardening_landscaping_pro_our_expertise_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_expertise_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_expertise',
    'label'    => __('Section Main Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_number',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_expertise_number',array(
    'label' => __('No Of Features To Show','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_expertise',
    'setting' => 'vw_gardening_landscaping_pro_our_expertise_number',
    'type'    => 'number'
  )); 
  
  $expertise_count=get_theme_mod('vw_gardening_landscaping_pro_our_expertise_number');
  for($i=1;$i<=$expertise_count;$i++)
  {

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_expertise_feature_settings'.$i,
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_expertise_feature_settings'.$i,
      array(
      'label' => __('Feature ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_our_expertise'
    )));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_feature_icon'.$i,array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_our_expertise_feature_icon'.$i,array(
      'label' => __('Feature Icon ','vw-gardening-landscaping-pro').$i,
      'description' => __('Dimension 52 * 52','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_our_expertise',
      'settings' => 'vw_gardening_landscaping_pro_our_expertise_feature_icon'.$i
    )));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_feature_icon_alt_text'.$i,array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_expertise_feature_icon_alt_text'.$i,array(
        'label' => __('Feature Icon ALT text','vw-gardening-landscaping-pro'),
        'description' => esc_html( 'This is image text for image alt attribute.This text is only for coding purpose.' ),
        'section'   => 'vw_gardening_landscaping_pro_our_expertise',
        'setting'   => 'vw_gardening_landscaping_pro_our_expertise_feature_icon_alt_text'.$i,
        'type'  => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_feature_title'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_expertise_feature_title'.$i,array(
      'label' => __('Feature Title ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_our_expertise',
      'setting' => 'vw_gardening_landscaping_pro_our_expertise_feature_title'.$i,
      'type'    => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_feature_text'.$i,array(
      'default' => '',
      'capability'         => 'edit_theme_options',
        'sanitize_callback'  => 'wp_kses_post'
    ));
    $wp_customize->add_control(new vw_gardening_landscaping_pro_Editor_Control($wp_customize,'vw_gardening_landscaping_pro_our_expertise_feature_text'.$i,array(
      'label' => __('Feature Text ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_our_expertise',
      'setting' => 'vw_gardening_landscaping_pro_our_expertise_feature_text'.$i,
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_feature_button_title'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_expertise_feature_button_title'.$i,array(
      'label' => __('Feature Button Title ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_our_expertise',
      'setting' => 'vw_gardening_landscaping_pro_our_expertise_feature_button_title'.$i,
      'type'    => 'text'
    )); 
    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_feature_button_url'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_expertise_feature_button_url'.$i,array(
      'label' => __('Feature Button Url ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_our_expertise',
      'setting' => 'vw_gardening_landscaping_pro_our_expertise_feature_button_url'.$i,
      'type'    => 'text'
    )); 

  }

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_expertise_feature_title_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_expertise_feature_title_color', array(
    'label' => __('Feature Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_expertise',
    'settings' => 'vw_gardening_landscaping_pro_our_expertise_feature_title_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_feature_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_expertise_feature_title_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_expertise',
    'label'    => __('Feature Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_expertise_feature_text_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_expertise_feature_text_color', array(
    'label' => __('Feature Text Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_expertise',
    'settings' => 'vw_gardening_landscaping_pro_our_expertise_feature_text_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_feature_text_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_expertise_feature_text_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_expertise',
    'label'    => __('Feature Text Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_expertise_feature_button_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_expertise_feature_button_color', array(
    'label' => __('Button Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_expertise',
    'settings' => 'vw_gardening_landscaping_pro_our_expertise_feature_button_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_feature_button_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_expertise_feature_button_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_expertise',
    'label'    => __('Button Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_expertise_feature_button_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_expertise_feature_button_bgcolor', array(
    'label' => __('Button Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_expertise',
    'settings' => 'vw_gardening_landscaping_pro_our_expertise_feature_button_bgcolor',
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_expertise_feature_box_border_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_expertise_feature_box_border_color', array(
    'label' => __('Feature Box Border Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_expertise',
    'settings' => 'vw_gardening_landscaping_pro_our_expertise_feature_box_border_color',
  )));

  // ------------ About Us ---------------

  $wp_customize->add_section('vw_gardening_landscaping_pro_about_us',array(
    'title' => __('About Us','vw-gardening-landscaping-pro'),
    'description' => __('Add Content Here','vw-gardening-landscaping-pro'),
    'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_about_us_enable',
      array(
      'default' => 'Enable',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_about_us_enable',
    array(
    'type' => 'radio',
    'label' => __('Do you want this section', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us',
    'choices' => array(
    'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
    'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
  ),));

  $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_about_us_enable', array(
    'selector' => '#about-us .container',
    'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_about_us_enable',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_us_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_about_us_settings',
    array(
    'label' => __('Section Background Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us'
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_us_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_about_us_bgcolor', array(
    'label' => __('Section Background Color', 'vw-gardening-landscaping-pro'),
    'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us',
    'settings' => 'vw_gardening_landscaping_pro_about_us_bgcolor',
  )));
  
  $wp_customize->add_setting('vw_gardening_landscaping_pro_about_us_bgimage',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_about_us_bgimage',array(
    'label' => __('Section Background Image','vw-gardening-landscaping-pro'),
    'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us',
    'settings' => 'vw_gardening_landscaping_pro_about_us_bgimage'
  )));
       //Work Column Layout
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_us_bgimage_setting', array(
      'default'         => 'vw-fixed',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_about_us_bgimage_setting', array(
      'type'      => 'radio',
      'label'     => __('Choose image option', 'vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_about_us',
      'choices'   => array(
        'vw-fixed'      => __( 'Fixed', 'vw-gardening-landscaping-pro' ),
        'vw-scroll'      => __( 'Scroll', 'vw-gardening-landscaping-pro' ),                    
  ),)); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_us_content_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_about_us_content_settings',
    array(
    'label' => __('Section Content Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_about_us_small_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_about_us_small_heading',array(
    'label' => __('Section Small Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us',
    'setting' => 'vw_gardening_landscaping_pro_about_us_small_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting('vw_gardening_landscaping_pro_about_us_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_about_us_heading',array(
    'label' => __('Section Main Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us',
    'setting' => 'vw_gardening_landscaping_pro_about_us_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting('vw_gardening_landscaping_pro_about_us_text',array(
    'default' => '',
    'capability'         => 'edit_theme_options',
      'sanitize_callback'  => 'wp_kses_post'
  ));
  $wp_customize->add_control(new vw_gardening_landscaping_pro_Editor_Control($wp_customize,'vw_gardening_landscaping_pro_about_us_text',array(
    'label' => __('About Text','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us',
    'setting' => 'vw_gardening_landscaping_pro_about_us_text',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_about_us_number',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_about_us_number',array(
    'label' => __('No Of Features To Show','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us',
    'setting' => 'vw_gardening_landscaping_pro_about_us_number',
    'type'    => 'number'
  )); 

  $about_count=get_theme_mod('vw_gardening_landscaping_pro_about_us_number');

  for($i=1;$i<=$about_count;$i++)
  {
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_us_feature_settings'.$i,
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_about_us_feature_settings'.$i,
      array(
      'label' => __('Feature ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_about_us'
    )));
      // Emails
      $wp_customize->add_setting(
        'vw_gardening_landscaping_pro_about_us_feature_icon'.$i,
          array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
          )
      );
      $wp_customize->add_control(
          new vw_gardening_landscaping_pro_Fontawesome_Icon_Chooser(
            $wp_customize,
            'vw_gardening_landscaping_pro_about_us_feature_icon'.$i,
            array(
              'settings'    => 'vw_gardening_landscaping_pro_about_us_feature_icon'.$i,
              'section'   => 'vw_gardening_landscaping_pro_about_us',
              'type'      => 'icon',
              'label'     => esc_html__( 'Feature Icon ', 'vw-gardening-landscaping-pro' ).$i,
            )
          )
      );
    $wp_customize->add_setting('vw_gardening_landscaping_pro_about_us_feature_title'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_about_us_feature_title'.$i,array(
      'label' => __('Feature Title ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_about_us',
      'setting' => 'vw_gardening_landscaping_pro_about_us_feature_title'.$i,
      'type'    => 'text'
    )); 
    $wp_customize->add_setting('vw_gardening_landscaping_pro_about_us_feature_url'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_about_us_feature_url'.$i,array(
      'label' => __('Feature Title Url ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_about_us',
      'setting' => 'vw_gardening_landscaping_pro_about_us_feature_url'.$i,
      'type'    => 'text'
    )); 
  }
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_us_content_color_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_about_us_content_color_settings',
    array(
    'label' => __('Section Content Color And Font Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us'
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_us_small_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_about_us_small_heading_color', array(
    'label' => __('Small Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us',
    'settings' => 'vw_gardening_landscaping_pro_about_us_small_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_about_us_small_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_about_us_small_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_about_us',
    'label'    => __('Small Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_us_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_about_us_heading_color', array(
    'label' => __('Section Main Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us',
    'settings' => 'vw_gardening_landscaping_pro_about_us_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_about_us_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_about_us_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_about_us',
    'label'    => __('Section Main Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_us_text_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_about_us_text_color', array(
    'label' => __('Section Text Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us',
    'settings' => 'vw_gardening_landscaping_pro_about_us_text_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_about_us_text_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_about_us_text_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_about_us',
    'label'    => __('Section Text Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_us_feature_title_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_about_us_feature_title_color', array(
    'label' => __('Feature Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us',
    'settings' => 'vw_gardening_landscaping_pro_about_us_feature_title_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_about_us_feature_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_about_us_feature_title_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_about_us',
    'label'    => __('Feature Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_us_feature_icon_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_about_us_feature_icon_color', array(
    'label' => __('Feature Icon Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us',
    'settings' => 'vw_gardening_landscaping_pro_about_us_feature_icon_color',
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_us_feature_icon_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_about_us_feature_icon_bgcolor', array(
    'label' => __('Feature Icon Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_about_us',
    'settings' => 'vw_gardening_landscaping_pro_about_us_feature_icon_bgcolor',
  )));

  /* ----------------------- Our Services  ---------------------- */

  $wp_customize->add_section('vw_gardening_landscaping_pro_our_services',array(
    'title' => __('Our Services','vw-gardening-landscaping-pro'),
    'description' => __('Add Services Content Here','vw-gardening-landscaping-pro'),
    'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_services_enable',
      array(
      'default' => 'Enable',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_services_enable',
    array(
    'type' => 'radio',
    'label' => __('Do you want this section', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services',
    'choices' => array(
    'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
    'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
  ),));

  $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_our_services_enable', array(
    'selector' => '#our-services .container',
    'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_our_services_enable',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_services_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_services_settings',
    array(
    'label' => __('Section Background Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services'
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_services_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_services_bgcolor', array(
    'label' => __('Section Background Color', 'vw-gardening-landscaping-pro'),
    'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services',
    'settings' => 'vw_gardening_landscaping_pro_our_services_bgcolor',
  )));
  
  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_services_bgimage',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_our_services_bgimage',array(
    'label' => __('Section Background Image','vw-gardening-landscaping-pro'),
    'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services',
    'settings' => 'vw_gardening_landscaping_pro_our_services_bgimage'
  )));
             //Work Column Layout
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_services_bgimage_setting', array(
      'default'         => '',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_services_bgimage_setting', array(
      'type'      => 'radio',
      'label'     => __('Choose image option', 'vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_our_services',
      'choices'   => array(
        'vw-fixed'      => __( 'Fixed', 'vw-gardening-landscaping-pro' ),
        'vw-scroll'      => __( 'Scroll', 'vw-gardening-landscaping-pro' ),                    
  ),)); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_services_content_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_services_content_settings',
    array(
    'label' => __('Section Content Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_services_small_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_services_small_heading',array(
    'label' => __('Section Small Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services',
    'setting' => 'vw_gardening_landscaping_pro_our_services_small_heading',
    'type'    => 'text'
  )); 
   $wp_customize->add_setting( 'vw_gardening_landscaping_pro_services_excerpt_no',
    array(
      'default' => 6,
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new vw_gardening_landscaping_pro_Slider_Custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_services_excerpt_no',
      array(
        'label' => __( 'Services Excerpt Number (Limit 50 Words)', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_our_services',
        'input_attrs' => array(
          'min' => 5, // Required. Minimum value for the slider
          'max' => 50, // Required. Maximum value for the slider
          'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
        ),
    )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_services_small_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_services_small_heading_color', array(
    'label' => __('Small Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services',
    'settings' => 'vw_gardening_landscaping_pro_our_services_small_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_services_small_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_services_small_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_services',
    'label'    => __('Small Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_services_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_services_heading',array(
    'label' => __('Section Main Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services',
    'setting' => 'vw_gardening_landscaping_pro_our_services_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_services_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_services_heading_color', array(
    'label' => __('Section Main Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services',
    'settings' => 'vw_gardening_landscaping_pro_our_services_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_services_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_services_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_services',
    'label'    => __('Section Main Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_services_number',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_services_number',array(
    'label' => __('No Of Services To Show','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services',
    'setting' => 'vw_gardening_landscaping_pro_our_services_number',
    'type'    => 'number'
  )); 
  $count =  get_theme_mod('vw_gardening_landscaping_pro_our_services_number');
  for($i=1; $i<=$count; $i++) {
    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_services_alt_text'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_services_alt_text'.$i,array(
      'label' => __('Services Image Alt Text ','vw-gardening-landscaping-pro').$i,
      'description' => esc_html( 'This is image text for image alt attribute.This text is only for coding purpose.' ),
      'section' => 'vw_gardening_landscaping_pro_our_services',
      'setting' => 'vw_gardening_landscaping_pro_our_services_alt_text'.$i,
      'type'  => 'text'
    ));
  }
  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_services_link_title',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_services_link_title',array(
    'label' => __('Services Link Title','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services',
    'setting' => 'vw_gardening_landscaping_pro_our_services_link_title',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_services_content_color_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_services_content_color_settings',
    array(
    'label' => __('Services Content Color And Font Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services'
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_services_title_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_services_title_color', array(
    'label' => __('Services Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services',
    'settings' => 'vw_gardening_landscaping_pro_our_services_title_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_services_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_services_title_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_services',
    'label'    => __('Services Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_services_text_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_services_text_color', array(
    'label' => __('Services Text Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services',
    'settings' => 'vw_gardening_landscaping_pro_our_services_text_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_services_text_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_services_text_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_services',
    'label'    => __('Services Text Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_services_link_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_services_link_color', array(
    'label' => __('Services Link Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services',
    'settings' => 'vw_gardening_landscaping_pro_our_services_link_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_services_link_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_services_link_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_services',
    'label'    => __('Services Link Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_services_box_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_services_box_bgcolor', array(
    'label' => __('Services Box Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_services',
    'settings' => 'vw_gardening_landscaping_pro_our_services_box_bgcolor',
  )));

    /* ----------------------- Working Process  ---------------------- */

  $wp_customize->add_section('vw_gardening_landscaping_pro_working_process',array(
    'title' => __('Working Process','vw-gardening-landscaping-pro'),
    'description' => __('Add Process Content Here','vw-gardening-landscaping-pro'),
    'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_working_process_enable',
      array(
      'default' => 'Enable',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_working_process_enable',
    array(
    'type' => 'radio',
    'label' => __('Do you want this section', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process',
    'choices' => array(
    'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
    'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
  ),));

  $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_working_process_enable', array(
    'selector' => '#working-process .container',
    'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_working_process_enable',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_working_process_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_working_process_settings',
    array(
    'label' => __('Section Background Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process'
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_working_process_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_working_process_bgcolor', array(
    'label' => __('Section Background Color', 'vw-gardening-landscaping-pro'),
    'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process',
    'settings' => 'vw_gardening_landscaping_pro_working_process_bgcolor',
  )));
  
  $wp_customize->add_setting('vw_gardening_landscaping_pro_working_process_bgimage',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_working_process_bgimage',array(
    'label' => __('Section Background Image','vw-gardening-landscaping-pro'),
    'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process',
    'settings' => 'vw_gardening_landscaping_pro_working_process_bgimage'
  )));
         //Work Column Layout
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_working_process_bgimage_setting', array(
      'default'         => 'vw-fixed',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_working_process_bgimage_setting', array(
      'type'      => 'radio',
      'label'     => __('Choose image option', 'vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_working_process',
      'choices'   => array(
        'vw-fixed'      => __( 'Fixed', 'vw-gardening-landscaping-pro' ),
        'vw-scroll'      => __( 'Scroll', 'vw-gardening-landscaping-pro' ),                    
  ),)); 
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_working_process_content_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_working_process_content_settings',
    array(
    'label' => __('Section Content Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_working_process_small_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_working_process_small_heading',array(
    'label' => __('Section Small Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process',
    'setting' => 'vw_gardening_landscaping_pro_working_process_small_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_working_process_small_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_working_process_small_heading_color', array(
    'label' => __('Small Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process',
    'settings' => 'vw_gardening_landscaping_pro_working_process_small_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_working_process_small_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_working_process_small_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_working_process',
    'label'    => __('Small Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_working_process_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_working_process_heading',array(
    'label' => __('Section Main Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process',
    'setting' => 'vw_gardening_landscaping_pro_working_process_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_working_process_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_working_process_heading_color', array(
    'label' => __('Section Main Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process',
    'settings' => 'vw_gardening_landscaping_pro_working_process_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_working_process_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_working_process_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_working_process',
    'label'    => __('Section Main Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_working_process_number',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_working_process_number',array(
    'label' => __('No Of Processes To Show','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process',
    'setting' => 'vw_gardening_landscaping_pro_working_process_number',
    'type'    => 'number'
  ));
  $process_count=get_theme_mod('vw_gardening_landscaping_pro_working_process_number');
  for($i=1;$i<=$process_count;$i++)
  { 
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_working_process_no_settings'.$i,
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_working_process_no_settings'.$i,
      array(
      'label' => __('Process ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_working_process'
    )));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_working_process_no'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_working_process_no'.$i,array(
      'label' => __('Process Number ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_working_process',
      'setting' => 'vw_gardening_landscaping_pro_working_process_no'.$i,
      'type'    => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_working_process_title'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_working_process_title'.$i,array(
      'label' => __('Process Title ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_working_process',
      'setting' => 'vw_gardening_landscaping_pro_working_process_title'.$i,
      'type'    => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_working_process_title_url'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_working_process_title_url'.$i,array(
      'label' => __('Process Title Url ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_working_process',
      'setting' => 'vw_gardening_landscaping_pro_working_process_title_url'.$i,
      'type'    => 'text'
    ));
      $wp_customize->add_setting(
        'vw_gardening_landscaping_pro_working_process_icon'.$i,
          array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
          )
      );
      $wp_customize->add_control(
          new vw_gardening_landscaping_pro_Fontawesome_Icon_Chooser(
            $wp_customize,
            'vw_gardening_landscaping_pro_working_process_icon'.$i,
            array(
              'settings'    => 'vw_gardening_landscaping_pro_working_process_icon'.$i,
              'section'   => 'vw_gardening_landscaping_pro_working_process',
              'type'      => 'icon',
              'label'     => esc_html__( 'Process Icon ', 'vw-gardening-landscaping-pro' ).$i,
            )
          )
      );
  }

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_working_process_color_settings',
  array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_working_process_color_settings',
    array(
    'label' => __('Section Content Color And Font Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_working_process_number_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_working_process_number_color', array(
    'label' => __('Process Number Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process',
    'settings' => 'vw_gardening_landscaping_pro_working_process_number_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_working_process_number_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_working_process_number_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_working_process',
    'label'    => __('Process Number Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_working_process_title_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_working_process_title_color', array(
    'label' => __('Process Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process',
    'settings' => 'vw_gardening_landscaping_pro_working_process_title_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_working_process_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_working_process_title_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_working_process',
    'label'    => __('Process Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_working_process_icon_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_working_process_icon_color', array(
    'label' => __('Process Icon Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process',
    'settings' => 'vw_gardening_landscaping_pro_working_process_icon_color',
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_working_process_icon_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_working_process_icon_bgcolor', array(
    'label' => __('Process Icon Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process',
    'settings' => 'vw_gardening_landscaping_pro_working_process_icon_bgcolor',
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_working_process_box_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_working_process_box_bgcolor', array(
    'label' => __('Process Box Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process',
    'settings' => 'vw_gardening_landscaping_pro_working_process_box_bgcolor',
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_working_process_box_border_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_working_process_box_border_color', array(
    'label' => __('Process Box Border Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_working_process',
    'settings' => 'vw_gardening_landscaping_pro_working_process_box_border_color',
  )));

  // ----------- Our Project ---------------

  $wp_customize->add_section('vw_gardening_landscaping_pro_our_project',array(
    'title' => __('Our Project','vw-gardening-landscaping-pro'),
    'description' => __('Add Project Content Here','vw-gardening-landscaping-pro'),
    'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_project_enable',
      array(
      'default' => 'Enable',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_project_enable',
    array(
    'type' => 'radio',
    'label' => __('Do you want this section', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project',
    'choices' => array(
    'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
    'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
  ),));

  $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_our_project_enable', array(
    'selector' => '#our-project .container',
    'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_our_project_enable',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_project_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_project_settings',
    array(
    'label' => __('Section Background Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project'
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_project_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_project_bgcolor', array(
    'label' => __('Section Background Color', 'vw-gardening-landscaping-pro'),
    'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project',
    'settings' => 'vw_gardening_landscaping_pro_our_project_bgcolor',
  )));
  
  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_project_bgimage',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_our_project_bgimage',array(
    'label' => __('Section Background Image','vw-gardening-landscaping-pro'),
    'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project',
    'settings' => 'vw_gardening_landscaping_pro_our_project_bgimage'
  )));
               //Work Column Layout
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_project_bgimage_setting', array(
      'default'         => '',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_project_bgimage_setting', array(
      'type'      => 'radio',
      'label'     => __('Choose image option', 'vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_our_project',
      'choices'   => array(
        'vw-fixed'      => __( 'Fixed', 'vw-gardening-landscaping-pro' ),
        'vw-scroll'      => __( 'Scroll', 'vw-gardening-landscaping-pro' ),                    
  ),)); 
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_project_content_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_project_content_settings',
    array(
    'label' => __('Section Content Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_project_small_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_project_small_heading',array(
    'label' => __('Section Small Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project',
    'setting' => 'vw_gardening_landscaping_pro_our_project_small_heading',
    'type'    => 'text'
  )); 
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_project_excerpt_no',
    array(
      'default' => 5,
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new vw_gardening_landscaping_pro_Slider_Custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_project_excerpt_no',
      array(
        'label' => __( 'Project Excerpt Number (Limit 50 Words)', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_our_project',
        'input_attrs' => array(
          'min' => 5, // Required. Minimum value for the slider
          'max' => 50, // Required. Maximum value for the slider
          'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
        ),
    )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_project_small_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_project_small_heading_color', array(
    'label' => __('Small Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project',
    'settings' => 'vw_gardening_landscaping_pro_our_project_small_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_project_small_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_project_small_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_project',
    'label'    => __('Small Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_project_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_project_heading',array(
    'label' => __('Section Main Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project',
    'setting' => 'vw_gardening_landscaping_pro_our_project_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_project_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_project_heading_color', array(
    'label' => __('Section Main Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project',
    'settings' => 'vw_gardening_landscaping_pro_our_project_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_project_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_project_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_project',
    'label'    => __('Section Main Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_project_number',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_project_number',array(
    'label' => __('No Of Tabs To Show','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project',
    'setting' => 'vw_gardening_landscaping_pro_our_project_number',
    'type'    => 'number'
  ));

  $project_count=get_theme_mod('vw_gardening_landscaping_pro_our_project_number');

  $args = array(
    'type'                     => 'projects',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'term_group',
    'order'                    => 'ASC',
    'hide_empty'               => false,
    'hierarchical'             => 1,
    'number'                   => '',
    'taxonomy'                 => 'projectscategory',
    'pad_counts'               => false
  );
  $categories = get_categories( $args );
  $cats = array();
  
  foreach($categories as $category){
    $cats[$category->name] = $category->name;
  }
  for($i=1;$i<=$project_count;$i++)
  {
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_project_tab_settings'.$i,
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_project_tab_settings'.$i,
      array(
      'label' => __('Tab Settings ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_our_project'
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_project_tab_title'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_project_tab_title'.$i,array(
      'label' => __('Tab Title ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_our_project',
      'setting' => 'vw_gardening_landscaping_pro_our_project_tab_title'.$i,
      'type'    => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_project_categoryselection_setting'.$i,array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_project_categoryselection_setting'.$i,array(
        'description' => 'Select Project Category From Dropdown',
        'type'    => 'select',
        'choices' => $cats,
        'label' => __('Category ','vw-gardening-landscaping-pro').$i,
        'section' => 'vw_gardening_landscaping_pro_our_project',
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_project_categoryselection_alt_text'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_project_categoryselection_alt_text'.$i,array(
      'label' => __('Project Image Alt Text ','vw-gardening-landscaping-pro').$i,
      'description' => esc_html( 'This is image text for image alt attribute.This text is only for coding purpose.' ),
      'section' => 'vw_gardening_landscaping_pro_our_project',
      'setting' => 'vw_gardening_landscaping_pro_our_project_categoryselection_alt_text'.$i,
      'type'  => 'text'
    ));
  }

    $count =  get_theme_mod('vw_gardening_landscaping_pro_our_services_number');
  for($i=1; $i<=$count; $i++) {
    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_services_alt_text'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_services_alt_text'.$i,array(
      'label' => __('Services Image Alt Text ','vw-gardening-landscaping-pro').$i,
      'description' => esc_html( 'This is image text for image alt attribute.This text is only for coding purpose.' ),
      'section' => 'vw_gardening_landscaping_pro_our_services',
      'setting' => 'vw_gardening_landscaping_pro_our_services_alt_text'.$i,
      'type'  => 'text'
    ));
  }
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_project_content_color_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_project_content_color_settings',
    array(
    'label' => __('Section Content Color And Font Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_project_tab_title_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_project_tab_title_color', array(
    'label' => __('Tab Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project',
    'settings' => 'vw_gardening_landscaping_pro_our_project_tab_title_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_project_tab_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_project_tab_title_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_project',
    'label'    => __('Tab Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_project_active_tab_title_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_project_active_tab_title_bgcolor', array(
    'label' => __('Active Tab Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project',
    'settings' => 'vw_gardening_landscaping_pro_our_project_active_tab_title_bgcolor',
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_project_content_title_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_project_content_title_color', array(
    'label' => __('Tab Content Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project',
    'settings' => 'vw_gardening_landscaping_pro_our_project_content_title_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_project_content_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_project_content_title_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_project',
    'label'    => __('Tab Content Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_project_content_text_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_project_content_text_color', array(
    'label' => __('Tab Content Text Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project',
    'settings' => 'vw_gardening_landscaping_pro_our_project_content_text_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_project_content_text_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_project_content_text_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_project',
    'label'    => __('Tab Content Text Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_project_content_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_project_content_bgcolor', array(
    'label' => __('Tab Content Hover Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_project',
    'settings' => 'vw_gardening_landscaping_pro_our_project_content_bgcolor',
  )));

  // -------------- Pricing Plans ----------------

  $wp_customize->add_section('vw_gardening_landscaping_pro_pricing_plan',array(
    'title' => __('Pricing Plans','vw-gardening-landscaping-pro'),
    'description' => __('Add Pricing Plans Content Here','vw-gardening-landscaping-pro'),
    'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_enable',
      array(
      'default' => 'Enable',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_pricing_plan_enable',
    array(
    'type' => 'radio',
    'label' => __('Do you want this section', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan',
    'choices' => array(
    'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
    'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
  ),));

  $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_pricing_plan_enable', array(
    'selector' => '#pricing-plans .container',
    'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_pricing_plan_enable',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_pricing_plan_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_pricing_plan_settings',
    array(
    'label' => __('Section Background Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan'
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_pricing_plan_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_pricing_plan_bgcolor', array(
    'label' => __('Section Background Color', 'vw-gardening-landscaping-pro'),
    'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan',
    'settings' => 'vw_gardening_landscaping_pro_pricing_plan_bgcolor',
  )));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_bgimage',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_pricing_plan_bgimage',array(
    'label' => __('Section Background Image','vw-gardening-landscaping-pro'),
    'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan',
    'settings' => 'vw_gardening_landscaping_pro_pricing_plan_bgimage'
  )));
                 //Work Column Layout
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_pricing_plan_bgimage_setting', array(
      'default'         => 'vw-fixed',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_pricing_plan_bgimage_setting', array(
      'type'      => 'radio',
      'label'     => __('Choose image option', 'vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_pricing_plan',
      'choices'   => array(
        'vw-fixed'      => __( 'Fixed', 'vw-gardening-landscaping-pro' ),
        'vw-scroll'      => __( 'Scroll', 'vw-gardening-landscaping-pro' ),                    
  ),)); 
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_pricing_plan_content_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_pricing_plan_content_settings',
    array(
    'label' => __('Section Content Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_small_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_pricing_plan_small_heading',array(
    'label' => __('Section Small Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan',
    'setting' => 'vw_gardening_landscaping_pro_pricing_plan_small_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_pricing_plan_small_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_pricing_plan_small_heading_color', array(
    'label' => __('Small Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan',
    'settings' => 'vw_gardening_landscaping_pro_pricing_plan_small_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_small_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_pricing_plan_small_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_pricing_plan',
    'label'    => __('Small Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_pricing_plan_heading',array(
    'label' => __('Section Main Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan',
    'setting' => 'vw_gardening_landscaping_pro_pricing_plan_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_pricing_plan_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_pricing_plan_heading_color', array(
    'label' => __('Section Main Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan',
    'settings' => 'vw_gardening_landscaping_pro_pricing_plan_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_pricing_plan_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_pricing_plan',
    'label'    => __('Section Main Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_number',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_pricing_plan_number',array(
    'label' => __('No Of Plans To Show','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan',
    'setting' => 'vw_gardening_landscaping_pro_pricing_plan_number',
    'type'    => 'number'
  )); 

  $plan_count=get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_number');
  for($i=1;$i<=$plan_count;$i++)
  {

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_pricing_plan_info_settings'.$i,
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_pricing_plan_info_settings'.$i,
      array(
      'label' => __('Pricing Plan ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_pricing_plan'
    )));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_title'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_pricing_plan_title'.$i,array(
      'label' => __('Pricing Plan Title ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_pricing_plan',
      'setting' => 'vw_gardening_landscaping_pro_pricing_plan_title'.$i,
      'type'    => 'text'
    )); 

    $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_price'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_pricing_plan_price'.$i,array(
      'label' => __('Pricing Plan Price ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_pricing_plan',
      'setting' => 'vw_gardening_landscaping_pro_pricing_plan_price'.$i,
      'type'    => 'text'
    )); 

    $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_price_duration'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_pricing_plan_price_duration'.$i,array(
      'label' => __('Pricing Plan Duration ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_pricing_plan',
      'setting' => 'vw_gardening_landscaping_pro_pricing_plan_price_duration'.$i,
      'type'    => 'text'
    )); 
    $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_link_title'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_pricing_plan_link_title'.$i,array(
      'label' => __('Pricing Plan Link Title ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_pricing_plan',
      'setting' => 'vw_gardening_landscaping_pro_pricing_plan_link_title'.$i,
      'type'    => 'text'
    )); 
    $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_link_url'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_pricing_plan_link_url'.$i,array(
      'label' => __('Pricing Plan Link Url ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_pricing_plan',
      'setting' => 'vw_gardening_landscaping_pro_pricing_plan_link_url'.$i,
      'type'    => 'text'
    )); 

    $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_feature_number'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_pricing_plan_feature_number'.$i,array(
      'label' => __('No Of Features To Show ','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_pricing_plan',
      'setting' => 'vw_gardening_landscaping_pro_pricing_plan_feature_number'.$i,
      'type'    => 'number'
    )); 
    $plan_features=get_theme_mod('vw_gardening_landscaping_pro_pricing_plan_feature_number'.$i);
    for($j=1;$j<=$plan_features;$j++)
    {
      $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_feature_title'.$i.$j,array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
      ));
      $wp_customize->add_control('vw_gardening_landscaping_pro_pricing_plan_feature_title'.$i.$j,array(
        'label' => __('Feature ','vw-gardening-landscaping-pro').$j,
        'section' => 'vw_gardening_landscaping_pro_pricing_plan',
        'setting' => 'vw_gardening_landscaping_pro_pricing_plan_feature_title'.$i.$j,
        'type'    => 'text'
      )); 
    }
  }

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_pricing_plan_content_color_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_pricing_plan_content_color_settings',
    array(
    'label' => __('Section Content Color And Font Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_pricing_plan_title_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_pricing_plan_title_color', array(
    'label' => __('Plan Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan',
    'settings' => 'vw_gardening_landscaping_pro_pricing_plan_title_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_pricing_plan_title_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_pricing_plan',
    'label'    => __('Plan Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_pricing_plan_price_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_pricing_plan_price_color', array(
    'label' => __('Plan Price Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan',
    'settings' => 'vw_gardening_landscaping_pro_pricing_plan_price_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_price_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_pricing_plan_price_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_pricing_plan',
    'label'    => __('Plan Price Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_pricing_plan_link_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_pricing_plan_link_color', array(
    'label' => __('Plan Link Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan',
    'settings' => 'vw_gardening_landscaping_pro_pricing_plan_link_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_link_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_pricing_plan_link_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_pricing_plan',
    'label'    => __('Plan Link Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_pricing_plan_feature_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_pricing_plan_feature_color', array(
    'label' => __('Plan Feature Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan',
    'settings' => 'vw_gardening_landscaping_pro_pricing_plan_feature_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_feature_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_pricing_plan_feature_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_pricing_plan',
    'label'    => __('Plan Feature Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_pricing_plan_box_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_pricing_plan_box_bgcolor', array(
    'label' => __('Pricing Plan Box Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan',
    'settings' => 'vw_gardening_landscaping_pro_pricing_plan_box_bgcolor',
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_pricing_plan_feature_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_pricing_plan_feature_bgcolor', array(
    'label' => __('Feature Box Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_pricing_plan',
    'settings' => 'vw_gardening_landscaping_pro_pricing_plan_feature_bgcolor',
  )));

  // -------------- Our Products --------------

  $wp_customize->add_section('vw_gardening_landscaping_pro_our_products',array(
    'title' => __('Our Products','vw-gardening-landscaping-pro'),
    'description' => __('Add Products Content Here','vw-gardening-landscaping-pro'),
    'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_enable',
      array(
      'default' => 'Enable',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_products_enable',
    array(
    'type' => 'radio',
    'label' => __('Do you want this section', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'choices' => array(
    'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
    'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
  ),));

  $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_our_products_enable', array(
    'selector' => '#our-products .container',
    'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_our_products_enable',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_settings',
    array(
    'label' => __('Section Background Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products'
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_bgcolor', array(
    'label' => __('Section Background Color', 'vw-gardening-landscaping-pro'),
    'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'settings' => 'vw_gardening_landscaping_pro_our_products_bgcolor',
  )));
  
  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_bgimage',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_our_products_bgimage',array(
    'label' => __('Section Background Image','vw-gardening-landscaping-pro'),
    'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'settings' => 'vw_gardening_landscaping_pro_our_products_bgimage'
  )));
                   //Work Column Layout
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_bgimage_setting', array(
      'default'         => 'vw-fixed',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_products_bgimage_setting', array(
      'type'      => 'radio',
      'label'     => __('Choose image option', 'vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_our_products',
      'choices'   => array(
        'vw-fixed'      => __( 'Fixed', 'vw-gardening-landscaping-pro' ),
        'vw-scroll'      => __( 'Scroll', 'vw-gardening-landscaping-pro' ),                    
  ),)); 
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_content_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_content_settings',
    array(
    'label' => __('Section Content Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_small_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_products_small_heading',array(
    'label' => __('Section Small Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'setting' => 'vw_gardening_landscaping_pro_our_products_small_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_small_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_small_heading_color', array(
    'label' => __('Small Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'settings' => 'vw_gardening_landscaping_pro_our_products_small_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_small_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_products_small_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_products',
    'label'    => __('Small Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_products_heading',array(
    'label' => __('Section Main Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'setting' => 'vw_gardening_landscaping_pro_our_products_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_heading_color', array(
    'label' => __('Section Main Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'settings' => 'vw_gardening_landscaping_pro_our_products_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_products_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_products',
    'label'    => __('Section Main Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_number',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_products_number',array(
    'label' => __('No Of Products To Show','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'setting' => 'vw_gardening_landscaping_pro_our_products_number',
    'type'    => 'number'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_content_color_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_content_color_settings',
    array(
    'label' => __('Section Content Color And Font Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_title_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_title_color', array(
    'label' => __('Product Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'settings' => 'vw_gardening_landscaping_pro_our_products_title_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_products_title_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_products',
    'label'    => __('Product Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_price_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_price_color', array(
    'label' => __('Product Price Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'settings' => 'vw_gardening_landscaping_pro_our_products_price_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_price_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_products_price_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_products',
    'label'    => __('Product Price Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_cart_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_cart_color', array(
    'label' => __('Cart Button Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'settings' => 'vw_gardening_landscaping_pro_our_products_cart_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_cart_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_products_cart_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_products',
    'label'    => __('Cart Button Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_cart_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_cart_bgcolor', array(
    'label' => __('Cart Button Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'settings' => 'vw_gardening_landscaping_pro_our_products_cart_bgcolor',
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_sale_tag_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_sale_tag_bgcolor', array(
    'label' => __('Sale Tag Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'settings' => 'vw_gardening_landscaping_pro_our_products_sale_tag_bgcolor',
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_records_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_records_settings',
    array(
    'label' => __('Our Records Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products'
  )));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_records_enable',
      array(
      'default' => 'Enable',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_products_records_enable',
    array(
    'type' => 'radio',
    'label' => __('Do you want this section', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'choices' => array(
    'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
    'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
  ),));


  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_records_image',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_our_products_records_image',array(
    'label' => __('Records Image','vw-gardening-landscaping-pro'),
    'description' => __('Dimension 100 * 200','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'settings' => 'vw_gardening_landscaping_pro_our_products_records_image'
  )));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_records_image_products',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_textarea_field',
    ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_products_records_image_products',array(
      'label' => __('Records Image Alt Text ','vw-gardening-landscaping-pro'),
      'description' => esc_html( 'This is image text for image alt attribute.This text is only for coding purpose.' ),
      'section' => 'vw_gardening_landscaping_pro_our_products',
      'setting' => 'vw_gardening_landscaping_pro_our_products_records_image_products',
      'type'  => 'text'
    ));
  for($i=1;$i<=4;$i++)
  {
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_records_content_settings'.$i,
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_records_content_settings'.$i,
      array(
      'label' => __('Record ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_our_products'
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_records_icon'.$i,array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_our_products_records_icon'.$i,array(
      'label' => __('Record Icon ','vw-gardening-landscaping-pro').$i,
      'description' => __('Dimension 50 * 50','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_our_products',
      'settings' => 'vw_gardening_landscaping_pro_our_products_records_icon'.$i
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_records_icon_alt_text'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_products_records_icon_alt_text'.$i,array(
      'label' => __('Record Icon Alt Text ','vw-gardening-landscaping-pro'),
      'description' => esc_html( 'This is image text for image alt attribute.This text is only for coding purpose.' ),
      'section' => 'vw_gardening_landscaping_pro_our_products',
      'setting' => 'vw_gardening_landscaping_pro_our_products_records_icon_alt_text'.$i,
      'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_record_no'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_products_record_no'.$i,array(
      'label' => __('Record Number ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_our_products',
      'setting' => 'vw_gardening_landscaping_pro_our_products_record_no'.$i,
      'type'    => 'text'
    )); 
    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_record_no_suffix'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_products_record_no_suffix'.$i,array(
      'label' => __('Record Number Suffix ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_our_products',
      'setting' => 'vw_gardening_landscaping_pro_our_products_record_no_suffix'.$i,
      'type'    => 'text'
    )); 

    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_record_title'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_products_record_title'.$i,array(
      'label' => __('Record Title ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_our_products',
      'setting' => 'vw_gardening_landscaping_pro_our_products_record_title'.$i,
      'type'    => 'text'
    )); 
  }

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_records_content_color_settings',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_records_content_color_settings',
      array(
      'label' => __('Record Content Color And Font Settings ','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_our_products'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_records_no_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_records_no_color', array(
    'label' => __('Record Number Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'settings' => 'vw_gardening_landscaping_pro_our_products_records_no_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_records_no_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_products_records_no_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_products',
    'label'    => __('Record Number Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_records_title_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_records_title_color', array(
    'label' => __('Record Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'settings' => 'vw_gardening_landscaping_pro_our_products_records_title_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_records_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_products_records_title_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_products',
    'label'    => __('Record Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_products_records_box_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_products_records_box_bgcolor', array(
    'label' => __('Record Box Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_products',
    'settings' => 'vw_gardening_landscaping_pro_our_products_records_box_bgcolor',
  )));

  // ------------- Testimonial -----------------

  $wp_customize->add_section('vw_gardening_landscaping_pro_testimonial',array(
    'title' => __('Testimonial','vw-gardening-landscaping-pro'),
    'description' => __('Add Testimonial Content Here','vw-gardening-landscaping-pro'),
    'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_testimonial_enable',
      array(
      'default' => 'Enable',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_testimonial_enable',
    array(
    'type' => 'radio',
    'label' => __('Do you want this section', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial',
    'choices' => array(
    'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
    'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
  ),));

  $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_testimonial_enable', array(
    'selector' => '#testimonials .container',
    'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_testimonial_enable',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_testimonial_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_testimonial_settings',
    array(
    'label' => __('Section Background Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial'
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_testimonial_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_testimonial_bgcolor', array(
    'label' => __('Section Background Color', 'vw-gardening-landscaping-pro'),
    'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial',
    'settings' => 'vw_gardening_landscaping_pro_testimonial_bgcolor',
  )));
  
  $wp_customize->add_setting('vw_gardening_landscaping_pro_testimonial_bgimage',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_testimonial_bgimage',array(
    'label' => __('Section Background Image','vw-gardening-landscaping-pro'),
    'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial',
    'settings' => 'vw_gardening_landscaping_pro_testimonial_bgimage'
  )));
                   //Work Column Layout
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_testimonial_bgimage_setting', array(
      'default'         => 'vw-fixed',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_testimonial_bgimage_setting', array(
      'type'      => 'radio',
      'label'     => __('Choose image option', 'vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_testimonial',
      'choices'   => array(
        'vw-fixed'      => __( 'Fixed', 'vw-gardening-landscaping-pro' ),
        'vw-scroll'      => __( 'Scroll', 'vw-gardening-landscaping-pro' ),                    
  ),)); 
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_testimonial_content_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_testimonial_content_settings',
    array(
    'label' => __('Section Content Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_testimonial_small_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_testimonial_small_heading',array(
    'label' => __('Section Small Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial',
    'setting' => 'vw_gardening_landscaping_pro_testimonial_small_heading',
    'type'    => 'text'
  )); 
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_testimonial_excerpt_no',
    array(
      'default' => 12,
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new vw_gardening_landscaping_pro_Slider_Custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_testimonial_excerpt_no',
      array(
        'label' => __( 'Testimonial Excerpt Number (Limit 50 Words)', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_testimonial',
        'input_attrs' => array(
          'min' => 5, // Required. Minimum value for the slider
          'max' => 50, // Required. Maximum value for the slider
          'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
        ),
    )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_testimonial_small_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_testimonial_small_heading_color', array(
    'label' => __('Small Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial',
    'settings' => 'vw_gardening_landscaping_pro_testimonial_small_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_testimonial_small_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_testimonial_small_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_testimonial',
    'label'    => __('Small Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_testimonial_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_testimonial_heading',array(
    'label' => __('Section Main Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial',
    'setting' => 'vw_gardening_landscaping_pro_testimonial_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_testimonial_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_testimonial_heading_color', array(
    'label' => __('Section Main Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial',
    'settings' => 'vw_gardening_landscaping_pro_testimonial_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_testimonial_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_testimonial_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_testimonial',
    'label'    => __('Section Main Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_testimonial_number',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_testimonial_number',array(
    'label' => __('No Of Testimonial To Show','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial',
    'setting' => 'vw_gardening_landscaping_pro_testimonial_number',
    'type'    => 'number'
  ));

 $count =  get_theme_mod('vw_gardening_landscaping_pro_testimonial_number');
  for($i=1; $i<=$count; $i++) {
    $wp_customize->add_setting('vw_gardening_landscaping_pro_posttype_testimonial_alt_text'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_posttype_testimonial_alt_text'.$i,array(
      'label' => __('Testimonial Image Alt Text ','vw-gardening-landscaping-pro').$i,
      'description' => esc_html( 'This is image text for image alt attribute.This text is only for coding purpose.' ),
      'section' => 'vw_gardening_landscaping_pro_testimonial',
      'setting' => 'vw_gardening_landscaping_pro_posttype_testimonial_alt_text'.$i,
      'type'  => 'text'
    ));
  }
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_testimonial_content_color_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_testimonial_content_color_settings',
    array(
    'label' => __('Section Content Color And Font Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_testimonial_text_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_testimonial_text_color', array(
    'label' => __('Testimonial Text Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial',
    'settings' => 'vw_gardening_landscaping_pro_testimonial_text_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_testimonial_text_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_testimonial_text_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_testimonial',
    'label'    => __('Testimonial Text Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_testimonial_title_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_testimonial_title_color', array(
    'label' => __('Testimonial Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial',
    'settings' => 'vw_gardening_landscaping_pro_testimonial_title_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_testimonial_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_testimonial_title_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_testimonial',
    'label'    => __('Testimonial Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_testimonial_designation_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_testimonial_designation_color', array(
    'label' => __('Testimonial Designation Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial',
    'settings' => 'vw_gardening_landscaping_pro_testimonial_designation_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_testimonial_designation_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_testimonial_designation_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_testimonial',
    'label'    => __('Testimonial Designation Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_testimonial_icon_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_testimonial_icon_color', array(
    'label' => __('Testimonial Social Icon Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial',
    'settings' => 'vw_gardening_landscaping_pro_testimonial_icon_color',
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_testimonial_icon_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_testimonial_icon_bgcolor', array(
    'label' => __('Testimonial Social Icon Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_testimonial',
    'settings' => 'vw_gardening_landscaping_pro_testimonial_icon_bgcolor',
  )));

  // --------------- Our Team --------------

  $wp_customize->add_section('vw_gardening_landscaping_pro_our_team',array(
    'title' => __('Our Team','vw-gardening-landscaping-pro'),
    'description' => __('Add Team Content Here','vw-gardening-landscaping-pro'),
    'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_team_enable',
      array(
      'default' => 'Enable',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_team_enable',
    array(
    'type' => 'radio',
    'label' => __('Do you want this section', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team',
    'choices' => array(
    'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
    'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
  ),));

  $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_our_team_enable', array(
    'selector' => '#our-team .container',
    'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_our_team_enable',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_team_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_team_settings',
    array(
    'label' => __('Section Background Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team'
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_team_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_team_bgcolor', array(
    'label' => __('Section Background Color', 'vw-gardening-landscaping-pro'),
    'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team',
    'settings' => 'vw_gardening_landscaping_pro_our_team_bgcolor',
  )));
  
  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_team_bgimage',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_our_team_bgimage',array(
    'label' => __('Section Background Image','vw-gardening-landscaping-pro'),
    'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team',
    'settings' => 'vw_gardening_landscaping_pro_our_team_bgimage'
  )));
                     //Work Column Layout
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_team_bgimage_setting', array(
      'default'         => 'vw-fixed',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_team_bgimage_setting', array(
      'type'      => 'radio',
      'label'     => __('Choose image option', 'vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_our_team',
      'choices'   => array(
        'vw-fixed'      => __( 'Fixed', 'vw-gardening-landscaping-pro' ),
        'vw-scroll'      => __( 'Scroll', 'vw-gardening-landscaping-pro' ),                    
  ),)); 
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_team_content_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_team_content_settings',
    array(
    'label' => __('Section Content Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_team_small_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_team_small_heading',array(
    'label' => __('Section Small Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team',
    'setting' => 'vw_gardening_landscaping_pro_our_team_small_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_team_small_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_team_small_heading_color', array(
    'label' => __('Small Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team',
    'settings' => 'vw_gardening_landscaping_pro_our_team_small_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_team_small_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_team_small_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_team',
    'label'    => __('Small Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_team_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_team_heading',array(
    'label' => __('Section Main Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team',
    'setting' => 'vw_gardening_landscaping_pro_our_team_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_team_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_team_heading_color', array(
    'label' => __('Section Main Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team',
    'settings' => 'vw_gardening_landscaping_pro_our_team_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_team_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_team_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_team',
    'label'    => __('Section Main Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_team_number',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_team_number',array(
    'label' => __('No Of Teams To Show','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team',
    'setting' => 'vw_gardening_landscaping_pro_our_team_number',
    'type'    => 'number'
  ));
  $count =  get_theme_mod('vw_gardening_landscaping_pro_testimonial_number');
  for($i=1; $i<=$count; $i++) {
    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_team_image_alt_text'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_team_image_alt_text'.$i,array(
      'label' => __('Teams Image Alt Text ','vw-gardening-landscaping-pro').$i,
      'description' => esc_html( 'This is image text for image alt attribute.This text is only for coding purpose.' ),
      'section' => 'vw_gardening_landscaping_pro_our_team',
      'setting' => 'vw_gardening_landscaping_pro_our_team_image_alt_text'.$i,
      'type'  => 'text'
    ));
  }

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_team_content_color_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_team_content_color_settings',
    array(
    'label' => __('Section Content Color And Font Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_team_title_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_team_title_color', array(
    'label' => __('Team Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team',
    'settings' => 'vw_gardening_landscaping_pro_our_team_title_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_team_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_team_title_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_team',
    'label'    => __('Team Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_team_desig_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_team_desig_color', array(
    'label' => __('Team Designation Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team',
    'settings' => 'vw_gardening_landscaping_pro_our_team_desig_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_team_desig_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_team_desig_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_team',
    'label'    => __('Team Designation Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_team_icon_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_team_icon_color', array(
    'label' => __('Team Social Icon Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team',
    'settings' => 'vw_gardening_landscaping_pro_our_team_icon_color',
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_team_icon_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_team_icon_bgcolor', array(
    'label' => __('Team Social Icon Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_team',
    'settings' => 'vw_gardening_landscaping_pro_our_team_icon_bgcolor',
  )));

  // ------------ Why Choose Us ---------------

  $wp_customize->add_section('vw_gardening_landscaping_pro_why_choose_us',array(
    'title' => __('Why Choose Us','vw-gardening-landscaping-pro'),
    'description' => __('Add Content Here','vw-gardening-landscaping-pro'),
    'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_why_choose_us_enable',
      array(
      'default' => 'Enable',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_why_choose_us_enable',
    array(
    'type' => 'radio',
    'label' => __('Do you want this section', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us',
    'choices' => array(
    'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
    'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
  ),));

  $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_why_choose_us_enable', array(
    'selector' => '#why-choose-us .container',
    'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_why_choose_us_enable',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_why_choose_us_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_why_choose_us_settings',
    array(
    'label' => __('Section Background Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us'
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_why_choose_us_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_why_choose_us_bgcolor', array(
    'label' => __('Section Background Color', 'vw-gardening-landscaping-pro'),
    'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us',
    'settings' => 'vw_gardening_landscaping_pro_why_choose_us_bgcolor',
  )));
  
  $wp_customize->add_setting('vw_gardening_landscaping_pro_why_choose_us_bgimage',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_why_choose_us_bgimage',array(
    'label' => __('Section Background Image','vw-gardening-landscaping-pro'),
    'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us',
    'settings' => 'vw_gardening_landscaping_pro_why_choose_us_bgimage'
  )));
                       //Work Column Layout
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_why_choose_us_bgimage_setting', array(
      'default'         => 'vw-fixed',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_why_choose_us_bgimage_setting', array(
      'type'      => 'radio',
      'label'     => __('Choose image option', 'vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_why_choose_us',
      'choices'   => array(
        'vw-fixed'      => __( 'Fixed', 'vw-gardening-landscaping-pro' ),
        'vw-scroll'      => __( 'Scroll', 'vw-gardening-landscaping-pro' ),                    
  ),)); 
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_why_choose_us_content_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_why_choose_us_content_settings',
    array(
    'label' => __('Section Content Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_why_choose_us_small_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_why_choose_us_small_heading',array(
    'label' => __('Section Small Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us',
    'setting' => 'vw_gardening_landscaping_pro_why_choose_us_small_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_why_choose_us_small_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_why_choose_us_small_heading_color', array(
    'label' => __('Small Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us',
    'settings' => 'vw_gardening_landscaping_pro_why_choose_us_small_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_why_choose_us_small_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_why_choose_us_small_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_why_choose_us',
    'label'    => __('Small Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_why_choose_us_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_why_choose_us_heading',array(
    'label' => __('Section Main Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us',
    'setting' => 'vw_gardening_landscaping_pro_why_choose_us_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_why_choose_us_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_why_choose_us_heading_color', array(
    'label' => __('Section Main Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us',
    'settings' => 'vw_gardening_landscaping_pro_why_choose_us_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_why_choose_us_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_why_choose_us_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_why_choose_us',
    'label'    => __('Section Main Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_why_choose_us_number',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_why_choose_us_number',array(
    'label' => __('No Of Features To Show','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us',
    'setting' => 'vw_gardening_landscaping_pro_why_choose_us_number',
    'type'    => 'number'
  ));

  $why_count=get_theme_mod('vw_gardening_landscaping_pro_why_choose_us_number');
  for($i=1;$i<=$why_count;$i++)
  {
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_why_choose_us_feature_settings'.$i,
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_why_choose_us_feature_settings'.$i,
      array(
      'label' => __('Feature ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_why_choose_us'
    )));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_why_choose_us_feature_title'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_why_choose_us_feature_title'.$i,array(
      'label' => __('Feature Title ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_why_choose_us',
      'setting' => 'vw_gardening_landscaping_pro_why_choose_us_feature_title'.$i,
      'type'    => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_why_choose_us_feature_title_url'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_why_choose_us_feature_title_url'.$i,array(
      'label' => __('Feature Title Url ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_why_choose_us',
      'setting' => 'vw_gardening_landscaping_pro_why_choose_us_feature_title_url'.$i,
      'type'    => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_why_choose_us_feature_text'.$i,array(
      'default' => '',
      'capability'         => 'edit_theme_options',
        'sanitize_callback'  => 'wp_kses_post'
    ));
    $wp_customize->add_control(new vw_gardening_landscaping_pro_Editor_Control($wp_customize,'vw_gardening_landscaping_pro_why_choose_us_feature_text'.$i,array(
      'label' => __('Feature Text ','vw-gardening-landscaping-pro').$i,
      'section' => 'vw_gardening_landscaping_pro_why_choose_us',
      'setting' => 'vw_gardening_landscaping_pro_why_choose_us_feature_text'.$i,
    )));

    $wp_customize->add_setting(
      'vw_gardening_landscaping_pro_why_choose_us_feature_icon'.$i,
        array(
          'default' => '',
          'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control(
        new vw_gardening_landscaping_pro_Fontawesome_Icon_Chooser(
          $wp_customize,
          'vw_gardening_landscaping_pro_why_choose_us_feature_icon'.$i,
          array(
            'settings'    => 'vw_gardening_landscaping_pro_why_choose_us_feature_icon'.$i,
            'section'   => 'vw_gardening_landscaping_pro_why_choose_us',
            'type'      => 'icon',
            'label'     => esc_html__( 'Choose Icon ', 'vw-gardening-landscaping-pro' ).$i,
          )
        )
    );
  }

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_why_choose_us_content_color_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_why_choose_us_content_color_settings',
    array(
    'label' => __('Section Content Color And Font Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_why_choose_us_feature_title_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_why_choose_us_feature_title_color', array(
    'label' => __('Feature Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us',
    'settings' => 'vw_gardening_landscaping_pro_why_choose_us_feature_title_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_why_choose_us_feature_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_why_choose_us_feature_title_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_why_choose_us',
    'label'    => __('Feature Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_why_choose_us_feature_text_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_why_choose_us_feature_text_color', array(
    'label' => __('Feature Text Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us',
    'settings' => 'vw_gardening_landscaping_pro_why_choose_us_feature_text_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_why_choose_us_feature_text_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_why_choose_us_feature_text_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_why_choose_us',
    'label'    => __('Feature Text Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_why_choose_us_feature_icon_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_why_choose_us_feature_icon_color', array(
    'label' => __('Feature Icon Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us',
    'settings' => 'vw_gardening_landscaping_pro_why_choose_us_feature_icon_color',
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_why_choose_us_feature_icon_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_why_choose_us_feature_icon_bgcolor', array(
    'label' => __('Feature Icon Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us',
    'settings' => 'vw_gardening_landscaping_pro_why_choose_us_feature_icon_bgcolor',
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_why_choose_us_feature_box_border_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_why_choose_us_feature_box_border_color', array(
    'label' => __('Feature Box Border Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us',
    'settings' => 'vw_gardening_landscaping_pro_why_choose_us_feature_box_border_color',
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_why_choose_us_feature_box_hover_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_why_choose_us_feature_box_hover_bgcolor', array(
    'label' => __('Feature Box Hover Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_why_choose_us',
    'settings' => 'vw_gardening_landscaping_pro_why_choose_us_feature_box_hover_bgcolor',
  )));

  // --------------- Our Blog -------------

  $wp_customize->add_section('vw_gardening_landscaping_pro_our_blog',array(
    'title' => __('Our Blog','vw-gardening-landscaping-pro'),
    'description' => __('Add Blog Content Here','vw-gardening-landscaping-pro'),
    'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_youtube_link', array(
      'default'   => '',
      'sanitize_callback' => 'esc_url_raw',
  ) );
  $wp_customize->add_control( new VW_Button_Custom_Content( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_youtube_link', array(
        'section' => 'vw_gardening_landscaping_pro_our_blog',
        'label' => __( 'Youtube Video', 'vw-gardening-landscaping-pro' ),
        'description' => __( 'Watch our youtube video for How to Create a New Post in WordPress.', 'vw-gardening-landscaping-pro' ),
        'content' => sprintf( __( 'Check the button %1$sWatch Now%2$s', 'vw-gardening-landscaping-pro' ), '<a href="' . esc_url( VW_GARDENING_LANDSCAPING_PRO_BLOG_YOUTUBE_LINK) . '" class="button button-secondary alignright review_st" target="_blank">', '</a>' ),
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_enable',
      array(
      'default' => 'Enable',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_blog_enable',
    array(
    'type' => 'radio',
    'label' => __('Do you want this section', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'choices' => array(
    'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
    'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
  ),));

  $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_our_blog_enable', array(
    'selector' => '#our-blog .container',
    'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_our_blog_enable',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_settings',
    array(
    'label' => __('Section Background Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog'
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_bgcolor', array(
    'label' => __('Section Background Color', 'vw-gardening-landscaping-pro'),
    'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'settings' => 'vw_gardening_landscaping_pro_our_blog_bgcolor',
  )));
  
  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_bgimage',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_our_blog_bgimage',array(
    'label' => __('Section Background Image','vw-gardening-landscaping-pro'),
    'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'settings' => 'vw_gardening_landscaping_pro_our_blog_bgimage'
  )));
                         //Work Column Layout
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_bgimage_setting', array(
      'default'         => '',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_blog_bgimage_setting', array(
      'type'      => 'radio',
      'label'     => __('Choose image option', 'vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_our_blog',
      'choices'   => array(
        'vw-fixed'      => __( 'Fixed', 'vw-gardening-landscaping-pro' ),
        'vw-scroll'      => __( 'Scroll', 'vw-gardening-landscaping-pro' ),                    
  ),)); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_content_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_content_settings',
    array(
    'label' => __('Section Content Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_small_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_blog_small_heading',array(
    'label' => __('Section Small Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'setting' => 'vw_gardening_landscaping_pro_our_blog_small_heading',
    'type'    => 'text'
  )); 
 $wp_customize->add_setting( 'vw_gardening_landscaping_pro_blog_excerpt_no',
    array(
      'default' => 12,
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new vw_gardening_landscaping_pro_Slider_Custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_blog_excerpt_no',
      array(
        'label' => __( 'Blog Excerpt Number (Limit 50 Words)', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_our_blog',
        'input_attrs' => array(
          'min' => 5, // Required. Minimum value for the slider
          'max' => 50, // Required. Maximum value for the slider
          'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
        ),
    )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_small_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_small_heading_color', array(
    'label' => __('Small Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'settings' => 'vw_gardening_landscaping_pro_our_blog_small_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_small_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_blog_small_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_blog',
    'label'    => __('Small Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_heading',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_blog_heading',array(
    'label' => __('Section Main Heading','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'setting' => 'vw_gardening_landscaping_pro_our_blog_heading',
    'type'    => 'text'
  )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_heading_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_heading_color', array(
    'label' => __('Section Main Heading Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'settings' => 'vw_gardening_landscaping_pro_our_blog_heading_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_heading_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_blog_heading_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_blog',
    'label'    => __('Section Main Heading Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_number',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_blog_number',array(
    'label' => __('No Of Blogs To Show','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'setting' => 'vw_gardening_landscaping_pro_our_blog_number',
    'type'    => 'number'
  ));
   $count =  get_theme_mod('vw_gardening_landscaping_pro_our_blog_number');
  for($i=1; $i<=$count; $i++) {
    $wp_customize->add_setting('vw_gardening_landscaping_pro_post_general_settings_post_alt_text'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_post_general_settings_post_alt_text'.$i,array(
      'label' => __('Testimonial Image Alt Text ','vw-gardening-landscaping-pro').$i,
      'description' => esc_html( 'This is image text for image alt attribute.This text is only for coding purpose.' ),
      'section' => 'vw_gardening_landscaping_pro_our_blog',
      'setting' => 'vw_gardening_landscaping_pro_post_general_settings_post_alt_text'.$i,
      'type'  => 'text'
    ));
  }
  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_link_title',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_blog_link_title',array(
    'label' => __('Blog Link Title','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'setting' => 'vw_gardening_landscaping_pro_our_blog_link_title',
    'type'    => 'text'
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_content_color_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_content_color_settings',
    array(
    'label' => __('Section Content Color And Font Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_title_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_title_color', array(
    'label' => __('Blog Title Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'settings' => 'vw_gardening_landscaping_pro_our_blog_title_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_blog_title_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_blog',
    'label'    => __('Blog Title Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_text_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_text_color', array(
    'label' => __('Blog Text Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'settings' => 'vw_gardening_landscaping_pro_our_blog_text_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_text_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_blog_text_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_blog',
    'label'    => __('Blog Text Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_meta_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_meta_color', array(
    'label' => __('Blog Meta Data Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'settings' => 'vw_gardening_landscaping_pro_our_blog_meta_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_meta_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_blog_meta_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_blog',
    'label'    => __('Blog Meta Data Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_link_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_link_color', array(
    'label' => __('Blog Link Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'settings' => 'vw_gardening_landscaping_pro_our_blog_link_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_link_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_blog_link_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_blog',
    'label'    => __('Blog Link Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_date_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_date_color', array(
    'label' => __('Blog Date Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'settings' => 'vw_gardening_landscaping_pro_our_blog_date_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_date_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_our_blog_date_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_our_blog',
    'label'    => __('Blog Date Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_date_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_date_bgcolor', array(
    'label' => __('Blog Date Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'settings' => 'vw_gardening_landscaping_pro_our_blog_date_bgcolor',
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_content_box_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_content_box_bgcolor', array(
    'label' => __('Blog Content Box Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'settings' => 'vw_gardening_landscaping_pro_our_blog_content_box_bgcolor',
  )));

  // --------------- Our Partners --------------

  $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_our_blog_partners_enable', array(
    'selector' => '#popular-courses .container',
    'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_our_blog_partners_enable',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_partners_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_partners_settings',
    array(
    'label' => __('Our Partners Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_partners_enable',
    array(
    'default' => 'Enable',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_blog_partners_enable',
    array(
    'type' => 'radio',
    'label' => __('Do you want this section', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'choices' => array(
    'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
    'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
  ),));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_partners_main_image',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_our_blog_partners_main_image',array(
    'label' => __('Section Image ','vw-gardening-landscaping-pro'),
    'description' => __('Dimension 300 * 100','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'settings' => 'vw_gardening_landscaping_pro_our_blog_partners_main_image'
  )));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_partners_main_image_alt_text',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_textarea_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_blog_partners_main_image_alt_text',array(
    'label' => __('Partners Main Image Alt Text ','vw-gardening-landscaping-pro'),
    'description' => esc_html( 'This is image text for image alt attribute.This text is only for coding purpose.' ),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'setting' => 'vw_gardening_landscaping_pro_our_blog_partners_main_image_alt_text',
    'type'  => 'text'
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_partners_number',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_blog_partners_number',array(
    'label' => __('No Of Partners To Show','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'setting' => 'vw_gardening_landscaping_pro_our_blog_partners_number',
    'type'    => 'number'
  ));

  $partners=get_theme_mod('vw_gardening_landscaping_pro_our_blog_partners_number',4);
  for($i=1;$i<=$partners;$i++)
  {
    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_partners_image'.$i,array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_our_blog_partners_image'.$i,array(
      'label' => __('Partners Image ','vw-gardening-landscaping-pro').$i,
      'description' => __('Dimension 50 * 50','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_our_blog',
      'settings' => 'vw_gardening_landscaping_pro_our_blog_partners_image'.$i
    )));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_partners_image_alt_text'.$i,array(
      'default' => '',
      'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_blog_partners_image_alt_text'.$i,array(
      'label' => __('Partners Image Alt Text ','vw-gardening-landscaping-pro'),
      'description' => esc_html( 'This is image text for image alt attribute.This text is only for coding purpose.' ),
      'section' => 'vw_gardening_landscaping_pro_our_blog',
      'setting' => 'vw_gardening_landscaping_pro_our_blog_partners_image_alt_text'.$i,
      'type'  => 'text'
    ));
  }
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_our_blog_partner_box_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_our_blog_partner_box_bgcolor', array(
    'label' => __('Partners Box Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_our_blog',
    'settings' => 'vw_gardening_landscaping_pro_our_blog_partner_box_bgcolor',
  )));
  
  //gallery section
  $wp_customize->add_section('vw_gardening_landscaping_pro_gallery',array(
    'title' => __('Gallery','vw-gardening-landscaping-pro'),
    'description' => __('Add Gallery Here','vw-gardening-landscaping-pro'),
    'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_gallery_youtube_link', array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
  ) );
  $wp_customize->add_control( new VW_Button_Custom_Content( $wp_customize, 'vw_gardening_landscaping_pro_gallery_youtube_link', array(
      'section' => 'vw_gardening_landscaping_pro_gallery',
      'label' => __( 'Youtube Video', 'vw-gardening-landscaping-pro' ),
      'description' => __( 'Watch our youtube video for installing VW Gallery plugin and create gallery in WordPress.', 'vw-gardening-landscaping-pro' ),
      'content' => sprintf( __( 'Check the button %1$sWatch Now%2$s', 'vw-gardening-landscaping-pro' ), '<a href="' . esc_url( VW_GARDENING_LANDSCAPING_PRO_GALLERY_YOUTUBE_LINK) . '" class="button button-secondary alignright review_st" target="_blank">', '</a>' ),
  )));

  if ( !defined( 'VW_GALLERY_IMAGES_VERSION' ) ) { 

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_buy_gallery_plugin', array(
      'default'   => '',
      'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new VW_Button_Custom_Content( $wp_customize, 'vw_gardening_landscaping_pro_buy_gallery_plugin', array(
        'section' => 'vw_gardening_landscaping_pro_gallery',
        'label' => __( 'VW Gallery Plugin', 'vw-gardening-landscaping-pro' ),
        'description' => __( 'For adding a creative gallery buy our VW Gallery Plugin', 'vw-gardening-landscaping-pro' ),
        'content' => sprintf( __( 'Check the button %1$sWatch Now%2$s', 'vw-gardening-landscaping-pro' ), '<a href="' . esc_url( VW_GARDENING_LANDSCAPING_PRO_GALLERY_PLUGIN) . '" class="button button-secondary alignright review_st" target="_blank">', '</a>' ),
    )));

  } else{

    $wp_customize->add_setting('vw_gardening_landscaping_pro_gallery_shortcode',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
      )
    );
    $wp_customize->add_control('vw_gardening_landscaping_pro_gallery_shortcode',array(
        'label' => __('Shortcode','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_gallery',
        'description' => __('Gallery Shortcode [vw-galleryshow vw_gallery="48" numberofitem="8" bootstraponecolsize="3"]', 'vw-gardening-landscaping-pro'),
        'setting' => 'vw_gardening_landscaping_pro_gallery_shortcode',
        'type'    => 'text'
      )
    );
  }

  // --------------- Post General Settings ---------------
  $wp_customize->add_section('vw_gardening_landscaping_pro_post_general_settings',array(
    'title' => __('Post Settings','vw-gardening-landscaping-pro'),
    'description'   => __('Change Your Setting','vw-gardening-landscaping-pro'),
    'priority'  => null,
    'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_post_general_settings_post_date',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
  ));
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_post_general_settings_post_date',
     array(
        'label' => esc_html__( 'Show or Hide Post Date', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_post_general_settings'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_post_general_settings_post_comments',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
  ));
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_post_general_settings_post_comments',
     array(
        'label' => esc_html__( 'Show or Hide Comments', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_post_general_settings'
     )
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_post_general_settings_post_author', array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
  ));
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_post_general_settings_post_author',
     array(
        'label' => esc_html__( 'Show or Hide Author', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_post_general_settings'
     )
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_post_general_settings_post_share',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
  ));
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_post_general_settings_post_share',
     array(
        'label' => esc_html__( 'Show or Hide Share Icons', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_post_general_settings'
     )
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_post_general_settings_post_share_facebook',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
  ));
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_post_general_settings_post_share_facebook',
     array(
        'label' => esc_html__( 'Post Share Facebook', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_post_general_settings'
     )
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_post_general_settings_post_share_linkedin',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
  ));
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_post_general_settings_post_share_linkedin',
     array(
        'label' => esc_html__( 'Post Share Linkedin', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_post_general_settings'
     )
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_post_general_settings_post_share_twitter',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
  ));
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_post_general_settings_post_share_twitter',
     array(
        'label' => esc_html__( 'Post Share Twitter', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_post_general_settings'
     )
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_post_general_settings_post_category',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
   )
  );
 
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_post_general_settings_post_category',
     array(
        'label' => esc_html__( 'Show or Hide Category', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_post_general_settings'
     )
  ));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_post_general_settings_post_sidebar',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
   )
  );
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_post_general_settings_post_sidebar',
     array(
        'label' => esc_html__( 'Show or Hide Sidebar', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_post_general_settings'
     )
  ));
  //Page Title layout
  $wp_customize->add_setting('vw_gardening_landscaping_pro_page_title_content_option',array(
        'default' => __('Left','vw-gardening-landscaping-pro'),
        'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control(new vw_gardening_landscaping_pro_Image_Radio_Control($wp_customize, 'vw_gardening_landscaping_pro_page_title_content_option', array(
        'type' => 'select',
        'label' => __('Page Title Layouts','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_post_general_settings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/header-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/header-layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/header-layout3.png',
  ))));
  //Blog layout
  $wp_customize->add_setting('vw_gardening_landscaping_pro_single_blog_option',array(
        'default' => __('two_col','vw-gardening-landscaping-pro'),
        'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_single_blog_option',array(
        'type' => 'select',
        'label' => __('Post Layout','vw-gardening-landscaping-pro'),
        'description' => __('Here you can change the Posts layout for Blog Pages. ','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_post_general_settings',
        'choices' => array(
            'one_col' => __('One Columns','vw-gardening-landscaping-pro'),
            'two_col' => __('Two Columns','vw-gardening-landscaping-pro'),
            'three_col' => __('Three Column','vw-gardening-landscaping-pro')
        ),
  ));

  // Featured iMage setting
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_feature_image_settings',
  array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_feature_image_settings',
  array(
    'label' => __('Featured Image Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_post_general_settings'
  )));
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_blog_featured_image_enable',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_blog_featured_image_enable',
         array(
            'label' => esc_html__( 'Hide/show featured image', 'vw-gardening-landscaping-pro' ),
            'section' => 'vw_gardening_landscaping_pro_post_general_settings'
    )));
    //
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_blog_featured_image_border_radius', array(
        'default'              => "",
        'type'                 => 'theme_mod',
        'transport'        => 'refresh',
        'sanitize_callback'    => 'absint',
        'sanitize_js_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'vw_gardening_landscaping_pro_blog_featured_image_border_radius', array(
        'label'       => esc_html__( 'Featured Image Border Radius','vw-gardening-landscaping-pro' ),
        'section'     => 'vw_gardening_landscaping_pro_post_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
          'step'             => 1,
          'min'              => 1,
          'max'              => 50,
    ),) );
    $wp_customize->add_setting('vw_gardening_landscaping_pro_blog_featured_image_box_shadow',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_blog_featured_image_box_shadow',array(
        'label' => __('Featured Image Box Shadow in px','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_post_general_settings',
        'type'      => 'text'
    )); 

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_related_posts_setting',array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_related_posts_setting',
      array(
      'label' => __('Related Post Settings','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_post_general_settings'
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_related_posts',array(
    'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
  ));  
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_related_posts',array(
      'label' => esc_html__( 'Enable / Disable Related Posts','vw-gardening-landscaping-pro' ),
      'section' => 'vw_gardening_landscaping_pro_post_general_settings'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_related_posts_title',array(
     'default' => 'Related Posts',
     'sanitize_callback'  => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_related_posts_title',array(
     'type' => 'text',
     'label' => __('Related Posts Title','vw-gardening-landscaping-pro'),
     'section' => 'vw_gardening_landscaping_pro_post_general_settings'
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_post_general_settings_post_comment_form',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
  ));
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_post_general_settings_post_comment_form',
     array(
        'label' => esc_html__( 'Show or Hide Comment Form', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_post_general_settings'
  )));

  /* --------- General Settings  ----------- */
  $wp_customize->add_section('vw_gardening_landscaping_pro_general_settings',array(
    'title' => __('General Settings','vw-gardening-landscaping-pro'),
    'description'   => __('Change Your Setting','vw-gardening-landscaping-pro'),
    'priority'  => null,
    'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_products_shop_page_sidebar',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
  ));
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_products_shop_page_sidebar',
     array(
        'label' => esc_html__( 'Hide Shop Page Sidebar', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gar dening_landscaping_pro_general_settings'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_products_single_page_sidebar',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
  ));
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_products_single_page_sidebar',
     array(
        'label' => esc_html__( 'Hide Product Page Sidebar', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_general_settings'
  )));
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_products_spinner_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_products_spinner_settings',
    array(
    'label' => __('Spinner Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_general_settings'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_products_spinner_enable',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
  ));
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_products_spinner_enable',
     array(
        'label' => esc_html__( 'Spinner Enable/Disable', 'vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_general_settings'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_products_spinner_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_products_spinner_bgcolor', array(
    'label' => __('Spinner Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_general_settings',
    'settings' => 'vw_gardening_landscaping_pro_products_spinner_bgcolor',
  )));

  /* --------- Spinner Opacity  ----------- */
  $wp_customize->add_setting('vw_gardening_landscaping_pro_spinner_opacity_color',array(
      'default'              => '1',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control( 'vw_gardening_landscaping_pro_spinner_opacity_color', array(
    'label'       => esc_html__( 'Spinner Loader Opacity','vw-gardening-landscaping-pro' ),
    'section'     => 'vw_gardening_landscaping_pro_general_settings',
    'type'        => 'select',
    'settings'    => 'vw_gardening_landscaping_pro_spinner_opacity_color',
    'choices' => array(
        '0' =>  esc_attr('0','vw-gardening-landscaping-pro'),
        '0.1' =>  esc_attr('0.1','vw-gardening-landscaping-pro'),
        '0.2' =>  esc_attr('0.2','vw-gardening-landscaping-pro'),
        '0.3' =>  esc_attr('0.3','vw-gardening-landscaping-pro'),
        '0.4' =>  esc_attr('0.4','vw-gardening-landscaping-pro'),
        '0.5' =>  esc_attr('0.5','vw-gardening-landscaping-pro'),
        '0.6' =>  esc_attr('0.6','vw-gardening-landscaping-pro'),
        '0.7' =>  esc_attr('0.7','vw-gardening-landscaping-pro'),
        '0.8' =>  esc_attr('0.8','vw-gardening-landscaping-pro'),
        '0.9' =>  esc_attr('0.9','vw-gardening-landscaping-pro'),
        '1' =>  esc_attr('1','vw-gardening-landscaping-pro')
    ),
  ));

  /* --------- Scroll Top  ----------- */
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_general_settings_scroll_top',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_general_settings_scroll_top',array(
    'label' => __('Scroll Top Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_general_settings'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_genral_section_show_scroll_top',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
  ));
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_genral_section_show_scroll_top',
         array(
            'label' => esc_html__( 'Show or Hide Scroll Top', 'vw-gardening-landscaping-pro' ),
            'section' => 'vw_gardening_landscaping_pro_general_settings'
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_general_scroll_top_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_general_scroll_top_bgcolor', array(
    'label' => __('Scroll Top Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_general_settings',
    'settings' => 'vw_gardening_landscaping_pro_general_scroll_top_bgcolor',
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_general_scroll_top_hover_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_general_scroll_top_hover_bgcolor', array(
    'label' => __('Scroll Top Hover Background Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_general_settings',
    'settings' => 'vw_gardening_landscaping_pro_general_scroll_top_hover_bgcolor',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_scroll_top_layout',array(
        'default' => __('Right','vw-gardening-landscaping-pro'),
        'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control(new vw_gardening_landscaping_pro_Image_Radio_Control($wp_customize, 'vw_gardening_landscaping_pro_scroll_top_layout', array(
        'type' => 'select',
        'label' => __('Scroll Top Layouts','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_general_settings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/header-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/header-layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/header-layout3.png',
  ))));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_scroll_top_icon_width',array(
      'default'   => '',
      'sanitize_callback' => 'sanitize_textarea_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_scroll_top_icon_width',array(
      'label' => __('Scroll Top Icon Width','vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_general_settings',
      'type'      => 'number'
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_scroll_top_icon_height',array(
      'default'   => '',
      'sanitize_callback' => 'sanitize_textarea_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_scroll_top_icon_height',array(
      'label' => __('Scroll Top Icon Height','vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_general_settings',
      'type'      => 'number'
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_scroll_top_icon_border_radius',array(
      'default'   => '',
      'sanitize_callback' => 'sanitize_textarea_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_scroll_top_icon_border_radius',array(
      'label' => __('Scroll Top Icon Border Radius','vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_general_settings',
      'type'      => 'number'
  ));

  /* --------- Body Frame  ----------- */
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_site_frame_settings',
    array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_site_frame_settings',
    array(
    'label' => __('Site Frame Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_general_settings'
  )));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_site_frame_width',array(
      'default'   => '',
      'sanitize_callback' => 'sanitize_textarea_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_site_frame_width',array(
      'label' => __('Frame Width','vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_general_settings',
      'type'      => 'number'
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_site_frame_type',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_site_frame_type',array(
        'type' => 'select',
        'label' => __('Frame Type','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_general_settings',
        'choices' => array(
            '' => '',
            'solid' => __('Solid','vw-gardening-landscaping-pro'),
            'dashed' => __('Dashed','vw-gardening-landscaping-pro'),
            'double' => __('Double','vw-gardening-landscaping-pro'),
            'groove' => __('Groove','vw-gardening-landscaping-pro'),
            'ridge' => __('Ridge','vw-gardening-landscaping-pro'),
            'inset' => __('Inset','vw-gardening-landscaping-pro')
        ),  
   ) );

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_site_frame_color', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_site_frame_color', array(
      'label' => __('Frame Color', 'vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_general_settings',
      'settings' => 'vw_gardening_landscaping_pro_site_frame_color',
  )));  

   // ----------- Social Icon Setting -------------

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_social_icon_setting',array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_social_icon_setting',
        array(
        'label' => __('Social Icon Settings','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_general_settings'
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_social_icon_width',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_social_icon_width',array(
        'label' => __('Social Icon Width','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_social_icon_height',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_social_icon_height',array(
        'label' => __('Social Icon Height','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_social_icon_border_radius',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_social_icon_border_radius',array(
        'label' => __('Social Icon Border Radius','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_social_icon_padding',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_social_icon_padding',array(
        'label' => __('Social Icon Padding','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_social_icon_bgcolor', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_social_icon_bgcolor', array(
        'label' => __('Social Icon Background Color', 'vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_general_settings',
        'settings' => 'vw_gardening_landscaping_pro_social_icon_bgcolor',
    )));   

    // -----------Woocommerce Product settings-------------------
    $wp_customize->add_section('vw_gardening_landscaping_pro_woocom_product_setting',array(
        'title' => __('Woocommerce Product Settings','vw-gardening-landscaping-pro'),
        'panel' => 'vw_gardening_landscaping_pro_panel_id',
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_product_sale_left_right_padding',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_product_sale_left_right_padding',array(
        'label' => __('Product Sale Left Right Padding','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_woocom_product_setting',
        'type'      => 'number'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_product_sale_top_bottom_padding',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_product_sale_top_bottom_padding',array(
        'label' => __('Product Sale Top Bottom Padding','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_woocom_product_setting',
        'type'      => 'number'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_product_sale_border_radius',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_product_sale_border_radius',array(
        'label' => __('Product Sale Border Radius','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_woocom_product_setting',
        'type'      => 'number'
    ));

?>