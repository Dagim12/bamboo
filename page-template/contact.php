<?php
/**
 * Template Name: Contact
*/
get_header(); 
get_template_part( 'template-parts/banner' );?>
<?php do_action('vw_gardening_landscaping_pro_before_contact_title'); ?>
<div class="contact-box">
	<main id="maincontent" role="main">
		<div class="container-fluid">
			<div class="row">
				<?php 
				if( get_theme_mod('vw_gardening_landscaping_pro_contact_info_bgcolor') ) {
				  $continfo_backg = 'background-color:'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_contact_info_bgcolor')).';';
				}elseif( get_theme_mod('vw_gardening_landscaping_pro_contact_info_bgimage') ){
				  $continfo_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_gardening_landscaping_pro_contact_info_bgimage')).'\')';
				}else{
				  $continfo_backg = '';
				} ?>
				<div class="col-lg-6 col-md-6 addres-main-box" style="<?php echo esc_attr($continfo_backg); ?>">
					<div class="contact-info-head"> 
						<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_small_head',true) != ""){?>
							<span><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_small_head')); ?></span>
						<?php } ?>
						<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_head',true) != ""){?>
							<h3><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_head')); ?></h3>
						<?php } ?>
					</div>
					<div class="addres-info-box">
						<div class="add-box">
							<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_add_img',true) != ""){ ?>
								<img src="<?php echo esc_url(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_add_img')); ?>">
							<?php } ?>
							<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_add_head',true) != ""){?>
								<h4><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_add_head')); ?></h4>
							<?php } ?>
							<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_address',true) != ""){?>
								<p><a href="http://maps.google.com/?q=1200 <?php echo esc_html(get_theme_mod('vw_bakery_pro_contact_page_location_address')); ?>" target="_blank"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_address')); ?></a></p>
							<?php } ?>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="add-box">
									<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_email_phone_img',true) != ""){ ?>
										<img src="<?php echo esc_url(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_email_phone_img')); ?>">
									<?php } ?>
									<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_email_phone_title',true) != ""){?>
										<h4><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_email_phone_title')); ?></h4>
									<?php } ?>
									<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_email_phone_num',true) != ""){?>
										<p><a href="tel:<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_email_phone_num')); ?>"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_email_phone_num')); ?></a></p>
									<?php } ?>
									<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_email_address',true) != ""){?>
										<p><a href="mailto:<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_email_address')); ?>"><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_email_address')); ?></a></p>
									<?php } ?>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="add-box">
									<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_time_img',true) != ""){ ?>
										<img src="<?php echo esc_url(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_time_img')); ?>">
									<?php } ?>
									<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_time_title',true) != ""){?>
										<h4><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_time_title')); ?></h4>
									<?php } ?>
									<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_time_one',true) != ""){?>
										<p><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_time_one')); ?></p>
									<?php } ?>
									<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_time_two',true) != ""){?>
										<p><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_contactpage_info_time_two')); ?></p>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php 
				if( get_theme_mod('vw_gardening_landscaping_pro_contact_form_bgcolor') ) {
				  $contform_backg = 'background-color:'.esc_attr(get_theme_mod('vw_gardening_landscaping_pro_contact_form_bgcolor')).';';
				}elseif( get_theme_mod('vw_gardening_landscaping_pro_contact_form_bgimage') ){
				  $contform_backg = 'background-image:url(\''.esc_url(get_theme_mod('vw_gardening_landscaping_pro_contact_form_bgimage')).'\')';
				}else{
				  $contform_backg = '';
				} ?>
				<div class="col-lg-6 col-md-6 addres-main-box" style="<?php echo esc_attr($contform_backg); ?>">
					<div class="contact-form-head"> 
						<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_form_small_head',true) != ""){?>
							<span><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_contactpage_form_small_head')); ?></span>
						<?php } ?>
						<?php if (get_theme_mod('vw_gardening_landscaping_pro_contactpage_form_head',true) != ""){?>
							<h3><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_contactpage_form_head')); ?></h3>
						<?php } ?>
					</div>
					<div class="contact-form-box">
						<?php echo do_shortcode(get_theme_mod('vw_gardening_landscaping_pro_contactpage_form_code')); ?>
					</div>
				</div>
			</div>
		</div>	
	</main>
	<?php do_action('vw_gardening_landscaping_pro_before_map'); ?>
		<div class="google-map p-0" id="map">
			<?php if ( get_theme_mod('vw_gardening_landscaping_pro_address_latitude',true) != "" && get_theme_mod('vw_gardening_landscaping_pro_address_longitude',true) != "" ) {?>
			  	<embed width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo esc_attr(get_theme_mod('vw_gardening_landscaping_pro_address_latitude')); ?>,<?php echo esc_attr(get_theme_mod('vw_gardening_landscaping_pro_address_longitude')); ?>&hl=es;z=14&amp;output=embed"></embed>
			<?php }?>
		</div>
	<?php do_action('vw_gardening_landscaping_pro_after_map'); ?>
</div>
<?php do_action('vw_gardening_landscaping_pro_before_footer'); ?>

<?php get_footer(); ?>