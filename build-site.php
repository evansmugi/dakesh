<?php
/**
 * DAKESH SUPPLIES - MASTER ELEMENTOR & WOOCOMMERCE BUILDER
 * Programmatically builds and registers all 6 core pages, global kit, header, and footer.
 *
 * Run via: php D:\laragon\www\dakesh\build-site.php
 */

define('ABSPATH', __DIR__ . '/');
ini_set('memory_limit', '512M');
$_SERVER['HTTP_HOST'] = 'dakesh.test';
$_SERVER['REQUEST_SCHEME'] = 'https';
require_once ABSPATH . 'wp-load.php';
wp_set_current_user(1);

echo "=======================================================\n";
echo " DAKESH SUPPLIES - MASTER BUILDER & ARCHITECTURE ENGINE \n";
echo "=======================================================\n\n";

// Helper to construct basic Elementor Section/Container structure
function dakesh_create_container($elements = [], $settings = []) {
    return [
        'id' => substr(md5(uniqid(rand(), true)), 0, 8),
        'elType' => 'container',
        'isInner' => false,
        'settings' => array_merge([
            'flex_direction' => 'column',
            'container_type' => 'flex',
        ], $settings),
        'elements' => $elements
    ];
}

function dakesh_create_widget($widgetType, $settings = []) {
    return [
        'id' => substr(md5(uniqid(rand(), true)), 0, 8),
        'elType' => 'widget',
        'isInner' => false,
        'widgetType' => $widgetType,
        'settings' => $settings,
        'elements' => []
    ];
}

// ─── 1. BUILD GLOBAL KIT (ID 12) ───────────────────────────────────
echo "[1/8] Configuring Elementor Global Kit (ID 12)...\n";

$kit_settings = [
    'system_colors' => [
        ['id' => 'primary', 'title' => 'Primary Gold', 'color' => '#D4AF37'],
        ['id' => 'secondary', 'title' => 'Warm Gold', 'color' => '#F3E5AB'],
        ['id' => 'text', 'title' => 'Text Light', 'color' => '#FFFFFF'],
        ['id' => 'accent', 'title' => 'Obsidian Card', 'color' => '#1A2234'],
    ],
    'custom_colors' => [
        ['id' => 'dakesh_bg', 'title' => 'Main Background', 'color' => '#0B0F17'],
        ['id' => 'dakesh_surface', 'title' => 'Surface Dark', 'color' => '#111827'],
    ],
    'container_width' => ['unit' => 'px', 'size' => 1320, 'sizes' => []],
    'space_between_widgets' => ['unit' => 'px', 'size' => 20, 'sizes' => []],
    'page_title_selector' => 'h1.entry-title',
];

update_post_meta(12, '_elementor_page_settings', $kit_settings);
update_option('elementor_active_kit', 12);
update_option('site_icon', 15);
echo "  [OK] Default Kit configured with Gold & Obsidian tokens & Favicon (ID 15).\n\n";

// ─── 2. BUILD GLOBAL HEADER TEMPLATE ──────────────────────────────────
echo "[2/8] Building Global Header Theme Builder Template...\n";

$header_id = 0;
$existing_headers = get_posts([
    'post_type' => 'elementor_library',
    'meta_key' => '_elementor_template_type',
    'meta_value' => 'header',
    'posts_per_page' => 1
]);

if (!empty($existing_headers)) {
    $header_id = $existing_headers[0]->ID;
    echo "  Updating existing Header template (ID: $header_id)\n";
} else {
    $header_id = wp_insert_post([
        'post_title' => 'DAKESH Global Luxury Header',
        'post_type' => 'elementor_library',
        'post_status' => 'publish',
    ]);
    update_post_meta($header_id, '_elementor_template_type', 'header');
    echo "  Created new Header template (ID: $header_id)\n";
}

$header_html = '
<header class="dakesh-header">
  <div class="dakesh-header-container">
    <a href="' . home_url('/') . '" class="dakesh-logo" style="display:inline-flex;align-items:center;">
      <img src="https://dakesh.test/wp-content/uploads/2026/08/Dakesh-Logo-2-03.png" alt="DAKESH SUPPLIES" style="height:96px;width:auto;display:block;background:#FFFFFF;padding:8px 20px;border-radius:8px;box-shadow:0 4px 16px rgba(0,0,0,0.35);object-fit:contain;">
    </a>
    <ul class="dakesh-nav">
      <li><a href="' . home_url('/') . '" class="' . (is_front_page() ? 'active' : '') . '">Home</a></li>
      <li><a href="' . get_permalink(23) . '">Shop</a></li>
      <li><a href="' . get_permalink(29) . '">About Us</a></li>
      <li><a href="' . get_permalink(30) . '">Contact Us</a></li>
      <li><a href="' . get_permalink(26) . '">My Account</a></li>
    </ul>
    <div class="dakesh-header-actions">
      <a href="' . get_permalink(23) . '" class="dakesh-icon-btn" title="Search Catalog">🔍</a>
      <a href="' . get_permalink(26) . '" class="dakesh-icon-btn" title="My Account">👤</a>
      <a href="' . get_permalink(24) . '" class="dakesh-icon-btn" title="View Cart">
        🛒
        <span class="dakesh-cart-count" id="dakesh-cart-count">' . (function_exists('WC') && WC()->cart ? WC()->cart->get_cart_contents_count() : 0) . '</span>
      </a>
      <button type="button" class="dakesh-mobile-toggle" aria-label="Toggle Menu">☰</button>
    </div>
  </div>
