<?php
/**
 * Activate Dakesh Theme (child of Hello Elementor)
 */
define('ABSPATH', __DIR__ . '/');
$_SERVER['HTTP_HOST'] = 'dakesh.test';
$_SERVER['REQUEST_SCHEME'] = 'https';
require_once ABSPATH . 'wp-load.php';

// Activate dakesh-theme (child of hello-elementor)
switch_theme('dakesh-theme');

$current = wp_get_theme();
echo "Active theme: " . $current->get('Name') . "\n";
echo "Template (parent): " . $current->get_template() . "\n";
echo "Stylesheet: " . $current->get_stylesheet() . "\n";
echo "Done!\n";
