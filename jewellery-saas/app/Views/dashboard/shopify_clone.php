<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics - Jewellery SaaS Dashboard</title>
    <!-- Shopify Polaris relies heavily on system fonts -->
    <style>
        :root {
            /* Polaris Color Tokens */
            --p-color-bg-surface: #ffffff;
            --p-color-bg-surface-secondary: #f4f6f8;
            --p-color-bg-surface-tertiary: #ebebeb;
            --p-color-bg-primary: #008060;
            --p-color-bg-sidebar: #f1f2f4;
            --p-color-text: #202223;
            --p-color-text-subdued: #6d7175;
            --p-color-border: #8c9196;
            --p-color-border-subdued: #e1e3e5;
            --p-color-border-active: #008060;

            /* Polaris Dimensions */
            --p-space-1: 4px;
            --p-space-2: 8px;
            --p-space-3: 12px;
            --p-space-4: 16px;
            --p-space-5: 20px;
            --p-space-6: 24px;
            --p-radius-1: 4px;
            --p-radius-2: 8px;
            --p-shadow-1: 0 0 0 1px rgba(63, 63, 68, 0.05), 0 1px 3px 0 rgba(63, 63, 68, 0.15);

            /* Layout Tokens */
            --top-bar-height: 56px;
            --sidebar-width: 240px;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "San Francisco", "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
            background-color: var(--p-color-bg-surface-secondary);
            color: var(--p-color-text);
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Top Bar */
        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--top-bar-height);
            background-color: var(--p-color-bg-surface);
            border-bottom: 1px solid var(--p-color-border-subdued);
            display: flex;
            align-items: center;
            padding: 0 var(--p-space-4);
            z-index: 100;
            justify-content: space-between;
        }

        .top-bar-logo {
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: 18px;
            color: var(--p-color-bg-primary);
            /* Shopify Green */
            width: var(--sidebar-width);
            gap: 8px;
        }

        .top-bar-logo svg {
            width: 24px;
            height: 24px;
            fill: currentColor;
        }

        .top-bar-search {
            flex-grow: 1;
            max-width: 600px;
            margin: 0 var(--p-space-4);
        }

        .top-bar-search input {
            width: 100%;
            padding: var(--p-space-2) var(--p-space-3);
            background-color: var(--p-color-bg-surface-secondary);
            border: 1px solid transparent;
            border-radius: var(--p-radius-1);
            font-size: 14px;
            transition: all 0.2s;
        }

        .top-bar-search input:focus {
            outline: none;
            background-color: var(--p-color-bg-surface);
            border-color: var(--p-color-border-active);
            box-shadow: 0 0 0 2px rgba(0, 128, 96, 0.2);
        }

        .top-bar-actions {
            display: flex;
            align-items: center;
            gap: var(--p-space-4);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: var(--p-space-2);
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            padding: var(--p-space-1) var(--p-space-2);
            border-radius: var(--p-radius-1);
        }

        .user-profile:hover {
            background-color: var(--p-color-bg-surface-tertiary);
        }

        .user-avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background-color: #ffd8d8;
            /* Placeholder avatar color */
            color: #bd2c2c;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--p-color-bg-sidebar);
            height: calc(100vh - var(--top-bar-height));
            margin-top: var(--top-bar-height);
            border-right: 1px solid var(--p-color-border-subdued);
            flex-shrink: 0;
            overflow-y: auto;
            padding: var(--p-space-4) 0;
            box-sizing: border-box;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: var(--p-space-2) var(--p-space-4);
            color: var(--p-color-text-subdued);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            margin: 2px var(--p-space-2);
            border-radius: var(--p-radius-1);
            gap: 12px;
        }

        .nav-item svg {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        .nav-item:hover {
            background-color: var(--p-color-bg-surface-tertiary);
            color: var(--p-color-text);
        }

        .nav-item.active {
            background-color: rgba(0, 128, 96, 0.08);
            /* Light green tint */
            color: var(--p-color-bg-primary);
            /* Green active state */
            font-weight: 600;
        }

        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            width: 3px;
            height: 20px;
            background-color: var(--p-color-bg-primary);
            border-radius: 0 4px 4px 0;
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            margin-top: var(--top-bar-height);
            height: calc(100vh - var(--top-bar-height));
            overflow-y: auto;
            padding: var(--p-space-6);
            box-sizing: border-box;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: var(--p-space-5);
        }

        .page-title {
            font-size: 20px;
            font-weight: 700;
            margin: 0 0 var(--p-space-4) 0;
        }

        .controls-row {
            display: flex;
            gap: var(--p-space-3);
            align-items: center;
        }

        .polaris-btn {
            background-color: var(--p-color-bg-surface);
            border: 1px solid var(--p-color-border-subdued);
            color: var(--p-color-text);
            padding: 6px 12px;
            border-radius: var(--p-radius-1);
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .polaris-btn:hover {
            background-color: var(--p-color-bg-surface-tertiary);
        }

        .polaris-btn svg {
            width: 16px;
            height: 16px;
            fill: var(--p-color-text-subdued);
        }

        /* Grid Layout */
        .analytics-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--p-space-4);
        }

        .grid-header {
            grid-column: span 3;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: var(--p-space-4);
        }

        /* Metric Cards */
        .metric-card {
            background: var(--p-color-bg-surface);
            border-radius: var(--p-radius-2);
            box-shadow: var(--p-shadow-1);
            padding: var(--p-space-4);
            display: flex;
            flex-direction: column;
        }

        .metric-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--p-space-2);
            color: var(--p-color-text);
            font-weight: 600;
            font-size: 14px;
            margin-bottom: var(--p-space-2);
        }

        .metric-icon {
            color: var(--p-color-text-subdued);
        }

        .metric-icon svg {
            width: 16px;
            height: 16px;
            fill: currentColor;
        }

        .metric-value {
            font-size: 24px;
            font-weight: 600;
            color: var(--p-color-text);
            display: flex;
            align-items: center;
            gap: var(--p-space-2);
            margin-bottom: var(--p-space-4);
        }

        .metric-trend {
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .trend-up {
            color: #008060;
            /* Positive green */
        }

        .trend-down {
            color: #d82c0d;
            /* Negative red */
        }

        .metric-chart-placeholder {
            flex-grow: 1;
            min-height: 100px;
            display: flex;
            align-items: flex-end;
            padding-top: var(--p-space-6);
        }

        .chart-svg {
            width: 100%;
            height: 100%;
            overflow: visible;
        }

        .chart-path-primary {
            fill: none;
            stroke: #2c6ecb;
            /* Blue primary line */
            stroke-width: 2;
            stroke-linecap: round;
        }

        .chart-path-secondary {
            fill: none;
            stroke: #a0c2f9;
            /* Blue dashed previous line */
            stroke-width: 2;
            stroke-dasharray: 4, 4;
            stroke-linecap: round;
        }

        /* Table Styles within Cards */
        .card-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .card-table td {
            padding: var(--p-space-2) 0;
            border-bottom: 1px solid var(--p-color-border-subdued);
            color: var(--p-color-text-subdued);
        }

        .card-table tr:last-child td {
            border-bottom: none;
        }

        .card-table td:last-child {
            text-align: right;
            font-weight: 600;
            color: var(--p-color-text);
        }

        /* Logout Utility */
        .logout-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>

    <!-- Top Navigation Bar -->
    <header class="top-bar">
        <div class="top-bar-logo">
            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.928 9.628c-.092-.857-.866-1.503-1.74-1.503h-1.693l-1.077-4.85a1.725 1.725 0 0 0-1.685-1.353H8.267a1.725 1.725 0 0 0-1.685 1.353l-1.077 4.85H3.812c-.874 0-1.648.646-1.74 1.503l-1.127 10.5c-.06.56.335 1.05.882 1.11.042.005.084.005.126 0 .5-.05.877-.478.877-.981V18h14.34v.328c0 .503.377.931.877.981.042.005.084.005.126 0 .547-.06.942-.55.882-1.11l-1.127-10.57zM8.267 3.422h3.466l.786 3.538H7.48l.786-3.538z"></path>
            </svg>
            Jewellery SaaS
        </div>

        <div class="top-bar-search">
            <input type="text" placeholder="Search" aria-label="Search">
        </div>

        <div class="top-bar-actions">
            <svg style="width: 20px; height: 20px; color: var(--p-color-text-subdued);" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.99 1.5c-3.036 0-5.49 2.454-5.49 5.49V8.4c0 1.066-.466 2.072-1.282 2.75l-1.085.908c-.7.587-1.135 1.458-1.135 2.378 0 1.728 1.401 3.129 3.129 3.129h11.751c1.728 0 3.13-1.401 3.13-3.129 0-.92-.435-1.791-1.134-2.378l-1.086-.908c-.815-.678-1.282-1.684-1.282-2.75v-1.41c0-3.036-2.454-5.49-5.49-5.49h-.024l-.002-.001zm3.899 17.564A3.013 3.013 0 0 1 10.005 20a3.013 3.013 0 0 1-3.884-.936l3.884.936v-1.42s"></path>
            </svg>

            <a href="<?= session()->get('role') === 'superadmin' ? base_url('superadmin/logout') : base_url('admin/logout') ?>" class="logout-link">
                <div class="user-profile">
                    <div class="user-avatar"><?= substr(session()->get('shopName') ?? 'SA', 0, 2) ?></div>
                    <span><?= session()->get('shopName') ?? 'Platform Admin' ?></span>
                </div>
            </a>
        </div>
    </header>

    <!-- Side Navigation Bar -->
    <nav class="sidebar">
        <a href="#" class="nav-item">
            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.153 2.193a.5.5 0 0 0-.306 0l-7.5 3a.5.5 0 0 0-.317.435v7.26a1.5 1.5 0 0 0 .548 1.155l7.152 5.513a.498.498 0 0 0 .54 0l7.151-5.513a1.5 1.5 0 0 0 .548-1.155v-7.26a.5.5 0 0 0-.317-.435l-7.5-3zM5.03 12.89L10 16.721l4.97-3.832v-5.266L10 4.192l-4.97 1.988v5.266z" fill-rule="evenodd"></path>
            </svg>
            Home
        </a>
        <a href="#" class="nav-item">
            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 14a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-2-5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-5 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"></path>
            </svg>
            Orders
        </a>
        <a href="#" class="nav-item">
            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.75 4h12.5a.75.75 0 0 1 .75.75v10.5a.75.75 0 0 1-.75.75H3.75a.75.75 0 0 1-.75-.75V4.75A.75.75 0 0 1 3.75 4z" fill-rule="evenodd"></path>
            </svg>
            Products
        </a>
        <a href="#" class="nav-item">
            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 11.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM4 18.5a6 6 0 1 1 12 0h-12z" fill-rule="evenodd"></path>
            </svg>
            Customers
        </a>
        <a href="#" class="nav-item">
            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.5 14H15v1.5a.5.5 0 0 1-1 0V14h-1.5a.5.5 0 0 1 0-1H14v-1.5a.5.5 0 0 1 1 0V13h1.5a.5.5 0 0 1 0 1zM3 5h8.5c.276 0 .5-.224.5-.5s-.224-.5-.5-.5H3c-1.103 0-2 .897-2 2v9c0 1.103.897 2 2 2h8.5c.276 0 .5-.224.5-.5s-.224-.5-.5-.5H3a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zm3 3h4c.276 0 .5-.224.5-.5s-.224-.5-.5-.5H6c-.276 0-.5.224-.5.5s.224.5.5.5zm0 3h4c.276 0 .5-.224.5-.5s-.224-.5-.5-.5H6c-.276 0-.5.224-.5.5s.224.5.5.5zm0 3h2c.276 0 .5-.224.5-.5s-.224-.5-.5-.5H6c-.276 0-.5.224-.5.5s.224.5.5.5z" fill-rule="evenodd"></path>
            </svg>
            Content
        </a>

        <a href="#" class="nav-item active">
            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.5 17.5a.5.5 0 0 1 0-1h15a.5.5 0 0 1 0 1h-15zm3-8a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v4zm6-2c0 .276-.224.5-.5.5H9c-.276 0-.5-.224-.5-.5v-7c0-.276.224-.5.5-.5h2c.276 0 .5.224.5.5v7zm6 5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v10z"></path>
            </svg>
            Analytics
        </a>
        <div style="padding-left: 48px; display:flex; flex-direction:column; gap:4px; margin-bottom: 20px;">
            <a href="#" style="color:var(--p-color-text); text-decoration:none; font-size:13px; font-weight:500;">Reports</a>
            <a href="#" style="color:var(--p-color-text-subdued); text-decoration:none; font-size:13px;">Live View</a>
        </div>

        <a href="#" class="nav-item">
            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.5 6a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0zM13 3a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm1 14.5a.5.5 0 0 1-1 0v-4.085l-1.613-.672a.5.5 0 0 1-.133-.865l4.5-3.5a.5.5 0 0 1 .715.111.499.499 0 0 1-.11.715L12.724 12H14a.5.5 0 0 1 .5.5v5zM9 11v6.5a.5.5 0 0 1-1 0V11H6.037L3.12 13.918A.497.497 0 0 1 2.5 13.5v-3C2.5 8.019 4.519 6 7 6a2 2 0 1 1 0 4 .5.5 0 0 0-.5.5A1.5 1.5 0 0 0 8 12h1v-.5a.5.5 0 0 1 .5-.5z"></path>
            </svg>
            Marketing
        </a>
        <a href="#" class="nav-item">
            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.5 4a1.5 1.5 0 0 1 1.5 1.5v9a1.5 1.5 0 0 1-1.5 1.5H11l-3 3-1-.5v-2.5H3.5A1.5 1.5 0 0 1 2 14.5v-9A1.5 1.5 0 0 1 3.5 4h13z"></path>
            </svg>
            Discounts
        </a>

        <!-- Spacing for bottom Settings -->
        <div style="margin-top: auto; padding-top: 24px;">
            <a href="#" class="nav-item">
                <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.884 2.1c.328-.13.7.112.7.464l.113 2.534a6.494 6.494 0 0 1 1.62-.218l.115-2.59c.018-.4-1.298-.4-1.282 0l-.113 2.536a6.529 6.529 0 0 0-1.62.219l-.115-2.59M9.116 2.1c-.328-.13-.7.112-.7.464l-.113 2.534a6.494 6.494 0 0 0-1.62-.218l-.115-2.59c-.018-.4 1.298-.4 1.282 0l.113 2.536a6.529 6.529 0 0 1 1.62.219L9.116 5.161M12.445 18a6.541 6.541 0 0 1-1.15-2.001l-1.93.924c-.13.064-.282.029-.377-.087-.58-.707-1.105-1.464-1.565-2.261L8.767 13.9a6.471 6.471 0 0 1-2.152-.4l-.872 2.378c-.132.356-.632.482-.93.238l-1.206-1.127a.5.5 0 0 1 .094-.783l1.821-1.077a6.52 6.52 0 0 1-1.018-1.53M2.668 7.373C3.219 8.27 3.843 9.102 4.532 9.87l-1.372 2.212c-.22.353.197.747.533.5l1.83-1.365a6.49 6.49 0 0 1 1.767 1.053l-2.071 1.34c-.237.153-.16.522.115.586l1.32.308a.5.5 0 0 1 .374.629L6.5 17.551a6.477 6.477 0 0 0 2.222-1.939l-1.428-2.613c-.158-.29.13-.604.422-.458l2.91 1.44a.5.5 0 0 1 .271.603l-.707 2.06c-.143.415.421.688.756.368l2.427-2.316a.5.5 0 0 1 .799.273l.635 2.11M16 8.5v3.42l1.63 2.158A1.002 1.002 0 0 1 18 14.5a1.002 1.002 0 0 1-.397.79l-4.502 3.42v.79A1.002 1.002 0 0 1 12 20.5H8A1.002 1.002 0 0 1 7 19.5v-.79l-4.502-3.42A1.002 1.002 0 0 1 2 14.5a1.002 1.002 0 0 1 .37-1.158L4 11.92V8.5A6.5 6.5 0 0 1 10.5 2 6.513 6.513 0 0 1 17 8.5zm-5-.5c0-1.657-1.343-3-3-3S5 6.343 5 8v1h6V8z"></path>
                </svg>
                Settings
            </a>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="main-content">
        <div class="page-header">
            <h1 class="page-title">Analytics</h1>

            <button class="polaris-btn" style="background:none; border:none; box-shadow:none;">
                <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.5 5A1.5 1.5 0 0 1 4 3.5h12A1.5 1.5 0 0 1 17.5 5v1.272a1.5 1.5 0 0 1-.365.986l-4.635 5.561V16.5a1.5 1.5 0 0 1-2.229 1.314l-2-1.111A1.5 1.5 0 0 1 7.5 15.39v-2.57L2.865 7.258A1.5 1.5 0 0 1 2.5 6.27V5Zm13 1.077L10.875 11.66A1.5 1.5 0 0 0 10.5 12.6v2.584l-2 1.111v-3.694c0-.363-.131-.715-.375-.992L3.5 6.076V5.5c0-.276.224-.5.5-.5h12c.276 0 .5.224.5.5v.577Z"></path>
                </svg>
                Enter fullscreen
            </button>
        </div>

        <div class="grid-header">
            <div class="controls-row">
                <button class="polaris-btn">
                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.5 5h-1V4a1 1 0 0 0-2 0v1h-7V4a1 1 0 0 0-2 0v1h-1A1.5 1.5 0 0 0 2 6.5v11A1.5 1.5 0 0 0 3.5 19h13a1.5 1.5 0 0 0 1.5-1.5v-11A1.5 1.5 0 0 0 16.5 5ZM16.5 17h-13V9h13v8Z" fill-rule="evenodd"></path>
                    </svg>
                    Jan 1, 2022-May 10, 2023
                </button>
                <button class="polaris-btn">
                    Compare: Jan 1, 2021-May 10, 2022
                </button>
            </div>

            <div style="display:flex; justify-content:flex-end; align-items:center;">
                <label style="font-size: 13px; font-weight: 500; display:flex; align-items:center; gap: 8px;">
                    <input type="checkbox" style="margin:0;"> Auto-refresh
                </label>
            </div>
        </div>

        <!-- Metric Grid -->
        <div class="analytics-grid">

            <!-- Total Sales -->
            <div class="metric-card" style="grid-row: span 2;">
                <div class="metric-header">
                    Total sales
                    <span class="metric-icon"><svg viewBox="0 0 20 20">
                            <path d="M5.5 15a1.5 1.5 0 01-1.5-1.5v-7A1.5 1.5 0 015.5 5h1A1.5 1.5 0 018 6.5v7A1.5 1.5 0 016.5 15h-1zm6 0a1.5 1.5 0 01-1.5-1.5v-3A1.5 1.5 0 0111.5 9h1a1.5 1.5 0 011.5 1.5v3a1.5 1.5 0 01-1.5 1.5h-1zm6 0a1.5 1.5 0 01-1.5-1.5v-1A1.5 1.5 0 0117.5 11h1a1.5 1.5 0 011.5 1.5v1a1.5 1.5 0 01-1.5 1.5h-1z"></path>
                        </svg></span>
                </div>
                <div class="metric-value">$0.00</div>
                <div style="font-size: 13px; font-weight: 500; border-bottom: 2px dashed #00000030; width: max-content; padding-bottom: 2px; margin-bottom: 12px; cursor: help;">Sales over time</div>

                <!-- Chart Area -->
                <div class="metric-chart-placeholder" style="position: relative;">
                    <!-- Y Axis Labels -->
                    <div style="position: absolute; left: 0; bottom: 0; top: 0; display: flex; flex-direction: column; justify-content: space-between; font-size: 11px; color: var(--p-color-text-subdued); padding-bottom: 20px;">
                        <span>$10</span>
                        <span>$5</span>
                        <span>$0</span>
                    </div>

                    <div style="margin-left: 24px; width: 100%; height: 100%; border-bottom: 1px solid var(--p-color-border-subdued); display:flex; align-items:flex-end;">
                        <!-- Flat zero line mapping for '$0.00' scenario -->
                        <svg class="chart-svg" preserveAspectRatio="none">
                            <line x1="0" y1="99%" x2="100%" y2="99%" class="chart-path-primary" stroke="#6371c2" />
                        </svg>
                    </div>
                </div>
                <!-- X Axis Labels -->
                <div style="display: flex; justify-content: space-between; font-size: 11px; color: var(--p-color-text-subdued); margin-left: 24px; margin-top: 8px; margin-bottom: 16px;">
                    <span>Jan 2022</span>
                    <span>Jun 2022</span>
                    <span>Nov 2022</span>
                    <span>Apr 2023</span>
                </div>

                <div style="display: flex; flex-direction: column; align-items: center; gap: 8px; margin-top: auto;">
                    <button class="polaris-btn" style="background:none; border:none; box-shadow:none; font-size: 12px; gap: 8px;">
                        <div style="width:12px; height:2px; background:#6371c2;"></div> Jan 1, 2022-May 10, 2023
                    </button>
                    <button class="polaris-btn" style="background:none; border:none; box-shadow:none; font-size: 12px; gap: 8px; color: var(--p-color-text-subdued);">
                        <div style="width:12px; height:2px; background:#a0c2f9; border-top:2px dotted #fff;"></div> Jan 1, 2021-May 10, 2022
                    </button>
                </div>
            </div>

            <!-- Sessions -->
            <div class="metric-card" style="grid-row: span 2;">
                <div class="metric-header">
                    Sessions
                    <span class="metric-icon"><svg viewBox="0 0 20 20">
                            <path d="M5.5 15a1.5 1.5 0 01-1.5-1.5v-7A1.5 1.5 0 015.5 5h1A1.5 1.5 0 018 6.5v7A1.5 1.5 0 016.5 15h-1zm6 0a1.5 1.5 0 01-1.5-1.5v-3A1.5 1.5 0 0111.5 9h1a1.5 1.5 0 011.5 1.5v3a1.5 1.5 0 01-1.5 1.5h-1zm6 0a1.5 1.5 0 01-1.5-1.5v-1A1.5 1.5 0 0117.5 11h1a1.5 1.5 0 011.5 1.5v1a1.5 1.5 0 01-1.5 1.5h-1z"></path>
                        </svg></span>
                </div>
                <div class="metric-value">
                    35,979 <span class="metric-trend trend-up"><svg style="width:12px;height:12px;" viewBox="0 0 20 20">
                            <path d="M5.293 9.707a.999.999 0 010-1.414l4-4a.999.999 0 011.414 0l4 4a.997.997 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a.999.999 0 01-1.414 0z"></path>
                        </svg> 97%</span>
                </div>

                <table class="card-table" style="margin-bottom: 16px;">
                    <tr>
                        <td style="border:none; color: var(--p-color-text);">Visitors</td>
                        <td style="border:none;">34,457</td>
                        <td style="border:none; text-align:right;"><span class="metric-trend trend-up"><svg style="width:12px;height:12px;" viewBox="0 0 20 20">
                                    <path d="M5.293 9.707l4-4a.999.999 0 011.414 0l4 4a.997.997 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a.999.999 0 01-1.414 0z"></path>
                                </svg> 97%</span></td>
                    </tr>
                </table>
                <div style="font-size: 13px; font-weight: 500; border-bottom: 2px dashed #00000030; width: max-content; padding-bottom: 2px; margin-bottom: 12px; cursor: help;">Sessions over time</div>

                <!-- Chart Area -->
                <div class="metric-chart-placeholder" style="position: relative;">
                    <div style="position: absolute; left: 0; bottom: 0; top: 0; display: flex; flex-direction: column; justify-content: space-between; font-size: 11px; color: var(--p-color-text-subdued); padding-bottom: 20px;">
                        <span>4K</span>
                        <span>2K</span>
                        <span>0</span>
                    </div>

                    <div style="margin-left: 20px; width: 100%; height: 100%; border-bottom: 1px solid var(--p-color-border-subdued); display:flex; align-items:flex-end;">
                        <!-- Curved active line simulating fluctuations -->
                        <svg class="chart-svg" preserveAspectRatio="none">
                            <path class="chart-path-primary" d="M0,70 Q10,60 20,70 T40,60 T60,65 T80,60 T100,55 T120,60 T140,55 T160,50 T180,60 T200,45 T220,50 T240,65 T260,70" />
                            <path class="chart-path-secondary" d="M0,80 Q20,70 40,90 T80,90 T120,85 T160,85 T200,90 T240,75 T260,90" />
                        </svg>
                    </div>
                </div>
                <!-- X Axis Labels -->
                <div style="display: flex; justify-content: space-between; font-size: 11px; color: var(--p-color-text-subdued); margin-left: 20px; margin-top: 8px; margin-bottom: 16px;">
                    <span>Jan 2022</span>
                    <span>Jun 2022</span>
                    <span>Nov 2022</span>
                    <span>Apr 2023</span>
                </div>

                <div style="display: flex; flex-direction: column; align-items: center; gap: 8px; margin-top: auto;">
                    <button class="polaris-btn" style="background:none; border:none; box-shadow:none; font-size: 12px; gap: 8px;">
                        <div style="width:12px; height:2px; background:#2c6ecb;"></div> Jan 1, 2022-May 10, 2023
                    </button>
                    <button class="polaris-btn" style="background:none; border:none; box-shadow:none; font-size: 12px; gap: 8px; color: var(--p-color-text-subdued);">
                        <div style="width:12px; height:2px; background:#a0c2f9; border-top:2px dotted #fff;"></div> Jan 1, 2021-May 10, 2022
                    </button>
                </div>
            </div>

            <!-- Returning Customer Rate -->
            <div class="metric-card" style="grid-row: span 1;">
                <div class="metric-header">
                    Returning customer rate
                </div>
                <div class="metric-value">0%</div>
                <div style="font-size: 13px; font-weight: 500; border-bottom: 2px dashed #00000030; width: max-content; padding-bottom: 2px; margin-bottom: 12px; cursor: help;">Customers Over Time</div>

                <div class="metric-chart-placeholder" style="position: relative; min-height: 80px; padding-top: 20px;">
                    <div style="position: absolute; left: 0; bottom: 0; top: 0; display: flex; flex-direction: column; justify-content: space-between; font-size: 11px; color: var(--p-color-text-subdued); padding-bottom: 20px;">
                        <span>10</span>
                        <span>5</span>
                        <span>0</span>
                    </div>

                    <div style="margin-left: 16px; width: 100%; height: 100%; border-bottom: 1px solid var(--p-color-border-subdued); display:flex; align-items:flex-end;">
                        <!-- Flat zero layout -->
                    </div>
                </div>
                <div style="display: flex; justify-content: space-between; font-size: 11px; color: var(--p-color-text-subdued); margin-left: 16px; margin-top: 8px; margin-bottom: 16px;">
                    <span>Jan 2022</span>
                    <span>Jun 2022</span>
                    <span>Nov 2022</span>
                    <span>Apr 2023</span>
                </div>

                <div style="display: flex; justify-content: center; gap: 16px; margin-top: auto;">
                    <button class="polaris-btn" style="background:none; border:none; box-shadow:none; font-size: 12px; gap: 8px; padding:0;">
                        <div style="width:12px; height:2px; background:#a0c2f9;"></div> First-time
                    </button>
                    <button class="polaris-btn" style="background:none; border:none; box-shadow:none; font-size: 12px; gap: 8px; padding:0;">
                        <div style="width:12px; height:2px; background:#2c6ecb;"></div> Returning
                    </button>
                </div>
            </div>

            <!-- Conversion Rate -->
            <div class="metric-card" style="grid-row: span 2;">
                <div class="metric-header">
                    Conversion rate
                    <span class="metric-icon"><svg viewBox="0 0 20 20">
                            <path d="M5.5 15a1.5 1.5 0 01-1.5-1.5v-7A1.5 1.5 0 015.5 5h1A1.5 1.5 0 018 6.5v7A1.5 1.5 0 016.5 15h-1zm6 0a1.5 1.5 0 01-1.5-1.5v-3A1.5 1.5 0 0111.5 9h1a1.5 1.5 0 011.5 1.5v3a1.5 1.5 0 01-1.5 1.5h-1zm6 0a1.5 1.5 0 01-1.5-1.5v-1A1.5 1.5 0 0117.5 11h1a1.5 1.5 0 011.5 1.5v1a1.5 1.5 0 01-1.5 1.5h-1z"></path>
                        </svg></span>
                </div>
                <div class="metric-value">0%</div>
                <div style="font-size: 13px; font-weight: 500; border-bottom: 2px dashed #00000030; width: max-content; padding-bottom: 2px; margin-bottom: 16px; cursor: help;">Conversion funnel</div>

                <table class="card-table">
                    <tr>
                        <td>Added to cart<br><span style="font-size:11px;">453 sessions</span></td>
                        <td style="text-align: right; width: 60px;">1.26%</td>
                        <td style="text-align: right; width: 60px;"><span class="metric-trend trend-up"><svg style="width:12px;height:12px;" viewBox="0 0 20 20">
                                    <path d="M5.293 9.707l4-4a.999.999 0 011.414 0l4 4a.997.997 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a.999.999 0 01-1.414 0z"></path>
                                </svg> 35%</span></td>
                    </tr>
                    <tr>
                        <td>Reached checkout<br><span style="font-size:11px;">132 sessions</span></td>
                        <td style="text-align: right;">0.37%</td>
                        <td style="text-align: right;"><span class="metric-trend trend-up"><svg style="width:12px;height:12px;" viewBox="0 0 20 20">
                                    <path d="M5.293 9.707l4-4a.999.999 0 011.414 0l4 4a.997.997 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a.999.999 0 01-1.414 0z"></path>
                                </svg> 205%</span></td>
                    </tr>
                    <tr>
                        <td>Sessions converted<br><span style="font-size:11px;">0 sessions</span></td>
                        <td style="text-align: right;">0%</td>
                        <td style="text-align: right;"><span class="metric-trend">—</span></td>
                    </tr>
                </table>
            </div>

            <!-- Average Order Value -->
            <div class="metric-card" style="grid-row: span 1;">
                <div class="metric-header">
                    Average order value
                    <span class="metric-icon"><svg viewBox="0 0 20 20">
                            <path d="M5.5 15a1.5 1.5 0 01-1.5-1.5v-7A1.5 1.5 0 015.5 5h1A1.5 1.5 0 018 6.5v7A1.5 1.5 0 016.5 15h-1zm6 0a1.5 1.5 0 01-1.5-1.5v-3A1.5 1.5 0 0111.5 9h1a1.5 1.5 0 011.5 1.5v3a1.5 1.5 0 01-1.5 1.5h-1zm6 0a1.5 1.5 0 01-1.5-1.5v-1A1.5 1.5 0 0117.5 11h1a1.5 1.5 0 011.5 1.5v1a1.5 1.5 0 01-1.5 1.5h-1z"></path>
                        </svg></span>
                </div>
                <div class="metric-value">$0.00</div>
                <div style="font-size: 13px; font-weight: 500; border-bottom: 2px dashed #00000030; width: max-content; padding-bottom: 2px; margin-bottom: 12px; cursor: help;">Order Value Over Time</div>

                <div class="metric-chart-placeholder" style="position: relative; min-height: 80px; padding-top: 20px;">
                    <div style="position: absolute; left: 0; bottom: 0; top: 0; display: flex; flex-direction: column; justify-content: space-between; font-size: 11px; color: var(--p-color-text-subdued); padding-bottom: 20px;">
                        <span>$10</span>
                        <span>$5</span>
                        <span>$0</span>
                    </div>

                    <div style="margin-left: 24px; width: 100%; height: 100%; border-bottom: 1px solid var(--p-color-border-subdued); display:flex; align-items:flex-end;">
                        <!-- Flat zero line mapping for '$0.00' scenario -->
                        <svg class="chart-svg" preserveAspectRatio="none">
                            <line x1="0" y1="99%" x2="100%" y2="99%" class="chart-path-primary" stroke="#6371c2" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Customer cohort analysis -->
            <div class="metric-card" style="grid-row: span 1; justify-content: center; align-items: center; text-align: center;">
                <div class="metric-header" style="width: 100%;">
                    Customer cohort analysis
                    <span class="metric-icon"><svg viewBox="0 0 20 20">
                            <path d="M5.5 15a1.5 1.5 0 01-1.5-1.5v-7A1.5 1.5 0 015.5 5h1A1.5 1.5 0 018 6.5v7A1.5 1.5 0 016.5 15h-1zm6 0a1.5 1.5 0 01-1.5-1.5v-3A1.5 1.5 0 0111.5 9h1a1.5 1.5 0 011.5 1.5v3a1.5 1.5 0 01-1.5 1.5h-1zm6 0a1.5 1.5 0 01-1.5-1.5v-1A1.5 1.5 0 0117.5 11h1a1.5 1.5 0 011.5 1.5v1a1.5 1.5 0 01-1.5 1.5h-1z"></path>
                        </svg></span>
                </div>
                <div style="flex-grow: 1; display: flex; align-items: center; justify-content: center; color: var(--p-color-text-subdued); font-size: 13px; margin: 40px 0;">
                    There was no data found for this date range.
                </div>
            </div>

            <!-- Sessions by location -->
            <div class="metric-card" style="grid-row: span 1;">
                <div class="metric-header">
                    Sessions by location
                    <span class="metric-icon"><svg viewBox="0 0 20 20">
                            <path d="M5.5 15a1.5 1.5 0 01-1.5-1.5v-7A1.5 1.5 0 015.5 5h1A1.5 1.5 0 018 6.5v7A1.5 1.5 0 016.5 15h-1zm6 0a1.5 1.5 0 01-1.5-1.5v-3A1.5 1.5 0 0111.5 9h1a1.5 1.5 0 011.5 1.5v3a1.5 1.5 0 01-1.5 1.5h-1zm6 0a1.5 1.5 0 01-1.5-1.5v-1A1.5 1.5 0 0117.5 11h1a1.5 1.5 0 011.5 1.5v1a1.5 1.5 0 01-1.5 1.5h-1z"></path>
                        </svg></span>
                </div>

                <table class="card-table">
                    <tr>
                        <td style="border:none;">United States</td>
                        <td style="border:none;">7,269</td>
                        <td style="border:none; text-align:right;"><span class="metric-trend trend-up"><svg style="width:12px;height:12px;" viewBox="0 0 20 20">
                                    <path d="M5.293 9.707l4-4a.999.999 0 011.414 0l4 4a.997.997 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a.999.999 0 01-1.414 0z"></path>
                                </svg> 55%</span></td>
                    </tr>
                </table>
            </div>

        </div>

    </main>

</body>

</html>