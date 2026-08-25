<?php
define('ABSPATH', __DIR__ . '/');
$_SERVER['HTTP_HOST'] = 'dakesh.test';
$_SERVER['REQUEST_SCHEME'] = 'https';
require_once ABSPATH . 'wp-load.php';

$page_ids = [28 => 'Home', 23 => 'Shop', 29 => 'About Us', 26 => 'My Account', 30 => 'Contact Us', 24 => 'Cart'];

foreach ($page_ids as $id => $title) {
    $edit_mode = get_post_meta($id, '_elementor_edit_mode', true);
    $data = get_post_meta($id, '_elementor_data', true);
    $template = get_post_meta($id, '_wp_page_template', true);
    $content = get_post($id)->post_content;
    echo "Page: $title (ID $id) | Edit Mode: '$edit_mode' | Template: '$template' | Elementor Data Length: " . strlen($data) . " | WP Content Length: " . strlen($content) . "\n";
}
