<?php
/**
 * Template Name:Elementor Template
 */
get_header();
if ( (ThemeWhizzie::get_the_validation_status() === 'true') && (ThemeWhizzie::get_the_suspension_status() == 'false') ) {
?>
	<?php if(defined('ELEMENTOR_VERSION')){ ?>
		<div id="content-area">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; wp_reset_query(); ?>
		</div>
	<?php } } ?>
<?php get_footer(); ?>