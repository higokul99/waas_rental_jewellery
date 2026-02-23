<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <meta name="description"
    content="Silversheen caters to all modern women looking for trendy and minimal sterling silver jewellery" />
  <title>SILVERSHEEN Jewellery - Buy 925 Sterling Silver Jewellery Online</title>

  <!-- Bootstrap 5.3 CSS (CDN - supported on shared hosting) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&family=Jost:wght@300;400;500;600&display=swap"
    rel="stylesheet" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('themes/silversheen/css/style.css') ?>" />
</head>

<body>

  <!-- ========================
       ANNOUNCEMENT BAR
  ========================= -->
  <div id="announcement-bar" class="announcement-bar">
    <div class="announcement-track">
      <span>✦ FREE SHIPPING ON ORDERS ABOVE ₹999 ✦</span>
      <span>✦ 925 STERLING SILVER CERTIFIED ✦</span>
      <span>✦ EASY 7-DAY RETURNS ✦</span>
      <span>✦ COD AVAILABLE ✦</span>
      <span>✦ FREE SHIPPING ON ORDERS ABOVE ₹999 ✦</span>
      <span>✦ 925 STERLING SILVER CERTIFIED ✦</span>
      <span>✦ EASY 7-DAY RETURNS ✦</span>
      <span>✦ COD AVAILABLE ✦</span>
    </div>
  </div>

  <!-- ========================
       HEADER / NAVBAR
  ========================= -->
  <header class="site-header sticky-top">
    <nav class="navbar navbar-light px-3 py-2">
      <!-- Hamburger -->
      <button class="btn btn-icon hamburger-btn" id="menuToggle" aria-label="Open menu">
        <i class="bi bi-list"></i>
      </button>

      <!-- Logo -->
      <a class="navbar-brand mx-auto" href="#">
        <div class="logo-text">
          <span class="logo-main">SILVERSHEEN</span>
          <span class="logo-sub">925 Sterling Silver</span>
        </div>
      </a>

      <!-- Right Icons -->
      <div class="header-icons d-flex align-items-center gap-2">
        <button class="btn btn-icon" id="searchToggle" aria-label="Search">
          <i class="bi bi-search"></i>
        </button>
        <button class="btn btn-icon" aria-label="Wishlist">
          <i class="bi bi-heart"></i>
        </button>
        <button class="btn btn-icon cart-btn" id="cartToggle" aria-label="Cart">
          <i class="bi bi-bag"></i>
          <span class="cart-badge">2</span>
        </button>
      </div>
    </nav>

    <!-- Search Bar (hidden by default) -->
    <div class="search-bar-wrap" id="searchBar">
      <div class="search-inner px-3 pb-2">
        <div class="input-group">
          <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
          <input type="search" class="form-control border-start-0" placeholder="Search for anklets, earrings..." />
          <button class="btn btn-outline-secondary" id="closeSearch"><i class="bi bi-x"></i></button>
        </div>
      </div>
    </div>
  </header>

  <!-- ========================
       DRAWER MENU (OFF-CANVAS)
  ========================= -->
  <div class="drawer-overlay" id="drawerOverlay"></div>
  <div class="drawer-menu" id="drawerMenu">
    <div class="drawer-header d-flex justify-content-between align-items-center px-4 py-3">
      <div class="logo-text">
        <span class="logo-main small-logo">SILVERSHEEN</span>
      </div>
      <button class="btn btn-icon" id="closeMenu"><i class="bi bi-x-lg"></i></button>
    </div>
    <div class="drawer-body px-0">
      <ul class="drawer-nav list-unstyled mb-0">
        <li class="drawer-item">
          <a href="#">Home</a>
        </li>
        <li class="drawer-item has-sub">
          <div class="drawer-link d-flex justify-content-between align-items-center" data-target="shopSub">
            <span>Shop</span>
            <i class="bi bi-chevron-down"></i>
          </div>
          <ul class="sub-menu list-unstyled" id="shopSub">
            <li><a href="#">Shop By Category</a></li>
            <li><a href="#">Anklets</a></li>
            <li><a href="#">Bangles</a></li>
            <li><a href="#">Bracelets</a></li>
            <li><a href="#">Chains</a></li>
            <li><a href="#">Earrings</a></li>
            <li><a href="#">Kids</a></li>
            <li><a href="#">Kundan</a></li>
            <li><a href="#">Necklaces</a></li>
            <li><a href="#">Pendant Sets</a></li>
            <li><a href="#">Rings</a></li>
            <li><a href="#">Toe Rings</a></li>
          </ul>
        </li>
        <li class="drawer-item has-sub">
          <div class="drawer-link d-flex justify-content-between align-items-center" data-target="colorSub">
            <span>Shop By Color</span>
            <i class="bi bi-chevron-down"></i>
          </div>
          <ul class="sub-menu list-unstyled" id="colorSub">
            <li><a href="#">Rose Gold</a></li>
            <li><a href="#">Silver</a></li>
            <li><a href="#">Gold</a></li>
            <li><a href="#">Multicolor</a></li>
          </ul>
        </li>
        <li class="drawer-item has-sub">
          <div class="drawer-link d-flex justify-content-between align-items-center" data-target="priceSub">
            <span>Shop By Price</span>
            <i class="bi bi-chevron-down"></i>
          </div>
          <ul class="sub-menu list-unstyled" id="priceSub">
            <li><a href="#">Under ₹999</a></li>
            <li><a href="#">Under ₹1999</a></li>
            <li><a href="#">Under ₹2999</a></li>
            <li><a href="#">Under ₹3999</a></li>
          </ul>
        </li>
        <li class="drawer-item has-sub">
          <div class="drawer-link d-flex justify-content-between align-items-center" data-target="collectionSub">
            <span>Collections</span>
            <i class="bi bi-chevron-down"></i>
          </div>
          <ul class="sub-menu list-unstyled" id="collectionSub">
            <li><a href="#">Minimal</a></li>
            <li><a href="#">Occasion</a></li>
            <li><a href="#">Weddings</a></li>
          </ul>
        </li>
        <li class="drawer-item"><a href="#" class="text-danger fw-500">Sale</a></li>
        <li class="drawer-item"><a href="#">About Us</a></li>
      </ul>
      <div class="drawer-footer px-4 py-3 mt-3">
        <p class="small text-muted mb-1">Follow Us</p>
        <div class="d-flex gap-3 social-links">
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-pinterest"></i></a>
          <a href="#"><i class="bi bi-youtube"></i></a>
        </div>
      </div>
    </div>
  </div>

  <!-- ========================
       MAIN CONTENT
  ========================= -->
  <main id="main_content">

    <!-- HERO BANNER SLIDER -->
    <section class="hero-slider">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="hero-slide"
              style="background-image: url('https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=800&q=80');">
              <div class="hero-content">
                <p class="hero-eyebrow">New Arrivals</p>
                <h1 class="hero-title">Timeless Silver<br>Jewellery</h1>
                <p class="hero-sub">925 Sterling Silver • BIS Hallmarked</p>
                <a href="#" class="btn hero-btn">Shop Now</a>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="hero-slide"
              style="background-image: url('https://images.unsplash.com/photo-1602751584552-8ba73aad10e1?w=800&q=80');">
              <div class="hero-content">
                <p class="hero-eyebrow">Trending</p>
                <h1 class="hero-title">Rose Gold<br>Collection</h1>
                <p class="hero-sub">Elegant • Minimal • Affordable</p>
                <a href="#" class="btn hero-btn">Explore</a>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="hero-slide"
              style="background-image: url('https://images.unsplash.com/photo-1617038220319-276d3cfab638?w=800&q=80');">
              <div class="hero-content">
                <p class="hero-eyebrow">Best Sellers</p>
                <h1 class="hero-title">Anklets &<br>Bracelets</h1>
                <p class="hero-sub">Starting from ₹799 onwards</p>
                <a href="#" class="btn hero-btn">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-indicators hero-indicators">
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
      </div>
    </section>

    <!-- SHOP BY CATEGORY -->
    <section class="section-wrap category-section">
      <div class="section-header text-center px-3 pt-4 pb-2">
        <h2 class="section-title">Shop By Category</h2>
      </div>
      <div class="category-scroll-wrap px-2">
        <div class="category-scroll">
          <a href="<?= base_url('preview/silversheen/story') ?>?cat=0" class="category-item">
            <div class="cat-img-wrap">
              <img src="https://images.unsplash.com/photo-1573408301185-9519f94815f5?w=150&h=150&fit=crop&q=80"
                alt="Anklets" />
            </div>
            <span>Anklets</span>
          </a>
          <a href="<?= base_url('preview/silversheen/story') ?>?cat=1" class="category-item">
            <div class="cat-img-wrap">
              <img src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=150&h=150&fit=crop&q=80"
                alt="Earrings" />
            </div>
            <span>Earrings</span>
          </a>
          <a href="<?= base_url('preview/silversheen/story') ?>?cat=2" class="category-item">
            <div class="cat-img-wrap">
              <img src="https://images.unsplash.com/photo-1602751584552-8ba73aad10e1?w=150&h=150&fit=crop&q=80"
                alt="Bracelets" />
            </div>
            <span>Bracelets</span>
          </a>
          <a href="<?= base_url('preview/silversheen/story') ?>?cat=3" class="category-item">
            <div class="cat-img-wrap">
              <img src="https://images.unsplash.com/photo-1617038220319-276d3cfab638?w=150&h=150&fit=crop&q=80"
                alt="Necklaces" />
            </div>
            <span>Necklaces</span>
          </a>
          <a href="<?= base_url('preview/silversheen/story') ?>?cat=4" class="category-item">
            <div class="cat-img-wrap">
              <img src="https://images.unsplash.com/photo-1598560917505-59a3ad559071?w=150&h=150&fit=crop&q=80"
                alt="Rings" />
            </div>
            <span>Rings</span>
          </a>
          <a href="<?= base_url('preview/silversheen/story') ?>?cat=5" class="category-item">
            <div class="cat-img-wrap">
              <img src="https://images.unsplash.com/photo-1630019852942-f89202989a59?w=150&h=150&fit=crop&q=80"
                alt="Bangles" />
            </div>
            <span>Bangles</span>
          </a>
          <a href="<?= base_url('preview/silversheen/story') ?>?cat=6" class="category-item">
            <div class="cat-img-wrap">
              <img src="https://images.unsplash.com/photo-1584302179602-e4c3d3fd629d?w=150&h=150&fit=crop&q=80"
                alt="Chains" />
            </div>
            <span>Chains</span>
          </a>
          <a href="<?= base_url('preview/silversheen/story') ?>?cat=7" class="category-item">
            <div class="cat-img-wrap">
              <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=150&h=150&fit=crop&q=80"
                alt="Pendant Sets" />
            </div>
            <span>Pendant Sets</span>
          </a>
          <a href="<?= base_url('preview/silversheen/story') ?>?cat=8" class="category-item">
            <div class="cat-img-wrap">
              <img src="https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=150&h=150&fit=crop&q=80"
                alt="Kundan" />
            </div>
            <span>Kundan</span>
          </a>
          <a href="<?= base_url('preview/silversheen/story') ?>?cat=9" class="category-item">
            <div class="cat-img-wrap">
              <img src="https://images.unsplash.com/photo-1664575600850-c4b712e6e2bf?w=150&h=150&fit=crop&q=80"
                alt="Toe Rings" />
            </div>
            <span>Toe Rings</span>
          </a>
        </div>
      </div>
    </section>

    <!-- TRENDING PRODUCTS -->
    <section class="section-wrap product-section">
      <div class="section-header d-flex justify-content-between align-items-center px-3 pt-4 pb-2">
        <h2 class="section-title mb-0">Trending Products</h2>
        <a href="#" class="view-all-link">View All</a>
      </div>
      <div class="product-scroll-wrap px-2">
        <div class="product-scroll" id="trendingScroll">

          <!-- Product Card 1 -->
          <div class="product-card">
            <div class="product-img-wrap">
              <span class="badge-off">10% Off</span>
              <a href="<?= base_url('preview/silversheen/product') ?>">
                <img src="https://images.unsplash.com/photo-1573408301185-9519f94815f5?w=400&h=450&fit=crop&q=80"
                  alt="Silver Black Rhodium Anklet" loading="lazy" />
              </a>
              <div class="product-hover-actions">
                <button class="btn btn-wish" aria-label="Add to wishlist"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <a href="<?= base_url('preview/silversheen/product') ?>" class="text-decoration-none text-dark">
                <h3 class="product-name">Silver Black Rhodium Anklet</h3>
              </a>
              <div class="product-price">
                <span class="price-current">₹899</span>
                <span class="price-original">₹999</span>
              </div>
              <button class="btn btn-choose-options">Choose Options</button>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="product-card">
            <div class="product-img-wrap">
              <span class="badge-off">10% Off</span>
              <a href="<?= base_url('preview/silversheen/product') ?>">
                <img src="https://images.unsplash.com/photo-1602751584552-8ba73aad10e1?w=400&h=450&fit=crop&q=80"
                  alt="Silver Rose Twilight Beads Anklet" loading="lazy" />
              </a>
              <div class="product-hover-actions">
                <button class="btn btn-wish" aria-label="Add to wishlist"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <a href="<?= base_url('preview/silversheen/product') ?>" class="text-decoration-none text-dark">
                <h3 class="product-name">Silver Rose Twilight Beads Anklet</h3>
              </a>
              <div class="product-price">
                <span class="price-current">₹999</span>
                <span class="price-original">₹1,099</span>
              </div>
              <button class="btn btn-choose-options">Choose Options</button>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="product-card">
            <div class="product-img-wrap">
              <span class="badge-off">8% Off</span>
              <a href="<?= base_url('preview/silversheen/product') ?>">
                <img src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=400&h=450&fit=crop&q=80"
                  alt="Silver Beads Kids Nazariya" loading="lazy" />
              </a>
              <div class="product-hover-actions">
                <button class="btn btn-wish" aria-label="Add to wishlist"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <a href="<?= base_url('preview/silversheen/product') ?>" class="text-decoration-none text-dark">
                <h3 class="product-name">Silver Beads Kids Nazariya</h3>
              </a>
              <div class="product-price">
                <span class="price-current">₹749</span>
                <span class="price-original">₹799</span>
              </div>
              <button class="btn btn-quick-add">Quick Add</button>
            </div>
          </div>

          <!-- Product Card 4 -->
          <div class="product-card">
            <div class="product-img-wrap">
              <span class="badge-off">10% Off</span>
              <a href="<?= base_url('preview/silversheen/product') ?>">
                <img src="https://images.unsplash.com/photo-1617038220319-276d3cfab638?w=400&h=450&fit=crop&q=80"
                  alt="Silver Crystal Vine Bracelet" loading="lazy" />
              </a>
              <div class="product-hover-actions">
                <button class="btn btn-wish" aria-label="Add to wishlist"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <a href="<?= base_url('preview/silversheen/product') ?>" class="text-decoration-none text-dark">
                <h3 class="product-name">Silver Crystal Vine Bracelet</h3>
              </a>
              <div class="product-price">
                <span class="price-current">₹1,199</span>
                <span class="price-original">₹1,299</span>
              </div>
              <button class="btn btn-quick-add">Quick Add</button>
            </div>
          </div>

          <!-- Product Card 5 -->
          <div class="product-card">
            <div class="product-img-wrap">
              <span class="badge-off">10% Off</span>
              <a href="<?= base_url('preview/silversheen/product') ?>">
                <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&h=450&fit=crop&q=80"
                  alt="Silver Evil Eye Chain" loading="lazy" />
              </a>
              <div class="product-hover-actions">
                <button class="btn btn-wish" aria-label="Add to wishlist"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <a href="<?= base_url('preview/silversheen/product') ?>" class="text-decoration-none text-dark">
                <h3 class="product-name">Silver Evil Eye Chain</h3>
              </a>
              <div class="product-price">
                <span class="price-current">₹1,079</span>
                <span class="price-original">₹1,199</span>
              </div>
              <button class="btn btn-quick-add">Quick Add</button>
            </div>
          </div>

          <!-- Product Card 6 -->
          <div class="product-card">
            <div class="product-img-wrap">
              <span class="badge-off">10% Off</span>
              <a href="<?= base_url('preview/silversheen/product') ?>">
                <img src="https://images.unsplash.com/photo-1598560917505-59a3ad559071?w=400&h=450&fit=crop&q=80"
                  alt="Silver Flower Earrings" loading="lazy" />
              </a>
              <div class="product-hover-actions">
                <button class="btn btn-wish" aria-label="Add to wishlist"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <a href="<?= base_url('preview/silversheen/product') ?>" class="text-decoration-none text-dark">
                <h3 class="product-name">Silver Flower Earrings</h3>
              </a>
              <div class="product-price">
                <span class="price-current">₹849</span>
                <span class="price-original">₹949</span>
              </div>
              <button class="btn btn-quick-add">Quick Add</button>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- GIFTING GUIDE BANNER -->
    <section class="section-wrap gifting-section px-3 py-4">
      <div class="section-header text-center pb-3">
        <p class="section-eyebrow">Thoughtful Picks</p>
        <h2 class="section-title">Gifting Guide</h2>
      </div>
      <div class="row g-3">
        <div class="col-6">
          <a href="#" class="gift-card">
            <div class="gift-img-wrap">
              <img src="https://images.unsplash.com/photo-1508380702597-707c1b00695c?w=400&h=500&fit=crop&q=80"
                alt="Gift for Mom" loading="lazy" />
              <div class="gift-label">
                <span>For Mom</span>
                <i class="bi bi-arrow-right-short"></i>
              </div>
            </div>
          </a>
        </div>
        <div class="col-6">
          <a href="#" class="gift-card">
            <div class="gift-img-wrap">
              <img src="https://images.unsplash.com/photo-1526835746352-0b9da4054862?w=400&h=500&fit=crop&q=80"
                alt="Gift for Sister" loading="lazy" />
              <div class="gift-label">
                <span>For Sister</span>
                <i class="bi bi-arrow-right-short"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section>

    <!-- ESSENTIALS FOR YOU -->
    <section class="section-wrap essentials-section py-4">
      <div class="section-header text-center px-3 pb-2">
        <p class="section-eyebrow">Curated For You</p>
        <h2 class="section-title">Essentials For You</h2>
      </div>
      <!-- Tabs -->
      <div class="essentials-tabs px-3 mb-3">
        <button class="essentials-tab active" data-tab="everyday">Everyday</button>
        <button class="essentials-tab" data-tab="office">Office</button>
        <button class="essentials-tab" data-tab="party">Party</button>
      </div>
      <!-- Tab Content -->
      <div class="product-scroll-wrap px-2">
        <div class="product-scroll" id="essentialsScroll">

          <div class="product-card" data-tab-content="everyday office party">
            <div class="product-img-wrap">
              <img src="https://images.unsplash.com/photo-1573408301185-9519f94815f5?w=400&h=450&fit=crop&q=80"
                alt="Silver Chain Oval Anklet" loading="lazy" />
              <div class="product-hover-actions">
                <button class="btn btn-wish"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <h3 class="product-name">Silver Chain Oval Anklet</h3>
              <div class="product-price">
                <span class="price-current">₹899</span>
                <span class="price-original">₹999</span>
              </div>
              <button class="btn btn-choose-options">Choose Options</button>
            </div>
          </div>

          <div class="product-card">
            <div class="product-img-wrap">
              <img src="https://images.unsplash.com/photo-1630019852942-f89202989a59?w=400&h=450&fit=crop&q=80"
                alt="Silver Minimal Bangle" loading="lazy" />
              <div class="product-hover-actions">
                <button class="btn btn-wish"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <h3 class="product-name">Silver Minimal Bangle</h3>
              <div class="product-price">
                <span class="price-current">₹1,099</span>
                <span class="price-original">₹1,299</span>
              </div>
              <button class="btn btn-quick-add">Quick Add</button>
            </div>
          </div>

          <div class="product-card">
            <div class="product-img-wrap">
              <span class="badge-off">10% Off</span>
              <img src="https://images.unsplash.com/photo-1584302179602-e4c3d3fd629d?w=400&h=450&fit=crop&q=80"
                alt="Silver Swan Crystal Chain" loading="lazy" />
              <div class="product-hover-actions">
                <button class="btn btn-wish"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <h3 class="product-name">Silver Swan Crystal Chain</h3>
              <div class="product-price">
                <span class="price-current">₹1,249</span>
                <span class="price-original">₹1,399</span>
              </div>
              <button class="btn btn-quick-add">Quick Add</button>
            </div>
          </div>

          <div class="product-card">
            <div class="product-img-wrap">
              <img src="https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=400&h=450&fit=crop&q=80"
                alt="Kundan Statement Earrings" loading="lazy" />
              <div class="product-hover-actions">
                <button class="btn btn-wish"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <h3 class="product-name">Kundan Statement Earrings</h3>
              <div class="product-price">
                <span class="price-current">₹1,499</span>
                <span class="price-original">₹1,799</span>
              </div>
              <button class="btn btn-choose-options">Choose Options</button>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- BEST SELLERS -->
    <section class="section-wrap product-section bg-cream py-4">
      <div class="section-header d-flex justify-content-between align-items-center px-3 pb-2">
        <h2 class="section-title mb-0">Best Sellers</h2>
        <a href="#" class="view-all-link">View All</a>
      </div>
      <div class="product-scroll-wrap px-2">
        <div class="product-scroll">

          <div class="product-card">
            <div class="product-img-wrap">
              <span class="badge-off">10% Off</span>
              <span class="badge-bestseller">Best Seller</span>
              <img src="https://images.unsplash.com/photo-1573408301185-9519f94815f5?w=400&h=450&fit=crop&q=80"
                alt="Silver Black Beads Rhodium Anklet" loading="lazy" />
              <div class="product-hover-actions">
                <button class="btn btn-wish"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <h3 class="product-name">Silver Black Beads Rhodium Anklet</h3>
              <div class="product-price">
                <span class="price-current">₹899</span>
                <span class="price-original">₹999</span>
              </div>
              <button class="btn btn-choose-options">Choose Options</button>
            </div>
          </div>

          <div class="product-card">
            <div class="product-img-wrap">
              <span class="badge-bestseller">Best Seller</span>
              <img src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=400&h=450&fit=crop&q=80"
                alt="Silver Evil Eye Black Anklet" loading="lazy" />
              <div class="product-hover-actions">
                <button class="btn btn-wish"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <h3 class="product-name">Silver Evil Eye Black Anklet</h3>
              <div class="product-price">
                <span class="price-current">₹949</span>
              </div>
              <button class="btn btn-choose-options">Choose Options</button>
            </div>
          </div>

          <div class="product-card">
            <div class="product-img-wrap">
              <span class="badge-off">10% Off</span>
              <img src="https://images.unsplash.com/photo-1602751584552-8ba73aad10e1?w=400&h=450&fit=crop&q=80"
                alt="Silver Rose Luna Shine Toe Ring" loading="lazy" />
              <div class="product-hover-actions">
                <button class="btn btn-wish"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <h3 class="product-name">Silver Rose Luna Shine Toe Ring</h3>
              <div class="product-price">
                <span class="price-current">₹649</span>
                <span class="price-original">₹719</span>
              </div>
              <button class="btn btn-quick-add">Quick Add</button>
            </div>
          </div>

          <div class="product-card">
            <div class="product-img-wrap">
              <span class="badge-off">10% Off</span>
              <img src="https://images.unsplash.com/photo-1617038220319-276d3cfab638?w=400&h=450&fit=crop&q=80"
                alt="Silver Rose Green Pendant Set" loading="lazy" />
              <div class="product-hover-actions">
                <button class="btn btn-wish"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <h3 class="product-name">Silver Rose Green Triangle Pendant Set</h3>
              <div class="product-price">
                <span class="price-current">₹1,349</span>
                <span class="price-original">₹1,499</span>
              </div>
              <button class="btn btn-quick-add">Quick Add</button>
            </div>
          </div>

          <div class="product-card">
            <div class="product-img-wrap">
              <span class="badge-off">10% Off</span>
              <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&h=450&fit=crop&q=80"
                alt="Silver Rose Cut Design Anklet" loading="lazy" />
              <div class="product-hover-actions">
                <button class="btn btn-wish"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="product-info">
              <h3 class="product-name">Silver Rose Cut Design Anklet</h3>
              <div class="product-price">
                <span class="price-current">₹1,079</span>
                <span class="price-original">₹1,199</span>
              </div>
              <button class="btn btn-choose-options">Choose Options</button>
            </div>
          </div>

        </div>
      </div>
      <div class="text-center pt-3 pb-1">
        <a href="#" class="btn btn-view-collection">View Collection</a>
      </div>
    </section>

    <!-- SHOP BY COLOR -->
    <section class="section-wrap shop-color-section py-4 px-3">
      <div class="section-header text-center pb-3">
        <p class="section-eyebrow">Filter By Finish</p>
        <h2 class="section-title">Shop By Color</h2>
      </div>
      <div class="color-grid">
        <a href="#" class="color-card">
          <div class="color-img-wrap">
            <img src="https://images.unsplash.com/photo-1602751584552-8ba73aad10e1?w=400&h=500&fit=crop&q=80"
              alt="Rose Gold Jewellery" loading="lazy" />
            <div class="color-overlay">
              <span class="color-dot rose-dot"></span>
              <span class="color-label">Rose Gold</span>
            </div>
          </div>
        </a>
        <a href="#" class="color-card">
          <div class="color-img-wrap">
            <img src="https://images.unsplash.com/photo-1573408301185-9519f94815f5?w=400&h=500&fit=crop&q=80"
              alt="Silver Jewellery" loading="lazy" />
            <div class="color-overlay">
              <span class="color-dot silver-dot"></span>
              <span class="color-label">Silver</span>
            </div>
          </div>
        </a>
        <a href="#" class="color-card">
          <div class="color-img-wrap">
            <img src="https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=400&h=500&fit=crop&q=80"
              alt="Gold Jewellery" loading="lazy" />
            <div class="color-overlay">
              <span class="color-dot gold-dot"></span>
              <span class="color-label">Gold</span>
            </div>
          </div>
        </a>
        <a href="#" class="color-card">
          <div class="color-img-wrap">
            <img src="https://images.unsplash.com/photo-1630019852942-f89202989a59?w=400&h=500&fit=crop&q=80"
              alt="Multicolor Jewellery" loading="lazy" />
            <div class="color-overlay">
              <span class="color-dot multi-dot"></span>
              <span class="color-label">Multicolor</span>
            </div>
          </div>
        </a>
      </div>
    </section>

    <!-- TOE RINGS PROMO BANNER -->
    <section class="promo-banner-section px-3 py-4">
      <a href="#" class="promo-banner-link">
        <div class="promo-banner"
          style="background-image: url('https://images.unsplash.com/photo-1664575600850-c4b712e6e2bf?w=800&q=80');">
          <div class="promo-banner-content">
            <p class="promo-eyebrow">New Collection</p>
            <h2 class="promo-title">Trending<br>Toe Rings</h2>
            <span class="promo-cta">Shop Now <i class="bi bi-arrow-right"></i></span>
          </div>
        </div>
      </a>
    </section>

    <!-- TRUST BADGES -->
    <section class="trust-section py-4 px-3">
      <div class="row g-3 text-center">
        <div class="col-6">
          <div class="trust-item">
            <i class="bi bi-award trust-icon"></i>
            <p class="trust-title">925 Sterling Silver</p>
            <p class="trust-sub">BIS Hallmarked</p>
          </div>
        </div>
        <div class="col-6">
          <div class="trust-item">
            <i class="bi bi-truck trust-icon"></i>
            <p class="trust-title">Free Shipping</p>
            <p class="trust-sub">Above ₹999</p>
          </div>
        </div>
        <div class="col-6">
          <div class="trust-item">
            <i class="bi bi-arrow-repeat trust-icon"></i>
            <p class="trust-title">Easy Returns</p>
            <p class="trust-sub">7-Day Return Policy</p>
          </div>
        </div>
        <div class="col-6">
          <div class="trust-item">
            <i class="bi bi-shield-check trust-icon"></i>
            <p class="trust-title">Secure Payments</p>
            <p class="trust-sub">100% Safe & Secure</p>
          </div>
        </div>
      </div>
    </section>

    <!-- INSTAGRAM STRIP -->
    <section class="insta-section py-3">
      <div class="text-center px-3 pb-2">
        <p class="section-eyebrow mb-0">Follow Us</p>
        <a href="#" class="insta-handle">@silversheenindia</a>
      </div>
      <div class="insta-scroll">
        <a href="#" class="insta-thumb"><img
            src="https://images.unsplash.com/photo-1573408301185-9519f94815f5?w=200&h=200&fit=crop&q=80"
            alt="Instagram 1" loading="lazy" /></a>
        <a href="#" class="insta-thumb"><img
            src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=200&h=200&fit=crop&q=80"
            alt="Instagram 2" loading="lazy" /></a>
        <a href="#" class="insta-thumb"><img
            src="https://images.unsplash.com/photo-1602751584552-8ba73aad10e1?w=200&h=200&fit=crop&q=80"
            alt="Instagram 3" loading="lazy" /></a>
        <a href="#" class="insta-thumb"><img
            src="https://images.unsplash.com/photo-1584302179602-e4c3d3fd629d?w=200&h=200&fit=crop&q=80"
            alt="Instagram 4" loading="lazy" /></a>
        <a href="#" class="insta-thumb"><img
            src="https://images.unsplash.com/photo-1617038220319-276d3cfab638?w=200&h=200&fit=crop&q=80"
            alt="Instagram 5" loading="lazy" /></a>
        <a href="#" class="insta-thumb"><img
            src="https://images.unsplash.com/photo-1598560917505-59a3ad559071?w=200&h=200&fit=crop&q=80"
            alt="Instagram 6" loading="lazy" /></a>
      </div>
    </section>

  </main>

  <!-- ========================
       FOOTER
  ========================= -->
  <footer class="site-footer py-4 px-3">
    <div class="footer-logo text-center mb-3">
      <div class="logo-text">
        <span class="logo-main footer-logo-text">SILVERSHEEN</span>
        <span class="logo-sub">925 Sterling Silver</span>
      </div>
    </div>
    <p class="footer-tagline text-center">Trendy & Minimal Silver Jewellery for the Modern Woman</p>

    <div class="footer-links-grid row g-0 mt-3">
      <div class="col-6">
        <h4 class="footer-heading">Quick Links</h4>
        <ul class="footer-links list-unstyled">
          <li><a href="#">Home</a></li>
          <li><a href="#">Shop All</a></li>
          <li><a href="#">Collections</a></li>
          <li><a href="#">Sale</a></li>
          <li><a href="#">About Us</a></li>
        </ul>
      </div>
      <div class="col-6">
        <h4 class="footer-heading">Help</h4>
        <ul class="footer-links list-unstyled">
          <li><a href="#">Shipping Policy</a></li>
          <li><a href="#">Return Policy</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms of Service</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-social text-center mt-4">
      <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
      <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
      <a href="#" class="social-icon"><i class="bi bi-pinterest"></i></a>
      <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
    </div>

    <p class="footer-copy text-center mt-3">© 2024 Silversheen. All rights reserved.</p>
    <div class="footer-payment text-center mt-2">
      <span class="payment-icon"><i class="bi bi-credit-card"></i> Visa</span>
      <span class="payment-icon">Mastercard</span>
      <span class="payment-icon">UPI</span>
      <span class="payment-icon">COD</span>
    </div>
  </footer>

  <!-- ========================
       BOTTOM MOBILE NAV
  ========================= -->
  <nav class="bottom-nav" id="bottomNav">
    <a href="#" class="bottom-nav-item active" id="navHome">
      <i class="bi bi-house"></i>
      <span>Home</span>
    </a>
    <a href="#" class="bottom-nav-item" id="navShop">
      <i class="bi bi-grid"></i>
      <span>Shop</span>
    </a>
    <a href="#" class="bottom-nav-item" id="navSearch">
      <i class="bi bi-search"></i>
      <span>Search</span>
    </a>
    <a href="#" class="bottom-nav-item" id="navWishlist">
      <i class="bi bi-heart"></i>
      <span>Wishlist</span>
    </a>
    <a href="#" class="bottom-nav-item" id="navCart">
      <i class="bi bi-bag"></i>
      <span>Cart</span>
    </a>
  </nav>

  <!-- CART DRAWER -->
  <div class="cart-drawer-overlay" id="cartOverlay"></div>
  <div class="cart-drawer" id="cartDrawer">
    <div class="cart-header d-flex justify-content-between align-items-center px-4 py-3">
      <h5 class="mb-0">Your Cart <span class="cart-count-badge">2</span></h5>
      <button class="btn btn-icon" id="closeCart"><i class="bi bi-x-lg"></i></button>
    </div>
    <div class="cart-body px-4 py-3">
      <div class="cart-item d-flex gap-3 mb-3">
        <img src="https://images.unsplash.com/photo-1573408301185-9519f94815f5?w=100&h=100&fit=crop&q=80"
          alt="Cart Item" class="cart-item-img" />
        <div class="cart-item-info flex-grow-1">
          <p class="cart-item-name">Silver Black Rhodium Anklet</p>
          <p class="cart-item-variant">Size: Free</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="qty-control d-flex align-items-center">
              <button class="qty-btn">−</button>
              <span class="qty-val">1</span>
              <button class="qty-btn">+</button>
            </div>
            <span class="cart-item-price">₹899</span>
          </div>
        </div>
      </div>
      <div class="cart-item d-flex gap-3 mb-3">
        <img src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=100&h=100&fit=crop&q=80"
          alt="Cart Item" class="cart-item-img" />
        <div class="cart-item-info flex-grow-1">
          <p class="cart-item-name">Silver Flower Earrings</p>
          <p class="cart-item-variant">Size: Free</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="qty-control d-flex align-items-center">
              <button class="qty-btn">−</button>
              <span class="qty-val">1</span>
              <button class="qty-btn">+</button>
            </div>
            <span class="cart-item-price">₹849</span>
          </div>
        </div>
      </div>
    </div>
    <div class="cart-footer px-4 py-3">
      <div class="d-flex justify-content-between mb-2">
        <span class="fw-500">Subtotal</span>
        <span class="fw-600">₹1,748</span>
      </div>
      <p class="small text-muted mb-3">Shipping calculated at checkout</p>
      <a href="#" class="btn btn-checkout w-100">Proceed to Checkout</a>
      <a href="#" class="btn btn-continue-shopping w-100 mt-2">Continue Shopping</a>
    </div>
  </div>

  <!-- ========================
       STORY VIEWER OVERLAY
  ========================= -->
  <div class="story-overlay" id="storyOverlay" role="dialog" aria-modal="true" aria-label="Category Story Viewer">

    <!-- Category bubbles strip (top) -->
    <div class="story-cat-strip" id="storyCatStrip">
      <!-- Filled by JS -->
    </div>

    <!-- Top bar: progress bars + close -->
    <div class="story-topbar">
      <div class="story-progress-bars" id="storyProgressBars">
        <!-- Filled by JS per product -->
      </div>
      <div class="story-header-info" id="storyHeaderInfo">
        <div class="story-avatar-sm">
          <img id="storyAvatarImg" src="" alt="" />
        </div>
        <div>
          <p class="story-cat-name" id="storyCatNameTop"></p>
          <p class="story-time-ago">Silversheen • Now</p>
        </div>
        <button class="story-close-btn" id="storyClose" aria-label="Close story">
          <i class="bi bi-x-lg"></i>
        </button>
      </div>
    </div>

    <!-- Main image area (fills screen) -->
    <div class="story-img-area" id="storyImgArea">
      <img id="storyMainImg" src="" alt="" />
      <!-- Tap zones -->
      <div class="story-tap-left" id="storyTapLeft"></div>
      <div class="story-tap-right" id="storyTapRight"></div>
    </div>

    <!-- Swipe hint arrows (for category switch) -->
    <div class="story-swipe-hint story-swipe-left" id="storyCatPrev"><i class="bi bi-chevron-left"></i></div>
    <div class="story-swipe-hint story-swipe-right" id="storyCatNext"><i class="bi bi-chevron-right"></i></div>

    <!-- Bottom product info panel -->
    <div class="story-bottom-panel" id="storyBottomPanel">
      <!-- Drag handle -->
      <div class="story-drag-handle"></div>

      <!-- Discount badge -->
      <span class="story-badge-off" id="storyBadge"></span>

      <!-- Product name -->
      <h2 class="story-product-name" id="storyProductName"></h2>

      <!-- Price row -->
      <div class="story-price-row">
        <span class="story-price-current" id="storyPriceCurrent"></span>
        <span class="story-price-original" id="storyPriceOriginal"></span>
        <span class="story-price-save" id="storyPriceSave"></span>
      </div>

      <!-- Description -->
      <div class="story-desc-wrap" id="storyDescWrap">
        <p class="story-desc" id="storyDesc"></p>
        <button class="story-read-more" id="storyReadMore">Read more <i class="bi bi-chevron-down"></i></button>
      </div>

      <!-- Actions -->
      <div class="story-actions">
        <button class="story-btn-wish" id="storyWish" aria-label="Wishlist">
          <i class="bi bi-heart"></i>
        </button>
        <button class="story-btn-add" id="storyAddBag">
          <i class="bi bi-bag-plus"></i> Add to Bag
        </button>
        <a href="#" class="story-btn-view" id="storyViewFull">
          View <i class="bi bi-arrow-up-right"></i>
        </a>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5.3 JS Bundle (CDN) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JS -->
  <script src="<?= base_url('themes/silversheen/js/main.js?v=1.1') ?>"></script>
</body>

</html>