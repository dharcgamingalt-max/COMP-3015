<?php
require 'database/db.php';
require 'core/helpers.php';
include 'core/header.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    echo "<p class='error'>Product not found.</p>";
    exit;
}
?>

<h2><?= e($product['name']) ?></h2>
<p><strong>Price:</strong> $<?= e($product['price_in_cad']) ?></p>
<p><strong>Quantity:</strong> <?= e($product['quantity']) ?></p>

<a href="edit.php?id=<?= $product['id'] ?>">Edit</a>

<form action="routes/web.php?action=delete" method="POST" 
      onsubmit="return confirm('Delete this product?')">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <button type="submit">Delete</button>
</form>