</header>
<div class="dakesh-drawer-overlay"></div>
<div class="dakesh-mobile-drawer">
  <div style="display:flex;justify-content:space-between;align-items:center;">
    <span class="dakesh-logo" style="display:inline-flex;align-items:center;">
      <img src="https://dakesh.test/wp-content/uploads/2026/08/Dakesh-Logo-2-03.png" alt="DAKESH SUPPLIES" style="height:72px;width:auto;display:block;background:#FFFFFF;padding:6px 14px;border-radius:8px;object-fit:contain;">
    </span>
    <button type="button" class="dakesh-drawer-close" style="background:none;border:none;color:#FFF;font-size:1.5rem;cursor:pointer;">✕</button>
  </div>
  <ul class="dakesh-mobile-nav">
    <li><a href="' . home_url('/') . '">Home</a></li>
    <li><a href="' . get_permalink(23) . '">Shop Catalog</a></li>
    <li><a href="' . get_permalink(29) . '">About Us</a></li>
    <li><a href="' . get_permalink(30) . '">Contact Support</a></li>
    <li><a href="' . get_permalink(26) . '">My Account</a></li>
    <li><a href="' . get_permalink(24) . '">Shopping Cart</a></li>
  </ul>
</div>
';

$header_elements = [
    dakesh_create_container([
        dakesh_create_widget('html', ['html' => $header_html])
    ])
];

update_post_meta($header_id, '_elementor_edit_mode', 'builder');
update_post_meta($header_id, '_elementor_data', wp_slash(json_encode($header_elements)));
update_post_meta($header_id, '_elementor_conditions', ['include/general']);

// Register Theme Builder conditions
$conditions = get_option('elementor_pro_theme_builder_conditions', []);
$conditions['header'] = [$header_id => ['include/general']];
update_option('elementor_pro_theme_builder_conditions', $conditions);
echo "  [OK] Header template published & assigned to site-wide header.\n\n";

// ─── 3. BUILD GLOBAL FOOTER TEMPLATE (ID 304) ─────────────────────────
echo "[3/8] Building Global Footer Theme Builder Template...\n";

$footer_id = 304;
$footer_html = '
<footer class="dakesh-footer">
  <div class="dakesh-footer-container">
    <div class="dakesh-footer-col">
      <div class="dakesh-logo" style="margin-bottom:24px;">
        <a href="' . home_url('/') . '" style="display:inline-flex;align-items:center;">
          <img src="https://dakesh.test/wp-content/uploads/2026/08/Dakesh-Logo-2-03.png" alt="DAKESH SUPPLIES" style="height:108px;width:auto;display:block;background:#FFFFFF;padding:8px 24px;border-radius:8px;box-shadow:0 4px 16px rgba(0,0,0,0.35);object-fit:contain;">
        </a>
      </div>
      <p style="color:var(--dakesh-text-muted);font-size:0.9rem;line-height:1.7;margin-bottom:20px;">
        Kenya’s premier luxury digital marketplace. Discover handpicked electronics, premium home appliances, personal care essentials, and top-tier consumer products delivered straight to your door.
      </p>
      <div style="display:flex;flex-direction:column;gap:8px;font-size:0.88rem;color:var(--dakesh-text-body);">
        <div>📍 <strong>Location:</strong> Ramgarhia Hall Plaza, Shop Nos. B18 & B 19</div>
        <div>📞 <strong>Phone:</strong> 0708 380 822</div>
        <div>✉️ <strong>Email:</strong> sales@dakeshsupplies.co.ke</div>
        <div>📮 <strong>Address:</strong> P. O. Box 17033 - 00100</div>
      </div>
    </div>

    <div class="dakesh-footer-col">
      <h4>Shopping</h4>
      <ul>
        <li><a href="' . get_permalink(23) . '">All Products</a></li>
        <li><a href="' . get_permalink(23) . '">Electronics & Tech</a></li>
        <li><a href="' . get_permalink(23) . '">Home Appliances</a></li>
        <li><a href="' . get_permalink(23) . '">Personal Care & Beauty</a></li>
        <li><a href="' . get_permalink(23) . '">New Arrivals</a></li>
      </ul>
    </div>

    <div class="dakesh-footer-col">
      <h4>Customer Service</h4>
      <ul>
        <li><a href="' . get_permalink(26) . '">My Account Dashboard</a></li>
        <li><a href="' . get_permalink(26) . '">Track My Orders</a></li>
        <li><a href="' . get_permalink(24) . '">View Shopping Cart</a></li>
        <li><a href="' . get_permalink(30) . '">Help & Support</a></li>
        <li><a href="' . get_permalink(29) . '">Our Story & Mission</a></li>
      </ul>
    </div>

    <div class="dakesh-footer-col">
      <h4>Stay in the Know</h4>
      <p style="color:var(--dakesh-text-muted);font-size:0.88rem;margin-bottom:12px;">
        Subscribe to our exclusive newsletter for early access to arrivals and premium offers.
      </p>
      <form class="dakesh-newsletter-form" onsubmit="event.preventDefault(); window.showDakeshToast(\'Thank you for subscribing to DAKESH!\');">
        <input type="email" class="dakesh-newsletter-input" placeholder="Enter your email address..." required>
        <button type="submit" class="aq-btn-primary" style="padding:10px 18px !important;font-size:0.85rem !important;">Subscribe</button>
      </form>
      <div style="margin-top:24px;">
        <h5 style="color:var(--dakesh-text-heading);font-size:0.85rem;margin-bottom:10px;text-transform:uppercase;letter-spacing:0.05em;">Secure Payments</h5>
        <div class="dakesh-payment-icons">
          <span class="dakesh-payment-badge">M-PESA</span>
          <span class="dakesh-payment-badge">VISA</span>
          <span class="dakesh-payment-badge">MASTERCARD</span>
          <span class="dakesh-payment-badge">PAYPAL</span>
        </div>
      </div>
    </div>
  </div>

  <div class="dakesh-footer-bottom">
    <div>© ' . date('Y') . ' DAKESH SUPPLIES LIMITED. All Rights Reserved. Designed with Precision.</div>
    <div style="display:flex;gap:20px;">
      <a href="#">Privacy Policy</a>
      <a href="#">Terms of Service</a>
      <a href="#">Cookie Preferences</a>
    </div>
  </div>
