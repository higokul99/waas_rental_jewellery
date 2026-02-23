    <!-- ========================
       BOTTOM MOBILE NAV
  ========================= -->
    <nav class="bottom-nav border-top" id="bottomNav">
        <a href="<?= base_url('preview/silversheen') ?>" class="bottom-nav-item <?= isset($active_nav) && $active_nav === 'home' ? 'active' : '' ?>" id="navHome">
            <i class="bi bi-house"></i>
            <span>Home</span>
        </a>
        <a href="<?= base_url('preview/silversheen/products') ?>" class="bottom-nav-item <?= isset($active_nav) && $active_nav === 'products' ? 'active' : '' ?>" id="navShop">
            <i class="bi bi-grid"></i>
            <span>Products</span>
        </a>
        <a href="#" class="bottom-nav-item <?= isset($active_nav) && $active_nav === 'search' ? 'active' : '' ?>" id="navSearch">
            <i class="bi bi-search"></i>
            <span>Search</span>
        </a>
        <a href="#" class="bottom-nav-item <?= isset($active_nav) && $active_nav === 'cart' ? 'active' : '' ?>" id="navCart">
            <i class="bi bi-bag"></i>
            <span>Cart</span>
        </a>
        <a href="<?= base_url('login') ?>" class="bottom-nav-item <?= isset($active_nav) && $active_nav === 'profile' ? 'active' : '' ?>" id="navProfile">
            <i class="bi bi-person"></i>
            <span>Profile</span>
        </a>
    </nav>