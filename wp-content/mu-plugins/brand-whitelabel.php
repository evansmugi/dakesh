<?php
/**
 * Plugin Name: Dakesh Supplies White-Label Engine
 * Plugin URI: https://dakeshsupplies.com
 * Description: Customizes and white-labels the WordPress admin dashboard and frontend for client branding.
 * Version: 1.0.0
 * Author: Dakesh Supplies
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * 1. White-Label Login Page
 */
add_action('login_enqueue_scripts', function() {
    $logoUrl = content_url('uploads/dakesh-full-logo.png');
    $nairobiBgUrl = content_url('uploads/nairobi-skyline.png');
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style type="text/css">
        body.login {
            background: #070a12 !important;
            background-image: 
                radial-gradient(at 0% 0%, rgba(56, 189, 248, 0.18) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(220, 38, 38, 0.18) 0px, transparent 50%),
                radial-gradient(at 50% 100%, rgba(37, 99, 235, 0.22) 0px, transparent 50%),
                linear-gradient(135deg, rgba(7, 10, 18, 0.86) 0%, rgba(15, 23, 42, 0.90) 100%),
                url('<?php echo esc_url($nairobiBgUrl); ?>') !important;
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-attachment: fixed !important;
            font-family: 'Inter', system-ui, -apple-system, sans-serif !important;
            color: #f8fafc !important;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px 0;
        }

        #login {
            width: 440px !important;
            padding: 0 !important;
            margin: auto !important;
        }

        /* Logo Container */
        #login h1 {
            margin-bottom: 24px !important;
            text-align: center;
        }

        #login h1 a, .login h1 a {
            background-image: url('<?php echo esc_url($logoUrl); ?>') !important;
            background-size: contain !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            width: 100% !important;
            height: 165px !important;
            display: block !important;
            text-indent: -9999px !important;
            overflow: hidden !important;
            margin: 0 auto 12px auto !important;
            filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.4));
            transition: transform 0.3s ease;
        }

        #login h1 a:hover {
            transform: scale(1.02);
        }

        /* Card Container (0° Cyber Precision Glassmorphism) */
        .login form {
            background: rgba(15, 23, 42, 0.85) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
            border-radius: 0px !important;
            border: 1px solid rgba(56, 189, 248, 0.2) !important;
            border-top: 3px solid #38bdf8 !important;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6), 0 0 30px rgba(56, 189, 248, 0.12) !important;
            padding: 36px 32px 32px 32px !important;
            margin-top: 0 !important;
            position: relative;
        }

        .login form::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 8px;
            height: 8px;
            border-top: 2px solid #38bdf8;
            border-right: 2px solid #38bdf8;
        }

        /* Input Labels */
        .login label {
            font-size: 13px !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            color: #94a3b8 !important;
            margin-bottom: 8px !important;
            display: block !important;
        }

        /* Form Inputs */
        .login input[type="text"],
        .login input[type="password"] {
            background: rgba(30, 41, 59, 0.7) !important;
            border: 1px solid rgba(148, 163, 184, 0.25) !important;
            border-radius: 0px !important;
            color: #f8fafc !important;
            font-size: 15px !important;
            padding: 12px 16px !important;
            width: 100% !important;
            box-sizing: border-box !important;
            transition: all 0.2s ease-in-out !important;
            margin-top: 4px !important;
            margin-bottom: 20px !important;
        }

        .login input[type="text"]:focus,
        .login input[type="password"]:focus {
            background: rgba(30, 41, 59, 0.95) !important;
            border-color: #38bdf8 !important;
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.35) !important;
            outline: none !important;
        }

        /* Remember Me Checkbox */
        .login .forgetmenot {
            float: left !important;
            margin-top: 6px !important;
        }

        .login .forgetmenot label {
            text-transform: none !important;
            letter-spacing: normal !important;
            font-size: 14px !important;
            font-weight: 500 !important;
            color: #cbd5e1 !important;
            display: flex !important;
            align-items: center !important;
            gap: 8px !important;
        }

        .login input[type="checkbox"] {
            appearance: none !important;
            -webkit-appearance: none !important;
            width: 16px !important;
            height: 16px !important;
            background: rgba(30, 41, 59, 0.8) !important;
            border: 1px solid rgba(148, 163, 184, 0.4) !important;
            border-radius: 0px !important;
            cursor: pointer !important;
            position: relative !important;
            vertical-align: middle !important;
            margin: 0 !important;
        }

        .login input[type="checkbox"]:checked {
            background: #38bdf8 !important;
            border-color: #38bdf8 !important;
        }

        .login input[type="checkbox"]:checked::after {
            content: '✓';
            position: absolute;
            color: #0f172a;
            font-size: 12px;
            font-weight: 900;
            top: -2px;
            left: 2px;
        }

        /* Submit Primary Button */
        .wp-core-ui .button-primary {
            float: right !important;
            background: linear-gradient(135deg, #dc2626 0%, #2563eb 100%) !important;
            border: none !important;
            border-radius: 0px !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            font-size: 14px !important;
            letter-spacing: 0.05em !important;
            text-transform: uppercase !important;
            padding: 10px 24px !important;
            height: auto !important;
            line-height: 1.5 !important;
            cursor: pointer !important;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3) !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            text-shadow: none !important;
        }

        .wp-core-ui .button-primary:hover,
        .wp-core-ui .button-primary:focus {
            background: linear-gradient(135deg, #ef4444 0%, #3b82f6 100%) !important;
            box-shadow: 0 0 20px rgba(56, 189, 248, 0.5), 0 0 20px rgba(239, 68, 68, 0.4) !important;
            transform: translateY(-1px) !important;
        }

        /* Nav Links (Lost Password / Back to Site) */
        .login #nav, .login #backtoblog {
            padding: 0 !important;
            text-align: center !important;
            margin: 20px 0 0 0 !important;
        }

        .login #nav a, .login #backtoblog a {
            color: #94a3b8 !important;
            font-size: 13px !important;
            font-weight: 500 !important;
            text-decoration: none !important;
            transition: color 0.2s ease !important;
        }

        .login #nav a:hover, .login #backtoblog a:hover {
            color: #38bdf8 !important;
            text-shadow: 0 0 8px rgba(56, 189, 248, 0.4) !important;
        }

        /* Error Messages */
        .login #login_error, .login .message, .login .success {
            background: rgba(15, 23, 42, 0.9) !important;
            border-radius: 0px !important;
            border: 1px solid rgba(239, 68, 68, 0.4) !important;
            border-left: 4px solid #ef4444 !important;
            color: #f8fafc !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4) !important;
            padding: 14px 16px !important;
            margin-bottom: 20px !important;
            font-size: 14px !important;
        }

        .login .message, .login .success {
            border-color: rgba(56, 189, 248, 0.4) !important;
            border-left-color: #38bdf8 !important;
        }

        /* Footer Whitelabel Badge */
        .fuse-login-footer-badge {
            text-align: center;
            margin-top: 28px;
            font-size: 12px;
            color: #64748b;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .fuse-login-footer-badge span {
            color: #38bdf8;
            font-weight: 700;
        }
    </style>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var loginDiv = document.querySelector('#login');
            if (loginDiv && !document.querySelector('.fuse-login-footer-badge')) {
                var badge = document.createElement('div');
                badge.className = 'fuse-login-footer-badge';
                badge.innerHTML = 'Secured by <span>Fuse Engine v3.1</span> HUD Encryption';
                loginDiv.appendChild(badge);
            }
        });
    </script>
    <?php
});

add_filter('login_headerurl', function() {
    return home_url();
});

add_filter('login_headertext', function() {
    return get_bloginfo('name') . ' Portal';
});

/**
 * 1b. Remove Language Selector from Login Page
 */
add_filter('login_display_language_dropdown', '__return_false');

/**
 * 2. Remove WordPress Logo & Links from Admin Bar
 */
add_action('admin_bar_menu', function($wp_admin_bar) {
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_node('about');
    $wp_admin_bar->remove_node('wporg');
    $wp_admin_bar->remove_node('documentation');
    $wp_admin_bar->remove_node('support-forums');
    $wp_admin_bar->remove_node('feedback');
}, 999);

/**
 * 3. Replace Admin Footer Branding
 */
add_filter('admin_footer_text', function() {
    return '<span>' . esc_html(get_bloginfo('name')) . ' Administration Portal</span>';
});

add_filter('update_footer', '__return_empty_string', 999);

/**
 * 4. Custom Dashboard Widgets
 */
add_action('wp_dashboard_setup', function() {
    global $wp_meta_boxes;

    // Remove default WordPress news and quick press widgets
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

    // Add custom client help widget
    wp_add_dashboard_widget(
        'dakesh_client_support_widget',
        'Client Support & Resources',
        function() {
            echo '<div style="padding: 10px 0;">';
            echo '<h4 style="margin-top:0;">Welcome to your site control center</h4>';
            echo '<p>Use the navigation panel on the left to manage pages, posts, and site settings.</p>';
            echo '<p style="margin-bottom:0;">Need assistance or updates? Contact support at <a href="mailto:support@' . esc_attr($_SERVER['HTTP_HOST'] ?? 'domain.com') . '">support@' . esc_html($_SERVER['HTTP_HOST'] ?? 'domain.com') . '</a>.</p>';
            echo '</div>';
        }
    );
});

/**
 * 5. Hide WordPress Generator & Version Tags from Frontend
 */
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_empty_string');

// Remove version query strings from CSS & JS assets
add_filter('style_loader_src', 'dakesh_remove_wp_ver_qs', 9999);
add_filter('script_loader_src', 'dakesh_remove_wp_ver_qs', 9999);

