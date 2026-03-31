```php
<?php
include '../config/db.php';
include '../partials/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $qty = (int)$_POST['qty'];

    $product = $conn->query("SELECT * FROM products WHERE id=$product_id")->fetch_assoc();

    if ($product && $product['stock'] >= $qty) {
        $subtotal = $product['price'] * $qty;
        $tax = $subtotal * 0.05;
        $total = $subtotal + $tax;

        $conn->query("INSERT INTO sales (product_id, qty, total_amount) VALUES ($product_id, $qty, $total)");
        $conn->query("UPDATE products SET stock = stock - $qty WHERE id=$product_id");
    } else {
        echo "<p>Not enough stock.</p>";
        include '../partials/footer.php';
        exit();
    }
} else {
    header("Location: checkout.php");
    exit();
}
?>

<div class="receipt-card" id="receiptCard">
  <h2>Receipt</h2>
  <p><strong>Product:</strong> <?php echo $product['name_en']; ?></p>
  <p><strong>Qty:</strong> <?php echo $qty; ?></p>
  <p><strong>Subtotal:</strong> MMK <?php echo number_format($subtotal); ?></p>
  <p><strong>Tax:</strong> MMK <?php echo number_format($tax); ?></p>
  <p><strong>Total:</strong> MMK <?php echo number_format($total); ?></p>
  <button class="btn primary" onclick="window.print()">Print Receipt</button>
</div>

<?php include '../partials/footer.php'; ?
>
```