</footer>
';

$footer_elements = [
    dakesh_create_container([
        dakesh_create_widget('html', ['html' => $footer_html])
    ], [
        'content_width' => 'full',
        'width' => ['unit' => '%', 'size' => 100],
        'padding' => ['unit' => 'px', 'top' => '0', 'right' => '0', 'bottom' => '0', 'left' => '0'],
        'margin' => ['unit' => 'px', 'top' => '0', 'right' => '0', 'bottom' => '0', 'left' => '0'],
    ])
];

update_post_meta($footer_id, '_elementor_edit_mode', 'builder');
update_post_meta($footer_id, '_elementor_data', wp_slash(json_encode($footer_elements)));
update_post_meta($footer_id, '_elementor_conditions', ['include/general']);

$conditions['footer'] = [$footer_id => ['include/general']];
update_option('elementor_pro_theme_builder_conditions', $conditions);
echo "  [OK] Footer template published & assigned to site-wide footer.\n\n";

// ─── 4. BUILD HOME PAGE (ID 28) ───────────────────────────────────────
echo "[4/8] Building Home Page (ID 28)...\n";

$home_elements = [];

// Hero Section
$hero_html = '
<section style="position:relative;padding:120px 24px 100px 24px;background:radial-gradient(circle at 50% 30%, rgba(212, 175, 55, 0.12) 0%, rgba(11, 15, 23, 1) 70%);text-align:center;overflow:hidden;">
  <div style="position:absolute;top:0;left:50%;transform:translateX(-50%);width:1000px;height:400px;background:radial-gradient(circle, rgba(212,175,55,0.15) 0%, transparent 70%);pointer-events:none;filter:blur(60px);"></div>
  <div style="max-width:900px;margin:0 auto;position:relative;z-index:2;">
    <div class="luxury-title" style="font-size:0.95rem;margin-bottom:16px;">✦ Flagship Digital Marketplace ✦</div>
    <h1 style="font-size:3.8rem;line-height:1.1;margin-bottom:24px;background:linear-gradient(180deg, #FFFFFF 0%, #D1D5DB 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">
      Discover Something <span style="background:var(--dakesh-gold-gradient);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Exceptional</span>
    </h1>
    <p style="font-size:1.25rem;color:var(--dakesh-text-muted);max-width:680px;margin:0 auto 36px auto;line-height:1.7;">
      Premium products. Exceptional quality. A modern shopping experience designed around uncompromising elegance and speed.
    </p>
    <div style="display:flex;justify-content:center;gap:18px;flex-wrap:wrap;">
      <a href="' . get_permalink(23) . '" class="aq-btn-primary" style="font-size:1rem !important;padding:16px 36px !important;">Shop Collection Now →</a>
      <a href="#featured-categories" class="aq-btn-secondary" style="font-size:1rem !important;padding:15px 32px !important;">Explore Categories</a>
    </div>
  </div>
</section>
';
$home_elements[] = dakesh_create_container([dakesh_create_widget('html', ['html' => $hero_html])]);

