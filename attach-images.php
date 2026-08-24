<?php
/**
 * Attach product images to WooCommerce products.
 * 
 * Run after MySQL is started:
 *   php D:\laragon\www\dakesh\attach-images.php
 */
define('ABSPATH', __DIR__ . '/');
$_SERVER['HTTP_HOST'] = 'dakesh.test';
$_SERVER['REQUEST_SCHEME'] = 'https';
require_once ABSPATH . 'wp-load.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

echo "=== Attaching Product Images ===\n\n";

$upload_dir = wp_upload_dir();
$base_path = $upload_dir['basedir'] . '/2026/08/';
$base_url  = $upload_dir['baseurl'] . '/2026/08/';

// SKU => image filename mapping (10 generated images available now)
$sku_image_map = [
    'DS-ELEC-001' => 'prod_samsung_a15.png',       // Samsung Galaxy A15
    'DS-ELEC-002' => 'prod_oraimo_powerbank.png',   // Oraimo PowerCube
    'DS-ELEC-003' => 'prod_jbl_headphones.png',     // JBL Tune 520BT
    'DS-ELEC-004' => 'prod_xiaomi_tv.png',          // Xiaomi Redmi TV
    'DS-ELEC-005' => 'prod_infinix_hot50.png',      // Infinix Hot 50 Pro
    'DS-APPL-001' => 'prod_ramtons_cooker.png',     // Ramtons Gas Cooker
    'DS-APPL-002' => 'prod_sayona_blender.png',     // Sayona Blender
    'DS-APPL-003' => 'prod_mika_kettle.png',        // Mika Kettle
    'DS-APPL-004' => 'prod_bruhm_washer.png',       // Bruhm Washing Machine
    'DS-CARE-001' => 'prod_nivea_facewash.png',     // Nivea Face Wash
];

$attached = 0;
$skipped = 0;

foreach ($sku_image_map as $sku => $filename) {
    $product_id = wc_get_product_id_by_sku($sku);
    if (!$product_id) {
        echo "  [SKIP] No product for SKU: $sku\n";
        $skipped++;
        continue;
    }

    $filepath = $base_path . $filename;
    if (!file_exists($filepath)) {
        echo "  [SKIP] Image missing: $filename\n";
        $skipped++;
        continue;
    }

    $product = wc_get_product($product_id);
    $product_name = $product->get_name();

    // Delete old placeholder image
    $old_image_id = $product->get_image_id();
    if ($old_image_id) {
        $old_path = get_attached_file($old_image_id);
        if ($old_path && strpos(basename($old_path), 'placeholder') !== false) {
            wp_delete_attachment($old_image_id, true);
            echo "    Removed old placeholder for $product_name\n";
        }
    }

    // Create new attachment
    $filetype = wp_check_filetype($filename);
    $attachment = [
        'guid'           => $base_url . $filename,
        'post_mime_type' => $filetype['type'],
        'post_title'     => $product_name,
        'post_content'   => '',
        'post_status'    => 'inherit',
    ];

    $attach_id = wp_insert_attachment($attachment, $filepath, $product_id);
    if (is_wp_error($attach_id)) {
        echo "  [ERROR] $product_name: " . $attach_id->get_error_message() . "\n";
        $skipped++;
        continue;
    }

    $attach_data = wp_generate_attachment_metadata($attach_id, $filepath);
    wp_update_attachment_metadata($attach_id, $attach_data);

    $product->set_image_id($attach_id);
    $product->save();

    echo "  [OK] $product_name ($sku) -> $filename\n";
    $attached++;
}

echo "\n=== Done: Attached $attached | Skipped $skipped ===\n";