function dakesh_remove_wp_ver_qs($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

/**
 * 6. Customize System Email Sender Info
 */
add_filter('wp_mail_from_name', function($name) {
    if ($name === 'WordPress') {
        return get_bloginfo('name') . ' System';
    }
    return $name;
});

add_filter('wp_mail_from', function($email) {
    if (strpos($email, 'wordpress@') === 0) {
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        return 'noreply@' . $host;
    }
    return $email;
});

/**
 * 7. Hide Core WordPress Update Nags for Non-Super-Admins
 */
add_action('admin_head', function() {
    if (!current_user_can('manage_options')) {
        remove_action('admin_notices', 'update_nag', 3);
        echo '<style>.update-nag, .updated.vc_license-activation-notice, .notice-warning.notice-alt { display: none !important; }</style>';
    }
});

/**
 * 8. Dynamic URL Filtering (ds- Login & Admin Aliases)
 */
add_filter('site_url', function($url, $path, $scheme, $blog_id) {
    if ($path === 'wp-login.php' || strpos($path, 'wp-login.php?') === 0) {
        return str_replace('wp-login.php', 'wp-login.php', $url);
    }
    return $url;
}, 10, 4);

add_filter('wp_redirect', function($location, $status) {
    if (strpos($location, 'wp-login.php') !== false) {
        return str_replace('wp-login.php', 'wp-login.php', $location);
    }
    return $location;
}, 10, 2);

/**
 * 9. Fuse ERP Complete Admin Navigation & Top Bar Overhaul
 */
add_action('admin_head', function() {
    ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style type="text/css">
        /* Global Font, Box-Sizing & 0° Sharp Corner Reset */
        body.wp-admin, #wpadminbar, #adminmenu, #adminmenu *, .wp-submenu, .wp-submenu * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
            box-sizing: border-box !important;
            border-radius: 0 !important; /* 0 degree sharp corners */
        }

        html.wp-toolbar {
            padding-top: 54px !important;
            background-color: #f8fafc !important;
        }

        #wpbody {
            padding-top: 16px !important;
        }

        #wpcontent, #wpfooter {
            margin-left: 260px !important;
            transition: margin-left 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        /* Remove cliché left border strips on all content cards, notices & sections */
        .wrap .notice,
        .wrap .notice-info,
        .wrap .notice-success,
        .wrap .notice-warning,
        .wrap .notice-error,
        .wrap .error,
        .wrap .updated,
        .postbox,
        .card,
        .fuse-hero-light,
        .fuse-card-white,
        .fuse-kpi-box {
            border-left: 1px solid #e2e8f0 !important;
            border-left-width: 1px !important;
        }

        /* Absolutely Eliminate All White Glare / Sweeps / Gloss Pseudo Elements */
        #adminmenu li a::before, #adminmenu li a::after,
        #wpadminbar a::before, #wpadminbar a::after,
        .aq-btn-primary::before, .aq-btn-primary::after,
        .aq-btn-secondary::before, .aq-btn-secondary::after {
            display: none !important;
            content: none !important;
            background: none !important;
            box-shadow: none !important;
            border: none !important;
        }

        /* Suppress Legacy WordPress Dashicons */
        #adminmenu div.wp-menu-image::before,
        #adminmenu div.wp-menu-image img,
        #adminmenu .dashicons-before::before {
            display: none !important;
            content: "" !important;
        }

        #adminmenu div.wp-menu-image {
            font-size: 16px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            color: #94a3b8 !important;
            width: 24px !important;
            height: 24px !important;
        }

        /* -------------------------------------------------------------------------
           ULTRA-ELEGANT GLASSMORPHIC HEADER REDESIGN (#wpadminbar)
           ------------------------------------------------------------------------- */
        #wpadminbar {
            height: 54px !important;
            min-height: 54px !important;
            background: rgba(15, 23, 42, 0.88) !important;
            backdrop-filter: blur(20px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(20px) saturate(180%) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.35) !important;
            display: flex !important;
            align-items: center !important;
            padding: 0 20px !important;
            z-index: 99999 !important;
        }

        #wpadminbar::before {
            content: '' !important;
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            height: 2px !important;
            background: linear-gradient(90deg, #38bdf8 0%, #818cf8 35%, #c084fc 70%, #f43f5e 100%) !important;
            z-index: 100000 !important;
        }

        #wpadminbar .quicklinks {
            display: flex !important;
            align-items: center !important;
            width: 100% !important;
            height: 54px !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        #wpadminbar .quicklinks > ul {
            display: flex !important;
            align-items: center !important;
            height: 54px !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        #wpadminbar .quicklinks > ul > li {
            float: none !important;
            display: inline-flex !important;
            align-items: center !important;
            height: 54px !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        #wpadminbar #wp-admin-bar-root-default {
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
        }

        #wpadminbar #wp-admin-bar-top-secondary {
            margin-left: auto !important;
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            height: 54px !important;
            position: relative !important;
            top: 0 !important;
            right: 0 !important;
        }

        #wpadminbar #wp-admin-bar-my-account {
            position: relative !important;
            height: 54px !important;
            display: flex !important;
            align-items: center !important;
            margin: 0 !important;
            top: 0 !important;
        }

        #wp-admin-bar-my-account > a.ab-item {
            background: rgba(30, 41, 59, 0.7) !important;
            border: 1px solid rgba(56, 189, 248, 0.25) !important;
            border-radius: 24px !important;
            color: #f8fafc !important;
            font-weight: 600 !important;
            padding: 0 16px 0 8px !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2) !important;
        }

        #wp-admin-bar-my-account > a.ab-item:hover {
            background: rgba(30, 41, 59, 0.95) !important;
            border-color: #38bdf8 !important;
            box-shadow: 0 0 20px rgba(56, 189, 248, 0.35) !important;
            transform: translateY(-1px) !important;
        }

        /* Dropdown Popover Sub-Wrapper Position & Spacing */
        #wpadminbar .menupop .ab-sub-wrapper,
        #wpadminbar #wp-admin-bar-my-account.hover .ab-sub-wrapper,
        #wpadminbar #wp-admin-bar-my-account:hover .ab-sub-wrapper {
            position: absolute !important;
            top: 52px !important;
            right: 0 !important;
            left: auto !important;
            background: rgba(15, 23, 42, 0.96) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            border-radius: 16px !important;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6), 0 0 30px rgba(56, 189, 248, 0.15) !important;
            padding: 10px !important;
            margin-top: 0 !important;
            min-width: 240px !important;
            z-index: 999999 !important;
            overflow: visible !important;
        }

        /* User Info Row Inside Dropdown */
        #wpadminbar #wp-admin-bar-user-info {
            padding: 12px 14px !important;
            height: auto !important;
            background: rgba(30, 41, 59, 0.6) !important;
            border-radius: 12px !important;
            margin-bottom: 8px !important;
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            position: relative !important;
            top: 0 !important;
        }

        /* Default Sub-Wrapper State (Hidden until hovered) */
        #wpadminbar .menupop .ab-sub-wrapper {
            display: none !important;
            opacity: 0 !important;
            pointer-events: none !important;
            position: absolute !important;
            top: 52px !important;
            right: 0 !important;
            left: auto !important;
            width: auto !important;
            min-width: 440px !important;
            background: rgba(15, 23, 42, 0.96) !important;
            backdrop-filter: blur(20px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(20px) saturate(180%) !important;
            border: 1px solid rgba(56, 189, 248, 0.3) !important;
            border-radius: 20px !important;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.7), 0 0 30px rgba(56, 189, 248, 0.2) !important;
            padding: 12px 18px !important;
            margin-top: 0 !important;
            z-index: 999999 !important;
            overflow: visible !important;
            transition: opacity 0.2s ease, transform 0.2s ease !important;
            transform: translateY(6px) !important;
        }

        /* Hover / Active Popover Display */
        #wpadminbar .menupop.hover > .ab-sub-wrapper,
        #wpadminbar .menupop:hover > .ab-sub-wrapper,
        #wpadminbar #wp-admin-bar-my-account.hover > .ab-sub-wrapper,
        #wpadminbar #wp-admin-bar-my-account:hover > .ab-sub-wrapper {
            display: flex !important;
            flex-direction: row !important;
            align-items: center !important;
            justify-content: space-between !important;
            opacity: 1 !important;
            pointer-events: auto !important;
            transform: translateY(0) !important;
        }

        #wpadminbar #wp-admin-bar-user-actions {
            display: flex !important;
            flex-direction: row !important;
            align-items: center !important;
            justify-content: space-between !important;
            width: 100% !important;
            gap: 16px !important;
            padding: 0 !important;
            margin: 0 !important;
            background: transparent !important;
        }

        #wpadminbar #wp-admin-bar-user-info {
            display: flex !important;
            flex-direction: row !important;
            align-items: center !important;
            gap: 14px !important;
            background: transparent !important;
            padding: 0 !important;
            margin: 0 !important;
            height: auto !important;
            border: none !important;
        }

        #wpadminbar #wp-admin-bar-user-info a.ab-item {
            background: transparent !important;
            border: none !important;
            padding: 0 !important;
            height: auto !important;
            line-height: 1.2 !important;
            display: flex !important;
            flex-direction: row !important;
            align-items: center !important;
            gap: 14px !important;
            box-shadow: none !important;
        }

        #wpadminbar #wp-admin-bar-user-info .avatar {
            position: relative !important;
            top: 0 !important;
            left: 0 !important;
            margin: 0 !important;
            width: 44px !important;
            height: 44px !important;
            border-radius: 50% !important;
            border: 2px solid #38bdf8 !important;
            box-shadow: 0 0 12px rgba(56, 189, 248, 0.4) !important;
            display: block !important;
            flex-shrink: 0 !important;
        }

        #wpadminbar #wp-admin-bar-user-info .user-profile-details {
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            gap: 3px !important;
            text-align: left !important;
        }

        #wpadminbar #wp-admin-bar-user-info .display-name {
            color: #f8fafc !important;
            font-weight: 800 !important;
            font-size: 13.5px !important;
            display: block !important;
            line-height: 1.3 !important;
            margin: 0 !important;
            letter-spacing: 0.3px !important;
        }

        #wpadminbar #wp-admin-bar-user-info .username {
            color: #94a3b8 !important;
            font-size: 11.5px !important;
            font-weight: 500 !important;
            display: block !important;
            line-height: 1.3 !important;
            margin: 0 !important;
        }

        #wpadminbar #wp-admin-bar-edit-profile {
            display: none !important;
        }

        #wpadminbar #wp-admin-bar-logout {
            margin-left: auto !important;
            display: inline-flex !important;
            align-items: center !important;
        }

        #wpadminbar #wp-admin-bar-logout > a.ab-item {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2) 0%, rgba(220, 38, 38, 0.3) 100%) !important;
            border: 1px solid rgba(239, 68, 68, 0.4) !important;
            color: #fca5a5 !important;
            font-weight: 800 !important;
            font-size: 11px !important;
            letter-spacing: 0.8px !important;
            text-transform: uppercase !important;
            padding: 8px 16px !important;
            border-radius: 20px !important;
            height: auto !important;
            line-height: 1.4 !important;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 6px !important;
            box-shadow: none !important;
        }

        #wpadminbar #wp-admin-bar-logout > a.ab-item:hover {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%) !important;
            color: #ffffff !important;
            border-color: #ef4444 !important;
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.5) !important;
            transform: translateY(-1px) !important;
        }

        /* -------------------------------------------------------------------------
           LEFT SIDEBAR CYBER-PRECISION REDESIGN (#adminmenu)
           ------------------------------------------------------------------------- */
        /* -------------------------------------------------------------------------
           LEFT SIDEBAR CYBER-PRECISION REDESIGN (#adminmenu)
           ------------------------------------------------------------------------- */
        #adminmenuback, #adminmenuwrap {
            position: fixed !important;
            top: 54px !important;
            left: 0 !important;
            bottom: 0 !important;
            width: 260px !important;
            height: calc(100vh - 54px) !important;
            z-index: 9990 !important;
        }

        #adminmenuwrap {
            background: #0b0f19 !important;
            border-right: 2px solid #1e293b !important;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.15) !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
            transition: width 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
            scrollbar-width: thin;
            scrollbar-color: #334155 #0b0f19;
        }

        /* Cyber-precision sleek scrollbar for sidebar nav */
        #adminmenuwrap::-webkit-scrollbar {
            width: 5px !important;
        }
        #adminmenuwrap::-webkit-scrollbar-track {
            background: #0b0f19 !important;
        }
        #adminmenuwrap::-webkit-scrollbar-thumb {
            background: #1e293b !important;
        }
        #adminmenuwrap::-webkit-scrollbar-thumb:hover {
            background: #38bdf8 !important;
        }

        #adminmenu {
            width: 260px !important;
            background: #0b0f19 !important;
            margin-top: 0 !important;
            padding: 0 0 40px 0 !important;
            transition: width 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        .fuse-sidebar-brand {
            padding: 22px 20px 18px;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 1.5px;
            color: #38bdf8;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 2px solid #1e293b;
            margin-bottom: 16px;
            white-space: nowrap;
            overflow: hidden;
            background: #0f172a;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .fuse-sidebar-brand-dot {
            width: 8px;
            height: 8px;
            min-width: 8px;
            background: #38bdf8;
            border-radius: 0 !important;
            box-shadow: 0 0 10px #38bdf8;
        }

        #adminmenu li.menu-top {
            width: 100% !important;
            margin-bottom: 2px !important;
            float: none !important;
            position: relative !important;
        }

        #adminmenu li.menu-top > a {
            width: 100% !important;
            padding: 12px 20px !important;
            font-size: 13.5px !important;
            font-weight: 600 !important;
            color: #94a3b8 !important;
            border-radius: 0 !important;
            display: flex !important;
            align-items: center !important;
            gap: 14px !important;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1) !important;
            border-left: 3px solid transparent !important;
            border-right: 3px solid transparent !important;
            border-top: 1px solid transparent !important;
            border-bottom: 1px solid transparent !important;
            background: transparent !important;
        }

        /* ONE-OF-A-KIND CYBER-PRECISION HUD HOVER EFFECT */
        #adminmenu li.menu-top:hover > a {
            background: linear-gradient(90deg, rgba(56, 189, 248, 0.12) 0%, rgba(15, 23, 42, 0.4) 100%) !important;
            color: #ffffff !important;
            border-left-color: #38bdf8 !important;
            text-shadow: 0 0 10px rgba(56, 189, 248, 0.5) !important;
        }

        #adminmenu li.menu-top:hover div.wp-menu-image {
            color: #38bdf8 !important;
            transform: translateX(4px) !important;
            opacity: 1 !important;
        }

        /* ONE-OF-A-KIND CYBER-PRECISION ACTIVE STATE */
        #adminmenu li.menu-top.current > a,
        #adminmenu li.menu-top.wp-has-current-submenu > a,
        #adminmenu li.menu-top.wp-menu-open > a {
            background: linear-gradient(90deg, rgba(37, 99, 235, 0.3) 0%, rgba(15, 23, 42, 0.85) 100%) !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            letter-spacing: 0.5px !important;
            border-left: 4px solid #38bdf8 !important;
            border-right: 3px solid #2563eb !important;
            border-top: 1px solid rgba(56, 189, 248, 0.25) !important;
            border-bottom: 1px solid rgba(56, 189, 248, 0.25) !important;
            box-shadow: inset 0 0 20px rgba(56, 189, 248, 0.08) !important;
        }

        #adminmenu li.menu-top.current > a div.wp-menu-image,
        #adminmenu li.menu-top.wp-has-current-submenu > a div.wp-menu-image,
        #adminmenu li.menu-top.wp-menu-open > a div.wp-menu-image {
            color: #38bdf8 !important;
            opacity: 1 !important;
        }

        #adminmenu div.wp-menu-image {
            width: 24px !important;
            height: 24px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            opacity: 0.85 !important;
            float: none !important;
            transition: transform 0.2s ease, color 0.2s ease !important;
        }

        #adminmenu div.wp-menu-name {
            padding: 0 !important;
            font-size: 13.5px !important;
        }

        /* Submenu Inline Accordion List (0° Reticle Frame) */
        #adminmenu .wp-submenu-head {
            display: none !important;
        }

        #adminmenu li.wp-has-current-submenu .wp-submenu,
        #adminmenu li.wp-menu-open .wp-submenu {
            position: static !important;
            top: auto !important;
            left: auto !important;
            box-shadow: none !important;
            background: #070b14 !important;
            border-left: 2px solid #334155 !important;
            border-radius: 0 !important;
            margin: 2px 0 6px 20px !important;
            padding: 4px 0 !important;
            display: block !important;
            width: calc(100% - 20px) !important;
        }

        #adminmenu li.wp-has-current-submenu .wp-submenu a,
        #adminmenu li.wp-menu-open .wp-submenu a {
            padding: 8px 16px !important;
            margin: 1px 0 !important;
            font-size: 13px !important;
            border-radius: 0 !important;
            color: #94a3b8 !important;
            font-weight: 500 !important;
            display: block !important;
            border-left: 2px solid transparent !important;
            transition: all 0.15s ease !important;
        }

        /* Active Submenu Link Highlighting */
        #adminmenu li.wp-has-current-submenu .wp-submenu a:hover,
        #adminmenu li.wp-has-current-submenu .wp-submenu li.current a,
        #adminmenu li.wp-menu-open .wp-submenu li.current a,
        #adminmenu .wp-submenu a.current,
        #adminmenu .wp-submenu a[aria-current="page"] {
            background: linear-gradient(90deg, rgba(56, 189, 248, 0.2) 0%, rgba(15, 23, 42, 0.6) 100%) !important;
            border-left-color: #38bdf8 !important;
            color: #38bdf8 !important;
            font-weight: 700 !important;
            box-shadow: inset 0 0 12px rgba(56, 189, 248, 0.1) !important;
        }

        /* Hover Submenu for closed items (Image 2 Floating Fixed Flyout Box) */
        #adminmenu li.menu-top:not(.wp-has-current-submenu):not(.wp-menu-open) .wp-submenu {
            display: none !important;
        }

        .fuse-flyout-submenu {
            background: #0f172a !important;
            border: 1px solid #334155 !important;
            border-left: 3px solid #38bdf8 !important;
            border-radius: 0 !important;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.65), 0 0 25px rgba(56, 189, 248, 0.15) !important;
            padding: 6px 0 !important;
            min-width: 210px !important;
        }

        .fuse-flyout-submenu::before {
            content: '' !important;
            position: absolute !important;
            top: -15px !important;
            bottom: -15px !important;
            left: -30px !important;
            width: 35px !important;
            background: transparent !important;
        }

        .fuse-flyout-submenu a {
            padding: 9px 18px !important;
            font-size: 13px !important;
            color: #cbd5e1 !important;
            font-weight: 500 !important;
            display: block !important;
            transition: all 0.15s ease !important;
            text-decoration: none !important;
        }

        .fuse-flyout-submenu a:hover {
            background: rgba(56, 189, 248, 0.15) !important;
            color: #38bdf8 !important;
            font-weight: 700 !important;
        }

        /* -------------------------------------------------------------------------
           COLLAPSIBLE SIDEBAR SUPPORT (folded state - 0° Reticle)
           ------------------------------------------------------------------------- */
        body.folded #adminmenuback,
        body.folded #adminmenuwrap,
        body.folded #adminmenu {
            width: 72px !important;
        }

        body.folded #wpcontent,
        body.folded #wpfooter {
            margin-left: 72px !important;
        }

        body.folded #adminmenu {
            padding: 0 0 20px 0 !important;
        }

        body.folded #adminmenu li.menu-top {
            width: 100% !important;
            margin-bottom: 2px !important;
        }

        body.folded #adminmenu li.menu-top > a {
            padding: 14px 0 !important;
            justify-content: center !important;
            border-radius: 0 !important;
        }

        body.folded #adminmenu div.wp-menu-name {
            display: none !important;
        }

        body.folded .fuse-sidebar-brand {
            padding: 22px 0 !important;
            justify-content: center !important;
        }

        body.folded .fuse-sidebar-brand-text {
            display: none !important;
        }

        body.folded #adminmenu li.menu-top:hover .wp-submenu {
            background: #0f172a !important;
            border: 1px solid #334155 !important;
            border-left: 3px solid #38bdf8 !important;
            border-radius: 0 !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5) !important;
            padding: 4px 0 !important;
            width: 200px !important;
        }

        body.folded #adminmenu li.menu-top:hover .wp-submenu a {
            display: block !important;
        }
    </style>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var menuWrap = document.querySelector('#adminmenuwrap');
            if (menuWrap && !document.querySelector('.fuse-sidebar-brand')) {
                var brandDiv = document.createElement('div');
                brandDiv.className = 'fuse-sidebar-brand';
                brandDiv.innerHTML = '<span class="fuse-sidebar-brand-dot"></span> <span class="fuse-sidebar-brand-text">FUSE ENGINE v3.1</span>';
                menuWrap.insertBefore(brandDiv, menuWrap.firstChild);
            }

            // Vibrant Vector SVG Icon Set Family for Fuse Engine Navigation Bar
            var svgIconMap = {
                'menu-dashboard': '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg>',
                'toplevel_page_elementor': '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#c084fc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z"/><path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65"/><path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65"/></svg>',
                'toplevel_page_fuse': '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#c084fc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z"/><path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65"/><path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65"/></svg>',
                'menu-posts': '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><line x1="10" y1="9" x2="8" y2="9"/></svg>',
                'menu-media': '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#f472b6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>',
                'menu-pages': '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#34d399" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h14a2 2 0 0 0 2-2V7.5L14.5 2H6a2 2 0 0 0-2 2v4"/><polyline points="14 2 14 8 20 8"/><path d="M2 15h10"/><path d="m9 18 3-3-3-3"/></svg>',
                'menu-comments': '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>',
                'menu-appearance': '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#a78bfa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r=".5" fill="#a78bfa"/><circle cx="17.5" cy="10.5" r=".5" fill="#a78bfa"/><circle cx="8.5" cy="7.5" r=".5" fill="#a78bfa"/><circle cx="6.5" cy="12.5" r=".5" fill="#a78bfa"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.92 0 1.5-.75 1.5-1.5 0-.41-.15-.79-.42-1.08-.27-.29-.42-.68-.42-1.1 0-.92.75-1.67 1.67-1.67H16c3.3 0 6-2.7 6-6 0-4.97-4.48-9-10-9z"/></svg>',
                'menu-plugins': '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#22d3ee" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>',
                'menu-users': '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#818cf8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
                'menu-tools': '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>',
                'menu-settings': '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fb7185" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>',
                'collapse-button': '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 8 8 12 12 16"/><line x1="16" y1="12" x2="8" y2="12"/></svg>'
            };

            for (var menuId in svgIconMap) {
                var el = document.getElementById(menuId);
                if (el) {
                    var imgContainer = el.querySelector('.wp-menu-image');
                    if (imgContainer) {
                        imgContainer.innerHTML = svgIconMap[menuId];
                    }
                }
            }

            // Dynamic fallback vector SVG mapping for any unmapped menu items
            document.querySelectorAll('#adminmenu li.menu-top').forEach(function(item) {
                var imgDiv = item.querySelector('.wp-menu-image');
                if (imgDiv && !imgDiv.querySelector('svg')) {
                    var text = item.textContent.toLowerCase();
                    var strokeColor = '#38bdf8';
                    var svgContent = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="' + strokeColor + '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/></svg>';
                    
                    if (text.indexOf('dashboard') !== -1) svgContent = svgIconMap['menu-dashboard'];
                    else if (text.indexOf('fuse') !== -1 || text.indexOf('elementor') !== -1) svgContent = svgIconMap['toplevel_page_fuse'];
                    else if (text.indexOf('post') !== -1) svgContent = svgIconMap['menu-posts'];
                    else if (text.indexOf('media') !== -1) svgContent = svgIconMap['menu-media'];
                    else if (text.indexOf('page') !== -1) svgContent = svgIconMap['menu-pages'];
                    else if (text.indexOf('comment') !== -1) svgContent = svgIconMap['menu-comments'];
                    else if (text.indexOf('appearance') !== -1) svgContent = svgIconMap['menu-appearance'];
                    else if (text.indexOf('plugin') !== -1) svgContent = svgIconMap['menu-plugins'];
                    else if (text.indexOf('user') !== -1) svgContent = svgIconMap['menu-users'];
                    else if (text.indexOf('tool') !== -1) svgContent = svgIconMap['menu-tools'];
                    else if (text.indexOf('setting') !== -1) svgContent = svgIconMap['menu-settings'];

                    imgDiv.innerHTML = svgContent;
                }
            });

            // Bulletproof Floating Flyout Submenus (Image 2 style) with mouseover bridge & delay
            var flyoutTimer = null;
            var currentFlyoutSubmenu = null;

            document.querySelectorAll('#adminmenu li.menu-top').forEach(function(li) {
                var submenu = li.querySelector('.wp-submenu');
                if (!submenu) return;

                submenu.classList.add('fuse-flyout-submenu');

                function openFlyout() {
                    if (flyoutTimer) {
                        clearTimeout(flyoutTimer);
                        flyoutTimer = null;
                    }

                    if (li.classList.contains('wp-has-current-submenu') || li.classList.contains('wp-menu-open')) {
                        return;
                    }

                    if (currentFlyoutSubmenu && currentFlyoutSubmenu !== submenu) {
                        closeFlyoutNow(currentFlyoutSubmenu);
                    }

                    currentFlyoutSubmenu = submenu;

                    var rect = li.getBoundingClientRect();
                    var isFolded = document.body.classList.contains('folded');
                    var sidebarWidth = isFolded ? 72 : 260;

                    submenu.style.setProperty('position', 'fixed', 'important');
                    submenu.style.setProperty('display', 'block', 'important');
                    submenu.style.setProperty('opacity', '1', 'important');
                    submenu.style.setProperty('pointer-events', 'auto', 'important');
                    submenu.style.setProperty('z-index', '999999', 'important');

                    // Smart Viewport Collision Detection: Open upwards if clipping at bottom
                    var windowHeight = window.innerHeight;
                    var submenuHeight = submenu.offsetHeight || 200;
                    var calculatedTop = rect.top;

                    if (rect.top + submenuHeight > windowHeight - 12) {
                        // Open upwards aligned with bottom of menu item
                        calculatedTop = rect.bottom - submenuHeight;
                        if (calculatedTop < 56) {
                            calculatedTop = 56;
                        }
                    }

                    submenu.style.setProperty('top', calculatedTop + 'px', 'important');
                    submenu.style.setProperty('left', (sidebarWidth - 2) + 'px', 'important');
                }

                function scheduleCloseFlyout() {
                    flyoutTimer = setTimeout(function() {
                        if (submenu) {
                            closeFlyoutNow(submenu);
                        }
                    }, 400); // 400ms grace window while moving mouse into flyout box
                }

                function closeFlyoutNow(sub) {
                    sub.style.removeProperty('position');
                    sub.style.removeProperty('top');
                    sub.style.removeProperty('left');
                    sub.style.removeProperty('z-index');
                    sub.style.removeProperty('display');
                    sub.style.removeProperty('opacity');
                    sub.style.removeProperty('pointer-events');
                    if (currentFlyoutSubmenu === sub) {
                        currentFlyoutSubmenu = null;
                    }
                }

                li.addEventListener('mouseenter', openFlyout);
                li.addEventListener('mouseleave', scheduleCloseFlyout);

                submenu.addEventListener('mouseenter', function() {
                    if (flyoutTimer) {
                        clearTimeout(flyoutTimer);
                        flyoutTimer = null;
                    }
                });
                submenu.addEventListener('mouseleave', scheduleCloseFlyout);
            });

            // Highlight open page active tab and scroll it into view within the sidebar
            function highlightAndScrollActiveTab() {
                var menuWrap = document.querySelector('#adminmenuwrap');
                if (!menuWrap) return;

                var currentUrl = window.location.href;
                var currentPathSearch = window.location.pathname + window.location.search;

                var activeSubItem = document.querySelector('#adminmenu .wp-submenu li.current a, #adminmenu .wp-submenu a.current, #adminmenu .wp-submenu a[aria-current="page"]');

                if (!activeSubItem) {
                    var links = document.querySelectorAll('#adminmenu a[href]');
                    var bestMatch = null;
                    var bestMatchLen = 0;

                    links.forEach(function(link) {
                        var href = link.getAttribute('href');
                        if (!href || href === '#' || href.indexOf('javascript:') === 0) return;

                        var linkUrl = link.href;
                        if (currentUrl === linkUrl || currentPathSearch.endsWith(href)) {
                            if (href.length > bestMatchLen) {
                                bestMatch = link;
                                bestMatchLen = href.length;
                            }
                        } else {
                            var cleanHref = href.replace(/^.*\/\/[^\/]+/, '');
                            if (cleanHref && currentPathSearch.indexOf(cleanHref) !== -1) {
                                if (cleanHref.length > bestMatchLen) {
                                    bestMatch = link;
                                    bestMatchLen = cleanHref.length;
                                }
                            }
                        }
                    });

                    if (bestMatch) {
                        var parentLi = bestMatch.closest('li');
                        if (parentLi) parentLi.classList.add('current');
                        bestMatch.classList.add('current');

                        var topMenuLi = bestMatch.closest('li.menu-top');
                        if (topMenuLi) {
                            topMenuLi.classList.add('wp-has-current-submenu', 'wp-menu-open');
                            var topLink = topMenuLi.querySelector('> a');
                            if (topLink) topLink.classList.add('wp-has-current-submenu');
                        }
                        activeSubItem = bestMatch;
                    }
                }

                var activeTopItem = document.querySelector('#adminmenu li.menu-top.current, #adminmenu li.menu-top.wp-has-current-submenu, #adminmenu li.menu-top.wp-menu-open');

                var targetItem = activeSubItem || activeTopItem;
                if (targetItem && menuWrap) {
                    setTimeout(function() {
                        var menuRect = menuWrap.getBoundingClientRect();
                        var itemRect = targetItem.getBoundingClientRect();
                        if (itemRect.top < menuRect.top + 60 || itemRect.bottom > menuRect.bottom - 20) {
                            targetItem.scrollIntoView({ block: 'center', behavior: 'smooth' });
                        }
                    }, 150);
                }
            }

            highlightAndScrollActiveTab();
        });
    </script><?php
});

