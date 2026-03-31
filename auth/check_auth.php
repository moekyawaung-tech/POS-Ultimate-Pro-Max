```php
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /pos-php-mysql/auth/login.php");
    exit();
}
?>
```

---

# 3) `auth/login.php`

```php
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "admin" && $password === "1234") {
        $_SESSION['user'] = $username;
        header("Location: /pos-php-mysql/index.php");
        exit();
    } else {
        $error = "Invalid login credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>POS Login</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="login-body">
  <div class="login-box">
    <h1>POS Login</h1>
    <p>Demo Login: admin / 1234</p>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button class="btn primary" type="submit">Login</button>
    </form>
  </div>
</body>
</html>
```
