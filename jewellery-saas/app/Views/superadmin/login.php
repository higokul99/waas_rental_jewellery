<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superadmin Login - Jewellery SaaS</title>
    <style>
        :root {
            --p-color-bg-surface: #ffffff;
            --p-color-bg-surface-secondary: #f4f6f8;
            --p-color-text: #202223;
            --p-color-text-subdued: #6d7175;
            --p-color-border: #8c9196;
            --p-color-border-hover: #1f5199;
            --p-color-bg-primary: #008060;
            --p-color-bg-primary-hover: #006e52;
            --p-color-text-primary: #ffffff;
            --p-color-border-critical: #d82c0d;
            --p-border-radius-1: 3px;
            --p-border-radius-2: 8px;
            --p-space-4: 16px;
            --p-space-5: 20px;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "San Francisco", "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: var(--p-color-bg-surface-secondary);
            margin: 0;
            color: var(--p-color-text);
        }

        .login-box {
            background: var(--p-color-bg-surface);
            padding: 32px;
            border-radius: var(--p-border-radius-2);
            box-shadow: 0 0 0 1px rgba(63, 63, 68, 0.05), 0 1px 3px 0 rgba(63, 63, 68, 0.15);
            width: 320px;
            box-sizing: border-box;
        }

        .login-box h2 {
            margin-top: 0;
            margin-bottom: var(--p-space-5);
            font-size: 24px;
            font-weight: 600;
            text-align: center;
        }

        .form-group {
            margin-bottom: var(--p-space-4);
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 4px;
            font-size: 14px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid var(--p-color-border);
            border-radius: var(--p-border-radius-1);
            box-sizing: border-box;
            font-size: 14px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--p-color-border-hover);
            box-shadow: 0 0 0 2px rgba(31, 81, 153, 0.2);
        }

        button {
            width: 100%;
            padding: 10px 16px;
            background: var(--p-color-bg-primary);
            color: var(--p-color-text-primary);
            border: 1px solid transparent;
            border-radius: var(--p-border-radius-1);
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
            transition: background 0.2s ease;
        }

        button:hover {
            background: var(--p-color-bg-primary-hover);
        }

        .message {
            color: var(--p-color-border-critical);
            font-size: 14px;
            margin-bottom: var(--p-space-4);
            text-align: center;
        }

        .brand-text {
            text-align: center;
            font-size: 12px;
            color: var(--p-color-text-subdued);
            margin-top: var(--p-space-5);
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <div class="login-box">
            <h2>Superadmin Login</h2>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="message"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <form action="<?= base_url('superadmin/attempt') ?>" method="post">
                <div class="form-group">
                    <label for="email">Platform Email</label>
                    <input type="email" name="email" id="email" required placeholder="super@example.com">
                </div>
                <div class="form-group">
                    <label for="password">Platform Password</label>
                    <input type="password" name="password" id="password" required placeholder="superpassword">
                </div>
                <button type="submit">Access Platform</button>
            </form>
        </div>
        <div class="brand-text">Jewellery SaaS Management</div>
    </div>
</body>

</html>