<?php
require 'database/db.php';
require 'core/helpers.php';
include 'core/header.php';

$id = $_GET['id'] ?? null;

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    echo "<p class='error'>Product not found.</p>";
    exit;
}

$old = $_SESSION['old'] ?? $product;
unset($_SESSION['old']);
?>

<h2>Edit Product</h2>

<?php if ($errors = flash('errors')): ?>
    <div class="error">
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?= e($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="routes/web.php?action=edit&id=<?= $id ?>" method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?= e($old['name']) ?>"><br><br>

    <label>Price:</label><br>
    <input type="number" step="0.01" name="price" value="<?= e($old['price']) ?>"><br><br>

    <label>Quantity:</label><br>
    <input type="number" name="quantity" value="<?= e($old['quantity']) ?>"><br><br>

    <button type="submit">Save Changes</button>
</form>
