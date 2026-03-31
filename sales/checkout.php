```php
<?php
include '../config/db.php';
include '../partials/header.php';

$products = $conn->query("SELECT * FROM products");
?>

<div class="card">
  <h2>Checkout</h2>
  <form method="POST" action="receipt.php">
    <label>Select Product</label>
    <select name="product_id" required>
      <?php while($row = $products->fetch_assoc()): ?>
        <option value="<?php echo $row['id']; ?>">
          <?php echo $row['name_en']; ?> - MMK <?php echo number_format($row['price']); ?>
        </option>
      <?php endwhile; ?>
    </select>

    <label>Quantity</label>
    <input type="number" name="qty" min="1" required>

    <button class="btn primary" type="submit">Checkout</button>
  </form>
</div>

<?php include '../partials/footer.php'; ?>

```
