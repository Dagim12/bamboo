<?php
/**
 * The template for displaying search forms in vw-gardening-landscaping-pro
 *
 * @package vw-gardening-landscaping-pro
 */
?>
<form role="search" method="get" class="search-form serach-page" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
    	<span class="screen-reader-text">Search for:</span>
        <input type="search" class="search-field" placeholder="<?php if (get_theme_mod('vw_gardening_landscaping_pro_header_search_placeholder_text')!==''){?><?php echo esc_html(get_theme_mod('vw_gardening_landscaping_pro_header_search_placeholder_text','placeholder'));}?>" value="<?php echo esc_attr(the_search_query()); ?>" name="s">
    </label>
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'vw-gardening-landscaping-pro' ); ?>"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'vw-gardening-landscaping-pro' ); ?></span>
</form>