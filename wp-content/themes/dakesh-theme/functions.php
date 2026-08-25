<?php
/**
 * Dakesh Theme - Child of Hello Elementor
 * Luxury E-Commerce Master Engine
 *
 * @package DakeshTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Enqueue Assets (Styles & Scripts)
 */
function dakesh_theme_enqueue_assets() {
    // Parent theme style
    wp_enqueue_style(
        'hello-elementor',
        get_template_directory_uri() . '/style.css',
        [],
        wp_get_theme('hello-elementor')->get('Version')
    );

    // Child theme main style
    wp_enqueue_style(
        'dakesh-theme',
        get_stylesheet_uri(),
        ['hello-elementor'],
        wp_get_theme()->get('Version')
    );

    // Dakesh Master Luxury Commerce CSS
    wp_enqueue_style(
        'dakesh-luxury-commerce',
        get_stylesheet_directory_uri() . '/assets/css/dakesh-luxury-commerce.css',
        ['dakesh-theme'],
        '1.0.0'
    );

    // Dakesh Master Luxury Commerce JS
    wp_enqueue_script(
        'dakesh-commerce-js',
        get_stylesheet_directory_uri() . '/assets/js/dakesh-commerce.js',
        ['jquery'],
        '1.0.0',
        true
    );

    // Pass AJAX params
    wp_localize_script('dakesh-commerce-js', 'dakesh_params', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'cart_url' => wc_get_cart_url(),
    ]);
}
add_action('wp_enqueue_scripts', 'dakesh_theme_enqueue_assets', 20);

/**
 * 2. Setup Theme Supports
 */
function dakesh_theme_setup() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'dakesh_theme_setup');

/**
 * 3. Elementor Pro Theme Builder Location Registration
 */
function dakesh_register_elementor_locations($elementor_theme_manager) {
    $elementor_theme_manager->register_location('header');
    $elementor_theme_manager->register_location('footer');
}
add_action('elementor/theme/register_locations', 'dakesh_register_elementor_locations');

/**
 * 4. WooCommerce Cart Fragment Live Count Update
 */
function dakesh_cart_count_fragment($fragments) {
    ob_start();
    $count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
    ?>
    <span class="dakesh-cart-count" id="dakesh-cart-count"><?php echo esc_html($count); ?></span>
    <?php
    $fragments['span#dakesh-cart-count'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'dakesh_cart_count_fragment');

/**
 * 5. Wrap WooCommerce Quantity Inputs in Stepper Controls
 */
function dakesh_quantity_input_stepper_wrapper($html, $product) {
    if (is_cart() || is_product() || is_shop()) {
        ob_start();
        ?>
        <div class="dakesh-stepper">
            <button type="button" class="dakesh-stepper-btn minus">-</button>
            <?php echo $html; ?>
            <button type="button" class="dakesh-stepper-btn plus">+</button>
        </div>
        <?php
        return ob_get_clean();
    }
    return $html;
}
add_filter('woocommerce_quantity_input_markup', 'dakesh_quantity_input_stepper_wrapper', 10, 2);

/**
 * 6. Set Front Page and WooCommerce Special Pages Settings automatically
 */
function dakesh_ensure_pages_config() {
    if (!current_user_can('manage_options')) {
        wp_set_current_user(1);
    }
    update_option('show_on_front', 'page');
    update_option('page_on_front', 28); // Home Page
    update_option('woocommerce_shop_page_id', 23);
    update_option('woocommerce_cart_page_id', 24);
    update_option('woocommerce_checkout_page_id', 25);
    update_option('woocommerce_myaccount_page_id', 26);
}
add_action('init', 'dakesh_ensure_pages_config');

