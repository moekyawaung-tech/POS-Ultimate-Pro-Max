```php
<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
?>
```

---

# 5) `partials/header.php`

```php
<?php include __DIR__ . '/../auth/check_auth.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>POS System</title>
  <link rel="stylesheet" href="/pos-php-mysql/assets/style.css">
</head>
<body>
<header class="topbar">
  <div class="container topbar-wrap">
    <div>
      <h1>POS System</h1>
      <p>Mini Market & Shop Management</p>
    </div>
    <div>
      <a href="/pos-php-mysql/index.php" class="btn secondary">Dashboard</a>
      <a href="/pos-php-mysql/products/index.php" class="btn secondary">Products</a>
      <a href="/pos-php-mysql/sales/checkout.php" class="btn secondary">Checkout</a>
      <a href="/pos-php-mysql/auth/logout.php" class="btn secondary">Logout</a>
    </div>
  </div>
</header>
<div class="container section">
```
