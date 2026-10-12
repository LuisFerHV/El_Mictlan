<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: carrito.php");
    exit;
}
if (!csrf_valido()) {
    die("Sesión expirada. <a href=\"carrito.php\">Vuelve al carrito</a> e inténtalo de nuevo.");
}

$accion = $_POST['accion'] ?? 'uno';

if ($accion === 'todo') {

    $_SESSION['carrito'] = [];
} else {

    $id = (int)($_POST['id'] ?? 0);
    if (isset($_SESSION['carrito'][$id])) {
        unset($_SESSION['carrito'][$id]);
    }
}

header("Location: carrito.php");
exit;