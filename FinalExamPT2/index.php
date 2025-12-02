<?php
require 'database/db.php';
require 'core/helpers.php';
include 'core/header.php';

$search = $_GET['search'] ?? '';

if ($search) {
    $stmt = $pdo->prepare("SELECT id, name FROM products WHERE name LIKE ?");
    $stmt->execute(["%$search%"]);
} else {
    $stmt = $pdo->query("SELECT id, name FROM products ORDER BY id DESC");
}

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Products</h2>

<form method="GET" action="index.php">
    <input 
        type="text"
        name="search"
        placeholder="eg. laptop"
        value="<?= e($search) ?>"
        style="width: 200px;"
    >
    <button type="submit">Search</button>
    <a href="index.php"><button type="button">Clear</button></a>
</form>

<?php if ($msg = flash('success')): ?>
    <p class="success"><?= e($msg) ?></p>
<?php endif; ?>

<?php foreach ($products as $product): ?>
    <div>
        <a href="product.php?id=<?= $product['id'] ?>">
            <?= e($product['name']) ?>
        </a>
    </div>
<?php endforeach; ?>
