<?php
function storefront_child_enqueue_styles() {
    wp_enqueue_style('storefront-child-style', get_stylesheet_uri(), array('storefront-style'), wp_get_theme()->get('Version'));
	
	 wp_enqueue_style(
        'custom-tab-styles',
        get_stylesheet_directory_uri() . '/tab-styles.css',
        array(), // Dependencies, if any
        null // Version number
    );
	
}
add_action('wp_enqueue_scripts', 'storefront_child_enqueue_styles');
/*
function enqueue_custom_tabs_script() {
    wp_enqueue_script(
        'custom-tabs-script',
        get_stylesheet_directory_uri() . '/custom-tabs.js',
        array('jquery'), // Dependencies, if any
        null, // Version
        true  // Load in footer
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_tabs_script');
*/
function enqueue_custom_tabs_script() {
    if (is_product()) {
        wp_enqueue_script(
            'custom-tabs',
            get_stylesheet_directory_uri() . '/custom-tabs.js',
            array('jquery'),
            '1.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_tabs_script');


function wc_remove_reviews_tab($tabs) {
    unset($tabs['reviews']); // Remove the reviews tab
	 unset($tabs['description']); // Remove the reviews tab
    return $tabs;
}
add_filter('woocommerce_product_tabs', 'wc_remove_reviews_tab', 98);


function wc_display_product_description() {
    global $post;
    $product = wc_get_product($post->ID);
    if ($product->get_description()) {
        echo '<div class="custom-product-description">';
        echo $product->get_description(); // Outputs the product description
        echo '</div>';
    }
}
add_action('woocommerce_after_single_product_summary', 'wc_display_product_description', 15);



?>
