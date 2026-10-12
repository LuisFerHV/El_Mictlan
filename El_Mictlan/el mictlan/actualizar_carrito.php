<?php
require_once "config.php";

if (!csrf_valido()) {
    die("Sesión expirada. <a href=\"carrito.php\">Vuelve al carrito</a> e inténtalo de nuevo.");
}

$id = (int)($_POST['id'] ?? 0);
$cantidad = max(0, (int)($_POST['cantidad'] ?? 0));

if (!isset($_SESSION['carrito'])) $_SESSION['carrito'] = [];

if ($cantidad === 0) unset($_SESSION['carrito'][$id]);
else $_SESSION['carrito'][$id] = $cantidad;

header("Location: carrito.php");
exit;