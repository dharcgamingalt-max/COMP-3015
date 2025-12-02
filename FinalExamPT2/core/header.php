<?php
// Detect current page
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tech Store Inventory</title>
</head>
<body>

<h2>Menu</h2>
<p>
<?php if ($currentPage === 'index.php'): ?>
    <strong>Home</strong><br>
    <a href="add.php">Add a new product</a>
<?php elseif ($currentPage === 'add.php'): ?>
    <a href="index.php">Home</a><br>
    <strong>Add a new product</strong>
<?php elseif ($currentPage === 'edit.php' || $currentPage === 'product.php'): ?>
    <a href="index.php">Home</a><br>
    <a href="add.php">Add a new product</a>
<?php else: ?>
    <a href="index.php">Home</a><br>
    <a href="add.php">Add a new product</a>
<?php endif; ?>
</p>

<hr>