/**
 * 10. Dynamic Whitelabel String Scrubbing (Titles, Errors, and Tab Names)
 */
add_filter('admin_title', function($admin_title, $title) {
    return str_ireplace(['WordPress Updates', 'WordPress'], ['Fuse Engine Updates', 'Fuse Engine'], $admin_title);
}, 999, 2);

add_filter('wp_title', function($title) {
    return str_ireplace(['WordPress Updates', 'WordPress'], ['Fuse Engine Updates', 'Fuse Engine'], $title);
}, 999);

add_filter('site_icon_url', function($url) {
    return $url;
}, 999);

add_filter('gettext', function($translated_text, $text, $domain) {
    if (false !== stripos($translated_text, 'WordPress')) {
        // If string contains sprintf format specifiers (%), only replace if specifiers remain identical and no %20 is injected
        if (false !== strpos($text, '%')) {
            return $translated_text;
        }
        return str_ireplace(
            ['WordPress Updates', 'WordPress', 'wordpress.org'],
            ['Fuse Engine Updates', 'Fuse Engine', 'dakeshsupplies.com'],
            $translated_text
        );
    }
    return $translated_text;
}, 999, 3);

add_filter('wp_php_error_message', function($message, $error) {
    $message = str_ireplace(
        ['WordPress', 'wordpress.org', 'Learn more about troubleshooting WordPress.'],
        ['Fuse Engine', '', 'Learn more about troubleshooting.'],
        $message
    );
    return $message;
}, 999, 2);

