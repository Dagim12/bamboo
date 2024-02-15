<?php
/**
 * The Header for our theme.
 *
 * @package vw-gardening-landscaping-pro
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="shortcut icon" href="#">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css2?family=Krub:wght@700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
  <?php wp_body_open(); ?>
  <header role="banner" id="masthead" class="site-header">
   <a class="screen-reader-text skip-link" href="#maincontent" ><?php esc_html_e( 'Skip to content', 'vw-gardening-landscaping-pro' ); ?></a>
      <?php if( get_theme_mod('vw_gardening_landscaping_pro_products_spinner_enable',true) == "1") {?>
      <div class="spinner-loading-box">
        <ul class="preloader">
            <li>
                <div class="loader"></div>
                <div class="loading"></div>
            </li>
            <li>
                <div class="loader"></div>
                <div class="loading"></div>
            </li>
            <li>
                <div class="loader"></div>
                <div class="loading"></div>
            </li>
            <li>
                <div class="loader"></div>
                <div class="loading"></div>
            </li>
            <li>
                <div class="loader"></div>
                <div class="loading"></div>
            </li>
        </ul>
      </div>
    <?php } ?>
    <div id="vw_gardening_header">
      <?php $vw_gardening_landscaping_header_layout = get_theme_mod( 'vw_gardening_landscaping_main_header_layout','Default');
        if($vw_gardening_landscaping_header_layout == 'Default'){ ?>
          <?php get_template_part('template-parts/header/topbar'); ?>
        <?php }else if($vw_gardening_landscaping_header_layout == 'Layout 2'){ ?>
          <?php get_template_part('template-parts/header/topbar-layout'); ?>
        <?php } ?>
      <div id="header-menu">
        <?php $vw_gardening_landscaping_header_layout = get_theme_mod( 'vw_gardening_landscaping_main_header_layout','Default');
        if($vw_gardening_landscaping_header_layout == 'Default'){ ?>
          <div class="header-wrap text-center">
            <?php get_template_part('template-parts/header/content-header'); ?>
          </div>
        <?php }else if($vw_gardening_landscaping_header_layout == 'Layout 2'){ ?>
          <div class="header-wrap-second text-center">
            <?php get_template_part('template-parts/header/header-layout'); ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </header>