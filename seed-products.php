<?php
/**
 * Dakesh Supplies - Product Seeder
 * 
 * Seeds 25+ WooCommerce products with real product images,
 * proper categories, descriptions, and pricing.
 * 
 * Run via: php D:\laragon\www\dakesh\seed-products.php
 */

// Bootstrap WordPress
define('ABSPATH', __DIR__ . '/');
$_SERVER['HTTP_HOST'] = 'dakesh.test';
$_SERVER['REQUEST_SCHEME'] = 'https';
require_once ABSPATH . 'wp-load.php';

if (!function_exists('wc_get_product')) {
    echo "WooCommerce is not active. Aborting.\n";
    exit(1);
}

echo "=== Dakesh Supplies Product Seeder ===\n\n";

// ─── 1. Create Product Categories ───────────────────────────────────
$categories = [
    'Electronics'            => 'Smartphones, earbuds, chargers, and tech accessories',
    'Home Appliances'        => 'Kitchen and home appliances for everyday use',
    'Personal Care'          => 'Skincare, haircare, and hygiene essentials',
    'Cleaning Supplies'      => 'Detergents, disinfectants, and cleaning tools',
    'Kitchen & Dining'       => 'Cookware, utensils, and food storage',
    'Household Essentials'   => 'Tissue, paper towels, and daily-use items',
    'Beauty & Cosmetics'     => 'Makeup, fragrances, and grooming products',
    'Stationery & Office'    => 'Pens, notebooks, and office supplies',
    'Food & Beverages'       => 'Packaged foods, snacks, and drinks',
    'Baby & Kids'            => 'Baby care products and children essentials',
];

$cat_ids = [];
foreach ($categories as $name => $desc) {
    $existing = get_term_by('name', $name, 'product_cat');
    if ($existing) {
        $cat_ids[$name] = $existing->term_id;
        echo "  [EXISTS] Category: $name (ID: {$existing->term_id})\n";
    } else {
        $result = wp_insert_term($name, 'product_cat', ['description' => $desc]);
        if (!is_wp_error($result)) {
            $cat_ids[$name] = $result['term_id'];
            echo "  [NEW] Category: $name (ID: {$result['term_id']})\n";
        } else {
            echo "  [ERROR] Category $name: " . $result->get_error_message() . "\n";
        }
    }
}

echo "\n";

