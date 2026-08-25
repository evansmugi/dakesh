<?php
define('ABSPATH', __DIR__ . '/');
$_SERVER['HTTP_HOST'] = 'dakesh.test';
$_SERVER['REQUEST_SCHEME'] = 'https';
require_once ABSPATH . 'wp-load.php';

// Check Elementor Pro Theme Builder active conditions
$conditions = get_option('elementor_pro_theme_builder_conditions', []);
echo "Theme Builder Conditions Option:\n";
print_r($conditions);

// Check Elementor active kit option
$active_kit = get_option('elementor_active_kit');
echo "Active Kit Option ID: $active_kit\n";

// Check Elementor CSS print method
echo "CSS Print Method: " . get_option('elementor_css_print_method') . "\n";
echo "Experiments:\n";
print_r(get_option('elementor_experiment-container'));