// Featured Categories
$categories_html = '
<section id="featured-categories" style="max-width:1320px;margin:80px auto 40px auto;padding:0 24px;">
  <div style="text-align:center;margin-bottom:48px;">
    <div class="luxury-title" style="font-size:0.85rem;margin-bottom:10px;">Curated Collections</div>
    <h2 style="font-size:2.4rem;">Browse By Category</h2>
  </div>
  <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(260px, 1fr));gap:24px;">
    <a href="' . get_permalink(23) . '" class="glass-card" style="padding:32px;text-align:center;display:block;">
      <div style="font-size:3rem;margin-bottom:16px;">📱</div>
      <h3 style="font-size:1.25rem;margin-bottom:8px;">Electronics & Tech</h3>
      <p style="color:var(--dakesh-text-muted);font-size:0.88rem;margin:0;">Smartphones, audio gear, accessories</p>
    </a>
    <a href="' . get_permalink(23) . '" class="glass-card" style="padding:32px;text-align:center;display:block;">
      <div style="font-size:3rem;margin-bottom:16px;">⚡</div>
      <h3 style="font-size:1.25rem;margin-bottom:8px;">Home Appliances</h3>
      <p style="color:var(--dakesh-text-muted);font-size:0.88rem;margin:0;">Gas cookers, blenders, kettles</p>
    </a>
    <a href="' . get_permalink(23) . '" class="glass-card" style="padding:32px;text-align:center;display:block;">
      <div style="font-size:3rem;margin-bottom:16px;">✨</div>
      <h3 style="font-size:1.25rem;margin-bottom:8px;">Personal Care & Beauty</h3>
      <p style="color:var(--dakesh-text-muted);font-size:0.88rem;margin:0;">Skincare, lotions, grooming</p>
    </a>
    <a href="' . get_permalink(23) . '" class="glass-card" style="padding:32px;text-align:center;display:block;">
      <div style="font-size:3rem;margin-bottom:16px;">🍃</div>
      <h3 style="font-size:1.25rem;margin-bottom:8px;">Food & Beverages</h3>
      <p style="color:var(--dakesh-text-muted);font-size:0.88rem;margin:0;">Highland teas, spices, daily items</p>
    </a>
  </div>
</section>
';
$home_elements[] = dakesh_create_container([dakesh_create_widget('html', ['html' => $categories_html])]);

// Featured Products Showcase (Dynamic Product Grid)
$products = wc_get_products(['limit' => 8, 'orderby' => 'date', 'order' => 'DESC']);
$product_cards_html = '';

foreach ($products as $p) {
    $img_id = $p->get_image_id();
    $img_url = $img_id ? wp_get_attachment_image_url($img_id, 'medium_large') : '';
    $price_html = $p->get_price_html();
    $categories = wp_get_post_terms($p->get_id(), 'product_cat');
    $cat_name = !empty($categories) ? $categories[0]->name : 'Luxury';
    $is_sale = $p->is_on_sale();

    $product_cards_html .= '
    <div class="dakesh-product-card">
      ' . ($is_sale ? '<span class="dakesh-badge-sale">Sale</span>' : '<span class="dakesh-badge-new">New</span>') . '
      <div class="dakesh-product-thumb">
        <a href="' . get_permalink($p->get_id()) . '">
          <img src="' . esc_url($img_url) . '" alt="' . esc_attr($p->get_name()) . '" loading="lazy">
        </a>
      </div>
      <div class="dakesh-product-details">
        <div class="dakesh-product-category">' . esc_html($cat_name) . '</div>
        <h3 class="dakesh-product-title">
          <a href="' . get_permalink($p->get_id()) . '">' . esc_html($p->get_name()) . '</a>
        </h3>
        <div class="dakesh-rating-stars">★★★★★</div>
        <div class="dakesh-product-price">' . $price_html . '</div>
        <div class="dakesh-card-actions">
          <a href="' . esc_url($p->add_to_cart_url()) . '" data-product_id="' . $p->get_id() . '" class="aq-btn-primary dakesh-add-cart-btn button add_to_cart_button ajax_add_to_cart">
            Add To Cart 🛒
          </a>
        </div>
      </div>
    </div>
    ';
}

$featured_html = '
<section style="max-width:1320px;margin:80px auto;padding:0 24px;">
  <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:40px;flex-wrap:wrap;gap:20px;">
    <div>
      <div class="luxury-title" style="font-size:0.85rem;margin-bottom:8px;">Handpicked Catalog</div>
      <h2 style="font-size:2.4rem;margin:0;">Featured Arrivals</h2>
    </div>
    <a href="' . get_permalink(23) . '" class="aq-btn-secondary">View All Products →</a>
  </div>
  <div style="display:grid;grid-template-columns:repeat(auto-fill, minmax(270px, 1fr));gap:28px;">
    ' . $product_cards_html . '
  </div>
</section>
';
$home_elements[] = dakesh_create_container([dakesh_create_widget('html', ['html' => $featured_html])]);

