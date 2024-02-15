<?php 
/**
 * Template to show the content of Our Products
 *
 * @package vw-gardening-landscaping-pro
 */ 
$about_section = get_theme_mod( 'vw_gardening_landscaping_pro_our_products_enable' );
if ( 'Disable' == $about_section ) {
  return;
}
$img_bg = get_theme_mod('vw_gardening_landscaping_pro_our_products_bgimage_setting'); ?>
<section id="our-products" class="<?php echo esc_attr($img_bg); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 our-products-head text-center bpadding-40 wow fadeInDown delay-1000 animated" data-wow-duration="3s">
                <?php if(get_theme_mod('vw_gardening_landscaping_pro_our_products_small_heading')!=''){ ?>
                    <p class="section-small_title">
                      <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_small_heading')); ?>
                    </p>
                <?php } if(get_theme_mod('vw_gardening_landscaping_pro_our_products_heading')!=''){ ?>
                    <h2 class="section-main_title">
                      <?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_our_products_heading')); ?>
                    </h2>
                <?php } ?>
            </div>
        </div>
        <?php if ( class_exists( 'WooCommerce' ) ) { ?>
            <div class="owl-carousel">
                <?php
                $args = array( 
                'post_type' => 'product', 
                'posts_per_page' => get_theme_mod('vw_gardening_landscaping_pro_our_products_number'),
                'product_cat' => get_theme_mod('vw_gardening_landscaping_pro_products_category')                );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                    <div class="inner_product our-products-content text-center wow fadeInUp delay-1000 animated" data-wow-duration="3s">
                        <div class="product-image">
                            <div class="product-sale feature-heading"><?php woocommerce_show_product_sale_flash( $post, $product ); ?></div>
                            <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" alt="Placeholder" />'; ?> 
                        </div>
                        <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>" class="product-title"><span class="screen-reader-text"><?php echo esc_html('product tittle', 'vw-gardening-landscaping-pro') ; ?></span>
                        <h6 class="content-para"><?php the_title(); ?><span class="screen-reader-text"><?php echo esc_html('product prices tittle', 'vw-gardening-landscaping-pro') ; ?></span></h6></a>                        
                        <div class="product-price">
                            <?php echo $product->get_price_html(); ?><span class="screen-reader-text"><?php echo esc_html('product prices', 'vw-gardening-landscaping-pro') ; ?></span>
                        </div>                        
                        <div class="product-price">
                            <div class="product-cartborder">
                                <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_add_to_cart( $loop->post, $product ); } ?>
                            </div>
                        </div> 
                        <div class="rating_comment text-center mt-2">
                            <div class="product-rating"> 
                                <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                            </div>
                            <div class="comment-value font-famrubik font-weight400">
                                <?php $rating_count = $product->get_rating_count(); 
                                if ($rating_count > 0) {
                                    echo '('. $rating_count.')';
                                  }
                                ?>
                            </div>
                        </div>                      
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </div>
        <?php } else{ ?>
            <h3 class="post-type-msg text-center"><?php echo esc_html_e('Install WooCommerce plugin and add your product details to enable this section','vw-gardening-landscaping-pro')?></h3>
        <?php } ?>
    </div>
</section>