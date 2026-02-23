<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>Products - SILVERSHEEN</title>

    <!-- Bootstrap 5.3 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('themes/silversheen/css/style.css') ?>" />

    <style>
        /* Custom styles for Products Page */
        .products-control-bar {
            display: flex;
            justify-content: space-between;
            padding: 15px 20px;
            background-color: #fff;
            border-bottom: 1px solid #f0f0f0;
        }

        .btn-pill {
            border: 1px solid #e0e0e0;
            border-radius: 50px;
            padding: 6px 20px;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 1.5px;
            background: #fff;
            color: #333;
            text-transform: uppercase;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        }

        .products-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            padding: 12px 18px;
        }

        .product-card-simple {
            display: flex;
            flex-direction: column;
            text-align: center;
            margin-bottom: 20px;
        }

        .product-card-simple .img-container {
            position: relative;
            background-color: #f6e6de;
            /* Soft beige/rose bg */
            border-radius: 4px;
            padding-bottom: 110%;
            /* Slightly taller than square */
            overflow: hidden;
            margin-bottom: 14px;
        }

        .product-card-simple .img-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            padding: 10px;
            /* Leave space around the jewelry */
        }

        /* Specific tweaks for visual matching */
        .img-container.bg-white-shade {
            background-color: #f7f7f7;
        }

        .img-container.bg-soft-sand {
            background-color: #e6dfd7;
        }

        .product-card-simple .discount-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #d7f5ef;
            /* mint green */
            color: #2c6e64;
            /* dark green text */
            font-size: 0.65rem;
            font-weight: 500;
            padding: 4px 12px;
            border-radius: 20px;
            z-index: 2;
        }

        .product-card-simple .add-btn {
            position: absolute;
            bottom: 12px;
            right: 12px;
            width: 32px;
            height: 32px;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            color: #333;
            font-size: 1.1rem;
            z-index: 2;
            cursor: pointer;
            border: none;
        }

        .product-card-simple .product-title {
            font-size: 0.85rem;
            font-weight: 400;
            color: #333;
            margin-bottom: 6px;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-family: var(--font-body);
        }

        .product-card-simple .product-price-row {
            font-size: 0.8rem;
            display: flex;
            justify-content: center;
            gap: 6px;
            align-items: center;
        }

        .product-card-simple .price-old {
            color: #999;
            text-decoration: line-through;
        }

        .product-card-simple .price-new {
            color: #333;
            font-weight: 400;
        }

        .product-card-simple .ratings {
            margin-bottom: 6px;
            font-size: 0.70rem;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
        }

        .product-card-simple .ratings i {
            color: #333;
            /* Dark stars */
        }

        .product-card-simple .ratings span {
            color: #666;
            margin-left: 4px;
        }

        /* Browse Collections Drawer */
        .browse-drawer-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.65);
            z-index: 1040;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .browse-drawer-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .browse-drawer-overlay .btn-close-drawer {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #fff;
            background: transparent;
            border: none;
            font-size: 2.2rem;
            cursor: pointer;
            z-index: 1041;
            padding: 5px;
            line-height: 1;
        }

        .browse-drawer {
            position: fixed;
            top: 0;
            right: -100%;
            width: 85%;
            max-width: 380px;
            height: 100vh;
            background: #fff;
            z-index: 1050;
            display: flex;
            flex-direction: column;
            transition: right 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: -5px 0 25px rgba(0, 0, 0, 0.15);
        }

        .browse-drawer.show {
            right: 0;
        }

        .browse-drawer-header {
            padding: 24px 20px 10px;
        }

        .browse-drawer-header h5 {
            font-size: 0.75rem;
            letter-spacing: 1px;
            color: #333;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 6px;
            font-family: var(--font-body);
            font-weight: 500;
        }

        .browse-drawer-body {
            flex: 1;
            overflow-y: auto;
            padding: 10px 20px 20px;
        }

        .browse-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .browse-list li {
            padding: 14px 0;
            font-size: 0.70rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            color: #444;
            text-transform: uppercase;
            cursor: pointer;
            font-family: var(--font-body);
        }

        .browse-drawer-footer {
            padding: 15px 20px;
            border-top: 1px solid #eee;
            display: flex;
            gap: 12px;
            background: #fff;
            padding-bottom: calc(15px + env(safe-area-inset-bottom, 0px));
        }

        .browse-drawer-footer .btn {
            flex: 1;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            padding: 12px 0;
            text-transform: uppercase;
        }

        .btn-apply {
            background: #4a4a4a;
            color: #fff;
            border: 1px solid #4a4a4a;
        }

        .btn-reset {
            background: #fff;
            color: #4a4a4a;
            border: 1px solid #ccc;
        }

        /* Filter Drawer Specifics */
        .filter-drawer-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.65);
            z-index: 1040;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .filter-drawer-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .filter-drawer-overlay .btn-close-drawer {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #fff;
            background: transparent;
            border: none;
            font-size: 2.2rem;
            cursor: pointer;
            z-index: 1041;
            padding: 5px;
            line-height: 1;
        }

        .filter-drawer {
            position: fixed;
            top: 0;
            right: -100%;
            width: 85%;
            max-width: 380px;
            height: 100vh;
            background: #fff;
            z-index: 1050;
            display: flex;
            flex-direction: column;
            transition: right 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: -5px 0 25px rgba(0, 0, 0, 0.15);
        }

        .filter-drawer.show {
            right: 0;
        }

        .filter-drawer-body {
            flex: 1;
            overflow-y: auto;
            padding: 24px 20px 20px;
            scrollbar-width: none;
        }

        .filter-drawer-body::-webkit-scrollbar {
            display: none;
        }

        .filter-section {
            margin-bottom: 24px;
        }

        .filter-section-header {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 0.75rem;
            letter-spacing: 1px;
            color: #333;
            font-family: var(--font-body);
            font-weight: 500;
        }

        .filter-section-header i {
            font-size: 0.7rem;
            transition: transform 0.2s;
        }

        .filter-section-content {
            display: none;
            padding-top: 16px;
        }

        .filter-section.active .filter-section-content {
            display: block;
        }

        .filter-section.active .filter-section-header i {
            transform: rotate(180deg);
        }

        .filter-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .filter-list li {
            padding: 10px 0;
            font-size: 0.70rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            color: #444;
            text-transform: uppercase;
            cursor: pointer;
            font-family: var(--font-body);
        }

        .price-range-inputs {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 25px;
        }

        .price-input {
            border: 1px solid #eee;
            border-radius: 2px;
            padding: 10px 12px;
            width: 100%;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            color: #333;
        }

        .price-input input {
            border: none;
            outline: none;
            width: 100%;
            text-align: right;
            font-family: var(--font-body);
            color: #333;
            font-size: 0.95rem;
        }
    </style>
