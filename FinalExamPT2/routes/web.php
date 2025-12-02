<?php
require '../database/db.php';
require '../core/helpers.php';

$action = $_GET['action'] ?? null;

//ADD
if ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $price = $_POST['price'];
    $qty = $_POST['quantity'];

    $errors = [];

    if (strlen($name) < 1 || strlen($name) > 50)
        $errors[] = "Product name must be 1–50 characters.";

    if ($price === '' || $price < 0)
        $errors[] = "Price must be non-negative.";

    if ($qty === '' || $qty < 0)
        $errors[] = "Quantity must be non-negative.";

    if ($errors) {
        set_flash('errors', $errors);
        $_SESSION['old'] = $_POST;
        redirect('../add.php');
    }

    $stmt = $pdo->prepare("INSERT INTO products (name, price_in_cad, quantity) VALUES (?, ?, ?)");
    $stmt->execute([$name, $price, $qty]);


    set_flash('success', 'Product added successfully!');
    redirect('../index.php');
}

// EDIT
if ($action === 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_GET['id'];

    $name = trim($_POST['name']);
    $price = $_POST['price'];
    $qty = $_POST['quantity'];

    $errors = [];

    if (strlen($name) < 1 || strlen($name) > 50)
        $errors[] = "Product name must be 1–50 characters.";

    if ($price === '' || $price < 0)
        $errors[] = "Price must be non-negative.";

    if ($qty === '' || $qty < 0)
        $errors[] = "Quantity must be non-negative.";

    if ($errors) {
        set_flash('errors', $errors);
        $_SESSION['old'] = $_POST;
        redirect("../edit.php?id=$id");
    }

    $stmt = $pdo->prepare("UPDATE products SET name=?, price_in_cad=?, quantity=? WHERE id=?");
    $stmt->execute([$name, $price, $qty, $id]);

    set_flash('success', 'Product updated successfully!');
    redirect("../product.php?id=$id");
}

// DELETE
if ($action === 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$id]);

    set_flash('success', 'Product deleted.');
    redirect('../index.php');
}

//Default
redirect('../index.php');