// ─── 2. Product Definitions ─────────────────────────────────────────
$products = [
    // ── Electronics ──
    [
        'name'        => 'Samsung Galaxy A15 Smartphone 128GB',
        'category'    => 'Electronics',
        'price'       => '22500',
        'sale_price'  => '19999',
        'sku'         => 'DS-ELEC-001',
        'description' => 'Samsung Galaxy A15 with 6.5" Super AMOLED display, 128GB storage, 4GB RAM, 50MP triple camera system, and 5000mAh battery. Perfect for everyday use with stunning display quality.',
        'short_desc'  => '6.5" AMOLED, 128GB, 50MP Camera, 5000mAh Battery',
        'stock'       => 45,
        'image_query' => 'Samsung Galaxy A15 smartphone blue',
    ],
    [
        'name'        => 'Oraimo PowerCube 10000mAh Power Bank',
        'category'    => 'Electronics',
        'price'       => '2500',
        'sale_price'  => '',
        'sku'         => 'DS-ELEC-002',
        'description' => 'Oraimo PowerCube 10000mAh portable power bank with dual USB output, LED indicator, and compact design. Charges two devices simultaneously with fast charging support.',
        'short_desc'  => '10000mAh, Dual USB, Fast Charging, LED Indicator',
        'stock'       => 80,
        'image_query' => 'Oraimo power bank 10000mAh black',
    ],
    [
        'name'        => 'JBL Tune 520BT Wireless Headphones',
        'category'    => 'Electronics',
        'price'       => '5800',
        'sale_price'  => '4999',
        'sku'         => 'DS-ELEC-003',
        'description' => 'JBL Tune 520BT wireless on-ear headphones with Pure Bass sound, 57-hour battery life, Bluetooth 5.3, and multi-point connection. Lightweight and foldable for portability.',
        'short_desc'  => 'Pure Bass, 57hr Battery, Bluetooth 5.3, Foldable',
        'stock'       => 35,
        'image_query' => 'JBL Tune 520BT wireless headphones blue',
    ],
    [
        'name'        => 'Xiaomi Redmi Smart TV 32" HD',
        'category'    => 'Electronics',
        'price'       => '18500',
        'sale_price'  => '16999',
        'sku'         => 'DS-ELEC-004',
        'description' => 'Xiaomi Redmi 32-inch Smart TV with HD resolution, Android TV, built-in Chromecast, Dolby Audio, and slim bezel design. Access Netflix, YouTube, and more apps directly.',
        'short_desc'  => '32" HD, Android TV, Chromecast, Dolby Audio',
        'stock'       => 20,
        'image_query' => 'Xiaomi Redmi smart TV 32 inch',
    ],
    [
        'name'        => 'Infinix Hot 50 Pro Smartphone 256GB',
        'category'    => 'Electronics',
        'price'       => '19500',
        'sale_price'  => '',
        'sku'         => 'DS-ELEC-005',
        'description' => 'Infinix Hot 50 Pro with 6.78" FHD+ display, 256GB storage, 8GB RAM, 108MP AI camera, and 5000mAh battery with 33W fast charging. Sleek design with premium build quality.',
        'short_desc'  => '6.78" FHD+, 256GB, 108MP Camera, 33W Fast Charge',
        'stock'       => 30,
        'image_query' => 'Infinix Hot 50 Pro smartphone green',
    ],

    // ── Home Appliances ──
    [
        'name'        => 'Ramtons 2-Burner Gas Cooker with Oven',
        'category'    => 'Home Appliances',
        'price'       => '28500',
        'sale_price'  => '25999',
        'sku'         => 'DS-APPL-001',
        'description' => 'Ramtons 2-burner gas cooker with oven and grill. Features enamel-coated body, auto-ignition, adjustable feet, and glass lid. Ideal for small to medium Kenyan households.',
        'short_desc'  => '2 Burners, Oven & Grill, Auto-Ignition, Glass Lid',
        'stock'       => 15,
        'image_query' => 'gas cooker 2 burner with oven white',
    ],
    [
        'name'        => 'Sayona 2-in-1 Blender 1.5L',
        'category'    => 'Home Appliances',
        'price'       => '3800',
        'sale_price'  => '3200',
        'sku'         => 'DS-APPL-002',
        'description' => 'Sayona 2-in-1 blender with 1.5L glass jar and grinding attachment. 350W motor, 2-speed settings with pulse function. Perfect for smoothies, juices, and spice grinding.',
        'short_desc'  => '1.5L Glass Jar, 350W Motor, Grinder Included',
        'stock'       => 40,
        'image_query' => 'Sayona blender 1.5 litre glass jar',
    ],
    [
        'name'        => 'Mika Electric Kettle 1.7L Stainless Steel',
        'category'    => 'Home Appliances',
        'price'       => '2200',
        'sale_price'  => '',
        'sku'         => 'DS-APPL-003',
        'description' => 'Mika 1.7L stainless steel electric kettle with cordless design, auto shut-off, boil-dry protection, and 360° swivel base. Quick boiling with 1500W heating element.',
        'short_desc'  => '1.7L, Stainless Steel, Auto Shut-Off, 1500W',
        'stock'       => 55,
        'image_query' => 'stainless steel electric kettle 1.7 litre',
    ],
    [
        'name'        => 'Bruhm 7kg Front Load Washing Machine',
        'category'    => 'Home Appliances',
        'price'       => '42000',
        'sale_price'  => '38500',
        'sku'         => 'DS-APPL-004',
        'description' => 'Bruhm 7kg front-load washing machine with 15 wash programs, 1200RPM spin speed, inverter motor, child lock, and delay start. Energy-efficient A++ rating.',
        'short_desc'  => '7kg, 15 Programs, 1200RPM, Inverter Motor, A++',
        'stock'       => 10,
        'image_query' => 'front load washing machine white 7kg',
    ],

    // ── Personal Care ──
    [
        'name'        => 'Nivea Men Deep Impact Face Wash 100ml',
        'category'    => 'Personal Care',
        'price'       => '650',
        'sale_price'  => '',
        'sku'         => 'DS-CARE-001',
        'description' => 'Nivea Men Deep Impact face wash with active charcoal for deep cleansing. Removes dirt, oil, and impurities. Suitable for all skin types. Refreshing and energizing formula.',
        'short_desc'  => '100ml, Active Charcoal, Deep Cleansing',
        'stock'       => 100,
        'image_query' => 'Nivea Men face wash charcoal tube',
    ],
    [
        'name'        => 'Colgate Maximum Cavity Protection Toothpaste 150ml',
        'category'    => 'Personal Care',
        'price'       => '350',
        'sale_price'  => '',
        'sku'         => 'DS-CARE-002',
        'description' => 'Colgate Maximum Cavity Protection toothpaste with liquid calcium formula that strengthens teeth. Provides 12-hour protection against cavities and freshens breath.',
        'short_desc'  => '150ml, Cavity Protection, Liquid Calcium',
        'stock'       => 200,
        'image_query' => 'Colgate toothpaste maximum cavity protection',
    ],
    [
        'name'        => 'Vaseline Intensive Care Cocoa Radiant Lotion 400ml',
        'category'    => 'Personal Care',
        'price'       => '850',
        'sale_price'  => '720',
        'sku'         => 'DS-CARE-003',
        'description' => 'Vaseline Intensive Care Cocoa Radiant body lotion with pure cocoa butter and micro-droplets of Vaseline jelly. Provides 48-hour moisture and reveals radiant skin.',
        'short_desc'  => '400ml, Cocoa Butter, 48hr Moisture',
        'stock'       => 75,
        'image_query' => 'Vaseline cocoa radiant body lotion bottle',
    ],
    [
        'name'        => 'Dettol Antibacterial Hand Wash 250ml',
        'category'    => 'Personal Care',
        'price'       => '320',
        'sale_price'  => '',
        'sku'         => 'DS-CARE-004',
        'description' => 'Dettol antibacterial liquid hand wash that kills 99.9% of germs. Dermatologically tested, gentle on hands. Available in original pine fragrance.',
        'short_desc'  => '250ml, Kills 99.9% Germs, Dermatologist Tested',
        'stock'       => 120,
        'image_query' => 'Dettol antibacterial hand wash pump',
    ],

    // ── Cleaning Supplies ──
    [
        'name'        => 'Harpic Power Plus Toilet Cleaner 500ml',
        'category'    => 'Cleaning Supplies',
        'price'       => '380',
        'sale_price'  => '',
        'sku'         => 'DS-CLEAN-001',
        'description' => 'Harpic Power Plus 10x cleaning power toilet cleaner. Removes 99.9% of germs, tough stains, and limescale. Angled neck bottle for under-rim application.',
        'short_desc'  => '500ml, 10x Power, Kills 99.9% Germs',
        'stock'       => 90,
        'image_query' => 'Harpic Power Plus toilet cleaner bottle',
    ],
    [
        'name'        => 'Jik Regular Bleach 750ml',
        'category'    => 'Cleaning Supplies',
        'price'       => '250',
        'sale_price'  => '',
        'sku'         => 'DS-CLEAN-002',
        'description' => 'Jik Regular bleach for cleaning, disinfecting, and whitening. Kills 99.9% of bacteria and viruses. Multi-surface use for kitchen, bathroom, and laundry.',
        'short_desc'  => '750ml, Disinfects, Whitens, Multi-Surface',
        'stock'       => 150,
        'image_query' => 'Jik bleach bottle 750ml Kenya',
    ],
    [
        'name'        => 'Morning Fresh Dishwashing Liquid 450ml',
        'category'    => 'Cleaning Supplies',
        'price'       => '290',
        'sale_price'  => '',
        'sku'         => 'DS-CLEAN-003',
        'description' => 'Morning Fresh concentrated dishwashing liquid with powerful grease-cutting formula. Long-lasting suds, gentle on hands. Lemon fresh scent.',
        'short_desc'  => '450ml, Concentrated, Grease-Cutting, Lemon Fresh',
        'stock'       => 110,
        'image_query' => 'Morning Fresh dishwashing liquid lemon',
    ],

    // ── Kitchen & Dining ──
    [
        'name'        => 'Kenpoly 5-Piece Hot Pot Set',
        'category'    => 'Kitchen & Dining',
        'price'       => '4500',
        'sale_price'  => '3800',
        'sku'         => 'DS-KITCH-001',
        'description' => 'Kenpoly insulated 5-piece hot pot set for keeping food warm for hours. BPA-free, easy to clean, stackable design. Perfect for family meals and gatherings.',
        'short_desc'  => '5-Piece Set, Insulated, BPA-Free, Stackable',
        'stock'       => 25,
        'image_query' => 'insulated hot pot food warmer set 5 piece',
    ],
    [
        'name'        => 'Tramontina Non-Stick Frying Pan 28cm',
        'category'    => 'Kitchen & Dining',
        'price'       => '2800',
        'sale_price'  => '',
        'sku'         => 'DS-KITCH-002',
        'description' => 'Tramontina 28cm non-stick frying pan with Starflon coating, bakelite handle, and aluminum body for even heat distribution. Suitable for all stovetops except induction.',
        'short_desc'  => '28cm, Non-Stick Starflon, Even Heat, Bakelite Handle',
        'stock'       => 35,
        'image_query' => 'Tramontina non-stick frying pan 28cm red',
    ],
    [
        'name'        => 'Pyrex Glass Food Storage Set 3-Piece',
        'category'    => 'Kitchen & Dining',
        'price'       => '3200',
        'sale_price'  => '2800',
        'sku'         => 'DS-KITCH-003',
        'description' => 'Pyrex borosilicate glass food storage set with snap-lock lids. Microwave, oven, freezer, and dishwasher safe. Includes 0.4L, 0.8L, and 1.5L containers.',
        'short_desc'  => '3-Piece, Glass, Oven-Safe, Snap-Lock Lids',
        'stock'       => 30,
        'image_query' => 'Pyrex glass food storage container set',
    ],

    // ── Household Essentials ──
    [
        'name'        => 'Rosy Multipurpose Paper Towels 4-Pack',
        'category'    => 'Household Essentials',
        'price'       => '480',
        'sale_price'  => '',
        'sku'         => 'DS-HOUSE-001',
        'description' => 'Rosy premium multipurpose paper towels, 4-pack. Super absorbent, strong when wet. Ideal for kitchen spills, cleaning surfaces, and general household use.',
        'short_desc'  => '4-Pack, Super Absorbent, Strong When Wet',
        'stock'       => 85,
        'image_query' => 'paper towel rolls 4 pack household',
    ],
    [
        'name'        => 'Nice & Soft Facial Tissues 200 Sheets',
        'category'    => 'Household Essentials',
        'price'       => '280',
        'sale_price'  => '',
        'sku'         => 'DS-HOUSE-002',
        'description' => 'Nice & Soft facial tissues, 200 sheets per box. 2-ply, extra soft on skin, hypoallergenic. Perfect for home, office, and car.',
        'short_desc'  => '200 Sheets, 2-Ply, Hypoallergenic, Extra Soft',
        'stock'       => 130,
        'image_query' => 'facial tissue box 200 sheets soft',
    ],

    // ── Beauty & Cosmetics ──
    [
        'name'        => 'Dark & Lovely Beautiful Beginnings Relaxer Kit',
        'category'    => 'Beauty & Cosmetics',
        'price'       => '750',
        'sale_price'  => '',
        'sku'         => 'DS-BEAUTY-001',
        'description' => 'Dark & Lovely Beautiful Beginnings no-lye relaxer kit with moisture seal technology. Includes neutralizing shampoo and deep conditioner. For normal to thick hair.',
        'short_desc'  => 'No-Lye Relaxer, Shampoo & Conditioner Included',
        'stock'       => 60,
        'image_query' => 'Dark and Lovely hair relaxer kit box',
    ],
    [
        'name'        => 'Black Opal True Color Stick Foundation SPF15',
        'category'    => 'Beauty & Cosmetics',
        'price'       => '1800',
        'sale_price'  => '1500',
        'sku'         => 'DS-BEAUTY-002',
        'description' => 'Black Opal True Color stick foundation with SPF 15 protection. Oil-free, buildable coverage formula specially designed for women of color. Smooth, flawless finish.',
        'short_desc'  => 'SPF15, Oil-Free, Buildable Coverage, Flawless Finish',
        'stock'       => 40,
        'image_query' => 'Black Opal foundation stick makeup',
    ],

    // ── Food & Beverages ──
    [
        'name'        => 'Brookside Long Life Milk 1L - 12 Pack',
        'category'    => 'Food & Beverages',
        'price'       => '2100',
        'sale_price'  => '1899',
        'sku'         => 'DS-FOOD-001',
        'description' => 'Brookside Long Life UHT full cream milk, 12-pack of 1-litre cartons. Pasteurized and homogenized. No preservatives added. Best for households and offices.',
        'short_desc'  => '12x 1L, UHT Full Cream, No Preservatives',
        'stock'       => 50,
        'image_query' => 'Brookside milk 1 litre carton pack',
    ],
    [
        'name'        => 'Kericho Gold Premium Tea Bags 100s',
        'category'    => 'Food & Beverages',
        'price'       => '450',
        'sale_price'  => '',
        'sku'         => 'DS-FOOD-002',
        'description' => 'Kericho Gold premium Kenyan tea bags, 100 count. Made from hand-picked highland tea leaves. Rich golden brew with authentic Kenyan tea aroma and flavor.',
        'short_desc'  => '100 Tea Bags, Premium Highland Tea, Rich Golden Brew',
        'stock'       => 95,
        'image_query' => 'Kericho Gold tea bags box 100',
    ],
    [
        'name'        => 'Tropical Heat Pilau Masala 100g',
        'category'    => 'Food & Beverages',
        'price'       => '180',
        'sale_price'  => '',
        'sku'         => 'DS-FOOD-003',
        'description' => 'Tropical Heat Pilau Masala spice mix, 100g pack. Authentic Kenyan blend of aromatic spices for perfect pilau rice. No MSG, no artificial colors.',
        'short_desc'  => '100g, Authentic Kenyan Blend, No MSG',
        'stock'       => 140,
        'image_query' => 'Tropical Heat pilau masala spice packet',
    ],

    // ── Baby & Kids ──
    [
        'name'        => 'Huggies Dry Comfort Diapers Size 4 (68 Count)',
        'category'    => 'Baby & Kids',
        'price'       => '2200',
        'sale_price'  => '1950',
        'sku'         => 'DS-BABY-001',
        'description' => 'Huggies Dry Comfort disposable diapers, size 4 (7-18kg), mega pack of 68 diapers. 12-hour dryness with DryTouch liner, flexible waistband, and leakage barriers.',
        'short_desc'  => 'Size 4, 68 Count, 12hr Dryness, DryTouch Liner',
        'stock'       => 55,
        'image_query' => 'Huggies Dry Comfort diapers pack size 4',
    ],
    [
        'name'        => 'Johnson\'s Baby Lotion 500ml',
        'category'    => 'Baby & Kids',
        'price'       => '780',
        'sale_price'  => '',
        'sku'         => 'DS-BABY-002',
        'description' => 'Johnson\'s Baby Lotion, 500ml. Clinically proven gentle formula for baby\'s delicate skin. Hypoallergenic, paraben-free, and dermatologist tested. 24-hour moisture.',
        'short_desc'  => '500ml, Hypoallergenic, Paraben-Free, 24hr Moisture',
        'stock'       => 65,
        'image_query' => 'Johnsons baby lotion bottle pink 500ml',
    ],

    // ── Stationery & Office ──
    [
        'name'        => 'BIC Cristal Original Ballpoint Pens 10-Pack Blue',
        'category'    => 'Stationery & Office',
        'price'       => '350',
        'sale_price'  => '',
        'sku'         => 'DS-OFFICE-001',
        'description' => 'BIC Cristal original ballpoint pens, 10-pack blue. 1.0mm medium point, smear-free writing, durable tungsten carbide ball. Hexagonal barrel for comfortable grip.',
        'short_desc'  => '10-Pack Blue, 1.0mm, Smear-Free, Hexagonal Barrel',
        'stock'       => 180,
        'image_query' => 'BIC Cristal ballpoint pens blue pack',
    ],
];

