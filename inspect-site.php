<?php
define('ABSPATH', __DIR__ . '/');
$_SERVER['HTTP_HOST'] = 'dakesh.test';
$_SERVER['REQUEST_SCHEME'] = 'https';
require_once ABSPATH . 'wp-load.php';

echo "=== WP INFO ===\n";
echo "Site Name: " . get_bloginfo('name') . "\n";
echo "Site URL: " . get_bloginfo('url') . "\n";
echo "Theme: " . wp_get_theme()->get('Name') . " (Parent: " . wp_get_theme()->get_template() . ")\n";
echo "Active Plugins:\n";
foreach (get_option('active_plugins') as $plugin) {
    echo " - $plugin\n";
}

echo "\n=== PAGES ===\n";
$pages = get_pages(['post_status' => 'publish,draft,private']);
foreach ($pages as $p) {
    echo "ID: {$p->ID} | Title: {$p->post_title} | Slug: {$p->post_name} | Status: {$p->post_status} | Template: " . get_post_meta($p->ID, '_wp_page_template', true) . "\n";
}

echo "\n=== WOOCOMMERCE SPECIAL PAGES ===\n";
echo "Shop Page ID: " . wc_get_page_id('shop') . " (" . get_the_title(wc_get_page_id('shop')) . ")\n";
echo "Cart Page ID: " . wc_get_page_id('cart') . " (" . get_the_title(wc_get_page_id('cart')) . ")\n";
echo "Checkout Page ID: " . wc_get_page_id('checkout') . " (" . get_the_title(wc_get_page_id('checkout')) . ")\n";
echo "My Account Page ID: " . wc_get_page_id('myaccount') . " (" . get_the_title(wc_get_page_id('myaccount')) . ")\n";
echo "Front Page ID: " . get_option('page_on_front') . "\n";

echo "\n=== PRODUCTS SUMMARY ===\n";
$products = wc_get_products(['limit' => -1]);
echo "Total Products: " . count($products) . "\n";
$cats = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => false]);
echo "Total Categories: " . count($cats) . "\n";
foreach ($cats as $c) {
    echo " - {$c->name} (Slug: {$c->slug}, Count: {$c->count})\n";
}

echo "\n=== ELEMENTOR TEMPLATES / THEME BUILDER ===\n";
$templates = get_posts([
    'post_type' => ['elementor_library'],
    'posts_per_page' => -1,
    'post_status' => 'any'
]);
echo "Total Elementor Templates: " . count($templates) . "\n";
foreach ($templates as $t) {
    $type = get_post_meta($t->ID, '_elementor_template_type', true);
    echo "ID: {$t->ID} | Title: {$t->post_title} | Type: {$type}\n";
}
