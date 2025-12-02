<?php
session_start();

function e($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function set_flash($key, $value) {
    $_SESSION['flash'][$key] = $value;
}

function flash($key) {
    if (!isset($_SESSION['flash'][$key])) return null;
    $msg = $_SESSION['flash'][$key];
    unset($_SESSION['flash'][$key]);
    return $msg;
}

function redirect($path) {
    header("Location: $path");
    exit;
}
