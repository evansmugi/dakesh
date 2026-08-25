<?php
/**
 * DAKESH SUPPLIES - VERIFICATION & QUALITY AUDIT SUITE
 */

define('ABSPATH', __DIR__ . '/');
$_SERVER['HTTP_HOST'] = 'dakesh.test';
$_SERVER['REQUEST_SCHEME'] = 'https';
require_once ABSPATH . 'wp-load.php';
wp_set_current_user(1);

echo "=======================================================\n";
echo " DAKESH AUDIT & COMPREHENSIVE VERIFICATION SUITE       \n";
echo "=======================================================\n\n";

$pass = 0;
$fail = 0;

function audit_check($title, $condition, $info = '') {
    global $pass, $fail;
    if ($condition) {
        echo "  [PASS] $title" . ($info ? " ($info)" : "") . "\n";
        $pass++;
    } else {
        echo "  [FAIL] $title" . ($info ? " ($info)" : "") . "\n";
        $fail++;
    }
}

// 1. Theme and Kit
$theme = wp_get_theme();
audit_check("Active Theme Name", $theme->get('Name') === 'Dakesh Theme', $theme->get('Name'));
audit_check("Active Parent Theme", $theme->get_template() === 'hello-elementor', $theme->get_template());

$kit_meta = get_post_meta(12, '_elementor_page_settings', true);
audit_check("Elementor Default Kit (ID 12) Settings Configured", !empty($kit_meta) && isset($kit_meta['system_colors']), 'Colors & Container Width set');

// 2. Core Pages Check
$pages_to_verify = [
    28 => 'Home',
    23 => 'Shop',
    29 => 'About Us',
    26 => 'My Account',
    30 => 'Contact Us',
    24 => 'Cart',
];

echo "\n--- Checking Core 6 Pages ---\n";
foreach ($pages_to_verify as $id => $name) {
    $p = get_post($id);
    $edit_mode = get_post_meta($id, '_elementor_edit_mode', true);
    $template = get_post_meta($id, '_wp_page_template', true);
    $data = get_post_meta($id, '_elementor_data', true);
    $data_len = strlen($data);

    audit_check(
        "Page: $name (ID $id)",
        $p && $edit_mode === 'builder' && $template === 'elementor_header_footer' && $data_len > 100,
        "EditMode: '$edit_mode', Template: '$template', Data length: $data_len bytes"
    );
}

// 3. Theme Builder Header and Footer Templates
echo "\n--- Checking Elementor Pro Theme Builder Templates ---\n";
$conditions = get_option('elementor_pro_theme_builder_conditions', []);

$has_header = !empty($conditions['header']);
$has_footer = !empty($conditions['footer']);

audit_check("Global Header Registered in Theme Builder Conditions", $has_header, json_encode($conditions['header'] ?? []));
audit_check("Global Footer Registered in Theme Builder Conditions", $has_footer, json_encode($conditions['footer'] ?? []));

// 4. WooCommerce Config & Inventory
echo "\n--- Checking WooCommerce Core Integration ---\n";
audit_check("WooCommerce Active", class_exists('WooCommerce'));

$products_count = count(wc_get_products(['limit' => -1]));
audit_check("WooCommerce Product Inventory", $products_count >= 20, "Total published products: $products_count");

$cats_count = count(get_terms(['taxonomy' => 'product_cat']));
audit_check("Product Categories", $cats_count >= 5, "Total categories: $cats_count");

audit_check("Front Page Option", get_option('page_on_front') == 28 && get_option('show_on_front') === 'page', "Page ID 28 set as front page");
audit_check("WooCommerce Shop Page Option", get_option('woocommerce_shop_page_id') == 23, "Page ID 23 set as shop page");
audit_check("WooCommerce Cart Page Option", get_option('woocommerce_cart_page_id') == 24, "Page ID 24 set as cart page");
audit_check("WooCommerce My Account Page Option", get_option('woocommerce_myaccount_page_id') == 26, "Page ID 26 set as account page");

echo "\n=======================================================\n";
echo " AUDIT SUMMARY: $pass PASSED | $fail FAILED \n";
echo "=======================================================\n";
