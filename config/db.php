```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "pos_system";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

---

# 2) `auth/check_auth.php`

```php
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /pos-php-mysql/auth/login.php");
    exit();
}
?>
```
