/**
 * SILVERSHEEN - Mobile UI JavaScript
 * Interactive behaviors: drawer, search, cart, tabs, wishlist, scroll-effects
 */

(function () {
  'use strict';

  /* =============================================
     UTILITY HELPERS
  ============================================= */

  function qs(sel, ctx) { return (ctx || document).querySelector(sel); }
  function qsa(sel, ctx) { return (ctx || document).querySelectorAll(sel); }

  function lockBody() {
    document.body.style.overflow = 'hidden';
  }

  function unlockBody() {
    document.body.style.overflow = '';
  }

  /* =============================================
     ANNOUNCEMENT BAR — pause on hover
  ============================================= */

  var annTrack = qs('.announcement-track');
  if (annTrack) {
    annTrack.addEventListener('mouseenter', function () {
      annTrack.style.animationPlayState = 'paused';
    });
    annTrack.addEventListener('mouseleave', function () {
      annTrack.style.animationPlayState = 'running';
    });
  }

  /* =============================================
     SEARCH BAR TOGGLE
  ============================================= */

  var searchToggle = qs('#searchToggle');
  var searchBar = qs('#searchBar');
  var closeSearch = qs('#closeSearch');

  if (searchToggle && searchBar) {
    searchToggle.addEventListener('click', function () {
      searchBar.classList.toggle('open');
      if (searchBar.classList.contains('open')) {
        var inp = searchBar.querySelector('input');
        if (inp) inp.focus();
      }
    });

    if (closeSearch) {
      closeSearch.addEventListener('click', function () {
        searchBar.classList.remove('open');
      });
    }
  }

  /* =============================================
     DRAWER MENU / HAMBURGER
  ============================================= */

  var menuToggle = qs('#menuToggle');
  var closeMenu = qs('#closeMenu');
  var drawerMenu = qs('#drawerMenu');
  var drawerOverlay = qs('#drawerOverlay');

  function openDrawer() {
    drawerMenu.classList.add('open');
    drawerOverlay.classList.add('open');
    lockBody();
  }

  function closeDrawer() {
    drawerMenu.classList.remove('open');
    drawerOverlay.classList.remove('open');
    unlockBody();
  }

  if (menuToggle) menuToggle.addEventListener('click', openDrawer);
  if (closeMenu) closeMenu.addEventListener('click', closeDrawer);
  if (drawerOverlay) drawerOverlay.addEventListener('click', closeDrawer);

  // Accordion sub-menus in drawer
  qsa('.drawer-link[data-target]').forEach(function (link) {
    link.addEventListener('click', function () {
      var targetId = this.getAttribute('data-target');
      var sub = qs('#' + targetId);
      var icon = this.querySelector('.bi-chevron-down');

      // Toggle current
      var isOpen = sub.classList.contains('open');
      // Close all others
      qsa('.sub-menu.open').forEach(function (el) { el.classList.remove('open'); });
      qsa('.drawer-link.open').forEach(function (el) { el.classList.remove('open'); });

      if (!isOpen) {
        sub.classList.add('open');
        this.classList.add('open');
      }
    });
  });

  /* =============================================
     CART DRAWER
  ============================================= */

  var cartToggle = qs('#cartToggle');
  var cartDrawer = qs('#cartDrawer');
  var cartOverlay = qs('#cartOverlay');
  var closeCart = qs('#closeCart');
  var navCart = qs('#navCart');

  function openCart() {
    cartDrawer.classList.add('open');
    cartOverlay.classList.add('open');
    lockBody();
  }

  function closeCartFn() {
    cartDrawer.classList.remove('open');
    cartOverlay.classList.remove('open');
    unlockBody();
  }

  if (cartToggle) cartToggle.addEventListener('click', openCart);
  if (navCart) navCart.addEventListener('click', function (e) { e.preventDefault(); openCart(); });
  if (closeCart) closeCart.addEventListener('click', closeCartFn);
  if (cartOverlay) cartOverlay.addEventListener('click', closeCartFn);

  // Quantity controls
  document.addEventListener('click', function (e) {
    if (e.target.classList.contains('qty-btn')) {
      var btn = e.target;
      var ctrl = btn.closest('.qty-control');
      if (!ctrl) return;
      var valEl = ctrl.querySelector('.qty-val');
      var val = parseInt(valEl.textContent, 10) || 1;

      if (btn.textContent.trim() === '+') {
        val = Math.min(val + 1, 99);
      } else {
        val = Math.max(val - 1, 1);
      }
      valEl.textContent = val;
    }
  });

  /* =============================================
     BOTTOM NAV — active state
  ============================================= */

  qsa('.bottom-nav-item').forEach(function (item) {
    item.addEventListener('click', function (e) {
      // Skip the cart link — handled separately
      if (this.id === 'navCart') return;
      // allow profile and shop links to use their hrefs
      if (this.id === 'navProfile' || this.id === 'navShop') return;

      e.preventDefault();
      qsa('.bottom-nav-item').forEach(function (i) {
        i.classList.remove('active');
      });
      this.classList.add('active');

      // Search click mirrors header search toggle
      if (this.id === 'navSearch' && searchBar) {
        searchBar.classList.toggle('open');
        if (searchBar.classList.contains('open')) {
          var inp = searchBar.querySelector('input');
          if (inp) inp.focus();
        }
      }
    });
  });

  /* =============================================
     ESSENTIALS TABS
  ============================================= */

  qsa('.essentials-tab').forEach(function (tab) {
    tab.addEventListener('click', function () {
      qsa('.essentials-tab').forEach(function (t) { t.classList.remove('active'); });
      this.classList.add('active');
      // (In a real Shopify build, this would trigger an AJAX section render)
    });
  });

  /* =============================================
     WISHLIST — heart toggle
  ============================================= */

  document.addEventListener('click', function (e) {
    var btn = e.target.closest('.btn-wish');
    if (!btn) return;
    var icon = btn.querySelector('i');
    if (!icon) return;

    if (icon.classList.contains('bi-heart')) {
      icon.classList.replace('bi-heart', 'bi-heart-fill');
      btn.classList.add('active');
      showToast('Added to Wishlist ♡');
    } else {
      icon.classList.replace('bi-heart-fill', 'bi-heart');
      btn.classList.remove('active');
    }
  });

  /* =============================================
     ADD TO BAG — quick add button animation
  ============================================= */

  document.addEventListener('click', function (e) {
    var btn = e.target.closest('.btn-quick-add, .btn-choose-options');
    if (!btn) return;
    var orig = btn.textContent.trim();
    btn.textContent = '✓ Added';
    btn.style.background = '#1a1a1a';
    btn.style.color = '#fff';
    btn.style.borderColor = '#1a1a1a';
    setTimeout(function () {
      btn.textContent = orig;
      btn.style.background = '';
      btn.style.color = '';
      btn.style.borderColor = '';
    }, 1500);
    // Bump cart badge
    var badge = qs('.cart-badge');
    var countBadge = qs('.cart-count-badge');
    if (badge) {
      var n = parseInt(badge.textContent, 10) || 0;
      badge.textContent = n + 1;
    }
    if (countBadge) {
      var m = parseInt(countBadge.textContent, 10) || 0;
      countBadge.textContent = m + 1;
    }
    showToast('Item added to bag 🛍️');
  });

  /* =============================================
     TOAST NOTIFICATION
  ============================================= */

  function showToast(msg) {
    var existing = qs('.ss-toast');
    if (existing) existing.remove();

    var toast = document.createElement('div');
    toast.className = 'ss-toast';
    toast.textContent = msg;
    toast.style.cssText = [
      'position:fixed',
      'bottom:80px',
      'left:50%',
      'transform:translateX(-50%) translateY(20px)',
      'background:#1a1a1a',
      'color:#fff',
      'font-family:Jost,sans-serif',
      'font-size:0.78rem',
      'padding:10px 20px',
      'border-radius:50px',
      'z-index:9999',
      'opacity:0',
      'transition:all 0.35s ease',
      'white-space:nowrap',
      'box-shadow:0 4px 20px rgba(0,0,0,0.25)'
    ].join(';');

    document.body.appendChild(toast);

    requestAnimationFrame(function () {
      toast.style.opacity = '1';
      toast.style.transform = 'translateX(-50%) translateY(0)';
    });

    setTimeout(function () {
      toast.style.opacity = '0';
      toast.style.transform = 'translateX(-50%) translateY(10px)';
      setTimeout(function () { toast.remove(); }, 400);
    }, 2200);
  }

  /* =============================================
     HEADER SCROLL EFFECT — shrink on scroll
  ============================================= */

  var header = qs('.site-header');
  var lastScrollY = 0;

  window.addEventListener('scroll', function () {
    var y = window.scrollY;

    // Hide header on scroll down, show on scroll up
    if (y > lastScrollY && y > 80) {
      header.style.transform = 'translateY(-100%)';
      header.style.transition = 'transform 0.35s ease';
    } else {
      header.style.transform = 'translateY(0)';
    }
    lastScrollY = y;
  }, { passive: true });

  /* =============================================
     SCROLL-INTO-VIEW FADE ANIMATIONS
  ============================================= */

  if ('IntersectionObserver' in window) {
    var fadeEls = qsa('.section-wrap, .trust-section, .promo-banner-section, .insta-section, .site-footer');

    var fadeObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('fade-in-up');
          fadeObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08 });

    fadeEls.forEach(function (el) {
      el.style.opacity = '0';
      el.style.transform = 'translateY(16px)';
      el.style.transition = 'opacity 0.55s ease, transform 0.55s ease';
      fadeObserver.observe(el);
    });
  }

  /* =============================================
     PRODUCT SCROLL — touch drag support
  ============================================= */

  qsa('.product-scroll, .category-scroll, .insta-scroll').forEach(function (scroller) {
    var isDown = false;
    var startX;
    var scrollLeft;

    scroller.addEventListener('mousedown', function (e) {
      isDown = true;
      scroller.style.cursor = 'grabbing';
      startX = e.pageX - scroller.offsetLeft;
      scrollLeft = scroller.scrollLeft;
    });

    scroller.addEventListener('mouseleave', function () {
      isDown = false;
      scroller.style.cursor = '';
    });

    scroller.addEventListener('mouseup', function () {
      isDown = false;
      scroller.style.cursor = '';
    });

    scroller.addEventListener('mousemove', function (e) {
      if (!isDown) return;
      e.preventDefault();
      var x = e.pageX - scroller.offsetLeft;
      var walk = (x - startX) * 1.5;
      scroller.scrollLeft = scrollLeft - walk;
    });
  });

  /* =============================================
     CATEGORY ACTIVE STATE & STORY VIEWER
  ============================================= */

  qsa('.category-item').forEach(function (item, idx) {
    item.addEventListener('click', function (e) {
      e.preventDefault();

      // Update border color
      qsa('.category-item').forEach(function (i) {
        var wrap = i.querySelector('.cat-img-wrap');
        if (wrap) wrap.style.borderColor = '';
      });
      var currentWrap = this.querySelector('.cat-img-wrap');
      if (currentWrap) currentWrap.style.borderColor = '#c9a96e';

      // Open story
      if (typeof openStory === 'function') {
        openStory(idx);
      }
    });
  });

  /* =============================================
     COLOR SECTION — hover label pulse
  ============================================= */

  qsa('.color-card').forEach(function (card) {
    card.addEventListener('mouseenter', function () {
      var label = this.querySelector('.color-label');
      if (label) {
        label.style.transform = 'translateY(-3px)';
        label.style.transition = 'transform 0.3s ease';
      }
    });
    card.addEventListener('mouseleave', function () {
      var label = this.querySelector('.color-label');
      if (label) {
        label.style.transform = '';
      }
    });
  });

  /* =============================================
     INIT LOG
  ============================================= */

  console.log('%cSILVERSHEEN ✦ Mobile UI Ready', 'color:#c9a96e;font-size:14px;font-weight:600;font-family:Georgia,serif;');

  /* =============================================
     INSTAGRAM-STYLE STORY VIEWER
  ============================================= */

  /* ─── Data: one entry per category tile ─── */
  var STORY_DATA = [
    {
      category: 'Anklets',
      thumbUrl: 'https://images.unsplash.com/photo-1573408301185-9519f94815f5?w=150&h=150&fit=crop&q=80',
      products: [
        {
          name: 'Silver Black Rhodium Anklet',
          img: 'https://images.unsplash.com/photo-1573408301185-9519f94815f5?w=600&h=900&fit=crop&q=85',
          price: '₹899',
          original: '₹999',
          discount: '10% Off',
          desc: 'Crafted from 925 sterling silver with a sleek black rhodium finish. Lightweight and perfect for everyday wear. Adjustable length, anti-tarnish coated, skin-friendly.'
        },
        {
          name: 'Silver Rose Twilight Beads Anklet',
          img: 'https://images.unsplash.com/photo-1602751584552-8ba73aad10e1?w=600&h=900&fit=crop&q=85',
          price: '₹999',
          original: '₹1,099',
          discount: '10% Off',
          desc: 'Delicate rose-gold beads on a fine sterling silver chain. Effortlessly chic for beach days or casual outings. BIS 925 hallmarked.'
        },
        {
          name: 'Silver Chain Oval Anklet',
          img: 'https://images.unsplash.com/photo-1617038220319-276d3cfab638?w=600&h=900&fit=crop&q=85',
          price: '₹849',
          original: '₹949',
          discount: '10% Off',
          desc: 'Oval-link chain anklet in pure 925 sterling silver. Minimalist design with secure lobster clasp. Great as a standalone or layered piece.'
        }
      ]
    },
    {
      category: 'Earrings',
      thumbUrl: 'https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=150&h=150&fit=crop&q=80',
      products: [
        {
          name: 'Silver Flower Stud Earrings',
          img: 'https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=600&h=900&fit=crop&q=85',
          price: '₹849',
          original: '₹949',
          discount: '10% Off',
          desc: 'Delicate floral stud earrings in polished 925 sterling silver. Ideal for daily wear or gifting. Hypoallergenic posts for sensitive ears.'
        },
        {
          name: 'Kundan Statement Earrings',
          img: 'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=600&h=900&fit=crop&q=85',
          price: '₹1,499',
          original: '₹1,799',
          discount: '17% Off',
          desc: 'Traditional Kundan work set in sterling silver base. Perfect for festive occasions and weddings. Comes with secure butterfly backs.'
        }
      ]
    },
    {
      category: 'Bracelets',
      thumbUrl: 'https://images.unsplash.com/photo-1602751584552-8ba73aad10e1?w=150&h=150&fit=crop&q=80',
      products: [
        {
          name: 'Silver Crystal Vine Bracelet',
          img: 'https://images.unsplash.com/photo-1617038220319-276d3cfab638?w=600&h=900&fit=crop&q=85',
          price: '₹1,199',
          original: '₹1,299',
          discount: '10% Off',
          desc: 'Intricate vine-pattern bracelet adorned with sparkling crystals. Handcrafted from 925 sterling silver. Adjustable lobster clasp for a perfect fit.'
        },
        {
          name: 'Silver Evil Eye Bracelet',
          img: 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=600&h=900&fit=crop&q=85',
          price: '₹1,079',
          original: '₹1,199',
          discount: '10% Off',
          desc: 'Turquoise evil-eye charm bracelet in oxidised 925 silver. A protective talisman and style statement all in one.'
        }
      ]
    },
    {
      category: 'Necklaces',
      thumbUrl: 'https://images.unsplash.com/photo-1617038220319-276d3cfab638?w=150&h=150&fit=crop&q=80',
      products: [
        {
          name: 'Silver Flower Charm Necklace',
          img: 'https://images.unsplash.com/photo-1584302179602-e4c3d3fd629d?w=600&h=900&fit=crop&q=85',
          price: '₹1,349',
          original: '₹1,499',
          discount: '10% Off',
          desc: 'Elegant flower charm pendant on a delicate 925 sterling silver chain. 18-inch length with a 2-inch extender. Perfect layering piece.'
        },
        {
          name: 'Silver Swan Crystal Chain',
          img: 'https://images.unsplash.com/photo-1617038220319-276d3cfab638?w=600&h=900&fit=crop&q=85',
          price: '₹1,249',
          original: '₹1,399',
          discount: '10% Off',
          desc: 'Swan-inspired crystal chain necklace in polished 925 silver. Timeless and graceful, suitable for evening wear and gifting.'
        }
      ]
    },
    {
      category: 'Rings',
      thumbUrl: 'https://images.unsplash.com/photo-1598560917505-59a3ad559071?w=150&h=150&fit=crop&q=80',
      products: [
        {
          name: 'Silver Minimal Band Ring',
          img: 'https://images.unsplash.com/photo-1598560917505-59a3ad559071?w=600&h=900&fit=crop&q=85',
          price: '₹649',
          original: '₹749',
          discount: '13% Off',
          desc: 'Ultra-thin minimal band ring in polished 925 sterling silver. Stackable design. Available in sizes 5–12. Great for gifting.'
        },
        {
          name: 'Silver Rose Cut Design Ring',
          img: 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=600&h=900&fit=crop&q=85',
          price: '₹849',
          original: '₹999',
          discount: '15% Off',
          desc: 'Vintage-inspired rose-cut design ring. 925 certified silver with fine texture detailing. Adjustable free-size, fits most.'
        }
      ]
    },
    {
      category: 'Bangles',
      thumbUrl: 'https://images.unsplash.com/photo-1630019852942-f89202989a59?w=150&h=150&fit=crop&q=80',
      products: [
        {
          name: 'Silver Minimal Bangle',
          img: 'https://images.unsplash.com/photo-1630019852942-f89202989a59?w=600&h=900&fit=crop&q=85',
          price: '₹1,099',
          original: '₹1,299',
          discount: '15% Off',
          desc: 'Slim, polished silver bangle with a smooth finish. Hypoallergenic 925 sterling silver. Wear solo or stack with others.'
        }
      ]
    },
    {
      category: 'Chains',
      thumbUrl: 'https://images.unsplash.com/photo-1584302179602-e4c3d3fd629d?w=150&h=150&fit=crop&q=80',
      products: [
        {
          name: 'Silver Evil Eye Chain',
          img: 'https://images.unsplash.com/photo-1584302179602-e4c3d3fd629d?w=600&h=900&fit=crop&q=85',
          price: '₹1,079',
          original: '₹1,199',
          discount: '10% Off',
          desc: 'Fine paperclip-style sterling silver chain with a blue evil eye charm pendant. 20-inch length. BIS 925 certified.'
        }
      ]
    },
    {
      category: 'Pendant Sets',
      thumbUrl: 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=150&h=150&fit=crop&q=80',
      products: [
        {
          name: 'Silver Rose Green Triangle Pendant Set',
          img: 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=600&h=900&fit=crop&q=85',
          price: '₹1,349',
          original: '₹1,499',
          discount: '10% Off',
          desc: 'Geometric triangle pendant set with green tourmaline and rose gold plating. Includes a 925 certified silver chain. Perfect for gifting.'
        }
      ]
    },
    {
      category: 'Kundan',
      thumbUrl: 'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=150&h=150&fit=crop&q=80',
      products: [
        {
          name: 'Kundan Maang Tikka Set',
          img: 'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=600&h=900&fit=crop&q=85',
          price: '₹1,899',
          original: '₹2,199',
          discount: '14% Off',
          desc: 'Intricately crafted Kundan Maang Tikka with matching earrings. Sterling silver base with vibrant coloured stones. Traditional yet modern.'
        }
      ]
    },
    {
      category: 'Toe Rings',
      thumbUrl: 'https://images.unsplash.com/photo-1664575600850-c4b712e6e2bf?w=150&h=150&fit=crop&q=80',
      products: [
        {
          name: 'Silver Rose Luna Shine Toe Ring',
          img: 'https://images.unsplash.com/photo-1664575600850-c4b712e6e2bf?w=600&h=900&fit=crop&q=85',
          price: '₹649',
          original: '₹719',
          discount: '10% Off',
          desc: 'Adjustable rose-gold plated toe ring in 925 sterling silver. Luna crescent motif. Comfortable fit, anti-tarnish.'
        },
        {
          name: 'Silver Minimalist Toe Ring',
          img: 'https://images.unsplash.com/photo-1573408301185-9519f94815f5?w=600&h=900&fit=crop&q=85',
          price: '₹499',
          original: '₹579',
          discount: '14% Off',
          desc: 'Sleek open-band toe ring in pure 925 sterling silver. Free size, easy to wear. Perfect for everyday casual styling.'
        }
      ]
    }
  ];

  /* ─── State ─── */
  var sv = {
    catIdx: 0,   // current category index
    prodIdx: 0,   // current product within category
    timer: null,
    progTimer: null,
    duration: 5000, // ms per product
    startTs: 0,
    elapsed: 0,
    paused: false,
    open: false,
    touchStartX: 0,
    touchStartY: 0
  };

  /* ─── DOM refs ─── */
  var svOverlay = qs('#storyOverlay');
  var svCatStrip = qs('#storyCatStrip');
  var svProgressBars = qs('#storyProgressBars');
  var svAvatarImg = qs('#storyAvatarImg');
  var svCatNameTop = qs('#storyCatNameTop');
  var svMainImg = qs('#storyMainImg');
  var svTapLeft = qs('#storyTapLeft');
  var svTapRight = qs('#storyTapRight');
  var svClose = qs('#storyClose');
  var svCatPrev = qs('#storyCatPrev');
  var svCatNext = qs('#storyCatNext');
  var svBadge = qs('#storyBadge');
  var svName = qs('#storyProductName');
  var svPriceCur = qs('#storyPriceCurrent');
  var svPriceOri = qs('#storyPriceOriginal');
  var svPriceSave = qs('#storyPriceSave');
  var svDesc = qs('#storyDesc');
  var svReadMore = qs('#storyReadMore');
  var svWish = qs('#storyWish');
  var svAddBag = qs('#storyAddBag');

  /* Spinner + pause dot */
  var spinner = document.createElement('div');
  spinner.className = 'story-spinner';
  svOverlay.appendChild(spinner);

  var pauseDot = document.createElement('div');
  pauseDot.className = 'story-paused-dot';
  pauseDot.innerHTML = '<i class="bi bi-pause-fill"></i>';
  svOverlay.appendChild(pauseDot);

  /* ─── Build category bubble strip ─── */
  STORY_DATA.forEach(function (cat, idx) {
    var b = document.createElement('div');
    b.className = 'story-cat-bubble';
    b.setAttribute('data-idx', idx);
    b.innerHTML =
      '<img class="story-cat-bubble-img" src="' + cat.thumbUrl + '" alt="' + cat.category + '" loading="lazy" />' +
      '<span class="story-cat-bubble-label">' + cat.category + '</span>';
    b.addEventListener('click', function () {
      goCategory(parseInt(this.getAttribute('data-idx'), 10));
    });
    svCatStrip.appendChild(b);
  });

  /* ─── Open story viewer ─── */
  function openStory(catIdx) {
    sv.catIdx = catIdx;
    sv.prodIdx = 0;
    sv.open = true;
    lockBody();
    svOverlay.classList.add('open');
    renderCat();
    renderProduct();
    startTimer();
  }

  /* ─── Close ─── */
  function closeStory() {
    sv.open = false;
    clearTimeout(sv.timer);
    cancelAnimationFrame(sv.progTimer);
    svOverlay.classList.remove('open');
    unlockBody();
    // Reset read more
    svDesc.classList.remove('expanded');
    svReadMore.classList.remove('open');
    svReadMore.innerHTML = 'Read more <i class="bi bi-chevron-down"></i>';
  }

  /* ─── Render current category meta ─── */
  function renderCat() {
    var cat = STORY_DATA[sv.catIdx];
    svAvatarImg.src = cat.thumbUrl;
    svCatNameTop.textContent = cat.category;

    // Update bubble strip active state & scroll to it
    qsa('.story-cat-bubble').forEach(function (b, i) {
      b.classList.toggle('active', i === sv.catIdx);
    });
    var activeBubble = svCatStrip.children[sv.catIdx];
    if (activeBubble) activeBubble.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });

    // Build progress segments for this category's product count
    svProgressBars.innerHTML = '';
    var products = cat.products;
    for (var i = 0; i < products.length; i++) {
      var seg = document.createElement('div');
      seg.className = 'story-progress-seg';
      var fill = document.createElement('div');
      fill.className = 'story-progress-fill';
      seg.appendChild(fill);
      svProgressBars.appendChild(seg);
    }
  }

  /* ─── Render current product ─── */
  function renderProduct() {
    var cat = STORY_DATA[sv.catIdx];
    var prod = cat.products[sv.prodIdx];
    if (!prod) return;

    // Reset read more
    svDesc.classList.remove('expanded');
    svReadMore.classList.remove('open');
    svReadMore.innerHTML = 'Read more <i class="bi bi-chevron-down"></i>';

    // Mark past segs done, reset current & future
    var segs = svProgressBars.children;
    for (var i = 0; i < segs.length; i++) {
      var fill = segs[i].querySelector('.story-progress-fill');
      if (i < sv.prodIdx) {
        fill.style.transition = 'none';
        fill.style.width = '100%';
        segs[i].classList.add('done');
      } else {
        fill.style.transition = 'none';
        fill.style.width = '0%';
        segs[i].classList.remove('done');
      }
    }

    // Load image with fade
    svMainImg.classList.add('loading');
    spinner.classList.add('visible');
    var newImg = new Image();
    newImg.onload = function () {
      svMainImg.src = prod.img;
      svMainImg.classList.remove('loading');
      spinner.classList.remove('visible');
    };
    newImg.onerror = function () {
      svMainImg.src = prod.img; // try anyway
      svMainImg.classList.remove('loading');
      spinner.classList.remove('visible');
    };
    newImg.src = prod.img;

    // Info panel
    svBadge.textContent = prod.discount || '';
    svName.textContent = prod.name;
    svPriceCur.textContent = prod.price;
    svPriceOri.textContent = prod.original || '';
    // Calculate save amount
    if (prod.discount) {
      svPriceSave.textContent = 'Save ' + prod.discount;
    } else {
      svPriceSave.textContent = '';
    }
    svDesc.textContent = prod.desc || '';

    // Reset wish state
    var wIcon = svWish.querySelector('i');
    wIcon.className = 'bi bi-heart';
    svWish.classList.remove('active');
  }

  /* ─── Timer & progress animation ─── */
  function startTimer() {
    clearTimeout(sv.timer);
    cancelAnimationFrame(sv.progTimer);
    sv.startTs = performance.now();
    sv.elapsed = 0;
    sv.paused = false;
    animateProgress();
  }

  function animateProgress() {
    if (sv.paused || !sv.open) return;
    var now = performance.now();
    var delta = now - sv.startTs + sv.elapsed;
    var pct = Math.min((delta / sv.duration) * 100, 100);

    // Update current segment fill
    var segs = svProgressBars.children;
    if (segs[sv.prodIdx]) {
      var fill = segs[sv.prodIdx].querySelector('.story-progress-fill');
      fill.style.transition = 'none';
      fill.style.width = pct + '%';
    }

    if (pct >= 100) {
      advanceProduct();
    } else {
      sv.progTimer = requestAnimationFrame(animateProgress);
    }
  }

  function pauseTimer() {
    if (sv.paused) return;
    sv.paused = true;
    sv.elapsed += (performance.now() - sv.startTs);
    cancelAnimationFrame(sv.progTimer);
    pauseDot.classList.add('visible');
  }

  function resumeTimer() {
    if (!sv.paused) return;
    sv.paused = false;
    sv.startTs = performance.now();
    pauseDot.classList.remove('visible');
    animateProgress();
  }

  /* ─── Navigation: product level ─── */
  function advanceProduct() {
    var cat = STORY_DATA[sv.catIdx];
    // Mark current seg done
    var segs = svProgressBars.children;
    if (segs[sv.prodIdx]) {
      var fill = segs[sv.prodIdx].querySelector('.story-progress-fill');
      fill.style.width = '100%';
      segs[sv.prodIdx].classList.add('done');
    }
    if (sv.prodIdx < cat.products.length - 1) {
      sv.prodIdx++;
      renderProduct();
      startTimer();
    } else {
      // End of category → go next category or close
      if (sv.catIdx < STORY_DATA.length - 1) {
        goCategory(sv.catIdx + 1, 'left');
      } else {
        closeStory();
      }
    }
  }

  function goBack() {
    if (sv.prodIdx > 0) {
      sv.prodIdx--;
      renderProduct();
      startTimer();
    } else {
      // Start of category → go prev category or restart
      if (sv.catIdx > 0) {
        goCategory(sv.catIdx - 1, 'right');
      } else {
        // Restart first product
        renderProduct();
        startTimer();
      }
    }
  }

  /* ─── Navigation: category level (with slide animation) ─── */
  function goCategory(newIdx, direction) {
    if (newIdx < 0 || newIdx >= STORY_DATA.length) return;
    sv.catIdx = newIdx;
    sv.prodIdx = 0;
    renderCat();
    renderProduct();
    startTimer();
  }

  /* ─── Tap zone events ─── */
  svTapLeft.addEventListener('click', goBack);
  svTapRight.addEventListener('click', advanceProduct);

  /* ─── Hold to pause (touch) ─── */
  var holdTimer;
  svOverlay.addEventListener('pointerdown', function (e) {
    // Only pause on tap/hold on main image area (not panel, not close, not bubbles)
    if (e.target.closest('.story-bottom-panel') ||
      e.target.closest('.story-cat-strip') ||
      e.target.closest('.story-close-btn')) return;
    holdTimer = setTimeout(pauseTimer, 150);
  });
  svOverlay.addEventListener('pointerup', function () {
    clearTimeout(holdTimer);
    if (sv.paused) resumeTimer();
  });
  svOverlay.addEventListener('pointercancel', function () {
    clearTimeout(holdTimer);
    if (sv.paused) resumeTimer();
  });

  /* ─── Swipe left/right → category change ─── */
  svOverlay.addEventListener('touchstart', function (e) {
    sv.touchStartX = e.touches[0].clientX;
    sv.touchStartY = e.touches[0].clientY;
  }, { passive: true });

  svOverlay.addEventListener('touchend', function (e) {
    var dx = e.changedTouches[0].clientX - sv.touchStartX;
    var dy = e.changedTouches[0].clientY - sv.touchStartY;
    // Only treat as horizontal swipe if dx dominates
    if (Math.abs(dx) < 40 || Math.abs(dy) > Math.abs(dx)) return;
    if (dx < -40) {
      // Swipe left → next category
      if (sv.catIdx < STORY_DATA.length - 1) goCategory(sv.catIdx + 1, 'left');
    } else {
      // Swipe right → prev category
      if (sv.catIdx > 0) goCategory(sv.catIdx - 1, 'right');
    }
  }, { passive: true });

  /* ─── Arrow buttons (desktop hint) ─── */
  svCatPrev.addEventListener('click', function () {
    if (sv.catIdx > 0) goCategory(sv.catIdx - 1, 'right');
  });
  svCatNext.addEventListener('click', function () {
    if (sv.catIdx < STORY_DATA.length - 1) goCategory(sv.catIdx + 1, 'left');
  });

  /* ─── Close button ─── */
  svClose.addEventListener('click', closeStory);
  // Tap overlay outside panel closes (press Escape on desktop)
  document.addEventListener('keydown', function (e) {
    if (!sv.open) return;
    if (e.key === 'Escape') closeStory();
    if (e.key === 'ArrowRight') advanceProduct();
    if (e.key === 'ArrowLeft') goBack();
  });

  /* ─── Read more toggle ─── */
  svReadMore.addEventListener('click', function (e) {
    e.stopPropagation();
    var open = svDesc.classList.toggle('expanded');
    svReadMore.classList.toggle('open', open);
    svReadMore.innerHTML = open
      ? 'Read less <i class="bi bi-chevron-up"></i>'
      : 'Read more <i class="bi bi-chevron-down"></i>';
    if (open) pauseTimer();
    else resumeTimer();
  });

  /* ─── Wishlist inside story ─── */
  svWish.addEventListener('click', function (e) {
    e.stopPropagation();
    var icon = this.querySelector('i');
    if (icon.classList.contains('bi-heart')) {
      icon.classList.replace('bi-heart', 'bi-heart-fill');
      this.classList.add('active');
      showToast('Added to Wishlist ♡');
    } else {
      icon.classList.replace('bi-heart-fill', 'bi-heart');
      this.classList.remove('active');
    }
  });

  /* ─── Add to bag inside story ─── */
  svAddBag.addEventListener('click', function (e) {
    e.stopPropagation();
    var btn = this;
    btn.innerHTML = '<i class="bi bi-check-lg"></i> Added!';
    btn.style.background = '#3d8c6f';
    setTimeout(function () {
      btn.innerHTML = '<i class="bi bi-bag-plus"></i> Add to Bag';
      btn.style.background = '';
    }, 1600);
    // Bump cart badge
    var badge = qs('.cart-badge');
    var cBadge = qs('.cart-count-badge');
    if (badge) badge.textContent = (parseInt(badge.textContent, 10) || 0) + 1;
    if (cBadge) cBadge.textContent = (parseInt(cBadge.textContent, 10) || 0) + 1;
    showToast('Item added to bag 🛍️');
  });

  /* ─── Story viewer is now attached in the CATEGORY ACTIVE STATE section above. ─── */


})();
