<?php
require 'core/helpers.php';
include 'core/header.php';

$old = $_SESSION['old'] ?? [];
unset($_SESSION['old']);
?>

<h2>Add Product</h2>

<?php if ($errors = flash('errors')): ?>
    <div class="error">
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?= e($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="routes/web.php?action=add" method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?= e($old['name'] ?? '') ?>"><br><br>

    <label>Price:</label><br>
    <input type="number" step="0.01" name="price_in_cad" value="<?= e($old['price_in_cad'] ?? '') ?>"><br><br>

    <label>Quantity:</label><br>
    <input type="number" name="quantity" value="<?= e($old['quantity'] ?? '') ?>"><br><br>

    <button type="submit">Add Product</button>
</form>
