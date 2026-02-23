<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#000000" />
    <title>Shop Category – Silversheen</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&family=Jost:wght@300;400;500;600&display=swap"
        rel="stylesheet" />

    <style>
        /* ══════════════════════════════════════
       RESET & ROOT
    ══════════════════════════════════════ */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --gold: #c9a96e;
            --accent: #b5925a;
            --dark: #1a1a1a;
            --white: #ffffff;
            --badge-red: #e05252;
            --green-save: #6ee07b;
            --font-head: 'Cormorant Garamond', Georgia, serif;
            --font-body: 'Jost', sans-serif;
            --ease: cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        html,
        body {
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: #000;
            font-family: var(--font-body);
            color: var(--white);
            -webkit-tap-highlight-color: transparent;
            touch-action: none;
            /* prevent bounce scroll on iOS */
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ══════════════════════════════════════
       STORY PAGE WRAPPER — true full screen
    ══════════════════════════════════════ */
        #storyPage {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            /* use dvh when supported for iOS toolbar */
            height: 100dvh;
            background: #000;
            display: flex;
            flex-direction: column;
        }

        /* ══════════════════════════════════════
       CATEGORY BUBBLE STRIP (very top)
    ══════════════════════════════════════ */
        #storyCatStrip {
            position: absolute;
            top: env(safe-area-inset-top, 0px);
            left: 0;
            right: 0;
            z-index: 30;
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding: 12px 14px 4px;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        #storyCatStrip::-webkit-scrollbar {
            display: none;
        }

        .sv-cat-bubble {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            flex-shrink: 0;
            cursor: pointer;
            opacity: 0.5;
            transition: opacity 0.25s;
        }

        .sv-cat-bubble.active {
            opacity: 1;
        }

        .sv-cat-thumb {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.25);
            transition: border-color 0.25s;
        }

        .sv-cat-bubble.active .sv-cat-thumb {
            border-color: var(--gold);
        }

        .sv-cat-label {
            font-size: 0.56rem;
            letter-spacing: 0.05em;
            white-space: nowrap;
            color: rgba(255, 255, 255, 0.85);
        }

        /* ══════════════════════════════════════
       TOPBAR: progress bars + header row
    ══════════════════════════════════════ */
        #storyTopBar {
            position: absolute;
            top: calc(env(safe-area-inset-top, 0px) + 66px);
            left: 0;
            right: 0;
            z-index: 30;
            padding: 0 10px;
            pointer-events: none;
        }

        #storyProgressBars {
            display: flex;
            gap: 3px;
            margin-bottom: 9px;
        }

        .sv-prog-seg {
            flex: 1;
            height: 2px;
            background: rgba(255, 255, 255, 0.28);
            border-radius: 2px;
            overflow: hidden;
        }

        .sv-prog-fill {
            height: 100%;
            background: var(--white);
            width: 0%;
            border-radius: 2px;
        }

        .sv-prog-seg.done .sv-prog-fill {
            width: 100%;
        }

        #storyHeaderRow {
            display: flex;
            align-items: center;
            gap: 9px;
            pointer-events: all;
        }

        .sv-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--gold);
            flex-shrink: 0;
        }

        .sv-cat-name {
            font-size: 0.82rem;
            font-weight: 600;
            line-height: 1.2;
        }

        .sv-time-ago {
            font-size: 0.6rem;
            color: rgba(255, 255, 255, 0.55);
            line-height: 1;
        }

        #storyBackBtn {
            margin-left: auto;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            border: none;
            color: var(--white);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.25s;
        }

        #storyBackBtn:hover {
            background: rgba(0, 0, 0, 0.65);
        }

        /* ══════════════════════════════════════
       FULL-SCREEN IMAGE
    ══════════════════════════════════════ */
        #storyImgArea {
            position: absolute;
            inset: 0;
            z-index: 5;
        }

        #storyMainImg {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: opacity 0.22s ease;
        }

        #storyMainImg.loading {
            opacity: 0;
        }

        /* gradient for panel readability */
        #storyImgArea::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom,
                    rgba(0, 0, 0, 0.30) 0%,
                    transparent 35%,
                    transparent 50%,
                    rgba(0, 0, 0, 0.75) 100%);
            pointer-events: none;
            z-index: 1;
        }

        /* ══════════════════════════════════════
       TAP ZONES
    ══════════════════════════════════════ */
        .sv-tap-zone {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 38%;
            z-index: 15;
            cursor: pointer;
        }

        #svTapLeft {
            left: 0;
        }

        #svTapRight {
            right: 0;
        }

        .sv-tap-zone:active::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.07);
        }

        /* ══════════════════════════════════════
       CATEGORY NAV ARROWS (desktop hint)
    ══════════════════════════════════════ */
        .sv-cat-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 25;
            background: rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            color: #fff;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            opacity: 0;
            transition: opacity 0.3s;
            cursor: pointer;
            border: none;
        }

        #storyPage:hover .sv-cat-arrow {
            opacity: 1;
        }

        #svCatPrev {
            left: 8px;
        }

        #svCatNext {
            right: 8px;
        }

        /* ══════════════════════════════════════
       BOTTOM PRODUCT PANEL
    ══════════════════════════════════════ */
        #storyBottomPanel {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 40;
            background: rgba(12, 10, 8, 0.84);
            backdrop-filter: blur(22px) saturate(1.6);
            -webkit-backdrop-filter: blur(22px) saturate(1.6);
            border-radius: 22px 22px 0 0;
            padding: 10px 18px calc(env(safe-area-inset-bottom, 14px) + 14px);
        }

        .sv-handle {
            width: 36px;
            height: 4px;
            background: rgba(255, 255, 255, 0.22);
            border-radius: 2px;
            margin: 0 auto 14px;
        }

        #svBadge {
            display: inline-block;
            background: var(--badge-red);
            color: #fff;
            font-size: 0.62rem;
            font-weight: 600;
            padding: 2px 9px;
            border-radius: 50px;
            letter-spacing: 0.04em;
            margin-bottom: 5px;
        }

        #svBadge:empty {
            display: none;
        }

        #svProductName {
            font-family: var(--font-head);
            font-size: 1.38rem;
            font-weight: 600;
            line-height: 1.2;
            letter-spacing: 0.02em;
            margin-bottom: 6px;
        }

        .sv-price-row {
            display: flex;
            align-items: baseline;
            gap: 8px;
            margin-bottom: 10px;
            flex-wrap: wrap;
        }

        #svPriceCur {
            font-size: 1.12rem;
            font-weight: 700;
        }

        #svPriceOri {
            font-size: 0.82rem;
            color: rgba(255, 255, 255, 0.4);
            text-decoration: line-through;
        }

        #svPriceSave {
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--green-save);
            background: rgba(110, 224, 123, 0.12);
            padding: 2px 7px;
            border-radius: 50px;
        }

        #svPriceSave:empty {
            display: none;
        }

        /* Description */
        #svDescWrap {
            margin-bottom: 13px;
        }

        #svDesc {
            font-size: 0.77rem;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.55;
            max-height: 2.4em;
            overflow: hidden;
            transition: max-height 0.35s ease;
        }

        #svDesc.expanded {
            max-height: 160px;
        }

        #svReadMore {
            background: none;
            border: none;
            color: var(--gold);
            font-family: var(--font-body);
            font-size: 0.7rem;
            font-weight: 500;
            padding: 0;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 3px;
            margin-top: 4px;
        }

        #svReadMore .bi {
            transition: transform 0.25s;
        }

        #svReadMore.open .bi {
            transform: rotate(180deg);
        }

        /* Action bar */
        .sv-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sv-btn-circle {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            border: 1.5px solid rgba(255, 255, 255, 0.22);
            background: rgba(255, 255, 255, 0.08);
            color: var(--white);
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.25s;
            flex-shrink: 0;
        }

        #svWish.active {
            background: rgba(224, 82, 82, 0.18);
            border-color: var(--badge-red);
            color: var(--badge-red);
        }

        #svAddBag {
            flex: 1;
            height: 46px;
            background: var(--gold);
            color: var(--dark);
            border: none;
            border-radius: 8px;
            font-family: var(--font-body);
            font-size: 0.84rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            cursor: pointer;
            transition: background 0.25s, transform 0.15s;
        }

        #svAddBag:active {
            transform: scale(0.97);
        }

        #svAddBag.added {
            background: #3d8c6f;
            color: #fff;
        }

        #svViewFull {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            border: 1.5px solid rgba(255, 255, 255, 0.22);
            background: rgba(255, 255, 255, 0.08);
            color: var(--white);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: background 0.25s;
            text-decoration: none;
        }

        #svViewFull:hover {
            background: rgba(255, 255, 255, 0.18);
        }

        /* ══════════════════════════════════════
       LOADING SPINNER
    ══════════════════════════════════════ */
        #svSpinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 20;
            width: 38px;
            height: 38px;
            border: 3px solid rgba(255, 255, 255, 0.15);
            border-top-color: var(--gold);
            border-radius: 50%;
            animation: spin 0.75s linear infinite;
            display: none;
        }

        #svSpinner.show {
            display: block;
        }

        @keyframes spin {
            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        /* ══════════════════════════════════════
       PAUSE DOT
    ══════════════════════════════════════ */
        #svPauseDot {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 22;
            width: 54px;
            height: 54px;
            background: rgba(0, 0, 0, 0.48);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s;
        }

        #svPauseDot.show {
            opacity: 1;
        }

        #svPauseDot i {
            font-size: 1.5rem;
        }

        /* ══════════════════════════════════════
       TOAST
    ══════════════════════════════════════ */
        .sv-toast {
            position: fixed;
            bottom: 120px;
            left: 50%;
            transform: translateX(-50%) translateY(16px);
            background: rgba(26, 26, 26, 0.95);
            color: #fff;
            font-family: var(--font-body);
            font-size: 0.78rem;
            padding: 9px 20px;
            border-radius: 50px;
            z-index: 9999;
            opacity: 0;
            transition: opacity 0.3s, transform 0.3s;
            white-space: nowrap;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.35);
        }

        .sv-toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
    </style>