// Editorial Banner
$banner_html = '
<section style="max-width:1320px;margin:100px auto;padding:0 24px;">
  <div class="glass-panel" style="padding:60px 40px;text-align:center;background:radial-gradient(circle at 50% 50%, rgba(212, 175, 55, 0.18) 0%, rgba(26, 34, 52, 0.95) 100%);border:1px solid var(--dakesh-border-gold);">
    <div class="luxury-title" style="font-size:0.9rem;margin-bottom:14px;">Exclusive Collection</div>
    <h2 style="font-size:2.8rem;margin-bottom:18px;">Uncompromising Quality. Direct to Your Door.</h2>
    <p style="color:var(--dakesh-text-muted);max-width:650px;margin:0 auto 30px auto;font-size:1.1rem;line-height:1.7;">
      Every product in our catalog undergoes rigorous authenticity and quality testing to guarantee satisfaction.
    </p>
    <a href="' . get_permalink(23) . '" class="aq-btn-primary" style="font-size:1rem !important;padding:16px 36px !important;">Explore Exclusive Range →</a>
  </div>
</section>
';
$home_elements[] = dakesh_create_container([dakesh_create_widget('html', ['html' => $banner_html])]);

// Why Shop With Us
$trust_html = '
<section style="max-width:1320px;margin:80px auto;padding:0 24px;">
  <div style="text-align:center;margin-bottom:48px;">
    <div class="luxury-title" style="font-size:0.85rem;margin-bottom:10px;">The DAKESH Guarantee</div>
    <h2 style="font-size:2.4rem;">Why Shop With Us</h2>
  </div>
  <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:24px;">
    <div class="glass-card" style="padding:28px;text-align:center;">
      <div style="font-size:2.5rem;margin-bottom:12px;">🛡️</div>
      <h4 style="font-size:1.1rem;margin-bottom:8px;">100% Authentic</h4>
      <p style="color:var(--dakesh-text-muted);font-size:0.85rem;margin:0;">Guaranteed genuine products direct from certified brands.</p>
    </div>
    <div class="glass-card" style="padding:28px;text-align:center;">
      <div style="font-size:2.5rem;margin-bottom:12px;">🚀</div>
      <h4 style="font-size:1.1rem;margin-bottom:8px;">Express Delivery</h4>
      <p style="color:var(--dakesh-text-muted);font-size:0.85rem;margin:0;">Fast, reliable shipping directly to your residence or office.</p>
    </div>
    <div class="glass-card" style="padding:28px;text-align:center;">
      <div style="font-size:2.5rem;margin-bottom:12px;">🔒</div>
      <h4 style="font-size:1.1rem;margin-bottom:8px;">Secure Checkout</h4>
      <p style="color:var(--dakesh-text-muted);font-size:0.85rem;margin:0;">256-bit encrypted checkout with instant M-Pesa & card support.</p>
    </div>
    <div class="glass-card" style="padding:28px;text-align:center;">
      <div style="font-size:2.5rem;margin-bottom:12px;">💬</div>
      <h4 style="font-size:1.1rem;margin-bottom:8px;">24/7 VIP Support</h4>
      <p style="color:var(--dakesh-text-muted);font-size:0.85rem;margin:0;">Dedicated customer assistance team ready to help anytime.</p>
    </div>
  </div>
</section>
';
$home_elements[] = dakesh_create_container([dakesh_create_widget('html', ['html' => $trust_html])]);

update_post_meta(28, '_elementor_edit_mode', 'builder');
update_post_meta(28, '_elementor_data', wp_slash(json_encode($home_elements)));
update_post_meta(28, '_wp_page_template', 'elementor_header_footer');
echo "  [OK] Home Page (ID 28) built successfully.\n\n";

// ─── 5. BUILD SHOP PAGE (ID 23) ───────────────────────────────────────
echo "[5/8] Building Shop Page (ID 23)...\n";

$shop_elements = [];
$all_products = wc_get_products(['limit' => 20, 'orderby' => 'name', 'order' => 'ASC']);
$shop_cards_html = '';

foreach ($all_products as $p) {
    $img_id = $p->get_image_id();
    $img_url = $img_id ? wp_get_attachment_image_url($img_id, 'medium_large') : '';
    $price_html = $p->get_price_html();
    $categories = wp_get_post_terms($p->get_id(), 'product_cat');
    $cat_name = !empty($categories) ? $categories[0]->name : 'Catalog';

    $shop_cards_html .= '
    <div class="dakesh-product-card">
      <div class="dakesh-product-thumb">
        <a href="' . get_permalink($p->get_id()) . '">
          <img src="' . esc_url($img_url) . '" alt="' . esc_attr($p->get_name()) . '" loading="lazy">
        </a>
      </div>
      <div class="dakesh-product-details">
        <div class="dakesh-product-category">' . esc_html($cat_name) . '</div>
        <h3 class="dakesh-product-title">
          <a href="' . get_permalink($p->get_id()) . '">' . esc_html($p->get_name()) . '</a>
        </h3>
        <div class="dakesh-rating-stars">★★★★★</div>
        <div class="dakesh-product-price">' . $price_html . '</div>
        <div class="dakesh-card-actions">
          <a href="' . esc_url($p->add_to_cart_url()) . '" data-product_id="' . $p->get_id() . '" class="aq-btn-primary dakesh-add-cart-btn button add_to_cart_button ajax_add_to_cart">
            Add To Cart 🛒
          </a>
        </div>
      </div>
    </div>
    ';
}

