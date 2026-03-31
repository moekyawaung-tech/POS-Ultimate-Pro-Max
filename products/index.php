```php
<?php
include '../config/db.php';
include '../partials/header.php';

$search = $_GET['search'] ?? '';
$sql = "SELECT * FROM products WHERE name_en LIKE '%$search%' OR code LIKE '%$search%'";
$result = $conn->query($sql);
?>

<div class="card">
  <h2>Products</h2>
  <form method="GET">
    <input type="text" name="search" placeholder="Search product..." value="<?php echo htmlspecialchars($search); ?>">
    <button class="btn secondary" type="submit">Search</button>
    <a href="add.php" class="btn primary">Add Product</a>
  </form>
</div>

<div class="product-grid">
<?php while($row = $result->fetch_assoc()): ?>
  <div class="product-card">
    <h3><?php echo $row['name_en']; ?></h3>
    <p><?php echo $row['code']; ?> | <?php echo $row['category_en']; ?></p>
    <div class="product-price">MMK <?php echo number_format($row['price']); ?></div>
    <p>Stock: <?php echo $row['stock']; ?></p>
    <div class="product-actions">
      <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn secondary">Edit</a>
      <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn secondary" onclick="return confirm('Delete this product?')">Delete</a>
    </div>
  </div>
<?php endwhile; ?>
</div>

<?php include '../partials/footer.php'; ?>

```
