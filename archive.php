<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package vw-gardening-landscaping-pro
 */
get_header(); ?>
<div class="container mt-5">
	<main id="maincontent" role="main">
	<header class="page-header">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );?>
	</header>
	<div class="row">
		<div class="col-lg-8 col-sm-6 col-md-8">
			<div class="row">
				<?php if ( have_posts() ) : ?>
					
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/post/post-content' );
					endwhile;?>
					<div class="navigation pagination">
						<?php // Previous/next page navigation.
						the_posts_pagination( array(
							'prev_text'          => __( 'Previous page', 'vw-gardening-landscaping-pro' ),
							'next_text'          => __( 'Next page', 'vw-gardening-landscaping-pro' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-gardening-landscaping-pro' ) . ' </span>',
						));?>

					</div>
				<?php else :
					get_template_part( 'no-results', 'archive' ); ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12" id="vw_gardening_sidebar">
			<?php get_sidebar( 'sidebar-2' ); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	</main>
</div>
<?php get_footer();  ?>