$shop_html = '
<section style="max-width:1320px;margin:40px auto 80px auto;padding:0 24px;">
  <!-- Header Banner -->
  <div class="glass-panel" style="padding:40px;margin-bottom:40px;text-align:center;">
    <div class="luxury-title" style="font-size:0.85rem;margin-bottom:8px;">Curated Inventory</div>
    <h1 style="font-size:2.8rem;margin-bottom:12px;">Explore Our Marketplace</h1>
    <p style="color:var(--dakesh-text-muted);font-size:1.05rem;max-width:600px;margin:0 auto;">
      Showing ' . count($all_products) . ' handpicked premium items. Discover electronics, home appliances, personal care, and more.
    </p>
  </div>

  <!-- Shop Grid -->
  <div style="display:grid;grid-template-columns:repeat(auto-fill, minmax(270px, 1fr));gap:28px;">
    ' . $shop_cards_html . '
  </div>
</section>
';

$shop_elements[] = dakesh_create_container([dakesh_create_widget('html', ['html' => $shop_html])]);

update_post_meta(23, '_elementor_edit_mode', 'builder');
update_post_meta(23, '_elementor_data', wp_slash(json_encode($shop_elements)));
update_post_meta(23, '_wp_page_template', 'elementor_header_footer');
echo "  [OK] Shop Page (ID 23) built successfully.\n\n";

// ─── 6. BUILD ABOUT US PAGE (ID 29) ───────────────────────────────────
echo "[6/8] Building About Us Page (ID 29)...\n";

$about_html = '
<section style="max-width:1100px;margin:60px auto 80px auto;padding:0 24px;">
  <!-- Editorial Hero -->
  <div style="text-align:center;margin-bottom:60px;">
    <div class="luxury-title" style="font-size:0.85rem;margin-bottom:12px;">The DAKESH Standard</div>
    <h1 style="font-size:3.2rem;line-height:1.15;margin-bottom:20px;">More Than Shopping.<br>A Better Way to Discover.</h1>
    <p style="color:var(--dakesh-text-muted);font-size:1.2rem;max-width:720px;margin:0 auto;line-height:1.7;">
      DAKESH SUPPLIES LIMITED was founded on a singular vision: to revolutionize the Kenyan e-commerce landscape by bringing global standards of authenticity, speed, and luxury design directly to your fingertips.
    </p>
  </div>

  <!-- Story & Mission Cards -->
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:32px;margin-bottom:60px;">
    <div class="glass-card" style="padding:36px;">
      <h3 style="font-size:1.5rem;color:var(--dakesh-gold-light);margin-bottom:16px;">Our Story</h3>
      <p style="color:var(--dakesh-text-body);font-size:0.98rem;line-height:1.8;">
        We recognized a gap in the market for a truly trustworthy digital storefront where customers never have to second-guess product authenticity or delivery reliability. From our humble beginnings in Nairobi, we have scaled our fulfillment infrastructure to serve thousands of satisfied customers nationwide.
      </p>
    </div>
    <div class="glass-card" style="padding:36px;">
      <h3 style="font-size:1.5rem;color:var(--dakesh-gold-light);margin-bottom:16px;">Our Mission</h3>
      <p style="color:var(--dakesh-text-body);font-size:0.98rem;line-height:1.8;">
        To deliver an uncompromised digital shopping experience by combining world-class user interface design with certified product sourcing, transparent pricing, and instant customer fulfillment.
      </p>
    </div>
  </div>

  <!-- Core Values -->
  <div style="margin-bottom:60px;">
    <div style="text-align:center;margin-bottom:36px;">
      <div class="luxury-title" style="font-size:0.85rem;margin-bottom:8px;">What Drives Us</div>
      <h2 style="font-size:2.2rem;">Our Core Principles</h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));gap:20px;">
      <div class="glass-panel" style="padding:24px;text-align:center;">
        <div style="font-size:2rem;margin-bottom:8px;">💎</div>
        <h4 style="font-size:1.1rem;margin-bottom:6px;">Uncompromising Quality</h4>
        <p style="color:var(--dakesh-text-muted);font-size:0.82rem;margin:0;">Every item inspected before shipping.</p>
      </div>
      <div class="glass-panel" style="padding:24px;text-align:center;">
        <div style="font-size:2rem;margin-bottom:8px;">🤝</div>
        <h4 style="font-size:1.1rem;margin-bottom:6px;">Integrity First</h4>
        <p style="color:var(--dakesh-text-muted);font-size:0.82rem;margin:0;">Transparent pricing with zero hidden fees.</p>
      </div>
      <div class="glass-panel" style="padding:24px;text-align:center;">
        <div style="font-size:2rem;margin-bottom:8px;">🚀</div>
        <h4 style="font-size:1.1rem;margin-bottom:6px;">Relentless Innovation</h4>
        <p style="color:var(--dakesh-text-muted);font-size:0.82rem;margin:0;">Frictionless digital payment & tracking.</p>
      </div>
      <div class="glass-panel" style="padding:24px;text-align:center;">
        <div style="font-size:2rem;margin-bottom:8px;">🌟</div>
        <h4 style="font-size:1.1rem;margin-bottom:6px;">Customer Centricity</h4>
        <p style="color:var(--dakesh-text-muted);font-size:0.82rem;margin:0;">Dedicated support team at your service.</p>
      </div>
    </div>
  </div>

  <!-- CTA -->
  <div class="glass-card" style="padding:48px;text-align:center;background:radial-gradient(circle, rgba(212,175,55,0.15) 0%, rgba(26,34,52,0.9) 100%);">
    <h2 style="font-size:2.2rem;margin-bottom:16px;">Ready to Experience DAKESH?</h2>
    <p style="color:var(--dakesh-text-muted);margin-bottom:28px;font-size:1.05rem;">Explore our curated selection of premium electronics, appliances, and luxury essentials.</p>
    <a href="' . get_permalink(23) . '" class="aq-btn-primary" style="font-size:1rem !important;padding:16px 36px !important;">Discover Our Catalog →</a>
  </div>
