<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <title>Login - SILVERSHEEN</title>

  <!-- Bootstrap & theme CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="<?= base_url('themes/silversheen/css/style.css') ?>" />
</head>

<body>
  <?= $this->include('themes/silversheen/partials/header') ?>

  <main class="auth-page">
    <div class="auth-card">
      <div class="text-center mb-4">
        <span class="logo-main" style="font-size:1.75rem;letter-spacing:0.1em;">SILVERSHEEN</span>
      </div>
      <h2>Customer Login</h2>
      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>
      <form action="<?= base_url('customer/attempt') ?>" method="post">
        <div class="mb-3">
          <label for="phone" class="form-label">Mobile Number</label>
          <input type="text" name="phone" id="phone" class="form-control" maxlength="10" pattern="\d{10}" required placeholder="1234567890">
        </div>
        <div class="mb-3">
          <label for="pin" class="form-label">4‑digit PIN</label>
          <input type="password" name="pin" id="pin" class="form-control" maxlength="4" pattern="\d{4}" required placeholder="****">
        </div>
        <button type="submit" class="btn btn-primary w-100">Log In</button>
      </form>
      <p class="mt-3 text-center small">Don't have an account? <a href="<?= base_url('customer/register') ?>" class="text-decoration-underline">Register Now</a></p>
    </div>
  </main>

</body>

</html>