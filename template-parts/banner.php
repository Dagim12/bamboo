<?php
if ( ! is_singular() ) {
	return;
}
global $post;
$img = get_post_meta($post->ID, 'vw_title_banner_image_wp_custom_attachment', true);
$display = '';
$display_title_bbanner = '';
$vw_title_banner_image_title_on_off = get_post_meta($post->ID, 'vw_title_banner_image_title_on_off', true);
if($vw_title_banner_image_title_on_off == 'on') $display = 'style=display:none;';
$vw_title_banner_image_title_below_on_off = get_post_meta($post->ID, 'vw_title_banner_image_title_below_on_off', true);
if($vw_title_banner_image_title_below_on_off != 'on') $display_title_bbanner = 'style=display:none;';
if( $img != '' ){ ?>
	<div class="title-box">
		<div class="container" <?php echo esc_attr($display); ?>>
			<div class="above_title ">
				<h1><?php the_title();?></h1>
			</div>
		</div>
		<img src="<?php echo esc_url($img); ?>" >
	</div>
	<?php $theme_lay = get_theme_mod( 'vw_gardening_landscaping_pro_single_blog_option','Left');
      if($theme_lay == 'Left'){ ?>
	<div class="container main_title" <?php echo esc_attr($display_title_bbanner); ?>>
			<h1><?php the_title();?></h1>
		</div>
	<?php }else if($theme_lay == 'Center'){ ?>
		<div class="container main_title" <?php echo esc_attr($display_title_bbanner); ?>>
			<h1><?php the_title();?></h1>
		</div>
	<?php }else if($theme_lay == 'Right'){ ?>
		<div class="container main_title" <?php echo esc_attr($display_title_bbanner); ?>>
			<h1><?php the_title();?></h1>
		</div>
	<?php } ?>
<?php }else{ ?>
	<div class="container main_title">
		<h1><?php the_title();?></h1>
	</div>
<?php } ?>