</section>
';

$about_elements = [dakesh_create_container([dakesh_create_widget('html', ['html' => $about_html])])];
update_post_meta(29, '_elementor_edit_mode', 'builder');
update_post_meta(29, '_elementor_data', wp_slash(json_encode($about_elements)));
update_post_meta(29, '_wp_page_template', 'elementor_header_footer');
echo "  [OK] About Us Page (ID 29) built successfully.\n\n";

// ─── 7. BUILD MY ACCOUNT PAGE (ID 26) ─────────────────────────────────
echo "[7/8] Building My Account Page (ID 26)...\n";

$account_html = '
<section class="dakesh-account-wrapper">
  <!-- Custom Account Sidebar Navigation -->
  <div>
    <ul class="dakesh-account-nav">
      <li><a href="' . get_permalink(26) . '" class="is-active">📊 Dashboard Overview</a></li>
      <li><a href="' . get_permalink(26) . '?action=orders">📦 Order History</a></li>
      <li><a href="' . get_permalink(26) . '?action=addresses">📍 Saved Addresses</a></li>
      <li><a href="' . get_permalink(26) . '?action=edit-account">⚙️ Account Details</a></li>
      <li><a href="' . wp_logout_url(home_url('/')) . '" style="color:var(--dakesh-status-error);">🚪 Sign Out</a></li>
    </ul>
  </div>

  <!-- Account Main Content -->
  <div class="dakesh-account-content">
    <div style="margin-bottom:30px;padding-bottom:16px;border-bottom:1px solid var(--dakesh-border-subtle);">
      <div class="luxury-title" style="font-size:0.8rem;margin-bottom:4px;">Customer Dashboard</div>
      <h2 style="font-size:1.8rem;margin:0;">Welcome Back, Guest Customer</h2>
    </div>

    ' . do_shortcode('[woocommerce_my_account]') . '

    <div class="dakesh-empty-state" style="margin-top:40px;">
      <div class="dakesh-empty-icon">🛍️</div>
      <h3 style="font-size:1.4rem;margin-bottom:8px;">No Recent Orders</h3>
      <p style="color:var(--dakesh-text-muted);font-size:0.95rem;margin-bottom:24px;">Your next great discovery is waiting for you in our marketplace.</p>
      <a href="' . get_permalink(23) . '" class="aq-btn-primary">Start Shopping Now →</a>
    </div>
  </div>
</section>
';

$account_elements = [dakesh_create_container([dakesh_create_widget('html', ['html' => $account_html])])];
update_post_meta(26, '_elementor_edit_mode', 'builder');
update_post_meta(26, '_elementor_data', wp_slash(json_encode($account_elements)));
update_post_meta(26, '_wp_page_template', 'elementor_header_footer');
echo "  [OK] My Account Page (ID 26) built successfully.\n\n";

// ─── 8. BUILD CONTACT US PAGE (ID 30) & CART PAGE (ID 24) ─────────────
echo "[8/8] Building Contact Us Page (ID 30) & Cart Page (ID 24)...\n";

