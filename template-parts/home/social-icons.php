<?php
/**
 * The Template for displaying Social Icons.
 */
 ?>
<?php if( get_theme_mod('vw_gardening_landscaping_pro_headertwitter') != '' || get_theme_mod('vw_gardening_landscaping_pro_headerinstagram') != '' || get_theme_mod('vw_gardening_landscaping_pro_headerfacebook') != '' || get_theme_mod('vw_gardening_landscaping_pro_headeryoutube') != '' || get_theme_mod('vw_gardening_landscaping_pro_headerpinterest') != '' || get_theme_mod('vw_gardening_landscaping_pro_headerlinkedin') != '' || get_theme_mod('vw_gardening_landscaping_pro_headertumblric') != '' || get_theme_mod('vw_gardening_landscaping_pro_headerflickr') != '' || get_theme_mod('vw_gardening_landscaping_pro_headervk') != ''){ ?>
  <div class="socialbox">
    <?php if( get_theme_mod('vw_gardening_landscaping_pro_headertwitter') != '' ){ ?>
      <a class="twitter" href="<?php echo esc_url( get_theme_mod( 'vw_gardening_landscaping_pro_headertwitter' ) ); ?>" target="_blank"><i class="fab fa-twitter align-middle"></i></a>
    <?php } ?>
    <?php if( get_theme_mod('vw_gardening_landscaping_pro_headerinstagram') != '' ){ ?>
      <a class="insta" href="<?php echo esc_url( get_theme_mod( 'vw_gardening_landscaping_pro_headerinstagram' ) ); ?>" target="_blank"><i class="fab fa-instagram align-middle"></i></a>
    <?php } ?>
    <?php if( get_theme_mod('vw_gardening_landscaping_pro_headerfacebook') != '' ){ ?>
      <a class="facebook" href="<?php echo esc_url( get_theme_mod( 'vw_gardening_landscaping_pro_headerfacebook' ) ); ?>" target="_blank"><i class="fab fa-facebook-f align-middle "></i></a>
    <?php } ?>
    <?php if( get_theme_mod('vw_gardening_landscaping_pro_headeryoutube') != '' ){ ?>
      <a class="youtube" href="<?php echo esc_url( get_theme_mod( 'vw_gardening_landscaping_pro_headeryoutube') ); ?>" target="_blank"><i class="fab fa-youtube align-middle"></i></a>
    <?php } ?>
    <?php if( get_theme_mod('vw_gardening_landscaping_pro_headerpinterest') != '' ){ ?>
      <a class="pintrest" href="<?php echo esc_url( get_theme_mod( 'vw_gardening_landscaping_pro_headerpinterest' ) ); ?>" target="_blank"><i class="fab fa-pinterest-p align-middle "></i></a>
    <?php } ?>
    <?php if( get_theme_mod('vw_gardening_landscaping_pro_headerlinkedin') != '' ){ ?>
      <a class="linkedin" href="<?php echo esc_url( get_theme_mod( 'vw_gardening_landscaping_pro_headerlinkedin' ) ); ?>" target="_blank"><i class="fab fa-linkedin-in align-middle"></i></a>
    <?php } ?>
    <?php if( get_theme_mod('vw_gardening_landscaping_pro_headertumblric') != '' ){ ?>
      <a class="tumbler" href="<?php echo esc_url( get_theme_mod( 'vw_gardening_landscaping_pro_headertumblric' ) ); ?>" target="_blank"><i class="fab fa-tumblr align-middle"></i></a>
    <?php } ?>
    <?php if( get_theme_mod('vw_gardening_landscaping_pro_headerflickr') != '' ){ ?>
      <a class="flicker" href="<?php echo esc_url( get_theme_mod( 'vw_gardening_landscaping_pro_headerflickr') ); ?>" target="_blank"><i class="fab fa-flickr align-middle "></i></a>
    <?php } ?>
    <?php if( get_theme_mod('vw_gardening_landscaping_pro_headervk') != '' ){ ?>
      <a class="vk" href="<?php echo esc_url( get_theme_mod( 'vw_gardening_landscaping_pro_headervk') ); ?>" target="_blank"><i class="fab fa-vk align-middle "></i></a>
    <?php } ?>
  </div>
<?php } ?>