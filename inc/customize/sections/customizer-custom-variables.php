<?php


  $wp_customize->add_section('vw_gardening_landscaping_pro_section_ordering_settings',array(
      'title' => __('Section Ordering','vw-gardening-landscaping-pro'),
      'description'=> __('Section Ordering.','vw-gardening-landscaping-pro'),
      'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_section_ordering_settings_repeater',
      array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
      )
  );
  $wp_customize->add_control( new vw_gardening_landscaping_pro_Repeater_Custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_section_ordering_settings_repeater',
      array(
        'label' => __( 'Section Reordering','vw-gardening-landscaping-pro' ),
        'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
        'button_labels' => array(
          'add' => __( 'Add Row','vw-gardening-landscaping-pro' ), 
        )
      )
   ) );

  /* ---------- Our Expertise Padding ---------  */
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_section_ordering_our_expertise_settings', array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_section_ordering_our_expertise_settings', array(
    'label' => __('Our Expertise Padding Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_padding_top',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_expertise_padding_top',array(
    'label' => __('Padding Top','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_our_expertise_padding_top',
    'type'  => 'text'
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_expertise_padding_bottom',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_expertise_padding_bottom',array(
    'label' => __('Padding Bottom','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_our_expertise_padding_bottom',
    'type'  => 'text'
  ));

  /* ---------- About Us Padding ---------  */
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_section_ordering_about_us_settings', array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_section_ordering_about_us_settings', array(
    'label' => __('About Us Padding Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_about_us_padding_top',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_about_us_padding_top',array(
    'label' => __('Padding Top','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_about_us_padding_top',
    'type'  => 'text'
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_about_us_padding_bottom',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_about_us_padding_bottom',array(
    'label' => __('Padding Bottom','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_about_us_padding_bottom',
    'type'  => 'text'
  ));

  /* ---------- Services Padding ---------  */
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_section_ordering_services_settings', array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_section_ordering_services_settings', array(
    'label' => __('Services Padding Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_services_padding_top',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_services_padding_top',array(
    'label' => __('Padding Top','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_services_padding_top',
    'type'  => 'text'
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_services_padding_bottom',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_services_padding_bottom',array(
    'label' => __('Padding Bottom','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_services_padding_bottom',
    'type'  => 'text'
  ));

  /* ---------- Working Process Padding ---------  */
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_section_ordering_working_process_settings', array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_section_ordering_working_process_settings', array(
    'label' => __('Working Process Padding Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_working_process_padding_top',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_working_process_padding_top',array(
    'label' => __('Padding Top','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_working_process_padding_top',
    'type'  => 'text'
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_working_process_padding_bottom',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_working_process_padding_bottom',array(
    'label' => __('Padding Bottom','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_working_process_padding_bottom',
    'type'  => 'text'
  ));

  /* ---------- Our Projects Padding ---------  */
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_section_ordering_our_projects_settings', array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_section_ordering_our_projects_settings', array(
    'label' => __('Our Projects Padding Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_projects_padding_top',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_projects_padding_top',array(
    'label' => __('Padding Top','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_our_projects_padding_top',
    'type'  => 'text'
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_projects_padding_bottom',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_projects_padding_bottom',array(
    'label' => __('Padding Bottom','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_our_projects_padding_bottom',
    'type'  => 'text'
  ));

  /* ---------- Pricing Plan Padding ---------  */
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_section_ordering_pricing_plan_settings', array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_section_ordering_pricing_plan_settings', array(
    'label' => __('Pricing Plan Padding Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_padding_top',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_pricing_plan_padding_top',array(
    'label' => __('Padding Top','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_pricing_plan_padding_top',
    'type'  => 'text'
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_pricing_plan_padding_bottom',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_pricing_plan_padding_bottom',array(
    'label' => __('Padding Bottom','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_pricing_plan_padding_bottom',
    'type'  => 'text'
  ));

  /* ---------- Our Products Padding ---------  */
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_section_ordering_our_products_settings', array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_section_ordering_our_products_settings', array(
    'label' => __('Our Products Padding Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_padding_top',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_products_padding_top',array(
    'label' => __('Padding Top','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_our_products_padding_top',
    'type'  => 'text'
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_products_padding_bottom',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_products_padding_bottom',array(
    'label' => __('Padding Bottom','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_our_products_padding_bottom',
    'type'  => 'text'
  ));

  /* ---------- Testimonials Padding ---------  */
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_section_ordering_testimonial_settings', array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_section_ordering_testimonial_settings', array(
    'label' => __('Testimonials Padding Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_testimonial_padding_top',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_testimonial_padding_top',array(
    'label' => __('Padding Top','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_testimonial_padding_top',
    'type'  => 'text'
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_testimonial_padding_bottom',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_testimonial_padding_bottom',array(
    'label' => __('Padding Bottom','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_testimonial_padding_bottom',
    'type'  => 'text'
  ));

  /* ---------- Our Team Padding ---------  */
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_section_ordering_our_team_settings', array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_section_ordering_our_team_settings', array(
    'label' => __('Our Team Padding Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_team_padding_top',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_team_padding_top',array(
    'label' => __('Padding Top','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_our_team_padding_top',
    'type'  => 'text'
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_team_padding_bottom',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_team_padding_bottom',array(
    'label' => __('Padding Bottom','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_our_team_padding_bottom',
    'type'  => 'text'
  ));

  /* ---------- Why Choose Us Padding ---------  */
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_section_ordering_why_choose_us_settings', array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_section_ordering_why_choose_us_settings', array(
    'label' => __('Why Choose Us Padding Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_why_choose_us_padding_top',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_why_choose_us_padding_top',array(
    'label' => __('Padding Top','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_why_choose_us_padding_top',
    'type'  => 'text'
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_why_choose_us_padding_bottom',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_why_choose_us_padding_bottom',array(
    'label' => __('Padding Bottom','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_why_choose_us_padding_bottom',
    'type'  => 'text'
  ));

  /* ---------- Our Blog Padding ---------  */
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_section_ordering_our_blog_settings', array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( new VW_Themes_Seperator_custom_Control( $wp_customize, 'vw_gardening_landscaping_pro_section_ordering_our_blog_settings', array(
    'label' => __('Our Blog Padding Settings','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings'
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_padding_top',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_blog_padding_top',array(
    'label' => __('Padding Top','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_our_blog_padding_top',
    'type'  => 'text'
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_our_blog_padding_bottom',array(
    'default'   => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_our_blog_padding_bottom',array(
    'label' => __('Padding Bottom','vw-gardening-landscaping-pro'),
    'description' => __('Add Padding Either in Percentage or Pixels ( Example 10px or 10%)','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_section_ordering_settings',
    'setting'   => 'vw_gardening_landscaping_pro_our_blog_padding_bottom',
    'type'  => 'text'
  ));

  //General Color Pallete
  $wp_customize->add_section('vw_gardening_landscaping_pro_color_pallette',array(
      'title' => __('Typography / General settings','vw-gardening-landscaping-pro'),
      'description'=> __('Typography settings','vw-gardening-landscaping-pro'),
      'panel' => 'vw_gardening_landscaping_pro_panel_id',
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_radio_boxed_full_layout',
      array(
    'default' => 'full-Width',
    'sanitize_callback' => 'vw_gardening_landscaping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('vw_gardening_landscaping_pro_radio_boxed_full_layout',
      array(
    'type' => 'radio',
    'label' => __('Choose Boxed or Full Width Layout', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'choices' => array(
    'full-Width' => __('Full Width', 'vw-gardening-landscaping-pro'),
    'boxed' => __('Boxed', 'vw-gardening-landscaping-pro')
      ),
  ));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_radio_boxed_full_layout_value',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_gardening_landscaping_pro_radio_boxed_full_layout_value',array(
    'label' => __('Add Boxed layout Width Here','vw-gardening-landscaping-pro'),
    'description' => __('Boxed width is always set more than 1140px.','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'setting' => 'vw_gardening_landscaping_pro_radio_boxed_full_layout_value',
    'type'    => 'text'
    )
  );

  //This is Button Text FontFamily picker setting
  $wp_customize->add_setting('vw_gardening_landscaping_pro_body_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_body_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_color_pallette',
    'label'    => __( 'Body Font family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_body_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_gardening_landscaping_pro_body_font_size',array(
      'label' => __('font size in px','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_color_pallette',
      'setting' => 'vw_gardening_landscaping_pro_body_font_size',
      'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_body_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_body_color', array(
    'label' => __('Body color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'settings' => 'vw_gardening_landscaping_pro_body_color',
  )));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_h1_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_h1_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_color_pallette',
    'label'    => __( 'H1','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_h1_font_size',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_gardening_landscaping_pro_h1_font_size',array(
    'label' => __('H1 font size in px','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'setting' => 'vw_gardening_landscaping_pro_h1_font_size',
    'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_h1_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_h1_color', array(
    'label' => __('H1 color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'settings' => 'vw_gardening_landscaping_pro_h1_color',
  )));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_h2_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'vw_gardening_landscaping_pro_h2_font_family', array(
      'section'  => 'vw_gardening_landscaping_pro_color_pallette',
      'label'    => __( 'H2','vw-gardening-landscaping-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_h2_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_gardening_landscaping_pro_h2_font_size',array(
      'label' => __('H2 font size in px','vw-gardening-landscaping-pro'),
      'section' => 'vw_gardening_landscaping_pro_color_pallette',
      'setting' => 'vw_gardening_landscaping_pro_h2_font_size',
      'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_h2_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_h2_color', array(
    'label' => __('H2 color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'settings' => 'vw_gardening_landscaping_pro_h2_color',
  )));

  $wp_customize->add_setting('vw_gardening_landscaping_pro_h3_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_h3_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_color_pallette',
    'label'    => __( 'H3','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_h3_font_size',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_gardening_landscaping_pro_h3_font_size',array(
    'label' => __('H3 font size in px','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'setting' => 'vw_gardening_landscaping_pro_h3_font_size',
    'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_h3_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_h3_color', array(
    'label' => __('H3 color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'settings' => 'vw_gardening_landscaping_pro_h3_color',
  )));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_h4_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_h4_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_color_pallette',
    'label'    => __( 'H4','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_h4_font_size',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_gardening_landscaping_pro_h4_font_size',array(
    'label' => __('H4 font size in px','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'setting' => 'vw_gardening_landscaping_pro_h4_font_size',
    'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_h4_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_h4_color', array(
    'label' => __('H4 color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'settings' => 'vw_gardening_landscaping_pro_h4_color',
  )));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_h5_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_h5_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_color_pallette',
    'label'    => __( 'H5','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_h5_font_size',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_gardening_landscaping_pro_h5_font_size',array(
    'label' => __('H5 font size in px','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'setting' => 'vw_gardening_landscaping_pro_h5_font_size',
    'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_h5_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_h5_color', array(
    'label' => __('H5 color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'settings' => 'vw_gardening_landscaping_pro_h5_color',
  )));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_h6_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_h6_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_color_pallette',
    'label'    => __( 'H6','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_h6_font_size',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_gardening_landscaping_pro_h6_font_size',array(
    'label' => __('H6 font size in px','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'setting' => 'vw_gardening_landscaping_pro_h6_font_size',
    'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_h6_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_h6_color', array(
    'label' => __('H6 Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'settings' => 'vw_gardening_landscaping_pro_h6_color',
  )));
  //paragarph font family
  $wp_customize->add_setting('vw_gardening_landscaping_pro_paragarpah_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
    'vw_gardening_landscaping_pro_paragarpah_font_family', array(
    'section'  => 'vw_gardening_landscaping_pro_color_pallette',
    'label'    => __( 'Paragraph Font Family','vw-gardening-landscaping-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));
  $wp_customize->add_setting('vw_gardening_landscaping_pro_para_font_size',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('vw_gardening_landscaping_pro_para_font_size',array(
    'label' => __('Paragraph Font Size in px','vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'setting' => 'vw_gardening_landscaping_pro_para_font_size',
    'type'    => 'text'
    )
  );
  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_para_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_para_color', array(
    'label' => __('Paragraph Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'settings' => 'vw_gardening_landscaping_pro_para_color',
  )));

  $wp_customize->add_setting( 'vw_gardening_landscaping_pro_global_color', array(
    'default' => '#73b21a',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_gardening_landscaping_pro_global_color', array(
    'label' => __('Global Color', 'vw-gardening-landscaping-pro'),
    'section' => 'vw_gardening_landscaping_pro_color_pallette',
    'settings' => 'vw_gardening_landscaping_pro_global_color',
  )));

?>