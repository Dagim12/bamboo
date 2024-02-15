<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package vw-gardening-landscaping-pro
 */
get_header(); ?>

<div class="container">
	<div class="middle-align dfgdgdfgdf">
		<?php $theme_lay = get_theme_mod( 'vw_gardening_landscaping_pro_page_title_content_option','Left');
	      if($theme_lay == 'Left'){ ?>
			<h1 class="entry-title"><?php printf( __( 'Results For: %s', 'vw-gardening-landscaping-pro' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php }else if($theme_lay == 'Center'){ ?>
			<h1 class="entry-title"><?php printf( __( 'Results For: %s', 'vw-gardening-landscaping-pro' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php }else if($theme_lay == 'Right'){ ?>
			<h1 class="entry-title"><?php printf( __( 'Results For: %s', 'vw-gardening-landscaping-pro' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php } ?>		
		<div class="row">
			<div class="col-lg-8 col-sm-6 col-md-12">
				<div class="row search-result">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/post/post-content' );
						endwhile; ?>
						<div class="navigation">
							<?php // Previous/next page navigation.
							the_posts_pagination( array(
								  'prev_text'          => __( 'Previous page', 'vw-gardening-landscaping-pro' ),
								  'next_text'          => __( 'Next page', 'vw-gardening-landscaping-pro' ),
								  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-gardening-landscaping-pro' ) . ' </span>',
							)); ?>
						</div>
					<?php else : ?>
						<?php get_template_part( 'no-results', 'search' ); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-4 col-md-12 col-sm-6" id="vw_gardening_sidebar"> 
				<?php dynamic_sidebar('page'); ?>
			</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>