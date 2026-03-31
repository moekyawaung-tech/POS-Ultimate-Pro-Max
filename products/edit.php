```php
<?php
include '../config/db.php';
include '../partials/header.php';

$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $name_en = $_POST['name_en'];
    $name_mm = $_POST['name_mm'];
    $category_en = $_POST['category_en'];
    $category_mm = $_POST['category_mm'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = "UPDATE products SET
            code='$code',
            name_en='$name_en',
            name_mm='$name_mm',
            category_en='$category_en',
            category_mm='$category_mm',
            price='$price',
            stock='$stock'
            WHERE id=$id";
    $conn->query($sql);

    header("Location: index.php");
    exit();
}
?>

<div class="card">
  <h2>Edit Product</h2>
  <form method="POST" class="form-grid">
    <input type="text" name="code" value="<?php echo $product['code']; ?>" required>
    <input type="text" name="name_en" value="<?php echo $product['name_en']; ?>" required>
    <input type="text" name="name_mm" value="<?php echo $product['name_mm']; ?>" required>
    <input type="text" name="category_en" value="<?php echo $product['category_en']; ?>" required>
    <input type="text" name="category_mm" value="<?php echo $product['category_mm']; ?>" required>
    <input type="number" name="price" value="<?php echo $product['price']; ?>" required>
    <input type="number" name="stock" value="<?php echo $product['stock']; ?>" required>
    <button class="btn primary" type="submit">Update Product</button>
  </form>
</div>

<?php include '../partials/footer.php'; ?
>
```