</head>

<body>

    <!-- ========================
       ANNOUNCEMENT BAR
  ========================= -->
    <div id="announcement-bar" class="announcement-bar">
        <!-- Re-created dynamic banner to match image closely: < 10 to get 10% Off   Use Code: SHEEN10 to get 10 > -->
        <div class="announcement-track" style="background-color: #d7f5ef; color:#333; justify-content:space-between; padding: 0 15px;">
            <i class="bi bi-chevron-left" style="font-size: 0.8rem; cursor:pointer;"></i>
            <span style="font-weight:400; letter-spacing:0.5px; text-transform:none;">Use Code: SHEEN10 to get 10% Off</span>
            <i class="bi bi-chevron-right" style="font-size: 0.8rem; cursor:pointer;"></i>
        </div>
    </div>

    <!-- ========================
       HEADER / NAVBAR
  ========================= -->
    <?= $this->include('themes/silversheen/partials/header') ?>

    <!-- ========================
       MAIN PRODUCT CONTENT
  ========================= -->
    <main id="main_content" style="padding-bottom: 80px; background-color: #fff;">

        <div class="products-control-bar">
            <button class="btn-pill" id="btnBrowse">Browse</button>
            <button class="btn-pill" id="btnFilter">Filter</button>
        </div>

        <!-- Product Grid -->
        <div class="products-grid">

            <!-- Product 1 -->
            <div class="product-card-simple">
                <div class="img-container">
                    <span class="discount-badge">10% OFF</span>
                    <a href="<?= base_url('preview/silversheen/product') ?>">
                        <!-- Approximating Rose Leaf Spark Toe Ring -->
                        <img src="https://images.unsplash.com/photo-1602751584552-8ba73aad10e1?w=400&h=400&fit=crop&q=80" alt="Rose Leaf Spark Toe..." />
                    </a>
                    <button class="add-btn"><i class="bi bi-plus"></i></button>
                </div>
                <a href="<?= base_url('preview/silversheen/product') ?>" class="text-decoration-none">
                    <h3 class="product-title">Rose Leaf Spark Toe...</h3>
                </a>
                <div class="product-price-row">
                    <span class="price-old">₹3,470.00</span>
                    <span class="price-new">₹3,099.00</span>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="product-card-simple">
                <div class="img-container bg-white-shade">
                    <span class="discount-badge">10% OFF</span>
                    <a href="<?= base_url('preview/silversheen/product') ?>">
                        <!-- Approximating Rose Silver Ball Br... -->
                        <img src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=400&h=400&fit=crop&q=80" alt="Rose Silver Ball Br..." />
                    </a>
                    <button class="add-btn"><i class="bi bi-plus"></i></button>
                </div>
                <a href="<?= base_url('preview/silversheen/product') ?>" class="text-decoration-none">
                    <h3 class="product-title">Rose Silver Ball Br...</h3>
                </a>
                <div class="product-price-row">
                    <span class="price-old">₹5,822.00</span>
                    <span class="price-new">₹5,199.00</span>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-card-simple">
                <div class="img-container">
                    <span class="discount-badge">10% OFF</span>
                    <a href="<?= base_url('preview/silversheen/product') ?>">
                        <!-- Approximating Rose Silver box Bal... (earrings) -->
                        <img src="https://images.unsplash.com/photo-1598560917505-59a3ad559071?w=400&h=400&fit=crop&q=80" alt="Rose Silver box Bal..." />
                    </a>
                    <button class="add-btn"><i class="bi bi-plus"></i></button>
                </div>
                <a href="<?= base_url('preview/silversheen/product') ?>" class="text-decoration-none">
                    <h3 class="product-title">Rose Silver box Bal...</h3>
                </a>
                <div class="product-price-row">
                    <span class="price-old">₹4,030.00</span>
                    <span class="price-new">₹3,599.00</span>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="product-card-simple">
                <div class="img-container bg-soft-sand">
                    <span class="discount-badge">10% OFF</span>
                    <a href="<?= base_url('preview/silversheen/product') ?>">
                        <!-- Approximating Rose Silver Pearl B... -->
                        <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&h=400&fit=crop&q=80" alt="Rose Silver Pearl B..." />
                    </a>
                    <button class="add-btn"><i class="bi bi-plus"></i></button>
                </div>
                <a href="<?= base_url('preview/silversheen/product') ?>" class="text-decoration-none">
                    <h3 class="product-title">Rose Silver Pearl B...</h3>
                </a>
                <div class="ratings">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <span>(5)</span>
                </div>
                <div class="product-price-row">
                    <span class="price-old">₹4,254.00</span>
                    <span class="price-new">₹3,799.00</span>
                </div>
            </div>

            <!-- Bottom Items Partial Visibility simulating scroll -->
            <!-- Product 5 -->
            <div class="product-card-simple">
                <div class="img-container">
                    <a href="<?= base_url('preview/silversheen/product') ?>">
                        <!-- Approximating Anklet photo -->
                        <img src="https://images.unsplash.com/photo-1573408301185-9519f94815f5?w=400&h=400&fit=crop&q=80" style="padding:0;" alt="Anklet" />
                    </a>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="product-card-simple">
                <div class="img-container">
                    <span class="discount-badge">10% OFF</span>
                    <a href="<?= base_url('preview/silversheen/product') ?>">
                        <!-- Approximating Silver toe rings stacked -->
                        <img src="https://images.unsplash.com/photo-1664575600850-c4b712e6e2bf?w=400&h=400&fit=crop&q=80" style="padding:0;" alt="Toe Rings" />
                    </a>
                </div>
            </div>

        </div>
    </main>

    <!-- ========================
       BOTTOM MOBILE NAV
  ========================= -->
    <?= view('themes/silversheen/partials/bottom_nav', ['active_nav' => 'products']) ?>

    <!-- ========================
       BROWSE COLLECTIONS DRAWER
  ========================= -->
    <div class="browse-drawer-overlay" id="browseOverlay">
        <button class="btn-close-drawer" id="closeBrowse"><i class="bi bi-x-lg"></i></button>
    </div>
    <div class="browse-drawer" id="browseDrawer">
        <div class="browse-drawer-header">
            <h5>BROWSE COLLECTIONS <i class="bi bi-chevron-up ms-1" style="font-size: 0.7rem;"></i></h5>
        </div>
        <div class="browse-drawer-body">
            <ul class="browse-list">
                <li>ANKLETS</li>
                <li>ANKLETS &amp; TOE RINGS</li>
                <li>BANGLES</li>
                <li>BEST SELLING</li>
                <li>BEST SELLING</li>
                <li>BRACELETS</li>
                <li>CHAINS</li>
                <li>EARRINGS</li>
                <li>ETHNIC</li>
                <li>EVERYDAY</li>
                <li>FRIENDS</li>
                <li>GIFTS</li>
                <li>GIFTS UNDER 10K</li>
                <li>GIFTS UNDER 15K</li>
                <li>GOLD</li>
                <li>KIDS</li>
                <li>KUNDAN</li>
                <li>MINIMAL</li>
                <li>MOM</li>
                <li>MULTI</li>
                <li>NECKLACES</li>
                <li>OCCASION</li>
                <li>OFFICE</li>
            </ul>
        </div>
        <div class="browse-drawer-footer">
            <button class="btn btn-apply">APPLY</button>
            <button class="btn btn-reset">RESET</button>
        </div>
    </div>

    <!-- ========================
       FILTER DRAWER
  ========================= -->
    <div class="filter-drawer-overlay" id="filterOverlay">
        <button class="btn-close-drawer" id="closeFilter"><i class="bi bi-x-lg"></i></button>
    </div>
    <div class="filter-drawer" id="filterDrawer">
        <div class="filter-drawer-body">

            <div class="filter-section">
                <div class="filter-section-header">
                    <span>BROWSE COLLECTIONS</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
                <div class="filter-section-content">
                    <ul class="filter-list">
                        <li>ANKLETS</li>
                        <li>ANKLETS &amp; TOE RINGS</li>
                        <li>BANGLES</li>
                        <li>BEST SELLING</li>
                        <li>BRACELETS</li>
                        <li>CHAINS</li>
                        <li>EARRINGS</li>
                        <li>ETHNIC</li>
                        <li>EVERYDAY</li>
                        <li>FRIENDS</li>
                        <li>GIFTS</li>
                        <li>GIFTS UNDER 10K</li>
                        <li>GIFTS UNDER 15K</li>
                        <li>GOLD</li>
                        <li>KIDS</li>
                        <li>KUNDAN</li>
                        <li>MINIMAL</li>
                        <li>MOM</li>
                        <li>MULTI</li>
                        <li>NECKLACES</li>
                        <li>OCCASION</li>
                        <li>OFFICE</li>
                    </ul>
                </div>
            </div>

            <div class="filter-section">
                <div class="filter-section-header">
                    <span>SORT BY</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
                <div class="filter-section-content">
                    <ul class="filter-list">
                        <li>FEATURED</li>
                        <li>BEST SELLING</li>
                        <li>ALPHABETICALLY, A-Z</li>
                        <li>ALPHABETICALLY, Z-A</li>
                        <li>PRICE, LOW TO HIGH</li>
                        <li>PRICE, HIGH TO LOW</li>
                        <li>DATE, OLD TO NEW</li>
                        <li>DATE, NEW TO OLD</li>
                    </ul>
                </div>
            </div>

            <div class="filter-section active">
                <div class="filter-section-header">
                    <span>PRICE</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
                <div class="filter-section-content">
                    <div class="price-range-inputs" style="margin-top: 5px;">
                        <div class="price-input">
                            <span>₹</span>
                            <input type="number" value="0">
                        </div>
                        <span style="color:#666;">&mdash;</span>
                        <div class="price-input">
                            <span>₹</span>
                            <input type="number" value="24499.00">
                        </div>
                    </div>
                </div>
            </div>

            <div class="filter-section">
                <div class="filter-section-header">
                    <span>AVAILABILITY</span>
                    <i class="bi bi-chevron-down"></i>
                </div>
                <div class="filter-section-content">
                    <ul class="filter-list">
                        <li>IN STOCK</li>
                        <li>OUT OF STOCK</li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="browse-drawer-footer">
            <button class="btn btn-apply">APPLY</button>
            <button class="btn btn-reset">RESET</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnBrowse = document.getElementById('btnBrowse');
            const browseDrawer = document.getElementById('browseDrawer');
            const browseOverlay = document.getElementById('browseOverlay');
            const closeBrowse = document.getElementById('closeBrowse');

            function toggleDrawer() {
                if (!browseDrawer || !browseOverlay) return;
                browseDrawer.classList.toggle('show');
                browseOverlay.classList.toggle('show');
                if (browseDrawer.classList.contains('show')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            }

            if (btnBrowse) {
                btnBrowse.addEventListener('click', toggleDrawer);
            }
            if (closeBrowse) {
                closeBrowse.addEventListener('click', toggleDrawer);
            }
            if (browseOverlay) {
                browseOverlay.addEventListener('click', (e) => {
                    if (e.target === browseOverlay) toggleDrawer();
                });
            }

            // Filter Drawer Logic
            const filterDrawer = document.getElementById('filterDrawer');
            const filterOverlay = document.getElementById('filterOverlay');
            const btnFilter = document.getElementById('btnFilter');
            const closeFilter = document.getElementById('closeFilter');

            function toggleFilterDrawer() {
                if (!filterDrawer || !filterOverlay) return;
                filterDrawer.classList.toggle('show');
                filterOverlay.classList.toggle('show');
                if (filterDrawer.classList.contains('show')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            }

            if (btnFilter) btnFilter.addEventListener('click', toggleFilterDrawer);
            if (closeFilter) closeFilter.addEventListener('click', toggleFilterDrawer);
            if (filterOverlay) {
                filterOverlay.addEventListener('click', (e) => {
                    if (e.target === filterOverlay) toggleFilterDrawer();
                });
            }

            // Accordion logic for filter drawer
            const filterHeaders = document.querySelectorAll('.filter-section-header');
            filterHeaders.forEach(header => {
                header.addEventListener('click', () => {
                    header.parentElement.classList.toggle('active');
                });
            });
        });
    </script>
</body>

</html>