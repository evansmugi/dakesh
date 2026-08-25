<?php
ini_set('memory_limit', '64M');

$mysqli = new mysqli('127.0.0.1', 'root', '', 'dakesh');
if ($mysqli->connect_error) {
    die("Connect Error: " . $mysqli->connect_error);
}

// 1. Update Footer Template 304 without nested <footer> tag and without 100vw breakout
$footer_html = '
<div class="dakesh-footer">
  <div class="dakesh-footer-container">
    <div class="dakesh-footer-col">
      <div class="dakesh-logo" style="margin-bottom:24px;">
        <a href="https://dakesh.test/" style="display:inline-flex;align-items:center;">
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
        <li><a href="https://dakesh.test/?page_id=23">All Products</a></li>
        <li><a href="https://dakesh.test/?page_id=23">Electronics & Tech</a></li>
        <li><a href="https://dakesh.test/?page_id=23">Home Appliances</a></li>
        <li><a href="https://dakesh.test/?page_id=23">Personal Care & Beauty</a></li>
        <li><a href="https://dakesh.test/?page_id=23">New Arrivals</a></li>
      </ul>
    </div>

    <div class="dakesh-footer-col">
      <h4>Customer Service</h4>
      <ul>
        <li><a href="https://dakesh.test/?page_id=26">My Account Dashboard</a></li>
        <li><a href="https://dakesh.test/?page_id=26">Track My Orders</a></li>
        <li><a href="https://dakesh.test/?page_id=24">View Shopping Cart</a></li>
        <li><a href="https://dakesh.test/?page_id=30">Help & Support</a></li>
        <li><a href="https://dakesh.test/?page_id=29">Our Story & Mission</a></li>
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
    <div>© 2026 DAKESH SUPPLIES LIMITED. All Rights Reserved. Designed with Precision.</div>
    <div style="display:flex;gap:20px;">
      <a href="#">Privacy Policy</a>
      <a href="#">Terms of Service</a>
      <a href="#">Cookie Preferences</a>
    </div>
  </div>
</div>
';

$footer_elements = [
    [
        'id' => 'e6d588a0',
        'elType' => 'container',
        'isInner' => false,
        'settings' => [
            'flex_direction' => 'column',
            'container_type' => 'flex',
            'content_width' => 'full',
            'width' => ['unit' => '%', 'size' => 100],
            'padding' => ['unit' => 'px', 'top' => '0', 'right' => '0', 'bottom' => '0', 'left' => '0'],
            'margin' => ['unit' => 'px', 'top' => '0', 'right' => '0', 'bottom' => '0', 'left' => '0']
        ],
        'elements' => [
            [
                'id' => '4c67bbf2',
                'elType' => 'widget',
                'isInner' => false,
                'widgetType' => 'html',
                'settings' => ['html' => $footer_html],
                'elements' => []
            ]
        ]
    ]
];

$footer_json = addslashes(json_encode($footer_elements));
$mysqli->query("UPDATE `wp_postmeta` SET meta_value = '$footer_json' WHERE post_id = 304 AND meta_key = '_elementor_data'");

// Clear Elementor CSS cache files
$css_dir = __DIR__ . '/wp-content/uploads/elementor/css/';
if (is_dir($css_dir)) {
    foreach (glob($css_dir . '*.css') as $f) {
        if (is_file($f)) unlink($f);
    }
}

echo "SUCCESS: Rebuilt footer without breakout math and cleared all Elementor CSS cache!" . PHP_EOL;
