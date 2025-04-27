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

function my_custom_remove_storefront_header_cart() {
    remove_action( 'storefront_header', 'storefront_product_search', 40 );
    remove_action( 'storefront_header', 'storefront_header_cart', 60 );
    add_filter('storefront_credit_link', function(){ return false;});
}
add_action( 'init', 'my_custom_remove_storefront_header_cart' );

function my_custom_wp_footer(){
    ?>
        <style>
            /* Header background */
            .site-header {
                /* background-color: #6bcb5b; */
            }

            @media (min-width: 768px) {
                .site-header {
                    padding-top: 20px;
                }
            }

            .site-title a, .site-title a:hover{
                color: #000;
            }

            .storefront-primary-navigation{
                background-color: #000;
            }

            .main-navigation ul li a, 
            ul.menu li a, 
            button.menu-toggle, 
            button.menu-toggle:hover, 
            .handheld-navigation .dropdown-toggle {
                color: #FFFFFF;
            }            

            .main-navigation ul li a:hover, 
            .main-navigation ul li:hover > a,             
            .site-header ul.menu li.current-menu-item > a {
                color: #6bcb5b;
            }

            .main-navigation ul li.current_page_item a:hover{
                color: #fff;
            }

            @media (min-width: 768px) {
                .main-navigation ul.menu>li>a, .main-navigation ul.nav-menu>li>a {
                    padding: 1em 1em;
                }
            }

            .current_page_item{
                background-color: #6bcb5b;
            }

            .site-footer{
                background-color: #000;
                color: #FFF;
                /* display:none; */
            }

            #coming-soon-footer-banner{
                background-color: #000;
                color: #FFF;
            }

            #coming-soon-footer-banner a {
                color: #FFF;
            }

            #coming-soon-footer-banner a:hover {
                color: #6bcb5b;
            }

            .site-footer a:not(.button):not(.components-button) {
                color: #FFF;
            }


            .product-category a{
                background-color: #6bcb5b;
            }
            ul.products li.product.product-category img{
                margin-bottom:0;
            }
            .woocommerce-loop-category__title{
                background-color: #000;
                color: #FFFFFF;
                padding:20px 10px;
            }

            .product-category a:hover .woocommerce-loop-category__title, 
            .product-category a:hover .woocommerce-loop-category__title mark{
                color: #6bcb5b;
            }

            .woocommerce-loop-category__title mark{
                color: #FFFFFF;
            }

            .wc-block-grid__products .wc-block-grid__product img {
                margin-bottom:0;
            }

            .wc-block-grid__product-image,  .wc-block-grid__product-image img{
                margin-bottom:0;
                padding:0;
            }

            .hentry .entry-content .wc-block-grid__products .wc-block-grid__product>a{
                color:#fff;
            }

            .wc-block-grid__product .wc-block-grid__product-link {
                line-height:0;
            }

            .wc-block-grid__product .wc-block-grid__product-image:not(.wc-block-components-product-image){
                margin-bottom:0;
            }

            .wc-block-grid__product .wc-block-grid__product-title {
                margin-bottom:0;
            }

            a.wc-block-grid__product-link .wc-block-grid__product-title{
                background-color: #000;
                color: #FFFFFF;
                display:flex;
                align-items: center;
                justify-content: center;
                height:60px;
                margin-top:0;
                padding: 0 25px;
            }

            a.wc-block-grid__product-link:hover .wc-block-grid__product-title{
                color: #6bcb5b;
            }

            .wc-block-grid__product-price.price, .wp-block-button.wc-block-grid__product-add-to-cart{
                display:none;
            }
        </style>
    <?php
}

add_action( 'wp_footer', 'my_custom_wp_footer',999 );

add_filter('nav_menu_css_class', function ($classes, $item) {
    if ($item->current) {
        $classes[] = 'current-menu-item';
    }
    return $classes;
}, 10, 2);