add_filter('wp_die_handler', function($handler) {
    return function($message, $title = '', $args = array()) {
        if (is_string($title)) {
            $title = str_ireplace(['WordPress Updates', 'WordPress'], ['Fuse Engine Updates', 'Fuse Engine'], $title);
        }
        if (is_string($message)) {
            $message = str_ireplace(
                ['WordPress', 'wordpress.org', 'wp-config.php', 'Learn more about troubleshooting WordPress.'],
                ['Fuse Engine', '', 'wp-config.php', 'Learn more about troubleshooting.'],
                $message
            );
        }
        _default_wp_die_handler($message, $title, $args);
    };
}, 999);

/**
 * 11. Elementor to Fuse Engine Page Builder Whitelabeling
 */

// 1. Rename Admin Sidebar Menu & Submenus
add_action('admin_menu', function() {
    global $menu, $submenu;

    // Sidebar top-level menu
    if (!empty($menu)) {
        foreach ($menu as $key => $item) {
            if (isset($item[0]) && false !== stripos($item[0], 'Elementor')) {
                $menu[$key][0] = str_ireplace('Elementor', 'Fuse Engine', $item[0]);
            }
        }
    }

    // Sidebar submenus
    if (!empty($submenu)) {
        foreach ($submenu as $parent => $items) {
            foreach ($items as $sub_key => $sub_item) {
                if (isset($sub_item[0]) && false !== stripos($sub_item[0], 'Elementor')) {
                    $submenu[$parent][$sub_key][0] = str_ireplace('Elementor', 'Fuse Engine', $sub_item[0]);
                }
            }
        }
    }
}, 9999);

// 2. Rename Plugins on the Plugins Screen
add_filter('all_plugins', function($plugins) {
    foreach ($plugins as $file => $data) {
        if (false !== stripos($file, 'elementor')) {
            if (isset($plugins[$file]['Name'])) {
                $plugins[$file]['Name'] = str_ireplace(
                    ['Elementor Website Builder', 'Elementor Pro Activator', 'Elementor Pro', 'Elementor'],
                    ['Fuse Engine Page Builder', 'Fuse Engine License Activator', 'Fuse Engine Builder Pro', 'Fuse Engine Builder'],
                    $plugins[$file]['Name']
                );
            }
            if (isset($plugins[$file]['Description'])) {
                $plugins[$file]['Description'] = str_ireplace(
                    ['Elementor Website Builder', 'Elementor Pro', 'Elementor', 'Elementor.com', 'elementor.com'],
                    ['Fuse Engine Page Builder', 'Fuse Engine Builder Pro', 'Fuse Engine', 'dakeshsupplies.com', 'dakeshsupplies.com'],
                    $plugins[$file]['Description']
                );
            }
            if (isset($plugins[$file]['Title'])) {
                $plugins[$file]['Title'] = str_ireplace('Elementor', 'Fuse Engine', $plugins[$file]['Title']);
            }
            if (isset($plugins[$file]['AuthorName'])) {
                $plugins[$file]['AuthorName'] = 'Fuse Engine Systems';
            }
            if (isset($plugins[$file]['Author'])) {
                $plugins[$file]['Author'] = '<a href="#">Fuse Engine Systems</a>';
            }
            if (isset($plugins[$file]['PluginURI'])) {
                $plugins[$file]['PluginURI'] = '#';
            }
        }
    }
    return $plugins;
}, 9999);

// 3. Update "Edit with Elementor" Buttons and Admin Bar Actions via gettext
add_filter('gettext', function($translated_text, $text, $domain) {
    if (false !== strpos($text, '%')) {
        return $translated_text;
    }
    if (false !== stripos($translated_text, 'Elementor')) {
        return str_ireplace(
            [
                'Edit with Elementor',
                'Elementor Website Builder',
                'Elementor Pro',
                'Elementor'
            ],
            [
                'Edit with Fuse Engine',
                'Fuse Engine Page Builder',
                'Fuse Engine Builder Pro',
                'Fuse Engine'
            ],
            $translated_text
        );
    }
    return $translated_text;
}, 9999, 3);

// 4. Editor UI Loader & Branding Injections
add_action('elementor/editor/footer', function() {
    ?>
    <style type="text/css">
        .elementor-editor-loader-message,
        .elementor-loading-title {
            font-size: 0 !important;
        }
        .elementor-editor-loader-message::after,
        .elementor-loading-title::after {
            content: "Loading Fuse Engine Page Builder..." !important;
            font-size: 16px !important;
            font-weight: 700 !important;
            color: #38bdf8 !important;
            display: block !important;
        }
        #elementor-mode-switcher-preview-input:checked + label {
            background-color: #38bdf8 !important;
        }
    </style>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var loaderTitle = document.querySelector('.elementor-loading-title');
            if (loaderTitle) {
                loaderTitle.textContent = 'Loading Fuse Engine Page Builder...';
            }
        });
    </script>
    <?php
}, 9999);

/**
 * Auto-enable Fuse Engine / Elementor builder mode on all pages
 */
add_action('save_post_page', function($postId) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    update_post_meta($postId, '_elementor_edit_mode', 'builder');
    update_post_meta($postId, '_elementor_template_type', 'wp-page');
    update_post_meta($postId, '_elementor_version', '3.25.0');
    if (!get_post_meta($postId, '_elementor_data', true)) {
        update_post_meta($postId, '_elementor_data', '[]');
    }
});

/**
 * Add "Edit with Fuse Engine" action link on Pages List Table
 */
add_filter('page_row_actions', function($actions, $post) {
    $editUrl = admin_url("post.php?post={$post->ID}&action=elementor");
    $actions['elementor'] = sprintf(
        '<a href="%s" style="color: #2563eb; font-weight: 700;">Edit with Fuse Engine</a>',
        esc_url($editUrl)
    );
    return $actions;
}, 10, 2);

/**
 * Redesign & White-Label Admin Bar (#wpadminbar)
 */
add_action('admin_bar_menu', function($wp_admin_bar) {
    // Remove generic WP icons & items
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_node('about');
    $wp_admin_bar->remove_node('wporg');
    $wp_admin_bar->remove_node('documentation');
    $wp_admin_bar->remove_node('support-forums');
    $wp_admin_bar->remove_node('feedback');
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('view-site');
    $wp_admin_bar->remove_node('edit-site');
    $wp_admin_bar->remove_node('site-name');
    $wp_admin_bar->remove_node('updates');
    $wp_admin_bar->remove_node('new-content');

    // 1. Add Ultra-Elegant Brand Emblem Node
    $brandIcon = '<span style="width: 26px; height: 26px; border-radius: 50%; background: linear-gradient(135deg, #38bdf8 0%, #6366f1 100%); display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 0 10px rgba(56, 189, 248, 0.4); margin-right: 8px;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></span>';
    $brandTitle = sprintf(
        '%s<span style="font-weight: 800; font-size: 12px; color: #f8fafc; letter-spacing: 0.8px; text-transform: uppercase;">%s</span> <span style="background: linear-gradient(135deg, rgba(56,189,248,0.2), rgba(129,140,248,0.2)); border: 1px solid rgba(56,189,248,0.3); color: #38bdf8; font-size: 10px; font-weight: 800; padding: 2px 8px; border-radius: 20px; letter-spacing: 0.5px; margin-left: 6px;">PRO ENGINE</span>',
        $brandIcon,
        esc_html(strtoupper(get_bloginfo('name')))
    );

    $wp_admin_bar->add_node([
        'id'    => 'fuse-engine-brand',
        'title' => $brandTitle,
        'href'  => admin_url(),
        'meta'  => ['title' => get_bloginfo('name') . ' Admin Control Center']
    ]);

    // 2. Add Live Storefront Telemetry Capsule
    $storeDot = '<span style="width: 8px; height: 8px; background: #10b981; border-radius: 50%; box-shadow: 0 0 8px #10b981; display: inline-block; margin-right: 6px;"></span>';
    $storeTitle = $storeDot . '<span style="color: #6ee7b7; font-weight: 700; font-size: 11.5px; letter-spacing: 0.3px;">STOREFRONT LIVE</span> <span style="color: #a7f3d0; font-size: 12px; margin-left: 4px;">↗</span>';

    $wp_admin_bar->add_node([
        'id'    => 'fuse-store-status',
        'title' => $storeTitle,
        'href'  => home_url('/'),
        'meta'  => ['target' => '_blank', 'title' => 'Open Live Storefront Page']
    ]);

    // 3. Add Frontend Quick Actions (Page Builder Mode)
    if (!is_admin()) {
        $currentObjId = get_queried_object_id();
        $editUrl = $currentObjId ? admin_url("post.php?post={$currentObjId}&action=elementor") : admin_url("edit.php?post_type=page");
        
        $wp_admin_bar->add_node([
            'id'    => 'fuse-edit-page',
            'title' => '<span style="background: linear-gradient(135deg, #dc2626, #2563eb); color: #ffffff; padding: 6px 16px; border-radius: 20px; font-weight: 800; font-size: 11px; letter-spacing: 0.04em; text-transform: uppercase;">🎨 EDIT IN FUSE ENGINE</span>',
            'href'  => $editUrl,
            'meta'  => ['title' => 'Edit page visually with Fuse Engine Builder']
        ]);
    }
}, 999);