</head>

<body>

    <div id="storyPage">

        <!-- Category bubble strip -->
        <div id="storyCatStrip"></div>

        <!-- Top bar -->
        <div id="storyTopBar">
            <div id="storyProgressBars"></div>
            <div id="storyHeaderRow">
                <img id="svAvatar" class="sv-avatar" src="" alt="" />
                <div>
                    <p class="sv-cat-name" id="svCatName"></p>
                    <p class="sv-time-ago">Silversheen • Now</p>
                </div>
                <button id="storyBackBtn" aria-label="Back">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
        </div>

        <!-- Full-screen image -->
        <div id="storyImgArea">
            <img id="storyMainImg" src="" alt="" />
            <div class="sv-tap-zone" id="svTapLeft"></div>
            <div class="sv-tap-zone" id="svTapRight"></div>
        </div>

        <!-- Category arrows -->
        <button class="sv-cat-arrow" id="svCatPrev"><i class="bi bi-chevron-left"></i></button>
        <button class="sv-cat-arrow" id="svCatNext"><i class="bi bi-chevron-right"></i></button>

        <!-- Loading & pause overlays -->
        <div id="svSpinner"></div>
        <div id="svPauseDot"><i class="bi bi-pause-fill"></i></div>

        <!-- Bottom product panel -->
        <div id="storyBottomPanel">
            <div class="sv-handle"></div>
            <span id="svBadge"></span>
            <h2 id="svProductName"></h2>
            <div class="sv-price-row">
                <span id="svPriceCur"></span>
                <span id="svPriceOri"></span>
                <span id="svPriceSave"></span>
            </div>
            <div id="svDescWrap">
                <p id="svDesc"></p>
                <button id="svReadMore">Read more <i class="bi bi-chevron-down"></i></button>
            </div>
            <div class="sv-actions">
                <button class="sv-btn-circle" id="svWish" aria-label="Wishlist">
                    <i class="bi bi-heart"></i>
                </button>
                <button id="svAddBag">
                    <i class="bi bi-bag-plus"></i> Add to Bag
                </button>
                <a href="#" class="sv-btn-circle" id="svViewFull" aria-label="View product">
                    <i class="bi bi-arrow-up-right"></i>
                </a>
            </div>
        </div>

    </div><!-- /#storyPage -->

    <script src="<?= base_url('themes/silversheen/js/story.js') ?>"></script>
</body>

</html>