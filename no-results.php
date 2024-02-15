<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package vw-gardening-landscaping-pro
 */
?>
<header class="mt-5">
	<h3 class="entry-title"><?php esc_html_e( 'No Search Results Showing', 'vw-gardening-landscaping-pro' ); ?></h3>
</header>
<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
<?php elseif ( is_search() ) : ?>
	<h4><?php esc_html_e('SUGGESTIONS:','vw-gardening-landscaping-pro')?></h4>
	<ul>
		<li>
			<?php esc_html_e('Make sure all words are spelled correctly','vw-gardening-landscaping-pro') ?>
		</li>
		<li>
			<?php esc_html_e('Wildcard searches (using the asterisk *) are not supported','vw-gardening-landscaping-pro') ?>
		</li>
		<li>
			<?php esc_html_e('Try more general keywords, especially if you are attempting a name','vw-gardening-landscaping-pro') ?>
		</li>
	</ul><br/>
		<?php get_search_form(); ?>
<?php else : ?>
	<p><?php esc_html_e( 'Don\'t worry &hellip; it happens to the best of us.', 'vw-gardening-landscaping-pro' ); ?></p>
	<br />
	<div class="read-moresec">
		<div><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Back to Home Page', 'vw-gardening-landscaping-pro' ); ?></a></div>
	</div>
<?php endif; ?>