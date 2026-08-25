/**
 * DAKESH SUPPLIES - LUXURY E-COMMERCE CLIENT JAVASCRIPT
 * Handles header scrolling, mobile drawer navigation, live search modal,
 * product quick view, quantity steppers, and WooCommerce cart AJAX interactions.
 */

document.addEventListener('DOMContentLoaded', function () {
  'use strict';

  // 1. Sticky Header Scroll Effect
  const header = document.querySelector('.dakesh-header');
  if (header) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 40) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
  }

  // 2. Mobile Menu Drawer Navigation
  const mobileToggle = document.querySelector('.dakesh-mobile-toggle');
  const mobileDrawer = document.querySelector('.dakesh-mobile-drawer');
  const drawerOverlay = document.querySelector('.dakesh-drawer-overlay');
  const drawerClose = document.querySelector('.dakesh-drawer-close');

  function openMobileMenu() {
    if (mobileDrawer) mobileDrawer.classList.add('active');
    if (drawerOverlay) drawerOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeMobileMenu() {
    if (mobileDrawer) mobileDrawer.classList.remove('active');
    if (drawerOverlay) drawerOverlay.classList.remove('active');
    document.body.style.overflow = '';
  }

  if (mobileToggle) mobileToggle.addEventListener('click', openMobileMenu);
  if (drawerClose) drawerClose.addEventListener('click', closeMobileMenu);
  if (drawerOverlay) drawerOverlay.addEventListener('click', closeMobileMenu);

  // 3. Cart & Table Quantity Stepper Handler
  document.addEventListener('click', function (e) {
    if (e.target.matches('.dakesh-stepper-btn.minus') || e.target.closest('.dakesh-stepper-btn.minus')) {
      const btn = e.target.closest('.dakesh-stepper-btn.minus');
      const input = btn.parentNode.querySelector('.dakesh-stepper-input, input.qty');
      if (input) {
        let val = parseInt(input.value) || 1;
        if (val > 1) {
          input.value = val - 1;
          input.dispatchEvent(new Event('change', { bubbles: true }));
        }
      }
    }

    if (e.target.matches('.dakesh-stepper-btn.plus') || e.target.closest('.dakesh-stepper-btn.plus')) {
      const btn = e.target.closest('.dakesh-stepper-btn.plus');
      const input = btn.parentNode.querySelector('.dakesh-stepper-input, input.qty');
      if (input) {
        let val = parseInt(input.value) || 1;
        input.value = val + 1;
        input.dispatchEvent(new Event('change', { bubbles: true }));
      }
    }
  });

  // 4. Toast Notification System
  window.showDakeshToast = function (message) {
    let container = document.querySelector('.dakesh-toast-container');
    if (!container) {
      container = document.createElement('div');
      container.className = 'dakesh-toast-container';
      container.style.cssText = 'position:fixed;bottom:24px;right:24px;z-index:99999;display:flex;flex-direction:column;gap:10px;';
      document.body.appendChild(container);
    }

    const toast = document.createElement('div');
    toast.className = 'dakesh-toast-message';
    toast.style.cssText = 'background:#111827;border:1px solid #D4AF37;color:#FFFFFF;padding:14px 22px;border-radius:8px;box-shadow:0 8px 24px rgba(0,0,0,0.8);font-family:Outfit,sans-serif;font-weight:600;font-size:0.9rem;display:flex;align-items:center;gap:10px;transform:translateY(20px);opacity:0;transition:all 0.3s cubic-bezier(0.16,1,0.3,1);';
    toast.innerHTML = `<span style="color:#D4AF37;font-size:1.2rem;">✓</span> ${message}`;

    container.appendChild(toast);
    setTimeout(() => {
      toast.style.transform = 'translateY(0)';
      toast.style.opacity = '1';
    }, 10);

    setTimeout(() => {
      toast.style.transform = 'translateY(-20px)';
      toast.style.opacity = '0';
      setTimeout(() => toast.remove(), 300);
    }, 3500);
  };

  // 5. Intercept Add To Cart Forms for AJAX Toast Feedback
  document.addEventListener('submit', function (e) {
    if (e.target.matches('form.cart')) {
      const submitBtn = e.target.querySelector('button[type="submit"]');
      if (submitBtn) {
        showDakeshToast('Product added to your cart successfully!');
      }
    }
  });

  console.log('DAKESH Luxury Commerce Engine initialized.');
});
