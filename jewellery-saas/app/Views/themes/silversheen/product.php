<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="description"
        content="Silversheen caters to all modern women looking for trendy and minimal sterling silver jewellery" />
    <title>Silver Crystal Vine Bracelet - SILVERSHEEN</title>

    <!-- Bootstrap 5.3 CSS -->
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
            <a class="navbar-brand mx-auto" href="<?= base_url('preview/silversheen') ?>">
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
                    <a href="<?= base_url('preview/silversheen') ?>">Home</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- ========================
       CART DRAWER
  ========================= -->
    <div class="cart-drawer-overlay" id="cartOverlay"></div>
    <div class="cart-drawer" id="cartDrawer">
        <div class="cart-header d-flex justify-content-between align-items-center px-4 py-3">
            <h5 class="mb-0">Your Cart <span class="cart-count-badge">2</span></h5>
            <button class="btn btn-icon" id="closeCart"><i class="bi bi-x-lg"></i></button>
        </div>
    </div>

    <!-- ========================
       MAIN PRODUCT CONTENT
  ========================= -->
    <main id="main_content" class="product-page">

        <!-- Breadcrumbs -->
        <div class="container-fluid px-3 py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('preview/silversheen') ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Bracelets</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Silver Crystal Vine Bracelet</li>
                </ol>
            </nav>
        </div>

        <!-- Product Details Section -->
        <section class="container-fluid px-3 pb-4">
            <div class="row gx-4">

                <!-- Images Gallery (Mobile Slider / Desktop Grid) -->
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <div class="product-gallery">
                        <span class="badge-off product-badge">10% Off</span>
                        <!-- Main Image -->
                        <div class="main-image-wrap mb-2">
                            <img id="mainProductImage"
                                src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=800&q=80"
                                alt="Silver Crystal Vine Bracelet" class="img-fluid rounded" />
                        </div>
                        <!-- Thumbnails -->
                        <div class="thumbnail-row d-flex gap-2 pe-1 overflow-auto">
                            <img src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=150&q=80"
                                alt="Thumb 1" class="thumbnail-img rounded active"
                                data-src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=800&q=80" />
                            <img src="https://images.unsplash.com/photo-1599643478514-4a520239600e?w=150&q=80"
                                alt="Thumb 2" class="thumbnail-img rounded"
                                data-src="https://images.unsplash.com/photo-1599643478514-4a520239600e?w=800&q=80" />
                            <img src="https://images.unsplash.com/photo-1599643477877-530eb83abc8e?w=150&q=80"
                                alt="Thumb 3" class="thumbnail-img rounded"
                                data-src="https://images.unsplash.com/photo-1599643477877-530eb83abc8e?w=800&q=80" />
                            <img src="https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=150&q=80"
                                alt="Thumb 4" class="thumbnail-img rounded"
                                data-src="https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=800&q=80" />
                        </div>
                    </div>
                </div>

                <!-- Product Specs & Add to Cart -->
                <div class="col-12 col-md-6">
                    <div class="product-info-block">
                        <span class="purity-label">925 Sterling Silver</span>
                        <h1 class="product-title mt-2 mb-2">Silver Crystal Vine Bracelet</h1>

                        <div class="ratings mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                            <a href="#reviews" class="review-link text-muted ms-2">(24 Reviews)</a>
                        </div>

                        <div class="price-block d-flex align-items-center gap-2 mb-3">
                            <span class="fs-2 fw-bold text-dark">₹1,199</span>
                            <span class="text-muted text-decoration-line-through fs-5">₹1,299</span>
                            <span class="badge bg-success bg-opacity-10 text-success ms-2">Save ₹100</span>
                        </div>

                        <p class="product-short-desc text-muted mb-4">
                            A delicate vine-inspired bracelet crafted from authentic 925 sterling silver, adorned with
                            sparkling cubic zirconia crystals. Perfect for layering or wearing solo for a subtle,
                            elegant touch. Includes a 2-inch extender chain for the perfect fit.
                        </p>

                        <!-- Quantity & Add to Cart -->
                        <div class="add-to-cart-wrap d-flex align-items-center gap-3 mb-4">
                            <div class="qty-control input-group w-auto">
                                <button class="btn btn-outline-secondary qty-btn" type="button">−</button>
                                <input type="text" class="form-control text-center qty-input" value="1"
                                    style="max-width: 50px;">
                                <button class="btn btn-outline-secondary qty-btn" type="button">+</button>
                            </div>
                            <button class="btn btn-primary flex-grow-1 add-to-bag-hero">Add to Bag - ₹1,199</button>
                            <button class="btn btn-outline-secondary wishlist-hero-btn" aria-label="Add to Wishlist"><i
                                    class="bi bi-heart"></i></button>
                        </div>

                        <div class="delivery-perk d-flex align-items-center text-muted mb-4 small">
                            <i class="bi bi-truck fs-5 me-2 text-dark"></i> Free shipping on orders over ₹999. Usually
                            dispatches in 24 hours.
                        </div>

                        <!-- Accordions for detailed info -->
                        <div class="accordion product-accordion" id="productAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Product Details
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#productAccordion">
                                    <div class="accordion-body text-muted small">
                                        <ul class="mb-0">
                                            <li><strong>Metal:</strong> 925 Sterling Silver</li>
                                            <li><strong>Stones:</strong> AAA Grade Cubic Zirconia</li>
                                            <li><strong>Plating:</strong> Rhodium plated to prevent tarnishing</li>
                                            <li><strong>Length:</strong> 6.5 inches + 2 inch extender</li>
                                            <li><strong>Weight:</strong> 3.2 grams</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Shipping & Returns
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#productAccordion">
                                    <div class="accordion-body text-muted small">
                                        Standard shipping takes 3-5 business days. We offer a hassle-free 7-day
                                        return/exchange policy. Items must be in their original condition with all tags
                                        attached.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Care Instructions
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#productAccordion">
                                    <div class="accordion-body text-muted small">
                                        Keep away from moisture, perfumes, and harsh chemicals. Store in the provided
                                        zip-lock pouch when not in use. Gently wipe with a soft cloth to maintain shine.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- ========================
       FOOTER
  ========================= -->
    <footer class="site-footer py-4 px-3 mt-4">
        <div class="footer-logo text-center mb-3">
            <div class="logo-text">
                <span class="logo-main footer-logo-text">SILVERSHEEN</span>
                <span class="logo-sub">925 Sterling Silver</span>
            </div>
        </div>
        <p class="footer-tagline text-center">Trendy & Minimal Silver Jewellery for the Modern Woman</p>
        <p class="footer-copy text-center mt-3">© 2024 Silversheen. All rights reserved.</p>
    </footer>

    <!-- ========================
       BOTTOM MOBILE NAV
  ========================= -->
    <nav class="bottom-nav" id="bottomNav">
        <a href="<?= base_url('preview/silversheen') ?>" class="bottom-nav-item" id="navHome"><i class="bi bi-house"></i><span>Home</span></a>
        <a href="#" class="bottom-nav-item active" id="navShop"><i class="bi bi-grid"></i><span>Shop</span></a>
        <a href="#" class="bottom-nav-item" id="navSearch"><i class="bi bi-search"></i><span>Search</span></a>
        <a href="#" class="bottom-nav-item" id="navWishlist"><i class="bi bi-heart"></i><span>Wishlist</span></a>
        <a href="#" class="bottom-nav-item" id="navCart"><i class="bi bi-bag"></i><span>Cart</span></a>
    </nav>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="<?= base_url('themes/silversheen/js/main.js?v=1.2') ?>"></script>

    <script>
        // Product Gallery swapping functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mainImg = document.getElementById('mainProductImage');
            const thumbnails = document.querySelectorAll('.thumbnail-img');

            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    thumbnails.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    mainImg.src = this.getAttribute('data-src');
                });
            });

            // Wishlist toggle
            const wishBtn = document.querySelector('.wishlist-hero-btn');
            if (wishBtn) {
                wishBtn.addEventListener('click', function() {
                    const icon = this.querySelector('i');
                    if (icon.classList.contains('bi-heart')) {
                        icon.classList.replace('bi-heart', 'bi-heart-fill');
                        this.classList.add('active');
                    } else {
                        icon.classList.replace('bi-heart-fill', 'bi-heart');
                        this.classList.remove('active');
                    }
                });
            }
        });
    </script>
</body>

</html>