/**
 * SILVERSHEEN — Standalone Story Viewer
 * story.html?cat=INDEX
 *
 * Navigation:
 *   tap left  zone  → previous product in category
 *   tap right zone  → next product (or next category)
 *   swipe left/right → jump category
 *   hold              → pause timer
 *   ← browser back / × button → return to index.html
 */

(function () {
    'use strict';

    /* ══════════════════════════════════════
       PRODUCT DATA — one entry per category tile
    ══════════════════════════════════════ */
    var DATA = [
        {
            category: 'Anklets',
            thumb: 'https://images.unsplash.com/photo-1573408301185-9519f94815f5?w=150&h=150&fit=crop&q=80',
            products: [
                {
                    name: 'Silver Black Rhodium Anklet',
                    img: 'https://images.unsplash.com/photo-1573408301185-9519f94815f5?w=700&h=1050&fit=crop&q=85',
                    price: '₹899', original: '₹999', discount: '10% Off',
                    desc: 'Crafted from 925 sterling silver with a sleek black rhodium finish. Lightweight and perfect for everyday wear. Adjustable length, anti-tarnish coated, skin-friendly.'
                },
                {
                    name: 'Silver Rose Twilight Beads Anklet',
                    img: 'https://images.unsplash.com/photo-1602751584552-8ba73aad10e1?w=700&h=1050&fit=crop&q=85',
                    price: '₹999', original: '₹1,099', discount: '10% Off',
                    desc: 'Delicate rose-gold beads on a fine sterling silver chain. Effortlessly chic for beach days or casual outings. BIS 925 hallmarked.'
                },
                {
                    name: 'Silver Chain Oval Anklet',
                    img: 'https://images.unsplash.com/photo-1617038220319-276d3cfab638?w=700&h=1050&fit=crop&q=85',
                    price: '₹849', original: '₹949', discount: '10% Off',
                    desc: 'Oval-link chain anklet in pure 925 sterling silver. Minimalist design with secure lobster clasp. Great as a standalone or layered piece.'
                }
            ]
        },
        {
            category: 'Earrings',
            thumb: 'https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=150&h=150&fit=crop&q=80',
            products: [
                {
                    name: 'Silver Flower Stud Earrings',
                    img: 'https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=700&h=1050&fit=crop&q=85',
                    price: '₹849', original: '₹949', discount: '10% Off',
                    desc: 'Delicate floral stud earrings in polished 925 sterling silver. Ideal for daily wear or gifting. Hypoallergenic posts for sensitive ears.'
                },
                {
                    name: 'Kundan Statement Earrings',
                    img: 'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=700&h=1050&fit=crop&q=85',
                    price: '₹1,499', original: '₹1,799', discount: '17% Off',
                    desc: 'Traditional Kundan work set in sterling silver base. Perfect for festive occasions and weddings. Comes with secure butterfly backs.'
                }
            ]
        },
        {
            category: 'Bracelets',
            thumb: 'https://images.unsplash.com/photo-1602751584552-8ba73aad10e1?w=150&h=150&fit=crop&q=80',
            products: [
                {
                    name: 'Silver Crystal Vine Bracelet',
                    img: 'https://images.unsplash.com/photo-1617038220319-276d3cfab638?w=700&h=1050&fit=crop&q=85',
                    price: '₹1,199', original: '₹1,299', discount: '10% Off',
                    desc: 'Intricate vine-pattern bracelet adorned with sparkling crystals. Handcrafted from 925 sterling silver. Adjustable lobster clasp for a perfect fit.'
                },
                {
                    name: 'Silver Evil Eye Bracelet',
                    img: 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=700&h=1050&fit=crop&q=85',
                    price: '₹1,079', original: '₹1,199', discount: '10% Off',
                    desc: 'Turquoise evil-eye charm bracelet in oxidised 925 silver. A protective talisman and style statement all in one.'
                }
            ]
        },
        {
            category: 'Necklaces',
            thumb: 'https://images.unsplash.com/photo-1617038220319-276d3cfab638?w=150&h=150&fit=crop&q=80',
            products: [
                {
                    name: 'Silver Flower Charm Necklace',
                    img: 'https://images.unsplash.com/photo-1584302179602-e4c3d3fd629d?w=700&h=1050&fit=crop&q=85',
                    price: '₹1,349', original: '₹1,499', discount: '10% Off',
                    desc: 'Elegant flower charm pendant on a delicate 925 sterling silver chain. 18-inch with 2-inch extender. Perfect layering piece.'
                },
                {
                    name: 'Silver Swan Crystal Chain',
                    img: 'https://images.unsplash.com/photo-1617038220319-276d3cfab638?w=700&h=1050&fit=crop&q=85',
                    price: '₹1,249', original: '₹1,399', discount: '10% Off',
                    desc: 'Swan-inspired crystal chain necklace in polished 925 silver. Timeless and graceful, suitable for evening wear and gifting.'
                }
            ]
        },
        {
            category: 'Rings',
            thumb: 'https://images.unsplash.com/photo-1598560917505-59a3ad559071?w=150&h=150&fit=crop&q=80',
            products: [
                {
                    name: 'Silver Minimal Band Ring',
                    img: 'https://images.unsplash.com/photo-1598560917505-59a3ad559071?w=700&h=1050&fit=crop&q=85',
                    price: '₹649', original: '₹749', discount: '13% Off',
                    desc: 'Ultra-thin minimal band ring in polished 925 sterling silver. Stackable design. Available in sizes 5–12.'
                },
                {
                    name: 'Silver Rose Cut Design Ring',
                    img: 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=700&h=1050&fit=crop&q=85',
                    price: '₹849', original: '₹999', discount: '15% Off',
                    desc: 'Vintage rose-cut design ring. 925 certified silver. Adjustable free-size, fits most.'
                }
            ]
        },
        {
            category: 'Bangles',
            thumb: 'https://images.unsplash.com/photo-1630019852942-f89202989a59?w=150&h=150&fit=crop&q=80',
            products: [
                {
                    name: 'Silver Minimal Bangle',
                    img: 'https://images.unsplash.com/photo-1630019852942-f89202989a59?w=700&h=1050&fit=crop&q=85',
                    price: '₹1,099', original: '₹1,299', discount: '15% Off',
                    desc: 'Slim polished silver bangle. Hypoallergenic 925 sterling silver. Wear solo or stack with others.'
                }
            ]
        },
        {
            category: 'Chains',
            thumb: 'https://images.unsplash.com/photo-1584302179602-e4c3d3fd629d?w=150&h=150&fit=crop&q=80',
            products: [
                {
                    name: 'Silver Evil Eye Chain',
                    img: 'https://images.unsplash.com/photo-1584302179602-e4c3d3fd629d?w=700&h=1050&fit=crop&q=85',
                    price: '₹1,079', original: '₹1,199', discount: '10% Off',
                    desc: 'Fine paperclip-style sterling silver chain with a blue evil eye charm pendant. 20-inch length. BIS 925 certified.'
                }
            ]
        },
        {
            category: 'Pendant Sets',
            thumb: 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=150&h=150&fit=crop&q=80',
            products: [
                {
                    name: 'Silver Rose Green Triangle Pendant Set',
                    img: 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=700&h=1050&fit=crop&q=85',
                    price: '₹1,349', original: '₹1,499', discount: '10% Off',
                    desc: 'Geometric triangle pendant set with green tourmaline and rose gold plating. Includes 925 certified silver chain.'
                }
            ]
        },
        {
            category: 'Kundan',
            thumb: 'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=150&h=150&fit=crop&q=80',
            products: [
                {
                    name: 'Kundan Maang Tikka Set',
                    img: 'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=700&h=1050&fit=crop&q=85',
                    price: '₹1,899', original: '₹2,199', discount: '14% Off',
                    desc: 'Intricately crafted Kundan Maang Tikka with matching earrings. Sterling silver base with vibrant coloured stones.'
                }
            ]
        },
        {
            category: 'Toe Rings',
            thumb: 'https://images.unsplash.com/photo-1664575600850-c4b712e6e2bf?w=150&h=150&fit=crop&q=80',
            products: [
                {
                    name: 'Silver Rose Luna Shine Toe Ring',
                    img: 'https://images.unsplash.com/photo-1664575600850-c4b712e6e2bf?w=700&h=1050&fit=crop&q=85',
                    price: '₹649', original: '₹719', discount: '10% Off',
                    desc: 'Adjustable rose-gold plated toe ring in 925 sterling silver. Luna crescent motif. Comfortable fit, anti-tarnish.'
                },
                {
                    name: 'Silver Minimalist Toe Ring',
                    img: 'https://images.unsplash.com/photo-1573408301185-9519f94815f5?w=700&h=1050&fit=crop&q=85',
                    price: '₹499', original: '₹579', discount: '14% Off',
                    desc: 'Sleek open-band toe ring in pure 925 sterling silver. Free size, easy to wear. Perfect for casual everyday styling.'
                }
            ]
        }
    ];

    /* ══════════════════════════════════════
       HELPER
    ══════════════════════════════════════ */
    function qs(id) { return document.getElementById(id); }

    /* ══════════════════════════════════════
       STATE
    ══════════════════════════════════════ */
    var st = {
        catIdx: 0,
        prodIdx: 0,
        duration: 5000, // ms per slide
        startTs: 0,
        elapsed: 0,
        paused: false,
        raf: null,
        holdT: null,
        txStart: 0,
        tyStart: 0
    };

    /* ══════════════════════════════════════
       DOM REFS
    ══════════════════════════════════════ */
    var catStrip = qs('storyCatStrip');
    var progBars = qs('storyProgressBars');
    var svAvatar = qs('svAvatar');
    var svCatName = qs('svCatName');
    var svMainImg = qs('storyMainImg');
    var svTapLeft = qs('svTapLeft');
    var svTapRight = qs('svTapRight');
    var svCatPrev = qs('svCatPrev');
    var svCatNext = qs('svCatNext');
    var svSpinner = qs('svSpinner');
    var svPauseDot = qs('svPauseDot');
    var svBadge = qs('svBadge');
    var svName_ = qs('svProductName');
    var svPriceCur = qs('svPriceCur');
    var svPriceOri = qs('svPriceOri');
    var svPriceSave = qs('svPriceSave');
    var svDesc = qs('svDesc');
    var svReadMore = qs('svReadMore');
    var svWish = qs('svWish');
    var svAddBag = qs('svAddBag');
    var backBtn = qs('storyBackBtn');

    /* ══════════════════════════════════════
       READ URL PARAM
    ══════════════════════════════════════ */
    function getParam(name) {
        var p = new URLSearchParams(window.location.search);
        return p.get(name);
    }

    /* ══════════════════════════════════════
       BUILD CATEGORY STRIP
    ══════════════════════════════════════ */
    DATA.forEach(function (cat, idx) {
        var b = document.createElement('div');
        b.className = 'sv-cat-bubble';
        b.setAttribute('data-idx', idx);
        b.innerHTML =
            '<img class="sv-cat-thumb" src="' + cat.thumb + '" alt="' + cat.category + '" loading="lazy"/>' +
            '<span class="sv-cat-label">' + cat.category + '</span>';
        b.addEventListener('click', function () {
            goCategory(parseInt(this.getAttribute('data-idx'), 10));
        });
        catStrip.appendChild(b);
    });

    /* ══════════════════════════════════════
       RENDER CATEGORY META
    ══════════════════════════════════════ */
    function renderCat() {
        var cat = DATA[st.catIdx];
        svAvatar.src = cat.thumb;
        svCatName.textContent = cat.category;

        // Bubble active states
        var bubbles = catStrip.children;
        for (var i = 0; i < bubbles.length; i++) {
            bubbles[i].classList.toggle('active', i === st.catIdx);
        }
        if (bubbles[st.catIdx]) {
            bubbles[st.catIdx].scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
        }

        // Progress segments
        progBars.innerHTML = '';
        var prods = cat.products;
        for (var j = 0; j < prods.length; j++) {
            var seg = document.createElement('div');
            seg.className = 'sv-prog-seg';
            var fill = document.createElement('div');
            fill.className = 'sv-prog-fill';
            seg.appendChild(fill);
            progBars.appendChild(seg);
        }
    }

    /* ══════════════════════════════════════
       RENDER PRODUCT
    ══════════════════════════════════════ */
    function renderProduct() {
        var prod = DATA[st.catIdx].products[st.prodIdx];
        if (!prod) return;

        // Reset description
        svDesc.classList.remove('expanded');
        svReadMore.classList.remove('open');
        svReadMore.innerHTML = 'Read more <i class="bi bi-chevron-down"></i>';

        // Progress bar states
        var segs = progBars.children;
        for (var i = 0; i < segs.length; i++) {
            var fill = segs[i].querySelector('.sv-prog-fill');
            if (i < st.prodIdx) {
                fill.style.width = '100%';
                segs[i].classList.add('done');
            } else {
                fill.style.width = '0%';
                segs[i].classList.remove('done');
            }
        }

        // Image
        svMainImg.classList.add('loading');
        svSpinner.classList.add('show');
        var tmp = new Image();
        tmp.onload = tmp.onerror = function () {
            svMainImg.src = prod.img;
            svMainImg.classList.remove('loading');
            svSpinner.classList.remove('show');
        };
        tmp.src = prod.img;

        // Info
        svBadge.textContent = prod.discount || '';
        svName_.textContent = prod.name;
        svPriceCur.textContent = prod.price;
        svPriceOri.textContent = prod.original || '';
        svPriceSave.textContent = prod.discount ? 'Save ' + prod.discount : '';
        svDesc.textContent = prod.desc || '';

        // Reset wishlist button
        svWish.querySelector('i').className = 'bi bi-heart';
        svWish.classList.remove('active');
    }

    /* ══════════════════════════════════════
       TIMER / PROGRESS ANIMATION
    ══════════════════════════════════════ */
    function startTimer() {
        cancelAnimationFrame(st.raf);
        st.startTs = performance.now();
        st.elapsed = 0;
        st.paused = false;
        tick();
    }

    function tick() {
        if (st.paused) return;
        var pct = Math.min(((performance.now() - st.startTs + st.elapsed) / st.duration) * 100, 100);
        var segs = progBars.children;
        if (segs[st.prodIdx]) {
            segs[st.prodIdx].querySelector('.sv-prog-fill').style.width = pct + '%';
        }
        if (pct >= 100) { advance(); }
        else { st.raf = requestAnimationFrame(tick); }
    }

    function pauseTimer() {
        if (st.paused) return;
        st.paused = true;
        st.elapsed += performance.now() - st.startTs;
        cancelAnimationFrame(st.raf);
        svPauseDot.classList.add('show');
    }

    function resumeTimer() {
        if (!st.paused) return;
        st.paused = false;
        st.startTs = performance.now();
        svPauseDot.classList.remove('show');
        tick();
    }

    /* ══════════════════════════════════════
       NAVIGATION
    ══════════════════════════════════════ */
    function advance() {
        var cat = DATA[st.catIdx];
        var segs = progBars.children;
        if (segs[st.prodIdx]) {
            segs[st.prodIdx].querySelector('.sv-prog-fill').style.width = '100%';
            segs[st.prodIdx].classList.add('done');
        }
        if (st.prodIdx < cat.products.length - 1) {
            st.prodIdx++;
            renderProduct();
            startTimer();
        } else {
            if (st.catIdx < DATA.length - 1) { goCategory(st.catIdx + 1); }
            else { goBack(); }
        }
    }

    function goBack() {
        if (st.prodIdx > 0) {
            st.prodIdx--;
            renderProduct();
            startTimer();
        } else {
            if (st.catIdx > 0) { goCategory(st.catIdx - 1); }
            else { renderProduct(); startTimer(); }
        }
    }

    function goCategory(idx) {
        if (idx < 0 || idx >= DATA.length) return;
        st.catIdx = idx;
        st.prodIdx = 0;
        // Update URL param without full reload
        var url = new URL(window.location.href);
        url.searchParams.set('cat', idx);
        window.history.replaceState(null, '', url.toString());
        // Re-render
        renderCat();
        renderProduct();
        startTimer();
    }

    /* ══════════════════════════════════════
       BACK BUTTON — go to index
    ══════════════════════════════════════ */
    function navigateBack() {
        cancelAnimationFrame(st.raf);
        if (document.referrer && document.referrer.indexOf('index') !== -1) {
            window.history.back();
        } else {
            window.location.href = 'index.html';
        }
    }

    backBtn.addEventListener('click', navigateBack);
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') navigateBack();
        if (e.key === 'ArrowRight') advance();
        if (e.key === 'ArrowLeft') goBack();
    });

    /* ══════════════════════════════════════
       TAP ZONES
    ══════════════════════════════════════ */
    svTapLeft.addEventListener('click', goBack);
    svTapRight.addEventListener('click', advance);

    /* ══════════════════════════════════════
       HOLD TO PAUSE
    ══════════════════════════════════════ */
    document.getElementById('storyPage').addEventListener('pointerdown', function (e) {
        if (e.target.closest('#storyBottomPanel') ||
            e.target.closest('#storyCatStrip') ||
            e.target.closest('#storyBackBtn')) return;
        st.holdT = setTimeout(pauseTimer, 120);
    });
    document.getElementById('storyPage').addEventListener('pointerup', function () {
        clearTimeout(st.holdT);
        if (st.paused) resumeTimer();
    });
    document.getElementById('storyPage').addEventListener('pointercancel', function () {
        clearTimeout(st.holdT);
        if (st.paused) resumeTimer();
    });

    /* ══════════════════════════════════════
       SWIPE LEFT / RIGHT → Category change
    ══════════════════════════════════════ */
    document.getElementById('storyImgArea').addEventListener('touchstart', function (e) {
        st.txStart = e.touches[0].clientX;
        st.tyStart = e.touches[0].clientY;
    }, { passive: true });

    document.getElementById('storyImgArea').addEventListener('touchend', function (e) {
        var dx = e.changedTouches[0].clientX - st.txStart;
        var dy = e.changedTouches[0].clientY - st.tyStart;
        if (Math.abs(dx) < 45 || Math.abs(dy) > Math.abs(dx)) return;
        if (dx < -45) { goCategory(st.catIdx + 1); }
        else { goCategory(st.catIdx - 1); }
    }, { passive: true });

    /* ══════════════════════════════════════
       CATEGORY ARROW BUTTONS (desktop)
    ══════════════════════════════════════ */
    svCatPrev.addEventListener('click', function () { goCategory(st.catIdx - 1); });
    svCatNext.addEventListener('click', function () { goCategory(st.catIdx + 1); });

    /* ══════════════════════════════════════
       READ MORE
    ══════════════════════════════════════ */
    svReadMore.addEventListener('click', function (e) {
        e.stopPropagation();
        var open = svDesc.classList.toggle('expanded');
        svReadMore.classList.toggle('open', open);
        svReadMore.innerHTML = open
            ? 'Read less <i class="bi bi-chevron-up"></i>'
            : 'Read more <i class="bi bi-chevron-down"></i>';
        if (open) pauseTimer(); else resumeTimer();
    });

    /* ══════════════════════════════════════
       WISHLIST
    ══════════════════════════════════════ */
    svWish.addEventListener('click', function (e) {
        e.stopPropagation();
        var icon = this.querySelector('i');
        if (icon.classList.contains('bi-heart')) {
            icon.classList.replace('bi-heart', 'bi-heart-fill');
            this.classList.add('active');
            toast('Added to Wishlist ♡');
        } else {
            icon.classList.replace('bi-heart-fill', 'bi-heart');
            this.classList.remove('active');
        }
    });

    /* ══════════════════════════════════════
       ADD TO BAG
    ══════════════════════════════════════ */
    svAddBag.addEventListener('click', function (e) {
        e.stopPropagation();
        svAddBag.classList.add('added');
        svAddBag.innerHTML = '<i class="bi bi-check-lg"></i> Added!';
        setTimeout(function () {
            svAddBag.classList.remove('added');
            svAddBag.innerHTML = '<i class="bi bi-bag-plus"></i> Add to Bag';
        }, 1600);
        toast('Added to bag 🛍️');
    });

    /* ══════════════════════════════════════
       TOAST
    ══════════════════════════════════════ */
    function toast(msg) {
        var el = document.querySelector('.sv-toast');
        if (el) el.remove();
        el = document.createElement('div');
        el.className = 'sv-toast';
        el.textContent = msg;
        document.body.appendChild(el);
        requestAnimationFrame(function () {
            requestAnimationFrame(function () { el.classList.add('show'); });
        });
        setTimeout(function () {
            el.classList.remove('show');
            setTimeout(function () { el.remove(); }, 350);
        }, 2000);
    }

    /* ══════════════════════════════════════
       INIT
    ══════════════════════════════════════ */
    var startCat = parseInt(getParam('cat') || '0', 10);
    if (isNaN(startCat) || startCat < 0 || startCat >= DATA.length) startCat = 0;
    st.catIdx = startCat;

    renderCat();
    renderProduct();
    startTimer();

})();