// Contact Us Page
$contact_html = '
<section style="max-width:1200px;margin:60px auto 80px auto;padding:0 24px;">
  <div style="text-align:center;margin-bottom:50px;">
    <div class="luxury-title" style="font-size:0.85rem;margin-bottom:10px;">Get in Touch</div>
    <h1 style="font-size:3rem;margin-bottom:16px;">We\'d Love to Hear From You</h1>
    <p style="color:var(--dakesh-text-muted);font-size:1.1rem;max-width:600px;margin:0 auto;">
      Have a question about a product, order status, or partnership? Our team is standing by.
    </p>
  </div>

  <div style="display:grid;grid-template-columns:1fr 1.5fr;gap:40px;">
    <!-- Contact Info Cards -->
    <div style="display:flex;flex-direction:column;gap:20px;">
      <div class="glass-card" style="padding:24px;">
        <div style="font-size:1.8rem;margin-bottom:8px;">📍</div>
        <h4 style="font-size:1.1rem;margin-bottom:4px;">Location</h4>
        <p style="color:var(--dakesh-text-muted);font-size:0.9rem;margin:0;">Ramgarhia Hall Plaza, Shop Nos. B18 & B 19</p>
      </div>
      <div class="glass-card" style="padding:24px;">
        <div style="font-size:1.8rem;margin-bottom:8px;">📞</div>
        <h4 style="font-size:1.1rem;margin-bottom:4px;">Phone & WhatsApp</h4>
        <p style="color:var(--dakesh-text-muted);font-size:0.9rem;margin:0;">0708 380 822</p>
        <span style="font-size:0.78rem;color:var(--dakesh-gold-primary);">Mon - Sat: 8:00 AM - 6:00 PM</span>
      </div>
      <div class="glass-card" style="padding:24px;">
        <div style="font-size:1.8rem;margin-bottom:8px;">✉️</div>
        <h4 style="font-size:1.1rem;margin-bottom:4px;">Email Support</h4>
        <p style="color:var(--dakesh-text-muted);font-size:0.9rem;margin:0;">sales@dakeshsupplies.co.ke</p>
        <span style="font-size:0.78rem;color:var(--dakesh-gold-primary);">Average response time: &lt; 2 hours</span>
      </div>
      <div class="glass-card" style="padding:24px;">
        <div style="font-size:1.8rem;margin-bottom:8px;">📮</div>
        <h4 style="font-size:1.1rem;margin-bottom:4px;">Postal Address</h4>
        <p style="color:var(--dakesh-text-muted);font-size:0.9rem;margin:0;">P. O. Box 17033 - 00100</p>
      </div>
    </div>

    <!-- Contact Form -->
    <div class="glass-panel" style="padding:40px;">
      <h3 style="font-size:1.6rem;margin-bottom:24px;color:var(--dakesh-gold-light);">Send Us a Message</h3>
      <form onsubmit="event.preventDefault(); window.showDakeshToast(\'Message sent successfully! We will contact you shortly.\'); this.reset();">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px;">
          <div>
            <label style="display:block;font-size:0.85rem;color:var(--dakesh-text-muted);margin-bottom:6px;">Your Name *</label>
            <input type="text" class="dakesh-newsletter-input" required placeholder="John Doe">
          </div>
          <div>
            <label style="display:block;font-size:0.85rem;color:var(--dakesh-text-muted);margin-bottom:6px;">Email Address *</label>
            <input type="email" class="dakesh-newsletter-input" required placeholder="john@example.com">
          </div>
        </div>
        <div style="margin-bottom:20px;">
          <label style="display:block;font-size:0.85rem;color:var(--dakesh-text-muted);margin-bottom:6px;">Subject *</label>
          <input type="text" class="dakesh-newsletter-input" required placeholder="Inquiry about Product #1234">
        </div>
        <div style="margin-bottom:24px;">
          <label style="display:block;font-size:0.85rem;color:var(--dakesh-text-muted);margin-bottom:6px;">Message *</label>
          <textarea class="dakesh-newsletter-input" rows="5" required placeholder="How can we help you today?" style="resize:vertical;"></textarea>
        </div>
        <button type="submit" class="aq-btn-primary" style="width:100%;">Send Message Now →</button>
      </form>
    </div>
  </div>
</section>
';

$contact_elements = [dakesh_create_container([dakesh_create_widget('html', ['html' => $contact_html])])];
update_post_meta(30, '_elementor_edit_mode', 'builder');
update_post_meta(30, '_elementor_data', wp_slash(json_encode($contact_elements)));
update_post_meta(30, '_wp_page_template', 'elementor_header_footer');
echo "  [OK] Contact Us Page (ID 30) built successfully.\n";

// Cart Page
$cart_html = '
<section style="max-width:1280px;margin:40px auto 80px auto;padding:0 24px;">
  <div style="margin-bottom:32px;">
    <div class="luxury-title" style="font-size:0.8rem;margin-bottom:6px;">Shopping Session</div>
    <h1 style="font-size:2.6rem;margin:0;">Your Shopping Cart</h1>
  </div>
  ' . do_shortcode('[woocommerce_cart]') . '
</section>
';

$cart_elements = [dakesh_create_container([dakesh_create_widget('html', ['html' => $cart_html])])];
update_post_meta(24, '_elementor_edit_mode', 'builder');
update_post_meta(24, '_elementor_data', wp_slash(json_encode($cart_elements)));
update_post_meta(24, '_wp_page_template', 'elementor_header_footer');
echo "  [OK] Cart Page (ID 24) built successfully.\n\n";

echo "=======================================================\n";
echo " ALL 6 CORE PAGES & THEME BUILDER TEMPLATES COMPLETE! \n";
echo "=======================================================\n";
