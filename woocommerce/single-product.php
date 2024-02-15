<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header();  
if(get_theme_mod('vw_gardening_landscaping_pro_products_single_page_sidebar',true)=='1') {
	$postcol1="col-lg-9 col-md-12";
	$postcol2="col-lg-3 col-md-12";
	
}else {
	$postcol1="col-lg-12 col-md-12";
	$postcol2="";
}
?>
<main id="maincontent" role="main">
<div class="container shop" id="single-product-page">
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	<div class="row">
		<div class="<?php echo esc_html($postcol1); ?>">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>
		</div>
		<?php if(get_theme_mod('vw_gardening_landscaping_pro_products_single_page_sidebar',true)=='1'){ ?>
			<div class="<?php echo esc_html($postcol2); ?>" id="vw_gardening_sidebar">
				<?php
					/**
					 * woocommerce_sidebar hook.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					// do_action( 'woocommerce_sidebar' );
					dynamic_sidebar('sidebar-1');
				?>
			</div>
		<?php } ?>
	</div>
		<?php
			/**
			 * woocommerce_after_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>
</div>
</main>

<?php get_footer();
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */