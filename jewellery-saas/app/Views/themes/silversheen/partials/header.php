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
                    <!-- 925 Sterling Silver text removed -->
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