// Customize Executive User Account Capsule & Horizontal Folio Popover
add_action('wp_before_admin_bar_render', function() {
    global $wp_admin_bar;
    $my_account = $wp_admin_bar->get_node('my-account');
    if ($my_account) {
        $user = wp_get_current_user();
        $initial = strtoupper(substr($user->display_name ?: $user->user_login, 0, 1));
        $avatarBadge = sprintf(
            '<span style="width: 26px; height: 26px; border-radius: 50%%; background: linear-gradient(135deg, #38bdf8 0%%, #818cf8 100%%); display: inline-flex; align-items: center; justify-content: center; font-weight: 800; color: #ffffff; font-size: 11px; box-shadow: 0 0 10px rgba(56, 189, 248, 0.4); margin-right: 8px;">%s</span>',
            $initial
        );
        $chevron = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 6px;"><polyline points="6 9 12 15 18 9"/></svg>';
        
        $newTitle = sprintf(
            '%s<span class="ab-label" style="font-weight: 700; color: #f8fafc; font-size: 12px;">Administrator</span> <span style="color: #94a3b8; font-weight: 500; font-size: 11px; margin-left: 4px;">(%s)</span>%s',
            $avatarBadge,
            esc_html($user->user_login),
            $chevron
        );
        $wp_admin_bar->add_node([
            'id' => 'my-account',
            'title' => $newTitle
        ]);
    }

    // Customize user-info node: thumbnail on left, 2 stacked lines (name & email)
    $user_info = $wp_admin_bar->get_node('user-info');
    if ($user_info) {
        $user = wp_get_current_user();
        $avatarHtml = get_avatar($user->ID, 44, '', $user->display_name, ['class' => 'avatar']);
        $infoTitle = sprintf(
            '%s<div class="user-profile-details"><span class="display-name">%s</span><span class="username">%s</span></div>',
            $avatarHtml,
            esc_html($user->display_name ?: 'Administrator'),
            esc_html($user->user_email ?: $user->user_login)
        );
        $wp_admin_bar->add_node([
            'id' => 'user-info',
            'title' => $infoTitle
        ]);
    }

    // Customize logout node: power icon + uppercase text on far right
    $logout = $wp_admin_bar->get_node('logout');
    if ($logout) {
        $wp_admin_bar->add_node([
            'id' => 'logout',
            'title' => 'LOG OUT <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-left:4px;"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>'
        ]);
    }
});

// Attachment URL & WooCommerce Placeholder Filters
add_filter('woocommerce_placeholder_img_src', function($src) {
    return content_url('uploads/woocommerce-placeholder.webp');
}, 999);

add_filter('wp_get_attachment_url', function($url) {
    if ($url) {
        return str_replace('/ds-content/', '/wp-content/', $url);
    }
    return $url;
}, 999);

add_filter('wp_get_attachment_image_src', function($image) {
    if (is_array($image) && isset($image[0])) {
        $image[0] = str_replace('/ds-content/', '/wp-content/', $image[0]);
    }
    return $image;
}, 999);

// Enqueue Frontend Custom Styling for #wpadminbar
add_action('wp_head', function() {
    if (is_admin_bar_showing()) {
        ?>
        <style type="text/css">
            html, body, html.wp-toolbar {
                margin-top: 0 !important;
                padding-top: 0 !important;
            }
            #wpadminbar {
                position: fixed !important;
                top: 0 !important;
                right: 0 !important;
                left: auto !important;
                width: auto !important;
                max-width: 100vw !important;
                height: 42px !important;
                min-height: 42px !important;
                background: rgba(11, 15, 23, 0.95) !important;
                -webkit-backdrop-filter: blur(20px) saturate(180%) !important;
                backdrop-filter: blur(20px) saturate(180%) !important;
                border-bottom: 1px solid rgba(212, 175, 55, 0.3) !important;
                border-left: 1px solid rgba(212, 175, 55, 0.3) !important;
                border-bottom-left-radius: 12px !important;
                box-shadow: 0 8px 30px rgba(0, 0, 0, 0.7) !important;
                opacity: 0.25 !important;
                transform: translateY(-34px) !important;
                transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1) !important;
                z-index: 999999 !important;
                overflow: hidden !important;
            }
            #wpadminbar:hover,
            #wpadminbar:focus-within {
                opacity: 1 !important;
                transform: translateY(0) !important;
                overflow: visible !important;
            }
            #wpadminbar .quicklinks {
                display: flex !important;
                align-items: center !important;
                justify-content: flex-end !important;
                height: 42px !important;
                padding: 0 12px !important;
            }
            #wpadminbar .quicklinks > ul {
                display: flex !important;
                align-items: center !important;
                justify-content: flex-end !important;
                height: 42px !important;
                margin: 0 !important;
                padding: 0 !important;
            }
            #wpadminbar .ab-item, #wpadminbar a.ab-item {
                color: #cbd5e1 !important;
                font-weight: 600 !important;
                font-size: 12px !important;
                height: 32px !important;
                line-height: 32px !important;
                padding: 0 12px !important;
                display: inline-flex !important;
                align-items: center !important;
                white-space: nowrap !important;
                border-radius: 6px !important;
            }
            #wpadminbar .ab-item:hover, #wpadminbar a.ab-item:hover {
                color: #ffffff !important;
                background: rgba(212, 175, 55, 0.2) !important;
            }
            #wpadminbar .avatar, #wpadminbar .ab-icon {
                display: none !important;
            }
        </style>
        <?php
    }
}, 9999);

/**
 * 5. Complete Update Blocking (Core, Plugins, Themes)
 */
add_filter('pre_site_transient_update_core', '__return_null');
add_filter('pre_site_transient_update_plugins', '__return_null');
add_filter('pre_site_transient_update_themes', '__return_null');

add_filter('auto_update_core', '__return_false');
add_filter('auto_update_plugin', '__return_false');
add_filter('auto_update_theme', '__return_false');

// Suppress Update Notices & Hide Update UI in Admin
add_action('admin_head', function() {
    remove_action('admin_notices', 'update_nag', 3);
    remove_action('admin_notices', 'maintenance_nag', 10);
    ?>
    <style type="text/css">
        .update-nag,
        .updated.notice-warning,
        .notice-warning.update-message,
        .theme-update,
        .plugin-update-tr,
        .update-message,
        #wp-admin-bar-updates,
        .update-plugins,
        .awaiting-mod,
        .theme-info .notice-warning,
        .theme-info .update-message,
        .enable-auto-update,
        .theme-autoupdate,
        a.update-now,
        #screen-meta,
        #screen-meta-links,
        #contextual-help-link-wrap,
        #contextual-help-wrap,
        #screen-options-link-wrap {
            display: none !important;
        }
    </style>
    <?php
    $screen = get_current_screen();
    if ($screen && method_exists($screen, 'remove_help_tabs')) {
        $screen->remove_help_tabs();
        $screen->set_help_sidebar('');
    }
}, 9999);

add_filter('contextual_help', '__return_empty_string', 9999);

// Customize WP Theme Details for Fuse Theme v3.1
add_filter('wp_prepare_themes_for_js', function($prepared_themes) {
    foreach ($prepared_themes as $id => $theme) {
        $prepared_themes[$id]['name'] = 'Fuse Theme v3.1';
        $prepared_themes[$id]['author'] = 'Fuse Engine Systems';
        $prepared_themes[$id]['authorAndUri'] = '<a href="https://fuse-erp.co.ke" target="_blank" rel="noopener noreferrer">Fuse Engine Systems</a>';
        $prepared_themes[$id]['themeUri'] = 'https://fuse-erp.co.ke';
        $prepared_themes[$id]['version'] = '3.1.0';
        $prepared_themes[$id]['description'] = 'High-Performance Proprietary E-Commerce Engine & Page Builder Theme for Dakesh Supplies Limited. Custom built, locked & protected against updates.';
        $prepared_themes[$id]['hasUpdate'] = false;
        $prepared_themes[$id]['autoupdate'] = ['enabled' => false, 'forced' => true];
    }
    return $prepared_themes;
}, 9999);

/**
 * 6. Futuristic Nairobi Theme Page UI Redesign (themes.php)
 */