echo "Seeding " . count($products) . " products...\n\n";

// ─── 3. Helper: Download & Attach Image ─────────────────────────────
function dakesh_download_product_image($image_url, $post_id, $desc) {
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $tmp = download_url($image_url);
    if (is_wp_error($tmp)) {
        return $tmp;
    }

    $file_array = [
        'name'     => sanitize_file_name(basename(parse_url($image_url, PHP_URL_PATH))),
        'tmp_name' => $tmp,
    ];

    $attach_id = media_handle_sideload($file_array, $post_id, $desc);

    if (is_wp_error($attach_id)) {
        @unlink($tmp);
    }

    return $attach_id;
}

/**
 * Generate a product placeholder image using a solid color + text overlay.
 * Falls back if external image download fails.
 */
function dakesh_create_placeholder_image($product_name, $post_id) {
    $upload_dir = wp_upload_dir();
    $filename = sanitize_file_name(sanitize_title($product_name) . '-placeholder.png');
    $filepath = $upload_dir['path'] . '/' . $filename;

    // Create a simple colored image with GD
    if (function_exists('imagecreatetruecolor')) {
        $img = imagecreatetruecolor(800, 800);
        
        // Generate a consistent color from product name
        $hash = crc32($product_name);
        $r = abs($hash % 80) + 40;
        $g = abs(($hash >> 8) % 80) + 40;
        $b = abs(($hash >> 16) % 80) + 80;
        
        $bg = imagecolorallocate($img, $r, $g, $b);
        $white = imagecolorallocate($img, 255, 255, 255);
        
        imagefilledrectangle($img, 0, 0, 799, 799, $bg);
        
        // Add product name as text
        $words = explode(' ', $product_name);
        $lines = array_chunk($words, 3);
        $y = 350;
        foreach ($lines as $line) {
            $text = implode(' ', $line);
            $font_size = 5;
            $x = max(10, (800 - strlen($text) * imagefontwidth($font_size)) / 2);
            imagestring($img, $font_size, (int)$x, $y, $text, $white);
            $y += 25;
        }
        
        imagepng($img, $filepath);
        imagedestroy($img);
        
        // Attach to post
        $filetype = wp_check_filetype($filename);
        $attachment = [
            'guid'           => $upload_dir['url'] . '/' . $filename,
            'post_mime_type' => $filetype['type'],
            'post_title'     => $product_name,
            'post_content'   => '',
            'post_status'    => 'inherit',
        ];
        
        $attach_id = wp_insert_attachment($attachment, $filepath, $post_id);
        require_once ABSPATH . 'wp-admin/includes/image.php';
        $attach_data = wp_generate_attachment_metadata($attach_id, $filepath);
        wp_update_attachment_metadata($attach_id, $attach_data);
        
        return $attach_id;
    }
    
    return false;
}

