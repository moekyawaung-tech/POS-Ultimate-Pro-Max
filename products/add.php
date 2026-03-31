```php
<?php
include '../config/db.php';
include '../partials/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $name_en = $_POST['name_en'];
    $name_mm = $_POST['name_mm'];
    $category_en = $_POST['category_en'];
    $category_mm = $_POST['category_mm'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO products (code, name_en, name_mm, category_en, category_mm, price, stock)
            VALUES ('$code', '$name_en', '$name_mm', '$category_en', '$category_mm', '$price', '$stock')";
    $conn->query($sql);

    header("Location: index.php");
    exit();
}
?>

<div class="card">
  <h2>Add Product</h2>
  <form method="POST" class="form-grid">
    <input type="text" name="code" placeholder="Code" required>
    <input type="text" name="name_en" placeholder="Name EN" required>
    <input type="text" name="name_mm" placeholder="Name MM" required>
    <input type="text" name="category_en" placeholder="Category EN" required>
    <input type="text" name="category_mm" placeholder="Category MM" required>
    <input type="number" name="price" placeholder="Price" required>
    <input type="number" name="stock" placeholder="Stock" required>
    <button class="btn primary" type="submit">Save Product</button>
  </form>
</div>

<?php include '../partials/footer.php'; ?>
```
