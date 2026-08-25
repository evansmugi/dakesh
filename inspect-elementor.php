<?php
define('ABSPATH', __DIR__ . '/');
$_SERVER['HTTP_HOST'] = 'dakesh.test';
$_SERVER['REQUEST_SCHEME'] = 'https';
require_once ABSPATH . 'wp-load.php';

echo "=== DEFAULT KIT META (ID 12) ===\n";
$kit_meta = get_post_meta(12, '_elementor_page_settings', true);
print_r($kit_meta);

echo "\n=== FOOTER META (ID 304) ===\n";
$footer_data = get_post_meta(304, '_elementor_data', true);
echo "Footer Data Length: " . strlen($footer_data) . "\n";

echo "\n=== CHECKING ALL ELEMENTOR LIBRARIES ===\n";
$libs = get_posts(['post_type' => 'elementor_library', 'posts_per_page' => -1]);
foreach ($libs as $l) {
    echo "ID: {$l->ID} | Title: {$l->post_title} | Type: " . get_post_meta($l->ID, '_elementor_template_type', true) . " | Conditions: " . json_encode(get_post_meta($l->ID, '_elementor_conditions', true)) . "\n";
}
