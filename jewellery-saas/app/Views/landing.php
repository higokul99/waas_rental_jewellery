<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewellery SaaS - Landing Page</title>
    <style>
        body { font-family: sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; background-color: #f4f4f4; }
        .text-center { text-align: center; }
        h1 { color: #333; }
        .preview-links { margin-top: 20px; }
        .preview-links a { display: inline-block; margin: 0 10px; padding: 10px 20px; background: #000; color: #fff; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="text-center">
        <h1>Landing page</h1>
        <p>Welcome to the Jewellery SaaS platform.</p>
        <div class="preview-links">
            <a href="<?= base_url('preview/silversheen') ?>">Preview Silver Sheen Theme</a>
            <a href="<?= base_url('admin') ?>">Admin Login</a>
        </div>
    </div>
</body>
</html>