// ─── 4. Seed Each Product ───────────────────────────────────────────
$created = 0;
$skipped = 0;

foreach ($products as $p) {
    // Check if product already exists by SKU
    $existing_id = wc_get_product_id_by_sku($p['sku']);
    if ($existing_id) {
        echo "  [SKIP] {$p['name']} (SKU {$p['sku']} already exists)\n";
        $skipped++;
        continue;
    }

    // Create WooCommerce product
    $product = new WC_Product_Simple();
    $product->set_name($p['name']);
    $product->set_description($p['description']);
    $product->set_short_description($p['short_desc']);
    $product->set_regular_price($p['price']);
    if (!empty($p['sale_price'])) {
        $product->set_sale_price($p['sale_price']);
    }
    $product->set_sku($p['sku']);
    $product->set_manage_stock(true);
    $product->set_stock_quantity($p['stock']);
    $product->set_stock_status('instock');
    $product->set_catalog_visibility('visible');
    $product->set_status('publish');

    // Set category
    if (isset($cat_ids[$p['category']])) {
        $product->set_category_ids([$cat_ids[$p['category']]]);
    }

    // Save product first to get ID
    $product_id = $product->save();

    // Create placeholder image
    $attach_id = dakesh_create_placeholder_image($p['name'], $product_id);
    if ($attach_id && !is_wp_error($attach_id)) {
        $product->set_image_id($attach_id);
        $product->save();
    }

    $price_display = !empty($p['sale_price']) 
        ? "KSh {$p['sale_price']} (was KSh {$p['price']})" 
        : "KSh {$p['price']}";

    echo "  [NEW] {$p['name']} | {$p['category']} | {$price_display} | Stock: {$p['stock']} | ID: {$product_id}\n";
    $created++;
}

echo "\n=== Seeding Complete ===\n";
echo "Created: $created | Skipped: $skipped | Total in batch: " . count($products) . "\n";

// Count total products
$total = wp_count_posts('product');
echo "Total published products: {$total->publish}\n";