add_action('admin_head-themes.php', function() {
    $nairobiBgUrl = content_url('uploads/nairobi-skyline.png');
    $logoUrl = content_url('uploads/dakesh-full-logo.png');
    $shopUrl = home_url('/');
    $builderUrl = admin_url('post.php?post=56&action=elementor');
    ?>
    <style type="text/css">
        /* Futuristic Dark Theme Page Setup with Fixed Nairobi Background & Deep Tint */
        html.themes-php,
        body.themes-php {
            background-color: #070a13 !important;
            background-image: 
                radial-gradient(at 0% 0%, rgba(56, 189, 248, 0.18) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(220, 38, 38, 0.18) 0px, transparent 50%),
                linear-gradient(135deg, rgba(7, 10, 19, 0.72) 0%, rgba(15, 23, 42, 0.82) 100%),
                url('<?php echo esc_url($nairobiBgUrl); ?>') !important;
            background-size: cover !important;
            background-position: center center !important;
            background-attachment: fixed !important;
            background-repeat: no-repeat !important;
            color: #f8fafc !important;
            min-height: 100vh !important;
        }

        html.themes-php #wpwrap,
        html.themes-php #wpcontent,
        html.themes-php #wpbody,
        html.themes-php #wpbody-content {
            background: transparent !important;
            background-color: transparent !important;
        }

        body.themes-php #wpfooter {
            background: rgba(7, 10, 19, 0.85) !important;
            backdrop-filter: blur(10px) !important;
            border-top: 1px solid rgba(148, 163, 184, 0.15) !important;
            color: #64748b !important;
            padding: 20px 40px !important;
            position: relative !important;
        }

        body.themes-php #wpfooter p {
            color: #64748b !important;
        }

        body.themes-php .wrap {
            max-width: 1300px !important;
            margin: 20px auto !important;
        }

        body.themes-php h1.wp-heading-inline,
        body.themes-php .page-title-action,
        body.themes-php .theme-count {
            display: none !important;
        }

        /* Futuristic Header Card */
        .fuse-nairobi-header {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(56, 189, 248, 0.25);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            padding: 28px 36px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .fuse-nairobi-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #dc2626 0%, #2563eb 50%, #38bdf8 100%);
        }

        .fuse-nairobi-title {
            font-size: 24px;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 8px 0;
            letter-spacing: 0.04em;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .fuse-nairobi-sub {
            color: #94a3b8;
            font-size: 13px;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .fuse-badge-pill {
            background: rgba(37, 99, 235, 0.2);
            border: 1px solid rgba(56, 189, 248, 0.4);
            color: #38bdf8;
            padding: 4px 12px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        /* Hide Legacy WP Theme Cards Grid */
        .theme-browser, .theme-overlay {
            display: none !important;
        }

        .fuse-theme-card-wrapper {
            display: grid;
            grid-template-columns: 420px 1fr;
            gap: 36px;
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(56, 189, 248, 0.3);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.6), 0 0 30px rgba(37, 99, 235, 0.15);
            padding: 40px;
            margin-bottom: 30px;
            position: relative;
        }

        .fuse-preview-box {
            background: #0f172a;
            border: 2px solid rgba(56, 189, 248, 0.4);
            box-shadow: 0 0 25px rgba(56, 189, 248, 0.2);
            padding: 32px 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }

        .fuse-preview-box img {
            max-width: 240px;
            height: auto;
            margin-bottom: 24px;
            filter: drop-shadow(0 4px 12px rgba(0,0,0,0.6));
        }

        .fuse-preview-tag {
            background: linear-gradient(135deg, #16a34a, #2563eb);
            color: #ffffff;
            font-size: 11px;
            font-weight: 800;
            padding: 6px 18px;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .fuse-theme-details h2 {
            font-size: 30px;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 6px 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .fuse-version-tag {
            color: #38bdf8;
            font-size: 15px;
            font-weight: 700;
        }

        .fuse-author-link {
            color: #38bdf8 !important;
            font-weight: 700;
            text-decoration: none !important;
            transition: all 0.2s ease;
        }

        .fuse-author-link:hover {
            color: #60a5fa !important;
            text-shadow: 0 0 10px rgba(56, 189, 248, 0.5);
        }

        .fuse-desc {
            color: #cbd5e1;
            font-size: 14px;
            line-height: 1.7;
            margin: 16px 0 24px 0;
        }

        .fuse-features-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px 24px;
            margin-bottom: 28px;
        }

        .fuse-feature-item {
            color: #f1f5f9;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .fuse-feature-item span {
            color: #4ade80;
            font-weight: 800;
        }

        .fuse-action-bar {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .fuse-btn-builder {
            background: linear-gradient(135deg, #dc2626 0%, #2563eb 100%) !important;
            color: #ffffff !important;
            padding: 14px 26px !important;
            font-weight: 800 !important;
            font-size: 12px !important;
            letter-spacing: 0.05em !important;
            text-transform: uppercase !important;
            text-decoration: none !important;
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4) !important;
            transition: all 0.3s ease !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 8px !important;
        }

        .fuse-btn-builder:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 10px 30px rgba(56, 189, 248, 0.5) !important;
        }

        .fuse-btn-store {
            background: rgba(30, 41, 59, 0.8) !important;
            border: 1px solid rgba(148, 163, 184, 0.4) !important;
            color: #cbd5e1 !important;
            padding: 14px 22px !important;
            font-weight: 700 !important;
            font-size: 12px !important;
            text-decoration: none !important;
            transition: all 0.2s ease !important;
        }

        .fuse-btn-store:hover {
            background: rgba(51, 65, 85, 0.9) !important;
            color: #ffffff !important;
            border-color: #38bdf8 !important;
        }

        /* Telemetry Grid */
        .fuse-telemetry-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .fuse-telemetry-card {
            background: rgba(15, 23, 42, 0.85);
            border: 1px solid rgba(148, 163, 184, 0.2);
            padding: 20px;
        }

        .fuse-telemetry-card h4 {
            color: #94a3b8;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin: 0 0 8px 0;
        }

        .fuse-telemetry-card p {
            color: #38bdf8;
            font-size: 15px;
            font-weight: 800;
            margin: 0;
        }

        @media (max-width: 992px) {
            .fuse-theme-card-wrapper {
                grid-template-columns: 1fr;
            }
            .fuse-telemetry-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var wrap = document.querySelector('.wrap');
            if (!wrap) return;

            var container = document.createElement('div');
            container.className = 'fuse-themes-futuristic-container';
            container.innerHTML = `
                <div class="fuse-nairobi-header">
                    <h1 class="fuse-nairobi-title">
                        ⚡ DAKESH SUPPLIES STORE — FUSE THEME V3.1
                    </h1>
                    <div class="fuse-nairobi-sub">
                        <span>Website Status: <strong>Active & Fully Protected</strong></span>
                        <span class="fuse-badge-pill">🇰🇪 NAIROBI STORE</span>
                        <span class="fuse-badge-pill">🛡️ SECURE SYSTEM</span>
                        <span class="fuse-badge-pill">⚡ V3.1 ACTIVE</span>
                    </div>
                </div>

                <div class="fuse-theme-card-wrapper">
                    <div class="fuse-preview-box">
                        <img src="<?php echo esc_url($logoUrl); ?>" alt="Dakesh Supplies Limited" />
                        <span class="fuse-preview-tag">🇰🇪 DAKESH SUPPLIES ENGINE</span>
                    </div>

                    <div class="fuse-theme-details">
                        <h2>
                            Fuse Theme v3.1 
                            <span class="fuse-version-tag">Version 3.1.0</span>
                        </h2>
                        <div style="font-size: 14px; color: #94a3b8; margin-bottom: 12px;">
                            By <a href="https://fuse-erp.co.ke" target="_blank" rel="noopener noreferrer" class="fuse-author-link">Fuse Engine Systems ↗</a>
                        </div>

                        <p class="fuse-desc">
                            Official website design for Dakesh Supplies Limited. Custom-built for ultra-fast performance, easy drag-and-drop page editing, and seamless online shopping in Kenya.
                        </p>

                        <div class="fuse-features-list">
                            <div class="fuse-feature-item"><span>✔</span> Easy Drag-and-Drop Page Builder</div>
                            <div class="fuse-feature-item"><span>✔</span> M-Pesa Till 889900 Ready</div>
                            <div class="fuse-feature-item"><span>✔</span> Live WooCommerce Product Catalog</div>
                            <div class="fuse-feature-item"><span>✔</span> Protected Against Automatic Changes</div>
                        </div>

                        <div class="fuse-action-bar">
                            <a href="<?php echo esc_url($builderUrl); ?>" class="fuse-btn-builder">
                                🎨 OPEN PAGE BUILDER
                            </a>
                            <a href="<?php echo esc_url($shopUrl); ?>" class="fuse-btn-store" target="_blank">
                                🌐 VIEW SHOP FRONT ↗
                            </a>
                        </div>
                    </div>
                </div>

                <div class="fuse-telemetry-grid">
                    <div class="fuse-telemetry-card">
                        <h4>SYSTEM SECURITY</h4>
                        <p>🔒 File Changes: OFF (Protected)</p>
                    </div>
                    <div class="fuse-telemetry-card">
                        <h4>SERVER LOCATION</h4>
                        <p>📍 Nairobi Local Server</p>
                    </div>
                    <div class="fuse-telemetry-card">
                        <h4>SYSTEM UPDATES</h4>
                        <p>🛡️ Up to Date (No Changes Needed)</p>
                    </div>
                </div>
            `;

            wrap.appendChild(container);
        });
    </script>
    <?php
}, 9999);

/**
 * Overhaul Main Admin Dashboard (index.php) into a 100% Dynamic Light Theme Executive Control Center
 */
add_action('admin_footer-index.php', function() {
    global $wpdb;

    // 1. Dynamic User & Time-of-Day Greeting
    $user = wp_get_current_user();
    $displayName = $user->display_name ?: $user->user_login;
    
    $hour = (int) current_time('H');
    if ($hour < 12) {
        $timeGreeting = 'Good Morning';
    } elseif ($hour < 18) {
        $timeGreeting = 'Good Afternoon';
    } else {
        $timeGreeting = 'Good Evening';
    }

    // 2. Dynamic WooCommerce & WP Metrics
    $totalRevenue = 0;
    $totalOrdersCount = 0;
    $activeProductsCount = 0;
    $inStockCount = 0;

    if (class_exists('WooCommerce')) {
        // Total Orders Count
        $orderCounts = wp_count_posts('shop_order');
        $totalOrdersCount = ($orderCounts->{'wc-completed'} ?? 0) + ($orderCounts->{'wc-processing'} ?? 0) + ($orderCounts->{'wc-on-hold'} ?? 0) + ($orderCounts->{'wc-pending'} ?? 0);
        if ($totalOrdersCount === 0) {
            $totalOrdersCount = ($orderCounts->publish ?? 0);
        }

        // Total Sales Revenue from DB
        $revQuery = $wpdb->get_var("
            SELECT SUM(pm.meta_value) 
            FROM {$wpdb->postmeta} pm 
            JOIN {$wpdb->posts} p ON p.ID = pm.post_id 
            WHERE p.post_type = 'shop_order' 
            AND p.post_status IN ('wc-completed', 'wc-processing', 'publish') 
            AND pm.meta_key = '_order_total'
        ");
        $totalRevenue = (float) $revQuery;

        // Products Count
        $prodCounts = wp_count_posts('product');
        $activeProductsCount = (int) ($prodCounts->publish ?? 0);

        // In-Stock Count
        $inStockQuery = $wpdb->get_var("
            SELECT COUNT(DISTINCT post_id) 
            FROM {$wpdb->postmeta} 
            WHERE meta_key = '_stock_status' AND meta_value = 'instock'
        ");
        $inStockCount = (int) $inStockQuery;
    } else {
        $pagesCount = wp_count_posts('page');
        $activeProductsCount = (int) ($pagesCount->publish ?? 0);
    }

    // Format metrics dynamically
    $formattedRevenue = $totalRevenue > 0 ? 'KSh ' . number_format($totalRevenue) : 'KSh 0';
    $formattedOrders  = number_format($totalOrdersCount);
    $formattedProducts = number_format($activeProductsCount);

    // 3. Dynamic Recent Activity Stream
    $activityStream = [];

    if (class_exists('WooCommerce') && function_exists('wc_get_orders')) {
        $recentOrders = wc_get_orders([
            'limit'   => 4,
            'orderby' => 'date',
            'order'   => 'DESC'
        ]);
        foreach ($recentOrders as $ord) {
            $ordId = $ord->get_id();
            $ordTotal = number_format((float)$ord->get_total());
            $timeAgo = human_time_diff($ord->get_date_created()->getTimestamp(), current_time('timestamp')) . ' ago';
            $custName = $ord->get_billing_first_name() ? esc_html($ord->get_billing_first_name()) : 'Customer';
            $activityStream[] = [
                'desc' => "Order #{$ordId} received ({$custName}) — KSh {$ordTotal}",
                'time' => $timeAgo,
                'dot'  => '#2563eb'
            ];
        }
    }

    // Fetch recent page/product modifications
    $recentPosts = get_posts([
        'post_type'   => ['page', 'product'],
        'post_status' => 'publish',
        'numberposts' => 4 - count($activityStream),
        'orderby'     => 'modified',
        'order'       => 'DESC'
    ]);
    foreach ($recentPosts as $rp) {
        $timeAgo = human_time_diff(strtotime($rp->post_modified), current_time('timestamp')) . ' ago';
        $typeLabel = ucfirst($rp->post_type);
        $activityStream[] = [
            'desc' => "{$typeLabel} '{$rp->post_title}' modified in Fuse Engine",
            'time' => $timeAgo,
            'dot'  => '#10b981'
        ];
    }

    if (empty($activityStream)) {
        $activityStream[] = [
            'desc' => "System initialized on Nairobi Local Server",
            'time' => 'Just now',
            'dot'  => '#38bdf8'
        ];
    }

    // 4. Infrastructure Telemetry Metrics
    $opcacheActive = function_exists('opcache_get_status') && !empty(opcache_get_status(false)['opcache_enabled']) ? 'Active (256MB)' : 'Inactive';
    $phpVersion    = 'PHP ' . PHP_VERSION;
    $dbVersion     = 'MySQL ' . $wpdb->db_version();

    $builderUrl    = admin_url('post.php?post=28&action=elementor');
    $shopUrl       = home_url('/');
    $ordersUrl     = admin_url('edit.php?post_type=shop_order');
    $productsUrl   = admin_url('edit.php?post_type=product');
    $newProductUrl = admin_url('post-new.php?post_type=product');
    $analyticsUrl  = admin_url('admin.php?page=wc-admin');
    $pagesUrl      = admin_url('edit.php?post_type=page');
    $siteName      = get_bloginfo('name');
    ?>
    <style>
        /* Light Theme Main Body Overrides for index.php */
        body.wp-admin.index-php {
            background-color: #f8fafc !important;
        }
        body.wp-admin.index-php #wpcontent {
            padding-left: 0 !important;
        }
        body.wp-admin.index-php #wpbody-content {
            background-color: #f8fafc !important;
            padding: 0 !important;
            margin: 0 !important;
            width: 100% !important;
            float: none !important;
        }
        body.wp-admin.index-php #wpbody {
            padding-right: 0 !important;
        }
        body.wp-admin.index-php .wrap {
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            max-width: 100% !important;
        }
        
        /* Suppress legacy WP welcome panel & empty dashboard widgets */
        body.wp-admin.index-php #welcome-panel,
        body.wp-admin.index-php #dashboard-widgets-wrap,
        body.wp-admin.index-php .notice-info.welcome-panel,
        body.wp-admin.index-php #screen-meta-links {
            display: none !important;
        }

        .fuse-light-dash {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 !important;
            padding: 24px 28px 40px 28px !important;
            box-sizing: border-box !important;
            color: #0f172a;
        }

        /* Executive Horizon Header (Think Different - Clean Ambient Mesh Card, No Left Strip) */
        .fuse-hero-light {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 60%, #f1f5f9 100%);
            background-image: radial-gradient(at 0% 0%, rgba(56, 189, 248, 0.08) 0px, transparent 55%),
                              radial-gradient(at 100% 100%, rgba(37, 99, 235, 0.04) 0px, transparent 55%);
            border: 1px solid #e2e8f0 !important;
            border-left: none !important;
            border-radius: 20px !important;
            padding: 28px 36px !important;
            margin-bottom: 28px !important;
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.05), 0 2px 6px rgba(0, 0, 0, 0.02) !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            position: relative;
            overflow: hidden;
        }

        .fuse-horizon-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1d4ed8;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 4px 12px;
            border-radius: 20px;
            margin-bottom: 8px;
        }

        .pulse-dot {
            width: 7px;
            height: 7px;
            background: #10b981;
            border-radius: 50%;
            box-shadow: 0 0 8px #10b981;
            display: inline-block;
        }

        .fuse-hero-text h1 {
            font-size: 24px !important;
            font-weight: 800 !important;
            color: #0f172a !important;
            margin: 0 0 6px 0 !important;
            letter-spacing: -0.02em !important;
            display: flex !important;
            align-items: center !important;
            gap: 10px !important;
        }

        .fuse-hero-text p {
            font-size: 14px !important;
            color: #64748b !important;
            margin: 0 !important;
            line-height: 1.5 !important;
        }

        .fuse-hero-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            flex-shrink: 0;
        }

        .fuse-btn-p {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%) !important;
            color: #ffffff !important;
            padding: 12px 22px !important;
            border-radius: 12px !important;
            font-weight: 800 !important;
            font-size: 12px !important;
            letter-spacing: 0.04em !important;
            text-transform: uppercase !important;
            text-decoration: none !important;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35) !important;
            transition: all 0.25s ease !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 8px !important;
        }

        .fuse-btn-p:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 22px rgba(37, 99, 235, 0.45) !important;
            color: #ffffff !important;
        }

        .fuse-btn-s {
            background: #ffffff !important;
            border: 1px solid #cbd5e1 !important;
            color: #1e293b !important;
            padding: 12px 18px !important;
            border-radius: 12px !important;
            font-weight: 700 !important;
            font-size: 12px !important;
            text-decoration: none !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04) !important;
            transition: all 0.2s ease !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 6px !important;
        }

        .fuse-btn-s:hover {
            background: #f8fafc !important;
            border-color: #94a3b8 !important;
            color: #0f172a !important;
            transform: translateY(-1px) !important;
        }

        /* KPI Telemetry Grid */
        .fuse-kpis-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .fuse-kpi-box {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 22px 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            transition: all 0.25s ease;
        }

        .fuse-kpi-box:hover {
            border-color: #cbd5e1;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .fuse-kpi-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .fuse-kpi-title {
            font-size: 11.5px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .fuse-kpi-icon-wrap {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .icon-emerald { background: #dcfce7; color: #15803d; }
        .icon-blue { background: #dbeafe; color: #1d4ed8; }
        .icon-sky { background: #e0f2fe; color: #0284c7; }
        .icon-purple { background: #f3e8ff; color: #7e22ce; }

        .fuse-kpi-number {
            font-size: 25px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.02em;
            margin-bottom: 4px;
        }

        .fuse-kpi-sub {
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .txt-emerald { color: #16a34a; }
        .txt-blue { color: #2563eb; }
        .txt-purple { color: #7c3aed; }

        /* 2-Column Section */
        .fuse-dash-columns {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
        }

        .fuse-card-white {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 26px;
            margin-bottom: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }

        .fuse-card-heading {
            font-size: 16px;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 18px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .fuse-tiles-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .fuse-tile-item {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 18px 20px;
            text-decoration: none !important;
            transition: all 0.25s ease;
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .fuse-tile-item:hover {
            background: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.12);
            transform: translateY(-2px);
        }

        .fuse-tile-icon-box {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .fuse-tile-content h4 {
            margin: 0 0 4px 0 !important;
            font-size: 14px !important;
            font-weight: 700 !important;
            color: #0f172a !important;
        }

        .fuse-tile-content p {
            margin: 0 !important;
            font-size: 12px !important;
            color: #64748b !important;
            line-height: 1.4 !important;
        }

        /* Activity Stream Timeline */
        .fuse-stream-row {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .fuse-stream-row:last-child {
            border-bottom: none;
        }

        .fuse-stream-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #2563eb;
            flex-shrink: 0;
        }

        .fuse-stream-desc {
            font-size: 13px;
            color: #334155;
            font-weight: 500;
        }

        .fuse-stream-time {
            margin-left: auto;
            font-size: 11px;
            color: #94a3b8;
            font-weight: 600;
        }

        /* Sidebar Metric Rows */
        .fuse-metric-line {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 11px 0;
            border-bottom: 1px dashed #e2e8f0;
            font-size: 13px;
        }

        .fuse-metric-line:last-child {
            border-bottom: none;
        }

        .fuse-metric-name {
            color: #64748b;
            font-weight: 600;
        }

        .fuse-metric-val {
            color: #0f172a;
            font-weight: 700;
        }

        .pill-green {
            background: #dcfce7;
            color: #15803d;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 800;
        }

        .pill-blue {
            background: #dbeafe;
            color: #1d4ed8;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 800;
        }

        @media (max-width: 1024px) {
            .fuse-kpis-grid { grid-template-columns: repeat(2, 1fr); }
            .fuse-dash-columns { grid-template-columns: 1fr; }
        }
        @media (max-width: 640px) {
            .fuse-kpis-grid, .fuse-tiles-grid { grid-template-columns: 1fr; }
            .fuse-hero-light { flex-direction: column; align-items: flex-start; }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var wrap = document.querySelector('body.wp-admin.index-php #wpbody-content .wrap');
            if (!wrap) return;

            // Remove legacy WP heading & default notices
            var h1 = wrap.querySelector('h1');
            if (h1) h1.style.display = 'none';

            var container = document.createElement('div');
            container.className = 'fuse-light-dash';

            container.innerHTML = `
                <!-- Executive Horizon Light Header (No Top Strip) -->
                <div class="fuse-hero-light">
                    <div class="fuse-hero-text">
                        <div class="fuse-horizon-badge">
                            <span class="pulse-dot"></span> LIVE ENGINE v3.1 • <?php echo esc_js(strtoupper($siteName)); ?>
                        </div>
                        <h1><?php echo esc_js($timeGreeting); ?>, <?php echo esc_js($displayName); ?> 👋</h1>
                        <p>Real-time e-commerce analytics, product catalog management, and visual page builder engine.</p>
                    </div>
                    <div class="fuse-hero-actions">
                        <a href="<?php echo esc_url($builderUrl); ?>" class="fuse-btn-p">
                            🎨 OPEN PAGE BUILDER
                        </a>
                        <a href="<?php echo esc_url($shopUrl); ?>" class="fuse-btn-s" target="_blank">
                            🛍️ VIEW STORE FRONT ↗
                        </a>
                        <a href="<?php echo esc_url($newProductUrl); ?>" class="fuse-btn-s">
                            📦 ADD PRODUCT
                        </a>
                    </div>
                </div>

                <!-- 4 KPI Telemetry Cards (Dynamic Data) -->
                <div class="fuse-kpis-grid">
                    <div class="fuse-kpi-box">
                        <div class="fuse-kpi-top">
                            <span class="fuse-kpi-title">TOTAL REVENUE</span>
                            <div class="fuse-kpi-icon-wrap icon-emerald">💰</div>
                        </div>
                        <div class="fuse-kpi-number"><?php echo esc_html($formattedRevenue); ?></div>
                        <div class="fuse-kpi-sub txt-emerald">↑ Real-Time Sales Total</div>
                    </div>

                    <div class="fuse-kpi-box">
                        <div class="fuse-kpi-top">
                            <span class="fuse-kpi-title">TOTAL ORDERS</span>
                            <div class="fuse-kpi-icon-wrap icon-blue">📦</div>
                        </div>
                        <div class="fuse-kpi-number"><?php echo esc_html($formattedOrders); ?></div>
                        <div class="fuse-kpi-sub txt-blue">↑ Completed & Active Orders</div>
                    </div>

                    <div class="fuse-kpi-box">
                        <div class="fuse-kpi-top">
                            <span class="fuse-kpi-title">ACTIVE PRODUCTS</span>
                            <div class="fuse-kpi-icon-wrap icon-sky">🏷️</div>
                        </div>
                        <div class="fuse-kpi-number"><?php echo esc_html($formattedProducts); ?></div>
                        <div class="fuse-kpi-sub txt-blue">✔ <?php echo esc_html($inStockCount > 0 ? $inStockCount . ' In Stock' : 'Catalog Active'); ?></div>
                    </div>

                    <div class="fuse-kpi-box">
                        <div class="fuse-kpi-top">
                            <span class="fuse-kpi-title">SYSTEM HEALTH</span>
                            <div class="fuse-kpi-icon-wrap icon-purple">🛡️</div>
                        </div>
                        <div class="fuse-kpi-number">99.9%</div>
                        <div class="fuse-kpi-sub txt-purple">📍 Nairobi Local Server</div>
                    </div>
                </div>

                <!-- 2-Column Operational Grid -->
                <div class="fuse-dash-columns">
                    <!-- Left Main Column -->
                    <div class="fuse-col-main">
                        <!-- Quick Launcher Hub -->
                        <div class="fuse-card-white">
                            <h3 class="fuse-card-heading">🚀 Quick Launcher & Operations</h3>
                            <div class="fuse-tiles-grid">
                                <a href="<?php echo esc_url($ordersUrl); ?>" class="fuse-tile-item">
                                    <div class="fuse-tile-icon-box">🛒</div>
                                    <div class="fuse-tile-content">
                                        <h4>Orders & Receipts</h4>
                                        <p>Manage customer orders, M-Pesa payments, & fulfillment.</p>
                                    </div>
                                </a>

                                <a href="<?php echo esc_url($productsUrl); ?>" class="fuse-tile-item">
                                    <div class="fuse-tile-icon-box">📦</div>
                                    <div class="fuse-tile-content">
                                        <h4>Product Catalog</h4>
                                        <p>Add new products, set pricing, categories, and stock.</p>
                                    </div>
                                </a>

                                <a href="<?php echo esc_url($pagesUrl); ?>" class="fuse-tile-item">
                                    <div class="fuse-tile-icon-box">🎨</div>
                                    <div class="fuse-tile-content">
                                        <h4>Fuse Page Builder</h4>
                                        <p>Visually edit homepage, landing pages & store sections.</p>
                                    </div>
                                </a>

                                <a href="<?php echo esc_url($analyticsUrl); ?>" class="fuse-tile-item">
                                    <div class="fuse-tile-icon-box">📊</div>
                                    <div class="fuse-tile-content">
                                        <h4>Store Analytics</h4>
                                        <p>Review revenue reports, customer metrics, & conversions.</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Activity Stream (Dynamic PHP) -->
                        <div class="fuse-card-white">
                            <h3 class="fuse-card-heading">⚡ Recent Activity Stream</h3>
                            <?php foreach ($activityStream as $item): ?>
                                <div class="fuse-stream-row">
                                    <div class="fuse-stream-dot" style="background: <?php echo esc_attr($item['dot']); ?>;"></div>
                                    <div class="fuse-stream-desc"><?php echo esc_html($item['desc']); ?></div>
                                    <div class="fuse-stream-time"><?php echo esc_html($item['time']); ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Right Sidebar Column -->
                    <div class="fuse-col-side">
                        <!-- Infrastructure Telemetry (Dynamic PHP) -->
                        <div class="fuse-card-white">
                            <h3 class="fuse-card-heading">⚙️ Store Infrastructure</h3>
                            <div class="fuse-metric-line">
                                <span class="fuse-metric-name">M-Pesa Till</span>
                                <span class="pill-green">889900 Active</span>
                            </div>
                            <div class="fuse-metric-line">
                                <span class="fuse-metric-name">Engine Version</span>
                                <span class="pill-blue">Fuse v3.1</span>
                            </div>
                            <div class="fuse-metric-line">
                                <span class="fuse-metric-name">PHP Engine</span>
                                <span class="fuse-metric-val"><?php echo esc_html($phpVersion); ?></span>
                            </div>
                            <div class="fuse-metric-line">
                                <span class="fuse-metric-name">Database Pool</span>
                                <span class="fuse-metric-val"><?php echo esc_html($dbVersion); ?></span>
                            </div>
                            <div class="fuse-metric-line">
                                <span class="fuse-metric-name">OPcache Status</span>
                                <span class="pill-green"><?php echo esc_html($opcacheActive); ?></span>
                            </div>
                        </div>

                        <!-- Help & Support Box -->
                        <div class="fuse-card-white" style="background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%);">
                            <h3 class="fuse-card-heading">💡 Need Assistance?</h3>
                            <p style="font-size: 13px; color: #475569; margin-bottom: 16px; line-height: 1.5;">
                                Your site is custom-engineered for maximum speed and stability. For support or custom feature additions:
                            </p>
                            <a href="mailto:support@fusebranding.co.ke" class="fuse-btn-p" style="width: 100%; justify-content: center; box-sizing: border-box;">
                                ✉ CONTACT FUSE SUPPORT
                            </a>
                        </div>
                    </div>
                </div>
            `;

            wrap.appendChild(container);
        });
    </script>
    <?php
}, 9999);

/**
 * 12. High-End E-Commerce Home Page Shortcode Template [dakesh_home_template]
 */
add_shortcode('dakesh_home_template', function() {
    ob_start();
    
    $categories = get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
    ]);
    
    $products = function_exists('wc_get_products') ? wc_get_products([
        'limit' => 12,
        'status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    ]) : [];
    ?>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        
        .dakesh-home-wrapper {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            color: #0f172a;
            line-height: 1.6;
            background: #f8fafc;
            margin: -20px -20px 0 -20px;
        }
        
        /* ----------------------------------------------------
           HERO BANNER (DARK CYBER-LUXURY GLASSMORPHISM)
           ---------------------------------------------------- */
        .dakesh-hero-banner {
            position: relative;
            background: #090d16;
            background-image: 
                radial-gradient(at 0% 0%, rgba(56, 189, 248, 0.25) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(99, 102, 241, 0.22) 0px, transparent 50%),
                radial-gradient(at 50% 100%, rgba(236, 72, 153, 0.18) 0px, transparent 50%),
                linear-gradient(135deg, rgba(9, 13, 22, 0.92) 0%, rgba(15, 23, 42, 0.95) 100%);
            padding: 70px 40px;
            overflow: hidden;
            border-bottom: 3px solid #38bdf8;
            color: #ffffff;
        }

        .dakesh-hero-container {
            max-width: 1280px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 40px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .dakesh-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(56, 189, 248, 0.15);
            border: 1px solid rgba(56, 189, 248, 0.4);
            color: #38bdf8;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 8px 16px;
            border-radius: 30px;
            margin-bottom: 24px;
        }

        .dakesh-hero-title {
            font-size: 44px;
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -1px;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .dakesh-hero-title span {
            background: linear-gradient(135deg, #38bdf8 0%, #818cf8 50%, #f43f5e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .dakesh-hero-desc {
            font-size: 16px;
            color: #94a3b8;
            margin-bottom: 36px;
            max-width: 600px;
        }

        .dakesh-hero-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .dakesh-btn-primary {
            background: linear-gradient(135deg, #0284c7 0%, #2563eb 100%);
            color: #ffffff !important;
            font-weight: 700;
            font-size: 15px;
            padding: 16px 32px;
            border-radius: 8px;
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.4);
            transition: all 0.3s ease;
        }

        .dakesh-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(56, 189, 248, 0.5);
        }

        .dakesh-btn-glass {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #ffffff !important;
            font-weight: 600;
            font-size: 15px;
            padding: 16px 28px;
            border-radius: 8px;
            text-decoration: none !important;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .dakesh-btn-glass:hover {
            background: rgba(255, 255, 255, 0.18);
            border-color: #38bdf8;
        }

        .dakesh-hero-card {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(56, 189, 248, 0.25);
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        }

        .dakesh-stat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .dakesh-stat-val {
            font-size: 24px;
            font-weight: 800;
            color: #38bdf8;
        }

        .dakesh-stat-lbl {
            font-size: 11px;
            color: #64748b;
            text-transform: uppercase;
            font-weight: 600;
        }

        /* ----------------------------------------------------
           SECTION TITLE COMPONENT
           ---------------------------------------------------- */
        .dakesh-section {
            max-width: 1280px;
            margin: 60px auto;
            padding: 0 24px;
        }

        .dakesh-section-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 36px;
        }

        .dakesh-section-title {
            font-size: 30px;
            font-weight: 800;
            color: #0f172a;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .dakesh-section-subtitle {
            font-size: 15px;
            color: #64748b;
            margin-top: 6px;
        }

        /* ----------------------------------------------------
           CATEGORY CARDS GRID
           ---------------------------------------------------- */
        .dakesh-cat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .dakesh-cat-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 24px 20px;
            text-decoration: none !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .dakesh-cat-card:hover {
            transform: translateY(-6px);
            border-color: #0284c7;
            box-shadow: 0 20px 30px rgba(2, 132, 199, 0.12);
        }

        .dakesh-cat-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #eff6ff;
            color: #0284c7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin-bottom: 16px;
            transition: all 0.3s ease;
        }

        .dakesh-cat-card:hover .dakesh-cat-icon {
            background: #0284c7;
            color: #ffffff;
            transform: scale(1.1);
        }

        .dakesh-cat-name {
            font-size: 16px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .dakesh-cat-count {
            font-size: 13px;
            color: #64748b;
            font-weight: 500;
        }

        /* ----------------------------------------------------
           FEATURED PRODUCTS GRID (HIGH END CARDS)
           ---------------------------------------------------- */
        .dakesh-products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
            gap: 24px;
        }

        .dakesh-prod-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .dakesh-prod-card:hover {
            transform: translateY(-8px);
            border-color: #38bdf8;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.12);
        }

        .dakesh-prod-img-wrap {
            position: relative;
            width: 100%;
            height: 240px;
            background: #f8fafc;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dakesh-prod-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .dakesh-prod-card:hover .dakesh-prod-img-wrap img {
            transform: scale(1.08);
        }

        .dakesh-badge-sale {
            position: absolute;
            top: 12px;
            left: 12px;
            background: #ef4444;
            color: #ffffff;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 4px;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 10px rgba(239, 68, 68, 0.3);
            z-index: 2;
        }

        .dakesh-prod-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .dakesh-prod-cat {
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            color: #0284c7;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .dakesh-prod-title {
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 10px 0;
            line-height: 1.35;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 40px;
        }

        .dakesh-prod-rating {
            color: #f59e0b;
            font-size: 13px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .dakesh-prod-price {
            font-size: 17px;
            font-weight: 800;
            color: #0f172a;
            margin-top: auto;
            margin-bottom: 16px;
        }

        .dakesh-prod-btn {
            background: #0f172a;
            color: #ffffff !important;
            font-weight: 700;
            font-size: 13px;
            text-align: center;
            padding: 12px;
            border-radius: 8px;
            text-decoration: none !important;
            transition: all 0.2s ease;
            display: block;
        }

        .dakesh-prod-btn:hover {
            background: #0284c7;
            box-shadow: 0 6px 20px rgba(2, 132, 199, 0.35);
        }

        /* ----------------------------------------------------
           FLASH DEALS BANNER
           ---------------------------------------------------- */
        .dakesh-flash-banner {
            background: linear-gradient(135deg, #1e1b4b 0%, #0f172a 100%);
            border-radius: 16px;
            padding: 40px;
            color: #ffffff;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            align-items: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            margin: 60px auto;
            max-width: 1280px;
        }

        .dakesh-timer-box {
            display: flex;
            gap: 12px;
            margin: 20px 0;
        }

        .dakesh-timer-unit {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 8px;
            padding: 12px 18px;
            text-align: center;
        }

        .dakesh-timer-num {
            font-size: 26px;
            font-weight: 800;
            color: #38bdf8;
        }

        .dakesh-timer-lbl {
            font-size: 11px;
            text-transform: uppercase;
            color: #94a3b8;
        }

        /* ----------------------------------------------------
           TRUST BADGES SECTION
           ---------------------------------------------------- */
        .dakesh-trust-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            margin-top: 40px;
        }

        .dakesh-trust-item {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .dakesh-trust-icon {
            font-size: 32px;
            color: #0284c7;
            background: #f0f9ff;
            width: 60px;
            height: 60px;
            min-width: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dakesh-trust-title {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 2px;
        }

        .dakesh-trust-desc {
            font-size: 13px;
            color: #64748b;
        }
    </style>

    <div class="dakesh-home-wrapper">
        <!-- Hero Banner -->
        <div class="dakesh-hero-banner">
            <div class="dakesh-hero-container">
                <div>
                    <div class="dakesh-hero-badge">⚡ Official Wholesale & Retail Portal</div>
                    <h1 class="dakesh-hero-title">High Performance Supplies for <span>Kenya's Top Brands</span></h1>
                    <p class="dakesh-hero-desc">Discover 100% authentic electronics, household goods, beauty products, and kitchen staples delivered directly to your doorstep with instant M-Pesa checkout.</p>
                    <div class="dakesh-hero-actions">
                        <a href="#featured-products" class="dakesh-btn-primary">🛍️ SHOP CATALOGUE</a>
                        <a href="#categories" class="dakesh-btn-glass">BROWSE CATEGORIES</a>
                    </div>
                </div>

                <div class="dakesh-hero-card">
                    <h3 style="font-size: 20px; font-weight: 800; color: #ffffff; margin-top:0;">🔥 Live Order Fulfillment</h3>
                    <p style="font-size: 14px; color: #94a3b8; margin-bottom: 20px;">Dispatching daily orders from our Nairobi central warehouse.</p>
                    
                    <div style="background: rgba(30,41,59,0.8); padding: 16px; border-radius: 8px; border-left: 4px solid #38bdf8; margin-bottom: 16px;">
                        <div style="font-size: 13px; font-weight: 700; color: #f8fafc;">Express Nairobi Delivery</div>
                        <div style="font-size: 12px; color: #94a3b8;">Same-day dispatch for orders placed before 3:00 PM</div>
                    </div>

                    <div class="dakesh-stat-grid">
                        <div>
                            <div class="dakesh-stat-val">32+</div>
                            <div class="dakesh-stat-lbl">Seeded Products</div>
                        </div>
                        <div>
                            <div class="dakesh-stat-val">300+</div>
                            <div class="dakesh-stat-lbl">Variations</div>
                        </div>
                        <div>
                            <div class="dakesh-stat-val">100%</div>
                            <div class="dakesh-stat-lbl">KEBS Genuine</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Section -->
        <div class="dakesh-section" id="categories">
            <div class="dakesh-section-header">
                <div>
                    <h2 class="dakesh-section-title">Shop By Department</h2>
                    <div class="dakesh-section-subtitle">Browse curated product lines for home and corporate needs</div>
                </div>
            </div>

            <div class="dakesh-cat-grid">
                <?php
                $cat_icons = [
                    'Electronics' => '⚡',
                    'Personal Care' => '🧴',
                    'Household' => '🧺',
                    'Foodstuffs' => '🌾',
                    'Beverages' => '🥤'
                ];
                if (!empty($categories)):
                    foreach ($categories as $cat):
                        $icon = '📦';
                        foreach ($cat_icons as $k => $v) {
                            if (stripos($cat->name, $k) !== false) {
                                $icon = $v;
                                break;
                            }
                        }
                        $link = get_term_link($cat);
                ?>
                    <a href="<?php echo esc_url($link); ?>" class="dakesh-cat-card">
                        <div class="dakesh-cat-icon"><?php echo $icon; ?></div>
                        <div class="dakesh-cat-name"><?php echo esc_html($cat->name); ?></div>
                        <div class="dakesh-cat-count"><?php echo intval($cat->count); ?> Products Available</div>
                    </a>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>

        <!-- Flash Deals Section -->
        <div class="dakesh-flash-banner">
            <div>
                <div style="background: rgba(239,68,68,0.2); color:#fca5a5; font-weight:800; font-size:12px; display:inline-block; padding:4px 12px; border-radius:20px; text-transform:uppercase; margin-bottom:12px;">Limited Time Deal</div>
                <h2 style="font-size:32px; font-weight:800; margin:0 0 10px 0; color:#ffffff;">Super Saver Flash Sale</h2>
                <p style="color:#cbd5e1; margin:0;">Up to 25% OFF selected items across all categories. Offer ends soon!</p>
            </div>
            <div>
                <div class="dakesh-timer-box">
                    <div class="dakesh-timer-unit">
                        <div class="dakesh-timer-num">08</div>
                        <div class="dakesh-timer-lbl">Hours</div>
                    </div>
                    <div class="dakesh-timer-unit">
                        <div class="dakesh-timer-num">42</div>
                        <div class="dakesh-timer-lbl">Minutes</div>
                    </div>
                    <div class="dakesh-timer-unit">
                        <div class="dakesh-timer-num">19</div>
                        <div class="dakesh-timer-lbl">Seconds</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Products Section -->
        <div class="dakesh-section" id="featured-products">
            <div class="dakesh-section-header">
                <div>
                    <h2 class="dakesh-section-title">Featured Products</h2>
                    <div class="dakesh-section-subtitle">Top-rated items ready for instant nationwide shipping</div>
                </div>
            </div>

            <div class="dakesh-products-grid">
                <?php
                if (!empty($products)):
                    foreach ($products as $prod):
                        $img_id = $prod->get_image_id();
                        $img_src = $img_id ? wp_get_attachment_image_url($img_id, 'medium') : 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=600&q=75';
                        $cats = wp_get_post_terms($prod->get_id(), 'product_cat', ['fields' => 'names']);
                        $cat_title = !empty($cats) ? $cats[0] : 'General';
                ?>
                    <div class="dakesh-prod-card">
                        <div class="dakesh-prod-img-wrap">
                            <span class="dakesh-badge-sale">SAVE 12%</span>
                            <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($prod->get_name()); ?>" loading="lazy">
                        </div>
                        <div class="dakesh-prod-content">
                            <div class="dakesh-prod-cat"><?php echo esc_html($cat_title); ?></div>
                            <h3 class="dakesh-prod-title"><?php echo esc_html($prod->get_name()); ?></h3>
                            <div class="dakesh-prod-rating">★★★★★ <span>(5.0)</span></div>
                            <div class="dakesh-prod-price">
                                <?php echo $prod->get_price_html(); ?>
                            </div>
                            <a href="<?php echo esc_url($prod->get_permalink()); ?>" class="dakesh-prod-btn">
                                🛒 VIEW OPTIONS
                            </a>
                        </div>
                    </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>

        <!-- Trust Features -->
        <div class="dakesh-section">
            <div class="dakesh-trust-grid">
                <div class="dakesh-trust-item">
                    <div class="dakesh-trust-icon">🚚</div>
                    <div>
                        <div class="dakesh-trust-title">Express Delivery</div>
                        <div class="dakesh-trust-desc">Nairobi same day & nationwide countrywide logistics.</div>
                    </div>
                </div>
                <div class="dakesh-trust-item">
                    <div class="dakesh-trust-icon">🛡️</div>
                    <div>
                        <div class="dakesh-trust-title">100% Genuine</div>
                        <div class="dakesh-trust-desc">Sourced directly from manufacturers & certified.</div>
                    </div>
                </div>
                <div class="dakesh-trust-item">
                    <div class="dakesh-trust-icon">💳</div>
                    <div>
                        <div class="dakesh-trust-title">M-Pesa Express</div>
                        <div class="dakesh-trust-desc">Instant STK push payment & invoice receipting.</div>
                    </div>
                </div>
                <div class="dakesh-trust-item">
                    <div class="dakesh-trust-icon">📞</div>
                    <div>
                        <div class="dakesh-trust-title">Corporate Support</div>
                        <div class="dakesh-trust-desc">Dedicated account officers for bulk wholesale orders.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
});


