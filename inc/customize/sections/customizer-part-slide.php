<?php
	$wp_customize->add_section('vw_gardening_landscaping_pro_slider_section',array(
		'title'	=> __('Slider Settings','vw-gardening-landscaping-pro'),
		'description'	=> __('Add slider images here.','vw-gardening-landscaping-pro'),
		'priority'	=> null,
		'panel' => 'vw_gardening_landscaping_pro_panel_id',
	));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_slider_youtube_link', array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new VW_Button_Custom_Content( $wp_customize, 'vw_gardening_landscaping_pro_slider_youtube_link', array(
          'section' => 'vw_gardening_landscaping_pro_slider_section',
          'label' => __( 'Youtube Video', 'vw-gardening-landscaping-pro' ),
          'description' => __( 'Watch our youtube video for How to add Slider using Customizer.', 'vw-gardening-landscaping-pro' ),
          'content' => sprintf( __( 'Check the button %1$sWatch Now%2$s', 'vw-gardening-landscaping-pro' ), '<a href="' . esc_url( VW_GARDENING_LANDSCAPING_PRO_SLIDER_YOUTUBE_LINK) . '" class="button button-secondary alignright review_st" target="_blank">', '</a>' ),
    )));

	$wp_customize->add_setting('vw_gardening_landscaping_pro_slider_enabledisable',array(
        'default'=> 'Enable',
        'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
    ));
	$wp_customize->add_control('vw_gardening_landscaping_pro_slider_enabledisable', array(
        'type' => 'radio',
        'label' => 'Do you want this section',
        'section' => 'vw_gardening_landscaping_pro_slider_section',
        'choices' => array(
            'Enable' => 'Enable',
            'Disable' => 'Disable'
        ),
    ));

    $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_slider_enabledisable', array(
	    'selector' => '.slider-box',
	    'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_slider_enabledisable',
	) );

	$wp_customize->add_setting('vw_gardening_landscaping_pro_slide_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_gardening_landscaping_pro_slide_number',array(
		'label'	=> __('Number of slides to show','vw-gardening-landscaping-pro'),
		'section'	=> 'vw_gardening_landscaping_pro_slider_section',
		'type'		=> 'number'
	));
	$count =  get_theme_mod('vw_gardening_landscaping_pro_slide_number');
		
	for($i=1; $i<=$count; $i++) {
		$wp_customize->add_setting( 'vw_gardening_landscaping_pro_slider_section_settings'.$i,
		    array(
		    'default' => '',
		    'transport' => 'postMessage',
		    'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
		));
		$wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_slider_section_settings'.$i,
		    array(
		    'label' => __('Slider Settings ','vw-gardening-landscaping-pro').$i,
		    'section' => 'vw_gardening_landscaping_pro_slider_section'
		)));

		$wp_customize->add_setting('vw_gardening_landscaping_pro_slide_image'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'vw_gardening_landscaping_pro_slide_image'.$i,
	        array(
            'label' => __('Slider Image ','vw-gardening-landscaping-pro').$i.__(' (1600x562)','vw-gardening-landscaping-pro'),
            'section' => 'vw_gardening_landscaping_pro_slider_section',
            'settings' => 'vw_gardening_landscaping_pro_slide_image'.$i
		)));

		$wp_customize->add_setting('vw_gardening_landscaping_pro_slide_small_heading'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));
		$wp_customize->add_control('vw_gardening_landscaping_pro_slide_small_heading'.$i,array(
			'label' => __('Slide Small Heading ','vw-gardening-landscaping-pro').$i,
			'section' => 'vw_gardening_landscaping_pro_slider_section',
			'setting'	=> 'vw_gardening_landscaping_pro_slide_small_heading'.$i,
			'type'	=> 'text'
		));
		
		$wp_customize->add_setting('vw_gardening_landscaping_pro_slide_heading'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));
		$wp_customize->add_control('vw_gardening_landscaping_pro_slide_heading'.$i,array(
			'label' => __('Slide Main Heading ','vw-gardening-landscaping-pro').$i,
			'section' => 'vw_gardening_landscaping_pro_slider_section',
			'setting'	=> 'vw_gardening_landscaping_pro_slide_heading'.$i,
			'type'	=> 'text'
		));

		$wp_customize->add_setting('vw_gardening_landscaping_pro_slide_text'.$i,array(
			'default'	=> '',
			'capability'         => 'edit_theme_options',
		  	'sanitize_callback'  => 'wp_kses_post'
		));
		$wp_customize->add_control(new vw_gardening_landscaping_pro_Editor_Control($wp_customize,'vw_gardening_landscaping_pro_slide_text'.$i,array(
			'label' => __('Slider Text','vw-gardening-landscaping-pro').$i,
			'section' => 'vw_gardening_landscaping_pro_slider_section',
			'setting'	=> 'vw_gardening_landscaping_pro_slide_text'.$i,
		)));

		$wp_customize->add_setting('vw_gardening_landscaping_pro_slide_btntext'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_textarea_field',
		));
		$wp_customize->add_control('vw_gardening_landscaping_pro_slide_btntext'.$i,array(
			'label' => __('Slider Button 1 Text','vw-gardening-landscaping-pro'),
			'section' => 'vw_gardening_landscaping_pro_slider_section',
			'setting'	=> 'vw_gardening_landscaping_pro_slide_btntext'.$i,
			'type'	=> 'text'
		));

		$wp_customize->add_setting('vw_gardening_landscaping_pro_slide_btnurl'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control('vw_gardening_landscaping_pro_slide_btnurl'.$i,array(
			'label' => __('Slider Button 1 Url','vw-gardening-landscaping-pro'),
			'section' => 'vw_gardening_landscaping_pro_slider_section',
			'setting'	=> 'vw_gardening_landscaping_pro_slide_btnurl'.$i,
			'type'	=> 'text'
		));

		$wp_customize->add_setting('vw_gardening_landscaping_pro_slide_second_btntext'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_textarea_field',
		));
		$wp_customize->add_control('vw_gardening_landscaping_pro_slide_second_btntext'.$i,array(
			'label' => __('Slider Button 2 Text','vw-gardening-landscaping-pro'),
			'section' => 'vw_gardening_landscaping_pro_slider_section',
			'setting'	=> 'vw_gardening_landscaping_pro_slide_second_btntext'.$i,
			'type'	=> 'text'
		));

		$wp_customize->add_setting('vw_gardening_landscaping_pro_slide_second_btnurl'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control('vw_gardening_landscaping_pro_slide_second_btnurl'.$i,array(
			'label' => __('Slider Button 2 Url','vw-gardening-landscaping-pro'),
			'section' => 'vw_gardening_landscaping_pro_slider_section',
			'setting'	=> 'vw_gardening_landscaping_pro_slide_second_btnurl'.$i,
			'type'	=> 'text'
		));
	}
	$wp_customize->add_setting(
    'vw_gardening_landscaping_pro_slider_section_prev_nav_icon',
	    array(
	      'default' => 'fas fa-chevron-left',
	      'sanitize_callback' => 'sanitize_text_field'
	    )
	);
	$wp_customize->add_control(
	    new vw_gardening_landscaping_pro_Fontawesome_Icon_Chooser(
	      $wp_customize,
	      'vw_gardening_landscaping_pro_slider_section_prev_nav_icon',
	      array(
	        'settings'    => 'vw_gardening_landscaping_pro_slider_section_prev_nav_icon',
	        'section'   => 'vw_gardening_landscaping_pro_slider_section',
	        'type'      => 'icon',
	        'label'     => esc_html__( 'Slider Nav Prev Icon', 'vw-gardening-landscaping-pro' ),
	      )
	    )
	);

	$wp_customize->add_setting(
    'vw_gardening_landscaping_pro_slider_section_next_nav_icon',
	    array(
	      'default' => 'fas fa-chevron-right',
	      'sanitize_callback' => 'sanitize_text_field'
	    )
	);
	$wp_customize->add_control(
	    new vw_gardening_landscaping_pro_Fontawesome_Icon_Chooser(
	      $wp_customize,
	      'vw_gardening_landscaping_pro_slider_section_next_nav_icon',
	      array(
	        'settings' => 'vw_gardening_landscaping_pro_slider_section_next_nav_icon',
	        'section'   => 'vw_gardening_landscaping_pro_slider_section',
	        'type'      => 'icon',
	        'label'     => esc_html__( 'Slider Nav Next Icon', 'vw-gardening-landscaping-pro' ),
	      )
	    )
	);

	/* --------- Spinner Opacity  ----------- */

	$wp_customize->add_setting('vw_gardening_landscaping_pro_slider_opacity_img',array(
	  'default'              => '1',
	  'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
	));
	$wp_customize->add_control( 'vw_gardening_landscaping_pro_slider_opacity_img', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-gardening-landscaping-pro' ),
	'section'     => 'vw_gardening_landscaping_pro_slider_section',
	'type'        => 'select',
	'settings'    => 'vw_gardening_landscaping_pro_slider_opacity_img',
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

	// Other Settings
	$wp_customize->add_setting('vw_gardening_landscaping_pro_slide_delay',array(
		'default'	=> '1000',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('vw_gardening_landscaping_pro_slide_delay',array(
		'label'	=> __('Slide Delay','vw-gardening-landscaping-pro'),
		'section'	=> 'vw_gardening_landscaping_pro_slider_section',
		'description' => __('interval is in milliseconds. 1000 = 1 second -> so 1000 * 10 = 10 seconds', 'vw-gardening-landscaping-pro'),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_slide_remove_fade',
     array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_slide_remove_fade',
       array(
          'label' => esc_html__( 'Fade Effect', 'vw-gardening-landscaping-pro' ),
          'section' => 'vw_gardening_landscaping_pro_slider_section'
       )
    ));

   	// This is Slider Heading Color picker setting
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_small_sliderHeading_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_small_sliderHeading_color', array(
		'label' => __('Slider Small Heading Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_slider_section',
		'settings' => 'vw_gardening_landscaping_pro_small_sliderHeading_color',
	)));

	//This is Slider Heading FontFamily picker setting
	$wp_customize->add_setting('vw_gardening_landscaping_pro_small_sliderHeading_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_gardening_landscaping_pro_small_sliderHeading_font_family', array(
	    'section'  => 'vw_gardening_landscaping_pro_slider_section',
	    'label'    => __( 'Slider Small Heading Fonts','vw-gardening-landscaping-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is Slider Heading Color picker setting
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_sliderHeading_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_sliderHeading_color', array(
		'label' => __('Slider Heading Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_slider_section',
		'settings' => 'vw_gardening_landscaping_pro_sliderHeading_color',
	)));

	//This is Slider Heading FontFamily picker setting
	$wp_customize->add_setting('vw_gardening_landscaping_pro_sliderHeading_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_gardening_landscaping_pro_sliderHeading_font_family', array(
	    'section'  => 'vw_gardening_landscaping_pro_slider_section',
	    'label'    => __( 'Slider Heading Fonts','vw-gardening-landscaping-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is Slider Text Color picker setting
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_slidertext_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_slidertext_color', array(
		'label' => __('Slider Text Color', 'vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_slider_section',
		'settings' => 'vw_gardening_landscaping_pro_slidertext_color',
	)));

	//This is Slider Text FontFamily picker setting
	$wp_customize->add_setting('vw_gardening_landscaping_pro_slidertext_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_gardening_landscaping_pro_slidertext_font_family', array(
	    'section'  => 'vw_gardening_landscaping_pro_slider_section',
	    'label'    => __( 'Slider Text Fonts','vw-gardening-landscaping-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// Button color settings
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_slide_buttoncolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_slide_buttoncolor', array(
		'label' => 'Button Text Color',
		'section' => 'vw_gardening_landscaping_pro_slider_section',
		'settings' => 'vw_gardening_landscaping_pro_slide_buttoncolor',
	)));	

	$wp_customize->add_setting('vw_gardening_landscaping_pro_button_fontfamily',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
	 ));
	$wp_customize->add_control(
	    'vw_gardening_landscaping_pro_button_fontfamily', array(
	    'section'  => 'vw_gardening_landscaping_pro_slider_section',
	    'label'    => __( 'Button Text Fonts','vw-gardening-landscaping-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
 	));
	
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_slide_buttonbgcolor_first_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_slide_buttonbgcolor_first_bgcolor', array(
		'label' => 'Button Background Color',
		'section' => 'vw_gardening_landscaping_pro_slider_section',
		'settings' => 'vw_gardening_landscaping_pro_slide_buttonbgcolor_first_bgcolor',
	)));

 	// Button Hover color settings
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_slide_button_hvcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_slide_button_hvcolor', array(
		'label' => 'Button Hover Background Color',
		'section' => 'vw_gardening_landscaping_pro_slider_section',
		'settings' => 'vw_gardening_landscaping_pro_slide_button_hvcolor',
	)));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_slider_arrows',
     array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_slider_arrows',
       array(
          'label' => __( 'Hide Next & Previous Arrows', 'vw-gardening-landscaping-pro' ),
          'section' => 'vw_gardening_landscaping_pro_slider_section'
       )
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_slider_section_content_option',array(
        'default' => __('Left','vw-gardening-landscaping-pro'),
        'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
	));
	$wp_customize->add_control(new vw_gardening_landscaping_pro_Image_Radio_Control($wp_customize, 'vw_gardening_landscaping_pro_slider_section_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_slider_section',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

	$wp_customize->add_setting('vw_gardening_landscaping_pro_slider_section_content_spacing',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('vw_gardening_landscaping_pro_slider_section_content_spacing',array(
		'label'	=> esc_html__('Slider Content Spacing','vw-gardening-landscaping-pro'),
		'description'	=> __('Add value in percentage here.','vw-gardening-landscaping-pro'),
		'section'=> 'vw_gardening_landscaping_pro_slider_section',
	));

	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_slider_section_slider_top_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_gardening_landscaping_pro_slider_section_slider_top_spacing', array(
		'label' => esc_html__( 'Top','vw-gardening-landscaping-pro' ),
		'section' => 'vw_gardening_landscaping_pro_slider_section',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
	),));
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_slider_section_slider_bottom_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_gardening_landscaping_pro_slider_section_slider_bottom_spacing', array(
		'label' => esc_html__( 'Bottom','vw-gardening-landscaping-pro' ),
		'section' => 'vw_gardening_landscaping_pro_slider_section',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
	),) );
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_slider_section_slider_left_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_gardening_landscaping_pro_slider_section_slider_left_spacing', array(
		'label' => esc_html__( 'Left','vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_slider_section',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
	),) );
	$wp_customize->add_setting( 'vw_gardening_landscaping_pro_slider_section_slider_right_spacing', array(
		'default'  => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_gardening_landscaping_pro_slider_section_slider_right_spacing', array(
		'label' => esc_html__('Right','vw-gardening-landscaping-pro'),
		'section' => 'vw_gardening_landscaping_pro_slider_section',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
	),) );
?>