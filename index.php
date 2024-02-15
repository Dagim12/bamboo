<?php
/**
 * The template for displaying index page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package vw-gardening-landscaping-pro
 */
get_header();
?>
<?php do_action( 'vw_gardening_landscaping_pro_after_defaulttitle' ); ?>
<div class="post-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<?php while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/post/post-content' );
					endwhile; ?>
				</div>
			  <div class="navigation">
				<?php // Previous/next page navigation.
				  the_posts_pagination( array(
					  'prev_text'          => __( 'Previous page', 'vw-gardening-landscaping-pro' ),
					  'next_text'          => __( 'Next page', 'vw-gardening-landscaping-pro' ),
					  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-gardening-landscaping-pro' ) . ' </span>',
				  )); ?>
			  </div>
			</div>
			<div class="col-md-4" id="vw_gardening_sidebar"><?php get_sidebar( 'sidebar-1' ); ?></div>
		</div>
	</div>
</div>
<?php get_footer();  ?>