<div class="copyright">
	<div class="container">
		<div class="row copy-text align-items-center d-flex">
			<?php if(get_theme_mod('vw_gardening_landscaping_pro_footer_footer_logo')!=''){ ?>
				<div class="col-lg-3 col-md-4">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_footer_footer_logo')); ?>" alt="<?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_footer_footer_logo_alt_text')); ?>" class="footer-logo"></a>
				</div>
			<?php } ?>
			<div class="col-lg-6 col-md-8">
				<p class="text-center"><?php echo ( get_theme_mod( 'vw_gardening_landscaping_pro_footer_copy' ) ); ?><?php if ( get_theme_mod('vw_gardening_landscaping_pro_footer_show_hide_credit_link',true) == "1" ) { ?><span class="credit_link"><?php echo esc_html( vw_gardening_landscaping_pro_credit_link() ); ?></span><?php } ?></p>
			</div>
			<div class="col-lg-3 col-md-12 copyright-icon justify-content-end">
				<?php get_template_part( 'template-parts/home/social-icons' ); ?>
			</div>
			<?php if ( get_theme_mod('vw_gardening_landscaping_pro_genral_section_show_scroll_top',true) == "1" ) { ?>
			<a href="javascript:" id="return-to-top"><i class="fas fa-angle-double-up"></i></a>
		<?php }?>
		</div>
	</div>
</div>