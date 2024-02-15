<?php
	// ------------- Topbar ----------------
	$wp_customize->add_section('vw_gardening_landscaping_pro_topbar_section',array(
		'title'	=> __('Topbar','vw-gardening-landscaping-pro'),
		'description'	=> __('Topbar Settings','vw-gardening-landscaping-pro'),
		'priority'	=> null,
		'panel' => 'vw_gardening_landscaping_pro_panel_id',
	));

	$wp_customize->add_setting('vw_gardening_landscaping_pro_topbar_section_enable',
	    array(
      'default' => 'Enable',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
	));
	$wp_customize->add_control('vw_gardening_landscaping_pro_topbar_section_enable',
    array(
	    'type' => 'radio',
	    'label' => __('Do you want this section', 'vw-gardening-landscaping-pro'),
	    'section' => 'vw_gardening_landscaping_pro_topbar_section',
	    'choices' => array(
	    'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
	    'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
    ),));

    $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_topbar_section_enable', array(
	    'selector' => '#topbar-social-search .container',
	    'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_topbar_section_enable',
	));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_header_search_toggle',array(
        'default' => 'true',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_header_search_toggle',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Search','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_topbar_section',
    ));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_topbar_section_back_settings',
    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
	));
	$wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_topbar_section_back_settings',
	    array(
	    'label' => __('Section Background Settings','vw-gardening-landscaping-pro'),
	    'section' => 'vw_gardening_landscaping_pro_topbar_section'
	)));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_topbar_section_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_topbar_section_bgcolor', array(
		'label' => __('Section Background Color', 'vw-gardening-landscaping-pro'),
    	'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_topbar_section',
		'settings' => 'vw_gardening_landscaping_pro_topbar_section_bgcolor',
	)));
  
	$wp_customize->add_setting('vw_gardening_landscaping_pro_topbar_section_bgimage',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_topbar_section_bgimage',array(
	    'label' => __('Section Background Image','vw-gardening-landscaping-pro'),
	    'description' => __('Dimension 1600 * 100','vw-gardening-landscaping-pro'),
	    'section' => 'vw_gardening_landscaping_pro_topbar_section',
	    'settings' => 'vw_gardening_landscaping_pro_topbar_section_bgimage'
	)));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_topbar_section_text_settings',
    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
	));
	$wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_topbar_section_text_settings',
	    array(
	    'label' => __('Section Content Settings','vw-gardening-landscaping-pro'),
	    'section' => 'vw_gardening_landscaping_pro_topbar_section'
	)));

	// time
	$wp_customize->add_setting(
    'vw_gardening_landscaping_pro_topbar_section_time_icon',
	    array(
	      'default' => 'far fa-clock',
	      'sanitize_callback' => 'sanitize_text_field'
	    )
	);
	$wp_customize->add_control(
	    new vw_gardening_landscaping_pro_Fontawesome_Icon_Chooser(
	      $wp_customize,
	      'vw_gardening_landscaping_pro_topbar_section_time_icon',
	      array(
	        'settings'    => 'vw_gardening_landscaping_pro_topbar_section_time_icon',
	        'section'   => 'vw_gardening_landscaping_pro_topbar_section',
	        'type'      => 'icon',
	        'label'     => esc_html__( 'Time Icon', 'vw-gardening-landscaping-pro' ),
        	'active_callback' => 'vw_gardening_landscaping_pro_show_timming'
	      )
	    )
	);

	$wp_customize->add_setting('vw_gardening_landscaping_pro_timming',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
		'priority' => null
	));
	$wp_customize->add_control('vw_gardening_landscaping_pro_timming',array(
		'label'	=> __('Add Timing','vw-gardening-landscaping-pro'),
		'input_attrs' => array(
	        'placeholder' => __( 'Mon-Fri: 9am to 7pm / Sat: 9am to 4pm', 'vw-gardening-landscaping-pro' ),
	    ),
		'section'=> 'vw_gardening_landscaping_pro_topbar_section',
		'type'=> 'text',
        'active_callback' => 'vw_gardening_landscaping_pro_show_timming'
	));

	// Phone
	$wp_customize->add_setting('vw_gardening_landscaping_pro_topbar_contact_options',array(
        'default' => 'Call',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_topbar_contact_options',array(
        'type' => 'select',
        'label' => __('Call Option','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_topbar_section',
        'choices' => array(
            'Call' => __('Phone Call','vw-gardening-landscaping-pro'),
            'Whatsapp' => __('Whatsapp Call','vw-gardening-landscaping-pro')
        ),
    ) );
    $call_lable = 'Choose Phone icon';$phone_lable = 'Phone Number'; 
    if(get_theme_mod('vw_gardening_landscaping_pro_contact_option') == 'Call' ) {
        $call_lable = 'Choose Phone icon';
        $phone_lable = 'Phone Number';        
    }else{ 
        $call_lable = 'Choose Whatsapp icon';
        $phone_lable = 'Whatsapp Number';  
    }
	$wp_customize->add_setting(
    'vw_gardening_landscaping_pro_topbar_section_phone_icon',
	    array(
	      'default' => '',
	      'sanitize_callback' => 'sanitize_text_field'
	    )
	);
	$wp_customize->add_control(
	    new vw_gardening_landscaping_pro_Fontawesome_Icon_Chooser(
	      $wp_customize,
	      'vw_gardening_landscaping_pro_topbar_section_phone_icon',
	      array(
	        'settings'    => 'vw_gardening_landscaping_pro_topbar_section_phone_icon',
	        'section'   => 'vw_gardening_landscaping_pro_topbar_section',
	        'type'      => 'icon',
	        'label'     => esc_html__( $call_lable,'vw-gardening-landscaping-pro' ),
	      )
	    )
	);

	$wp_customize->add_setting('vw_gardening_landscaping_pro_topbar_section_phone_no_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_gardening_landscaping_pro_topbar_section_phone_no_title',array(
		'label'	=> __('Add Phone Text','vw-gardening-landscaping-pro'),
		'section'	=> 'vw_gardening_landscaping_pro_topbar_section',
		'setting'	=> 'vw_gardening_landscaping_pro_topbar_section_phone_no_title',
		'type'		=> 'text'
	));	
	$wp_customize->add_setting('vw_gardening_landscaping_pro_topbar_section_phone_no',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_gardening_landscaping_pro_topbar_section_phone_no',array(
		'label'	=> __($phone_lable,'vw-gardening-landscaping-pro'),
		'section'	=> 'vw_gardening_landscaping_pro_topbar_section',
		'setting'	=> 'vw_gardening_landscaping_pro_topbar_section_phone_no',
		'type'		=> 'text'
	));	
	// Emails
	$wp_customize->add_setting(
    'vw_gardening_landscaping_pro_topbar_section_email_icon',
	    array(
	      'default' => 'far fa-envelope-open',
	      'sanitize_callback' => 'sanitize_text_field'
	    )
	);
	$wp_customize->add_control(
	    new vw_gardening_landscaping_pro_Fontawesome_Icon_Chooser(
	      $wp_customize,
	      'vw_gardening_landscaping_pro_topbar_section_email_icon',
	      array(
	        'settings'    => 'vw_gardening_landscaping_pro_topbar_section_email_icon',
	        'section'   => 'vw_gardening_landscaping_pro_topbar_section',
	        'type'      => 'icon',
	        'label'     => esc_html__( 'Email Icon', 'vw-gardening-landscaping-pro' ),
	      )
	    )
	);
	$wp_customize->add_setting('vw_gardening_landscaping_pro_topbar_section_email_id',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_gardening_landscaping_pro_topbar_section_email_id',array(
		'label'	=> __('Add Email Address','vw-gardening-landscaping-pro'),
		'section'	=> 'vw_gardening_landscaping_pro_topbar_section',
		'setting'	=> 'vw_gardening_landscaping_pro_topbar_section_email_id',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_topbar_section_color_settings',
    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
	));
	$wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_topbar_section_color_settings',
	    array(
	    'label' => __('Section Content Color and Font Settings','vw-gardening-landscaping-pro'),
	    'section' => 'vw_gardening_landscaping_pro_topbar_section'
	)));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_topbar_section_contact_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_topbar_section_contact_text_color', array(
		'label' => __('Topbar Text Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_topbar_section',
		'settings' => 'vw_gardening_landscaping_pro_topbar_section_contact_text_color',
	)));

	$wp_customize->add_setting('vw_gardening_landscaping_pro_topbar_section_contact_text_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(
	    'vw_gardening_landscaping_pro_topbar_section_contact_text_font_family', array(
	    'section'  => 'vw_gardening_landscaping_pro_topbar_section',
	    'label'    => __('Topbar Text Font Family','vw-gardening-landscaping-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_topbar_section_socila_icon_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_topbar_section_socila_icon_color', array(
		'label' => __('Social Icon Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_topbar_section',
		'settings' => 'vw_gardening_landscaping_pro_topbar_section_socila_icon_color',
	)));
	// ------------- Search Padding Settings ----------

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_Search_setting',array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_Search_setting',
        array(
        'label' => __('Search Settings','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_topbar_section'
    )));    
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_topbar_section_contact_details_search_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_topbar_section_contact_details_search_color', array(
		'label' => __('Search Icon Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_topbar_section',
		'settings' => 'vw_gardening_landscaping_pro_topbar_section_contact_details_search_color',
	)));
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_topbar_section_contact_details_search_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_topbar_section_contact_details_search_bgcolor', array(
		'label' => __('Search Icon Background Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_topbar_section',
		'settings' => 'vw_gardening_landscaping_pro_topbar_section_contact_details_search_bgcolor',
	)));
	$wp_customize->add_setting('vw_gardening_landscaping_pro_header_search_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_header_search_font_size',array(
      'label' => __('Font Size','vw-gardening-landscaping-pro'),
      'description' => __('Add font size in px','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_topbar_section',
      'setting' => 'vw_gardening_landscaping_pro_header_search_font_size',
      'type'    => 'number'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_Search_top_bottom_padding',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_Search_top_bottom_padding',array(
        'label' => __('Search Padding Top and Bottom','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_topbar_section',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_Search_left_right_padding',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_Search_left_right_padding',array(
        'label' => __('Search Padding Left and Right','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_topbar_section',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_Search_setting_radius',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_Search_setting_radius',array(
        'label' => __('Search Border Radius','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_topbar_section',
        'type'      => 'number'
    ));
     $wp_customize->add_setting('vw_gardening_landscaping_pro_header_search_placeholder_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_header_search_placeholder_text',array(
        'label' => __('Search placeholder Text','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_topbar_section',
        'type'      => 'text'
    ));
	$wp_customize->add_setting('vw_gardening_landscaping_pro_topbar_top_bottom_padding',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_topbar_top_bottom_padding',array(
        'label' => __('Topbar Top Bottom Padding','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_topbar_section',
        'type'      => 'number'
    ));
	// --------------- Header Section ---------------
	$wp_customize->add_section('vw_gardening_landscaping_pro_header_section',array(
		'title'	=> __('Header','vw-gardening-landscaping-pro'),
		'description'	=> __('Header Settings','vw-gardening-landscaping-pro'),
		'priority'	=> null,
		'panel' => 'vw_gardening_landscaping_pro_panel_id',
	));

	$wp_customize->add_setting('vw_gardening_landscaping_main_header_layout',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_main_header_layout',array(
        'type' => 'radio',
        'label' => __('Header Layout Option','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_header_section',
        'choices' => array(
            'Default' => __('Layout 1','vw-gardening-landscaping-pro'),
            'Layout 2' => __('Layout 2','vw-gardening-landscaping-pro'),
        ),
	) );

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_menu_youtube_link', array(
	  'default'   => '',
	  'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new VW_Button_Custom_Content( $wp_customize, 'vw_gardening_landscaping_pro_menu_youtube_link', array(
	    'section' => 'vw_gardening_landscaping_pro_header_section',
	    'label' => __( 'Youtube Video', 'vw-gardening-landscaping-pro' ),
	    'description' => __( 'Watch our youtube video for how to create Menu in WordPress Website', 'vw-gardening-landscaping-pro' ),
	    'content' => sprintf( __( 'Check the button %1$sWatch Now%2$s', 'vw-gardening-landscaping-pro' ), '<a href="' . esc_url( VW_GARDENING_LANDSCAPING_PRO_MENU_YOUTUBE_LINK) . '" class="button button-secondary alignright review_st" target="_blank">', '</a>' ),
	)));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_header_sticky', array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
	));

	$wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_header_sticky', array(
		'label' => esc_html__( 'Sticky Header On/Off', 'vw-gardening-landscaping-pro' ),
		'section' => 'vw_gardening_landscaping_pro_header_section'
	)));

	$wp_customize->add_setting('vw_gardening_landscaping_pro_sticky_header_alingment',array(
		'default' => __('center','vw-gardening-landscaping-pro'),
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_gardening_landscaping_pro_Image_Radio_Control($wp_customize, 'vw_gardening_landscaping_pro_sticky_header_alingment', array(
		'type' => 'select',
		'label' => __('Sticky Header Alignment','vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'settings' => 'vw_gardening_landscaping_pro_sticky_header_alingment',
		'choices' => array(
	    'left' => get_template_directory_uri().'/assets/images/copyright1.png',
	    'center' => get_template_directory_uri().'/assets/images/copyright2.png',
	    'right' => get_template_directory_uri().'/assets/images/copyright3.png'
	))));

	$wp_customize->add_setting('vw_gardening_landscaping_pro_header_section_button_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_gardening_landscaping_pro_header_section_button_title',array(
		'label'	=> __('Button Title','vw-gardening-landscaping-pro'),
		'section'	=> 'vw_gardening_landscaping_pro_header_section',
		'setting'	=> 'vw_gardening_landscaping_pro_header_section_button_title',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_gardening_landscaping_pro_header_section_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_gardening_landscaping_pro_header_section_button_url',array(
		'label'	=> __('Button Url','vw-gardening-landscaping-pro'),
		'section'	=> 'vw_gardening_landscaping_pro_header_section',
		'setting'	=> 'vw_gardening_landscaping_pro_header_section_button_url',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_header_section_button_show',
   array(
	      'default' => 1,
	      'transport' => 'refresh',
	      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
	   )
	);
	 
	$wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_header_section_button_show',
	     array(
	        'label' => esc_html__( 'Show or Hide Button', 'vw-gardening-landscaping-pro' ),
	        'section' => 'vw_gardening_landscaping_pro_header_section'
	     )
	));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_header_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_header_title_color', array(
		'label' => __('Logo Main title Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'settings' => 'vw_gardening_landscaping_pro_header_title_color',
	)));
	$wp_customize->add_setting('vw_gardening_landscaping_pro_header_title_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(
	    'vw_gardening_landscaping_pro_header_title_font_family', array(
	    'section'  => 'vw_gardening_landscaping_pro_header_section',
	    'label'    => __('Logo Main title Font family','vw-gardening-landscaping-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_header_subtitle_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_header_subtitle_color', array(
		'label' => __('Logo Sub title Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'settings' => 'vw_gardening_landscaping_pro_header_subtitle_color',
	)));
	$wp_customize->add_setting('vw_gardening_landscaping_pro_header_subtitle_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(
	    'vw_gardening_landscaping_pro_header_subtitle_font_family', array(
	    'section'  => 'vw_gardening_landscaping_pro_header_section',
	    'label'    => __('Logo Sub title Font family','vw-gardening-landscaping-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_headerhomebg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_headerhomebg_color', array(
		'label' => __('Header Background Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'settings' => 'vw_gardening_landscaping_pro_headerhomebg_color',
	)));

	// This is Header Menu Color picker setting
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_headermenu_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_headermenu_color', array(
		'label' => __('Menu Item Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'settings' => 'vw_gardening_landscaping_pro_headermenu_color',
	)));
	//This is Header Menu FontFamily picker setting
	$wp_customize->add_setting('vw_gardening_landscaping_pro_headermenu_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_gardening_landscaping_pro_headermenu_font_family', array(
	    'section'  => 'vw_gardening_landscaping_pro_header_section',
	    'label'    => __( 'Menu Item Fonts','vw-gardening-landscaping-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_header_menuhovercolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_header_menuhovercolor', array(
		'label' => __('Menu Item Hover Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'settings' => 'vw_gardening_landscaping_pro_header_menuhovercolor',
	)));
	
	// This is Nav Dropdown Background Color picker setting
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_dropdownbg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_dropdownbg_color', array(
		'label' => __('Menu DropDown Background Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'settings' => 'vw_gardening_landscaping_pro_dropdownbg_color',
	)));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_dropdownbg_itemcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_dropdownbg_itemcolor', array(
		'label' => __('Menu DropDown Item Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'settings' => 'vw_gardening_landscaping_pro_dropdownbg_itemcolor',
	)));

	$wp_customize->add_setting('vw_gardening_landscaping_pro_dropdown_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_dropdown_font_size',array(
      'label' => __('Menu DropDown Font Size','vw-gardening-landscaping-pro'),
      'description' => __('Add font size in px','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_header_section',
      'setting' => 'vw_gardening_landscaping_pro_dropdown_font_size',
      'type'    => 'number'
    ));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_dropdownbg_item_hovercolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_dropdownbg_item_hovercolor', array(
		'label' => __('Menu DropDown Item Hover Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'settings' => 'vw_gardening_landscaping_pro_dropdownbg_item_hovercolor',
	)));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_header_menu_active_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_header_menu_active_color', array(
		'label' => __('Active Menu Item Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'settings' => 'vw_gardening_landscaping_pro_header_menu_active_color',
	)));

	$wp_customize->add_setting('vw_gardening_landscaping_pro_dropdown_letter_spacing',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
	);
	$wp_customize->add_control('vw_gardening_landscaping_pro_dropdown_letter_spacing',array(
		'label' => __('Menu DropDown Item Letter Spacing','vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'setting' => 'vw_gardening_landscaping_pro_dropdown_letter_spacing',
		'type'    => 'number'
		)
	);
	//Font weight
	$wp_customize->add_setting('vw_gardening_landscaping_pro_dropdown_font_weight',array(
      'default' => '',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_gardening_landscaping_pro_dropdown_font_weight', array(
	'label'       => esc_html__( 'Menu DropDown Item Font Weight','vw-gardening-landscaping-pro' ),
	'section'     => 'vw_gardening_landscaping_pro_header_section',
	'type'        => 'select',
	'settings'    => 'vw_gardening_landscaping_pro_dropdown_font_weight',
	'choices' => array(
      '100' =>  esc_attr('100','vw-gardening-landscaping-pro'),
      '200' =>  esc_attr('200','vw-gardening-landscaping-pro'),
      '300' =>  esc_attr('300','vw-gardening-landscaping-pro'),
      '400' =>  esc_attr('400','vw-gardening-landscaping-pro'),
      '500' =>  esc_attr('500','vw-gardening-landscaping-pro'),
      '600' =>  esc_attr('600','vw-gardening-landscaping-pro'),
      '700' =>  esc_attr('700','vw-gardening-landscaping-pro'),
      '800' =>  esc_attr('800','vw-gardening-landscaping-pro'),
      '900' =>  esc_attr('900','vw-gardening-landscaping-pro'),
      'bold' =>  esc_attr('bold','vw-gardening-landscaping-pro'),
      'bolder' =>  esc_attr('bolder','vw-gardening-landscaping-pro')
	),
	));
	$wp_customize->add_setting('vw_gardening_landscaping_pro_dropdown_text_transform',array(
      'default' => '',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_gardening_landscaping_pro_dropdown_text_transform', array(
	'label'       => esc_html__( 'Menus Text Transform','vw-gardening-landscaping-pro' ),
	'section'     => 'vw_gardening_landscaping_pro_header_section',
	'type'        => 'select',
	'settings'    => 'vw_gardening_landscaping_pro_dropdown_text_transform',
	'choices' => array(
      'uppercase' =>  esc_attr('uppercase','vw-gardening-landscaping-pro'),
      'lowercase' =>  esc_attr('lowercase','vw-gardening-landscaping-pro'),
      'capitalize' =>  esc_attr('capitalize','vw-gardening-landscaping-pro'),
      'unset' =>  esc_attr('unset','vw-gardening-landscaping-pro')
	),
	));
	/* --------- menudropdown Opacity  ----------- */

	$wp_customize->add_setting('vw_gardening_landscaping_pro_dropdown_bg_opacity_color',array(
      'default'              => '1',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_gardening_landscaping_pro_dropdown_bg_opacity_color', array(
		'label'       => esc_html__( 'Menu Dropdown Opacity','vw-gardening-landscaping-pro' ),
		'section'     => 'vw_gardening_landscaping_pro_header_section',
		'type'        => 'select',
		'settings'    => 'vw_gardening_landscaping_pro_dropdown_bg_opacity_color',
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
	$wp_customize->add_setting('vw_gardening_landscaping_pro_dropdown_box_shadow',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_dropdown_box_shadow',array(
        'label' => __('Menu Dropdown Shadow in px','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_header_section',
        'type'      => 'text'
    ));
	
	//In Responsive
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_dropdownbg_responsivecolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_dropdownbg_responsivecolor', array(
		'label' => __('Responsive Menu Background Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'settings' => 'vw_gardening_landscaping_pro_dropdownbg_responsivecolor',
	)));
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_headermenu_responsive_item_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_headermenu_responsive_item_color', array(
		'label' => __('Responsive Menu item Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'settings' => 'vw_gardening_landscaping_pro_headermenu_responsive_item_color',
	)));

	// This is Header Menu Color picker setting
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_headermenu_button_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_headermenu_button_color', array(
		'label' => __('Header Button', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'settings' => 'vw_gardening_landscaping_pro_headermenu_button_color',
	)));
	//This is Header Menu FontFamily picker setting
	$wp_customize->add_setting('vw_gardening_landscaping_pro_headermenu_button_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_gardening_landscaping_pro_headermenu_button_font_family', array(
	    'section'  => 'vw_gardening_landscaping_pro_header_section',
	    'label'    => __( 'Header Button Fonts','vw-gardening-landscaping-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));
	// This is Header Menu Color picker setting
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_headermenu_button_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_headermenu_button_bgcolor', array(
		'label' => __('Header Button Background Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_header_section',
		'settings' => 'vw_gardening_landscaping_pro_headermenu_button_bgcolor',
	)));
?>