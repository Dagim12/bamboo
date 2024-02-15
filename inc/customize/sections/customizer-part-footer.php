<?php
    /*------------------- Footer Sections ----------------------*/

    $wp_customize->add_section('vw_gardening_landscaping_pro_footer_widget_section',array(
        'title' => __('Footer Widgets','vw-gardening-landscaping-pro'),
        'description'   => __('Edit footer Widgets sections','vw-gardening-landscaping-pro'),
        'panel' => 'vw_gardening_landscaping_pro_panel_id',
    ));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_footer_widget_section_youtube_link', array(
      'default'   => '',
      'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new VW_Button_Custom_Content( $wp_customize, 'vw_gardening_landscaping_pro_footer_widget_section_youtube_link', array(
        'section' => 'vw_gardening_landscaping_pro_footer_widget_section',
        'label' => __( 'Youtube Video', 'vw-gardening-landscaping-pro' ),
        'description' => __( 'Watch our youtube video for How to Create a Footer Widget in WordPress.', 'vw-gardening-landscaping-pro' ),
        'content' => sprintf( __( 'Check the button %1$sWatch Now%2$s', 'vw-gardening-landscaping-pro' ), '<a href="' . esc_url( VW_GARDENING_LANDSCAPING_PRO_WIDGET_YOUTUBE_LINK) . '" class="button button-secondary alignright review_st" target="_blank">', '</a>' ),
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_footer_widgets_enable',
    array(
        'default' => 'Enable',
        'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_footer_widgets_enable',
    array(
        'type' => 'radio',
        'label' => 'Do you want this section',
        'section' => 'vw_gardening_landscaping_pro_footer_widget_section',
        'choices' => array(
            'Enable' => __('Enable', 'vw-gardening-landscaping-pro'),
            'Disable' => __('Disable', 'vw-gardening-landscaping-pro')
        ),
    ));

    $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_footer_widgets_enable', array(
      'selector' => '#footer .footer-cols',
      'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_footer_widgets_enable',
    ) );

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_footer_widget_section_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_footer_widget_section_setting',
        array(
          'label' => __('Section Background Setting','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_footer_widget_section'
        )
    ) );

    // add color picker setting
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_footer_widget_bgcolor', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_footer_widget_bgcolor', array(
        'label' => __('Background Color', 'vw-gardening-landscaping-pro'),
        'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_footer_widget_section',
        'settings' => 'vw_gardening_landscaping_pro_footer_widget_bgcolor',
    )));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_footer_widget_bgimage',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
      'vw_gardening_landscaping_pro_footer_widget_bgimage',
      array(
          'label' => __('Background image','vw-gardening-landscaping-pro'),
          'description' => __('Dimension 1600 * 600','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_footer_widget_section',
          'settings' => 'vw_gardening_landscaping_pro_footer_widget_bgimage'
    )));
      //Work Column Layout
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_footer_widget_bgimage_setting', array(
      'default'         => '',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_footer_widget_bgimage_setting', array(
      'type'      => 'radio',
      'label'     => __('Choose image option', 'vw-gardening-landscaping-pro'),
      'section'   => 'vw_gardening_landscaping_pro_footer_widget_section',
      'choices'   => array(
        'vw-fixed'      => __( 'Fixed', 'vw-gardening-landscaping-pro' ),
        'vw-scroll'      => __( 'Scroll', 'vw-gardening-landscaping-pro' ),                    
  ),)); 

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_footer_widget_section_text_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_footer_widget_section_text_setting',
        array(
          'label' => __('Section Text Color and Font Setting','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_footer_widget_section'
        )
    ) );

    $wp_customize->add_setting('vw_gardening_landscaping_pro_footer_widget_heading_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_footer_widget_heading_color', array(
        'label' => __('Footer Heading Color', 'vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_footer_widget_section',
        'settings' => 'vw_gardening_landscaping_pro_footer_widget_heading_color',
    )));
    
    $wp_customize->add_setting('vw_gardening_landscaping_pro_footer_widget_heading_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
        'vw_gardening_landscaping_pro_footer_widget_heading_font_family', array(
        'section'  => 'vw_gardening_landscaping_pro_footer_widget_section',
        'label'    => __( 'Footer Heading Font Family','vw-gardening-landscaping-pro'),
        'type'     => 'select',
        'choices'  => $font_array,
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_footer_widget_content_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_footer_widget_content_color', array(
        'label' => __('Footer Content Color', 'vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_footer_widget_section',
        'settings' => 'vw_gardening_landscaping_pro_footer_widget_content_color',
    )));
    
    $wp_customize->add_setting('vw_gardening_landscaping_pro_footer_widget_content_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
        'vw_gardening_landscaping_pro_footer_widget_content_font_family', array(
        'section'  => 'vw_gardening_landscaping_pro_footer_widget_section',
        'label'    => __( 'Footer Content Font Family','vw-gardening-landscaping-pro'),
        'type'     => 'select',
        'choices'  => $font_array,
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_footer_widget_button_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_footer_widget_button_color', array(
        'label' => __('Footer Form Button Background Color', 'vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_footer_widget_section',
        'settings' => 'vw_gardening_landscaping_pro_footer_widget_button_color',
    )));
    
    /*----------------- Footer Copyright --------------*/

    $wp_customize->add_section('vw_gardening_landscaping_pro_footer_section',array(
        'title' => __('Footer Text','vw-gardening-landscaping-pro'),
        'description'   => __('Add some text for footer like copyright etc.','vw-gardening-landscaping-pro'),
        'priority'  => null,
        'panel' => 'vw_gardening_landscaping_pro_panel_id',
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_footer_footer_logo',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
      'vw_gardening_landscaping_pro_footer_footer_logo',
      array(
          'label' => __('Footer Logo','vw-gardening-landscaping-pro'),
          'description' => __('Dimension 204 * 192','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_footer_section',
          'settings' => 'vw_gardening_landscaping_pro_footer_footer_logo'
    )));
     $wp_customize->add_setting('vw_gardening_landscaping_pro_footer_footer_logo_alt_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_footer_footer_logo_alt_text',array(
      'label' => __('Footer Logo Image Alt Text ','vw-gardening-landscaping-pro'),
      'description' => esc_html( 'This is image text for image alt attribute.This text is only for coding purpose.' ),
      'section' => 'vw_gardening_landscaping_pro_footer_section',
      'setting' => 'vw_gardening_landscaping_pro_footer_footer_logo_alt_text',
      'type'  => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_footer_copy',array(
      'default' => '',
      'capability'         => 'edit_theme_options',
        'sanitize_callback'  => 'wp_kses_post'
    ));
    $wp_customize->add_control(new vw_gardening_landscaping_pro_Editor_Control($wp_customize,'vw_gardening_landscaping_pro_footer_copy',array(
      'label' => __('Copyright Text','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_footer_section',
      'setting' => 'vw_gardening_landscaping_pro_footer_copy',
    )));

    $wp_customize->selective_refresh->add_partial( 'vw_gardening_landscaping_pro_footer_copy', array(
      'selector' => '.copy-text',
      'render_callback' => 'vw_gardening_landscaping_pro_customize_partial_vw_gardening_landscaping_pro_footer_copy',
    ) );

    $wp_customize->add_setting('vw_gardening_landscaping_pro_footer_copyright_text_align',array(
        'default' => __('center','vw-gardening-landscaping-pro'),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_footer_copyright_text_align',array(
        'type' => 'select',
        'label' => __('Footer Text Align','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_footer_section',
        'choices' => array(
            'center' => __('center','vw-gardening-landscaping-pro'),
            'left' => __('left','vw-gardening-landscaping-pro'),
            'right' => __('right','vw-gardening-landscaping-pro')
        ),  
    ) );

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_footer_show_hide_credit_link',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_control( $wp_customize, 'vw_gardening_landscaping_pro_footer_show_hide_credit_link',
         array(
            'label' => esc_html__( 'Show or Hide Credit Link', 'vw-gardening-landscaping-pro' ),
            'section' => 'vw_gardening_landscaping_pro_footer_section'
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_copyright_top_bottom_padding',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_copyright_top_bottom_padding',array(
        'label' => __('Copyright Top Bottom Padding','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_footer_section',
        'type'      => 'number'
    ));    

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_footer_copy_content_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    // add color picker control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_footer_copy_content_color', array(
        'label' => __('Content Color', 'vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_footer_section',
        'settings' => 'vw_gardening_landscaping_pro_footer_copy_content_color',
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_footer_copy_content_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
        'vw_gardening_landscaping_pro_footer_copy_content_font_family', array(
        'section'  => 'vw_gardening_landscaping_pro_footer_section',
        'label'    => __( 'Content Font Family','vw-gardening-landscaping-pro'),
        'type'     => 'select',
        'choices'  => $font_array,
    ));
     $wp_customize->add_setting( 'vw_gardening_landscaping_pro_footer_copy_social_icon_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    // add color picker control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_footer_copy_social_icon_color', array(
        'label' => __('Social Icon Color', 'vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_footer_section',
        'settings' => 'vw_gardening_landscaping_pro_footer_copy_social_icon_color',
    )));

    /*---------------Contact Page section-------------*/

    $wp_customize->add_section('vw_gardening_landscaping_pro_contact_page_section',array(
        'title' => __('Contact','vw-gardening-landscaping-pro'),
        'description'   => __('Add contact page settings here).','vw-gardening-landscaping-pro'),
        'priority'  => null,
        'panel' => 'vw_gardening_landscaping_pro_panel_id',
    ));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_contact_page_section_youtube_link', array(
      'default'   => '',
      'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new VW_Button_Custom_Content( $wp_customize, 'vw_gardening_landscaping_pro_contact_page_section_youtube_link', array(
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'label' => __( 'Youtube Video', 'vw-gardening-landscaping-pro' ),
        'description' => __( 'Watch our youtube video for installing contact form7 plugin and create contact form in WordPress.', 'vw-gardening-landscaping-pro' ),
        'content' => sprintf( __( 'Check the button %1$sWatch Now%2$s', 'vw-gardening-landscaping-pro' ), '<a href="' . esc_url( VW_GARDENING_LANDSCAPING_PRO_CONTACT_FORM_YOUTUBE_LINK) . '" class="button button-secondary alignright review_st" target="_blank">', '</a>' ),
    )));
    
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_contact_page_section_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_contact_page_section_setting',
        array(
          'label' => __('Contact Info Background Setting','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_contact_page_section'
        )
    ) );
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_contact_info_bgcolor', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_contact_info_bgcolor', array(
      'label' => __('Section Background Color', 'vw-gardening-landscaping-pro'),
      'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_contact_page_section',
      'settings' => 'vw_gardening_landscaping_pro_contact_info_bgcolor',
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contact_info_bgimage',array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_contact_info_bgimage',array(
      'label' => __('Section Background Image','vw-gardening-landscaping-pro'),
      'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_contact_page_section',
      'settings' => 'vw_gardening_landscaping_pro_contact_info_bgimage'
    )));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_contact_page_section_content_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_contact_page_section_content_setting',
        array(
          'label' => __('Contact Info Content Setting','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_contact_page_section_content_setting'
        )
    ) );

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_info_small_head',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_contactpage_info_small_head',array(
        'label' => __('Section Small Title','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_contactpage_info_small_head',
        'type'  => 'text'
    ));  
    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_info_head',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_contactpage_info_head',array(
        'label' => __('Section Title','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_contactpage_info_head',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_info_add_img',array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_contactpage_info_add_img',array(
      'label' => __('Address Image','vw-gardening-landscaping-pro'),
      'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_contact_page_section',
      'settings' => 'vw_gardening_landscaping_pro_contactpage_info_add_img'
    ))); 

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_info_add_head',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_contactpage_info_add_head',array(
        'label' => __('Address Title','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_contactpage_info_add_head',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_info_address',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_contactpage_info_address',array(
        'label' => __('Address Text','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_contactpage_info_address',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_info_email_phone_img',array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_contactpage_info_email_phone_img',array(
      'label' => __('Email/Phone Image','vw-gardening-landscaping-pro'),
      'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_contact_page_section',
      'settings' => 'vw_gardening_landscaping_pro_contactpage_info_email_phone_img'
    ))); 

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_info_email_phone_title',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_contactpage_info_email_phone_title',array(
        'label' => __('Email/Phone Title','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_contactpage_info_email_phone_title',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_info_email_phone_num',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_contactpage_info_email_phone_num',array(
        'label' => __('Phone Number','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_contactpage_info_email_phone_num',
        'type'  => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_info_email_address',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_contactpage_info_email_address',array(
        'label' => __('Email Text','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_contactpage_info_email_address',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_info_time_img',array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_contactpage_info_time_img',array(
      'label' => __('Time Image','vw-gardening-landscaping-pro'),
      'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_contact_page_section',
      'settings' => 'vw_gardening_landscaping_pro_contactpage_info_time_img'
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_info_time_title',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_contactpage_info_time_title',array(
        'label' => __('Time Title','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_contactpage_info_time_title',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_info_time_one',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_contactpage_info_time_one',array(
        'label' => __('Time One Text','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_contactpage_info_time_one',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_info_time_two',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_contactpage_info_time_two',array(
        'label' => __('Time Two Text','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_contactpage_info_time_two',
        'type'  => 'text'
    ));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_contact_page_form_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_contact_page_form_setting',
        array(
          'label' => __('Contact Form Setting','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_contact_page_section'
        )
    ) );

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_contact_form_bgcolor', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_contact_form_bgcolor', array(
      'label' => __('Form Background Color', 'vw-gardening-landscaping-pro'),
      'description'   => __('Either add background color or background image, if you add both background color will be top most priority','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_contact_page_section',
      'settings' => 'vw_gardening_landscaping_pro_contact_form_bgcolor',
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contact_form_bgimage',array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_contact_form_bgimage',array(
      'label' => __('Form Background Image','vw-gardening-landscaping-pro'),
      'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_contact_page_section',
      'settings' => 'vw_gardening_landscaping_pro_contact_form_bgimage'
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_form_small_head',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_contactpage_form_small_head',array(
        'label' => __('Form Small Title','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_contactpage_form_small_head',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_form_head',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_contactpage_form_head',array(
        'label' => __('Form TItle','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_contactpage_form_head',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contactpage_form_code',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_contactpage_form_code',array(
        'label' => __('Contact Form Shortcode','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_contactpage_form_code',
        'type'  => 'text'
    ));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_contact_page_section_map_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_contact_page_section_map_setting',
        array(
          'label' => __('Section Map Setting','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_contact_page_section'
        )
    ) );

    $wp_customize->add_setting('vw_gardening_landscaping_pro_address_longitude',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_address_longitude',array(
        'label' => __('Longitude','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_address_longitude',
        'type'=>'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_address_latitude',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_address_latitude',array(
        'label' => __('Latitude','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'setting'   => 'vw_gardening_landscaping_pro_address_latitude',
        'type'=>'text'
    ));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_contact_page_section_details_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_contact_page_section_details_setting',
        array(
          'label' => __('Section Text Color and Font Setting','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_contact_page_section'
        )
    ) );

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_contact_page_heading_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    // add color picker control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_contact_page_heading_color', array(
        'label' => __('Section Title Color', 'vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'settings' => 'vw_gardening_landscaping_pro_contact_page_heading_color',
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contact_page_heading_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
        'vw_gardening_landscaping_pro_contact_page_heading_font_family', array(
        'section'  => 'vw_gardening_landscaping_pro_contact_page_section',
        'label'    => __( 'Section Title Font Family','vw-gardening-landscaping-pro'),
        'type'     => 'select',
        'choices'  => $font_array,
    ));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_contact_page_content_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    // add color picker control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_contact_page_content_color', array(
        'label' => __('Contact Heading Color', 'vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'settings' => 'vw_gardening_landscaping_pro_contact_page_content_color',
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contact_page_contact_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
        'vw_gardening_landscaping_pro_contact_page_contact_font_family', array(
        'section'  => 'vw_gardening_landscaping_pro_contact_page_section',
        'label'    => __( 'Contact Heading Font Family','vw-gardening-landscaping-pro'),
        'type'     => 'select',
        'choices'  => $font_array,
    ));

    // add color picker control
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_contact_page_contents_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));   
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_contact_page_contents_color', array(
        'label' => __('Contact Content Color', 'vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'settings' => 'vw_gardening_landscaping_pro_contact_page_contents_color',
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_contact_page_contacts_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
        'vw_gardening_landscaping_pro_contact_page_contacts_font_family', array(
        'section'  => 'vw_gardening_landscaping_pro_contact_page_section',
        'label'    => __( 'Contact Content Font Family','vw-gardening-landscaping-pro'),
        'type'     => 'select',
        'choices'  => $font_array,
    ));

    // add color picker control
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_contact_page_icon_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));   
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_contact_page_icon_color', array(
        'label' => __('Contact Content Icon Color', 'vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'settings' => 'vw_gardening_landscaping_pro_contact_page_icon_color',
    )));
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_contact_page_button_bgcolor', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    // add color picker control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_contact_page_button_bgcolor', array(
        'label' => __('Form Button Background Color', 'vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'settings' => 'vw_gardening_landscaping_pro_contact_page_button_bgcolor',
    )));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_contact_details_bgcolor', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));   
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_contact_details_bgcolor', array(
        'label' => __('Contact Content Background Color', 'vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_contact_page_section',
        'settings' => 'vw_gardening_landscaping_pro_contact_details_bgcolor',
    )));

    /* ----------- Responsive Media Settings  ------------ */

    $wp_customize->add_section('vw_gardening_landscaping_pro_responsive_media',array(
      'title' => __('Responsive Media','vw-gardening-landscaping-pro'),
      'panel' => 'vw_gardening_landscaping_pro_panel_id',
    ));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_resp_slider_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
    ));  
    $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_resp_slider_hide_show',array(
          'label' => esc_html__( 'Show / Hide Slider','vw-gardening-landscaping-pro' ),
          'section' => 'vw_gardening_landscaping_pro_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_metabox_hide_show',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
    ));  
    $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_metabox_hide_show',array(
          'label' => esc_html__( 'Show / Hide Metabox','vw-gardening-landscaping-pro' ),
          'section' => 'vw_gardening_landscaping_pro_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_sidebar_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_gardening_landscaping_pro_switch_sanitization'
    )); 
    $wp_customize->add_control( new vw_gardening_landscaping_pro_Toggle_Switch_Custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_sidebar_hide_show',array(
          'label' => esc_html__( 'Show / Hide Sidebar','vw-gardening-landscaping-pro' ),
          'section' => 'vw_gardening_landscaping_pro_responsive_media'
    )));

    $wp_customize->add_setting(
      'vw_gardening_landscaping_pro_res_open_menu_icon',
      array(
        'default'     => '',
        'sanitize_callback' => 'sanitize_text_field'
      )
    );
    $wp_customize->add_control(
      new vw_gardening_landscaping_pro_Fontawesome_Icon_Chooser(
        $wp_customize,
        'vw_gardening_landscaping_pro_res_open_menu_icon',
        array(
          'settings'    => 'vw_gardening_landscaping_pro_res_open_menu_icon',
          'section'   => 'vw_gardening_landscaping_pro_responsive_media',
          'type'      => 'icon',
          'label'     => esc_html__( 'Choose Open Menu Icon', 'vw-gardening-landscaping-pro' ),
        )
      )
    );

    $wp_customize->add_setting(
      'vw_gardening_landscaping_pro_res_close_menus_icon',
      array(
        'default'     => '',
        'sanitize_callback' => 'sanitize_text_field'
      )
    );
    $wp_customize->add_control(
      new vw_gardening_landscaping_pro_Fontawesome_Icon_Chooser(
        $wp_customize,
        'vw_gardening_landscaping_pro_res_close_menus_icon',
        array(
          'settings'    => 'vw_gardening_landscaping_pro_res_close_menus_icon',
          'section'   => 'vw_gardening_landscaping_pro_responsive_media',
          'type'      => 'icon',
          'label'     => esc_html__( 'Choose Close Menu Icon', 'vw-gardening-landscaping-pro' ),
        )
      )
    );

    $wp_customize->add_setting('vw_gardening_landscaping_pro_site_menu_width',array(
        'default'   => '250',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_site_menu_width',array(
        'label' => __('Responsive Menu Width','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_responsive_media',
        'type'      => 'number'
    ));

    //Shortcode Section
    $wp_customize->add_section('vw_gardening_landscaping_pro_shortcode_section',array(
        'title' => __('Shortcode Settings','vw-gardening-landscaping-pro'),
        'description'   => __('Use below shortcode here.','vw-gardening-landscaping-pro'),
        'priority'  => null,
        'panel' => 'vw_gardening_landscaping_pro_panel_id',
    ));

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_shortcode_section_youtube_link', array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new VW_Button_Custom_Content( $wp_customize, 'vw_gardening_landscaping_pro_shortcode_section_youtube_link', array(
          'section' => 'vw_gardening_landscaping_pro_shortcode_section',
          'label' => __( 'Youtube Video', 'vw-gardening-landscaping-pro' ),
          'description' => __( 'Watch our youtube video for How to Create Pages Using Shortcode in WordPress.', 'vw-gardening-landscaping-pro' ),
          'content' => sprintf( __( 'Check the button %1$sWatch Now%2$s', 'vw-gardening-landscaping-pro' ), '<a href="' . esc_url( VW_GARDENING_LANDSCAPING_PRO_SHORTCODE_YOUTUBE_LINK) . '" class="button button-secondary alignright review_st" target="_blank">', '</a>' ),
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_shortcode',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_shortcode',array(
        'section' => 'vw_gardening_landscaping_pro_shortcode_section',
        'setting'   => 'vw_gardening_landscaping_pro_shortcode',
        'type'=>'textarea'
    ));  

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_shortcode_section_ele',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_shortcode_section_ele',
      array(
      'label' => __('Elementor Home Page Shortcode','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_shortcode_section'
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_ele_shortcode',array(
        'default'   => '[vw-elementor-slider],[vw-elementor-services],[vw-elementor-process],[vw-elementor-project],[vw-elementor-pricing-plan],[vw-elementor-our-records],[vw-elementor-our-clients],[vw-elementor-our-teams],[vw-elementor-blogs]',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_ele_shortcode',array(
        'section' => 'vw_gardening_landscaping_pro_shortcode_section',
        'setting'   => 'vw_gardening_landscaping_pro_ele_shortcode',
        'type'=>'textarea'
    )); 

    /* ------------ 404 Page Setting ------------ */

    $wp_customize->add_section('vw_gardening_landscaping_pro_404_page_section',array(
      'title' => __('404 Page Settings','vw-gardening-landscaping-pro'),
      'panel' => 'vw_gardening_landscaping_pro_panel_id',
    )); 

    $wp_customize->add_setting('vw_gardening_landscaping_pro_404_page_image',array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_404_page_image',array(
      'label' => __('404 Image','vw-gardening-landscaping-pro'),
      'description' => __('Dimension 1600 * 800','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_404_page_section',
      'settings' => 'vw_gardening_landscaping_pro_404_page_image'
    )));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_404_page_title',array(
      'default'=> '',
      'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('vw_gardening_landscaping_pro_404_page_title',array(
      'label' => __('Add Title','vw-gardening-landscaping-pro'),
      'input_attrs' => array(
              'placeholder' => __( 'Oops!', 'vw-gardening-landscaping-pro' ),
          ),
      'section'=> 'vw_gardening_landscaping_pro_404_page_section',
      'type'=> 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_404_page_text',array(
      'default'=> '',
      'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('vw_gardening_landscaping_pro_404_page_text',array(
      'label' => __('Add Text','vw-gardening-landscaping-pro'),
      'input_attrs' => array(
              'placeholder' => __( 'Sorry, The page you are looking for no longer exists.', 'vw-gardening-landscaping-pro' ),
          ),
      'section'=> 'vw_gardening_landscaping_pro_404_page_section',
      'type'=> 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_404_page_btn',array(
      'default'=> '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_404_page_btn',array(
      'label' => __('Add Button Text','vw-gardening-landscaping-pro'),
      'input_attrs' => array(
              'placeholder' => __( 'Back to Home Page', 'vw-gardening-landscaping-pro' ),
          ),
      'section'=> 'vw_gardening_landscaping_pro_404_page_section',
      'type'=> 'text'
    ));

    /* ------------ About Page Setting ------------ */

    $wp_customize->add_section('vw_gardening_landscaping_pro_about_page_section',array(
      'title' => __('About Us Page Settings','vw-gardening-landscaping-pro'),
      'panel' => 'vw_gardening_landscaping_pro_panel_id',
    )); 

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_page_abut_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_about_page_abut_setting',
        array(
          'label' => __('About Us Setting','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_about_page_section'
        )
    ) );

    $wp_customize->add_setting('vw_gardening_pro_about_temp_title',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_pro_about_temp_title',array(
        'label' => __('About Title','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_about_page_section',
        'type'      => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_pro_about_temp_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_pro_about_temp_text',array(
        'label' => __('About Text','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_about_page_section',
        'type'      => 'textarea'
    ));

    $wp_customize->add_setting('vw_gardening_pro_about_temp_img',array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize,'vw_gardening_pro_about_temp_img',array(
      'label' => __('About Image','vw-gardening-landscaping-pro'),
      'description' => __('Dimension 462 * 500','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_about_page_section',
      'settings' => 'vw_gardening_pro_about_temp_img'
    )));


    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_page_abut_serv_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_about_page_abut_serv_setting',
        array(
          'label' => __('About Service Setting','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_about_page_section'
        )
    ) );

    $wp_customize->add_setting('vw_gardening_pro_about_temp_exp_srv_small_head',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_pro_about_temp_exp_srv_small_head',array(
        'label' => __('Service Small Heading','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_about_page_section',
        'type'      => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_pro_about_temp_exp_srv_head',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_pro_about_temp_exp_srv_head',array(
        'label' => __('Service Title','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_about_page_section',
        'type'      => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_abt_temp_serv_count',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_abt_temp_serv_count',array(
        'label' => __('Service Count','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_about_page_section',
        'type'      => 'number'
    ));
    $servcount = get_theme_mod('vw_gardening_landscaping_pro_abt_temp_serv_count','4');
    for ($i=1; $i<=$servcount; $i++) {
      $wp_customize->add_setting('vw_gardening_landscaping_pro_abt_temp_serv_exp_img'.$i,array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
      ));
      $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_abt_temp_serv_exp_img'.$i,array(
        'label' => __('Service Image','vw-gardening-landscaping-pro').$i,
        'description' => __('Dimension 512 * 512','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_about_page_section',
        'settings' => 'vw_gardening_landscaping_pro_abt_temp_serv_exp_img'.$i
      ))); 
      $wp_customize->add_setting('vw_gardening_landscaping_pro_abt_serv_exp_title'.$i,array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
      ));
      $wp_customize->add_control('vw_gardening_landscaping_pro_abt_serv_exp_title'.$i,array(
        'label' => __('Service Title','vw-gardening-landscaping-pro').$i,
        'section'   => 'vw_gardening_landscaping_pro_about_page_section',
        'type'      => 'text'
      ));
      $wp_customize->add_setting('vw_gardening_landscaping_pro_abt_serv_exp_text'.$i,array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
      ));
      $wp_customize->add_control('vw_gardening_landscaping_pro_abt_serv_exp_text'.$i,array(
        'label' => __('Service Text','vw-gardening-landscaping-pro').$i,
        'section'   => 'vw_gardening_landscaping_pro_about_page_section',
        'type'      => 'textarea'
      ));
    }
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_about_page_abut_best_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_about_page_abut_best_setting',
        array(
          'label' => __('Why We Best Setting','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_about_page_section'
        )
    ) );

    $wp_customize->add_setting('vw_gardening_landscaping_pro_why_best_img',array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_why_best_img',array(
      'label' => __('Best Left Image','vw-gardening-landscaping-pro'),
      'description' => __('Dimension 512 * 512','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_about_page_section',
      'settings' => 'vw_gardening_landscaping_pro_why_best_img'
    ))); 

    $wp_customize->add_setting('vw_gardening_landscaping_pro_abt_temp_why_best_small_title',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_abt_temp_why_best_small_title',array(
        'label' => __('Why We Best Small Heading','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_about_page_section',
        'type'      => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_abt_temp_why_best_head',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_abt_temp_why_best_head',array(
        'label' => __('Why We Best Title','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_about_page_section',
        'type'      => 'text'
    ));

    $wp_customize->add_setting('vw_gardening_landscaping_pro_abt_temp_why_best_count',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_abt_temp_why_best_count',array(
        'label' => __('Best Count','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_about_page_section',
        'type'      => 'number'
    ));
    $bestcount = get_theme_mod('vw_gardening_landscaping_pro_abt_temp_why_best_count','4');
    for ($i=1; $i<=$bestcount; $i++) {
      $wp_customize->add_setting('vw_gardening_landscaping_pro_abt_temp_why_best_img'.$i,array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
      ));
      $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_abt_temp_why_best_img'.$i,array(
        'label' => __('Best Image','vw-gardening-landscaping-pro').$i,
        'description' => __('Dimension 512 * 512','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_about_page_section',
        'settings' => 'vw_gardening_landscaping_pro_abt_temp_why_best_img'.$i
      ))); 
      $wp_customize->add_setting('vw_gardening_landscaping_pro_abt_temp_why_best_title'.$i,array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
      ));
      $wp_customize->add_control('vw_gardening_landscaping_pro_abt_temp_why_best_title'.$i,array(
        'label' => __('Best Title','vw-gardening-landscaping-pro').$i,
        'section'   => 'vw_gardening_landscaping_pro_about_page_section',
        'type'      => 'text'
      ));
      $wp_customize->add_setting('vw_gardening_landscaping_pro_abt_temp_why_best_text'.$i,array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
      ));
      $wp_customize->add_control('vw_gardening_landscaping_pro_abt_temp_why_best_text'.$i,array(
        'label' => __('Best Text','vw-gardening-landscaping-pro').$i,
        'section'   => 'vw_gardening_landscaping_pro_about_page_section',
        'type'      => 'textarea'
      ));
    }

    $wp_customize->add_section('vw_gardening_landscaping_pro_faq_page_section',array(
      'title' => __('Faq Page Settings','vw-gardening-landscaping-pro'),
      'panel' => 'vw_gardening_landscaping_pro_panel_id',
    )); 

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_faq_page_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_faq_page_setting',
        array(
          'label' => __('Faq Page Setting','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_faq_page_section'
        )
    ) );
    $wp_customize->add_setting('vw_gardening_landscaping_pro_faq_heading',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_faq_heading',array(
        'label' => __('Faq Heading','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_faq_page_section',
        'type'      => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_faq_number',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_faq_number',array(
        'label' => __('Faq Count','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_faq_page_section',
        'type'      => 'number'
    ));
    $fcount = get_theme_mod('vw_gardening_landscaping_pro_our_faq_number','6');
    for ($i=1; $i<=$fcount; $i++) {
      $wp_customize->add_setting('vw_gardening_landscaping_pro_our_faq_title'.$i,array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
      ));
      $wp_customize->add_control('vw_gardening_landscaping_pro_our_faq_title'.$i,array(
        'label' => __('Faq Title','vw-gardening-landscaping-pro').$i,
        'section'   => 'vw_gardening_landscaping_pro_faq_page_section',
        'type'      => 'text'
      ));
      $wp_customize->add_setting('vw_gardening_landscaping_pro_our_faq_text'.$i,array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
      ));
      $wp_customize->add_control('vw_gardening_landscaping_pro_our_faq_text'.$i,array(
        'label' => __('Faq Text','vw-gardening-landscaping-pro').$i,
        'section'   => 'vw_gardening_landscaping_pro_faq_page_section',
        'type'      => 'textarea'
      ));
    }
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_faq_page_setting2',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_faq_page_setting2',
        array(
          'label' => __('Faq Two Setting','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_faq_page_section'
        )
    ) );
    $wp_customize->add_setting('vw_gardening_landscaping_pro_faq_heading2',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_faq_heading2',array(
        'label' => __('Faq Heading','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_faq_page_section',
        'type'      => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_our_faq_number2',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_our_faq_number2',array(
        'label' => __('Faq Count','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_faq_page_section',
        'type'      => 'number'
    ));
    $fcount = get_theme_mod('vw_gardening_landscaping_pro_our_faq_number2','4');
    for ($i=1; $i<=$fcount; $i++) {
      $wp_customize->add_setting('vw_gardening_landscaping_pro_our_faq_title2'.$i,array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
      ));
      $wp_customize->add_control('vw_gardening_landscaping_pro_our_faq_title2'.$i,array(
        'label' => __('Faq Title','vw-gardening-landscaping-pro').$i,
        'section'   => 'vw_gardening_landscaping_pro_faq_page_section',
        'type'      => 'text'
      ));
      $wp_customize->add_setting('vw_gardening_landscaping_pro_our_faq_text2'.$i,array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
      ));
      $wp_customize->add_control('vw_gardening_landscaping_pro_our_faq_text2'.$i,array(
        'label' => __('Faq Text','vw-gardening-landscaping-pro').$i,
        'section'   => 'vw_gardening_landscaping_pro_faq_page_section',
        'type'      => 'textarea'
      ));
    }
    $wp_customize->add_setting('vw_gardening_landscaping_faq_box_img',array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_faq_box_img',array(
      'label' => __('Faq Image','vw-gardening-landscaping-pro'),
      'description' => __('Dimension 512 * 512','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_faq_page_section',
      'settings' => 'vw_gardening_landscaping_faq_box_img'
    )));
    // ---------------service template------

    $wp_customize->add_section('vw_gardening_landscaping_pro_service_page_section',array(
      'title' => __('Service Page Settings','vw-gardening-landscaping-pro'),
      'panel' => 'vw_gardening_landscaping_pro_panel_id',
    )); 

    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_service_page_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_service_page_setting',
        array(
          'label' => __('Service Section Setting','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_service_page_section'
        )
    ) );
    $wp_customize->add_setting('vw_gardening_landscaping_pro_serv_temp_service_small_tiltle',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_serv_temp_service_small_tiltle',array(
        'label' => __('Service Small Heading','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_service_page_section',
        'type'      => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_serv_temp_service_tiltle',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_serv_temp_service_tiltle',array(
        'label' => __('Service Heading','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_service_page_section',
        'type'      => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_serv_temp_service_count',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_serv_temp_service_count',array(
        'label' => __('Service Count','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_service_page_section',
        'type'      => 'number'
    ));
    $service_count = get_theme_mod('vw_gardening_landscaping_pro_serv_temp_service_count','6');
    for ($i=1; $i<=$service_count; $i++) {
      $wp_customize->add_setting('vw_gardening_landscaping_pro_serv_temp_service_img'.$i,array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
      ));
      $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize,'vw_gardening_landscaping_pro_serv_temp_service_img'.$i,array(
        'label' => __('Services Image','vw-gardening-landscaping-pro'),
        'description' => __('Dimension 512 * 512','vw-gardening-landscaping-pro'),
        'section' => 'vw_gardening_landscaping_pro_service_page_section',
        'settings' => 'vw_gardening_landscaping_pro_serv_temp_service_img'.$i
      )));
      $wp_customize->add_setting('vw_gardening_landscaping_pro_serv_temp_service_head'.$i,array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
      ));
      $wp_customize->add_control('vw_gardening_landscaping_pro_serv_temp_service_head'.$i,array(
        'label' => __('Service Title','vw-gardening-landscaping-pro').$i,
        'section'   => 'vw_gardening_landscaping_pro_service_page_section',
        'type'      => 'text'
      ));
      $wp_customize->add_setting('vw_gardening_landscaping_pro_serv_temp_service_head_url'.$i,array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
      ));
      $wp_customize->add_control('vw_gardening_landscaping_pro_serv_temp_service_head_url'.$i,array(
        'label' => __('Service Title Url','vw-gardening-landscaping-pro').$i,
        'section'   => 'vw_gardening_landscaping_pro_service_page_section',
        'type'      => 'text'
      ));
      $wp_customize->add_setting('vw_gardening_landscaping_pro_serv_temp_service_text'.$i,array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
      ));
      $wp_customize->add_control('vw_gardening_landscaping_pro_serv_temp_service_text'.$i,array(
        'label' => __('Service Text','vw-gardening-landscaping-pro').$i,
        'section'   => 'vw_gardening_landscaping_pro_service_page_section',
        'type'      => 'textarea'
      ));
    } 
    $wp_customize->add_setting( 'vw_gardening_landscaping_pro_service_pagefeatures_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'vw_gardening_landscaping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_service_pagefeatures_setting',
        array(
          'label' => __('Service Features Setting','vw-gardening-landscaping-pro'),
          'section' => 'vw_gardening_landscaping_pro_service_page_section'
        )
    ) );
    $wp_customize->add_setting('vw_gardening_landscaping_pro_service_temp_serv_feature_head',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_service_temp_serv_feature_head',array(
        'label' => __('Service Feature Heading','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_service_page_section',
        'type'      => 'text'
    ));
    $wp_customize->add_setting('vw_gardening_landscaping_pro_service_temp_service_feature_shortcode',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('vw_gardening_landscaping_pro_service_temp_service_feature_shortcode',array(
        'label' => __('Service Feature Shortcode','vw-gardening-landscaping-pro'),
        'section'   => 'vw_gardening_landscaping_pro_service_page_section',
        'type'      => 'text'
    ));
?>