```php
</div>
</body>
</html>
```

---

# 7) `index.php`

```php
<?php
include 'config/db.php';
include 'partials/header.php';

$productCount = $conn->query("SELECT COUNT(*) as total FROM products")->fetch_assoc()['total'];
$salesCount = $conn->query("SELECT COUNT(*) as total FROM sales")->fetch_assoc()['total'];
$salesSum = $conn->query("SELECT IFNULL(SUM(total_amount),0) as total FROM sales")->fetch_assoc()['total'];
?>

<div class="dashboard-grid">
  <div class="dash-card green">
    <h3>MMK <?php echo number_format($salesSum); ?></h3>
    <p>Total Sales</p>
  </div>
  <div class="dash-card blue">
    <h3><?php echo $productCount; ?></h3>
    <p>Total Products</p>
  </div>
  <div class="dash-card orange">
    <h3><?php echo $salesCount; ?></h3>
    <p>Total Orders</p>
  </div>
</div>

<?php include 'partials/footer.php'; ?>
```
